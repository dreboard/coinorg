<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['wantlistID'])) { 
$wantlistID = intval($_GET['wantlistID']);
$WantList->getWantedById($wantlistID);
$coinID = $WantList->getCoinID();
$coin-> getCoinById($coinID);
$coinType = $coin->getCoinType();
$coinCategory = $coin->getCoinCategory();  
$coinSubCategory = $coin->getCoinSubCategory();  
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$coinName = $coin->getCoinName();  
$coinGrade = $WantList->getCoinGrade();

if($WantList->getGrader() == 'None'){
	$proService = '';	
} else {
	$proService = $WantList->getGrader();
}



$linkName = str_replace(' ', '_', $coinType);
$categoryLink = str_replace(' ', '_', $coinCategory);
$coinLink = str_replace(' ', '_', $coinType);
$coinPic1 = '<img src="../img/'.$coinVersion.'.jpg" width="250" height="250" />';

}
//Delete coin
if (isset($_POST["deleteCoinFormBtn"])) { 
$wantlistID = mysql_real_escape_string($_POST["wantlistID"]);
mysql_query("DELETE FROM wantlist WHERE wantlistID = '$wantlistID'") or die(mysql_error()); 
header("location: viewCoin.php?coinID=$coinID");
}

function first_two_words($val) {
	$val2 = substr($val, strpos($val, ' ')+1);
	$val = substr($val, 0, strlen($val)-strlen($val2)+strpos($val2, ' '));
	return $val;
}

$coinName = first_two_words($coinName) ." ". $coinType." ".$coinGrade." ".$proService;

//$coinName = '1970 S Small Date PCGS MS66';

function getEbayItemPrice($val){
if($val){                                                
   $val = number_format($val,2,".",",");
}
else{
   $val = "0.00";
} 
return $val;
}

if (isset($_POST['query'])) {
	$query = strip_tags($_POST['query']); 
} else {
	$query = $coinName;
}

// API request variables
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
$version = '1.0.0';  // API version supported by your application
$appid = 'AndreBoa-6476-4b24-b648-88cc5db92712';  // Replace with your own AppID
$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
  // You may want to supply your own query
$safequery = urlencode($query);  // Make the query URL-friendly
$i = '0';  // Initialize the item filter index to 0
// Create a PHP array of the item filters you want to use in your request
$filterarray =
  array(
    array(
    'name' => 'MaxPrice',
    'value' => '1000',
    'paramName' => 'Currency',
    'paramValue' => 'USD'),
    array(
    'name' => 'FreeShippingOnly',
    'value' => 'true',
    'paramName' => '',
    'paramValue' => ''),
    array(
    'name' => 'ListingType',
    'value' => array('AuctionWithBIN','FixedPrice'/*,'StoreInventory'*/),
    'paramName' => '',
    'paramValue' => ''),
  );

// Generates an indexed URL snippet from the array of item filters
function buildURLArray ($filterarray) {
  global $urlfilter;
  global $i;
  // Iterate through each filter in the array
  foreach($filterarray as $itemfilter) {
    // Iterate through each key in the filter
    foreach ($itemfilter as $key =>$value) {
      if(is_array($value)) {
        foreach($value as $j => $content) { // Index the key for each value
          $urlfilter .= "&itemFilter($i).$key($j)=$content";
        }
      }
      else {
        if($value != "") {
          $urlfilter .= "&itemFilter($i).$key=$value";
        }
      }
    }
    $i++;
  }
  return "$urlfilter";
} // End of buildURLArray function

// Build the indexed item filter URL snippet
buildURLArray($filterarray);

// Construct the findItemsByKeywords HTTP GET call
$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsByKeywords";
$apicall .= "&SERVICE-VERSION=$version";
$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&GLOBAL-ID=$globalid";
$apicall .= "&keywords=$safequery";
$apicall .= "&paginationInput.entriesPerPage=100";
$apicall .= "$urlfilter";
//Load the call and capture the document returned by eBay API
$resp = simplexml_load_file($apicall);

// Check to see if the request was successful, else print an error
if ($resp->ack == "Success") {
  $results = '';
  // If the response was loaded, parse it and build links
  foreach($resp->searchResult->item as $item) {
    $pic   = $item->galleryURL;
    $link  = $item->viewItemURL;
    $title = $item->title;
	$price = $item->sellingStatus->currentPrice; 

    // For each SearchResultItem node, build a link and append it to $results
    $results .= "<tr><td><img class=\"listingPic\" src=\"$pic\"></td><td><a href=\"$link\" target='_blank'>$title</td><td>$". $price."</a></td></tr>";
  }
}
// If the response does not indicate 'Success,' print an error
else {
  $results  = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
  $results .= "AppID for the Production environment.</h3>";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinName ?></title>
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
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">

<h1><a href="viewCoin.php?coinID=<?php echo $coinID ?>"><?php echo $coinName; ?></a></h1>

<table width="918" id="viewTbl">
  <tr>
    <td width="263" rowspan="9" valign="top"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><?php echo $coinPic1;$coinPic1 ?></a></td>
    <td class="tdHeight"><strong>Category:</strong></td>
    <td class="tdHeight"><a href="<?php echo $categoryLink ?>.php"><?php echo $coinCategory ?></a></td>
    </tr>
  <tr>
    <td width="155" class="tdHeight"><span class="darker">Type: </span></td>
<td width="478" class="tdHeight"><a href="viewListReport.php?coinType=<?php echo $coinLink ?>"><?php echo $coinType ?></a></td>
</tr>
  <tr>
    <td class="tdHeight"><strong>Grade Wanted:</strong></td>
    <td class="tdHeight"><?php echo $coinGrade ?></td>
    </tr>
  <tr>
    <td class="tdHeight"><strong>Grading Service:</strong></td>
    <td class="tdHeight"><?php echo $proService ?></td>
    </tr>
<tr>
<td class="tdHeight"><span class="darker">List Date: </span></td>
<td class="tdHeight"><?php echo date("F j, Y",strtotime($WantList->getEnterDate())); ?></td>
</tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><br />
<form action="" method="post" name="deleteCoinForm" id="deleteCoinForm" class="compactForm">
<input name="coinID" type="hidden" value="<?php echo $coinID ?>" />
<input name="wantlistID" type="hidden" value="<?php echo $wantlistID ?>" />
<input name="deleteCoinFormBtn" type="submit" value="Delete Coin From Want List" onclick="return confirm('Remove From List?')" />
</form></td>
    </tr>
</table>
<hr />
<h3>Wanted Coin Details</h3>
<div><?php echo $WantList->getCoinNote(); ?></div>
<p>
<h2><img src="../siteImg/ebayIcon2.jpg" width="100" height="100" align="absmiddle" />  Search Results for <?php echo $query; ?></h2>
<div id="termsHolder">
<table width="100%">
<tr>  
<td><strong>Pic</strong></td>
<td><strong>Coin</strong></td>
<td><strong>Price</strong></td>
</tr>
<?php echo $results;?>
</table>
</div>

<p>&nbsp;</p>

<a href="addCoinByID.php?coinID=<?php echo $coinID ?>">Add This coin to collection</a> | <a href="addCoinType.php?coinType=<?php echo $coinLink ?>">Add <?php echo $coinType ?></a></p>

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>