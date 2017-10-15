<?php

/*
Errors, cleaned, damaged coins
getErrorForCoin
*/

class Errors
{
    public $bieCoins = array('7117', '7173', '7116', '7174', '7113', '7114', '7115', '7175', '7176', '7177', '7178', '7179', '7180', '7181', '7182', '7183', '7184', '7185', '7187', '7188', '7189', '7171', '7172');

    public function __construct()
    {
        $this->db = DBConnect::getInstance();
    }

    public function getErrorName($error)
    {
        switch ($error) {
            case 'offCenter':
                return 'Off Center';
                break;
            case 'multipleStrike':
                return 'Multiple Strike';
                break;
            case 'broadstrike':
                return 'Broadstrike ';
                break;
            case 'partialCollar':
                return 'Partial Collar';
                break;
            case 'bondedPlanchets':
                return 'Bonded Planchets';
                break;
            case 'matedPair':
                return 'Mated Pair';
                break;
            case 'doubleDenom':
                return 'Double Denomination';
                break;
            case 'indentPercent':
                return 'Indent';
                break;
            case 'clippedPlanchet':
                return 'Clipped Planchet ';
                break;
            case 'mule':
                return 'Mule';
                break;
            case 'rotated':
                return 'Rotated Die';
                break;
            case 'dieCrack':
                return 'Die Cracks';
                break;
            case 'machineDouble':
                return 'Machine Doubled';
                break;
            case 'strikeThru':
                return 'Strike Through';
                break;
            case 'brockage':
                return 'Brockage';
                break;
            case 'wrongPlanchet':
                return 'Wrong Planchet Type';
                break;
            case 'wrongMetal':
                return 'Wrong Planchet Metal';
                break;
        }

    }

    /*
    function getErrorForCoin($collectionID) {
        $collection = new Collection;
        $collection->getCollectionById($collectionID);
        $errorDisplay = "";
        if($collection->getErrorCoin() != '0') {

            if($collection->getOffCenter() != '0'){
                $errorDisplay .= ' '.$collection->getOffCenter();
            }
            if($collection->getMultipleStrike() != 'None'){
                $errorDisplay .= ' '.$collection->getMultipleStrike();
            }
            if($collection->getBroadstrike() != 'None'){
                $errorDisplay .= ' '.$collection->getBroadstrike();
            }
            if($collection->getPartialCollar() != 'None'){
                $errorDisplay .= ' '.$collection->getPartialCollar();
            }
            if($collection->getBondedPlanchets() != 'None'){
                $errorDisplay .= ' '.$collection->getBondedPlanchets();
            }
            if($collection->getMatedPair() != 'None'){
                $errorDisplay .= ' '.$collection->getMatedPair();
            }
            if($collection->getDoubleDenom() != 'None'){
                $errorDisplay .= ' '.$collection->getDoubleDenom();
            }
            if($collection->getIndentPercent() != 'None'){
                $errorDisplay .= ' '.$collection->getIndentPercent();
            }
            if($collection->getClippedPlanchet() != 'None'){
                $errorDisplay .= ' '.$collection->getClippedPlanchet();
            }
            if($collection->getMule() != 'None'){
                $errorDisplay .= ' '.$collection->getMule();
            }
            if($collection->getRotated() != 'None'){
                $errorDisplay .= ' '.$collection->getRotated();
            }
            if($collection->getDieCrack() != 'None'){
                $errorDisplay .= ' '.$collection->getDieCrack();
            }
            if($collection->getMachineDouble() != 'None'){
                $errorDisplay .= ' '.$collection->getMachineDouble();
            }
            if($collection->getBrockage() != 'None'){
                $errorDisplay .= ' '.$collection->getBrockage();
            }
            if($collection->getStrikeThru() != 'None'){
                $errorDisplay .= ' '.$collection->getStrikeThru();
            }
            if($collection->getWrongPlanchet() != 'None'){
                $errorDisplay .= ' '.$collection->getWrongPlanchet();
            }
            if($collection->getWrongMetal() != 'None'){
                $errorDisplay .= ' '.$collection->getWrongMetal();
            }
    return $errorDisplay;
        } else {
        return false;
        }
    }*/

