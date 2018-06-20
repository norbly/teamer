<?php
class Main {
    var $tpl = null;
    var $errors;
    var $servername = "localhost";
    var $username = "root";
    var $password = "passwort";
    var $database = "eventbase";
    var $conn;

    function __construct() {
        $this->tpl = new Eventbase_Smarty; 
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
    
       if ($this->conn->connect_error) {
            echo 'connection error:' . $this->conn->connect_error . '<br>';
        }
    }

    function load_doc($action) {
        $this->tpl->assign('TEMPLATE',$action);  
        $this->tpl->display('main.html');
    }
    /*
    * function that should be invoked to register a new person. The input should be the $_POST array
    */
    function register($input = array()) {
        // prepare sql statement
        $stmt = $this->conn->prepare('INSERT INTO user_table (username, email, passwort, hash) VALUES (?,?,?,?)');
        $stmt->bind_param('ssss',$username,$email, $password, $hash);
        $username = $input['username'];
        $email = $this->check_email($input['email']);
        $password = $input['password_0'];
        $hash = '353';
        $stmt->execute();
    }

    function check_email($email) {
        // clear smarty variable
        $this->tpl->assign('email_error', null);
        // sanitize email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        // check if email is empty
        if (sizeof($email) === 1 || !isset($email)) {
            $this->tpl->assign('email_error', 'email_empty');
            $this->errors = true; 
            return"";
        } 
        // check if email is valid
        if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            return $email;
        } else {
            $this->tpl->assign('email_error', 'email_invalid');
            $this->errors = true; 
            return "";
        }
    }
}
?> 