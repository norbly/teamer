<?php
class event {

    var $con;
    var $id;
    var $creator_id;
    var $title = '';
    var $description = '';
    var $label;
    var $fixed_date;
    var $start_date;
    var $start_time;
    var $fixed_location;
    var $limited_number_of_participants;
    var $max_number_of_participants;
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
        " fixed_location, limited_number_of_participants,max_number_of_participants, advance_reservation_required, confirm_reservations  )".
        " VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param('issssssiiiii',$this->creator_id, $this->title, $this->description, $current_date, $current_time, $this->start_date, $this->start_time, $this->fixed_location,$this->limited_number_of_participants,$this->max_number_of_participants, $this->advance_reservation_required, $this->confirm_reservations);        
        $stmt->execute();

        // get event id      
        $sql = "SELECT MAX(event_id) as id FROM events WHERE creator_id = " . $this->creator_id;
        $result = $this->con->query($sql);
        $result = $result->fetch_assoc();
        $this->id = $result["id"];
        
        // label
        $i = 0;
        $l = count($this->label); 
        $sql_label = "INSERT INTO event_has_label (event_id, label_id) VALUES (?,?)";
        $stmt = $this->con->prepare($sql_label);
        $stmt->bind_param('ii',$this->id, $element);
        
        for($i; $i < $l; $i++) {
            $element = $this->label[$i];
            $stmt->execute();
        }
        
    }

    
    function get_event_by_id($id) {

        $sql = 'SELECT creator_id FROM events WHERE event_id = ' . $id .';';
        $result = $this->con->query($sql);
        $result = $result->fetch_assoc();
        // if active user is creator of the event, return all information about the event
        if ($result['creator_id'] == $_SESSION['user_id']) {
            $sql = 'SELECT event_id, creator_id, event_title, event_description, creation_date, creation_time, start_date, start_time,".
        " fixed_location, limited_number_of_participants,max_number_of_participants, advance_reservation_required, confirm_reservations FROM events WHERE event_id = ' . $id .';';
            
        } else {
            $sql = 'SELECT event_id, creator_id, event_title, event_description, creation_date, creation_time, start_date, start_time,".
        " fixed_location, limited_number_of_participants, max_number_of_participants, advance_reservation_required, confirm_reservations FROM events WHERE event_id = ' . $id .';';
        }
        $result = $this->con->query($sql);
        return $result->fetch_assoc();
    }

    function get_label($event_id) {
        $sql = 'SELECT b.label_name, b.label_id FROM event_has_label a, label b WHERE a.label_id = b.label_id AND a.event_id =' . $event_id;
        $result = $this->con->query($sql);
        while($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output;  
    }

    

}
?>
