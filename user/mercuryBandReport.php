<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
$coinCatLink = str_replace(' ', '_', $_GET["coinType"]);
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinType; ?> Full Band Report</title>
<script type="text/javascript">
$(document).ready(function(){
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


});
</script>
<style type="text/css">
#obvRev2 {width:270px; height:auto;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><?php echo $coinType; ?> Full Band Report</h1>
<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
  
  <hr />
  
  <table width="100%" border="0">
    <tr class="darker">
      <td width="75%"><h3>By Year  Designations</h3></td>
    <td width="25%" align="center">Full Bands</td>
    </tr>
<?php
$countAll = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' AND strike = 'Business' AND coinYear <= '".date('Y')."' ORDER BY coinYear DESC") or die(mysql_error());    
while($row = mysql_fetch_array($countAll))
	  {
		  $coin->getCoinById(intval($row['coinID']));
     echo '
    <tr class="gryHover">
      <td><a class="brownLink" href="viewMercuryBandReport.php?coinID='.intval($row['coinID']).'">'.$coin->getCoinName().'</a></td>
      <td align="center">'.$collection->getCoinDesignationCount($userID, $fullAtt='FB', intval($row['coinID'])).'</td>
    </tr> 
	 ';
	  }
?>    
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>