<?php 
class Event
//calendarDealerEventDisplay
{

    public function getEventById($eventID) {
        $sql = 'SELECT * FROM event WHERE eventID = ' . $eventID;
        $results = mysql_query($sql);
        $row = mysql_fetch_array($results);
        	$this->eventID = $row['eventID'];
	        $this->eventType = $row['eventType'];
	        $this->eventTitle = $row['eventTitle'];
			$this->eventStartDate = $row['eventStartDate'];
			$this->eventEndDate = $row['eventEndDate'];
			$this->eventStartTime = $row['eventStartTime'];
			$this->eventEndTime = $row['eventEndTime'];
			$this->seats = $row['seats'];
	        $this->address = $row['address'];
	        $this->city = $row['city'];
	        $this->state = $row['state'];
			$this->zip = $row['zip'];
			$this->phone = $row['phone'];
	        $this->eventDescription = $row['eventDescription'];
			$this->addedDate = $row['addedDate'];	
			$this->status = $row['status'];	
	        $this->multiDay = $row['multiDay'];
			$this->eventAddedBy = $row['eventAddedBy'];
			//$this->recurrence = $row['recurrence'];
			//$this->frequency = $row['frequency'];
			$this->gallery = $row['gallery'];
	        $this->cost = $row['cost'];
			$this->contact = $row['contact'];
			$this->phone = $row['phone'];
			$this->email = $row['email'];	
			$this->fileName = $row['fileName'];
			$this->colorCode = $row['colorCode'];	
			$this->multiDay = $row['multiDay'];				
	        return true;

    }

	public function getEventGallery() {
        return strip_tags($this->gallery);
    }
	public function getColorCode() {
        return strip_tags($this->colorCode);
    }
	public function getFileName() {
        return strip_tags($this->fileName);
    }
	public function getAddress() {
        return strip_tags($this->address);
    }
	public function getCity() {
        return strip_tags($this->city);
    }
    public function getState() {
        return strip_tags($this->state);
    }
	public function getZip() {
        return strip_tags($this->zip);
    }
	public function getDate() {
        return strip_tags($this->addedDate);
    }
	public function getCost() {
        return strip_tags($this->cost);
    }
	public function getContactEmail() {
        return strip_tags($this->email);
    }		
	public function getContactPhone() {
        return strip_tags($this->phone);
    }	
	public function getContact() {
        return strip_tags($this->contact);
    }		
	public function getAddedBy() {
        return strip_tags($this->eventAddedBy);
    }	
	public function getEventEndTime() {
        return strip_tags($this->eventEndTime);
    }

    public function getMultiCheck() {
        return strip_tags($this->multiDay);
    }	
	public function getEventID() {
        return strip_tags($this->eventID);
    }
	public function getEventType() {
        return strip_tags($this->eventType);
    }
    public function getEventTitle() {
        return strip_tags($this->eventTitle);
    }
	public function getEventStartDate() {
        return strip_tags($this->eventStartDate);
    }
	public function getEventEndDate() {
        return strip_tags($this->eventEndDate);
    }	
    public function getEventStartTime() {
        return strip_tags($this->eventStartTime);
    }
    public function getSeats() {
        return strip_tags($this->seats);
    }

    //allow only tags from wysiwyg editor and strip any inline js 		
	public function getEventDescription() {
		$description = $this->eventDescription;
		$allow = '<table> <tr> <td> <table> <tr> <td> <thead> <tbody> <tfoot> <span> <sub> <sup> <li> <ol> <ul> <a> <br> <p> <h1> <h2> <h3> <h4> <h5> <h6> <strong> <hr> <div> <img>';	
		$this->stripInlineScripts($description);
        return strip_tags($description, $allow);
    }
	public function stripInlineScripts($value) {
		 preg_replace('#(<[^>]+[\x00-\x20\"\'\/])(on|xmlns)[^>]*>#iUu', "$1>", $value);
	}	
	
	

//Dealer events
function getEventDisplay($eventStartDate){
	$Encryption = new Encryption();
	$sql = mysql_query("SELECT * FROM eventDays WHERE eventDay = '$eventStartDate'") or die(mysql_error());
	$html = '';
		while($row = mysql_fetch_array($sql))
		{
			$this->getEventById(intval($row['eventID']));
			$html .= '<li><a class="'.$this->getColorCode().'" href="eventDisplay.php?ID='.intval($row['eventID']).'">* '.$this->getEventTitle().'</a></li>';
		}
    return $html;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////CREATING EVENTS//////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function insertDays($eventDay, $eventStartTime, $eventEndTime, $eventID, $dayNumber, $coinClubID) {
    $sql = mysql_query("INSERT INTO eventDays(eventDay, eventStartTime, eventEndTime, dayNumber, eventID, coinClubID) VALUES('$eventDay', '$eventStartTime', '$eventEndTime', '$dayNumber', '$eventID', '$coinClubID')") or die(mysql_error());
}
function insertDealerDays($eventDay, $eventStartTime, $eventEndTime, $eventID, $dayNumber, $userID) {
    $sql = mysql_query("INSERT INTO eventDays(eventDay, eventStartTime, eventEndTime, dayNumber, eventID, userID) VALUES('$eventDay', '$eventStartTime', '$eventEndTime', '$dayNumber', '$eventID', '$userID')") or die(mysql_error());
}



function insertNewDays($eventDay, $eventStartTime, $eventEndTime, $eventID, $dayNumber, $userID) {
    $sql = mysql_query("INSERT INTO eventDays(eventDay, eventStartTime, eventEndTime, dayNumber, eventID, userID) VALUES('$eventDay', '$eventStartTime', '$eventEndTime', '$dayNumber', '$eventID', '$userID')") or die(mysql_error());
}
function getDatesBetween2Dates($startTime, $endTime) {
    $day = 86400;
    $format = 'Y-m-d';
    $startTime = strtotime($startTime);
    $endTime = strtotime($endTime);
    $numDays = round(($endTime - $startTime) / $day) + 1;
    $days = array();
        
    for ($i = 0; $i < $numDays; $i++) {		
        $days[] = date($format, ($startTime + ($i * $day)));
    }
        
    return $days;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////// EVENT IMAGE GALLERY
//Make a folder
function createEventFolder($eventID) {
		$folderName = "../gallery/".$eventID;
		if ( !file_exists($folderName) ) {
			mkdir($folderName, 0777);
			$this->createEventThumbFolder($eventID);
			return true;
			} else {
				return false;
			}

    }	
function createEventThumbFolder($eventID) {
		$folderName = "../gallery/".$eventID.'thumbs/';
		if ( !file_exists($folderName) ) {
			mkdir($folderName, 0777);
			return true;
			} else {
				return false;
			}

    }
function deleteEventDir($eventID) {
	$dirPath = "../gallery/".$eventID;
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException('$dirPath must be a directory');
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteEventDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}
////////////////////////////////////////////////////// EVENT IMAGLLERY


	public function getMonthEventCountCount($coinClubID, $month, $year) {
	$sql = mysql_query("SELECT * FROM event WHERE coinClubID = '$coinClubID' AND MONTH(eventStartDate) = '$month' AND YEAR(eventStartDate) = '$year'") or die(mysql_error());
	return mysql_num_rows($sql);
    }










}//End Class
?>
