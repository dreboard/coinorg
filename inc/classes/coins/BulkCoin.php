<?php
namespace App\Coins;

use \DBConnect;
use \PDO;
//getUniqueCollectionCountByCategory

class BulkCoin
{
    protected $bulkNickname;
    protected $userID;
    protected $setregID;
    protected $collectionID;
    protected $coinID;
    protected $coinType;
    protected $coinCategory;
    protected $coinNote;
    protected $collectfolderID;
    protected $collectrollsID;
    protected $collectsetID;
    protected $enterDate;
    protected $coinYear;
    protected $purchaseFrom;
    protected $purchaseDate;
    protected $purchasePrice;

    protected $db;

    public function __construct()
    {
        $this->db = DBConnect::getInstance();
    }

    public function getBulkCoinById($bulkcoinID)
    {
        $sql = 'SELECT * FROM bulkcoin WHERE bulkcoinID = :bulkcoinID';
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->execute(array(':bulkcoinID' => $bulkcoinID));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->bulkNickname = $row['bulkNickname'];
        $this->userID = $row['userID'];
        $this->setregID = $row['setregID'];
        $this->collectionID = $row['collectionID'];
        $this->coinID = $row['coinID'];
        $this->coinType = $row['coinType'];
        $this->coinCategory = $row['coinCategory'];
        $this->coinNote = $row['coinNote'];
        $this->collectfolderID = $row['collectfolderID'];
        $this->collectrollsID = $row['collectrollsID'];
        $this->collectsetID = $row['collectsetID'];
        $this->enterDate = $row['enterDate'];
        $this->coinYear = $row['coinYear'];
        $this->purchaseFrom = $row['purchaseFrom'];
        $this->purchaseDate = $row['purchaseDate'];
        $this->purchasePrice = $row['purchasePrice'];
        return $this;
    }

    public function getShowName()
    {
        return strip_tags($this->showName);
    }

    public function getShowCity()
    {
        return strip_tags($this->showCity);
    }

    public function getCoinUser()
    {
        return strip_tags($this->userID);
    }

    public function getBulkNickname()
    {
        return strip_tags($this->bulkNickname);
    }

    public function getCoinYear()
    {
        return strip_tags($this->coinYear);
    }

    public function getShopName()
    {
        return strip_tags($this->shopName);
    }

    public function getShopURL()
    {
        return strip_tags($this->shopUrl);
    }

    public function getCoinCategory()
    {
        return strip_tags($this->coinCategory);
    }

    public function getCoinType()
    {
        return strip_tags($this->coinType);
    }

    public function getPurchaseFrom()
    {
        return strip_tags($this->purchaseFrom);
    }

    public function getCoinDate()
    {
        return strip_tags($this->purchaseDate);
    }

    public function getCoinPrice()
    {
        return strip_tags($this->purchasePrice);
    }

    public function getCoinNote()
    {
        return $this->coinNote;
    }

    public function getCollectionFolder()
    {
        return strip_tags($this->collectfolderID);
    }

    public function getCollectionRoll()
    {
        return strip_tags($this->collectrollsID);
    }

    public function getCollectionSet()
    {
        return strip_tags($this->collectsetID);
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Master totals
    public function getCollectionCountById($userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM bulkcoin 
            WHERE userID = :userID
            ");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
        //$sql = mysql_query("SELECT * FROM bulkcoin WHERE  userID = '$userID'") or die(mysql_error());
    }

    public function getUniqueCollectionCountById($userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(DISTINCT coinID) FROM bulkcoin 
            WHERE userID = :userID
            ");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT DISTINCT coinID FROM bulkcoin WHERE  userID = '$userID'") or die(mysql_error());
    }

