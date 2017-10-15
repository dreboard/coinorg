<?php 
include 'config.php';
$coinType = "Eisenhower Dollar";
//REPORT QUERIES
function typeCount($coinType){
$pennyQuery = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType'") or die(mysql_error());
$count = mysql_num_rows($pennyQuery);
return intval($count);
}

?>
right double quote	 	
&rdquo;
<p>

<?php 

echo typeCount($coinType) ?>
</p>
left double quote	 	
&ldquo;	
<p>&nbsp;</p>
Hyphen -
&#45;
<p>&lt;p&gt;The Indian Princess Gold Dollar was one of two United States dollar coin produced from 1849 to 1889. Composed of 90% pure gold, it was the smallest denomination of gold currency ever produced by the United States federal government.&lt;/p&gt;<br />
</p>
<p>Thifornia</p>
<table width="100%" border="0">
  <tr>
    <td width="14%" valign="top"><strong>Obverse:</strong></td>
    <td width="86%">GBT67</td>
  </tr>
  <tr>
    <td valign="top"><strong>Reverse:</strong></td>
    <td>HGB7TYU</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="33%" border="0">
  <tr>
    <td width="38%">With Motto </td>
    <td width="62%">1815-1828</td>
  </tr>
  <tr>
    <td>No Motto </td>
    <td>1831-1838</td>
  </tr>
</table>
<h3>Copper Color Designation</h3>
<ul>
  <li><b>Red</b> - Describes a copper coin that still retains 95 percent or more of its original color. (Abbreviated as RD)</li>
</ul>
<ul>
  <li><b>Red-Brown</b> - Describes a copper coin that has from 5 to 95 percent of its original mint color remaining (Abbreviated as RB).</li>
</ul>
<ul>
  <li><b>Brown</b> - The term applied to a copper coin that no longer has 
    the red color of copper. It is abbreviated as BN when used as part of a 
    grade or description.</li>
</ul>
<p>&nbsp;</p>
<table border="1" class="gradeTbl">
  <tr>
    <td width="187" class="darker">AG3 About Good</td>
    <td width="497">xxx</td>
  </tr>
  <tr>
    <td class="darker">G4 Good</td>
    <td>xxx</td>
  </tr>
  <tr>
    <td class="darker">VG8 Very Good</td>
    <td>xxx</td>
  </tr>
  <tr>
    <td class="darker">F12 Fine</td>
    <td>xxx</td>
  </tr>
  <tr>
    <td class="darker">VF20 Very Fine</td>
    <td>xxx</td>
  </tr>
  <tr>
    <td class="darker">EF40 Extremely Fine</td>
    <td>xxx</td>
  </tr>
  <tr>
    <td class="darker">AU50 About Uncirculated</td>
    <td>xxx</td>
  </tr>
  <tr>
    <td class="darker">MS60 Uncirculated</td>
    <td>xxx</td>
  </tr>
  <tr>
    <td class="darker">MS63 Select Uncirculated</td>
    <td>xxx</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="63%" border="0">
  <tr>
    <td width="37%" rowspan="2" valign="top">Silver Three Cent Three Cents</td>
    <td width="63%">1851-1873
</td>
  </tr>
  <tr>
    <td><ul>
      <li>No Outlines to Star (1851-1853)</li>
      <li>Three Outlines to Star (1854-1858)</li>
      <li>Two Outlines to Star (1859-1873)</li>
    </ul></td>
  </tr>
  <tr>
    <td>Nickel Three Cent Three Cents</td>
    <td>1865-1889</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>Thifornia</p>
<table width="100%" border="0">
  <tr>
    <td width="13%" valign="top"><strong>Obverse:</strong></td>
    <td width="87%">A nationalistic shield superimposed upon a six pointed star and is encircled by the words UNITED STATES OF AMERICA.</td>
  </tr>
  <tr>
    <td valign="top"><strong>Reverse:</strong></td>
    <td>A stylized letter C and inset within the C is the Roman numeral III to represent the value. Encircling the overall reverse design are thirteen stars along the reverse border.</td>
  </tr>
