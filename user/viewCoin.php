<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

function getVarietyNameNum($collectionID){
	$collection = new Collection();
	$collection->getCollectionById($collectionID);
	  if($collection->getVariety() !== 'None'){	
		 return $collection->get{$collection->getVariety}();
		  } else {
		  return null;
      }	
}




if (isset($_GET['coinID'])) { 
$coinID = intval($_GET['coinID']);
$coin->getCoinById($coinID);
$coinName = $coin->getCoinName(); 
$coinType = $coin->getCoinType(); 

$coinCategory = $coin->getCoinCategory(); 
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$categoryLink = str_replace(' ', '_', $coinCategory); 
$coinLink = str_replace(' ', '_', $coinType);
$count = $collection->getCoinCountById($coinID, $userID);
$collection->getCoinSumById($coinID, $userID);

$CoinTypes->getCoinByType($coinType);
$denomination = number_format($CoinTypes->getDenomination() * $count,2);

}

if (isset($_GET['wantBtn'])) { 
$coinID = intval($_GET['coinID']);
$wantGrade = mysql_real_escape_string($_GET["coinGrade"]);
$wantService = mysql_real_escape_string($_GET["proService"]);

$coin->getCoinById($coinID);
$coinName = $coin->getCoinName(); 
$coinType = $coin->getCoinType(); 

$coinCategory = $coin->getCoinCategory(); 
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$categoryLink = str_replace(' ', '_', $coinCategory); 
$coinLink = str_replace(' ', '_', $coinType);
$count = $collection->getCoinCountById($coinID, $userID);
$collection->getCoinSumById($coinID, $userID);

$CoinTypes->getCoinByType($coinType);
$denomination = number_format($CoinTypes->getDenomination() * $count,2);

mysql_query("INSERT INTO wantlist(coinID, coinType, coinCategory, userID, listDate, coinGrade, proService, century) VALUES('$coinID', '$coinType', '$coinCategory', '$userID', '$theDate', '".mysql_real_escape_string($_GET["coinGrade"])."', '".mysql_real_escape_string($_GET["proService"])."', '".$coin->getCentury()."')") or die(mysql_error()); 
$wantlistID = mysql_insert_id();

}

if (isset($_POST['wantlistID'])) { 
$wantlistID = intval($_POST['wantlistID']);
mysql_query("DELETE FROM wantlist WHERE wantlistID = '$wantlistID'") or die(mysql_error()); 
}

if (isset($_POST['coinBtn'])) { 
$coinID = intval($_POST['coinID']);
$variety = mysql_real_escape_string($_POST['variety']);
$varietyText = mysql_real_escape_string($_POST['varietyText']);
mysql_query("UPDATE coins SET ".$variety." = '$varietyText' WHERE coinID = '$coinID'") or die(mysql_error()); 
header("location: viewCoin.php?coinID=".$coinID."");
}

if($WantList->getWantedCoin($coinID, $userID) >= 1){
	$wantBox = '| I<a href="viewWantCoinID.php?coinID='.$coinID.'">In want list</a>';
} else {
	$wantBox = '<input id="showWantBtn" type="button" value="Add to Want List" />';
}

//Delete coin
if (isset($_POST["deleteCoinFormBtn"])) { 
$Coin = $Encryption->decode($_POST["Coin"]);
$collection->deleteCoinAndImages($Encryption->decode($_POST["ID"]), $userID);
$_SESSION['message'] = '<span class="greenLink">Coin Deleted</span>';
header("location: viewCoin.php?coinID=".$Coin."");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinName ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 3, "desc" ]],
	"iDisplayLength": 50
} );


$("#listSwitcher").change(function() {   
	 $('#changeMsg').text("generating list.....");	  
});
$("#wantForm").submit(function() {
      if ($("#coinGrade").val() == "") {
		$("#coinGrade").addClass("errorInput");
        return false;
      }else {
	 $('#wantBtn').val("Adding to list.....");	  
	  return true;
	  }
});


});

function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("thisCoinDiv").innerHTML=xmlhttp.responseText;
	document.getElementById('changeMsg').innerHTML= '';	
    }
  }
xmlhttp.open("GET","_viewCoinList.php?coinID=<?php echo intval($coinID); ?>&q="+str,true);
xmlhttp.send();
}
</script> 

