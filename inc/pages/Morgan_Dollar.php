<div class="table-responsive">
  <table class="table">
  <tr valign="top" class="setFourRow">
<?php   
$i = 1;
$countAll = mysql_query("SELECT DISTINCT coinVersion FROM coins WHERE coinType = 'Morgan Dollar'  ORDER BY coinYear ASC") or die(mysql_error());
while($row = mysql_fetch_array($countAll))
	  {
		$coinVersionLink = str_replace(' ', '_', $row['coinVersion']);
  echo '<td><a href="viewCoinVersion.php?coinVersion='.$coinVersionLink.'"><img class="coinSwitch" src="../img/'.$collection->getVarietyImg($row['coinVersion'], $userID).'" alt="" width="100" height="100" /></a><br />
'.$row['coinVersion'].'</td>';    
$i = $i + 1; //add 1 to $i
if ($i == 5) { //when you have echoed 3 <td>'s
echo '</tr><tr align="center" valign="top" class="dateHolder">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop

?>
 </table>
 </div>


<div id="typeDiv">
<table class="table">
  <tr class="setTwoRow">
    <td><strong>Proof Like</strong></td>
    <td><strong>Assigned VAM</strong></td>
    </tr>
  <tr align="center">
    <td><a href="proofLikeReport.php?coinType=<?php echo $coinType ?>"><?php echo $collection->getMorganDesignationCount($userID); ?></a></td>
    <td><a href="vamReport.php?coinType=Morgan_Dollar"><?php echo $collection->getVAMCount($userID, $coinType); ?></a></td>
    </tr>
</table>
</div>

<h3>By Year VAM Report</h3>
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
echo '<td><strong><a class="brownLink" href="vamYearReport.php?coinType='.str_replace(' ', '_', $coinType).'&coinYear='.$item.'">'.$item.'</a></strong></td>'; 
$i = $i + 1; //add 1 to $i
if ($i == 11) { //when you have echoed 3 <td>'s
echo '</tr><tr class="setTenRow">'; //echo a new row
$i = 1; //reset $i
} //close the if
}
echo '</tr>'; //close out the table' //close out the table
?>
</table>
</div> 