    function getErrorForCoin($collectionID)
    {
        $collection = new Collection;
        $collection->getCollectionById($collectionID);
        $errorDisplay = "";

        if ($collection->getOffCenter() != '0') {
            $errorDisplay .= ' ' . $collection->getOffCenter();
        }
        if ($collection->getMultipleStrike() != 'None') {
            $errorDisplay .= ' ' . $collection->getMultipleStrike();
        }
        if ($collection->getBroadstrike() != 'None') {
            $errorDisplay .= ' ' . $collection->getBroadstrike();
        }
        if ($collection->getPartialCollar() != 'None') {
            $errorDisplay .= ' ' . $collection->getPartialCollar();
        }
        if ($collection->getBondedPlanchets() != 'None') {
            $errorDisplay .= ' ' . $collection->getBondedPlanchets();
        }
        if ($collection->getMatedPair() != 'None') {
            $errorDisplay .= ' ' . $collection->getMatedPair();
        }
        if ($collection->getDoubleDenom() != 'None') {
            $errorDisplay .= ' ' . $collection->getDoubleDenom();
        }
        if ($collection->getIndentPercent() != 'None') {
            $errorDisplay .= ' ' . $collection->getIndentPercent();
        }
        if ($collection->getClippedPlanchet() != 'None') {
            $errorDisplay .= ' ' . $collection->getClippedPlanchet();
        }
        if ($collection->getMule() != 'None') {
            $errorDisplay .= ' ' . $collection->getMule();
        }
        if ($collection->getRotated() != 'None') {
            $errorDisplay .= ' ' . $collection->getRotated();
        }
        if ($collection->getDieCrack() != 'None') {
            $errorDisplay .= ' ' . $collection->getDieCrack();
        }
        if ($collection->getMachineDouble() != 'None') {
            $errorDisplay .= ' ' . $collection->getMachineDouble();
        }
        if ($collection->getBrockage() != 'None') {
            $errorDisplay .= ' ' . $collection->getBrockage();
        }
        if ($collection->getStrikeThru() != 'None') {
            $errorDisplay .= ' ' . $collection->getStrikeThru();
        }
        if ($collection->getWrongPlanchet() != 'None') {
            $errorDisplay .= ' ' . $collection->getWrongPlanchet();
        }
        if ($collection->getWrongMetal() != 'None') {
            $errorDisplay .= ' ' . $collection->getWrongMetal();
        }
        if ($errorDisplay !== 'None' || $errorDisplay !== '0') {
            return '';
        } else {
            return $errorDisplay;
        }

    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Set errors

    public function setOffCenter($collectionID, $userID, $offCenter)
    {
        mysql_query("UPDATE collection SET offCenter = '$offCenter' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function setMultipleStrike($collectionID, $userID, $multipleStrike, $secondStrike)
    {
        mysql_query("UPDATE collection SET multipleStrike = '$multipleStrike', secondStrike = '$secondStrike' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function setBroadstrike($collectionID, $userID, $broadstrike)
    {
        mysql_query("UPDATE collection SET broadstrike = '$broadstrike' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function setPartialCollar($collectionID, $userID, $partialCollar)
    {
        mysql_query("UPDATE collection SET partialCollar = '$partialCollar' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function setBondedPlanchets($collectionID, $userID, $bondedPlanchets)
    {
        mysql_query("UPDATE collection SET bondedPlanchets = '$bondedPlanchets' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function setMatedPair($collectionID, $userID, $matedPair)
    {
        mysql_query("UPDATE collection SET matedPair = '$matedPair' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function setDoubleDenom($collectionID, $userID, $doubleDenom)
    {
        mysql_query("UPDATE collection SET doubleDenom = '$doubleDenom' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function setIndentPercent($collectionID, $userID, $indentPercent)
    {
        mysql_query("UPDATE collection SET indentPercent = '$indentPercent' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function setClippedPlanchet($collectionID, $userID, $clippedPlanchet)
    {
        mysql_query("UPDATE collection SET clippedPlanchet = '$clippedPlanchet' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function setMule($collectionID, $userID, $mule)
    {
        mysql_query("UPDATE collection SET mule = '$mule' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function setRotated($collectionID, $userID, $rotated)
    {
        mysql_query("UPDATE collection SET rotated = '$rotated' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function setDieCrack($collectionID, $userID, $dieCrack)
    {
        mysql_query("UPDATE collection SET dieCrack = '$dieCrack' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function setMachineDouble($collectionID, $userID, $machineDouble)
    {
        mysql_query("UPDATE collection SET machineDouble = '$machineDouble' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function setBrockage($collectionID, $userID, $brockage)
    {
        mysql_query("UPDATE collection SET brockage = '$brockage' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function setStrikeThru($collectionID, $userID, $strikeThru)
    {
        mysql_query("UPDATE collection SET strikeThru = '$strikeThru' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function setWrongPlanchet($collectionID, $userID, $wrongPlanchet)
    {
        mysql_query("UPDATE collection SET wrongPlanchet = '$wrongPlanchet' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function setWrongMetal($collectionID, $userID, $wrongMetal)
    {
        mysql_query("UPDATE collection SET wrongMetal = '$wrongMetal' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function setBlisters($collectionID, $userID, $blisters)
    {
        mysql_query("UPDATE collection SET blisters = '$blisters' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function setPlating($collectionID, $userID, $plating)
    {
        mysql_query("UPDATE collection SET plating = '$plating' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }


//////////////////All
    function getAllErrorById($userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE errorType != 'None' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    function getErrorByNameByID($errorType, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE errorType = '$errorType' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    public function getAllErrorSumById($userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE errorType != 'None' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getAllErrorSumByTypeById($userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE errorType = '$errorType' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    function getErrorTypeImgByID($userID, $errorType)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE errorType = '" . str_replace('_', ' ', $errorType) . "' AND userID = '$userID'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            while ($row = mysql_fetch_array($countAll)) {
                $errorType = str_replace(' ', '_', $row['errorType']);
                return $errorType . '.jpg';
            }

        }
    }

//Category
    function getErrorTypeCategoryCount($errorType, $coinCategory, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND errorType != 'None' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    function getErrorTypeByCategory($errorType, $coinCategory, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND errorType = '$errorType' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    public function getErrorTypeSumByCategory($errorType, $coinCategory, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND errorType = '$errorType' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getErrorTypeCoinAllSumByCategory($coinCategory, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND errorType != 'None' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

//Type
    function getErrorTypeTypeCount($errorType, $coinType, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND errorType != 'None' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    function getErrorTypeByType($errorType, $coinType, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND errorType = '$errorType' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    public function getErrorTypeSumByType($errorType, $coinType, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND errorType = '$errorType' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getErrorTypeCoinAllSumByType($errorType, $coinType, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND errorType != 'None' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

//Coin
    function getErrorTypeCoinCount($coinID, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection
            WHERE collection.userID = :userID AND coinID = :coinID
            AND errorCoin = '1' 
        ");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$countAll = mysql_query("SELECT * FROM collection WHERE coinID = '" . $coinID . "' AND errorCoin = '1' AND userID = '$userID'") or die(mysql_error());
    }

    function getErrorByTypeCoinCount($coinID, $userID, $error)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID = '" . $coinID . "' AND $error != 'None' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }


    public function getCoinErrorTypeCount($userID, $coinID, $error)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID = '" . $coinID . "' AND {$error} != 'None' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    public function getCoinErrorTypeSum($userID, $coinID, $error)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection  WHERE coinID = '" . $coinID . "' AND {$error} != 'None' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

//////////////////////////


    function getErrorTypeByCoin($errorType, $coinType, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID = '" . $coinID . "' AND errorType = '$errorType' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    public function getErrorTypeSumByCoin($errorType, $coinID, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinID = '" . $coinID . "' AND errorType = '$errorType' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getErrorTypeCoinAllSumByCoin($errorType, $coinID, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinID = '" . $coinID . "' AND errorType != 'None' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    function getErrorTypeImgByCoin($coinID, $userID, $errorType)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID = '" . $coinID . "' AND errorType = '$errorType' AND userID = '$userID'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            while ($row = mysql_fetch_array($countAll)) {
                $coinVersion = str_replace(' ', '_', $row['coinVersion']);
                return $coinVersion . '.jpg';
            }

        }
    }



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////Problem coins

//All
    function getProblemCount($userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND problem != 'None' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    function getProblemByID($problem, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND problem = '$problem' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    public function getProblemCoinSumById($userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE problem != 'None' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

//Category
    function getProblemCategoryCount($coinCategory, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND problem != 'None' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    function getProblemByCategory($problem, $coinCategory, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND problem = '$problem' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    public function getProblemCoinSumByCategory($coinCategory, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

//Type
    function getProblemTypeCount($coinType, $userID)
    {
        $sql = "
          SELECT COUNT(*) 
          FROM collection
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID 
          AND coins.coinType = :coinType
          AND collection.problem != 'None'
          ";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$countAll = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND problem != 'None' AND userID = '$userID'") or die(mysql_error());
    }

    function getProblemByType($problem, $coinType, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND problem = '$problem' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    public function getProblemCoinSumByType($coinType, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

//Coin
    function getProblemCoinCount($coinID, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID = '" . $coinID . "' AND problem != 'None' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    function getProblemByCoin($problem, $coinType, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID = '" . $coinID . "' AND problem = '$problem' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    public function getProblemCoinSumByCoin($coinID, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinID = '" . $coinID . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    function getProblemImgByCoin($coinID, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID = '" . $coinID . "' AND problem = '$problem' AND userID = '$userID'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            while ($row = mysql_fetch_array($countAll)) {
                $coinVersion = str_replace(' ', '_', $row['coinVersion']);
                return $coinVersion . '.jpg';
            }

        }
    }





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//BIE coins
    /**
     * BIE Unique Count
     * @param $userID
     * @return mixed
     */
    public function getBIEUniqueCount($userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(DISTINCT coinID) FROM collection
            WHERE collection.userID = :userID AND coinID IN(\" . ".implode(',', $this->bieCoins)." . \")
        ");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinID IN(" . implode(',', $this->bieCoins) . ") AND userID = '$userID'");
    }

    public function getBIECount($userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection
            WHERE collection.userID = :userID AND coinID IN(\" . ".implode(',', $this->bieCoins)." . \")
        ");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinID IN(" . implode(',', $this->bieCoins) . ") AND userID = '$userID'");
    }

    public function getBIESum($userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection  WHERE coinID IN(" . implode(',', $this->bieCoins) . ") AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getBIETypeCount($userID, $bie)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection
            WHERE collection.userID = :userID 
             AND bie = :bie
            AND coinID IN(\" . ".implode(',', $this->bieCoins)." . \")
        ");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':bie', $bie, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinID IN(" . implode(',', $this->bieCoins) . ") AND userID = '$userID' AND bie = '$bie'");
    }

    public function getBIEByCoinIDCount($userID, $coinID, $bie)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection
            WHERE collection.userID = :userID 
            AND bie = :bie
            AND coinID  = :coinID
        ");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->bindParam(':bie', $bie, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        $sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND bie = '$bie' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }


}//END CLASS
