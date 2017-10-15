<!--<table width="900" border="0" id="dashboardTbl">
  <tr>
    <td><img src="../img/coinIcon.jpg" width="25" height="24" align="absmiddle" /> <a class="brownLink" href="reportGold.php"><strong>Main Report</strong></a></td>
    <td><img src="../img/chartIcon.jpg" alt="" width="32" height="25" align="absmiddle" /><a href="reportGoldGraph.php" class="brownLink"><strong> Progress Report</strong></a></td>
    <td><img src="../img/printIcon.jpg" alt="" width="32" height="25" align="absmiddle" /><a href="reportPrintCategory.php?coinCategory=<?php //echo str_replace(' ', '_', $coinCategory) ?>" class="brownLink"><strong> Print View</strong></a></td>
    <td><img src="../img/financeIcon.jpg" alt="" width="32" height="25" align="absmiddle" /><a href="reportGoldSpending.php" class="brownLink"><strong> Financial Report</strong></a></td>
    <td><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Category</option>
      <option value="reportSpendingCategory.php?coinCategory=Gold_Dollar">Dollar</option>
      <option value="reportSpendingCategory.php?coinCategory=Quarter_Eagle">Quarter_Eagle</option>
      <option value="reportSpendingCategory.php?coinCategory=Three_Dollar">Three_Dollar</option>
      <option value="reportSpendingCategory.php?coinCategory=Four_Dollar">Four_Dollar Grades</option>
      <option value="reportSpendingCategory.php?coinCategory=Five_Dollar">Five_Dollar</option>
      <option value="reportSpendingCategory.php?coinCategory=Ten_Dollar">Ten_Dollar</option>
      <option value="reportSpendingCategory.php?coinCategory=Twenty_Dollar">Twenty_Dollar</option>
      <option value="reportSpendingCategory.php?coinCategory=Fifty_Dollar">Fifty Dollar</option>
    </select></td>
  </tr>
</table>-->




<div class="visible-xs">
<a href="reportGoldGraph.php" class="btn btn-primary btn-block" role="button">Progress Report</a>
    <a href="reportGoldSpending.php" class="btn btn-primary btn-block" role="button">Financial Report</a>
    <br>

<select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Gold Categories</option>
      <option value="reportSpendingCategory.php?coinCategory=Gold_Dollar">Dollar</option>
      <option value="reportSpendingCategory.php?coinCategory=Quarter_Eagle">Quarter_Eagle</option>
      <option value="reportSpendingCategory.php?coinCategory=Three_Dollar">Three_Dollar</option>
      <option value="reportSpendingCategory.php?coinCategory=Four_Dollar">Four_Dollar Grades</option>
      <option value="reportSpendingCategory.php?coinCategory=Five_Dollar">Five_Dollar</option>
      <option value="reportSpendingCategory.php?coinCategory=Ten_Dollar">Ten_Dollar</option>
      <option value="reportSpendingCategory.php?coinCategory=Twenty_Dollar">Twenty_Dollar</option>
      <option value="reportSpendingCategory.php?coinCategory=Fifty_Dollar">Fifty Dollar</option>
    </select>
</div>




<div class="row hidden-xs">
  <div class="col-xs-3">
    <a href="addCoinRaw.php" class="btn btn-primary" role="button">Return to Coin Types</a>
  </div>
  <div class="col-xs-3">
    <a href="reportGoldSpending.php" class="btn btn-primary" role="button">Financial Report</a>
  </div>
  <div class="col-xs-4">
    <select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Gold Categories</option>
      <option value="reportSpendingCategory.php?coinCategory=Gold_Dollar">Dollar</option>
      <option value="reportSpendingCategory.php?coinCategory=Quarter_Eagle">Quarter_Eagle</option>
      <option value="reportSpendingCategory.php?coinCategory=Three_Dollar">Three_Dollar</option>
      <option value="reportSpendingCategory.php?coinCategory=Four_Dollar">Four_Dollar Grades</option>
      <option value="reportSpendingCategory.php?coinCategory=Five_Dollar">Five_Dollar</option>
      <option value="reportSpendingCategory.php?coinCategory=Ten_Dollar">Ten_Dollar</option>
      <option value="reportSpendingCategory.php?coinCategory=Twenty_Dollar">Twenty_Dollar</option>
      <option value="reportSpendingCategory.php?coinCategory=Fifty_Dollar">Fifty Dollar</option>
    </select>
  </div>
</div>





