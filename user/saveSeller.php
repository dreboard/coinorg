<?php 
include "../inc/config.php";
include_once "../inc/pageElements/logSession.php";
/*if (isset($_SESSION['accountID'])) {
	  $userID = intval($_SESSION['accountID']);
} else {
header('Location: ../login.php');
}*/
$userID = 1;



//SAVE SELLER
if (isset($_POST['saveSellerBtn'])) {
$ebaysellerName = mysql_real_escape_string($_POST['ebaysellerName']);
//$userID = mysql_real_escape_string($_POST['accountID']);
if($_POST["ebaySellerNotes"] == ''){
$ebaySellerNotes = 'None';
} else {
$ebaySellerNotes = mysql_real_escape_string($_POST["ebaySellerNotes"]);
}

mysql_query("INSERT INTO ebayseller(ebaysellerName, ebaySellerNotes, accountID, dateAdded) VALUES('$ebaysellerName', '$ebaySellerNotes', '$userID', '$theDate')") or die(mysql_error());
	  
}
 
//DISPLAY SELLER
$sellerID='';
$pageResults='';
if(isset($_POST['SellerID']))
{
  $s_endpoint = 'http://open.api.ebay.com/shopping';  // Shopping
  $f_endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // Finding
  $responseEncoding = 'XML';   // Format of the response
  $s_version = '667';   // Shopping API version number
  $f_version = '1.4.0';   // Finding API version number
  $appID   = 'AndreBoa-6476-4b24-b648-88cc5db92712'; //replace this with your AppID

  $debug   = true;
  $debug = (boolean) $_POST['Debug'];

  $sellerID  = urlencode (utf8_encode($_POST['SellerID']));   // cleanse input
  $globalID    = urlencode (utf8_encode($_POST['GlobalID']));

  $sitearray = array(
    'EBAY-US' => '0',
    'EBAY-ENCA' => '2',
    'EBAY-GB' => '3',
    'EBAY-AU' => '15',
    'EBAY-DE' => '77',
  );


  $siteID = $sitearray[$globalID];

  $pageResults = '';
  $pageResults .= getUserProfileResultsAsHTML($sellerID);
  $pageResults .= getFindItemsAdvancedResultsAsHTML($sellerID);

} // if


function getUserProfileResultsAsHTML($sellerID) {
  global $siteID, $s_endpoint, $responseEncoding, $s_version, $appID, $debug;
  $results = '';

  $apicall = "$s_endpoint?callname=GetUserProfile"
       . "&version=$s_version"
       . "&siteid=$siteID"
       . "&appid=$appID"
       . "&UserID=$sellerID"
       . "&IncludeSelector=Details,FeedbackHistory"   // need Details to get MyWorld info
       . "&responseencoding=$responseEncoding";

  if ($debug) { print "<br />GetUserProfile call = <blockquote>$apicall </blockquote>"; }

  // Load the call and capture the document returned by the Shopping API
  $resp = simplexml_load_file($apicall);

  if ($resp) {
    if (!empty($resp->User->MyWorldLargeImage)) {
      $myWorldImgURL = $resp->User->MyWorldLargeImage;
    } else {
      $myWorldImgURL = 'http://pics.ebaystatic.com/aw/pics/community/myWorld/imgBuddyBig1.gif';
    }
    $results .= "<table><tr>";
    $results .= "<td><a href=\"" . $resp->User->MyWorldURL . "\"><img src=\""
          . $myWorldImgURL . "\"></a></td>";
    $results .= "<td>Seller : $sellerID <br /> ";
    $results .= "Feedback score : " . $resp->User->FeedbackScore . "<br />";
    $posCount = $resp->FeedbackHistory->UniquePositiveFeedbackCount;
    $negCount = $resp->FeedbackHistory->UniqueNegativeFeedbackCount;
    $posFeedBackPct = sprintf("%01.1f", (100 * ($posCount / ($posCount + $negCount))));
    $results .= "Positive feedback : $posFeedBackPct%<br />";
    $regDate = substr($resp->User->RegistrationDate, 0, 10);
    $results .= "Registration date : $regDate<br />";

    $results .= "</tr></table>";

  } else {
    $results = "<h3>No user profile for seller $sellerID";
  }
  return $results;
} // function



