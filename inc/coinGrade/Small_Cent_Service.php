<table border="0" id="folderTbl" class="typeTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h3><a href="viewCertCatReport.php?coinCategory=<?php echo $categoryLink ?>"><?php echo $coinCategory; ?> <?php echo $proService; ?> Certified</a> Type Collection <?php echo $collection->getCertifiedTypeCategoryCount($coinCategory, $userID, $proService) ?> of 6 (<?php echo percent($collection->getCertifiedTypeCategoryCount($coinCategory, $userID, $proService), '6'); ?>%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Flying_Eagle', $userID, $proService); ?>" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Indian_Head', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Lincoln_Wheat', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Lincoln_Memorial', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Lincoln_Bicentennial', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Union_Shield', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Flying_Eagle">Flying Eagle</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Indian_Head">Indian Head</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Lincoln_Wheat">Lincoln Wheat</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Lincoln_Memorial">Lincoln Memorial</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Union_Shield">Union Shield</a></td>
    </tr>
 </table>
 <hr />
