<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Minted', 'Collected'],
          ['Draped Bust',  <?php echo $coin->getCoinByTypeByMint('Draped_Bust_Quarter') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Quarter'); ?>],
          ['Liberty Cap',  <?php echo $coin->getCoinByTypeByMint('Liberty_Cap_Quarter') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Quarter'); ?>],
          ['Seated Liberty',  <?php echo $coin->getCoinByTypeByMint('Seated_Liberty_Quarter') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Seated_Liberty_Quarter'); ?>],
          ['Barber',  <?php echo $coin->getCoinByTypeByMint('Barber_Quarter') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Barber_Quarter'); ?>],
		  ['Standing Liberty Dollar',  <?php echo $coin->getCoinByTypeByMint('Standing_Liberty') ?>,  <?php echo $collection->getCollectionUniqueCountByType($userID, 'Standing_Liberty'); ?>],
          ['Washington',  <?php echo $coin->getCoinByTypeByMint('Washington_Quarter') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Washington_Quarter'); ?>],
		  ['Statehood',  <?php echo $coin->getCoinByTypeByMint('State_Quarter') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'State_Quarter'); ?>],
          ['DC & Territories',  <?php echo $coin->getCoinByTypeByMint('District_of_Columbia_and_US_Territories') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'District_of_Columbia_and_US_Territories'); ?>],
          ['America',  <?php echo $coin->getCoinByTypeByMint('America_the_Beautiful_Quarter') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'America_the_Beautiful_Quarter'); ?>]
        ]);
			
	
		//Chart 2
		var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Draped Bust',  <?php echo $collection->dateSetCollectedNums($coinType='Draped_Bust_Quarter', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Draped_Bust_Quarter') ?>]
        ]);
		var data3 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Liberty Cap',  <?php echo $collection->dateSetCollectedNums($coinType='Liberty_Cap_Quarter', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Liberty_Cap_Quarter') ?>]
        ]);		
		var data4 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Seated Liberty',  <?php echo $collection->dateSetCollectedNums($coinType='Seated_Liberty_Quarter', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Seated_Liberty_Quarter') ?>]
        ]);	
		var data5 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Barber',  <?php echo $collection->dateSetCollectedNums($coinType='Barber_Quarter', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Barber_Quarter') ?>]
        ]);			
		var data6 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Standing Liberty Dollar',  <?php echo $collection->dateSetCollectedNums($coinType='Standing_Liberty', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Standing_Liberty') ?>]
        ]);	
		var data7 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Washington',  <?php echo $collection->dateSetCollectedNums($coinType='Washington_Quarter', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Washington_Quarter') ?>]
        ]);		
		var data8 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Statehood',  <?php echo $collection->dateSetCollectedNums($coinType='State_Quarter', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='State_Quarter') ?>]
        ]);		
		var data9 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['DC & Territories Dollar',  <?php echo $collection->dateSetCollectedNums($coinType='District_of_Columbia_and_US_Territories', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='District_of_Columbia_and_US_Territories') ?>]
        ]);	
		var data10 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Susan B Anthony',  <?php echo $collection->dateSetCollectedNums($coinType='America_the_Beautiful_Quarter', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='America_the_Beautiful_Quarter') ?>]
        ]);			
		
        var options = {
          title: '<?php echo $coinCategory ?> Progress',
		  colors: ['#814d37', '#b39477'],
          vAxis: {title: ' ', titleTextStyle: {color: 'black'}}
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
          title: 'Standing Liberty Dollar',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options7 = {
          title: 'Washington',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
		 var options8 = {
          title: 'Statehood',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options9 = {
          title: 'DC & Territories Dollar',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options10 = {
          title: 'America',
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
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Draped_Bust_Quarter"> Draped Bust </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Quarter')  ?> of <?php echo $coin->getCoinByTypeByMint('Draped_Bust_Quarter') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Draped_Bust_Quarter'), $coin->getCoinByTypeByMint('Draped_Bust_Quarter')) ?>%)</td>
   </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Liberty_Cap_Quarter"> Liberty Cap</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Quarter')  ?> of <?php echo $coin->getCoinByTypeByMint('Liberty_Cap_Quarter') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Quarter'), $coin->getCoinByTypeByMint('Liberty_Cap_Quarter')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Seated_Liberty_Quarter"> Seated Liberty </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Seated_Liberty_Quarter')  ?> of <?php echo $coin->getCoinByTypeByMint('Seated_Liberty_Quarter') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Seated_Liberty_Quarter'), $coin->getCoinByTypeByMint('Seated_Liberty_Quarter')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Barber_Quarter"> Barber </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Barber_Quarter')  ?> of <?php echo $coin->getCoinByTypeByMint('Barber_Quarter') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Barber_Quarter'), $coin->getCoinByTypeByMint('Barber_Quarter')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Standing_Liberty">Standing Liberty </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Standing_Liberty')  ?> of <?php echo $coin->getCoinByTypeByMint('Standing_Liberty') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Standing_Liberty'), $coin->getCoinByTypeByMint('Standing_Liberty')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><a href="viewListReport.php?coinType=Washington_Quarter"><strong>Washington </strong></a></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Washington_Quarter')  ?> of <?php echo $coin->getCoinByTypeByMint('Washington_Quarter') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Washington_Quarter'), $coin->getCoinByTypeByMint('Washington_Quarter')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=State_Quarter"> Statehood </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'State_Quarter')  ?> of <?php echo $coin->getCoinByTypeByMint('State_Quarter') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'State_Quarter'), $coin->getCoinByTypeByMint('State_Quarter')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=District_of_Columbia_and_US_Territories"> DC & Territories</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'District_of_Columbia_and_US_Territories')  ?> of <?php echo $coin->getCoinByTypeByMint('District_of_Columbia_and_US_Territories') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'District_of_Columbia_and_US_Territories'), $coin->getCoinByTypeByMint('District_of_Columbia_and_US_Territories')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=America_the_Beautiful_Quarter"> America </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'America_the_Beautiful_Quarter')  ?> of <?php echo $coin->getCoinByTypeByMint('America_the_Beautiful_Quarter') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'America_the_Beautiful_Quarter'), $coin->getCoinByTypeByMint('America_the_Beautiful_Quarter')) ?>%)</td>
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
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Draped_Bust_Quarter">Draped Bust </a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Liberty_Cap_Quarter">Liberty Cap</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Seated_Liberty_Quarter">Seated Liberty</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Barber_Quarter">Barber</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Standing_Liberty">Standing Liberty</a></strong></td>
    <td align="center"><a href="viewProgressList.php?coinType=Washington_Quarter"><strong>Washington</strong></a></td>
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
    <td><?php echo $collection->dateSetCollectedNums($coinType='Draped_Bust_Quarter', $userID).' of '. $collection->dateSetNums($coinType='Draped_Bust_Quarter') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Draped_Bust_Quarter', $userID), $collection->dateSetNums($coinType='Draped_Bust_Quarter')) ?>%)</td>
    
    <td><?php echo $collection->dateSetCollectedNums($coinType='Liberty_Cap_Quarter', $userID).' of '. $collection->dateSetNums($coinType='Liberty_Cap_Quarter') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Liberty_Cap_Quarter', $userID), $collection->dateSetNums($coinType='Liberty_Cap_Quarter')) ?>%)</td>
    
        <td><?php echo $collection->dateSetCollectedNums($coinType='Seated_Liberty_Quarter', $userID).' of '. $collection->dateSetNums($coinType='Seated_Liberty_Quarter') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Seated_Liberty_Quarter', $userID), $collection->dateSetNums($coinType='Seated_Liberty_Quarter')) ?>%)</td>
        
            <td><?php echo $collection->dateSetCollectedNums($coinType='Barber_Quarter', $userID).' of '. $collection->dateSetNums($coinType='Barber_Quarter') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Barber_Quarter', $userID), $collection->dateSetNums($coinType='Barber_Quarter')) ?>%)</td>
            
                <td><?php echo $collection->dateSetCollectedNums($coinType='Standing_Liberty', $userID).' of '. $collection->dateSetNums($coinType='Standing_Liberty') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Standing_Liberty', $userID), $collection->dateSetNums($coinType='Standing_Liberty')) ?>%)</td>
                
    <td><?php echo $collection->dateSetCollectedNums($coinType='Washington_Quarter', $userID).' of '. $collection->dateSetNums($coinType='Washington_Quarter') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Washington_Quarter', $userID), $collection->dateSetNums($coinType='Washington_Quarter')) ?>%)</td>
  </tr>