    public function getCoinSumByAccount($userID)
    {
        $sql = "
          SELECT COALESCE(sum(purchasePrice), 0.00) 
          FROM bulkcoin
          WHERE userID = :userID";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }

        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM bulkcoin WHERE  userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getCoinFaceValueByAccount($userID)
    {
        $sql = "
          SELECT COALESCE(sum(denomination), 0.00) 
          FROM bulkcoin
          WHERE userID = :userID";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(denomination), 0.00)'];
        } else {
            return '0.00';
        }

        //$sql = mysql_query("SELECT COALESCE(sum(denomination), 0.00) FROM bulkcoin WHERE  userID = '$userID'") or die(mysql_error());

    }

//from
    public function getCoinSumByAccountFrom($userID, $purchaseFrom)
    {
        $sql = "
          SELECT COALESCE(sum(purchasePrice), 0.00) 
          FROM bulkcoin
          WHERE userID = :userID 
          AND purchaseFrom = :purchaseFrom";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindValue(':purchaseFrom', str_replace('_', ' ', $purchaseFrom), PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }

        //$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM bulkcoin WHERE purchaseFrom = '" . str_replace('_', ' ', $purchaseFrom) . "' AND userID = '$userID'") or die(mysql_error());
    }

    public function getCoinFaceValueByAccountFrom($userID, $purchaseFrom)
    {
        $sql = "
          SELECT COALESCE(sum(denomination), 0.00) 
          FROM bulkcoin
          WHERE userID = :userID 
          AND purchaseFrom = :purchaseFrom";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindValue(':purchaseFrom', str_replace('_', ' ', $purchaseFrom), PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(denomination), 0.00)'];
        } else {
            return '0.00';
        }

