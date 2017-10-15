<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

//$design = 'Seated Liberty';
if (isset($_GET['design'])) { 
$design = str_replace('_', ' ', $_GET['design']);
$designLink = strip_tags($_GET['design']);
$designURL = str_replace(' ', '', $_GET['design']);
$designQuery = str_replace('_', ' ', $_GET['design']);
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $design ?> Grade Report</title>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">

          // Load the Visualization API and the piechart package.
          google.load('visualization', '1.0', {'packages':['corechart']});

          // Set a callback to run when the Google Visualization API is loaded.
          google.setOnLoadCallback(drawChart);

          // Callback that creates and populates a data table,
          // instantiates the pie chart, passes in the data and
          // draws it.
          function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Grade Percentage');    
            data.addColumn('number', 'Slices');
            data.addRows([
              ['Ungraded', <?php echo $CoinDesign->getNoGradeDesignCount($design, $userID); ?>],
              ['Graded',  <?php echo $CoinDesign->getGradeDesignCount($design, $userID); ?>]
            ]);
			
			var data2 = new google.visualization.DataTable();
            data2.addColumn('string', 'Grading');
            data2.addColumn('number', 'Slices');
            data2.addRows([
              ['Certified', <?php echo $CoinDesign->getDesignProGradeCount($design, $userID) ?>],
              ['Graded', <?php echo $CoinDesign->getDesignNoProGradeCount($design, $userID); ?>]
            ]);
            var data3 = new google.visualization.DataTable();
            data3.addColumn('string', 'By Type');
            data3.addColumn('number', 'Slices');
            data3.addRows([
			<?php
			$i = 1;
			$coinTypeGroup = $CoinDesign->getCoinTypeByDesignArray($designQuery);
			foreach ($coinTypeGroup as $coinType){
			echo '
			["'.$coinType.'", '.$collection->getNoGradeTypeCount($coinType, $userID).'],';
			}
			?>			

            ]);
        var data4 = google.visualization.arrayToDataTable([
          ['Type', 'Number Graded'],
          ['PCGS',  <?php echo $CoinDesign->getProGrader('PCGS', $design ,$userID); ?>],
          ['ICG',  <?php echo $CoinDesign->getProGrader('ICG', $design ,$userID); ?>],
          ['NGC',  <?php echo $CoinDesign->getProGrader('NGC', $design ,$userID); ?>],
          ['ANACS', <?php echo $CoinDesign->getProGrader('ANACS', $design ,$userID); ?>],
		  ['SEGS', <?php echo $CoinDesign->getProGrader('SEGS', $design ,$userID); ?>],
          ['PCI', <?php echo $CoinDesign->getProGrader('PCI', $design ,$userID); ?>],
          ['ICCS',<?php echo $CoinDesign->getProGrader('ICCS', $design ,$userID); ?>],
          ['HALLMARK', <?php echo $CoinDesign->getProGrader('HALLMARK', $design ,$userID); ?>],
          ['NTC',<?php echo $CoinDesign->getProGrader('NTC', $design ,$userID); ?>]
        ]);
            // Set chart options

            var options = {
						   slices: {0: {color: '#b39477'}, 1: {color: '#907760'}},
						   is3D: true,
						   sliceVisibilityThreshold:0,
                           'height':180};
            // Set chart options
            var options2 = {
                           slices: {0: {color: '#b39477'}, 1: {color: '#907760'}},
						   is3D: true,
                           'height':180};
            var options3 = {
                           slices: {0: {color: '#e4c6aa'}, 1: {color: '#b89b79'}, 2: {color: '#b89b79'},3: {color: '#5a5245'}, 4: {color: '#b39477'}, 5: {color: '#906656'}},
						   is3D: true,
                           'height':180};
						   
          var options4 = {
          title: 'Certified By',
		  is3D: true,
		  colors: ['#b39477'],
          hAxis: {title: 'All <?php echo $designQuery ?>', titleTextStyle: {color: 'black'}}
        };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
            var chart2 = new google.visualization.PieChart(document.getElementById('chart_div2'));
            chart2.draw(data2, options2);
            var chart3 = new google.visualization.PieChart(document.getElementById('chart_div3'));
            chart3.draw(data3, options3);
            var chart4 = new google.visualization.ColumnChart(document.getElementById('chart_div4'));
            chart4.draw(data4, options4);
	  }
        </script>
<style type="text/css">


</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h2><img src="../img/<?php echo $designLink ?>.jpg" align="middle"> <?php echo $design ?> Grade Report </h2>

