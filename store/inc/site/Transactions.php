<?php 
//userID
class Transactions
{

    public function getTransactionById($id) {
		$sql = mysql_query("SELECT * FROM transactions WHERE id = '$id' LIMIT 1")or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->id = $row['id'];
        $this->product_id_array = $row['product_id_array'];
        $this->payer_email = $row['payer_email'];
		$this->first_name = $row['first_name'];
		$this->last_name = $row['last_name'];
        $this->payment_date = $row['payment_date'];
        $this->mc_gross = $row['mc_gross'];
        $this->payment_currency = $row['payment_currency'];
		$this->txn_id = $row['txn_id'];
        $this->receiver_email = $row['receiver_email'];
        $this->payment_type = $row['payment_type'];
        $this->payment_status = $row['payment_status'];
        $this->txn_type = $row['txn_type'];
		$this->payer_status = $row['payer_status'];
        $this->address_street = $row['address_street'];
        $this->address_city = $row['address_city'];
        $this->address_state = $row['address_state'];
		$this->address_zip = $row['address_zip'];				
        $this->address_country = $row['address_country'];
        $this->address_status = $row['address_status'];
        return true;
    }

	public function getProductArray() {
        return strip_tags($this->product_id_array);
    }	

	public function getPayer_email() {
        return strip_tags($this->payer_email);
    }	




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ACTIVATE USERS
///////////////////////////////////////////////////////////////////////////////////////////////
//Check & Resend verification codes



function sendNewProductMail($email, $productID){
	$Encrypt = new Encryption();
	  $mail = new PHPMailer(true);
	  $mail->FromName = 'My Coin Organizer';
      $mail->From = 'noreply@mycoinorganizer.com';
	  $mail->AddReplyTo('noreply@lincolncents.comli.com', 'Admin');
	  $mail->Subject = 'New Products Listed';
	  $mail->AddAddress($email);
      $mail->isHTML(true);
	  $htmlBody = '<table width="100%" border="0">
		<tr>
		  <td width="42%"><img src="http://lincolncents.comli.com/img/mailLogo.jpg" width="207" height="113" /></td>
		  <td width="54%">&nbsp;</td>
		  <td width="4%">&nbsp;</td>
		</tr>
		<tr>
		  <td colspan="3">
		  <h1>Your New Coin Organizer Account</h1>
		  <p style="margin-bottom:3px;">Please go to the <b><a href="http://lincolncents.comli.com/activate.php?activateCode='.$Encrypt ->encode($userID).'">The Activation Page</a></b> and verify your account.</p>
		  </td>
		</tr>
		<tr style="background-color:#999999;">
			<td colspan="3" style="padding:10px;"><a style="text-decoration:none; color:#000000;" href="http://lincolncents.comli.com">My Coin Organizer</a></td>
		</tr>
	  </table>';
	  $mail->Body = $htmlBody;
	  $mail->Send();
}




//////////////////////////////////////////////////////////////////////////////////////////////////////////



}//End Class
?>
