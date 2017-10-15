<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Box Report</title>

<style type="text/css">
.gradeNums td {padding:5px; font-size:120%;}
#setList .setListRow:hover{background-color:#333; color:#FFF;}
#setList .setListRow a:hover{color:#FFF;}
table h3 {margin:0px;}
</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1>My Boxes</h1>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="20%"><h3> Collected</h3></td>
    <td width="18%" align="right"><?php echo $CollectionBoxes->getBoxCountById($userID); ?></td>
    <td width="62%">&nbsp;</td>
  </tr>
  <tr>
    <td><h3>Total Investment</h3></td>
    <td align="right">$<?php echo $CollectionBoxes->getBoxSumByID($userID); ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr>

  <div>
    
    <table width="100%" border="0">
     <tr align="center">
       <td colspan="7" align="left"><h2>Box Categories</h2></td>
      </tr>
     <tr align="center">
       <td width="14%">&nbsp;</td>
       <td width="14%%"><a href="viewBoxDenomination.php?coinCategory=Dollar"><strong>1$</strong></a></td>
       <td width="14%%"><a href="viewBoxDenomination.php?coinCategory=Half_Dollar"><strong>$.50</strong></a></td>
       <td width="14%%"><a href="viewBoxDenomination.php?coinCategory=Quarter"><strong>$.25</strong></a></td>
       <td width="14%%"><a href="viewBoxDenomination.php?coinCategory=Dime"><strong>$.10</strong></a></td>
       <td width="14%%"><a href="viewBoxDenomination.php?coinCategory=Nickel"><strong>$.05</strong></a></td>
       <td width="14%%"><a href="viewBoxDenomination.php?coinCategory=Small_Cent"><strong>$.01</strong></a></td>
      </tr>
     <tr align="center">
       <td align="left">Mint Box</td>
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionBoxes->getDenominationCount($boxType='Mint', $coinCategory='Dollar', $userID); ?></a></td>
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionBoxes->getDenominationCount($boxType='Mint', $coinCategory='Half_Dollar', $userID); ?></a><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"></a></td>
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionBoxes->getDenominationCount($boxType='Mint', $coinCategory='Quarter', $userID); ?></a><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"></a></td>
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionBoxes->getDenominationCount($boxType='Mint', $coinCategory='Dime', $userID); ?></a><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"></a></td>
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionBoxes->getDenominationCount($boxType='Mint', $coinCategory='Nickel', $userID); ?></a><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"></a></td>      
        <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionBoxes->getDenominationCount($boxType='Mint', $denomination='Small_Cent', $userID); ?></a><a href="coinCategory.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"></a></td>
      </tr>
     <tr align="center">
       <td align="left">Type Box</td>
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionFirstday->getFirstDaySetTypeProGrader($proService='PCGS', $firstdayType='Coins', $userID); ?></a><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"></a></td>
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionFirstday->getFirstDaySetTypeProGrader($proService='ICG', $firstdayType='Coins', $userID); ?></a></td>
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionFirstday->getFirstDaySetTypeProGrader($proService='NGC', $firstdayType='Coins', $userID); ?></a></td>
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionFirstday->getFirstDaySetTypeProGrader($proService='ANACS', $firstdayType='Coins', $userID); ?></a></td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     <tr align="center">
       <td>&nbsp;</td>
       <td><a href="viewFirstDayService.php?proService=PCGS"><?php echo $CollectionFirstday->getFirstDayProGrader('PCGS',$userID); ?></a></td>
       <td><a href="viewFirstDayService.php?proService=ICG"><?php echo $CollectionFirstday->getFirstDayProGrader('ICG',$userID); ?></a></td>
       <td><a href="viewFirstDayService.php?proService=NGC"><?php echo $CollectionFirstday->getFirstDayProGrader('NGC' ,$userID); ?></a></td>
       <td><a href="viewFirstDayService.php?proService=ANACS"><?php echo $CollectionFirstday->getFirstDayProGrader('ANACS',$userID); ?></a></td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
      </tr>
    </table>
   <hr class="clear">
   <table width="800" border="0" id="setList">
     <tr>
    <td width="72%"><h2>Mint Boxes</h2></td>
    <td width="28%" align="center"><h3>Collected</h3></td>
  </tr>
<?php 
	$getcoinType = mysql_query("SELECT * FROM boxmint ORDER BY coinYear DESC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$boxMintID = intval($row['boxMintID']);
		$boxName = strip_tags($row['boxName']);
	echo '<tr class="setListRow">
    <td><a href="viewMintBox.php?boxMintID=' . $boxMintID . '">' . $boxName . '</a></td>
    <td align="center">'.$CollectionBoxes->getMintBoxCount($boxMintID, $userID).'</td>
  </tr>';

	}
?>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>