<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['setType'])) { 
$setType = str_replace('_', ' ', strip_tags($_GET["setType"]));
$setLink = strip_tags($_GET["setType"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo str_replace('_', ' ', strip_tags($_GET["setType"])); ?> Release List</title>

<style type="text/css">
.gradeNums td {padding:5px; font-size:120%;}
#setList .setListRow:hover{background-color:#333; color:#FFF;}
#setList .setListRow a:hover{color:#FFF;}
table h3 {margin:0px;}
</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/Mintset.jpg" width="100" height="100" align="absmiddle">  Coin Set List</h1>
<div>
    <hr class="clear"> 
<h3>Mint Sets By Type | <a href="mintset.php" class="brownLink">My Sets</a></h3>
<hr>

   <table width=100% border="0" id="setList">
  <tr>
    <td width="87%"><h3>Coin Set</h3></td>
    <td width="13%" align="center"><h3>Collected</h3></td>
  </tr>
<?php 
	$sql = mysql_query("SELECT * FROM mintset WHERE setType = '".str_replace('_', ' ', strip_tags($_GET["setType"]))."'  ORDER BY coinYear DESC") or die(mysql_error()); 
	while($row = mysql_fetch_array($sql)){
	echo '<tr class="gryHover">
    <td><a href="viewSet.php?ID=' . intval($row['mintsetID']) . '">' . strip_tags($row['setName']) . '</a></td>
    <td align="center">'.$CollectionSet->getMintsetCountByMintsetID(intval($row['mintsetID']), $userID).'</td>
  </tr>';

	}
?>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>