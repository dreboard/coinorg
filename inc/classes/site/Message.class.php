<?php 
class Message
{
	public function __construct() {}

    public function getMessageById($messageID) {
        $sql = mysql_query("SELECT * FROM messages WHERE messageID = '$messageID'");
        $row = mysql_fetch_array($sql);
		$this->messageID = $row['messageID']; 
        $this->replyID = $row['replyID'];
        $this->mailto = $row['mailto'];
        $this->mailFrom = $row['mailFrom'];
		$this->messageDate = $row['messageDate'];
		$this->messageTitle = $row['messageTitle'];
		$this->message = $row['message']; 
        $this->fileID = $row['fileID'];
        $this->reportID = $row['reportID'];
        $this->articleID = $row['articleID'];
		$this->websiteID = $row['websiteID'];
		$this->eventID = $row['eventID'];
		$this->clientID = $row['clientID']; 
        $this->projectsID = $row['projectsID'];
        $this->taskID = $row['taskID'];
        $this->status = $row['status'];
		$this->view = $row['view'];	
		$this->messageType = $row['messageType'];
				
        return true;
    }
	
	public function getMessageID() {
	    return strip_tags($this->messageID);
    }
	public function getMessageType() {
	    return strip_tags($this->messageType);
    }	
	public function getMessageDate() {
	    return strip_tags($this->messageDate);
    }	
	public function getClientID() {
        return strip_tags($this->clientID);
    }
	public function getMailFrom() {
		$users = new User;
		$users->getUserById($this->mailFrom);
	    $firstName = $users->getFirstname();
        return strip_tags($firstName);
    }
    public function getMailto() {
		$users = new User;
		$users->getUserById($this->mailto);
	    $firstName = $users->getFirstname();
        return strip_tags($firstName);
    }
	public function getMessage() {
        return $this->noScriptMsg($this->message);
    }
	public function getMessageTitle() {
        return strip_tags($this->messageTitle);
    }
    public function getAttachment() {
        return strip_tags($this->fileID);
    }
	public function getReport() {
        return strip_tags($this->reportID);
    }
    public function getArticleID() {
        return strip_tags($this->articleID);
    }
	public function getWebsiteID() {
        return strip_tags($this->websiteID);
    }
    public function getEventID() {
        return strip_tags($this->eventID);
    }
    public function getReplyID() {
        return strip_tags($this->replyID);
    }
    public function getProjectsID() {
        return strip_tags($this->projectsID);
    }
    public function getTaskID() {
        return strip_tags($this->taskID);
    }
	public function getReadStatus() {
        return strip_tags($this->status);
    }	
	public function getViewLevel() {
        return strip_tags($this->view);
    }	

	
function markRead($messageID){
	$result = mysql_query("UPDATE messages SET status = 'Read' WHERE messageID = '$messageID'") or die(mysql_error()); 
	return;
}
function markUnRead($messageID){
$result = mysql_query("UPDATE messages SET status = 'Unread' WHERE messageID = '$messageID'") or die(mysql_error()); 
	return;
}

function getStatusView($messageID, $userID){
  if($this->status == 'Read'){
	  $statusView = "";
  } else {
  $statusView = '<form action="" method="post" class="readMsgForm">
  <input name="messageID" type="hidden" value="'.$messageID.'" />
  <input name="mailto" type="hidden" value="'.$userID.'" />
  <input name="readMsgFormBtn" type="submit" value="Mark As Read" />
  </form>';
  }
	return $statusView;
}

function noScriptMsg($string) {
$allow = '<table> <tr> <td> <span> <sub> <sup> <li> <ol> <ul> <a> <br> <p> <h1> <h2> <h3> <h4> <h5> <h6> <strong> <hr> <div> <img>';	
$string = strip_tags($string, $allow);
$string = preg_replace('#(<[^>]+[\x00-\x20\"\'\/])(on|xmlns)[^>]*>#iUu', "$1>", $string);
return addslashes($string);
}


function getAttachmentLink($messageID, $fileID){
$siteQuery = mysql_query("SELECT * FROM projectfiles WHERE fileID = '$fileID'") or die(mysql_error());
while($row = mysql_fetch_assoc($siteQuery))
	  {
	  $fileID = intval($row['fileID']);
	  $fileName = strip_tags($row['fileName']);
	  return '<a href="../files/download.php?file='.$fileName.'">'.$fileName.'</a>';
	}

}



	
}
?>
