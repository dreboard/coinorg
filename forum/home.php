<?php include ("../inc/config.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="https://www.mycoinorganizer.com/img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Shop for Coin Supplies" />
<meta name="keywords" content="Coin collection, coin folders, Union Shield, Lincoln Bicentennial, Lincoln Memorial, Lincoln Wheat, Indian Head, Flying Eagle, Nickels, Shield Nickel, Liberty Head, Buffalo Nickel, Jefferson Nickel, Westward Journey Series, Dimes, gold coin Investment, Half Dime, Liberty Head, Liberty Seated, Mercury Dime, Roosevelt Dime, Quarters, Liberty Seated Quarter, Barber Quarter, Standing Liberty, Washington Quarter, Statehood, D.C. and U. S. Territories, America the Beautiful, Half-Dollars, Liberty Half, Barber Half, Walking Liberty, Franklin Half, Kennedy Half, Dollars, Seated Liberty, Trade Dollar, Morgan dollar, Peace dollar, Eisenhower dollar, Susan B. Anthony, Sacagawea, Native American Series, Presidential Dollar, Coin Collecting Software" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="../scripts/liteaccordion.jquery.js"></script>
<link rel="stylesheet" type="text/css" href="../scripts/liteaccordion.css">
<title>My Coin Organizer Forum</title>

<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body>

<?php include("../inc/pageElements/header.php"); ?>

<div id="content" class="clear">

<table width="100%" border="0" id="forumHdr">
  <tr>
    <td><h1>My Coin Organizer Forum Area</h1></td>
    <td align="right">
    <form id="searchForumForm" name="searchForumForm" method="post" action="../forumSearch.php" class="compactForm">
        <span>Search Forum: </span>
        <input name="search" id="search" type="text" />
        <input name="searchForumBtn" id="searchForumBtn" type="submit" value="Search" />
      </form>
    </td>
  </tr>
</table>
<br />
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="45%" align="center" bgcolor="#E6E6E6"><strong>Category</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Posts</strong></td>
<td width="12%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
<td width="10%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
<td width="20%" align="center" bgcolor="#E6E6E6"><strong>Last Post</strong></td>
</tr>

<tr>
<td bgcolor="#FFFFFF"><a href="forumCategory.php?coinCategory=General">General Collecting</a></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicsByCategory($coinCategory='General'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicViewsByCategory($coinCategory='General'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicRepliesByCategory($coinCategory='General'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getLastPostByCategory($coinCategory='General'); ?></td>
</tr>

<tr>
<td bgcolor="#FFFFFF"><a href="forumCategory.php?coinCategory=Half_Cent">Half Cents</a></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicsByCategory($coinCategory='Half Cent'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicViewsByCategory($coinCategory='Half Cent'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicRepliesByCategory($coinCategory='Half Cent'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getLastPostByCategory($coinCategory='Half Cent'); ?></td>
</tr>

<tr>
<td bgcolor="#FFFFFF"><a href="forumCategory.php?coinCategory=Large_Cent">Large Cents</a></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicsByCategory($coinCategory='Large Cent'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicViewsByCategory($coinCategory='Large Cent'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicRepliesByCategory($coinCategory='Large Cent'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getLastPostByCategory($coinCategory='Large Cent'); ?></td>
</tr>
<tr>
<td bgcolor="#FFFFFF"><a href="forumCategory.php?coinCategory=Small_Cent">Small Cents</a></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicsByCategory($coinCategory='Small Cent'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicViewsByCategory($coinCategory='Small Cent'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicRepliesByCategory($coinCategory='Small Cent'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getLastPostByCategory($coinCategory='Small Cent'); ?></td>
</tr>



<tr>
<td bgcolor="#FFFFFF"><a href="forumCategory.php?coinCategory=Half_Dime">Half Dime</a></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicsByCategory($coinCategory='Half Dime'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicViewsByCategory($coinCategory='Half Dime'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicRepliesByCategory($coinCategory='Half Dime'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getLastPostByCategory($coinCategory='Half Dime'); ?></td>
</tr>

<tr>
<td bgcolor="#FFFFFF"><a href="forumCategory.php?coinCategory=Nickel">Nickel</a></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicsByCategory($coinCategory='Nickel'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicViewsByCategory($coinCategory='Nickel'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicRepliesByCategory($coinCategory='Nickel'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getLastPostByCategory($coinCategory='Nickel'); ?></td>
</tr>

<tr>
<td bgcolor="#FFFFFF"><a href="forumCategory.php?coinCategory=Dime">Dime</a></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicsByCategory($coinCategory='Dime'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicViewsByCategory($coinCategory='Dime'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicRepliesByCategory($coinCategory='Dime'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getLastPostByCategory($coinCategory='Dime'); ?></td>
</tr>

<tr>
<td bgcolor="#FFFFFF"><a href="forumCategory.php?coinCategory=Twenty_Cent">Twenty Cents</a></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicsByCategory($coinCategory='Twenty Cent'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicViewsByCategory($coinCategory='Twenty Cent'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicRepliesByCategory($coinCategory='Twenty Cent'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getLastPostByCategory($coinCategory='Twenty Cent'); ?></td>
</tr>

<tr>
<td bgcolor="#FFFFFF"><a href="forumCategory.php?coinCategory=Quarter">Quarter</a></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicsByCategory($coinCategory='Quarter'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicViewsByCategory($coinCategory='Quarter'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicRepliesByCategory($coinCategory='Quarter'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getLastPostByCategory($coinCategory='Quarter'); ?></td>
</tr>

<tr>
<td bgcolor="#FFFFFF"><a href="forumCategory.php?coinCategory=Half_Dollar">Half Dollar</a></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicsByCategory($coinCategory='Half Dollar'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicViewsByCategory($coinCategory='Half Dollar'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicRepliesByCategory($coinCategory='Half Dollar'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getLastPostByCategory($coinCategory='Half Dollar'); ?></td>
</tr>

<tr>
<td bgcolor="#FFFFFF"><a href="forumCategory.php?coinCategory=Dollar">Dollar</a></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicsByCategory($coinCategory='Dollar'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicViewsByCategory($coinCategory='Dollar'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicRepliesByCategory($coinCategory='Dollar'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getLastPostByCategory($coinCategory='Dollar'); ?></td>
</tr>

<tr>
<td bgcolor="#FFFFFF"><a href="forumCategory.php?coinCategory=Bullion">Bullion</a></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicsByCategory($coinCategory='Bullion'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicViewsByCategory($coinCategory='Bullion'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicRepliesByCategory($coinCategory='Bullion'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getLastPostByCategory($coinCategory='Bullion'); ?></td>
</tr>

<tr>
  <td bgcolor="#FFFFFF"><a href="forumCategory.php?coinCategory=Oneollar">Onollar</a></td>
  <td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicsByCategory($coinCategory='Onollar'); ?></td>
  <td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicViewsByCategory($coinCategory='Onollar'); ?></td>
  <td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicRepliesByCategory($coinCategory='Onollar'); ?></td>
  <td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getLastPostByCategory($coinCategory='Onollar'); ?></td>
</tr>

<tr>
<td bgcolor="#FFFFFF"><a href="forumCategory.php?coinCategory=Varieties_and_Errors">Varieties and Errors</a></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicsByCategory($coinCategory='Varieties and Errors'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicViewsByCategory($coinCategory='Varieties and Errors'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getTopicRepliesByCategory($coinCategory='Varieties and Errors'); ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $Forum->getLastPostByCategory($coinCategory='Varieties and Errors'); ?></td>
</tr>


<tr>
<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="../forumCreate.php"><strong>Post A Question</strong> </a></td>
</tr>
</table>
<h3>Forum Posts</h3>
<p>
<?php 
$countAll = mysql_query("SELECT * FROM forum_question ") or die(mysql_error());
$num_rows = mysql_num_rows($countAll);
$Paginator->items_total = $num_rows;
$Paginator->mid_range = 7;
$Paginator->paginate();
echo $Paginator->display_pages();?>
</p>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Category</strong></td>
<td width="61%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
<td width="7%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Posted</strong></td>
</tr>

<?php
 
$sql = mysql_query("SELECT * FROM forum_question ORDER BY questionID DESC ".$Paginator->limit." ") or die(mysql_error()); 
while($rows = mysql_fetch_array($sql)){ 
$Forum->forumQuestionByID(intval($rows['questionID']));
echo '
<tr>
<td bgcolor="#FFFFFF"><a href="forumCategory.php?coinCategory='.str_replace(' ', '_', $Forum->getTopicCategory()).'">'.$Forum->getTopicCategory().'</a></td>
<td bgcolor="#FFFFFF"><a href="forumViewTopic.php?ID='.$Encryption->encode(intval($rows['questionID'])).'">'.$rows['topic'].'</a></td>
<td align="center" bgcolor="#FFFFFF">'.$rows['view'].'</td>
<td align="center" bgcolor="#FFFFFF">'.$rows['reply'].'</td>
<td align="center" bgcolor="#FFFFFF">'.$rows['datetime'].'</td>
</tr>';
}
?>

<tr>
<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="../forumCreate.php"><strong>Post A Question</strong> </a></td>
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