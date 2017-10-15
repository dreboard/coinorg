<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Minted', 'Collected'],
          ['Half Cent',  <?php echo $collection->getTotalByMintCountByCategory('Half_Cent') ?>, <?php echo $collection->getByMintCountByCategoryByMint($userID, 'Half_Cent'); ?>],
          ['Large Cent',  <?php echo $collection->getTotalByMintCountByCategory('Large_Cent') ?>, <?php echo $collection->getByMintCountByCategoryByMint($userID, 'Large_Cent'); ?>],
          ['Small Cent',  <?php echo $collection->getTotalByMintCountByCategory('Small_Cent') ?>, <?php echo $collection->getByMintCountByCategoryByMint($userID, 'Small_Cent'); ?>],
          ['Half Dime',  <?php echo $collection->getTotalByMintCountByCategory('Half_Dime') ?>, <?php echo $collection->getByMintCountByCategoryByMint($userID, 'Half_Dime'); ?>],
		  ['Nickel',  <?php echo $collection->getTotalByMintCountByCategory('Nickel') ?>,  <?php echo $collection->getByMintCountByCategoryByMint($userID, 'Nickel'); ?>],
		  ['Dime',  <?php echo $collection->getTotalByMintCountByCategory('Dime') ?>, <?php echo $collection->getByMintCountByCategoryByMint($userID, 'Dime'); ?>],
          ['Twenty Cent',  <?php echo $collection->getTotalByMintCountByCategory('Twenty Cent') ?>, <?php echo $collection->getByMintCountByCategoryByMint($userID, 'Twenty Cent'); ?>],
          ['Quarter',  <?php echo $collection->getTotalByMintCountByCategory('Quarter') ?>, <?php echo $collection->getByMintCountByCategoryByMint($userID, 'Quarter'); ?>],
		  ['Half Dollar',  <?php echo $collection->getTotalByMintCountByCategory('Half Dollar') ?>,  <?php echo $collection->getByMintCountByCategoryByMint($userID, 'Half Dollar'); ?>],
          ['Dollar',  <?php echo $collection->getTotalByMintCountByCategory('Dollar') ?>, <?php echo $collection->getByMintCountByCategoryByMint($userID, 'Dollar'); ?>]
        ]);

        var options = {
          title: 'Collection Progress',
		  colors: ['#814d37', '#b39477'],
          vAxis: {title: 'All Coins', titleTextStyle: {color: 'black'}}
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
<h1><img src="../img/Mixed_KeyCoins.jpg" width="100" height="100" align="middle"> U.S. Coin Collection Progress</h1>
 
 
 <table width="100%" border="0">
   <tr>
      <td class="smallTxt">&nbsp;</td>
      <td align="right">&nbsp;</td>
     <td width="417" rowspan="13" align="right" valign="top">
       <div id="chart_div" style="width:100%; height: 450px;"></div>
     </td>
   </tr>
   <tr>
    <td width="105" class="smallTxt"><strong><a href="Half_Cent.php">Half Cent</a></strong></td>
    <td width="84" align="right"><?php echo $collection->getByMintCountByCategoryByMint($userID, $coinCategory='Half_Cent'); ?> of <?php echo $collection->getTotalByMintCountByCategory($coinCategory='Half_Cent'); ?></td>
   </tr>
  <tr>
    <td width="105" class="smallTxt"><strong><a href="Large_Cent.php">Large Cent</a></strong></td>
    <td width="84" align="right"><?php echo $collection->getByMintCountByCategoryByMint($userID, $coinCategory='Large_Cent'); ?> of <?php echo $collection->getTotalByMintCountByCategory($coinCategory='Large_Cent'); ?></td>
   </tr>
  <tr>
    <td width="105" class="smallTxt"><strong><a href="Small_Cent.php">Small Cent</a></strong></td>
    <td width="84" align="right"><?php echo $collection->getByMintCountByCategoryByMint($userID, $coinCategory='Small_Cent'); ?> of <?php echo $collection->getTotalByMintCountByCategory($coinCategory='Small_Cent'); ?></td>
   </tr>
  <tr>
    <td width="105" class="smallTxt"><strong><a href="Two_Cent.php">Two Cent</a></strong></td>
    <td width="84" align="right"><?php echo $collection->getByMintCountByCategoryByMint($userID, $coinCategory='Two_Cent'); ?> of <?php echo $collection->getTotalByMintCountByCategory($coinCategory='Two_Cent'); ?></td>
   </tr>
  <tr>
    <td width="105" class="smallTxt"><strong><a href="Three_Cent.php">Three Cent</a></strong></td>
    <td width="84" align="right"><?php echo $collection->getByMintCountByCategoryByMint($userID, $coinCategory='Three_Cent'); ?> of <?php echo $collection->getTotalByMintCountByCategory($coinCategory='Three_Cent'); ?></td>
   </tr>
  <tr>
    <td width="105" class="smallTxt"><strong><a href="Half_Dime.php">Half Dime</a></strong></td>
    <td width="84" align="right"><?php echo $collection->getByMintCountByCategoryByMint($userID, $coinCategory='Half_Dime'); ?> of <?php echo $collection->getTotalByMintCountByCategory($coinCategory='Half_Dime'); ?></td>
   </tr>
  <tr>
    <td width="105" class="smallTxt"><strong><a href="Nickel.php">Nickels</a></strong></td>
    <td width="84" align="right"><?php echo $collection->getByMintCountByCategoryByMint($userID, $coinCategory='Nickel'); ?> of <?php echo $collection->getTotalByMintCountByCategory($coinCategory='Nickel'); ?></td>
   </tr>
  <tr>
    <td width="105" class="smallTxt"><strong><a href="Dime.php">Dimes</a></strong></td>
    <td width="84" align="right"><?php echo $collection->getByMintCountByCategoryByMint($userID, $coinCategory='Dime'); ?> of <?php echo $collection->getTotalByMintCountByCategory($coinCategory='Dime'); ?></td>
   </tr>
  <tr>
    <td width="105" class="smallTxt"><strong><a href="Twenty_Cent.php">Twenty Cent</a></strong></td>
    <td width="84" align="right"><?php echo $collection->getByMintCountByCategoryByMint($userID, $coinCategory='Twenty_Cent'); ?> of <?php echo $collection->getTotalByMintCountByCategory($coinCategory='Twenty_Cent'); ?></td>
   </tr>
  <tr>
    <td width="105" class="smallTxt"><strong><a href="Quarter.php">Quarters</a></strong></td>
    <td width="84" align="right"><?php echo $collection->getByMintCountByCategoryByMint($userID, $coinCategory='Quarter'); ?> of <?php echo $collection->getTotalByMintCountByCategory($coinCategory='Quarter'); ?></td>
   </tr>
  <tr>
    <td width="105" class="smallTxt"><strong><a href="Half_Dollar.php">Half Dollar</a></strong></td>
    <td width="84" align="right"><?php echo $collection->getByMintCountByCategoryByMint($userID, $coinCategory='Half_Dollar'); ?> of <?php echo $collection->getTotalByMintCountByCategory($coinCategory='Half_Dollar'); ?></td>
   </tr>
  <tr>
    <td width="105" valign="top" class="smallTxt"><strong><a href="Dollar.php">Dollar</a></strong></td>
    <td width="84" align="right" valign="top"><?php echo $collection->getByMintCountByCategoryByMint($userID, $coinCategory='Dollar'); ?> of <?php echo $collection->getTotalByMintCountByCategory($coinCategory='Dollar'); ?></td>
   </tr>
 </table>

