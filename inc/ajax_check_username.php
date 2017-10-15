<?php 
include("../inc/config.php"); 


if(isset($_GET['username'])){
$username = mysql_real_escape_string($_GET['username']) ;
$sql = mysql_query("SELECT * FROM user WHERE username = '$username' LIMIT 1")or die(mysql_error());
if (mysql_num_rows($sql) > 0)
{
     echo '<span style="color:#900"><strong>'.$username.'</strong> already in use. </span>';
} else {
	echo '<span style="color:#090">Username <strong>'.$username.'</strong>  available.</span>';
}
}


?>