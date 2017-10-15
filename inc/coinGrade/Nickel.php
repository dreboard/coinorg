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
              ['Ungraded', <?php echo $collection->getNoGradeCategoryCount($coinCategory, $userID); ?>],
              ['Graded',  <?php echo $collection->getGradeCategoryCount($coinCategory, $userID); ?>]
            ]);
            // Create the data table.
            var data2 = new google.visualization.DataTable();
            data2.addColumn('string', 'Topping');
            data2.addColumn('number', 'Slices');
            data2.addRows([
              ['Certified', <?php echo $collection->getCategoryProGradeCount($coinCategory, $userID) ?>],
              ['Raw', <?php echo $collection->getCategoryNoProGradeCount($coinCategory, $userID); ?>]
            ]);

            var data3 = new google.visualization.DataTable();
            data3.addColumn('string', 'Topping');
            data3.addColumn('number', 'Slices');
            data3.addRows([
              ['Shield', <?php echo $collection->getNoGradeTypeCount($coinType='Shield_Nickel', $userID); ?>],
              ['Liberty Head', <?php echo $collection->getNoGradeTypeCount($coinType='Liberty_Head_Nickel', $userID); ?>],
              ['Indian Head', <?php echo $collection->getNoGradeTypeCount($coinType='Indian_Head_Nickel', $userID); ?>],
              ['Jefferson', <?php echo $collection->getNoGradeTypeCount($coinType='Jefferson_Nickel', $userID); ?>],
              ['Westward', <?php echo $collection->getNoGradeTypeCount($coinType='Westward_Journey', $userID); ?>],
			  ['Monticello', <?php echo $collection->getNoGradeTypeCount($coinType='Return_to_Monticello', $userID); ?>]
            ]);

        var data4 = google.visualization.arrayToDataTable([
          ['Type', 'Number Graded'],
          ['PCGS',  <?php echo $collection->getProGrader('PCGS', $coinCategory ,$userID); ?>],
          ['ICG',  <?php echo $collection->getProGrader('ICG', $coinCategory ,$userID); ?>],
          ['NGC',  <?php echo $collection->getProGrader('NGC', $coinCategory ,$userID); ?>],
          ['ANACS', <?php echo $collection->getProGrader('ANACS', $coinCategory ,$userID); ?>],
		  ['SEGS', <?php echo $collection->getProGrader('SEGS', $coinCategory ,$userID); ?>],
          ['PCI', <?php echo $collection->getProGrader('PCI', $coinCategory ,$userID); ?>],
          ['ICCS',<?php echo $collection->getProGrader('ICCS', $coinCategory ,$userID); ?>],
          ['HALLMARK', <?php echo $collection->getProGrader('HALLMARK', $coinCategory ,$userID); ?>],
          ['NTC',<?php echo $collection->getProGrader('NTC', $coinCategory ,$userID); ?>]
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
            // Set chart options
            var options3 = {
                           slices: {0: {color: '#e4c6aa'}, 1: {color: '#b89b79'}, 2: {color: '#b89b79'},3: {color: '#5a5245'}, 4: {color: '#b39477'}, 5: {color: '#906656'}},
						   is3D: true,
                           'height':180};

                    var options4 = {
          title: 'Certified By Type',
		  is3D: true,
		  colors: ['#b39477'],
          hAxis: {title: 'All <?php echo $coinCategory; ?>s', titleTextStyle: {color: 'black'}}
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

  <div>
  <hr>

<table width="100%" border="0">
  <tr>
    <td align="center" title="All Coins, Graded vs Not Graded"><strong><a href="viewNoGradeReport.php?coinCategory=<?php echo $categoryLink ?>">Ungraded</a> <?php echo $coinCategory; ?>s (<?php echo $collection->getNoGradeCategoryCount($coinCategory, $userID); ?>)</strong></td>
    <td align="center" title="All Graded Coins, Certified vs Raw"><strong>Graded &amp; Certified <?php echo $coinCategory; ?>s (<?php echo $collection->getCategoryProGradeCount($coinCategory, $userID) ?>)</strong></td>
    <td align="center"><strong><a href="viewNoGradeReport.php?coinCategory=<?php echo $categoryLink ?>">Graded & Uncertified</a> By Type <?php echo $ungradedTypeDisplay ?></strong></td>    
    </tr>
  <tr align="center" valign="top">
    <td width="33%"><div id="chart_div" class="miniGraphDiv"></div></td>
    <td width="33%"><div id="chart_div2" class="miniGraphDiv"></div></td>
    <td width="33%"><div id="chart_div3" class="miniGraphDiv"></div></td>
    </tr>
</table>
  
  </div>

<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="14%" class="darker"><a href="Small_Cent.php">Coins</a></td>
    <td width="13%" class="darker"><a href="SmallCentRolls.php">Rolls</a></td>
    <td width="14%" class="darker"><a href="SmallCentFolders.php">Folders</a></td>    
    <td width="20%" class="darker"> <a href="viewNoGradeReport.php?coinCategory=<?php echo $categoryLink ?>">No Grade Report</a></td>
    <td width="14%" class="darker"><a href="SmallCentError.php">Errors</a></td>
    <td width="12%" class="darker"> <a href="SmallCentBags.php">Bags</a></td>
    <td width="13%" class="darker"><a href="SmallCentBoxes.php">Boxes</a></td>    
  </tr>
</table> 
<table border="0" id="folderTbl" class="typeTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h3><a href="viewCertCatReport.php?coinCategory=<?php echo $categoryLink ?>"><?php echo $coinCategory; ?> Certified</a> Type Collection <?php echo $collection->getCertifiedCategoryCount($coinCategory, $userID) ?> of 6 (<?php echo percent($collection->getCertifiedCategoryCount($coinCategory, $userID), '6'); ?>%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertReportImage('Shield_Nickel', $userID); ?>" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertReportImage('Liberty_Head_Nickel', $userID); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertReportImage('Indian_Head_Nickel', $userID); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertReportImage('Jefferson_Nickel', $userID); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertReportImage('Westward_Journey', $userID); ?>" alt="" width="50" height="50"></td>
  <td align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertReportImage('Return_to_Monticello', $userID); ?>" alt="" width="50" height="50"></td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Shield_Nickel">Shield</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Liberty_Head_Nickel">Liberty Head</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Indian_Head_Nickel"> Indian Head</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Jefferson_Nickel"> Jefferson</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Westward_Journey"> Westward</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Return_to_Monticello"> Monticello</a></td>
    </tr>
 </table>
 <hr />
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
        <td width="5%" align="right"><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('PCGS', $coinCategory ,$userID); ?></a></td>
      </tr>
      <tr>
        <td><a href="viewCategoryService.php?proService=ICG&coinCategory=<?php echo $categoryLink; ?>"><strong>ICG</strong></a></td>
        <td align="right"><a href="viewCategoryService.php?proService=ICG&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('ICG', $coinCategory ,$userID); ?></a></td>
      </tr>
      <tr>
        <td><a href="viewCategoryService.php?proService=NGC&coinCategory=<?php echo $categoryLink; ?>"><strong>NGC</strong></a></td>
        <td align="right"><a href="viewCategoryService.php?proService=NGC&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('NGC', $coinCategory ,$userID); ?></a></td>
      </tr>
      <tr>
        <td><a href="viewCategoryService.php?proService=ANACS&coinCategory=<?php echo $categoryLink; ?>"><strong>ANACS</strong></a></td>
        <td align="right"><a href="viewCategoryService.php?proService=ANACS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('ANACS', $coinCategory ,$userID); ?></a></td>
      </tr>
      <tr>
        <td><a href="viewCategoryService.php?proService=SEGS&coinCategory=<?php echo $categoryLink; ?>"><strong>SEGS</strong></a></td>
        <td align="right"><a href="viewCategoryService.php?proService=SEGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('SEGS', $coinCategory,$userID); ?></a></td>
      </tr>
      <tr>
        <td><a href="viewCategoryService.php?proService=PCI&coinCategory=<?php echo $categoryLink; ?>"><strong>PCI</strong></a></td>
        <td align="right"><a href="viewCategoryService.php?proService=PCI&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('PCI', $coinCategory,$userID); ?></a></td>
      </tr>
      <tr>
        <td><a href="viewCategoryService.php?proService=ICCS&coinCategory=<?php echo $categoryLink; ?>"><strong>ICCS</strong></a></td>
        <td align="right"><a href="viewCategoryService.php?proService=ICCS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('ICCS',$coinCategory ,$userID); ?></a></td>
      </tr>
      <tr>
        <td><a href="viewCategoryService.php?proService=HALLMARK&coinCategory=<?php echo $categoryLink; ?>"><strong>HALLMARK</strong></a></td>
        <td align="right"><a href="viewCategoryService.php?proService=HALLMARK&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('HALLMARK', $coinCategory ,$userID); ?></a></td>
      </tr>
      <tr>
        <td valign="top"><a href="viewCategoryService.php?proService=NTC&coinCategory=<?php echo $categoryLink; ?>"><strong>NTC</strong></a></td>
        <td align="right" valign="top"><a href="viewCategoryService.php?proService=NTC&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('NTC',$coinCategory ,$userID); ?></a></td>
      </tr>
    </table>