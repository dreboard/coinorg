<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coinCategory = 'Dollar';
$coinVal = '1';
$collectTotal = $coin->getCoinCatCountByID($userID, $coinCategory);
$coinfaceval = $collectTotal * $coinVal;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Dollar Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
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
<h1><img src="../img/Mixed_Dollars.jpg" width="100" height="100" align="middle">My Commemorative Dollar Collection (<?php echo $collection->getTotalCollectedCoinsByID($coinCategory, $userID); ?>) Coins</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="14%" class="darker"><a href="#coins">Coins</a></td>
    <td width="13%" class="darker"><a href="DollarRolls.php">Rolls</a></td>
    <td width="14%" class="darker"><a href="DollarFolders.php">Folders</a></td>    
    <td width="20%" class="darker"> <a href="DollarGrades.php">Grade Report</a></td>
    <td width="14%" class="darker"><a href="DollarError.php">Errors</a></td>
    <td width="12%" class="darker"> <a href="DollarBags.php">Bags</a></td>
    <td width="13%" class="darker"><a href="DollarBoxes.php">Boxes</a></td>    
  </tr>
</table> 
<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="49%"><strong>Total Collected </strong></td>
    <td width="51%"><?php echo $collection->getTotalCollectedCoinsByID($coinCategory, $userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory, $userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td>$<?php echo number_format((float)$coinfaceval, 2, '.', ''); ?></td>
  </tr>
  <tr>
    <td><strong>Type Collection Progress</strong></td>
    <td><?php echo $collection->getTypeCollectionProgressByCategory($coinCategory, $userID) ?> of 11 (<?php echo percent($collection->getTypeCollectionProgressByCategory($coinCategory, $userID), '11'); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Mint Collection Progress</strong></td>
    <td><?php echo $collection->getByMintCountByCategoryByMint($userID, $coinCategory); ?> of <?php echo $collection->getTotalByMintCountByCategory($coinCategory); ?> (<?php echo percent($collection->getByMintCountByCategoryByMint($userID, $coinCategory), $collection->getTotalByMintCountByCategory($coinCategory)); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Complete Collection Progress</strong></td>
    <td><?php echo $collection->getCompleteCollectionCategoryById($userID, $coinCategory); ?> of <?php echo $collection->getCompleteCollectionCategoryCount($coinCategory); ?> (<?php echo percent($collection->getCompleteCollectionCategoryById($userID, $coinCategory), $collection->getCompleteCollectionCategoryCount($coinCategory)) ?>%)</td>
  </tr>
  </table>
<div class="roundedWhite">
  <table width="100%" class="reportList priceListTbl" border="1">
    <tr>
      <td colspan="3" class="darker">View <a href="Dollar.php" class="brownLink"><strong>Circulated</strong></a> | <a href="Dollar_Gold.php" class="brownLink"><strong>Bullion</strong></a> | <a href="Dollar_Commemorative.php" class="brownLink"><strong>Commemorative</strong></a></td>
      </tr>
    <tr>
    <td width="616" class="darker">Commemorative Types</td>
    <td width="179" align="center" class="darker">Collected </td>    
    <td width="169" align="center" class="darker"> Investment</td>
  </tr>
  
  <tr>
  <td><a href="viewCommemorativeReport.php?coinVersion=Discus_Thrower" class="brownLink">Olympic Coliseum </a>(1983)</td>
  <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Flowinollar', $userID); ?>"/ ></td>  
  <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Flowinollar', $userID)?>" /></td>
</tr>

  <tr>
    <td><a href="viewListReport.php?coinType=Draped_Bust_Dollar" class="brownLink">1984 Olympics</a></td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Drapollar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Drapollar', $userID)?>" /></td>
  </tr>
  
    <tr>
      <td><a href="viewListReport.php?coinType=Seated_Liberty_Dollar" class="brownLink">Statue of Liberty</a> (1986)</td>
      <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Seatollar', $userID); ?>"/ ></td>  
      <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Seatollar', $userID)?>" /></td>
    </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Trade_Dollar" class="brownLink">U.S Constitution</a> (1987)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Traollar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Tradllar', $userID)?>" /></td>
  </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Peace_Dollar" class="brownLink">Olympics</a> (1988)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Mollar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Morgollar', $userID)?>" /></td>
  </tr>
  
    <tr>
      <td><a href="viewListReport.php?coinType=Morgan_Dollar" class="brownLink">U.S Congress</a> (1989)</td>
      <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Peacollar', $userID); ?>"/ ></td>  
      <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Peaollar', $userID)?>" /></td>
    </tr>
      <tr>
    <td><a href="viewListReport.php?coinType=Eisenhower_Dollar" class="brownLink">Eisenhower</a> (1990)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Eisenhoollar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Eisenhowollar', $userID)?>" /></td>
  </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Susan_B_Anthony_Dollar" class="brownLink">Korean War Memorial</a> (1991)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Susaollar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Susaollar', $userID)?>" /></td>
  </tr>
      <tr>
    <td><a href="viewListReport.php?coinType=Sacagawea_Dollar" class="brownLink">U.S.O</a> (1991)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Sacagawllar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Sacagawollar', $userID)?>" /></td>
  </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Christoper Columbus</a> (1992)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidellar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidenollar', $userID)?>" /></td>
  </tr>
  
      <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">White House</a> (1992)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidellar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidenollar', $userID)?>" /></td>
  </tr>
  
      <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Olympics</a> (1992)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidellar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidenollar', $userID)?>" /></td>
  </tr>
  
      <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Bill of Rights</a> (1993)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidellar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidenollar', $userID)?>" /></td>
  </tr>
  
      <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">World War II</a> (1993)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidellar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidenollar', $userID)?>" /></td>
  </tr>
  
      <tr>
        <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Thomas Jefferson</a> (1993)</td>
        <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidellar', $userID); ?>"/ ></td>  
        <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidenollar', $userID)?>" /></td>
      </tr>
  
      <tr>
        <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Capitol Bicentennial</a> (1994)</td>
        <td align="center"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidellar', $userID); ?>"></td>
        <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidenollar', $userID)?>" /></td>
      </tr>
      <tr>
        <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">World Cup</a> (1994)</td>
        <td align="center"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidellar', $userID); ?>"></td>
        <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidenollar', $userID)?>" /></td>
      </tr>
      <tr>
        <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Vietnam Veterans Memorial</a> (1994)</td>
        <td align="center"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidellar', $userID); ?>"></td>
        <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidenollar', $userID)?>" /></td>
      </tr>
      <tr>
        <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Women in Military Service</a> (1994)</td>
        <td align="center"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidellar', $userID); ?>"></td>
        <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidenollar', $userID)?>" /></td>
      </tr>
      <tr>
        <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Olympic Cycling</a> (1995)</td>
        <td align="center"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidellar', $userID); ?>"></td>
        <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidenollar', $userID)?>" /></td>
      </tr>
      <tr>
        <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Olympic Gymnastics</a> (1995)</td>
        <td align="center"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidellar', $userID); ?>"></td>
        <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidenollar', $userID)?>" /></td>
      </tr>
  
      <tr>
        <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Olympic Track and Field</a> (1995)</td>
        <td align="center"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidellar', $userID); ?>"></td>
        <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidenollar', $userID)?>" /></td>
      </tr>
      <tr>
        <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Paralympics Blind Runner</a> (1995)</td>
        <td align="center"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidellar', $userID); ?>"></td>
        <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidenollar', $userID)?>" /></td>
      </tr>
      <tr>
        <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Civil War Battlefields</a> (1995)</td>
        <td align="center"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidellar', $userID); ?>"></td>
        <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidenollar', $userID)?>" /></td>
      </tr>
      <tr>
        <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Special Olympics World Games</a> (1995)</td>
        <td align="center"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidellar', $userID); ?>"></td>
        <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidenollar', $userID)?>" /></td>
      </tr>
      <tr>
        <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Olympic High Jump</a> (1996)</td>
        <td align="center"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidellar', $userID); ?>"></td>
        <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidenollar', $userID)?>" /></td>
      </tr>
      <tr>
        <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Olympic Rowing</a> (1996)</td>
        <td align="center"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidellar', $userID); ?>"></td>
        <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidenollar', $userID)?>" /></td>
      </tr>
  
      <tr>
        <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Olympic Tennis</a> (1996)</td>
        <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidellar', $userID); ?>"/ ></td>  
        <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidenollar', $userID)?>" /></td>
      </tr>
  
      <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Paralympics Wheelchair</a> (1996)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Paralympics Wheelchair', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Paralympics Wheelchair', $userID)?>" /></td>
  </tr>
  
        <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Smithsonian</a> (1996)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Smithsonian', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Smithsonian', $userID)?>" /></td>
  </tr>
  
        <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Community Service</a> (1996)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Community Service', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Community Service', $userID)?>" /></td>
  </tr>
  
        <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Botanic Garden</a> (1997)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Botanic Garden', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Botanic Garden', $userID)?>" /></td>
  </tr>
  
        <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Law Enforcement Memorial</a> (1997)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Law Enforcement', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Law Enforcement', $userID)?>" /></td>
  </tr>
  
        <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Jackie Robinson</a> (1997)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Jackie Robinson', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Jackie Robinson', $userID)?>" /></td>
  </tr>
  
        <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Black Revolutionary War Patriots</a> (1998)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Black Revolutionary', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Black Revolutionary', $userID)?>" /></td>
  </tr>
  
        <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Robert F Kennedy</a> (1998)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Robert F Kennedy', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Robert F Kennedy', $userID)?>" /></td>
  </tr>
  
        <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Dolley Madison </a> (1999)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Dolley Madison', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Dolley Madison', $userID)?>" /></td>
  </tr>
  
        <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Yellowstone </a> (1999)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Yellowstone', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Yellowstone', $userID)?>" /></td>
  </tr>
  
        <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Leif Ericson</a> (2000)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Leif Ericson', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Leif Ericson', $userID)?>" /></td>
  </tr>
  
        <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Library of Congress</a> (2000)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Library of Congress', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Library of Congress', $userID)?>" /></td>
  </tr>
  
        <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">American Buffalo</a> (2001)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('American Buffalo', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('American Buffalo', $userID)?>" /></td>
  </tr>
  
        <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Capitol Visitor Center</a> (2001)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Capitol Visitor Center', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Capitol Visitor Center', $userID)?>" /></td>
  </tr>
  
        <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Olympic Salt Lake City </a> (2002)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Olympic Salt Lake City ', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Olympic Salt Lake City ', $userID)?>" /></td>
  </tr>
  
        <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">West Point </a> (2002)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('West Point ', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('West Point ', $userID)?>" /></td>
  </tr>
  
        <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">First Flight </a> (2003)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('First Flight ', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('First Flight ', $userID)?>" /></td>
  </tr>
  
        <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Lewis and Clark</a> (2004)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Lewis and Clark', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Lewis and Clark', $userID)?>" /></td>
  </tr>
  
        <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Thomas Edison</a> (2004)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Thomas Edison', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Thomas Edison', $userID)?>" /></td>
  </tr>
  
        <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">John Marshall</a> (2005)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('John Marshall', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('John Marshall', $userID)?>" /></td>
  </tr>
  
          <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Marine Corps </a> (2005)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Marine Corps', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Marine Corps', $userID)?>" /></td>
  </tr>
  
          <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Benjamin Franklin Founding Father & Scientist</a> (2006)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Benjamin Franklin', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Benjamin Franklin', $userID)?>" /></td>
  </tr>
  
          <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">San Francisco Old Mint </a> (2006)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('San Francisco Old Mint', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('San Francisco Old Mint', $userID)?>" /></td>
  </tr>
  
          <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Jamestown </a> (2007)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Jamestown', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Jamestown', $userID)?>" /></td>
  </tr>
  
          <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Little Rock</a> (2007)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Little Rock', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Little Rock', $userID)?>" /></td>
  </tr>
  
          <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Bald Eagle</a> (2008)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Bald Eagle', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Bald Eagle', $userID)?>" /></td>
  </tr>
  
          <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Abraham Lincoln</a> (2009)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Abraham Lincoln', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Abraham Lincoln', $userID)?>" /></td>
  </tr>
  
          <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Louis Braille</a> (2009)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Louis Braille', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Louis Braille', $userID)?>" /></td>
  </tr>
  
          <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Boy Scouts</a> (2010)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Boy Scouts', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Boy Scouts', $userID)?>" /></td>
  </tr>
  
          <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Disabled Veterans</a> (2010)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Disabled Veterans', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Disabled Veterans', $userID)?>" /></td>
  </tr>
  
          <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">U.S. Army</a> (2011)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Army', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Army', $userID)?>" /></td>
  </tr>
  
          <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Medal of Honor</a> (2011)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Medal of Honor', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Medal of Honor', $userID)?>" /></td>
  </tr>
  
          <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Star Spangled Banner</a> (2012)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Star Spangled Banner', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Star Spangled Banner', $userID)?>" /></td>
  </tr>
  
          <tr>
    <td><a href="viewListReport.php?coinType=Presidential_Dollar" class="brownLink">Infantry Soldier</a> (2012)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Infantry Soldier', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Infantry Soldier', $userID)?>" /></td>
  </tr>
  

 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="smallCentCollectTotals" readonly class="collectCountTotal" type="text" value="<?php echo $collectTotal; ?>" /></td>
   <td align="center"><input id="valTotals" readonly class="collectCount" type="text" value="$<?php echo $collection->getMasterCoinSumByCoinCategory($coinCategory, $userID); ?>" /></td>
 </tr>
