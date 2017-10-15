<?php 
if (isset($_SESSION['userID'])) {
	$userID = intval($_SESSION['userID']); 
	$User->getUserById($userID);
	    $accountID = $userID;
} else {	
	header("location: ../login.php");
	exit;
}
?>