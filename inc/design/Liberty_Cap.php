<table width="100%" border="0" cellpadding="3" class="typeTbl" id="folderTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="8"><h2><?php echo $design ?> Type Collection <?php echo $CoinDesign->getSeatedTypeCollectionProgress($userID, $design) ?> of 6 (<?php echo percent($CoinDesign->getSeatedTypeCollectionProgress($userID, $design), '6'); ?>%)</h2></td>
    </tr>
  <tr class="dateHolder" valign="top">
    <td align="center"><a href="viewListReport.php?coinType=Liberty_Cap_Half_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Liberty_Cap_Half_Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewListReport.php?coinType=Liberty_Cap_Half_Cent">Half Cent</a></td>
    
    <td align="center"><a href="viewListReport.php?coinType=Liberty_Cap_Large_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Liberty_Cap_Large_Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewListReport.php?coinType=Liberty_Cap_Large_Cent">Large Cent</a></td>
    
    <td align="center"><a href="viewListReport.php?coinType=Liberty_Cap_Half_Dime"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Liberty_Cap_Half_Dime', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Liberty_Cap_Half_Dime">Half Dime</a></td>
       

<td align="center"><a href="viewListReport.php?coinType=Liberty_Cap_Dime"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Liberty_Cap_Dime', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Liberty_Cap_Dime">Dime</a></td>
  
<td align="center"><a href="viewListReport.php?coinType=Liberty_Cap_Quarter"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Liberty_Cap_Quarter', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Liberty_Cap_Quarter">Quarter</a></td>
  
<td align="center"><a href="viewListReport.php?coinType=Liberty_Cap_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Liberty_Cap_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Liberty_Cap_Half_Dollar">Half Dollar</a></td>
  
  
  
  </tr>
</table>

  <h1>Coins</h1>
<div class="roundedWhite">
  <table width="100%" border="1" cellpadding="3" id="masterCountTbl">
    <tr>
    <td width="450" class="darker"><?php echo $design ?> Types</td>
    <td width="247" align="center" class="darker">Collected </td>    
    <td width="267" align="center" class="darker"> Investment</td>
  </tr>
<tr>
 <td><a href="viewListReport.php?coinType=Liberty_Cap_Half_Cent" class="brownLink"> Half Cent</a> (1837-1873)</td>
    <td align="center"><input readonly class="rollCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Liberty_Cap_Half_Cent', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty_Cap_Half_Cent', $userID)?>" /></td>
 </tr>
 
 <tr>
 <td><a href="viewListReport.php?coinType=Liberty_Cap_Large_Cent" class="brownLink"> Large Cent</a> (1837-1873)</td>
    <td align="center"><input readonly class="rollCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Liberty_Cap_Large_Cent', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty_Cap_Large_Cent', $userID)?>" /></td>
 </tr>
   
   <tr>
 <td><a href="viewListReport.php?coinType=Liberty_Cap_Half_Dime" class="brownLink"> Half Dime</a> (1837-1873)</td>
    <td align="center"><input readonly class="rollCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Liberty_Cap_Half_Dime', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty_Cap_Half_Dime', $userID)?>" /></td>
 </tr>
 
   <tr>
 <td><a href="viewListReport.php?coinType=Liberty_Cap_Dime" class="brownLink"> Dime</a> (1837-1873)</td>
    <td align="center"><input readonly class="rollCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Liberty_Cap_Dime', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty_Cap_Dime', $userID)?>" /></td>
 </tr>
  

 <tr>
  <td><a href="viewListReport.php?coinType=Liberty_Cap_Quarter" class="brownLink"> Quarter</a> (1838-1891)</td>
  <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Liberty_Cap_Quarter', $userID); ?>"/ ></td>  
  <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty_Cap_Quarter', $userID);?>" /></td>
</tr>
 
 
 <tr>
    <td><a href="viewListReport.php?coinType=Liberty_Cap_Half_Dollar" class="brownLink"> Half Dollar</a> (1839-1891)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Liberty_Cap_Half_Dollar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty_Cap_Half_Dollar', $userID)?>" /></td>
  </tr>
 
 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="smallCentCollectTotals" readonly class="collectCountTotal" type="text" value="<?php echo $CoinDesign->getCollectionCountByDesign($userID, $design); ?>" /></td>
   <td align="center"><input id="valTotals" readonly class="collectCount" type="text" value="<?php echo $CoinDesign->getCoinSumByDesign($userID, $design); ?>" /></td>
 </tr>
 
</table>
<p>&nbsp;<br>
<a class="topLink" href="#top">Top</a></p></div>