</table>
<p><input class="viewListBtns masterBtn" name="printSmallBtn" type="button" value="Print Dollar Report"/ >
&nbsp;<br>
<a class="topLink" href="#top">Top</a></p></div>
<hr />
<table width="919" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>Modern Commemorative Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder">
    <td><a href="viewCommemorativeReport.php?coinVersion=Discus_Thrower"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Discus Thrower', $userID); ?>" alt="" width="100" height="100" /></a><br />
      1983 Olympic Silver Dollar</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Discus_Thrower_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Discus Thrower Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      1983 Olympic Silver Dollar Proof</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Coliseum"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic Coliseum', $userID); ?>" alt="" width="100" height="100" /></a><br />
      1984 Olympic Silver Dollar</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Coliseum_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic Coliseum Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      1984 Olympic Silver Dollar Proof</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Statue_of_Liberty_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Statue of Liberty Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      1986 Statue of Liberty<br />
      Dollar</td> 
  </tr>
  
    <tr align="center" valign="top" class="dateHolder">
      <td><a href="viewCommemorativeReport.php?coinVersion=Statue_of_Liberty_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Statue of Liberty Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
        Statue of Liberty <br />
        Dollar Proof</td>
      <td><a href="viewCommemorativeReport.php?coinVersion=Constitution_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Constitution_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
        Constitution Dollar</td>
      <td><a href="viewCommemorativeReport.php?coinVersion=Constitution_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Constitution_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
        Constitution Dollar Proof</td>
      <td><a href="viewCommemorativeReport.php?coinVersion="><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Panamollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
        Olympic Silver Dollar</td>
      <td><a href="viewCommemorativeReport.php?coinVersion=Illinois_Centennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Illinoientennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
        Olympic Silver Dollar Proof</td> 
    </tr>
  
    <tr align="center" valign="top" class="dateHolder">
      <td><a href="viewCommemorativeReport.php?coinVersion=Congress_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Congress_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
        Congress Dollar</td>
      <td><a href="viewCommemorativeReport.php?coinVersion=Congress_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Congress_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
        Congress Dollar Proof</td>
      <td><a href="viewCommemorativeReport.php?coinVersion=Eisenhower_Silver_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Eisenhower_Silver_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
        Eisenhower Silver Dollar</td>
      <td><a href="viewCommemorativeReport.php?coinVersion=Eisenhower_Silver_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Eisenhower_Silver_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
        Eisenhower Silver Dollar Proof</td>
      <td><a href="viewCommemorativeReport.php?coinVersion=Korean_War_Memorial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Korean_War_Memorial', $userID); ?>" alt="" width="100" height="100" /></a><br />
        Korean War Memorial</td> 
  </tr>
  
    <tr align="center" valign="top" class="dateHolder">
      <td><a href="viewCommemorativeReport.php?coinVersion=Korean_War_Memorial_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Korean_War_Memorial_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
        Korean War Memorial Proof</td>
      <td><a href="viewCommemorativeReport.php?coinVersion=USO_Silver_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('USO_Silver_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
        <span>USO Silver Dollar</span></td>
      <td><a href="viewCommemorativeReport.php?coinVersion=USO_Silver_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('USO_Silver_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
        USO Silver Dollar Proof</td> 
      <td><a href="viewCommemorativeReport.php?coinVersion=92_Olympic_Silver_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('92_Olympic_Silver_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><a href="viewCommemorativeReport.php?coinVersion=92_Olympic_Silver_Dollar"></a><br />
