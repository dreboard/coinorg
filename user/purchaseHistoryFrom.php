<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET["from"])) { 
$purchaseFrom = str_replace('_', ' ', strip_tags($_GET["from"]));
$purchaseType = str_replace('_', ' ', strip_tags($_GET["purchaseType"]));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Purchase History</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 3, "asc" ]],
	"iDisplayLength": 25
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
<h1>My <?php echo $purchaseFrom ?> Purchase History</h1>

<table width="100%" border="0" class="reportListLinks">
  <tr class="darker">
    <td width="166"><a href="purchaseHistoryFrom.php?from=<?php echo $purchaseFrom ?>&amp;purchaseType=Coins">Coins</a></td>
    <td width="166"><a href="purchaseHistoryFrom.php?from=<?php echo $purchaseFrom ?>&amp;purchaseType=Folders">Folders</a></td>
    <td width="166"><a href="purchaseHistoryFrom.php?from=<?php echo $purchaseFrom ?>&amp;purchaseType=Rolls">Rolls</a></td>
    <td width="166"><a href="purchaseHistoryFrom.php?from=<?php echo $purchaseFrom ?>&amp;purchaseType=Sets">Mint Sets</a></td>
    <td width="166"><a href="purchaseHistoryFrom.php?from=<?php echo $purchaseFrom ?>&amp;purchaseType=Bags">Bags</a></td>
    <td width="166"><a href="purchaseHistoryFrom.php?from=<?php echo $purchaseFrom ?>&amp;purchaseType=Boxes">Boxes</a></td>
  </tr>
</table>


<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="25%"><strong>Total Collected Pieces</strong></td>
    <td width="33%"><?php echo $Invest->getMasterPiecesTotalFrom($userID, $purchaseFrom); ?></td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
  </tr>
    <tr>
    <td><strong>Total Collection Investment</strong></td>
    <td><?php echo $collection->getCoinSumByAccountFrom($userID, $purchaseFrom); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />

<?php include("../inc/finance/".$purchaseType.".php"); ?>

<p>&nbsp;</p>
<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>