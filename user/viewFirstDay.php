<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['firstdayID'])) { 
$firstdayID = intval($_GET['firstdayID']);
$FirstDay->getFirstDayByID($firstdayID);
$FirstDay->getSetName();

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $FirstDay->getSetName(); ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#rollListTbl').dataTable();
/*$('#rollListTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );*/
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

<h1><?php echo $FirstDay->getSetName() ?></h1>

<table width="930" id="viewTbl">
  <tr>
    <td width="121" rowspan="8" valign="top"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><img src="../img/<?php echo str_replace(' ', '_', $FirstDay->getCoinVersion()); ?>.jpg" width="100" height="100" alt="11" /></a></td>
<td width="98" class="tdHeight"><span class="darker">Type: </span></td>
<td width="673" class="tdHeight"><a href="viewListReport.php?coinType=<?php echo str_replace(' ', '_', $FirstDay->getCoinType()); ?>"><?php echo $FirstDay->getCoinType(); ?></a></td>
<td width="18"></td>
</tr>
<tr>
<td class="tdHeight"><span class="darker">Category: </span></td>
<td class="tdHeight"><?php echo $FirstDay->getCoinCategory(); ?></td>
<td rowspan="7" valign="top">
  
</td>
  </tr>
<tr>
  <td class="tdHeight">&nbsp;</td>
  <td class="tdHeight">&nbsp;</td>
</tr>
  <tr>
    <td colspan="2">
    <select id="mintsetID" name="mintsetID" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option value="">Switch Set</option>
      <option value="mintset.php">All Sets</option>
      <?php 
	$getcoinType = mysql_query("SELECT * FROM firstday ORDER BY setName DESC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
	echo '<option value="viewFirstDay.php?firstdayID='.intval($row['firstdayID']).'">'.strip_tags($row['setName']).'</option>';

	}
?>
    </select>
    </td>
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

<h3>In Collection</h3>
<table width="100%" border="0" id="rollListTbl">
<thead class="darker">
  <tr>
    <td width="47%" height="24">Year / Mint</td>  
    <td width="31%">Type</td>
    <td width="22%" align="center">Collected</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectfirstday WHERE userID = '$userID' AND firstdayID = '".intval($_GET['firstdayID'])."'") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td>No First Day Covers Collected</td>
		  <td></td>
		  <td></td>
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  { 
  echo '
    <tr>
    <td><a href="viewFirstDayDetail.php?ID='.$Encryption->encode(strip_tags($row['collectfirstdayID'])).'">'.strip_tags($row['firstdayNickname']).'</a></td>
	<td>'.strip_tags($row['firstdayType']).'</td>	
	<td align="center">'.date("F j, Y",strtotime(strip_tags($row['enterDate']))).'</td>
  </tr>
  ';
	  }
}
?>
</tbody>

<tfoot class="darker">
  <tr>
    <td width="47%" height="24">Year / Mint</td>  
    <td width="31%">Type</td>
    <td width="22%" align="center">Collected</td>
  </tr>
	</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>