<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$pageMsg = '';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Page</title>
<?php include("../secureScripts.php"); ?>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<style type="text/css">

#priceListForm input[type=text]{width:80px;}
.errorTxt {color:#900; font-weight:bold;}
.errorInput {border:solid 1px #900;}
</style>
<script type="text/javascript">
$(document).ready(function(){

});
</script>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h2 id="pageHdr">Search Page</h2>

<table id="productList">
<?php 
if(isset($_POST["search"])){
$search = trim(mysql_real_escape_string($_POST["search"]));
$searchQuery = mysql_query("SELECT * FROM coins WHERE coinName LIKE'%$search%' OR coinType LIKE'%$search%' ORDER BY denomination DESC") or die(mysql_error()); 
$anymatches = mysql_num_rows($searchQuery); 
 if ($anymatches == 0) 
 { 
 $pageMsg = "Sorry, but we can not find an entry to match your query<br><br>"; 
 } else {
  echo 'There are <strong>' . $anymatches . '</strong> matches for search ' . $search;
  $counter = 1; 
 while ($row = mysql_fetch_array ($searchQuery)) {
   $coinName = strip_tags($row['coinName']);
   $coinType = strip_tags($row['coinType']);
   $coinID = intval($row['coinID']);
   $searchCoinID = $collection->getThisCoinID($coinID);
   
   echo '
   <tr><td>'.$counter++.'. <a href="viewCoin.php?coinID='.$coinID.'">' .$coinName.'</a> '.$coinType.'</td></tr>';
   
}
}
mysql_free_result($searchQuery);
}

?>
</table>
<p><?php echo $pageMsg ?></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