<table width="100%" class="clear" id="designLinksTbl">
  <tr id="reportListLinks">
  <td width="14%" class="darker"><a href="reportDesign.php?design=<?php echo $designLink ?>">Report</a></td>
     <td width="14%" class="darker"><a href="reportDesignCoins.php?design=<?php echo $designLink ?>">Coins</a></td>
    <td width="13%" class="darker"><a href="reportDesignYear.php?design=<?php echo $designLink ?>&setYear=<?php echo $CoinDesign->getDesignStartYear($design) ?>">Year Sets</a></td> 
    <td width="20%" class="darker"> <a href="reportDesignGrade.php?design=<?php echo $designLink ?>">Grade Report</a></td>
    <td width="14%" class="darker">
      <select name="designSel" id="designSel" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
        >
        <option value="" selected="selected">Switch Design</option>
        <option value="reportDesignCoins.php?design=Barber">Barber Coins</option>
        <option value="reportDesignCoins.php?design=Seated_Liberty">Seated Liberty Coins</option>
        <option value="reportDesignCoins.php?design=Flowing_Hair">Flowing Hair Coins</option>
        <option value="reportDesignCoins.php?design=Draped_Bust">Draped Bust Coins</option>
        <option value="reportDesignCoins.php?design=Liberty_Cap">Liberty Cap Coins</option>
      </select>
    </td>
 
  </tr>
  <tr align="center">
    <td class="darker"><h3><a href="viewDesignFolder.php?design=<?php echo $designLink ?>&page=1"><img src="../img/folderIcon.jpg" width="14" height="20" align="texttop" /> Folder View</a></h3></td>
    <td class="darker"><h3><a href="viewDesignErrors.php?design=<?php echo $designLink ?>"><img src="../img/errorIcon.jpg" width="20" height="20" align="absmiddle" /> Errors</a></h3></td>
    <td class="darker"><h3><a href="viewDesignList.php?design=<?php echo $designLink ?>"><img src="../img/checkList.jpg" width="21" height="20" align="texttop" /> Check List</a></h3></td>
    <td class="darker"><h3><a href="viewDesignCertList.php?design=<?php echo $designLink ?>"><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /> Certified Only</a></h3></td>
    <td class="darker">&nbsp;</td>
  </tr>
</table> 
<br />
  
  <div>
&nbsp;
</div>

<table width="100%" border="0">
  <tr>
    <td align="center" title="All Coins, Graded vs Not Graded"><strong><a href="reportDesignNoGrade.php?design=<?php echo $designLink ?>">Ungraded (<?php echo $CoinDesign->getNoGradeDesignCount($design, $userID); ?>)</a> / Graded (<?php echo $CoinDesign->getGradeDesignCount($design, $userID); ?>) </strong></td>
    <td align="center" title="All Graded Coins, Certified vs Raw"><strong>Graded &amp; Certified Coins (<?php echo $CoinDesign->getDesignProGradeCount($design, $userID) ?>)</strong></td>
    <td align="center"><strong><a href="reportDesignNoGrade.php?design=<?php echo $designLink ?>">Graded & Uncertified</a> By Type </strong></td>    
    </tr>
  <tr align="center" valign="top">
    <td width="33%"><div id="chart_div" class="miniGraphDiv"></div></td>
    <td width="33%"><div id="chart_div2" class="miniGraphDiv"></div></td>
    <td width="33%"><div id="chart_div3" class="miniGraphDiv"></div></td>
    </tr>
</table>


