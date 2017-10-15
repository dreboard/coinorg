<?php 
error_reporting (E_ALL);
$senderMessage = "";
$to = "dre_board@yahoo.com";
$myTime = date("Y-m-d H:i:s");
$userIP = $_SERVER['REMOTE_ADDR'];
$userIP = ip2long($userIP);

$con = mysql_connect("localhost","dreswebs_admin","!Nd!aN1989");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dreswebs_admin") or die(mysql_error());

if(isset($_POST["feedbackVal"])){
$email = mysql_real_escape_string($_POST["email"]);
$product_name = mysql_real_escape_string($_POST["product_name"]);
$refer = mysql_real_escape_string($_POST["refer"]);
$improve = mysql_real_escape_string($_POST["improve"]);
$shopFreq = mysql_real_escape_string($_POST["shopFreq"]);
$comments = strip_tags($_POST["comments"]);

if($first == ""){
	$senderMessage = "Please enter first Name ";
	header("location: contact.php?senderMessage=$senderMessage");
	die();
}
if($last == ""){
	$senderMessage = " Please enter last Name ";
	header("location: contact.php?senderMessage=$senderMessage");
	die();
}
if($phone == ""){
	$senderMessage = "Please enter phone number ";
	header("location: contact.php?senderMessage=$senderMessage");
	die();
}
if($email == ""){
	$senderMessage = "Please enter email address ";
	header("location: contact.php?senderMessage=$senderMessage");
	die();
}
if(!isset($_POST["website"])){
	$website = "None";
} else {
	$website = mysql_real_escape_string($_POST["website"]);
	if ( substr( strtolower( $website ), 0, 7 ) == 'http://' )
	{
		$website = substr( $website, 7 );
	} 
}

mysql_query("INSERT INTO clients(first, last, phone, email, website, designType, clientStatus) VALUES('$first', '$last', '$phone', '$email', '$website', '$designType', '$clientStatus')") or die(mysql_error());

$subject = "Request for Estimate";
$message = "{$first}, {$last} has requested a quote for {$designType}, and can be contacted at {$phone}" . "\r\n";

//CLEAN AND VALIDATE
function remove_headers($string) { 
 $headers = array(
 "/to\:/i",
 "/from\:/i",
 "/bcc\:/i",
 "/cc\:/i",
 "/Content\-Transfer\-Encoding\:/i",
 "/Content\-Type\:/i",
 "/Mime\-Version\:/i" 
 ); 
 $string = preg_replace($headers, '', $string);
 return strip_tags($string);
 } 
$designType = remove_headers($designType);
$last = remove_headers($last);
$first = remove_headers($first);
$phone = remove_headers($phone);
$headers = "From: dre_board@yahoo.com" . "\r\n";

mail("dre_board@yahoo.com",$subject,$message,$headers );
$senderMessage = "Thank You $first, your quote has been sent and you will receive a receipt resonse in your inbox";

$subject2 = "{$first} Your Quote is received";
$message2 = "You have sent a request for a quote.  All request will be handled on the same business day if received before 5pm. After 5pm request are handled before 11am the next business day";
//Mail receipt to user
mail($email,$subject2,$message2,$headers);

}

?>