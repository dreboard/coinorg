<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Minted', 'Collected'],
          ['Shield Nickel',  <?php echo $coin->getCoinByTypeByMint('Shield_Nickel') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Shield_Nickel'); ?>],
          ['Liberty Head',  <?php echo $coin->getCoinByTypeByMint('Liberty_Head_Nickel') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Head_Nickel'); ?>],
          ['Indian Head',  <?php echo $coin->getCoinByTypeByMint('Indian Head Nickel') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Indian Head Nickel'); ?>],
          ['Jefferson',  <?php echo $coin->getCoinByTypeByMint('Jefferson_Nickel') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Jefferson_Nickel'); ?>],
		  ['Westward',  <?php echo $coin->getCoinByTypeByMint('Westward_Journey') ?>,  <?php echo $collection->getCollectionUniqueCountByType($userID, 'Westward_Journey'); ?>],
          ['Return to Monticello',  <?php echo $coin->getCoinByTypeByMint('Return_to_Monticello') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Return_to_Monticello'); ?>]
        ]);
			
	
		//Chart 2
		var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Shield Nickel',  <?php echo $collection->dateSetCollectedNums($coinType='Shield_Nickel', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Shield_Nickel') ?>]
        ]);
		var data3 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Liberty Head',  <?php echo $collection->dateSetCollectedNums($coinType='Liberty_Head_Nickel', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Liberty_Head_Nickel') ?>]
        ]);		
		var data4 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Indian Head',  <?php echo $collection->dateSetCollectedNums($coinType='Indian Head Nickel', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Indian Head Nickel') ?>]
        ]);	
		var data5 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Jefferson',  <?php echo $collection->dateSetCollectedNums($coinType='Jefferson_Nickel', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Jefferson_Nickel') ?>]
        ]);			
		var data6 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Westward Journey',  <?php echo $collection->dateSetCollectedNums($coinType='Westward_Journey', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Westward_Journey') ?>]
        ]);	
		var data7 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Return to Monticello',  <?php echo $collection->dateSetCollectedNums($coinType='Return_to_Monticello', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Return_to_Monticello') ?>]
        ]);				
        var options = {
          title: 'Nickel Progress',
		  colors: ['#814d37', '#b39477'],
          vAxis: {title: 'All Small Cents', titleTextStyle: {color: 'black'}}
        };
        var options2 = {
          title: 'Shield Nickel',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options3 = {
          title: 'Liberty Head',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options4 = {
          title: 'Indian Head',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };	
        var options5 = {
          title: 'Jefferson',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options6 = {
          title: 'Westward',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options7 = {
          title: 'Return to Monticello',
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
     <td width="774" rowspan="14" align="right" valign="top" id="graphRow">
       <div id="chart_div" style="width:100%; height: 350px;"></div>
     </td>
   </tr>
   <tr>
     <td colspan="2" class="smallTxt"><strong>Over All Collection Progress</strong></td>
    </tr>
   <tr>
    <td width="258"><strong><a class="brownLink" href="viewListReport.php?coinType=Shield_Nickel"> Shield </a></strong></td>
    <td width="255" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Shield_Nickel')  ?> of <?php echo $coin->getCoinByTypeByMint('Shield_Nickel') ?>     (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Shield_Nickel'), $coin->getCoinByTypeByMint('Shield_Nickel')) ?>%)</td>
   </tr>
  <tr>
    <td width="258"><strong><a class="brownLink" href="viewListReport.php?coinType=Liberty_Head_Nickel"> Liberty</a></strong></td>
    <td width="255" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Head_Nickel')  ?> of <?php echo $coin->getCoinByTypeByMint('Liberty_Head_Nickel') ?>    (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Liberty_Head_Nickel'), $coin->getCoinByTypeByMint('Liberty_Head_Nickel')) ?>%)</td>
  </tr>
  <tr>
    <td width="258"><strong><a class="brownLink" href="viewListReport.php?coinType=Indian_Head_Nickel"> Indian Head</a></strong></td>
    <td width="255" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Indian_Head_Nickel')  ?> of <?php echo $coin->getCoinByTypeByMint('Indian_Head_Nickel') ?>    (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Indian_Head_Nickel'), $coin->getCoinByTypeByMint('Indian_Head_Nickel')) ?>%)</td>
  </tr>
  <tr>
    <td width="258"><strong><a class="brownLink" href="viewListReport.php?coinType=Jefferson_Nickel"> Jefferson </a></strong></td>
    <td width="255" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Jefferson_Nickel')  ?> of <?php echo $coin->getCoinByTypeByMint('Jefferson_Nickel') ?>    (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Jefferson_Nickel'), $coin->getCoinByTypeByMint('Jefferson_Nickel')) ?>%)</td>
  </tr>
  <tr>
    <td width="258"><strong><a class="brownLink" href="viewListReport.php?coinType=Westward_Journey">Westward</a></strong></td>
    <td width="255" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Westward_Journey')  ?> of <?php echo $coin->getCoinByTypeByMint('Westward_Journey') ?>    (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Westward_Journey'), $coin->getCoinByTypeByMint('Westward_Journey')) ?>%)</td>
  </tr>
  <tr>
    <td width="258"><a href="viewListReport.php?coinType=Return_to_Monticello"><strong>Monticello</strong></a></td>
    <td width="255" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Return_to_Monticello')  ?> of <?php echo $coin->getCoinByTypeByMint('Return_to_Monticello') ?>    (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Return_to_Monticello'), $coin->getCoinByTypeByMint('Return_to_Monticello')) ?>%)</td>
  </tr>
  <tr>
    <td width="258">&nbsp;</td>
    <td width="255" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="258">&nbsp;</td>
    <td width="255" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="258">&nbsp;</td>
    <td width="255" align="right">&nbsp;</td>
   </tr>
  <tr>
    <td width="258">&nbsp;</td>
    <td width="255" align="right">&nbsp;</td>
   </tr>
  <tr>
    <td width="258">&nbsp;</td>
    <td width="255" align="right">&nbsp;</td>
   </tr>
  <tr>
    <td width="258" valign="top">&nbsp;</td>
    <td width="255" align="right" valign="top">&nbsp;</td>
   </tr>
 </table>
 <hr />
 <h3>Date Set Progress</h3>
 
    <table width="100%" border="0" class="autoCoinTbl">
  <tr>
    <td align="center"><strong><a class="brownLink" href="viewListReport.php?coinType=Shield_Nickel">Shield</a><a class="brownLink" href="viewProgressList.php?coinType=Shield_Nickel"></a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewListReport.php?coinType=Liberty_Head_Nickel">Liberty</a><a class="brownLink" href="viewProgressList.php?coinType=Liberty_Head_Nickel"> Head</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewListReport.php?coinType=Indian_Head_Nickel">Indian Head</a><a class="brownLink" href="viewProgressList.php?coinType=Indian_Head_Nickel"></a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewListReport.php?coinType=Jefferson_Nickel">Jefferson</a><a class="brownLink" href="viewProgressList.php?coinType=Jefferson_Nickel"></a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewListReport.php?coinType=Westward_Journey">Westward Journey</a><a class="brownLink" href="viewProgressList.php?coinType=Westward_Journey"></a></strong></td>
    <td align="center"><a href="viewListReport.php?coinType=Return_to_Monticello"><strong>Return to Monticello</strong></a><a href="viewProgressList.php?coinType=Return_to_Monticello"></a></td>
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
    <td><?php echo $collection->dateSetCollectedNums($coinType='Shield_Nickel', $userID).' of '. $collection->dateSetNums($coinType='Shield_Nickel') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Shield_Nickel', $userID), $collection->dateSetNums($coinType='Shield_Nickel')) ?>%)</td>
    
    <td><?php echo $collection->dateSetCollectedNums($coinType='Liberty_Head_Nickel', $userID).' of '. $collection->dateSetNums($coinType='Liberty_Head_Nickel') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Liberty_Head_Nickel', $userID), $collection->dateSetNums($coinType='Liberty_Head_Nickel')) ?>%)</td>
    
        <td><?php echo $collection->dateSetCollectedNums($coinType='Indian_Head_Nickel', $userID).' of '. $collection->dateSetNums($coinType='Indian_Head_Nickel') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Indian_Head_Nickel', $userID), $collection->dateSetNums($coinType='Indian_Head_Nickel')) ?>%)</td>
        
            <td><?php echo $collection->dateSetCollectedNums($coinType='Jefferson_Nickel', $userID).' of '. $collection->dateSetNums($coinType='Jefferson_Nickel') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Jefferson_Nickel', $userID), $collection->dateSetNums($coinType='Jefferson_Nickel')) ?>%)</td>
            
                <td><?php echo $collection->dateSetCollectedNums($coinType='Westward_Journey', $userID).' of '. $collection->dateSetNums($coinType='Westward_Journey') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Westward_Journey', $userID), $collection->dateSetNums($coinType='Westward_Journey')) ?>%)</td>
                
    <td><?php echo $collection->dateSetCollectedNums($coinType='Return_to_Monticello', $userID).' of '. $collection->dateSetNums($coinType='Return_to_Monticello') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Return_to_Monticello', $userID), $collection->dateSetNums($coinType='Return_to_Monticello')) ?>%)</td>
  </tr>
</table>
