<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["slabCondition"])) { 
$slabCondition = str_replace('_', ' ', strip_tags($_GET["slabCondition"]));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Mintset Report</title>
        <script type="text/javascript">


    </script>
<style type="text/css">
table h3 {margin:0px; padding:0px;}
</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/Mintset.jpg" width="100" height="100" align="absmiddle"> My Damaged Sets</h1>
<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="25%"><a href="mintsetList.php" class="brownLinkBold">All Sets</a></td>
    <td width="10%" align="right">&nbsp;</td>
    <td width="62%" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td><h3> Sets Collected</h3></td>
    <td align="right"><?php echo $CollectionSet->getSetTypeConditionCountByID(str_replace('_', ' ', strip_tags($_GET["slabCondition"])), $userID); ?></td>
    <td align="right"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Damage Type</option>
      <option value="damageSet.php?slabCondition=Scratched_Heavy">Scratched Heavy</option>
      <option value="damageSet.php?slabCondition=Scratched_Light">Scratched Light</option>
      <option value="damageSet.php?slabCondition=Cracked">Cracked</option>
      <option value="damageSet.php?slabCondition=Cracked_Severe">Cracked Severe</option>
      </select>
      
    </td>
  </tr>
</table>
<br>
<hr>
<h3>All <?php echo str_replace('_', ' ', strip_tags($_GET["slabCondition"])) ?> Sets</h3>
  <div>
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
	$sql = mysql_query("SELECT * FROM collectset WHERE slabCondition = '".str_replace('_', ' ', strip_tags($_GET["slabCondition"]))."' AND userID = '$userID' ORDER BY coinYear DESC") or die(mysql_error()); 
if(mysql_num_rows($sql) == 0){
	  echo '
		  <tr>
		  <td>No Proof Sets Collected</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>  ';
} else {	
	while($row = mysql_fetch_array($sql)){
		$CollectionSet->getCollectionSetById(intval($row['collectsetID']));
		$Mintset->getMintsetById(intval($row['mintsetID']));
	echo '<tr class="gryHover">
    <td><a href="viewSetDetail.php?ID=' . $Encryption->encode(intval($row['collectsetID'])) . '">' . $CollectionSet->getSetNickname(). '</a></td>
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