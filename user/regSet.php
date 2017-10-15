<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

function getCoinIDSelects($coinID, $userID, $proService){
	$Collection = new Collection();
	$coin = new Coin();
	$sql = mysql_query("SELECT * FROM collection WHERE coinID = '".$coinID."' AND proService = '".$proService."' AND userID = '$userID' ORDER BY coinGradeNum ASC");
	$html = '<select name="collectionID">';
	if(mysql_num_rows($sql) == 0){
	  $html .= '<option value="">No '.$coin->getCoinName().' Graded</select>';
} else {
	  while($row = mysql_fetch_array($sql))
			{
				$collectionID = intval($row['collectionID']);
				$Collection->getCollectionById($collectionID);
		        $html .= '<option value="collectionID">'.$coin->getCoinName().' '.$Collection->getCoinGrade().'</select>';		  
			}	
		$html .= '</select>';	
       return $html;
	
}
}
$regLink = '';
$verifyLink = '';
if(isset($_GET["proService"])){
	$proService = strip_tags($_GET["proService"]);
	  switch ($proService)
		  {
		  case 'PCGS':
			$regLink = '<a href="regSetType.php?proService='.$proService.'" class="brownLinkBold">Create PCGS Set Registry</a>';
			$verifyLink = '<a href="http://www.pcgs.com/cert/" class="brownLinkBold">Cert Verification</a>';
			break;
		  case 'NGC':
			$regLink = '<a href="regSetType.php?proService='.$proService.'" class="brownLinkBold">Create NGC Bulk Import</a>';
			$verifyLink = '<a href="http://www.ngccoin.com/index.aspx" class="brownLinkBold">Cert Verification</a>';
			break;
		  case 'IGC':
			$regLink = '';
			$verifyLink = '<a href="http://www.icgcoin.com/" class="brownLinkBold">Cert Verification</a>';
			break;
		  case 'ANACS':
			$regLink = '';
			$verifyLink = '<a href="http://anacs.inetlogic.com/" class="brownLinkBold">Cert Verification</a>';
			break;						
          }	
	
	
	
	
}else {
	$coinType = "";

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	

});
</script> 
<style type="text/css">
#clientTbl_filter input {text-align:right; margin-right:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>My Set Registry List</h1>
<p><a href="regSetNew.php" class="brownLinkBold">Add New Set Registry</a></p>

  <hr />
<form action="" method="post" name="setRegForm" id="setRegForm">
<table width="100%" border="0" id="clientTbl" class="coinTbl">
  <tr class="darker">
    <td width="51%" height="24">Set Name</td>  
    <td width="10%" align="center">Category</td>
    <td width="14%" align="right">Coins</td>
  </tr>
<?php
$countAll = mysql_query("SELECT * FROM setreg WHERE userID = '$userID' ORDER BY setregName ASC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
    <tr>
    <td>No Saved Sets</td>
	<td></td>
	<td></td>	   
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $setregID = intval($row['setregID']);
  $SetRegistry->getSetRegById($setregID);
  echo '
    <tr>
    <td>'.$SetRegistry->getSetregName().'</td>
	<td align="center">'.$SetRegistry->getCoinType().'</td>
	<td align="center"></td>	   
  </tr>
  ';
	  }
}
?>

</table>
</form>
<br />
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>