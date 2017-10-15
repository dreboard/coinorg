<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coinClubID = $User->getCoinClubID();
$CoinClub->getClubById($coinClubID);	
$message = '';
if(isset($_GET['ID'])) {  
	$albumID = $Encryption->decode($_GET['ID']); 
	$Album->getAlbumByID($albumID); 
} 

/*$images_dir = '../gallery/'.$albumID.'/';
$thumbs_dir = '../gallery/'.$albumID.'thumbs/';
$thumbs_width = 200;
$images_per_row = 3;*/

if (isset($_POST['fileBtn'])) {
$albumID = $Encryption->decode($_POST['ID']);
$imgTitle = trim(mysql_real_escape_string($_POST['imgTitle']));
$imgDescription = strip_tags($_POST['imgDescription']);
if(!empty($_FILES['file']['tmp_name'])){
$Upload->SetFileName($_FILES['file']['name']);
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory("../album/".$coinClubID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$imgURL = '../album/'.$coinClubID."/" . $_FILES['file']['name'];
$sql = mysql_query("INSERT INTO albumpics(albumID, imgDescription, imgTitle, imgDate, imgURL, imgName, userID) VALUES('$albumID', '$imgDescription', '$imgTitle', '$theDate', '$imgURL', '".$_FILES['file']['name']."', '$userID')") or die(mysql_error());
}

}

if (isset($_POST['picID'])) {
$albumpicID = $Encryption->decode($_POST['picID']);
$Album->deleteImg($albumpicID);
}
if (isset($_POST['albumID'])) {
$albumID = intval($_POST['albumID']);
$Album->deleteAlbum($albumID);
}
?>
<!DOCTYPE html>
<html lang="en"><head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="https://www.mycoinorganizer.com/scripts/js/jquery-1.7.2.min.js"></script>

<link rel="stylesheet" type="text/css" href="galleriffic-2.0/css/galleriffic-1.css">
<script type="text/javascript" src="galleriffic-2.0/js/jquery.galleriffic.js"></script>
<script type="text/javascript" src="galleriffic-2.0/js/jquery.opacityrollover.js"></script>
		<!-- We only want the thunbnails to display when javascript is disabled -->


<title><?php echo $Album->getAlbumName(); ?></title>

<style type="text/css">
.thumb {width:100px; height:auto;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<div id="container">
<?php include("../inc/pageElements/headerClub.php"); ?>
<div id="contentHolder" class="wide">
<div id="content" class="inner">
    <h2 class="blueHdrTxt2"><?php echo $Album->getAlbumName(); ?></h2>
<span><?php echo $message; ?></span>


<div id="gallery" class="content">
					<div id="controls" class="controls"></div>
					<div class="slideshow-container">
						<div id="loading" class="loader"></div>
						<div id="slideshow" class="slideshow"></div>
					</div>
					<div id="caption" class="caption-container"></div>
				</div>
				<div id="thumbs" class="navigation">
					<ul class="thumbs noscript">

<?php 
$sql = mysql_query("SELECT * FROM albumpics WHERE albumID = '$albumID'") or die(mysql_error());
while($row = mysql_fetch_array($sql)){
$albumpicID = intval($row['albumpicID']);
$Album->getAlbumpicByID($albumpicID);
echo '						
<li>
							<a class="thumb" name="'.$Album->getImgTitle().'" href="../'.$Album->getImgURL().'" title="'.$Album->getImgTitle().'">
								<img src="../'.$Album->getImgURL().'" alt="'.$Album->getImgTitle().'" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="../'.$Album->getImgURL().'">Download Original</a>
								</div>
								<div class="image-title">"'.$Album->getImgTitle().'"</div>
								<div class="image-desc">'.$Album->getImgDescription().'</div>
							</div>
						</li>						
						
';
}
?>
		</ul>
				</div>
				<div style="clear: both;"></div>

<hr class="clear" />


        <form action="" method="post" enctype="multipart/form-data">
        <table width="100%" border="0">
  <tr>
    <td width="8%">Title:</td>
    <td width="47%"><input name="imgTitle" type="text" id="imgTitle" size="55" maxlength="55"></td>
    <td width="45%">&nbsp;</td>
  </tr>
  <tr>
    <td> Image:</td>
    <td><input name="file" type="file"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><textarea name="imgDescription" id="imgDescription" cols="45" rows="5"></textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="hidden" name="ID" id="hiddenField" value="<?php echo $Encryption->encode($albumID) ?>"></td>
    <td><input name="fileBtn" type="submit" value="Upload"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
      </form><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>


</div>                
</div>
</div>
<?php include("../inc/pageElements/footerClub.php"); ?>
</div><!--End container-->

<script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				$('div.navigation').css({'width' : '300px', 'float' : 'left'});
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#thumbs ul.thumbs li').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 15,
					preloadAhead:              10,
					enableTopPager:            true,
					enableBottomPager:         true,
					maxPagesToShow:            7,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              'Play Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Previous Photo',
					nextLinkText:              'Next Photo &rsaquo;',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             false,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						this.fadeTo('fast', 1.0);
					}
				});
			});
		</script>

</body>
</html>
<?php 
 if(isset($_SESSION['errorMsg'])) {
  unset($_SESSION['errorMsg']);
  } 
  
?>