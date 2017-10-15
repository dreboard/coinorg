<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_GET["errorType"])) { 
$errorType = str_replace('_', ' ', $_GET["errorType"]);
$errorTypeImg = strip_tags($_GET["errorType"]);
 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $errorType ?> List View</title>
<script type="text/javascript">
$(document).ready(function(){
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "asc" ]],
	"iDisplayLength": 50
} );


});
</script>
<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><?php echo $errorType ?> Coins</h1>
<table width="100%" border="0" class="reportListTbl">  
  <tr>
    <td width="16%" rowspan="3" valign="top"><img src="../img/<?php echo $errorTypeImg ?>.jpg" width="115" height="115" /></td>
    <td width="21%">Total Collected</td>
    <td width="30%"><?php echo $Errors->getErrorByNameByID($errorType, $userID); ?></td>
    <td width="33%"><select class="selectNavs" id="viewError" name="viewError" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Error Type</option>
      <option value="viewErrorType.php?errorType=Off_Center">Off Center</option>
      <option value="viewErrorType.php?errorType=Broadstrike">Broadstrike </option>
      <option value="viewErrorType.php?errorType=Partial_Collar">Partial Collar</option>
      <option value="viewErrorType.php?errorType=Multiple_Strike">Multiple Strike</option>
      <option value="viewErrorType.php?errorType=Mated_Pair">Mated Pair</option>
      <option value="viewErrorType.php?errorType=Brockage">Brockage</option>
      <option value="viewErrorType.php?errorType=Capped_Die">Capped Die</option>
      <option value="viewErrorType.php?errorType=Indent">Indent</option>
      <option value="viewErrorType.php?errorType=Bonded">Bonded</option>
      <option value="viewErrorType.php?errorType=Wrong_Planchet">Wrong Planchet</option>
      <option value="viewErrorType.php?errorType=Mule">Mule</option>
      <option value="viewErrorType.php?errorType=Weak_Strike">Weak Strike</option>
      <option value="viewErrorType.php?errorType=Transitional_Error">Transitional Error</option>
      <option value="viewErrorType.php?errorType=Double_Denomination">Double Denomination</option>
      <option value="viewErrorType.php?errorType=Fold_Over">Fold Over</option>
      <option value="viewErrorType.php?errorType=Clipped_Planchet">Clipped Planchet</option>
      <option value="viewErrorType.php?errorType=Lamination">Lamination</option>
      <option value="viewErrorType.php?errorType=Edge_Lettering">Edge Lettering</option>
    </select></td>
  </tr>
  <tr>
    <td>Total Investment</td>
    <td colspan="2"><?php echo $Errors->getErrorByNameByID($errorType, $userID); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>

</table>
  
  <hr />
<table width="100%" border="0">
<thead class="darker">
  <tr>
    <td width="53%">Year / Mint</td>  
    <td width="19%" align="center">Type</td>
    <td width="28%" align="right">Details</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM collection WHERE errorType = '$errorType' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr class="gryHover">
    <td>No '.$errorType.' Coins Collected</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID); 
  $collectionID = intval($row['collectionID']); 
  $collection->getCollectionById($collectionID);
  $coinName = $coin->getCoinName(); 
  $coinCategory = $coin->getCoinCategory(); 
  $coinCategoryLink = str_replace(' ', '_', $coinCategory);
  $errorType = strip_tags($row['errorType']);
  $errorDetail = '';
	switch($errorType)
        {
            case "Off Center": 
			    $errorDetail = $collection->getoffPercent().'% Off Center';
            break;
            case "Multiple Strike": 
			    $errorDetail = $collection->getstrikeNumber().' Strikes';
            break;
            case "Broadstrike": 
			    $errorDetail = $collection->getbroadstrikeType().'% Off Center';
            break;		
            case "Bonded": 
			   $errorDetail = $collection->getbondedPlanchets().' Planchets';
            break;	
            case "Mated Pair": 
			    $errorDetail = $collection->getoffPercent().'%';
            break;	
            case "Double Denomination": 
			   $errorDetail = $collection->getDoubleDenom1().' Struck on '.$Errors->getDoubleDenom2();
            break;	
            case "Indent": 
			   $errorDetail = $collection->getindentPercent().'%';
            break;	
            case "Wrong Planchet": 
			    $errorDetail = $collection->getoffPercent().'%';
            break;											
            default: 
        }
    
  echo '
    <tr class="gryHover">
    <td><a href="viewCoin.php?coinID='.$coinID.'">'.$coinName.'</a></td>
	<td align="center"><a href="viewErrorCategory.php?coinCategory='.$coinCategoryLink.'&errorType='.str_replace(' ', '_', $errorType).'">'.$coinCategory.'</td>
	<td align="right">'.$collection->getErrorTypeDetails($collectionID, $userID).'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

     
<tfoot class="darker">
  <tr>
    <td width="53%">Year / Mint</td>  
    <td width="19%" align="center">Type</td>
    <td width="28%" align="right">Details</td>
  </tr>
	</tfoot>
</table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>