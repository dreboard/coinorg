<table width="100%" border="0" cellpadding="3" class="typeTbl" id="folderTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="8" align="center"><h2><?php echo $design ?> Type Collection <?php echo $CoinDesign->getSeatedTypeCollectionProgress($userID, $design) ?> of 7 (<?php echo percent($CoinDesign->getSeatedTypeCollectionProgress($userID, $design), '7'); ?>%)</h2></td>
    </tr>
  <tr class="dateHolder" valign="top">
    <td align="center"><a href="viewListReport.php?coinType=Draped_Bust_Half_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Draped_Bust_Half_Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewListReport.php?coinType=Draped_Bust_Half_Dime">Half Cent</a></td>
    
    <td align="center"><a href="viewListReport.php?coinType=Draped_Bust_Large_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Draped Bust Large Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewListReport.php?coinType=Draped_Bust_Large_Cent">Large Cent</a></td>
    
    <td align="center"><a href="viewListReport.php?coinType=Draped_Bust_Half_Dime"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Draped Bust Half Dime', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Draped_Bust_Half_Dime">Half Dime</a></td>
       

<td align="center"><a href="viewListReport.php?coinType=Draped_Bust_Dime"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Draped Bust Dime', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Draped_Bust_Dime">Dime</a></td>
  
<td align="center"><a href="viewListReport.php?coinType=Draped_Bust_Quarter"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Draped Bust Quarter', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Draped_Bust_Quarter">Quarter</a></td>
  
<td align="center"><a href="viewListReport.php?coinType=Draped_Bust_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Draped Bust Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Draped_Bust_Half_Dollar">Half Dollar</a></td>
  
<td align="center"><a href="viewListReport.php?coinType=Draped_Bust_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Draped Bust Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Draped_Bust_Dollar">Dollar</a></td>  
  
  </tr>
</table>

  <h1>Coins</h1>
<div>
  <table width="100%" border="1" cellpadding="3" id="masterCountTbl">
    <tr>
    <td width="450" class="darker">Draped Bust Types</td>
    <td width="247" align="center" class="darker">Collected </td>    
    <td width="267" align="center" class="darker"> Investment</td>
  </tr>
<tr>
 <td><a href="viewListReport.php?coinType=Draped_Bust_Half_Cent" class="brownLink"> Half Cent</a> (1837-1873)</td>
    <td align="center"><input readonly class="rollCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Draped_Bust_Half_Cent', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Draped_Bust_Half_Cent', $userID)?>" /></td>
 </tr>
 
 <tr>
 <td><a href="viewListReport.php?coinType=Draped_Bust_Large_Cent" class="brownLink"> Large Cent</a> (1837-1873)</td>
    <td align="center"><input readonly class="rollCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Draped_Bust_Large_Cent', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Draped_Bust_Large_Cent', $userID)?>" /></td>
 </tr>
   
   <tr>
 <td><a href="viewListReport.php?coinType=Draped_Bust_Half_Dime" class="brownLink"> Half Dime</a> (1837-1873)</td>
    <td align="center"><input readonly class="rollCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Draped Bust Half Dime', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Draped Bust Half Dime', $userID)?>" /></td>
 </tr>
 
   <tr>
 <td><a href="viewListReport.php?coinType=Draped_Bust_Dime" class="brownLink"> Dime</a> (1837-1873)</td>
    <td align="center"><input readonly class="rollCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Draped Bust Dime', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Draped Bust Dime', $userID)?>" /></td>
 </tr>
  

 <tr>
  <td><a href="viewListReport.php?coinType=Draped_Bust_Quarter" class="brownLink"> Quarter</a> (1838-1891)</td>
  <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Draped Bust Quarter', $userID); ?>"/ ></td>  
  <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Draped Bust Quarter', $userID);?>" /></td>
</tr>
 
 
 <tr>
    <td><a href="viewListReport.php?coinType=Draped_Bust_Half_Dollar" class="brownLink"> Half Dollar</a> (1839-1891)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Draped Bust Half Dollar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Draped Bust Half Dollar', $userID)?>" /></td>
  </tr>

 <tr>
    <td><a href="viewListReport.php?coinType=Draped_Bust_Dollar" class="brownLink"> Dollar</a> (1836-1873)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Draped Bust Dollar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Draped Bust Dollar', $userID)?>" /></td>
  </tr>
 
 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="smallCentCollectTotals" readonly class="collectCountTotal" type="text" value="<?php echo $CoinDesign->getCollectionCountByDesign($userID, $design); ?>" /></td>
   <td align="center"><input id="valTotals" readonly class="collectCount" type="text" value="<?php echo $CoinDesign->getCoinSumByDesign($userID, $design); ?>" /></td>
 </tr>
 