1992 Olympic  Dollar</td>
      
  <td><a href="viewCommemorativeReport.php?coinVersion=92_Olympic_Silver_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('92_Olympic_Silver_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><a href="viewCommemorativeReport.php?coinVersion=92_Olympic_Silver_Dollar_Proof"></a><br />
1992 Olympic  Dollar Proof</td>
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
      <td><a href="viewCommemorativeReport.php?coinVersion=92_Columbus_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('92_Columbus_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
        <span>1992 Columbus Dollar</span> 
  </td>
      <td><a href="viewCommemorativeReport.php?coinVersion=92_Columbus_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('92_Columbus_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      1992 Columbus Dollar Proof</td>
      
  <td><a href="viewCommemorativeReport.php?coinVersion=Bill_of_Rights_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bill_of_Rights_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
Bill of Rights Dollar</td>
      
  <td><a href="viewCommemorativeReport.php?coinVersion=Bill_of_Rights_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bill_of_Rights_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
Bill of Rights Dollar Proof</td>
      
  <td><a href="viewCommemorativeReport.php?coinVersion=WW_II_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('WW_II_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <span>1992 White House Dollar</span></td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
    <td><a href="viewCommemorativeReport.php?coinVersion=WW_II_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('WW_II_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1992 White House Dollar Proof</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=WW_II_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('WW_II_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1993 WW II Dollar</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=WW_II_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('WW_II_Dollar Prrof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1993 WW II Dollar Proof</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Thomas_Jefferson_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Thomas_Jefferson_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1993 Thomas Jefferson Dollar</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Thomas_Jefferson_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Thomas_Jefferson_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1993 Thomas Jefferson Dollar Proof</td>
  </tr>
  
    <tr align="center" valign="top" class="dateHolder">
      <td><a href="viewCommemorativeReport.php?coinVersion=World_Cup_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('World_Cup_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <span>1994 World Cup Dollar</span></td>
      <td><a href="viewCommemorativeReport.php?coinVersion=World_Cup_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('World_Cup_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1994 World Cup Dollar Proof</td>
      <td><a href="viewCommemorativeReport.php?coinVersion=Capitol_Bicentennial_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Capitol_Bicentennial_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1994 Capitol Bicentennial Dollar</td>
      <td><a href="viewCommemorativeReport.php?coinVersion=Capitol_Bicentennial_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Capitol_Bicentennial_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1994 Capitol Bicentennial Dollar Proof</td>
      <td><a href="viewCommemorativeReport.php?coinVersion=Vietnam_Veterans_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Vietnam_Veterans_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1994 Vietnam Veterans Dollar</td>
    </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
      <td><a href="viewCommemorativeReport.php?coinVersion=Vietnam_Veterans_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Vietnam_Veterans_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1994 Vietnam Veterans Dollar Proof</td>
        
  <td><a href="viewCommemorativeReport.php?coinVersion=Women_in_Service_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Women_in_Service_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <span>1994 Women In Service Dollar</span></td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Women_in_Service_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Women_in_Service_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1994 Women In Service Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Civil_War_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Civil_War_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1995 Civil War Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Civil_War_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Civil_War_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>1995 Civil War Dollar Proof</span></td>
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
      <td><a href="viewCommemorativeReport.php?coinVersion=Track_and_Field_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Track_and_Field_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      1995 Olympic Track &amp; Field  Dollar</td>
      <td><a href="viewCommemorativeReport.php?coinVersion=Track_and_Field_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Track_and_Field_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
        1995 Olympic Track &amp; Field Dollar Proof</td>
      <td><a href="viewCommemorativeReport.php?coinVersion=Cycling_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Cycling_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
        1995 Olympic Cycling Dollar</td>
      <td><a href="viewCommemorativeReport.php?coinVersion=Cycling_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Cycling_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
        1995 Olympic Cycling Dollar Proof</td>
      <td><a href="viewCommemorativeReport.php?coinVersion=Paralympics_Blind_Runner_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Paralympics_Blind_Runner_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
        1995 Paralympics Blind Runner Dollar</td>
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Paralympics_Blind_Runner_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Paralympics_Blind_Runner_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1995 Paralympics Blind Runner Dollar Proof</td>
    
  <td><a href="viewCommemorativeReport.php?coinVersion=Special_Olympics_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Special_Olympics_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1995 Special Olympics Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Special_Olympics_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Special_Olympics_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1995 Special Olympics Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Soccer_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Soccer_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1996   Olympic Soccer Half Dollar </td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Soccer_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Soccer_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1996 Olympic Soccer Half Dollar  Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
    <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Tennis_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Tennis_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <span>1996 Olympic Tennis Dollar</span> 
  </td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Tennis_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Tennis_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br /> 
      1996 Olympic Tennis Dollar Proof
  </td>
    
  <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Rowing_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Rowing_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
    1996 Olympic Rowing Dollar</td>
    
  <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Rowing_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Rowing_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    1996 Olympic Rowing Dollar Proof</td>
    
  <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_High_Jump_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_High_Jump_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
    1996 Olympic High Jump Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_High_Jump_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_High_Jump_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>1996 Olympic High Jump Dollar Proof</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Paralympics_Wheelchair_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Paralympics_Wheelchair_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1996 Paralympics Wheelchair Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Paralympics_Wheelchair_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Paralympics_Wheelchair_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1996 Paralympics Wheelchair Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Cauldron_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Cauldron_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>1996 Olympic Cauldron Five Dollar</span></td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Cauldron_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Cauldron_Five_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1996 Olympic Cauldron Five Dollar Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Community_Service_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Community_Service_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1996 Community Service Dollar</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Community_Service_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Community_Service_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1996 Community Service Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Smithsonian_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Smithsonian_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1996 Smithsonian Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Smithsonian_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Smithsonian_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>1996 Smithsonian Dollar Proof</span></td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Botanic_Garden_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Botanic_Garden_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1997 Botanic Garden Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Botanic_Garden_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Botanic_Garden_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1997 Botanic Garden Dollar Proof</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Jackie_Robinson_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jackie_Robinson_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <span>1997 Jackie Robinson Dollar</span></td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Jackie_Robinson_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jackie_Robinson_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1997 Jackie Robinson Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Law_Enforcement_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Law_Enforcement_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1997 Law Enforcement Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Law_Enforcement_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Law_Enforcement_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1997 Law Enforcement Dollar Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
    <td><a href="viewCommemorativeReport.php?coinVersion=Black_Revolutionary_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Black_Revolutionary_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1998 Black Revolutionary Dollar </td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Black_Revolutionary_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Black_Revolutionary_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1998 Black Revolutionary Dollar Proof</td>
    
  <td><a href="viewCommemorativeReport.php?coinVersion=Robert_F_Kennedy_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Robert_F_Kennedy_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <span>1998 Robert F Kennedy Dollar</span></td>
    
  <td><a href="viewCommemorativeReport.php?coinVersion=Robert_F_Kennedy_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Robert_F_Kennedy_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1998 Robert F Kennedy Dollar Proof </td>
    
  <td><a href="viewCommemorativeReport.php?coinVersion=Yellowstone_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Yellowstone Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1999 Yellowstone Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
    <td><a href="viewCommemorativeReport.php?coinVersion=Yellowstone_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Yellowstone Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <span>1999 Yellowstone Dollar Proof</span> 
  </td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Dolley_Madison_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Dolley_Madison_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
    1999 Dolley Madison Dollar</td>
    
  <td><a href="viewCommemorativeReport.php?coinVersion=Dolley_Madison_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Dolley_Madison_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    1999 Dolley Madison Dollar Proof</td>
    
  <td><a href="viewCommemorativeReport.php?coinVersion=Leif_Ericson_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Leif Ericson Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
    2000 Leif Ericson Dollar</td>
    
  <td><a href="viewCommemorativeReport.php?coinVersion=Leif_Ericson_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Leif Ericson Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    2000 Leif Ericson Dollar Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Library_of_Congress_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Library of Congress Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>2000 Library of Congress Dollar  </span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Library_of_Congress_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Library of Congress Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br /> 
  2000 Library of Congress Dollar Proof
