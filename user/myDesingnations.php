<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$designation = strip_tags($_GET['designation']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My <?php echo strip_tags($_GET['designation']); ?> Coins</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 100
} );
});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:110%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/Mixed_Cents.jpg" width="100" height="100" align="middle">My  <?php echo strip_tags($_GET['designation']); ?> Coins </h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="33%" class="darker"><a href="myCoins.php">Coins</a></td>
    <td width="33%" class="darker"> <a href="myGrades.php">Grade Report</a></td>
    <td width="33%" class="darker"><a href="myError.php">Errors</a></td>  
  </tr>
</table> 

<hr />

<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="25%"><strong>Total Collected Pieces</strong></td>
    <td width="11%" align="right"><?php echo $collection->getDesignationGradeCount($userID, strip_tags($_GET['designation'])); ?></td>
    <td width="36%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Unique Pieces</strong></td>
    <td align="right"><?php echo $collection->getDesignationDistinctGradeCount($userID, strip_tags($_GET['designation'])); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td><strong>Total Collection Investment</strong></td>
    <td align="right">$<?php echo $collection->totalDesignationInvestment($userID, strip_tags($_GET['designation'])); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />
<table width="100%" border="0" id="clientTbl">
  <thead class="darker">
  <tr>
    <td width="52%">Year / Mint</td>
    <td width="16%" align="center">Problem</td>  
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM collection WHERE designation = '".strip_tags($_GET['designation'])."' AND userID = '$userID' ORDER BY denomination DESC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td width="57%"><strong>No '.strip_tags($_GET['designation']).' Coins Collected</strong></td>
		  <td width="11%" align="center">&nbsp;</td>  
		  <td width="14%" align="center">&nbsp;</td>
		  <td width="18%" align="center">&nbsp;</td>
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {
		  $collection->getCollectionById(intval($row['collectionID']));    
		  $coin-> getCoinById(intval($row['coinID']));
		  $collectionFolder->getCollectionFolderById(intval($row['collectfolderID']));
		   
       if($collection->getGrader() != 'None') {
			$coinIcon = '<img align="absbottom" src="../img/graded.jpg" width="20" height="20" /> ';
			$grader = '/'.$collection->getGrader();
		}
		else { 
		   $coinIcon = '<img align="absbottom" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
		   $grader = '';
		}
  
  echo '
    <tr align="center">
    <td align="left">'.$coinIcon.'<a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.$coin->getCoinName().' '.$collection->getVarietyForCoin(intval($row['collectionID'])).'</a></td>
	<td>'. $collection->getProblem().'</td>
		<td>'.date("M j, Y",strtotime($collection->getCoinDate())) .'</td>
	<td>$'. $collection->getCoinPrice() .'</td>	   
  </tr>
  ';
	  }
}

?>
</tbody>
<tfoot class="darker">
  <tr>
    <td width="52%">Year / Mint</td>
    <td width="16%" align="center">Problem</td>  
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>
<br />
<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>