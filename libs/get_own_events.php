<?php

include('connection.class.php');

$conn = new Connection;
$user_id = $_REQUEST['user_id'];
$offset = $_REQUEST['offset'];
$sql = 'SELECT event_id, event_title, start_date FROM events WHERE creator_id = ' . $user_id . ' LIMIT 5 OFFSET ' . $offset . ';';
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $output[] = $row;
}

echo json_encode($output);
?>
