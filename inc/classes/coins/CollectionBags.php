<?php

/**
 * Collection Bags Class
 * @since v0.1.0
 */
class CollectionBags
{
    public function __construct()
    {
        $this->db = DBConnect::getInstance();
    }

    /**
     * @param $collectbagID
     * @return bool
     */
    public function getCollectionBagById($collectbagID)
    {

        $userID = $_SESSION['userID'];
        $stmt = $this->db->dbhc->prepare("
            SELECT * FROM collectbags     
            WHERE collectbagID = :collectbagID AND userID = :userID
            LIMIT 1
        ");
        $stmt->execute(array(':collectbagID' => $collectbagID, ':userID' => $userID));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->userID = $row['userID'];
        $this->bagID = $row['bagID'];
        $this->bagNickname = $row['bagNickname'];
        $this->coinType = $row['coinType'];
        $this->coinYear = $row['coinYear'];
        $this->coinCategory = $row['coinCategory'];
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
        $this->denomination = $row['denomination'];
        $this->coinCount = $row['coinCount'];
        $this->additional = $row['additional'];
        $this->bagCondition = $row['bagCondition'];
        $this->bagType = $row['bagType'];
        $this->coinVersion = $row['coinVersion'];
        $this->design = $row['design'];
        $this->coinCount = $row['coinCount'];
        $this->faceVal = $row['faceVal'];
        $this->coinNote = $row['coinNote'];

        return true;
    }

    public function getCoinNote()
    {
        return strip_tags($this->coinNote);
    }

    public function getDesign()
    {
        return strip_tags($this->design);
    }

    public function getCoinCount()
    {
        return strip_tags($this->coinCount);
    }

    public function getFaceVal()
    {
        return strip_tags($this->faceVal);
    }

    public function getCoinVersion()
    {
        return strip_tags($this->coinVersion);
    }

    public function getBagType()
    {
        return strip_tags($this->bagType);
    }

    public function getCoinYear()
    {
        return strip_tags($this->coinYear);
    }

    public function getBagCondition()
    {
        return strip_tags($this->bagCondition);
    }

    public function getCoinType()
    {
        return strip_tags($this->coinType);
    }

    public function getCoinCategory()
    {
        return strip_tags($this->coinCategory);
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

    public function getBagNickname()
    {
        return strip_tags($this->bagNickname);
    }

    public function getBagID()
    {
        return strip_tags($this->bagID);
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ADDING BAGS

//enter bulk coin amounts

    public function getBagTypeCountPlus($userID, $coinType)
    {
        $sql = mysql_query("SELECT * FROM collectbags WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'");
        return mysql_num_rows($sql) + 1;
    }

    function setBagName($userID, $coinType, $bagNickname)
    {
        if ($bagNickname == '') {
            $bagNickname = $coinType . $this->getBagTypeCountPlus($userID, $coinType);
        } else {
            $bagNickname = mysql_real_escape_string($bagNickname);
        }
        return $bagNickname;
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//BY ID
    public function getAllBagCountByID($userID)
    {
        $sql = mysql_query("SELECT * FROM collectbags WHERE userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getBagsFaceVal($userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(faceVal), 0.00) FROM collectbags WHERE userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(faceVal), 0.00)'];
        }
        return $coinSum;
    }

    function getUserSum($userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectbags WHERE userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

//from
    function getUserSumFrom($userID, $purchaseFrom)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectbags WHERE purchaseFrom = '" . str_replace('_', ' ', $purchaseFrom) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getAllTableCountByIDFrom($userID, $purchaseFrom)
    {
        $sql = mysql_query("SELECT * FROM collectbags WHERE userID = '$userID' AND purchaseFrom = '" . str_replace('_', ' ', $purchaseFrom) . "'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

/////	


    public function getAllBagCountByIDFrom($userID)
    {
        $sql = mysql_query("SELECT * FROM collectbags WHERE userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getCoinCountByID($userID)
    {
        $sql = mysql_query("SELECT sum(coinCount) FROM collectbags WHERE userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['sum(coinCount)'];
        }
        return $coinSum;
    }

    public function getBagCountPlus($userID)
    {
        $sql = mysql_query("SELECT * FROM collectbags WHERE userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql) + 1;
    }

    public function getBagCountByCategory($userID, $coinCategory)
    {
        $sql = mysql_query("SELECT * FROM collectbags WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND  userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }


    public function getBagCountByType($userID, $coinType)
    {
        $sql = mysql_query("SELECT * FROM collectbags WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND  userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//by category
    function getBagTypeCountByCoinCategory($bagType, $userID, $coinCategory)
    {
        $sql = mysql_query("SELECT * FROM collectbags WHERE bagType = '" . str_replace('_', ' ', $bagType) . "' AND userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getCoinSumByCategory($userID, $coinCategory)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectbags WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getBagsCategoryFaceVal($userID, $coinCategory)
    {
        $sql = mysql_query("SELECT COALESCE(sum(faceVal), 0.00) FROM collectbags WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(faceVal), 0.00)'];
        }
        return $coinSum;
    }

    function getCountByCoinCategory($userID, $coinCategory)
    {
        $sql = mysql_query("SELECT * FROM collectbags WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function getBagConditionCategoryCount($bagCondition, $userID, $coinCategory)
    {
        $sql = mysql_query("SELECT * FROM collectbags WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND bagCondition = '" . str_replace('_', ' ', $bagCondition) . "' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getCoinCountSumByCategory($coinCategory, $userID)
    {
        $sql = mysql_query("SELECT sum(coinCount) FROM collectbags WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['sum(coinCount)'];
        }
        return $coinSum;
    }

    public function getCoinTypeBagSumByBagCategory($bagType, $userID, $coinCategory)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectbags WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND bagType = '" . str_replace('_', ' ', $bagType) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//by type
    function getBagTypeCountByCoinType($bagType, $userID, $coinType)
    {
        $sql = mysql_query("SELECT * FROM collectbags WHERE bagType = '" . str_replace('_', ' ', $bagType) . "' AND userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function getCountByCoinType($userID, $coinType)
    {
        $sql = mysql_query("SELECT * FROM collectbags WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getBagsTypeFaceVal($userID, $coinType)
    {
        $sql = mysql_query("SELECT COALESCE(sum(faceVal), 0.00) FROM collectbags WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(faceVal), 0.00)'];
        }
        return $coinSum;
    }

    public function getCoinTypeBagSumByBagType($bagType, $userID, $coinType)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectbags WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND bagType = '" . str_replace('_', ' ', $bagType) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    function getBagConditionTypeCount($bagCondition, $userID, $coinType)
    {
        $sql = mysql_query("SELECT * FROM collectbags WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND bagCondition = '" . str_replace('_', ' ', $bagCondition) . "' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//By USER
    public function getBagCountByCoin($userID, $coinID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collectbags
            WHERE userID = :userID AND coinID = :coinID
        ");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collectbags WHERE coinID = '$coinID' AND  userID = '$userID'");
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Bag type
    function getBagTypeCount($bagType, $userID)
    {
        $sql = mysql_query("SELECT * FROM collectbags WHERE bagType = '" . str_replace('_', ' ', $bagType) . "' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getCoinSumByBagType($bagType, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectbags WHERE bagType = '" . str_replace('_', ' ', $bagType) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getCoinFaceValByBagType($bagType, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(faceVal), 0.00) FROM collectbags WHERE bagType = '" . str_replace('_', ' ', $bagType) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(faceVal), 0.00)'];
        }
        return $coinSum;
    }

    public function getCoinCountSumByBagType($bagType, $userID)
    {
        $sql = mysql_query("SELECT sum(coinCount) FROM collectbags WHERE bagType = '" . str_replace('_', ' ', $bagType) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['sum(coinCount)'];
        }
        return $coinSum;
    }

    function getBagConditionCount($bagCondition, $userID)
    {
        $sql = mysql_query("SELECT * FROM collectbags WHERE bagCondition = '" . str_replace('_', ' ', $bagCondition) . "' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Bag year
    function getBagTypeCountByYear($coinYear, $userID)
    {
        $sql = mysql_query("SELECT * FROM collectbags WHERE coinYear = '" . $coinYear . "' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getCoinSumByYear($coinYear, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectbags WHERE coinYear = '" . $coinYear . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getCoinFaceValByYear($coinYear, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(faceVal), 0.00) FROM collectbags WHERE coinYear = '" . $coinYear . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(faceVal), 0.00)'];
        }
        return $coinSum;
    }

    public function getCoinCountSumByYear($coinYear, $userID)
    {
        $sql = mysql_query("SELECT sum(coinCount) FROM collectbags WHERE coinYear = '" . $coinYear . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['sum(coinCount)'];
        }
        return $coinSum;
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//REPORTS
    public function getCoinSumByType($coinType, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectbags WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getTotalInvestmentSumByCategory($coinCategory, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectbags WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getTotalInvestmentSumByCategoryFrom($coinCategory, $userID, $purchaseFrom)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectbags WHERE purchaseFrom = '" . str_replace('_', ' ', $purchaseFrom) . "' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Mint bags
    function getMintBagImg($coinVersion, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collectbags WHERE coinVersion = '" . str_replace('_', ' ', $coinVersion) . "' AND userID = '$userID'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            while ($row = mysql_fetch_array($countAll)) {
                return str_replace(' ', '_', $coinVersion) . '.jpg';
            }

        }
    }

    function getCountByMintBagID($bagID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collectbags WHERE bagID = '" . $bagID . "' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getMintBagSumByID($bagID, $userID)
    {
        $sql = mysql_query("SELECT sum(coinCount) FROM collectbags WHERE bagID = '" . $bagID . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['sum(coinCount)'];
        }
        return $coinSum;
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//By Version
    public function getCollectionBagByVersion($coinVersion, $userID)
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

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Links and views

    function getBagTypeLink($collectbagID)
    {
        $Encryption = new Encryption();
        $this->getCollectionBagById($collectbagID);
        switch ($this->getBagType()) {
            case 'Mint Series':
                $MintBag = new MintBag();
                $MintBag->getMintBagByID($this->getBagID());
                $detailLink = '
				  <tr>
				  <td><span class="darker">Bag: </span></td>
				  <td><a href="viewBag.php?ID=' . $Encryption->encode($this->getBagID()) . '">' . $MintBag->getBagName() . '</a></td>
				  <td></td>
				  </tr>';
                break;
            case 'Mint':
                $detailLink = '';
                //$detailLink = '<a href="viewMintRollDetail.php?ID=' .$Encryption->encode($collectbagID). '">' .$this->getRollNickname(). '</a>';
                break;

        }
        return $detailLink;
    }


}//End Class
?>