</table>
<h4>Three Cent Piece Silver</h4>
<table width="100%" border="0">
  <tr>
    <td>1851 to 1853 No outline around obverse star</td>
    </tr>
    <tr> 
<td>1854 to 1858 Double outline around obverse star and olive sprigs & arrows added to reverse</td>
</tr>
<tr>
<td>1859 to 1873 Single outline around obverse star and olive sprigs & arrows added to reverse</td>
  </tr>
</table>

<h4>Three Cent Piece Nickel</h4>
<table width="100%" border="0">
  <tr>
    <td width="14%" valign="top"><strong>Obverse:</strong></td>
    <td width="86%">Liberty facing left and wearing a beaded coronet inscribed LIBERTY in incuse letters and the legend UNITED STATES OF AMERICA.</td>
  </tr>
  <tr>
    <td valign="top"><strong>Reverse:</strong></td>
    <td>Roman numeral III in the center to identify the coins value, surrounded by a wreath which was an adaptation of the laurel wreath.</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="63%" border="0">
  <tr>
    <td width="37%" rowspan="2" valign="top"><strong>Silver Three Cent Three Cents</strong></td>
    <td width="63%">1851-1873
</td>
  </tr>
  <tr>
    <td><ul>
      <li>No Outlines to Star (1851-1853)</li>
      <li>Three Outlines to Star (1854-1858)</li>
      <li>Two Outlines to Star (1859-1873)</li>
    </ul></td>
  </tr>
  <tr>
    <td><strong>Nickel Three Cent Three Cents</strong></td>
    <td>1865-1889</td>
  </tr>