</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=American_Buffalo_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('American Buffalo Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
2001 American Buffalo Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=American_Buffalo_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('American Buffalo Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>2001 American Buffalo Dollar Proof</span></td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Capitol_Visitor_Center_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Capitol Visitor Center  Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
2001 Capitol Visitor Center Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder">
    <td><a href="viewCommemorativeReport.php?coinVersion=Capitol_Visitor_Center_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Capitol Visitor Center Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
2001 Capitol Visitor Center Dollar Proof</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Salt_Lake_City_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Salt_Lake_City_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
2002 Olympic Salt lake City Dollar</td> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Salt_Lake_City_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Salt_Lake_City_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
2002 Olympic Salt lake City Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=West_Point_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('West_Point_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
2002   West Point <br />
Dollar </td>
<td><a href="viewCommemorativeReport.php?coinVersion=West_Point_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('West_Point_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
2002   West Point <br />
Dollar Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
    <td><a href="viewCommemorativeReport.php?coinVersion=First_Flight_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('First_Flight_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <span>2003 First Flight Dollar</span> 
  </td>
    <td><a href="viewCommemorativeReport.php?coinVersion=First_Flight_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('First_Flight_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    2003 First Flight Dollar Proof</td>
    
  <td><a href="viewCommemorativeReport.php?coinVersion=Thomas_Edison_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Thomas_Edison_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
    2004 Thomas Edison Dollar</td>
    
  <td><a href="viewCommemorativeReport.php?coinVersion=Thomas_Edison_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Thomas_Edison_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <span>2004 Thomas Edison Dollar Proof</span></td>
    
  <td><a href="viewCommemorativeReport.php?coinVersion=Lewis_and_Clark_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Lewis_and_Clark_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
2004 Lewis and Clark Dollar </td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder">
    <td><a href="viewCommemorativeReport.php?coinVersion=Lewis_and_Clark_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Lewis_and_Clark_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2004 Lewis and Clark Dollar Proof</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=John_Marshall_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('John_Marshall_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2005 John Marshall Dollar</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=John_Marshall_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('John_Marshall_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2005 John Marshall Dollar Proof</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Marine_Corps_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Marine_Corps_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <span>2005 Marine Corps Dollar</span></td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Marine_Corps_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Marine_Corps_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2005 Marine Corps Dollar Proof</td> 
  </tr>
  
  <tr align="center" valign="top" class="dateHolder">
    <td><a href="viewCommemorativeReport.php?coinVersion=Benjamin_Franklin_Founding_Father"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Benjamin_Franklin_Founding_Father', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2006 Benjamin Franklin Founding Father</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Benjamin_Franklin_Founding_Father_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Benjamin_Franklin_Founding_Father_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2006 Benjamin Franklin Founding Father Proof</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Benjamin_Franklin_Scientist_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Benjamin Franklin Scientist Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2006 Benjamin Franklin Scientist</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Benjamin_Franklin_Scientist_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Benjamin_Franklin_Scientist_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <span>2006 Benjamin Franklin Scientist Proof</span></td>
    <td><a href="viewCommemorativeReport.php?coinVersion=San_Francisco_Old_Mint_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('San_Francisco_Old_Mint_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2006 San Francisco Old Mint Dollar</td> 
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
    <td><a href="viewCommemorativeReport.php?coinVersion=San_Francisco_Old_Mint_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('San_Francisco_Old_Mint_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    2006 San Francisco Old Mint Dollar Proof</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Jamestown_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jamestown Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <span>2007 Jamestown <br />
      Dollar</span></td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Jamestown_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jamestown Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2007 Jamestown <br />
    Dollar Proof</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Little_Rock_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Little_Rock_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
2007 Little Rock <br />
Dollar</td>
    Five 
  <td><a href="viewCommemorativeReport.php?coinVersion=Little_Rock_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Little_Rock_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <span>2007 Little Rock <br />
Dollar Proof</span></td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder">
    <td><a href="viewCommemorativeReport.php?coinVersion=Bald_Eagle_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bald_Eagle_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2008 Bald Eagle<br />
      Dollar</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Bald_Eagle_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bald_Eagle_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2008 Bald Eagle <br />
      Dollar Proof</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Abraham_Lincoln_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Abraham Lincoln Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2009 Abraham Lincoln Dollar</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Abraham_Lincoln_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Abraham_Lincoln_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2009 Abraham Lincoln Dollar Proof</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Louis_Braille_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Louis Braille Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2009 Louis Braille Dollar</td> 
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  
<td>&nbsp;</td>
  
<td>&nbsp;</td>
  
<td>&nbsp;</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Louis_Braille_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Louis_Braille_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>2009 Louis Braille Dollar Proof</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Disabled_Veterans_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Disabled Veterans Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br /> 
  2010 American Veterans Disabled for Life  
</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Disabled_Veterans_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Disabled_Veterans_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
2010 American Veterans Disabled for Life Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Boy_Scouts_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Boy Scouts Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2010 Boy Scouts Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Boy_Scouts_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Boy Scouts Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2010 Boy Scouts Dollar Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder">
    <td><a href="viewCommemorativeReport.php?coinVersion=Army_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Army Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <span>2011 U.S. Army Dollar</span></td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Army_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Army_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2011 U.S. Army Dollar Proof</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Medal_of_Honor_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Medal of Honor Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2011   Medal of Honor  Dollar </td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Medal_of_Honor_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Medal of Honor Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2011   Medal of Honor  Dollar Proof </td> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Infantry_Soldier_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Infantry_Soldier_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
2012 Infantry Solider Dollar </td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder">
    <td><a href="viewCommemorativeReport.php?coinVersion=Infantry_Soldier_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Infantry_Soldier_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2012 Infantry Solider Dollar Proof</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Star_Spangled_Banner_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Star_Spangled_Banner_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2012   Star Spangled Banner Dollar </td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Star_Spangled_Banner_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Star_Spangled_Banner_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2012 Star Spangled Banner Dollar Proof</td> 
    <td>&nbsp;</td>
    
  <td>&nbsp;</td>
  </tr>
 </table>
<hr />
<a name="coins"></a>
<h1>All Dollars</h1>

<table width="100%" border="0">
  <tr align="center">
    <td width="20%"><strong>Certified Coins</strong></td>
    <td width="20%"><strong>Errors</strong></td>
    <td width="20%"><strong>First Day Coins</strong></td>
    <td width="20%"><strong>Proofs</strong></td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCertificationCountById($userID) ?></td>
    <td>0</td>
    <td>0</td>
    <td>0</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />

<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="51%" height="24"><strong>Year / Mint</strong></td>  
    <td width="25%"><strong>Type</strong></td>
    <td width="10%" align="center"><strong> Collected</strong></td>
    <td width="14%" align="right"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinCategory = '$coinCategory' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td><a href="addCoinRaw.php">None in collection, Add A Coin</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	
	<td>&nbsp;</td>		    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoin.php?coinID='.$coinID.'" class="brownLink">'.$coinName.'</a></td>
	<td><a href="viewListReport.php?coinType='.$coinType.'">'.$coinType.'</a></td>	
	<td align="center">'.$collection->getCoinCountById($coinID, $userID).'</td>
	<td class="purchaseTotals" align="right">$'.$collection->totalCoinCategoryInvestment($coinID, $userID).'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

     
<tfoot>
  <tr class="darker">
    <td width="51%"><strong>Year / Mint</strong></td>  
    <td>Type</td>    
    <td width="10%" align="center"><strong> Collected</strong></td>
    <td width="14%" align="right"><strong>Purchase Price</strong></td>
  </tr>
	</tfoot>
</table>
<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>