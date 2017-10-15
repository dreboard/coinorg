<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['commemorativeVersion'])) { 
$commemorativeVersion = strip_tags(str_replace('_', ' ', $_GET['commemorativeVersion']));
$categoryLink = strip_tags($_GET['commemorativeVersion']);
}

$collectTotal = $Commemorative->getTotalCollectedCommemorativeVersionByID($commemorativeVersion, $userID);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Commemorative Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 1, "desc" ]],
	"iDisplayLength": 100
} );
});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:110%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/<?php echo str_replace(' ', '_', $commemorativeVersion) ?>.jpg" width="100" height="100" align="middle"> My <a class="brownLink" href="<?php echo str_replace(' ', '_', $commemorativeVersion); ?>.php"><?php echo $commemorativeVersion; ?></a> Coins</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="25%" class="darker"><a href="CommemorativeCoins.php?commemorativeVersion=<?php echo str_replace(' ', '_', $commemorativeVersion); ?>">Coins</a></td>
    <td width="25%" class="darker"><a href="CommemorativeAlbum.php?commemorativeVersion=<?php echo str_replace(' ', '_', $commemorativeVersion); ?>">Album View</a></td>
    <td width="25%" class="darker"> <a href="CommemorativeGrades.php?commemorativeVersion=<?php echo str_replace(' ', '_', $commemorativeVersion); ?>">Grade Report</a></td>
    <td width="25%" class="darker"><a href="CommemorativeError.php?commemorativeVersion=<?php echo str_replace(' ', '_', $commemorativeVersion); ?>">Errors</a></td>  
  </tr>
