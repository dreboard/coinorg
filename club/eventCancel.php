<?php 
include "../inc/config.php";
include_once "../inc/pageElements/logSession.php";

$coinClubID = $User->getCoinClubID();
$CoinClub->getClubById($coinClubID);

if(isset($_GET['ID'])) {  
	$coinClubID = $Encryption->decode($_GET['club']);
	$eventID = $Encryption->decode($_GET['ID']); 
	$Event->cancelClubEvent($eventID, $sendNotification = false, $notificationText = NULL, $coinClubID); 
	header("location: eventDisplay.php?ID=".$Encryption->encode($eventID)."");
exit();
} 


?>