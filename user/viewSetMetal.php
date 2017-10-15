<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if(isset($_GET["coinMetal"])){
	$coinMetal = strip_tags(str_replace('_', ' ', $_GET["coinMetal"])); 
	$coinMetalQuery = strip_tags(str_replace('_', ' ', $_GET["coinMetal"])); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinMetal ?> Mintsets</title>

<style type="text/css">
.gradeNums td {padding:5px; font-size:120%;}
#setList .setListRow:hover{background-color:#333; color:#FFF;}
#setList .setListRow a:hover{color:#FFF;}

table h3 {margin:0px; padding:0px;}
</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/Mintset.jpg" width="100" height="100" align="absmiddle"> My <?php echo $coinMetal ?> Sets</h1>
<table width="100%" border="0" cellpadding="2">
  <tr>
    <td><h3> Sets Collected</h3></td>
    <td align="right"><?php echo $CollectionSet->getAllSetMetalCountByID($coinMetal, $userID); ?></td>
    <td align="right"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Metal</option>
        <option value="viewBullionSets.php">All Bullion Sets</option>
        <option value="viewSetMetal.php?coinMetal=Copper">Mint</option>
        <option value="viewSetMetal.php?coinMetal=Clad">Proof</option>
        <option value="viewSetMetal.php?coinMetal=Silver">Silver</option>
        <option value="viewSetMetal.php?coinMetal=Gold">Gold</option>
        <option value="viewSetMetal.php?coinMetal=Platinum">Platinum</option>        
      </select>
      
    </td>
  </tr>
  
  <tr>
    <td><h3>Total Investment</h3></td>
    <td align="right">$<?php echo $CollectionSet->getMetalSetSumByID($coinMetal, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h3>Certified</h3></td>
    <td align="right"><?php echo $CollectionSet->getSetMetalAllProCountByID($coinMetal, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr>

  <div>
    
    <table width="100%" border="0">
     <tr align="center">
       <td colspan="4" align="left"><h3><strong>Certified Sets</strong></h3></td>
      </tr>
     <tr align="center">
       <td width="11%"><a href="viewSetService.php?proService=PCGS&setType=<?php echo $setLink; ?>"><strong>PCGS</strong></a></td>
       <td width="11%"><a href="viewSetService.php?proService=ICG&setType=<?php echo $setLink; ?>"><strong>ICG</strong></a></td>
       <td width="11%"><a href="viewSetService.php?proService=NGC&setType=<?php echo $setLink; ?>"><strong>NGC</strong></a></td>
       <td width="11%"><a href="viewSetService.php?proService=ANACS&setType=<?php echo $setLink; ?>"><strong>ANACS</strong></a></td>
      </tr>
     <tr align="center">
       <td><a href="viewSetService.php?proService=PCGS&setType=Proof&coinMetal=<?php echo $coinMetal ?>"><?php echo $CollectionSet->getSetProofProGrader('PCGS',$userID, $coinMetal); ?></a></td>
       <td><a href="viewSetService.php?proService=PCGS&setType=Proof&coinMetal=<?php echo $coinMetal ?>"><?php echo $CollectionSet->getSetProofProGrader('PCGS',$userID, $coinMetal); ?></a></td>
       <td><a href="viewSetService.php?proService=PCGS&setType=Proof&coinMetal=<?php echo $coinMetal ?>"><?php echo $CollectionSet->getSetProofProGrader('PCGS',$userID, $coinMetal); ?></a></td>
       <td><a href="viewSetService.php?proService=PCGS&setType=Proof&coinMetal=<?php echo $coinMetal ?>"><?php echo $CollectionSet->getSetProofProGrader('PCGS',$userID, $coinMetal); ?></a></td>
      </tr>
   </table>
   <hr class="clear"> 

<table width="100%" border="0" id="setList">
 <thead class="darker">
  <tr>
  <td width="44%" align="left">Name</td>
   <td>Type</td>
   <td width="17%" align="center">Collected</td>  
  </tr>
</thead>
  <tbody>
<?php 
	$sql = mysql_query("SELECT * FROM collectset WHERE coinMetal = '$coinMetal' AND userID = '$userID' ORDER BY coinYear DESC") or die(mysql_error()); 
if(mysql_num_rows($sql) == 0){
	  echo '
		  <tr>
		  <td>No '.$coinMetal.' Sets Collected</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>  ';
} else {	
	while($row = mysql_fetch_array($sql)){
		$collectsetID = intval($row['collectsetID']);
		$CollectionSet->getCollectionSetById($collectsetID);
		$mintsetID = intval($row['mintsetID']);
		$Mintset->getMintsetById(intval($row['mintsetID']));
		$setNickname = $row['setNickname'];
	echo '<tr class="setListRow">
    <td><a href="viewSetDetail.php?ID=' . $Encryption->encode($collectsetID) . '">' . $CollectionSet->getSetNickname(). '</a></td>
	<td><a href="viewSet.php?ID=' . intval($row['mintsetID']). '">' .$Mintset->getSetName(). '</a></td>
    <td align="center">'.$CollectionSet->getCoinPrice().'</td>
  </tr>';

	}
}
?>
  </tbody>
 <tfoot class="darker">
  <tr>
  <td width="44%" align="left">Name</td>
   <td>Type</td>
   <td width="17%" align="center">Collected</td>  
  </tr>
</tfoot>

</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>