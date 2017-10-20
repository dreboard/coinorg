<?php

include "DBConnect.php";
//Coin ../classes
include "coins/Coin.php";
include "coins/Pages.php";
include "coins/Folder.php";
include "coins/CollectionRolls.php";
include "coins/CollectionFolder.php";
include "coins/CollectionBoxes.php";
include "coins/CollectionSet.php";
include "coins/CollectionBags.php";
include "coins/Forum.class.php";
include "coins/Collection.php";
include "coins/Rolls.php";
include "coins/Mintset.class.php";
include "coins/CoinClub.php";
include "coins/SellList.php";
include "coins/WantList.php";
include "coins/CollectMintRolls.php";
include "coins/FirstDay.php";
include "coins/CollectionFirstday.php";
include "coins/MintBag.php";
include("coins/Bullion.php");
include("coins/Report.class.php");
include("coins/Invest.class.php");
include("coins/CoinDesign.class.php");
include("coins/Errors.php");
include("coins/Grade.php");
include("coins/CoinTypes.php");
include("coins/CoinCategories.php");
include("coins/MintBox.php");
include("coins/News.class.php");
include("coins/SetRegistry.php");
include("coins/CoinCollect.class.php");
include("coins/Commemorative.php");
include("coins/Containers.class.php");
include("coins/CertList.class.php");
include("coins/ContainerType.class.php");
include("coins/CollectionUnk.php");
include("coins/VarietySet.class.php");
include "coins/Snow.php";
include "coins/Vam.php";
include("coins/Note.php");
include("coins/BulkCoin.php");
include("coins/CoinLot.php");
include __DIR__."/../coinArray.php";

//User ../classes
include "users/User.php";
include ("users/Login.php");
//Site ../classes
include "Paginator.php";
include_once("PHPMailer/class.phpmailer.php");
include ("site/General.class.php");
include("site/Message.class.php");

include("Encryption.class.php");
include  __DIR__."/../functions/coinFunctions.php";

//ebay
//require_once('../ebay/DisplayUtils.php');

//calendar
include ("calendar/Calendar.class.php");
include ("calendar/Event.class.php");

//Files
include "files/Upload.class.php";
include ("files/FileManager.class.php");
include ("files/Image.class.php");
include ("files/Album.class.php");
//include_once "../facebook/src/facebook.php";
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