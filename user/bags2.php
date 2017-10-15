<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php include("../secureScripts.php"); ?>
<title>Coin Reports</title>
<script type="text/javascript">
$(document).ready(function(){	
$("#addAreaCent, #addAreaNickel, #addAreaDime, #addAreaQuarter, #addAreaHalf, #addAreaDollar").hide();

$("#addAreaCentBtn").click(function() {
   $("#addAreaCent").show();
   $("#addAreaNickel, #addAreaDime, #addAreaQuarter, #addAreaHalf, #addAreaDollar").hide();
});

$("#addAreaNickelBtn").click(function() {
   $("#addAreaNickel").show();
   $("#addAreaCent, #addAreaDime, #addAreaQuarter, #addAreaHalf, #addAreaDollar").hide();
});

$("#addAreaCentBtn").click(function() {
   $("#addAreaCent").show();
   $("#addAreaNickel, #addAreaDime, #addAreaQuarter, #addAreaHalf, #addAreaDollar").hide();
});

$("#addAreaCentBtn").click(function() {
   $("#addAreaCent").show();
   $("#addAreaNickel, #addAreaDime, #addAreaQuarter, #addAreaHalf, #addAreaDollar").hide();
});

$("#addAreaCentBtn").click(function() {
   $("#addAreaCent").show();
   $("#addAreaNickel, #addAreaDime, #addAreaQuarter, #addAreaHalf, #addAreaDollar").hide();
});

$("#addAreaCentBtn").click(function() {
   $("#addAreaCent").show();
   $("#addAreaNickel, #addAreaDime, #addAreaQuarter, #addAreaHalf, #addAreaDollar").hide();
});

});
</script> 

"addAreaCent"
"addAreaNickel"
"addAreaDime"
"addAreaQuarter"
"addAreaHalf"
"addAreaDollar"

<style type="text/css">

img.rollImg {width:100px; height:auto;}
img.rollImg:hover {cursor:pointer;}
#quickviewTbl img {width:100px; height:auto;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/userHeader.php"); ?>
<div id="content" class="clear">
<p>&nbsp;</p>
<table border="0" id="quickviewTbl">
  <tr align="center">
    <td><img src="../img/Union_Shield.jpg" name="addAreaCentBtn" class="rollImg" id="addAreaCentBtn"></td>
    <td><img src="../img/Indian_Head_Nickel.jpg" name="addAreaNickelBtn" class="rollImg" id="addAreaNickelBtn"></td>
    <td><img src="../img/Winged_Liberty_Dime.jpg" name="addAreaDimeBtn" class="rollImg" id="addAreaDimeBtn"></td>
    <td><img src="../img/Standing_Liberty.jpg" name="addAreaQuarterBtn" class="rollImg" id="addAreaQuarterBtn"></td>
    <td><img src="../img/Walking_Liberty.jpg" name="addAreaHalfBtn" class="rollImg" id="addAreaHalfBtn"></td>
    <td><img src="../img/Morgan_Dollar.jpg" name="addAreaDollarBtn" class="rollImg" id="addAreaDollarBtn"></td>
  </tr>
  <tr align="center" class="darker">
    <td>Cents</td>
    <td>Nickels/Half Dimes</td>
    <td>Dimes</td>
    <td>Quarters</td>
    <td>Half Dollars</td>
    <td>Dollars</td>
  </tr>
</table>

<div id="addAreaCent">
<img src="../img/Union_Shield.jpg" name="rollImg" align="left" class="rollImg" id="rollImg"><p>Cents</p>
<p><select name="coinType" id="coinType">
    <option value="" selected="selected">Type</option>
