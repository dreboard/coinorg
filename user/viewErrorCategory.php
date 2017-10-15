<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_GET["errorType"])) { 
$errorType = str_replace('_', ' ', $_GET["errorType"]);
$errorTypeImg = strip_tags($_GET["errorType"]);

$coinCategory = str_replace('_', ' ', $_GET["coinCategory"]);
$coinCategoryLink = $_GET["coinCategory"];
 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $errorType ?> List View</title>
<script type="text/javascript">
$(document).ready(function(){
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "asc" ]],
	"iDisplayLength": 50
} );


});
</script>
<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><?php echo $errorType ?> Coins</h1>
<table width="100%" border="0" class="reportListTbl">  
  <tr>
    <td width="16%" rowspan="3" valign="top"><img src="../img/<?php echo $errorTypeImg ?>.jpg" width="115" height="115" /></td>
    <td width="18%">Total Collected</td>
    <td width="66%"><?php echo $Errors->getErrorByNameByID($errorType, $userID); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table>
  
  <hr />
<table width="100%" border="0" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="74%"><strong>Year / Mint</strong></td>  
    <td width="13%" align="center"><strong>Type</strong></td>
    <td width="13%" align="right"><strong>Collected</strong></td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT DISTINCT coinID FROM collection WHERE errorType = '$errorType' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td>No '.$errorType.' Coins Collected</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  $coinCategory = $coin->getCoinCategory(); 
  $coinCategoryLink = str_replace(' ', '_', $coinCategory);
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoin.php?coinID='.$coinID.'">'.$coinName.'</a></td>
	<td align="center"><a href="viewErrorCategory.php?coinCategory='.$coinCategoryLink.'">'.$coinCategory.'</td>
	<td align="right">$'.$Errors->getErrorTypeSumByCategory($errorType, $coinCategory, $userID).'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

     
<tfoot>
  <tr class="darker">
    <td width="74%"><strong>Year / Mint</strong></td>  
    <td width="13%" align="center"><strong>Type</strong></td>
    <td width="13%" align="right"><strong>Collected</strong></td>
  </tr>
	</tfoot>
</table>
  <p>&nbsp;</p>
  <hr />
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>