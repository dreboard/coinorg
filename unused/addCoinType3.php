<?php 
include '../inc/config.php';
$errorMsg = ""; 
if (isset($_POST["addCoinFormBtn"])) { 
$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);
$name = mysql_real_escape_string($_POST["name"]);
$coinType = str_replace('_', ' ', mysql_real_escape_string($_POST["coinType"]));

if($_POST["purchaseFrom"] == ''){
	$purchaseFrom = 'None';
} else {
    $purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
}

$gradeService = $_POST['gradeService'];
if($_POST['gradeService'] == 'Self') {
	$proSerialNumber = 'N/A';
	$proGrade = 'N/A';
} else {
	$proSerialNumber = mysql_real_escape_string($_POST["proSerialNumber"]);
    $proGrade = mysql_real_escape_string($_POST["proGrade"]);
	
}

$purchaseDateRaw = mysql_real_escape_string($_POST["purchaseDate"]);
$purchaseParts = explode("/", $purchaseDateRaw);
$year = intval($purchaseParts[2]);
$day = str_pad($purchaseParts[1], 2, '0', STR_PAD_LEFT); 
$month = str_pad($purchaseParts[0], 2, '0', STR_PAD_LEFT); 
$purchaseDate = date($year.'-'.$month.'-'.$day);
$enterDate = date('Y-m-d H:i:s');


mysql_query("INSERT INTO collection(coinType, name, coinGrade, pennyQuantity, purchaseDate, timeyear) VALUES('$coinType', '$name', '$coinGrade', '1', '$purchaseDate', '$year')") or die(mysql_error()); 

}