<optgroup label="Half Cents">
<option value="Liberty_Cap_Half_Cent">Liberty Cap</option>
<option value="Draped_Bust_Half_Cent">Draped Bust</option>
<option value="Classic_Head_Half_Cent">Classic Head</option>
<option value="Braided_Hair_Half_Cent">Braided Hair</option>
</optgroup>
<optgroup label="Large Cents">
<option value="Flowing_Hair_Large_Cent">Flowing Hair</option>
<option value="Liberty_Cap_Large_Cent">Liberty Cap</option>
<option value="Draped_Bust_Large_Cent">Draped Bust</option>
<option value="Classic_Head_Large_Cent">Classic Head</option>
<option value="Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
<option value="Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
</optgroup>
<optgroup label="Cents">
<option value="Flying_Eagle">Flying Eagle Cent</option>
<option value="Indian_Head">Indian Head Cent</option>
<option value="Lincoln_Wheat">Lincoln Wheat Cent</option>
<option value="Lincoln_Memorial">Lincoln Memorial Cent</option>
<option value="Lincoln_Bicentennial">Lincoln Bicentennial</option>
<option value="Union_Shield">Union Shield</option>
</optgroup>
<optgroup label="Two Cents">
<option value="Two_Cent">Two Cent Piece</option>
</optgroup>
<optgroup label="Three Cents">
<option value="Three_Cent">Three Cent Piece</option>
</optgroup>
</select></p>
<br class="clear" />
<table width="750" border="0" class="bulkListTbl">
  <tr>
    <td>Quantity</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="30%">Rolls (50)</td>
    <td width="22%"><label for="centAmount">Quantity</label></td>
    <td width="14%"><select name="centAmount7" id="centAmount7">
      <?php
  for($i=1; $i<50; $i++) {
 echo '<option value='.$i.'>'.$i.'</option>';
     }
?>
    </select></td>
    <td width="34%"><input type="text" name="rollTotal" id="rollTotal" /></td>
  </tr>
  <tr>
    <td>20 Roll Box (1000)</td>
    <td><label for="centAmount">Quantity</label></td>
    <td><select name="centAmount5" id="centAmount5">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
    </select></td>
    <td><input type="text" name="rollTotal2" id="rollTotal2" /></td>
  </tr>
  <tr>
    <td>50 Roll Box (2500)</td>
    <td><label for="centAmount">Quantity</label></td>
    <td><select name="centAmount6" id="centAmount6">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
    </select></td>
    <td><input type="text" name="rollTotal3" id="rollTotal3" /></td>
  </tr>
    <tr>
    <td>Type</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>By Year</td>
    <td><label for="centAmount">By Year </label></td>
    <td><select name="centAmount2" id="centAmount2">
      <?php
$year = date("Y") + 1;
  for($i=1856; $i< $year; $i++) {
 echo "<option value='$i'>$i</option>\n";
     }
?>
    </select></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>Assorted</td>
    <td><label for="centAmount">By Decade</label></td>
    <td><select name="centAmount3" id="centAmount3">
      <?php
$number = range(1850,2010,10);
  foreach($number as $decade) {
 echo "<option value='".$decade."'s'>".$decade."'s</option>\n";
     }
?>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label for="centAmount">Quantity</label></td>
    <td><select name="centAmount4" id="centAmount4">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  </table>
</div>

<div id="addAreaNickel">
Nickels
</div>

<div id="addAreaDime">
0000
</div>

<div id="addAreaQuarter">
0000
</div>

<div id="addAreaHalf">
0000
</div>

<div id="addAreaDollar">
0000
</div>
<p>Bags</p>
<table width="82%" border="0">
  <tr>
    <td width="17%">bulk bag</td>
    <td width="36%">200,000 coins</td>
    <td width="47%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>10,000</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>250 coins</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>Rolls</p>


  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<select name="centAmount" id="centAmount">

