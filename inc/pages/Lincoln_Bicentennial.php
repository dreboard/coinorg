<a href="viewSet.php?ID=274" class="btn btn-primary btn-block" role="button">2009 Lincoln Mint Sets (<?php echo $CollectionSet->getMintsetCountByMintsetID('274', $userID); ?>)</a>
<div class="visible-xs"><br /></div>


<h3>Type &amp; Variety Collection</h3>
<div class="table-responsive">
  <table class="table">
  <tr valign="top" class="setFourRow">
  <td>
  <a href="viewCoinDesign.php?design=Kentucky_Childhood"><img class="coinSwitch" src="../img/<?php echo $collection->getDesignImg('Kentucky_Childhood', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoinDesign.php?design=Kentucky_Childhood">Kentucky Childhood</a> 
</td>
  
  
<td><a href="viewCoinDesign.php?design=Formative_Years"><img class="coinSwitch" src="../img/<?php echo $collection->getDesignImg('Formative_Years', $userID); ?>" alt="" width="100" height="100" /></a><br />
 <a href="viewCoinDesign.php?design=Formative_Years"> Formative Years</a></td>
  
<td><a href="viewCoinDesign.php?design=Professional_Life"><img class="coinSwitch" src="../img/<?php echo $collection->getDesignImg('Professional_Life', $userID); ?>" alt="" width="100" height="100" /></a><br />
 <a href="viewCoinDesign.php?design=Professional_Life">Professional Life</a></td>
  
  
<td><a href="viewCoinDesign.php?design=Presidency"><img class="coinSwitch" src="../img/<?php echo $collection->getDesignImg('Presidency', $userID); ?>" alt="" width="100" height="100" /></a><br />
<a href="viewCoinDesign.php?design=Presidency">Presidency</a></td>
  
  </tr>
  </table>
 </div> 
  
<div class="visible-xs"><br /></div>
  <div>
<select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Double Die Listings</option>
        <option value="viewLincolnVariety.php?design=Kentucky_Childhood">Kentucky Childhood</option>
        <option value="viewLincolnVariety.php?design=Formative_Years"> Formative Years</option>        
        <option value="viewLincolnVariety.php?design=Professional_Life">Professional Life</option>
        <option value="viewLincolnVariety.php?design=Presidency">Presidency</option>
    </select>
    </div> 