<h3>Type &amp; Variety Collection</h3>
<div class="table-responsive">
  <table class="table">
  <tr valign="top" class="setFourRow">
  <td><a href="viewCoinVersion.php?coinVersion=Flying_Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Flying Eagle', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Flying_Eagle">Flying Eagle</a></td>
    
  <td><a href="viewCoinVersion.php?coinVersion=Flying_Eagle_Large_Letter"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Flying Eagle Large Letter', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Flying_Eagle_Large_Letter">Large Letters</a></td>    
  <td><a href="viewCoinVersion.php?coinVersion=Flying_Eagle_Small_Letter"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Flying Eagle Small Letter', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Flying_Eagle_Small_Letter">Small Letters</a></td>
    
  <td><a href="viewCoinVersion.php?coinVersion=Flying_Eagle_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Flying Eagle Proof', $userID); ?>" alt="" width="100" height="100" /></a><br /> 
    <a href="viewCoinVersion.php?coinVersion=Flying_Eagle_Proof">Proof</a></td>
  </tr>
 </table>
 </div>
<h3>By Year Snow Report</h3>
<div class="table-responsive">
  <table class="table">
<tr class="setTenRow">
<?php 
$i = 1;
$imgURL = $CoinTypes->getMintedYearList(htmlentities($CoinTypes->getDates()));
$delimiter=",";
$itemList = array();
$itemList = explode($delimiter, $imgURL);
foreach($itemList as $item){
echo '<td><strong><a href="snowYearReport.php?coinType='.str_replace(' ', '_', $coinType).'&coinYear='.$item.'">'.$item.'</a></strong></td>'; 
$i = $i + 1; //add 1 to $i
if ($i == 10) { //when you have echoed 3 <td>'s
echo '</tr><tr class="setTenRow">'; //echo a new row
$i = 1; //reset $i
} //close the if
}
echo '</tr>'; //close out the table' //close out the table
?>
</table>
</div>