function getFindItemsAdvancedResultsAsHTML($sellerID) {
  global $globalID, $f_endpoint, $responseEncoding, $f_version, $appID, $debug;

  $maxEntries = 32;

  $itemType  = urlencode (utf8_encode($_POST['ItemType']));
  $itemSort  = urlencode (utf8_encode($_POST['ItemSort']));

  $results = '';   // local to this function
  // Construct the FindItems call
  $apicall = "$f_endpoint?OPERATION-NAME=findItemsAdvanced"
       . "&version=$f_version"
       . "&GLOBAL-ID=$globalID"
       . "&SECURITY-APPNAME=$appID"   // replace this with your AppID
       . "&RESPONSE-DATA-FORMAT=$responseEncoding"
       . "&itemFilter(0).name=Seller"
       . "&itemFilter(0).value=$sellerID"
       . "&itemFilter(1).name=ListingType"
       . "&itemFilter(1).value=$itemType"
       . "&paginationInput.entriesPerPage=$maxEntries"
       . "&sortOrder=$itemSort"
       . "&affliate.networkId=9"        // fill in your information in next 3 lines
       . "&affliate.trackingId=123456789"
       . "&affliate.customId=456";

  if ($debug) { print "<br />findItemsAdvanced call = <blockquote>$apicall </blockquote>"; }

  // Load the call and capture the document returned by the Finding API
  $resp = simplexml_load_file($apicall);

  // Check to see if the response was loaded, else print an error
if ($resp->ack == "Success") {
    $results .= 'Total items : ' . $resp->paginationOutput->totalEntries . "<br />";
    $results .= '<table id="example" width="100%" class="tablesorter" border="0" cellpadding="3" cellspacing="1">' . "";
    $results .= "<thead><tr class=\"darker\" valign=\"top\"><td /><td>Title</td><td>Price &nbsp; &nbsp;</td><td>Time Left</td></tr></thead>";

    // If the response was loaded, parse it and build links
    foreach($resp->searchResult->item as $item) {
      if ($item->galleryURL) {
        $picURL = $item->galleryURL;
      } else {
        $picURL = "http://pics.ebaystatic.com/aw/pics/express/icons/iconPlaceholder_96x96.gif";
      }
      $link  = $item->viewItemURL;
      $title = $item->title;

      $price = sprintf("%01.2f", $item->sellingStatus->convertedCurrentPrice);
      $ship  = sprintf("%01.2f", $item->shippingInfo->shippingServiceCost);
      $total = sprintf("%01.2f", ((float)$item->sellingStatus->convertedCurrentPrice
                    + (float)$item->shippingInfo->shippingServiceCost));

        // Determine currency to display - so far only seen cases where priceCurr = shipCurr, but may be others
        $priceCurr = (string) $item->sellingStatus->convertedCurrentPrice['currencyId'];
        $shipCurr  = (string) $item->shippingInfo->shippingServiceCost['currencyId'];
        if ($priceCurr == $shipCurr) {
          $curr = $priceCurr;
        } else {
          $curr = "$priceCurr / $shipCurr";  // potential case where price/ship currencies differ
        }

        $timeLeft = getPrettyTimeFromEbayTime($item->sellingStatus->timeLeft);
        $endTime = strtotime($item->listingInfo->endTime);   // returns Epoch seconds
        $endTime = $item->listingInfo->endTime;

      $results .= "<tr><td><a href=\"$link\"><img src=\"$picURL\"></a></td><td><a href=\"$link\">$title</a></td>"
           .  "<td>$price</td><td>$timeLeft</td></tr>";
    }
    $results .= "</table>";
  }
  // If there was no search response, print an error
  else {
    $results = "<h3>No items found matching the $itemType type.";
  }  // if resp

  return $results;

}  // function


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Saved Sellers</title>
<?php include("../secureScripts.php"); ?>
<script type="text/javascript" src="../scripts/jquery.tablesorter.js"></script>
<script>
  $(document).ready(function() {
    $("table").tablesorter({
      sortList:[[2,0],[2,0]],    // upon screen load, sort by col 7, 4 ascending (0)
      debug: false,        // if true, useful to debug Tablesorter issues
      headers: {
        0: { sorter: false },  // col 0 = first = left most column - no sorting
        1: { sorter: false },
        2: { sorter: false },
        3: { sorter: 'text'}   // specify text sorter, otherwise mistakenly takes shortDate parser
      }
    });
  });
