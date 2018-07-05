<?php
class Search {
    var $con;
    var $q;
    function __construct() {
        $this->con = new Connection;
    }

    function get_search_results() {
        $sql = 'SELECT creator_id, event_title, event_description,start_date, start_time, limited_number_of_participants, advance_reservation_required, confirm_reservations FROM events';
        $result = $this->con->query($sql);
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output;
    }
}
?>