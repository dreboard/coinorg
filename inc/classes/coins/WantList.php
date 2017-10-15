<?php
//getReportTypeCount
//getTypeCertificationCountById
//blank

class WantList
{

    protected $DB_host = "localhost";
    protected $DB_user = "root";
    protected $DB_pass = "";
    protected $DB_name = "coins";

    public function __construct()
    {
        $this->db = new PDO("mysql:host={$this->DB_host};dbname={$this->DB_name}", $this->DB_user, $this->DB_pass);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getWantedById($wantlistID)
    {
        $stmt = $this->db->prepare("
            SELECT * FROM wantlist WHERE wantlistID = :$wantlistID
            LIMIT 1
            ");
        $stmt->execute(array(':wantlistID' => $wantlistID));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->userID = $row['userID'];
        $this->coinID = $row['coinID'];
        $this->coinType = $row['coinType'];
        $this->coinCategory = $row['coinCategory'];
        $this->listDate = $row['listDate'];
        $this->proService = $row['proService'];
        $this->coinGrade = $row['coinGrade'];
        $this->additional = $row['additional'];
        $this->coinNote = $row['coinNote'];
        $this->additional = $row['additional'];
        $this->errorType = $row['errorType'];
        $this->enterDate = $row['enterDate'];
        $this->firstday = $row['firstday'];
        $this->holderCode = $row['holderCode'];
        $this->wantlistID = $row['wantlistID'];
        $this->strike = $row['strike'];
        $this->designation = $row['designation'];
        return true;
    }


    public function getDesignation()
    {
        return strip_tags($this->designation);
    }

    public function getCoinCategory()
    {
        return strip_tags($this->coinCategory);
    }

    public function getCoinType()
    {
        return strip_tags($this->coinType);
    }

    public function getCoinGrade()
    {
        return strip_tags($this->coinGrade);
    }

    public function getGrader()
    {
        return strip_tags($this->proService);
    }

    public function getCoinID()
    {
        return strip_tags($this->coinID);
    }

    public function getAdditional()
    {
        return strip_tags($this->additional);
    }

    public function getCoinNote()
    {
        return $this->coinNote;
    }

    public function getEnterDate()
    {
        return $this->listDate;
    }

    public function getCoinStrike()
    {
        return strip_tags($this->strike);
    }

    function getWantedCoinID($coinID)
    {
        $myQuery = mysql_query("SELECT * FROM collection WHERE coinID='$coinID'") or die(mysql_error());
        while ($row = mysql_fetch_array($myQuery)) {
            $coinID = $row['coinID'];
        }
        return $coinID;
    }

    function checkWantedInCollection($coinID, $userID)
    {
        $myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '$coinID'") or die(mysql_error());
        $collectCount = mysql_num_rows($myQuery);
        return $collectCount;
    }

    function deleteWantedCoin($wantlistID)
    {
        @mysql_query("DELETE FROM wantlist WHERE wantlistID = '$wantlistID'") or die(mysql_error());
        return;
    }


    //////////////By coinCategory count
    //Get type collection
    function getCoinCategoryCollected($userID, $value)
    {
        /*$sql = mysql_query("SELECT DISTINCT coinType FROM collection WHERE coinCategory = '" . $value . "' AND userID = '$userID'") or die(mysql_error());
        $getCategoryRequest = mysql_num_rows($sql);
        return $getCategoryRequest;*/
    }

    public function getUngradedCountById($userID, $coinCategory)
    {
        /*$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '$coinCategory' AND coinGrade = 'No Grade'") or die(mysql_error());
        $collectCount = mysql_num_rows($myQuery);
        return $collectCount;*/
    }

    public function getTypeCertificationCountById($userID, $coinCategory)
    {
        /*$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '$coinCategory' AND proService != 'None'") or die(mysql_error());
        $collectCount = mysql_num_rows($myQuery);
        return $collectCount;*/
    }

    public function getTypeProofCountById($userID, $coinCategory)
    {
        /*$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '$coinCategory' AND strike = 'Proof'") or die(mysql_error());
        $collectCount = mysql_num_rows($myQuery);
        return $collectCount;*/
    }

    public function getTypeErrorCountById($userID, $coinCategory)
    {
        /*$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '$coinCategory' AND errorType != 'None'") or die(mysql_error());
        $collectCount = mysql_num_rows($myQuery);
        return $collectCount;*/
    }

    public function getTypeFirstDayCountById($userID, $coinCategory)
    {
        /*$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '$coinCategory' AND firstday = '1'") or die(mysql_error());
        $collectCount = mysql_num_rows($myQuery);
        return $collectCount;*/
        return 1;
    }


//By denomination

    function getWantedCoinCountByCoinCategory($coinCategory, $userID)
    {
        /*$sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '$coinCategory' AND userID = '$userID'") or die(mysql_error());
        $getTypeRequest = mysql_num_rows($sql);
        return $getTypeRequest;*/
        return 1;
    }

    function getWantedCoinCountByCoinType($coinType, $userID)
    {
        /*$sql = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND userID = '$userID'") or die(mysql_error());
        $getTypeRequest = mysql_num_rows($sql);
        return $getTypeRequest;*/
        return 1;
    }

    function getWantedCoinCountByError($error, $coinType, $userID)
    {
        /*$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '$coinType'  AND errorType = '$error' AND proService = 'None'") or die(mysql_error());
        $collectCount = mysql_num_rows($myQuery);
        return $collectCount;*/
        return 1;
    }

    function getWantedCoinCountByProError($error, $coinType, $userID, $proService)
    {
        /*$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '$coinType'  AND errorType = '$error' AND proService = 'proService'") or die(mysql_error());
        $collectCount = mysql_num_rows($myQuery);
        return $collectCount;*/
        return 1;
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Want coin
    function getWantedCoin($coinID, $userID)
    {
        /*$myQuery = mysql_query("SELECT * FROM wantlist WHERE coinID='$coinID' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($myQuery);*/
        return 1;
    }


}//END CLASS