if (isset($_GET["coinID"])) { 
$coinID = intval($_GET["coinID"]);
$pennyQuery = mysql_query("SELECT * FROM coins WHERE coinID = '$coinID'") or die(mysql_error());
while($row = mysql_fetch_array($pennyQuery))
  {
  $coinType = $row['coinType'];
  $name = $row['coinName'];
  }
  
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" type="text/css" />
<script type="text/javascript" src="../scripts/main.js"></script>
<title>Add A Coin</title>

<style type="text/css">
#additional {width:99%;}
#gradeService {margin-bottom:7px;}
#addCoinTbl td {padding:3px;}
#additional {margin-bottom:7px;}
#coinTypes a {text-decoration:none;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
/*$("#coinTypeUnion, #coinTypeBicentennial, #coinTypeMemorial, #coinTypeWheat, #coinTypeIndian, #coinTypeFlying, #gradeTbl, #proTbl, #noPriceSpn").hide();*/

$("a#Union_Shield").click(function(event){
	  event.preventDefault();
	  $("img#typeImg").attr("src", "img/Union_Shield.jpg");
	  $("#coinTypeUnion").show();
	  $("#coinType").val($(this).attr('id'));
	  $("#coinTypeBicentennial, #coinTypeMemorial, #coinTypeWheat, #coinTypeIndian, #coinTypeFlying").hide();
	  $("#errorMsg").text("");
	  $("#endErrorMsg").text("");
	  $("#typeLbl").removeClass("errorTxt");
	  
	});
	
    $('#Lincoln_Bicentennial').click(function(event) {
        event.preventDefault();
	$('#typeImg').attr("src","img/Lincoln_Bicentennial.jpg");
	$("#coinTypeBicentennial").show();
	$("#coinType").val($(this).attr('id'));
	$("#coinTypeUnion, #coinTypeMemorial, #coinTypeWheat, #coinTypeIndian, #coinTypeFlying").hide();
	$("#errorMsg").text("");
	});
	
    $('#Lincoln_Memorial').click(function(event) {
        event.preventDefault();
	$('#typeImg').attr("src","img/Lincoln_Memorial.jpg");
	$("#coinTypeMemorial").show();
	$("#coinType").val($(this).attr('id'));
	$("#coinTypeUnion, #coinTypeBicentennial, #coinTypeWheat, #coinTypeIndian, #coinTypeFlying").hide();
	$("#errorMsg").text("");
	});
	
    $('#Lincoln_Wheat').click(function(event) {
        event.preventDefault();
	$('#typeImg').attr("src","img/Lincoln_Wheat.jpg");
	$("#coinTypeWheat").show();
	$("#coinType").val($(this).attr('id'));
	$("#coinTypeUnion, #coinTypeBicentennial, #coinTypeMemorial, #coinTypeIndian, #coinTypeFlying").hide();
	$("#errorMsg").text("");
	});
	
    $('#Indian_Head').click(function(event) {
        event.preventDefault();
	$('#typeImg').attr("src","img/Indian_Head.jpg");
	$("#coinTypeIndian").show();
	$("#coinType").val($(this).attr('id'));
	$("#coinTypeUnion, #coinTypeBicentennial, #coinTypeMemorial, #coinTypeWheat,  #coinTypeFlying").hide();
	$("#errorMsg").text("");
	});
	
    $('#Flying_Eagle').click(function(event) {
        event.preventDefault();
	$('#typeImg').attr("src","img/Flying_Eagle.jpg");
	$("#coinTypeFlying").show();
	$("#coinType").val($(this).attr('id'));
	$("#coinTypeUnion, #coinTypeBicentennial, #coinTypeMemorial, #coinTypeWheat, #coinTypeIndian").hide();
	$("#errorMsg").text("");
	});


/*
$('#gradeService').change(function(event) {
if( $('#gradeService').val() == 'Self'){
  $("#gradeTbl").show();
  $("#proTbl").hide();
} else {
	$("#proTbl").show();
	$("#gradeTbl").hide();
}
});*/

///////////////////////////////////////////////////////////////////////////////////Form validation
$("#friendFirst, #friendLast, #friendEmail").focus(function() {
	$(this).removeClass("errorInput");
	$("#friendMsg").removeClass("errorTxt");
});	

$("#purchasePrice").focus(function(event){
	$(this).val("");
});

$("#noPrice").click(function(){
	$("#purchasePrice").val("0.00");
	$("#purchasePrice").removeClass("errorInput");
	$("#errorMsg").text("");
	$("#endErrorMsg").text("");
});


$("#addCoinForm").submit(function() {
      if($("#coinType").val() == "")  {
		$("#errorMsg").text("Select a penny type.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#typeLbl").addClass("errorTxt");
      return false;
      }else if ($("#purchaseDate").val() == "") {
        $("#errorMsg").text("Please enter a purchase date...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#purchaseDate").addClass("errorInput");
        return false;
      } else if ($("#purchaseFrom").val() == "") {
        $("#errorMsg").text("Please insert how you got the coin..");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#purchaseFrom").addClass("errorInput");
        return false;
      }else if ($("#purchasePrice").val() == "") {
        $("#errorMsg").text("Please enter a purchase price click $0.00...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#noPriceSpn").show();
		$("#purchasePrice").addClass("errorInput");
        return false;
      } else if( $('#gradeService').val() !== 'Self' && $("#proSerialNumber").val() == ""){
      $("#errorMsg").text("Enter your serial number.");
	  $("#proSerialNumber").addClass("errorInput");
	  return false;
     }else if( $('#gradeService').val() !== 'Self' && $("#proGrade").val() == ""){
      $("#errorMsg").text("Enter a coin grade.");
	  $("#proGrade").addClass("errorInput");
	  $("#endErrorMsg").text("There are form errors... Scroll up to fix");
	  return false;
	} else {
	  return true;
	  }
});

$("#coinType, #purchaseDate, #purchaseFrom, #purchasePrice, #proSerialNumber").click(function(){
	$(this).removeClass("errorInput");
	$("#endErrorMsg").text("");
	$("#errorMsg").text("");
});	
	
});
</script>     
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/userHeader.php"); ?>
<br class="clear" />

<div id="content" class="clear">
<h1>Add Coin</h1>
<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<form id="" method="post" action="" name="addCoinForm">
<table width="670" id="">
  <tr>
    <td width="250" rowspan="6" valign="top"><img src="../img/blank.jpg" alt="11" name="typeImg" width="250" height="250" align="top" id="typeImg" /></td>
    <td colspan="2" id="coinTypes" class="darker"><span id="typeLbl">Select Coin Type:</span><br />
<table width="248" id="">
  <tr>
    <td width="199"><a id="Union_Shield" href="#">Union Shield</a></td>  
 </tr>
 <tr>
    <td><a id="Lincoln_Bicentennial" href="#">Lincoln Bicentennial</a></td>   
     </tr>
 <tr>
    <td><a id="Lincoln_Memorial" href="#">Lincoln Memorial</a></td>
     </tr>
 <tr>
    <td><a id="Lincoln_Wheat" href="#">Lincoln Wheat</a></td>
     </tr>
 <tr>
    <td><a id="Indian_Head" href="#">Indian Head</a></td>
     </tr>
 <tr>
    <td><a id="Flying_Eagle" href="#">Flying Eagle</a></td>
  </tr>
