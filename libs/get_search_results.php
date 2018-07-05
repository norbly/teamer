<?php
include('connection.class.php');
$con = new Connection;
$offset = $_REQUEST['offset'];
$sql = 'SELECT event_id, event_title, start_date FROM events LIMIT 5 OFFSET '. $offset;
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
    $output[] = $row;
}
echo json_encode($output);
?>