<?php require_once('ebay_api/Connections/conn.php'); ?>
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

mysql_select_db($database_conn, $conn);
$query_rs_settings = "SELECT * FROM ebapi_settings WHERE ebapi_settings.id_sett='1'";
$rs_settings = mysql_query($query_rs_settings, $conn) or die(mysql_error());
$row_rs_settings = mysql_fetch_assoc($rs_settings);
$totalRows_rs_settings = mysql_num_rows($rs_settings);
?>

<?php
//error_reporting(E_ALL);  // Turn on all errors, warnings and notices for easier debugging	
	// Format of the response 
require_once('functions/DisplayUtils.php'); 
require_once("functions/keep_param.php"); 
// API request variables
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
$version = '1.0.0';  // API version supported by your application
$appid = 'Volkovs7e-9d8f-463b-9fdb-d18a6b671a6';  // Replace with your own AppID
$global1=explode('*',$row_rs_settings['site_id']);
$globalid = $global1[0];  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
if(isset($_GET['txt_keyword'])){
$query=	$_GET['txt_keyword'];
}elseif(!isset($_GET['txt_keyword'])&&$row_rs_settings['keywords']!=NULL){
$query = $row_rs_settings['keywords'];  // You may want to supply your own query
}else{
$query=NULL;
}
$safequery = urlencode($query);  // Make the query URL-friendly
$i = '0';  // Initialize the item filter index to 0
$XC_loc3 = basename($_SERVER['SCRIPT_NAME']);
// Create a PHP array of the item filters you want to use in your request

