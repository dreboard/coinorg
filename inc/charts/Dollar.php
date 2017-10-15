<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Minted', 'Collected'],
          ['Flowing Hair',  <?php echo $coin->getCoinByTypeByMint('Flowing_Hair_Dollar') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Flowing_Hair_Dollar'); ?>],
          ['Draped Bust',  <?php echo $coin->getCoinByTypeByMint('Draped_Bust_Dollar') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Dollar'); ?>],
          ['Gobrecht',  <?php echo $coin->getCoinByTypeByMint('Gobrecht_Dollar') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Gobrecht_Dollar'); ?>],
          ['Seated Liberty',  <?php echo $coin->getCoinByTypeByMint('Seated_Liberty_Dollar') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Seated_Liberty_Dollar'); ?>],
		  ['Trade Dollar',  <?php echo $coin->getCoinByTypeByMint('Trade_Dollar') ?>,  <?php echo $collection->getCollectionUniqueCountByType($userID, 'Trade_Dollar'); ?>],
          ['Morgan Dollar',  <?php echo $coin->getCoinByTypeByMint('Morgan_Dollar') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Morgan_Dollar'); ?>],
		  ['Peace Dollar',  <?php echo $coin->getCoinByTypeByMint('Peace_Dollar') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Peace_Dollar'); ?>],
          ['Eisenhower',  <?php echo $coin->getCoinByTypeByMint('Eisenhower_Dollar') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Eisenhower_Dollar'); ?>],
          ['SBA',  <?php echo $coin->getCoinByTypeByMint('Susan_B_Anthony_Dollar') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Susan_B_Anthony_Dollar'); ?>],
          ['Sacagawea',  <?php echo $coin->getCoinByTypeByMint('Sacagawea_Dollar') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Sacagawea_Dollar'); ?>],
		  ['Presidential',  <?php echo $coin->getCoinByTypeByMint('Presidential_Dollar') ?>,  <?php echo $collection->getCollectionUniqueCountByType($userID, 'Presidential_Dollar'); ?>]
        ]);
			
	
		//Chart 2
		var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Flowing Hair',  <?php echo $collection->dateSetCollectedNums($coinType='Flowing_Hair_Dollar', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Flowing_Hair_Dollar') ?>]
        ]);
		var data3 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Draped Bust',  <?php echo $collection->dateSetCollectedNums($coinType='Draped_Bust_Dollar', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Draped_Bust_Dollar') ?>]
        ]);		
		var data4 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Gobrecht',  <?php echo $collection->dateSetCollectedNums($coinType='Gobrecht_Dollar', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Gobrecht_Dollar') ?>]
        ]);	
		var data5 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Seated Liberty',  <?php echo $collection->dateSetCollectedNums($coinType='Seated_Liberty_Dollar', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Seated_Liberty_Dollar') ?>]
        ]);			
		var data6 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Trade Dollar',  <?php echo $collection->dateSetCollectedNums($coinType='Trade_Dollar', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Trade_Dollar') ?>]
        ]);	
		var data7 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Morgan Dollar',  <?php echo $collection->dateSetCollectedNums($coinType='Morgan_Dollar', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Morgan_Dollar') ?>]
        ]);		
		var data8 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Peace Dollar',  <?php echo $collection->dateSetCollectedNums($coinType='Peace_Dollar', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Peace_Dollar') ?>]
        ]);		
		var data9 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Eisenhower Dollar',  <?php echo $collection->dateSetCollectedNums($coinType='Eisenhower_Dollar', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Eisenhower_Dollar') ?>]
        ]);	
		var data10 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Susan B Anthony',  <?php echo $collection->dateSetCollectedNums($coinType='Susan_B_Anthony_Dollar', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Susan_B_Anthony_Dollar') ?>]
        ]);			
		var data11 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Sacagawea',  <?php echo $collection->dateSetCollectedNums($coinType='Sacagawea_Dollar', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Sacagawea_Dollar') ?>]
        ]);	
		var data12 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Presidential',  <?php echo $collection->dateSetCollectedNums($coinType='Presidential_Dollar', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Presidential_Dollar') ?>]
        ]);				
        var options = {
          title: '<?php echo $coinCategory ?> Progress',
		  colors: ['#814d37', '#b39477'],
          vAxis: {title: 'All Dollars', titleTextStyle: {color: 'black'}}
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
          title: 'Gobrecht',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };	
        var options5 = {
          title: 'Seated Liberty',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options6 = {
          title: 'Trade Dollar',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options7 = {
          title: 'Morgan Dollar',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
		 var options8 = {
          title: 'Peace Dollar',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options9 = {
          title: 'Eisenhower Dollar',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options10 = {
          title: 'Susan B Anthony',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };	
        var options11 = {
          title: 'Sacagawea',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options12 = {
          title: 'Bicentennial',
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
		var chart8 = new google.visualization.ColumnChart(document.getElementById('chart_div8'));
        chart8.draw(data8, options8);
		var chart9 = new google.visualization.ColumnChart(document.getElementById('chart_div9'));
        chart9.draw(data9, options9);
		var chart10 = new google.visualization.ColumnChart(document.getElementById('chart_div10'));
        chart10.draw(data10, options10);
		var chart11 = new google.visualization.ColumnChart(document.getElementById('chart_div11'));
        chart11.draw(data11, options11);	
		var chart12 = new google.visualization.ColumnChart(document.getElementById('chart_div12'));
        chart12.draw(data12, options12);	
				
}		  
    </script>
<br />
<table width="100%" border="0">
   <tr>
      <td class="smallTxt">&nbsp;</td>
      <td align="right">&nbsp;</td>
     <td width="692" rowspan="14" align="right" valign="top" id="graphRow">
       <div id="chart_div" style="width:100%; height: 350px;"></div>
     </td>
   </tr>
   <tr>
     <td colspan="2" class="smallTxt"><strong>Over All Collection Progress</strong></td>
    </tr>
   <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Flowing_Hair_Dollar"> Flowing Hair </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Flowing_Hair_Dollar')  ?> of <?php echo $coin->getCoinByTypeByMint('Flowing_Hair_Dollar') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Flowing_Hair_Dollar'), $coin->getCoinByTypeByMint('Flowing_Hair_Dollar')) ?>%)</td>
   </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Draped_Bust_Dollar"> Draped Bust</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Dollar')  ?> of <?php echo $coin->getCoinByTypeByMint('Draped_Bust_Dollar') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Dollar'), $coin->getCoinByTypeByMint('Draped_Bust_Dollar')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Gobrecht_Dollar"> Gobrecht </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Gobrecht_Dollar')  ?> of <?php echo $coin->getCoinByTypeByMint('Gobrecht_Dollar') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Gobrecht_Dollar'), $coin->getCoinByTypeByMint('Gobrecht_Dollar')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Seated_Liberty_Dollar"> Seated Liberty </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Seated_Liberty_Dollar')  ?> of <?php echo $coin->getCoinByTypeByMint('Seated_Liberty_Dollar') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Seated_Liberty_Dollar'), $coin->getCoinByTypeByMint('Seated_Liberty_Dollar')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Trade_Dollar">Trade </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Trade_Dollar')  ?> of <?php echo $coin->getCoinByTypeByMint('Trade_Dollar') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Trade_Dollar'), $coin->getCoinByTypeByMint('Trade_Dollar')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><a href="viewListReport.php?coinType=Morgan_Dollar"><strong>Morgan </strong></a></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Morgan_Dollar')  ?> of <?php echo $coin->getCoinByTypeByMint('Morgan_Dollar') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Morgan_Dollar'), $coin->getCoinByTypeByMint('Morgan_Dollar')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Peace_Dollar"> Peace </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Peace_Dollar')  ?> of <?php echo $coin->getCoinByTypeByMint('Peace_Dollar') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Peace_Dollar'), $coin->getCoinByTypeByMint('Peace_Dollar')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Eisenhower_Dollar"> Eisenhower</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Eisenhower_Dollar')  ?> of <?php echo $coin->getCoinByTypeByMint('Eisenhower_Dollar') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Eisenhower_Dollar'), $coin->getCoinByTypeByMint('Eisenhower_Dollar')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Susan_B_Anthony_Dollar"> SBA </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Susan_B_Anthony_Dollar')  ?> of <?php echo $coin->getCoinByTypeByMint('Susan_B_Anthony_Dollar') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Susan_B_Anthony_Dollar'), $coin->getCoinByTypeByMint('Susan_B_Anthony_Dollar')) ?>%)</td>
   </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Lincoln_Memorial"> Sacagawea </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Sacagawea_Dollar')  ?> of <?php echo $coin->getCoinByTypeByMint('Sacagawea_Dollar') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Sacagawea_Dollar'), $coin->getCoinByTypeByMint('Sacagawea_Dollar')) ?>%)</td>
   </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Presidential_Dollar">Presidential</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Presidential_Dollar')  ?> of <?php echo $coin->getCoinByTypeByMint('Presidential_Dollar') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Presidential_Dollar'), $coin->getCoinByTypeByMint('Presidential_Dollar')) ?>%)</td>
   </tr>
  <tr>
    <td width="126" valign="top">&nbsp;</td>
    <td width="168" align="right" valign="top">&nbsp;</td>
   </tr>
 </table>
 <hr />
 <h3>Date Set Progress</h3>
 
    <table width="100%" border="0" class="autoCoinTbl">
  <tr>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Flowing_Hair_Dollar">Flowing Hair </a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Draped_Bust_Dollar">Draped Bust</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Gobrecht_Dollar">Gobrecht</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Seated_Liberty_Dollar">Seated Liberty</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Trade_Dollar">Trade Dollar</a></strong></td>
    <td align="center"><a href="viewProgressList.php?coinType=Morgan_Dollar"><strong>Morgan Dollar</strong></a></td>
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
    <td><?php echo $collection->dateSetCollectedNums($coinType='Flowing_Hair_Dollar', $userID).' of '. $collection->dateSetNums($coinType='Flowing_Hair_Dollar') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Flowing_Hair_Dollar', $userID), $collection->dateSetNums($coinType='Flowing_Hair_Dollar')) ?>%)</td>
    
    <td><?php echo $collection->dateSetCollectedNums($coinType='Draped_Bust_Dollar', $userID).' of '. $collection->dateSetNums($coinType='Draped_Bust_Dollar') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Draped_Bust_Dollar', $userID), $collection->dateSetNums($coinType='Draped_Bust_Dollar')) ?>%)</td>
    
        <td><?php echo $collection->dateSetCollectedNums($coinType='Gobrecht_Dollar', $userID).' of '. $collection->dateSetNums($coinType='Gobrecht_Dollar') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Gobrecht_Dollar', $userID), $collection->dateSetNums($coinType='Gobrecht_Dollar')) ?>%)</td>
        
            <td><?php echo $collection->dateSetCollectedNums($coinType='Seated_Liberty_Dollar', $userID).' of '. $collection->dateSetNums($coinType='Seated_Liberty_Dollar') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Seated_Liberty_Dollar', $userID), $collection->dateSetNums($coinType='Seated_Liberty_Dollar')) ?>%)</td>
            
                <td><?php echo $collection->dateSetCollectedNums($coinType='Trade_Dollar', $userID).' of '. $collection->dateSetNums($coinType='Trade_Dollar') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Trade_Dollar', $userID), $collection->dateSetNums($coinType='Trade_Dollar')) ?>%)</td>
                
    <td><?php echo $collection->dateSetCollectedNums($coinType='Morgan_Dollar', $userID).' of '. $collection->dateSetNums($coinType='Morgan_Dollar') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Morgan_Dollar', $userID), $collection->dateSetNums($coinType='Morgan_Dollar')) ?>%)</td>
  </tr>
</table>
<br />

<table width="100%" border="0" class="autoCoinTbl">
  <tr>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Peace_Dollar">Peace Dollar </a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Susan_B_Anthony_Dollar">SBA</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Sacagawea_Dollar">Sacagawea</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Presidential_Dollar">Presidential</a></strong></td>
    <td align="center"></td>
  </tr>
  <tr>
    <td align="center"><div id="chart_div8" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div9" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div10" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div11" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div12" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div13" style="width: 150px; height: 150px;"></div></td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->dateSetCollectedNums($coinType='Peace_Dollar', $userID).' of '. $collection->dateSetNums($coinType='Peace_Dollar') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Peace_Dollar', $userID), $collection->dateSetNums($coinType='Peace_Dollar')) ?>%)</td>
    
    <td><?php echo $collection->dateSetCollectedNums($coinType='Eisenhower_Dollar', $userID).' of '. $collection->dateSetNums($coinType='Eisenhower_Dollar') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Eisenhower_Dollar', $userID), $collection->dateSetNums($coinType='Eisenhower_Dollar')) ?>%)</td>
    
        <td><?php echo $collection->dateSetCollectedNums($coinType='Susan_B_Anthony_Dollar', $userID).' of '. $collection->dateSetNums($coinType='Susan_B_Anthony_Dollar') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Susan_B_Anthony_Dollar', $userID), $collection->dateSetNums($coinType='Susan_B_Anthony_Dollar')) ?>%)</td>
        
            <td><?php echo $collection->dateSetCollectedNums($coinType='Sacagawea_Dollar', $userID).' of '. $collection->dateSetNums($coinType='Sacagawea_Dollar') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Sacagawea_Dollar', $userID), $collection->dateSetNums($coinType='Sacagawea_Dollar')) ?>%)</td>
            
                <td><?php echo $collection->dateSetCollectedNums($coinType='Presidential_Dollar', $userID).' of '. $collection->dateSetNums($coinType='Presidential_Dollar') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Presidential_Dollar', $userID), $collection->dateSetNums($coinType='Presidential_Dollar')) ?>%)</td>
                
    <td>&nbsp;</td>
  </tr>
</table>