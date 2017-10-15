<?php 
include 'inc/configSite.php';

include ("inc/authorize.net/authnetfunction.php");
include ("inc/authorize.net/data.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Coin collection, coin folders, Union Shield, Lincoln Bicentennial, Lincoln Memorial, Lincoln Wheat, Indian Head, Flying Eagle, Nickels, Shield Nickel, Liberty Head, Buffalo Nickel, Jefferson Nickel, Westward Journey Series, Dimes, gold coin Investment, Half Dime, Liberty Head, Liberty Seated, Mercury Dime, Roosevelt Dime, Quarters, Liberty Seated Quarter, Barber Quarter, Standing Liberty, Washington Quarter, Statehood, D.C. and U. S. Territories, America the Beautiful, Half-Dollars, Liberty Half, Barber Half, Walking Liberty, Franklin Half, Kennedy Half, Dollars, Seated Liberty, Trade Dollar, Morgan dollar, Peace dollar, Eisenhower dollar, Susan B. Anthony, Sacagawea, Native American Series, Presidential Dollar" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" type="text/css" />
<title>mycoinorganizer.net76.net</title>
<script src="scripts/modernizr.js"></script>
<script type="text/javascript" src="scripts/main.js"></script>
<script type="text/javascript">
$(document).ready(function(){	

$("#goldBtn").click(function() {
     window.open("register.php?type=gold","_self");
});

$("#silverBtn").click(function() {
     window.open("register.php?type=silver","_self");
});

$("#basicBtn").click(function() {
    window.open("register.php?type=basic","_self");
});




});
</script>  


<style type="text/css">

#softwareTbl td{padding-left:30px;}
</style>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body class="no-js">
<?php include("inc/pageElements/nav.php"); ?>

<div id="content" class="clear">
  <p>
  <?php
if(isset($_POST["goldAccount2"])){
    require_once 'inc/authorize.net/AuthorizeNet.php';
    define("AUTHORIZENET_API_LOGIN_ID", "YOURLOGIN");
    define("AUTHORIZENET_TRANSACTION_KEY", "YOURKEY");
    $subscription                          = new AuthorizeNet_Subscription;
    $subscription->name                    = "PHP Monthly Magazine";
    $subscription->intervalLength          = "1";
    $subscription->intervalUnit            = "months";
    $subscription->startDate               = "2011-03-12";
    $subscription->totalOccurrences        = "12";
    $subscription->amount                  = "12.99";
    $subscription->creditCardCardNumber    = "6011000000000012";
    $subscription->creditCardExpirationDate= "2018-10";
    $subscription->creditCardCardCode      = "123";
    $subscription->billToFirstName         = "Rasmus";
    $subscription->billToLastName          = "Doe";

    // Create the subscription.
    $request = new AuthorizeNetARB;
    $response = $request->createSubscription($subscription);
    $subscription_id = $response->getSubscriptionId();
	}
?>
  <?php 

if(isset($_POST["goldAccount"])){

$firstName = $_POST["first"];
$lastName = $_POST["last"];
$address = $_POST["address"];
$city = $_POST["city"];
$zip = $_POST["zip"];
$password = $_POST["password"];
$phone = $_POST["phone"];



$startDate = $_POST["startDate"];
$totalOccurrences = $_POST["totalOccurrences"];
$trialOccurrences = $_POST["trialOccurrences"];
$trialAmount = $_POST["trialAmount"];
$cardNumber = $_POST["cardNumber"];
$expiryMonth = $_POST['expiryMonth'];
$expiryYear = $_POST['expiryYear'];

$expirationDate = $expiryYear.'-'.$expiryMonth;


echo "Results <br><br>";

//build xml to post
		$content =
        "<?xml version=\"1.0\" encoding=\"utf-8\"?>" .
        "<ARBCreateSubscriptionRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">" .
        "<merchantAuthentication>".
        "<name>" . $loginname . "</name>".
        "<transactionKey>" . $transactionkey . "</transactionKey>".
        "</merchantAuthentication>".
		"<refId>" . strip_tags($_POST['refId']) . "</refId>".
        "<subscription>".
        "<name>" . strip_tags($_POST['name']) . "</name>".
        "<paymentSchedule>".
        "<interval>".
        "<length>". strip_tags($_POST['length']) ."</length>".
        "<unit>". strip_tags($_POST['unit']) ."</unit>".
        "</interval>".
        "<startDate>" . strip_tags(trim($_POST['startDate'])) . "</startDate>".
        "<totalOccurrences>". intval($_POST['totalOccurrences']) . "</totalOccurrences>".
        "<trialOccurrences>". intval($_POST['trialOccurrences']) . "</trialOccurrences>".
        "</paymentSchedule>".
        "<amount>". strip_tags($_POST['amount']) ."</amount>".
        "<trialAmount>" . strip_tags($_POST['trialAmount']) . "</trialAmount>".
        "<payment>".
        "<creditCard>".
        "<cardNumber>" . strip_tags($_POST['card_number']) . "</cardNumber>".
        "<expirationDate>" . $expirationDate . "</expirationDate>".
        "</creditCard>".
        "</payment>".
        "<billTo>".
        "<firstName>". strip_tags($_POST['first']) . "</firstName>".
        "<lastName>" . strip_tags($_POST['last']) . "</lastName>".
        "</billTo>".
        "</subscription>".

//send the xml via curl
$response = send_request_via_curl($host,$path,$content);
//if curl is unavilable you can try using fsockopen
/*
$response = send_request_via_fsockopen($host,$path,$content);
*/


//if the connection and send worked $response holds the return from Authorize.net
if ($response)
{
		/*
	a number of xml functions exist to parse xml results, but they may or may not be avilable on your system
	please explore using SimpleXML in php 5 or xml parsing functions using the expat library
	in php 4
	parse_return is a function that shows how you can parse though the xml return if these other options are not avilable to you
	*/
	list ($refId, $resultCode, $code, $text, $subscriptionId) =parse_return($response);

	
	echo " Response Code: $resultCode <br>";
	echo " Response Reason Code: $code<br>";
	echo " Response Text: $text<br>";
	echo " Reference Id: $refId<br>";
	echo " Subscription Id: $subscriptionId <br><br>";
	echo " Data has been written to data.log<br><br>";
	echo $loginname;
	echo "<br />";
	echo $transactionkey;
	echo "<br />";
  
  echo "amount:";
  echo $amount;
  echo "<br \>";
  
  echo "refId:";
  echo $refId;
  echo "<br \>";
  
  echo "name:";
  echo $name;
  echo "<br \>";
  
  echo "amount: ";
  echo $amount;
  echo "<br \>";
  echo "<br \>";
  echo $content;
  echo "<br \>";
  echo "<br \>";
	
$fp = fopen('data.log', "a");
fwrite($fp, "$refId\r\n");
fwrite($fp, "$subscriptionId\r\n");
fwrite($fp, "$amount\r\n");
fclose($fp);

	
}
else
{
	echo "Transaction Failed. <br>";
}


}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Silver Account
if(isset($_POST["Silver"])){
//define variables to send
$amount = $_POST["amount"];
$refId = $_POST["refId"];
$name = $_POST["name"];
$length = $_POST["length"];
$unit = $_POST["unit"];
$startDate = $_POST["startDate"];
$totalOccurrences = $_POST["totalOccurrences"];
$trialOccurrences = $_POST["trialOccurrences"];
$trialAmount = $_POST["trialAmount"];
$cardNumber = $_POST["cardNumber"];
$expiryMonth = $_POST['expiryMonth'];
$expiryYear = $_POST['expiryYear'];

$expirationDate = $expiryYear.'-'.$expiryMonth;
$firstName = $_POST["first"];
$lastName = $_POST["last"];
echo '<img src="img/accountSilver.jpg" name="clientImg" align="left" id="clientImg" />';
echo '<br />';
echo "Results <br><br>";

//build xml to post
$content =
        "<?xml version=\"1.0\" encoding=\"utf-8\"?>" .
        "<ARBCreateSubscriptionRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">" .
        "<merchantAuthentication>".
        "<name>" . $loginname . "</name>".
        "<transactionKey>" . $transactionkey . "</transactionKey>".
        "</merchantAuthentication>".
		"<refId>" . $refId . "</refId>".
        "<subscription>".
        "<name>" . $name . "</name>".
        "<paymentSchedule>".
        "<interval>".
        "<length>". $length ."</length>".
        "<unit>". $unit ."</unit>".
        "</interval>".
        "<startDate>" . $startDate . "</startDate>".
        "<totalOccurrences>". $totalOccurrences . "</totalOccurrences>".
        "<trialOccurrences>". $trialOccurrences . "</trialOccurrences>".
        "</paymentSchedule>".
        "<amount>". $amount ."</amount>".
        "<trialAmount>" . $trialAmount . "</trialAmount>".
        "<payment>".
        "<creditCard>".
        "<cardNumber>" . $cardNumber . "</cardNumber>".
        "<expirationDate>" . $expirationDate . "</expirationDate>".
        "</creditCard>".
        "</payment>".
        "<billTo>".
        "<firstName>". $firstName . "</firstName>".
        "<lastName>" . $lastName . "</lastName>".
        "</billTo>".
        "</subscription>".
        "</ARBCreateSubscriptionRequest>";


//send the xml via curl
$response = send_request_via_curl($host,$path,$content);
//if curl is unavilable you can try using fsockopen
/*
$response = send_request_via_fsockopen($host,$path,$content);
*/


//if the connection and send worked $response holds the return from Authorize.net
if ($response)
{
		/*
	a number of xml functions exist to parse xml results, but they may or may not be avilable on your system
	please explore using SimpleXML in php 5 or xml parsing functions using the expat library
	in php 4
	parse_return is a function that shows how you can parse though the xml return if these other options are not avilable to you
	*/
	list ($refId, $resultCode, $code, $text, $subscriptionId) =parse_return($response);

	
	echo " Response Code: $resultCode <br>";
	echo " Response Reason Code: $code<br>";
	echo " Response Text: $text<br>";
	echo " Reference Id: $refId<br>";
	echo " Subscription Id: $subscriptionId <br><br>";
	echo " Data has been written to data.log<br><br>";
	echo $loginname;
	echo "<br />";
	echo $transactionkey;
	echo "<br />";
  
  echo "amount:";
  echo $amount;
  echo "<br \>";
  
  echo "refId:";
  echo $refId;
  echo "<br \>";
  
  echo "name:";
  echo $name;
  echo "<br \>";
  
  echo "amount: ";
  echo $amount;
  echo "<br \>";
  echo "<br \>";
  echo $content;
  echo "<br \>";
  echo "<br \>";
	
$fp = fopen('data.log', "a");
fwrite($fp, "$refId\r\n");
fwrite($fp, "$subscriptionId\r\n");
fwrite($fp, "$amount\r\n");
fclose($fp);

	
}
else
{
	echo "Transaction Failed. <br>";
}


}
?>
    
</p>
<p><img src="img/faq.jpg" alt="Frequently asked questions" width="128" height="128" align="left"></p>
<p>&nbsp;</p>
<p><a href="contact.html">Contact Us</a></p>
</div>
<script>
(function($){
	var nav = $("#topNav");
	//add indicator and hovers to submenu parents
	nav.find("li").each(function() {
		if ($(this).find("ul").length > 0) {
			$("<span>").text("^").appendTo($(this).children(":first"));
			//show subnav on hover
			$(this).mouseenter(function() {
				$(this).find("ul").stop(true, true).slideDown();
			});
			//hide submenus on exit
			$(this).mouseleave(function() {
				$(this).find("ul").stop(true, true).slideUp();
			});
		}
	});
})(jQuery);
</script>
</body>
</html>