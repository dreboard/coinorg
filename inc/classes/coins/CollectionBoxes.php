<?php

/**
 * Collection Boxes Class
 * @since v0.1.0
 */
class CollectionBoxes
{
    public function __construct()
    {
        $this->db = DBConnect::getInstance();
    }
    public function getCollectionBoxById($collectboxID)
    {
        $userID = $_SESSION['userID'];
        $stmt = $this->db->dbhc->prepare("
            SELECT * FROM collectboxes     
            WHERE collectboxID = :collectboxID AND userID = :userID
            LIMIT 1
        ");
        $stmt->execute([':collectboxID' => $collectboxID, ':userID' => $userID]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->userID = $row['userID'];
        $this->boxID = $row['boxID'];
        $this->boxMintID = $row['boxMintID'];
        $this->boxType = $row['boxType'];
        $this->boxNickname = $row['boxNickname'];
        $this->coinType = $row['coinType'];
        $this->coinCategory = $row['coinCategory'];
        $this->coinVersion = $row['coinVersion'];
        $this->purchaseFrom = $row['purchaseFrom'];
        $this->purchaseDate = $row['purchaseDate'];
        $this->purchasePrice = $row['purchasePrice'];
        $this->listDate = $row['listDate'];
        $this->sellPrice = $row['sellPrice'];
        $this->sellDate = $row['sellDate'];
        $this->ebaySellerID = $row['ebaySellerID'];
        $this->auctionNumber = $row['auctionNumber'];
        $this->coinGrade = $row['coinGrade'];
        $this->additional = $row['additional'];
        $this->coinNote = $row['coinNote'];
        $this->boxCondition = $row['boxCondition'];
        return true;
    }

    public function getCoinVersion()
    {
        return strip_tags($this->coinVersion);
    }

    public function getCoinNote()
    {
        return strip_tags($this->coinNote);
    }

    public function getBoxCondition()
    {
        return strip_tags($this->boxCondition);
    }

    public function getCoinType()
    {
        return strip_tags($this->coinType);
    }

    public function getCoinGrade()
    {
        return strip_tags($this->coinGrade);
    }

    public function getCoinDate()
    {
        return strip_tags($this->purchaseDate);
    }

    public function getCoinPrice()
    {
        return strip_tags($this->purchasePrice);
    }

    public function getPurchaseFrom()
    {
        return strip_tags($this->purchaseFrom);
    }

    public function getEbaySellerID()
    {
        return strip_tags($this->ebaySellerID);
    }

    public function getAuctionNumber()
    {
        return strip_tags($this->auctionNumber);
    }

    public function getAdditional()
    {
        return strip_tags($this->additional);
    }

    public function getBoxNickname()
    {
        return strip_tags($this->boxNickname);
    }

    public function getBoxID()
    {
        return strip_tags($this->boxID);
    }

    public function getBoxMintID()
    {
        return strip_tags($this->boxMintID);
    }

    public function getBoxType()
    {
        return strip_tags($this->boxType);
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ENTER INDIVIDUAL ROLLS FROM BOX ENTRY
    public function enterMintRolls($boxMintID, $userID, $purchaseFrom, $purchaseDate, $purchasePrice, $collectboxID)
    {
        $MintBox = new MintBox();
        $MintBox->getMintBoxByID($boxMintID);
        for ($i = 1; $i <= $MintBox->getRollCount(); $i++) {
            mysql_query("INSERT INTO collectrolls
			(collectboxID, rollMintID, userID, rollNickname, coinID, coinType, coinVersion, coinYear, rollType, mintMark, coinCategory, purchaseFrom	, purchaseDate, purchasePrice, enterDate)               VALUES 
			('$collectboxID','" . $MintBox->getRollMintID() . "', '$userID', '" . $MintBox->getCoinVersion() . " Roll " . $i . " ', '" . $coin->getCoinID() . "', '" . $coin->getCoinType() . "', '" . $coin->getCoinVersion() . "', '" . $coin->getCoinYear() . "', 'Mint', '" . $coin->getMintMark() . "', '" . $coin->getCoinCategory() . "', '$purchaseFrom', '$purchaseDate', '$purchasePrice', '" . date('Y-m-d H:i:s') . "')") or die(mysql_error());

        }
        return true;
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//MASTER TOTALS
    public function getBoxCountById($userID)
    {
        $sql = mysql_query("SELECT * FROM collectboxes WHERE userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public function getBoxSumByID($userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectboxes WHERE userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getBoxSumByIDFrom($userID, $purchaseFrom)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectboxes WHERE purchaseFrom = '" . str_replace('_', ' ', $purchaseFrom) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getAllTableCountByIDFrom($userID, $purchaseFrom)
    {
        $sql = mysql_query("SELECT * FROM collectboxes WHERE userID = '$userID' AND purchaseFrom = '" . str_replace('_', ' ', $purchaseFrom) . "'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//MINT BOXES

    public function getMintBoxCount($userID, $boxMintID)
    {
        $sql = mysql_query("SELECT * FROM collectboxes WHERE boxMintID = '$boxMintID' AND  userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public function getMintBoxSum($boxMintID, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectboxes WHERE boxMintID = '$boxMintID' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getBoxCountByCategory($userID, $coinCategory)
    {
        $sql = mysql_query("SELECT * FROM collectboxes WHERE coinCategory = '$coinCategory' AND  userID = '$userID'");
        $collectCount = mysql_num_rows($sql);

        return $collectCount;
    }

    public function getBoxCountByType($userID, $coinType)
    {
        $sql = mysql_query("SELECT * FROM collectboxes WHERE coinType = '$coinType' AND  userID = '$userID'");
        return mysql_num_rows($sql);
    }



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Empty box name
    public function getNewBoxName($coinID)
    {
        $sql = mysql_query("SELECT * FROM collectboxes WHERE boxType = 'Mint Box' AND  userID = '$userID'");
        return mysql_num_rows($sql) + 1;
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//By coin
    public function getBoxCountByCoin($userID, $coinID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collectboxes 
            WHERE userID = :userID AND coinID = :coinID
        ");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
        //$sql = mysql_query("SELECT * FROM collectboxes WHERE coinID = '$coinID' AND  userID = '$userID'");
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//REPORTS


    public function getTotalInvestmentSumByCategory($coinCategory, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectboxes WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getTotalInvestmentSumByCategoryFrom($coinCategory, $userID, $purchaseFrom)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectfirstday WHERE purchaseFrom = '" . str_replace('_', ' ', $purchaseFrom) . "' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getUserSum($userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectboxes WHERE userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//BY TYPE


    public function getRollTypeValByCoinType($rollType, $userID, $coinType)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectboxes WHERE rollType = '$rollType' AND userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getTypeFaceVal($userID, $coinType)
    {
        $CoinTypes = new CoinTypes();
        $CoinTypes->getCoinByType($coinType);
        $totalRollFace = $this->getRollCountByType($userID, $coinType) * ($CoinTypes->getDenomination() * $CoinTypes->getRollCount());
        return number_format($totalRollFace);
    }

    public function getCoinSumByType($coinType, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectboxes WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
//Get by year roll count
    public function getNumOfRollsSavedThisYear($coinYear, $coinType, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collectboxes WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinYear = '$coinYear' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    public function getNumOfAllYearByType($coinType, $userID)
    {
        $sql = mysql_query("SELECT COUNT(DISTINCT coinYear) as num FROM collectboxes WHERE rollType = 'Same Year' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'") or die(mysql_error());
        $total = mysql_fetch_array($sql);
        return $total['num'];
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//boxes.php

    public function getDenominationCount($boxType, $coinCategory, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collectboxes WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND boxType = '$boxType' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//By Version
    public function getCollectionBoxByVersion($coinVersion, $userID)
    {
        $sql = mysql_query("SELECT * FROM collectbags WHERE coinVersion = '$coinVersion' AND userID = '$userID' ") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getCoinCountSumByVersion($coinVersion, $userID)
    {
        $sql = mysql_query("SELECT sum(coinCount) FROM collectbags WHERE coinVersion = '" . $coinVersion . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['sum(coinCount)'];
        }
        return $coinSum;
    }


}//End Class
?>