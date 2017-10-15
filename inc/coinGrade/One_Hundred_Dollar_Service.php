<table width="483" border="0" class="typeTbl" id="folderTbl">
  <tr class="dateHolder" valign="top">
    <td><h3><a href="viewCertCatReport.php?coinCategory=<?php echo $categoryLink ?>"><?php echo $coinCategory; ?> <?php echo $proService; ?> Certified</a> Type Collection <?php echo $collection->getCertifiedTypeCategoryCount($coinCategory, $userID, $proService) ?> of 1 (<?php echo percent($collection->getCertifiedTypeCategoryCount($coinCategory, $userID, $proService), '1'); ?>%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('One_Ounce_Platinum', $userID, $proService); ?>" width="50" height="50"></td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=One_Ounce_Platinum">One Ounce Platinum</a></td>
    </tr>
 </table>
 <hr />
