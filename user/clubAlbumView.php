<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coinClubID = $User->getCoinClubID();
$CoinClub->getClubById($coinClubID);	
$message = '';

if(isset($_GET["ID"])) {
$coinClubID = $Encryption->decode($_GET['ID']);
$albumID = $Encryption->decode($_GET['album']); 
$CoinClub->getClubById($coinClubID);	
$Album->getAlbumByID($albumID); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<link rel="stylesheet" type="text/css" href="http://mycoinorganizer.com/scripts/lightbox.css">
<script type="text/javascript" src="http://mycoinorganizer.com/scripts/lightbox.js"></script>
<title><?php echo $Album->getAlbumName(); ?></title>

<script type="text/javascript">
$(document).ready(function(){	

});
</script>  


<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<div id="container">
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="contentHolder" class="wide">
<div id="content" class="inner">
    <h2 class="blueHdrTxt2"><?php echo $Album->getAlbumName(); ?></h2>
<span><?php echo $message; ?></span>
<div id="imgAlbumDiv2">
  <table width="100%">
<tr>
<?php
$i = 1;
$sql = mysql_query("SELECT * FROM albumpics WHERE albumID = '$albumID'") or die(mysql_error());
while($row = mysql_fetch_array($sql)){
$albumpicID = intval($row['albumpicID']);
$Album->getAlbumpicByID($albumpicID);

echo '<td width="25%"><a href="'.$Album->getImgURL().'" rel="lightbox[albumImgs]"><img title="'.$Album->getImgTitle().'" class="thumb" src="../'.$Album->getImgURL().'" /><br>
'.$Album->getImgTitle().'</a></td>'; 
$i = $i + 1; //add 1 to $i
if ($i == 5) { //when you have echoed 3 <td>'s
echo '</tr><tr>'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
?>
</tr></table>
</div>

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>


</div>                
</div>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</div><!--End container-->
</body>
</html>
<?php 
 if(isset($_SESSION['errorMsg'])) {
  unset($_SESSION['errorMsg']);
  } 
  
?>