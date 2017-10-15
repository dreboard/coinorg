<div class="well well-sm hidden-xs">
 <table class="table wellTbl">
  <tr class="setSixRow">
    <td>First Day </td>
    <td>Folders</td>
    <td> Rolls</td>
    <td> Mint Bags</td>
    <td> Boxes</td>
    <td> Certified</td>
  </tr>
  <tr class="setSixRow">
    <td><a href="viewFirstDayType.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></a></td>
    <td><a href="coinTypeFolders.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></a></td>
    <td><a href="coinTypeRolls.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getCoinRollCountByType($coinType, $userID) ?></a></td>
    <td><a href="viewBagReport.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getCoinBagCountByType($coinType, $userID) ?></a></td>
    <td><a href="coinTypeBoxes.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getCoinBoxCountByType($coinType, $userID) ?></a></td>
    <td><a href="viewCertTypeReport.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getCertCollectionCountByType($userID, $coinType) ?></a></td>
   </tr>
</table></div>

<!-- Single button -->
<div class="btn-group visible-xs">
<select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Other Views</option>
          <option value="viewFirstDayType.php?coinType=<?php echo $_GET['coinType']; ?>">First Day Covers <?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></option>
    <option value="coinTypeFolders.php?coinType=<?php echo $_GET['coinType']; ?>">Folders <?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></option>
   <option value="coinTypeRolls.php?coinType=<?php echo $_GET['coinType']; ?>">Rolls <?php echo $collection->getCoinRollCountByType($coinType, $userID) ?></option>
    <option value="viewBagReport.php?coinType=<?php echo $_GET['coinType']; ?>">Mint Bags <?php echo $collection->getCoinBagCountByType($coinType, $userID) ?></option>
    <option value="coinTypeBoxes.php?coinType=<?php echo $_GET['coinType']; ?>">Boxes <?php echo $collection->getCoinBoxCountByType($coinType, $userID) ?></option>
    <option value="viewCertTypeReport.php?coinType=<?php echo $_GET['coinType']; ?>">Certified <?php echo $collection->getCertCollectionCountByType($userID, $coinType) ?></option>  
</select>      
</div>

<div class="visible-xs"><br /></div>
<h3>By State Collection</h3>
<div class="table-responsive">
<table class="table">
  <tr align="center" valign="top" class="setFiveRow"> 
  <td><a href="viewCoinDesign.php?design=Delaware"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Delaware', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Delaware</span> 
</td>
  <td><a href="viewCoinDesign.php?design=Pennsylvania"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Pennsylvania', $userID); ?>" alt="" width="100" height="100" /></a><br />
Pennsylvania</td>
  
<td><a href="viewCoinDesign.php?design=New_Jersey"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('New Jersey', $userID); ?>" alt="" width="100" height="100" /></a><br />
  New Jersey</td>
  
<td><a href="viewCoinDesign.php?design=Georgia"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Georgia', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Georgia</td>
  
<td><a href="viewCoinDesign.php?design=Connecticut"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Connecticut', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Connecticut </td>
  </tr>
  
<tr align="center" valign="top" class="setFiveRow">  
  <td><a href="viewCoinDesign.php?design=Massachusetts"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Massachusetts', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Massachusetts</span> 
</td>
  <td><a href="viewCoinDesign.php?design=Maryland"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Maryland', $userID); ?>" alt="" width="100" height="100" /></a><br />
Maryland</td>
  
<td><a href="viewCoinDesign.php?design=South_Carolina"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('South Carolina', $userID); ?>" alt="" width="100" height="100" /></a><br />
  South Carolina</td>
  
<td><a href="viewCoinDesign.php?design=New_Hampshire"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('New Hampshire', $userID); ?>" alt="" width="100" height="100" /></a><br />
  New Hampshire</td>
  
<td><a href="viewCoinDesign.php?design=Virginia"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Virginia', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Virginia </td>
  </tr>
  
<tr align="center" valign="top" class="setFiveRow"> 
  <td><a href="viewCoinDesign.php?design=New_York"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('New York', $userID); ?>" alt="" width="100" height="100" /></a><br />
  New York</td>
  <td><a href="viewCoinDesign.php?design=North_Carolina"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('North Carolina', $userID); ?>" alt="" width="100" height="100" /></a><br />
North Carolina</td>
  
<td><a href="viewCoinDesign.php?design=Rhode_Island"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Rhode Island', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Rhode Island</td>
  
<td><a href="viewCoinDesign.php?design=Vermont"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Vermont', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Vermont</td>
  
<td><a href="viewCoinDesign.php?design=Kentucky"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Kentucky', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Kentucky </td>
  </tr>
  
<tr align="center" valign="top" class="setFiveRow"> 
  <td><a href="viewCoinDesign.php?design=Tennessee"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Tennessee', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Tennessee</td>
  <td><a href="viewCoinDesign.php?design=Ohio"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Ohio', $userID); ?>" alt="" width="100" height="100" /></a><br />
