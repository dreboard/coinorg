<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Minted', 'Collected'],
          ['Flying Eagle',  <?php echo $coin->getCoinByTypeByMint('Flying_Eagle') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Flying_Eagle'); ?>],
          ['Indian Head',  <?php echo $coin->getCoinByTypeByMint('Indian_Head') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Indian_Head'); ?>],
          ['Lincoln Wheat',  <?php echo $coin->getCoinByTypeByMint('Lincoln_Wheat') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Lincoln_Wheat'); ?>],
          ['Lincoln Memorial',  <?php echo $coin->getCoinByTypeByMint('Lincoln_Memorial') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Lincoln_Memorial'); ?>],
		  ['Lincoln Bicentennial',  <?php echo $coin->getCoinByTypeByMint('Lincoln_Bicentennial') ?>,  <?php echo $collection->getCollectionUniqueCountByType($userID, 'Lincoln_Bicentennial'); ?>],
          ['Union Shield',  <?php echo $coin->getCoinByTypeByMint('Union_Shield') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Union_Shield'); ?>]
        ]);
			
	
		//Chart 2
		var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Flying Eagle',  <?php echo $collection->dateSetCollectedNums($coinType='Flying_Eagle', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Flying_Eagle') ?>]
        ]);
		var data3 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Flying Eagle',  <?php echo $collection->dateSetCollectedNums($coinType='Indian_Head', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Indian_Head') ?>]
        ]);		
		var data4 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Lincoln Wheat',  <?php echo $collection->dateSetCollectedNums($coinType='Lincoln_Wheat', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Lincoln_Wheat') ?>]
        ]);	
		var data5 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Lincoln Memorial',  <?php echo $collection->dateSetCollectedNums($coinType='Lincoln_Memorial', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Lincoln_Memorial') ?>]
        ]);			
		var data6 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Bicentennial',  <?php echo $collection->dateSetCollectedNums($coinType='Lincoln_Bicentennial', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Lincoln_Bicentennial') ?>]
        ]);	
		var data7 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Union Shield',  <?php echo $collection->dateSetCollectedNums($coinType='Union_Shield', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Union_Shield') ?>]
        ]);				
        var options = {
          title: '<?php echo $coinCategory ?> Progress',
		  colors: ['#b39477', '#814d37'],
          vAxis: {title: 'All Small Cents', titleTextStyle: {color: 'black'}}
        };
        var options2 = {
          title: 'Flying Eagle',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options3 = {
          title: 'Indian Head',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options4 = {
          title: 'Lincoln Wheat',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };	
        var options5 = {
          title: 'Lincoln Memorial',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options6 = {
          title: 'Bicentennial',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options7 = {
          title: 'Union Shield',
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
     <td width="692" rowspan="14" align="right" valign="top" id="graphRow">
       <div id="chart_div" style="width:100%; height: 350px;"></div>
     </td>
   </tr>
   <tr>
     <td colspan="2" class="smallTxt"><strong>Over All Collection Progress</strong></td>
    </tr>
   <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Flying_Eagle"> Flying Eagle </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Flying_Eagle')  ?> of <?php echo $coin->getCoinByTypeByMint('Flying_Eagle') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Flying_Eagle'), $coin->getCoinByTypeByMint('Flying_Eagle')) ?>%)</td>
   </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Indian_Head"> Indian Head</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Indian_Head')  ?> of <?php echo $coin->getCoinByTypeByMint('Indian_Head') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Indian_Head'), $coin->getCoinByTypeByMint('Indian_Head')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Lincoln_Wheat"> Wheat </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Lincoln_Wheat')  ?> of <?php echo $coin->getCoinByTypeByMint('Lincoln_Wheat') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Lincoln_Wheat'), $coin->getCoinByTypeByMint('Lincoln_Wheat')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Lincoln_Memorial"> Memorial </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Lincoln_Memorial')  ?> of <?php echo $coin->getCoinByTypeByMint('Lincoln_Memorial') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Lincoln_Memorial'), $coin->getCoinByTypeByMint('Lincoln_Memorial')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Lincoln_Bicentennial">Bicentennial</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Lincoln_Bicentennial')  ?> of <?php echo $coin->getCoinByTypeByMint('Lincoln_Bicentennial') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Lincoln_Bicentennial'), $coin->getCoinByTypeByMint('Lincoln_Bicentennial')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><a href="viewListReport.php?coinType=Union_Shield"><strong>Union Shield</strong></a></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Union_Shield')  ?> of <?php echo $coin->getCoinByTypeByMint('Union_Shield') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Union_Shield'), $coin->getCoinByTypeByMint('Union_Shield')) ?>%)</td>
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
  <tr>
    <td width="126" valign="top">&nbsp;</td>
    <td width="168" align="right" valign="top">&nbsp;</td>
   </tr>
 </table>
 <hr />
 <h3>Date Set Progress</h3>
 
    <table width="100%" border="0" class="autoCoinTbl">
  <tr>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Flying_Eagle">Flying Eagle </a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Indian_Head">Indian Head</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Lincoln_Wheat">Wheat</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Lincoln_Memorial">Memorial</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Lincoln_Bicentennial">Bicentennial</a></strong></td>
    <td align="center"><a href="viewProgressList.php?coinType=Union_Shield"><strong>Union Shield</strong></a></td>
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
    <td><?php echo $collection->dateSetCollectedNums($coinType='Flying_Eagle', $userID).' of '. $collection->dateSetNums($coinType='Flying_Eagle') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Flying_Eagle', $userID), $collection->dateSetNums($coinType='Flying_Eagle')) ?>%)</td>
    
    <td><?php echo $collection->dateSetCollectedNums($coinType='Indian_Head', $userID).' of '. $collection->dateSetNums($coinType='Indian_Head') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Indian_Head', $userID), $collection->dateSetNums($coinType='Indian_Head')) ?>%)</td>
    
        <td><?php echo $collection->dateSetCollectedNums($coinType='Lincoln_Wheat', $userID).' of '. $collection->dateSetNums($coinType='Lincoln_Wheat') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Lincoln_Wheat', $userID), $collection->dateSetNums($coinType='Lincoln_Wheat')) ?>%)</td>
        
            <td><?php echo $collection->dateSetCollectedNums($coinType='Lincoln_Memorial', $userID).' of '. $collection->dateSetNums($coinType='Lincoln_Memorial') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Lincoln_Memorial', $userID), $collection->dateSetNums($coinType='Lincoln_Memorial')) ?>%)</td>
            
                <td><?php echo $collection->dateSetCollectedNums($coinType='Lincoln_Bicentennial', $userID).' of '. $collection->dateSetNums($coinType='Lincoln_Bicentennial') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Lincoln_Bicentennial', $userID), $collection->dateSetNums($coinType='Lincoln_Bicentennial')) ?>%)</td>
                
    <td><?php echo $collection->dateSetCollectedNums($coinType='Union_Shield', $userID).' of '. $collection->dateSetNums($coinType='Union_Shield') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Union_Shield', $userID), $collection->dateSetNums($coinType='Union_Shield')) ?>%)</td>
  </tr>
</table>
