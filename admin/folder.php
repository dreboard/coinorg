<?php 
include '../inc/config.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Penny collection" />
<?php include("../secureScripts.php"); ?>
<title>Login to your account</title>
<script type="text/javascript">
$(document).ready(function(){	

});
</script>  


<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">
<h1>Add Folder</h1>
<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
<table width="979" border="0" class="priceListTbl">

  <tr>
    <td width="172" class="darker">Folder Name</td>
    <td colspan="4"><select name="folderName" id="folderName">
<optgroup label="Whitman">
<option value="None" selected="selected">None</option>
<option value="Indian Cents 1857-1909">Indian Cents 1857-1909</option>
<option value="Lincoln Cents 1909-1940">Lincoln Cents 1909-1940</option>
<option value="Lincoln Cents 1941-1974">Lincoln Cents 1941-1974</option>
<option value="Lincoln Cents Starting 1975">Lincoln Cents Starting 1975</option>
<option value="Liberty Nickels 1883-1912">Liberty Nickels 1883-1912</option>
<option value="Buffalo Nickels 1913-1938">Buffalo Nickels 1913-1938</option>
<option value="Jefferson Nickels 1938-1961">Jefferson Nickels 1938-1961</option>
<option value="Jefferson Nickels 1962-1995">Jefferson Nickels 1962-1995</option>
<option value="Jefferson Nickels 1996-Date">Jefferson Nickels 1996-Date</option>
<option value="Mercury Dimes 1916-1945">Mercury Dimes 1916-1945</option>
<option value="Roosevelt Dimes 1946-1964">Roosevelt Dimes 1946-1964</option>
<option value="Standing Liberty Quarters 1916-1930">Standing Liberty Quarters 1916-1930</option>
<option value="Washington Quarters 1932-1947">Washington Quarters 1932-1947</option>
<option value="Washington Quarters 1948-1964">Washington Quarters 1948-1964</option>
<option value="Washington Quarters 1965-1987">Washington Quarters 1965-1987</option>
<option value="Walking Liberty Half Dollars 1916-1936">Walking Liberty Half Dollars 1916-1936</option>
<option value="Walking Liberty Half Dollars 1937-1947">Walking Liberty Half Dollars 1937-1947</option>
<option value="Franklin Half Dollars 1948-1963">Franklin Half Dollars 1948-1963</option>
<option value="JFK Half Dollars 1964-1985">JFK Half Dollars 1964-1985</option>
<option value="JFK Half Dollars 1986-2003">JFK Half Dollars 1986-2003</option>
<option value="JFK Half Dollars Starting 2004">JFK Half Dollars Starting 2004</option>
</optgroup>

<optgroup label="Littleton">
<option value="Indian Cents 1857-1909">Indian Cents 1857-1909</option>
<option value="Lincoln Cents 1909-1940">Lincoln Cents 1909-1940</option>
<option value="Lincoln Cents 1941-1974">Lincoln Cents 1941-1974</option>
<option value="Lincoln Cents Starting 1975">Lincoln Cents Starting 1975</option>
<option value="Liberty Nickels 1883-1912">Liberty Nickels 1883-1912</option>
<option value="Buffalo Nickels 1913-1938">Buffalo Nickels 1913-1938</option>
<option value="Jefferson Nickels 1938-1961">Jefferson Nickels 1938-1961</option>
<option value="Jefferson Nickels 1962-1995">Jefferson Nickels 1962-1995</option>
<option value="Jefferson Nickels 1996-Date">Jefferson Nickels 1996-Date</option>
<option value="Mercury Dimes 1916-1945">Mercury Dimes 1916-1945</option>
<option value="Roosevelt Dimes 1946-1964">Roosevelt Dimes 1946-1964</option>
<option value="Standing Liberty Quarters 1916-1930">Standing Liberty Quarters 1916-1930</option>
<option value="Washington Quarters 1932-1947">Washington Quarters 1932-1947</option>
<option value="Washington Quarters 1948-1964">Washington Quarters 1948-1964</option>
<option value="Washington Quarters 1965-1987">Washington Quarters 1965-1987</option>
<option value="Walking Liberty Half Dollars 1916-1936">Walking Liberty Half Dollars 1916-1936</option>
<option value="Walking Liberty Half Dollars 1937-1947">Walking Liberty Half Dollars 1937-1947</option>
<option value="Franklin Half Dollars 1948-1963">Franklin Half Dollars 1948-1963</option>
<option value="JFK Half Dollars 1964-1985">JFK Half Dollars 1964-1985</option>
<option value="JFK Half Dollars 1986-2003">JFK Half Dollars 1986-2003</option>
<option value="JFK Half Dollars Starting 2004">JFK Half Dollars Starting 2004</option>
</optgroup>

<optgroup label="Whitman">
<option value="Oenter">Onter</option>
<option value="Broadstrike">Broadstrike</option>
<option value="Partiollar">Partllar</option>
<option value="Multirike">Multiple Strike</option>
<option value="Onter">enter</option>
<option value="Broadstrike">Broadstrike</option>
<option value="Partollar">Parollar</option>
<option value="Multiptrike">Multitrike</option>
</optgroup>

</select></td>
  </tr>

  <tr>
    <td class="darker">Folder Type</td>
    <td colspan="4"><label for="folderType"></label>
      <input name="folderType" type="text" id="folderType" /></td>
  </tr>
  <tr>
    <td class="darker">Grades</td>
    <td colspan="4"><select name="coinGrade">
  <option value="No Grade" selected="selected">No Grade </option>
  <option value="Good to XF ">Good to XF</option>
  <option value="Good to AU" >Good to AU</option>
  <option value="Good to BU">Good to BU</option>
  <option value="XF to AU ">XF to AU</option>
  <option value="XF to BU" >XF to BU</option>
  <option value="Good to BU">Good to BU</option>
  <option value="AU" >About Uncirculated</option>
  <option value="BU">Brilliant Uncirculated</option>
  </select></td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Date</span></td>
    <td colspan="4"><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" /></td>
  </tr>
  <tr>
    <td valign="top"><span class="darker">Obtained From</span></td>
    <td width="110"><span class="darker">
    </span>
            <label>
            <input type="radio" name="purchaseFrom" value="eBay" id="eBayRad" />
            eBay</label></td>
    <td width="163"><input type="radio" name="purchaseFrom" value="Coin Shop" id="shopRad" />
Coin Shop</td>
    <td width="132"><label>
      <input type="radio" name="purchaseFrom" value="Other" id="otherRad" />
      Other</label></td>
    <td width="380"><label>
      <input name="purchaseFrom" type="radio" id="noneRad" value="None" checked="checked" />
      None</label></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td colspan="4"><input name="purchasePrice" type="text" id="purchasePrice" value="0.00" class="purchasePrice" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span></td>
  </tr>
  <tr>
    <td><strong>Image</strong></td>
    <td colspan="4"><label for="file"></label>
      <input type="file" name="file" id="file" /> Use Stock Image: <input type="checkbox" name="checkbox" id="checkbox" />
      <label for="checkbox"></label></td>
  </tr>  
  <tr>
    <td><span class="darker">Notes</span></td>
    <td colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>

  <tr>
    <td valign="bottom">      <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add  Coin" /></td>
    <td colspan="4">&nbsp;</td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<p><a href="../logout.php">Logout</a></p>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>