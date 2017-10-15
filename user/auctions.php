<?php 
include '../inc/config.php';

//getPrettyTimeFromEbayTime
//require_once('../api/ebay/seller/DisplayUtils.php');  // functions to aid with display of information
//greatsoutherncoin
//mycoinorganizer
//error_reporting(E_ALL);  // turn on all errors, warnings and notices for easier debugging
$sellerID='greatsoutherncoin';
$pageResults='50';

  $s_endpoint = 'http://open.api.ebay.com/shopping';  // Shopping
  $f_endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // Finding
  $responseEncoding = 'XML';   // Format of the response
  $s_version = '667';   // Shopping API version number
  $f_version = '1.4.0';   // Finding API version number
  $appID   = 'AndreBoa-6476-4b24-b648-88cc5db92712'; //replace this with your AppID
  $debug   = false;
  $debug = (boolean) $debug;
  $globalID    = "EBAY-US";

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
    $results .= "<table><tr valign='top'>";
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

  $maxEntries = 50;

  $itemType  = "All";
  $itemSort  = "EndTimeSoonest";

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
    $results .= "<thead><tr valign='top'><th /><th>Title</th><th>Price &nbsp; &nbsp; </th><th>Shipping &nbsp; &nbsp; </th><th>Total &nbsp; &nbsp; </th><th><!--Currency--></th><th>Time Left</th><th>End Time</th></tr></thead>";

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
           .  "<td>$price</td><td>$ship</td><td>$total</td><td>$curr</td><td>$timeLeft</td><td><nobr>$endTime</nobr></td></tr>";
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Page</title>
<?php include("../secureScripts.php"); ?>
<link rel="stylesheet" href="../api/ebay/seller/css/flora.all.css" type="text/css" media="screen" title="Flora (Default)">
<script type="text/javascript" src="../scripts/jquery.tablesorter.js"></script>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<script>
  $(document).ready(function() {
    $("table").tablesorter({
      sortList:[[7,0],[4,0]],    // upon screen load, sort by col 7, 4 ascending (0)
      debug: false,        // if true, useful to debug Tablesorter issues
      headers: {
        0: { sorter: false },  // col 0 = first = left most column - no sorting
        5: { sorter: false },
        6: { sorter: false },
        7: { sorter: 'text'}   // specify text sorter, otherwise mistakenly takes shortDate parser
      }
    });
  });
</script>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php
  print $pageResults;
  $allItemsURL = "http://search.ebay.com/_W0QQsassZ" . $sellerID;
  print "<p><a href=\"$allItemsURL\">See all items from this seller</a></p>";
?>
<p>&nbsp;</p>
</div>
</body>
</html>
