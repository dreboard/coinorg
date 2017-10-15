<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Mintset Report</title>
<script type="text/javascript">
$(document).ready(function(){

$(".priceListTbl input .collectCount, .priceListTbl input #rollsValTotal").each(function(){
  $(this).val(parseFloat($(this).val()).toFixed(2));
});


$("#viewGraphBtn").click(function() {
   window.location = 'reportNickelGraph.php';
});

/*var total = 0;
$(".smallCentCollectCount").each(function() {
	if (!isNaN(this.value) && this.value.length != 0) {
		total += parseFloat(this.value);
	}
});
$("#smallCentCollectTotals").val(total);
*/

var rollFaceVal = $("#rollsCollectTotal").val() * 0.5;
$("#rollFaceVal").val("$"+rollFaceVal);

});
</script>  


<style type="text/css">
.gradeNums td {padding:5px; font-size:120%;}

</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1>My Mint Sets</h1>
<div class="spacer"></div>
  <div class="roundedWhite">
    
    <table width="100%" border="0">
     <tr align="center">
       <td colspan="4" align="left"><h3><strong>Certified Sets</strong></h3></td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     <tr align="center">
       <td width="11%"><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><strong>PCGS</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=ICG&coinCategory=<?php echo $categoryLink; ?>"><strong>ICG</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=NGC&coinCategory=<?php echo $categoryLink; ?>"><strong>NGC</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=ANACS&coinCategory=<?php echo $categoryLink; ?>"><strong>ANACS</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=SEGS&coinCategory=<?php echo $categoryLink; ?>"><strong>SEGS</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=PCI&coinCategory=<?php echo $categoryLink; ?>"><strong>PCI</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=ICCS&coinCategory=<?php echo $categoryLink; ?>"><strong>ICCS</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=HALLMARK&coinCategory=<?php echo $categoryLink; ?>"><strong>HALLMARK</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=NTC&coinCategory=<?php echo $categoryLink; ?>"><strong>NTC</strong></a></td>
     </tr>
     <tr align="center">
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('PCGS', 'Small Cent' ,$userID); ?></a></td>
       <td><?php echo $collection->getProGrader('ICG', 'Small Cent' ,$userID); ?></td>
       <td><?php echo $collection->getProGrader('NGC', 'Small Cent' ,$userID); ?></td>
       <td><?php echo $collection->getProGrader('ANACS', 'Small Cent' ,$userID); ?></td>
       <td><?php echo $collection->getProGrader('SEGS', 'Small Cent',$userID); ?></td>
      <td><?php echo $collection->getProGrader('PCI', 'Small Cent',$userID); ?></td>
       <td><?php echo $collection->getProGrader('ICCS','Small Cent' ,$userID); ?></td>
      <td><?php echo $collection->getProGrader('HALLMARK', 'Small Cent' ,$userID); ?></td>
      <td><?php echo $collection->getProGrader('NTC','Small Cent' ,$userID); ?></td>
     </tr>
   </table>
   <br class="clear"> 
   <a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a>
   <table width="100%" border="1" class="reportTbl" cellpadding="3">
    <tr class="darker">
      <td colspan="8" valign="middle"><h3>Mint Issued Sets
        <select id="mintsetID" name="mintsetID" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
          <option value="">View Set</option>
          <?php 
	$getcoinType = mysql_query("SELECT * FROM mintset ORDER BY setName DESC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$mintsetID = $row['mintsetID'];
		$setName = $row['setName'];
	echo '<option value="viewSet.php?mintsetID=' . $mintsetID . '">' . $setName . '</option>';

	}
?>
        </select>
      </h3></td>
      </tr>
    <tr class="darker">
      <td>Year</td>
      <td align="center">Mint </td>
      <td align="center">Proof </td>
      <td align="center">Silver Proof </td>
      <td align="center"> Prestige  </td>
      <td align="center"> Silver Premier </td>
      <td align="center"> 5 Piece Quarter </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="15%"><strong><a href="viewSetYear.php?year=1936">1936</a></strong></td>
      <td width="8%" align="center">&nbsp;</td>
      <td width="8%" align="center"><a href="viewSet.php?mintsetID=1"><?php echo $Mintset->getSetCount($mintsetID='1'); ?></a></td>
      <td width="13%" align="center">&nbsp;</td>
      <td width="11%" align="center">&nbsp;</td>
      <td width="14%" align="center">&nbsp;</td>
      <td width="13%" align="center">&nbsp;</td>
      <td width="18%" align="center">&nbsp;</td>
    </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1937">1937</a></strong></td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1938">1938</a></strong></td>