<table width="100%" border="0" id="thirdPartyTbl">
      <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        <td width="83%" rowspan="10" align="left" valign="top">
         <div id="chart_div4" style="height:250px;" class="miniGraphDiv"></div>
        </td>
      </tr>
      <tr>
        <td width="12%"><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><strong>PCGS</strong></a></td>
        <td width="5%" align="right"><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CoinDesign->getProGrader('PCGS', $design ,$userID); ?></a></td>
      </tr>
      <tr>
        <td><a href="viewCategoryService.php?proService=ICG&coinCategory=<?php echo $categoryLink; ?>"><strong>ICG</strong></a></td>
        <td align="right"><a href="viewCategoryService.php?proService=ICG&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CoinDesign->getProGrader('ICG', $design ,$userID); ?></a></td>
      </tr>
      <tr>
        <td><a href="viewCategoryService.php?proService=NGC&coinCategory=<?php echo $categoryLink; ?>"><strong>NGC</strong></a></td>
        <td align="right"><a href="viewCategoryService.php?proService=NGC&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CoinDesign->getProGrader('NGC', $design ,$userID); ?></a></td>
      </tr>
      <tr>
        <td><a href="viewCategoryService.php?proService=ANACS&coinCategory=<?php echo $categoryLink; ?>"><strong>ANACS</strong></a></td>
        <td align="right"><a href="viewCategoryService.php?proService=ANACS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CoinDesign->getProGrader('ANACS', $design ,$userID); ?></a></td>
      </tr>
      <tr>
        <td><a href="viewCategoryService.php?proService=SEGS&coinCategory=<?php echo $categoryLink; ?>"><strong>SEGS</strong></a></td>
        <td align="right"><a href="viewCategoryService.php?proService=SEGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CoinDesign->getProGrader('SEGS', $design,$userID); ?></a></td>
      </tr>
      <tr>
        <td><a href="viewCategoryService.php?proService=PCI&coinCategory=<?php echo $categoryLink; ?>"><strong>PCI</strong></a></td>
        <td align="right"><a href="viewCategoryService.php?proService=PCI&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CoinDesign->getProGrader('PCI', $design,$userID); ?></a></td>
      </tr>
      <tr>
        <td><a href="viewCategoryService.php?proService=ICCS&coinCategory=<?php echo $categoryLink; ?>"><strong>ICCS</strong></a></td>
        <td align="right"><a href="viewCategoryService.php?proService=ICCS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CoinDesign->getProGrader('ICCS',$design ,$userID); ?></a></td>
      </tr>
      <tr>
        <td><a href="viewCategoryService.php?proService=HALLMARK&coinCategory=<?php echo $categoryLink; ?>"><strong>HALLMARK</strong></a></td>
        <td align="right"><a href="viewCategoryService.php?proService=HALLMARK&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CoinDesign->getProGrader('HALLMARK', $design ,$userID); ?></a></td>
      </tr>
      <tr>
        <td valign="top"><a href="viewCategoryService.php?proService=NTC&coinCategory=<?php echo $categoryLink; ?>"><strong>NTC</strong></a></td>
        <td align="right" valign="top"><a href="viewCategoryService.php?proService=NTC&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CoinDesign->getProGrader('NTC',$design ,$userID); ?></a></td>
      </tr>
    </table>
<hr />

<h3>Business Strikes <?php echo $Grade->getStrikeCountBydesign($designQuery, $userID, $strike='Business') ?></h3>
<p><strong>Highest Grade: </strong><?php echo $Grade->getBusinessHighGradeNumberByDesign(str_replace('_', ' ', $_GET['design']), $userID, $strike='Business') ?><br />
  <strong>Total Graded:</strong> <?php echo $Grade->getTotalTypeGradeByDesign($strike='Business', $designQuery, $userID); ?><br />
  <strong>Total Certified:</strong> <?php echo $Grade->getTotalTypeProGradeByDesign($strike='Business', $designQuery, $userID); ?></p>