</table>    
     </td>
    </tr>
  <tr>
    <td colspan="2"><span class="darker">Year/Mint:</span>
      <select id="coinTypeUnion" name="name">
     <?php 
     $typeQuery = mysql_query("SELECT * FROM coins WHERE coinType = 'Union Shield'") or die(mysql_error());
while($row = mysql_fetch_array($typeQuery))
  {
  $name = $row['coinName'];
  echo "<option value=".$name.">".$name."</option>";
  }
  ?>
  </select>
  <select id="coinTypeBicentennial" name="name">
     <?php 
     $typeQuery = mysql_query("SELECT * FROM coins WHERE coinType = 'Lincoln Bicentennial'") or die(mysql_error());
while($row = mysql_fetch_array($typeQuery))
  {
  $name = $row['coinName'];
  echo "<option value=".$name.">".$name."</option>";
  }
  ?>
  </select>
  <select id="coinTypeMemorial" name="name">
     <?php 
     $typeQuery = mysql_query("SELECT * FROM coins WHERE coinType = 'Lincoln Memorial'") or die(mysql_error());
while($row = mysql_fetch_array($typeQuery))
  {
  $name = $row['coinName'];
  echo "<option value=".$name.">".$name."</option>";
  }
  ?>
  </select>
  <select id="coinTypeWheat" name="name">
     <?php 
     $typeQuery = mysql_query("SELECT * FROM coins WHERE coinType = 'Lincoln Wheat'") or die(mysql_error());
while($row = mysql_fetch_array($typeQuery))
  {
  $name = $row['coinName'];
  echo "<option value=".$name.">".$name."</option>";
  }
  ?>
  </select>
  <select id="coinTypeIndian" name="name">
     <?php 
     $typeQuery = mysql_query("SELECT * FROM coins WHERE coinType = 'Indian Head'") or die(mysql_error());
while($row = mysql_fetch_array($typeQuery))
  {
  $name = $row['coinName'];
  echo "<option value=".$name.">".$name."</option>";
  }
  ?>
  </select>
  <select id="coinTypeFlying" name="name">
     <?php 
     $typeQuery = mysql_query("SELECT * FROM coins WHERE coinType = 'Flying Eagle'") or die(mysql_error());
while($row = mysql_fetch_array($typeQuery))
  {
  $name = $row['coinName'];
  echo "<option value=".$name.">".$name."</option>";
  }
  ?>
  </select><input name="coinType" type="hidden" value="" id="coinType" /></td>
  </tr>
  <tr>
    <td width="162"><span class="darker">Purchase Date:
      
    </span></td>
    <td width="242">&nbsp;<input type="text" name="purchaseDate" id="purchaseDate" /></td>
  </tr>
  <tr>
    <td><span class="darker">Obtained From:
      
    </span></td>
    <td><span class="darker">
      &nbsp;<input type="text" name="purchaseFrom" id="purchaseFrom" />
    </span></td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Price:</span></td>
    <td>&nbsp;<input name="purchasePrice" type="text" id="purchasePrice" value="0.00" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span>
      </td>
  </tr>
  <tr>
    <td colspan="2" valign="top">
    </td>
  </tr>
</table>
<div>

</div>

<table width="341" border="1" id="proTbl">
<tr>
    <td width="135" class="darker"><label for="gradeService">Grading Service</label></td>
    <td width="190"><select id="gradeService" name="gradeService">
<option value="No Grade">No Grade</option>  
<option value="Self" selected="selected">Self</option> 
<option value="PCGS">PCGS (Professional Coin Grading Service)</option>
<option value="ICG">ICG (Independent Coin Grading Company)</option>
<option value="NGC">NGC (Numismatic Guaranty Corporation of America)</option>
<option value="ANACS">ANACS (American Numismatic Association Certification Service)</option>
<option value="SEGS">SEGS (Sovereign Entities Grading Service Inc)</option>
<option value="PCI">PCI</option>      
<option value="ICCS">ICCS (International Coin Certification Service )</option>  
<option value="HALLMARK">HALLMARK</option>  
<option value="NTC">NTC</option>                                                       
</select></td>
    </tr>
  <tr>
    <td width="135" class="darker">Serial Number</td>
    <td width="190"><input type="text" name="proSerialNumber" id="proSerialNumber" value="" /></td>
    </tr>
  <tr>
    <td class="darker">Grade</td>
    <td><input type="text" name="proGrade" id="proGrade" value="" /></td>
    </tr>