if(isset($_GET['txt_keyword'])){
if($_GET['txt_max']!=""){
$max1=$_GET['txt_max'];
}else{
$max1=1000000;											
}
if($_GET['txt_min']!=""){
$min1=$_GET['txt_min'];
}else{
$min1=0.01;											
}
if(isset($_GET['cb_free'])){
	$free55='true';
}else{
$free55='false';	
}
if(isset($_GET['cb_get_fast'])){
	$fast1='true';
}else{
$fast1='false';	
}
if(isset($_GET['cb_best'])){
	$best1='true';
}else{
$best1='false';	
}
if(isset($_GET['cb_local'])){
	$local1='true';
}else{
$local1='false';	
}
$listtye1=$_GET['sel_type'];
$filterarray =
  array(	
    array(
    'name' => 'MaxPrice',
    'value' => $max1,
    'paramName' => '',
    'paramValue' => ''),
	
	 array(
    'name' => 'MinPrice',
    'value' => $min1,
    'paramName' => '',
    'paramValue' => ''),
	

	
    array(
    'name' => 'FreeShippingOnly',
    'value' => $free55,
    'paramName' => '',
    'paramValue' => ''),
	
	 
	 array(
    'name' => 'LocalPickupOnly',
    'value' => $local1,
    'paramName' => '',
    'paramValue' => ''),
	 
	  array(
    'name' => 'GetItFastOnly',
    'value' => $fast1,
    'paramName' => '',
    'paramValue' => ''),
 array(
    'name' => 'BestOfferOnly',
    'value' => $best1,
    'paramName' => '',
    'paramValue' => ''),

    array(
    'name' => 'ListingType',
    'value' => array($listtye1),
    'paramName' => '',
    'paramValue' => ''),
  );	
}elseif($row_rs_settings['sellers']!=NULL){
//seller filter
	if($row_rs_settings['filter_max']!=NULL){
$max1=$row_rs_settings['filter_max'];
}else{
$max1=1000000;											
}
if($row_rs_settings['filter_min']!=NULL){
$min1=$row_rs_settings['filter_min'];
}else{
$min1=0.01;											
}
if($row_rs_settings['filter_free']=='1'){
	$free55='true';
}else{
$free55='false';	
}
if($row_rs_settings['filter_getfast']=='1'){
	$fast1='true';
}else{
$fast1='false';	
}
if($row_rs_settings['filter_best']=='1'){
	$best1='true';
}else{
$best1='false';	
}
if($row_rs_settings['filter_local']=='1'){
	$local1='true';
}else{
$local1='false';	
}
$listtye1=$row_rs_settings['filter_list_type'];
$filterarray =
  array(
    array(
    'name' => 'FreeShippingOnly',
    'value' => $free55,
    'paramName' => '',
    'paramValue' => ''),
	
    array(
    'name' => 'MaxPrice',
    'value' => $max1,
    'paramName' => '',
    'paramValue' => ''),
	
	 array(
    'name' => 'MinPrice',
    'value' => $min1,
    'paramName' => '',
    'paramValue' => ''),
	

	
	
	 
	 array(
    'name' => 'LocalPickupOnly',
    'value' => $local1,
    'paramName' => '',
    'paramValue' => ''),
	 
	  array(
    'name' => 'GetItFastOnly',
    'value' => $fast1,
    'paramName' => '',
    'paramValue' => ''),
 array(
    'name' => 'BestOfferOnly',
    'value' => $best1,
    'paramName' => '',
    'paramValue' => ''),
 array(
    'name' => 'Seller',
    'value' => $row_rs_settings['sellers'],
    'paramName' => '',
    'paramValue' => ''),
    array(
    'name' => 'ListingType',
    'value' => array($listtye1),
    'paramName' => '',
    'paramValue' => ''),
  );	
}else{
//default filter
	if($row_rs_settings['filter_max']!=NULL){
$max1=$row_rs_settings['filter_max'];
}else{
$max1=1000000;											
}
if($row_rs_settings['filter_min']!=NULL){
$min1=$row_rs_settings['filter_min'];
}else{
$min1=0.01;											
}
if($row_rs_settings['filter_free']=='1'){
	$free55='true';
}else{
$free55='false';	
}
if($row_rs_settings['filter_getfast']=='1'){
	$fast1='true';
}else{
$fast1='false';	
}
if($row_rs_settings['filter_best']=='1'){
	$best1='true';
}else{
$best1='false';	
}
if($row_rs_settings['filter_local']=='1'){
	$local1='true';
}else{
$local1='false';	
}
$listtye1=$row_rs_settings['filter_list_type'];
$filterarray =
  array(
    array(
    'name' => 'FreeShippingOnly',
    'value' => $free55,
    'paramName' => '',
    'paramValue' => ''),
	
    array(
    'name' => 'MaxPrice',
    'value' => $max1,
    'paramName' => '',
    'paramValue' => ''),
	
	 array(
    'name' => 'MinPrice',
    'value' => $min1,
    'paramName' => '',
    'paramValue' => ''),
	

	
	
	 
	 array(
    'name' => 'LocalPickupOnly',
    'value' => $local1,
    'paramName' => '',
    'paramValue' => ''),
	 
	  array(
    'name' => 'GetItFastOnly',
    'value' => $fast1,
    'paramName' => '',
    'paramValue' => ''),
 array(
    'name' => 'BestOfferOnly',
    'value' => $best1,
    'paramName' => '',
    'paramValue' => ''),

    array(
    'name' => 'ListingType',
    'value' => array($listtye1),
    'paramName' => '',
    'paramValue' => ''),
  );	
}
// Generates an indexed URL snippet from the array of item filters
function buildURLArray ($filterarray) {
  global $urlfilter;
  global $i;
  // Iterate through each filter in the array
  foreach($filterarray as $itemfilter) {
    // Iterate through each key in the filter
    foreach ($itemfilter as $key =>$value) {
      if(is_array($value)) {
        foreach($value as $j => $content) { // Index the key for each value
          $urlfilter .= "&itemFilter($i).$key($j)=$content";
        }
      }
      else {
        if($value != "") {
          $urlfilter .= "&itemFilter($i).$key=$value";
        }
      }
    }
    $i++;
  }
  return "$urlfilter";
} // End of buildURLArray function

// Build the indexed item filter URL snippet
buildURLArray($filterarray);

