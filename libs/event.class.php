<?php
class event {

    var $con;
    var $id;
    var $title = '';
    var $description = '';
    var $start_date;
    var $start_time;

    function __construct() {
        $this->con = new Connection;
    }

    function insert_into_db() {
        $current_date = date('Y-m-d');
        $current_time = date('h:i');
        $sql = "INSERT INTO events (event_title, event_description, creation_date, creation_time, start_date, start_time) VALUES (?,?,?,?,?,?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param('ssssss', $this->title, $this->description, $current_date, $current_time, $this->start_date, $this->start_time);        
        $stmt->execute();
    }
}
?>
