 <br />
<div>
<select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Draped Bust Reports</option>
        <option value="reportDesign.php?design=Draped_Bust">Draped Bust By  Denomination</option>
        <option value="reportDesignCoins.php?design=Draped_Bust">All Draped Bust Coins</option>
    </select></div>
<h3>Type &amp; Variety Collection</h3>
<div class="table-responsive">
  <table class="table">
  <tr valign="top" class="setTwoRow">
  <td><a href="viewCoinVersion.php?coinVersion=Draped_Bust_Half_Dollar_Small_Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Draped Bust Half Dollar Small Eagle', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Draped_Bust_Half_Dollar_Small_Eagle">Small Eagle</a></td>
    
<td><a href="viewCoinVersion.php?coinVersion=Draped_Bust_Half_Dollar_Heraldic_Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Draped Bust Half Dollar Heraldic Eagle', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoinVersion.php?coinVersion=Draped_Bust_Half_Dollar_Heraldic_Eagle">Heraldic Eagle</a></td>
  
  </tr>
</table>
</div>