</table>
<br />

<table width="100%" border="0" class="autoCoinTbl">
  <tr>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=State_Quarter">Statehood </a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=District_of_Columbia_and_US_Territories">DC & Territories </a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=America_the_Beautiful_Quarter">America</a></strong></td>
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
    <td><?php echo $collection->dateSetCollectedNums($coinType='State_Quarter', $userID).' of '. $collection->dateSetNums($coinType='State_Quarter') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='State_Quarter', $userID), $collection->dateSetNums($coinType='State_Quarter')) ?>%)</td>
    
    <td><?php echo $collection->dateSetCollectedNums($coinType='District_of_Columbia_and_US_Territories', $userID).' of '. $collection->dateSetNums($coinType='District_of_Columbia_and_US_Territories') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='District_of_Columbia_and_US_Territories', $userID), $collection->dateSetNums($coinType='District_of_Columbia_and_US_Territories')) ?>%)</td>
    
        <td><?php echo $collection->dateSetCollectedNums($coinType='America_the_Beautiful_Quarter', $userID).' of '. $collection->dateSetNums($coinType='America_the_Beautiful_Quarter') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='America_the_Beautiful_Quarter', $userID), $collection->dateSetNums($coinType='America_the_Beautiful_Quarter')) ?>%)</td>
        
            <td>&nbsp;</td>
            
                <td>&nbsp;</td>
                
    <td>&nbsp;</td>
  </tr>
</table>