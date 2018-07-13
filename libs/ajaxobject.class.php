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

    function get_label($input = array()) {
        if (strlen($input['q']) < 1) {
            echo '[]';
            return;
        } 
        $sql = "SELECT lab.label_id, trans.translation ".
        "FROM label lab, label_in_lang trans WHERE ".
        "lab.label_id = trans.label_id AND ".
        "trans.lang_iso_code = '" . $input['lang'] . "' AND ".
        "trans.translation LIKE('" . $input['q'] . "%');";
        $result = $this->con->query($sql);
        if ($result->num_rows < 1) {
            echo '{"error":"no_results"}';
            return;
        }
        while($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        echo json_encode($output);
    }

}
?>