// Construct the findItemsByKeywords HTTP GET call 

$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsAdvanced";
$apicall .= "&SERVICE-VERSION=$version";
$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&GLOBAL-ID=$globalid";
if(isset($_GET['sel_category'])&&$_GET['sel_category']!=""){
$apicall .= "&categoryId=".$_GET['sel_category'];	
}elseif(!isset($_GET['sel_category'])&&$row_rs_settings['categories']!=NULL){
$apicall .= "&categoryId=".$row_rs_settings['categories'];	
}
if((isset($_GET['txt_keyword'])&&$_GET['txt_keyword']!="")||$row_rs_settings['keywords']!=NULL){
$apicall .= "&keywords=$safequery";
}
$apicall .= "&paginationInput.entriesPerPage=".$row_rs_settings['number_items'];//
if(isset($_GET['page'])){
$apicall .= "&paginationInput.pageNumber=".$_GET['page'];	
}
if(isset($_GET['sort_type'])&&$_GET['sort_type']!=""){
$apicall .= "&sortOrder=".$_GET['sort_type'];	
}else{
$apicall .= "&sortOrder=".$row_rs_settings['default_sort'];	
}
if(isset($_GET['cb_desc'])){
$apicall .= "&descriptionSearch=true";
}

$apicall .= "$urlfilter";
$apicall .= "&outputSelector=SellerInfo";
$apicall .=  "&affiliate.networkId=".$row_rs_settings['partn_id'];              // fill in your information in next 3 lines
$apicall .= "&affiliate.trackingId=".$row_rs_settings['camp_id'];

//echo $apicall."<br>";
//categoryId=1234
//descriptionSearch=true
// Load the call and capture the document returned by eBay API
$resp = simplexml_load_file($apicall);
//print_r ($resp);
// Check to see if the request was successful, else print an error

// If the response does not indicate 'Success,' print an error
$endpoint1 = 'http://open.api.ebay.com/shopping';  // URL to call
    $responseencoding1 = 'XML';  
	 $apicall2 = "$endpoint1?callname=GetCategoryInfo"
                 . "&version=537"
                 . "&siteid=".$global1[1]
                 . "&appid=Volkovs7e-9d8f-463b-9fdb-d18a6b671a6" 
				 . "&CategoryID=-1"
				 . "&IncludeSelector=ChildCategories"
				 //. "&CategoryID=65181"
                 //. "&QueryKeywords=$safeQuery"
				// . "&IncludeSellers=studio_dv"
                 
                 . "&responseencoding=$responseencoding1";
				 
        
	$out = simplexml_load_file($apicall2);
?>

<div id="eb_api" align="center">
  <table width="98%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="12%" valign="top"><?php 
// Show IF Conditional region1 
if (@$row_rs_settings['display_eb_logo'] == 1) {
?>
          <img src="ebay_api/eb_img/img_rightNowSampleLogo.gif" width="128" height="83" />
      <?php } 
// endif Conditional region1
?></td>
      <td width="88%"><form id="eb_search" name="eb_search" method="get" action="">
        <?php 
