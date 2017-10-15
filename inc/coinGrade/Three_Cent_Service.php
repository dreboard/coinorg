<table width="582" border="0" class="typeTbl" id="folderTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="2" align="center"><h3><a href="viewCertCatReport.php?coinCategory=<?php echo $categoryLink ?>"><?php echo $coinCategory; ?> <?php echo $proService; ?> Certified</a>  Collection <?php echo $collection->getCertifiedTypeCategoryCount($coinCategory, $userID, $proService) ?> of 2 (<?php echo percent($collection->getCertifiedTypeCategoryCount($coinCategory, $userID, $proService), '2'); ?>%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td width="284" height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Silver_Three_Cent', $userID, $proService); ?>" alt="" width="50" height="50" /></td>
  <td width="288" height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Nickel_Three_Cent', $userID, $proService); ?>" alt="" width="50" height="50" /></td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Silver_Three_Cent">Silver</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Nickel_Three_Cent">Nickel</a></td>
    </tr>
 </table>
 <hr />
