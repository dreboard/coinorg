<h3>Proofs <?php echo $Grade->getStrikeCountByCoinID($coinID, $userID, $strike='Proof') ?></h3>
<table width="100%" border="0">
  <tr>
    <td width="16%"><strong>Highest Grade:</strong></td>
    <td width="13%"><?php echo $Grade->getBusinessHighGradeNumberByCoinID($coinID, $userID, $strike='Proof') ?></td>
    <td width="12%" align="center">
    <?php if (in_array($coin->getCoinType(), $deepCameoTypes)) {?>
    <strong>DCAM</strong>
    <?php } else { echo ''; }  ?>
    </td>
    <td width="12%" align="center">
    <?php if (in_array($coin->getCoinType(), $cameoTypes)) {?>
    <strong>CAM</strong>
    <?php } else { echo ''; }  ?>
    </td>
    <td width="47%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Graded:</strong></td>
    <td><?php echo $Grade->getTotalTypeGradeByCoinID($strike='Proof', $coinID, $userID); ?></td>
    <td align="center">   
     <?php if (in_array($coin->getCoinType(), $deepCameoTypes)) {
		 echo $Grade->getProofCameoCoinIDCount($coinID, $userID, $designation='DCAM');
		 } else { echo ''; }  ?></td>
    <td align="center">
        <?php if (in_array($coin->getCoinType(), $cameoTypes)) {
			echo $Grade->getProofCameoCoinIDCount($coinID, $userID, $designation='CAM');
			} else { echo ''; }  ?>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Certified:</strong></td>
    <td><?php echo $Grade->getTotalTypeProGradeByCoinID($strike='Proof', $coinID, $userID); ?></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<br />

<table width="990" border="0" cellpadding="3">
  <tr class="keyRow">
    <td>&nbsp;</td>
    <td align="center"><strong>PR-35</strong></td>
    <td align="center"><strong>PR-40</strong></td>
    <td align="center"><strong>PR-45</strong></td>
    <td align="center"><strong>PR-50</strong></td>
    <td align="center"><strong>PR-55</strong></td>
    <td align="center"><strong>PR-58</strong></td>
    <td align="center"><strong>PR-60</strong></td>
    <td align="center"><strong>PR-61</strong></td>
    <td align="center"><strong>PR-62</strong></td>
    <td align="center"><strong>PR-63</strong></td>
  </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=PR35&coinID=<?php echo $coinID ?>"><?php echo $Grade->getCoinIDGrade('PR35', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=PR40&coinID=<?php echo $coinID ?>"><?php echo $Grade->getCoinIDGrade('PR40', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=PR45&coinID=<?php echo $coinID ?>"><?php echo $Grade->getCoinIDGrade('PR45', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=PR50&coinID=<?php echo $coinID ?>"><?php echo $Grade->getCoinIDGrade('PR50', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=PR55&coinID=<?php echo $coinID ?>"><?php echo $Grade->getCoinIDGrade('PR55', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=PR58&coinID=<?php echo $coinID ?>"><?php echo $Grade->getCoinIDGrade('PR58', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=PR60&coinID=<?php echo $coinID ?>"><?php echo $Grade->getCoinIDGrade('PR60', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=PR61&coinID=<?php echo $coinID ?>"><?php echo $Grade->getCoinIDGrade('PR61', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=PR62&coinID=<?php echo $coinID ?>"><?php echo $Grade->getCoinIDGrade('PR62', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=PR63&coinID=<?php echo $coinID ?>"><?php echo $Grade->getCoinIDGrade('PR63', $coinID, $userID); ?></a></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR35&coinID=<?php echo $coinID ?>"><?php echo $Grade->getProCoinGrade('PR35', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR40&coinID=<?php echo $coinID ?>"><?php echo $Grade->getProCoinGrade('PR40', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR45&coinID=<?php echo $coinID ?>"><?php echo $Grade->getProCoinGrade('PR45', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR50&coinID=<?php echo $coinID ?>"><?php echo $Grade->getProCoinGrade('PR50', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR55&coinID=<?php echo $coinID ?>"><?php echo $Grade->getProCoinGrade('PR55', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR58&coinID=<?php echo $coinID ?>"><?php echo $Grade->getProCoinGrade('PR58', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR60&coinID=<?php echo $coinID ?>"><?php echo $Grade->getProCoinGrade('PR60', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR61&coinID=<?php echo $coinID ?>"><?php echo $Grade->getProCoinGrade('PR61', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR62&coinID=<?php echo $coinID ?>"><?php echo $Grade->getProCoinGrade('PR62', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR63&coinID=<?php echo $coinID ?>"><?php echo $Grade->getProCoinGrade('PR63', $coinID, $userID); ?></a></td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('PR35', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('PR40', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('PR45', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('PR50', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('PR55', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('PR58', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('PR60', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('PR61', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('PR62', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('PR63', $coinID, $userID) ?></strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr class="keyRow">
    <td>&nbsp;</td>
    <td align="center"><strong>PR-64</strong></td>
    <td align="center"><strong>PR-65</strong></td>
    <td align="center"><strong>PR-66</strong></td>
    <td align="center"><strong>PR-67</strong></td>
    <td align="center"><strong>PR-68</strong></td>
    <td align="center"><strong>PR-69</strong></td>
    <td align="center"><strong>PR-70</strong></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=PR64&coinID=<?php echo $coinID ?>"><?php echo $Grade->getCoinIDGrade('PR64', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=PR65&coinID=<?php echo $coinID ?>"><?php echo $Grade->getCoinIDGrade('PR65', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=PR66&coinID=<?php echo $coinID ?>"><?php echo $Grade->getCoinIDGrade('PR66', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=PR67&coinID=<?php echo $coinID ?>"><?php echo $Grade->getCoinIDGrade('PR67', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=PR68&coinID=<?php echo $coinID ?>"><?php echo $Grade->getCoinIDGrade('PR68', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=PR69&coinID=<?php echo $coinID ?>"><?php echo $Grade->getCoinIDGrade('PR69', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=PR70&coinID=<?php echo $coinID ?>"><?php echo $Grade->getCoinIDGrade('PR70', $coinID, $userID); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR64&coinID=<?php echo $coinID ?>"><?php echo $Grade->getProCoinGrade('PR64', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR65&coinID=<?php echo $coinID ?>"><?php echo $Grade->getProCoinGrade('PR65', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR66&coinID=<?php echo $coinID ?>"><?php echo $Grade->getProCoinGrade('PR66', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR67&coinID=<?php echo $coinID ?>"><?php echo $Grade->getProCoinGrade('PR67', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR68&coinID=<?php echo $coinID ?>"><?php echo $Grade->getProCoinGrade('PR68', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR69&coinID=<?php echo $coinID ?>"><?php echo $Grade->getProCoinGrade('PR69', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=PR70&coinID=<?php echo $coinID ?>"><?php echo $Grade->getProCoinGrade('PR70', $coinID, $userID); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('PR64', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('PR65', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('PR66', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('PR67', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('PR68', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('PR69', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('PR70', $coinID, $userID) ?></strong></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>