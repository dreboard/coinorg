<?php
require_once("../Connections/config.inc.php");
$hostname_conn = $host_name;
$database_conn = $database_name;
$username_conn =$database_user;
$password_conn = $database_pass;
$conn = mysql_pconnect($hostname_conn, $username_conn, $password_conn) or die("<br><strong>No connection with database-Please check hostname,database name,MySQL username/pass in config.inc.php file located in Connections folder</strong>");


$require_once="../Connections/conn.php";
$data1="CREATE TABLE `ebapi_settings` (
  `id_sett` int(11) NOT NULL auto_increment,
  `site_id` varchar(255) default NULL,
  `camp_id` varchar(255) default NULL,
  `partn_id` varchar(255) default NULL,
  `partn_tracking` varchar(255) default NULL,
  `aff_name` varchar(255) default NULL,
  `categories` varchar(255) default NULL,
  `keywords` varchar(255) default NULL,
  `sellers` varchar(255) default NULL,
  `currency` varchar(255) default NULL,
  `currency_sign` varchar(255) default NULL,
  `default_sort` varchar(255) default NULL,
  `displ_search` int(11) default NULL,
  `display_sort` int(11) default NULL,
  `number_items` int(11) default NULL,
  `display_navigation` int(11) default NULL,
  `display_eb_logo` int(11) default NULL,
  `layout_type` varchar(255) default NULL,
  `columns_number` int(11) default NULL,
  `display_max_pages` int(11) default NULL,
  `google_code` text,
  `lang_search` varchar(255) default NULL,
  `lang_sortby` varchar(255) default NULL,
  `lang_enlarge` varchar(255) default NULL,
  `lang_description` varchar(255) default NULL,
  `lang_pos_feedback` varchar(255) default NULL,
  `lang_sortby_best` varchar(255) default NULL,
  `lang_sortby_newly` varchar(255) default NULL,
  `lang_sortby_ending` varchar(255) default NULL,
  `lang_sortby_price_desc` varchar(255) default NULL,
  `lang_sortby_price_asc` varchar(255) default NULL,
  `login` varchar(255) default NULL,
  `pass` varchar(255) default NULL,
  `lang_seller` varchar(255) default NULL,
  `lang_bin` varchar(255) default NULL,
  `lang_bids` varchar(255) default NULL,
  `lang_listing_type` varchar(255) default NULL,
  `lang_auction` varchar(255) default NULL,
  `lang_fixed_price` varchar(255) default NULL,
  `lang_store_inv` varchar(255) default NULL,
  `lang_best_off` varchar(255) default NULL,
  `lang_getfast` varchar(255) default NULL,
  `lang_free_sh` varchar(255) default NULL,
  `lang_local_pic` varchar(255) default NULL,
  `lang_min_pr` varchar(255) default NULL,
  `lang_max_pr` varchar(255) default NULL,
  `lang_all_categ` varchar(255) default NULL,
  `lang_price` varchar(255) default NULL,
  `lang_time left` varchar(255) default NULL,
  `lang_more_op` varchar(255) default NULL,
  `lang_less_op` varchar(255) default NULL,
  `lang_search_desc` varchar(255) default NULL,
  `lang_no_results` varchar(255) default NULL,
  `lang_all` varchar(255) default NULL,
  `filter_min` float(8,2) default NULL,
  `filter_max` float(8,2) default NULL,
  `filter_best` int(11) default NULL,
  `filter_free` int(11) default NULL,
  `filter_getfast` int(11) default NULL,
  `filter_local` int(11) default NULL,
  `filter_list_type` varchar(255) default NULL,
  PRIMARY KEY  (`id_sett`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `ebapi_settings`
-- 

INSERT INTO `ebapi_settings` VALUES (1, 'EBAY-US*0', '123', '9', NULL, NULL, NULL, 'harry potter', NULL, NULL, '$', 'EndTimeSoonest', 1, 1, 20, 1, 1, NULL, NULL, NULL, NULL, 'Search', 'Sort by', 'Enlarge', 'Preview Description', 'Positive feedback:', 'Best Match', NULL, 'Ending soonest', 'Price: highest first', 'Price: lowest first', 'admin@email.com', 'pass', 'Seller info', 'Buy It Now', 'bids', 'Listing type', 'Auction', 'Fixed Price', 'Store Inventory', 'Best Offer', 'Get It Fast!', 'Free shipping', 'Local Pick Up', 'Min. Price', 'Max. Price', 'All Categories', 'Price', 'Time left', 'More Options', 'Less options', 'Search in titles and descriptions', 'No resulsts for your search', 'All', NULL, NULL, 0, 0, 0, 0, 'All');
";

	/*$filename = "../setup/dv_install.sql";
	set_time_limit(180);
	$file3=fread(fopen($filename, "r"), 10485760);*/
	$query=explode(";",$data1);
	 mysql_select_db($database_conn, $conn);
	for ($i=0;$i < count($query)-1;$i++) {
		mysql_db_query($database_conn,$query[$i],$conn) or die(mysql_error());
	}
//@unlink("../setup/dv_install.sql");
header("Location: ../admin/login.php?install=ok"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Install</title>
</head>

<body>
</body>
</html>