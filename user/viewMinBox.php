<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['boxMintID'])) { 
$boxMintID = intval($_GET['boxMintID']);
$MintBox->getMintBoxByID($boxMintID);

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

<h1><?php echo $FirstDay->getSetName() ?></h1>

<table width="930" id="viewTbl">
  <tr>

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
    <select id="boxMintID" name="boxMintID" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option value="">Switch Set</option>
      <option value="mintset.php">All Sets</option>
      <?php 
	$getcoinType = mysql_query("SELECT * FROM boxmint ORDER BY coinYear ASC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$thisBoxMintID = $row['boxMintID'];
		$boxName = $row['boxName'];
	echo '<option value="viewMintBox.php?boxMintID=' . $boxMintID . '">' . $boxName . '</option>';
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
<thead>
  <tr class="darker">
    <td width="47%" height="24"><strong>Year / Mint</strong></td>  
    <td width="31%"><strong>Type</strong></td>
    <td width="22%" align="center"><strong>Collected</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectboxes WHERE userID = '$userID' AND boxMintID = '$boxMintID'") or die(mysql_error());
  while($row = mysql_fetch_array($countAll))
	  {
  $boxMintID = strip_tags($row['boxMintID']);  
  $boxNickname = strip_tags($row['boxNickname']);  
  $boxType = strip_tags($row['boxType']);
  $collectboxID = strip_tags($row['collectboxID']);
  $purchaseDate = strip_tags($row['purchaseDate']);
    
  echo '
    <tr>
    <td><a href="viewMintBoxDetail.php?collectboxID='.$collectboxID.'">'.$boxNickname.'</a></td>
	<td><a href="viewBoxType.php?boxType='.$boxType.'">'.$boxType.'</td>	
	<td align="center">'.date("F j, Y",strtotime($purchaseDate)).'</td>
  </tr>
  ';
	  }
?>
</tbody>

<tfoot>
  <tr class="darker">
    <td width="47%"><strong>Year / Mint</strong></td>  
    <td>Type</td>    
    <td width="22%" align="center"><strong>Collected</strong></td>
  </tr>
	</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>