<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if(isset($_GET["coinCategory"])){
	$coinCategory = str_replace('_', ' ', $_GET["coinCategory"]);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>View <?php echo $coinCategory; ?> Topics</title>
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

<h1>View <?php echo $coinCategory; ?> Topics</h1>
<p><a href="forumMain.php">Back to main forum</a> | <a href="forumCreate.php"><strong>Post New Question</strong> </a></p>
<p>
<?php 
$countAll = mysql_query("SELECT * FROM forum_question WHERE coinCategory = '$coinCategory' ") or die(mysql_error());
$num_rows = mysql_num_rows($countAll);
$Paginator->items_total = $num_rows;
$Paginator->mid_range = 7;
$Paginator->paginate();
echo $Paginator->display_pages();?>
</p>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="67%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
<td width="8%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Posted</strong></td>
</tr>

<?php
 
$sql = mysql_query("SELECT * FROM forum_question WHERE coinCategory = '$coinCategory' ORDER BY questionID DESC ".$Paginator->limit." ") or die(mysql_error()); 
while($rows = mysql_fetch_array($sql)){ 
echo '
<tr>
<td bgcolor="#FFFFFF"><a href="forumViewTopic.php?questionID='.$rows['questionID'].'">'.$rows['topic'].'</a></td>
<td align="center" bgcolor="#FFFFFF">'.$rows['view'].'</td>
<td align="center" bgcolor="#FFFFFF">'.$rows['reply'].'</td>
<td align="center" bgcolor="#FFFFFF">'.$rows['datetime'].'</td>
</tr>';
}
?>

<tr>
<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="forumCreate.php"><strong>Create New Topic</strong> </a></td>
</tr>
</table>
<p><?php
echo $Paginator->display_pages(); 
echo $Paginator->display_jump_menu(); 
echo $Paginator->display_items_per_page(); 
?></p>
<br />
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>