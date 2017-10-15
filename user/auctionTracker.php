<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add A Coin</title>

<style type="text/css">
#auctionList {max-height:450px; overflow:auto;}

</style>
<script type="text/javascript" src="../scripts/jquery.tablesorter.js"></script>
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
<h1>Auction Tracker</h1>
<h2>My Ending Auctions</h2>

<div id="ebayList" class="roundedWhite">

<?php

//require_once('../api/ebay/seller/DisplayUtils.php');  // functions to aid with display of information

//error_reporting(E_ALL);  // turn on all errors, warnings and notices for easier debugging
$sellerID='';
$pageResults='20';

  $s_endpoint = 'http://open.api.ebay.com/shopping';  // Shopping
  $f_endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // Finding
  $responseEncoding = 'XML';   // Format of the response
  $s_version = '667';   // Shopping API version number
  $f_version = '1.4.0';   // Finding API version number
  $appID   = 'AndreBoa-6476-4b24-b648-88cc5db92712'; //replace this with your AppID

  $debug   = true;
  $debug = 0;

  $sellerID  = "greatsoutherncoin";   // cleanse input
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

  $maxEntries = 20;

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
    $results .= '<table id="example" width="850" class="tablesorter" border="0" cellpadding="3" cellspacing="1">' . "";
    $results .= "<thead><tr><th /><th>Title</th><th>Price &nbsp; &nbsp; </th><th>Shipping &nbsp; &nbsp; </th><th>Total &nbsp; &nbsp; </th><th><!--Currency--></th><th>Time Left</th><th>End Time</th></tr></thead>";

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
<div id="auctionList">
<?php
  print $pageResults;
  $allItemsURL = "http://search.ebay.com/_W0QQsassZ" . $sellerID;
  print "<p><a href=\"$allItemsURL\">See all items from this seller</a></p>";
?>
</div>
</div>

<h2>Aution Profit/Loss </h2>

<?php
$buy = number_format("2.51",2);
$sellPrice= number_format("1.50",2);

$buy2 = number_format("3.08",2);
$sellPrice2= number_format("2.00",2);

function getPriceResult($buy, $sellPrice){
	$output = $sellPrice - $buy ;
	if ($output <= 0) {
		number_format("1000000",2);
  $output = '<span class="errorTxt">'.number_format($output,2).'</span>'; 
  }
else 
{
  $output = '<span class="greenTxt">'.number_format($output,2).'</span>'; 
}
return $output;
}

?>

<div class="roundedWhite" id="byListDiv">
<table width="986" border="0">
  <tr class="darker">
    <td width="536">Auction</td>
    <td width="87">Buy Date</td>
    <td width="88">Sell Date</td>
    <td width="85">Buy Price</td>
        <td width="78">Sell Price</td>
    <td width="86">Profit/Loss</td>
  </tr>
    <tr>
    <td>1972 S Choice Proof Lincoln Memorial Penny Cent US Coin</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="buy" type="text" id="buy2" size="9" value="<?php echo $buy ?>" /></td>
        <td><input name="buy" type="text" id="buy2" size="9" value="<?php echo $sellPrice ?>" /></td>
    <td><input name="buy" type="text" id="buy2" size="9" value="<?php echo getPriceResult($buy, $sellPrice) ?>" /></td>
  </tr>
      <tr>
    <td>1971 S Choice Proof Lincoln Memorial Penny Cent US Coin</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="buy" type="text" id="buy2" size="9" value="<?php echo $buy2 ?>" class="buyTxt" /></td>
        <td><input name="buy" type="text" id="buy2" size="9" value="<?php echo $sellPrice2 ?>" class="sellTxt" /></td>
    <td><?php echo getPriceResult($buy2, $sellPrice2) ?></td>
  </tr>
    <tr>
    <td><strong>Totals</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="buyTotals" type="text" id="buyTotals" size="9" readonly="readonly" class="readOnlyTxt" /></td>
        <td><input name="sellTotals" type="text" id="sellTotals" size="9" readonly="readonly" class="readOnlyTxt" /></td>
    <td><input name="profitTotals" type="text" id="profitTotals" size="9" readonly="readonly" class="readOnlyTxt" /></td>
  </tr>
</table>


</div>
<p><a name="forms"></a></p>
<h2>Aution Designer</h2>
<div class="roundedWhite" id="halfCentHeadDiv">

  <form id="halfCentForm" method="post" action="" name="halfCentForm">
<table width="979" border="0" class="priceListTbl">

  <tr>
    <td width="210" class="darker">Year &amp; Mint</td>
    <td width="759"><select id="halfCentCoinName" name="coinID">

    </select>
    
    </td>
  </tr>
  <tr>
    <td class="darker">Auction</td>
    <td><input name="purchaseFrom3" type="text" id="purchaseFrom3" size="100" /></td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Date</span></td>
    <td><input type="text" name="purchaseDate3" id="purchaseDate3" class="purchaseDate" /></td>
  </tr>
  <tr>
    <td><span class="darker">Seller</span></td>
    <td><span class="darker">
      <input type="text" name="purchaseFrom3" id="purchaseFrom3" />
    </span></td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td><input name="purchasePrice" type="text" id="purchasePrice" value="0.00" class="purchasePrice" />
    </td>
  </tr>
  <tr>
    <td><span class="darker">Notes</span></td>
    <td><textarea name="additional" id="additional" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td valign="bottom"><input name="coinCategory" type="hidden" value="Half Cent" />      <input type="submit" name="halfCentFormBtn" id="halfCentFormBtn" value="Add Half Cent" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>
<p>Prnt.</p>
</div>

</body>
</html>
