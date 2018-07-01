<?php
class event {

    var $con;
    var $id;
    var $creator_id;
    var $title = '';
    var $description = '';
    var $fixed_date;
    var $start_date;
    var $start_time;
    var $fixed_location;
    var $limited_number_of_participants;
    var $number_of_participants;
    var $advance_reservation_required;
    var $confirm_reservations;
    
    function __construct() {
        $this->con = new Connection;
    }

    function insert_into_db() {
        $current_date = date('Y-m-d');
        $current_time = date('h:i');
        $sql = "INSERT INTO events" .
        "(creator_id, event_title, event_description, creation_date, creation_time, start_date, start_time,".
        " fixed_location, limited_number_of_participants, number_of_participants, advance_reservation_required, confirm_reservations  )".
        " VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param('issssssiiiii',$this->creator_id, $this->title, $this->description, $current_date, $current_time, $this->start_date, $this->start_time, $this->fixed_location,$this->limited_number_of_participants, $this->number_of_participants, $this->advance_reservation_required, $this->confirm_reservations);        
        $stmt->execute();
    }
}
?>
