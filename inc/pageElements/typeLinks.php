<h3>General Reports</h3>
  <select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
  <option selected="selected">Coin Type Reports</option>
<option value="viewListReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Main View</option>
<option value="viewCoinType.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">View Coins</option>
<option value="viewGradeReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Grade Report</option>
<option value="viewTypeFinance.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>&amp;year=<?php echo $year ?>">Finance Report</option>
<option value="viewCoinFolder.php?coinType=<?php echo $coinCatLink ?>&page=1"> Album Views</option>
<option value="viewCertTypeReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Certified Only</option>
<option value="viewList.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Check List</option>
<option value="viewProgressList.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Date Sets</option>
<option value="coinTypeVariety.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Varieties</option>
<option value="_downloadType.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Download</option>
<option value="viewKeyTypeReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Key Report</option>
<option value="viewUnknownType.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Unknown Dates</option>
</select>

<br />
<select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
  <option value="<?php echo $CoinTypes->getCoinTypeFirstYear($coinType); ?>" selected="selected">View Coin By Year</option>
<?php 
$sql = mysql_query("SELECT DISTINCT coinYear FROM coins WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $field = mysql_fetch_assoc($sql)) {
		echo '<option value="viewCoinYear.php?year='.$field['coinYear'].'&coinType='.$_GET["coinType"].' ">'.$field['coinYear'].'</option>';
	}	
?>
</select>
<br />
<?php if (in_array($coinType, $bulkTypes)) {?>
  <select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
  <option selected="selected">Bulk Reports</option>
<option value="coinTypeRolls.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Coin Rolls</option>
<option value="coinTypeFolders.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Folders</option>
<option value="viewBagReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Bags</option>
<option value="coinTypeFolders.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Boxes</option>
</select>
 <?php } ?> 