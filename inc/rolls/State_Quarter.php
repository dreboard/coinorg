<hr />

<table width="100%" border="0" cellpadding="3" id="folderTbl">
<tr align="center"><td colspan="4"><h3>State Quarter Mint Roll Collection</h3></td></tr>
  <tr class="dateHolder" valign="top"> 
<?php
$i = 1;
$result = mysql_query("SELECT * FROM rollsmint WHERE coinType = 'State Quarter' ORDER BY rollMintID ASC") or die(mysql_error());
while($row = mysql_fetch_array($result)){
	$rollMintID = intval($row['rollMintID']);
	$CollectMintRolls->getMintRollById($rollMintID);
echo '<td width="25%" height="135">
	<a href="viewMintRoll.php?rollMintID='.$rollMintID.'"  title="'.$CollectMintRolls->getCoinVersion().'">  <img class="coinSwitch" src="../img/'.$collectionRolls->getMintRollImg($CollectMintRolls->getCoinVersion(), $userID).'" alt="" width="100" height="100" /></a><br />
	'.$CollectMintRolls->getCoinVersion().'
	</td>';
$i = $i + 1; //add 1 to $i
if ($i == 5) { //when you have echoed 3 <td>'s
echo '</tr><tr class="dateHolder" valign="top">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop

?>
</tr>
</table>

















<table border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>State Quarter Mint Roll Collection</h3></td>
    </tr>
    

    
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewSubCategory.php?coinSubCategory=Delaware"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Delaware', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Delaware</span> 
</td>
  <td><a href="viewSubCategory.php?coinSubCategory=Pennsylvania"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Pennsylvania', $userID); ?>" alt="" width="100" height="100" /></a><br />
Pennsylvania</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=New Jersey"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('New Jersey', $userID); ?>" alt="" width="100" height="100" /></a><br />
  New Jersey</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Georgia"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Georgia', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Georgia</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Connecticut"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Connecticut', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Connecticut </td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewSubCategory.php?coinSubCategory=Massachusetts"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Massachusetts', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Massachusetts</span> 
</td>
  <td><a href="viewSubCategory.php?coinSubCategory=Maryland"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Maryland', $userID); ?>" alt="" width="100" height="100" /></a><br />
Maryland</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=South Carolina"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('South Carolina', $userID); ?>" alt="" width="100" height="100" /></a><br />
  South Carolina</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=New Hampshire"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('New Hampshire', $userID); ?>" alt="" width="100" height="100" /></a><br />
  New Hampshire</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Virginia"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Virginia', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Virginia </td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewSubCategory.php?coinSubCategory=New York"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('New York', $userID); ?>" alt="" width="100" height="100" /></a><br />
  New York</td>
  <td><a href="viewSubCategory.php?coinSubCategory=North Carolina"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('North Carolina', $userID); ?>" alt="" width="100" height="100" /></a><br />
North Carolina</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Rhode Island"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Rhode Island', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Rhode Island</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Vermont"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Vermont', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Vermont</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Kentucky"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Kentucky', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Kentucky </td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewSubCategory.php?coinSubCategory=Tennessee"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Tennessee', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Tennessee</td>
  <td><a href="viewSubCategory.php?coinSubCategory=Ohio"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Ohio', $userID); ?>" alt="" width="100" height="100" /></a><br />
Ohio</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Louisianna"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Louisianna', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Louisianna</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Indiana"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Indiana', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Indiana</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Mississippi"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Mississippi', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Mississippi </td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewSubCategory.php?coinSubCategory=Illinois"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Illinois', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Illinois</td>
  <td><a href="viewSubCategory.php?coinSubCategory=Alabama"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Alabama', $userID); ?>" alt="" width="100" height="100" /></a><br />
Alabama</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Maine"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Maine', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Maine</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Missouri"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Missouri', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Missouri</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Arkansas"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Arkansas', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Arkansas </td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewSubCategory.php?coinSubCategory=Michigan"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Michigan', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Michigan</span> 
</td>
  <td><a href="viewSubCategory.php?coinSubCategory=Florida"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Florida', $userID); ?>" alt="" width="100" height="100" /></a><br />
Florida</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Texas"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Texas', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Texas</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Iowa"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Iowa', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Iowa</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Wisconsin"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Wisconsin', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Wisconsin </td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewSubCategory.php?coinSubCategory=California"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('California', $userID); ?>" alt="" width="100" height="100" /></a><br />
  California</td>
  <td><a href="viewSubCategory.php?coinSubCategory=Minnesota"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Minnesota', $userID); ?>" alt="" width="100" height="100" /></a><br />
Minnesota</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Oregon"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Oregon', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Oregon</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Kansas"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Kansas', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Kansas</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=West Virginia"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('West Virginia', $userID); ?>" alt="" width="100" height="100" /></a><br />
  West Virginia </td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewSubCategory.php?coinSubCategory=Nevada"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Nevada', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Nevada</td>
  <td><a href="viewSubCategory.php?coinSubCategory=Nebraska"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Nebraska', $userID); ?>" alt="" width="100" height="100" /></a><br />
Nebraska</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Colorado"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Colorado', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Colorado</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=North Dakota"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('North Dakota', $userID); ?>" alt="" width="100" height="100" /></a><br />
  North Dakota</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=South Dakota"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('South Dakota', $userID); ?>" alt="" width="100" height="100" /></a><br />
  South Dakota </td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewSubCategory.php?coinSubCategory=Montana"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Montana', $userID); ?>" alt="" width="100" height="100" /></a><br />
 Montana</td>
  <td><a href="viewSubCategory.php?coinSubCategory=Washington"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Washington', $userID); ?>" alt="" width="100" height="100" /></a><br />
Washington</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Idaho"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Idaho', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Idaho</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Wyoming"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Wyoming', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Wyoming</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Utah"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Utah', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Utah </td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewSubCategory.php?coinSubCategory=Oklahoma"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Oklahoma', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Oklahoma</td>
  <td><a href="viewSubCategory.php?coinSubCategory=New Mexico"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('New Mexico', $userID); ?>" alt="" width="100" height="100" /></a><br />
New Mexico</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Arizona"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Arizona', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Arizona</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Alaska"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Alaska', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Alaska</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Hawaii"><img class="coinSwitch" src="../img/<?php echo $collectionRolls->getMintRollImg('Hawaii', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Hawaii </td>
  </tr>
 </table>


 