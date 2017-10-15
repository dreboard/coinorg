<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";

if (isset($_POST["certRemoveBtn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["certCoinID"]));
mysql_query("UPDATE collection SET certlist = '0' WHERE collectionID = '$collectionID' AND userID = '$userID' ") or die(mysql_error());
$_SESSION['message'] = '<span class="greenLink">Coin Removed And List Updated</span>';
header('Location: certList.php');
exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Coins To Be Certified</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );

$('#certWhen, #certWhere').hide();

$("#certLink1").click(function() {
	$("#certWhen").show();
	$(".certLists").not("#certWhen").hide();
});
$("#certLink2").click(function() {
	$("#certWhere").show();
	$(".certLists").not("#certWhere").hide();
});
});
</script> 
<style type="text/css">


</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>Coins To Be Certified</h1>
<table width="100%" border="0">
  <tr>
    <td width="11%"><strong>Total Coins</strong></td>
    <td width="47%"><?php echo $CertList->getUserIDCertListCount($userID); ?></td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
  </tr>
</table>
  <span class="greenTxt"><?php echo $_SESSION['message'] ?></span>
  <p> <span class="brownLinkBold" id="certLink1">When to certify your coin</span> | <span class="brownLinkBold" id="certLink2">Where To Certify Coins</span></p>
<ul id="certWhen" class="certLists">
  <li>You will gain monetarily from having the coin graded. </li>
  <li>The coin needs to be authenticated. ie 1916-D dimes or 1909-S VDB Lincolns.  </li>
  <li>The coin needs to be attributed. ie Double Die, RPM.</li>
  <li>Because you want a certified coin.</li>
</ul>
<ul id="certWhere" class="certLists">
  <li>NGC.</li>
  <li>ANACS.</li>
  <li>ICG.</li>
</ul>
<hr />
<table width="100%" border="0">
  <tr>
    <td width="25%" align="center"><strong>PCGS</strong></td>
    <td width="25%" align="center"><strong>NGC</strong></td>
    <td width="25" align="center"><strong>ANACS</strong></td>
    <td width="25%" align="center"><strong>ICG</strong></td>
  </tr>
  <tr>
    <td align="center"><?php echo $CertList->getUserIDServiceCertListCount($userID, $certlistService='PCGS'); ?></td>
    <td align="center"><?php echo $CertList->getUserIDServiceCertListCount($userID, $certlistService='NGC'); ?></td>
    <td align="center"><?php echo $CertList->getUserIDServiceCertListCount($userID, $certlistService='ANACS'); ?></td>
    <td align="center"><?php echo $CertList->getUserIDServiceCertListCount($userID, $certlistService='ICG'); ?></td>
  </tr>
</table>

<br />

<table width="100%" border="0" id="clientTbl">
  <thead class="darker">
  <tr>
    <td width="54%">Year / Mint</td>
    <td width="14%" align="center">Service</td>  
    <td width="21%" align="center">Added</td>
    <td width="11%" align="center">&nbsp;</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM collection WHERE certlist = '1' AND userID = '$userID' ORDER BY denomination DESC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td width="57%"><a href="addCoinByID.php?coinID='.$coinID.'"><strong>No '.$coinName.' Collected</strong></a></td>
		  <td width="11%" align="center">&nbsp;</td>  
		  <td width="14%" align="center">&nbsp;</td>
		  <td width="18%" align="center">&nbsp;</td>
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {
		  $collection->getCollectionById(intval($row['collectionID']));    
		  $coin-> getCoinById(intval($row['coinID']));
		  $collectionFolder->getCollectionFolderById(intval($row['collectfolderID']));
		   
		if(intval($row['collectfolderID']) == '0' && intval($row['collectrollsID']) == '0' && $collection->getGrader() == 'None' && intval($row['collectsetID']) == '0') {
			$coinIcon = '<img align="absbottom" src="../img/'.str_replace(' ', '_', $coin->getCoinVersion()).'.jpg" width="20" height="20" />&nbsp;';
		}
		else if($collection->getGrader() != 'None') {
			$coinIcon = '<img align="absbottom" src="../img/graded.jpg" width="20" height="20" /> ';
		}
		else if(intval($row['collectfolderID']) != '0') {
			
			$coinIcon = '<a href="viewFolderDetail.php?ID='.$Encryption->encode(intval($row['collectfolderID'])).'" title="'.$collectionFolder->getFolderNickname().'"><img align="absbottom" src="../img/Folder3.jpg" width="20" height="20" /></a> ';
		}
		else if(intval($row['collectrollsID']) != '0') {
			$collectionRolls->getCollectionRollById(intval($row['collectrollsID']));
		   $coinIcon = $collectionRolls->getRollTypeIconLink(intval($row['collectrollsID']));
		}
		else if(intval($row['collectsetID']) != '0') {
			$CollectionSet->getCollectionSetById(intval($row['collectsetID']));
		   $coinIcon = '<a href="viewSetDetail.php?ID='.$Encryption->encode(intval($row['collectsetID'])).'" title="'.$CollectionSet->getSetNickname().'"><img align="absbottom" src="../img/SetIcon.jpg" width="20" height="20" /></a> ';
		}
		else { 
		   $coinIcon = '<img align="absbottom" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
		}
  
  echo '
    <tr class="gryHover" align="center">
    <td align="left">'.$coinIcon.'<a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.$coin->getCoinName().' '.$coin->getCoinType().'</a></td>
	<td>'. $collection->getCertlistService() .'</td>
		<td>'.date("M j, Y",strtotime($collection->getCertlistDate())) .'</td>
	<td><form action="" method="post" class="compactForm">
	  <input name="certCoinID" type="hidden" value="'.$Encryption->encode(intval($row['collectionID'])).'" />
	  <input name="certRemoveBtn" type="submit" value="Remove" onclick="return confirm(\'Remove From List?\')" />
	  </form></td>	   
  </tr>
  ';
	  }
}
?>
</tbody>
<tfoot class="darker">
  <tr>
    <td width="54%">Year / Mint</td>
    <td width="14%" align="center">Service</td>  
    <td width="21%" align="center">Added</td>
    <td width="11%" align="center">&nbsp;</td>
  </tr>
	</tfoot>
</table>

<br />

<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>