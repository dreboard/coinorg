<?php 
include 'inc/config.php';
 
if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="icon" type="image/png" href="img/icon.png" />
<title><?php echo $coinType ?> Folder View</title>
<script type="text/javascript" src="scripts/main.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$('#toggleUpdate').click(function(){
$('.collectLinks').toggle()
if ( $('#toggleUpdate').val("Update Mode")){ 
        $('#toggleUpdate').val("Folder Mode");
   }else if ( $('#toggleUpdate').val("Folder Mode")){ 
        $('#toggleUpdate').val("Update Mode");
   }
});

});
</script>

<style type="text/css"> 


</style> 


</head>

<body>
<div id="header">
<div id="headerContent"> 
<table width="833" id="typeList">
  <tr>
    <td width="262" rowspan="10">
      <img src="img/1.jpg" width="362" height="282" alt="coins" /></td>
    <td colspan="2"><div id="hdrBox"><h2 id="bLogo"><?php echo $coinType ?> Folder View</h2> (<span id="listChanger"><a href="viewList.php?coinType=<?php echo $coinType ?>&page=1">List View</a></span>)</div></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="262"><span class="darker"><a href="index.php">Home</a></span></td>
    <td width="287"><a href="viewList.php?coinType=Union_Shield&page=1">Union Shield</a></td>  
  </tr>
 <tr>
   <td><span class="darker"><a href="index.php">My Collection</a></span></td>
    <td><a href="viewList.php?coinType=Lincoln_Bicentennial&page=1">Lincoln Bicentennial</a></td>   
 </tr>
 <tr>
   <td><span class="darker"><a href="index.php">Auction Designer</a></span></td>
    <td><a href="viewList.php?coinType=Lincoln_Memorial&page=1">Lincoln Memorial</a></td>
 </tr>
 <tr>
   <td><span class="darker"><a href="index.php">Reports</a></span></td>
    <td><a href="viewList.php?coinType=Lincoln_Wheat&page=1">Lincoln Wheat</a></td>
 </tr>
 <tr>
   <td><a class="darker" href="grade.php">Grading Guide</a></td>
    <td><a href="viewList.php?coinType=Indian_Head&page=1">Indian Head</a></td>
 </tr>
 <tr>
   <td><a class="darker" href="key.php">Key &amp; Semi-Key Dates</a></td>
    <td><a href="viewList.php?coinType=Flying_Eagle&page=1">Flying Eagle</a></td>
 </tr>
 <tr>
   <td><a class="darker" href="users/addCoin.php">Add A Coin</a></td>
   <td rowspan="2">&nbsp;</td>
 </tr>
 <tr>
   <td>&nbsp;</td>
 </tr>
</table>

</div>
</div>
<br class="clear" />

<div id="content" class="clear">


<input type="button" id="toggleUpdate" value="Update Mode" /> <span id="listChanger"><a href="viewList.php?coinType=<?php echo $coinType ?>&page=1">List View</a></span>
<br /><br />
<table border="1" id="folderTbl">
  <tr class="dateHolder" valign="top"> 
<?php
$c = 0; // Our counter
$n = 9; // Each Nth iteration would be a new table row
$countAll = mysql_query("SELECT * FROM pennies WHERE coinType = '$coinType'") or die(mysql_error());
while ($show = mysql_fetch_array($countAll))
{
	$pennyImg = str_replace(' ', '_', $show['coinType']);
	if($show['collection'] == 0){
		$image = "blank.jpg";
	} else {
		$image = $pennyImg.'placeholder.jpg';
	}
  if($c % $n == 0 && $c != 0) // If $c is divisible by $n...
  {
    // New table row
    echo '</tr><tr class="dateHolder" valign="top">';
  }
  $c++;
  ?>
  <td>
  <span class="collection" id="collection<?php echo $show['penniesID']; ?>"><?php echo $show['collection']; ?></span>
  <img id="coinImg<?php echo $show['penniesID']; ?>" class="coinSwitch" src="img/<?php echo $image; ?>" alt="" width="100" height="100" /><br />
  <a href='users/viewCoin.php?penniesID=<?php echo $show['penniesID']; ?>'><?php echo $show['name']; ?></a><br />
  <div class="collectLinks"><a id="collectionHave<?php echo $show['penniesID']; ?>" href="inc/updateCoin.php?penniesID=<?php echo $show['penniesID']; ?>&collection=1" class="collectLink<?php echo $show['penniesID']; ?>" style="color:#B87333; text-decoration:none;">Have</a> | <a id="collectionSold<?php echo $show['penniesID']; ?>" href="inc/updateCoin.php?penniesID=<?php echo $show['penniesID']; ?>&collection=0" class="collectLink<?php echo $show['penniesID']; ?>" style="color:#B87333; text-decoration:none;">Sold</a></div>

 <script type="text/javascript">
$(document).ready(function(){	
var coinImg = $('#coinImg<?php echo $show['penniesID']; ?>');
function switchPic() {
	 if (coinImg.attr("src","img/blank.jpg")) {
        coinImg.attr("src","img/<?php echo $pennyImg; ?>placeholder.jpg");
       } 
	 else if (coinImg.attr("src","img/<?php echo $pennyImg; ?>placeholder.jpg")) {
		coinImg.attr("src","img/blank.jpg");
      }
}

$("#collectionHave<?php echo $show['penniesID']; ?>").click(function(event) {
        event.preventDefault();
        $.get(this.href,{},function(response){ 
	   $('#updateMsg').html(response)
	  $('#coinImg<?php echo $show['penniesID']; ?>').attr("src","img/<?php echo $pennyImg; ?>placeholder.jpg");
	})
}); 

$("#collectionSold<?php echo $show['penniesID']; ?>").click(function(event) {
        event.preventDefault();
        $.get(this.href,{},function(response){ 
	   $('#updateMsg').html(response)
	    $('#coinImg<?php echo $show['penniesID']; ?>').attr("src","img/blank.jpg");
	})
}); 
});
</script> 
</td>
  <?php
} ?>
</tr>

</table>.

</div>
<p>&nbsp;</p>

</body>
</html>