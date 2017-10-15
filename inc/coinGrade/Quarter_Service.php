<table border="0" id="folderTbl" class="typeTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h3><a href="viewCertCatReport.php?coinCategory=<?php echo $categoryLink ?>"><?php echo $coinCategory; ?> <?php echo $proService; ?> Certified</a> Collection <?php echo $collection->getCertifiedTypeCategoryCount($coinCategory, $userID, $proService) ?> of 9 (<?php echo percent($collection->getCertifiedTypeCategoryCount($coinCategory, $userID, $proService), '9'); ?>%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Draped_Bust_Quarter', $userID, $proService); ?>" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Liberty_Cap_Quarter', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Seated_Liberty_Quarter', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Barber_Quarter', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Standing_Liberty', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Washington_Quarter', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Draped_Bust_Quarter">Draped Bust</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Liberty_Cap_Quarter">Liberty Cap</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Seated_Liberty_Quarter">Seated Liberty</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Barber_Quarter">Barber</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Standing_Liberty">Standing Liberty</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Washington_Quarter">Washington</a></td>
    </tr>
      <tr class="dateHolder" valign="top"> 
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('State_Quarter', $userID, $proService); ?>" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('District_of_Columbia_and_US_Territories', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('America_the_Beautiful_Quarter', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle">&nbsp;</td>
  <td height="100" align="center" valign="middle">&nbsp;</td>
  <td align="center" valign="middle">&nbsp;</td>
  </tr>
    <tr class="dateHolder" valign="top">
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=State_Quarter">Statehood</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=District_of_Columbia_and_US_Territories">DC & Territories</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=America_the_Beautiful_Quarter"> America</a></td>
    <td align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">&nbsp;</td>
    </tr>
 </table>
 <hr />
