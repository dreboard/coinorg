<table width="100%" border="0" id="coinIdTbl">
    <tr align="center">
      <td width="3%" align="left"><img src="../img/<?php echo $coinVersion ?>.jpg" alt="11" width="22" height="22" align="absmiddle" /></td>
      <td width="15%" align="left"><a class="brownLink" href="viewCoin.php?coinID=<?php echo $coinID ?>"><strong>Main Report</strong></a></td>
    <td width="3%" align="left"><a href="viewCoinGrade.php?coinID=<?php echo $coinID ?>" class="brownLink"><img src="../img/grades.jpg" alt="graded" width="25" height="25" align="absmiddle" /></a></td>
    <td width="14%" align="left"><a href="viewCoinGrade.php?coinID=<?php echo $coinID ?>" class="brownLink"><strong>Grade Report</strong></a></td>
    <td width="5%" align="center"><a href="viewCoinFinance.php?coinID=<?php echo $coinID ?>&year=<?php echo $year ?>"><img src="../img/financeIcon.jpg" alt="" width="32" height="25" align="absmiddle" /></a></td>
    <td width="15%" align="left"><a href="viewCoinFinance.php?coinID=<?php echo $coinID ?>&year=<?php echo $year ?>"><strong><span class="brownLink">Financial Report</span></strong></a></td>
    <td width="3%" align="left"><a href="viewCoinHistory.php?coinID=<?php echo $coinID ?>"><img src="../img/timeIcon.jpg" width="25" height="25" align="absmiddle" /></a></td>
    <td width="15%" align="left"><a href="viewCoinHistory.php?coinID=<?php echo $coinID ?>"><strong>Collection History</strong></a></td>
    <td align="center"><?php if($coin->getCoinYear() <= date('Y')){ ?><img src="../img/addIcon.jpg" width="20" height="20" /><?php } else { echo '';} ?></td>
    <td align="left"  class="brownLinkBold">
    <?php if($coin->getCoinYear() <= date('Y')){ ?>
    <a href="addCoinByID.php?coinID=<?php echo $coinID ?>">Coin</a> | <a href="addCoinTypeMultiByID.php?coinID=<?php echo $coinID ?>">Multiple</a>
  <?php switch($coin->getCoinMetal()){
   case 'Gold':
   case 'Platinum':
   echo '';
   break;
   default:
   echo ' | <a href="addRollByCoinID.php?coinID='.$coinID.'">Roll</a>';
	} ?>
    <?php } else { echo '';} ?> 
	 </td>
    </tr>
  
  <tr align="center">
    <td width="3%" align="left"><strong><a href="viewCoinCert.php?coinID=<?php echo $coinID ?>"><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /></a></strong></td>
    <td width="15%" align="left"><strong><a href="viewCoinCert.php?coinID=<?php echo $coinID ?>">Certified</a> <?php echo $collection->getCoinCertifiedCountByID($coinID, $userID) ?></strong></td>
    <td width="3%" align="left"><strong><a href="viewCoinRoll.php?coinID=<?php echo $coinID ?>"><img src="../img/rollReportIcon.jpg" width="21" height="20" align="absmiddle" /></a></strong></td>
    <td width="14%" align="left"><strong><a href="viewCoinRoll.php?coinID=<?php echo $coinID ?>">Rolls </a><?php echo $collection->getCoinRollCountByID($coinID, $userID) ?></strong></td>
    <td width="5%" align="center"><strong><a href="viewCoinError.php?coinID=<?php echo $coinID ?>"><img src="../img/errorIcon.jpg" width="20" height="20" align="absmiddle" /></a></strong></td>
    <td width="15%" align="left"><strong><a href="viewCoinError.php?coinID=<?php echo $coinID ?>"> Errors </a><?php echo $Errors->getErrorTypeCoinCount($coinID, $userID) ?></strong></td>
    <td width="3%" align="left"><strong><a href="viewCoinBag.php?coinID=<?php echo $coinID ?>v"><img src="../img/bagIcon2.jpg" width="21" height="20" align="absmiddle" /></a></strong></td>
    <td width="15%" align="left"><strong><a href="viewCoinBag.php?coinID=<?php echo $coinID ?>v">Bags </a><?php echo $collectionBags->getBagCountByCoin($userID, $coinID) ?></strong></td>
    <td width="4%" align="center"><strong><a href="viewCoinBox.php?coinID=<?php echo $coinID ?>"><img src="../img/boxIcon2.jpg" width="21" height="20" align="absmiddle" /></a></strong></td>
    <td width="23%" align="left"><strong><a href="viewCoinBox.php?coinID=<?php echo $coinID ?>">Boxes </a><?php echo $CollectionBoxes->getBoxCountByCoin($userID, $coinID); ?></strong></td>
  </tr>
  
  <?php if ($coin->getCoinType() == 'Franklin Half Dollar' && $coin->getCoinStrike() == 'Business') {?>  
  <tr align="center">
    <td align="left"><img src="../img/Franklin_Half_Dollar.jpg" alt="11" width="20" height="20" align="absmiddle" /></td>
    <td colspan="9" align="left"><a href="fullBellReport.php?coinID=<?php echo intval($_GET['coinID']); ?>" class="darker">Full Bell Lines Report</a></td>
  </tr>
<?php } else { echo ''; }  ?>
  
  <?php if (in_array(str_replace('_', ' ', $coin->getCoinCategory()), $colorCategories)) {?>  
  <tr align="center">
    <td align="left"><img src="../img/Lincoln_Red.jpg" alt="11" width="20" height="20" align="absmiddle" /></td>
    <td align="left"><a href="viewCoinColor.php?coinID=<?php echo intval($_GET['coinID']); ?>" class="darker">Color Report</a></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
<?php } else { echo ''; }  ?>

  <?php if ($coin->getCoinType() == 'Roosevelt Dime' && $coin->getCoinStrike() == 'Business') {?>  
  <tr align="center">
    <td align="left"><img src="../img/Roosevelt_Dime.jpg" alt="11" width="20" height="20" align="absmiddle" /></td>
    <td colspan="9" align="left"><a href="viewRooseveltBandReport.php?coinID=<?php echo intval($_GET['coinID']); ?>" class="darker">Full Bands Report</a></td>
  </tr>
<?php } else { echo ''; }  ?>

  <?php if ($coin->getCoinType() == 'Winged Liberty Dime' && $coin->getCoinStrike() == 'Business') {?>  
  <tr align="center">
    <td align="left"><img src="../img/Winged_Liberty_Dime.jpg" alt="11" width="20" height="20" align="absmiddle" /></td>
    <td colspan="9" align="left"><a href="viewMercuryBandReport.php?coinID=<?php echo intval($_GET['coinID']); ?>" class="darker">Full Bands Report</a></td>
  </tr>
<?php } else { echo ''; }  ?>


  <?php if ($coin->getCoinType() == 'Standing Liberty' && $coin->getCoinStrike() == 'Business') {?>  
  <tr align="center">
    <td align="left"><img src="../img/Standing_Liberty.jpg" alt="11" width="20" height="20" align="absmiddle" /></td>
    <td colspan="9" align="left"><a href="fullHeadCoinReport.php?coinID=<?php echo intval($_GET['coinID']); ?>" class="darker">Full Head Report</a></td>
  </tr>
<?php } else { echo ''; }  ?>


  <?php if ($coin->getVarietyType() != 'None') {?>  
  
  <tr align="center">
    <td align="left"><img src="../img/Standing_Liberty.jpg" alt="11" width="20" height="20" align="absmiddle" /></td>
    <td colspan="9" align="left"><a href="coinDoubleDieReport.php?coinID=<?php echo intval($_GET['coinID']); ?>" class="darker">Double Die Listings</a></td>
  </tr>
  
  
  
  
  
<?php } else { echo ''; }  ?>

  <tr align="center">
    <td colspan="4" align="left">&nbsp;</td>
    <td colspan="6" align="center">&nbsp;</td>
    </tr>
  <tr align="center">
    <td colspan="4" align="left">
  <?php
