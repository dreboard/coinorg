
 
<table width="539" border="0" class="typeTbl" id="folderTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h3><a href="viewCertCatReport.php?coinCategory=<?php echo $categoryLink ?>"><?php echo $coinCategory; ?> <?php echo $proService; ?> Certified</a>  Collection <?php echo $collection->getCertifiedTypeCategoryCount($coinCategory, $userID, $proService) ?> of 6 (<?php echo percent($collection->getCertifiedTypeCategoryCount($coinCategory, $userID, $proService), '6'); ?>%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Flowing_Hair_Half_Dime', $userID, $proService); ?>" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Draped_Bust_Half_Dime', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Liberty_Cap_Half_Dime', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Seated_Liberty_Half_Dime', $userID, $proService); ?>" alt="" width="50" height="50"></td>

  </tr>
  <tr class="dateHolder" valign="top">
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Draped_Bust_Half_Dime">Draped Bust</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Liberty_Cap_Half_Dime"> Liberty Cap</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Seated_Liberty_Half_Dime"> Seated Liberty</a></td>

    </tr>
 </table>
 <hr />
