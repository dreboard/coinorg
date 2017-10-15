<?php 
class User
{

    public function getUserById($userID) {
		$sql = mysql_query("SELECT * FROM user WHERE userID = '$userID' LIMIT 1")or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->userID = $row['userID'];
        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
		$this->email = $row['email'];
		$this->userLevel = $row['userLevel'];
        $this->userDate = $row['userDate'];
		$this->viewLevel = $row['viewLevel'];
        $this->display_name = $row['lastname'] . ', ' .$row['firstname'];
        $this->status = $row['status'];
        $this->imageURL = $row['imageURL'];
        $this->active = $row['active'];
		$this->userType = $row['userType'];
		$this->newProduct = $row['newProduct'];
		$this->newsletter = $row['newsletter'];
		$this->pcgs = $row['pcgs'];
		$this->points = $row['points'];
		
        return true;
    }

	public function getPoints() {
        return strip_tags($this->points);
    }	
	public function getNewsletter() {
        return strip_tags($this->newsletter);
    }		
	public function getImageURL() {
        return strip_tags($this->imageURL);
    }		
	public function getNewProduct() {
        return strip_tags($this->newProduct);
    }	
	public function getUserID() {
        return strip_tags($this->userID);
    }		
	public function getActive() {
        return strip_tags($this->active);
    }	
	public function getUserDate() {
        return strip_tags($this->userDate);
    }
	public function getFirstname() {
        return strip_tags($this->firstname);
    }
    public function getLastname() {
        return strip_tags($this->lastname);
    }
	public function getEmail() {
        return strip_tags($this->email);
    }
    public function getDisplayName() {
        return strip_tags($this->display_name);
    }
	public function getUserLevel() {
        return strip_tags($this->userLevel);
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ACTIVATE USERS
///////////////////////////////////////////////////////////////////////////////////////////////
//Check & Resend verification codes

function sendCodeMail($email, $userID){
	$Encrypt = new Encryption();
	  $mail = new PHPMailer(true);
	  $mail->FromName = 'My Coin Organizer';
      $mail->From = 'noreply@mycoinorganizer.com';
	  $mail->AddReplyTo('noreply@mycoinorganizer.com', 'Admin');
	  $mail->Subject = 'Your Verification Code';
	  $mail->AddAddress($email);
      $mail->isHTML(true);
	  $htmlBody = '<table width="100%" border="0">
		<tr>
		  <td width="42%"><img src="http://mycoinorganizer.com/img/mailLogo.jpg" width="207" height="113" /></td>
		  <td width="54%">&nbsp;</td>
		  <td width="4%">&nbsp;</td>
		</tr>
		<tr>
		  <td colspan="3">
		  <h1>Your New Coin Organizer Account</h1>
		  <p style="margin-bottom:3px;">Please go to the <b><a href="http://mycoinorganizer.com/activate.php?activateCode='.$Encrypt ->encode($userID).'">The Activation Page</a></b> and verify your account.</p>
		  </td>
		</tr>
		<tr style="background-color:#999999;">
			<td colspan="3" style="padding:10px;"><a style="text-decoration:none; color:#000000;" href="http://mycoinorganizer.com">My Coin Organizer</a></td>
		</tr>
	  </table>';
	  $mail->Body = $htmlBody;
	  $mail->Send();
}

public function getActivationCode($email){
	$sql = mysql_query("SELECT * FROM user WHERE email = '$email' LIMIT 1")or die(mysql_error());
		if(mysql_num_rows($sql) == 0) {
			return false;
          } else {
			 while($row = mysql_fetch_array($sql))
				  {
				   $userID = strip_tags($row['userID']);
				   $this->sendCodeMail($email, $userID);				   
				  }
			  return true;
           }
		  
}

function activateUser($userID){	
	$sql = mysql_query("UPDATE user SET active = '1' WHERE userID = '".$userID."' LIMIT 1")or die(mysql_error());
	  if ($sql) {
		  $this->createUserFolder($userID);
	  return true;
	  } else {
		  return false;
}
}

function checkActivation($email){
	$sql = mysql_query("SELECT * FROM user WHERE email = '$email' LIMIT 1")or die(mysql_error());
    $row = mysql_fetch_array($sql);
	 if ($row['active'] = 1) {
	  return true;
	  } else {
		  return false;
}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//register users
	
function checkUsername($username){
	$sql = mysql_query("SELECT * FROM user WHERE username = '$username' LIMIT 1")or die(mysql_error());
	  if (mysql_num_rows($sql) > 0)
	  {
		   return true;
	  } else {
		  return false;
	  }
}

function checkEmail($email){
	$sql = mysql_query("SELECT * FROM user WHERE email = '$email' LIMIT 1")or die(mysql_error());
	  if (mysql_num_rows($sql) > 0)
	  {
		   return true;
	  } else {
		  return false;
	  }
}
function runRegFuncs($email, $username)
   {
    checkEmail($email);
    checkUsername($username); // run funciton5
   }


function sendWelcomeMail($userID, $email, $lastname, $firstname){
	  $Encrypt = new Encryption();
	  $mail = new PHPMailer(true);
	  $mail->FromName = 'My Coin Organizer';
      $mail->From = 'admin@mycoinorganizer.com';
	  $mail->AddReplyTo('admin@mycoinorganizer.com', 'Admin');
	  $mail->Subject = 'Your New Account';
	  $mail->AddAddress($email, $lastname.','.$firstname);
      $mail->isHTML(true);
	  $htmlBody = '<table width="100%" border="0">
		<tr>
		  <td width="42%"><img src="http://mycoinorganizer.com/images/mailLogo.jpg" width="207" height="113" /></td>
		  <td width="54%">&nbsp;</td>
		  <td width="4%">&nbsp;</td>
		</tr>
		<tr>
		  <td colspan="3">
		  <h1>Activate Your Account</h1>
		  <p style="margin-bottom:3px;">Please go to the <b><a href="http://mycoinorganizer.com/activate.php?activateCode='.$Encrypt ->encode($userID).'">The Activation Page</a></b> and verify your account.</p>
		  </td>
		</tr>
		<tr style="background-color:#999999;">
			  <td colspan="3" style="padding:10px;"><a style="text-decoration:none; color:#000000;" href="http://mycoinorganizer.com">My Coin Organizer</a></td>
		</tr>
	  </table>';
	  $mail->Body = $htmlBody;
	  $mail->Send();
}

///////Create User
//Make a folder
function createUserFolder($userID) {
		$folderName = "user/".$userID;
		if ( !file_exists($folderName) ) {
			mkdir($folderName, 0777);
			return true;
			} else {
				return false;
			}

    }	


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Editing users
    public function passwordUpdater($userID,$oldPassword, $newPassword){
		$sql = mysql_query("SELECT * FROM user WHERE userID = '$userID' AND password = '$oldPassword' LIMIT 1")or die(mysql_error());
	if(mysql_num_rows($sql)== 0){
	  return false;
	} else {
		$userQuery = mysql_query("UPDATE user SET password = '".sha1($newPassword)."' WHERE userID = '$userID' ")or die(mysql_error());
		return true;
	}
    }
	public function emailUpdater($userID,$mailPassword, $newEmail){
		$sql = mysql_query("SELECT * FROM user WHERE userID = '$userID' AND password = '$mailPassword' LIMIT 1")or die(mysql_error());
		  if(mysql_num_rows($sql)== 0){
			return false;
		  } else {
			  $userQuery = mysql_query("UPDATE user SET email = '$newEmail' WHERE userID = '$userID' ")or die(mysql_error());
			  return true;
		  }
    }
   public function privacyUpdater($userID, $password, $viewLevel){
		$sql = mysql_query("SELECT * FROM user WHERE userID = '$userID' AND password = '$mailPassword' LIMIT 1")or die(mysql_error());
	if(mysql_num_rows($sql)== 0){
	  return false;
	} else {
		$userQuery = mysql_query("UPDATE user SET viewLevel = '$viewLevel' WHERE userID = '$userID' ")or die(mysql_error());
		return true;
	}
    }
   public function mailDisplay($userID){
	   $Encryption = new Encryption();
	   $this->getUserById($userID);
		switch ($this->getPrivacyLevel()) {
			case 'private':
			return "";
			case 'public':
			return  '<a href="userMessage.php?ID='.$Encryption->encode($userID).'">Send Message</a>';
		}   

	}


//Delete user
function deleteUser($userID) {
	$collectionQuery = mysql_query("DELETE FROM collection WHERE userID = '$userID' ")or die(mysql_error());
	$collectbagsQuery = mysql_query("DELETE FROM collectbags WHERE userID = '$userID' ")or die(mysql_error());
	$collectboxesQuery = mysql_query("DELETE FROM collectboxes WHERE userID = '$userID' ")or die(mysql_error());
	$collectfolderQuery = mysql_query("DELETE FROM collectfolder WHERE userID = '$userID' ")or die(mysql_error());
	$collectsetQuery = mysql_query("DELETE FROM collectset WHERE userID = '$userID' ")or die(mysql_error());
	$userQuery = mysql_query("UPDATE user SET status = 'cancelled' WHERE userID = '$userID' ")or die(mysql_error());
	$this->deleteUserDir($userID);
    }	
	
function deleteUserDir($userID) {
	$dirPath = $userID.'/';
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException('$dirPath must be a directory');
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteUserDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//User Awards
/*	public function getAnswerAvatar($userID){
		$sql = mysql_query("SELECT DISTINCT question_id FROM forum_answer WHERE userID = '$userID'") or die(mysql_error()); 
		$answered = mysql_num_rows($sql); 
		switch ($answered) { 
	  //case $answered <= 199: 
	  case in_array($answered, range(0,199)):
		return '<img src="../img/Basic_User.jpg" title="Basic Forum User" align="absmiddle" />';
		break; 
	  //case $answered >= 200 and $answered <= 499:  
	  case in_array($answered, range(200,499)):
		return '<img src="../img/Advanced_User.jpg" title="Advanced Forum User" align="absmiddle" />';
		break; 
		case in_array($answered, range(500,6000)):
	  //case $answered >= 500: 
		return '<img src="../img/Master_User.jpg" title="Master Forum User" align="absmiddle" />';
		break; 
	  }
	}
*/		

	public function getAnswerAvatar($userID){
		$sql = mysql_query("SELECT DISTINCT question_id FROM forum_answer WHERE userID = '$userID'") or die(mysql_error()); 
		$answered = mysql_num_rows($sql); 
		  if($answered <= 199){ 
			return '<img src="../img/Basic_User.jpg" title="Basic Forum User" align="absmiddle" />';
		  } else if( $answered >= 200 and $answered <= 499){
			return '<img src="../img/Advanced_User.jpg" title="Advanced Forum User" align="absmiddle" />';
		  }else if($answered >= 500){ 
			return '<img src="../img/Master_User.jpg" title="Master Forum User" align="absmiddle" />';
			break; 
		  }
	}
	public function getAnswerLevel($userID){
		$sql = mysql_query("SELECT DISTINCT question_id FROM forum_answer WHERE userID = '$userID'") or die(mysql_error()); 
		$answered = mysql_num_rows($sql); 
		  if($answered <= 199){ 
			return 'Basic Forum User, Answered less than 200 forum questions';
		  } else if( $answered >= 200 and $answered <= 499){
			return 'Advanced Forum User, Answered less than 500 forum questions';
		  }else if($answered >= 500){ 
			return 'Master Forum User, Answered more than 500 forum questions';
			break; 
		  }
	}
public function getCollectionAvatar($userID){
		$sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE userID = '$userID'") or die(mysql_error()); 
		$collected = mysql_num_rows($sql); 
		if($collected <= 499){ 
		return '<img src="../img/Basic_Collector.jpg" title="Basic Collector" align="absmiddle" />';
		  }else if( $collected >= 500 and $collected <= 999){
			return '<img src="../img/Advanced_Collector.jpg" title="Advanced Collector" align="absmiddle" />';
		  }else if( $collected >= 1000){
			return '<img src="../img/Master_Collector.jpg" title="Master Collector" align="absmiddle" />';
		  }
	}
	public function getCollectionLevel($userID){
		$sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE userID = '$userID'") or die(mysql_error()); 
		$collected = mysql_num_rows($sql); 
		if($collected <= 499){ 
		return 'Basic Collector, less than 1000 distinct coins in your collection';
		  }else if( $collected >= 500 and $collected <= 999){
			return 'Advanced Collector, less than 1000 distinct coins in your collection';
		  }else if( $collected >= 1000){
			return 'Master Collector, more than 1000 distinct coins in your collection';
		  }
	}
public function getInvestmentAvatar($userID){
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE  userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			if($coinSum <= '999.00'){ 
			return '<img src="../img/Basic_Investment.jpg" title="Basic Investor" align="absmiddle" />';
		  }else if( $coinSum >= '1000.00' and $coinSum <= '9999.00'){
			return '<img src="../img/Advanced_Investment.jpg" title="Advanced Investor" align="absmiddle" />';
		  }else if( $coinSum >= '10000.00'){
			return '<img src="../img/Master_Investment.jpg" title="Master Investor" align="absmiddle" />';
		  }
		}
}
public function getInvestmentLevel($userID){
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE  userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
		if($coinSum <= '999.00'){ 
		return 'Basic Investor, less than $1000 spent on coin collection';
	  }else if( $coinSum >= '1000.00' and $coinSum <= '9999.00'){
		return 'Advanced Investor, less than $10,000 spent on coin collection';
	  }else if( $coinSum >= '10000.00'){
		return 'Master Investor, more than $10,000 spent on coin collection';
	  }
	}
}
public function getQualityAvatar($userID){
		$sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE userID = '$userID'") or die(mysql_error()); 
		$collected = mysql_num_rows($sql); 
		if($collected <= 499){ 
		return '<img src="../img/Basic_Collector.jpg" title="Basic Collector" align="absmiddle" />';
	  }else if( $collected >= 500 and $collected <= 999){
		return '<img src="../img/Advanced_Collector.jpg" title="Advanced Collector" align="absmiddle" />';
	  }else if( $collected >= 1000){
		return '<img src="../img/Master_Collector.jpg" title="Master Collector" align="absmiddle" />';
	  }
	}

	function setUserViewNumber($usersID, $userID){
		$this->getUserById($userID);
		if($this->getUserID() == $usersID){
			return false;
		} else {
			$sql = mysql_query("UPDATE user SET pageViews = pageViews + 1 WHERE userID = '$userID'") or die(mysql_error()); 
		return true;
		}
	}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//USER SEARCH

    public function getUserIDByUsername($userName){
		$sql = mysql_query("SELECT * FROM user WHERE userName = '$userName' LIMIT 1")or die(mysql_error());
	if(mysql_num_rows($sql)== 0){
	  return false;
	   } else {
		 while($row = mysql_fetch_array($sql))
			  {
		       return intval($row['userID']);;
	          }
          }
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//USER SEARCH

	public function getUserCount($month, $year, $userLevel) {
	$sql = mysql_query("SELECT * FROM user WHERE userLevel = '$userLevel'") or die(mysql_error());
	return mysql_num_rows($sql);
    }
	public function getNewUserCount($month, $year, $userLevel) {
	$sql = mysql_query("SELECT * FROM user WHERE MONTH(userDate) = '$month' AND YEAR(userDate) = '$year' AND userLevel = '$userLevel'") or die(mysql_error());
	return mysql_num_rows($sql);
    }







}//End Class
?>
