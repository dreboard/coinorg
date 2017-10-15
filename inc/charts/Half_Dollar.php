<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Minted', 'Collected'],
          ['Flowing Hair',  <?php echo $coin->getCoinByTypeByMint('Flowing_Hair_Half_Dollar') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Flowing_Hair_Half_Dollar'); ?>],
          ['Draped Bust',  <?php echo $coin->getCoinByTypeByMint('Draped_Bust_Half_Dollar') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Half_Dollar'); ?>],
          ['Liberty Cap',  <?php echo $coin->getCoinByTypeByMint('Liberty_Cap_Half_Dollar') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Half_Dollar'); ?>],
          ['Seated Liberty',  <?php echo $coin->getCoinByTypeByMint('Seated_Liberty_Half_Dollar') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Seated_Liberty_Half_Dollar'); ?>],
		  ['Barber',  <?php echo $coin->getCoinByTypeByMint('Barber_Half_Dollar') ?>,  <?php echo $collection->getCollectionUniqueCountByType($userID, 'Barber_Half_Dollar'); ?>],
          ['Walking Liberty',  <?php echo $coin->getCoinByTypeByMint('Walking_Liberty') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Walking_Liberty'); ?>],
		  ['Franklin',  <?php echo $coin->getCoinByTypeByMint('Franklin_Half_Dollar') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Franklin_Half_Dollar'); ?>],
          ['Kennedy',  <?php echo $coin->getCoinByTypeByMint('Kennedy_Half_Dollar') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Kennedy_Half_Dollar'); ?>]
        ]);
			
	
		//Chart 2
		var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Flowing Hair',  <?php echo $collection->dateSetCollectedNums($coinType='Flowing_Hair_Half_Dollar', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Flowing_Hair_Half_Dollar') ?>]
        ]);
		var data3 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Draped Bust',  <?php echo $collection->dateSetCollectedNums($coinType='Draped_Bust_Half_Dollar', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Draped_Bust_Half_Dollar') ?>]
        ]);		
		var data4 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Liberty Cap',  <?php echo $collection->dateSetCollectedNums($coinType='Liberty_Cap_Half_Dollar', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Liberty_Cap_Half_Dollar') ?>]
        ]);	
		var data5 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Seated Liberty',  <?php echo $collection->dateSetCollectedNums($coinType='Seated_Liberty_Half_Dollar', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Seated_Liberty_Half_Dollar') ?>]
        ]);			
		var data6 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Barber',  <?php echo $collection->dateSetCollectedNums($coinType='Barber_Half_Dollar', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Barber_Half_Dollar') ?>]
        ]);	
		var data7 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Walking Liberty',  <?php echo $collection->dateSetCollectedNums($coinType='Walking_Liberty', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Walking_Liberty') ?>]
        ]);		
		var data8 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Franklin',  <?php echo $collection->dateSetCollectedNums($coinType='Franklin_Half_Dollar', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Franklin_Half_Dollar') ?>]
        ]);		
		var data9 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Kennedy',  <?php echo $collection->dateSetCollectedNums($coinType='Kennedy_Half_Dollar', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Kennedy_Half_Dollar') ?>]
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
          title: 'Liberty Cap',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };	
        var options5 = {
          title: 'Seated Liberty',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options6 = {
          title: 'Barber',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options7 = {
          title: 'Walking Liberty',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
		 var options8 = {
          title: 'Franklin',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options9 = {
          title: 'Kennedy',
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
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Flowing_Hair_Half_Dollar"> Flowing Hair </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Flowing_Hair_Half_Dollar')  ?> of <?php echo $coin->getCoinByTypeByMint('Flowing_Hair_Half_Dollar') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Flowing_Hair_Half_Dollar'), $coin->getCoinByTypeByMint('Flowing_Hair_Half_Dollar')) ?>%)</td>
   </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Draped_Bust_Half_Dollar"> Draped Bust</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Half_Dollar')  ?> of <?php echo $coin->getCoinByTypeByMint('Draped_Bust_Half_Dollar') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Half_Dollar'), $coin->getCoinByTypeByMint('Draped_Bust_Half_Dollar')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Liberty_Cap_Half_Dollar"> Liberty Cap </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Half_Dollar')  ?> of <?php echo $coin->getCoinByTypeByMint('Liberty_Cap_Half_Dollar') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Half_Dollar'), $coin->getCoinByTypeByMint('Liberty_Cap_Half_Dollar')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Seated_Liberty_Half_Dollar"> Seated Liberty </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Seated_Liberty_Half_Dollar')  ?> of <?php echo $coin->getCoinByTypeByMint('Seated_Liberty_Half_Dollar') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Seated_Liberty_Half_Dollar'), $coin->getCoinByTypeByMint('Seated_Liberty_Half_Dollar')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Barber_Half_Dollar">Barber </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Barber_Half_Dollar')  ?> of <?php echo $coin->getCoinByTypeByMint('Barber_Half_Dollar') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Barber_Half_Dollar'), $coin->getCoinByTypeByMint('Barber_Half_Dollar')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><a href="viewListReport.php?coinType=Walking_Liberty"><strong>Walking Liberty </strong></a></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Walking_Liberty')  ?> of <?php echo $coin->getCoinByTypeByMint('Walking_Liberty') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Walking_Liberty'), $coin->getCoinByTypeByMint('Walking_Liberty')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Franklin_Half_Dollar"> Franklin </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Franklin_Half_Dollar')  ?> of <?php echo $coin->getCoinByTypeByMint('Franklin_Half_Dollar') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Franklin_Half_Dollar'), $coin->getCoinByTypeByMint('Franklin_Half_Dollar')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Kennedy_Half_Dollar"> Kennedy</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Kennedy_Half_Dollar')  ?> of <?php echo $coin->getCoinByTypeByMint('Kennedy_Half_Dollar') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Kennedy_Half_Dollar'), $coin->getCoinByTypeByMint('Kennedy_Half_Dollar')) ?>%)</td>
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
    <td width="126" valign="top">&nbsp;</td>
    <td width="168" align="right" valign="top">&nbsp;</td>
   </tr>
 </table>
 <hr />
 <h3>Date Set Progress</h3>
 
    <table width="100%" border="0" class="autoCoinTbl">
  <tr>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair </a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Draped_Bust_Half_Dollar">Draped Bust</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Seated_Liberty_Half_Dollar">Seated Liberty</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Barber_Half_Dollar">Barber</a></strong></td>
    <td align="center"><a href="viewProgressList.php?coinType=Walking_Liberty"><strong>Walking Liberty</strong></a></td>
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
    <td><?php echo $collection->dateSetCollectedNums($coinType='Flowing_Hair_Half_Dollar', $userID).' of '. $collection->dateSetNums($coinType='Flowing_Hair_Half_Dollar') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Flowing_Hair_Half_Dollar', $userID), $collection->dateSetNums($coinType='Flowing_Hair_Half_Dollar')) ?>%)</td>
    
    <td><?php echo $collection->dateSetCollectedNums($coinType='Draped_Bust_Half_Dollar', $userID).' of '. $collection->dateSetNums($coinType='Draped_Bust_Half_Dollar') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Draped_Bust_Half_Dollar', $userID), $collection->dateSetNums($coinType='Draped_Bust_Half_Dollar')) ?>%)</td>
    
        <td><?php echo $collection->dateSetCollectedNums($coinType='Liberty_Cap_Half_Dollar', $userID).' of '. $collection->dateSetNums($coinType='Liberty_Cap_Half_Dollar') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Liberty_Cap_Half_Dollar', $userID), $collection->dateSetNums($coinType='Liberty_Cap_Half_Dollar')) ?>%)</td>
        
            <td><?php echo $collection->dateSetCollectedNums($coinType='Seated_Liberty_Half_Dollar', $userID).' of '. $collection->dateSetNums($coinType='Seated_Liberty_Half_Dollar') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Seated_Liberty_Half_Dollar', $userID), $collection->dateSetNums($coinType='Seated_Liberty_Half_Dollar')) ?>%)</td>
            
                <td><?php echo $collection->dateSetCollectedNums($coinType='Barber_Half_Dollar', $userID).' of '. $collection->dateSetNums($coinType='Barber_Half_Dollar') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Barber_Half_Dollar', $userID), $collection->dateSetNums($coinType='Barber_Half_Dollar')) ?>%)</td>
                
    <td><?php echo $collection->dateSetCollectedNums($coinType='Walking_Liberty', $userID).' of '. $collection->dateSetNums($coinType='Walking_Liberty') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Walking_Liberty', $userID), $collection->dateSetNums($coinType='Walking_Liberty')) ?>%)</td>
  </tr>
</table>
<br />

<table width="100%" border="0" class="autoCoinTbl">
  <tr>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Franklin_Half_Dollar">Franklin </a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Kennedy_Half_Dollar">Kennedy</a></strong></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
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
    <td><?php echo $collection->dateSetCollectedNums($coinType='Franklin_Half_Dollar', $userID).' of '. $collection->dateSetNums($coinType='Franklin_Half_Dollar') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Franklin_Half_Dollar', $userID), $collection->dateSetNums($coinType='Franklin_Half_Dollar')) ?>%)</td>
    
    <td><?php echo $collection->dateSetCollectedNums($coinType='Kennedy_Half_Dollar', $userID).' of '. $collection->dateSetNums($coinType='Kennedy_Half_Dollar') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Kennedy_Half_Dollar', $userID), $collection->dateSetNums($coinType='Kennedy_Half_Dollar')) ?>%)</td>
    
        <td>&nbsp;</td>
        
            <td>&nbsp;</td>
            
                <td>&nbsp;</td>
                
    <td>&nbsp;</td>
  </tr>
</table>