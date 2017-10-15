<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

$sql= mysql_query("SELECT eventID, eventTitle, eventStartTime, eventStartDate, eventEndDate, DATE_FORMAT(eventStartDate, '%Y-%m-%dT%H:%i' ) AS startDate, DATE_FORMAT(eventEndDate, '%Y-%m-%dT%H:%i' ) AS endDate FROM event WHERE userID = ".$userID." ORDER BY eventStartDate DESC");
$events = array();
while ($row = mysql_fetch_assoc($sql)) {
   $eventArray['id'] = $row['eventID'];
   $eventArray['title'] =  $row['eventTitle'];
   $eventArray['start'] = $row['eventStartDate'] . " ".$row['eventStartTime'];
   $eventArray['end'] = $row['eventEndDate'];
   $eventArray['url'] = 'eventDisplay.php?ID='.$Encryption->encode($row['eventID']);
   $eventsArray['allDay'] = false;
   $events[] = $eventArray;
}
echo json_encode($events);
?>