<style type="text/css">
#varietyText {width:99%;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h2><img src="../img/<?php echo str_replace(' ', '_', $coin->getCoinVersion()); ?>.jpg" alt="11" width="100" height="100" align="absmiddle" /> <?php echo $coinName; ?> </h2>
<h3><a href="<?php echo $categoryLink ?>.php" class="brownLink"><?php echo $coinCategory ?></a> | <a href="viewListReport.php?coinType=<?php echo $coinLink ?>&amp;page=1" class="brownLink"><?php echo $coinType ?></a>  |  <a href="viewSetYear.php?year=<?php echo substr($coin->getCoinName(), 0, 4); ?>" class="brownLink"><?php echo substr($coin->getCoinName(), 0, 4); ?> Date Set</a> | <a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&year=<?php echo $coin->getCoinYear(); ?>" class="brownLink"><?php echo $coin->getCoinYear(); ?> Mint Marks</a> | <a href="viewCoinYearMint.php?coinType=<?php echo $coinLink ?>&mintMark=<?php echo $coin->getMintMark(); ?>&amp;coinYear=<?php echo intval($coin->getCoinYear()); ?>" class="brownLink">All Varieties</a></h3>

<table width="100%" border="0">
  <tr>
    <td width="15%"><strong>Total Collected</strong></td>
    <td width="10%" align="right"><?php echo $count ?></td>
    <td width="11%">&nbsp;</td>
    <td width="13%"><strong>Face Value</strong></td>
    <td width="25%">$<?php echo $denomination ?></td>
    <td width="26%" align="right">
    <?php 
    echo '
 <a target="_blank" href="http://rover.ebay.com/rover/1/711-53200-19255-0/1?icep_ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=&icep_uq='.str_replace(' ', '+', $coin->getCoinName()).'&icep_sellerId=&icep_ex_kw=&icep_sortBy=12&icep_catId='.$CoinTypes->getEbay().'&icep_minPrice=&icep_maxPrice=&ipn=psmain&icep_vectorid=229466&kwid=902099&mtid=824&kw=lg">This coin on<img src="../img/coinEbay.jpg" width="69" height="23" align="absmiddle" /></a><img style="text-decoration:none;border:0;padding:0;margin:0;" src="http://rover.ebay.com/roverimp/1/711-53200-19255-0/1?ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=&uq=2009+S+Presidency&mpt=[CACHEBUSTER]">'; ?>
    
    </td>
  </tr>
  <tr>
    <td><strong>Total Investment</strong></td>
    <td align="right">$<?php echo $collection->getCoinSumById($coinID, $userID) ?></td>
    <td>&nbsp;</td>
    <td>
    <?php 
	switch($coin->getCoinMetal()){
		case 'Gold':
		case 'Platinum':
		echo '';
		break;
		default:
		echo '<strong>Roll Progress</strong>';
		break;
	}
	?>
    </td>
    <td colspan="2">
	    <?php 
	switch($coin->getCoinMetal()){
		case 'Gold':
		case 'Platinum':
		echo '';
		break;
		default:
		echo $CoinTypes->getCoinRollProgress($coinType, $userID, $coinID);
		break;
	}
	?>
</td>
  </tr>
</table>
<hr />

<?php include ("../inc/pageElements/coinLinks.php");?>

