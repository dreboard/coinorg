<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $rollNickname ?></title>
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

<h1>Bulk Coin Roll List</h1>

<table width="930" id="viewTbl">
  <tr>
<td width="195" class="tdHeight"><span class="darker"># of Bulk Rolls: </span></td>
<td width="578" class="tdHeight">&nbsp;</td>
<td width="16"></td>
</tr>
<tr>
<td class="tdHeight"><span class="darker">Total Coins: </span></td>
<td class="tdHeight">&nbsp;</td>
  </tr>
<tr>
  <td class="tdHeight"><strong>Total Investment:</strong></td>
  <td class="tdHeight">$</td>
</tr>
  <tr>
    <td><span class="darker">Type:</span></td>
    <td>&nbsp;</td>
    </tr>

</table>
<hr />
<h3>All Bulk Rolls</h3>
<table width="100%" border="0" id="rollListTbl">
  <thead class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="center">Roll Type</td>
    <td>Edit</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectrolls WHERE userID = '$userID' AND bulkRoll = '1' ") or die(mysql_error());
  while($row = mysql_fetch_array($countAll))
	  {
  $rollNickname = strip_tags($row['rollNickname']);  
  $coinGrade = strip_tags($row['coinGrade']);  
  $coinID = intval($row['coinID']);
  $coinCategory = strip_tags($row['coinCategory']);
  $coinGrade = strip_tags($row['coinGrade']);
  $rollType = strip_tags($row['rollType']);
  $collectrollsID = intval($row['collectrollsID']);
  $rollTypeLink = str_replace(' ', '_', $rollType);
  
switch ($rollType)
{
case 'Same Coin':
  $viewLink =  '<a href="viewRollSame.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a>';
  $editLink =  '<a href="editRollSameCoinSmallCentCoins.php?collectrollsID='.$collectrollsID.'">Edit</a>';
  break;
case 'Date Range':
  $viewLink =  '<a href="viewRollDateRange.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a>';
    $editLink =  '<a href="editRollSameCoinSmallCentCoins.php?collectrollsID='.$collectrollsID.'">Edit</a>';
  break;
case 'Same Year':
  $viewLink =  '<a href="viewRollSameYear.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a>';
    $editLink =  '<a href="editRollSameCoinSmallCentCoins.php?collectrollsID='.$collectrollsID.'">Edit</a>';
  break;
  case 'Mixed Type':
  $viewLink =  '<a href="viewRollSameYear.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a>';
    $editLink =  '<a href="editRollSameCoinSmallCentCoins.php?collectrollsID='.$collectrollsID.'">Edit</a>';
  break;
  case 'Coin By Coin':
 $viewLink =  '<a href="viewRollCoins.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a>';
   $editLink =  '<a href="editRollSameCoinSmallCentCoins.php?collectrollsID='.$collectrollsID.'">Edit</a>';
  break;
}   



  echo '
    <tr>
    <td>'.$viewLink.'</td>
	<td><a href="viewListReport.php?coinType='.$coinType.'">'.$coinType.'</a></td>	
	<td align="center">'.$coinGrade.'</td>
	<td align="center"><a href="viewRollTypes.php?rollType='.$rollTypeLink.'&coinCategory='.$coinCategory.'">'.$rollType.'</a></td>	 
	<td>'.$editLink.'</td>   
  </tr>
  ';
	  }
?>
</tbody>

<tfoot class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="center">Roll Type</td>
    <td>Edit</td>
  </tr>
	</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>