<?php 
include 'inc/config.php';
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

<h2>Find User</h2>
<form id="findUserForm" name="findUserForm" method="post" action="userSearch.php">
        <span>Search: </span>
        <input name="username" id="username" type="text" />
        <input name="findUserBtn" id="findUserBtn" type="submit" value="Find User" />
</form>
<p>&nbsp;</p>
<table id="productList">
<?php 
if(isset($_POST["username"])){
$Users = new User();	
$username = trim(mysql_real_escape_string($_POST["username"]));
$searchQuery = mysql_query("SELECT * FROM user WHERE username LIKE'%$username%'  ORDER BY username ASC") or die(mysql_error()); 
$anymatches = mysql_num_rows($searchQuery); 
 if ($anymatches == 0) 
 { 
 $pageMsg = "Sorry, but we can not find an entry to match your query<br><br>"; 
 } else {
  echo 'There are <strong>' . $anymatches . '</strong> matches for search ';
  $counter = 1; 
 while ($row = mysql_fetch_array ($searchQuery)) {
   $username = strip_tags($row['username']);
   //$coinType = strip_tags($row['coinType']);
   $Users ->getUserById(intval($row['userID'])); 
   $usersID = $Users ->getUserID();
   
   echo '
   <tr><td>'.$counter++.'. <a href="user.php?username='.$username.'">' .$username.'</a></td></tr>';
   
}
}
mysql_free_result($searchQuery);
}

?>
</table>
</div>
<p>&nbsp;</p>
</div>

<?php include("inc/pageElements/footer.php"); ?>
</body>
</html>