<?php if ($coin->getCoinType() == 'Franklin Half Dollar' && $coin->getCoinStrike() == 'Business') {?>
<hr />
<table width="100%" border="0">
  <tr align="center" class="darker">
    <td width="50%">Full Bell Lines</td>
    <td width="50%">Unclassified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCoinDesignationCount($userID, $designation='FBL', intval($_GET['coinID'])); ?></td>
    <td><?php echo $collection->getCoinDesignationCount($userID, $designation='None', intval($_GET['coinID'])); ?></td>
  </tr>
  <tr align="center">
    <td colspan="2">Full Bell LinesReport</td>
    </tr>
</table>
<?php } else { echo ''; }  ?><?php if ($coin->getCoinType() == 'Standing Liberty' && $coin->getCoinStrike() == 'Business') {?>
<hr />
<table width="100%" border="0">
  <tr align="center" class="darker">
    <td width="50%">Full Head</td>
    <td width="50%">Unclassified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCoinDesignationCount($userID, $designation='FH', intval($_GET['coinID'])); ?></td>
    <td><?php echo $collection->getCoinDesignationCount($userID, $designation='None', intval($_GET['coinID'])); ?></td>
  </tr>
  <tr align="center">
    <td colspan="2">Full Head Report</td>
    </tr>
</table>
<?php } else { echo ''; }  ?>
<?php if (in_array(str_replace('_', ' ', $coin->getCoinCategory()), $colorCategories)) {?>
<hr />
<table width="100%" border="0">
  <tr align="center" class="darker">
    <td width="25%">Red</td>
    <td width="25%">Red/Brown</td>
    <td width="25%">Brown</td>
    <td width="25%">Unclassified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCoinColorCount($userID, $color='RD', intval($_GET['coinID'])); ?></td>
    <td><?php echo $collection->getCoinColorCount($userID, $color='RB', intval($_GET['coinID'])); ?></td>
    <td><?php echo $collection->getCoinColorCount($userID, $color='BN', intval($_GET['coinID'])); ?></td>
    <td><?php echo $collection->getCoinColorCount($userID, $color='None', intval($_GET['coinID'])); ?></td>
  </tr>
  <tr align="center">
    <td>&nbsp;</td>
    <td colspan="2"><a href="viewCoinColor.php?coinID=<?php echo intval($_GET['coinID']); ?>" class="darker">Full Color Report</a></td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php } else { echo ''; }  ?>

<?php if ($coin->getCoinType() == 'Jefferson Nickel' && $coin->getCoinStrike() == 'Business') {?>
<hr />
<table width="100%" border="0">
  <tr align="center" class="darker">
    <td width="25%">6 Full Steps</td>
    <td width="25%">5 Full Steps</td>
    <td width="25%">Full Steps</td>
    <td width="25%">Unclassified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCoinDesignationCount($userID, $designation='6FS', intval($_GET['coinID'])); ?></td>
    <td><?php echo $collection->getCoinDesignationCount($userID, $designation='5FS', intval($_GET['coinID'])); ?></td>
    <td><?php echo $collection->getCoinDesignationCount($userID, $designation='FS', intval($_GET['coinID'])); ?></td>
    <td><?php echo $collection->getCoinDesignationCount($userID, $designation='None', intval($_GET['coinID'])); ?></td>
  </tr>
  <tr align="center">
    <td>&nbsp;</td>
    <td colspan="2"><a href="viewDesignationReport.php?coinID=<?php echo intval($_GET['coinID']); ?>" class="darker">Full Steps Report</a></td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php } else { echo ''; }  ?>
<?php if ($coin->getCoinType() == 'Morgan Dollar' && $coin->getCoinStrike() == 'Business') {?>
<hr />
<table width="100%" border="0">
  <tr align="center" class="darker">
    <td width="25%">Ultra Prooflike</td>
    <td width="25%">Deep Mirror Proof Like</td>
    <td width="25%">Proof Like</td>
    <td width="25%">Semi-Prooflike</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCoinMorganDesignationCount($userID, $morganDesignation='UPL', intval($_GET['coinID'])); ?></td>
    <td><?php echo $collection->getCoinMorganDesignationCount($userID, $morganDesignation='DMPL', intval($_GET['coinID'])); ?></td>
    <td><?php echo $collection->getCoinMorganDesignationCount($userID, $morganDesignation='PL', intval($_GET['coinID'])); ?></td>    
    <td><?php echo $collection->getCoinMorganDesignationCount($userID, $morganDesignation='SPL', intval($_GET['coinID'])); ?></td>
  </tr>
  <tr align="center">
    <td colspan="4"><a href="viewDesignationReport.php?coinID=<?php echo intval($_GET['coinID']); ?>" class="darker">Proof Like Report</a></td>
    </tr>
</table>
<?php } else { echo ''; }  ?>

<?php if ($coin->getCoinType() == 'Roosevelt Dime' && $coin->getCoinStrike() == 'Business') {?>
<hr />
<table width="100%" border="0">
  <tr align="center" class="darker">
    <td width="33%">Full Bands</td>
    <td width="33%">Full Torch</td>
    <td width="33%">Unclassified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCoinDesignationCount($userID, $designation='FB', intval($_GET['coinID'])); ?></td>
    <td><?php echo $collection->getCoinDesignationCount($userID, $designation='FT', intval($_GET['coinID'])); ?></td>
    <td><?php echo $collection->getCoinDesignationCount($userID, $designation='None', intval($_GET['coinID'])); ?></td>
  </tr>
  
</table>
<?php } else { echo ''; }  ?>

