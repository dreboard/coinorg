<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";



if (isset($_GET['ID'])) { 
$sellListID = $Encryption->decode($_GET['ID']);
$SellList->getSellItemById($sellListID);
$coinType = $SellList->getCoinType();
$coinID = $SellList->getCoinID();
$coin-> getCoinById($coinID);
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$coinName = $coin->getCoinName();  
$additional = $collection->getAdditional(); 
$coinGrade = $SellList->getCoinGrade();
$proService = $SellList->getGrader();
$coinCategory = $coin->getCoinCategory();  
$coinSubCategory = $coin->getCoinSubCategory();  
$page ->getCoinPage($coinCategory);
$linkName = str_replace(' ', '_', $coinType);
$categoryLink = str_replace(' ', '_', $coinCategory);
$coinLink = str_replace(' ', '_', $coinType);

$coinPic1 = '<img src="../img/'.$coinVersion.'.jpg" width="250" height="250" />';


}



if (isset($_POST["collectionListBtn"])) { 
$coincollectID = mysql_real_escape_string($Encryption->decode($_POST["Collection"]));
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
mysql_query("UPDATE collection SET coincollectID = '$coincollectID' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
header("location: coinCollectionView.php?ID=".$Encryption->encode($coincollectID)."");
exit();
}

if (isset($_POST["collectionRemoveBtn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
mysql_query("UPDATE collection SET coincollectID = '0' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
$_SESSION['message'] = '<span class="greenLink">Removed From Collection</span>';
}




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<link rel="stylesheet" type="text/css" href="../scripts/lightbox.css"/>
<script type="text/javascript" src="../scripts/lightbox.js"></script>

<title><?php echo $coinName ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#collectTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


$("#wantForm").submit(function() {
      if ($("#coinGrade").val() == "") {
		$("#coinGrade").addClass("errorInput");
        return false;
      }else {
	 $('#wantBtn').val("Adding to list.....");	  
	  return true;
	  }
});

$("#loginForm :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
	}).blur(function() {
	  $("label").removeClass("labelfocus");
  });

$("#collectionListForm").submit(function() {
      if ($("#Collection").val() == "") {
		$("#Collection").addClass("errorInput");
        return false;
      }else {
	 $('#collectionListBtn').val("Adding to collection.....");	  
	  return true;
	  }
});


$("#editRow").hide();


//Image 1
$("#coinPic1Lnk").click(function() {
  $("#editRow").toggle();
  });
$("#coinPic2Lnk").click(function() {
  $("#editRow").toggle();
  });
  $("#coinPic3Lnk").click(function() {
  $("#editRow").toggle();
  });
  $("#coinPic4Lnk").click(function() {
  $("#editRow").toggle();
  });
$("#coinPic1Frm").submit(function() {
      if ($("#coinPic1").val() == "") {
		$("#coinPic1").addClass("errorInput");
		$('#imgMsg1').text("Select Image").addClass("errorTxt");	
        return false;
      }else {
	 $('#coinPic1Btn').val("Uploading...");	  
	  return true;
	  }
});
//Image 2
$("#coinPic2Lnk").click(function() {
  $("#editTD2").toggle();
  });

$("#coinPic2Frm").submit(function() {
      if ($("#coinPic2").val() == "") {
		$("#coinPic2").addClass("errorInput");
		$('#imgMsg2').text("Select Image").addClass("errorTxt");	
        return false;
      }else {
	 $('#coinPic2Btn').val("Uploading...");	  
	  return true;
	  }
});
//Image 1
$("#coinPic3Lnk").click(function() {
  $("#editTD3").toggle();
  });

$("#coinPic3Frm").submit(function() {
      if ($("#coinPic3").val() == "") {
		$("#coinPic3").addClass("errorInput");
		$('#imgMsg3').text("Select Image").addClass("errorTxt");	
        return false;
      }else {
	 $('#coinPic3Btn').val("Uploading...");	  
	  return true;
	  }
});
//Image 4
$("#coinPic4Lnk").click(function() {
  $("#editTD4").toggle();
  });

$("#coinPic4Frm").submit(function() {
      if ($("#coinPic4").val() == "") {
		$("#coinPic4").addClass("errorInput");
		$('#imgMsg4').text("Select Image").addClass("errorTxt");	
        return false;
      }else {
	 $('#coinPic4Btn').val("Uploading...");	  
	  return true;
	  }
});



});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<span><?php echo $_SESSION['message']; ?></span>

<h1><a href="viewCoin.php?coinID=<?php echo $coinID ?>" class="brownLink"><?php echo $coinName; ?></a></h1>

<table width="930" id="viewTbl">
  <tr>
    <td width="157" rowspan="5" valign="top"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><?php echo '<img src="../img/'.$coinVersion.'.jpg" width="150" height="150" />'; ?></a></td>
    <td class="tdHeight"><strong>Category:</strong></td>
    <td class="tdHeight"><a href="<?php echo $categoryLink ?>.php"><?php echo $coinCategory ?></a></td>
    <td></td>
  </tr>
  <tr>
    <td width="162" class="tdHeight"><span class="darker">Type: </span></td>
<td width="575" class="tdHeight"><a href="viewListReport.php?coinType=<?php echo $coinLink ?>"><?php echo $coinType ?></a></td>
<td width="16"></td>
</tr>
  <tr>
    <td class="tdHeight"><strong>Year:</strong></td>
    <td class="tdHeight"><a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&year=<?php echo $coin->getCoinYear() ?>"><?php echo $coin->getCoinYear() ?></a></td>
    <td></td>
  </tr>
  <tr>
    <td class="tdHeight"><strong>Grade:</strong></td>
    <td class="tdHeight"><?php echo $coinGrade ?>
    
    
    </td>
    <td></td>
  </tr>
  <tr>
    <td class="tdHeight"><strong>Grading Service:</strong></td>
    <td class="tdHeight"><a href="viewTypeService.php?proService=<?php echo $proService ?>&coinType=<?php echo $coinLink ?>"><?php echo $proService ?></a> 
    &nbsp;</td>
    <td></td>
  </tr>
</table>
<hr />

<table width="100%" border="0">
  <tr>
    <td width="20%" align="center" valign="top">&nbsp;</td>
   <td width="25%" align="center" valign="top"><h3><a href="viewCoinEdit.php?ID=<?php echo $Encryption->encode($collectionID) ?>">Edit This Sale</a></h3></td>
   <td width="55%" align="center" valign="top"><h3><a href="addCoinByID.php?coinID=<?php echo $coinID ?>" class="brownLinkBold">&nbsp;Add  <?php echo $coinName ?></a></h3>     </td>
   </tr>
</table>

<hr />
<h3>Sale Details</h3>
<table width="87%" border="0">
  <tr>
    <td><strong>Sales For Year:</strong></td>
    <td><?php echo date("Y",strtotime($SellList->getSaleDate())); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="16%"><strong>In Inventory:</strong></td>
    <td width="12%">
	<?php echo (strtotime($SellList->getSaleDate()) - strtotime($SellList->getListDate())) / (60 * 60 * 24); ?> Days</td>
    <td width="72%"><span class="tdHeight"><?php echo date("F j, Y",strtotime($SellList->getListDate())); ?> to <?php echo date("F j, Y",strtotime($SellList->getSaleDate())); ?></span></td>
  </tr>
  <tr>
    <td><strong>Purchase Price:</strong></td>
    <td colspan="2">$<?php echo number_format($SellList->getCoinPrice(),2); ?></td>
  </tr>
  <tr>
    <td><strong>Sale Price:</strong></td>
    <td colspan="2">$<?php echo number_format($SellList->getSalePrice(),2); ?></td>
  </tr>
  <tr>
    <td><strong>List Price:</strong></td>
    <td>$<?php echo number_format($SellList->getListPrice(),2); ?></td>
    <td><?php echo $SellList->thisListDifference($sellListID, $userID); ?> Difference</td>
  </tr>
  <tr>
    <td><strong>Profit/Loss:</strong></td>
    <td colspan="2"><?php echo $SellList->thisSalesDifference($sellListID, $userID); ?></td>
  </tr>
  </table>
  <hr />

<h3>Buyer Details</h3>
      <table width="50%" border="0">
  <tr>
    <td width="28%"><strong>Name:</strong></td>
    <td width="72%"><?php echo $SellList->getSlabLabel(); ?></td>
  </tr>
  <tr>
    <td><strong>Address:</strong></td>
    <td><?php echo $SellList->getBuyerAddress(); ?></td>
  </tr>
  <tr>
    <td><strong>City:</strong></td>
    <td><?php echo $SellList->getBuyerCity(); ?></td>
  </tr>
  <tr>
    <td><strong>State:</strong></td>
    <td><?php echo $SellList->getBuyerState(); ?></td>
  </tr>
  </table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>