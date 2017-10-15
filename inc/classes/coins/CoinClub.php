<?php 
//getRollHolderNumber

class CoinClub {

    public function getClubById($coinClubID) {
        $sql = 'SELECT * FROM coinclub WHERE coinClubID = ' . $coinClubID;
        $results = mysql_query($sql);
        $row = mysql_fetch_array($results);
        $this->coinClubID = $row['coinClubID'];
        $this->clubName = $row['clubName'];
        $this->clubAddress = $row['clubAddress'];
		$this->clubCity = $row['clubCity'];
		$this->clubState = $row['clubState'];		
		$this->clubZip = $row['clubZip'];
        $this->clubPhone = $row['clubPhone'];
        $this->clubEmail = $row['clubEmail'];
        $this->clubWebsite = $row['clubWebsite'];
		$this->clubDescription = $row['clubDescription'];
		$this->enterDate = $row['enterDate'];		
        $this->userID = $row['userID'];
		$this->clubType = $row['clubType'];
		$this->clubLevel = $row['clubLevel'];
		$this->youtube = $row['youtube'];
		$this->facebook = $row['facebook'];
		$this->ebayID = $row['ebayID'];	
        return true;
    }

	public function getFacebook() {
        return strip_tags($this->facebook);
    }	
	public function getEbayID() {
        return strip_tags($this->ebayID);
    }		
	public function getChannel() {
        return strip_tags($this->youtube);
    }
	public function getClubLevel() {
        return strip_tags($this->clubLevel);
    }	
	public function getClubName() {
        return strip_tags($this->clubName);
    }	
	public function getClubAddress() {
        return strip_tags($this->clubAddress);
    }
	public function getClubCity() {
        return strip_tags($this->clubCity);
    }
	public function getClubState() {
        return strip_tags($this->clubState);
    }	
	public function getClubZip() {
        return strip_tags($this->clubZip);
    }
	public function getClubPhone() {
        return strip_tags($this->clubPhone);
    }	
	public function getClubEmail() {
        return strip_tags($this->clubEmail);
    }
	public function getClubWebsite() {
        return strip_tags($this->clubWebsite);
    }	
	public function getClubDescription() {
        return strip_tags($this->clubDescription);
    }	
	public function getClubDate() {
        return strip_tags($this->enterDate);
    }	
	public function getClubAdmin() {
        return strip_tags($this->userID);
    }
	public function getClubType() {
        return strip_tags($this->clubType);
    }
	
    public function getClubMemberById($coinClubID, $clubmember) {
        $sql = mysql_query("SELECT * FROM clubmembers WHERE coinClubID = '$coinClubID' AND userID = '$clubmember'") or die(mysql_error()); 
        $row = mysql_fetch_array($sql);
        $this->membersClubID = $row['coinClubID'];
        $this->clubmemberID = $row['clubmemberID'];
        $this->clubMember = $row['userID'];
		$this->clubPosition = $row['clubPosition'];
		$this->joinDate = $row['joinDate'];		
        return true;
    }
	public function getClubMembers() {
        return strip_tags($this->clubmemberID);
    }	
	public function getMembersClub() {
        return strip_tags($this->membersClubID);
    }	
	public function getJoinDate() {
        return strip_tags($this->joinDate);
    }

    public function getMemberCount($coinClubID) {
		$sql = mysql_query("SELECT * FROM clubmembers WHERE coinClubID = '$coinClubID'") or die(mysql_error()); 
        return mysql_num_rows($sql);    	
    }

    public function getClubManageUserNamer($coinClubID) {
		$sql = mysql_query("SELECT * FROM user WHERE userID = '".$this->getClubAdmin()."'") or die(mysql_error()); 
		$GetMember = new User();
		$GetMember->getUserById($this->getClubAdmin());
        return $GetMember->getUserName();
    }

/*    public function getClubManager($clubmember) {
		$sql = mysql_query("SELECT * FROM user WHERE userID = '$clubmember'") or die(mysql_error()); 
		$GetMember = new User();
		$GetMember->getUserById($clubmember);
        return $GetMember->getUserName();
    }*/
	
	//????????????????????????????????????????????????????????????????????????????
    public function getClubMemberUserName($clubmember) {
		$sql = mysql_query("SELECT * FROM user WHERE userID = '$clubmember'") or die(mysql_error()); 
		$GetMember = new User();
		$GetMember->getUserById($clubmember);
        return $GetMember->getUserName();
    }
function getManagerLinks($userID, $clubManager, $coinClubID){
	
		if($userID === $this->getClubAdmin()){
		$mailLink = ' | <a href="mailUsers.php?coinClubID='.$coinClubID.'">Send Message</a>';
	}
}	


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///CLUB ADMIN


    public function getPendingCount() {
		$sql = mysql_query("SELECT * FROM coinclub WHERE approval = '0'") or die(mysql_error()); 
        return mysql_num_rows($sql);    	
    }
//Club approval
    public function approveClub($coinClubID, $approval) {
		$sql = mysql_query("UPDATE coinclub SET approval = '$approval' WHERE coinClubID = '$coinClubID'") or die(mysql_error()); 
		if($sql){
		$this->createClubFolder($coinClubID);
		return; 
		 } else {
        return false;    	
            }
	}

///////////////////////////////////////////
//IMAGES