</table>
<br />
<table width="800" id="gradeTbl">
  <tr>
    <td><label>
      <input type="radio" name="coinGrade" value="No Grade" id="coinGradeNone" checked="checked" />
      <strong> No Grade </strong>Coin not graded</label></td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="coinGrade" value="Basal 0" id="coinGrade_0" />
      <strong> (Basal 0) </strong>Basal State - You can identify the lump of metal as being a coin</label></td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="coinGrade" value="P-1" id="coinGrade_1" />
      <strong> (P-1) Poor </strong>- Barely identifiable; must have date and mintmark, otherwise pretty thrashed.</label></td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="coinGrade" value="FR-2" id="coinGrade_2" />
      <strong>(FR-2) Fair </strong>- Worn almost smooth but lacking the damage Poor coins have.</label></td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="coinGrade" value="G-4" id="coinGrade_3" />
      <strong> (G-4) Good </strong>- Heavily worn such that inscriptions merge into the rims in places; details are mostly gone.</label></td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="coinGrade" value="(VG-8)" id="coinGrade_4" />
      <strong>(VG-8) Very Good</strong> - Very worn, but all major design elements are clear, if faint. Little if any central detail.</label></td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="coinGrade" value="(F-12)" id="coinGrade_5" />
      <strong>(F-12) Fine</strong> - Very worn, but wear is even and overall design elements stand out boldly. Almost fully-separated rims.</label></td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="coinGrade" value="VF-20" id="coinGrade_6" />
      <strong>(VF-20) Very Fine</strong> - Moderately worn, with some finer details remaining. All letters of LIBERTY, (if present,) should be readable. 

Full, clean rims.</label></td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="coinGrade" value="EF-40" id="coinGrade_7" />
      <strong> (EF-40) Extremely Fine</strong> - Lightly worn; all devices are clear, major devices bold.</label></td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="coinGrade" value="AU-50" id="coinGrade_8" />
      <strong>(AU-50) About Uncirculated </strong>- Slight traces of wear on high points; may have contact marks and little eye appeal.</label></td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="coinGrade" value="AU-58" id="coinGrade_9" />
      <strong>(AU-58) Very Choice About Uncirculated </strong> - Slightest hints of wear marks, no major contact marks, almost full luster, and positive eye 

appeal.</label></td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="coinGrade" value="MS-60" id="coinGrade_10" />
      <strong>(MS-60) Mint State Basal</strong> - Strictly uncirculated but that's all; ugly coin with no luster, obvious contact marks.</label></td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="coinGrade" value="MS-63" id="coinGrade_11" />
      <strong>(MS-63) Mint State Acceptable</strong> - Uncirculated, but with contact marks and nicks, slightly impaired luster, overall basically appealing 

appearance. Strike is average to weak.</label></td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="coinGrade" value="MS-65" id="coinGrade_12" />
      <strong>(MS-65) Mint State Choice</strong> - Uncirculated with strong luster, very few contact marks, excellent eye appeal. Strike is above 

average.</label></td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="coinGrade" value="MS-68" id="coinGrade_13" />
      <strong>(MS-68) Mint State Premium Quality</strong> - Uncirculated with perfect luster, no visible contact marks to the naked eye, exceptional eye 

appeal. Strike is sharp and attractive.</label></td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="coinGrade" value="MS-69" id="coinGrade_14" />
      <strong>(MS-69) Mint State All-But-Perfect</strong> - Uncirculated with perfect luster, sharp, attractive strike, and very exceptional eye appeal. A 

perfect coin except for microscopic flaws (under 8x magnification) in planchet, strike, or contact marks.</label></td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="coinGrade" value="MS-70" id="coinGrade_15" />
      <strong>(MS-70) Mint State Perfect </strong>- The perfect coin. There are no microscopic flaws visible to 8x, the strike is sharp, perfectly-centered, 

and on a flawless planchet. Bright, full, original luster and outstanding eye appeal.</label></td>
  </tr>
</table>
<span class="darker">Additional:</span><br />
    <textarea name="additional" id="additional" cols="" rows=""></textarea><br />
<input name="addCoinFormBtn" id="addCoinFormBtn" type="submit" value="Add Coin" /> <span id="endErrorMsg" class="errorTxt"></span>
</form>
<p>Proof set coins from 1968 to the present contain "S" mint marked coins.  These were produced at the San Francisco United States government Mint.  Proof coin sets minted in 1964 and earlier have no mint mark and were produced at the Philadelphia United States government Mint.</p>
</div>
</body>
</html>
