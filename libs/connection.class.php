<?php
class Connection extends mysqli {
    // Database Connection Settings
    var $servername = "localhost";
    var $username = "root";
    var $password = "passwort";
    var $database = "teamerdb";

     public function __construct() {
         parent::__construct($this->servername, $this->username, $this->password, $this->database);
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
