<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";

if (isset($_GET['design'])) { 
$design = str_replace('_', ' ', $_GET['design']);
$designLink = strip_tags($_GET['design']);
$designURL = str_replace(' ', '', $_GET['design']);
} 
$collectTotal = $collection->getCollectionCountById($userID);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My <?php echo $design ?> Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	

});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:130%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/<?php echo $designLink ?>.jpg" align="middle"> My <?php echo $design ?> Collection</h1>
<table width="100%" class="clear" id="designLinksTbl">
  <tr id="reportListLinks">
  <td width="14%" class="darker"><a href="reportDesign.php?design=<?php echo $designLink ?>">Report</a></td>
     <td width="14%" class="darker"><a href="reportDesignCoins.php?design=<?php echo $designLink ?>">Coins</a></td>
    <td width="13%" class="darker"><a href="reportDesignYear.php?design=<?php echo $designLink ?>&setYear=<?php echo $CoinDesign->getDesignStartYear($design) ?>">Year Sets</a></td> 
    <td width="20%" class="darker"> <a href="reportDesignGrade.php?design=<?php echo $designLink ?>">Grade Report</a></td>
    <td width="14%" class="darker">
      <select name="designSel" id="designSel" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
        >
        <option value="" selected="selected">Switch Design</option>
        <option value="reportDesign.php?design=Barber">Barber Coins</option>
        <option value="reportDesign.php?design=Seated_Liberty">Seated Liberty Coins</option>
        <option value="reportDesign.php?design=Flowing_Hair">Flowing Hair Coins</option>
        <option value="reportDesign.php?design=Draped_Bust">Draped Bust Coins</option>
        <option value="reportDesign.php?design=Liberty_Cap">Liberty Cap Coins</option>
      </select>
    </td>
 
  </tr>
  <tr align="center">
    <td class="darker"><h3><a href="viewDesignFolder.php?design=<?php echo $designLink ?>&page=1"><img src="../img/folderIcon.jpg" width="14" height="20" align="texttop" /> Folder View</a></h3></td>
    <td class="darker"><h3><a href="viewDesignErrors.php?design=<?php echo $designLink ?>"><img src="../img/errorIcon.jpg" width="20" height="20" align="absmiddle" /> Errors</a></h3></td>
    <td class="darker"><h3><a href="viewDesignList.php?design=<?php echo $designLink ?>"><img src="../img/checkList.jpg" width="21" height="20" align="texttop" /> Check List</a></h3></td>
    <td class="darker"><h3><a href="viewDesignCertList.php?design=<?php echo $designLink ?>"><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /> Certified Only</a></h3></td>
    <td class="darker">&nbsp;</td>
  </tr>
</table>  
  <br />

<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="49%"><strong>Total Collected </strong></td>
    <td width="51%"><?php echo $CoinDesign->getCollectionCountByDesign($userID, $design); ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $CoinDesign->getCoinSumByDesign($userID, $design); ?></td>
  </tr>
  <tr>
    <td><strong>Mint Collection Progress</strong></td>
    <td><?php echo $CoinDesign->getDesignByMintCountByID($userID, $design); ?> of <?php echo $CoinDesign->getTotalDesignByMintCount($design); ?> (<?php echo percent($CoinDesign->getDesignByMintCountByID($userID, $design), $CoinDesign->getTotalDesignByMintCount($design)); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Complete Collection Progress</strong></td>
    <td><?php echo $CoinDesign->getDesignCountByID($userID, $design); ?> of <?php echo $CoinDesign->getTotalDesignCount($design); ?> (<?php echo percent($CoinDesign->getDesignCountByID($userID, $design), $CoinDesign->getTotalDesignCount($design)); ?>%)</td>
  </tr>
  </table>
  <br />
  <?php include("../inc/design/".$designLink.".php"); ?>

<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>