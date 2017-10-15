<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Minted', 'Collected'],
          ['Liberty Cap',  <?php echo $coin->getCoinByTypeByMint('Liberty_Cap_Half_Cent') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Half_Cent'); ?>],
          ['Draped Bust',  <?php echo $coin->getCoinByTypeByMint('Draped_Bust_Half_Cent') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Half_Cent'); ?>],
          ['Classic Head',  <?php echo $coin->getCoinByTypeByMint('Classic_Head_Half_Cent') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Classic_Head_Half_Cent'); ?>],
          ['Braided hair',  <?php echo $coin->getCoinByTypeByMint('Braided_Hair_Half_Cent') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Braided_Hair_Half_Cent'); ?>]
        ]);
			
	
		//Chart 2
		var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Liberty Cap',  <?php echo $collection->dateSetCollectedNums($coinType='Liberty_Cap_Half_Cent', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Liberty_Cap_Half_Cent') ?>]
        ]);
	
		var data3 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Draped Bust',  <?php echo $collection->dateSetCollectedNums($coinType='Draped_Bust_Half_Cent', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Draped_Bust_Half_Cent') ?>]
        ]);	
		var data4 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Classic Head',  <?php echo $collection->dateSetCollectedNums($coinType='Classic_Head_Half_Cent', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Classic_Head_Half_Cent') ?>]
        ]);			

		var data5 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Braided Hair',  <?php echo $collection->dateSetCollectedNums($coinType='Braided_Hair_Half_Cent', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Braided_Hair_Half_Cent') ?>]
        ]);				
        var options = {
          title: ' ',
		  colors: ['#814d37', '#b39477'],
          vAxis: {title: 'All <?php echo $coinCategory ?>', titleTextStyle: {color: 'black'}}
        };
        var options2 = {
          title: 'Liberty Cap',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options3 = {
          title: 'Draped Bust',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options4 = {
          title: 'Classic Head',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options5 = {
          title: 'Braided Hair',
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
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Draped_Bust_Half_Cent"> Liberty Cap</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Half_Cent')  ?> of <?php echo $coin->getCoinByTypeByMint('Liberty_Cap_Half_Cent') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Half_Cent'), $coin->getCoinByTypeByMint('Liberty_Cap_Half_Cent')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Draped_Bust_Half_Cent"> Draped Bust </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Half_Cent')  ?> of <?php echo $coin->getCoinByTypeByMint('Draped_Bust_Half_Cent') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Half_Cent'), $coin->getCoinByTypeByMint('Draped_Bust_Half_Cent')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Classic_Head_Half_Cent"> Classic Head </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Classic_Head_Half_Cent')  ?> of <?php echo $coin->getCoinByTypeByMint('Classic_Head_Half_Cent') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Classic_Head_Half_Cent'), $coin->getCoinByTypeByMint('Classic_Head_Half_Cent')) ?>%)</td>
  </tr>
  
  <tr>
    <td width="126"><a href="viewListReport.php?coinType=Braided_Hair_Half_Cent"><strong>Braided Hair </strong></a></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Braided_Hair_Half_Cent')  ?> of <?php echo $coin->getCoinByTypeByMint('Braided_Hair_Half_Cent') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Braided_Hair_Half_Cent'), $coin->getCoinByTypeByMint('Braided_Hair_Half_Cent')) ?>%)</td>
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
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap </a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Draped_Bust_Half_Cent">Draped Bust</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Classic_Head_Half_Cent">Classic Head </a></strong></td>
    <td align="center"><a href="viewProgressList.php?coinType=Braided_Hair_Half_Cent"><strong>Braided Hair</strong></a></td>
  </tr>
  <tr>
    <td align="center"><div id="chart_div2" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div3" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div4" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div5" style="width: 150px; height: 150px;"></div></td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->dateSetCollectedNums($coinType='Liberty_Cap_Half_Cent', $userID).' of '. $collection->dateSetNums($coinType='Liberty_Cap_Half_Cent') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Liberty_Cap_Half_Cent', $userID), $collection->dateSetNums($coinType='Liberty_Cap_Half_Cent')) ?>%)</td>
    
    <td><?php echo $collection->dateSetCollectedNums($coinType='Draped_Bust_Half_Cent', $userID).' of '. $collection->dateSetNums($coinType='Draped_Bust_Half_Cent') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Draped_Bust_Half_Cent', $userID), $collection->dateSetNums($coinType='Draped_Bust_Half_Cent')) ?>%)</td>
    
        <td><?php echo $collection->dateSetCollectedNums($coinType='Classic_Head_Half_Cent', $userID).' of '. $collection->dateSetNums($coinType='Classic_Head_Half_Cent') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Classic_Head_Half_Cent', $userID), $collection->dateSetNums($coinType='Classic_Head_Half_Cent')) ?>%)</td>
        
    <td><?php echo $collection->dateSetCollectedNums($coinType='Braided_Hair_Half_Cent', $userID).' of '. $collection->dateSetNums($coinType='Braided_Hair_Half_Cent') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Braided_Hair_Half_Cent', $userID), $collection->dateSetNums($coinType='Braided_Hair_Half_Cent')) ?>%)</td>
  </tr>
</table>
