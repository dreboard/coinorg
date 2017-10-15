<?php 
if (isset($_SESSION['userID'])) {
	$userID = intval($_SESSION['userID']); 
	$User->getUserById($userID);
} else {	
	header("location: ../login.php");
	exit;
}
?>