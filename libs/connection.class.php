<?php
class Connection extends mysqli {
    
    // Database Connection Settings
    var $servername;
    var $username;
    var $password;
    var $database;
 
     public function __construct() {
        $pref_file = fopen(HOME_DIR . "preferences.json","r");
        $str = fread($pref_file, filesize(HOME_DIR . "preferences.json"));
        $pref = json_decode($str);
        fclose($pref_file);

        $this->servername = $pref->servername;
        $this->username = $pref->username;
        $this->password = $pref->password;
        $this->database = $pref->database;

        parent::__construct($this->servername, $this->username, $this->password, $this->database);

        if($this->connect_error) {
            die("connection error: " . $this->connect_error);
        }
     }

     function get_all_label() {
         $sql = 'SELECT label_id, label_name FROM label';
         $result = $this->query($sql);
         while($row = $result->fetch_assoc()) {
             $rows[] = $row;
         }
         return $row;
     }

}
?>
