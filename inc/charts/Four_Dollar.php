<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Minted', 'Collected'],
          ['Four Dollar',  <?php echo $coin->getCoinByTypeByMint('Four_Dollar_Stella') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Four_Dollar_Stella'); ?>]
        ]);
			
	
		//Chart 2
		var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Four Dollar',  <?php echo $collection->dateSetCollectedNums($coinType='Four_Dollar_Stella', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Four_Dollar_Stella') ?>]
        ]);
			
        var options = {
          title: ' ',
		  colors: ['#814d37', '#b39477'],
          vAxis: {title: 'All <?php echo $coinCategory ?>', titleTextStyle: {color: 'black'}}
        };
        var options2 = {
          title: 'Four Dollar',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
						
		var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
				chart.draw(data, options);
        var chart2 = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
        chart2.draw(data2, options2);				
}		  
    </script>
<br />
<table width="100%" border="0">
   <tr>
      <td class="smallTxt">&nbsp;</td>
      <td align="right">&nbsp;</td>
     <td width="692" rowspan="8" align="right" valign="top" id="graphRow">
       <div id="chart_div" style="width:100%; height: 300px;"></div>
     </td>
   </tr>
   <tr>
     <td colspan="2" class="smallTxt"><strong>Over All Collection Progress</strong></td>
    </tr>
   
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Four_Dollar_Stella"> Four Dollar</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Four_Dollar_Stella')  ?> of <?php echo $coin->getCoinByTypeByMint('Four_Dollar_Stella') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Four_Dollar_Stella'), $coin->getCoinByTypeByMint('Four_Dollar_Stella')) ?>%)</td>
  </tr>
  <tr>
    <td width="126">&nbsp;</td>
    <td width="168" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="126">&nbsp;</td>
    <td width="168" align="right">&nbsp;</td>
  </tr>
  
  <tr>
    <td width="126">&nbsp;</td>
    <td width="168" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="126">&nbsp;</td>
    <td width="168" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="126">&nbsp;</td>
    <td width="168" align="right">&nbsp;</td>
  </tr>

 </table>
 <hr />
 <h3>Date Set Progress</h3>
 
    <table width="100%" border="0" class="autoCoinTbl">
  <tr>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Four_Dollar_Stella">Stella</a></strong></td>
    </tr>
  <tr>
    <td align="center"><div id="chart_div2" style="width: 150px; height: 150px;"></div></td>
    </tr>
  <tr align="center">
    <td><?php echo $collection->dateSetCollectedNums($coinType='Four_Dollar_Stella', $userID).' of '. $collection->dateSetNums($coinType='Four_Dollar_Stella') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Four_Dollar_Stella', $userID), $collection->dateSetNums($coinType='Four_Dollar_Stella')) ?>%)</td>
    </tr>
</table>
