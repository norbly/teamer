<?php
class Main {
    
    var $tpl = null;
    var $conn;

    function __construct() {
        $this->tpl = new Custom_Smarty; 
        $this->conn = new Connection;
        
        // get the users language
        if (isset($_REQUEST['lang'])) {
            $this->tpl->assign('CURRENT_LANG', $_REQUEST['lang']);
        } else {
            // what happens when the user did not specify any language
            $this->tpl->assign('CURRENT_LANG', 'en');
        }

    }

    function load_doc($action) {
        $this->tpl->assign('CURRENT_ACTION',$action);
        $this->tpl->assign('TEMPLATE',$action . '.html');  
        $this->tpl->display('main.html');
    }
  
    function register($input = array()) {

        if (isset($_POST['username']) || isset($_POST['email']) || isset($_POST['passwort_0']) || isset($_POST['passwort_1'])) {
            $error = false;
            // check username for validity
            $username = $this->conn->escape_string($input['username']);
            if (empty($username)) {
                $error = true;    
                $this->tpl->assign('ERROR_USERNAME', 'err_username_empty');
            } else if (strlen($username) > 64) {
                $error = true;
                $this->tpl->assign('ERROR_USERNAME', 'err_username_too_long');
            }

            // check email
           $email = $this->conn->escape_string($input['email']);
           $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (empty($email)) {
                $error = true;
                $this->tpl->assign('ERROR_EMAIL', 'err_email_empty');
            } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $error = true;
                $this->tpl->assign('ERROR_EMAIL', 'err_email_invalid');
            }           
           
           // check password   
           $password_0 = $this->conn->escape_string($input['password_0']);
           $password_1 = $this->conn->escape_string($input['password_1']);
           if (strlen($password_0) < 8) {
            $error = true;
            $this->tpl->assign('ERROR_PASSWORD_0', 'err_password_too_short'); 
           } else if (strlen($password_0) > 256) {
            $error = true;
            $this->tpl->assign('ERROR_PASSWORD_0', 'err_password_too_long'); 
           } else if ($password_0 !== $password_1) {
            $error = true;
            $this->tpl->assign('ERROR_PASSWORD_1', 'err_passwords_not_equal');
           }
           $password_0 = password_hash($password_0, PASSWORD_BCRYPT);

            // check if user exists
            $sql = "SELECT username, email FROM users WHERE email='" . $email . "' OR username = '" . $username ."'";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                $error = true;
                $this->tpl->assign('ERROR_REGISTER', 'err_user_exists');
            } 
           
            // if no error, add user to database and redirect to dashboard
           if (!$error) {  
            $verification = rand(111111, 999999);
           $stmt = $this->conn->prepare('INSERT INTO users (username, email, password, verification) VALUES (?,?,?,?)');
           $stmt->bind_param('sssi',$username,$email, $password_0, $verification);
           $stmt->execute();

           $sql = 'SELECT id FROM users WHERE email = "' . $email .'" ';
           $result = $this->conn->query($sql);
           $user = $result->fetch_assoc();
           $_SESSION['active'] = true;
           $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['id'];   
            $_SESSION['email'] = $email;
           header("location: " . $_SERVER['PHP_SELF'] . "?action=dashboard");
           }
        }
    }

    function login($input = array()) {
        $error = false;
        if (isset($_POST['email']) || isset($_POST['password'])) {
            $email = $this->conn->escape_string($input['email']);

            // check if email is empty
            if (empty($email)) {
                $this->tpl->assign('ERROR_EMAIL', 'err_email_empty'); 
                return;               
            }
            
            // check if user exists
            $sql = 'SELECT id, username, email, password FROM users WHERE email = "' . $email .'" ';
            $result = $this->conn->query($sql);
        
            if ($result->num_rows === 0) {
                $this->tpl->assign('ERROR_EMAIL', 'err_user_not_exists');
                return;
            } 
            
            //check if password is correct
            $user = $result->fetch_assoc();   
            $password_input = $this->conn->escape_string($input['password']);           
            if (password_verify( $password_input, $user['password'])) {
                $_SESSION['active'] = true;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                header("location: " . $_SERVER['PHP_SELF'] . "?action=dashboard");
            } else {
                $this->tpl->assign('ERROR_PASSWORD', 'err_wrong_password');
                return;
            }           
        }   
    }

    function logout() {
        session_unset();
        session_destroy();  
        header("location: " . $_SERVER['PHP_SELF'] . "?action=index&message=logout_successful");
    }

    function dashboard() {
        
         if (!isset($_SESSION['active']) OR $_SESSION['active'] === false) { 
            header("location: " . $_SERVER['PHP_SELF'] . "?action=login&error=err_login_to_view_page");
         }
    }

    function add_event($input = array()) {
        // check if user has submitted the form
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
            // check if user is logged in
            if (!isset($_SESSION['active']) || $_SESSION['active'] === false) {
                header("location: " . $_SERVER['PHP_SELF'] . "?action=login&error=err_login_to_add_event");
                return;
            }
            
            require(HOME_DIR . 'libs/event.class.php');
            $event = new event;
            

            $event->creator_id = $_SESSION['user_id'];
            // check if title is empty
            if (empty($input['title'])) {
                $this->tpl->assign('ERROR_TITLE', 'err_title_empty');
                return;
            }
            $event->title = $input['title'];
            
            // check description
            if (empty($input['description'])) {
                $this->tpl->assign('ERROR_DESCRIPTION', 'err_description_empty');
                return;
            }
            $event->description = $input['description'];

            // check label
            $label = $input['label'];
            $label = json_decode($label);
            $event->label = $label;
            
            // check date
            $event->fixed_date = isset($input['fixed_date']) ? 1 : 0;
            $event->start_date = date('Y-m-d', mktime($input['start_date']));
            $event->start_time = date('h:i', mktime($input['start_time']));

            // check location
            $event->fixed_location = isset($input['fixed_location']) ? 1 : 0;;
            
            // handle number of participants
            $event->limited_number_of_participants = isset($input['limited_number_of_participants']) ? 1 : 0;
            $event->max_number_of_participants = $input['max_number_of_participants'];
            
            // handle reservations
            $event->advance_reservation_required = isset($input['advance_reservation_required']) ? 1 : 0;                
            $event->confirm_reservations = isset($input['advance_reservation_required']) && isset($input['confirm_reservations']) ? 1 : 0;

            $event->insert_into_db();
            header("location: " . $_SERVER['PHP_SELF'] . "?action=dashboard&message=event_successfully_created");    
        }    
    }

   function show_event() {

    if(!isset($_REQUEST['id'])) {
        return;
    }

    require(HOME_DIR . 'libs/event.class.php');
    $event = new event;
    // handle args errors
    
    $array_event_info = $event->get_event_by_id($_REQUEST['id']);
    $this->tpl->assign('EVENT', $array_event_info);
    $array_label = $event->get_label($array_event_info['event_id']);
    $this->tpl->assign('LABEL', $array_label);

    }

    function search() {
        if (isset($_REQUEST['q'])) {
            /*
            include(HOME_DIR . 'libs/search.class.php');
            $_SESSION['search'] = new Search;
            $_SESSION['search']->get_search_results();*/
        }   
    }
}
?> 