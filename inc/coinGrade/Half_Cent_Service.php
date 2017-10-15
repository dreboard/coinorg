<table border="0" id="folderTbl" class="typeTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="4"><h3><a href="viewCertCatReport.php?coinCategory=<?php echo $categoryLink ?>"><?php echo $coinCategory; ?> <?php echo $proService; ?> Certified</a> Type Collection <?php echo $collection->getCertifiedTypeCategoryCount($coinCategory, $userID, $proService) ?> of 4 (<?php echo percent($collection->getCertifiedTypeCategoryCount($coinCategory, $userID, $proService), '4'); ?>%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Liberty_Cap_Half_Cent', $userID, $proService); ?>" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Draped_Bust_Half_Cent', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Classic_Head_Half_Cent', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Braided_Hair_Half_Cent', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Draped_Bust_Half_Cent">Indian Head</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Classic_Head_Half_Cent"> Classic Head</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Braided_Hair_Half_Cent"> Braided Hair</a></td>
    </tr>
 </table>
 <hr />
