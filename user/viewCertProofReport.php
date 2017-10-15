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
<title>Certified Proof Coins</title>
<script type="text/javascript">
$(document).ready(function(){
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );

});
</script>
<style type="text/css">
#listTbl h3 {margin:0px;}

</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<table width="100%" border="0">
  <tr>
    <td><h1><img src="../img/Eisenhower_Dollar_Proof.jpg" alt="" width="100" height="100" align="middle" /> Certified Proof Coins</h1></td>
    <td align="right"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Coin</option>
<option value="categoryProof.php?coinCategory=Half_Cent">Half Cents</option>
<option value="categoryProof.php?coinCategory=Large_Cent">Large Cents</option>
<option value="categoryProof.php?coinCategory=Small_Cent">Small Cents</option>
<option value="categoryProof.php?coinCategory=Two_Cent">Two Cents</option>
<option value="categoryProof.php?coinCategory=Three_Cent">Three Cents</option>
<option value="categoryProof.php?coinCategory=Half_Dime">Half Dime</option>
<option value="categoryProof.php?coinCategory=Nickel">Nickels</option>
<option value="categoryProof.php?coinCategory=Dime">Dime</option>
<option value="categoryProof.php?coinCategory=Twenty_Cent_Piece">Twenty Cents</option>

<option value="categoryProof.php?coinCategory=Quarter">Quarters</option>
<option value="categoryProof.php?coinCategory=Half_Dollar">Half Dollar</option>
<option value="categoryProof.php?coinCategory=Dollar">Dollar</option>
    </select></td>
  </tr>
</table>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="33%" class="darker"><a href="myCoins.php">Coins</a></td>
    <td width="33%" class="darker"> <a href="myGrades.php">Grade Report</a></td>
    <td width="33%" class="darker"><a href="myError.php">Errors</a></td>   
  </tr>
</table>
<h2>Coin List</h2>
  <table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="62%">Year / Mint</td>
    <td width="22%">Type</td>  
    <td width="7%" align="center">Grader</td>
    <td width="9%" align="right">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND proService != 'None' AND strike = 'Proof' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td><a href="addCoin.php">No proofs in collection</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $collectionID = intval($row['collectionID']);
  $collection->getCollectionById($collectionID);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'" class="brownLink">'.$coinName.'</a></td>
	<td><a href="viewListReport.php?coinType='.str_replace(' ', '_', $coin->getCoinType()).'">'.$coin->getCoinType().'</a></td>
	<td align="center">'.$collection->getGrader().'</td>
	<td align="right">$'.$collection->getCoinPrice().'</td>	    
  </tr>
  ';
	  }
	  }
?>
</tbody>
<tfoot class="darker">
  <tr>
    <td width="62%">Year / Mint</td>
    <td width="22%">Type</td>  
    <td width="7%" align="center">Grader</td>
    <td width="9%" align="right">Purchase</td>
  </tr>
	</tfoot>
</table>
  <p>&nbsp;</p>
  <p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>