</table>
<p>
<select name="select" id="select">
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
<optgroup label="Half Dimes">
<option value="Flowing_Hair_Half_Dime">Flowing Hair</option>
<option value="Draped_Bust_Half_Dime">Draped Bust</option>
<option value="Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
<option value="Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
</optgroup>
<optgroup label="Nickels">
<option value="Shield_Nickel">Shield Nickel</option>
<option value="Liberty_Head_Nickel">Liberty Head Nickel</option>
<option value="Indian_Head_Nickel">Indian Head Nickel</option>
<option value="Jefferson_Nickel">Jefferson Nickel</option>
<option value="Westward_Journey">Westward Journey Series</option>
<option value="Return_to_Monticello">Return to Monticello</option>
</optgroup>
<optgroup label="Dimes">
<option value="Drapped_Bust_Dime">Drapped Bust Dime</option>
<option value="Liberty_Cap_Dime">Liberty Cap Dime</option>
<option value="Seated_Liberty_Dime">Liberty Seated Dime</option>
<option value="Barber_Dime">Barber Dime</option>
<option value="Winged_Liberty_Dime">Winged Liberty Dime</option>
<option value="Roosevelt_Dime">Roosevelt Dime</option>
</optgroup>
<optgroup label="Twenty Cents">
<option value="Twenty Cents">Twenty Cent Piece</option>
</optgroup>
<optgroup label="Quarters">
<option value="Draped_Bust_Quarter">Draped Bust Quarter</option>
<option value="Capped_Bust_Quarter">Capped Bust Quarter</option>
<option value="Liberty_Seated_Quarter">Liberty Seated Quarter</option>
<option value="Barber_Quarter">Barber Quarter</option>
<option value="Standing_Liberty">Standing Liberty</option>
<option value="Washington_Quarter">Washington Quarter</option>
<option value="State Quarter">State Quarter</option>
<option value="District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
<option value="America the Beautiful Quarter">America the Beautiful Quarter</option>
</optgroup>
<optgroup label="Half Dollars">
<option value="Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
<option value="Draped_Bust_Half_Dollar">Draped Bust Half</option>
<option value="Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
<option value="Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
<option value="Barber_Half_Dollar">Barber Half</option>
<option value="Walking_Liberty">Walking Liberty Half</option>
<option value="Franklin_Half_Dollar">Franklin Half</option>
<option value="Kennedy_Half_Dollar">Kennedy Half</option>
</optgroup>
<optgroup label="Dollars">
<option value="Flowing_Hair_Dollar">Flowing Hair Dollar</option>
<option value="Draped_Bust_Dollar">Draped Bust Dollar</option>
<option value="Gobrecht_Dollar">Gobrecht Dollar</option>
<option value="Seated_Liberty_Dollar">Seated Liberty Dollar</option>
<option value="Trade_Dollar">Trade Dollar</option>
<option value="Morgan_Dollar">Morgan Dollar</option>
<option value="Peace_Dollar">Peace Dollar</option>
<option value="Eisenhower_Dollar">Eisenhower Dollar</option>
<option value="Susan_B_Anthony_Dollar">Susan B. Anthony</option>
<option value="Sacagawea_Dollar">Sacagawea/Native American</option>
<option value="Presidential_Dollar">Presidential Dollar</option>
</optgroup>
</select>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
<optgroup label="Half Cents">
<option value="reportCent.php">All Cents</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Half_Cent&page=1">Liberty Cap</option>
<option value="viewListReport.php?coinType=Draped_Bust_Half_Cent&page=1">Draped Bust</option>
<option value="viewListReport.php?coinType=Classic_Head_Half_Cent&page=1">Classic Head</option>
<option value="viewListReport.php?coinType=Braided_Hair_Half_Cent&page=1">Braided Hair</option>
</optgroup>
<optgroup label="Large Cents">
<option value="reportCent.php">All Cents</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Large_Cent&page=1">Flowing Hair</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Large_Cent&page=1">Liberty Cap</option>
<option value="viewListReport.php?coinType=Draped_Bust_Large_Cent&page=1">Draped Bust</option>
<option value="viewListReport.php?coinType=Classic_Head_Large_Cent&page=1">Classic Head</option>
<option value="viewListReport.php?coinType=Coronet_Liberty_Head_Large_Cent&page=1">Coronet Liberty Head</option>
<option value="viewListReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent&page=1">Braided Hair Liberty Head</option>
</optgroup>
<optgroup label="Cents">
<option value="reportCent.php">All Cents</option>
<option value="viewListReport.php?coinType=Flying_Eagle&page=1">Flying Eagle Cent</option>
<option value="viewListReport.php?coinType=Indian_Head&page=1">Indian Head Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Wheat&page=1">Lincoln Wheat Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Memorial&page=1">Lincoln Memorial Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Bicentennial&page=1">Lincoln Bicentennial</option>
<option value="viewListReport.php?coinType=Union_Shield&page=1">Union Shield</option>
</optgroup>
<optgroup label="Two Cents">
<option value="Two_Cent">Two Cent Piece</option>
</optgroup>
<optgroup label="Three Cents">
<option value="Three_Cent">Three Cent Piece</option>
</optgroup>
<optgroup label="Half Dimes">
<option value="reportHalf_Dime.php">All Half Dimes</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Half_Dime&page=1">Flowing Hair</option>
<option value="viewListReport.php?coinType=Draped_Bust_Half_Dime&page=1">Draped Bust</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Half_Dime&page=1">Liberty Cap Half Dime</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Half_Dime&page=1">Seated Liberty Half Dime</option>
</optgroup>
<optgroup label="Nickels">
<option value="reportHalf.php">All Half Dollars</option>
<option value="viewListReport.php?coinType=Shield_Nickel&page=1">Shield Nickel</option>
<option value="viewListReport.php?coinType=Liberty_Head_Nickel&page=1">Liberty Head Nickel</option>
<option value="viewListReport.php?coinType=Indian_Head_Nickel&page=1">Indian Head Nickel</option>
<option value="viewListReport.php?coinType=Jefferson_Nickel&page=1">Jefferson Nickel</option>
<option value="viewListReport.php?coinType=Westward_Journey&page=1">Westward Journey Series</option>
<option value="viewListReport.php?coinType=Return_to_Monticello&page=1">Return to Monticello</option>
</optgroup>
<optgroup label="Dimes">
<option value="viewListReport.php?coinType=reportHalf.php">All Half Dollars</option>
<option value="viewListReport.php?coinType=Drapped_Bust_Dime&page=1">Drapped Bust Dime</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Dime&page=1">Liberty Cap Dime</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Dime&page=1">Liberty Seated Dime</option>
<option value="viewListReport.php?coinType=Barber_Dime&page=1">Barber Dime</option>
<option value="viewListReport.php?coinType=Winged_Liberty_Dime&page=1">Winged Liberty Dime</option>
<option value="viewListReport.php?coinType=Roosevelt_Dime&page=1">Roosevelt Dime</option>
</optgroup>
<optgroup label="Twenty Cents">
<option value="Twenty Cents">Twenty Cent Piece</option>
</optgroup>
<optgroup label="Quarters">
<option value="reportHalf.php">All Half Dollars</option>
<option value="viewListReport.php?coinType=Draped_Bust_Quarter&page=1">Draped Bust Quarter</option>
<option value="viewListReport.php?coinType=Capped_Bust_Quarter&page=1">Capped Bust Quarter</option>
<option value="viewListReport.php?coinType=Liberty_Seated_Quarter&page=1">Liberty Seated Quarter</option>
<option value="viewListReport.php?coinType=Barber_Quarter&page=1">Barber Quarter</option>
<option value="viewListReport.php?coinType=Standing_Liberty&page=1">Standing Liberty</option>
<option value="viewListReport.php?coinType=Washington_Quarter&page=1">Washington Quarter</option>
<option value="viewListReport.php?coinType=State Quarter&page=1">State Quarter</option>
<option value="viewListReport.php?coinType=District_of_Columbia_and_US_Territories&page=1">D.C. and U. S. Territories</option>
<option value="viewListReport.php?coinType=America the Beautiful Quarter&page=1">America the Beautiful Quarter</option>
</optgroup>
<optgroup label="Half Dollars">
<option value="reportHalf.php">All Half Dollars</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Half_Dollar&page=1">Flowing Hair Half</option>
<option value="viewListReport.php?coinType=Draped_Bust_Half_Dollar&page=1">Draped Bust Half</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Half_Dollar&page=1">Liberty Cap Half</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Half_Dollar&page=1">Seated Liberty Half</option>
<option value="viewListReport.php?coinType=Barber_Half_Dollar&page=1">Barber Half</option>
<option value="viewListReport.php?coinType=Walking_Liberty&page=1">Walking Liberty Half</option>
<option value="viewListReport.php?coinType=Franklin_Half_Dollar&page=1">Franklin Half</option>
<option value="viewListReport.php?coinType=Kennedy_Half_Dollar&page=1">Kennedy Half</option>
</optgroup>
<optgroup label="Dollars">
<option value="reportHalf.php">All Half Dollars</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Dollar&page=1">Flowing Hair Dollar</option>
<option value="viewListReport.php?coinType=Draped_Bust_Dollar&page=1">Draped Bust Dollar</option>
<option value="viewListReport.php?coinType=Gobrecht_Dollar&page=1">Gobrecht Dollar</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Dollar&page=1">Seated Liberty Dollar</option>
<option value="viewListReport.php?coinType=Trade_Dollar&page=1">Trade Dollar</option>
<option value="viewListReport.php?coinType=Morgan_Dollar&page=1">Morgan Dollar</option>
<option value="viewListReport.php?coinType=Peace_Dollar&page=1">Peace Dollar</option>
<option value="viewListReport.php?coinType=Eisenhower_Dollar&page=1">Eisenhower Dollar</option>
<option value="viewListReport.php?coinType=Susan_B_Anthony_Dollar&page=1">Susan B. Anthony</option>
<option value="viewListReport.php?coinType=Sacagawea_Dollar&page=1">Sacagawea/Native American</option>
<option value="viewListReport.php?coinType=Presidential_Dollar&page=1">Presidential Dollar</option>
</optgroup>
</select>
<p>&nbsp;</p>


