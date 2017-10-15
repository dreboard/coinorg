<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Minted', 'Collected'],
          ['Draped Bust',  <?php echo $coin->getCoinByTypeByMint('Draped_Bust_Dime') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Dime'); ?>],
          ['Liberty Cap',  <?php echo $coin->getCoinByTypeByMint('Liberty_Cap_Dime') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Dime'); ?>],
          ['Seated Liberty Dime',  <?php echo $coin->getCoinByTypeByMint('Seated_Liberty_Dime') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Seated_Liberty_Dime'); ?>],
          ['Barber Dime',  <?php echo $coin->getCoinByTypeByMint('Barber_Dime') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Barber_Dime'); ?>],
		  ['Winged Liberty Dime',  <?php echo $coin->getCoinByTypeByMint('Winged_Liberty_Dime') ?>,  <?php echo $collection->getCollectionUniqueCountByType($userID, 'Winged_Liberty_Dime'); ?>],
          ['Roosevelt Dime',  <?php echo $coin->getCoinByTypeByMint('Roosevelt_Dime') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Roosevelt_Dime'); ?>]
        ]);
			
	
		//Chart 2
		var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Draped Bust',  <?php echo $collection->dateSetCollectedNums($coinType='Draped_Bust_Dime', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Draped_Bust_Dime') ?>]
        ]);
		var data3 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Draped Bust',  <?php echo $collection->dateSetCollectedNums($coinType='Liberty_Cap_Dime', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Liberty_Cap_Dime') ?>]
        ]);		
		var data4 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Seated Liberty Dime',  <?php echo $collection->dateSetCollectedNums($coinType='Seated_Liberty_Dime', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Seated_Liberty_Dime') ?>]
        ]);	
		var data5 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Barber Dime',  <?php echo $collection->dateSetCollectedNums($coinType='Barber_Dime', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Barber_Dime') ?>]
        ]);			
		var data6 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Bicentennial',  <?php echo $collection->dateSetCollectedNums($coinType='Winged_Liberty_Dime', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Winged_Liberty_Dime') ?>]
        ]);	
		var data7 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Roosevelt Dime',  <?php echo $collection->dateSetCollectedNums($coinType='Roosevelt_Dime', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Roosevelt_Dime') ?>]
        ]);				
        var options = {
          title: 'Small Cent Progress',
		  colors: ['#814d37', '#b39477'],
          vAxis: {title: 'All Small Cents', titleTextStyle: {color: 'black'}}
        };
        var options2 = {
          title: 'Draped Bust',
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
          title: 'Barber',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options6 = {
          title: 'Mercury',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options7 = {
          title: 'Roosevelt',
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
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Draped_Bust_Dime"> Draped Bust </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Dime')  ?> of <?php echo $coin->getCoinByTypeByMint('Draped_Bust_Dime') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Dime'), $coin->getCoinByTypeByMint('Draped_Bust_Dime')) ?>%)</td>
   </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Liberty_Cap_Dime"> Liberty Cap</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Dime')  ?> of <?php echo $coin->getCoinByTypeByMint('Liberty_Cap_Dime') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Dime'), $coin->getCoinByTypeByMint('Liberty_Cap_Dime')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Seated_Liberty_Dime"> Seated Liberty </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Seated_Liberty_Dime')  ?> of <?php echo $coin->getCoinByTypeByMint('Seated_Liberty_Dime') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Seated_Liberty_Dime'), $coin->getCoinByTypeByMint('Seated_Liberty_Dime')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Barber_Dime"> Barber </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Barber_Dime')  ?> of <?php echo $coin->getCoinByTypeByMint('Barber_Dime') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Barber_Dime'), $coin->getCoinByTypeByMint('Barber_Dime')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Winged_Liberty_Dime">Mercury</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Winged_Liberty_Dime')  ?> of <?php echo $coin->getCoinByTypeByMint('Winged_Liberty_Dime') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Winged_Liberty_Dime'), $coin->getCoinByTypeByMint('Winged_Liberty_Dime')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><a href="viewListReport.php?coinType=Roosevelt_Dime"><strong>Roosevelt </strong></a></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Roosevelt_Dime')  ?> of <?php echo $coin->getCoinByTypeByMint('Roosevelt_Dime') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Roosevelt_Dime'), $coin->getCoinByTypeByMint('Roosevelt_Dime')) ?>%)</td>
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
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Draped_Bust_Dime">Draped Bust </a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Liberty_Cap_Dime">Liberty Cap</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Seated_Liberty_Dime">Seated Liberty</a><a class="brownLink" href="viewProgressList.php?coinType=Seated_Liberty_Dime"></a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Barber_Dime">Barber</a><a class="brownLink" href="viewProgressList.php?coinType=Barber_Dime"></a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Winged_Liberty_Dime">Mercury</a><a class="brownLink" href="viewProgressList.php?coinType=Winged_Liberty_Dime"></a></strong></td>
    <td align="center"><a href="viewProgressList.php?coinType=Roosevelt_Dime"><strong>Roosevelt</strong></a></td>
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
    <td><?php echo $collection->dateSetCollectedNums($coinType='Draped_Bust_Dime', $userID).' of '. $collection->dateSetNums($coinType='Draped_Bust_Dime') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Draped_Bust_Dime', $userID), $collection->dateSetNums($coinType='Draped_Bust_Dime')) ?>%)</td>
    
    <td><?php echo $collection->dateSetCollectedNums($coinType='Liberty_Cap_Dime', $userID).' of '. $collection->dateSetNums($coinType='Liberty_Cap_Dime') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Liberty_Cap_Dime', $userID), $collection->dateSetNums($coinType='Liberty_Cap_Dime')) ?>%)</td>
    
        <td><?php echo $collection->dateSetCollectedNums($coinType='Seated_Liberty_Dime', $userID).' of '. $collection->dateSetNums($coinType='Seated_Liberty_Dime') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Seated_Liberty_Dime', $userID), $collection->dateSetNums($coinType='Seated_Liberty_Dime')) ?>%)</td>
        
            <td><?php echo $collection->dateSetCollectedNums($coinType='Barber_Dime', $userID).' of '. $collection->dateSetNums($coinType='Barber_Dime') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Barber_Dime', $userID), $collection->dateSetNums($coinType='Barber_Dime')) ?>%)</td>
            
                <td><?php echo $collection->dateSetCollectedNums($coinType='Winged_Liberty_Dime', $userID).' of '. $collection->dateSetNums($coinType='Winged_Liberty_Dime') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Winged_Liberty_Dime', $userID), $collection->dateSetNums($coinType='Winged_Liberty_Dime')) ?>%)</td>
                
    <td><?php echo $collection->dateSetCollectedNums($coinType='Roosevelt_Dime', $userID).' of '. $collection->dateSetNums($coinType='Roosevelt_Dime') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Roosevelt_Dime', $userID), $collection->dateSetNums($coinType='Roosevelt_Dime')) ?>%)</td>
  </tr>
</table>
