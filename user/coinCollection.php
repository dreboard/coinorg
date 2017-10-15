<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coincollectID = '1';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Collections</title>
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
<h1>My Collections</h1>
<p>Collections (<?php echo $CoinCollect->totalCollectionsByUser($userID) ?>) |&nbsp;
  <select name="coinCollectionCategory" id="coinCollectionCategory" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
    <option selected="selected" value="">By Category</option>
    <option value="coinCollectionCategory.php?coinCategory=None">General</option>
    <option value="coinCollectionCategory.php?coinCategory=Half_Cent">Liberty Cap</option>
    <option value="coinCollectionCategory.php?coinCategory=Large_Cent">Flowing Hair </option>
    <option value="coinCollectionCategory.php?coinCategory=Small_Cent">Small Cents</option>
    <option value="coinCollectionCategory.php?coinCategory=Two_Cent">Two Cent Grades</option>
    <option value="coinCollectionCategory.php?coinCategory=Three_Cent">Three Cent</option>
    <option value="coinCollectionCategory.php?coinCategory=Half_Dime">Half Dime</option>
    <option value="coinCollectionCategory.php?coinCategory=Nickel">Nickel</option>
    <option value="coinCollectionCategory.php?coinCategory=Dime">Dime</option>
    <option value="coinCollectionCategory.php?coinCategory=Twenty_Cent">Twenty Cent</option>
    <option value="coinCollectionCategory.php?coinCategory=Quarter">Quarter</option>
    <option value="coinCollectionCategory.php?coinCategory=Half_Dollar">Half Dollar</option>
    <option value="coinCollectionCategory.php?coinCategory=Dollar">Dollar</option>
  </select>
  &nbsp;| &nbsp;<a href="addCollection.php" class="brownLinkBold">Create New Collection</a></p>
<div id="CoinList">
<table width="100%" border="0" id="clientTbl">
<thead>
  <tr>
    <td width="13%"><strong>Date</strong></td>
    <td width="40%"><strong>Name</strong></td>
    <td width="31%"><strong>Type</strong></td>   
    <td width="16%" align="center"> <strong>Coins</strong></td>
  </tr>
</thead> 
<tbody>

<?php 
$collectionQuery = mysql_query("SELECT * FROM coincollect WHERE userID = '$userID'  ORDER BY coincollectID DESC") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
  <tr class="darker">
    <td width="13%">&nbsp;</td>
    <td width="40%">You dont have any saved collections</td>
    <td width="31%">&nbsp;</td>   
    <td width="16%" align="center">&nbsp;</td>
  </tr>';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $coincollectID = intval($row['coincollectID']); 
  $CoinCollect->getCoinCollectionById($coincollectID);
  echo '
<tr>
<td>'.date("M j, Y",strtotime($CoinCollect->getCoinCollectionDate())).'</td> 
<td><a href="coinCollectionList.php?ID='.$Encryption->encode($coincollectID).'">'.$CoinCollect->getCoinCollectionName().'</a></td>
<td>'.$CoinCollect->getCoinCollectionType().'</td>
<td align="center">'.$CoinCollect->getCoinsCount($coincollectID).'</td>
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
    <td width="16%" align="center"> <strong>Coins</strong></td>
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