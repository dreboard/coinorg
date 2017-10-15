<?php
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="robots" content="noindex, nofollow" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coin Lots</title>
<?php include("../inc/scripts.php"); ?>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<script type="text/javascript">
$(document).ready(function(){
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "asc" ]],
	"iDisplayLength": 25
} );

});
</script>
<style type="text/css">
#adminTbl {clear:both; margin-top:12px;}
</style>

</head>

<body>
<div id="container">


<?php include("../inc/pageElements/headerAdmin.php"); ?>



<div id="contentHolder" class="wide">

<div id="content" class="inner">
<h1>Active Coin Lots</h1>
<p><a href="coinLotNew.php" class="brownLinkBold">Add New Lot</a></p>
<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="16%">Date</td>
    <td width="66%">Name</td>
    <td width="18%">Price</td>
  </tr>
</thead>
  
 <tbody> 
  <?php 
  	$sql = mysql_query("SELECT * FROM coinLots") or die(mysql_error());
if(mysql_num_rows($sql) == 0){
	  echo '
		  <tr>
		  <td>&nbsp;</td> 
		  <td>No Lots in System</td>
		  <td>&nbsp;</td>
		  </tr>  ';
} else {

		while($row = mysql_fetch_array($sql))
		{
			$CoinLots->getCoinLotById($row['coinLotID']);
			echo '<tr><td>'.date("M j, Y",strtotime($CoinLots->getPurchaseDate())).'</td>
<td><a href="coinLotView.php?ID='.intval($row['coinLotID']).'">'.$CoinLots->getLotName().'</a></td>
<td>$'.$CoinLots->getPurchasePrice().'</td>			
	</tr>';
		}
}
  ?>    
</tbody>
  <tfoot class="darker">
  <tr>
    <td width="16%">Date</td>
    <td width="66%">Name</td>
    <td width="18%">Price</td>
  </tr>
</tfoot>
</table>
  <p>&nbsp;</p>
  
</div>

</div>



<?php include("../inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>