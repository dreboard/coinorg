<table border="0" id="folderTbl" class="typeTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h3><a href="viewCertCatReport.php?coinCategory=<?php echo $categoryLink ?>"><?php echo $coinCategory; ?> <?php echo $proService; ?> Certified</a> Type Collection <?php echo $collection->getCertifiedTypeCategoryCount($coinCategory, $userID, $proService) ?> of 6 (<?php echo percent($collection->getCertifiedTypeCategoryCount($coinCategory, $userID, $proService), '6'); ?>%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Shield_Nickel', $userID, $proService); ?>" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Liberty_Head_Nickel', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Indian_Head_Nickel', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Jefferson_Nickel', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Westward_Journey', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Return_to_Monticello', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Shield_Nickel">Shield</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Liberty_Head_Nickel">Liberty Head</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Indian_Head_Nickel"> Indian Head</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Jefferson_Nickel"> Jefferson</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Westward_Journey"> Westward</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Return_to_Monticello"> Monticello</a></td>
    </tr>
 </table>
 <hr />