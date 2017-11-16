<?php
//getCoinRollProgress

class CoinCategories
{
    protected $coinSize;
    protected $denomination;
    protected $coinCategory;
    protected $rollCount;
    protected $rollVal;
    protected $bagCount;
    protected $coincategoriesID;

    protected $db;

    public function __construct()
    {
        $this->db = DBConnect::getInstance();
    }

    public function getCoinByCategory($coinCategory)
    {
        $sql = 'SELECT * FROM coincategories WHERE coinCategory = :coinCategory';
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->coincategoriesID = $row['coincategoriesID'];
        $this->coinCategory = $row['coinCategory'];
        $this->denomination = $row['denomination'];
        $this->rollCount = $row['rollCount'];
        $this->coinSize = $row['coinSize'];
        $this->rollVal = $row['rollVal'];
        $this->bagCount = $row['bagCount'];

        return $this;
    }

    public function getBagCount()
    {
        return strip_tags($this->bagCount);
    }

    public function getRollVal()
    {
        return strip_tags($this->rollVal);
    }

    public function getDenomination()
    {
        return strip_tags($this->denomination);
    }

    public function getCoinCategoryID()
    {
        return strip_tags($this->coincategoriesID);
    }

    public function getCoinCategory()
    {
        return strip_tags($this->coinCategory);
    }

    public function getRollCount()
    {
        return strip_tags($this->rollCount);
    }

    public function getCoinSize()
    {
        return strip_tags($this->coinSize);
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ROLLS FACE VALUE

    public function getCoinBySize($coinCategory, $userID, $coinSize)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND coinSize = '" . str_replace('_', ' ', $coinSize) . "' ") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getCoinCountSumByCategory($coinCategory, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(coinCount), 0) FROM collectrolls WHERE  coinCategory = '" . $coinCategory . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(coinCount), 0)'];
        }
        return $coinSum;
    }

    public function getCategoryFaceVal($userID, $coinCategory)
    {
        // Facevalue = Roll count * (Denomination * Roll count)
        $this->getCoinByCategory($coinCategory);
        $totalRollFace = $this->getCoinCountSumByCategory($coinCategory, $userID) * $this->getDenomination();
        return number_format($totalRollFace, 2);
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//finance

}

?>