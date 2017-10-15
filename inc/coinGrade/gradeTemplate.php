<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
   <hr />

<h3>Business Strikes <?php echo $collection->getStrikeCountByCoinID($coinID, $userID, $strike='Business') ?></h3>
<p><strong>Highest Grade: </strong><?php echo $collection->getBusinessHighGradeNumberByType($coinID, $userID, $strike='Business') ?><br />
  <strong>Total Graded:</strong> <?php echo $collection->getTotalCoinGradeByStrike($strike='Business', $coinID, $userID); ?><br />
  <strong>Total Certified:</strong> <?php echo $collection->getTotalTypeProGradeByStrike($strike='Business', $coinID, $userID); ?></p>
<table width="100%" border="0" cellpadding="3">
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
    <td align="center"><a href="viewGradeType.php?coinGrade=B0&amp;coinID=<?php echo $categoryLink; ?>"><?php echo $collection->getCoinIDGrade('B0', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=P1&amp;coinID=<?php echo $categoryLink; ?>"><?php echo $collection->getCoinIDGrade('P1', $coinID ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('FR2', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('AG3', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('G4', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('G6', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('VG8', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('VG10', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('F12', $coinID ,$userID); ?></td>
    <td width="9%" align="center"><?php echo $collection->getCoinIDGrade('F15', $coinID ,$userID); ?></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><?php echo $collection->getProGrade('B0', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('P1', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('FR2', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('AG3', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('G4', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('G6', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('VG8', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('VG10', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('F12', $coinID ,$userID); ?></td>
    <td width="9%" align="center"><?php echo $collection->getProGrade('F15', $coinID,$userID); ?></td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('B0', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('P1', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('FR2', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('AG3', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('G4', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('G6', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('VG8', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('VG10', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('F12', $coinID, $userID) ?></strong></td>
    <td width="9%" align="center"><strong><?php echo $collection->getTotalCoinGrade('F15', $coinID, $userID) ?></strong></td>
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
    <td width="10%" align="center"><strong>AU-55</strong></td>
    <td width="9%" align="center"><strong>AU-58</strong></td>
    <td width="9%" align="center"><strong>MS-60</strong></td>
  </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('VF20', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('VF25', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('VF30', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('VF35', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('EF40', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('EF45', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('AU50', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('AU55', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('AU58', $coinID ,$userID); ?></td>
    <td width="9%" align="center"><?php echo $collection->getCoinIDGrade('MS60', $coinID ,$userID); ?></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><?php echo $collection->getProGrade('VF20', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('VF25', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('VF30', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('VF35', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('EF40', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('EF45', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('AU50', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('AU55', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('AU58', $coinID ,$userID); ?></td>
    <td width="9%" align="center"><?php echo $collection->getProGrade('MS60', $coinID ,$userID); ?></td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('VF20', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('VF25', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('VF30', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('VF35', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('EF40', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('EF45', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('AU50', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('AU55', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('AU58', $coinID, $userID) ?></strong></td>
    <td width="9%" align="center"><strong><?php echo $collection->getTotalCoinGrade('MS60', $coinID, $userID) ?></strong></td>
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
    <td align="center"><strong>MS-61</strong></td>
    <td align="center"><strong>MS-62</strong></td>
    <td align="center"><strong>MS-63</strong></td>
    <td align="center"><strong>MS-64</strong></td>
    <td align="center"><strong>MS-65</strong></td>
    <td align="center"><strong>MS-66</strong></td>
    <td align="center"><strong>MS-67</strong></td>
    <td align="center"><strong>MS-68</strong></td>
    <td align="center"><strong>MS-69</strong></td>
    <td width="9%" align="center"><strong>MS-70</strong></td>
  </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('MS61', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('MS62', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('MS63', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('MS64', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('MS65', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('MS66', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('MS67', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('MS68', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getCoinIDGrade('MS69', $coinID ,$userID); ?></td>
    <td width="9%" align="center"><?php echo $collection->getCoinIDGrade('MS70', $coinID ,$userID); ?></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><?php echo $collection->getProGrade('MS61', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('MS62', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('MS63', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('MS64', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('MS65', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('MS66', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('MS67', $coinID ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('MS68', $coinID,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('MS69', $coinID ,$userID); ?></td>
    <td width="9%" align="center"><?php echo $collection->getProGrade('MS70', $coinID ,$userID); ?></td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('MS61', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('MS62', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('MS63', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('MS64', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('MS65', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('MS66', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('MS67', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('MS68', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('MS69', $coinID, $userID) ?></strong></td>
    <td width="9%" align="center"><strong><?php echo $collection->getTotalCoinGrade('MS70', $coinID, $userID) ?></strong></td>
  </tr>
</table>
<hr />

<h3>Proofs <?php echo $collection->getStrikeCountByType($coinID, $userID, $strike='Proof') ?></h3>
<p><strong>Highest Grade:</strong> <?php echo $collection->getBusinessHighGradeNumberByType($coinID, $userID, $strike='Proof') ?><br />
<strong>Total Graded:</strong> <?php echo $collection->getTotalTypeProGradeByStrike($strike='Proof', $coinID, $userID); ?><br />
<strong>Total Certified:</strong> <?php echo $collection->getTotalTypeProGradeByStrike($strike='Proof', $coinID, $userID); ?></p>
<table width="100%" border="0" cellpadding="3">
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
    <td align="center"><a href="viewGradeType.php?coinGrade=PR35&coinID=Small_Cent"><?php echo $collection->getCoinIDGrade('PR35', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR40&coinID=Small_Cent"><?php echo $collection->getCoinIDGrade('PR40', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR45&coinID=Small_Cent"><?php echo $collection->getCoinIDGrade('PR45', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR50&coinID=Small_Cent"><?php echo $collection->getCoinIDGrade('PR50', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR55&coinID=Small_Cent"><?php echo $collection->getCoinIDGrade('PR55', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR58&coinID=Small_Cent"><?php echo $collection->getCoinIDGrade('PR58', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR60&coinID=Small_Cent"><?php echo $collection->getCoinIDGrade('PR60', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR61&coinID=Small_Cent"><?php echo $collection->getCoinIDGrade('PR61', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR62&coinID=Small_Cent"><?php echo $collection->getCoinIDGrade('PR62', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR63&coinID=Small_Cent"><?php echo $collection->getCoinIDGrade('PR63', $coinID, $userID); ?></a></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR35&coinID=Small_Cent"><?php echo $collection->getProGrade('PR35', $coinID ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR40&coinID=Small_Cent"><?php echo $collection->getProGrade('PR40', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR45&coinID=Small_Cent"><?php echo $collection->getProGrade('PR45', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR50&coinID=Small_Cent"><?php echo $collection->getProGrade('PR50', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR55&coinID=Small_Cent"><?php echo $collection->getProGrade('PR55', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR58&coinID=Small_Cent"><?php echo $collection->getProGrade('PR58', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR60&coinID=Small_Cent"><?php echo $collection->getProGrade('PR60', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR61&coinID=Small_Cent"><?php echo $collection->getProGrade('PR61', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR62&coinID=Small_Cent"><?php echo $collection->getProGrade('PR62', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR63&coinID=Small_Cent"><?php echo $collection->getProGrade('PR63', $coinID, $userID); ?></a></td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('PR35', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('PR40', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('PR45', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('PR50', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('PR55', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('PR58', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('PR60', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('PR61', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('PR62', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('PR63', $coinID, $userID) ?></strong></td>
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
    <td align="center"><a href="viewGradeType.php?coinGrade=PR64&coinID=Small_Cent"><?php echo $collection->getCoinIDGrade('PR64', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR65&coinID=Small_Cent"><?php echo $collection->getCoinIDGrade('PR65', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR66&coinID=Small_Cent"><?php echo $collection->getCoinIDGrade('PR66', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR67&coinID=Small_Cent"><?php echo $collection->getCoinIDGrade('PR67', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR68&coinID=Small_Cent"><?php echo $collection->getCoinIDGrade('PR68', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR69&coinID=Small_Cent"><?php echo $collection->getCoinIDGrade('PR69', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR70&coinID=Small_Cent"><?php echo $collection->getCoinIDGrade('PR70', $coinID, $userID); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR64&coinID=Small_Cent"><?php echo $collection->getProGrade('PR64', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR65&coinID=Small_Cent"><?php echo $collection->getProGrade('PR65', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR66&coinID=Small_Cent"><?php echo $collection->getProGrade('PR66', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR67&coinID=Small_Cent"><?php echo $collection->getProGrade('PR67', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR68&coinID=Small_Cent"><?php echo $collection->getProGrade('PR68', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR69&coinID=Small_Cent"><?php echo $collection->getProGrade('PR69', $coinID, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR70&coinID=Small_Cent"><?php echo $collection->getProGrade('PR70', $coinID, $userID); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('PR64', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('PR65', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('PR66', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('PR67', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('PR68', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('PR69', $coinID, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCoinGrade('PR70', $coinID, $userID) ?></strong></td>
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
<hr />
</body>
</html>