Ohio</td>
  
<td><a href="viewCoinDesign.php?design=Louisiana"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Louisiana', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Louisiana</td>
  
<td><a href="viewCoinDesign.php?design=Indiana"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Indiana', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Indiana</td>
  
<td><a href="viewCoinDesign.php?design=Mississippi"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Mississippi', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Mississippi </td>
  </tr>
  
<tr align="center" valign="top" class="setFiveRow"> 
  <td><a href="viewCoinDesign.php?design=Illinois"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Illinois', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Illinois</td>
  <td><a href="viewCoinDesign.php?design=Alabama"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Alabama', $userID); ?>" alt="" width="100" height="100" /></a><br />
Alabama</td>
  
<td><a href="viewCoinDesign.php?design=Maine"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Maine', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Maine</td>
  
<td><a href="viewCoinDesign.php?design=Missouri"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Missouri', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Missouri</td>
  
<td><a href="viewCoinDesign.php?design=Arkansas"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Arkansas', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Arkansas </td>
  </tr>
  
<tr align="center" valign="top" class="setFiveRow"> 
  <td><a href="viewCoinDesign.php?design=Michigan"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Michigan', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Michigan</span> 
</td>
  <td><a href="viewCoinDesign.php?design=Florida"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Florida', $userID); ?>" alt="" width="100" height="100" /></a><br />
Florida</td>
  
<td><a href="viewCoinDesign.php?design=Texas"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Texas', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Texas</td>
  
<td><a href="viewCoinDesign.php?design=Iowa"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Iowa', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Iowa</td>
  
<td><a href="viewCoinDesign.php?design=Wisconsin"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Wisconsin', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Wisconsin </td>
  </tr>
  
<tr align="center" valign="top" class="setFiveRow">  
  <td><a href="viewCoinDesign.php?design=California"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('California', $userID); ?>" alt="" width="100" height="100" /></a><br />
  California</td>
  <td><a href="viewCoinDesign.php?design=Minnesota"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Minnesota', $userID); ?>" alt="" width="100" height="100" /></a><br />
Minnesota</td>
  
<td><a href="viewCoinDesign.php?design=Oregon"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Oregon', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Oregon</td>
  
<td><a href="viewCoinDesign.php?design=Kansas"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Kansas', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Kansas</td>
  
<td><a href="viewCoinDesign.php?design=West_Virginia"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('West Virginia', $userID); ?>" alt="" width="100" height="100" /></a><br />
  West Virginia </td>
  </tr>
  
<tr align="center" valign="top" class="setFiveRow"> 
  <td><a href="viewCoinDesign.php?design=Nevada"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Nevada', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Nevada</td>
  <td><a href="viewCoinDesign.php?design=Nebraska"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Nebraska', $userID); ?>" alt="" width="100" height="100" /></a><br />
Nebraska</td>
  
<td><a href="viewCoinDesign.php?design=Colorado"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Colorado', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Colorado</td>
  
<td><a href="viewCoinDesign.php?design=North_Dakota"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('North Dakota', $userID); ?>" alt="" width="100" height="100" /></a><br />
  North Dakota</td>
  
<td><a href="viewCoinDesign.php?design=South_Dakota"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('South Dakota', $userID); ?>" alt="" width="100" height="100" /></a><br />
  South Dakota </td>
  </tr>
  
<tr align="center" valign="top" class="setFiveRow"> 
  <td><a href="viewCoinDesign.php?design=Montana"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Montana', $userID); ?>" alt="" width="100" height="100" /></a><br />
 Montana</td>
  <td><a href="viewCoinDesign.php?design=Washington"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Washington', $userID); ?>" alt="" width="100" height="100" /></a><br />
Washington</td>
  
<td><a href="viewCoinDesign.php?design=Idaho"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Idaho', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Idaho</td>
  
<td><a href="viewCoinDesign.php?design=Wyoming"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Wyoming', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Wyoming</td>
  
<td><a href="viewCoinDesign.php?design=Utah"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Utah', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Utah </td>
  </tr>
  
<tr align="center" valign="top" class="setFiveRow"> 
  <td><a href="viewCoinDesign.php?design=Oklahoma"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Oklahoma', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Oklahoma</td>
  <td><a href="viewCoinDesign.php?design=New_Mexico"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('New Mexico', $userID); ?>" alt="" width="100" height="100" /></a><br />
New Mexico</td>
  
<td><a href="viewCoinDesign.php?design=Arizona"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Arizona', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Arizona</td>
  
<td><a href="viewCoinDesign.php?design=Alaska"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Alaska', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Alaska</td>
  
<td><a href="viewCoinDesign.php?design=Hawaii"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Hawaii', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Hawaii </td>
  </tr>
</table>
 <hr />
