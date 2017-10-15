<?php 
include '../inc/config.php';
include "../inc/logCheck.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" type="text/css" />
<script type="text/javascript" src="../scripts/main.js"></script>
<script type="text/javascript" src="../scripts/DataTables-1.8.2/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="../scripts/DataTables-1.8.2/media/css/demo_table.css"/>
<title>My Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">
.folderPic {width:150px; height:auto;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>My Coin Albums</h1>

<table width="100%" border="0">
  <tr>
    <td><a href="viewCoinCatFolder.php?coinCategory=Half_Cent&page=1"><img class="folderPic" src="../img/HalfCentFolder.jpg" /></a></td>
    <td><a href="viewCoinCatFolder.php?coinCategory=Large_Cent&page=1"><img class="folderPic" src="../img/Large_CentFolder.jpg"  /></a></td>
    <td><a href="viewCoinCatFolder.php?coinCategory=Small_Cent&page=1"><img src="../img/SmallCentFolder.jpg" width="230" height="332" class="folderPic" /></a></td>
    <td><a href="viewCoinCatFolder.php?coinCategory=Two_Cent&page=1"><img class="folderPic" src="../img/TwoCentFolder.jpg" /></a></td>
    <td><a href="viewCoinCatFolder.php?coinCategory=Three_Cent&page=1"><img class="folderPic" src="../img/ThreeCentFolder.jpg"  /></a></td>
  </tr>
  <tr>
    <td><a href="viewCoinCatFolder.php?coinCategory=Half_Dime&page=1"><img class="folderPic" src="../img/HalfDimeFolder.jpg" /></a></td>
    <td><a href="viewCoinCatFolder.php?coinCategory=Nickel&page=1"><img class="folderPic" src="../img/NickelFolder.jpg"  /></a></td>
    <td><a href="viewCoinCatFolder.php?coinCategory=Dime&page=1"><img src="../img/DimeFolder.jpg" width="230" height="332" class="folderPic" /></a></td>
    <td><a href="viewCoinCatFolder.php?coinCategory=Twenty_Cent&page=1"><img class="folderPic" src="../img/TwentyCentFolder.jpg" /></a></td>
    <td><a href="viewCoinCatFolder.php?coinCategory=Quarter&page=1"><img class="folderPic" src="../img/QuarterFolder.jpg"  /></a></td>
  </tr>
  <tr>
    <td><a href="viewCoinCatFolder.php?coinCategory=Half_Dollar&page=1"><img class="folderPic" src="../img/Half_DollarFolder.jpg" /></a></td>
    <td><a href="viewCoinCatFolder.php?coinCategory=Dollar&page=1"><img src="../img/DollarFolder.jpg" width="230" height="332" class="folderPic"  /></a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


<br />
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>