<h3>General Reports</h3>
<div class="table-responsive hidden-xs">
<table class="table setFiveRow table-condensed">
  <tr>
    <td><a role="button" class="btn btn-default btn-block" href="viewListReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Report View</a></td>
    <td><a role="button" class="btn btn-default btn-block" href="viewCoinType.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">View Coins</a></td>
    <td><a role="button" class="btn btn-default btn-block" href="viewGradeReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Grade Report</a></td>
    <td><a role="button" class="btn btn-default btn-block" href="viewTypeFinance.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>&amp;year=<?php echo $year ?>">Finance Report</a></td>
    <td><a role="button" class="btn btn-default btn-block" href="viewCoinFolder.php?coinType=<?php echo $coinCatLink ?>&page=1"> Album Views</a></td>
  </tr>
  <tr>
    <td><a role="button" class="btn btn-default btn-block" href="viewCertTypeReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Certified Only </a></td>
    <td><a role="button" class="btn btn-default btn-block" href="viewList.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Check List</a></td>
    <td><a role="button" class="btn btn-default btn-block" href="viewProgressList.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Date Sets</a></td>
    <td><a role="button" class="btn btn-default btn-block" href="coinTypeVariety.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Varieties</a></td>
    <td><a role="button" class="btn btn-default btn-block" href="_downloadType.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Download</a></td>
  </tr>
  <tr>
    <td><a role="button" class="btn btn-default btn-block" href="viewKeyTypeReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Key Report </a></td>
    <td><a role="button" class="btn btn-default btn-block" href="viewUnknownType.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Unknown Dates</a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>

<div class="visible-xs">    
<a role="button" class="btn btn-default btn-lg btn-block" href="viewListReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Report View</a>
<a role="button" class="btn btn-default btn-lg btn-block" href="viewCoinType.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">View Coins</a>
    <a role="button" class="btn btn-default btn-lg btn-block" href="viewGradeReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Grade Report</a>
    <a role="button" class="btn btn-default btn-lg btn-block" href="viewTypeFinance.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>&amp;year=<?php echo $year ?>">Finance Report</a>
    <a role="button" class="btn btn-default btn-lg btn-block" href="viewCoinFolder.php?coinType=<?php echo $coinCatLink ?>&page=1"> Album Views</a>
    <a role="button" class="btn btn-default btn-lg btn-block" href="viewCertTypeReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Certified Only </a>
    <a role="button" class="btn btn-default btn-lg btn-block" href="viewList.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Check List</a>
    <a role="button" class="btn btn-default btn-lg btn-block" href="viewProgressList.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Date Sets</a>
    <a role="button" class="btn btn-default btn-lg btn-block" href="coinTypeVariety.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Varieties</a>
    <a role="button" class="btn btn-default btn-lg btn-block" href="_downloadType.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Download</a>
    <a role="button" class="btn btn-default btn-lg btn-block" href="viewKeyTypeReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Key Report </a>
    <a role="button" class="btn btn-default btn-lg btn-block" href="viewUnknownType.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Unknown Dates</a>
    <br />
</div>

<?php if (in_array($coinType, $bulkTypes)) {?>
<h3>Bulk Reports</h3>

<div class="row">
<div class="col-md-3"><a role="button" class="btn btn-default btn-block" href="coinTypeRolls.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Coin Rolls</a></div>

<div class="col-md-3"><a role="button" class="btn btn-default btn-block" href="coinTypeFolders.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Folders </a></div>

<div class="col-md-3"><a role="button" class="btn btn-default btn-block" href="viewBagReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>"> Bags</a></div>

<div class="col-md-3"><a role="button" class="btn btn-default btn-block" href="viewCoinFolder.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>"> Boxes</a></div>
</div>
 <?php } ?> 


<h3>Supplemental</h3>
<?php if (in_array($coinType, $vamTypes)) {?>
<a role="button" class="btn btn-default btn-block" href="vamReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Vam Report</a><br />
 <?php } else { echo ''; }  ?>   

<?php if (in_array(str_replace('_', ' ', $_GET["coinType"]), $colorTypes)) {?>
<a role="button" class="btn btn-default btn-block" href="colorReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Color Report</a><br />
<?php } else { echo ''; }  ?>   

<?php if (str_replace('_', ' ', $_GET["coinType"]) == 'Roosevelt Dime') {?>
<a role="button" class="btn btn-default btn-block" href="rooseveltBandReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Full Bands</a><br />
<?php } else { echo ''; }  ?>   

<?php if (str_replace('_', ' ', $_GET["coinType"]) == 'Winged Liberty Dime') {?>
<a role="button" class="btn btn-default btn-block" href="mercuryBandReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Full Bands</a><br />
<?php } else { echo ''; }  ?>   

<?php if (str_replace('_', ' ', $_GET["coinType"]) == 'Franklin Half Dollar') {?>
<a role="button" class="btn btn-default btn-block" href="franklinBellReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Full Bell Lines</a><br />
<?php } else { echo ''; }  ?>   

<?php if (str_replace('_', ' ', $_GET["coinType"]) == 'Standing Liberty') {?>
<a role="button" class="btn btn-default btn-block" href="fullHeadReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">Full Head Report</a><br />
<?php } else { echo ''; }  ?>   


<div class="row">
  <div class="col-md-4"><a role="button" class="btn btn-default btn-block btn-success" href="addCoinType.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>"><span class="glyphicon glyphicon-plus"></span> Add New Coin</a></div>
  <div class="col-md-4">
    <div class="visible-xs">    
    <br />
</div>
  <form action="" method="post" class="form-inline">
      <input name="coinType" type="hidden" value="<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>" />
      <button type="submit" class="btn btn-default btn-block btn-danger" name="deleteTypeBtn" id="deleteTypeBtn" onclick="return confirm('Delete All <?php echo $coinType ?> Coins?');"><span class="glyphicon glyphicon-trash"></span> Remove All Coins</button>
    </form></div>
  <div class="col-md-4">
  
  <div class="form-group">
    <div class="visible-xs">    
    <br />
</div>
  <select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
  <option value="<?php echo $CoinTypes->getCoinTypeFirstYear($coinType); ?>" selected="selected">View Coin By Year</option>
<?php
$stmt = $db->dbhc->prepare("SELECT DISTINCT coinYear FROM coins WHERE coinType = :coinType AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
$stmt->bindValue(':coinType', str_replace('_', ' ', $_GET['coinType']), PDO::PARAM_STR);
$stmt->execute();
//$sql = mysql_query("SELECT DISTINCT coinYear FROM coins WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $field = $stmt->fetch(PDO::FETCH_ASSOC)) {
		echo '<option value="viewCoinYear.php?year='.$field['coinYear'].'&coinType='.$_GET["coinType"].' ">'.$field['coinYear'].'</option>';
	}	
?>
</select>
</div></div>
</div>
