<?php require_once("functions.inc.php");
// *** Logout the current user.
$FX_Logout = $_SERVER['PHP_SELF'] . "?FX_Logoutnow=1";
if (isset($_GET['FX_Logoutnow']) && $_GET['FX_Logoutnow']=="1") {
  if (!session_id()) session_start();
  KT_session_register("eb_usr");
  KT_session_register("eb_pass");
  $FX_logoutRedirectPage = "login.php";
  // redirect with URL parameters (remove the "FX_Logoutnow" query param).
  if ($FX_logoutRedirectPage == "") $FX_logoutRedirectPage = $_SERVER['PHP_SELF'];
  if (!strpos($FX_logoutRedirectPage, "?") && $_SERVER['QUERY_STRING'] != "") {
    $FX_newQS = "?";
    reset ($_GET);
    while (list ($key, $val) = each ($_GET)) {
      if($key != "FX_Logoutnow"){
        if (strlen($FX_newQS) > 1) $FX_newQS .= "&";
        $FX_newQS .= $key . "=" . urlencode($val);
      }
    }
    if (strlen($FX_newQS) > 1) $FX_logoutRedirectPage .= $FX_newQS;
  }
  header("Location: $FX_logoutRedirectPage");
  exit;
}
// *** Restrict Access To Page: Grant or deny access to this page
$FX_authorizedUsers=" ";
$FX_authFailedURL="login.php";
$FX_grantAccess=0;
if (!session_id()) session_start();
if (isset($_SESSION["url_eb_usr"])) KT_session_register("url_eb_usr");
if (isset($_SESSION["eb_usr"])) {
  if (true || !(isset($_SESSION["eb_pass"])) || $_SESSION["eb_pass"]=="" || strpos($FX_authorizedUsers, $_SESSION["eb_pass"])) {
    $FX_grantAccess = 1;
  }
}
if (!$FX_grantAccess) {
  $url_eb_usr = "http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
  if (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != "") $url_eb_usr .= "?".$_SERVER['QUERY_STRING'];
  session_register("url_eb_usr");
  $FX_qsChar = "?";
  if (strpos($FX_authFailedURL, "?")) $FX_qsChar = "&";
  $FX_denymsg = "Restricted Area";
  $FX_authFailedURL = $FX_authFailedURL . $FX_qsChar . "accessdeniedmsg=" . urlencode($FX_denymsg);
  header("Location: $FX_authFailedURL");
  exit;
}
 
