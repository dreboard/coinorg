<?php 
ob_start();
session_start();
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
error_reporting (E_ALL);


//UNIVERSAL VARIABLES
date_default_timezone_set ("America/Detroit");
$theDate = date("Y-m-d H:i:s");
$month = date("n");
$weeknum = (int)date("W");
$year = date('Y') ;
$day = date('d') ;
$dayNumber = date('j');
$lastMonth = $month - 1;
$nextMonth = $month + 1;
$errorMsg = ""; 



$allowed_filetypes = array('.jpg','.gif','.bmp','.png');
$max_filesize = 3145728; 
$_SESSION['message'] = '';
$_SESSION['errorMsg'] = '';

include "classes/db/DBConnect.php";
$db = DBConnect::getInstance();

if (function_exists('mysql_connect')) {
    $error = "No remote DB connection";
    $hostname_content = "localhost";
    $username_content = "root";
    $password_content = "";
    $con = @mysql_connect($hostname_content, $username_content, $password_content);
    mysql_select_db("coins", $con);
}

//Coin classes
include "classes/coins/Coin.php";  
include "classes/coins/Pages.php"; 
include "classes/coins/Folder.php"; 
include "classes/coins/CollectionRolls.php"; 
include "classes/coins/CollectionFolder.php"; 
include "classes/coins/CollectionBoxes.php"; 
include "classes/coins/CollectionSet.php"; 
include "classes/coins/CollectionBags.php";
include "classes/coins/Forum.class.php";
include "classes/coins/Collection.php";
include "classes/coins/Rolls.php";
include "classes/coins/Mintset.class.php";
include "classes/coins/CoinClub.php";
include "classes/coins/SellList.php";
include "classes/coins/WantList.php";
include "classes/coins/CollectMintRolls.php";
include "classes/coins/FirstDay.php";
include "classes/coins/CollectionFirstday.php";
include "classes/coins/MintBag.php";
include("classes/coins/Bullion.php");
include("classes/coins/Report.class.php");
include("classes/coins/Invest.class.php");
include("classes/coins/CoinDesign.class.php");
include("classes/coins/Errors.php");
include("classes/coins/Grade.php");
include("classes/coins/CoinTypes.php");
include("classes/coins/CoinCategories.php");
include("classes/coins/MintBox.php");
include("classes/coins/News.class.php");
include("classes/coins/SetRegistry.php");
include("classes/coins/CoinCollect.class.php");
include("classes/coins/Commemorative.php");
include("classes/coins/Containers.class.php");
include("classes/coins/CertList.class.php");
include("classes/coins/ContainerType.class.php");
include("classes/coins/CollectionUnk.php");
include("classes/coins/VarietySet.class.php");
include "classes/coins/Snow.php";
include "classes/coins/Vam.php";
include("classes/coins/Note.php");
include("classes/coins/BulkCoin.php");
include("classes/coins/CoinLot.php");
include "coinArray.php";

//User classes
include "classes/users/User.php";  
include ("classes/users/Login.php");
//Site classes
include "classes/Paginator.php";
include_once("classes/PHPMailer/class.phpmailer.php");
include ("classes/site/General.class.php");
include("classes/site/Message.class.php");

include("classes/Encryption.class.php");
include "functions/coinFunctions.php";

//ebay
require_once('ebay/DisplayUtils.php'); 

//calendar
include ("classes/calendar/Calendar.class.php");
include ("classes/calendar/Event.class.php");

//Files
include "classes/files/Upload.class.php";
include ("classes/files/FileManager.class.php");
include ("classes/files/Image.class.php");
include ("classes/files/Album.class.php");
include_once "facebook/src/facebook.php";
//New classes

$BulkCoin = new BulkCoin();
$CoinLot = new CoinLot();
$Snow = new Snow();
$VAM = new Vam();
$Note = new Note();
$VarietySet = new VarietySet();
$CollectionUnk = new CollectionUnk();
$Message = new Message();
$ContainerType = new ContainerType();
$CertList = new CertList();
$Commemorative = new Commemorative();
$Image = new Image();
$Album = new Album();
$CoinCollect = new CoinCollect();
$News = new News();
$General = new General();
$Login = new Login();
$MintBox = new MintBox();
$Calendar = new Calendar();
$Event = new Event();
$Paginator = new Paginator();
$mail = new PHPMailer(true);
$CoinClub = new CoinClub();
$User = new User(); 
$page = new Pages(); 
$coin = new Coin();
$Forum = new Forum();
$folder = new Folder();
$CoinCategories = new CoinCategories();
$CollectionBoxes = new CollectionBoxes();
$collectionBoxes = new CollectionBoxes();
$collectionBags = new CollectionBags();
$collectionRolls = new CollectionRolls();
$collectionFolder = new CollectionFolder();
$CollectionSet = new CollectionSet();
$roll = new Rolls();
$Mintset = new Mintset();
$collection = new Collection();
$FileManager = new FileManager();
$Upload = new Upload();
$SellList = new SellList();
$WantList = new WantList();
$CollectMintRolls = new CollectMintRolls();
$FirstDay = new FirstDay();
$CollectionFirstday = new CollectionFirstday();
$MintBag = new MintBag();
$Bullion = new Bullion();
$Report = new Report();
$Invest = new Invest();
$CoinDesign = new CoinDesign();
$Errors = new Errors();
$Grade = new Grade();
$CoinTypes = new CoinTypes();
$Encryption = new Encryption();
$SetRegistry = new SetRegistry();
$Container = new Containers();

///////////////////////////////////////////////////////////////////////////////
//YOUTUBE
$clientLibraryPath = ".:/usr/lib/php:/usr/local/lib/php:/home/mycoinor/public_html/ZendGdata/library/";
$oldPath = set_include_path(get_include_path() . PATH_SEPARATOR . $clientLibraryPath);

/*require_once '../../../Zend/Zend_Gdata/Loader.php'; // the Zend dir must be in your include_path
Zend_Loader::loadClass('Zend_Gdata_YouTube');
Zend_Loader::loadClass('Zend_Gdata_AuthSub');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin'); */


$facebook = new Facebook(array(
  'appId' => '470818899631048',
  'secret' => 'f44f3691c4b79fe9d0c3c99b5f4f916e',
));
?>
