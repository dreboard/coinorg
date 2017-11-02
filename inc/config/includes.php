<?php
use App\Coins\{Collection, BulkCoin, Coin, Snow};
require_once "DBConnect.php";
//Coin ../classes
require_once "coins/Coin.php";
require_once "coins/Pages.php";
require_once "coins/Folder.php";
require_once "coins/CollectionRolls.php";
require_once "coins/CollectionFolder.php";
require_once "coins/CollectionBoxes.php";
require_once "coins/CollectionSet.php";
require_once "coins/CollectionBags.php";
require_once "coins/Forum.class.php";
require_once "coins/Collection.php";
require_once "coins/Rolls.php";
require_once "coins/Mintset.class.php";
require_once "coins/CoinClub.php";
require_once "coins/SellList.php";
require_once "coins/WantList.php";
require_once "coins/CollectMintRolls.php";
require_once "coins/FirstDay.php";
require_once "coins/CollectionFirstday.php";
require_once "coins/MintBag.php";
require_once("coins/Bullion.php");
require_once("coins/Report.class.php");
require_once("coins/Invest.class.php");
require_once("coins/CoinDesign.class.php");
require_once("coins/Errors.php");
require_once("coins/Grade.php");
require_once("coins/CoinTypes.php");
require_once("coins/CoinCategories.php");
require_once("coins/MintBox.php");
require_once("coins/News.class.php");
require_once("coins/SetRegistry.php");
require_once("coins/CoinCollect.class.php");
require_once("coins/Commemorative.php");
require_once("coins/Containers.class.php");
require_once("coins/CertList.class.php");
require_once("coins/ContainerType.class.php");
require_once("coins/CollectionUnk.php");
require_once("coins/VarietySet.class.php");
require_once "coins/Snow.php";
require_once "coins/Vam.php";
require_once("coins/Note.php");
require_once("coins/BulkCoin.php");
require_once("coins/CoinLot.php");
require_once __DIR__."/../coinArray.php";

//User ../classes
require_once "users/User.php";
require_once ("users/Login.php");
//Site ../classes
require_once "Paginator.php";
require_once("PHPMailer/class.phpmailer.php");
require_once ("site/General.class.php");
require_once("site/Message.class.php");

require_once("Encryption.class.php");
require_once  __DIR__."/../functions/coinFunctions.php";

//ebay
//require_once('../ebay/DisplayUtils.php');

//calendar
require_once ("calendar/Calendar.class.php");
require_once ("calendar/Event.class.php");

//Files
require_once "files/Upload.class.php";
require_once ("files/FileManager.class.php");
require_once ("files/Image.class.php");
require_once ("files/Album.class.php");
//require_once "../facebook/src/facebook.php";
//New ../classes

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