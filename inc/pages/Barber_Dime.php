 <br />
<div>
<select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Barber Reports</option>
        <option value="reportDesign.php?design=Barber">Barber By  Denomination Reports</option>
        <option value="reportDesignCoins.php?design=Barber">All Barber Coins</option>
    </select></div>
<h3>Type &amp; Variety Collection</h3>
<div class="table-responsive">
  <table class="table">
  <tr valign="top" class="setTwoRow">
  <td><a href="viewCoinType.php?coinType=Barber_Dime"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Barber Dime', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Barber_Dime">Barber Dime</a></td>

<td><a href="viewCoinVersion.php?coinVersion=Barber_Dime_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Barber Dime Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
   <a href="viewCoinVersion.php?coinVersion=Barber_Dime_Proof">Proof</a></td>
  
  </tr>
 </table>
</div>