<p>
  <select name="errorType" id="errorType">
    <option value="None" selected="selected">None</option>
    <option value="Off Center">Off Center</option>
    <option value="Broadstrike">Broadstrike</option>
    <option value="Partial Collar">Partial Collar</option>
    <option value="Multiple Strike">Multiple Strike</option>
    <option value="Mated Pair">Mated Pair</option>
    <option value="Brockage">Brockage</option>
    <option value="Capped Die">Capped Die</option>
    <option value="Indent">Indent</option>
    <option value="Bonded">Bonded</option>
    <option value="Wrong Planchet">Wrong Planchet</option>
    <option value="Mule">Mule</option>
    <option value="Weak Strike">Weak Strike</option>
    <option value="Transitional Error">Transitional Error</option>
    <option value="Double Denomination">Double Denomination</option>
    <option value="Folded Over">Folded Over</option>
    <option value="Clipped Planchet">Clipped Planchet</option>
    <option value="Lamination Error">Lamination Error</option>
    <option value="Missing Edge Lettering">Missing Edge Lettering</option>
  </select>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<input name="folderType" type="text" id="folderType" />

<select name="folderName" id="folderName">
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
<option value="Nickels Blank">Nickels Blank</option>
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

<option value="None" selected="selected">None</option>
<option value="Oenter">Onter</option>
<option value="Broadstrike">Broadstrike</option>
<option value="Partiollar">Partllar</option>
<option value="Multirike">Multiprike</option>
<option value="Onter">enter</option>
<option value="Broadstrike">Broadstrike</option>
<option value="Partollar">Parollar</option>
<option value="Multiptrike">Multitrike</option>
</optgroup>

