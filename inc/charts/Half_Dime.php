<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Minted', 'Collected'],
          ['Flowing Hair',  <?php echo $coin->getCoinByTypeByMint('Flowing_Hair_Half_Dime') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Flowing_Hair_Half_Dime'); ?>],
          ['Draped Bust',  <?php echo $coin->getCoinByTypeByMint('Draped_Bust_Half_Dime') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Half_Dime'); ?>],
          ['Liberty Cap',  <?php echo $coin->getCoinByTypeByMint('Liberty_Cap_Half_Dime') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Half_Dime'); ?>],
          ['Seated Liberty',  <?php echo $coin->getCoinByTypeByMint('Seated_Liberty_Half_Dime') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Seated_Liberty_Half_Dime'); ?>]
        ]);
			
	
		//Chart 2
		var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Flowing Hair',  <?php echo $collection->dateSetCollectedNums($coinType='Flowing_Hair_Half_Dime', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Flowing_Hair_Half_Dime') ?>]
        ]);
	
		var data3 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Draped Bust',  <?php echo $collection->dateSetCollectedNums($coinType='Draped_Bust_Large_Cent', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Draped_Bust_Large_Cent') ?>]
        ]);	
		var data4 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Liberty Cap',  <?php echo $collection->dateSetCollectedNums($coinType='Liberty_Cap_Half_Dime', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Liberty_Cap_Half_Dime') ?>]
        ]);			

		var data5 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Seated Liberty',  <?php echo $collection->dateSetCollectedNums($coinType='Seated_Liberty_Half_Dime', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Seated_Liberty_Half_Dime') ?>]
        ]);				
        var options = {
          title: ' ',
		  colors: ['#814d37', '#b39477'],
          vAxis: {title: 'All <?php echo $coinCategory ?>', titleTextStyle: {color: 'black'}}
        };
        var options2 = {
          title: 'Flowing Hair',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options3 = {
          title: 'Draped Bust',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options4 = {
          title: 'Liberty Cap',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options5 = {
          title: 'Seated Liberty',
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
		var chart5 = new google.visualization.ColumnChart(document.getElementById('chart_div5'));
        chart5.draw(data5, options5);						
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
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Draped_Bust_Half_Dime"> Flowing Hair</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Half_Dime')  ?> of <?php echo $coin->getCoinByTypeByMint('Draped_Bust_Half_Dime') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Half_Dime'), $coin->getCoinByTypeByMint('Draped_Bust_Half_Dime')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Draped_Bust_Large_Cent"> Draped Bust </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Large_Cent')  ?> of <?php echo $coin->getCoinByTypeByMint('Draped_Bust_Large_Cent') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Large_Cent'), $coin->getCoinByTypeByMint('Draped_Bust_Large_Cent')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Liberty_Cap_Half_Dime"> Liberty Cap </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Half_Dime')  ?> of <?php echo $coin->getCoinByTypeByMint('Liberty_Cap_Half_Dime') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Half_Dime'), $coin->getCoinByTypeByMint('Liberty_Cap_Half_Dime')) ?>%)</td>
  </tr>
  
  <tr>
    <td width="126"><a href="viewListReport.php?coinType=Seated_Liberty_Half_Dime"><strong>Seated Liberty </strong></a></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Seated_Liberty_Half_Dime')  ?> of <?php echo $coin->getCoinByTypeByMint('Seated_Liberty_Half_Dime') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Seated_Liberty_Half_Dime'), $coin->getCoinByTypeByMint('Seated_Liberty_Half_Dime')) ?>%)</td>
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
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair </a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Draped_Bust_Half_Dime">Draped Bust</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap </a></strong></td>
    <td align="center"><a href="viewProgressList.php?coinType=Seated_Liberty_Half_Dime"><strong>Seated Liberty</strong></a></td>
  </tr>
  <tr>
    <td align="center"><div id="chart_div2" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div3" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div4" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div5" style="width: 150px; height: 150px;"></div></td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->dateSetCollectedNums($coinType='Flowing_Hair_Half_Dime', $userID).' of '. $collection->dateSetNums($coinType='Flowing_Hair_Half_Dime') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Flowing_Hair_Half_Dime', $userID), $collection->dateSetNums($coinType='Flowing_Hair_Half_Dime')) ?>%)</td>
    
    <td><?php echo $collection->dateSetCollectedNums($coinType='Draped_Bust_Half_Dime', $userID).' of '. $collection->dateSetNums($coinType='Draped_Bust_Half_Dime') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Draped_Bust_Half_Dime', $userID), $collection->dateSetNums($coinType='Draped_Bust_Half_Dime')) ?>%)</td>
    
        <td><?php echo $collection->dateSetCollectedNums($coinType='Liberty_Cap_Half_Dime', $userID).' of '. $collection->dateSetNums($coinType='Liberty_Cap_Half_Dime') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Liberty_Cap_Half_Dime', $userID), $collection->dateSetNums($coinType='Liberty_Cap_Half_Dime')) ?>%)</td>
        
    <td><?php echo $collection->dateSetCollectedNums($coinType='Seated_Liberty_Half_Dime', $userID).' of '. $collection->dateSetNums($coinType='Seated_Liberty_Half_Dime') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Seated_Liberty_Half_Dime', $userID), $collection->dateSetNums($coinType='Seated_Liberty_Half_Dime')) ?>%)</td>
  </tr>
</table>
