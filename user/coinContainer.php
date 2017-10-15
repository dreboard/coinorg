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
<title>My Containers</title>
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
<h1>My Containers</h1>
<p>Containers (<?php echo $Container->totalContainersByUser($userID) ?>) |&nbsp;
  <select name="coinCollectionCategory" class="selectNavs" id="coinCollectionCategory" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
    <option selected="selected" value="">Switch Type</option>
    <option value="coinContainerType.php?containerType=Slabbed_Box">Slabbed Coin Box</option>
    <option value="coinContainerType.php?containerType=Set_Box">Mint/Proof Set Box</option>
    <option value="coinContainerType.php?containerType=Plastic_Tray">Plastic Tray </option>
    <option value="coinContainerType.php?containerType=Roll_Tray">Coin Roll Tray</option>
    <option value="coinContainerType.php?containerType=Roll_Bin">Coin Roll Bin</option>
        <option value="coinContainerType.php?containerType=Roll_Box">Bank Roll Box</option>
    <option value="coinContainerType.php?containerType=Mint_Roll_Box">Mint Roll Box</option>
    <option value="coinContainerType.php?containerType=Other">Other</option>
  </select>
  &nbsp;| &nbsp;<a href="coinContainerNew.php" class="brownLinkBold">Add New Container</a></p>
<div id="CoinList">
<table width="100%" border="0" id="clientTbl">
<thead>
  <tr>
    <td width="13%"><strong>Date</strong></td>
    <td width="40%"><strong>Name</strong></td>
    <td width="31%"><strong>Type</strong></td>   
    <td width="16%" align="center"> <strong>Items</strong></td>
  </tr>
</thead> 
<tbody>

<?php 
$collectionQuery = mysql_query("SELECT * FROM containers WHERE userID = '$userID'  ORDER BY containerID DESC") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
  <tr class="darker">
    <td width="13%">&nbsp;</td>
    <td width="40%">You dont have any saved containers</td>
    <td width="31%">&nbsp;</td>   
    <td width="16%" align="center">&nbsp;</td>
  </tr>';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $Container->getContainerById(intval($row['containerID']));
  echo '
<tr>
<td>'.date("M j, Y",strtotime($Container->getContainerDate())).'</td> 
<td>'.$Container->getContainerTypeLinkByID(intval($row['containerID'])).'</td>
<td><a href="coinContainerType.php?containerType='.str_replace(' ', '_', strip_tags($Container->getContainerType())).'">'.$Container->getContainerType().'</a></td>
<td align="center">'.$Container->getCollectionContainerItemCount(intval($row['containerID']), $userID).'</td>
</tr>  
  ';
  }
}
?>

</tbody>
<tfoot>

  <tr>
    <td width="13%"><strong>Date</strong></td>
    <td width="40%"><strong>Name</strong></td>
    <td width="31%"><strong>Type</strong></td>   
    <td width="16%" align="center"> <strong>Items</strong></td>
  </tr>
  
</tfoot>
</table>

</div>
<br />
<hr />
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>