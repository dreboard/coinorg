<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>





<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>GetUserProfile</title>
<?php include("../secureScripts.php"); ?>
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

<link rel="stylesheet" href="../api/ebay/seller/css/flora.all.css" type="text/css" media="screen" title="Flora (Default)">

<form action="../api/ebay/seller/GetUserProfileFIA.php" method="post">
<table width="800" border="0" cellpadding="2">
  <tr>
    <th width="144">SellerID</th>
    <th width="271">Site</th>
    <th width="166">ItemType</th>
    <th width="378">ItemSort</th>
    <th width="65">Debug</th>
  </tr>
  <tr>
    <td><input type="text" name="SellerID" value=""></td>
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

</body>
</html>
