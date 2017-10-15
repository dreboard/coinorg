<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Search Help Files</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1>Search Help Files</h1>
<form method="post" action="help_search.php" class="compactForm"><input name="keywords"><input value="Search" name="helpBtn" type="submit"><br>
</form>
<table id="productList">
<?php 
if(isset($_POST["keywords"])){
$search = trim(mysql_real_escape_string($_POST["keywords"]));
$searchQuery = mysql_query("SELECT * FROM helper WHERE keywords LIKE'%$search%' OR description LIKE '%$search%' ORDER BY help_title ASC") or die(mysql_error()); 
$anymatches = mysql_num_rows($searchQuery); 
 if ($anymatches == 0) 
 { 
 $errorMsg = "Sorry, but we can not find an entry to match your query<br><br>"; 
 } else {
  echo 'There are <strong>' . $anymatches . '</strong> matches for search ' . $search;
  $counter = 1; 
 while ($row = mysql_fetch_array ($searchQuery)) {
   echo '
   <tr><td>'.$counter++.'. <a class="darker" href="help_files.php?type='.strip_tags($row['helpPage']).'">' .strip_tags($row['help_title']).'</a><br />
' .strip_tags($row['description']).'
   </td></tr>';
   
}
}
mysql_free_result($searchQuery);
}

?>
</table>
<p><?php echo $errorMsg ?></p>
<a href="help_files.php?type=saving_coins">Saving</a>
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>