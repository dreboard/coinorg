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
  <tr valign="top" class="setFourRow">
  <td><a href="viewCoinDesignType.php?designType=Barber_Quarter_Type_I"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Barber Quarter Type I', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span><a href="viewCoinDesignType.php?designType=Barber_Quarter_Type_I">Type I <br />
  1892</a></td>
  <td><a href="viewCoinDesignType.php?designType=Barber_Quarter_Type_II"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Barber Quarter Type II', $userID); ?>" alt="" width="100" height="100" /></a><br /> 
    <a href="viewCoinDesignType.php?designType=Barber_Quarter_Type_II">Type II <br />
    1892-1900</a></td>
  
  <td><a href="viewCoinDesignType.php?designType=Barber_Quarter_Type_III"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Barber Quarter Type III', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinDesignType.php?designType=Barber_Quarter_Type_III">Type III<br />
  1901-1916</a></td>
  
<td><a href="viewCoinVersion.php?coinVersion=Barber_Quarter_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Barber Quarter Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
   <a href="viewCoinVersion.php?coinVersion=Barber_Quarter_Proof">Proof</a></td>
  
  </tr>
 </table>
</div>