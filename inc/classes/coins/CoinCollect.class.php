<?php
//getOpenList

class CoinCollect
{

    public function __construct()
    {
        $this->db = DBConnect::getInstance();
    }

    public function getCoinCollectionById($coincollectID)
    {
        $userID = $_SESSION['userID'];
        $stmt = $this->db->dbhc->prepare("
            SELECT * FROM coincollect     
            WHERE coincollectID = :coincollectID AND userID = :userID
            LIMIT 1
        ");
        $stmt->execute([':coincollectID' => $coincollectID, ':userID' => $userID]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->userID = $row['userID'];
        $this->coincollectID = $row['coincollectID'];
        $this->coinCategory = $row['coinCategory'];
        $this->coincollectDate = $row['coincollectDate'];
        $this->coinType = $row['coinType'];
        $this->collectionType = $row['collectionType'];
        $this->coincollectDesc = $row['coincollectDesc'];
        $this->coincollectName = $row['coincollectName'];
        $this->coinNote = $row['coinNote'];

        return true;
    }

    public function getCoinNote()
    {
        $coinNote = $this->coinNote;
        $allow = '<table> <tr> <td> <table> <tr> <td> <thead> <tbody> <tfoot> <span> <sub> <sup> <li> <ol> <ul> <a> <br> <p> <h1> <h2> <h3> <h4> <h5> <h6> <strong> <i> <em> <b> <hr> <div> <img>';
        $this->stripInlineScripts($coinNote);
        return strip_tags($coinNote, $allow);
    }

    public function stripInlineScripts($value)
    {
        preg_replace('#(<[^>]+[\x00-\x20\"\'\/])(on|xmlns)[^>]*>#iUu', "$1>", $value);
    }

    public function getCoinCategory()
    {
        return strip_tags($this->coinCategory);
    }

    public function getCoinType()
    {
        return strip_tags($this->coinType);
    }

    public function getCoinCollectionDate()
    {
        return strip_tags($this->coincollectDate);
    }

    public function getCoinCollectionName()
    {
        return $this->coincollectName;
    }

    public function getCoinCollectionType()
    {
        return strip_tags($this->collectionType);
    }

    public function getCoinCollectionDesc()
    {
        return strip_tags($this->coincollectDesc);
    }

    public function getCoinCollectionUser()
    {
        return strip_tags($this->userID);
    }


//INDIVIDUAL COINS
    public function getCoinCollectionSetById($coincollectsetID)
    {
        $sql = mysql_query("SELECT * FROM coincollectset WHERE coincollectsetID = '$coincollectsetID'") or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->userID = $row['userID'];
        $this->thisCoinsCoincollectID = $row['coincollectID'];
        $this->thisCoinsCoinCategory = $row['coinCategory'];
        $this->enterDate = $row['enterDate'];
        $this->thisCoinsCoinType = $row['coinType'];
        $this->thisCoinsUserID = $row['userID'];
        $this->thisCoinsCollectionID = $row['collectionID'];
        $this->thisCoinsCoinID = $row['coinID'];
        $this->setregcoinsID = $row['setregcoinsID'];

        return true;
    }

    public function getThisCoinsCoinCategory()
    {
        return strip_tags($this->thisCoinsCoinCategory);
    }

    public function getThisCoinsCoinType()
    {
        return strip_tags($this->thisCoinsCoinType);
    }

    public function getThisCoinEnterDate()
    {
        return strip_tags($this->enterDate);
    }

    public function getThisCoinCoincollectID()
    {
        return $this->thisCoinsCoincollectID;
    }

    public function getThisCoinCollectionType()
    {
        return strip_tags($this->coincollectType);
    }

    public function getCoinsSetRegID()
    {
        return strip_tags($this->setregcoinsID);
    }

    public function getThisCoinCollectionUser()
    {
        return strip_tags($this->thisCoinsUserID);
    }

    public function getThisCoinsCollectionID()
    {
        return strip_tags($this->thisCoinsCollectionID);
    }

    public function getThisCoinsCoinID()
    {
        return strip_tags($this->thisCoinsCoinID);
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//User AREA

    public function totalCollectionsByUser($userID)
    {
        $sql = mysql_query("SELECT * FROM coincollect WHERE userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getCollectionSum($coincollectID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE  coincollectID = '$coincollectID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//COLLECTION COUNTS


    public function getCertCount($coincollectID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coincollectID = '$coincollectID' AND proService != 'None'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getCollectionDenomCount($coincollectID, $denomination)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE denomination = '" . $denomination . "' AND coincollectID = '$coincollectID'") or die(mysql_error());
        if (mysql_num_rows($sql) == '0') {
            $nums = '0';
        } else {
            $nums = '<h3 class="moneyGreen">' . mysql_num_rows($sql) . '</h3>';
        }
        return $nums;
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Coins area
    public function getCoinsCount($coincollectID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coincollectID = '" . intval($coincollectID) . "'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function deleteCollectionCoin($coincollectsetID)
    {
        $sql = mysql_query("DELETE FROM coincollectset WHERE coincollectsetID = '" . intval($coincollectsetID) . "'") or die(mysql_error());
        return;
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Club area
    public function getOpenList($userID)
    {
        $Encryption = new Encryption();
        $stmt = $this->db->dbhc->prepare("
            SELECT * FROM coincollect     
            WHERE userID = :userID
            LIMIT 1
        ");
        $stmt->execute([':userID' => $userID]);
        $html = '';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->getCoinCollectionById($row['coincollectID']);
            $html .= '<option value="' . $Encryption->encode($row['coincollectID']) . '">' . $this->getCoinCollectionName() . '</option>';
        }
        return $html;
    }



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Category area
    public function getCollectionCategoryCount($userID, $coinCategory)
    {
        $sql = mysql_query("SELECT * FROM coincollect WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }


    public function getCollectionCategorySum($userID, $coinCategory)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coincollectID = '$coincollectID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getCertCategoryCount($userID, $coinCategory)
    {
        $sql = mysql_query("SELECT * FROM coincollect WHERE coincollectID = '$coincollectID' AND proService != 'None'") or die(mysql_error());
        return mysql_num_rows($sql);
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Club area


}//END CLASS
?>