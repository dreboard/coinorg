<?php 
//getRollHolderNumber

class Dealer {

    public function getClubById($dealerID) {
        $sql = 'SELECT * FROM dealer WHERE dealerID = ' . $dealerID;
        $results = mysql_query($sql);
        $row = mysql_fetch_array($results);
        $this->dealerID = $row['dealerID'];
        $this->dealerName = $row['dealerName'];
        $this->dealerAddress = $row['dealerAddress'];
		$this->dealerCity = $row['dealerCity'];
		$this->dealerState = $row['dealerState'];		
		$this->dealerZip = $row['dealerZip'];
        $this->dealerPhone = $row['dealerPhone'];
        $this->dealerEmail = $row['dealerEmail'];
        $this->dealerWebsite = $row['dealerWebsite'];
		$this->clubDescription = $row['clubDescription'];
		$this->enterDate = $row['enterDate'];		
        $this->userID = $row['userID'];
		$this->ana = $row['ana'];
		$this->png = $row['png'];
		$this->youtube = $row['youtube'];
		$this->facebook = $row['facebook'];
		$this->ebayID = $row['ebayID'];	
        return true;
    }

	public function getDealerID() {
        return strip_tags($this->dealerID);
    }	
	public function getDealerName() {
        return strip_tags($this->dealerName);
    }		
	public function getDealerAddress() {
        return strip_tags($this->dealerAddress);
    }
	public function getDealerCity() {
        return strip_tags($this->dealerCity);
    }	
	public function getDealerState() {
        return strip_tags($this->dealerState);
    }	
	public function getDealerZip() {
        return strip_tags($this->dealerZip);
    }
	public function getDealerPhone() {
        return strip_tags($this->dealerPhone);
    }
	public function getDealerWebsite() {
        return strip_tags($this->dealerWebsite);
    }	
	public function getDealerDescription() {
        return strip_tags($this->dealerDescription);
    }
	public function getAna() {
        return strip_tags($this->ana);
    }	
	public function getPng() {
        return strip_tags($this->png);
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
public function getManagerLinks($userID, $clubManager, $coinClubID){
	
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


public function createGallery($coinClubID) {
	
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
public function generateNewsMail($email, $lastname, $firstname, $coinClubID, $newsSubject, $newsDescription){
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


public function getMailUsersUser($coinClubID, $newsSubject, $newsDescription){
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