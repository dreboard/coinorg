<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['ID'])) { 
$collectionID = $Encryption->decode($_GET['ID']);
$collection->getCollectionById($collectionID);
$coinType = $collection->getCoinType();
$coinID = $collection->getCoinID();
$coin-> getCoinById($coinID);
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$coinName = $coin->getCoinName();  
$additional = $collection->getAdditional(); 
$coinGrade = $collection->getCoinGrade();
$proService = $collection->getGrader();
$coinCategory = $coin->getCoinCategory();  
$coinSubCategory = $coin->getCoinSubCategory();  
$page ->getCoinPage($coinCategory);
$linkName = str_replace(' ', '_', $coinType);
$categoryLink = str_replace(' ', '_', $coinCategory);
$coinLink = str_replace(' ', '_', $coinType);

if($collection->getCoinImage1() !== 'blankBig.jpg'){
$coinPic1 = '<img src="'.$collection->getCoinImage1().'" class="coinImg" />';
} else {
$coinPic1 = '<img src="../img/'.$coinVersion.'.jpg" width="250" height="250" />';
}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Coins For Sale</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#collectTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );
});
</script> 
<style type="text/css">
.tdHeight {padding:0px;}
.listPageImg {width:130px; height:auto;}
.itemListTbl h3 {margin:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h3>Mark For Sale</h3>

<?php 
$coinQuery2 = mysql_query("SELECT * FROM selllist WHERE sellStatus = 'Active' ORDER BY sellListID DESC") or die(mysql_error());

if(mysql_num_rows($coinQuery2) == 0){
	  echo '
		  <tr>
		  <td colspan="5">There are no '.$coinCategory.' coins currently for sale.</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($coinQuery2))
  {
  $coinType = $row['coinType'];
  $sellListID = intval($row['sellListID']); 
  $sellTitle = $row['sellTitle']; 
  $listDate = date("F j, Y",strtotime($row["listDate"]));
  $coinGrade = $row['coinGrade']; 
  $listPrice = $row['listPrice'];  
  $coinPic1 = $row['coinPic1'];  
  echo '
<table width="100%" border="0" class="itemListTbl">
  <tr>
    <td rowspan="4" width="140">
      <img src="'.$coinPic1.'" class="listPageImg" /></td>
    <td colspan="3"><h3><a href="saleDetail.php?sellListID='.$sellListID.'">'.$sellTitle.'</a></h3></td>
    <td width="200" align="right">$'.$listPrice.'</td>
  </tr>
  <tr>
    <td width="117" valign="top"><strong>Category</strong></td>
    <td width="200" valign="top">&nbsp;</td>
    <td width="321" rowspan="3">&nbsp;</td>
    <td rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">Listed</td>
    <td width="200" valign="top">'.$listDate.'</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td width="200" valign="top">&nbsp;</td>
  </tr>
</table>
  ';
  }
}
?>

<p>&nbsp;</p>

<table width="930" id="viewTbl">
  <tr>
    <td width="157" rowspan="12" valign="top"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><?php echo '<img src="../img/'.$coinVersion.'.jpg" width="150" height="150" />'; ?></a></td>
    <td class="tdHeight"><strong>Category:</strong></td>
    <td class="tdHeight"><a href="<?php echo $categoryLink ?>.php"><?php echo $coinCategory ?></a></td>
    <td></td>
  </tr>
  <tr>
    <td width="162" class="tdHeight"><span class="darker">Type: </span></td>
<td width="575" class="tdHeight"><a href="viewListReport.php?coinType=<?php echo $coinLink ?>"><?php echo $coinType ?></a></td>
<td width="16"></td>
</tr>
  <tr>
    <td class="tdHeight"><strong>Year:</strong></td>
    <td class="tdHeight"><a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&year=<?php echo $coin->getCoinYear() ?>"><?php echo $coin->getCoinYear() ?></a></td>
    <td></td>
  </tr>
  <tr>
    <td class="tdHeight"><strong>Grade:</strong></td>
    <td class="tdHeight"><?php echo $coinGrade ?>
    
    
    </td>
    <td></td>
  </tr>
  <tr>
    <td class="tdHeight"><strong>Grading Service:</strong></td>
    <td class="tdHeight"><a href="viewTypeService.php?proService=<?php echo $proService ?>&coinType=<?php echo $coinLink ?>"><?php echo $proService ?></a> 
   <?php 
   if($proService !== 'None'){
      echo $collection->getGraderNumber();
   }
     ?> 
    &nbsp; 
	<?php
	if($proService == 'None'){
	if($collection->getCertlist() == '0'){
		echo '(<a href="certListAdd.php?ID='.$_GET['ID'].'" class="greenLink">Add to Certification list</a>)';
	} else {
		echo '(This Coin Is On The <a href="certList.php" class="brownLinkBold">To Be Certified List</a>) <form action="" method="post" class="compactForm">
	  <input name="certCoinID" type="hidden" value="'.$Encryption->encode($collectionID).'" />
	  <input name="certRemoveBtn" type="submit" value="Remove" onclick="return confirm(\'Remove this Coin?\')" />
	  </form>';		
	}
	}
 ?></td>
    <td></td>
  </tr>