if(isset($_GET['sel_site'])){
$id=explode("*",($_GET['sel_site']));	
$endpoint1 = 'http://open.api.ebay.com/shopping';  // URL to call
    $responseencoding1 = 'XML';  
	 $apicall2 = "$endpoint1?callname=GetCategoryInfo"
                 . "&version=537"
                 . "&siteid=".$id[1]
                 . "&appid=Volkovs7e-9d8f-463b-9fdb-d18a6b671a6" 
				 . "&CategoryID=-1"
				 . "&IncludeSelector=ChildCategories"
				 //. "&CategoryID=65181"
                 //. "&QueryKeywords=$safeQuery"
				// . "&IncludeSellers=studio_dv"
                 
                 . "&responseencoding=$responseencoding1";
				 
        
	$out = simplexml_load_file($apicall2);
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Find categories</title>
<script src="../functions/jquery.colourPicker-min.js" type="text/javascript"></script>

<style type="text/css" media="all">
<!--
@import url("../CSSSculptor/1ColumnLiquidCenteredHeaderandFooter_DeepJungle_css/screen.css");
>
</style>
<style type="text/css" media="print">
<!--
@import url("../CSSSculptor/1ColumnLiquidCenteredHeaderandFooter_DeepJungle_css/print.css");

-->
</style>
<link href="form_styles.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="outerWrapper">
  <div id="header"><div id="img"><img src="logo_modular.jpg" alt="" width="215" height="62" /></div>
    <div id="menumain"><ul><li><a href="index.php">Settings</a></li> <li><a href="find_categories.php">Find Categories Numbers</a></li> <li><a href="find_kewords.php">Find Popular Keywords</a></li> <li><a href="<?php echo $FX_Logout ?>">Log Out</a></li></ul></div>
  </div>
  <div id="contentWrapper">
    <div id="content">
<h1>Find Categories Numbers<br />
</h1>
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td width="27%" valign="top"><p><strong>Find all categories numbers:</strong><br />
      <br />
      <a href="http://listings.ebay.com/_W0QQfclZ1QQloctZShowCatIdsQQsocmdZListingCategoryList" target="_blank">eBay United States</a><br />
      <a href="http://listings.ebay.co.uk/_W0QQfclZ1QQloctZShowCatIdsQQsocmdZListingCategoryList" target="_blank">eBay UK</a><br />
      <a href="http://listings.ebay.ca/_W0QQfclZ1QQloctZShowCatIdsQQsocmdZListingCategoryList" target="_blank">eBay Canada (English)</a><br />
      <a href="http://listings.ebay.at/_W0QQfclZ1QQloctZShowCatIdsQQsocmdZListingCategoryList" target="_blank">eBay Austria</a><br />
      <a href="http://listings.ebay.com.au/_W0QQfclZ1QQloctZShowCatIdsQQsocmdZListingCategoryList" target="_blank">eBay Australia</a><br />
      <a href="http://listings.ebay.ch/_W0QQfclZ1QQloctZShowCatIdsQQsocmdZListingCategoryList" target="_blank">eBay Switzerland</a><br />
      <a href="http://listings.ebay.de/_W0QQfclZ1QQloctZShowCatIdsQQsocmdZListingCategoryList" target="_blank">eBay Germany</a><br />
      <a href="http://listings.ebay.es/_W0QQfclZ1QQloctZShowCatIdsQQsocmdZListingCategoryList" target="_blank">eBay Spain</a><br />
      <a href="http://listings.ebay.fr/_W0QQfclZ1QQloctZShowCatIdsQQsocmdZListingCategoryList" target="_blank">eBay France</a><br />
      <a href="http://listings.befr.ebay.be/_W0QQloctZShowCatIdsQQsacatZQ2d1QQsalocationZlisQQsocmdZListingCategoryList" target="_blank">eBay Belgium (French)</a><br />
      <a href="http://listings.cafr.ebay.ca/_W0QQloctZShowCatIdsQQsacatZQ2d1QQsalocationZatcQQsocmdZListingCategoryList" target="_blank">eBay Canada (French)</a><br />
      <a href="http://listings.ebay.com.hk/_W0QQsocmdZListingCategoryList" target="_blank">eBay Hong Kong</a><br />
      <a href="http://listings.ebay.ie/_W0QQloctZShowCatIdsQQsacatZQ2d1QQsalocationZatsQQsocmdZListingCategoryList" target="_blank">eBay Ireland</a><br />
      <a href="http://listings.ebay.in/_W0QQloctZShowCatIdsQQsacatZQ2d1QQsalocationZatsQQsocmdZListingCategoryList" target="_blank">eBay India</a><br />
      <a href="http://listings.ebay.it/_W0QQloctZShowCatIdsQQsacatZQ2d1QQsalocationZlisQQsocmdZListingCategoryList" target="_blank">eBay Italy</a><br />
      <a href="http://motors.listings.ebay.com/_W0QQloctZShowCatIdsQQsacatZQ2d1QQsocmdZListingCategoryList" target="_blank">eBay Motors</a><br />
      <a href="http://listings.ebay.com.my/_W0QQloctZShowCatIdsQQsacatZQ2d1QQsalocationZlicQQsocmdZListingCategoryList" target="_blank">eBay Malaysia</a><br />
      <a href="http://listings.ebay.nl/_W0QQloctZShowCatIdsQQsacatZQ2d1QQsalocationZlisQQsocmdZListingCategoryList" target="_blank">eBay Netherlands</a><br />
      <a href="http://listings.benl.ebay.be/_W0QQloctZShowCatIdsQQsacatZQ2d1QQsalocationZlisQQsocmdZListingCategoryList" target="_blank">eBay Belgium (Dutch)</a><br />
      <a href="http://listings.ebay.ph/_W0QQloctZShowCatIdsQQsacatZQ2d1QQsalocationZlicQQsocmdZListingCategoryList" target="_blank">eBay Philippines</a><br />
      <a href="http://listings.ebay.pl/_W0QQloctZShowCatIdsQQsacatZQ2d1QQsalocationZlisQQsocmdZListingCategoryList" target="_blank">eBay Poland</a><br />
      <a href="http://listings.ebay.com.sg/_W0QQloctZShowCatIdsQQsacatZQ2d1QQsalocationZlisQQsocmdZListingCategoryList" target="_blank">eBay Singapore</a><br />
      <br />
        <br />
        <br />
        <br />
        <br />
      </p></td>
    <td width="3%">&nbsp;</td>
    <td width="70%" valign="top"><strong>Top Level Categories for eBay sites:</strong><br />
      <br />
<form id="form1" class="Sharp_Default" method="get" action="">
  <table border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td><label>Site
              <select name="sel_site" class="formMenufield_Large" id="sel_site">
                  <option value="EBAY-US*0" <?php if (!(strcmp("EBAY-US*0", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay United States</option>
                  <option value="EBAY-GB*3" <?php if (!(strcmp("EBAY-GB*3", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay UK</option>
                  <option value="EBAY-ENCA*2" <?php if (!(strcmp("EBAY-ENCA*2", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay Canada (English)</option>
                  <option value="EBAY-AT*16" <?php if (!(strcmp("EBAY-AT*16", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay Austria</option>
                  <option value="EBAY-AU*15" <?php if (!(strcmp("EBAY-AU*15", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay Australia</option>
                  <option value="EBAY-CH*193" <?php if (!(strcmp("EBAY-CH*193", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay Switzerland</option>
                  <option value="EBAY-DE*77" <?php if (!(strcmp("EBAY-DE*77", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay Germany</option>
                  <option value="EBAY-ES*186" <?php if (!(strcmp("EBAY-ES*186", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay Spain</option>
                  <option value="EBAY-FR*71" <?php if (!(strcmp("EBAY-FR*71", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay France</option>
                  <option value="EBAY-FRBE*23" <?php if (!(strcmp("EBAY-FRBE*23", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay Belgium (French)</option>
                  <option value="EBAY-FRCA*210" <?php if (!(strcmp("EBAY-FRCA*210", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay Canada (French)</option>
                  <option value="EBAY-HK*201" <?php if (!(strcmp("EBAY-HK*201", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay Hong Kong</option>
                  <option value="EBAY-IE*205" <?php if (!(strcmp("EBAY-IE*205", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay Ireland</option>
                  <option value="EBAY-IN*203" <?php if (!(strcmp("EBAY-IN*203", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay India</option>
                  <option value="EBAY-IT*101" <?php if (!(strcmp("EBAY-IT*101", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay Italy</option>
                  <option value="EBAY-MOTOR*100" <?php if (!(strcmp("EBAY-MOTOR*100", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay Motors</option>
                  <option value="EBAY-MY*207" <?php if (!(strcmp("EBAY-MY*207", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay Malaysia</option>
                  <option value="EBAY-NL*146" <?php if (!(strcmp("EBAY-NL*146", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay Netherlands</option>
                  <option value="EBAY-NLBE*123" <?php if (!(strcmp("EBAY-NLBE*123", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay Belgium (Dutch)</option>
                  <option value="EBAY-PH*211" <?php if (!(strcmp("EBAY-PH*211", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay Philippines</option>
                  <option value="EBAY-PL*212" <?php if (!(strcmp("EBAY-PL*212", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay Poland</option>
                  <option value="EBAY-SG*216" <?php if (!(strcmp("EBAY-SG*216", @$_GET['sel_site']))) {echo "selected=\"selected\"";} ?>>eBay Singapore</option>
                </select>
            </label></td>
            <td><label>
              <input type="submit" name="button" id="button" value="Show Top Level Categories" />
            </label></td>
          </tr>
        </table>
  <br />
  <br />
</form>
<span class="Sharp_Default">
<?php 
  
  if(isset($_GET['sel_site'])){
  foreach($out->CategoryArray->Category as $cat1) {
	if($cat1->CategoryName=="Root")continue;

	?>
<?php echo $cat1->CategoryName;?> - <strong><?php echo $cat1->CategoryID;?></strong> <br />
<?php }}?>
</span></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
    </div>
  </div>
  <div id="footer">Copyright &copy; Esmistudio.com 2010</div>
</div>
</body>
</html>