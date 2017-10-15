<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['containerType'])) { 
$containerType = str_replace('_', ' ', strip_tags($_GET["containerType"]));

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>View <?php echo $containerType; ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">

<span><a href="coinContainer.php" class="brownLinkBold">All Containers</a>-><?php echo $containerType; ?></span>
<table width="100%" border="0">
  <tr>
    <td><h1><?php echo $containerType; ?> (<?php echo $Container->getCertContainerCount($userID, $containerType); ?>)</h1>&nbsp;</td>
    <td align="right"><select name="coinCollectionCategory" class="selectNavs" id="coinCollectionCategory" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
    <option selected="selected" value="">Switch Type</option>
    <option value="coinContainerType.php?containerType=Slabbed_Box">Slabbed Coin Box</option>
    <option value="coinContainerType.php?containerType=Set_Box">Mint/Proof Set Box</option>
    <option value="coinContainerType.php?containerType=Plastic_Tray">Plastic Tray </option>
    <option value="coinContainerType.php?containerType=Roll_Tray">Coin Roll Tray</option>
    <option value="coinContainerType.php?containerType=Roll_Bin">Coin Roll Bin</option>
        <option value="coinContainerType.php?containerType=Roll_Box">Bank Roll Box</option>
    <option value="coinContainerType.php?containerType=Mint_Roll_Box">Mint Roll Box</option>
    <option value="coinContainerType.php?containerType=Other">Other</option>
  </select></td>
  </tr>
</table>


<hr />

<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="71%" height="24">Container Name</td>  
    <td width="14%" align="center">Items</td>
    <td width="15%" align="center">Collected</td>
    </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM containers WHERE containerType = '$containerType' AND  userID = '$userID' ORDER BY containerName ASC ") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td>No '.$containerType.' Containers Saved</td>
	<td>&nbsp;</td><td>&nbsp;</td>
  </tr>';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $containerID	 = intval($row['containerID']);
  $Container->getContainerById($containerID);  
  echo '
    <tr class="gryHover">
    <td>'.$Container->getContainerTypeLinkByID($containerID).'</td>
	<td align="center">'.$Container->getCollectionContainerItemCount($containerID, $userID).'</td>	
	<td align="center">'.date("M j, Y",strtotime($Container->getContainerDate())).'</td> 
  </tr>
  ';
	  }
}
?>
</tbody>

<tfoot class="darker">
  <tr>
    <td width="71%" height="24">Container Name</td>  
    <td width="14%" align="center">Items</td>
    <td width="15%" align="center">Collected</td>
    </tr>
	</tfoot>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>