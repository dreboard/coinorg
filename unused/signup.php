<?php 
include '../inc/configSite.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Coin collection, coin folders, Union Shield, Lincoln Bicentennial, Lincoln Memorial, Lincoln Wheat, Indian Head, Flying Eagle, Nickels, Shield Nickel, Liberty Head, Buffalo Nickel, Jefferson Nickel, Westward Journey Series, Dimes, gold coin Investment, Half Dime, Liberty Head, Liberty Seated, Mercury Dime, Roosevelt Dime, Quarters, Liberty Seated Quarter, Barber Quarter, Standing Liberty, Washington Quarter, Statehood, D.C. and U. S. Territories, America the Beautiful, Half-Dollars, Liberty Half, Barber Half, Walking Liberty, Franklin Half, Kennedy Half, Dollars, Seated Liberty, Trade Dollar, Morgan dollar, Peace dollar, Eisenhower dollar, Susan B. Anthony, Sacagawea, Native American Series, Presidential Dollar" />
<?php include("../secureScripts.php"); ?>
<script type="text/javascript" src="../scripts/jquery.cluetip.js"></script>
<link rel="stylesheet" type="text/css" href="../scripts/jquery.cluetip.css">

<title>My Coin Organizer</title>
<script type="text/javascript">
$(document).ready(function(){	

$("#goldBtn").click(function() {
     window.open("register.php?type=gold","_self");
});

$("#silverBtn").click(function() {
     window.open("register.php?type=silver","_self");
});

$("#basicBtn").click(function() {
    window.open("register.php?type=basic","_self");
});




});
</script>  


<style type="text/css">

#softwareTbl td{padding-left:30px;}
#softwareTbl a{color:#333; text-decoration:none;}
#softwareTbl h3,#softwareTbl h2, #softwareTbl ul{margin:0px;}


</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/header.php"); ?>
<div id="content" class="clear">

<table width="100%" border="0" class="typeTbl" id="softwareTbl">
  <tr>
    <th colspan="3"><h1>Select An Account Type</h1></th>
    </tr>
<tr align="center" class="darker">
    <td width="251" scope="col"><h2>Coin Dealer</h2></td>
    <td width="251" scope="col"><h2>Coin Club</h2></td>
    <td width="269" scope="col"><h2>Collector</h2></td>
  </tr>
  <tr>
    <th><a href="../registerDealer.php"><img src="../siteImg/dealer.jpg" alt="" width="166" height="190"></a></th>
    <th><a href="../registerClub.php"><img src="../siteImg/club.jpg" alt="" width="166" height="190"></a></th>
    <th><a href="../registerBasic.php"><img src="../siteImg/collector.jpg" width="166" height="190"></a></th>
  </tr>
 <tr class="darker">
    <td scope="col"><h3>Gold Account Features</h3></td>
    <td scope="col"><h3>Silver Account Features</h3></td>
    <td scope="col"><h3>Basic Account Features</h3></td>
  </tr> 
  <tr>
    <td scope="col"><a href="../features/collection.php" rel="appointmentMini.php">Collection / Inventory Tracker</a></td>
    <td scope="col"><a href="../features/collection.php" rel="appointmentMini.php">Collection Tracker</a></td>
    <td scope="col"><a href="../features/collection.php" rel="appointmentMini.php">Collection Tracker</a></td>
  </tr>
    <tr>
    <td scope="col"><a href="../features/grade.php" rel="appointmentMini.php">Grading Guide</a></td>
    <td scope="col"><a href="../features/grade.php" rel="appointmentMini.php">Grading Guide</a></td>
    <td scope="col"><a href="../features/grade.php" rel="appointmentMini.php">Grading Guide</a></td>
  </tr>
    <tr>
      <td scope="col"><a href="../features/price.php" rel="appointmentMini.php">Price Guide</a></td>
      <td scope="col"><a href="../features/price.php" rel="appointmentMini.php">Price Guide</a></td>
      <td scope="col"><a href="../features/price.php" rel="appointmentMini.php">Price Guide</a></td>
    </tr>
    <tr>
    <td scope="col"><a href="../features/links.php" rel="appointmentMini.php">Live E-Bay&#169; Links</a></td>
    <td scope="col"><a href="../features/links.php" rel="appointmentMini.php">Live E-Bay&#169; Links</a></td>
    <td scope="col"><a href="../features/links.php" rel="appointmentMini.php">Live E-Bay&#169; Links</a></td>
  </tr>
      <tr>
    <td scope="col"><a href="../features/club.php">Coin Club Generator</a></td>
    <td scope="col"><a href="../features/club.php">Coin Club Generator</a></td>
    <td scope="col"><a href="../features/revenue.php">E-Bay&#169;</a> <a href="../features/design.php">Auction Designer</a></td>
  </tr>
      <tr>
    <td scope="col"><a href="../features/revenue.php">E-Bay&#169;</a> <a href="../features/design.php">Auction Designer</a></td>
    <td scope="col"><a href="../features/revenue.php">E-Bay&#169;</a> <a href="../features/design.php">Auction Designer</a></td>
    <td scope="col">&nbsp;</td>
  </tr>
      
      <tr>
        <td scope="col"><a href="../features/revenue.php">E-Bay&#169; Affiliate Commission Revenue</a>*</td>
        <td scope="col">E-Bay&#169; Image Hosting</td>
        <td scope="col">&nbsp;</td>
      </tr>
      <tr>
    <td scope="col">Integrated Coin Organizer Software*</td>
    <td scope="col">5% Discount on Coin Supplies</td>
    <td scope="col">&nbsp;</td>
  </tr>
      <tr>
        <td scope="col"><ul>
          <li><a href="../features/ecommerce.php">E-Commerce Site</a>*</li>
          <li>Newsletters</li>
          <li>Blog</li>
          <li>Free Ad links on mycoinorganizer</li>
        </ul></td>
        <td align="left" valign="top" scope="col"><ul>
          <li>Free Ad links on mycoinorganizer</li>
        </ul></td>
        <td scope="col">&nbsp;</td>
    </tr>
    <tr>
      <td scope="col">See All Details</td>
      <td scope="col">See All Details</td>
      <td scope="col">See All Details</td>
    </tr>
    <tr>
    <td scope="col"><input type="button" name="button" id="goldBtn" value="Create Gold Account"></td>
    <td scope="col"><input type="button" name="button2" id="silverBtn" value="Create Silver Account"></td>
    <td scope="col"><input type="button" name="button3" id="basicBtn" value="Create Basic Account"></td>
  </tr>
    <tr>
      <td scope="col">* Web site required<br>
        * Additional hosting fees may be required   <br></td>
      <td scope="col">&nbsp;</td>
      <td scope="col">&nbsp;</td>
    </tr>
</table>
<p>&nbsp;</p>
<p><img src="../img/faq.jpg" alt="Frequently asked questions" width="128" height="128" align="left"></p>
<p>&nbsp;</p>
<p><a href="../contact.html">Contact Us</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>