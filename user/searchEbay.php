<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";

function first_two_words($val) {
	$val2 = substr($val, strpos($val, ' ')+1);
	$val = substr($val, 0, strlen($val)-strlen($val2)+strpos($val2, ' '));
	return $val;
}

$coin = "1961 Proof";
$cointype = "Lincoln Memorial";

$coinName = first_two_words($coin) ." ". $cointype;

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
<title>My Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>eBay Search Results for <?php echo $query; ?></h1>
<form method="post" action="">
<input name="query" type="text" /><input name="findBtn" type="submit" value="Find" />
</form>
<table width="800">
<tr>
  <td>
    <?php //echo $results;?>
  </td>
</tr>
</table>

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
<br />
<p class="clear"><a href="#top">Top</a></p>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>