<?php if (in_array(intval($_GET['coinID']), $bieCoins)) {?>
<hr />
<table width="100%" border="0">
  <tr align="center" class="darker">
    <td>&nbsp;</td>
    <td><h3>BIE Types</h3></td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center" class="darker">
    <td width="33%">Full</td>
    <td width="33%">Partial</td>
    <td width="33%">Undefined</td>
  </tr>
  <tr align="center">
    <td><?php echo $Errors->getBIEByCoinIDCount($userID, intval($_GET['coinID']), $bie='Full'); ?></td>
    <td><?php echo $Errors->getBIEByCoinIDCount($userID, intval($_GET['coinID']), $bie='Partial'); ?></td>
    <td><?php echo $Errors->getBIEByCoinIDCount($userID, intval($_GET['coinID']), $bie='None'); ?></td>
  </tr>
</table>
<hr />
<?php } else { echo ''; }  ?>

<?php if ($User->getUserLevel() == 'admin') {?>
<form class="coinForm" method="post" action="" id="coinForm">
<table width="400" border="0">
  <tr>
    <td width="88">Variety # &nbsp;</td>
    <td width="302"><select id="variety" name="variety">
<option value="" selected="selected">None</option>  
<option value="snow">Snow</option>
<option value="sheldon">Sheldon</option>
<option value="newcomb">Newcomb</option>
<option value="cohen">Cohen</option>                                                    
</select>&nbsp;
<input name="coinID2" type="hidden" value="<?php echo $coinID ?>" /></td>
  </tr>
  <tr>
    <td colspan="2"><textarea name="varietyText" id="varietyText"><?php echo $coin->getSnow(); ?></textarea></td>
    </tr>
  <tr>
    <td><input name="coinBtn" id="coinBtn" type="submit" value="Add Value" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
<!--<input name="snow" type="text" value="" />--><br />
<br />
<textarea><?php echo $coin->getSnow(); ?></textarea>
</form>   
<?php } else { echo ''; }  ?>


<div id="wantedCoinsDiv">
<h3><img src="../img/<?php echo $coinVersion ?>.jpg" alt="11" width="30" height="30" align="absmiddle" /> Wanted coins</h3>
<br />

<table width="100%" border="0">
  <tr valign="middle">
    <td width="51%">
<form class="compactForm" method="get" action="" id="wantForm">
<input name="coinID" type="hidden" value="<?php echo $coinID ?>" />

<?php include("../inc/coinGrade/".$coin->getCoinStrike()."List.php"); ?>

<select id="proService" name="proService">
<option value="None" selected="selected">None</option>  
<option value="PCGS">PCGS</option>
<option value="ICG">ICG</option>
<option value="NGC">NGC</option>
<option value="ANACS">ANACS</option>
<option value="SEGS">SEGS</option>
<option value="PCI">PCI</option>      
<option value="ICCS">ICCS</option>  
<option value="HALLMARK">HALLMARK</option>  
<option value="NTC">NTC</option>                                                       
</select>
<input name="coinID" type="hidden" value="<?php echo $coinID ?>" />
<input name="wantBtn" id="wantBtn" type="submit" value="Add to Want List" />
</form>    
    </td>
    <td width="49%">
  
    </td>
  </tr>
</table>





<table width="100%" border="0" id="wantTbl">
<thead>
  <tr class="darker">
    <td width="18%">Grade Service</td>
    <td width="15%" align="center">Grade</td>  
    <td width="19%" align="center">Date Entered</td>
    <td width="48%" align="left"></td>
  </tr>
</thead>
  <tbody>
