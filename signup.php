<?php 
include 'inc/configSite.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Coin collection, coin folders, Union Shield, Lincoln Bicentennial, Lincoln Memorial, Lincoln Wheat, Indian Head, Flying Eagle, Nickels, Shield Nickel, Liberty Head, Buffalo Nickel, Jefferson Nickel, Westward Journey Series, Dimes, gold coin Investment, Half Dime, Liberty Head, Liberty Seated, Mercury Dime, Roosevelt Dime, Quarters, Liberty Seated Quarter, Barber Quarter, Standing Liberty, Washington Quarter, Statehood, D.C. and U. S. Territories, America the Beautiful, Half-Dollars, Liberty Half, Barber Half, Walking Liberty, Franklin Half, Kennedy Half, Dollars, Seated Liberty, Trade Dollar, Morgan dollar, Peace dollar, Eisenhower dollar, Susan B. Anthony, Sacagawea, Native American Series, Presidential Dollar" />
<?php include("secureScripts.php"); ?>
<script type="text/javascript" src="scripts/jquery.cluetip.js"></script>
<link rel="stylesheet" type="text/css" href="scripts/jquery.cluetip.css">

<title>My Coin Organizer</title>
<script type="text/javascript">
$(document).ready(function(){	

$("#clubBtn").click(function() {
     window.open("registerClub.php","_self");
});

$("#basicBtn").click(function() {
    window.open("registerBasic.php","_self");
});




});
</script>  


<style type="text/css">

#softwareTbl td{padding-left:30px;}
#softwareTbl a{color:#333; text-decoration:none;}
#softwareTbl h3,#softwareTbl h2, #softwareTbl ul{margin:0px;}


</style>
<link rel="stylesheet" type="text/css" href="style.css"/>
<?php include ("inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("inc/pageElements/header.php"); ?>
<div id="content" class="clear">
  <tr>
    <th colspan="3"><h1>Select An Account Type</h1></th>
    </tr>
<table width="100%" border="0" class="typeTbl" id="softwareTbl">

<tr align="center" class="darker">
    <td width="251" scope="col"><h2>Coin Club</h2></td>
    <td width="269" scope="col"><h2>Collector</h2></td>
  </tr>
  <tr>
    <th align="center"><a href="registerClub.php"><img src="siteImg/club.jpg" alt="" width="166" height="190"></a></th>
    <th width="50%" align="center"><a href="registerBasic.php"><img src="siteImg/collector.jpg" width="166" height="190"></a></th>
  </tr>
 <tr class="darker">
    <td align="center" scope="col"><h3>Silver Account Features</h3></td>
    <td align="center" scope="col"><h3>Basic Account Features</h3></td>
  </tr>
    <tr>
      <td align="center" scope="col"><input type="button" name="button2" id="clubBtn" value="Create Club Account"></td>
      <td align="center" scope="col"><input type="button" name="button3" id="basicBtn" value="Create Basic Account"></td>
    </tr>
    <tr>
      <td scope="col">&nbsp;</td>
      <td scope="col">&nbsp;</td>
    </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<?php include("inc/pageElements/footer.php"); ?>
</body>
</html>