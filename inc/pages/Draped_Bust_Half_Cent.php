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
  <tr valign="top" class="setOneRow">
  <td>
    <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Draped_Bust_Half_Cent', $userID); ?>" alt="" width="100" height="100" /><br /> 
    <br />(1800-1808)</td>
  </tr>
 </table>