// Show IF Conditional region2 
if (@$row_rs_settings['displ_search'] == 1) {
?>
          <table border="0" align="right" cellpadding="5" cellspacing="0">
            <tr>
              <td><input name="txt_keyword" type="text" id="txt_keyword" size="40" /></td>
              <td><select name="sel_category" id="sel_category">
                <option value=""<?php if (!(strcmp("",@$_GET['sel_category']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_settings['lang_all_categ']; ?></option>
                <?php  foreach($out->CategoryArray->Category as $cat1) {
	if($cat1->CategoryName=="Root")continue;

	?>
                <option value="<?php echo $cat1->CategoryID;?>"<?php if (!(strcmp($cat1->CategoryID,@$_GET['sel_category']))) {echo "selected=\"selected\"";} ?>><?php echo $cat1->CategoryName;?></option>
                <?php }?>
              </select></td>
            </tr>
            <tr>
              <td><input <?php if (!(strcmp(@$_GET["cb_desc"],"true"))) {echo "checked=\"checked\"";} ?> name="cb_desc" type="checkbox" id="cb_desc" value="true" />
                <?php echo $row_rs_settings['lang_search_desc']; ?></td>
              <td><div align="right">
                <input type="submit" name="but_search" id="but_search" value="<?php echo $row_rs_settings['lang_search']; ?>" />
              </div></td>
            </tr>
            <tr>
              <td colspan="2"><div id="panel">
                <table border="0" cellspacing="0" cellpadding="4">
                  <tr>
                    <td nowrap="nowrap">&nbsp;</td>
                    <td nowrap="nowrap"><label><?php echo $row_rs_settings['lang_min_pr']; ?></label>
                      <input name="txt_min" type="text" id="txt_min" <?php if(isset($_GET["txt_min"])){?>value="<?php echo $_GET["txt_min"];?>" <?php }?> size="5" />
                      <label> <?php echo $row_rs_settings['lang_max_pr']; ?></label>
                      <input name="txt_max" type="text" id="txt_max" <?php if(isset($_GET["txt_max"])){?>value="<?php echo $_GET["txt_max"]; ?>"<?php }?> size="5" /></td>
                    <td nowrap="nowrap"><input <?php if (!(strcmp(@$_GET["cb_best"],"true"))) {echo "checked=\"checked\"";} ?>  name="cb_best" type="checkbox" id="cb_best" value="true" />
                      <?php echo $row_rs_settings['lang_best_off']; ?></td>
                  </tr>
                  <tr>
                    <td nowrap="nowrap"><?php echo $row_rs_settings['lang_listing_type']; ?></td>
                    <td nowrap="nowrap"><select name="sel_type" id="sl_type">
                      <option value="All"<?php if (!(strcmp("All",@$_GET['sel_type']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_settings['lang_all']; ?></option>
                      <option value="Auction"<?php if (!(strcmp("Auction",@$_GET['sel_type']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_settings['lang_auction']; ?></option>
                      <option value="FixedPrice"<?php if (!(strcmp("FixedPrice",@$_GET['sel_type']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_settings['lang_fixed_price']; ?></option>
                      <option value="StoreInventory"<?php if (!(strcmp("StoreInventory",@$_GET['sel_type']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_settings['lang_store_inv']; ?></option>
                    </select></td>
                    <td nowrap="nowrap"><input <?php if (!(strcmp(@$_GET["cb_local"],"true"))) {echo "checked=\"checked\"";} ?>  name="cb_local" type="checkbox" id="cb_local" value="true" />
                      <?php echo $row_rs_settings['lang_local_pic']; ?></td>
                  </tr>
                  <tr>
                    <td nowrap="nowrap">&nbsp;</td>
                    <td nowrap="nowrap"><input <?php if (!(strcmp(@$_GET["cb_free"],"true"))) {echo "checked=\"checked\"";} ?> name="cb_free" type="checkbox" id="cb_free" value="true" />
                      <?php echo $row_rs_settings['lang_free_sh']; ?>
                      <input name="sort_type" type="hidden" id="sort_type" value="<?php echo @$_GET['sort_type'];?>" /></td>
                    <td nowrap="nowrap"><input <?php if (!(strcmp(@$_GET["cb_get_fast"],"true"))) {echo "checked=\"checked\"";} ?>  name="cb_get_fast" type="checkbox" id="cb_get_fast" value="true" />
                      <?php echo $row_rs_settings['lang_getfast']; ?></td>
                  </tr>
                </table>
              </div>
                <a class="btn-slide" href="javascript:;"><span  id="n"><?php echo $row_rs_settings['lang_more_op']; ?></span><span class="less" id="b" ><?php echo $row_rs_settings['lang_less_op']; ?></span></a></td>
            </tr>
          </table>
          <?php } 
// endif Conditional region2
?>
      </form></td>
    </tr>
  </table>
  <br /><?php if($resp->paginationOutput->totalEntries>0){?>
  <table width="98%" cellpadding="4" id="eb_table">
    <tr id="eb_table_header">
      <td>&nbsp;</td>
      <td nowrap>&nbsp;</td>
      <td nowrap><?php 
// Show IF Conditional region3 
if (@$row_rs_settings['display_sort'] == 1) {
?>
          <strong><?php echo $row_rs_settings['lang_sortby']; ?> </strong>
          <select name="sel_sort" id="sel_sort"  onchange="MM_jumpMenu('parent',this,0)">
            <option value="<?php echo $XC_loc3; ?>?sort_type=EndTimeSoonest&<?php echo $MM_keepURL;?>" <?php if (!(strcmp("EndTimeSoonest",@$_GET['sort_type']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_settings['lang_sortby_ending']; ?></option>
            <option value="<?php echo $XC_loc3; ?>?sort_type=BestMatch&<?php echo $MM_keepURL;?>" <?php if (!(strcmp("BestMatch",@$_GET['sort_type']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_settings['lang_sortby_best']; ?></option>
            <option value="<?php echo $XC_loc3; ?>?sort_type=PricePlusShippingHighest&<?php echo $MM_keepURL;?>" <?php if (!(strcmp("PricePlusShippingHighest",@$_GET['sort_type']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_settings['lang_sortby_price_desc']; ?></option>
            <option value="<?php echo $XC_loc3; ?>?sort_type=PricePlusShippingLowest&<?php echo $MM_keepURL;?>" <?php if (!(strcmp("PricePlusShippingLowest",@$_GET['sort_type']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_settings['lang_sortby_price_asc']; ?></option>
          </select>
          <?php } 
// endif Conditional region3
?></td>
      <td><table width="100%" border="0" align="right" cellpadding="3" cellspacing="0" id="sm_table2">
        <tr>
          <td width="229" height="42">&nbsp;</td>
          <td width="110"><strong><?php echo $row_rs_settings['lang_price']; ?></strong></td>
          <td width="147" nowrap="nowrap"><strong><?php echo $row_rs_settings['lang_time left']; ?></strong></td>
          </tr>
      </table></td>
  </tr>
  <tr>
  <?php if ($resp->ack == "Success") {
  $results = '';
  $rt= $resp->paginationOutput->pageNumber;
  // If the response was loaded, parse it and build links  
  $k=0;
  foreach($resp->searchResult->item as $item) {
	  $k++;
    $pic   = $item->galleryURL;
    $link  = $item->viewItemURL;
    $title = $item->title;
	$seller_id=$item->sellerInfo->sellerUserName;
	$seller_feedback=$item->sellerInfo->feedbackScore;
	$seller_feedback_perc=$item->sellerInfo->positiveFeedbackPercent;
		$seller_top=$item->sellerInfo->topRatedSeller;
  $timeLeft=getPrettyTimeFromEbayTime($item->sellingStatus->timeLeft);
 
    // For each SearchResultItem node, build a link and append it to $results
   // $results .= "<tr><td>></td><td><a href=\"$link\">$title</a></td></tr>";?>
    
    
    
    <td width="5%"><?php if($pic!=""){?><a  href="eb_big_image.php?id=<?php echo  $item->itemId;?>" rel="facebox"><img src="<?php echo $pic;?>" border="0" /><br />
      <?php echo $row_rs_settings['lang_enlarge']; ?>
      </a><?php }?></td>
    <td width="1%" nowrap>&nbsp;</td>
    <td width="45%" valign="top"><a href="<?php echo $link;?>" target="_blank"><span class="descr"><?php echo $title; ?></span>
      
      
      </a><br /> <br /><a href="eb_desription.php?id=<?php echo  $item->itemId;?>" rel="facebox"><?php echo $row_rs_settings['lang_description']; ?></a><br />
      <br />
      <a href="javascript:;" class="s_info" onclick="show_sel('<?php echo 'l'.$k;?>');"><?php echo $row_rs_settings['lang_seller']; ?></a>
      <div class="seller_info" id="<?php echo 'l'.$k;?>" style="display:none"><strong><?php echo $seller_id."(".$seller_feedback.")";?></strong><br /> 
      <?php echo $row_rs_settings['lang_pos_feedback']; ?><strong>(<?php echo $seller_feedback_perc;  ?>%)</strong><br /><?php if ($seller_top=="true"){?><img src="eb_img/iconTrsXSmall.gif" width="66" height="30" /><?php }?></div></td>
    <td width="49%"><table width="100%" border="0" align="right" cellpadding="3" cellspacing="0" id="sm_table">
      <tr>
        <td width="231"><strong>
          <?php if ($item->sellingStatus->bidCount==""){?>
          </strong><?php echo $row_rs_settings['lang_bin']; ?>
          <?php }else{ echo $item->sellingStatus->bidCount;?>
          <?php echo $row_rs_settings['lang_bids']; ?>
          <strong>
            <?php }?>
            </strong></td>
        <td width="110"><strong><?php echo $row_rs_settings['currency_sign']; ?><?php echo sprintf("%01.2f",$item->sellingStatus->convertedCurrentPrice);?>
          <?php if($item->shippingInfo
  ->shippingType=="Free"){?>
          </strong><br />
          <?php echo $row_rs_settings['lang_free_sh']; ?>
          <strong>
            <?php }?>
            <br />
            <?php if($item->paymentMethod=="PayPal"){?>
            <img src="ebay_api/eb_img/paypal-icon.gif" width="33" height="33" alt="PayPal" />
            <?php }?>
            </strong></td>
        <td width="145"><?php echo $timeLeft;?></td>
        </tr>
      </table></td>
    </tr>
  <?php }}?>
  </table>
  <?php 
// Show IF Conditional region4 
if (@$row_rs_settings['display_navigation'] == 1) {
?>
    <table  width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div align="center">
          <?php

$results='';
if(isset($_GET['sort_type'])){
	$st1=$_GET['sort_type'];
}else{
$st1="";	
}
				$st="&sort_type=".$st1."&".$MM_keepURL;
		
			if($resp->paginationOutput->totalPages>1){
				if ($resp->paginationOutput->totalPages<=10){
			for($i=1;$i<=$resp->paginationOutput->totalPages;$i++){
			
			$results .= '&nbsp;<a href='.$_SERVER['PHP_SELF'].'?page='.$i.$st.'>'.$i.'</a>&nbsp;';
			}
			}else{
				$rt=$resp->paginationOutput->pageNumber;
				if($rt>=2){
					$results .= '&nbsp;<a href='.$_SERVER['PHP_SELF'].'?page=1'.$st.'>1</a>&nbsp; ...';
			
		}
			for($i=0;$i<=13;$i++){
		
			$results .= '&nbsp;<a href='.$_SERVER['PHP_SELF'].'?page='.($rt+$i).$st.'>'.($rt+$i).'</a>&nbsp;';}
				if($resp->paginationOutput->totalPages<=100&&$rt!='100'){	
			
				$results .= '...&nbsp;<a href='.$_SERVER['PHP_SELF'].'?page='.$resp->paginationOutput->totalPages.$st.'>'.$resp->paginationOutput->totalPages.'</a>&nbsp;';
				}elseif($resp->paginationOutput->totalPages>100&&$rt!='100')
						{
					
				$results .= '...&nbsp;<a href='.$_SERVER['PHP_SELF'].'?page=100'.$st.'>100</a>&nbsp;';	
				}
			
			
			}
			}
echo $results;
?>
        </div></td>
      </tr>
    </table>
    <?php } 
// endif Conditional region4
?>
  <?php } else {?><br />
  <div align="center"><strong><?php echo $row_rs_settings['lang_no_results']; ?></strong></div>
<?php }?>
</div>
<p>
  <?php
mysql_free_result($rs_settings);
?>
</p>
<p>&nbsp;</p>
