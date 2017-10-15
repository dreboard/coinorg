<?php
//getNumOfRollsSavedThisYear
//enterNewRollCoins
//otherSameCoinsList
class CollectionRolls
{
    public function __construct()
    {
        $this->db = DBConnect::getInstance();
    }

    public function getCollectionRollById($collectrollsID)
    {
        $userID = $_SESSION['userID'];
        $stmt = $this->db->dbhc->prepare("
            SELECT * FROM collectrolls     
            WHERE collectrollsID = :collectrollsID AND userID = :userID
            LIMIT 1
        ");
        $stmt->execute(array(':collectrollsID' => $collectrollsID, ':userID' => $userID));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->userID = $row['userID'];
        $this->coinYearRange = $row['coinYearRange'];
        $this->coinYear = $row['coinYear'];
        $this->rollNickname = $row['rollNickname'];
        $this->rollID = $row['rollID'];
        $this->rollMintID = $row['rollMintID'];
        $this->coinType = $row['coinType'];
        $this->coinCategory = $row['coinCategory'];
        $this->coinVersion = $row['coinVersion'];
        $this->design = $row['design'];
        $this->purchaseFrom = $row['purchaseFrom'];
        $this->purchaseDate = $row['purchaseDate'];
        $this->purchasePrice = $row['purchasePrice'];
        $this->listDate = $row['listDate'];
        $this->sellPrice = $row['sellPrice'];
        $this->sellDate = $row['sellDate'];
        $this->ebaySellerID = $row['ebaySellerID'];
        $this->auctionNumber = $row['auctionNumber'];
        $this->coinGrade = $row['coinGrade'];

        $this->proService = $row['proService'];
        $this->proSerialNumber = $row['proSerialNumber'];
        $this->slabLabel = $row['slabLabel'];
        $this->slabCondition = $row['slabCondition'];
        $this->coinGrade = $row['coinGrade'];
        $this->designation = $row['designation'];

        $this->additional = $row['additional'];
        $this->coinNote = $row['coinNote'];
        $this->coinCount = $row['coinCount'];
        $this->rollHolder = $row['rollHolder'];
        $this->firstday = $row['firstday'];
        $this->coinID = $row['coinID'];
        $this->rollType = $row['rollType'];
        $this->mintMark = $row['mintMark'];
        $this->coinSubCategory = $row['coinSubCategory'];
        $this->problem = $row['problem'];
        $this->strike = $row['strike'];
        $this->shopName = $row['shopName'];
        $this->shopUrl = $row['shopUrl'];
        $this->showName = $row['showName'];
        $this->showCity = $row['showCity'];
        $this->rollType = $row['rollType'];
        $this->coinPic1 = $row['coinPic1'];
        $this->faceVal = $row['faceVal'];
        $this->showName = $row['showName'];
        $this->showCity = $row['showCity'];
        $this->rollCondition = $row['rollCondition'];
        $this->startYear = $row['startYear'];
        $this->endYear = $row['endYear'];
        $this->containerID = $row['containerID'];
        $this->coincollectID = $row['coincollectID'];
        $this->bulkRoll = $row['bulkRoll'];
        return true;
    }


    public function getBulkRoll()
    {
        return strip_tags($this->bulkRoll);
    }

    public function getContainerID()
    {
        return strip_tags($this->containerID);
    }

    public function getCoincollectID()
    {
        return strip_tags($this->coincollectID);
    }

    public function getStartYear()
    {
        return strip_tags($this->startYear);
    }

    public function getEndYear()
    {
        return strip_tags($this->endYear);
    }

    public function getGrader()
    {
        return strip_tags($this->proService);
    }

    public function getSlabLabel()
    {
        return strip_tags($this->slabLabel);
    }

    public function getSlabCondition()
    {
        return strip_tags($this->slabCondition);
    }

    public function getDesignation()
    {
        return strip_tags($this->designation);
    }

    public function getGraderNumber()
    {
        return strip_tags($this->proSerialNumber);
    }

    public function getRollCondition()
    {
        return strip_tags($this->rollCondition);
    }

    public function getFaceVal()
    {
        return strip_tags($this->faceVal);
    }

    public function getCoinCount()
    {
        return strip_tags($this->coinCount);
    }

    public function getCoinCategory()
    {
        return strip_tags($this->coinCategory);
    }

    public function getCoinVersion()
    {
        return strip_tags($this->coinVersion);
    }

    public function getCoinNote()
    {
        return strip_tags($this->coinNote);
    }

    public function getCoinStrike()
    {
        return strip_tags($this->strike);
    }

    public function getRollID()
    {
        return strip_tags($this->rollID);
    }

    public function getRollMintID()
    {
        return strip_tags($this->rollMintID);
    }

    public function getCoinID()
    {
        return strip_tags($this->coinID);
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

    public function getShowName()
    {
        return strip_tags($this->showName);
    }

    public function getShowCity()
    {
        return strip_tags($this->showCity);
    }

    public function getShopName()
    {
        return strip_tags($this->shopName);
    }

    public function getShopUrl()
    {
        return strip_tags($this->shopUrl);
    }


    public function getRollCode()
    {
        return strip_tags($this->RollCode);
    }

    public function getAdditional()
    {
        return strip_tags($this->additional);
    }

    public function getRollNickname()
    {
        return strip_tags(stripcslashes($this->rollNickname));
    }

    public function getRollType()
    {
        return strip_tags($this->rollType);
    }

    public function getRollHolder()
    {
        return strip_tags($this->rollHolder);
    }

    public function getFirstday()
    {
        return strip_tags($this->firstDay);
    }

    public function getMintMark()
    {
        return strip_tags($this->mintMark);
    }

    public function getYearRange()
    {
        return strip_tags($this->coinYearRange);
    }

    public function getCoinYear()
    {
        return strip_tags($this->coinYear);
    }

    public function getCoinPic1()
    {
        return strip_tags($this->coinPic1);
    }

    public function getDesign()
    {
        return strip_tags($this->design);
    }


    public function getRollCoinCount($collectrollsID)
    {
        $sql = 'SELECT * FROM rollcoin WHERE collectrollsID = ' . $collectrollsID;
        $results = mysql_query($sql);
        return mysql_num_rows($results);
    }

    function getCoinStatus($i, $collectrollsID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE coin" . $i . " = 'coin" . $i . "' AND collectrollsID = '$collectrollsID' AND userID = '$userID'") or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $coinNumber = $row['coin' . $i];
        if ($coinNumber == "0") {
            $status = 'Coin' . $i . ' Open';
        } else {
            $coin = new Coin();
            $coin->getCoinById($coinNumber);
            $status = 'Change ' . $coin->getCoinName();
        }
        return $status;
    }

    function getSmallCentFaceVal($userID)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE coinCategory = 'Small Cent' AND userID = '$userID'") or die(mysql_error());
        $getCategoryRequest = mysql_num_rows($sql);
        $totalVal = $getCategoryRequest * .5;
        return $totalVal;
    }

    function getSmallCentCertCount($userID)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE proService != 'None' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getRollCountByID($userID)
    {
        $sql = 'SELECT * FROM collectrolls WHERE userID = ' . $userID;
        $results = mysql_query($sql);
        $collectCount = mysql_num_rows($results);

        return $collectCount;
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function getRollTypeLink($collectrollsID)
    {
        $Encryption = new Encryption();
        $this->getCollectionRollById($collectrollsID);
        switch ($this->getRollType()) {
            case 'Same Coin':
                $detailLink = '<a href="viewSameRollDetail.php?ID=' . $Encryption->encode($collectrollsID) . '">' . $this->getRollNickname() . '</a>';
                break;
            case 'Mint':
                $detailLink = '<a href="viewMintRollDetail.php?ID=' . $Encryption->encode($collectrollsID) . '">' . $this->getRollNickname() . '</a>';
                break;
            case 'Date Range':
                $detailLink = '<a href="viewDateRollDetail.php?ID=' . $Encryption->encode($collectrollsID) . '">' . $this->getRollNickname() . '</a>';
                break;
            case 'Mixed Type':
                $detailLink = '<a href="viewMixedRollDetail.php?ID=' . $Encryption->encode($collectrollsID) . '">' . $this->getRollNickname() . '</a>';
                break;
            case 'Same Year':
                $detailLink = '<a href="viewYearRollDetail.php?ID=' . $Encryption->encode($collectrollsID) . '">' . $this->getRollNickname() . '</a>';
                break;
            case 'Same Type':
                $detailLink = '<a href="viewTypeRollDetail.php?ID=' . $Encryption->encode($collectrollsID) . '">' . $this->getRollNickname() . '</a>';
                break;
            case 'Coin By Coin':
                $detailLink = '<a href="viewCoinRollDetail.php?ID=' . $Encryption->encode($collectrollsID) . '">' . $this->getRollNickname() . '</a>';
                break;
        }
        return $detailLink;
    }

    function getRollTypeIconLink($collectrollsID)
    {
        $Encryption = new Encryption();
        $this->getCollectionRollById($collectrollsID);
        switch ($this->getRollType()) {
            case 'Same Coin':
                $detailLink = '<a href="viewSameRollDetail.php?ID=' . $Encryption->encode($collectrollsID) . '" title="' . $this->getRollNickname() . '"><img align="absbottom" src="../img/Small_Cent_Rolls.jpg" width="20" height="20" /></a> ';
                break;
            case 'Mint':
                $detailLink = '<a href="viewMintRollDetail.php?ID=' . $Encryption->encode($collectrollsID) . '" title="' . $this->getRollNickname() . '"><img align="absbottom" src="../img/Small_Cent_Rolls.jpg" width="20" height="20" /></a> ';
                break;
            case 'Date Range':
                $detailLink = '<a href="viewDateRollDetail.php?ID=' . $Encryption->encode($collectrollsID) . '" title="' . $this->getRollNickname() . '"><img align="absbottom" src="../img/Small_Cent_Rolls.jpg" width="20" height="20" /></a> ';
                break;
            case 'Mixed Type':
                $detailLink = '<a href="viewMixedRollDetail.php?ID=' . $Encryption->encode($collectrollsID) . '" title="' . $this->getRollNickname() . '"><img align="absbottom" src="../img/Small_Cent_Rolls.jpg" width="20" height="20" /></a> ';
                break;
            case 'Same Year':
                $detailLink = '<a href="viewYearRollDetail.php?ID=' . $Encryption->encode($collectrollsID) . '" title="' . $this->getRollNickname() . '"><img align="absbottom" src="../img/Small_Cent_Rolls.jpg" width="20" height="20" /></a> ';
                break;
            case 'Same Type':
                $detailLink = '<a href="viewTypeRollDetail.php?ID=' . $Encryption->encode($collectrollsID) . '" title="' . $this->getRollNickname() . '"><img align="absbottom" src="../img/Small_Cent_Rolls.jpg" width="20" height="20" /></a> ';
                break;
            case 'Coin By Coin':
                $detailLink = '<a href="viewCoinRollDetail.php?ID=' . $Encryption->encode($collectrollsID) . '" title="' . $this->getRollNickname() . '"><img align="absbottom" src="../img/Small_Cent_Rolls.jpg" width="20" height="20" /></a> ';
                break;
        }
        return $detailLink;
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//COIN TYPE
    function getRollTypeCount($rollType, $userID)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE rollType = '$rollType' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function getRollTypeCountByRolltype($rollType, $userID, $coinType)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE rollType = '$rollType' AND userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getRollCountByType($userID, $coinType)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND  userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public function getRollUniqueCountByType($userID, $coinType)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collectrolls WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND  userID = '$userID'");
        return mysql_num_rows($sql);
    }

    function newCoinSelects($coinType)
    {
        $sql = mysql_query("SELECT * FROM coins WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND byMint = '1' ORDER BY coinYear ASC") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coin = new Coin();
            $coinID = intval($row['coinID']);
            $coin->getCoinById($coinID);
            echo '<option value="' . $coinID . '">' . $coin->getCoinName() . '</option>';
        }
        return true;
    }

    function coinSelects($coinType, $userID)
    {
        $getTypes = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND collectrollsID = '0' ORDER BY coinID ASC") or die(mysql_error());
        while ($row = mysql_fetch_array($getTypes)) {

            $coin = new Coin();
            $collection = new Collection();
            $coinID = intval($row['coinID']);
            $coin->getCoinById($coinID);
            $collectionID = intval($row['collectionID']);
            $collection->getCollectionById($collectionID);
            echo '<option  value="' . $collectionID . '">' . $coin->getCoinName() . ' ' . $collection->getCoinGrade() . '</option>';

        }
        return;

    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Totals
    function getUserSum($userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectrolls WHERE userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    function getRollsFaceVal($userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(denomination), 0.00) FROM collection WHERE collectrollsID != '0' AND  userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(denomination), 0.00)'];
        }
        return $coinSum;
    }

//from
    function getUserSumFrom($userID, $purchaseFrom)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectrolls WHERE purchaseFrom = '" . str_replace('_', ' ', $purchaseFrom) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getAllTableCountByIDFrom($userID, $purchaseFrom)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE userID = '$userID' AND purchaseFrom = '" . str_replace('_', ' ', $purchaseFrom) . "'") or die(mysql_error());
        return mysql_num_rows($sql);
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//COIN Category

