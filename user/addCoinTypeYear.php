<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";
$errorMsg = ""; 

function setNoGrade($coinGrade) {
 if($coinGrade == 'No Grade') {
		  return '99';
	  } else {
		  return preg_replace('#[^0-9]#i', '', $coinGrade); 
	  }	
    }


if (isset($_GET['coinYear'])) { 
$coinYear = intval($_GET['coinYear']);

if($coinYear > date('Y')){
	$coinYear = intval(date('Y'));
} else if($coinYear <= '1792'){
    $coinYear = intval(date('Y'));
}
}

if (isset($_GET['century'])) { 
$coinYear = intval($_GET['century']).strip_tags($_GET['theYear']);

if($coinYear > date('Y')){
	$coinYear = intval(date('Y'));
} else if($coinYear <= '1792'){
    $coinYear = intval(date('Y'));
}else {
$coinYear = intval($_GET['century']).strip_tags($_GET['theYear']);
}
}

if(isset($_POST["addCoinFormBtn"])){
$i = 1;
  if (is_array($_POST['coinID'])){
  foreach ($_POST["coinID"] as $coinID){
	  
      $coin->getCoinById($coinID['theID']);
	  $coinCategory = $coin->getCoinCategory();
	  $coinType = $coin->getCoinType();
	if($coinID['theID'] != ''){  
	
mysql_query("INSERT INTO collection(coinID, coinNickname, mintMark, varietyCoin, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, strike, slabLabel, coinGrade, coinGradeNum, designation, problem, coinValue, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, userID, errorCoin, byMint, mintBox, century, design, series, designType, showName, showCity, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal, seriesType, varietyType) VALUES('".$coinID['theID']."', '".$coin->getCoinType(). " ".$i++. "', '".$coin->getMintMark()."', '".$coin->getVarietyCoin()."', '".$coin->getCoinType()."', '".$coin->getCoinCategory()."', '".$coin->getCoinSubCategory()."', '".$coin->getCoinYear()."', '".$coin->getCoinVersion()."', '".$coin->getCoinStrike()."', 'None', '".$coinID['coinGrade']."', '".setNoGrade($coinID['coinGrade'])."', 'None', '0', '0.00', '".date('Y-m-d')."', 'None', 'None', 'No additional', '0.00', 'None', 'None', 'None', 'No Notes', '$theDate', '$userID', '0', '".$coin->getByMint()."', '0', '".$coin->getCentury()."', '".$coin->getDesign()."', '".$coin->getSeries()."', '".$coin->getDesignType()."', '$showName', '$showCity', '".$coin->getCommemorativeType()."', '".$coin->getCommemorativeVersion()."', '".$coin->getCommemorative()."', '".$coin->getDenomination()."', '".$coin->getKeyDate()."', '".$coin->getCoinMetal()."', '".$coin->getCoinSeriesType()."', '".$coin->getVarietyType()."')") or die(mysql_error()); 

$collectionID = mysql_insert_id();	
//Create collection folder
if ( !file_exists($userID.'/'.$collectionID) ) {
    mkdir($userID.'/'.$collectionID, 0755, true);
}	


	}
  }
  header("location: viewSetYear.php?year=".intval($_POST['coinYear'])."");	  
  } else {
	$_SESSION['errorMsg'] = 'Nothing selected';
  
  }
}

//End submit


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add A Multiple <?php echo $coinYear ?> Coins</title>