        //$sql = mysql_query("SELECT COALESCE(sum(denomination), 0.00) FROM bulkcoin WHERE purchaseFrom = '" . str_replace('_', ' ', $purchaseFrom) . "' AND userID = '$userID'") or die(mysql_error());
    }

    public function getAllTableCountByIDFrom($userID, $purchaseFrom)
    {
        $stmt = $this->db->dbhc->prepare("SELECT COUNT(*) FROM bulkcoin WHERE purchaseFrom = :purchaseFrom AND  userID = :userID");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindValue(':purchaseFrom', str_replace('_', ' ', $purchaseFrom), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM bulkcoin WHERE userID = '$userID' AND purchaseFrom = '" . str_replace('_', ' ', $purchaseFrom) . "'") or die(mysql_error());
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Total Collected
    public function getTotalCollectedCoinsByID($coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("SELECT COUNT(*) FROM bulkcoin WHERE coinCategory = :coinCategory AND  userID = :userID");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    //Total Investment
    public function getTotalFaceValSumByCategory($coinCategory, $userID)
    {
        $sql = "
          SELECT COALESCE(sum(denomination), 0.00) 
          FROM bulkcoin
          WHERE userID = :userID 
          AND coinCategory = :coinCategory";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(denomination), 0.00)'];
        } else {
            return '0.00';
        }

        //$sql = mysql_query("SELECT COALESCE(sum(denomination), 0.00) FROM bulkcoin WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());

    }

    public function getTotalInvestmentSumByCategory($coinCategory, $userID)
    {
        $sql = "
          SELECT COALESCE(sum(purchasePrice), 0.00) 
          FROM bulkcoin
          WHERE userID = :userID 
          AND coinCategory = :coinCategory";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }

        //$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM bulkcoin WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());

    }

    public function getTotalInvestmentSumByCategoryFrom($coinCategory, $userID, $purchaseFrom)
    {
        $sql = "
          SELECT COALESCE(sum(purchasePrice), 0.00) 
          FROM bulkcoin
          WHERE userID = :userID 
          AND purchaseFrom = :purchaseFrom AND coinCategory = :coinCategory";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->bindValue(':purchaseFrom', str_replace('_', ' ', $purchaseFrom), PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }

        //$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM bulkcoin WHERE purchaseFrom = '" . str_replace('_', ' ', $purchaseFrom) . "' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());

    }

    //Type Collection Progress  use the typeCount from coincategories for percent
    public function getTypeCollectionProgressByCategory($coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("SELECT COUNT(DISTINCT coinType) FROM bulkcoin WHERE coinCategory = :coinCategory AND  userID = :userID");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT DISTINCT coinType FROM bulkcoin WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND  userID = '$userID'");
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Category totals

////////////////////////////////////////////////////////
    //Type totals
    public function getCollectionCountByType($userID, $coinType)
    {
        $stmt = $this->db->dbhc->prepare("SELECT COUNT(*) FROM bulkcoin WHERE coinType = :coinType AND  userID = :userID");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM bulkcoin WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND  userID = '$userID'");

    }

    public function getCollectionUniqueCountByType($userID, $coinType)
    {
        $stmt = $this->db->dbhc->prepare("SELECT COUNT(DISTINCT coinID) FROM bulkcoin WHERE coinType = :coinType AND  userID = :userID");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT DISTINCT coinID FROM bulkcoin WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND  userID = '$userID'");

    }

    public function getCoinCountById($coinID, $userID)
    {
        $stmt = $this->db->dbhc->prepare("SELECT COUNT(*) FROM bulkcoin WHERE coinID = :coinID AND  userID = :userID");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = 'SELECT * FROM bulkcoin WHERE coinID = ' . $coinID . ' AND userID = ' . $userID;
    }

    public function getCoinSumByType($coinType, $userID)
    {
        $sql = "
          SELECT COALESCE(sum(purchasePrice), 0.00) 
          FROM bulkcoin
          WHERE userID = :userID 
          AND coinType = :coinType";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }

        //$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM bulkcoin WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'") or die(mysql_error());
    }

    public function getCoinProSumByType($coinType, $userID)
    {
        $sql = "
          SELECT COALESCE(sum(purchasePrice), 0.00) 
          FROM bulkcoin
          WHERE userID = :userID 
          AND coinType = :coinType AND proService != 'None'";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }

        //$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM bulkcoin WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'  AND proService != 'None'") or die(mysql_error());
    }

    public function getCoinSumById($coinID, $userID)
    {
        $sql = "
          SELECT COALESCE(sum(purchasePrice), 0.00) 
          FROM bulkcoin
          WHERE userID = :userID 
          AND coinID = :coinID";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }

        //$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM bulkcoin WHERE coinID = '$coinID' AND userID = '$userID'") or die(mysql_error());
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Enter Bag
    function insertBagToBulk($userID, $collectbagID, $coinType)
    {
        $CollectionBags = new CollectionBags();
        $CollectionBags->getCollectionBagById($collectbagID);
        $CoinTypes = new CoinTypes();
        $CoinTypes->getCoinByType($coinType);

        $sql = mysql_query("INSERT INTO bulkcoin(userID, collectbagID, bulkType, coinType, coinCategory, coinYear, purchaseFrom, purchaseDate, purchasePrice, coinNote, enterDate, faceVal, denomination, coinCount) VALUES('$userID', '" . $collectbagID . "', 'Bag', '" . $collectionBags->getCoinType() . "', '" . $collectionBags->getCoinCategory() . "', '" . $collectionBags->getCoinYear() . "', '" . $collectionBags->getPurchaseFrom() . "', '" . $collectionBags->getCoinDate() . "', '" . $collectionBags->getCoinPrice() . "', '" . $collectionBags->getCoinNote() . "', '" . $collectionBags->getCoinDate() . "', '" . $collectionBags->getFaceVal() . "', '" . $CoinTypes->getDenomination() . "', '" . $CoinTypes->getBagCount() . "')") or die(mysql_error());

    }


    function insertRollToBulk($userID, $collectrollsID, $coinType)
    {
        $CollectionRolls = new CollectionRolls();
        $CollectionRolls->getCollectionRollById($collectrollsID);
        $CoinTypes = new CoinTypes();
        $CoinTypes->getCoinByType($coinType);

        $sql = mysql_query("INSERT INTO bulkcoin(userID, collectbagID, bulkType, coinType, coinCategory, coinYear, purchaseFrom, purchaseDate, purchasePrice, coinNote, enterDate, faceVal, denomination, coinCount) VALUES('$userID', '" . $collectbagID . "', 'Bag', '" . $CollectionRolls->getCoinType() . "', '" . $CollectionRolls->getCoinCategory() . "', '" . $CollectionRolls->getCoinYear() . "', '" . $CollectionRolls->getPurchaseFrom() . "', '" . $CollectionRolls->getCoinDate() . "', '" . $collectionBags->getCoinPrice() . "', '" . $collectionBags->getCoinNote() . "', '" . $CollectionRolls->getCoinDate() . "', '" . $CollectionRolls->getFaceVal() . "', '" . $CoinTypes->getDenomination() . "', '" . $CoinTypes->getRollCount() . "')") or die(mysql_error());

    }


}//END CLASS