<tr>
<td class="tdHeight"><span class="darker">Purchase Date: </span></td>
<td class="tdHeight"><?php echo date("F j, Y",strtotime($collection->getCoinDate())); ?></td>
<td rowspan="7" valign="top">
  
</td>
  </tr>
<tr>
  <td class="tdHeight"><strong>Purchase Price:</strong></td>
  <td class="tdHeight">$<?php echo $collection->getCoinPrice(); ?></td>
</tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td colspan="2" valign="top">
      </td>
    </tr>
</table>
<hr />
<table width="100%" border="0">

  <tr>
    <td width="10%"><img src="../img/ebayIcon2.jpg" width="91" height="40" /></td>
    <td width="21%">Prepare Auction Template</td>
    <td width="69%">
    <form class="compactForm" method="get" action="auctionCoinForm.php" id="addEbayForm">
<input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID); ?>" /><input id="addEbayBtn" type="submit" value=" Create " />
</form>
    </td>
  </tr>
  </table>
<form action="" method="post" enctype="multipart/form-data" name="addCoinForm" id="addCoinForm">
  <table width="979" border="0" cellpadding="3" class="addCoinTbl">
  <tr class="darker">
    <td width="969" class="errorTxt" id="errorMsg"><?php
if(isset($_SESSION['errorMsg'])) {
	echo $_SESSION['errorMsg'];
} else {
	$_SESSION['errorMsg'] = '';
}
 ?></td>
    </tr>
  
 
  </table>
  
<h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Sale Details</h2> 
  <table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="181"><label for="sellDate">Sale Date</label></td>
    <td width="490"><input type="text" name="sellDate" id="sellDate" class="purchaseDate" value="<?php if(isset($_POST["sellDate"])){echo $_POST["sellDate"];} else {echo "";}?>" /></td>
  </tr>
  <tr>
    <td valign="top"><label for="sellPrice">List Price</label></td>
    <td><input name="sellPrice" type="text" id="sellPrice" value="<?php if(isset($_POST["sellPrice"])){echo $_POST["sellPrice"];} else {echo "";}?>" /></td>
    </tr>
  <tr>
    <td valign="top"><label for="sellFees">Sell Fees</label></td>
    <td colspan="2"><input name="sellFees" type="text" id="sellFees" value="<?php if(isset($_POST["sellFees"])){echo $_POST["sellFees"];} else {echo "";}?>" /></td>
    <td width="146">&nbsp;</td>
    <td width="148">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><label for="buyer">Buyer</label></td>
    <td><input name="buyer" type="text" value="<?php if(isset($_POST["buyer"])){echo $_POST["buyer"];} else {echo "";}?>" /></td>
  </tr>
  <tr>
    <td valign="top"><label for="shopName">Shop Name</label></td>
    <td><input name="shopName" type="text" value="<?php if(isset($_POST["shopName"])){echo $_POST["shopName"];} else {echo "";}?>" /></td>
  </tr>
</table>
    
