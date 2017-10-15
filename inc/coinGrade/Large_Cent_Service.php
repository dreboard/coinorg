<table border="0" id="folderTbl" class="typeTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h3><a href="viewCertCatReport.php?coinCategory=<?php echo $categoryLink ?>"><?php echo $coinCategory; ?> Certified</a> Type Collection <?php echo $collection->getCertifiedTypeCategoryCount($coinCategory, $userID, $proService) ?> of 6 (<?php echo percent($collection->getCertifiedTypeCategoryCount($coinCategory, $userID, $proService), '6'); ?>%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Flowing_Hair_Large_Cent', $userID, $proService); ?>" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Liberty_Cap_Large_Cent', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Draped_Bust_Large_Cent', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Classic_Head_Large_Cent', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Coronet_Liberty_Head_Large_Cent', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Braided_Hair_Liberty_Head_Large_Cent', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Draped_Bust_Large_Cent">Draped Bust</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Classic_Head_Large_Cent">Classic Head</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet  Head</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair</a></td>
    </tr>
 </table>
 <hr />
