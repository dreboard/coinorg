<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['rollMintID'])) { 
$rollMintID = intval($_GET['rollMintID']);
$CollectMintRolls->getMintRollById($rollMintID);
$coinType = $CollectMintRolls->getCoinType();
$rollName = $CollectMintRolls->getRollName();
$coinCategory = $CollectMintRolls->getCoinCategory();  
$versionLink = str_replace(' ', '_', $CollectMintRolls->getCoinVersion());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $rollName ?></title>
 <script type="text/javascript">
$(document).ready(function(){	

$('#rollListTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );
});
</script> 
<style type="text/css">
.tdHeight {padding:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<hr />

<h1><?php echo $rollName ?></h1>

<table width="930" id="viewTbl">
  <tr>
    <td width="120" rowspan="8" valign="top"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><img src="../img/<?php echo $versionLink ?>.jpg" width="100" height="100" alt="11" /></a></td>
<td width="120" class="tdHeight"><span class="darker">Coin: </span></td>
<td colspan="2" align="left" class="tdHeight"><a href="viewCoinDesign.php?design=<?php echo str_replace(' ', '_', $CollectMintRolls->getDesign()) ?>"><?php echo $CollectMintRolls->getDesign(); ?></a></td>
</tr>
<tr>
<td class="tdHeight"><strong>Collected:</strong></td>
<td width="116" align="right" class="tdHeight"><?php echo $collectionRolls->getMintRollIDCountByID($rollMintID, $userID); ?></td>
<td width="554" rowspan="7" valign="top">
  
</td>
  </tr>
<tr>
  <td class="tdHeight"><strong>Investment:</strong></td>
  <td align="right" class="tdHeight">$<?php echo $collectionRolls->getMintRollIDValByID($rollMintID, $userID); ?></td>
</tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" valign="top">&nbsp;</td>
    </tr>
</table>
<hr />

<h3> Rolls In Collection</h3>
<table width="100%" border="0" id="rollListTbl">
<thead class="darker">
  <tr>
    <td width="70%">Name</td>
    <td width="16%">Investment</td>
    <td width="14%">Date</td>
  </tr>
</thead>
<tbody>
<?php 
$countAll = mysql_query("SELECT * FROM collectrolls WHERE userID = '$userID' AND rollMintID = '$rollMintID'") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr class="gryHover">
		  <td>You dont have any Mint rolls In Your Collection</td> 
		  <td>&nbsp;</td><td>&nbsp;</td>
		  </tr>  ';
} else {
while($row = mysql_fetch_array($countAll))
  {
  $collectionRolls->getCollectionRollById(intval($row['collectrollsID']));
  $CollectMintRolls->getMintRollById(intval($row['rollMintID']));
  echo '
<tr class="gryHover">
<td><a href="viewMintRollDetail.php?ID='.$Encryption->encode($collectrollsID).'">'.strip_tags($row['rollNickname']).'</a></td>
<td>'.$collectionRolls->getCoinPrice().'</td>
<td>'.date("M j, Y",strtotime($collectionRolls->getCoinDate())).'</td>
</tr>  
  ';
  }
}
?>
</tbody>
<tfoot class="darker">
  <tr>
    <td width="70%">Name</td>
    <td width="16%">Investment</td>
    <td width="14%">Date</td>
  </tr>
</tfoot>
</table>



<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>