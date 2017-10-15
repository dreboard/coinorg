<?php 
include '../inc/config.php';

	  //$mail = new PHPMailer(true);
	  $mail->FromName = 'My Coin Organizer';
      $mail->From = 'noreply@mycoinorganizer.com';
	  $mail->AddReplyTo('noreply@mycoinorganizer.com', 'Admin');
	  $mail->Subject = 'New User Report';
	  $mail->AddAddress('admin@mycoinorganizer.com');
      $mail->isHTML(true);
	  $htmlBody = '<table width="100%" border="0">
		<tr>
		  <td width="42%"><img src="http://mycoinorganizer.com/img/logo.jpg" /></td>
		  <td width="54%">&nbsp;</td>
		  <td width="4%">&nbsp;</td>
		</tr>
		<tr>
		  <td colspan="3">
		  <h3>Admin Reports for '.date('F-d-Y',strtotime("-1 days")).'</h3>
		  <p style="margin-bottom:3px;">';
		    $sql = mysql_query("SELECT * FROM user WHERE userDate = DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY)");
		  	//$sql = mysql_query("SELECT * FROM user WHERE MONTH(userDate) = ".date('m')." AND DAY(userDate) = ".date('d')." AND YEAR(userDate) = ".date('Y')."  ")or die(mysql_error());
			if(mysql_num_rows($sql) == 0) {
					$htmlBody .=  'No users joined '.date('F d Y',strtotime("-1 days"));
					  } else {
						$htmlBody .= mysql_num_rows($sql).' users joined today';  
			}
		  $htmlBody .='</p>
		  </td>
		</tr>
		<td colspan="3">
		  <p style="margin-bottom:3px;">';
		    $sql = mysql_query("SELECT * FROM forum_question WHERE datetime = DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY)");
			if(mysql_num_rows($sql) == 0) {
					$htmlBody .=  'No new posts for '.date('F d Y',strtotime("-1 days"));
					  } else {
						$htmlBody .= mysql_num_rows($sql).' forum posts';  
			}
		  $htmlBody .='</p>
		  </td>
		</tr>
		<tr style="background-color:#999999;">
			<td colspan="3" style="padding:10px;"><a style="text-decoration:none; color:#000000;" href="http://mycoinorganizer.com">My Coin Organizer</a></td>
		</tr>
	  </table>';
	  $mail->Body = $htmlBody;
	  $mail->Send();


?>