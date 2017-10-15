 <br />
<div>
<select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Liberty Cap Reports</option>
        <option value="reportDesign.php?design=Liberty_Cap">Liberty Cap By  Denomination Reports</option>
        <option value="reportDesignCoins.php?design=Liberty_Cap">All Liberty Cap Coins</option>
    </select></div>
<h3>Type &amp; Variety Collection</h3>
<div class="table-responsive">
  <table class="table">
  <tr valign="top" class="setThreeRow">
  <td><a href="viewCoinVersion.php?coinVersion=Liberty_Cap_Half_Dollar_50_C_Reverse"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Liberty Cap Half Dollar 50 C Reverse', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Liberty_Cap_Half_Dollar_50_C_Reverse">50 C Reverse</a></td>
  
    <td><a href="viewCoinVersion.php?coinVersion=Liberty_Cap_Half_Dollar_50_Reverse"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Liberty Cap Half Dollar 50 Reverse', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Liberty_Cap_Half_Dollar_50_Reverse">50 Cents Reverse</a></td>
  
<td><a href="viewCoinVersion.php?coinVersion=Liberty_Cap_Half_Dollar_Half_Reverse"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Liberty Cap Half Dollar Half Reverse', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoinVersion.php?coinVersion=Liberty_Cap_Half_Dollar_Half_Reverse">Half Dol Reverse</a></td>
  
  </tr>
 </table>
</div>