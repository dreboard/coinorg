<?php
//getCoinRollProgress
// AND LEFT(coinName, 4) <= ".date('Y')."

class CoinTypes
{

    public function __construct()
    {
        $this->db = DBConnect::getInstance();
    }

    public function getCoinByType($coinType)
    {
        $sql = 'SELECT * FROM cointypes WHERE coinType = :coinType';
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->execute(array(':coinType' => $coinType));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->cointypeID = $row['cointypeID'];
        $this->mintMarks = $row['mintMarks'];
        $this->coinCategory = $row['coinCategory'];
        $this->coinType = $row['coinType'];
        $this->dates = $row['dates'];
        $this->denomination = $row['denomination'];
        $this->keyDates = $row['keyDates'];
        $this->rollCount = $row['rollCount'];
        $this->rollVal = $row['rollVal'];
        $this->bagCount = $row['bagCount'];
        $this->bagVal = $row['bagVal'];
        $this->boxCount = $row['boxCount'];
        $this->boxVal = $row['boxVal'];
        $this->ebay = $row['ebay'];
        return true;
    }

    public function getEbay()
    {
        return strip_tags($this->ebay);
    }

    public function getBagCount()
    {
        return strip_tags($this->bagCount);
    }

    public function getBagVal()
    {
        return strip_tags($this->bagVal);
    }

    public function getDenomination()
    {
        return strip_tags($this->denomination);
    }

    public function getCointypeID()
    {
        return strip_tags($this->cointypeID);
    }

    public function getCoinType()
    {
        return strip_tags($this->coinType);
    }

    public function getCoinCategory()
    {
        return strip_tags($this->coinCategory);
    }

    public function getMintMarks()
    {
        return strip_tags($this->mintMarks);
    }

    public function getKeyDate()
    {
        return strip_tags($this->keyDate);
    }

    public function getDates()
    {
        return strip_tags($this->dates);
    }

    public function getRollCount()
    {
        return strip_tags($this->rollCount);
    }

    public function getRollVal()
    {
        return strip_tags($this->rollVal);
    }

    function getMintedYearList($list)
    {
        $result = preg_replace_callback('/(\d+)-(\d+)/', function ($m) {
            return implode(',', range($m[1], $m[2]));
        }, $list);
        return $result;
    }


// put limit roll count
    public function getCoinRollTypeProgress($coinType, $userID, $coinID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID
            WHERE coins.coinType = :coinType AND  userID = :userID");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        $rollProgress = $stmt->fetchColumn();

        $this->getCoinByType($coinType);
        //$sql = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'") or die(mysql_error());
        //$rollProgress = mysql_num_rows($sql);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $coinVersion = str_replace(' ', '_', $row['coinVersion']);
            $rolls = $this->getCoinByType($coinType);
            $rollCount = $rolls->getRollCount();
        }
        return $rollCount . ' of ' . $rollProgress;
    }

    public function getCoinTypeFirstYear($coinType)
    {
        $stmt = $this->db->dbhc->prepare("SELECT * FROM coins WHERE coinType = :coinType ORDER BY coinYear ASC LIMIT 1");
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        $answered = $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM coins WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' ORDER BY coinYear ASC LIMIT 1") or die(mysql_error());
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['coinYear'];
    }

    /**
     * Coin Roll Progress By coinID
     *
     * @param string $coinType Used to get the roll count for coins
     * @param int $userID
     * @param int $coinID
     * @return string
     */
    public function getCoinRollProgress($coinType, $userID, $coinID)
    {
        $type = $this->getCoinByType($coinType);
        $this->getRollCount();

        $stmt = $this->db->dbhc->prepare("
              SELECT * FROM collection 
              INNER JOIN coins ON collection.coinID = coins.coinID 
              WHERE collection.coinID = :coinID 
              AND collection.userID = :userID 
              ORDER BY coins.coinYear ASC 
              LIMIT ".$this->getRollCount()."
        ");
        $stmt->execute([':coinID' => $coinID, ':userID' => $userID]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //$sql = mysql_query("SELECT * FROM collection WHERE coinID = '" . $coinID . "' AND userID = '$userID' LIMIT " . $this->getRollCount() . " ") or die(mysql_error());

        $count = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection 
              INNER JOIN coins ON collection.coinID = coins.coinID 
              WHERE collection.coinID = :coinID 
              AND collection.userID = :userID 
              ORDER BY coins.coinYear ASC 
              LIMIT ".$this->getRollCount()."
        ");
        $count->execute([':coinID' => $coinID, ':userID' => $userID]);

        $rollProgress = $count->fetchColumn();

        if ($stmt->fetchColumn() == 0) {
            return 'No Progress For This Coin';
        } else {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $coinVersion = str_replace(' ', '_', $row['coinVersion']);
                $rolls = $this->getCoinByType($coinType);
                $rollCount = $this->getRollCount();
                if ($rollProgress >= $rollCount) {
                    return $rollCount . ' of ' . $this->getRollCount();
                } else
                    return $rollProgress . ' of ' . $this->getRollCount();
            }
        }
    }

    public function getCategoryByType($coinType)
    {
        $sql = mysql_query("SELECT * FROM cointypes WHERE coinType = '" . str_replace('_', ' ', $coinType) . "'") or die(mysql_error());
        $row = mysql_fetch_array($sql);
        return $row['coinCategory'];
    }

}

?>