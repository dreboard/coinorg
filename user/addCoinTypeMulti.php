<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET["coinType"])) { 
$rawCoinType = strip_tags($_GET["coinType"]);
$coinType = str_replace('_', ' ', mysql_real_escape_string($_GET["coinType"]));
$CoinTypes->getCoinByType($coinType);
}

if(isset($_POST["addCoinFormBtn"])){
if (is_array($_POST['coinID'])){
foreach ($_POST["coinID"] as $coinID){
if($coinID['quantity'] !=='0'){
	for ($i = 1; $i <= $coinID['quantity']; $i++) {
      /*echo $coinID['theID'];
	}}}}}

if(isset($_POST["addCoinFormBtn2"])){
if (is_array($_POST['coinID'])){
foreach ($_POST["coinID"] as $coinID){
if($coinID['quantity'] !=='0'){
	for ($i = 1; $i <= $coinID['quantity']; $i++) {*/
      $coin->getCoinById($coinID['theID']);
	  $coinCategory = $coin->getCoinCategory();
	  $coinType = $coin->getCoinType();
$sql = mysql_query("INSERT INTO collection(coinID, mintMark, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, strike, coinGrade, coinGradeNum, purchaseDate, enterDate, userID, errorType, errorCoin, byMint, century, design, series, designType, seriesType, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal) VALUES('".$coinID['theID']."', '".$coin->getMintMark()."', '".$coin->getCoinType()."', '".$coin->getCoinCategory()."', '".$coin->getCoinSubCategory()."', '".$coin->getCoinYear()."', '".$coin->getCoinVersion()."', '".$coin->getCoinStrike()."', '".$coinID['coinGrade']."', '".$collection->getCoinGradeNum($coinID['coinGrade'])."', '".date("Y-m-d")."', '$theDate', '$userID', 'None', '0', '".$coin->getByMint()."', '".$coin->getCentury()."', '".$coin->getDesign()."', '".$coin->getSeries()."', '".$coin->getDesignType()."', '".$coin->getCoinSeriesType()."', '".$coin->getCommemorativeType()."', '".$coin->getCommemorativeVersion()."', '".$coin->getCommemorative()."', '".$coin->getDenomination()."', '".$coin->getKeyDate()."', '".$coin->getCoinMetal()."')") or die(mysql_error()); 	  

$collectionID = mysql_insert_id();	
//Create collection folder
if ( !file_exists($userID.'/coins/'.$collectionID) ) {
    mkdir($userID.'/coins/'.$collectionID, 0755, true);
}	

    }
  }
} 
header("location: viewListReport.php?coinType=".str_replace(' ', '_', $coin->getCoinType())."");
}
else {
$_SESSION['errorMsg'] = 'Nothing selected';
}

}//End submit
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add A Multiple Coins</title>
<?php include("../headItems.php"); ?>
<script type="text/javascript">
$(document).ready(function(){
$("#addCoinFormBtn, .coinsQuantity, .gradeLists").attr('disabled', 'disabled');
$("#addCentForm2").submit(function(){
    if ($(".idCheck input:checked").length < 1){
		$("#errorMsg").text("Please Select at Least One Coin & Quantity.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
        return false;
    }else {
		  $("#addCoinFormBtn").prop('value', 'Saving Coins...');
	  return true;
	  }
});	
$("#addCoinFormBtn").click(function(){
  $(this).prop('value', 'Saving Coins...');
});	

/*$('.idCheck').change(function() {
    if ($('.idCheck:checked').length) {
        $('#addCoinFormBtn').removeAttr('disabled');
    } else {
        $('#addCoinFormBtn').attr('disabled', 'disabled');
    }
});*/

/*$(".coinsQuantity").change(function() {
    if ($("option:selected").not("option[value=0]")){
       $("#addCoinFormBtn").removeAttr("disabled");
    }
});*/


$.fn.changeSelect = function(i) { 
  if($(this).prop('checked')){
	  $("#coinquantity"+i).prop('disabled', false);
	  $("#gradeList"+i).prop('disabled', false );
	  $("#addCoinFormBtn").prop('disabled', false );
  } else {
	  $("#coinquantity"+i).prop('disabled', true);
	  $("#gradeList"+i).prop('disabled', true );
	  $("#addCoinFormBtn").prop('disabled', true );
  }
}	


});
</script>
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">

<img src="../img/<?php echo $rawCoinType ?>.jpg" width="50" height="50" align="left" class="hidden-xs" id="addtypeImg" />
<h2>&nbsp;Add Multiple  <?php echo $coinType ?></h2>

<div class="visible-xs">
<a href="addCoinRaw.php" class="btn btn-primary btn-block" role="button">Return to Coin Types</a>
    <a href="addCoinType.php?coinType=<?php echo $rawCoinType; ?>" class="btn btn-primary btn-block" role="button"> Add Single</a>
    <br>

<select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
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
        <option value="addCoinTypeMulti.php?coinType=America_the_Beautiful_Quarter">America the Beautiful Quarter</option>
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
    </select>
</div>





<div class="row hidden-xs">
  <div class="col-xs-3">
    <a href="addCoinRaw.php" class="btn btn-primary" role="button">Return to Coin Types</a>
  </div>
  <div class="col-xs-3">
    <a href="addCoinType.php?coinType=<?php echo $rawCoinType; ?>" class="btn btn-primary" role="button"> Add Single</a>
  </div>
  <div class="col-xs-4">
    <select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
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
        <option value="addCoinTypeMulti.php?coinType=America_the_Beautiful_Quarter">America the Beautiful Quarter</option>
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
    </select>
  </div>
</div>


<div id="addCoinDiv">
<h2>All Coins <?php echo $CoinTypes->getDates(); ?></h2>
<form action="" method="post" role="form"  class="form-horizontal" id="addCentForm">

<div class="well"><p class="darker">When Adding Multiple Coins</p>
<ol>
<li><strong>No Purchase Details Saved</strong></li>
<li>Images &amp; other details may be added when editing coin</li>
</ol>
</div> 


<div class="table-responsive">
  <?php 
  $i = 0;
	$getcoinType = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' AND coinYear <= ".date('Y')." ORDER BY coinName ASC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$coinID = $row['coinID'];
		$coinType = $row['coinType'];
		$name = $row['coinName'];
		$i++;
	echo ' 
	<div class="row">
  <div class="col-md-8">
    <div class="input-group">
      <span class="input-group-addon">
                <label>
          <input onclick="$(this).changeSelect(' . $coinID . ')" type="checkbox" name="coinID['.$i.'][theID]" id="coinID' . $coinID . '" value="' . $coinID . '" class="idCheck" /> ' . $name . '
        </label>
      </span>
      <select name="coinID['.$i.'][quantity]" class="coinsQuantity form-control" id="coinquantity' . $coinID . '">
	  <option value="" selected="selected">0</option>
	  <option value="1">1</option>
	  <option value="2">2</option>
	  <option value="3">3</option>
	  <option value="4">4</option>
	  <option value="5">5</option>
	  <option value="6">6</option>
	  <option value="7">7</option>
	  <option value="8">8</option>
	  <option value="9">9</option>
	  <option value="10">10</option>
	  </select>
    </div>
  </div>
</div><br />	



	';
	}
?>
<br class="clearfix" />
    <input name="coinType" type="hidden" value="<?php echo $coinType ?>" />
    <button type="submit" name="addCoinFormBtn" id="addCoinFormBtn" class="btn btn-primary save"> Add All Coins <span class="glyphicon glyphicon-floppy-disk"></span></button>

</div>

</form>
</div>


<p><a class="topLink" href="#top">Top</a></p>
<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>