</script>
<style type="text/css">
#priceListForm input[type=text]{width:80px;}

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<h1>Save A Favorite Seller</h1>
<form id="saveSellerForm" name="saveSellerForm" method="post" action="">
<table width="541" border="0">
  <tr>
    <td width="228">&nbsp;</td>
    <td width="303">&nbsp;</td>
  </tr>
  <tr>
    <td>Seller User Name:</td>
    <td><label>
      <input type="text" name="ebaysellerName" id="ebaysellerName" />
    </label></td>
  </tr>
  <tr>
    <td valign="top">Product Type:</td>
    <td><label>
      <textarea name="ebaySellerNotes" id="ebaySellerNotes" cols="45" rows="5"></textarea>
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="saveSellerBtn" id="button" value="Submit" />
    </label></td>
  </tr>
</table>
</form>
<h3>My Saved Sellers</h3>
<table width="100%" border="0">
  <tr>
    <td>Seller ID</td>
    <td>Date Added</td>
  </tr>
  <?php 
  $pennyQuery = mysql_query("SELECT * FROM ebayseller WHERE accountID = '$userID'") or die(mysql_error());
while($row = mysql_fetch_array($pennyQuery))
  {
  $ebaysellerName = $row['ebaysellerName'];
  $dateAdded = $row['dateAdded'];
  }
  
  
  echo '<option value="'.$ebaysellerName.'">'.$ebaysellerName.'</option>';
  
  
  ?>
  
  
</table>

<p>&nbsp;</p>
<form action="" method="post">
<table width="800" border="0" cellpadding="2">
  <tr>
    <th width="144">SellerID</th>
    <th width="271">Site</th>
    <th width="166">ItemType</th>
    <th width="378">ItemSort</th>
    <th width="65">Debug</th>
  </tr>
  <tr>
    <td><select name="SellerID">
    <?php 
  $pennyQuery = mysql_query("SELECT * FROM ebayseller WHERE accountID = '$userID'") or die(mysql_error());
while($row = mysql_fetch_array($pennyQuery))
  {
  $ebaysellerName = $row['ebaysellerName'];
  $dateAdded = $row['dateAdded'];
  echo '<option value="'.$ebaysellerName.'">'.$ebaysellerName.'</option>';
  }
  
  ?>
    </select>
    </td>
    <td>
      <select name="GlobalID">
        <option value="EBAY-AU">Australia - EBAY-AU (15) - AUD</option>
        <option value="EBAY-ENCA">Canada (English) - EBAY-ENCA (2) - CAD</option>
        <option value="EBAY-DE">Germany - EBAY-DE (77) - EUR</option>
        <option value="EBAY-GB">United Kingdom - EBAY-GB (3) - GBP</option>
        <option selected value="EBAY-US">United States - EBAY-US (0) - USD</option>
      </select>
    </td>
    <td>
      <select name="ItemType">
        <option selected value="All">All Item Types</option>
        <option value="Auction">Auction Items Only</option>
        <option value="FixedPriced">Fixed Priced Item Only</option>
        <option value="StoreInventory">Store Inventory Only</option>
      </select>
    </td>
    <td>
      <select name="ItemSort">
        <option value="BidCountFewest">Bid Count (fewest bids first) [Applies to Auction Items Only]</option>
        <option selected value="EndTimeSoonest">End Time (soonest first)</option>
        <option value="PricePlusShippingLowest">Price + Shipping (lowest first)</option>
        <option value="CurrentPriceHighest">Current Price Highest</option>
      </select>
    </td>
    <td>
    <select name="Debug">
      <option value="1">true</option>
      <option selected value="0">false</option>
      </select>
    </td>

  </tr>
  <tr>
    <td colspan="4" align="center"><INPUT type="submit" name="submit" value="Search"></td>
  </tr>
</table>
</form>

<?php
  print $pageResults;
  $allItemsURL = "http://search.ebay.com/_W0QQsassZ" . $sellerID;
  print "<p><a href=\"$allItemsURL\">See all items from this seller</a></p>";
?>

<p>&nbsp; </p>
<p>&nbsp;</p>
</div>
</body>
</html>