<?php require_once('../Connections/conn.php'); ?>
<?php
require_once("functions.inc.php");
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
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE ebapi_settings SET site_id=%s, camp_id=%s, partn_id=%s, categories=%s, keywords=%s, sellers=%s, currency_sign=%s, default_sort=%s, displ_search=%s, display_sort=%s, number_items=%s, display_navigation=%s, display_eb_logo=%s WHERE id_sett=%s",
                       GetSQLValueString($_POST['sel_site'], "text"),
                       GetSQLValueString($_POST['txt_id'], "text"),
                       GetSQLValueString($_POST['sel_partner'], "int"),
                       GetSQLValueString($_POST['txt_cat'], "text"),
                       GetSQLValueString($_POST['txt_kewords'], "text"),
                       GetSQLValueString($_POST['txt_seller'], "text"),
                       GetSQLValueString($_POST['txt_sign'], "text"),
                       GetSQLValueString($_POST['sel_sort'], "text"),
                       GetSQLValueString(isset($_POST['cb_search_displ']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['cb_sort_displ']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['txt_pagin'], "int"),
                       GetSQLValueString(isset($_POST['cb_nav_displ']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['cb_logo_displ']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['sett1'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());

  $updateGoTo = "index.php?update=ok";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE ebapi_settings SET lang_search=%s, lang_sortby=%s, lang_enlarge=%s, lang_description=%s, lang_pos_feedback=%s, lang_sortby_best=%s, lang_sortby_ending=%s, lang_sortby_price_desc=%s, lang_sortby_price_asc=%s, lang_seller=%s, lang_bin=%s, lang_bids=%s, lang_listing_type=%s, lang_auction=%s, lang_fixed_price=%s, lang_store_inv=%s, lang_best_off=%s, lang_getfast=%s, lang_free_sh=%s, lang_local_pic=%s, lang_min_pr=%s, lang_max_pr=%s, lang_all_categ=%s, lang_price=%s, `lang_time left`=%s, lang_more_op=%s, lang_less_op=%s, lang_search_desc=%s, lang_no_results=%s, lang_all=%s WHERE id_sett=%s",
                       GetSQLValueString($_POST['lang_search'], "text"),
                       GetSQLValueString($_POST['lang_sortby'], "text"),
                       GetSQLValueString($_POST['lang_enlarge'], "text"),
                       GetSQLValueString($_POST['lang_description'], "text"),
                       GetSQLValueString($_POST['lang_feedback'], "text"),
                       GetSQLValueString($_POST['lang_sortby_best'], "text"),
                       GetSQLValueString($_POST['lang_sortby_ending'], "text"),
                       GetSQLValueString($_POST['lang_sortby_price_desc'], "text"),
                       GetSQLValueString($_POST['lang_sortby_price_asc'], "text"),
                       GetSQLValueString($_POST['lang_seller'], "text"),
                       GetSQLValueString($_POST['lang_bin'], "text"),
                       GetSQLValueString($_POST['lang_bids'], "text"),
                       GetSQLValueString($_POST['lang_list_type'], "text"),
                       GetSQLValueString($_POST['lang_auction'], "text"),
                       GetSQLValueString($_POST['lang_fixed_price'], "text"),
                       GetSQLValueString($_POST['lang_store_inv'], "text"),
                       GetSQLValueString($_POST['lang_best_off'], "text"),
                       GetSQLValueString($_POST['lang_getfast'], "text"),
                       GetSQLValueString($_POST['lang_free_sh'], "text"),
                       GetSQLValueString($_POST['lang_local_pic'], "text"),
                       GetSQLValueString($_POST['lang_min_pr'], "text"),
                       GetSQLValueString($_POST['lang_max_pr'], "text"),
                       GetSQLValueString($_POST['lang_all_categ'], "text"),
                       GetSQLValueString($_POST['lang_price'], "text"),
                       GetSQLValueString($_POST['lang_time_left'], "text"),
                       GetSQLValueString($_POST['lang_more_op'], "text"),
                       GetSQLValueString($_POST['lang_less_op'], "text"),
                       GetSQLValueString($_POST['lang_search_desc'], "text"),
                       GetSQLValueString($_POST['lang_no_results'], "text"),
                       GetSQLValueString($_POST['lang_all'], "text"),
                       GetSQLValueString($_POST['sett2'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());

  $updateGoTo = "index.php?update=ok";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form3")) {
  $updateSQL = sprintf("UPDATE ebapi_settings SET filter_min=%s, filter_max=%s, filter_best=%s, filter_free=%s, filter_getfast=%s, filter_local=%s, filter_list_type=%s WHERE id_sett=%s",
                       GetSQLValueString($_POST['filter_min'], "int"),
                       GetSQLValueString($_POST['filter_max'], "int"),
                       GetSQLValueString(isset($_POST['filter_best']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['filter_free']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['filter_getfast']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['filter_local']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['filter_list_type'], "text"),
                       GetSQLValueString($_POST['sett3'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());

  $updateGoTo = "index.php?update=ok";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form4")) {
  $updateSQL = sprintf("UPDATE ebapi_settings SET login=%s, pass=%s WHERE id_sett=%s",
                       GetSQLValueString($_POST['login'], "text"),
                       GetSQLValueString($_POST['password1'], "text"),
                       GetSQLValueString($_POST['sett4'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());

  $updateGoTo = "index.php?update=ok";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_conn, $conn);
$query_rs_settings = "SELECT * FROM ebapi_settings WHERE ebapi_settings.id_sett='1'";
$rs_settings = mysql_query($query_rs_settings, $conn) or die(mysql_error());
$row_rs_settings = mysql_fetch_assoc($rs_settings);
$totalRows_rs_settings = mysql_num_rows($rs_settings);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Settings</title>
<script src="../functions/jquery.colourPicker-min.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<style type="text/css" media="all">
<!--
@import url("../CSSSculptor/1ColumnLiquidCenteredHeaderandFooter_DeepJungle_css/screen.css");
-->
</style>
<style type="text/css" media="print">
<!--
@import url("../CSSSculptor/1ColumnLiquidCenteredHeaderandFooter_DeepJungle_css/print.css");
-->
</style>
<link href="../SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<link href="form_styles.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="outerWrapper">
  <div id="header"><img src="logo_modular.jpg" alt="" width="215" height="62" />
    <div id="menumain">
      <ul>
        <li><a href="index.php">Settings</a></li>
        <li><a href="find_categories.php">Find Categories Numbers</a></li>
        <li><a href="find_kewords.php">Find Popular Keywords</a></li>
        <li><a href="<?php echo $FX_Logout ?>">Log Out</a></li>
       
      </ul>
    </div>
  </div>
  <div id="contentWrapper">
    <div id="content">
      <?php 
// Show IF Conditional region1 
if (@$_GET['update'] == "ok") {
?>
        <div class="gtick">You've successfully updated settings.</div>
        <?php } 
// endif Conditional region1
?>
<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Main Settings</li>
<li class="TabbedPanelsTab" tabindex="0">Language Settings</li>
<li class="TabbedPanelsTab" tabindex="0">Default Filter</li>
<li class="TabbedPanelsTab" tabindex="0">Change Password</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
      <form name="form1" class="Sharp_Default" id="form1" method="POST" action="<?php echo $editFormAction; ?>">
        <table width="113%" border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td width="20%" valign="top">eBay site</td>
            <td width="38%" valign="top"><span id="spryselect1">
              <label>
                <select name="sel_site" class="formMenufield_Large" id="sel_site">
                  <option value="EBAY-US*0" <?php if (!(strcmp("EBAY-US*0", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay United States</option>
                  <option value="EBAY-GB*3" <?php if (!(strcmp("EBAY-GB*3", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay UK</option>
                  <option value="EBAY-ENCA*2" <?php if (!(strcmp("EBAY-ENCA*2", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay Canada (English)</option>
                  <option value="EBAY-AT*16" <?php if (!(strcmp("EBAY-AT*16", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay Austria</option>
                  <option value="EBAY-AU*15" <?php if (!(strcmp("EBAY-AU*15", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay Australia</option>
                  <option value="EBAY-CH*193" <?php if (!(strcmp("EBAY-CH*193", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay Switzerland</option>
                  <option value="EBAY-DE*77" <?php if (!(strcmp("EBAY-DE*77", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay Germany</option>
                  <option value="EBAY-ES*186" <?php if (!(strcmp("EBAY-ES*186", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay Spain</option>
                  <option value="EBAY-FR*71" <?php if (!(strcmp("EBAY-FR*71", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay France</option>
                  <option value="EBAY-FRBE*23" <?php if (!(strcmp("EBAY-FRBE*23", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay Belgium (French)</option>
                  <option value="EBAY-FRC*,210" <?php if (!(strcmp("EBAY-FRCA*210", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay Canada (French)</option>
                  <option value="EBAY-HK*201" <?php if (!(strcmp("EBAY-HK*201", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay Hong Kong</option>
                  <option value="EBAY-IE*205" <?php if (!(strcmp("EBAY-IE*205", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay Ireland</option>
                  <option value="EBAY-IN*203" <?php if (!(strcmp("EBAY-IN*203", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay India</option>
                  <option value="EBAY-IT*101" <?php if (!(strcmp("EBAY-IT*101", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay Italy</option>
                  <option value="EBAY-MOTOR*100" <?php if (!(strcmp("EBAY-MOTOR*100", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay Motors</option>
                  <option value="EBAY-MY*207" <?php if (!(strcmp("EBAY-MY*207", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay Malaysia</option>
                  <option value="EBAY-NL*146" <?php if (!(strcmp("EBAY-NL*146", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay Netherlands</option>
                  <option value="EBAY-NLBE*123" <?php if (!(strcmp("EBAY-NLBE*123", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay Belgium (Dutch)</option>
                  <option value="EBAY-PH,211" <?php if (!(strcmp("EBAY-PH*211", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay Philippines</option>
                  <option value="EBAY-PL*212" <?php if (!(strcmp("EBAY-PL*212", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay Poland</option>
                  <option value="EBAY-SG*216" <?php if (!(strcmp("EBAY-SG*216", $row_rs_settings['site_id']))) {echo "selected=\"selected\"";} ?>>eBay Singapore</option>
                </select>
              </label>
              <span class="selectRequiredMsg">Please select an item.</span></span></td>
            <td width="42%" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td valign="top" nowrap="nowrap">Campaign ID/ Tracking ID</td>
            <td valign="top"><span id="sprytextfield2">
            <label>
              <input name="txt_id" type="text" class="formTextfield_Medium" id="txt_id" value="<?php echo $row_rs_settings['camp_id']; ?>" />
            </label>
</span></td>
            <td valign="top"> eBay Affiliate program  Campaign ID/ Tracking ID</td>
          </tr>
          <tr>
            <td valign="top">eBay Partner</td>
            <td valign="top"><span id="spryselect4">
              <label>
                <select name="sel_partner" class="formMenufield_Large" id="sel_partner"><option value="2" <?php if (!(strcmp(2, $row_rs_settings['partn_id']))) {echo "selected=\"selected\"";} ?>>Be Free</option><option value="3" <?php if (!(strcmp(3, $row_rs_settings['partn_id']))) {echo "selected=\"selected\"";} ?>>Affilinet</option><option value="4" <?php if (!(strcmp(4, $row_rs_settings['partn_id']))) {echo "selected=\"selected\"";} ?>>TradeDoubler</option><option value="5" <?php if (!(strcmp(5, $row_rs_settings['partn_id']))) {echo "selected=\"selected\"";} ?>>Mediaplex</option><option value="6" <?php if (!(strcmp(6, $row_rs_settings['partn_id']))) {echo "selected=\"selected\"";} ?>>DoubleClick</option><option value="7" <?php if (!(strcmp(7, $row_rs_settings['partn_id']))) {echo "selected=\"selected\"";} ?>>Allyes</option><option value="8" <?php if (!(strcmp(8, $row_rs_settings['partn_id']))) {echo "selected=\"selected\"";} ?>>BJMT</option><option value="9"<?php if (!(strcmp(9, $row_rs_settings['partn_id']))) {echo "selected=\"selected\"";} ?>>eBay Partner Network</option>
                </select>
              </label>
              <span class="selectRequiredMsg">Please select an item.</span></span></td>
            <td valign="top">Affiliate program partner </td>
          </tr>
          <tr>
            <td valign="top">Category Number<br />
              (<a href="find_categories.php">Find Numbers</a>)</td>
            <td valign="top"><span id="sprytextfield3">
              <input name="txt_cat" type="text" class="formTextfield_Large" id="txt_cat" value="<?php echo $row_rs_settings['categories']; ?>" />
              <span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
            <td valign="top"><p>(Category Number for default search, e.g. 1234 , can be empty if you want to search only by keywords or by seller).
             Can be mixed Keywords  and/or seller</p></td>
          </tr>
          <tr>
            <td valign="top">Keywords</td>
            <td valign="top"><span id="sprytextfield4">
              <label>
                <input name="txt_kewords" type="text" class="formTextfield_Large" id="txt_kewords" value="<?php echo $row_rs_settings['keywords']; ?>" />
              </label>
</span></td>
            <td valign="top">(Keywords for default search e.g. Harry Potter, can be empty if you want to search only by category. Can be mixed with Category Number and/or seller)</td>
          </tr>
          <tr>
            <td valign="top">Seller</td>
            <td valign="top"><span id="sprytextfield5">
              <label>
                <input name="txt_seller" type="text" class="formTextfield_Medium" id="txt_seller" value="<?php echo $row_rs_settings['sellers']; ?>" />
              </label>
</span></td>
            <td valign="top">(if specified only items from this seller will be shown)</td>
          </tr>
          
          <tr>
            <td valign="top">Currency Sign</td>
            <td valign="top"><span id="sprytextfield6">
              <label>
                <input name="txt_sign" type="text" class="formTextfield_Small" id="txt_sign" value="<?php echo $row_rs_settings['currency_sign']; ?>" />
              </label>
</span></td>
            <td valign="top">Currency sign to display on page.</td>
          </tr>
          <tr>
            <td valign="top">Default Sort</td>
            <td valign="top"><span id="spryselect3">
              <label>
                <select name="sel_sort" class="formMenufield_Large" id="sel_sort">
                  <option value="PricePlusShippingLowest" <?php if (!(strcmp("PricePlusShippingLowest", $row_rs_settings['default_sort']))) {echo "selected=\"selected\"";} ?>>Price: lowest first</option>
                  <option value="PricePlusShippingHighest" <?php if (!(strcmp("PricePlusShippingHighest", $row_rs_settings['default_sort']))) {echo "selected=\"selected\"";} ?>>Price: Highest first</option>
                  <option value="BestMatch" <?php if (!(strcmp("BestMatch", $row_rs_settings['default_sort']))) {echo "selected=\"selected\"";} ?>>Best Match</option>
                  <option value="EndTimeSoonest" <?php if (!(strcmp("EndTimeSoonest", $row_rs_settings['default_sort']))) {echo "selected=\"selected\"";} ?>>Ending soonest first</option>
                </select>
              </label>
              <span class="selectRequiredMsg">Please select an item.</span></span></td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td valign="top">Number of items per page</td>
            <td valign="top"><span id="sprytextfield7">
              <label>
                <input name="txt_pagin" type="text" class="formTextfield_Small" id="txt_pagin" value="<?php echo $row_rs_settings['number_items']; ?>" />
                <span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMinValueMsg">The entered value is less than the minimum required.</span><span class="textfieldMaxValueMsg">The entered value is greater than the maximum allowed.</span></label>
</span></td>
            <td valign="top">(Min 1 ,Max 100)</td>
          </tr>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top"><label>
              <input <?php if (!(strcmp($row_rs_settings['displ_search'],1))) {echo "checked=\"checked\"";} ?> name="cb_search_displ" type="checkbox" id="cb_search_displ" value="1" />
              Display search box</label></td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top"><label>
              <input <?php if (!(strcmp($row_rs_settings['display_sort'],1))) {echo "checked=\"checked\"";} ?> name="cb_sort_displ" type="checkbox" id="cb_sort_displ" value="1" />
              Display Sort Menu</label></td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top"><label>
              <input <?php if (!(strcmp($row_rs_settings['display_navigation'],1))) {echo "checked=\"checked\"";} ?> name="cb_nav_displ" type="checkbox" id="cb_nav_displ" value="1" />
              Display Navigation</label></td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top"><label>
              <input <?php if (!(strcmp($row_rs_settings['display_eb_logo'],1))) {echo "checked=\"checked\"";} ?> name="cb_logo_displ" type="checkbox" id="cb_logo_displ" value="1" />
              Display eBay Logo ('Now on eBay') </label></td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top"><label>
              <input type="submit" name="button" id="button" value="Submit" />
            </label></td>
            <td valign="top"><input name="sett1" type="hidden" id="sett1" value="<?php echo $row_rs_settings['id_sett']; ?>" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_update" value="form1" />
      </form>
    </div>
<div class="TabbedPanelsContent"><br />
  <form name="form2" class="Sharp_Default" id="form2" method="POST" action="<?php echo $editFormAction; ?>">
        <table width="133%" border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td width="5%" nowrap="nowrap">Search button text</td>
            <td width="18%"><span id="sprytextfield1">
              <input name="lang_search" type="text" class="formTextfield_Large" id="lang_search" value="<?php echo $row_rs_settings['lang_search']; ?>" />
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td width="23%" nowrap="nowrap">&nbsp;</td>
            <td width="23%" nowrap="nowrap">Min Price</td>
            <td width="54%"><span id="sprytextfield21">
              <label>
                <input name="lang_min_pr" type="text" class="formTextfield_Large" id="lang_min_pr" value="<?php echo $row_rs_settings['lang_min_pr']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td nowrap="nowrap">Sort menu label</td>
            <td><span id="sprytextfield8">
              <label>
                <input name="lang_sortby" type="text" class="formTextfield_Large" id="lang_sortby" value="<?php echo $row_rs_settings['lang_sortby']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap">Max Price</td>
            <td><span id="sprytextfield22">
              <label>
                <input name="lang_max_pr" type="text" class="formTextfield_Large" id="lang_max_pr" value="<?php echo $row_rs_settings['lang_max_pr']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td nowrap="nowrap">Enlarge link</td>
            <td><span id="sprytextfield9">
              <label>
                <input name="lang_enlarge" type="text" class="formTextfield_Large" id="lang_enlarge" value="<?php echo $row_rs_settings['lang_enlarge']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap">All categories</td>
            <td><span id="sprytextfield23">
              <label>
                <input name="lang_all_categ" type="text" class="formTextfield_Large" id="lang_all_categ" value="<?php echo $row_rs_settings['lang_all_categ']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td nowrap="nowrap">Description link</td>
            <td><span id="sprytextfield10">
              <label>
                <input name="lang_description" type="text" class="formTextfield_Large" id="lang_description" value="<?php echo $row_rs_settings['lang_description']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap">Price</td>
            <td><span id="sprytextfield24">
              <label>
                <input name="lang_price" type="text" class="formTextfield_Large" id="lang_price" value="<?php echo $row_rs_settings['lang_price']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td nowrap="nowrap">Seller info Link</td>
            <td><span id="sprytextfield11">
              <label>
                <input name="lang_seller" type="text" class="formTextfield_Large" id="lang_seller" value="<?php echo $row_rs_settings['lang_seller']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap">Time left</td>
            <td><span id="sprytextfield25">
              <label>
                <input name="lang_time_left" type="text" class="formTextfield_Large" id="lang_time left" value="<?php echo $row_rs_settings['lang_time left']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td nowrap="nowrap">Buy it Now</td>
            <td><span id="sprytextfield12">
              <label>
                <input name="lang_bin" type="text" class="formTextfield_Large" id="lang_bin" value="<?php echo $row_rs_settings['lang_bin']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap">More options</td>
            <td><span id="sprytextfield26">
              <label>
                <input name="lang_more_op" type="text" class="formTextfield_Large" id="lang_more_op" value="<?php echo $row_rs_settings['lang_more_op']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td nowrap="nowrap">bids</td>
            <td><span id="sprytextfield13">
              <label>
                <input name="lang_bids" type="text" class="formTextfield_Large" id="lang_bids" value="<?php echo $row_rs_settings['lang_bids']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap">Less options</td>
            <td><span id="sprytextfield27">
              <label>
                <input name="lang_less_op" type="text" class="formTextfield_Large" id="lang_less_op" value="<?php echo $row_rs_settings['lang_less_op']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td nowrap="nowrap">Auction</td>
            <td><span id="sprytextfield14">
              <label>
                <input name="lang_auction" type="text" class="formTextfield_Large" id="lang_auction" value="<?php echo $row_rs_settings['lang_auction']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap">Search in title<br />
and Description</td>
            <td><span id="sprytextfield28">
              <label>
                <input name="lang_search_desc" type="text" class="formTextfield_Large" id="lang_search_desc" value="<?php echo $row_rs_settings['lang_search_desc']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td nowrap="nowrap">Fixed Price</td>
            <td><span id="sprytextfield15">
              <label>
                <input name="lang_fixed_price" type="text" class="formTextfield_Large" id="lang_fixed_price" value="<?php echo $row_rs_settings['lang_fixed_price']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap">No Results for your<br />
              Search</td>
            <td><span id="sprytextfield29">
              <label>
                <input name="lang_no_results" type="text" class="formTextfield_Large" id="lang_no_results" value="<?php echo $row_rs_settings['lang_no_results']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td nowrap="nowrap">Store Inventory</td>
            <td><span id="sprytextfield16">
              <label>
                <input name="lang_store_inv" type="text" class="formTextfield_Large" id="lang_store_inv" value="<?php echo $row_rs_settings['lang_store_inv']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap">Sort menu:<br />
Best Match</td>
            <td><span id="sprytextfield30">
              <label>
                <input name="lang_sortby_best" type="text" class="formTextfield_Large" id="lang_sortby_best" value="<?php echo $row_rs_settings['lang_sortby_best']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td nowrap="nowrap">Best Offer</td>
            <td><span id="sprytextfield17">
              <label>
                <input name="lang_best_off" type="text" class="formTextfield_Large" id="lang_best_off " value="<?php echo $row_rs_settings['lang_best_off']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap">Sort menu:<br />
Ending soonest</td>
            <td><span id="sprytextfield31">
              <label>
                <input name="lang_sortby_ending" type="text" class="formTextfield_Large" id="lang_sortby_ending" value="<?php echo $row_rs_settings['lang_sortby_ending']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td nowrap="nowrap">Get It Fast!</td>
            <td><span id="sprytextfield18">
              <label>
                <input name="lang_getfast" type="text" class="formTextfield_Large" id="lang_getfast " value="<?php echo $row_rs_settings['lang_getfast']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap">Sort menu:<br />
Price: highest first</td>
            <td><span id="sprytextfield32">
              <label>
                <input name="lang_sortby_price_desc" type="text" class="formTextfield_Large" id="lang_sortby_price_desc" value="<?php echo $row_rs_settings['lang_sortby_price_desc']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td nowrap="nowrap">Free Shipping</td>
            <td><span id="sprytextfield19">
              <label>
                <input name="lang_free_sh" type="text" class="formTextfield_Large" id="lang_free_sh" value="<?php echo $row_rs_settings['lang_free_sh']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap">Sort menu: <br />
              Price: lowest first</td>
            <td><span id="sprytextfield33">
              <label>
                <input name="lang_sortby_price_asc" type="text" class="formTextfield_Large" id="lang_sortby_price_asc" value="<?php echo $row_rs_settings['lang_sortby_price_asc']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td nowrap="nowrap">Local Pick Up</td>
            <td><span id="sprytextfield20">
              <label>
                <input name="lang_local_pic" type="text" class="formTextfield_Large" id="lang_local_pic" value="<?php echo $row_rs_settings['lang_local_pic']; ?>" />
              </label>
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap">Positive feedback:</td>
            <td><span id="sprytextfield38">
              <input name="lang_feedback" type="text" class="formTextfield_Large" id="lang_feedback" value="<?php echo $row_rs_settings['lang_pos_feedback']; ?>" />
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td nowrap="nowrap">Listing type</td>
            <td><span id="sprytextfield37">
              <input name="lang_list_type" type="text" class="formTextfield_Large" id="lang_list_type" value="<?php echo $row_rs_settings['lang_listing_type']; ?>" />
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap">All (Listing types)</td>
            <td><span id="sprytextfield39">
              <input name="lang_all" type="text" class="formTextfield_Large" id="lang_all" value="<?php echo $row_rs_settings['lang_all']; ?>" />
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td nowrap="nowrap">&nbsp;</td>
            <td>&nbsp;</td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap"><input type="submit" name="button2" id="button2" value="Submit" /></td>
            <td><input name="sett2" type="hidden" id="sett2" value="<?php echo $row_rs_settings['id_sett']; ?>" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_update" value="form2" />
      </form>
    </div>
<div class="TabbedPanelsContent">Filter for default search (when page loads)
  <form name="form3" class="Sharp_Default" id="form3" method="POST" action="<?php echo $editFormAction; ?>">
    <table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="15%">Min Price</td>
        <td width="85%"><span id="sprytextfield34">
        <input name="filter_min" type="text" class="formTextfield_Small" id="filter_min" value="<?php echo $row_rs_settings['filter_min']; ?>" />
<span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMinValueMsg">The entered value is less than the minimum required.</span></span></td>
      </tr>
      <tr>
        <td>Max Price</td>
        <td><span id="sprytextfield35">
          <label>
            <input name="filter_max" type="text" class="formTextfield_Small" id="filter_max" value="<?php echo $row_rs_settings['filter_max']; ?>" />
            <span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMinValueMsg">The entered value is less than the minimum required.</span></label>
</span></td>
      </tr>
      <tr>
        <td>Listing Type</td>
        <td><span id="spryselect5">
          <select name="filter_list_type" id="filter_list_type">
            <option value="All" <?php if (!(strcmp("All", $row_rs_settings['filter_list_type']))) {echo "selected=\"selected\"";} ?>>All</option>
            <option value="Auction" <?php if (!(strcmp("Auction", $row_rs_settings['filter_list_type']))) {echo "selected=\"selected\"";} ?>>Auction</option>
            <option value="AuctionWithBIN" <?php if (!(strcmp("AuctionWithBIN", $row_rs_settings['filter_list_type']))) {echo "selected=\"selected\"";} ?>>Auction With Buy It Now</option>
            <option value="FixedPrice" <?php if (!(strcmp("FixedPrice", $row_rs_settings['filter_list_type']))) {echo "selected=\"selected\"";} ?>>Fixed Price</option>
            <option value="StoreInventory" <?php if (!(strcmp("StoreInventory", $row_rs_settings['filter_list_type']))) {echo "selected=\"selected\"";} ?>>Store Inventory</option>
          </select>
          <span class="selectRequiredMsg">Please select an item.</span></span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input <?php if (!(strcmp($row_rs_settings['filter_free'],1))) {echo "checked=\"checked\"";} ?> name="filter_free" type="checkbox" id="filter_free" value="1" />
          Free Shipping only</label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input <?php if (!(strcmp($row_rs_settings['filter_best'],1))) {echo "checked=\"checked\"";} ?> name="filter_best" type="checkbox" id="filter_best" value="1" />
          With Best Offer Only</label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input <?php if (!(strcmp($row_rs_settings['filter_local'],1))) {echo "checked=\"checked\"";} ?> name="filter_local" type="checkbox" id="filter_local" value="1" />
          Local Pick Up Only</label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input <?php if (!(strcmp($row_rs_settings['filter_getfast'],1))) {echo "checked=\"checked\"";} ?> name="filter_getfast" type="checkbox" id="filter_getfast" value="1" />
          Get It fast Only</label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="button3" id="button3" value="Submit" />
        </label>
          <input name="sett3" type="hidden" id="sett3" value="<?php echo $row_rs_settings['id_sett']; ?>" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_update" value="form3" />
  </form>
</div>
<div class="TabbedPanelsContent">
  <form name="form4" class="Sharp_Default" id="form4" method="POST" action="<?php echo $editFormAction; ?>">
    <table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="23%">Login (email address - in a case you forget your password)</td>
        <td width="77%"><span id="sprytextfield36">
        <input name="login" type="text" class="formTextfield_Large" id="login" value="<?php echo $row_rs_settings['login']; ?>" />
        <span class="textfieldRequiredMsg">A value is required. Invalid</span><span class="textfieldInvalidFormatMsg"> format.</span></span></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><span id="sprypassword1">
        <input name="password1" type="password" class="formTextfield_Large" id="password1" />
        <span class="passwordRequiredMsg">A value is required. Minimum</span><span class="passwordMinCharsMsg"> number of characters not met. Exceeded</span><span class="passwordMaxCharsMsg"> maximum number of characters.</span></span></td>
      </tr>
      <tr>
        <td>Confirm Password</td>
        <td><span id="spryconfirm1">
          <input name="password2" type="password" class="formTextfield_Large" id="password2" />
          <span class="confirmRequiredMsg">A value is required.</span><span class="confirmInvalidMsg">The values don't match.</span></span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="button4" id="button4" value="Submit" />
          <input name="sett4" type="hidden" id="sett4" value="<?php echo $row_rs_settings['id_sett']; ?>" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_update" value="form4" />
  </form>
</div>
  </div>
</div>
   <span style="color:#FFF"> ll</span></div>
  </div>
  <div id="footer">Copyright &copy; Esmistudio.com 2010</div>
</div>
<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {isRequired:false});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {isRequired:false});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {isRequired:false});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {isRequired:false});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "integer", {minValue:1, maxValue:100});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {isRequired:false});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10");
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11");
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12");
var sprytextfield13 = new Spry.Widget.ValidationTextField("sprytextfield13");
var sprytextfield14 = new Spry.Widget.ValidationTextField("sprytextfield14");
var sprytextfield15 = new Spry.Widget.ValidationTextField("sprytextfield15");
var sprytextfield16 = new Spry.Widget.ValidationTextField("sprytextfield16");
var sprytextfield17 = new Spry.Widget.ValidationTextField("sprytextfield17");
var sprytextfield18 = new Spry.Widget.ValidationTextField("sprytextfield18");
var sprytextfield19 = new Spry.Widget.ValidationTextField("sprytextfield19");
var sprytextfield20 = new Spry.Widget.ValidationTextField("sprytextfield20");
var sprytextfield21 = new Spry.Widget.ValidationTextField("sprytextfield21");
var sprytextfield22 = new Spry.Widget.ValidationTextField("sprytextfield22");
var sprytextfield23 = new Spry.Widget.ValidationTextField("sprytextfield23");
var sprytextfield24 = new Spry.Widget.ValidationTextField("sprytextfield24");
var sprytextfield25 = new Spry.Widget.ValidationTextField("sprytextfield25");
var sprytextfield26 = new Spry.Widget.ValidationTextField("sprytextfield26");
var sprytextfield27 = new Spry.Widget.ValidationTextField("sprytextfield27");
var sprytextfield28 = new Spry.Widget.ValidationTextField("sprytextfield28");
var sprytextfield29 = new Spry.Widget.ValidationTextField("sprytextfield29");
var sprytextfield30 = new Spry.Widget.ValidationTextField("sprytextfield30");
var sprytextfield31 = new Spry.Widget.ValidationTextField("sprytextfield31");
var sprytextfield32 = new Spry.Widget.ValidationTextField("sprytextfield32");
var sprytextfield33 = new Spry.Widget.ValidationTextField("sprytextfield33");
var sprytextfield34 = new Spry.Widget.ValidationTextField("sprytextfield34", "integer", {minValue:0.01, isRequired:false});
var sprytextfield35 = new Spry.Widget.ValidationTextField("sprytextfield35", "integer", {isRequired:false, minValue:0.01});
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5");
var sprytextfield36 = new Spry.Widget.ValidationTextField("sprytextfield36", "email");
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {minChars:4, maxChars:255});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "password1");
var sprytextfield37 = new Spry.Widget.ValidationTextField("sprytextfield37");
var sprytextfield38 = new Spry.Widget.ValidationTextField("sprytextfield38");
var sprytextfield39 = new Spry.Widget.ValidationTextField("sprytextfield39");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($rs_settings);
?>
