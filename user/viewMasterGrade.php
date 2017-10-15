<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if(isset($_GET["coinGrade"])){
	$coinGrade = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["coinGrade"]);
}else {
	$coinGrade = "";
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


<table width="100%" border="0">
  <tr>
    <td width="11%"><img src="../img/Mixed_KeyCoins.jpg" alt="" width="100" height="100" align="middle" /></td>
    <td width="65%"><h1>My  Coin's Graded <?php echo $coinGrade ?></h1>&nbsp;</td>
    <td width="24%" align="right"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Grade</option>
      <optgroup label="Business Strikes">
        <option value="viewMasterProGrade.php?coinGrade=P1">P1</option>
        <option value="viewMasterProGrade.php?coinGrade=FR2">FR2</option>
        <option value="viewMasterProGrade.php?coinGrade=AG3">AG3</option>
        <option value="viewMasterProGrade.php?coinGrade=G4">G4</option>
        <option value="viewMasterProGrade.php?coinGrade=G6">G6</option>
        <option value="viewMasterProGrade.php?coinGrade=VG8">VG8</option>
        <option value="viewMasterProGrade.php?coinGrade=VG10">VG10</option>
        <option value="viewMasterProGrade.php?coinGrade=F12">F12</option>
        <option value="viewMasterProGrade.php?coinGrade=F15">F15</option>
        <option value="viewMasterProGrade.php?coinGrade=VF20">VF20</option>
        <option value="viewMasterProGrade.php?coinGrade=VF25">VF25</option>
        <option value="viewMasterProGrade.php?coinGrade=VF30">VF30</option>
        <option value="viewMasterProGrade.php?coinGrade=VF35">VF35</option>
        <option value="viewMasterProGrade.php?coinGrade=EF40">EF40</option>
        <option value="viewMasterProGrade.php?coinGrade=EF45">EF45</option>
        <option value="viewMasterProGrade.php?coinGrade=AU50">AU50</option>
        <option value="viewMasterProGrade.php?coinGrade=AU53">AU53</option>
        <option value="viewMasterProGrade.php?coinGrade=AU55">AU55</option>
        <option value="viewMasterProGrade.php?coinGrade=AU58">AU58</option>
        <option value="viewMasterProGrade.php?coinGrade=MS60">MS60</option>
        <option value="viewMasterProGrade.php?coinGrade=MS61">MS61</option>
        <option value="viewMasterProGrade.php?coinGrade=MS62">MS62</option>
        <option value="viewMasterProGrade.php?coinGrade=MS63">MS63</option>
        <option value="viewMasterProGrade.php?coinGrade=MS64">MS64</option>
        <option value="viewMasterProGrade.php?coinGrade=MS65">MS65</option>
        <option value="viewMasterProGrade.php?coinGrade=MS66">MS66</option>
        <option value="viewMasterProGrade.php?coinGrade=MS67">MS67</option>
        <option value="viewMasterProGrade.php?coinGrade=MS68">MS68</option>
        <option value="viewMasterProGrade.php?coinGrade=MS69">MS69</option>
        <option value="viewMasterProGrade.php?coinGrade=MS70">MS70</option>
        </optgroup>
      <optgroup label="Proof Strikes">
        <option value="viewMasterProGrade.php?coinGrade=PR35">PR35</option>
        <option value="viewMasterProGrade.php?coinGrade=PR40">PR40</option>
        <option value="viewMasterProGrade.php?coinGrade=PR45">PR45</option>
        <option value="viewMasterProGrade.php?coinGrade=PR50">PR50</option>
        <option value="viewMasterProGrade.php?coinGrade=PR55">PR55</option>
        <option value="viewMasterProGrade.php?coinGrade=PR58">PR58</option>
        <option value="viewMasterProGrade.php?coinGrade=PR60">PR60</option>
        <option value="viewMasterProGrade.php?coinGrade=PR61">PR61</option>
        <option value="viewMasterProGrade.php?coinGrade=PR62">PR62</option>
        <option value="viewMasterProGrade.php?coinGrade=PR63">PR63</option>
        <option value="viewMasterProGrade.php?coinGrade=PR64">PR64</option>
        <option value="viewMasterProGrade.php?coinGrade=PR65">PR65</option>
        <option value="viewMasterProGrade.php?coinGrade=PR66">PR66</option>
        <option value="viewMasterProGrade.php?coinGrade=PR67">PR67</option>
        <option value="viewMasterProGrade.php?coinGrade=PR68">PR68</option>
        <option value="viewMasterProGrade.php?coinGrade=PR69">PR69</option>
        <option value="viewMasterProGrade.php?coinGrade=PR70">PR70</option>
        </optgroup>
    </select></td>
  </tr>
  
</table>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="14%" class="darker"><a href="myCoins.php">Coins</a></td>
    <td width="13%" class="darker"><a href="myRolls.php">Rolls</a></td>
    <td width="14%" class="darker"><a href="myFolders.php">Folders</a></td>    
    <td width="20%" class="darker"> <a href="myGrades.php">Grade Report</a></td>
    <td width="14%" class="darker"><a href="myError.php">Errors</a></td>
    <td width="12%" class="darker"> <a href="myBags.php">Bags</a></td>
    <td width="13%" class="darker"><a href="myBoxes.php">Boxes</a></td>    
  </tr>
</table> 

<p>&nbsp;</p>

<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="14%" align="right">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE  proService = 'None' AND coinGrade = '$coinGrade' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td>No Coins Graded '.$coinGrade.' Collected</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID);  
   $collectionID = intval($row['collectionID']);
  $collection-> getCollectionById($collectionID);   
  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoinDetail.php?collectionID='.$collectionID.'" class="brownLink">'.$coinName.'</a></td>
	<td><a href="viewListReport.php?coinGrade='.$coinType.'">'.$coinType.'</a></td>	
	<td class="purchaseTotals" align="right">$'.$collection->getCoinPrice().'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

     
<tfoot class="darker">
  <tr>
    <td width="51%">Year / Mint</td>  
    <td>Type</td>    
    <td width="14%" align="right">Purchase</td>
  </tr>
	</tfoot>
</table>

<br />
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>