<h2><img src="../img/buyerIcon.jpg" width="32" height="25" align="absmiddle" /> Buyer Details</h2>     
  <table width="979" border="0" class="addCoinTbl">
 <tr>
    <td><label for="buyer">Buyer Address</label></td>
    <td><input name="buyer" type="text" id="buyer" value="<?php if(isset($_POST["buyer"])){echo $_POST["buyer"];} else {echo "";}?>" /></td>
  </tr>
  <tr>
    <td width="185"><label for="buyerAddress">Buyer Address</label></td>
    <td colspan="4"><input type="text" name="buyerAddress" id="buyerAddress" value="<?php if(isset($_POST["buyerAddress"])){echo $_POST["buyerAddress"];} else {echo "";}?>" /></td>
  </tr>  
  
  <tr>
    <td valign="top"><label for="buyerCity">Buyer City</label></td>
    <td colspan="2"><input type="text" name="buyerCity" id="buyerCity" value="<?php if(isset($_POST["buyerCity"])){echo $_POST["buyerCity"];} else {echo "";}?>" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><label for="buyerState">Buyer State</label></td>
    <td colspan="2"><select name="buyerState"  id="buyerState">
    
    <?php if(isset($_POST["buyerState"])){echo '<option value="'.$_POST["buyerState"].'" selected="selected">'.$_POST["buyerState"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>
    
      <option value="AL">Alabama</option>
      <option value="AK">Alaska</option>
      <option value="AZ">Arizona</option>
      <option value="AR">Arkansas</option>
      <option value="CA">California</option>
      <option value="CO">Colorado</option>
      <option value="CT">Connecticut</option>
      <option value="DE">Delaware</option>
      <option value="DC">Dist of Columbia</option>
      <option value="FL">Florida</option>
      <option value="GA">Georgia</option>
      <option value="HI">Hawaii</option>
      <option value="ID">Idaho</option>
      <option value="IN">Indiana</option>
      <option value="IA">Iowa</option>
      <option value="KS">Kansas</option>
      <option value="KY">Kentucky</option>
      <option value="LA">Louisiana</option>
      <option value="ME">Maine</option>
      <option value="MD">Maryland</option>
      <option value="MA">Massachusetts</option>
      <option value="MI">Michigan</option>
      <option value="MS">Mississippi</option>
      <option value="MT">Montana</option>
      <option value="NE">Nebraska</option>
      <option value="NV">Nevada</option>
      <option value="NH">New Hampshire</option>
      <option value="NJ">New Jersey</option>
      <option value="NM">New Mexico</option>
      <option value="NY">New York</option>
      <option value="NC">North Carolina</option>
      <option value="ND">North Dakota</option>
      <option value="OH">Ohio</option>
      <option value="OK">Oklahoma</option>
      <option value="OR">Oregon</option>
      <option value="PA">Pennsylvania</option>
      <option value="RI">Rhode Island</option>
      <option value="SC">South Carolina</option>
      <option value="SD">South Dakota</option>
      <option value="TN">Tennessee</option>
      <option value="TX">Texas</option>
      <option value="UT">Utah</option>
      <option value="VT">Vermont</option>
      <option value="VA">Virginia</option>
      <option value="WA">Washington</option>
      <option value="WV">West Virginia</option>
      <option value="WI">Wisconsin</option>
      <option value="WY">Wyoming</option>
    </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="185"><label for="buyerZip">Buyer Zip</label></td>
    <td colspan="4"><input type="text" name="buyerZip" id="buyerZip" value="<?php if(isset($_POST["buyerZip"])){echo $_POST["buyerZip"];} else {echo "";}?>" /></td>
  </tr>
  <tr>
    <td valign="top"><label for="soldOn">Sold</label></td>
    <td colspan="2"><select id="soldOn" name="soldOn">
          <?php if(isset($_POST["soldOn"])){echo '<option value="'.$_POST["soldOn"].'" selected="selected">'.$_POST["soldOn"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>
      <option value="eBay">On eBay</option>
      <option value="Shop">At Coin Show</option>
      <option value="Show">To Coin Shop</option>
      <option value="Other">Other</option>
    </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    </table>
  
    <h2><img src="../img/cameraIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Additional</h2> 
  <table width="979" border="0" class="addCoinTbl">    
<tr>
    <td width="188"><label for="coinNote">Notes</label></td>
    <td width="781" colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""><?php if(isset($_POST["coinNote"])){echo $_POST["coinNote"];} else {echo "";}?></textarea></td>
  </tr>  
  
  </table> 
    
<br />
  <table width="979" border="0" class="addCoinTbl">
  <tr>
    <td valign="bottom">      <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add Coin" /></td>
    <td colspan="4"><span id="endErrorMsg" class="errorTxt"></span>&nbsp;</td>
  </tr>
</table>
</form>
<p><a href="sellCoin">Add To a Sale List</a></p>

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>