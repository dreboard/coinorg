<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET["coinID"])) { 
$coinID = intval($_GET["coinID"]);
$coin->getCoinById($coinID);
$coinType = $coin->getCoinType();
$coinSubCategory = $coin->getCoinSubCategory();
$coinCategory = $coin->getCoinCategory();
$coinVersion = $coin->getCoinVersion();
$coinName = $coin->getCoinName();
}

if(isset($_POST["bulkIdAddIndvBtn"])){
if (is_array($_POST['coinID'])){
foreach ($_POST["coinID"] as $coinID){
      $coin->getCoinById($coinID['theID']);
	  $coinCategory = $coin->getCoinCategory();
	  $coinType = $coin->getCoinType();
$sql = mysql_query("INSERT INTO collection(coinID, coinNickname, mintMark, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, strike, coinGrade, coinGradeNum, purchaseDate, enterDate, userID, errorType, errorCoin, byMint, century, design, series, designType, seriesType, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal) VALUES('".$coinID['theID']."', '".$collection->setBulkNickname($_POST['coinNickname'], $coinID, $userID)."', '".$coin->getMintMark()."', '$coinType', '".$coin->getCoinCategory()."', '".$coin->getCoinSubCategory()."', '".$coin->getCoinYear()."', '".$coin->getCoinVersion()."', '".$coin->getCoinStrike()."', '".$coinID['coinGrade']."', '".$collection->getCoinGradeNum($coinID['coinGrade'])."', '".date("Y-m-d")."', '$theDate', '$userID', 'None', '0', '".$coin->getByMint()."', '".$coin->getCentury()."', '".$coin->getDesign()."', '".$coin->getSeries()."', '".$coin->getDesignType()."', '".$coin->getCoinSeriesType()."', '".$coin->getCommemorativeType()."', '".$coin->getCommemorativeVersion()."', '".$coin->getCommemorative()."', '".$coin->getDenomination()."', '".$coin->getKeyDate()."', '".$coin->getCoinMetal()."')") or die(mysql_error()); 	  

$collectionID = mysql_insert_id();	
//Create collection folder
if ( !file_exists($userID.'/coins/'.$collectionID) ) {
    mkdir($userID.'/coins/'.$collectionID, 0755, true);
}	

} 
header("location: viewListReport.php?coinType=".str_replace(' ', '_', $coin->getCoinType())."");
}
else {
$_SESSION['errorMsg'] = 'Nothing selected';
}

}//End submit