<td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=3" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='3'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1939">1939</a></strong></td>
<td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=4" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='4'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1940">1940</a></strong></td>
<td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=5" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='5'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1941">1941</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=6" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='6'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=297" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='297'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1942">1942</a> 5 Piece</strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='7'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=7" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='7'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1942">1942</a> 6 Piece</strong></td>
    <td align="center"><a href="viewSet.php?mintsetID=8" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='8'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1950">1950</a></strong></td>
<td align="center">X</td>
    <td align="center"><a href="viewSet.php?mintsetID=12" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='12'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1951">1951</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=14" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='14'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=13" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='13'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
    <tr>
    <td><strong><a href="viewSetYear.php?year=1952">1952</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=16" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='16'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=15" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='15'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1953">1953</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=18" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='18'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=17" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='17'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1954">1954</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=20" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='20'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=19" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='19'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1955">1955</a> Box</strong></td>
<td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=21" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='21'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1955">1955</a> Flat</strong></td>
<td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=22" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='22'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1956">1956</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=25" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='25'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=24" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='24'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1957">1957</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=27" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='27'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=26" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='26'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1958">1958</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=29" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='29'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=28" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='28'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1959">1959</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=31" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='31'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=30" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='30'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1960">1960</a> Large</strong></td>
<td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=32" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='32'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1960">1960</a> Small </strong></td>
<td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=33" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='33'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1960">1960</a></strong></td>
    <td align="center"><a href="viewSet.php?mintsetID=34" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='34'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1961">1961</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=36" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='36'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=35" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='35'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1962">1962</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=38" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='38'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=37" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='37'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1963">1963</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=40" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='40'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=39" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='39'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1964">1964</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=298" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='298'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=41" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='41'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1965">1965</a> Special Mint </strong></td>
