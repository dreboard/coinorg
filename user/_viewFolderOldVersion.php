<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
 if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
$pennyImg = str_replace(' ', '_', $coinType);


 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<link rel="icon" type="image/png" href="../img/icon.png" />
<title><?php echo $coinType ?> Folder View</title>

<script type="text/javascript">
$(document).ready(function(){
	
$('#explain').hide();	
$('#toggleUpdate').click(function(){
$('#explain').toggle();		
$('.collectLinks').toggle();
 if (this.value == 'Folder Mode') {
	  this.value = 'Update Mode'
	}
	else {
	  this.value = 'Folder Mode';
	}
});

$("#viewFolderBtn").click(function() {
   window.location = 'viewFolder.php?coinType=<?php echo $coinType ?>';
});

$("#viewListBtn").click(function() {
   window.location = 'viewListReport.php?coinType=<?php echo $coinType ?>&page=1';
});

$("#viewReportBtn").click(function() {
   window.location = 'report<?php echo $pageCategory ?>.php';
});


});
</script>

</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h2><?php echo $coinType ?> <?php echo $dates ?> (Folder View)</h2>

<!-- <span id="listChanger"><a href="viewListReport.php?coinType=<?php //echo $coinType ?>&page=1">List View</a></span> <a href="report<?php //echo $pageCategory ?>.php">(View <?php //echo $pageCategory ?> Report)</a>-->


<table>
<tr class="darker">
    <td><input class="viewListBtns" type="button" id="toggleUpdate" value="Update Mode" /> <input  id="viewListBtn" class="viewListBtns" name="" type="button" value="List View" /></td>
    <td><input id="viewReportBtn" class="viewListBtns" name="" type="button" value="View <?php echo $pageCategory ?> Report" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>  
<div id="explain" class="roundedWhite">
<table width="100%" border="0">
  <tr valign="top">
    <td width="50%">
    <p>Adding coins in update mode does not track</p>
<ol>
  <li>Grade</li>
  <li>Purchase Amount</li>
  <li>Purchase Place</li>
</ol>
<p>Go to <a href="addCoinRawType.php?coinType=<?php echo $coinType; ?>">Add A Coin</a> to track these values.</p>
    </td>
    <td width="50%">&nbsp;</td>
  </tr>
</table>


</div>
<div class="spacer"></div>
<table border="0" id="folderTbl">
  <tr class="dateHolder" valign="top"> 
<?php
 function checkCoin($coinID){
	$pageQuery = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID'");
	$coinCount = mysql_num_rows($pageQuery);
	while ($show = mysql_fetch_array($pageQuery))
{
	$coinVersion = str_replace(' ', '_', $show['coinVersion']);
}
	if($coinCount == 0){
		$image = "blank.jpg";
	} else {
		//$image = $pennyImg.'placeholder.jpg';
		$image = $coinVersion.'.jpg';
	}
	 return $image;
 }
$c = 0; // Our counter
$n = 8; // Each Nth iteration would be a new table row
$countAll = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' ORDER BY coinName DESC") or die(mysql_error());
$coinCount = mysql_num_rows($countAll);
while ($show = mysql_fetch_array($countAll))
{
	
	$coinID = intval($show['coinID']);
	checkCoin($coinID);
	/*$pennyImg = str_replace(' ', '_', $show['coinType']);
	if($show['collection'] == 0){
		$image = "blank.jpg";
	} else {
		//$image = $pennyImg.'placeholder.jpg';
		$image = $pennyImg.'.jpg';
	}*/
	
  if($c % $n == 0 && $c != 0) // If $c is divisible by $n...
  {
    // New table row
    echo '</tr><tr class="dateHolder" valign="top">';
  }
  $c++;
  ?>
  <td>
  <span class="collection" id="collection<?php echo $show['coinID']; ?>"><?php echo $show['collection']; ?></span>
<a href="viewCoin.php?coinID=<?php echo $show['coinID'] ?>"  title="<?php echo $show['coinID'] ?> View">  <img id="coinImg<?php echo $show['coinID']; ?>" class="coinSwitch" src="../img/<?php echo checkCoin($coinID); ?>" alt="" width="100" height="100" /></a><br />
  <a href='viewCoin.php?coinID=<?php echo $show['coinID']; ?>'><?php echo $show['coinName']; ?></a><br />
  <div class="collectLinks"><a id="collectionHave<?php echo $show['coinID']; ?>" href="../inc/updateCoin.php?coinID=<?php echo $show['coinID']; ?>&amp;collection=1" class="collectLink<?php echo $show['coinID']; ?>" style="color:#B87333; text-decoration:none;">Have</a> | <a id="collectionSold<?php echo $show['coinID']; ?>" href="../inc/updateCoin.php?coinID=<?php echo $show['coinID']; ?>&amp;collection=0" class="collectLink<?php echo $show['coinID']; ?>" style="color:#B87333; text-decoration:none;">Sold</a></div>

 <script type="text/javascript">
$(document).ready(function(){	
var coinImg = $('#coinImg<?php echo $show['coinID']; ?>');
function switchPic() {
	 if (coinImg.attr("src","../img/blank.jpg")) {
        coinImg.attr("src","../img/<?php echo $pennyImg; ?>.jpg");
       } 
	 else if (coinImg.attr("src","../img/<?php echo $pennyImg; ?>.jpg")) {
		coinImg.attr("src","../img/blank.jpg");
      }
}

$("#collectionHave<?php echo $show['coinID']; ?>").click(function(event) {
        event.preventDefault();
        $.get(this.href,{},function(response){ 
	   $('#updateMsg').html(response)
	  $('#coinImg<?php echo $show['coinID']; ?>').attr("src","../img/<?php echo $pennyImg; ?>.jpg");
	})
}); 

$("#collectionSold<?php echo $show['coinID']; ?>").click(function(event) {
        event.preventDefault();
        $.get(this.href,{},function(response){ 
	   $('#updateMsg').html(response)
	    $('#coinImg<?php echo $show['coinID']; ?>').attr("src","../img/blank.jpg");
	})
}); 
});
</script> 
</td>
  <?php
} ?>
</tr>

</table>.
<p><a class="topLink" href="#top">Top</a></p>

</div>
<p>&nbsp;</p>

</body>
</html>