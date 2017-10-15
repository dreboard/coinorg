<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Untitled Document</title>
<?php include("../headItems.php"); ?>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Half Cent',     <?php echo $collection->getTotalByMintCountByCategory('Half_Cent') ?>],
          ['Large Cent',  <?php echo $collection->getTotalByMintCountByCategory('Large_Cent') ?>],
          ['Small Cent',  <?php echo $collection->getTotalByMintCountByCategory('Small_Cent') ?>],
          ['Half_Dime', <?php echo $collection->getTotalByMintCountByCategory('Half_Dime') ?>],
		  ['Nickel', <?php echo $collection->getTotalByMintCountByCategory('Nickel') ?>],
		  ['Dime', <?php echo $collection->getTotalByMintCountByCategory('Dime') ?>],
		  ['Twenty Cent', <?php echo $collection->getTotalByMintCountByCategory('Twenty Cent') ?>],
		  ['Quarter', <?php echo $collection->getTotalByMintCountByCategory('Quarter') ?>],
		  ['Half Dollar', <?php echo $collection->getTotalByMintCountByCategory('Half Dollar') ?>],
		  ['Dollar', <?php echo $collection->getTotalByMintCountByCategory('Dollar') ?>]
        ]);

        var options = {
          title: 'Collection By Type'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>


</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<div id="piechart" style="width: 900px; height: 300px;"></div>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>


<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>