<td align="center"><a href="viewSet.php?mintsetID=42" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='42'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1966">1966</a> Special Mint </strong></td>
<td align="center"><a href="viewSet.php?mintsetID=43" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='43'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1967">1967</a> Special Mint </strong></td>
<td align="center"><a href="viewSet.php?mintsetID=44" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='44'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1968">1968</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=45" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='45'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=46" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='46'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1969">1969</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=48" title="<?php echo $Mintset->getSetNicknameByID($mintsetID='48') ?>"><?php echo $Mintset->getSetCount($mintsetID='48'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=49" title="<?php echo $Mintset->getSetNicknameByID($mintsetID='49') ?>"><?php echo $Mintset->getSetCount($mintsetID='49'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1970">1970</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=53" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='53'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  
  <tr>
    <td><strong><a href="viewSetYear.php?year=1971">1971</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  
  <tr>
    <td><strong><a href="viewSetYear.php?year=1972">1972</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  
  <tr>
    <td><strong><a href="viewSetYear.php?year=1973">1973</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1974">1974</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1975">1975</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1976">1976</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1976">1976 3 Piece</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1977">1977</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1978">1978</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1979">1979</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1980">1980</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1981">1981</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1982">1982</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1983">1983</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1984">1984</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1985">1985</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1986">1986</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1987">1987</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1988">1988</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1989">1989</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1990">1990</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1991">1991</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
   <td><strong><a href="viewSetYear.php?year=1992">1992</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1993">1993</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
   <td><strong><a href="viewSetYear.php?year=1994">1994</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1995">1995</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1996">1996</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=177" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='177'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1997">1997</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1998">1998</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=1999">1999</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="viewSetYear.php?year=2000">2000</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
  </tr>
  
   <tr>
    <td><strong><a href="viewSetYear.php?year=2001">2001</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
  </tr>
  
    <tr>
    <td><strong><a href="viewSetYear.php?year=2002">2002</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
  </tr>
  
    <tr>
    <td><strong><a href="viewSetYear.php?year=2003">2003</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
  </tr>
  
    <tr>
    <td><strong><a href="viewSetYear.php?year=2004">2004</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
  </tr>
  
    <tr>
    <td><strong><a href="viewSetYear.php?year=2005">2005</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
  </tr>
  
    <tr>
    <td><strong><a href="viewSetYear.php?year=2006">2006</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
  </tr>
  
    <tr>
    <td><strong><a href="viewSetYear.php?year=2007">2007</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
  </tr>
  
    <tr>
    <td><strong><a href="viewSetYear.php?year=2008">2008</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
  </tr>
  
    <tr>
    <td><strong><a href="viewSetYear.php?year=2009">2009</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
  </tr>
  
    <tr>
    <td><strong><a href="viewSetYear.php?year=2010">2010</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
  </tr>
  
    <tr>
    <td><strong><a href="viewSetYear.php?year=2011">2011</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
  </tr> 
  
    <tr>
    <td><strong><a href="viewSetYear.php?year=2012">2012</a></strong></td>
<td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="viewSet.php?mintsetID=2" title="<?php echo $Mintset->getSetNicknameByID($mintsetID) ?>"><?php echo $Mintset->getSetCount($mintsetID='2'); ?></a></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr class="SemiKeyRow">
    <td colspan="8"><strong>Proof Sets</strong></td>
    </tr>
</table>
<p><input class="viewListBtns masterBtn" name="printSmallBtn" type="button" value="Print Small Cent Report"/ >&nbsp; | &nbsp;<input class="viewListBtns masterBtn" name="masterBtn" type="button" value="View Master Report"/ > or <select onChange="window.open(this.options[this.selectedIndex].value,'_top')">
<option selected="selected" value="">Quick Menu</option>
<optgroup label="Half Cents">
<option value="reportCent.php">All Cents</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Half_Cent&page=1">Liberty Cap</option>
<option value="viewListReport.php?coinType=Draped_Bust_Half_Cent&page=1">Draped Bust</option>
<option value="viewListReport.php?coinType=Classic_Head_Half_Cent&page=1">Classic Head</option>
<option value="viewListReport.php?coinType=Braided_Hair_Half_Cent&page=1">Braided Hair</option>
</optgroup>
<optgroup label="Large Cents">
<option value="reportCent.php">All Cents</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Large_Cent&page=1">Flowing Hair</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Large_Cent&page=1">Liberty Cap</option>
<option value="viewListReport.php?coinType=Draped_Bust_Large_Cent&page=1">Draped Bust</option>
<option value="viewListReport.php?coinType=Classic_Head_Large_Cent&page=1">Classic Head</option>
<option value="viewListReport.php?coinType=Coronet_Liberty_Head_Large_Cent&page=1">Coronet Liberty Head</option>
<option value="viewListReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent&page=1">Braided Hair Liberty Head</option>
</optgroup>
<optgroup label="Cents">
<option value="reportCent.php">All Cents</option>
<option value="viewListReport.php?coinType=Flying_Eagle&page=1">Flying Eagle Cent</option>
<option value="viewListReport.php?coinType=Indian_Head&page=1">Indian Head Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Wheat&page=1">Lincoln Wheat Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Memorial&page=1">Lincoln Memorial Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Bicentennial&page=1">Lincoln Bicentennial</option>
<option value="viewListReport.php?coinType=Union_Shield&page=1">Union Shield</option>
</optgroup>
<optgroup label="Two Cents">
<option value="Two_Cent">Two Cent Piece</option>
</optgroup>
<optgroup label="Three Cents">
<option value="Three_Cent">Three Cent Piece</option>
</optgroup>
<optgroup label="Half Dimes">
<option value="reportHalf_Dime.php">All Half Dimes</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Half_Dime&page=1">Flowing Hair</option>
<option value="viewListReport.php?coinType=Draped_Bust_Half_Dime&page=1">Draped Bust</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Half_Dime&page=1">Liberty Cap Half Dime</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Half_Dime&page=1">Seated Liberty Half Dime</option>
</optgroup>
<optgroup label="Nickels">
<option value="reportHalf.php">All Half Dollars</option>
<option value="viewListReport.php?coinType=Shield_Nickel&page=1">Flowing Hair Large Cent</option>
<option value="viewListReport.php?coinType=Indian_Head&page=1">Indian Head</option>
<option value="viewListReport.php?coinType=Lincoln_Wheat&page=1">Draped Bust Large Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Memorial&page=1">Classic Head Large Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Bicentennial&page=1">Lincoln Bicentennial Series</option>
<option value="viewListReport.php?coinType=Union_Shield&page=1">Union Shield</option>
</optgroup>
<optgroup label="Dimes">
<option value="viewListReport.php?coinType=reportHalf.php">All Half Dollars</option>
<option value="viewListReport.php?coinType=Drapped_Bust_Dime&page=1">Drapped Bust Dime</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Dime&page=1">Liberty Cap Dime</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Dime&page=1">Liberty Seated Dime</option>
<option value="viewListReport.php?coinType=Barber_Dime&page=1">Barber Dime</option>

<option value="viewListReport.php?coinType=Winged_Liberty_Dime&page=1">Winged Liberty Dime</option>
<option value="viewListReport.php?coinType=Roosevelt_Dime&page=1">Roosevelt Dime</option>
</optgroup>
<optgroup label="Twenty Cents">
<option value="Twenty Cents">Twenty Cent Piece</option>
</optgroup>
<optgroup label="Quarters">
<option value="reportHalf.php">All Half Dollars</option>
<option value="viewListReport.php?coinType=Draped_Bust_Quarter&page=1">Draped Bust Quarter</option>
<option value="viewListReport.php?coinType=Capped_Bust_Quarter&page=1">Capped Bust Quarter</option>
<option value="viewListReport.php?coinType=Liberty_Seated_Quarter&page=1">Liberty Seated Quarter</option>
<option value="viewListReport.php?coinType=Barber_Quarter&page=1">Barber Quarter</option>
<option value="viewListReport.php?coinType=Standing_Liberty&page=1">Standing Liberty</option>
<option value="viewListReport.php?coinType=Washington_Quarter&page=1">Washington Quarter</option>
<option value="viewListReport.php?coinType=State Quarter&page=1">State Quarter</option>
<option value="viewListReport.php?coinType=District_of_Columbia_and_US_Territories&page=1">D.C. and U. S. Territories</option>
<option value="viewListReport.php?coinType=America the Beautiful Quarter&page=1">America the Beautiful Quarter</option>
</optgroup>
<optgroup label="Half Dollars">
<option value="reportHalf.php">All Half Dollars</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Half_Dollar&page=1">Flowing Hair Half</option>
<option value="viewListReport.php?coinType=Draped_Bust_Half_Dollar&page=1">Draped Bust Half</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Half_Dollar&page=1">Liberty Cap Half</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Half_Dollar&page=1">Seated Liberty Half</option>
<option value="viewListReport.php?coinType=Barber_Half_Dollar&page=1">Barber Half</option>
<option value="viewListReport.php?coinType=Walking_Liberty&page=1">Walking Liberty Half</option>
<option value="viewListReport.php?coinType=Franklin_Half_Dollar&page=1">Franklin Half</option>
<option value="viewListReport.php?coinType=Kennedy_Half_Dollar&page=1">Kennedy Half</option>
</optgroup>
<optgroup label="Dollars">
<option value="reportHalf.php">All Half Dollars</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Dollar&page=1">Flowing Hair Dollar</option>
<option value="viewListReport.php?coinType=Draped_Bust_Dollar&page=1">Draped Bust Dollar</option>
<option value="viewListReport.php?coinType=Gobrecht_Dollar&page=1">Gobrecht Dollar</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Dollar&page=1">Seated Liberty Dollar</option>
<option value="viewListReport.php?coinType=Trade_Dollar&page=1">Trade Dollar</option>
<option value="viewListReport.php?coinType=Morgan_Dollar&page=1">Morgan Dollar</option>
<option value="viewListReport.php?coinType=Peace_Dollar&page=1">Peace Dollar</option>
<option value="viewListReport.php?coinType=Eisenhower_Dollar&page=1">Eisenhower Dollar</option>
<option value="viewListReport.php?coinType=Susan_B_Anthony_Dollar&page=1">Susan B. Anthony</option>
<option value="viewListReport.php?coinType=Sacagawea_Dollar&page=1">Sacagawea/Native American</option>
<option value="viewListReport.php?coinType=Presidential_Dollar&page=1">Presidential Dollar</option>
</optgroup>
</select> 
  <a href="viewCollectionSubType.php?coinSubCategory=Small_Cent">View Cent Collection </a><br>
<a class="topLink" href="#top">Top</a></p>
</div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>