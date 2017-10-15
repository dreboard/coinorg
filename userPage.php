<?php 
include 'inc/config.php';

if(isset($_GET["username"])){
$username =strip_tags($_GET["username"]);
$searchQuery = mysql_query("SELECT * FROM user WHERE username  = '$username'") or die(mysql_error()); 
$anymatches = mysql_num_rows($searchQuery); 
 if ($anymatches == 0) 
 { 
 $_SESSION['pageMsg'] = "Sorry, but we can not find a user with that username<br><br>"; 
 } else {
 while ($row = mysql_fetch_array ($searchQuery)) {
   $username = strip_tags($row['username']);
   //$coinType = strip_tags($row['coinType']);
   $User ->getUserById(intval($row['userID'])); 
}
}
mysql_free_result($searchQuery);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Penny collection" />
<?php include("secureScripts.php"); ?>
<title>Login to your account</title>
<script type="text/javascript">
$(document).ready(function(){	
$('#recoverDiv').hide();
$("#loginForm :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
	}).blur(function() {
	  $("label").removeClass("labelfocus");
  });

$("#loginForm").submit(function() {
      if ($("#email").val() == "") {
		$("#email").addClass("errorInput");
        $("#formErrors").text("Need email address...").show();
        return false;
      }else if ($("#password").val() == "") {
		$("#password").addClass("errorInput");  
        $("#formErrors").text("Need password...").show();
        return false;
      }else {
	 $('#loginFormBtn').val("Accessing Account.....");	  
	  return true;
	  }
});



});
</script>  


<style type="text/css">

#menuList {float:left;}
#menuList li {list-style-type:none; font-size:1.4em; padding:10px; width:110px;}

</style>
<link rel="stylesheet" type="text/css" href="style.css"/>
<?php include ("inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("inc/pageElements/header.php"); ?>
<div id="content" class="clear">
<p><?php echo $_SESSION['pageMsg']; ?></p>
<table width="100%" id="productList">
<tr>
<td width="610"><h2><?php echo $username ?></h2></td>
<td width="359" align="right"><form id="findUserForm" name="findUserForm" method="post" action="findUser.php">
        <span>Search: </span>
        <input name="username" id="username" type="text" />
        <input name="findUserBtn" id="findUserBtn" type="submit" value="Find User" />
</form></td>
</tr>
</table>

<table width="100%" border="0">
  <tr>
    <td height="250" colspan="2"><img src="<?php echo $User->getImageURL() ?>" class="profileImg" /></td>
    <td align="right">&nbsp;</td>
    <td width="564" rowspan="6"><object width="355" height="355"><param name="movie" value="http://togo.ebay.com/togo/seller.swf?2008013100" /><param name="flashvars" value="base=http://togo.ebay.com/togo/&lang=en-us&seller=<?php echo $User->getEbayID(); ?>" /><embed src="http://togo.ebay.com/togo/seller.swf?2008013100" type="application/x-shockwave-flash" width="355" height="355" flashvars="base=http://togo.ebay.com/togo/&lang=en-us&seller=<?php echo $User->getEbayID(); ?>"></embed></object></td>
  </tr>
  <tr>
    <td><?php echo $User->getCollectionAvatar($userID); ?><?php echo $User->getAnswerAvatar($userID); ?><?php echo $User->getInvestmentAvatar($userID); ?></td>
    <td><a href="accountEdit.php">Edit My Profile</a></td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Username</strong></td>
    <td><?php echo $User->getUserName() ?></td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="136"><strong> Joined</strong></td>
    <td width="177"><?php echo date("F j, Y",strtotime($User->getUserDate())) ?></td>
    <td width="105" align="right">&nbsp;</td>
    </tr>
  <tr>
    <td><strong>Message</strong></td>
    <td><?php echo $User->mailDisplay($userID) ?></td>
    <td align="right">&nbsp;</td>
    </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td align="right" valign="top">&nbsp;</td>
    </tr>
</table>

<table width="100%" id="productList">
<tr>
<td><h3>View My Collection</h3></td>
<td><h3>My Want List</h3></td>
<td><h3>My Coins For Sale</h3></td>
</tr>
</table>
</div>
<br>
<a href="https://coins.www.collectors-society.com/PublicUserHome.aspx?PeopleID=146650"><img src="http://boards.collectors-society.com/signatures/signature.php/NGC/user/146650/sig.jpg"></a>
<p>&nbsp;</p>
</div>

<?php include("inc/pageElements/footer.php"); ?>
</body>
</html>