<option value="None" selected="selected">None</option>
<option value="Oenter">Onter</option>
<option value="Broadstrike">Broadstrike</option>
<option value="Partiollar">Partllar</option>
<option value="Multirike">Multiple Strike</option>
<option value="Onter">enter</option>
<option value="Broadstrike">Broadstrike</option>
<option value="Partollar">Parollar</option>
<option value="Multiptrike">Multitrike</option></optgroup>

</select>

<p>&nbsp;</p>
<strong>From: </strong>
<select>
<option value="20" selected="selected">20</option>
<option value="19">19</option>
<option value="18">18</option>
<option value="17">17</option>
</select>

<select>
<option value="00">00</option>
<?php 
for ($num = 1; $num <= 99; $num++) {
if($num<10)
$day = "0$num"; // add the zero
else
$day = "$num"; // don't add the zero
echo "<option value=".$day.">".$day."</option>";
}
?>
</select>
<strong>To: </strong>
<select>
<option value="20" selected="selected">20</option>
<option value="19">19</option>
<option value="18">18</option>
<option value="17">17</option>
</select>

<select>
<option value="00">00</option>
<?php 
for ($num = 1; $num <= 99; $num++) {
if($num<10)
$day = "0$num"; // add the zero
else
$day = "$num"; // don't add the zero
echo "<option value=".$day.">".$day."</option>";
}
?>
</select>
<p>&nbsp;</p>
<select name="folderID" id="folderID">
<optgroup label="Whitman">
<option value="None" selected="selected">None</option>
<option value="1">Indian Cents 1857-1909</option>
<option value="2">Lincoln Cents 1909-1940</option>
<option value="3">Lincoln Cents 1941-1974</option>
<option value="4">Lincoln Cents Starting 1975</option>
<option value="5">Lincoln Memorial Cents 1959-1998</option>
<option value="6">Lincoln Memorial Cents 1999-Date</option>


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

<option value="Eisenhower-Anthony Dollars 1971-1999">Eisenhower-Anthony Dollars 1971-1999</option>
<option value="JFK Half Dollars Starting 2004">JFK Half Dollars Starting 2004</option>
</optgroup>

<optgroup label="Littleton">
<option value="Indian & Flying Eagle Cents 1857-1909">Indian & Flying Eagle Cents 1857-1909</option>
<option value="Lincoln Cents, Vol. 1 1909-1929">Lincoln Cents, Vol. 1 1909-1929</option>
<option value="Lincol74">Lincoln Cents 1941-1974</option>
<option value="Linco75">Lincoln Cents Starting 1975</option>
<option value="Liber12">Liberty Nickels 1883-1912</option>
<option value="Buffa38">Buffalo Nickels 1913-1938</option>
<option value="Lincol74">Lincoln Cents 1941-1974</option>
<option value="Linco75">Lincoln Cents Starting 1975</option>
<option value="Liber12">Liberty Nickels 1883-1912</option>
<option value="Buffa38">Buffalo Nickels 1913-1938</option>
<option value="Lincol74">Lincoln Cents 1941-1974</option>
<option value="Linco75">Lincoln Cents Starting 1975</option>
<option value="Liber12">Liberty Nickels 1883-1912</option>
<option value="Buffa38">Buffalo Nickels 1913-1938</option>
<option value="Lincol74">Lincoln Cents 1941-1974</option>
<option value="Linco75">Lincoln Cents Starting 1975</option>
<option value="Liber12">Liberty Nickels 1883-1912</option>
<option value="Buffa38">Buffalo Nickels 1913-1938</option>
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

