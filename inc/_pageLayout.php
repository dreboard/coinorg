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
<p>The most obvious difference between the two coins is the shape. Beyond that, the design on the octagonal is slightly smaller to make room for the border lettering, and has eight dolphins in the angles on both sides  </p>
<table width="100%" border="0">
  <tr>
    <td width="14%" valign="top"><strong>Obverse:</strong></td>
    <td width="86%"> The obverse of both features a helmeted head of Minerva, the Roman goddess of war, wisdom, skill and agriculture. Below the portrait is the inscription of the date written in Roman Numerals &ldquo;MCMXV&rdquo; for 1915. Other inscriptions on the obverse include &ldquo;UNITED STATES OF AMERICA&rdquo;, &ldquo;IN GOD WE TRUST&rdquo; and the denomination &ldquo;FIFTY DOLLARS&rdquo;. </td>
  </tr>
  <tr>
    <td valign="top"><strong>Reverse:</strong></td>
    <td> The reverse of both round and octagonal panama pacific coins shows an image of an owl sitting in a Ponderosa Pine tree surrounded with pinecones. The owl is intended to symbolize wisdom and intellect. The inscriptions on the back of these coins read &ldquo;PANAMA PACIFIC EXPOSITION&rdquo;, &ldquo;SAN FRANCISCO&rdquo; and &ldquo;E PLURIBUS UNUM&rdquo;. </td>
  </tr>
</table>
<h3>Mintage</h3>
<table width="33%" border="0">
  <tr>
    <td width="38%">Round</td>
    <td width="62%">1,510</td>
  </tr>
  <tr>
    <td>Octagonal</td>
    <td>1509</td>
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
    <td width="37%" rowspan="2" valign="top">Silver Three Cent Three Cents<img src="../img/Silver_Three_Cent_Piece.jpg" width="100" height="100" alt="3" /></td>
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
    <td>Nickel Three Cent Three Cents<img src="../img/Three_Cent.jpg" width="100" height="100" alt="3" /></td>
    <td valign="top">1865-1889</td>
  </tr>
</table>

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
<hr />

<p> The first gold commemorative coins issued by the United States Mint were the 1903 Louisiana Purchase Exposition Gold Dollars. The coins were available with two different obverse designs featuring Thomas Jefferson or William McKinley and carried a rather high authorized mintage of 250,000 coins across both designs. </p>
<h3>Mintage</h3>
<table width="44%" border="0">
  <tr>
    <td width="41%"><strong>1903 P</strong></td>
    <td width="59%"> 125,000</td>
  </tr>
</table>
<br />
<table width="100%" border="0">
  <tr>
    <td width="14%" valign="top"><strong>Obverse:</strong></td>
    <td width="86%" valign="top"> A    portrait of the president on the obverse with the design credited to Charles E. Barber. A left facing portrait of Jefferson appears with surrounding inscription &ldquo;United States of America&rdquo;. This represented the first time he was depicted on a legal tender U.S. coin. . </td>
  </tr>
  <tr>
    <td valign="top"><strong>Reverse:</strong></td>
    <td valign="top"> A single olive branch with an arrangement of inscriptions. The words &ldquo;Louisiana Purchase Exposition&rdquo; and &ldquo;St. Louis&rdquo; appear around the outer edge, with the denomination &ldquo;One Dollar&rdquo; and dual date &quot;1803-1903&quot; in the center.</td>
  </tr>
</table>
<p>1892-1893</p>
<hr />

<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="14%" valign="top"><strong>Obverse:</strong></td>
    <td width="86%"> The obverse of both features a helmeted head of Minerva, the Roman goddess of war, wisdom, skill and agriculture. Below the portrait is the inscription of the date written in Roman Numerals &ldquo;MCMXV&rdquo; for 1915. Other inscriptions on the obverse include &ldquo;UNITED STATES OF AMERICA&rdquo;, &ldquo;IN GOD WE TRUST&rdquo; and the denomination &ldquo;FIFTY DOLLARS&rdquo;. </td>
  </tr>
  <tr>
    <td valign="top"><strong>Reverse:</strong></td>
    <td> The reverse of both round and octagonal panama pacific coins shows an image of an owl sitting in a Ponderosa Pine tree surrounded with pinecones. The owl is intended to symbolize wisdom and intellect. The inscriptions on the back of these coins read &ldquo;PANAMA PACIFIC EXPOSITION&rdquo;, &ldquo;SAN FRANCISCO&rdquo; and &ldquo;E PLURIBUS UNUM&rdquo;. </td>
  </tr>
</table>
<hr />

<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="14%" valign="top"><strong>Obverse:</strong></td>
    <td width="86%"> The obverse of both features a helmeted head of Minerva, the Roman goddess of war, wisdom, skill and agriculture. Below the portrait is the inscription of the date written in Roman Numerals &ldquo;MCMXV&rdquo; for 1915. Other inscriptions on the obverse include &ldquo;UNITED STATES OF AMERICA&rdquo;, &ldquo;IN GOD WE TRUST&rdquo; and the denomination &ldquo;FIFTY DOLLARS&rdquo;. </td>
  </tr>
  <tr>
    <td valign="top"><strong>Reverse:</strong></td>
    <td> The reverse of both round and octagonal panama pacific coins shows an image of an owl sitting in a Ponderosa Pine tree surrounded with pinecones. The owl is intended to symbolize wisdom and intellect. The inscriptions on the back of these coins read &ldquo;PANAMA PACIFIC EXPOSITION&rdquo;, &ldquo;SAN FRANCISCO&rdquo; and &ldquo;E PLURIBUS UNUM&rdquo;. </td>
  </tr>
