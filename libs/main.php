<?php
class Main {
    var $tpl = null;
    var $conn;
 
    function __construct() {
        
        $this->tpl = new Custom_Smarty; 
        $this->conn = new Connection;
    
       if ($this->conn->connect_error) {
            echo 'connection error:' . $this->conn->connect_error . '<br>';
        }
    }

    function load_doc($action) {
        $this->tpl->assign('TEMPLATE',$action);  
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
           
           

           if (!$error) {  
            $verification = rand(111111, 999999);
           // execute the sql query
           $stmt = $this->conn->prepare('INSERT INTO users (username, email, password, verification) VALUES (?,?,?,?)');
           $stmt->bind_param('sssi',$username,$email, $password_0, $verification);
           $stmt->execute();

           $sql = 'SELECT id FROM users WHERE email = "' . $email .'" ';
           $result = $this->conn->query($sql);
           $user = $result->fetch_assoc();
           $_SESSION['active'] = true;
           $_SESSION['username'] = $username;
            $_SESSION['id'] = $user['id'];   
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
                $this->tpl->assign('ERROR_LOGIN', 'err_email_empty'); 
                return;               
            }
            
            // check if user exists
            $sql = 'SELECT id, username, email, password FROM users WHERE email = "' . $email .'" ';
            $result = $this->conn->query($sql);
        
            if ($result->num_rows === 0) {
                $this->tpl->assign('ERROR_LOGIN', 'err_user_not_exists');
                return;
            } 
            
            //check if password is correct
            $user = $result->fetch_assoc();   
            $password_input = $this->conn->escape_string($input['password']);           
            if (password_verify( $password_input, $user['password'])) {
                $_SESSION['active'] = true;
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                header("location: " . $_SERVER['PHP_SELF'] . "?action=dashboard");
            } else {
                $this->tpl->assign('ERROR_LOGIN', 'err_wrong_password');
                return;
            }           
        }   
    }

    function logout() {
        session_unset();
        session_destroy();
    }

    function dashboard() {
        
    }
}
?> 