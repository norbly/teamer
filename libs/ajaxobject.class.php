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
        $exclude = array();
        $exclude = json_decode($input['exclude']);

        //  include the NOT IN(...) clause if the $exlude array holds elements
        
        $in_clause = "";       
        if (count($exclude) > 0) {            
            $i = 0;
            $l = count($exclude) - 1; // exclude the last element so there won't be a comma after this element in $in_clause. Otherwise, sql will produce an error
            for ($i; $i < $l; $i++) {
                $in_clause .= $exclude[$i] . ",";
            }
            $in_clause .= $exclude[$l];
            $in_clause = 'AND lab.label_id NOT IN(' . $in_clause . ')';
        }

        $sql = "SELECT lab.label_id, trans.translation ".
        "FROM label lab, label_in_lang trans ".
        "WHERE lab.label_id = trans.label_id ".
        "AND trans.lang_iso_code = '" . $input['lang'] . "' ".
        $in_clause .
        "AND trans.translation LIKE('" . $input['q'] . "%') " .
        "LIMIT 5 OFFSET 0 " .
        ";";

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

    function test($input = array()) {
        echo $input['x'];
    }
}
?>