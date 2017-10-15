<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Minted', 'Collected'],
          ['1/4 oz Platinum',  <?php echo $coin->getCoinByTypeByMint('Quarter_Ounce_Platinum') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Quarter_Ounce_Platinum'); ?>],
          ['Buffalo',  <?php echo $coin->getCoinByTypeByMint('Half_Ounce_Buffalo') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Half_Ounce_Buffalo'); ?>],
          ['1/2 oz Gold',  <?php echo $coin->getCoinByTypeByMint('Half_Ounce_Gold') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Half_Ounce_Gold'); ?>]
        ]);
			
	
		//Chart 2
		var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['1/4 oz Platinum',  <?php echo $collection->dateSetCollectedNums($coinType='Quarter_Ounce_Platinum', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Quarter_Ounce_Platinum') ?>]
        ]);
	
		var data3 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Buffalo',  <?php echo $collection->dateSetCollectedNums($coinType='Draped_Bust_Large_Cent', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Draped_Bust_Large_Cent') ?>]
        ]);	
		var data4 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['1/2 oz Gold',  <?php echo $collection->dateSetCollectedNums($coinType='Half_Ounce_Gold', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Half_Ounce_Gold') ?>]
        ]);			

			
        var options = {
          title: ' ',
		  colors: ['#814d37', '#b39477'],
          vAxis: {title: 'All <?php echo $coinCategory ?>', titleTextStyle: {color: 'black'}}
        };
        var options2 = {
          title: '1/4 oz Platinum',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options3 = {
          title: 'Buffalo',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options4 = {
          title: '1/2 oz Gold',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
					
		var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
				chart.draw(data, options);
        var chart2 = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
        chart2.draw(data2, options2);
		var chart3 = new google.visualization.ColumnChart(document.getElementById('chart_div3'));
        chart3.draw(data3, options3);
		var chart4 = new google.visualization.ColumnChart(document.getElementById('chart_div4'));
        chart4.draw(data4, options4);
				
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
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Half_Ounce_Buffalo"> 1/4 oz Platinum</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Half_Ounce_Buffalo')  ?> of <?php echo $coin->getCoinByTypeByMint('Half_Ounce_Buffalo') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Half_Ounce_Buffalo'), $coin->getCoinByTypeByMint('Half_Ounce_Buffalo')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Draped_Bust_Large_Cent"> Buffalo </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Large_Cent')  ?> of <?php echo $coin->getCoinByTypeByMint('Draped_Bust_Large_Cent') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Large_Cent'), $coin->getCoinByTypeByMint('Draped_Bust_Large_Cent')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Half_Ounce_Gold"> 1/2 oz Gold </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Half_Ounce_Gold')  ?> of <?php echo $coin->getCoinByTypeByMint('Half_Ounce_Gold') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Half_Ounce_Gold'), $coin->getCoinByTypeByMint('Half_Ounce_Gold')) ?>%)</td>
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
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Quarter_Ounce_Platinum">1/4 oz Platinum </a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Half_Ounce_Buffalo">Buffalo</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Half_Ounce_Gold">1/2 oz Gold </a></strong></td>
    </tr>
  <tr>
    <td align="center"><div id="chart_div2" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div3" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div4" style="width: 150px; height: 150px;"></div></td>
    </tr>
  <tr align="center">
    <td><?php echo $collection->dateSetCollectedNums($coinType='Quarter_Ounce_Platinum', $userID).' of '. $collection->dateSetNums($coinType='Quarter_Ounce_Platinum') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Quarter_Ounce_Platinum', $userID), $collection->dateSetNums($coinType='Quarter_Ounce_Platinum')) ?>%)</td>
    
    <td><?php echo $collection->dateSetCollectedNums($coinType='Half_Ounce_Buffalo', $userID).' of '. $collection->dateSetNums($coinType='Half_Ounce_Buffalo') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Half_Ounce_Buffalo', $userID), $collection->dateSetNums($coinType='Half_Ounce_Buffalo')) ?>%)</td>
    
        <td><?php echo $collection->dateSetCollectedNums($coinType='Half_Ounce_Gold', $userID).' of '. $collection->dateSetNums($coinType='Half_Ounce_Gold') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Half_Ounce_Gold', $userID), $collection->dateSetNums($coinType='Half_Ounce_Gold')) ?>%)</td>
    </tr>
</table>