</select>
<p>&nbsp;</p>
<select name="rollType" id="rollType">
<option selected="selected" value="">Quick Menu</option>
<optgroup label="Half Cents">
<option value="Mixed Half Cents">Mixed Half Cents</option>
<option value="Liberty Cap Half Cent">Liberty Cap</option>
<option value="Draped Bust Half Cent">Draped Bust</option>
<option value="Classic Head Half Cent">Classic Head</option>
<option value="Braided Hair Half Cent">Braided Hair</option>
</optgroup>
<optgroup label="Large_Cents">
<option value="Mixed_Large_Cents">Mixed Large Cents</option>
<option value="Flowing_Hair_Large_Cent">Flowing Hair</option>
<option value="Liberty_Cap_Large_Cent">Liberty Cap</option>
<option value="Draped_Bust_Large_Cent">Draped Bust</option>
<option value="Classic_Head_Large_Cent">Classic Head</option>
<option value="Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
<option value="Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
</optgroup>
<optgroup label="Cents">
<option value="Mixed_Cents">Mixed Cents</option>
<option value="Flying_Eagle">Flying Eagle Cent</option>
<option value="Indian_Head">Indian Head Cent</option>
<option value="Lincoln_Wheat">Lincoln Wheat Cent</option>
<option value="Lincoln_Memorial">Lincoln Memorial Cent</option>
<option value="Lincoln_Bicentennial">Lincoln Bicentennial</option>
<option value="Union_Shield">Union Shield</option>
</optgroup>

