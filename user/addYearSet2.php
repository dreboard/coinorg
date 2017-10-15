<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add U.S. Mint Coin Set</title>

<style type="text/css">
#coinHdr {margin:0px;}
</style>
<script type="text/javascript" src="https://www.mycoinorganizer.com/scripts/js/jquery-1.7.2.min.js"></script>

<script type="text/javascript" src="https://www.mycoinorganizer.com/scripts/jquery.form.js"></script>


<script type="text/javascript">
$(document).ready(function(){	

$("#coinHdr").hide();

//getYear
//
//
//
$("#getYear").click(function() {
$("#coinHdr").show();	
var coinYear = parseInt($("#century").val()+$("#theYear").val());
alert(coinYear);
$.ajax({
  url: '../_query/mintArrayGet2.php?coinYear='+coinYear,
  success: function(data) {
    $('#coinDisplayList').html(data);
  }
});

});


$("#mintsetID").change(function() {
$("#coinHdr").show();	
var mintsetID = $("#mintsetID").val();
$.ajax({
  url: '../_query/mintArrayGet2.php?mintsetID='+mintsetID,
  success: function(data) {
    $('#coinDisplayList').html(data);
  }
});

});

	
});
</script>     

</head>

<body>
<div id="content" class="clear">
  <h1>Add Graded Coin Year Set</h1>
 <p>
 <?php 
 if (isset($_POST['addCoinFormBtn'])){
$i = 0;
if (is_array($_POST['coinID'])){
foreach ($_POST["coinID"] as $coinID){
	$i++;
	$coin->getCoinById($coinID);
	$coinID = $coin->getCoinID();
    echo "Coin #" . $i . " " .$coin->getCoinName().' '.$coin->getCoinType().'<br />';
}
}
 }
 
 
  ?>
 
 </p>
 
 
<div class="roundedWhite">

<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
  <table width="979" border="0" class="priceListTbl">

  <tr>
    <td class="darker">Set Nickname</td>
    <td width="759"><input type="text" name="setNickname" id="setNickname" /></td>
  </tr>
  <tr>
    <td class="darker">&nbsp;</td>
    <td><select name="mintsetID" id="mintsetID">
      <option value="" selected="selected">Select A Coin Set</option>
      <?php    
$query = mysql_query("SELECT * FROM mintset") or die(mysql_error());
   while($row = mysql_fetch_array($query))
  {
  $mintsetID = intval($row['mintsetID']);
  $setName = strip_tags($row['setName']);
	 echo '<option value="'.$mintsetID.'"> '.$setName.'</option> ';	
  }

 ?>
    </select></td>
  </tr>
  <tr>
    <td width="198" class="darker">Select Year</td>
    <td>
<select name="century" id="century">
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
</select>
<select name="theYear" id="theYear">
<option value="00">00</option>
<?php 
for ($num = 1; $num <= 99; $num++) {
if($num<10)
$day = "0$num"; // add the zero
else
$day = "$num"; // don't add the zero
echo "<option value=".$day.">".$day."</option>";
}
?>
</select>

<input name="getYear" id="getYear" type="button" value="Go" /></td>
  </tr>
  <tr>
    <td class="darker">&nbsp;</td>
    <td valign="top">
    <h4 id="coinHdr">Select Coins</h4>
    <div id="coinDisplayList">
    
    
    </div>
    </td>
  </tr>

  <tr>
    <td valign="bottom">  
      <input name="coinCategory" type="hidden" value="<?php echo $coinTypeSearch ?>" />
      <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add  Coin" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>
<div class="spacer"></div>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
