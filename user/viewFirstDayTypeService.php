<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if(isset($_GET["proService"])){
	$proService = strip_tags(str_replace('_', ' ', $_GET["proService"])); 
		$coinType = str_replace('_', ' ', $_GET['coinType']);
    $coinTypeLink = strip_tags($_GET['coinType']);
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
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>My First Day  <?php echo $coinType ?>'s Graded By <?php echo $proService ?></h1>
<p><a href="FirstDay.php">Back to First Day Report</a></p>

  <table width="800" border="0" id="setList">
  <tr>
    <td width="72%"><h2>Coin Set</h2></td>
    <td width="28%" align="center"><h3>Collected</h3></td>
  </tr>
<?php 
	$sql = mysql_query("SELECT * FROM collectfirstday WHERE coinType = '$coinType' AND proService = '$proService' ORDER BY coinYear ASC") or die(mysql_error()); 
if(mysql_num_rows($sql)== 0){
	  echo '
    <tr>
    <td>None in collection</td>
	<td>&nbsp;</td>
  </tr>
  ';
} else {
	while($row = mysql_fetch_array($sql)){
		$firstdayID = intval($row['firstdayID']);
		$collectfirstdayID = $Encryption->encode($row['collectfirstdayID']);
		$firstdayNickname = strip_tags($row['firstdayNickname']);
		
		$setName = $row['setName'];
	echo '<tr class="setListRow">
    <td><a href="viewFirstDayDetail.php?collectfirstdayID=' . $firstdayNickname . '">' . $setName . '</a></td>
    <td align="center">'.$CollectionFirstday->getFirstDayCountByFirstDayId($thisFirstdayID, $userID).'</td>
  </tr>';
	}
	}
?>
</table>

<br />
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>