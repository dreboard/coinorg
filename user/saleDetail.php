<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

$saleMsg = '';

if (isset($_GET['sellListID'])) { 
$sellListID = intval($_GET['sellListID']);

$coinQuery = mysql_query("SELECT * FROM selllist WHERE sellListID = '$sellListID'") or die(mysql_error());
while($row = mysql_fetch_array($coinQuery))
  {
  $sellListID = $row['sellListID'];
  $sellTitle = $row['sellTitle'];
  $listDate = $row['listDate'];
  $listPrice = $row['listPrice'];  
  $coinGrade = $row['coinGrade'];  
  $proService = $row['proService']; 
  $sellDetails = $row['sellDetails']; 
  $coinCategory = $row['coinCategory'];
  $coinType = $row['coinType'];
  $coinPic1 = $row['coinPic1'];
  $coinLink = str_replace(' ', '_', $coinType);
  $catLink = str_replace(' ', '_', $coinCategory);
  $shipPrice = $row['shipPrice'];
}
}

//Delete coin
if (isset($_POST["makeOfferBtn"])) { 
$saleOffer = mysql_real_escape_string($_POST["saleOffer"]);
$sellListID = mysql_real_escape_string($_POST["sellListID"]);

$SellList->getSellItemById($sellListID);
$Seller = new User(); 
$Seller->getUserById($SellList->getSeller());
$email = $Seller->getEmail();

mysql_query("INSERT INTO saleOffers(sellListID, saleOffer, saleOfferDate, userID) VALUES('$sellListID', '$saleOffer', '".date('Y-m-d H:i:s')."', '$userID')") or die(mysql_error()); 
$saleOfferID = mysql_insert_id();

	  //$mail = new PHPMailer(true);
	  $mail->FromName = 'My Coin Organizer';
      $mail->From = 'admin@mycoinorganizer.com';
	  $mail->AddReplyTo('admin@mycoinorganizer.com', 'Admin');
	  $mail->Subject = 'You have an offer';
	  $mail->AddAddress($email, $Seller->getLastname().','.$Seller->getFirstname());
      $mail->isHTML(true);
	  $htmlBody = '<table width="100%" border="0">
		<tr>
		  <td width="42%"><img src="http://mycoinorganizer.com/img/mailLogo.jpg" width="207" height="113" /></td>
		  <td width="54%">&nbsp;</td>
		  <td width="4%">&nbsp;</td>
		</tr>
		<tr>
		  <td colspan="3">
		  <h1>You Have A Sale Offer</h1>
		  <p style="margin-bottom:3px;">Someone has made an offer on your listing <b>'.$SellList->getSellTitle().'</b>.  <a href="http://mycoinorganizer.com/login.php">Login to your account</a> to review the details.</p>
		  </td>
		</tr>
		<tr style="background-color:#999999;">
			  <td colspan="3" style="padding:10px;"><a style="text-decoration:none; color:#000000;" href="mycoinorganizer.com">My Coin Organizer</a></td>
		</tr>
	  </table>';
	  $mail->Body = $htmlBody;
	  $mail->Send();

$saleMsg = 'Your offer has been processed';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>View Item Detail</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#collectTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );
});
</script> 
<style type="text/css">
.tdHeight {padding:0px;}
.topImg {width:200px; height:auto;}
.descImg {
  width: 50%;
  max-width: 460px;
  height: auto;
}
.listingImg {width:58px; height:auto;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<hr />

<h1><?php echo $sellTitle; ?></h1>
<span><?php echo $saleMsg; ?></span>
<table width="930" id="viewTbl">
  <tr>
    <td width="212" rowspan="11" valign="top"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><img src="<?php echo $coinPic1; ?>" class="topImg" /></a></td>
    <td class="tdHeight"><strong>Category:</strong></td>
    <td class="tdHeight"><a href="auctionCategory.php?coinCategory=<?php echo $catLink ?>"><?php echo $coinCategory ?></a></td>
    <td></td>
  </tr>
  <tr>
    <td width="203" class="tdHeight"><span class="darker">Type: </span></td>
<td width="478" class="tdHeight"><a href="<?php echo $coinLink ?>.php"><?php echo $coinType ?></a></td>
<td width="17"></td>
</tr>
  <tr>
    <td class="tdHeight"><strong>Grade:</strong></td>
    <td class="tdHeight"><?php echo $coinGrade ?></td>
    <td></td>
  </tr>
  <tr>
    <td class="tdHeight"><strong>Grading Service:</strong></td>
    <td class="tdHeight"><?php echo $proService ?></td>
    <td></td>
  </tr>
<tr>
<td class="tdHeight"><span class="darker">List Date: </span></td>
<td class="tdHeight"><?php echo date("F j, Y",strtotime($listDate)); ?></td>
<td rowspan="7" valign="top">
  
</td>
  </tr>
<tr>
  <td class="tdHeight"><strong>List Price:</strong></td>
  <td class="tdHeight">$<?php echo $listPrice; ?></td>
</tr>
  <tr>
    <td><strong>Shipping</strong></td>
    <td>$<?php echo $shipPrice; ?></td>
    </tr>
  <tr>
    <td colspan="2"><form action="" method="post" name="makeOfferForm" id="makeOfferForm" class="compactForm"><input name="saleOffer" id="saleOffer" type="text" value="" />
      <input name="sellListID" type="hidden" value="<?php echo $sellListID ?>" />
      <input name="makeOfferBtn" id="makeOfferBtn" type="submit" value="Make An Offer" />
</form></td>
    </tr>
  <tr>
    <td colspan="2" valign="top">&nbsp;</td>
    </tr>
</table>
<hr />
<h3> Details</h3>
<div><?php echo $sellDetails ?></div>
<br />
<img src="<?php echo $coinPic1; ?>" class="descImg" />
<hr />
<h3>Other <?php echo $coinType ?> Coins For Sale</h3>

<table width="100%" border="0">
  <tr class="darker">
    <td width="55%">Coin</td>
    <td width="11%">Grade</td>   
        <td width="10%">Grader</td>  
    <td width="13%">Sale Price</td>

  </tr>
<?php 
$coinQuery2 = mysql_query("SELECT * FROM selllist WHERE coinType = '$coinType' AND sellStatus = 'Active' ORDER BY sellListID DESC") or die(mysql_error());

if(mysql_num_rows($coinQuery2) == 0){
	  echo '
		  <tr>
		  <td colspan="5">There are no '.$coinType.' coins currently for sale.</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($coinQuery2))
  {
  $coinType = $row['coinType'];
  $thumb = '<img src="'.$row['coinPic1'].'" class="listingImg" />';
  $sellListID = intval($row['sellListID']); 
  $sellTitle = $row['sellTitle']; 
  $listDate = date("F j, Y",strtotime($row["listDate"]));
  $coinGrade = $row['coinGrade']; 
  $listPrice = $row['listPrice'];  
  $proService = $row['proService'];  
  $coinPic1 = $row['coinPic1'];
  echo '
<tr>
<td valign="top">'.$thumb.' '.$sellTitle.'</td> 
<td>'.$coinGrade.'</td>
<td>'.$proService.'</td>
<td>'.$listPrice.'</td>
</tr>  
  ';
  }
}
?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<p>
<a href="subCollect.php?collectionID=<?php echo $collectionID ?>">Add To a Collection</a> | <a href="sellList.php?collectionID=<?php echo $collectionID ?>">Add to Sell List</a></p>


<p><a href="addCoinType.php?coinType=<?php echo $coinLink ?>">Add Another <?php echo $coinType ?></a></p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>