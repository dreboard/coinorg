<?php 
include '../config.php';
include_once "../pageElements/logSession.php";

$sql= mysql_query("SELECT eventID, eventTitle, eventStartDate, eventEndDate, DATE_FORMAT(eventStartDate, '%Y-%m-%dT%H:%i' ) AS startDate, DATE_FORMAT(eventEndDate, '%Y-%m-%dT%H:%i' ) AS endDate FROM event WHERE userID = ".$userID." ORDER BY eventStartDate DESC");
$events = array();
while ($row = mysql_fetch_assoc($sql)) {
   $eventArray['id'] = $row['eventID'];
   $eventArray['title'] =  $row['eventTitle'];
   $eventArray['start'] = $row['eventStartDate'];
   $eventArray['end'] = $row['eventEndDate'];
   $eventArray['url'] = 'event.php?ID='.$row['eventID'];
   $events[] = $eventArray;
}
echo json_encode($events);
?>