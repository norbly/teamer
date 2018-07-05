<?php
include(HOME_DIR . 'libs/connection.class.php');
class AJAXObject {

   var $con;

    function __construct() {
       $this->con  = new Connection;
        
    }

    function search_results($input = array()) {
    
        $offset = $input['offset'];
        $sql = 'SELECT event_id, event_title, start_date FROM events LIMIT 5 OFFSET '. $offset;
        $result = $this->con->query($sql);
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        echo json_encode($output);
    }

    function own_events($input = array()) {
        $sql = 'SELECT event_id, event_title, start_date FROM events WHERE creator_id = ' . $input['user_id'] . ' LIMIT 5 OFFSET ' . $input['offset'] . ';';
        $result = $this->con->query($sql);
        while($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        echo json_encode($output);
    }

}
?>