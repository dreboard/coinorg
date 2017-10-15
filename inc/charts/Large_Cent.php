<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Minted', 'Collected'],
          ['Flowing Hair',  <?php echo $coin->getCoinByTypeByMint('Flowing_Hair_Large_Cent') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Flowing_Hair_Large_Cent'); ?>],
          ['Liberty Cap',  <?php echo $coin->getCoinByTypeByMint('Liberty_Cap_Large_Cent') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Large_Cent'); ?>],
          ['Draped Bust',  <?php echo $coin->getCoinByTypeByMint('Draped_Bust_Large_Cent') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Large_Cent'); ?>],
          ['Classic Head',  <?php echo $coin->getCoinByTypeByMint('Classic_Head_Large_Cent') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Classic_Head_Large_Cent'); ?>],
		  ['Coronet Liberty Head',  <?php echo $coin->getCoinByTypeByMint('Coronet_Liberty_Head_Large_Cent') ?>,  <?php echo $collection->getCollectionUniqueCountByType($userID, 'Coronet_Liberty_Head_Large_Cent'); ?>],
          ['Braided hair',  <?php echo $coin->getCoinByTypeByMint('Braided_Hair_Liberty_Head_Large_Cent') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Braided_Hair_Liberty_Head_Large_Cent'); ?>]
        ]);
			
	
		//Chart 2
		var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Flowing Hair',  <?php echo $collection->dateSetCollectedNums($coinType='Flowing_Hair_Large_Cent', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Flowing_Hair_Large_Cent') ?>]
        ]);
		var data3 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Liberty Cap',  <?php echo $collection->dateSetCollectedNums($coinType='Liberty_Cap_Large_Cent', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Liberty_Cap_Large_Cent') ?>]
        ]);		
		var data4 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Draped Bust',  <?php echo $collection->dateSetCollectedNums($coinType='Draped_Bust_Large_Cent', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Draped_Bust_Large_Cent') ?>]
        ]);	
		var data5 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Classic Head',  <?php echo $collection->dateSetCollectedNums($coinType='Classic_Head_Large_Cent', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Classic_Head_Large_Cent') ?>]
        ]);			
		var data6 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Cornet Liberty Head',  <?php echo $collection->dateSetCollectedNums($coinType='Coronet_Liberty_Head_Large_Cent', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Coronet_Liberty_Head_Large_Cent') ?>]
        ]);	
		var data7 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Braided Hair',  <?php echo $collection->dateSetCollectedNums($coinType='Braided_Hair_Liberty_Head_Large_Cent', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Braided_Hair_Liberty_Head_Large_Cent') ?>]
        ]);				
        var options = {
          title: '<?php echo $coinCategory ?> Progress',
		  colors: ['#814d37', '#b39477'],
          vAxis: {title: 'All <?php echo $coinCategory ?>', titleTextStyle: {color: 'black'}}
        };
        var options2 = {
          title: 'Flowing Hair',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options3 = {
          title: 'Liberty Cap',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options4 = {
          title: 'Seated Liberty',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };	
        var options5 = {
          title: 'Classic Head',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options6 = {
          title: 'Coronet Liberty Head',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options7 = {
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
		var chart6 = new google.visualization.ColumnChart(document.getElementById('chart_div6'));
        chart6.draw(data6, options6);	
		var chart7 = new google.visualization.ColumnChart(document.getElementById('chart_div7'));
        chart7.draw(data7, options7);						
}		  
    </script>
<br />
<table width="100%" border="0">
   <tr>
      <td class="smallTxt">&nbsp;</td>
      <td align="right">&nbsp;</td>
     <td width="692" rowspan="10" align="right" valign="top" id="graphRow">
       <div id="chart_div" style="width:100%; height: 300px;"></div>
     </td>
   </tr>
   <tr>
     <td colspan="2" class="smallTxt"><strong>Over All Collection Progress</strong></td>
    </tr>
   <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Flowing_Hair_Large_Cent"> Flowing Hair </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Flowing_Hair_Large_Cent')  ?> of <?php echo $coin->getCoinByTypeByMint('Flowing_Hair_Large_Cent') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Flowing_Hair_Large_Cent'), $coin->getCoinByTypeByMint('Flowing_Hair_Large_Cent')) ?>%)</td>
   </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Liberty_Cap_Large_Cent"> Liberty Cap</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Large_Cent')  ?> of <?php echo $coin->getCoinByTypeByMint('Liberty_Cap_Large_Cent') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Large_Cent'), $coin->getCoinByTypeByMint('Liberty_Cap_Large_Cent')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Draped_Bust_Large_Cent"> Draped Bust </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Large_Cent')  ?> of <?php echo $coin->getCoinByTypeByMint('Draped_Bust_Large_Cent') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Large_Cent'), $coin->getCoinByTypeByMint('Draped_Bust_Large_Cent')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Classic_Head_Large_Cent"> Classic Head </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Classic_Head_Large_Cent')  ?> of <?php echo $coin->getCoinByTypeByMint('Classic_Head_Large_Cent') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Classic_Head_Large_Cent'), $coin->getCoinByTypeByMint('Classic_Head_Large_Cent')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Coronet_Liberty_Head_Large_Cent')  ?> of <?php echo $coin->getCoinByTypeByMint('Coronet_Liberty_Head_Large_Cent') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Coronet_Liberty_Head_Large_Cent'), $coin->getCoinByTypeByMint('Coronet_Liberty_Head_Large_Cent')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><a href="viewListReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent"><strong>Braided Hair </strong></a></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Braided_Hair_Liberty_Head_Large_Cent')  ?> of <?php echo $coin->getCoinByTypeByMint('Braided_Hair_Liberty_Head_Large_Cent') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Braided_Hair_Liberty_Head_Large_Cent'), $coin->getCoinByTypeByMint('Braided_Hair_Liberty_Head_Large_Cent')) ?>%)</td>
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
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair </a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Draped_Bust_Large_Cent">Draped Bust</a><a class="brownLink" href="viewProgressList.php?coinType=Draped_Bust_Large_Cent"></a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Classic_Head_Large_Cent">Classic Head</a><a class="brownLink" href="viewProgressList.php?coinType=Classic_Head_Large_Cent"></a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</a><a class="brownLink" href="viewProgressList.php?coinType=Coronet_Liberty_Head_Large_Cent"></a></strong></td>
    
    <td align="center"><a href="viewProgressList.php?coinType=Braided_Hair_Liberty_Head_Large_Cent"><strong>Braided Hair</strong></a></td>
  </tr>
  <tr>
    <td align="center"><div id="chart_div2" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div3" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div4" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div5" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div6" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div7" style="width: 150px; height: 150px;"></div></td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->dateSetCollectedNums($coinType='Flowing_Hair_Large_Cent', $userID).' of '. $collection->dateSetNums($coinType='Flowing_Hair_Large_Cent') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Flowing_Hair_Large_Cent', $userID), $collection->dateSetNums($coinType='Flowing_Hair_Large_Cent')) ?>%)</td>
    
    <td><?php echo $collection->dateSetCollectedNums($coinType='Liberty_Cap_Large_Cent', $userID).' of '. $collection->dateSetNums($coinType='Liberty_Cap_Large_Cent') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Liberty_Cap_Large_Cent', $userID), $collection->dateSetNums($coinType='Liberty_Cap_Large_Cent')) ?>%)</td>
    
        <td><?php echo $collection->dateSetCollectedNums($coinType='Draped_Bust_Large_Cent', $userID).' of '. $collection->dateSetNums($coinType='Draped_Bust_Large_Cent') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Draped_Bust_Large_Cent', $userID), $collection->dateSetNums($coinType='Draped_Bust_Large_Cent')) ?>%)</td>
        
            <td><?php echo $collection->dateSetCollectedNums($coinType='Classic_Head_Large_Cent', $userID).' of '. $collection->dateSetNums($coinType='Classic_Head_Large_Cent') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Classic_Head_Large_Cent', $userID), $collection->dateSetNums($coinType='Classic_Head_Large_Cent')) ?>%)</td>
            
                <td><?php echo $collection->dateSetCollectedNums($coinType='Coronet_Liberty_Head_Large_Cent', $userID).' of '. $collection->dateSetNums($coinType='Coronet_Liberty_Head_Large_Cent') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Coronet_Liberty_Head_Large_Cent', $userID), $collection->dateSetNums($coinType='Coronet_Liberty_Head_Large_Cent')) ?>%)</td>
                
    <td><?php echo $collection->dateSetCollectedNums($coinType='Braided_Hair_Liberty_Head_Large_Cent', $userID).' of '. $collection->dateSetNums($coinType='Braided_Hair_Liberty_Head_Large_Cent') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Braided_Hair_Liberty_Head_Large_Cent', $userID), $collection->dateSetNums($coinType='Braided_Hair_Liberty_Head_Large_Cent')) ?>%)</td>
  </tr>
</table>
