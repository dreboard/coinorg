<table width="660" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="3"><h3>Indian Head Type &amp; Variety Collection</h3></td>
  </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td width="220"><a href="viewCoinVersion.php?coinVersion=Indian_Head_No_Shield"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indian_Head_No_Shield', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Indian_Head_No_Shield">Indian Head No Shield</a></td>
  
  <td width="220"><a href="viewCoinVersion.php?coinVersion=Indian_Head"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indian Head', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Indian_Head">Indian Head</a></td>
  <td width="220"><a href="viewCoinVersion.php?coinVersion=Indian_Head_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indian_Head_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Indian_Head_Proof">Indian Head Proof</a></td>
    
  </tr>
 </table>
<hr />

<table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr align="center">
    <td width="20%">Folders</td>
    <td width="20%"> Rolls</td>
    <td width="20%"> Bags</td>
    <td width="20%"> Boxes</td>
    <td width="20%"> Certified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></td>
    <td><a href="coinTypeRolls.php?coinType=<?php echo $coinType ?>"><?php echo $collection->getCoinRollCountByType($coinType, $userID) ?></a></td>
    <td><?php echo $collection->getCoinBagCountByType($coinType, $userID) ?></td>
    <td><?php echo $collection->getCoinBoxCountByType($coinType, $userID) ?></td>
    <td><?php echo $collection->getCertCollectionCountByType($userID, $coinType) ?></td>
  </tr>
</table>

<hr /> 
<h3>By Year Snow Report</h3>
<table width="98%" border="0" cellpadding="3" class="autoCoinTbl">
<tr>
<?php 
$i = 1;
$imgURL = $CoinTypes->getMintedYearList(htmlentities($CoinTypes->getDates()));
$delimiter=",";
$itemList = array();
$itemList = explode($delimiter, $imgURL);
foreach($itemList as $item){
echo '<td><strong><a class="brownLink" href="snowYearReport.php?coinType='.str_replace(' ', '_', $coinType).'&coinYear='.$item.'">'.$item.'</a></strong></td>'; 
$i = $i + 1; //add 1 to $i
if ($i == 10) { //when you have echoed 3 <td>'s
echo '</tr><tr>'; //echo a new row
$i = 1; //reset $i
} //close the if
}
echo '</tr>'; //close out the table' //close out the table
?>
</table>
<hr />
<table width="660" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="3"><h3><a href="viewCoinDesign.php?design=Styles_of_N">Styles of "N" Collection</a></h3></td>
  </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  
  <td width="220"><a href="viewCoinDesignType.php?designType=Indian_Head_Flat_N"><img class="coinSwitch" src="../img/<?php echo $collection->getIndianHeadFlatImg($userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinDesignType.php?designType=Indian_Head_Flat_N">Indian Head<br />
  Flat N<br />
  1860-61</a></td>
  
  <td width="220"><a href="viewCoinDesignType.php?designType=Indian_Head_Shallow_N"><img class="coinSwitch" src="../img/<?php echo $collection->getIndianHeadShallowImg($userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinDesignType.php?designType=Indian_Head_Shallow_N">Indian Head<br />
  Shallow N<br />
1862-69 & 1877 </a></td>
  <td width="220"><a href="viewCoinDesignType.php?designType=Indian_Head_Bold_N"><img class="coinSwitch" src="../img/<?php echo $collection->getIndianHeadBoldImg($userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinDesignType.php?designType=Indian_Head_Bold_N">Indian Head<br />
Bold N<br />
1870-76,1878-1909</a></td> 
  </tr>
 </table>