<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Minted', 'Collected'],
          ['Liberty Cap',  <?php echo $coin->getCoinByTypeByMint('Liberty_Cap_Eagle') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Eagle'); ?>],
          ['Coronet Head',  <?php echo $coin->getCoinByTypeByMint('Coronet_Head_Eagle') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Coronet_Head_Eagle'); ?>],
          ['Liberty Cap',  <?php echo $coin->getCoinByTypeByMint('Indian_Head_Eagle') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Indian_Head_Eagle'); ?>],
          ['Am Eagle',  <?php echo $coin->getCoinByTypeByMint('Quarter_Ounce_Gold') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Quarter_Ounce_Gold'); ?>],
		  ['1st Spouse',  <?php echo $coin->getCoinByTypeByMint('First_Spouse') ?>,  <?php echo $collection->getCollectionUniqueCountByType($userID, 'First_Spouse'); ?>],
          ['Buffalo',  <?php echo $coin->getCoinByTypeByMint('Quarter_Ounce_Buffalo') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Quarter_Ounce_Buffalo'); ?>],
		  ['10oz Platinum',  <?php echo $coin->getCoinByTypeByMint('Tenth_Ounce_Platinum') ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, 'Tenth_Ounce_Platinum'); ?>]
        ]);
			
	
		//Chart 2
		var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Liberty Cap',  <?php echo $collection->dateSetCollectedNums($coinType='Liberty_Cap_Eagle', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Liberty_Cap_Eagle') ?>]
        ]);
		var data3 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Coronet Head',  <?php echo $collection->dateSetCollectedNums($coinType='Coronet_Head_Eagle', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Coronet_Head_Eagle') ?>]
        ]);		
		var data4 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Liberty Cap',  <?php echo $collection->dateSetCollectedNums($coinType='Indian_Head_Eagle', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Indian_Head_Eagle') ?>]
        ]);	
		var data5 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Am Eagle',  <?php echo $collection->dateSetCollectedNums($coinType='Quarter_Ounce_Gold', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Quarter_Ounce_Gold') ?>]
        ]);			
		var data6 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['1st Spouse',  <?php echo $collection->dateSetCollectedNums($coinType='First_Spouse', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='First_Spouse') ?>]
        ]);	
		var data7 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Buffalo',  <?php echo $collection->dateSetCollectedNums($coinType='Quarter_Ounce_Buffalo', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Quarter_Ounce_Buffalo') ?>]
        ]);		
		var data8 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['10oz Platinum',  <?php echo $collection->dateSetCollectedNums($coinType='Tenth_Ounce_Platinum', $userID); ?>,  <?php echo $collection->dateSetNums($coinType='Tenth_Ounce_Platinum') ?>]
        ]);		

			
        var options = {
          title: '<?php echo $coinCategory ?> Progress',
		  colors: ['#814d37', '#b39477'],
          vAxis: {title: 'All Dollars', titleTextStyle: {color: 'black'}}
        };
        var options2 = {
          title: 'Liberty Cap',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options3 = {
          title: 'Coronet Head',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options4 = {
          title: 'Liberty Cap',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };	
        var options5 = {
          title: 'Am Eagle',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options6 = {
          title: '1st Spouse',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options7 = {
          title: 'Buffalo',
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
		 var options8 = {
          title: '10oz Platinum',
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
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Liberty_Cap_Eagle"> Liberty Cap </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Eagle')  ?> of <?php echo $coin->getCoinByTypeByMint('Liberty_Cap_Eagle') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Liberty_Cap_Eagle'), $coin->getCoinByTypeByMint('Liberty_Cap_Eagle')) ?>%)</td>
   </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Coronet_Head_Eagle"> Coronet Head</a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Coronet_Head_Eagle')  ?> of <?php echo $coin->getCoinByTypeByMint('Coronet_Head_Eagle') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Coronet_Head_Eagle'), $coin->getCoinByTypeByMint('Coronet_Head_Eagle')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Indian_Head_Eagle"> Indian Head </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Indian_Head_Eagle')  ?> of <?php echo $coin->getCoinByTypeByMint('Indian_Head_Eagle') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Indian_Head_Eagle'), $coin->getCoinByTypeByMint('Indian_Head_Eagle')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Quarter_Ounce_Gold"> Am Eagle </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Quarter_Ounce_Gold')  ?> of <?php echo $coin->getCoinByTypeByMint('Quarter_Ounce_Gold') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Quarter_Ounce_Gold'), $coin->getCoinByTypeByMint('Quarter_Ounce_Gold')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=First_Spouse">1st Spouse </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'First_Spouse')  ?> of <?php echo $coin->getCoinByTypeByMint('First_Spouse') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'First_Spouse'), $coin->getCoinByTypeByMint('First_Spouse')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><a href="viewListReport.php?coinType=Quarter_Ounce_Buffalo"><strong>Buffalo </strong></a></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Quarter_Ounce_Buffalo')  ?> of <?php echo $coin->getCoinByTypeByMint('Quarter_Ounce_Buffalo') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Quarter_Ounce_Buffalo'), $coin->getCoinByTypeByMint('Quarter_Ounce_Buffalo')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="viewListReport.php?coinType=Tenth_Ounce_Platinum"> 10oz Platinum </a></strong></td>
    <td width="168" align="right"><?php echo $collection->getCollectionUniqueCountByType($userID, 'Tenth_Ounce_Platinum')  ?> of <?php echo $coin->getCoinByTypeByMint('Tenth_Ounce_Platinum') ?> (<?php echo percent($collection->getCollectionUniqueCountByType($userID, 'Tenth_Ounce_Platinum'), $coin->getCoinByTypeByMint('Tenth_Ounce_Platinum')) ?>%)</td>
  </tr>
  <tr>
    <td width="126"></td>
    <td width="168" align="right"></td>
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
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Liberty_Cap_Eagle">Liberty Cap </a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Coronet_Head_Eagle">Coronet Head</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Indian_Head_Eagle">Indian Head</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Quarter_Ounce_Gold">Am Eagle</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=First_Spouse">1st Spouse</a></strong></td>
    <td align="center"><a href="viewProgressList.php?coinType=Quarter_Ounce_Buffalo"><strong>Buffalo</strong></a></td>
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
    <td><?php echo $collection->dateSetCollectedNums($coinType='Liberty_Cap_Eagle', $userID).' of '. $collection->dateSetNums($coinType='Liberty_Cap_Eagle') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Liberty_Cap_Eagle', $userID), $collection->dateSetNums($coinType='Liberty_Cap_Eagle')) ?>%)</td>
    
    <td><?php echo $collection->dateSetCollectedNums($coinType='Coronet_Head_Eagle', $userID).' of '. $collection->dateSetNums($coinType='Coronet_Head_Eagle') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Coronet_Head_Eagle', $userID), $collection->dateSetNums($coinType='Coronet_Head_Eagle')) ?>%)</td>
    
        <td><?php echo $collection->dateSetCollectedNums($coinType='Indian_Head_Eagle', $userID).' of '. $collection->dateSetNums($coinType='Indian_Head_Eagle') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Indian_Head_Eagle', $userID), $collection->dateSetNums($coinType='Indian_Head_Eagle')) ?>%)</td>
        
            <td><?php echo $collection->dateSetCollectedNums($coinType='Quarter_Ounce_Gold', $userID).' of '. $collection->dateSetNums($coinType='Quarter_Ounce_Gold') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Quarter_Ounce_Gold', $userID), $collection->dateSetNums($coinType='Quarter_Ounce_Gold')) ?>%)</td>
            
                <td><?php echo $collection->dateSetCollectedNums($coinType='First_Spouse', $userID).' of '. $collection->dateSetNums($coinType='First_Spouse') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='First_Spouse', $userID), $collection->dateSetNums($coinType='First_Spouse')) ?>%)</td>
                
    <td><?php echo $collection->dateSetCollectedNums($coinType='Quarter_Ounce_Buffalo', $userID).' of '. $collection->dateSetNums($coinType='Quarter_Ounce_Buffalo') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Quarter_Ounce_Buffalo', $userID), $collection->dateSetNums($coinType='Quarter_Ounce_Buffalo')) ?>%)</td>
  </tr>
</table>
<br />

<table width="100%" border="0" class="autoCoinTbl">
  <tr>
    <td align="center"><strong><a class="brownLink" href="viewProgressList.php?coinType=Tenth_Ounce_Platinum">10oz Platinum </a></strong></td>
    <td align="center">&nbsp;</td>
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
    <td><?php echo $collection->dateSetCollectedNums($coinType='Tenth_Ounce_Platinum', $userID).' of '. $collection->dateSetNums($coinType='Tenth_Ounce_Platinum') ?> (<?php echo percent( $collection->dateSetCollectedNums($coinType='Tenth_Ounce_Platinum', $userID), $collection->dateSetNums($coinType='Tenth_Ounce_Platinum')) ?>%)</td>
    
    <td>&nbsp;</td>
    
        <td>&nbsp;</td>
        
            <td>&nbsp;</td>
            
                <td>&nbsp;</td>
                
    <td>&nbsp;</td>
  </tr>
</table>