    public function createClubFolder($coinClubID) {
		$folderName = "../album/".$coinClubID;
		if ( !file_exists($folderName) ) {
			mkdir($folderName, 0777);
			return true;
			} else {
				return false;
			}

    }	
    public function deleteClubFolder($coinClubID) {
		$dirPath = "../clubs/".$coinClubID;
		if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
			$dirPath .= '/';
		}
		$files = glob($dirPath . '*', GLOB_MARK);
		foreach ($files as $file) {
			if (is_dir($file)) {
				self::deleteClubFolder($file);
			} else {
				unlink($file);
			}
		}
		rmdir($dirPath);
	}		
	
public function deleteImg($galleryID) {
	$this->getGalleryByID($galleryID);
	if(unlink($this->getImgURL())){
    $sql = mysql_query("DELETE FROM gallery WHERE galleryID = '$galleryID'");
	}
	 return;
}


function createGallery($coinClubID) {
	
		$folderName = "../clubs/".$coinClubID."/";
		if ( !file_exists($folderName) ) {
			mkdir($folderName, 0777);
			$this->createEventThumbFolder($userID);
			return true;
			} else {
				return false;
			}

    }		
	
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//CLUB MANAGEMENT

/*
Active 
Pending
Removed
*/
    public function removeUser($coinClubID, $status) {
		$sql = mysql_query("UPDATE clubmembers SET status = '$status' WHERE coinClubID = '$coinClubID' AND userID = '$userID'") or die(mysql_error()); 
		return; 
	}
//Mailing news
function generateNewsMail($email, $lastname, $firstname, $coinClubID, $newsSubject, $newsDescription){
	  $mail = new PHPMailer(true);
	  $this->getClubById($coinClubID);
	  $mail->FromName = $this->getClubName();
      $mail->From = $this->getClubEmail();
	  $mail->AddReplyTo($this->getClubEmail(), 'Club');
	  $mail->Subject = $newsSubject;
	  $mail->AddAddress($email, $lastname.','.$firstname);
      $mail->isHTML(true);
	  $htmlBody = '<table width="100%" border="0">
		<tr>
		  <td width="42%"><img src="http://mycoinorganizer.com.com/img/mailLogo.jpg" width="207" height="113" /></td>
		  <td width="54%">&nbsp;</td>
		  <td width="4%">&nbsp;</td>
		</tr>
		<tr>
		  <td colspan="3">
		  <h1>'.$newsSubject.'</h1>
		  <p style="margin-bottom:3px;">'.$newsDescription.'</p>
		  </td>
		</tr>
		<tr style="background-color:#999999;">
			  <td colspan="3" style="padding:10px;">Please go to the <b><a href="http://mycoinorganizer.com/login.php">The Login Page</a></b> to check your club details.</td>
		</tr>
	  </table>';
	  $mail->Body = $htmlBody;
	  $mail->Send();
}


function getMailUsersUser($coinClubID, $newsSubject, $newsDescription){
	$User = new User();
	$sql = mysql_query("SELECT * FROM clubmembers WHERE coinClubID = '$coinClubID' ")or die(mysql_error());
	  while($row = mysql_fetch_array($sql))
			  {
				$User->getUserByIdintval($row['userID']);
				$this->generateNewsMail($email=$User->getEmail(), $lastname=$User->getLastname(), $firstname=$User->getFirstname(), $coinClubID, $newsSubject, $newsDescription);
			  }
			  return;	
}	
	
	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Editing clubs
    public function passwordUpdater($userID,$oldPassword, $newPassword){
		$sql = mysql_query("SELECT * FROM user WHERE userID = '$userID' AND password = '$oldPassword' LIMIT 1")or die(mysql_error());
	if(mysql_num_rows($sql)== 0){
	  return false;
	} else {
		$userQuery = mysql_query("UPDATE coinclub SET password = '".sha1($newPassword)."' WHERE userID = '$userID' ")or die(mysql_error());
		return true;
	}
    }
	public function emailUpdater($userID,$mailPassword, $newEmail){
		$sql = mysql_query("SELECT * FROM user WHERE userID = '$userID' AND password = '$mailPassword' LIMIT 1")or die(mysql_error());
		  if(mysql_num_rows($sql)== 0){
			return false;
		  } else {
			  $userQuery = mysql_query("UPDATE coinclub SET email = '$newEmail' WHERE userID = '$userID' ")or die(mysql_error());
			  return true;
		  }
    }
   public function privacyUpdater($userID, $password, $viewLevel){
		$sql = mysql_query("SELECT * FROM user WHERE userID = '$userID' AND password = '$mailPassword' LIMIT 1")or die(mysql_error());
	if(mysql_num_rows($sql)== 0){
	  return false;
	} else {
		$userQuery = mysql_query("UPDATE coinclub SET viewLevel = '$viewLevel' WHERE userID = '$userID' ")or die(mysql_error());
		return true;
	}
    }	
	
}//END CLASS
?>