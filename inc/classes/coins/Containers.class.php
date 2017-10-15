<?php
//getRollOpenList
//getCollectionDenomCount
//getOtherOpenList
class Containers
{

    public function __construct()
    {
        $this->db = DBConnect::getInstance();
    }

    public function getContainerById($containerID)
    {
        $userID = $_SESSION['userID'];
        $stmt = $this->db->dbhc->prepare("
            SELECT * FROM containers     
            WHERE containerID = :containerID AND userID = :userID
            LIMIT 1
            ");
        $stmt->execute(array(':containerID' => $containerID, ':userID' => $userID));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->userID = $row['userID'];
        $this->containerID = $row['containerID'];
        $this->containerTypeID = $row['containerTypeID'];
        $this->coinCategory = $row['coinCategory'];
        $this->containerDate = $row['containerDate'];
        $this->coinType = $row['coinType'];
        $this->containerType = $row['containerType'];
        $this->containerDesc = $row['containerDesc'];
        $this->containerName = $row['containerName'];
        $this->full = $row['full'];
        $this->coinNote = $row['coinNote'];
        $this->purchaseFrom = $row['purchaseFrom'];
        $this->purchaseDate = $row['purchaseDate'];
        $this->purchasePrice = $row['purchasePrice'];
        $this->ebaySellerID = $row['ebaySellerID'];
        $this->auctionNumber = $row['auctionNumber'];
        $this->shopName = $row['shopName'];
        $this->shopUrl = $row['shopUrl'];
        $this->showName = $row['showName'];
        $this->showCity = $row['showCity'];
        return true;
    }

    public function getContainerTypeID()
    {
        return strip_tags($this->containerTypeID);
    }

    public function getCoinCategory()
    {
        return strip_tags($this->coinCategory);
    }

    public function getCoinType()
    {
        return strip_tags($this->coinType);
    }

    public function getContainerDate()
    {
        return strip_tags($this->containerDate);
    }

    public function getContainerName()
    {
        return $this->containerName;
    }

    public function getContainerType()
    {
        return strip_tags($this->containerType);
    }

    public function getContainerDesc()
    {
        return strip_tags($this->containerDesc);
    }

    public function getCoinCollectionUser()
    {
        return strip_tags($this->userID);
    }

    public function getFull()
    {
        return strip_tags($this->full);
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

    public function getCoinNote()
    {
        return strip_tags($this->coinNote);
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Type Counts


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Type Counts
    function totalContainerTypeIDByID($userID, $containerTypeID)
    {
        $sql = mysql_query("SELECT * FROM containers WHERE containerTypeID = '$containerTypeID' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function totalContainerTypeByID($userID, $containerType)
    {
        $sql = mysql_query("SELECT * FROM containers WHERE containerType = '$containerType' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//User AREA

    function totalContainersByUser($userID)
    {
        $sql = mysql_query("SELECT * FROM containers WHERE userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getContainersSum($userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM containers WHERE  userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $containerPrice = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $containerPrice;
    }

    function getCertContainerCount($userID, $containerType)
    {
        $sql = mysql_query("SELECT * FROM containers WHERE userID = '$userID' AND containerType = '$containerType'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function getRollBinCategoryCount($userID, $containerType, $coinCategory)
    {
        $sql = mysql_query("SELECT * FROM containers WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID' AND containerType = '$containerType'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getRollBinCategorySum($userID, $containerType, $coinCategory)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM containers WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID' AND containerType = '$containerType'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $containerPrice = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $containerPrice;
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//COLLECTION COUNTS

    function availableCoinsRequest($containerID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE proservice != 'None' AND collectrollsID = '0' AND collectfolderID = '0' AND containerID = '0' AND collectsetID = '0' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    function openSlabCoinsRequest($containerID, $userID)
    {
        $this->getContainerById($containerID);
        return $this->getFull() - $this->getSlabBoxCount($containerID, $userID);
    }

    function getCollectionContainerItemCount($containerID, $userID)
    {
        $this->getContainerById($containerID);
        switch ($this->getContainerType()) {
            case 'Slabbed Box':
                $itemTotal = $this->getSlabBoxCount($containerID, $userID) . ' Coins';
                break;
            case 'Roll Tray':
            case 'Roll Box':
            case 'Roll Bin':
            case 'Mint Roll Box':
                $itemTotal = $this->getBinCount($containerID, $userID) . ' Rolls';
                break;
            case 'Set Box':
                $itemTotal = $this->getSetCount($containerID, $userID) . ' Sets';
                break;
            case 'Other':
                $itemTotal = $this->getBinCount($containerID, $userID) . ' Coins';
                break;
        }
        return $itemTotal;
    }


    function getCollectionContainerCount($containerID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE containerID = '$containerID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getCollectionContainerSum($containerID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE containerID = '$containerID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//COIN COUNTS


    function getCertCount($containerID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE containerID = '$containerID' AND proService != 'None'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function getCollectionDenomCount($containerID, $denomination)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE denomination = '" . $denomination . "' AND containerID = '$containerID'") or die(mysql_error());
        if (mysql_num_rows($sql) == '0') {
            $nums = '0';
        } else {
            $nums = '<h3 style="color:#228b22">' . mysql_num_rows($sql) . '</h3>';
        }
        return $nums;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ROLL COUNTS


    function getRollCertCount($containerID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE containerID = '$containerID' AND proService != 'None'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function getRollCount($containerID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE containerID = '$containerID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// type area
    /*public function getOpenList($userID){
        $Encryption = new Encryption();
        $html = '';
            $sql = mysql_query("SELECT * FROM containers WHERE userID = '$userID'") or die(mysql_error());
          while($row = mysql_fetch_array($sql))
                  {
                    $containerID = $row['containerID'];
                    $this->getContainerById($containerID);
                    $html .= '<option value="'.$Encryption->encode($row['containerID']).'">'.$this->getContainerName().'</option>';
                  }
          return $html;
    }
    */

    public function getOpenList($userID, $collectrollsID)
    {
        $Encryption = new Encryption();
        $collectionRolls = new CollectionRolls();
        $collectionRolls->getCollectionRollById($collectrollsID);
        $html = '<form action="" method="post" class="compactForm" id="containerListForm">';
        $html .= '<select name="Collection" id="Collection">';
        $html .= '<option selected="selected" value="">Select</option>';
        $sql = mysql_query("SELECT * FROM containers WHERE userID = '$userID' AND coinCategory = '" . $collectionRolls->getCoinCategory() . "' ") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $this->getContainerById(intval($row['containerID']));
            if ($this->getRollOpenList($userID, intval($row['containerID'])) == '0') {
                $html .= '';
            } else {
                $html .= '<option value="' . $Encryption->encode(intval($row['containerID'])) . '">' . $this->getContainerName() . '</option>';
            }
        }
        $html .= '</select>';
        $html .= '<input name="ID" type="hidden" value="' . $Encryption->encode($collectrollsID) . '" />';
        $html .= '<input id="containerListBtn" name="containerListBtn" type="submit" value="Add" onclick="return confirm(\'Add to This Container?\')" />';
        $html .= '</form> &nbsp;<a href="coinContainerNew.php">Save New Container</a>';
        return $html;
    }

    public function getRollOpenList($userID, $containerID)
    {
        $this->getContainerById($containerID);
        if ($this->getRollCount($containerID, $userID) >= $this->getFull()) {
            return '0';
        } else {
            return '1';
        }
    }

    public function checkForFullRolls($containerID)
    {
        $Encryption = new Encryption();
        $html = '';
        $sql = mysql_query("SELECT * FROM containers WHERE (containerType = 'Roll Bin' OR containerType = 'Roll Tray' OR containerType = 'Other') AND coinCategory = '$coinCategory' AND userID = '$userID' ORDER BY containerType") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $containerID = $row['containerID'];
            $this->getContainerById($containerID);
            $html .= '<option value="' . $Encryption->encode($row['containerID']) . '">' . $this->getContainerName() . '</option>';
        }
        return $html;
    }

//slabs
    public function getSlabOpenList($userID)
    {
        $Encryption = new Encryption();
        $html = '';
        $sql = mysql_query("SELECT * FROM containers WHERE (containerType = 'Slabbed Box' OR containerType = 'Other') AND userID = '$userID' ORDER BY containerType") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $containerID = $row['containerID'];
            $this->getContainerById($containerID);
            $html .= '<option value="' . $Encryption->encode($row['containerID']) . '">' . $this->getContainerName() . '</option>';
        }
        return $html;
    }


////
//SETS

    function availableSetsRequest($containerID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collectset WHERE setType = 'Proof' AND collectrollsID = '0' AND collectfolderID = '0' AND containerID = '0' AND collectsetID = '0' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public function getSetOpenList($userID, $collectsetID)
    {
        $Encryption = new Encryption();
        $CollectionSet = new CollectionSet();
        $CollectionSet->getCollectionSetById($collectsetID);
        $html = '';
        $sql = mysql_query("SELECT * FROM containers WHERE (containerType = 'Set Box' OR containerType = 'Other') AND userID = '$userID' ") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $this->getContainerById(intval($row['containerID']));
            if ($this->getSetOpen($userID, intval($row['containerID'])) == '0') {
            } else {
                $html .= '<option value="' . $Encryption->encode(intval($row['containerID'])) . '">' . $this->getContainerName() . '</option>';
            }
        }
        return $html;
    }

    public function getSetsCount($containerID, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(setCount), 0) FROM collectset WHERE containerID = '$containerID' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(setCount), 0)'];
        }
        return $coinSum;
    }

    public function getSetOpen($userID, $containerID)
    {
        $this->getContainerById($containerID);
        if ($this->getSetsCount($containerID, $userID) >= $this->getFull()) {
            return '0';
        } else {
            return '1';
        }
    }

//switch mint sets
    function otherProofSetsList($oldID, $userID, $containerID)
    {
        $Encryption = new Encryption();
        $CollectionSet = new CollectionSet();
        $sql = mysql_query("SELECT * FROM collectset WHERE setType = 'Proof' AND containerID = '0' AND userID = '$userID' ORDER BY coinYear DESC");
        $coinCount = mysql_num_rows($sql);
        $html = '( ' . $coinCount . ' ) ';
        if (mysql_num_rows($sql) == 0) {
            $html .= 'None In Collection';
        } else {
            $html .= '<form method="post" action="" class="compactForm">';
            $html .= '<select name="newID"><option value="" class="coinList" selected="selected">Switch Set</option>';
            while ($row = mysql_fetch_array($sql)) {
                $CollectionSet->getCollectionSetById(intval($row['collectsetID']));
                $html .= '<option value="' . $Encryption->encode(intval($row['collectsetID'])) . '" class="coinList">' . $CollectionSet->getSetNickname() . '</option>';
            }
            $html .= '</select>';
            $html .= '<input name="oldID" type="hidden" value="' . $Encryption->encode($oldID) . '"  />';
            $html .= '<input name="container" type="hidden" value="' . $Encryption->encode($containerID) . '" />';
            $html .= '<input name="changeCoinBtn" class="changeBtns" id="changeBtn" type="submit" value="Change" />';
            $html .= '</form>&nbsp;';
        }
        return $html;
    }

    public function getSetTypeOpenCount($setType, $userID)
    {
        $sql = mysql_query("SELECT * FROM collectset WHERE setType = '$setType' AND userID = '$userID' AND containerID = '0' ") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function otherMintSetsList($oldID, $userID, $containerID)
    {
        $Encryption = new Encryption();
        $CollectionSet = new CollectionSet();
        $sql = mysql_query("SELECT * FROM collectset WHERE containerID = '0' AND userID = '$userID'");
        $coinCount = mysql_num_rows($sql);
        $html = '( ' . $coinCount . ' ) ';
        if (mysql_num_rows($sql) == 0) {
            $html .= 'None In Collection';
        } else {
            $html .= '<form method="post" action="" class="compactForm">';
            $html .= '<select name="newID"><option value="" class="coinList" selected="selected">Switch Set</option>';
            while ($row = mysql_fetch_array($sql)) {
                $CollectionSet->getCollectionSetById(intval($row['collectsetID']));
                $html .= '<option value="' . $Encryption->encode(intval($row['collectsetID'])) . '" class="coinList">' . $CollectionSet->getSetNickname() . '</option>';
            }
            $html .= '</select>';
            $html .= '<input name="oldID" type="hidden" value="' . $Encryption->encode($oldID) . '"  />';
            $html .= '<input name="container" type="hidden" value="' . $Encryption->encode($containerID) . '" />';
            $html .= '<input name="changeCoinBtn" class="changeBtns" id="changeBtn" type="submit" value="Change" />';
            $html .= '</form>&nbsp;';
        }
        return $html;
    }
////
//Other
    public function getOtherOpenList($userID)
    {
        $Encryption = new Encryption();
        $sql = mysql_query("SELECT * FROM containers WHERE containerType = 'Other' AND userID = '$userID' ") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $this->getContainerById(intval($row['containerID']));
            $html = '<option value="' . $Encryption->encode(intval($row['containerID'])) . '">' . $this->getContainerName() . '</option>';
        }
        return $html;
    }

    public function getSetsOpenList($userID)
    {
        $Encryption = new Encryption();
        $sql = mysql_query("SELECT * FROM containers WHERE containerType = 'Set Box' AND userID = '$userID' ") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $this->getContainerById(intval($row['containerID']));
            $html = '<option value="' . $Encryption->encode(intval($row['containerID'])) . '">' . $this->getContainerName() . '</option>';
        }
        return $html;
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// rolls area
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//INSERTING AND MANAGING ROLLS

//Basic roll bins and trays
    public function checkClosedBinStatus($containerID, $userID)
    {
        $this->getContainerById($containerID);
        $ContainerType = new ContainerType();
        $ContainerType->getContainerTypeById($this->getContainerTypeID());
        $countRoll = mysql_query("SELECT * FROM collectrolls WHERE containerID = '" . $containerID . "' AND userID = '$userID'") or die(mysql_error());
        if (mysql_num_rows($countRoll) >= $ContainerType->getRollCount()) {
            $fullRoll = '0';
        } else {
            $fullRoll = '1';
        }
        return $fullRoll;
    }

    public function getSameRollOptionLimitRequest($containerID, $userID)
    {
        $this->getContainerById($containerID);
        return $this->getFull() - $this->getBinCount($containerID, $userID);
    }

    public function getBinCount($containerID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE containerID = '" . $containerID . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public function availableRollIDCoinRequest($coinCategory, $userID)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE coinCategory = '" . $coinCategory . "' AND rollType != 'Mint' AND containerID = '0' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

//COIN TYPE ROLLS
    function otherTrayTypeCoinsList($oldID, $coinCategory, $userID, $containerID)
    {
        $Encryption = new Encryption();
        $collectionRolls = new CollectionRolls();
        $sql = mysql_query("SELECT * FROM collectrolls WHERE coinCategory = '$coinCategory' AND rollType != 'Mint' AND containerID = '0' AND userID = '$userID'");
        $coinCount = mysql_num_rows($sql);
        $html = '( ' . $coinCount . ' ) ';
        if (mysql_num_rows($sql) == 0) {
            $html .= 'None In Collection';
        } else {
            $html .= '<form method="post" action="" class="compactForm">';
            $html .= '<select name="newID"><option value="" class="coinList" selected="selected">Switch Roll</option>';
            while ($row = mysql_fetch_array($sql)) {
                $collectrollsID = intval($row['collectrollsID']);
                $html .= '<option value="' . $Encryption->encode(intval($row['collectrollsID'])) . '" class="coinList">' . $row['rollNickname'] . ' ' . $row['rollType'] . '</option>';
            }
            $html .= '</select>';
            $html .= '<input name="oldID" type="hidden" value="' . $Encryption->encode($oldID) . '"  />';
            $html .= '<input name="theContainer" type="hidden" value="' . $Encryption->encode($containerID) . '" />';
            $html .= '<input name="changeCoinBtn" class="changeBtns" id="changeBtn" type="submit" value="Change" />';
            $html .= '</form>&nbsp;';
            $html .= '<form method="post" action="" class="compactForm">';
            $html .= '<input name="noID" type="hidden" value="' . $Encryption->encode($oldID) . '"  />';
            $html .= '<input name="theContainer" type="hidden" value="' . $Encryption->encode($containerID) . '" />';
            $html .= '<input name="noRollBtn" class="noRollBtns" id="changeBtn" type="submit" value="X" onclick="return confirm(\'Remove This Roll From Tray?\')" />';
            $html .= '</form>';
        }
        return $html;
    }

    function getOldTrayCollectionID($collectrollsID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE collectrollsID = '$collectrollsID' AND userID = '$userID'");
        $row = mysql_fetch_array($sql);
        return $row['collectrollsID'];
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Generate Links
    function getContainerTypeLink($containerID, $containerType)
    {
        $Encryption = new Encryption();


        switch (str_replace('_', ' ', $containerType)) {
            case 'Slabbed Box':
                header("location: coinContainerSlab.php?ID=" . $Encryption->encode($containerID) . "");
                break;
            case 'Roll Tray':
            case 'Roll Box':
                header("location: coinContainerTray.php?ID=" . $Encryption->encode($containerID) . "");
                break;
            case 'Roll Bin':
                header("location: coinContainerBin.php?ID=" . $Encryption->encode($containerID) . "");
                break;
            case 'Mint Roll Box':
                header("location: coinContainerMint.php?ID=" . $Encryption->encode($containerID) . "");
                break;
            case 'Set Box':
                header("location: coinContainerSet.php?ID=" . $Encryption->encode($containerID) . "");
                break;
            case 'Other':
                header("location: coinContainerList.php?ID=" . $Encryption->encode($containerID) . "");
                break;
        }
    }

    function getContainerTypeLinkByID($containerID)
    {
        $Encryption = new Encryption();
        $this->getContainerById($containerID);
        switch ($this->getContainerType()) {
            case 'Slabbed Box':
                $typeLink = '<a href="coinContainerSlab.php?ID=' . $Encryption->encode($containerID) . '">' . $this->getContainerName() . '</a>';
                break;
            case 'Roll Tray':
            case 'Roll Box':
                $typeLink = '<a href="coinContainerTray.php?ID=' . $Encryption->encode($containerID) . '">' . $this->getContainerName() . '</a>';
                break;
            case 'Roll Bin':
                $typeLink = '<a href="coinContainerBin.php?ID=' . $Encryption->encode($containerID) . '">' . $this->getContainerName() . '</a>';
                break;
            case 'Mint Roll Box':
                $typeLink = '<a href="coinContainerMint.php?ID=' . $Encryption->encode($containerID) . '">' . $this->getContainerName() . '</a>';
                break;
            case 'Set Box':
                $typeLink = '<a href="coinContainerSet.php?ID=' . $Encryption->encode($containerID) . '">' . $this->getContainerName() . '</a>';
                break;
            case 'Other':
                $typeLink = '<a href="coinContainerList.php?ID=' . $Encryption->encode($containerID) . '">' . $this->getContainerName() . '</a>';
                break;
        }
        return $typeLink;
    }

    function getContainerTypeURLByID($containerID)
    {
        $Encryption = new Encryption();
        $this->getContainerById($containerID);
        $typeLink = '';
        switch ($this->getContainerType()) {
            case 'Slabbed Box':
                $typeLink = 'coinContainerSlab.php?ID=' . $Encryption->encode($containerID);
                break;
            case 'Roll Tray':
            case 'Roll Box':
                $typeLink = 'coinContainerTray.php?ID=' . $Encryption->encode($containerID);
                break;
            case 'Roll Bin':
                $typeLink = 'coinContainerBin.php?ID=' . $Encryption->encode($containerID);
                break;
            case 'Mint Roll Box':
                $typeLink = 'coinContainerMint.php?ID=' . $Encryption->encode($containerID);
                break;
            case 'Set Box':
                $typeLink = 'coinContainerSet.php?ID=' . $Encryption->encode($containerID);
                break;
            case 'Other':
                $typeLink = 'coinContainerList.php?ID=' . $Encryption->encode($containerID);
                break;
        }
        return $typeLink;
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// slab box area
    public function getSlabBoxCount($containerID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE containerID = '" . $containerID . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }


    public function getSlabBoxList2($userID, $collectionID)
    {
        $Encryption = new Encryption();
        $collection = new Collection();
        $collection->getCollectionById($collectionID);
        $html = '<form action="" method="post" class="compactForm" id="containerListForm">';
        $html .= '<select name="Collection" id="Collection">';
        $html .= '<option selected="selected" value="">Select</option>';
        $sql = mysql_query("SELECT * FROM collection WHERE collectionID = '$collectionID' AND containerID != '0' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $this->getContainerById(intval($row['containerID']));
            if ($this->getSlabBoxOpenList($userID, intval($row['containerID'])) == '0') {
                $html .= '';
            } else {
                $html .= '<option value="' . $Encryption->encode(intval($row['containerID'])) . '">' . $this->getContainerName() . '</option>';
            }
        }
        $html .= '</select>';
        $html .= '<input name="ID" type="hidden" value="' . $Encryption->encode($collectionID) . '" />';
        $html .= '<input id="containerListBtn" name="containerListBtn" type="submit" value="Add" onclick="return confirm(\'Add to This Container?\')" />';
        $html .= '</form> &nbsp;<a href="coinContainerNew.php">Save New Container</a>';
        return $html;
    }

    public function getOtherBoxList($userID, $collectionID)
    {
        $Encryption = new Encryption();
        $collection = new Collection();
        $collection->getCollectionById($collectionID);
        $html = '<form action="" method="post" class="compactForm" id="containerBoxForm">';
        $html .= '<select name="Collection" id="Collection">';
        $html .= '<option selected="selected" value="">Select</option>';

        $stmt = $this->db->dbhc->prepare("
                SELECT * FROM containers 
                WHERE userID = :userID AND  containerType = 'Other'
            ");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();

        //$sql = mysql_query("SELECT * FROM containers WHERE containerType = 'Other' AND userID = '$userID'") or die(mysql_error());

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->getContainerById(intval($row['containerID']));
            if ($this->getSlabBoxOpenList($userID, intval($row['containerID'])) == '0') {
                $html .= '';
            } else {
                $html .= '<option value="' . $Encryption->encode(intval($row['containerID'])) . '">' . $this->getContainerName() . '</option>';
            }
        }
        $html .= '</select>';
        $html .= '<input name="ID" type="hidden" value="' . $Encryption->encode($collectionID) . '" />';
        $html .= '<input id="containerListBtn" name="containerListBtn" type="submit" value="Add" onclick="return confirm(\'Add to This Container?\')" />';
        $html .= '</form> &nbsp;<a href="coinContainerNew.php">Save New Container</a>';
        return $html;
    }

    public function getSlabBoxList($userID, $collectionID)
    {
        $Encryption = new Encryption();
        $collection = new Collection();
        $collection->getCollectionById($collectionID);
        $html = '<form action="" method="post" class="compactForm" id="containerListForm">';
        $html .= '<select name="Collection" id="Collection">';
        $html .= '<option selected="selected" value="">Select</option>';

        $stmt = $this->db->dbhc->prepare("
                SELECT * FROM containers 
                WHERE userID = :userID AND (containerType = 'Slabbed Box' OR containerType = 'Other')
            ");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();

        //$sql = mysql_query("SELECT * FROM containers WHERE  (containerType = 'Slabbed Box' OR containerType = 'Other') AND userID = '$userID'") or die(mysql_error());
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->getContainerById(intval($row['containerID']));
            if ($this->getSlabBoxOpenList($userID, intval($row['containerID'])) == '0') {
                $html .= '';
            } else {
                $html .= '<option value="' . $Encryption->encode(intval($row['containerID'])) . '">' . $this->getContainerName() . '</option>';
            }
        }
        $html .= '</select>';
        $html .= '<input name="ID" type="hidden" value="' . $Encryption->encode($collectionID) . '" />';
        $html .= '<input id="containerListBtn" name="containerListBtn" type="submit" value="Add" onclick="return confirm(\'Add to This Container?\')" />';
        $html .= '</form> &nbsp;<a href="coinContainerNew.php">Save New Container</a>';
        return $html;
    }

    public function getSlabBoxOpenList($userID, $containerID)
    {
        $this->getContainerById($containerID);
        if ($this->getRollCount($containerID, $userID) >= $this->getFull()) {
            return '0';
        } else {
            return '1';
        }
    }

//switch slabbed coins
    function otherSlabCoinsList($oldID, $userID, $containerID)
    {
        $Encryption = new Encryption();
        $collection = new collection();

        $stmt = $this->db->dbhc->prepare("
                SELECT * FROM collection 
                WHERE userID = :userID AND proService != 'None' AND containerID = '0' AND collectsetID = '0'
        ");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();

        $count = $this->db->dbhc->prepare("
                SELECT COUNT(*) FROM collection 
                WHERE userID = :userID AND proService != 'None' AND containerID = '0' AND collectsetID = '0'
        ");
        $count->execute([':userID' => $userID]);

        //$sql = mysql_query("SELECT * FROM collection WHERE proService != 'None' AND containerID = '0' AND collectsetID = '0' AND userID = '$userID'");
        $coinCount = $count->fetchColumn();

        $html = '( ' . $coinCount . ' ) ';
        if ($coinCount == 0) {
            $html .= 'None In Collection';
        } else {
            $html .= '<form method="post" action="" class="compactForm">';
            $html .= '<select name="newID"><option value="" class="coinList" selected="selected">Switch Coin</option>';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $collection->getCollectionById(intval($row['collectionID']));
                $html .= '<option value="' . $Encryption->encode(intval($row['collectionID'])) . '" class="coinList">' . $row['coinGrade'] . ' ' . $row['coinYear'] . ' ' . $row['coinType'] . '</option>';
            }
            $html .= '</select>';
            $html .= '<input name="oldID" type="hidden" value="' . $Encryption->encode($oldID) . '"  />';
            $html .= '<input name="container" type="hidden" value="' . $Encryption->encode($containerID) . '" />';
            $html .= '<input name="changeCoinBtn" class="changeBtns" id="changeBtn" type="submit" value="Change" />';
            $html .= '</form>&nbsp;';
        }
        return $html;
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// SETS AREA

    public function getOpenSetOptions($userID, $mintsetID)
    {
        $Encryption = new Encryption();
        $Mintset->getMintsetById($mintsetID);
        $ContainerType = new ContainerType();
        $ContainerType->getContainerTypeById($containerTypeID);
        $html = '';
        $sql = mysql_query("SELECT * FROM containers WHERE containerType = 'Set Box'  AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $this->getContainerById($row['containerID']);
            if ($this->getRollOpenList($userID, $row['containerID']) !== 0) {
                $html .= '<option value="' . $Encryption->encode($row['containerID']) . '">' . $this->getContainerName() . '</option>';
            }
        }
        return $html;
    }


//rolls
    public function getSetCount($containerID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE containerID = '" . $containerID . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public function getOpenOptions($userID, $coinID)
    {
        $Encryption = new Encryption();
        $coin = new Coin();
        $coin->getCoinById($coinID);
        $html = '';
        $sql = mysql_query("SELECT * FROM containers WHERE containerType IN('Roll Bin','Roll Tray') AND coinCategory = '" . $coin->getCoinCategory() . "'  AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $this->getContainerById($row['containerID']);
            if ($this->getRollOpenList($userID, $row['containerID']) !== 0) {
                $html .= '<option value="' . $Encryption->encode($row['containerID']) . '">' . $this->getContainerName() . '</option>';
            }
        }
        return $html;
    }

    public function getOpenCategoryOptions($userID, $coinCategory)
    {
        $Encryption = new Encryption();
        $html = '';
        $sql = mysql_query("SELECT * FROM containers WHERE containerType IN('Roll Bin','Roll Tray') AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "'  AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $this->getContainerById($row['containerID']);
            if ($this->getRollOpenList($userID, $row['containerID']) !== 0) {
                $html .= '<option value="' . $Encryption->encode($row['containerID']) . '">' . $this->getContainerName() . '</option>';
            }
        }
        return $html;
    }

    public function getOpenTypeOptions($userID, $coinCategory)
    {
        $Encryption = new Encryption();
        $html = '';
        $sql = mysql_query("SELECT * FROM containers WHERE containerType IN('Roll Bin','Roll Tray') AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "'  AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $this->getContainerById($row['containerID']);
            if ($this->getRollOpenList($userID, $row['containerID']) !== 0) {
                $html .= '<option value="' . $Encryption->encode($row['containerID']) . '">' . $this->getContainerName() . '</option>';
            }
        }
        return $html;
    }

}//END CLASS
?>