<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET["coinType"])) { 
$rawCoinType = strip_tags($_GET["coinType"]);
$coinType = str_replace('_', ' ', mysql_real_escape_string($_GET["coinType"]));
$coinQuery = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType'") or die(mysql_error());
while($row = mysql_fetch_array($coinQuery))
  {
  $coinID = $row['coinID'];
  $coinType = $row['coinType'];
  $coinName = $row['coinName'];
  $coinSubCategory = $row['coinSubCategory'];
  $coinCategory = $row['coinCategory'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add <?php echo str_replace('_', ' ', strip_tags($_GET["coinType"])); ?> Coin</title>
<?php include("../headItems.php"); ?>
<script type="text/javascript">
$(document).ready(function(){

});
</script>
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<h2><img src="../img/<?php echo strip_tags($_GET["coinType"]); ?>.jpg" width="100" height="100" align="left"  class="hidden-xs" />&nbsp;Add <?php echo $coinType ?></h2>

<div class="row hidden-xs clearfix">
  <div class="col-xs-6">

  <div class="btn-group">
    <a role="button" class="btn btn-primary" href="addCoinRaw.php">All Coin Types</a>
    <a role="button" class="btn btn-primary" href="addCoinTypeMulti.php?coinType=<?php echo $_GET["coinType"]; ?>">Add Multiple</a> 
  </div>
  </div>
  
  <div class="col-sm-10">
  <select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Type</option>
      <optgroup label="Half Cents">
        <option value="addCoinType.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
        <option value="addCoinType.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
        <option value="addCoinType.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="addCoinType.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="addCoinType.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="addCoinType.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="addCoinType.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="addCoinType.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="addCoinType.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="addCoinType.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Cents">
        <option value="addCoinType.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="addCoinType.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="addCoinType.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="addCoinType.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="addCoinType.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="addCoinType.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="addCoinType.php?coinType=Two_Cent_Piece">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="addCoinType.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
        <option value="addCoinType.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="addCoinType.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="addCoinType.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="addCoinType.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="addCoinType.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      <optgroup label="Nickels">
        <option value="addCoinType.php?coinType=Shield_Nickel">Shield</option>
        <option value="addCoinType.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
        <option value="addCoinType.php?coinType=Indian_Head_Nickel">Indian Head</option>
        <option value="addCoinType.php?coinType=Jefferson_Nickel">Jefferson</option>
        <option value="addCoinType.php?coinType=Westward_Journey">Westward Journey</option>
        <option value="addCoinType.php?coinType=Return_to_Monticello">Return to Monticello</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="addCoinType.php?coinType=Draped_Bust_Dime">Drapped Bust Dime</option>
        <option value="addCoinType.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="addCoinType.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="addCoinType.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="addCoinType.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="addCoinType.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="addCoinType.php?coinCategory=Twenty_Cent_Piece">Twenty Cents</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="addCoinType.php?coinType=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="addCoinType.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="addCoinType.php?coinType=Seated_Liberty_Quarter">Liberty Seated Quarter</option>
        <option value="addCoinType.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="addCoinType.php?coinType=Standing_Liberty">Standing Liberty</option>
        <option value="addCoinType.php?coinType=Washington_Quarter">Washington Quarter</option>
        <option value="addCoinType.php?coinType=State Quarter">State Quarter</option>
        <option value="addCoinType.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="addCoinType.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="addCoinType.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="addCoinType.php?coinType=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="addCoinType.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="addCoinType.php?coinType=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="addCoinType.php?coinType=Barber_Half_Dollar">Barber Half</option>
        <option value="addCoinType.php?coinType=Walking_Liberty">Walking Liberty Half</option>
        <option value="addCoinType.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
        <option value="addCoinType.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="addCoinType.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="addCoinType.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="addCoinType.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="addCoinType.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="addCoinType.php?coinType=Trade_Dollar">Trade Dollar</option>
        <option value="addCoinType.php?coinType=Morgan_Dollar">Morgan Dollar</option>
        <option value="addCoinType.php?coinType=Peace_Dollar">Peace Dollar</option>
        <option value="addCoinType.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="addCoinType.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="addCoinType.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="addCoinType.php?coinType=Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select>
  </div>
</div>

<h3 class="darker clearfix">Recently added</h3>
<div class="table-responsive">
  <table class="table">
  <tr class="darker">
    <td width="11%">Date</td>
    <td width="55%">Coin</td>
    <td width="11%">Grade</td>   
        <td width="10%">Grader</td>  
    <td width="13%"> Investment</td>

  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM collection WHERE coinType = '".str_replace('_', ' ', strip_tags($_GET["coinType"]))."' AND userID = '$userID' ORDER BY collectionID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="5">You dont have any '.str_replace('_', ' ', strip_tags($_GET["coinType"])).' in  coins In Your Collection</td> 
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
<td><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'">'.substr($collectedCoinName, 0, 40).' '.substr($collection->getVarietyForCoin(intval($collectionID)), 0, 30).'</a></td>
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
</div>


<div id="addCoinDiv">
  <h3><img src="../img/<?php echo strip_tags($_GET["coinType"]); ?>.jpg" width="21" height="20" /> Choose A Coin</h3>
<select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year &amp; Mint</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', strip_tags($_GET["coinType"]))."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select>  
    <h3><img src="../img/<?php echo strip_tags($_GET["coinType"]); ?>.jpg" width="21" height="20" /> Multiple Coins</h3>
    <a role="button" class="btn btn-primary btn-block" href="addCoinTypeMulti2.php?coinType=<?php echo $_GET["coinType"]; ?>">Add Multiple</a> 
</div>

<div class="hidden-xs">
  <table class="table">
  <tr>
    <td width="50%" align="center"><a href="http://www.amazon.com/gp/product/B0088YV34C?ie=UTF8&amp;camp=1789&amp;creativeASIN=B0088YV34C&amp;linkCode=xm2&amp;tag=xt0a-20" target="_blank">The Official 2013 Red Book</a></td>
    <td width="50%" align="center"><a href="http://www.amazon.com/gp/product/0794822851?ie=UTF8&amp;camp=1789&amp;creativeASIN=0794822851&amp;linkCode=xm2&amp;tag=xt0a-20" target="_blank">Cherrypickers' Guide to Rare Die Varieties</a></td>
  </tr>
  <tr>
    <td width="50%" align="center" valign="top"><iframe src="http://rcm.amazon.com/e/cm?t=xt0a-20&o=1&p=8&l=as1&asins=B0088YV34C&ref=tf_til&fc1=000000&IS2=1&lt1=_blank&m=amazon&lc1=2A2A2A&bc1=FFFFFF&bg1=FFFFFF&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe></td>
    <td width="50%" align="center" valign="top"><iframe src="http://rcm.amazon.com/e/cm?lt1=_blank&bc1=FFFFFF&IS2=1&bg1=FFFFFF&fc1=000000&lc1=2A2A2A&t=xt0a-20&o=1&p=8&l=as1&m=amazon&f=ifr&ref=tf_til&asins=0794822851" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe></td>
  </tr>
</table>
</div>


<p><a class="topLink" href="#top">Top</a></p>
<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>