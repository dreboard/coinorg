<?php 
session_start(); 
$hostname_content = "localhost";
$username_content = "mycoinor_small";
$password_content = "ab198900";
$con = mysql_connect($hostname_content, $username_content, $password_content)  or die(mysql_error());
mysql_select_db("mycoinor_small", $con);

$blankImg = 'http://www.allsmallcents.com/img/noPic.jpg';
$theDate = date("Y-m-d H:i:s");
$allowed_filetypes = array('.jpg','.gif','.bmp','.png');
$max_filesize = 3145728; 
$_SESSION['message'] = '';
$_SESSION['errorMsg'] = '';

require_once('ebay_api/functions/DisplayUtils.php'); 
require_once("ebay_api/functions/keep_param.php"); 

include("site/Imap.php"); 
include("calendar/Calendar.class.php"); 
include("calendar/Event.class.php"); 
include("users/User.php");
include("users/Login.php");
include("files/Upload.class.php");
include("site/Product.php");
include("site/Sales.php");
include("site/General.class.php");
include("site/Transactions.php");
include("site/Sites.php");
include("site/CoinLots.php");
include("site/AuctionTrac.php");
include("site/Encryption.class.php"); 


$Encryption =  new Encryption();
$AuctionTrac = new AuctionTrac();
$Sites = new Sites();
$Sales = new Sales();
$Transactions = new Transactions();
$General = new General();
$Upload = new Upload();
$Product = new Product();
$Calendar = new Calendar();
$Event = new Event();
$User = new User();
$Login = new Login();
$CoinLots = new CoinLots();

if (isset($_SESSION['userID'])) {
	$User->getUserById($_SESSION['userID']);
		  $userName = 'Welcome '.$User->getFirstname();
		  $logLink = 'http://www.allsmallcents.com/logout.php';
		  $logName = 'Logout';
		  if($User->getUserLevel() == 'admin'){
			  $homeLink = '<a class="brownLink" href="http://www.allsmallcents.com/admin/index.php">Admin</a>';
		  } else {
			  $homeLink = '<a class="brownLink" href="http://www.allsmallcents.com/userHome.php">Welcome '.$User->getFirstname().'</a>';
		  }
	  } else {
		  $userName = 'Welcome Guest';
		  $logLink = 'http://www.allsmallcents.com/login.php';
		  $logName = 'Login';
		  $homeLink = '';
}

// API request variables
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
$version = '1.0.0';  // API version supported by your application
$appid = 'AndreBoa-6476-4b24-b648-88cc5db92712';  // Replace with your own AppID

?>