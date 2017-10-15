<table border="0" id="folderTbl" class="typeTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h3>Half Dollar <?php echo $proService; ?> Certified Collection <?php echo $collection->getCertifiedTypeCategoryCount($coinCategory, $userID, $proService) ?> of 8 (<?php echo percent($collection->getCertifiedTypeCategoryCount($coinCategory, $userID, $proService), '8'); ?>%)</h3></td>
  </tr>
  <tr class="dateHolder" valign="top"> 
    <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Flowing_Hair_Half_Dollar', $userID, $proService); ?>" width="50" height="50"></td>
    <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Draped_Bust_Half_Dollar', $userID, $proService); ?>" alt="" width="50" height="50"></td>
    <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Liberty_Cap_Half_Dollar', $userID, $proService); ?>" alt="" width="50" height="50"></td>
    <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Seated_Liberty_Half_Dollar', $userID, $proService); ?>" alt="" width="50" height="50"></td>
    <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Barber_Half_Dollar', $userID, $proService); ?>" alt="" width="50" height="50"></td>
    <td align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Walking_Liberty', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Draped_Bust_Half_Dollar">Draped Bust</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Seated_Liberty_Half_Dollar">Seated Liberty</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Barber_Half_Dollar">Barber</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Walking_Liberty">Walking Liberty </a></td>
    </tr>
      <tr class="dateHolder" valign="top"> 
  <td height="100" align="center" valign="middle">&nbsp;</td>
  <td height="100" align="center" valign="middle">&nbsp;</td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Franklin_Half_Dollar', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle" class="certBgRow"><img src="../img/<?php echo $collection->getCertTypeReportImage('Kennedy_Half_Dollar', $userID, $proService); ?>" alt="" width="50" height="50"></td>
  <td height="100" align="center" valign="middle">&nbsp;</td>
  <td align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Franklin_Half_Dollar">Franklin</a></td>
    <td align="center" valign="middle"><a href="viewGradeReport.php?coinType=Kennedy_Half_Dollar">Kennedy</a></td>
    <td align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">&nbsp;</td>
    </tr>
 </table>
 <hr />
