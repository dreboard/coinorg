<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Minted', 'Collected'],
          ['Liberty Cap',  <?php echo $Bullion->getGoldTypeMintCount('Liberty_Cap_Half_Eagle') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Half_Eagle'); ?>],
          ['Turban Head',  <?php echo $Bullion->getGoldTypeMintCount('Turban_Head_Half_Eagle') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Turban_Head_Half_Eagle'); ?>],
          ['Liberty Head',  <?php echo $Bullion->getGoldTypeMintCount('Liberty_Head_Half_Eagle') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Head_Half_Eagle'); ?>],
          ['Coronet Head',  <?php echo $Bullion->getGoldTypeMintCount('Coronet_Head_Half_Eagle') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Coronet_Head_Half_Eagle'); ?>],
		  ['Lincoln Indian Head',  <?php echo $Bullion->getGoldTypeMintCount('Indian_Head_Half_Eagle') ?>,  <?php echo $collection->getCollectionUniqueCountByType($userID, 'Indian_Head_Half_Eagle'); ?>]
        ]);
			
	
		//Chart 2
		var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Liberty Cap',  <?php echo $collection->dateSetCollectedNums($coinType='Liberty_Cap_Half_Eagle', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Liberty_Cap_Half_Eagle') ?>]
        ]);
		var data3 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Liberty Cap',  <?php echo $collection->dateSetCollectedNums($coinType='Turban_Head_Half_Eagle', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Turban_Head_Half_Eagle') ?>]
        ]);		
		var data4 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Liberty Head',  <?php echo $collection->dateSetCollectedNums($coinType='Liberty_Head_Half_Eagle', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Liberty_Head_Half_Eagle') ?>]
        ]);	
		var data5 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Coronet Head',  <?php echo $collection->dateSetCollectedNums($coinType='Coronet_Head_Half_Eagle', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Coronet_Head_Half_Eagle') ?>]
        ]);			
		var data6 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Indian Head',  <?php echo $collection->dateSetCollectedNums($coinType='Indian_Head_Half_Eagle', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Indian_Head_Half_Eagle') ?>]
        ]);	
		
        var options = {
          title: '<?php echo $coinCategory ?> Progress',
		  colors: ['#814d37','#b39477'],
          vAxis: {title: ' ', titleTextStyle: {color: 'black'}}
        };
        var options2 = {
          title: 'Liberty Cap',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options3 = {
          title: 'Turban Head',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options4 = {
          title: 'Liberty Head',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };	
        var options5 = {
          title: 'Coronet Head',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options6 = {
          title: 'Indian Head',
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
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Liberty_Cap_Half_Eagle"> Liberty Cap </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Half_Eagle')  ?> of <?php echo $Bullion->getGoldTypeMintCount('Liberty_Cap_Half_Eagle') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Half_Eagle'), $Bullion->getGoldTypeMintCount('Liberty_Cap_Half_Eagle')) ?>%)</td>
   </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Turban_Head_Half_Eagle"> Turban Head</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Turban_Head_Half_Eagle')  ?> of <?php echo $Bullion->getGoldTypeMintCount('Turban_Head_Half_Eagle') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Turban_Head_Half_Eagle'), $Bullion->getGoldTypeMintCount('Turban_Head_Half_Eagle')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Liberty_Head_Half_Eagle"> Liberty </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Head_Half_Eagle')  ?> of <?php echo $Bullion->getGoldTypeMintCount('Liberty_Head_Half_Eagle') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Liberty_Head_Half_Eagle'), $Bullion->getGoldTypeMintCount('Liberty_Head_Half_Eagle')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Coronet_Head_Half_Eagle"> Coronet </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Coronet_Head_Half_Eagle')  ?> of <?php echo $Bullion->getGoldTypeMintCount('Coronet_Head_Half_Eagle') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Coronet_Head_Half_Eagle'), $Bullion->getGoldTypeMintCount('Coronet_Head_Half_Eagle')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Indian_Head_Half_Eagle">Indian Head</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Indian_Head_Half_Eagle')  ?> of <?php echo $Bullion->getGoldTypeMintCount('Indian_Head_Half_Eagle') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Indian_Head_Half_Eagle'), $Bullion->getGoldTypeMintCount('Indian_Head_Half_Eagle')) ?>%)</td>
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
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Liberty_Cap_Half_Eagle">Liberty Cap </a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Turban_Head_Half_Eagle">Turban Head</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Liberty_Head_Half_Eagle">Liberty</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Coronet_Head_Half_Eagle">Coronet</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Indian_Head_Half_Eagle">Indian Head</a></strong></td>
  </tr>
  <tr>
    <td align="center"><div id="chart_div2" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div3" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div4" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div5" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div6" style="width: 150px; height: 150px;"></div></td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->dateSetCollectedNums($coinType='Liberty_Cap_Half_Eagle', $userID).' of '. $collection->dateSetNums($coinType='Liberty_Cap_Half_Eagle') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Liberty_Cap_Half_Eagle', $userID), $collection->dateSetNums($coinType='Liberty_Cap_Half_Eagle')) ?>%)</td>
    
    <td><?php echo $collection->dateSetCollectedNums($coinType='Turban_Head_Half_Eagle', $userID).' of '. $collection->dateSetNums($coinType='Turban_Head_Half_Eagle') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Turban_Head_Half_Eagle', $userID), $collection->dateSetNums($coinType='Turban_Head_Half_Eagle')) ?>%)</td>
    
        <td><?php echo $collection->dateSetCollectedNums($coinType='Liberty_Head_Half_Eagle', $userID).' of '. $collection->dateSetNums($coinType='Liberty_Head_Half_Eagle') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Liberty_Head_Half_Eagle', $userID), $collection->dateSetNums($coinType='Liberty_Head_Half_Eagle')) ?>%)</td>
        
            <td><?php echo $collection->dateSetCollectedNums($coinType='Coronet_Head_Half_Eagle', $userID).' of '. $collection->dateSetNums($coinType='Coronet_Head_Half_Eagle') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Coronet_Head_Half_Eagle', $userID), $collection->dateSetNums($coinType='Coronet_Head_Half_Eagle')) ?>%)</td>
            
                <td><?php echo $collection->dateSetCollectedNums($coinType='Indian_Head_Half_Eagle', $userID).' of '. $collection->dateSetNums($coinType='Indian_Head_Half_Eagle') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Indian_Head_Half_Eagle', $userID), $collection->dateSetNums($coinType='Indian_Head_Half_Eagle')) ?>%)</td>
                
  </tr>
</table>
