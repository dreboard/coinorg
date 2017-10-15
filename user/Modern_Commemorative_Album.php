<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

$commemorativeVersion = 'Modern Commemorative';


$collectTotal = $Commemorative->getTotalCollectedCommemorativeVersionByID($commemorativeVersion, $userID);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Commemorative Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 100
} );
});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:110%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/Modern_Commemorative.jpg" width="100" height="100" align="middle"> My <?php echo $commemorativeVersion; ?> Collection</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="25%" class="darker"><a href="Modern_Commemorative.php">Coins</a></td>
    <td width="25%" class="darker"><a href="Modern_Commemorative_Album.php">Album View</a></td>
    <td width="25%" class="darker"> <a href="Modern_Commemorative_Grades.php">Grade Report</a></td>
    <td width="25%" class="darker"><a href="Modern_Commemorative_Error.php">Errors</a></td>  
  </tr>
</table>
<hr />

<table width="100%" border="0" align="center" cellpadding="3" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
<?php   
$i = 1;
$countAll = mysql_query("SELECT * FROM coins WHERE commemorativeVersion = 'Modern Commemorative'  ORDER BY coinYear	 ASC") or die(mysql_error());
while($row = mysql_fetch_array($countAll))
	  {
		$coinID = intval($row['coinID']);
		$coin-> getCoinById($coinID);  
		$coinName = $coin->getCoinName(); 
		$coinVersion = $coin->getCoinVersion();
		$coinVersionLink = str_replace(' ', '_', $coin->getCoinVersion());
  echo '<td><a href="viewCoinVersion.php?coinVersion='.$coinVersionLink.'"><img class="coinSwitch" src="../img/'.$collection->getVarietyImg($coin->getCoinVersion(), $userID).'" alt="" width="100" height="100" /></a><br />
'.$coinName.'</td>';    
$i = $i + 1; //add 1 to $i
if ($i == 5) { //when you have echoed 3 <td>'s
echo '</tr><tr align="center" valign="top" class="dateHolder">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop

?>
  
 </table>
 <hr />


<p><a href="#top">Top</a></p>


</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>