if(isset($_POST["addBulkCoinBtn"])){
      $coin->getCoinById($_POST['coinID']);
	  $coinCategory = $coin->getCoinCategory();
	  $coinType = $coin->getCoinType();	
	for ($i = 1; $i <= $_POST["coinAmount"]; $i++) {
$sql = mysql_query("INSERT INTO collection(coinID, coinNickname, mintMark, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, strike, coinGrade, coinGradeNum, purchaseDate, enterDate, userID, errorType, errorCoin, byMint, century, design, series, designType, seriesType, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal) VALUES('".$_POST['coinID']."', '".$collection->setBulkNickname($_POST['coinNickname'], $coinID, $userID)."', '".$coin->getMintMark()."', '$coinType', '".$coin->getCoinCategory()."', '".$coin->getCoinSubCategory()."', '".$coin->getCoinYear()."', '".$coin->getCoinVersion()."', '".$coin->getCoinStrike()."', 'No Grade', '99', '".date("Y-m-d")."', '$theDate', '$userID', 'None', '0', '".$coin->getByMint()."', '".$coin->getCentury()."', '".$coin->getDesign()."', '".$coin->getSeries()."', '".$coin->getDesignType()."', '".$coin->getCoinSeriesType()."', '".$coin->getCommemorativeType()."', '".$coin->getCommemorativeVersion()."', '".$coin->getCommemorative()."', '".$coin->getDenomination()."', '".$coin->getKeyDate()."', '".$coin->getCoinMetal()."')") or die(mysql_error()); 	  

$collectionID = mysql_insert_id();	
//Create collection folder
if ( !file_exists($userID.'/coins/'.$collectionID) ) {
    mkdir($userID.'/coins/'.$collectionID, 0755, true);
}	

} 
header("location: viewListReport.php?coinType=".str_replace(' ', '_', $coin->getCoinType())."");
}//End submit
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add Multiple <?php echo $coin->getCoinName(); ?> Coins</title>
<style type="text/css">
.coinsRow:hover {background-color:#CCC;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
$("#addCoinFormBtn, .gradeLists").attr('disabled', 'disabled');

$("#bulkIdAddIndvForm2").submit(function(){
    if ($(".idCheck input:checked").length < 1){
		$("#errorMsg").text("Please Select at Least One Coin & Quantity.");
		$("#endErrorMsg").text("Please Select at Least One Coin & Quantity.");
        return false;
    }else {
		  $("#addCoinFormBtn").prop('value', 'Saving Coins...');
	  return true;
	  }
});	
$("#addCoinFormBtn, #addBulkCoinBtn").click(function(){
  $(this).prop('value', 'Saving Coins...');
});	

$('.idCheck').change(function() {
    if ($('.idCheck:checked').length) {
        $('#addCoinFormBtn').removeAttr('disabled');
    } else {
        $('#addCoinFormBtn').attr('disabled', 'disabled');
    }
});

$.fn.changeSelect = function(i) { 
  if($(this).prop('checked')){
	  $("#gradeList"+i).prop('disabled', false);
		$("#errorMsg").text(" ");
		$("#endErrorMsg").text(" ");	  
  } else {
	  $("#gradeList"+i).prop('disabled', true);
	  $("#gradeList"+i).prop('selectedIndex',0);
  }
}
});
</script>     
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h2><img src="../img/<?php echo str_replace(' ', '_', $coin->getCoinVersion()) ?>.jpg" align="absmiddle"  id="addtypeImg" />&nbsp;Add Multiple  <?php echo $coinName ?> <?php echo $coinType; ?></h2>
<table width="100%" border="0" class="clear">
    <tr>
    <td width="18%" valign="top"><h3><a href="addCoinRaw.php">All Coin Types</a></h3></td>
    <td width="20%" valign="top"><h3><a href="addCoinByID.php?coinID=<?php echo $coinID; ?>"> Add Single </a></h3></td>
    <td width="40%" valign="top"><h3><a href="addRollByCoinID.php?coinID=<?php echo $coinID; ?>">Full Roll</a></h3></td>
    <td width="22%" align="right" valign="middle"><select id="select" name="select2" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Type...</option>
      <optgroup label="Half Cents">
        <option value="addCoinTypeMulti.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
        <option value="addCoinTypeMulti.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
        <option value="addCoinTypeMulti.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="addCoinTypeMulti.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="addCoinTypeMulti.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="addCoinTypeMulti.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="addCoinTypeMulti.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="addCoinTypeMulti.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="addCoinTypeMulti.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="addCoinTypeMulti.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Cents">
        <option value="addCoinTypeMulti.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="addCoinTypeMulti.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="addCoinTypeMulti.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="addCoinTypeMulti.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="addCoinTypeMulti.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="addCoinTypeMulti.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="addCoinTypeMulti.php?coinType=Two_Cent_Piece">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="addCoinTypeMulti.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
        <option value="addCoinTypeMulti.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="addCoinTypeMulti.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="addCoinTypeMulti.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="addCoinTypeMulti.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="addCoinTypeMulti.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      <optgroup label="Nickels">
        <option value="addCoinTypeMulti.php?coinType=Shield_Nickel">Shield</option>
        <option value="addCoinTypeMulti.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
        <option value="addCoinTypeMulti.php?coinType=Indian_Head_Nickel">Indian Head</option>
        <option value="addCoinTypeMulti.php?coinType=Jefferson_Nickel">Jefferson</option>
        <option value="addCoinTypeMulti.php?coinType=Westward_Journey">Westward Journey</option>
        <option value="addCoinTypeMulti.php?coinType=Return_to_Monticello">Return to Monticello</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="addCoinTypeMulti.php?coinType=Draped_Bust_Dime">Drapped Bust Dime</option>
        <option value="addCoinTypeMulti.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="addCoinTypeMulti.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="addCoinTypeMulti.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="addCoinTypeMulti.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="addCoinTypeMulti.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="addCoinTypeMulti.php?coinCategory=Twenty_Cent_Piece">Twenty Cents</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="addCoinTypeMulti.php?coinType=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="addCoinTypeMulti.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="addCoinTypeMulti.php?coinType=Seated_Liberty_Quarter">Liberty Seated Quarter</option>
        <option value="addCoinTypeMulti.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="addCoinTypeMulti.php?coinType=Standing_Liberty">Standing Liberty</option>
        <option value="addCoinTypeMulti.php?coinType=Washington_Quarter">Washington Quarter</option>
        <option value="addCoinTypeMulti.php?coinType=State Quarter">State Quarter</option>
        <option value="addCoinTypeMulti.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="addCoinTypeMulti.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="addCoinTypeMulti.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="addCoinTypeMulti.php?coinType=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="addCoinTypeMulti.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="addCoinTypeMulti.php?coinType=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="addCoinTypeMulti.php?coinType=Barber_Half_Dollar">Barber Half</option>
        <option value="addCoinTypeMulti.php?coinType=Walking_Liberty">Walking Liberty Half</option>
        <option value="addCoinTypeMulti.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
        <option value="addCoinTypeMulti.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="addCoinTypeMulti.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="addCoinTypeMulti.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="addCoinTypeMulti.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="addCoinTypeMulti.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="addCoinTypeMulti.php?coinType=Trade_Dollar">Trade Dollar</option>
        <option value="addCoinTypeMulti.php?coinType=Morgan_Dollar">Morgan Dollar</option>
        <option value="addCoinTypeMulti.php?coinType=Peace_Dollar">Peace Dollar</option>
        <option value="addCoinTypeMulti.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="addCoinTypeMulti.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="addCoinTypeMulti.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="addCoinTypeMulti.php?coinType=Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select></td>
    </tr>

  </table>


