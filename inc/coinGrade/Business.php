<h3>Business Strikes <?php echo $Grade->getStrikeCountByCoinID($coinID, $userID, $strike='Business') ?></h3>
<p><strong>Highest Grade: </strong><?php echo $Grade->getBusinessHighGradeNumberByCoinID($coinID, $userID, $strike='Business') ?><br />
  <strong>Total Graded:</strong> <?php echo $Grade->getTotalTypeGradeByCoinID($strike='Business', $coinID, $userID); ?><br />
  <strong>Total Certified:</strong> <?php echo $Grade->getTotalTypeProGradeByCoinID($strike='Business', $coinID, $userID); ?></p>
<table width="990" border="0" cellpadding="3">
  <tr class="keyRow">
    <td width="8%">&nbsp;</td>
    <td width="11%" align="center"><strong>Basal 0</strong></td>
    <td width="9%" align="center"><strong>PO-1</strong></td>
    <td width="8%" align="center"><strong>FR-2</strong></td>
    <td width="8%" align="center"><strong>AG-3</strong></td>
    <td width="8%" align="center"><strong>G-4</strong></td>
    <td width="8%" align="center"><strong>G-6</strong></td>
    <td width="8%" align="center"><strong>VG-8</strong></td>
    <td width="10%" align="center"><strong>VG-10</strong></td>
    <td width="9%" align="center"><strong>F-12</strong></td>
    <td width="9%" align="center"><strong>F-15</strong></td>
  </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=B0&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('B0', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=P1&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('P1', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=FR2&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('FR2', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=AG3&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('AG3', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=G4&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('G4', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=G6&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('G6', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=VG8&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('VG8', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=VG10&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('VG10', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=F12&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('F12', $coinID ,$userID); ?></a></td>
    <td width="9%" align="center"><a href="viewCoinByGrade.php?coinGrade=F15&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('F15', $coinID ,$userID); ?></a></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=B0&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('B0', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=P1&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('P1', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=FR2&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('FR2', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=AG3&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('AG3', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=G4&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('G4', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=G6&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('G6', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=VG8&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('VG8', $coinID ,$userID); ?></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=VG10&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('VG10', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=F12&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('F12', $coinID ,$userID); ?></a></td>
    <td width="9%" align="center"><a href="viewCoinByProGrade.php?coinGrade=F15&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('F15', $coinID,$userID); ?></a></td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('B0', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('P1', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('FR2', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('AG3', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('G4', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('G6', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('VG8', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('VG10', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('F12', $coinID, $userID) ?></strong></td>
    <td width="9%" align="center"><strong><?php echo $Grade->getTotalCoinGrade('F15', $coinID, $userID) ?></strong></td>
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
    <td width="8%">&nbsp;</td>
    <td width="11%" align="center"><strong>VF-20</strong></td>
    <td width="9%" align="center"><strong>VF-25</strong></td>
    <td width="8%" align="center"><strong>VF-30</strong></td>
    <td width="8%" align="center"><strong>VF-35</strong></td>
    <td width="8%" align="center"><strong>EF-40</strong></td>
    <td width="8%" align="center"><strong>EF-45</strong></td>
    <td width="8%" align="center"><strong>AU-50</strong></td>
    <td width="10%" align="center"><strong>AU-53</strong></td>
    <td width="10%" align="center"><strong>AU-55</strong></td>
    <td width="9%" align="center"><strong>AU-58</strong></td>
  </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=VF20&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('VF20', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=VF25&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('VF25', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=VF30&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('VF30', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=VF35&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('VF35', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=EF40&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('EF40', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=EF45&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('EF45', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=AU50&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('AU50', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=AU53&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('AU53', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=AU55&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('AU55', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=AU58&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('AU58', $coinID ,$userID); ?></a></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=VF20&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('VF20', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=VF25&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('VF25', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=VF30&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('VF30', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=VF35&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('VF35', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=EF40&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('EF40', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=EF45&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('EF45', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=AU50&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('AU50', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=AU53&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('AU53', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=AU55&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('AU55', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=AU58&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('AU58', $coinID ,$userID); ?></a></td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('VF20', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('VF25', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('VF30', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('VF35', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('EF40', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('EF45', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('AU50', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('AU53', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('AU55', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('AU58', $coinID, $userID) ?></strong></td>
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
    <td width="9%" align="center"><strong>MS-60</strong></td>
    <td align="center"><strong>MS-61</strong></td>
    <td align="center"><strong>MS-62</strong></td>
    <td align="center"><strong>MS-63</strong></td>
    <td align="center"><strong>MS-64</strong></td>
    <td align="center"><strong>MS-65</strong></td>
    <td align="center"><strong>MS-66</strong></td>
    <td align="center"><strong>MS-67</strong></td>
    <td align="center"><strong>MS-68</strong></td>
    <td align="center"><strong>MS-69</strong></td>
  </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td width="9%" align="center"><a href="viewCoinByGrade.php?coinGrade=MS60&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('MS60', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=FR2&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('MS61', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=FR2&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('MS62', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=FR2&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('MS63', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=FR2&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('MS64', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=FR2&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('MS65', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=FR2&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('MS66', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=FR2&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('MS67', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=FR2&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('MS68', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByGrade.php?coinGrade=FR2&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('MS69', $coinID ,$userID); ?></a></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td width="9%" align="center"><a href="viewCoinByProGrade.php?coinGrade=MS60&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('MS60', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=MS61&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('MS61', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=MS62&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('MS62', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=MS63&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('MS63', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=MS64&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('MS64', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=MS65&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('MS65', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=MS66&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('MS66', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=MS67&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('MS67', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=MS68&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('MS68', $coinID,$userID); ?></a></td>
    <td align="center"><a href="viewCoinByProGrade.php?coinGrade=MS69&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('MS69', $coinID ,$userID); ?></a></td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td width="9%" align="center"><strong><?php echo $Grade->getTotalCoinGrade('MS60', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('MS61', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('MS62', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('MS63', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('MS64', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('MS65', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('MS66', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('MS67', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('MS68', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Grade->getTotalCoinGrade('MS69', $coinID, $userID) ?></strong></td>
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
      <td width="9%" align="center"><strong>MS-70</strong></td>
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
    <tr>
    <td><strong>Raw</strong></td>
    <td width="9%" align="center"><a href="viewCoinByGrade.php?coinGrade=FR2&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getCoinIDGrade('MS70', $coinID ,$userID); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td width="9%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td width="9%" align="center"><a href="viewCoinByProGrade.php?coinGrade=MS70&amp;coinID=<?php echo $coinID; ?>"><?php echo $Grade->getProCoinGrade('MS70', $coinID ,$userID); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td width="9%" align="center">&nbsp;</td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td width="9%" align="center"><strong><?php echo $Grade->getTotalCoinGrade('MS70', $coinID, $userID) ?></strong></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td width="9%" align="center">&nbsp;</td>
  </tr>
</table>