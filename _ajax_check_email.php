<?php 
include("inc/config.php"); 


if(isset($_GET['email'])){
$email = mysql_real_escape_string($_GET['email']) ;

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

$sql = mysql_query("SELECT * FROM user WHERE email = '$email' LIMIT 1")or die(mysql_error());
if (mysql_num_rows($sql) > 0)
{
     echo '<span style="color:#900"><strong>Email is already registered.</span>';
} else {
	echo '';
}
} else {
	echo '<span style="color:#900; font-weight:bold;">Email is not valid</span>';
}
}

?>