<optgroup label="Half_Dimes">
<option value="Mixed_Half_Dimes">Mixed Half Dimes</option>
<option value="Flowing_Hair_Half_Dime">Flowing Hair</option>
<option value="Draped_Bust_Half_Dime">Draped Bust</option>
<option value="Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
<option value="Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
</optgroup>
<optgroup label="Nickels">
<option value="Mixed_Nickels">Mixed Nickels</option>
<option value="Shield_Nickel">Shield Nickel</option>
<option value="Liberty_Head_Nickel">Liberty_Head_Nickel</option>
<option value="Indian_Head_Nickel">Indian_Head_Nickel</option>
<option value="Jefferson_Nickel">Jefferson_Nickel</option>
<option value="Westward_Journey">Westward_Journey</option>
<option value="Return_to_Monticello">Return_to_Monticello</option>
</optgroup>
<optgroup label="Dimes">
<option value="Mixed_Dimes">Mixed Dimes</option>
<option value="Drapped_Bust_Dime">Drapped Bust Dime</option>
<option value="Liberty_Cap_Dime">Liberty Cap Dime</option>
<option value="Seated_Liberty_Dime">Liberty Seated Dime</option>
<option value="Barber_Dime">Barber Dime</option>
<option value="Winged_Liberty_Dime">Winged Liberty Dime</option>
<option value="Roosevelt_Dime">Roosevelt Dime</option>
</optgroup>
<optgroup label="Twenty_Cents">
<option value="Twenty Cent Piece">Twenty Cent Piece</option>
</optgroup>
<optgroup label="Quarters">
<option value="Mixed_Quarters">Mixed Quarters</option>
<option value="Draped_Bust_Quarter">Draped Bust Quarter</option>
<option value="Capped_Bust_Quarter">Capped Bust Quarter</option>
<option value="Liberty_Seated_Quarter">Liberty Seated Quarter</option>
<option value="Barber_Quarter">Barber Quarter</option>
<option value="Standing_Liberty">Standing Liberty</option>
<option value="Washington_Quarter">Washington Quarter</option>
<option value="State Quarter">State Quarter</option>
<option value="District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
<option value="America the Beautiful Quarter">America the Beautiful Quarter</option>
</optgroup>
<optgroup label="Half_Dollars">
<option value="Mixed_Half_Dollars">Mixed Half Dollars</option>
<option value="Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
<option value="Draped_Bust_Half_Dollar">Draped Bust Half</option>
<option value="Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
<option value="Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
<option value="Barber_Half_Dollar">Barber Half</option>
<option value="Walking_Liberty">Walking Liberty Half</option>
<option value="Franklin_Half_Dollar">Franklin Half</option>
<option value="Kennedy_Half_Dollar">Kennedy Half</option>
</optgroup>
<optgroup label="Dollars">
<option value="Mixed_Dollars">Mixed Dollars</option>
<option value="Flowing_Hair_Dollar">Flowing Hair Dollar</option>
<option value="Draped_Bust_Dollar">Draped Bust Dollar</option>
<option value="Gobrecht_Dollar">Gobrecht Dollar</option>
<option value="Seated_Liberty_Dollar">Seated Liberty Dollar</option>
<option value="Trade_Dollar">Trade Dollar</option>
<option value="Morgan_Dollar">Morgan Dollar</option>
<option value="Peace_Dollar">Peace Dollar</option>
<option value="Eisenhower_Dollar">Eisenhower Dollar</option>
<option value="Susan_B_Anthony_Dollar">Susan B. Anthony</option>
<option value="Sacagawea_Dollar">Sacagawea/Native American</option>
<option value="Presidential_Dollar">Presidential Dollar</option>
</optgroup>
</select>
<p>&nbsp;</p>
<select name="coinGrade">
<option value="No Grade" selected="selected">No Grade </option>
<option value="Basal 0">(Basal 0) The coin is identifiable by type only. </option>
<option value="P1" >(PO-1) Poor - Barely identifiable; must have date and mintmark, otherwise pretty thrashed.</option>
<option value="FR2">(FR-2) Fair - Worn almost smooth but lacking the damage Poor coins have.</option>
<option value="AG3">(AG-3) About Good - Worn rims but most lettering is readable though worn.</option>
<option value="G4">(G-4) Good - Heavily worn such that inscriptions merge into the rims in places; details are mostly gone.</option>
<option value="G6">(G-6) Good - Rims complete with flat detail, peripheral lettering full.</option>
<option value="VG8">(VG-8) Very Good - Very worn, all major elements clear. Little if any central detail.</option>

<option value="VG8">(VG-10) Very Good - Design worn with slight detail, slightly clearer.</option>
<option value="F12">(F-12) Fine - Very worn, but wear is even and overall design elements stand out boldly.</option>
<option value="F12">(F-15) Fine - Slightly more detail in the recessed areas, all lettering sharp.</option>
<option value="VF20">(VF-20) Very Fine - Moderately worn, with some finer details remaining. </option>
<option value="VF25">(VF-25) Very Fine - Slightly more definition in the detail and lettering. </option>

<option value="VF30">(VF-30) Very Fine - Almost complete detail with flat areas. </option>
<option value="VF35">(VF-35) Very Fine - Detail is complete but worn with high points flat. </option>
<option value="EF40">(EF-40) Extremely Fine - Lightly worn; all devices are clear, major devices bold.</option>

<option value="EF45">(EF-45) Extremely Fine - Detail is complete with some high points flat.</option>
<option value="AU50">(AU-50) About Uncirculated - Slight traces of wear on high points; may have contact marks and little eye appeal.</option>
<option value="AU55">(AU-55) About Uncirculated - Full detail with friction on less than 1/2 surface, mainly on high points</option>