<table width="99%" border="0" cellpadding="3">
  <tr class="keyRow">
    <td width="8%">&nbsp;</td>
    <td width="11%" align="center"><strong>Basal 0</strong></td>
    <td width="9%" align="center"><strong>PO-1</strong></td>
    <td width="8%" align="center"><strong>FR-2</strong></td>
    <td width="8%" align="center"><strong>AG-3</strong></td>
    <td width="8%" align="center"><strong>G-4</strong></td>
    <td width="8%" align="center"><strong>G-6</strong></td>
    <td width="8%" align="center"><strong>VG-8</strong></td>
    <td width="10%" align="center"><strong>VG-10</strong></td>
    <td width="9%" align="center"><strong>F-12</strong></td>
    <td width="9%" align="center"><strong>F-15</strong></td>
  </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=B0&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('B0', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=P1&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('P1', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=FR2&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('FR2', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=AG3&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('AG3', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=G4&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('G4', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=G6&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('G6', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=VG8&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('VG8', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=VG10&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('VG10', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=F12&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('F12', $designQuery ,$userID); ?></a></td>
    <td width="9%" align="center"><a href="viewDesignByGrade.php?coinGrade=F15&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('F15', $designQuery ,$userID); ?></a></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=B0&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('B0', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=P1&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('P1', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=FR2&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('FR2', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=AG3&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('AG3', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=G4&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('G4', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=G6&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('G6', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=VG8&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('VG8', $designQuery ,$userID); ?></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=VG10&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('VG10', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=F12&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('F12', $designQuery ,$userID); ?></a></td>
    <td width="9%" align="center"><a href="viewCoinByProGrade.php?coinGrade=F15&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('F15', $designQuery,$userID); ?></a></td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('B0', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('P1', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('FR2', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('AG3', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('G4', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('G6', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('VG8', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('VG10', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('F12', $designQuery, $userID) ?></strong></td>
    <td width="9%" align="center"><strong><?php echo $Grade->getTotalDesignGrade('F15', $designQuery, $userID) ?></strong></td>
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
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>

  <tr class="keyRow">
    <td width="8%">&nbsp;</td>
    <td width="11%" align="center"><strong>VF-20</strong></td>
    <td width="9%" align="center"><strong>VF-25</strong></td>
    <td width="8%" align="center"><strong>VF-30</strong></td>
    <td width="8%" align="center"><strong>VF-35</strong></td>
    <td width="8%" align="center"><strong>EF-40</strong></td>
    <td width="8%" align="center"><strong>EF-45</strong></td>
    <td width="8%" align="center"><strong>AU-50</strong></td>
    <td width="10%" align="center"><strong>AU-53</strong></td>
    <td width="10%" align="center"><strong>AU-55</strong></td>
    <td width="9%" align="center"><strong>AU-58</strong></td>
  </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=VF20&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('VF20', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=VF25&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('VF25', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=VF30&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('VF30', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=VF35&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('VF35', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=EF40&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('EF40', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=EF45&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('EF45', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=AU50&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('AU50', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=AU53&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('AU53', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=AU55&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('AU55', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=AU58&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('AU58', $designQuery ,$userID); ?></a></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=VF20&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('VF20', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=VF25&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('VF25', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=VF30&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('VF30', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=VF35&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('VF35', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=EF40&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('EF40', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=EF45&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('EF45', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=AU50&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('AU50', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=AU53&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('AU53', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=AU55&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('AU55', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=AU58&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('AU58', $designQuery ,$userID); ?></a></td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('VF20', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('VF25', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('VF30', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('VF35', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('EF40', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('EF45', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('AU50', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('AU53', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('AU55', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('AU58', $designQuery, $userID) ?></strong></td>
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
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>

  <tr class="keyRow">
    <td>&nbsp;</td>
    <td width="9%" align="center"><strong>MS-60</strong></td>
    <td align="center"><strong>MS-61</strong></td>
    <td align="center"><strong>MS-62</strong></td>
    <td align="center"><strong>MS-63</strong></td>
    <td align="center"><strong>MS-64</strong></td>
    <td align="center"><strong>MS-65</strong></td>
    <td align="center"><strong>MS-66</strong></td>
    <td align="center"><strong>MS-67</strong></td>
    <td align="center"><strong>MS-68</strong></td>
    <td align="center"><strong>MS-69</strong></td>
  </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td width="9%" align="center"><a href="viewDesignByGrade.php?coinGrade=MS60&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('MS60', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=FR2&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('MS61', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=FR2&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('MS62', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=FR2&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('MS63', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=FR2&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('MS64', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=FR2&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('MS65', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=FR2&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('MS66', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=FR2&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('MS67', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=FR2&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('MS68', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=FR2&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('MS69', $designQuery ,$userID); ?></a></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td width="9%" align="center"><a href="viewCoinByProGrade.php?coinGrade=MS60&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('MS60', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=MS61&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('MS61', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=MS62&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('MS62', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=MS63&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('MS63', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=MS64&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('MS64', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=MS65&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('MS65', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=MS66&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('MS66', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=MS67&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('MS67', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=MS68&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('MS68', $designQuery,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=MS69&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('MS69', $designQuery ,$userID); ?></a></td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td width="9%" align="center"><strong><?php echo $Grade->getTotalDesignGrade('MS60', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('MS61', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('MS62', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('MS63', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('MS64', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('MS65', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('MS66', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('MS67', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('MS68', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('MS69', $designQuery, $userID) ?></strong></td>
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
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
    <tr class="keyRow">
      <td>&nbsp;</td>
      <td width="9%" align="center"><strong>MS-70</strong></td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
    <td><strong>Raw</strong></td>
    <td width="9%" align="center"><a href="viewDesignByGrade.php?coinGrade=FR2&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignGrade('MS70', $designQuery ,$userID); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td width="9%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td width="9%" align="center"><a href="viewCoinByProGrade.php?coinGrade=MS70&amp;designQuery=<?php echo $designQuery; ?>"><?php echo $Grade->getDesignProGrade('MS70', $designQuery ,$userID); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td width="9%" align="center">&nbsp;</td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td width="9%" align="center"><strong><?php echo $Grade->getTotalDesignGrade('MS70', $designQuery, $userID) ?></strong></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td width="9%" align="center">&nbsp;</td>
  </tr>
</table>


<h3>Proofs <?php echo $Grade->getStrikeCountByDesign($designQuery, $userID, $strike='Proof') ?></h3>
<p><strong>Highest Grade: </strong><?php echo $Grade->getBusinessHighGradeNumberByDesign($designQuery, $userID, $strike='Proof') ?><br />
  <strong>Total Graded:</strong> <?php echo $Grade->getTotalTypeGradeBydesign($strike='Proof', $designQuery, $userID); ?><br />
  <strong>Total Certified:</strong> <?php echo $Grade->getTotalTypeProGradeByDesign($strike='Proof', $designQuery, $userID); ?></p>
<table width="100%" border="0" cellpadding="3" class="gradeDisplayTbl">
  <tr class="keyRow">
    <td>&nbsp;</td>
    <td align="center"><strong>PR-35</strong></td>
    <td align="center"><strong>PR-40</strong></td>
    <td align="center"><strong>PR-45</strong></td>
    <td align="center"><strong>PR-50</strong></td>
    <td align="center"><strong>PR-55</strong></td>
    <td align="center"><strong>PR-58</strong></td>
    <td align="center"><strong>PR-60</strong></td>
    <td align="center"><strong>PR-61</strong></td>
    <td align="center"><strong>PR-62</strong></td>
    <td align="center"><strong>PR-63</strong></td>
  </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=PR35&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignGrade('PR35', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=PR40&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignGrade('PR40', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=PR45&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignGrade('PR45', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=PR50&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignGrade('PR50', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=PR55&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignGrade('PR55', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=PR58&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignGrade('PR58', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=PR60&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignGrade('PR60', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=PR61&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignGrade('PR61', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=PR62&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignGrade('PR62', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=PR63&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignGrade('PR63', $designQuery, $userID); ?></a></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR35&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignProGrade('PR35', $designQuery ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR40&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignProGrade('PR40', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR45&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignProGrade('PR45', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR50&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignProGrade('PR50', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR55&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignProGrade('PR55', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR58&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignProGrade('PR58', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR60&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignProGrade('PR60', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR61&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignProGrade('PR61', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR62&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignProGrade('PR62', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR63&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignProGrade('PR63', $designQuery, $userID); ?></a></td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('PR35', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('PR40', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('PR45', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('PR50', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('PR55', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('PR58', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('PR60', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('PR61', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('PR62', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('PR63', $designQuery, $userID) ?></strong></td>
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
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr class="keyRow">
    <td>&nbsp;</td>
    <td align="center"><strong>PR-64</strong></td>
    <td align="center"><strong>PR-65</strong></td>
    <td align="center"><strong>PR-66</strong></td>
    <td align="center"><strong>PR-67</strong></td>
    <td align="center"><strong>PR-68</strong></td>
    <td align="center"><strong>PR-69</strong></td>
    <td align="center"><strong>PR-70</strong></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=PR64&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignGrade('PR64', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=PR65&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignGrade('PR65', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=PR66&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignGrade('PR66', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=PR67&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignGrade('PR67', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=PR68&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignGrade('PR68', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=PR69&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignGrade('PR69', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewDesignByGrade.php?coinGrade=PR70&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignGrade('PR70', $designQuery, $userID); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR64&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignProGrade('PR64', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR65&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignProGrade('PR65', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR66&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignProGrade('PR66', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR67&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignProGrade('PR67', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR68&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignProGrade('PR68', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR69&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignProGrade('PR69', $designQuery, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR70&designQuery=<?php echo $designQuery ?>"><?php echo $Grade->getDesignProGrade('PR70', $designQuery, $userID); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('PR64', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('PR65', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('PR66', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('PR67', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('PR68', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('PR69', $designQuery, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalDesignGrade('PR70', $designQuery, $userID) ?></strong></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>






<p><a href="adddesign.php?design=<?php echo $coinCatLink ?>">Add <?php echo $design ?></a></p>
  
  <p>&nbsp;</p>

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>