<style type="text/css">
.coinsRow:hover {background-color:#CCC;}
.yearH3 {display:inline;}
</style>
<script type="text/javascript">
$(document).ready(function(){	

$("#addCentForm").submit(function(){
    if ($(".coinsQuantity").is(":empty")){
		$("#errorMsg").text("Please Select at Least One Coin & Quantity.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
        return false;
    }else {
		  $("#addCoinFormBtn").prop('value', 'Saving Coins...');
	  return true;
	  }
});	


$(".idCheck").click(function() {
		$("#errorMsg").text('');
		$("#endErrorMsg").text('');
});



$("#getYear").click(function() {
	$(this).prop('value', 'Loading Coins...');
});
	
});
</script>     
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<span class="darker"><img src="../img/<?php echo $coin->getCoinImageByYear($coinYear) ?>" alt="Half Cent" name="Half_CentFormImg" align="left" id="addtypeImg" /></span><h1>&nbsp;Add Multiple  <?php echo $coinYear ?> Coins</h1>
<br class="clear" />
<table width="100%" border="0">
    <tr>
    <td width="26%" valign="top"><h3><a href="addCoinRaw.php">Return to Coin Types</a></h3></td>
    <td width="52%" valign="top"><h3 class="yearH3">Switch Year</h3>&nbsp;<form action="addCoinTypeYear.php" method="get" class="compactForm">
    <select name="century">
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
</select>
<select name="theYear">
<option value="00">00</option>
<option value=01>01</option><option value=02>02</option><option value=03>03</option><option value=04>04</option><option value=05>05</option><option value=06>06</option><option value=07>07</option><option value=08>08</option><option value=09>09</option><option value=10>10</option><option value=11>11</option><option value=12>12</option><option value=13>13</option><option value=14>14</option><option value=15>15</option><option value=16>16</option><option value=17>17</option><option value=18>18</option><option value=19>19</option><option value=20>20</option><option value=21>21</option><option value=22>22</option><option value=23>23</option><option value=24>24</option><option value=25>25</option><option value=26>26</option><option value=27>27</option><option value=28>28</option><option value=29>29</option><option value=30>30</option><option value=31>31</option><option value=32>32</option><option value=33>33</option><option value=34>34</option><option value=35>35</option><option value=36>36</option><option value=37>37</option><option value=38>38</option><option value=39>39</option><option value=40>40</option><option value=41>41</option><option value=42>42</option><option value=43>43</option><option value=44>44</option><option value=45>45</option><option value=46>46</option><option value=47>47</option><option value=48>48</option><option value=49>49</option><option value=50>50</option><option value=51>51</option><option value=52>52</option><option value=53>53</option><option value=54>54</option><option value=55>55</option><option value=56>56</option><option value=57>57</option><option value=58>58</option><option value=59>59</option><option value=60>60</option><option value=61>61</option><option value=62>62</option><option value=63>63</option><option value=64>64</option><option value=65>65</option><option value=66>66</option><option value=67>67</option><option value=68>68</option><option value=69>69</option><option value=70>70</option><option value=71>71</option><option value=72>72</option><option value=73>73</option><option value=74>74</option><option value=75>75</option><option value=76>76</option><option value=77>77</option><option value=78>78</option><option value=79>79</option><option value=80>80</option><option value=81>81</option><option value=82>82</option><option value=83>83</option><option value=84>84</option><option value=85>85</option><option value=86>86</option><option value=87>87</option><option value=88>88</option><option value=89>89</option><option value=90>90</option><option value=91>91</option><option value=92>92</option><option value=93>93</option><option value=94>94</option><option value=95>95</option><option value=96>96</option><option value=97>97</option><option value=98>98</option><option value=99>99</option></select>

<input name="getYear" type="submit" value="Go" id="getYear" />
</form></td>
    <td width="22%" align="right" valign="middle"><select name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Type</option>
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
      <optgroup label="Small Cents">
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
        <option value="addCoinTypeMulti.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
        <option value="addCoinTypeMulti.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="addCoinTypeMulti.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="addCoinTypeMulti.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="addCoinTypeMulti.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="addCoinTypeMulti.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      <optgroup label="Nickels">
        <option value="addCoinTypeMulti.php?coinType=Shield_Nickel">Flowing Hair Large Cent</option>
        <option value="addCoinTypeMulti.php?coinType=Indian_Head">Indian Head</option>
        <option value="addCoinTypeMulti.php?coinType=Lincoln_Wheat">Draped Bust Large Cent</option>
        <option value="addCoinTypeMulti.php?coinType=Lincoln_Memorial">Classic Head Large Cent</option>
        <option value="addCoinTypeMulti.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial Series</option>
        <option value="addCoinTypeMulti.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="addCoinTypeMulti.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="addCoinTypeMulti.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="addCoinTypeMulti.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="addCoinTypeMulti.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="addCoinTypeMulti.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="addCoinTypeMulti.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="addCoinTypeMulti.php?coinType=Twenty_Cent_Piece">Twenty Cent Piece</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="addCoinTypeMulti.php?coinType=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="addCoinTypeMulti.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="addCoinTypeMulti.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
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
<p class="darker">Recently added <?php echo $coinYear; ?> coins In Your Collection</p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="11%">Date</td>
    <td width="55%">Coin</td>
    <td width="11%">Grade</td>   
        <td width="10%">Grader</td>  
    <td width="13%"> Investment</td>

  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM collection WHERE coinYear = '$coinYear' AND userID = '$userID' ORDER BY collectionID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="5">You dont have any '.$coinYear.' in  coins In Your Collection</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $coinYear = $row['coinYear'];
  
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
<td><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'">'.$collectedCoinName.' '.strip_tags($row['coinType']).'</a></td>
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

<a name="forms"></a>
<div id="addCoinDiv">
<h2>All <?php echo $coinYear; ?> Coins</h2>
<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
<table width="100%" border="0">
  <tr class="darker">
    <td width="2%" align="center">+</td>
    <td width="30%">Grade</td>
    <td width="65%">Year / Mint</td>
  </tr>
     <tr class="darker">
     <td colspan="3" align="left"><span class="errorTxt" id="errorMsg"><?php
if(isset($_SESSION['errorMsg'])) {
	echo $_SESSION['errorMsg'];
} else {
	$_SESSION['errorMsg'] = '&nbsp;';
}
 ?></span>&nbsp;</td>
   </tr>
  <?php 
  $i = 0;
  $x = 0;
  $c = 0;
	$getcoinType = mysql_query("SELECT * FROM coins WHERE coinYear = '$coinYear' ORDER BY denomination ASC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$coinID = $row['coinID'];
		$coinType = $row['coinType'];
		$name = $row['coinName'];
		$coin-> getCoinById($row['coinID']);
	echo ' 
	<tr class="coinsRow">
    <td width="2%" align="center">
	<input type="checkbox" name="coinID['.$i++.'][theID]" id="coinID' . $row['coinID'] . '" value="' . $row['coinID'] . '" class="idCheck" />
      </td>
    
	<td><select name="coinID['.$c++.'][coinGrade]" onChange="document.getElementById(\'coinID' . $row['coinID'] . '\').checked=true;">';
	switch($coin->getCoinStrike()){
		case 'Business':
		echo '
<option value="No Grade" selected="selected">No Grade</option>
<option value="B0">(B-0) Basal 0 </option>
<option value="P1" >(PO-1) Poor</option>
<option value="FR2">(FR-2) Fair</option>
<option value="AG3">(AG-3) About Good</option>
<option value="G4">(G-4) Good</option>
<option value="G6">(G-6) Good</option>
<option value="VG8">(VG-8) Very Good</option>
<option value="VG10">(VG-10) Very Good</option>
<option value="F12">(F-12) Fine</option>
<option value="F15">(F-15) Fine</option>
<option value="VF20">(VF-20) Very Fine</option>
<option value="VF25">(VF-25) Very Fine</option>
<option value="VF30">(VF-30) Very Fine</option>
<option value="VF35">(VF-35) Very Fine</option>
<option value="EF40">(EF-40) Extremely Fine</option>
<option value="EF45">(EF-45) Extremely Fine</option>
<option value="AU50">(AU-50) About Uncirculated</option>
<option value="AU55">(AU-55) About Uncirculated</option>
<option value="AU58">(AU-58) Very Choice About Uncirculated</option>
<option value="MS60">(MS-60) Mint State Basal</option>
<option value="MS61">(MS-61) Mint State Acceptable</option>
<option value="MS62">(MS-62) Mint State Acceptable</option>
<option value="MS63">(MS-63) Mint State Acceptable</option>
<option value="MS64">(MS-64) Mint State Acceptable</option>
<option value="MS65">(MS-65) Mint State Choice</option>
<option value="MS66">(MS-66) Mint State Choice</option>
<option value="MS67">(MS-67) Mint State Choice</option>
<option value="MS68">(MS-68) Mint State Premium</option>
<option value="MS69">(MS-69) Mint State All-But-Perfect</option>
<option value="MS70">(MS-70) Mint State Perfect</option>';
        break;
		case 'Proof':
		echo '
<option value="No Grade" selected="selected">No Grade</option>		
<option value="PR35">(PR-35) Impaired Proof.</option>
<option value="PR40">(PR-40) Impaired Proof.</option>
<option value="PR45">(PR-45) Impaired Proof.</option>
<option value="PR50">(PR-50) Impaired Proof.</option>
<option value="PR55">(PR-55) Impaired Proof.</option>
<option value="PR58">(PR-58) Impaired Proof.</option>
<option value="PR60">(PR-60) Brilliant Proof.</option>
<option value="PR61">(PR-61) Brilliant Proof.</option>
<option value="PR62">(PR-62) Brilliant Proof.</option>
<option value="PR63">(PR-63) Brilliant Proof.</option>
<option value="PR64">(PR-64) Brilliant Proof.</option>
<option value="PR65">(PR-65) Gem Proof.</option>
<option value="PR66">(PR-66) Choice Gem Proof.</option>
<option value="PR67">(PR-67) Extraordinary Proof.</option>
<option value="PR68">(PR-68) Extraordinary Proof.</option>
<option value="PR69">(PR-69) Extraordinary Proof.</option>
<option value="PR70">(PR-70) Perfect Proof.</option>';
break;
	}
	
echo '</select></td>
<td width="92%"><label  id="coinLabel' . $row['coinID'] . '" for="coinID' .$row['coinID']. '">' .$row['coinName']. ' '.$row['coinType'].'</label></td>
  </tr>';
	}
?>
   <tr class="darker">
     <td colspan="3" align="left">&nbsp;</td>
   </tr>
   <tr class="darker">
    <td colspan="3" align="left">
    <input name="coinYear" type="hidden" value="<?php echo $coinYear; //intval($_GET['century']).intval($_GET['theYear']) ?>" />
    <input name="addCoinFormBtn" id="addCoinFormBtn" type="submit" value="Add All Coins" />&nbsp;<span id="endErrorMsg" class="errorTxt"></span></td>
  </tr> 
</table>
</form>
</div>

<p>&nbsp;</p>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
