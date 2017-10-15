<?php 
if (isset($_SESSION['userID'])) {
	$userID = intval($_SESSION['userID']); 
	$User->getUserById($userID);
	$userLevel = $User->getUserLevel(); 
	$firstName = $User->getFirstname();
	$email = $User->getEmail();
} else {
	header("location: ../login.php");
}
?>