    public function getRollCountByCategory($userID, $coinCategory)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND  userID = '$userID'");
        return mysql_num_rows($sql);
    }

    function getRollTypeCountByRollCategory($rollType, $userID, $coinCategory)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE rollType = '$rollType' AND userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getRollSumByCategory($rollType, $coinCategory, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectrolls WHERE rollType = '$rollType' AND coinCategory = '" . $coinCategory . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }





//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//COIN ID
    function getCollectionCoinIDFaceVal($coinID, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(denomination), 0.00) FROM collection WHERE collectrollsID != '0' AND coinID = '$coinID' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(denomination), 0.00)'];
        }
        return $coinSum;
    }

    function getCollectionRollSumByCoinID($collectrollsID, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE collectrollsID = '$collectrollsID' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getRollCountByCoinID($coinID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE coinID = '$coinID' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getRollSumByCoinID($coinID, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectrolls WHERE coinID = '" . $coinID . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getRollFaceValByCoinID($coinID, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectrolls WHERE coinID = '" . $coinID . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getCoinRollSumById($coinID, $userID)
    {
        $myQuery = mysql_query("SELECT SUM(purchasePrice) FROM collection WHERE coinID = '$coinID' AND userID = '$userID'") or die(mysql_error());

        while ($row = mysql_fetch_array($myQuery)) {
            $coinSum = $row['SUM(purchasePrice)'];
        }
        return $coinSum;
    }

    function totalRollInvestment($coinID, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectrolls WHERE userID='$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//USER ID

    public function getCertificationRollCountById($userID)
    {
        $sql = 'SELECT * FROM collectrolls WHERE userID = ' . $userID . ' AND proService != "None" ';
        $results = mysql_query($sql);
        $collectCount = mysql_num_rows($results);

        return $collectCount;
    }

    function getRollTypeVal($rollType, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectrolls WHERE rollType = '$rollType' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//REPORTS
    public function getCoinSumByType($coinType, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectrolls WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getTotalInvestmentSumByCategory($coinCategory, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectrolls WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getTotalInvestmentSumByCategoryFrom($coinCategory, $userID, $purchaseFrom)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectrolls WHERE purchaseFrom = '" . str_replace('_', ' ', $purchaseFrom) . "' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ROLL TYPE
    public function getCoinSumByRollType($rollType, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectrolls WHERE rollType = '" . str_replace('_', ' ', $rollType) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    function getRollTypeValByCoinType($rollType, $userID, $coinType)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectrolls WHERE rollType = '$rollType' AND userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    function getTypeFaceVal($userID, $coinType)
    {
        $CoinTypes = new CoinTypes();
        $CoinTypes->getCoinByType($coinType);
        $totalRollFace = $this->getRollCountByType($userID, $coinType) * ($CoinTypes->getDenomination() * $CoinTypes->getRollCount());
        return number_format($totalRollFace);
    }

//Get by year roll count
    function getNumOfRollsSavedThisYear($coinYear, $coinType, $userID)
    {
        $CoinTypes = new CoinTypes();
        $CoinTypes->getCoinByType($coinType);

        $countYear = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinYear = '$coinYear' AND collectrollsID != '0' AND userID = '$userID'") or die(mysql_error());

        if (mysql_num_rows($countYear) >= $CoinTypes->getRollCount()) {
            $fullRoll = '1';
        } else {
            $fullRoll = '0';
        }
        return $fullRoll;
    }

    function getNumOfAllYearByType($coinType, $userID)
    {
        $sql = mysql_query("SELECT COUNT(DISTINCT coinYear) as num FROM collectrolls WHERE rollType = 'Same Year' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'") or die(mysql_error());
        $total = mysql_fetch_array($sql);
        return $total['num'];
    }




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Mint rolls
    function getMintRollIDValByID($rollMintID, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectrolls WHERE rollMintID = '$rollMintID' AND userID = '$userID' ") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    function getMintRollIDCountByID($rollMintID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE rollMintID = '$rollMintID' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function getMintRollImg($coinVersion, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collectrolls WHERE coinVersion = '" . str_replace('_', ' ', $coinVersion) . "' AND userID = '$userID'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            while ($row = mysql_fetch_array($countAll)) {
                return str_replace(' ', '_', $coinVersion) . '.jpg';
            }

        }
    }

    public function getMintRollCountById($rollMintID, $userID)
    {
        $sql = mysql_query('SELECT * FROM collectrolls WHERE rollMintID = ' . $rollMintID . ' AND userID = ' . $userID);
        return mysql_num_rows($sql);
    }

    public function getMintRollSumByID($rollMintID, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectrolls WHERE rollMintID = '" . $rollMintID . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Proof rolls
    public function getProofRollCount($userID)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE strike = 'Proof' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function getProofRollTypeValByCoinType($userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectrolls WHERE strike = 'Proof' AND userID = '$userID' ") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//By coinID

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//By ROLL
    function getThisRollFaceVal($collectrollsID, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(denomination), 0.00) FROM collection WHERE collectrollsID = '$collectrollsID' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(denomination), 0.00)'];
        }
        return $coinSum;
    }

    function getThisRollTypeVal($collectrollsID, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE collectrollsID = '$collectrollsID' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getRollCount($collectrollsID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE collectrollsID = '$collectrollsID' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//By Version
    public function getCollectionRollsByVersion($coinVersion, $userID)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE coinVersion = '$coinVersion' AND userID = '$userID' ") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getCoinCountSumByVersion($coinVersion, $userID)
    {
        $sql = mysql_query("SELECT sum(coinCount) FROM collectrolls WHERE coinVersion = '" . $coinVersion . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['sum(coinCount)'];
        }
        return $coinSum;
    }




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//INSERTING AND MANAGING ROLLS

    function removeRollContainer($collectrollsID, $userID)
    {
        $sql = mysql_query("UPDATE collectrolls SET containerID = '0' WHERE collectrollsID = '$collectrollsID' AND userID = '$userID'");
        if ($sql) {
            return true;
        } else {
            return false;
        }
    }

    function checkClosedRollStatus($collectrollsID, $userID)
    {
        $this->getCollectionRollById($collectrollsID);
        $CoinTypes = new CoinTypes();
        $CoinTypes->getCoinByType($this->getCoinType());

        $countRoll = mysql_query("SELECT * FROM collection WHERE collectrollsID = '$collectrollsID' AND userID = '$userID'") or die(mysql_error());

        if (mysql_num_rows($countRoll) >= $CoinTypes->getRollCount()) {
            $fullRoll = '0';
        } else {
            $fullRoll = '1';
        }
        return $fullRoll;
    }

    public function getRollOptionLimitRequest($collectrollsID, $coinID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinID = '" . $coinID . "' AND proService = 'None' AND collectfolderID = '0' AND collectrollsID = '0' AND collectsetID = '0' AND setregID = '0' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public function inRollCount($collectrollsID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE collectrollsID = '" . $collectrollsID . "' AND userID = '$userID' ") or die(mysql_error());
        return mysql_num_rows($sql);
    }


//Same Coin
    public function getSameRollOptionLimitRequest($collectrollsID, $coinID, $userID)
    {
        $CoinTypes = new CoinTypes();
        $this->getCollectionRollById($collectrollsID);
        $CoinTypes->getCoinByType($this->getCoinType());
        return $CoinTypes->getRollCount() - $this->inRollCount($collectrollsID, $userID);
    }

    public function availableCoinIDCoinRequest($collectrollsID, $coinID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinID = '" . $coinID . "' AND proService = 'None' AND collectfolderID = '0' AND collectrollsID = '0' AND collectsetID = '0' AND setregID = '0' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    function enterNewRollOpenCoins($collectrollsID, $coinID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchasePrice, $ebaySellerID, $shopName, $shopUrl, $showName, $showCity, $purchaseDate)
    {
        $coin = new Coin();
        $coin->getCoinById($coinID);
        $coinID = $coin->getCoinID();

        $sql = mysql_query("INSERT INTO collection(coinID, collectrollsID, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, showName, showCity, enterDate, mintMark, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, strike, coinGrade, coinGradeNum, purchaseDate, userID, errorType, errorCoin, byMint, century, design, series, designType, seriesType, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal) VALUES('" . $coinID . "', '$collectrollsID', '$purchaseFrom', '$auctionNumber', '$additional', '0.00', '$ebaySellerID', '$shopName', '$shopUrl', '$showName', '$showCity', '" . date('Y-m-d H:i:s') . "', '" . $coin->getMintMark() . "', '" . $coin->getCoinType() . "', '" . $coin->getCoinCategory() . "', '" . $coin->getCoinSubCategory() . "', '" . $coin->getCoinYear() . "', '" . $coin->getCoinVersion() . "', '" . $coin->getCoinStrike() . "', 'No Grade', '0', '$purchaseDate', '$userID', 'None', '0', '" . $coin->getByMint() . "', '" . $coin->getCentury() . "', '" . $coin->getDesign() . "', '" . $coin->getSeries() . "', '" . $coin->getDesignType() . "', '" . $coin->getCoinSeriesType() . "', '" . $coin->getCommemorativeType() . "', '" . $coin->getCommemorativeVersion() . "', '" . $coin->getCommemorative() . "', '" . $coin->getDenomination() . "', '" . $coin->getKeyDate() . "', '" . $coin->getCoinMetal() . "')") or die(mysql_error());
        return true;
    }

    function enterNewRollCoins($collectrollsID, $coinID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchasePrice, $ebaySellerID, $shopName, $shopUrl, $showName, $showCity, $purchaseDate)
    {
        $coin = new Coin();
        $coin->getCoinById($coinID);
        $coinID = $coin->getCoinID();

        $sql = mysql_query("INSERT INTO collection(coinID, collectrollsID, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, showName, showCity, enterDate, mintMark, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, strike, coinGrade, coinGradeNum, purchaseDate, userID, errorType, errorCoin, byMint, century, design, series, designType, seriesType, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal) VALUES('" . $coinID . "', '$collectrollsID', '$purchaseFrom', '$auctionNumber', '$additional', '0.00', '$ebaySellerID', '$shopName', '$shopUrl', '$showName', '$showCity', '" . date('Y-m-d H:i:s') . "', '" . $coin->getMintMark() . "', '" . $coin->getCoinType() . "', '" . $coin->getCoinCategory() . "', '" . $coin->getCoinSubCategory() . "', '" . $coin->getCoinYear() . "', '" . $coin->getCoinVersion() . "', '" . $coin->getCoinStrike() . "', 'No Grade', '0', '$purchaseDate', '$userID', 'None', '0', '" . $coin->getByMint() . "', '" . $coin->getCentury() . "', '" . $coin->getDesign() . "', '" . $coin->getSeries() . "', '" . $coin->getDesignType() . "', '" . $coin->getCoinSeriesType() . "', '" . $coin->getCommemorativeType() . "', '" . $coin->getCommemorativeVersion() . "', '" . $coin->getCommemorative() . "', '" . $coin->getDenomination() . "', '" . $coin->getKeyDate() . "', '" . $coin->getCoinMetal() . "')") or die(mysql_error());
        return true;
    }

//COIN MIXED ROLLS
    function checkClosedMixedRollStatus($collectrollsID, $userID)
    {
        $this->getCollectionRollById($collectrollsID);
        $CoinCategories = new CoinCategories();
        $CoinCategories->getCoinByCategory($this->getCoinCategory());
        $countRoll = mysql_query("SELECT * FROM collection WHERE collectrollsID = '$collectrollsID' AND userID = '$userID'") or die(mysql_error());
        if (mysql_num_rows($countRoll) >= $CoinCategories->getRollCount()) {
            $fullRoll = '0';
        } else {
            $fullRoll = '1';
        }
        return $fullRoll;
    }

    function otherMixedCoinsList($collectionID, $coinCategory, $userID, $collectrollsID)
    {
        $coin = new Coin();
        $Encryption = new Encryption();
        $collection = new Collection();
        $sql3 = mysql_query("SELECT * FROM collection WHERE coinCategory = '$coinCategory' AND proService = 'None' AND collectfolderID = '0' AND collectrollsID = '0' AND collectsetID = '0' AND setregID = '0' AND userID = '$userID'");
        $coinCount = mysql_num_rows($sql3);
        $html = '( ' . $coinCount . ' ) ';
        if (mysql_num_rows($sql3) == 0) {
            $html .= 'None In Collection';
        } else {
            $html .= '<form method="post" action="" class="compactForm">';
            $html .= '<select name="newID" onchange="document.getElementById(\'changeOtherBtn' . $collectionID . '\').disabled = false;">
	<option value="" class="coinList" selected="selected">Select Another Coin</option>';
            while ($row = mysql_fetch_array($sql3)) {
                $collection->getCollectionById(intval($row['collectionID']));
                $coin->getCoinById(intval($row['coinID']));
                $html .= '<option value="' . $Encryption->encode(intval($row['collectionID'])) . '" class="coinList">' . substr($coin->getCoinName(), 0, 40) . ' ' . strip_tags($row['coinGrade']) . '</option>';
            }
            $html .= '</select>';
            $html .= '<input name="oldID" type="hidden" value=" ' . $Encryption->encode($collectionID) . ' "  />';
            $html .= '<input name="changeRoll" type="hidden" value="' . $Encryption->encode($collectrollsID) . '" />';
            $html .= '<input name="changeCoinBtn" class="changeBtns" id="changeOtherBtn' . $collectionID . '" type="submit" value="Change" />';
            $html .= '</form>';
        }
        return $html;
    }

//COIN TYPE ROLLS
    function otherTypeCoinsList($collectionID, $coinType, $userID, $collectrollsID)
    {
        $coin = new Coin();
        $Encryption = new Encryption();
        $collection = new Collection();
        $sql3 = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND proService = 'None' AND collectfolderID = '0' AND collectrollsID = '0' AND collectsetID = '0' AND setregID = '0' AND userID = '$userID'");
        $coinCount = mysql_num_rows($sql3);
        $html = '( ' . $coinCount . ' ) ';
        if (mysql_num_rows($sql3) == 0) {
            $html .= 'None In Collection';
        } else {
            $html .= '<form method="post" action="" class="compactForm">';
            $html .= '<select name="newID" onchange="document.getElementById(\'changeOtherBtn' . $collectionID . '\').disabled = false;">><option value="" class="coinList" selected="selected">Select Another Coin</option>';
            while ($row = mysql_fetch_array($sql3)) {
                $coinGrade = strip_tags($row['coinGrade']);
                $collection->getCollectionById(intval($row['collectionID']));
                $coin->getCoinById(intval($row['coinID']));
                $html .= '<option value="' . $Encryption->encode(intval($row['collectionID'])) . '" class="coinList">' . substr($coin->getCoinName(), 0, 40) . ' ' . $coinGrade . '</option>';
            }
            $html .= '</select>';
            $html .= '<input name="oldID" type="hidden" value=" ' . $Encryption->encode($collectionID) . ' "  />';
            $html .= '<input name="changeRoll" type="hidden" value="' . $Encryption->encode($collectrollsID) . '" />';
            $html .= '<input name="changeCoinBtn" class="changeBtns" id="changeOtherBtn' . $collectionID . '" type="submit" value="Change" />';
            $html .= '</form>';
        }
        return $html;
    }

    function getOldCollectionID($collectionID, $collectrollsID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE collectionID = '$collectionID' AND userID = '$userID' AND collectrollsID = '$collectrollsID' ");
        $row = mysql_fetch_array($sql);
        return $row['collectionID'];
    }

//COIN DATE ROLLS
    function otherDateCoinsList($collectionID, $coinType, $userID, $collectrollsID)
    {
        $coin = new Coin();
        $Encryption = new Encryption();
        $collection = new Collection();
        $this->getCollectionRollById($collectrollsID);
        $sql3 = mysql_query("SELECT * FROM collection WHERE coinYear BETWEEN '" . $this->getStartYear() . "' AND '" . $this->getEndYear() . "' AND coinType = '$coinType' AND proService = 'None' AND collectfolderID = '0' AND collectrollsID = '0' AND collectsetID = '0' AND setregID = '0' AND userID = '$userID'");
        $coinCount = mysql_num_rows($sql3);
        $html = '( ' . $coinCount . ' ) ';
        if (mysql_num_rows($sql3) == 0) {
            $html .= 'None In Collection';
        } else {
            $html .= '<form method="post" action="" class="compactForm">';
            $html .= '<select name="newID" onchange="document.getElementById(\'changeOtherBtn' . $collectionID . '\').disabled = false;">><option value="" class="coinList" selected="selected">Select Another Coin</option>';
            while ($row = mysql_fetch_array($sql3)) {
                $collection->getCollectionById(intval($row['collectionID']));
                $coin->getCoinById(intval($row['coinID']));
                $html .= '<option value="' . $Encryption->encode(intval($row['collectionID'])) . '" class="coinList">' . substr($coin->getCoinName(), 0, 40) . ' ' . strip_tags($row['coinGrade']) . '</option>';
            }
            $html .= '</select>';
            $html .= '<input name="oldID" type="hidden" value=" ' . $Encryption->encode($collectionID) . ' "  />';
            $html .= '<input name="changeRoll" type="hidden" value="' . $Encryption->encode($collectrollsID) . '" />';
            $html .= '<input name="changeCoinBtn" class="changeBtns" id="changeOtherBtn' . $collectionID . '" type="submit" value="Change" />';
            $html .= '</form>';
        }
        return $html;
    }

//COIN ID ROLLS
    function otherSameCoinsList($coinID, $oldCollectionID, $userID, $collectrollsID)
    {
        $coin = new Coin();
        $Encryption = new Encryption();
        $collection = new Collection();
        $sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND proService = 'None' AND collectfolderID = '0' AND collectrollsID = '0' AND collectsetID = '0' AND setregID = '0' AND userID = '$userID'");
        $coinCount = mysql_num_rows($sql);
        $html = '( ' . $coinCount . ' ) ';
        if (mysql_num_rows($sql) == 0) {
            $html .= 'None In Collection';
        } else {
            $html .= '<form method="post" action="" class="compactForm">';
            $html .= '<select name="newID" onchange="document.getElementById(\'changeOtherBtn' . $collectionID . '\').disabled = false;">><option value="" class="coinList" selected="selected">Select Another Coin</option>';
            while ($row = mysql_fetch_array($sql)) {
                $coinGrade = strip_tags($row['coinGrade']);
                $collectionID = intval($row['collectionID']);
                $purchaseDate = strip_tags($row['purchaseDate']);
                $collection->getCollectionById($collectionID);
                $coinID = intval($row['coinID']);
                $html .= '<option value="' . $Encryption->encode(intval($row['collectionID'])) . '" class="coinList">' . strip_tags($row['coinGrade']) . ' ' . date("M j Y", strtotime(strip_tags($row['purchaseDate']))) . '</option>';
            }
            $html .= '</select>';
            $html .= '<input name="oldID" type="hidden" value="' . $Encryption->encode($oldCollectionID) . '"  />';
            $html .= '<input name="collectrollsID" type="hidden" value="' . $collectrollsID . '" />';
            $html .= '<input name="changeCoinBtn" class="changeBtns"  id="changeOtherBtn' . $collectionID . '" type="submit" value="Change" />';
            $html .= '</form>';
        }
        return $html;
    }


//Same Year ROLLS
    function otherYearCoinsList($collectionID, $coinType, $userID, $collectrollsID)
    {
        $coin = new Coin();
        $Encryption = new Encryption();
        $collection = new Collection();
        $this->getCollectionRollById($collectrollsID);
        $sql3 = mysql_query("SELECT * FROM collection WHERE coinYear = '" . $this->getCoinYear() . "' AND coinType = '$coinType' AND proservice = 'None' AND collectfolderID = '0' AND collectrollsID = '0' AND collectsetID = '0' AND setregID = '0' AND userID = '$userID'");
        $coinCount = mysql_num_rows($sql3);
        $html = '( ' . $coinCount . ' ) ';
        if (mysql_num_rows($sql3) == 0) {
            $html .= 'None In Collection';
        } else {
            $html .= '<form method="post" action="" class="compactForm">';
            $html .= '<select name="newID" onchange="document.getElementById(\'changeOtherYearBtn' . $collectionID . '\').disabled = false;">
	<option value="" class="coinList" selected="selected">Select Another Coin</option>';
            while ($row = mysql_fetch_array($sql3)) {
                $coinGrade = strip_tags($row['coinGrade']);
                $collection->getCollectionById(intval($row['collectionID']));
                $coin->getCoinById(intval($row['coinID']));
                $html .= '<option value="' . $Encryption->encode(intval($row['collectionID'])) . '" class="coinList">' . substr($coin->getCoinName(), 0, 40) . ' ' . $coinGrade . '</option>';
            }
            $html .= '</select>';
            $html .= '<input name="oldID" type="hidden" value=" ' . $Encryption->encode($collectionID) . ' "  />';
            $html .= '<input name="changeRoll" type="hidden" value="' . $Encryption->encode($collectrollsID) . '" />';
            $html .= '<input name="changeCoinBtn" class="changeOtherYearBtns" id="changeOtherYearBtn' . $collectionID . '" type="submit" value="Change" />';
            $html .= '</form>';
        }
        return $html;
    }


}//End Class