<?php
$countWant = mysql_query("SELECT * FROM wantlist WHERE coinID = '$coinID' AND userID = '$userID'") or die(mysql_error());
if(mysql_num_rows($countWant) == 0){
	  echo '
		  <tr>
		  <td width="57%">None In want List</td>
		  <td width="11%" align="center">&nbsp;</td>  
		  <td width="14%" align="center">&nbsp;</td>
		  <td width="18%" align="center">&nbsp;</td>
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($countWant))
	  {
  $wantlistID = strip_tags($row['wantlistID']);
  $WantList->getWantedById($wantlistID);  
  $coinID = intval($row['coinID']);
  $coinGrade = $WantList->getCoinGrade();
  $coin-> getCoinID($coinID);  
  $coinName = $coin->getCoinName(); 
  $proService = $WantList->getGrader();

  echo '
    <tr align="center">
    <td align="left">'.$proService.'</td>
	<td>'. $WantList->getCoinGrade() .'</td>
		<td>'.date("M j, Y",strtotime($WantList->getEnterDate())) .'</td>
	<td align="left">
	  <form action="" method="post" class="compactForm">
	  <input name="coinID" type="hidden" value="'.$coinID.'" />
	  <input name="wantlistID" type="hidden" value="'.$wantlistID.'" />
	  <input name="noWantBtn" type="submit" value="Remove" onclick="return confirm(\'Remove From List?\')" />
	  </form>
	</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>


<tfoot>
  <tr class="darker">
    <td>Grade Service</td>
    <td align="center">Grade</td>  
    <td width="19%" align="center">Date Entered</td>
    <td width="48%" align="center"></td>
  </tr>
	</tfoot>
</table>

<hr />
</div>
<h3><img src="../img/<?php echo $coinVersion ?>.jpg" alt="11" width="30" height="30" align="absmiddle" /> Coins</h3>

<table width="100%" border="0">
  <tr class="darker">
    <td width="25%" align="center">In Folders</td>
    <td width="25%" align="center">In Rolls</td>
    <td width="25%" align="center">In Minsets</td>
    <td width="25%" align="center">To Be Certified</td>
  </tr>
  <tr>
    <td align="center"><a href="coinIDInFolders.php?coinID=<?php echo intval($_GET['coinID']);?>"><?php echo $collection->getCoinFolderCountByCoinID($coinID, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getCoinRollCountByCoinID($coinID, $userID); ?></td>
    <td align="center"><a href="coinIDInMintsets.php?coinID=<?php echo intval($_GET['coinID']);?>"><?php echo $collection->getCoinSetsCountByCoinID($coinID, $userID); ?></a></td>
    <td align="center"><a href="coinIDtoBeCertified.php?coinID=<?php echo intval($_GET['coinID']);?>"><?php echo $collection->getCoinCertListCountByCoinID($coinID, $userID); ?></a></td>
  </tr>
</table>







<table width="100%" border="0">
  <tr class="darker">
    <td width="25%" align="center">Cleaned</td>
    <td width="25%" align="center">Scratched</td>
    <td width="25%" align="center">Environmental Damage</td>
    <td width="25%" align="center">Polished</td>
  </tr>
  <tr>
    <td align="center"><?php echo $collection->getCoinDamageType('cleaned', $coinID, $userID); ?></td>
    <td align="center"><?php echo $collection->getCoinDamageType('scratched', $coinID, $userID); ?></td>
    <td align="center"><?php echo $collection->getCoinDamageType('damaged', $coinID, $userID); ?></td>
    <td align="center"><?php echo $collection->getCoinDamageType('polished', $coinID, $userID); ?></td>
  </tr>
</table>

<?php if($coin->getCentury() <'20'){?>
	
<table width="100%" border="0">
  <tr class="darker">
    <td width="25%" align="center">Holed</td>
    <td width="25%" align="center">Plugged</td>
    <td width="25%" align="center">Bent</td>
    <td width="25%" align="center">Altered Surface</td>
  </tr>
  <tr>
    <td align="center"><?php echo $collection->getCoinDamageType('holed', $coinID, $userID); ?></td>
    <td align="center"><?php echo $collection->getCoinDamageType('plugged', $coinID, $userID); ?></td>
    <td align="center"><?php echo $collection->getCoinDamageType('bent', $coinID, $userID); ?></td>
    <td align="center"><?php echo $collection->getCoinDamageType('altered', $coinID, $userID); ?></td>
  </tr>
</table>
	
<?php }?>

<table width="100%" border="0">
  <tr class="darker">
    <td width="25%" align="center">&nbsp;</td>
    <td width="25%" align="center">Errors</td>
    <td width="25%" align="center">Varieties</td>
    <td width="25%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center"><?php echo $Errors->getErrorTypeCoinCount($coinID, $userID) ?></td>
    <td align="center"><?php echo $collection->getVarietyTypeCoinCount($coinID, $userID) ?></td>
    <td align="center">&nbsp;</td>
  </tr>
</table>
 





<hr />
<form>
<label for="listSwitcher">Filter Results: </label><select id="listSwitcher" name="q" onchange="showUser(this.value)">
<option value="all" selected="selected">Switch View:</option>
<option value="folder">In Folders</option>
<option value="roll">In Rolls</option>
<option value="set">In Sets</option>
<option value="certified">To Be Certified</option>

<?php if ($coinType == 'Morgan Dollar'){ ?>  
<option value="vam">By VAM</option>
<?php }?>

<option value="all">All</option>
</select> <span id="changeMsg">&nbsp;</span>
</form>
<br />

<div id="thisCoinDiv">

<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="69%">Year / Mint</td>
    <td width="17%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID' ORDER BY coinGradeNum ASC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td width="57%"><a href="addCoinByID.php?coinID='.$coinID.'"><strong>None Collected</strong></a>, <a target="_blank" href="http://rover.ebay.com/rover/1/711-53200-19255-0/1?icep_ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=search&icep_uq='.str_replace(' ', '+', $coin->getCoinName()).'&icep_sellerId=&icep_ex_kw=&icep_sortBy=12&icep_catId=253&icep_minPrice=&icep_maxPrice=&ipn=psmain&icep_vectorid=229466&kwid=902099&mtid=824&kw=lg">Find one on<img src="http://mycoinorganizer.com/img/coinEbay.jpg" width="69" height="23" align="absmiddle" /></a></td>
		  <td width="11%" align="center">&nbsp;</td>  
		  <td width="18%" align="center">&nbsp;</td>
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {
		  $collection->getCollectionById(intval($row['collectionID']));    
		  $coin-> getCoinById(intval($row['coinID']));
		  $collectionFolder->getCollectionFolderById(intval($row['collectfolderID']));
		   
		if(intval($row['collectfolderID']) == '0' && intval($row['collectrollsID']) == '0' && $collection->getGrader() == 'None' && intval($row['collectsetID']) == '0') {
			$coinIcon = '<img align="absbottom" src="../img/'.str_replace(' ', '_', $coin->getCoinVersion()).'.jpg" width="20" height="20" />&nbsp;';
			$grader = '';
		}
		else if($collection->getGrader() != 'None') {
			$coinIcon = '<img align="absbottom" src="../img/graded.jpg" width="20" height="20" /> ';
			$grader = '/'.$collection->getGrader();
		}
		else if(intval($row['collectfolderID']) != '0') {
			
			$coinIcon = '<a href="viewFolderDetail.php?ID='.$Encryption->encode(intval($row['collectfolderID'])).'" title="'.$collectionFolder->getFolderNickname().'"><img align="absbottom" src="../img/Folder3.jpg" width="20" height="20" /></a> ';
			$grader = '';
		}
		else if(intval($row['collectrollsID']) != '0') {
			$collectionRolls->getCollectionRollById(intval($row['collectrollsID']));
		   $coinIcon = $collectionRolls->getRollTypeIconLink(intval($row['collectrollsID']));
		   $grader = '';
		}
		else if(intval($row['collectsetID']) != '0') {
			$CollectionSet->getCollectionSetById(intval($row['collectsetID']));
		   $coinIcon = '<a href="viewSetDetail.php?ID='.$Encryption->encode(intval($row['collectsetID'])).'" title="'.$CollectionSet->getSetNickname().'"><img align="absbottom" src="../img/SetIcon.jpg" width="20" height="20" /></a> ';
		   $grader = '';
		}
		else { 
		   $coinIcon = '<img align="absbottom" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
		   $grader = '';
		}
  
  echo '
    <tr align="center">
    <td align="left">'.$coinIcon.'<a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'. $collection->getCoinGrade().$collection->getCoinAttribute(intval($row['collectionID']), $userID).$grader.' '.$collection->getVarietyForCoin(intval($row['collectionID'])).' '.substr($Errors->getErrorForCoin(intval($row['collectionID'])), 0, 30).'</a></td>
		<td>'.date("M j, Y",strtotime($collection->getCoinDate())) .'</td>
	<td>$'. $collection->getCoinPrice() .'</td>	   
  </tr>
  ';
	  }
}

?>
</tbody>
<tfoot class="darker">
  <tr>
    <td width="69%">Year / Mint</td>
    <td width="17%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>
</div>
<p class="clear">&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>