<div id="CoinList">
<p class="darker">Recently added <?php echo $coinName; ?> coins In Your Collection</p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="11%">Date</td>
    <td width="55%">Coin</td>
    <td width="11%">Grade</td>   
        <td width="10%">Grader</td>  
    <td width="13%"> Investment</td>

  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID' ORDER BY collectionID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="5">You dont have any '.$coinType.' in  coins In Your Collection</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $coinType = $row['coinType'];
  
  if($row['coinPic1'] == 'blankBig.jpg'){
	  $thumb = '<img src="../img/1.jpg" width="25" height="25" />';
  } else {
	  $thumb = '<img src="'.$userID.'/'.$row['coinPic1'].'" width="auto" height="25" />';
  }
  $coinID = intval($row['coinID']); 
  $collectionID = $row['collectionID']; 
  $purchaseDate = date("F j, Y",strtotime($row["purchaseDate"]));
  $coinGrade = $row['coinGrade']; 
  $purchasePrice = $row['purchasePrice'];  
  $collectedCoin = new Coin();
  $collectedCoin-> getCoinById($coinID);
  $collection-> getCollectionById($collectionID);
  $collectedCoinName = $collectedCoin->getCoinName();
  $coinPurchaseDate = date("M j, Y",strtotime($collection->getCoinDate()));
  $proService = $row['proService'];  
  echo '
<tr>
<td>'.$coinPurchaseDate.'</td> 
<td><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'">'.$collectedCoinName.'</a></td>
<td>'.$coinGrade.'</td>
<td>'.$proService.'</td>
<td>'.$purchasePrice.'</td>
</tr>  
  ';
  }
}
?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />

</div>

<div id="addCoinDiv">
<p>**Select up to 50 new <strong><?php echo $coinName; ?></strong> coins</p>
<ul>
  <li> Error or Damaged coins will have to be entered <a href="addCoinByID.php?coinID=<?php echo $coinID; ?>" class="brownLinkBold">individually</a></li>
  <li>3rd Party/Slabbed information can be added later by editing coins</li>
</ul><hr />
<h3>Bulk Add</h3>
<form id="bulkIdAddForm" method="post" action="">
<input type="hidden" name="coinID" value="<?php echo $coinID; ?>" />
<table width="100%" border="0">
  <tr>
  <td width="15%"><label for="coinNickname">Group Nickname:</label></td>
  <td width="17%"><input type="text" name="coinNickname" id="coinNickname" value="" />
  </td>
    <td width="13%"><strong>#</strong> of Coins
<select name="coinAmount" id="coinAmount">
 <?php
for ($x=2; $x<=50; $x++)
  {
  echo '<option value="'.$x.'">'.$x.'</option>';
  }
?>    
    </select>    
    </td>
    <td width="55%"><input name="addBulkCoinBtn" id="addBulkCoinBtn" type="submit" value="Add All Coins" /></td>
  </tr>
  <tr>
    <td colspan="2"><strong>Or:</strong> <a href="addRollByCoinID.php?coinID=<?php echo $coinID; ?>" class="brownLinkBold">Add As Full Roll</a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
<hr />

<h3>Individually Add</h3>
<form id="bulkIdAddIndvForm" method="post" action="">
<table width="100%" border="0">
  <tr class="darker">
    <td colspan="4" class="errorTxt" id="errorMsg"><?php
if(isset($_SESSION['errorMsg'])) {
	echo $_SESSION['errorMsg'];
} else {
	$_SESSION['errorMsg'] = '';
}
 ?>&nbsp;</td>
    </tr>
  <tr class="darker">
    <td colspan="2" align="left"><label for="coinNickname2">Group Nickname:</label>      <input type="text" name="coinNickname" id="coinNickname2" value="" /></td>
    </tr>
  <tr class="darker">
    <td width="7%" align="center">+</td>
    <td width="93%">Grade</td>
  </tr>
  
 <?php
for ($x=1; $x<=50; $x++)
  {
  echo ' 
	<tr class="coinsRow">
    <td width="2%" align="center">
	<input onclick="$(this).changeSelect(' . $x . ')" type="checkbox" name="coinID['.$x.'][theID]" id="coinID' . $x . '" value="' . $coinID . '" class="idCheck" />
	
      </td>
	<td><select class="gradeLists" name="coinID['.$x.'][coinGrade]" id="gradeList' . $x . '">
<option value="No Grade" selected="selected">No Grade</option>
'.$collection->getGradeList($coin->getCoinStrike()).'
</select></td>
  </tr>';
	}

?> 
<!--
Original checkbox
<input onclick="document.getElementById(\'gradeList' . $x . '\').disabled=false;" type="checkbox" name="coinID['.$x.'][theID]" id="coinID' . $x . '" value="' . $coinID . '" class="idCheck" />
-->
   <tr class="darker">
     <td colspan="4" align="left">&nbsp;</td>
   </tr>
   <tr class="darker">
    <td colspan="4" align="left">
    <input name="bulkIdAddIndvBtn" id="bulkIdAddIndvBtn" type="submit" value="Add All Coins" />&nbsp;<span id="endErrorMsg" class="errorTxt"></span></td>
  </tr> 
</table>
</form>
</div>

<p>&nbsp;</p>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