</table>
<p>
  <select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
    <option selected="selected" value="">View Coin</option>
    <optgroup label="Half Cents">
      <option value="HalfCentGrades.php">Half Cents</option>
      <option value="viewListReport.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
      <option value="viewListReport.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
      <option value="viewListReport.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
      <option value="viewListReport.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
      </optgroup>
    <optgroup label="Large Cents">
      <option value="LargeCentGrades.php">Large Cent</option>
      <option value="viewListReport.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
      <option value="viewListReport.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
      <option value="viewListReport.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
      <option value="viewListReport.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
      <option value="viewListReport.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
      <option value="viewListReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
      </optgroup>
    <optgroup label="Cents">
      <option value="Small_Cent.php">Small Cents</option>
      <option value="viewListReport.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
      <option value="viewListReport.php?coinType=Indian_Head">Indian Head Cent</option>
      <option value="viewListReport.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
      <option value="viewListReport.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
      <option value="viewListReport.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
      <option value="viewListReport.php?coinType=Union_Shield">Union Shield</option>
      </optgroup>
    <optgroup label="Two Cents">
      <option value="Two_Cent.php">Two Cent Grades</option>
      <option value="viewListReport.php?coinType=Two_Cent">Two Cent Piece</option>
      </optgroup>
    <optgroup label="Three Cents">
      <option value="Three_Cent.php">Three Cent</option>
      <option value="viewListReport.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
      <option value="viewListReport.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
      </optgroup>
    <optgroup label="Half Dimes">
      <option value="Half_Dime.php">Half Dime</option>
      <option value="viewListReport.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
      <option value="viewListReport.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
      <option value="viewListReport.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
      <option value="viewListReport.php?coinType=Draped_Bust_Half_Dime">Draped Bust Half Dime</option>
      </optgroup>
    </optgroup>
    <optgroup label="Nickels">
      <option value="Nickel.php">Nickel</option>
      <option value="viewListReport.php?coinType=Shield_Nickel">Sheild</option>
      <option value="viewListReport.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
      <option value="viewListReport.php?coinType=Indian_Head_Nickel">Indian Head</option>
      <option value="viewListReport.php?coinType=Jefferson_Nickel">Jefferson</option>
      <option value="viewListReport.php?coinType=Westward_Journey">Westward Journey</option>
      <option value="viewListReport.php?coinType=Return_to_Monticello">Return to Monticello</option>
      </optgroup>
    <optgroup label="Dimes">
      <option value="Dime.php">Dime</option>
      <option value="viewListReport.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
      <option value="viewListReport.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
      <option value="viewListReport.php?coinType=Draped_Bust_Dime">Liberty Seated Dime</option>
      <option value="viewListReport.php?coinType=Barber_Dime">Barber Dime</option>
      <option value="viewListReport.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
      <option value="viewListReport.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
      </optgroup>
    <optgroup label="Twenty Cents">
      <option value="Twenty_Cent.php">Twenty Cent Grades</option>
      <option value="viewListReport.php?coinCategory=Twenty_Cent_Piece">Twenty Cents</option>
      </optgroup>
    <optgroup label="Quarters">
      <option value="Quarter.php">Quarter</option>
      <option value="viewListReport.php?v=Draped_Bust_Quarter">Draped Bust Quarter</option>
      <option value="viewListReport.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
      <option value="viewListReport.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
      <option value="viewListReport.php?coinType=Barber_Quarter">Barber Quarter</option>
      <option value="viewListReport.php?coinType=Standing_Liberty">Standing Liberty</option>
      <option value="viewListReport.php?coinType=Washington_Quarter">Washington Quarter</option>
      <option value="viewListReport.php?coinType=State Quarter">State Quarter</option>
      <option value="viewListReport.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
      <option value="viewListReport.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
      </optgroup>
    <optgroup label="Half Dollars">
      <option value="Half_Dollar.php">Half Dollar</option>
      <option value="viewListReport.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
      <option value="viewListReport.php?v=Draped_Bust_Half_Dollar">Draped Bust Half</option>
      <option value="viewListReport.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
      <option value="viewListReport.php?v=Draped_Bust_Half_Dollar">Draped Bust Half</option>
      <option value="viewListReport.php?coinType=Barber_Half_Dollar">Barber Half</option>
      <option value="viewListReport.php?coinType=Walking_Liberty">Walking Liberty Half</option>
      <option value="viewListReport.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
      <option value="viewListReport.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
      </optgroup>
    <optgroup label="Dollars">
      <option value="Dollar.php">Dollar</option>
      <option value="viewListReport.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
      <option value="viewListReport.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
      <option value="viewListReport.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
      <option value="viewListReport.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
      <option value="viewListReport.php?coinType=Trade_Dollar">Trade Dollar</option>
      <option value="viewListReport.php?coinType=Morgan_Dollar">Morgan Dollar</option>
      <option value="viewListReport.php?coinType=Peace_Dollar">Peace Dollar</option>
      <option value="viewListReport.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
      <option value="viewListReport.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
      <option value="viewListReport.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
      <option value="viewListReport.php?coinType=Presidential_Dollar">Presidential Dollar</option>
      </optgroup>
</select> 
&nbsp;<br>
<a class="topLink" href="#top">Top</a></p></div>