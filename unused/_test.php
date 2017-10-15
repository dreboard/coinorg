<?php
 include '../inc/config.php';
function getImage($value){
	$countAll = mysql_query("SELECT * FROM coins WHERE coinType = '$value'") or die(mysql_error());
	 $img_check = mysql_num_rows($countAll);
           if($img_check > 0){ 
            while($row = mysql_fetch_array($countAll)){ 
			    $value = str_replace(' ', '_', $value);
				$collection = $row['collection'];
				if($collection == 0){
		            $image = "blank.jpg";
	             } else {
		           $image = $value.'.jpg';
	            }
					  } 
		   } 
	return $image;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<table border="1" id="folderTbl">
  <tr class="dateHolder" valign="top"> 

  <td>
  <img class="coinSwitch" src="../img/<?php echo getImage('Union Shield'); ?>" alt="" width="100" height="100" /><br />
  <a href="viewListReport.php?coinType=Return_to_Monticello&page=1">Return to Monticello</a> 

</td>

</tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="100%" border="0" class="reportListTbl">
  <tr>
    <td colspan="3"><h2><?php echo $coinType ?> <?php echo $dates ?> (List View)</h2></td>
  </tr>
  <tr>
    <td width="43%" rowspan="7" valign="top"><img id="obvRev" src="../img/<?php echo $pennyImg ?>_both.jpg" alt="Obverse and reverse" title="<?php echo $coinType ?>" /></td>
    <td width="33%">Total Collected</td>
    <td width="24%">44</td>
  </tr>
  <tr>
    <td>Total Unique</td>
    <td>30</td>
  </tr>
  <tr>
    <td>Total  Investment</td>
    <td>$125.00</td>
  </tr>
  <tr>
    <td>Type Collection Progress</td>
    <td>1 of 1 (100%)</td>
  </tr>
  <tr>
    <td>Year Collection Progress</td>
    <td>1 of 25 (14%)</td>
  </tr>
  <tr>
    <td valign="top">Complete Collection Progress</td>
    <td valign="top">1 of 100 (1%)</td>
  </tr>
</table>
  
  <p><?php echo $pageText1 ?></p>
  <hr />
<table width=border="1" id="listTbl" class="clear">
  <tr class="darker">
    <td><input  id="viewFolderBtn" class="viewListBtns" name="" type="button" value="Folder View" />
    <input id="viewReportBtn" class="viewListBtns" name="viewReportBtn" type="button" value="View <?php echo $pageCategory ?> Report" /></td>
    <td>&nbsp;</td>

    <td>&nbsp;</td>
  </tr>
  <tr class="darker">
    <td width="316">Type</td>
    <td width="334">Year/Mint</td>
    <td width="302">In Collection</td>
</tr>
<?php 
if (isset($_GET["page"])) { 
$page = $_GET["page"]; 

$start_from = ($page-1) * 25; 
$countAll = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType'") or die(mysql_error());
$allCount = mysql_num_rows($countAll);
$resultAll = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' LIMIT $start_from, 25") or die(mysql_error());
while($row = mysql_fetch_array($resultAll))
  {
  $coinType = $row['coinType'];
  $name = $row['coinName'];
  $mintage = $row['mintage'];
  $additional = $row['additional'];
  $coinID = $row['coinID'];
  $collection = $row['collection'];
  $linkName = str_replace(' ', '_', $coinType);
    if($collection == 0){
	  $have = 'No, <a href="addCoin.php?coinID=$coinID" class="addCoinLink">Add This Coin</a>';
	  $auctionLink = '';
  } else {
	  $have = '<img src="../img/'.$linkName.'.jpg"  title="'.$name.' in collection" class="coinIcon" /> (0) <a href="addCoin.php?coinID=$coinID" class="addCoinLink" title="'.$name.' in collection">Add Another</a>';
	  $auctionLink = '<a href="ebayTemplate.php?coinID=$coinID">Prepare for Auction</a>';
  }
  echo "
    <tr>
    <td>$coinType</td>
    <td><a href='viewCoin.php?coinID=$coinID'  title='".$name."' View'>$name</a></td>
	<td>$have</td>
  </tr>
  ";
}   
}
?>
</table>
</body>
</html>