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
<h2 id="pageHdr">Forum Search Page</h2>
<table width="100%" border="0">
  <tr>
    <td><a href="forumMain.php" class="brownLink">Back to main forum</a>&nbsp;</td>
    <td><a href="forumCreate.php" class="brownLinkBold">Post New Question </a>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">    <form id="searchForumForm" name="searchForumForm" method="post" action="forumSearch.php" class="compactForm">
        <span>Search Forum: </span>
        <input name="search" id="search" type="text" />
        <input name="searchForumBtn" id="searchForumBtn" type="submit" value="Search" />
      </form></td>
  </tr>
</table>
<br />
<table width="994" id="productList">
<tr class="darker">
<td width="730">Question</td>
<td width="252">Posted</td>
</tr>
<?php 
if(isset($_POST["search"])){
$search = trim(mysql_real_escape_string($_POST["search"]));
$searchQuery = mysql_query("SELECT * FROM forum_question WHERE topic LIKE'%$search%' OR coinCategory LIKE'%$search%' ORDER BY questionID DESC") or die(mysql_error()); 
$anymatches = mysql_num_rows($searchQuery); 
 if ($anymatches == 0) 
 { 
 $pageMsg = "<td>Sorry, but we can not find an entry to match your query</td><td>&nbsp;</td>"; 
 } else {
  echo  '<td>There are <strong>' . $anymatches . '</strong> matches for <strong>' . $search.'</strong></td><td>&nbsp;</td>';
  $counter = 1; 
 while ($row = mysql_fetch_array ($searchQuery)) {
   $coinCategory = strip_tags($row['coinCategory']);
   $questionID = intval($row['questionID']);
   $Forum->forumQuestionByID(intval($row['questionID']));
   echo '
   <tr><td>'.$counter++.'.<a href="forumViewTopic.php?ID='.$Encryption->encode($row['questionID']).'">'.$row['topic'].'</a></td><td>'.date("M j, Y g:i a",strtotime($Forum->getPostedDate())).'</td></tr>';
   
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
