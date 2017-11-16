<?php 

class Subscription
{

    public function getSubscriptionById($subscriptionID) {
		$sql = mysql_query("SELECT * FROM subscription WHERE subscriptionID = '$subscriptionID' LIMIT 1")or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->userID = $row['userID'];
        $this->subscriptionID = $row['subscriptionID'];
		$this->payDate = $row['payDate'];
		$this->status = $row['status'];
        return true;
    }

	public function getUserID() {
        return strip_tags($this->userID);
    }
	public function getPayDate() {
        return strip_tags($this->payDate);
    }
	public function getStatus() {
        return strip_tags($this->status);
    }
	
	
public function activateSubscription($subscriptionID){
	$sql = mysql_query("UPDATE subscription SET status = '1' WHERE subscriptionID = '".$subscriptionID."' LIMIT 1")or die(mysql_error());
	if ($sql) {
		return true;
		} else {
	return false;
  }
}
public function deactivateSubscription($subscriptionID){
	$sql = mysql_query("UPDATE subscription SET status = '0' WHERE subscriptionID = '".$subscriptionID."' LIMIT 1")or die(mysql_error());
	if ($sql) {
		return true;
		} else {
	return false;
  }
}

public function sendNewSubscribeMail($userID, $email, $lastname, $firstname){
	  $mail = new PHPMailer(true);
	  $mail->FromName = 'Car Starter';
      $mail->From = 'noreply@http://mycoinorganizer.com';
	  $mail->AddReplyTo('noreply@http://mycoinorganizer.com', 'Admin');
	  $mail->Subject = 'Your Car Starter Installation Appointment';
	  $mail->AddAddress($email, $lastname.','.$firstname);
      $mail->isHTML(true);
	  $htmlBody = '<table width="100%" border="0">
		<tr>
		  <td width="42%"><img src="http://mycoinorganizer.com/img/mailLogo.jpg" width="207" height="113" /></td>
		  <td width="54%">&nbsp;</td>
		  <td width="4%">&nbsp;</td>
		</tr>
		<tr>
		  <td colspan="3">
		  <h1>Your Car Starter Installation Appointment</h1>
		  <p style="margin-bottom:3px;">Please go to the <b><a href="http://mycoinorganizer.com/login.php">The Login Page</a></b> to check your purchase details.</p>
		  </td>
		</tr>
		<tr style="background-color:#999999;">
			  <td colspan="3" style="padding:10px;"><a style="text-decoration:none; color:#000000;" href="carstart.net78.net">Car Start</a></td>
		</tr>
	  </table>';
	  $mail->Body = $htmlBody;
	  $mail->Send();
}

}
?>