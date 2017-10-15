<h3>Type &amp; Variety Collection</h3>
<div class="table-responsive">
  <table class="table">
  <tr valign="top" class="setThreeRow">
  <td align="center"><a href="viewCoinVersion.php?coinVersion=Lincoln_Wheat"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Lincoln Wheat', $userID); ?>" alt="" width="100" height="100" /></a><br />
<a href="viewCoinVersion.php?coinVersion=Lincoln_Wheat">Lincoln Wheat</a>
</td>
  <td align="center"><a href="viewCoinVersion.php?coinVersion=Lincoln_Wheat_Steel"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Lincoln Wheat Steel', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Lincoln_Wheat_Steel">Lincoln Wheat Steel</a></td>
  
<td align="center"><a href="viewCoinVersion.php?coinVersion=Lincoln_Wheat_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Lincoln Wheat Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoinVersion.php?coinVersion=Lincoln_Wheat_Proof">Lincoln Wheat Proof</a></td>
  </tr>
  </table>
</div>

<div class="visible-xs"><br /></div>
<div class="well well-sm hidden-xs">
<a href="coinTypeVariety.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>" class="btn btn-default btn-block" role="button">View Full Variety Sheet</a>  
  
 <a href="lincolnBIE.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>&view=Album" class="btn btn-default btn-block" role="button">'BIE' Collection</a> 
 
<a href="weakDReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>&view=Album" class="btn btn-default btn-block" role="button">No/Weak D Collection</a> 
</div>

<!-- Single button -->
<div class="btn-group visible-xs">
<select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Other Views</option>
     
      <option value="coinTypeVariety.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>">View Full Variety Sheet</option>
   
    <option value="lincolnBIE.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>&view=Album">'BIE' Collection</option>
    
    <option value="weakDReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>&view=Album">No/Weak D Collection</option>  
    
</select>      
</div>