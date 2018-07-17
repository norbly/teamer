<?php
class Search {
    var $con;
    var $q;
    function __construct() {
        $this->con = new Connection;
    }

    function get_search_results($input = array()) {
        
    $offset = $input['offset'];
    $sql = 'SELECT DISTINCT evt.event_id, evt.event_title, evt.start_date ' .
    'FROM events evt, event_has_label evt_lbl, label_in_lang lbl_lang ' .
    'WHERE evt.event_id = evt_lbl.event_id ' .
    'AND evt_lbl.label_id = lbl_lang.label_id ' .
    'AND (' .
    'evt.event_title LIKE("%' . $input['q'] . '%") ' .
    'OR lbl_lang.translation LIKE("%' . $input['q'] . '%") ' .
    ') ' .
    'LIMIT 5 ' .
    'OFFSET ' . $offset .
    ';';

        
        /*
        $sql = 'SELECT event_id, event_title, start_date ' .
        'FROM events ' .
        'WHERE event_title LIKE("%' . $input['q'] . '%") ' .
        'LIMIT 5 ' .
        'OFFSET ' . $offset;
        */
        $result = $this->con->query($sql);
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output;
    }
}
?>