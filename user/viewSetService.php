<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if(isset($_GET["proService"])){
	$coinMetal = strip_tags(str_replace('_', ' ', $_GET["coinMetal"])); 
	$proService = strip_tags(str_replace('_', ' ', $_GET["proService"])); 
	$coinMetalQuery = strip_tags(str_replace('_', ' ', $_GET["coinMetal"])); 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinMetal ?> <?php echo $proService ?> Sets</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">
#clientTbl_filter input {text-align:right; margin-right:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>



       
       <table width="100%" border="0">
  <tr>
    <td><h1><img src="../img/Mintset.jpg" width="100" height="100" align="absmiddle"> <?php echo $coinMetal ?> <?php echo $proService ?> Coin Sets</h1></td>
    <td align="right"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
         <option selected="selected" value="">Switch Service</option>
           <option value="viewSetService.php?proService=PCGS&coinMetal=<?php echo $coinMetal ?>">PCGS</option>
           <option value="viewSetService.php?proService=ICG&coinMetal=<?php echo $coinMetal ?>">ICG</option>
           <option value="viewSetService.php?proService=NGC&coinMetal=<?php echo $coinMetal ?>">NGC</option>
           <option value="viewSetService.php?proService=ANACS&coinMetal=<?php echo $coinMetal ?>">ANACS</option>
       </select></td>
  </tr>
</table>

<table width="100%" border="0">
     <tr align="center">
       <td colspan="3" align="left"><h3>Certified Sets</h3>
       
       </td>
       <td align="right"></td>
      </tr>
     <tr align="center" class="darker">
       <td width="11%"><a href="viewSetService.php?proService=PCGS&coinMetal=Clad">Clad</a></td>
       <td width="11%"><a href="viewSetService.php?proService=ICG&coinMetal=Silver">Silver</a></td>
       <td width="11%"><a href="viewSetService.php?proService=NGC&coinMetal=Gold">Gold</a></td>
       <td width="11%"><a href="viewSetService.php?proService=ANACS&coinMetal=Platinum">Platinum</a></td>
      </tr>
     <tr align="center">
       <td><a href="viewSetService.php?proService=PCGS&amp;coinMetal=Clad"><?php echo $CollectionSet->getSetMetalCountByID($coinMetal='Clad', $proService, $userID) ?></a></td>
       <td><a href="viewSetService.php?proService=PCGS&amp;coinMetal=Silver"><?php echo $CollectionSet->getSetMetalCountByID($coinMetal='Silver', $proService, $userID) ?></a></td>
       <td><a href="viewSetService.php?proService=PCGS&amp;coinMetal=Gold"><?php echo $CollectionSet->getSetMetalCountByID($coinMetal='Gold', $proService, $userID) ?></a></td>
       <td><a href="viewSetService.php?proService=PCGS&amp;coinMetal=Platinum"><?php echo $CollectionSet->getSetMetalCountByID($coinMetal='Platinum', $proService, $userID) ?></a></td>
     </tr>
   </table>
   <hr />

<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead class="darker">
  <tr>
    <td width="51%">Year / Mint</td>  
    <td>Type</td>    
    <td width="10%" align="center">Grade</td>
    <td width="14%" align="right">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectset WHERE proService = '$proService' AND coinMetal = '$coinMetalQuery' AND userID = '$userID'") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		    <tr class="darker">
			<td width="51%"><a href="addGradedSet.php">None collected</a></td>  
			<td width="25%"><strong>&nbsp;</strong></td>
			<td width="10%">&nbsp;</td>
			<td width="14%">&nbsp;</td>
		  </tr>';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
		$collectsetID = intval($row['collectsetID']);
		$CollectionSet->getCollectionSetById($collectsetID);  
		echo '<tr>
		  <td><a href="viewSetDetail.php?ID='.$Encryption->encode($collectsetID).'" class="brownLink">'.$CollectionSet->getSetNickname().'</a></td>
		  <td><a href="viewSetType.php?setType='.str_replace(' ', '_', $CollectionSet->getSetType()).'">'.$CollectionSet->getSetType().'</a></td>	
		  <td align="center">'.$CollectionSet->getCoinGrade().'</td>
		  <td class="purchaseTotals" align="right">$'.$CollectionSet->getCoinPrice().'</td>	   
		</tr>';
			}
	  }
?>
</tbody>     
<tfoot class="darker">
  <tr>
    <td width="51%">Year / Mint</td>  
    <td>Type</td>    
    <td width="10%" align="center">Grade</td>
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