<option value=1856>1856</option>
<option value=1857>1857</option>
<option value=1858>1858</option>
<option value=1859>1859</option>
<option value=1860>1860</option>
<option value=1861>1861</option>
<option value=1862>1862</option>
<option value=1863>1863</option>
<option value=1864>1864</option>
<option value=1865>1865</option>
<option value=1866>1866</option>
<option value=1867>1867</option>
<option value=1868>1868</option>
<option value=1869>1869</option>
<option value=1870>1870</option>
<option value=1871>1871</option>
<option value=1872>1872</option>
<option value=1873>1873</option>
<option value=1874>1874</option>
<option value=1875>1875</option>
<option value=1876>1876</option>
<option value=1877>1877</option>
<option value=1878>1878</option>
<option value=1879>1879</option>
<option value=1880>1880</option>
<option value=1881>1881</option>
<option value=1882>1882</option>
<option value=1883>1883</option>
<option value=1884>1884</option>
<option value=1885>1885</option><option value=1886>1886</option><option value=1887>1887</option><option value=1888>1888</option><option value=1889>1889</option><option value=1890>1890</option><option value=1891>1891</option><option value=1892>1892</option><option value=1893>1893</option><option value=1894>1894</option><option value=1895>1895</option><option value=1896>1896</option><option value=1897>1897</option><option value=1898>1898</option><option value=1899>1899</option><option value=1900>1900</option><option value=1901>1901</option><option value=1902>1902</option><option value=1903>1903</option><option value=1904>1904</option><option value=1905>1905</option><option value=1906>1906</option><option value=1907>1907</option><option value=1908>1908</option><option value=1909>1909</option><option value=1910>1910</option><option value=1911>1911</option><option value=1912>1912</option><option value=1913>1913</option><option value=1914>1914</option><option value=1915>1915</option><option value=1916>1916</option><option value=1917>1917</option><option value=1918>1918</option><option value=1919>1919</option><option value=1920>1920</option><option value=1921>1921</option><option value=1922>1922</option><option value=1923>1923</option><option value=1924>1924</option><option value=1925>1925</option><option value=1926>1926</option><option value=1927>1927</option><option value=1928>1928</option><option value=1929>1929</option><option value=1930>1930</option><option value=1931>1931</option><option value=1932>1932</option><option value=1933>1933</option><option value=1934>1934</option><option value=1935>1935</option><option value=1936>1936</option><option value=1937>1937</option><option value=1938>1938</option><option value=1939>1939</option><option value=1940>1940</option><option value=1941>1941</option><option value=1942>1942</option><option value=1943>1943</option><option value=1944>1944</option><option value=1945>1945</option><option value=1946>1946</option><option value=1947>1947</option><option value=1948>1948</option><option value=1949>1949</option><option value=1950>1950</option><option value=1951>1951</option><option value=1952>1952</option><option value=1953>1953</option><option value=1954>1954</option><option value=1955>1955</option><option value=1956>1956</option><option value=1957>1957</option><option value=1958>1958</option><option value=1959>1959</option><option value=1960>1960</option><option value=1961>1961</option><option value=1962>1962</option><option value=1963>1963</option><option value=1964>1964</option><option value=1965>1965</option><option value=1966>1966</option><option value=1967>1967</option><option value=1968>1968</option><option value=1969>1969</option><option value=1970>1970</option><option value=1971>1971</option><option value=1972>1972</option><option value=1973>1973</option><option value=1974>1974</option><option value=1975>1975</option><option value=1976>1976</option><option value=1977>1977</option><option value=1978>1978</option><option value=1979>1979</option><option value=1980>1980</option><option value=1981>1981</option><option value=1982>1982</option><option value=1983>1983</option><option value=1984>1984</option><option value=1985>1985</option><option value=1986>1986</option><option value=1987>1987</option><option value=1988>1988</option><option value=1989>1989</option><option value=1990>1990</option><option value=1991>1991</option><option value=1992>1992</option><option value=1993>1993</option><option value=1994>1994</option><option value=1995>1995</option><option value=1996>1996</option><option value=1997>1997</option><option value=1998>1998</option><option value=1999>1999</option><option value=2000>2000</option><option value=2001>2001</option><option value=2002>2002</option><option value=2003>2003</option><option value=2004>2004</option><option value=2005>2005</option><option value=2006>2006</option><option value=2007>2007</option><option value=2008>2008</option><option value=2009>2009</option><option value=2010>2010</option><option value=2011>2011</option><option value=2012>2012</option>    </select>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
</body>
</html>