<option value="AU58">(AU-58) Very Choice About Uncirculated - Slightest hints of wear marks, no major contact marks, almost full luster.</option>
<option value="MS60">(MS-60) Mint State Basal - Strictly uncirculated with no luster, obvious contact marks.</option>
<option value="MS63">(MS-63) Mint State Acceptable - Uncirculated, but with contact marks and nicks, slightly impaired luster.</option>
<option value="MS65">(MS-65) Mint State Choice - Uncirculated with strong luster, very few contact marks. Strike is above average.</option>
<option value="MS68">(MS-68) Mint State Premium Quality - Uncirculated with perfect luster, no visible contact marks.</option>
<option value="MS69">(MS-69) Mint State All-But-Perfect - Uncirculated with perfect luster, and very exceptional eye appeal</option>
<option value="MS70">(MS-70) Mint State Perfect - The perfect coin. There are no microscopic flaws visible to 8x.</option>
<option value="PR50">(PR-50) Impaired Proof.</option>
<option value="PR60">(PR-60) Brilliant Proof.</option>
<option value="PR61">(PR-61) Brilliant Proof.</option>
<option value="PR62">(PR-62) Brilliant Proof.</option>
<option value="PR63">(PR-63) Brilliant Proof.</option>
<option value="PR65">(PR-65) Gem Proof.</option>
<option value="PR66">(PR-66) Choice Gem Proof.</option>
<option value="PR67">(PR-67) Extraordinary Proof.</option>
<option value="PR68">(PR-68) Extraordinary Proof.</option>
<option value="PR69">(PR-69) Extraordinary Proof.</option>
<option value="PR70">(PR-70) Perfect Proof - No microscopic flaws visible to 8x.</option>
</select>
<p>&nbsp; </p>
<table width="100%" border="1" id="masterCountTbl" cellpadding="3">
  <tr class="keyRow">
    <td><strong>Denomination</strong></td>
    <td align="center"><strong>Coins</strong></td>
    <td align="center"><strong>Rolls</strong></td>
    <td align="center"><strong>Folders</strong></td>
    <td align="center"><strong>Bags</strong></td>
    <td align="center"><strong>Boxes</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong><a href="Half_Cent.php">Half Cent</a></strong></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Half Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Half Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Half Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Half Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Half Cent', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong><a href="Large_Cent.php">Large Cent</a></strong></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Large Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Large Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Large Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Large Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Large Cent', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="20%" class="SemiKeyRow"><strong><a href="Small_Cent.php">Small Cent</a></strong></td>
    <td width="10%" align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td width="10%" align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td width="10%" align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td width="10%" align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td width="10%" align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td width="41%">&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong><a href="Two_Cent.php">Two Cent</a></strong></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Two Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Two Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Two Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Two Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Two Cent', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong><a href="Three_Cent.php">Three Cent</a></strong></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Three Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Three Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Three Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Three Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Three Cent', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong><a href="Half_Dime.php">Half Dime</a></strong></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Half Dime', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Half Dime', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Half Dime', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Half Dime', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Half Dime', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><a href="Nickel.php"><strong>Nickels</strong></a></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Nickel', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Nickel', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Nickel', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Nickel', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Nickel', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong><a href="Dime.php">Dimes</a></strong></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Dime', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Dime', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Dime', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Dime', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Dime', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong><a href="Twenty_Cent.php">Twenty Cent</a></strong></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Twenty Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Twenty Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Twenty Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Twenty Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Twenty Cent', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><a href="Quarter.php"><strong>Quarters</strong></a></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Quarter', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Quarter', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Quarter', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Quarter', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Quarter', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong><a href="Half_Dollar.php">Half Dollars</a></strong></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Half Dollar', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Half Dollar', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Half Dollar', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Half Dollar', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Half Dollar', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong><a href="Dollar.php">Dollars</a></strong></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Dollar', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Dollar', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Dollar', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Dollar', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Dollar', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong><a href="Gold.php">Gold</a></strong></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Gold', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Gold', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Gold', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Gold', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Gold', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong><a href="Commemorative.php">Commemoratives</a></strong></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Commemorative', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td align="center"><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>Readable Date</p>
<select name="date1">
<option value="1" selected="selected">1</option>
<option value="2">2</option>
<option value="X">X</option>
</select>
<select name="date1">
<option value="X">X</option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7" selected="selected">7</option>
<option value="8">8</option>
<option value="9">9</option>
</select>
<select name="date1">
<option value="X">X</option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9" selected="selected">9</option>
</select>
<select name="date1">
<option value="X">X</option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9" selected="selected">9</option>
</select>
<p>&nbsp;</p>
<p>&nbsp;</p>