switch($coin->getDesign()){
	case 'Seated Liberty':
	echo '
	<tr align="center">
    <td colspan="4" align="left">
	<a class="darker" href="reportDesign.php?design=Seated_Liberty">View Seated Liberty Report</a>
	    </td>
    <td colspan="6" align="center">&nbsp;</td>
  </tr>';
	break;
	case 'Barber':
	echo '	<tr align="center">
    <td colspan="4" align="left"><a class="darker" href="reportDesign.php?design=Barber">View Barber Report</a>
	    </td>
    <td colspan="6" align="center">&nbsp;</td>
  </tr>';
	break;	
	case 'Flowing Hair':
	echo '	<tr align="center">
    <td colspan="4" align="left"><a class="darker" href="reportDesign.php?design=Flowing_Hair">View Flowing Hair Report</a>
	    </td>
    <td colspan="6" align="center">&nbsp;</td>
  </tr>';
	break;	
	case 'Draped Bust':
	echo '	<tr align="center">
    <td colspan="4" align="left"><a class="darker" href="reportDesign.php?design=Draped_Bust">View Draped Bust Report</a>
	    </td>
    <td colspan="6" align="center">&nbsp;</td>
  </tr>';
	break;
	case 'Liberty Cap':
	echo '	<tr align="center">
    <td colspan="4" align="left"><a class="darker" href="reportDesign.php?design=Liberty_Cap">View Liberty Cap Report</a>
	    </td>
    <td colspan="6" align="center">&nbsp;</td>
  </tr>';
	break;	
	default:
	echo '';
	break;									
}	


?> 

</table>