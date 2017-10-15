<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET["collectrollsID"])) { 
$collectrollsID = intval($_GET['collectrollsID']);
$collectionRolls->getCollectionRollById($collectrollsID);
$coinType = $collectionRolls->getCoinType();
$coinID = $collectionRolls->getCoinID();
$rollNickname = $collectionRolls->getRollNickname();
$coinTypeLink = str_replace(' ', '_', $coinType);

$rollID = $collectionRolls->getRollID();
$roll->getRollTypeById($rollID);
$coinCount = $roll->getCoinCount();


$coinQuery = mysql_query("SELECT * FROM collectrolls WHERE collectrollsID = '$collectrollsID'") or die(mysql_error());
while($row = mysql_fetch_array($coinQuery))
  {
  $coinType = $row['coinType'];
  $coinCategory = $row['coinCategory'];
  $coinSubCategory = $row['coinSubCategory'];
  }
  
}



/*if(isset($_GET["collectionID"])){
	$collectionID  = intval($_GET["collectionID"]);
	$collectrollsID  = intval($_GET["collectrollsID"]);
	$result = mysql_query("UPDATE collectrolls SET collection = '$collection' WHERE coinID = '$coinID'") or die(mysql_error()); 
}*/


if (isset($_POST["addCoinFormBtn"])) { 
$addCoinFormBtn = $_POST['addCoinFormBtn'];
$collectrollsID = $_POST["collectrollsID"];
$coinType = $_POST["coinType"];

function enterCoinID($coinNum, $coinID, $collectrollsID){
$result = mysql_query("UPDATE collectrolls SET '$coinNum' = '$coinID' WHERE collectrollsID = '$collectrollsID'") or die(mysql_error()); 
		  
}

$i = 1;
foreach($_POST as $coinID) {
	 if ($coinID == $addCoinFormBtn) continue;
     if ($coinID == $coinType) continue;
	 if ($coinID == $collectrollsID) continue;
if($coinID != '0'){
	$coin->getCoinById($coinID);
	$coin->getCoinName();
	$coinType = $coin->getCoinType();
	$coinCategory = $coin->getCoinCategory();
	
	mysql_query("INSERT INTO collection(coinID, collectrollsID, coinType, coinCategory, purchaseDate, enterDate, accountID) VALUES('$coinID', '$collectrollsID', '$coinType', '$coinCategory',  '$theDate',  '$theDate', '$accountID')") or die(mysql_error()); 
	$collectionID = mysql_insert_id();
	
	mysql_query("UPDATE collectrolls SET coin".$i++." = '$collectionID' WHERE collectrollsID = '$collectrollsID'") or die(mysql_error());
    
}
}
header("location: viewRollDetail.php?collectrollsID=$collectrollsID");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add A Coin</title>

<style type="text/css">
#additional {width:99%;}
#gradeService {margin-bottom:7px;}
#addCoinTbl td {padding:3px;}
#additional {margin-bottom:7px;}
#coinTypes a {text-decoration:none;}

.bulkLinks {width:100px; height:auto;}
.rollHdr {margin:0px; padding:0px;}
</style> 
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<br class="clear" />

<div id="content" class="clear">
<h1><span class="darker"><img src="../img/<?php echo $coinTypeLink ?>.jpg" width="100" height="auto" align="absmiddle" /></span>Add New Coins to <?php echo $rollNickname ?> Roll ID# <?php echo $rollID ?></h1>
<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<p>Select individual coins</p>
<p>Selected Coins</p>


<div class="roundedWhite">
<p><a href="addRollType.php">Back to roll types</a></p>

<form id="addRollCoinsForm" method="post" action="" name="addRollCoinsForm">
<table width="100%" border="0" cellpadding="6">
    <tr class="darker">
    <td width="11%">Coin Roll #</td>
    <td width="89%">Coin and Grade</td>
    </tr>
  <tr>
    <td width="11%">Coin 1</td>
    <td width="89%">
	    <select name="coin1" class="coinList">
        <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 2</td>
    <td>
    <select name="coin2" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 3</td>
    <td>
    <select name="coin3" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 4</td>
    <td>
    <select name="coin4" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 5</td>
    <td>
    <select name="coin5" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 6</td>
    <td>
    <select name="coin6" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 7</td>
    <td>
    <select name="coin7" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 8</td>
    <td>
    <select name="coin8" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 9</td>
    <td>
    <select name="coin9" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 10</td>
    <td>
    <select name="coin10" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 11</td>
    <td>
    <select name="coin11" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 12</td>
    <td>
    <select name="coin12" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 13</td>
    <td>
    <select name="coin13" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 14</td>
    <td>
    <select name="coin14" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 15</td>
    <td>
    <select name="coin15" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 16</td>
    <td>
    <select name="coin16" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 17</td>
    <td>
    <select name="coin17" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 18</td>
    <td>
    <select name="coin18" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 19</td>
    <td>
    <select name="coin19" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 20</td>
    <td>
    <select name="coin20" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 21</td>
    <td>
    <select name="coin21" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 22</td>
    <td>
    <select name="coin22" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 23</td>
    <td>
    <select name="coin23" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 24</td>
    <td>
    <select name="coin24" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 25</td>
    <td>
    <select name="coin25" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 26</td>
    <td>
    <select name="coin26" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 27</td>
    <td>
    <select name="coin27" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 28</td>
    <td>
    <select name="coin28" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 29</td>
    <td>
    <select name="coin29" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 30</td>
    <td>
    <select name="coin30" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 31</td>
    <td>
    <select name="coin31" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 32</td>
    <td>
    <select name="coin32" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 33</td>
    <td>
    <select name="coin33" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 34</td>
    <td>
    <select name="coin34" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 35</td>
    <td>
    <select name="coin35" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 36</td>
    <td>
    <select name="coin36" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 37</td>
    <td>
    <select name="coin37" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 38</td>
    <td>
    <select name="coin38" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 39</td>
    <td>
    <select name="coin39" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 40</td>
    <td>
    <select name="coin40" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 41</td>
    <td>
    <select name="coin41" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 42</td>
    <td>
    <select name="coin42" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 43</td>
    <td>
    <select name="coin43" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 44</td>
    <td>
    <select name="coin44" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 45</td>
    <td>
    <select name="coin45" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 46</td>
    <td>
    <select name="coin46" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 47</td>
    <td>
    <select name="coin47" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 48</td>
    <td>
    <select name="coin48" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 49</td>
    <td>
    <select name="coin49" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 50</td>
    <td>
    <select name="coin50" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	<?php  $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
</table>
<input name="collectrollsID" type="hidden" value="<?php echo $collectrollsID ?>" />
<input name="coinType" type="hidden" value="<?php echo $coinType ?>" />
    <input name="addCoinFormBtn" type="submit" value="Add Coins" /></td>
</form>
</div>
<div class="spacer"></div>

</div>
 <?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
