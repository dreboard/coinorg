<table width="900" border="0" id="dashboardTbl">
  <tr>
    <td><img src="../img/coinIcon.jpg" width="25" height="24" align="absmiddle" /> <a class="brownLink" href="report.php"><strong>Main Report</strong></a></td>
    <td><img src="../img/chartIcon.jpg" alt="" width="32" height="25" align="absmiddle" /><a href="reportGraph.php" class="brownLink"><strong> Progress Report</strong></a></td>
    <td><img src="../img/printIcon.jpg" alt="" width="32" height="25" align="absmiddle" /><a href="reportPrintCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>" class="brownLink"><strong> Print View</strong></a></td>
    <td><img src="../img/financeIcon.jpg" alt="" width="32" height="25" align="absmiddle" /><a href="reportSpending.php?year=<?php echo date('Y'); ?>	" class="brownLink"><strong> Financial Report</strong></a></td>
    <td><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Category</option>
      <option value="reportSpendingCategory.php?coinCategory=Half_Cent">Half Cents</option>
      <option value="reportSpendingCategory.php?coinCategory=Large_Cent">Large Cent</option>
      <option value="reportSpendingCategory.php?coinCategory=Small_Cent">Small Cents</option>
      <option value="reportSpendingCategory.php?coinCategory=Two_Cent">Two Cent Grades</option>
      <option value="reportSpendingCategory.php?coinCategory=Half_Dime">Half Dime</option>
      <option value="reportSpendingCategory.php?coinCategory=Nickel">Nickel</option>
      <option value="reportSpendingCategory.php?coinCategory=Dime">Dime</option>
      <option value="reportSpendingCategory.php?coinCategory=Twenty_Cent">Twenty Cent Grades</option>
      <option value="reportSpendingCategory.php?coinCategory=Quarter">Quarter</option>
      <option value="reportSpendingCategory.php?coinCategory=Half_Dollar">Half Dollar</option>
      <option value="reportSpendingCategory.php?coinCategory=Dollar">Dollar</option>
    </select></td>
  </tr>
</table>