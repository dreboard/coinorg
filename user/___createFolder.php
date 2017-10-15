<?php
include '../inc/config.php';
	
function createCoinFolder2($userID) {
		$folderName = "user/".$userID."/coins";
		if ( !file_exists($folderName) ) {
			mkdir($folderName, 0777);
			return true;
			} else {
				return false;
			}

    }	
function createRollFolder2($userID) {
		$folderName = "user/".$userID."/rolls";
		if ( !file_exists($folderName) ) {
			mkdir($folderName, 0777);
			return true;
			} else {
				return false;
			}

    }	
function createBagFolder2($userID) {
		$folderName = "user/".$userID."/bags";
		if ( !file_exists($folderName) ) {
			mkdir($folderName, 0777);
			return true;
			} else {
				return false;
			}

    }	
function createSetFolder2($userID) {
		$folderName = "user/".$userID."/sets";
		if ( !file_exists($folderName) ) {
			mkdir($folderName, 0777);
			return true;
			} else {
				return false;
			}

    }
	function createUserFolder2($userID) {
		$folderName =$userID;
		if ( !file_exists($folderName) ) {
			mkdir($folderName, 0777);
			createCoinFolder2($userID);
			createRollFolder2($userID);
			createSetFolder2($userID);
			createBagFolder2($userID);
			return true;
			} else {
				return false;
			}

    }
createUserFolder2($userID='99');	
?>