</table>
<hr />
<h3>Business <?php echo $Commemorative->getStrikeCountByCommemorativeVersion($commemorativeVersion, $userID, $strike='Business') ?></h3>
<p>
<strong>Total Raw:</strong> <?php echo $Commemorative->getCommemorativeVersionGradeByStrike($strike='Business', $commemorativeVersion, $userID); ?><br />
<strong>Total Certified:</strong> <?php echo $Commemorative->getTotalCommemorativeVersionProGradeByStrike($strike='Business', $commemorativeVersion, $userID); ?></p> 
<table width="100%" border="0" cellpadding="3" class="byGradeTbl">
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
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=B0&amp;commemorativeVersion=<?php echo $categoryLink; ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('B0', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=P1&amp;commemorativeVersion=<?php echo $categoryLink; ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('P1', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=FR2&amp;commemorativeVersion=<?php echo $categoryLink; ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('FR2', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=AG3&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('AG3', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=G4&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('G4', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=G6&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('G6', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=VG8&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('VG8', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=VG10&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('VG10', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=F12&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('F12', $commemorativeVersion ,$userID); ?></a></td>
    <td width="9%" align="center"><a href="viewGradeCommemorative.php?coinGrade=F15&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('F15', $commemorativeVersion ,$userID); ?></a></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td width="9%" align="center"><a href="viewProGradeCommemorative.php?coinGrade=B0&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('B0', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=P1&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('P1', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=FR2&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('FR2', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=AG3&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('AG3', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=G4&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('G4', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=G6&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('G6', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=VG8&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('VG8', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=VG10&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('VG10', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=F12&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('F12', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=F15&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('F15', $commemorativeVersion ,$userID); ?></a></td>
    </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('B0', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('P1', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('FR2', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('AG3', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('G4', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('G6', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('VG8', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('VG10', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('F12', $commemorativeVersion, $userID) ?></strong></td>
    <td width="9%" align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('F15', $commemorativeVersion, $userID) ?></strong></td>
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
    <td width="9%" align="center"><a href="viewGradeCommemorative.php?coinGrade=VF20&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('VF20', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=VF25&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('VF25', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=VF30&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('VF30', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=VF35&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('VF35', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=EF40&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('EF40', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=EF45&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('EF45', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=AU50&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('AU50', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=AU53&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('AU53', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=AU55&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('AU55', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=AU58&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('AU58', $commemorativeVersion ,$userID); ?></a></td>
    </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td width="9%" align="center"><a href="viewProGradeCommemorative.php?coinGrade=VF20&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('VF20', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=VF25&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('VF25', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=VF30&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('VF30', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=VF35&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('VF35', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=EF40&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('EF40', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=EF45&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('EF45', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=AU50&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('AU50', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=AU53&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('AU53', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=AU55&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('AU55', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=AU58&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('AU58', $commemorativeVersion ,$userID); ?></a></td>
    </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('VF20', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('VF25', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('VF30', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('VF35', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('EF40', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('EF45', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('AU50', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('AU53', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('AU55', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('AU58', $commemorativeVersion, $userID) ?></strong></td>
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
    <td width="9%" align="center"><a href="viewGradeCommemorative.php?coinGrade=MS60&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('MS60', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=MS61&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('MS61', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=MS62&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('MS62', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=MS63&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('MS63', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=MS64&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('MS64', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=MS65&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('MS65', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=MS66&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('MS66', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=MS67&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('MS67', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=MS68&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('MS68', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=MS69&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('MS69', $commemorativeVersion ,$userID); ?></a></td>
    </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td width="9%" align="center"><a href="viewProGradeCommemorative.php?coinGrade=MS60&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('MS60', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=MS61&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('MS61', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=MS62&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('MS62', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=MS63&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('MS63', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=MS64&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('MS64', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=MS65&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('MS65', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=MS66&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('MS66', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=MS67&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('MS67', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=MS68&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('MS68', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=MS69&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('MS69', $commemorativeVersion ,$userID); ?></a></td>
    </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td width="9%" align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('MS60', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('MS61', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('MS62', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('MS63', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('MS64', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('MS65', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('MS66', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('MS67', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('MS68', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('MS69', $commemorativeVersion, $userID) ?></strong></td>
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
    <td align="center"><strong>MS-70</strong></td>
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
      <td><strong>Raw</strong></td>
      <td width="9%" align="center"><a href="viewGradeCommemorative.php?coinGrade=MS70&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('MS70', $commemorativeVersion ,$userID); ?></a></td>
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
          <td><strong>Slab</strong></td>
      <td width="9%" align="center"><a href="viewProGradeCommemorative.php?coinGrade=PR35&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('MS70', $commemorativeVersion ,$userID); ?></a></td>
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
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td width="9%" align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('MS70', $commemorativeVersion, $userID) ?></strong></td>
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
</table>    
    <hr>

<h3>Proofs <?php echo $Commemorative->getStrikeCountByCommemorativeVersion($commemorativeVersion, $userID, $strike='Proof') ?></h3>
<p>
<strong>Total Raw:</strong> <?php echo $Commemorative->getCommemorativeVersionGradeByStrike($strike='Proof', $commemorativeVersion, $userID); ?><br />
<strong>Total Certified:</strong> <?php echo $Commemorative->getTotalCommemorativeVersionProGradeByStrike($strike='Proof', $commemorativeVersion, $userID); ?></p> 
<table width="100%" border="0" cellpadding="3" class="byGradeTbl">
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
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=PR35&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('PR35', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=PR40&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('PR40', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=PR45&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('PR45', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=PR50&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('PR50', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=PR55&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('PR55', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=PR58&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('PR58', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=PR60&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('PR60', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=PR61&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('PR61', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=PR62&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('PR62', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=PR63&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('PR63', $commemorativeVersion, $userID); ?></a></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=PR35&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('PR35', $commemorativeVersion ,$userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=PR40&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('PR40', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=PR45&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('PR45', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=PR50&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('PR50', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=PR55&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('PR55', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=PR58&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('PR58', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=PR60&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('PR60', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=PR61&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('PR61', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=PR62&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('PR62', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=PR63&commemorativeVersion=<?php echo $commemorativeVersionLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('PR63', $commemorativeVersion, $userID); ?></a></td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('PR35', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('PR40', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('PR45', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('PR50', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('PR55', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('PR58', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('PR60', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('PR61', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('PR62', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('PR63', $commemorativeVersion, $userID) ?></strong></td>
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
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=PR64&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('PR64', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=PR65&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('PR65', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=PR66&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('PR66', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=PR67&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('PR67', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=PR68&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('PR68', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=PR69&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('PR69', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCommemorative.php?coinGrade=PR70&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionGrade('PR70', $commemorativeVersion, $userID); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=PR64&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('PR64', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=PR65&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('PR65', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=PR66&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('PR66', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=PR67&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('PR67', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=PR68&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('PR68', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=PR69&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('PR69', $commemorativeVersion, $userID); ?></a></td>
    <td align="center"><a href="viewProGradeCommemorative.php?coinGrade=PR70&commemorativeVersion=<?php echo $categoryLink ?>"><?php echo $Commemorative->getCommemorativeVersionProGrade('PR70', $commemorativeVersion, $userID); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('PR64', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('PR65', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('PR66', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('PR67', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('PR68', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('PR69', $commemorativeVersion, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $Commemorative->getTotalCommemorativeVersionGrade('PR70', $commemorativeVersion, $userID) ?></strong></td>
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
<p><a href="#top">Top</a></p>


</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>