</table>
<hr />
<p>The most obvious difference between the two coins is the shape. Beyond that, the design on the octagonal is slightly smaller to make room for the border lettering, and has eight dolphins in the angles on both sides  </p>
<p><a href="viewList.php?coinType=Panama_Pacific_Fifty_Dollar">Panama Pacific $50 Gold Piece</a><br />
  <a href="viewList.php?coinType=Panama_Pacific_Exposition_Gold_Quarter_Eagle">Panama Pacific Exposition Gold Quarter Eagle</a><br />
  <a href="viewList.php?coinType=Panama_Pacific_One_Dollar_Commemorative_Gold">Panama Pacific One Dollar Commemorative Gold</a><br />
  <a href="viewList.php?coinType=Panama_Pacific_Exposition_Gold_Quarter_Eagle">Panama Pacific Exposition Gold Quarter Eagle</a></p>
<table width="100%" border="0">
  <tr>
    <td width="14%" valign="top"><strong>Obverse:</strong></td>
    <td width="86%"> The obverse reads &ldquo;Liberty&rdquo;, &ldquo;In God We Trust&rdquo;, &ldquo;Los Angeles&rdquo;, the date &ldquo;1984&quot;, and   &ldquo;Olympiad XXIII&rdquo; at the base of the coin. The reverse inscriptions   include &ldquo;United Sates of America&rdquo;, the denomination &ldquo;Ten Dollars&rdquo;, and   &ldquo;E Pluribus Unum&rdquo; on the banner above the eagle.</td>
  </tr>
  <tr>
    <td valign="top"><strong>Reverse:</strong></td>
    <td valign="top"> The Great Seal of the United States featuring a heraldic eagle. The eagle   holds an olive branch and bundle of arrows in its talons with thirteen   stars above. </td>
  </tr>
</table>
<h3>Mintage</h3>
<table width="42%" border="0">
  <tr>
    <td width="67%" valign="top">Round<img src="../img/Panama_Pacific_Fifty_Dollar2.jpg" alt="1" width="100" height="100" align="left" /></td>
    <td width="33%" valign="top">1,510</td>
  </tr>
  <tr>
    <td valign="top">Octagonal<img src="../img/Panama_Pacific_Fifty_Dollar.jpg" width="100" height="100" align="left" /></td>
    <td valign="top">1509</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<hr />
<p>The <strong>1984 Olympics Commemorative $10 Gold </strong>was part of a   trio of coin designs to commemorate the 1984 Olympic Games held in Los   Angeles. The other two coins were silver dollars dated 1983 and 1984.   Notably, the $10 Gold coin represented the first gold commemorative   issued in the United States in more than 50 years.<br /> 
<span style="font-size: 10px">From moderncommemoratives.com</span></p>
<table width="100%" border="0">
  <tr>
    <td width="14%" valign="top"><strong>Obverse:</strong></td>
    <td width="86%"> The obverse reads &ldquo;Liberty&rdquo;, &ldquo;In God We Trust&rdquo;, &ldquo;Los Angeles&rdquo;, the date &ldquo;1984&quot;, and   &ldquo;Olympiad XXIII&rdquo; at the base of the coin. The reverse inscriptions   include &ldquo;United Sates of America&rdquo;, the denomination &ldquo;Ten Dollars&rdquo;, and   &ldquo;E Pluribus Unum&rdquo; on the banner above the eagle.</td>
  </tr>
  <tr>
    <td valign="top"><strong>Reverse:</strong></td>
    <td valign="top"> The Great Seal of the United States featuring a heraldic eagle. The eagle   holds an olive branch and bundle of arrows in its talons with thirteen   stars above. </td>
  </tr>
</table>
<h3>Mintage</h3>
<table width="42%" border="0">
  <tr>
    <td width="67%" valign="top">1984 W      </td>
    <td width="33%" valign="top">48,551</td>
  </tr>
  <tr>
    <td valign="top">1984 W Proof</td>
    <td valign="top">381,085</td>
  </tr>
  <tr>
    <td valign="top">1984 P</td>
    <td valign="top">33,309</td>
  </tr>
    <tr>
    <td width="67%" valign="top">1984 D      </td>
    <td width="33%" valign="top">34,533</td>
  </tr>
  <tr>
    <td valign="top">1984 S</td>
    <td valign="top">48,551</td>
  </tr>
</table>
<img src="../img/Dolley_Madison.jpg" alt="Dolley Madison First Spouse" width="250" height="250" align="left" class="pagePic" />
<p>The <strong>Dolley Madison First Spouse Gold Coin</strong> was released by the US Mint on November 19, 2007. This was the fourth   coin released on for the series and the final for the year.</p>
<p>The obverse features a portrait of Dolley Madison and the inscriptions, &quot;Dolley   Madison,&quot; &quot;In God We Trust,&quot; and &quot;Liberty.&quot; Also included are the date   and mint mark, years served as first spouse &quot;1809-1817&quot; and order of the   Presidency &quot;4th.&quot;</p>
<p>The reverse depicts Dolley Madison in her famous act of saving the Cabinet papers   and the Gilbert Stuart portrait of George Washington. This heroic act   took place as British troops were approaching the White House in August   1814.</p>
<p>.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
