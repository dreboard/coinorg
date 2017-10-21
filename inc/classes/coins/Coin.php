<?php
//getYearDistinctMintMarkCount
//getCoinName
// AND LEFT(coinName, 4) <= ".date('Y')."
/**
 * namespace App\Coins;
 * CoinOrg
 * Coin Class
 * @package App/Coins
 * @since v0.1.0
 */
class Coin
{
    protected $coinID;
    protected $mintMark;
    protected $coinCategory;
    protected $coinSubCategory;
    protected $coinType;
    protected $coinName;
    protected $mintage;
    protected $G4;
    protected $VG8;
    protected $F12;
    protected $VF20;
    protected $EF40;
    protected $AU50;
    protected $MS60;
    protected $MS63;
    protected $MS65;
    protected $PR63;
    protected $PR65;
    protected $byMint;
    protected $coinVersion;
    protected $century;
    protected $strike;
    protected $commemorative;
    protected $commemorativeType;
    protected $commemorativeVersion;
    protected $series;
    protected $seriesType;
    protected $design;
    protected $designType;
    protected $denomination;
    protected $keyDate;
    protected $coinYear;
    protected $byMintGold;
    protected $errorCoin;
    protected $coinMetal;
    protected $varietyType;
    protected $varietyCoin;
    protected $obverse;
    protected $reverse;
    protected $snow;
    protected $ddr;
    protected $ddo;
    protected $wddr;
    protected $wddo;
    protected $mintmarkStage;

    protected $db;

    /**
     * Coin constructor.
     * @todo create parent for db dependency
     */
    public function __construct()
    {
        $this->db = DBConnect::getInstance();
    }

    public function getCoinById($coinID)
    {
        $sql = 'SELECT * FROM coins WHERE coinID = :coinID';
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->execute(array(':coinID' => $coinID));

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row){
            $this->coinID = $row['coinID'];
            $this->mintMark = $row['mintMark'];
            $this->coinCategory = $row['coinCategory'];
            $this->coinSubCategory = $row['coinSubCategory'];
            $this->coinType = $row['coinType'];
            $this->coinName = $row['coinName'];
            $this->mintage = $row['mintage'];
            $this->G4 = $row['G4'];
            $this->VG8 = $row['VG8'];
            $this->F12 = $row['F12'];
            $this->VF20 = $row['VF20'];
            $this->EF40 = $row['EF40'];
            $this->AU50 = $row['AU50'];
            $this->MS60 = $row['MS60'];
            $this->MS63 = $row['MS63'];
            $this->MS65 = $row['MS65'];
            $this->PR63 = $row['PR63'];
            $this->PR65 = $row['PR65'];
            $this->byMint = $row['byMint'];
            $this->coinVersion = $row['coinVersion'];
            $this->century = $row['century'];
            $this->strike = $row['strike'];
            $this->commemorative = $row['commemorative'];
            $this->commemorativeType = $row['commemorativeType'];
            $this->commemorativeVersion = $row['commemorativeVersion'];
            $this->series = $row['series'];
            $this->seriesType = $row['seriesType'];
            $this->design = $row['design'];
            $this->designType = $row['designType'];
            $this->denomination = $row['denomination'];
            $this->keyDate = $row['keyDate'];
            $this->coinYear = $row['coinYear'];
            $this->byMintGold = $row['byMintGold'];
            $this->errorCoin = $row['errorCoin'];
            $this->coinMetal = $row['coinMetal'];
            $this->varietyType = $row['varietyType'];
            $this->varietyCoin = $row['varietyCoin'];
            $this->obverse = $row['obverse'];
            $this->reverse = $row['reverse'];
            $this->snow = $row['snow'];
            $this->ddr = $row['ddr'];
            $this->ddo = $row['ddo'];
            $this->wddr = $row['wddr'];
            $this->wddo = $row['wddo'];
            $this->mintmarkStage = $row['mintmarkStage'];

            return true;
        }
        return false;


    }


    public function checkPDS($coinID)
    {
        $coinQuery = mysql_query("SELECT * FROM coins WHERE coinID = '$coinID'") or die(mysql_error());
        while ($row = mysql_fetch_array($coinQuery)) {
            $byMint = $row['byMint'];
        }
        return $byMint;
    }

    public function getSnow()
    {
        return strip_tags($this->snow);
    }

    public function getCoinSeriesType()
    {
        return strip_tags($this->seriesType);
    }

    public function getCoinSeries()
    {
        return strip_tags($this->series);
    }

    public function getErrorCoin()
    {
        return strip_tags($this->errorCoin);
    }

    public function getByMintGold()
    {
        return strip_tags($this->byMintGold);
    }

    public function getCoinMetal()
    {
        return strip_tags($this->coinMetal);
    }

    public function getCommemorative()
    {
        return strip_tags($this->commemorative);
    }

    public function getDenomination()
    {
        return strip_tags($this->denomination);
    }

    public function getDesign()
    {
        return strip_tags($this->design);
    }

    public function getVarietyType()
    {
        return strip_tags($this->varietyType);
    }

    public function getDesignType()
    {
        return strip_tags($this->designType);
    }

    public function getSeries()
    {
        return strip_tags($this->series);
    }

    public function getCommemorativeType()
    {
        return strip_tags($this->commemorativeType);
    }

    public function getCommemorativeVersion()
    {
        return strip_tags($this->commemorativeVersion);
    }

    public function getCentury()
    {
        return strip_tags($this->century);
    }

    public function getCoinID()
    {
        return strip_tags($this->coinID);
    }

    public function getMotherCoinID()
    {
        return strip_tags($this->motherCoinID);
    }

    public function getCoinVersion()
    {
        return strip_tags($this->coinVersion);
    }

    public function getCoinStrike()
    {
        return strip_tags($this->strike);
    }

    public function getCoinName($collectionID = null)
    {
        return strip_tags($this->coinName);
    }

    public function getCoinVamName($collectionID, $userID)
    {
        $Collection = new Collection();
        $this->getCollectionById($collectionID);
        return strip_tags($this->coinName) . ' ' . $Collection->getVam();
    }

    public function getCoinVariety($collectionID, $userID)
    {
        $Collection = new Collection();
        $this->getCollectionById($collectionID);
        // if variety ! == None
        return strip_tags($this->coinName) . ' ' . $Collection->getVariety();
    }

    public function getVarietyCoin()
    {
        return strip_tags($this->varietyCoin);
    }

    public function getCoinType()
    {
        return strip_tags($this->coinType);
    }

    public function getCoinCategory()
    {
        return strip_tags($this->coinCategory);
    }

    public function getCoinSubCategory()
    {
        return strip_tags($this->coinSubCategory);
    }

    public function getCollectionNumber()
    {
        return strip_tags($this->collection);
    }

    public function getMintageNumber()
    {
        return strip_tags($this->mintage);
    }

    public function getG4()
    {
        return strip_tags($this->G4);
    }

    public function getVG8()
    {
        return strip_tags($this->VG8);
    }

    public function getF12()
    {
        return strip_tags($this->F12);
    }

    public function getVF20()
    {
        return strip_tags($this->VF20);
    }

    public function getEF40()
    {
        return strip_tags($this->EF40);
    }

    public function getAU50()
    {
        return strip_tags($this->AU50);
    }

    public function getMS60()
    {
        return strip_tags($this->MS60);
    }

    public function getMS63()
    {
        return strip_tags($this->MS63);
    }

    public function getMS65()
    {
        return strip_tags($this->MS65);
    }

    public function getPR63()
    {
        return strip_tags($this->PR63);
    }

    public function getPR65()
    {
        return strip_tags($this->PR65);
    }

    public function getByMint()
    {
        return strip_tags($this->byMint);
    }

    public function getKeyDate()
    {
        return strip_tags($this->keyDate);
    }

    public function getMintMark()
    {
        return strip_tags($this->mintMark);
    }

    public function getCoinYear()
    {
        return strip_tags($this->coinYear);
    }

    public function getCoinDDO()
    {
        return strip_tags($this->ddo);
    }

    public function getCoinDDR()
    {
        return strip_tags($this->ddr);
    }

    public function getCoinWDDO()
    {
        return strip_tags($this->wddo);
    }

    public function getCoinWDDR()
    {
        return strip_tags($this->wddr);
    }

    public function getCount($coinID)
    {
        $sql = "SELECT COUNT (*) FROM coins WHERE coinID = :coinID";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////
//Master coin counts
    public function getCoinByMintCount()
    {
        $sql = "SELECT COUNT (*) FROM coins WHERE byMint = '1' AND coinMetal != 'Gold' AND coinMetal != 'Platinum' AND commemorative = '0' ";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getCoinProgressCount()
    {
        $sql = "SELECT * FROM coins WHERE coinMetal != 'Gold' AND coinMetal != 'Platinum' AND commemorative = '0' ";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////

//GET YEARS

    public function getTypeStartYear($coinType)
    {
        $sql = mysql_query("SELECT * FROM coins WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinYear <= '" . date('Y') . "' ORDER BY coinYear ASC LIMIT 1");
        while ($row = mysql_fetch_array($sql)) {
            $startYear = intval($row['coinYear']);
        }
        return $startYear;
    }

    public function getTypeEndYear($coinType)
    {
        $sql = mysql_query("SELECT * FROM coins WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinYear <= '" . date('Y') . "' ORDER BY coinYear DESC LIMIT 1");
        while ($row = mysql_fetch_array($sql)) {
            $endYear = intval($row['coinYear']);
        }
        return $endYear;
    }

    public function getMintedYearsCount($coinType)
    {
        return ($this->getTypeEndYear($coinType) + 1) - $this->getTypeStartYear($coinType);
    }

    public function getYearMintedCount($coinType)
    {
        $sql = mysql_query("SELECT DISTINCT LEFT(coinName,4) AS coinYearOption FROM coins WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND LEFT(coinName, 4) <= " . date('Y') . "");
        return mysql_num_rows($sql);
    }

    public function getYearByMintCount($coinType, $coinYear)
    {
        $sql = mysql_query("SELECT * FROM coins WHERE  coinYear = '$coinYear' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND byMint = '1'");
        return mysql_num_rows($sql);
    }

    public function getYearDistinctMintMarkCount($coinType, $coinYear)
    {
        $sql = mysql_query("SELECT DISTINCT mintmark FROM coins WHERE  coinYear = '$coinYear' AND coinType = '" . str_replace('_', ' ', $coinType) . "' ");
        return mysql_num_rows($sql);
    }

    function getCoinImageByYear($coinYear)
    {
        $countAll = mysql_query("SELECT * FROM coins WHERE coinYear = '$coinYear' LIMIT 1") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        while ($row = mysql_fetch_array($countAll)) {
            $coinVersion = str_replace(' ', '_', $row['coinVersion']);
            return $coinVersion . '.jpg';
        }
    }


//////////////////////////////////////////////////////////////////////////////////////////////////////////

//GET COMPLETE TYPE


    function getCoinCatCountByID($userID, $coinCategory)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinCategory = :coinCategory
            ");

        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }


    public function getCoinByIdByMint($coinID)
    {
        $sql = 'SELECT * FROM coins WHERE coinID = ' . $coinID . ' AND byMint = "1"';
        $results = mysql_query($sql);
        $row = mysql_fetch_array($results);
        $this->coinIDByMint = $row['coinID'];
        $this->coinNameByMint = $row['coinName'];
        return true;
    }

    public function getCoinNameByMint()
    {
        return strip_tags($this->coinNameByMint);
    }

    public function getCoinCountType($coinType)
    {
        $stmt = $this->db->dbhc->prepare("
                  SELECT COUNT(*) FROM coins WHERE coinType = :coinType AND coinYear <= '" . date('Y') . "'
        ");
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM coins WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinYear <= '" . date('Y') . "'");

    }

    public function getCoinByTypeByMint($coinType)
    {
        $stmt = $this->db->dbhc->prepare("
                  SELECT COUNT(*) FROM coins WHERE coinType = :coinType AND coinYear <= '" . date('Y') . "' AND byMint = '1' 
        ");
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM coins WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinYear <= '" . date('Y') . "' AND byMint = '1'") or die(mysql_error());
    }


// CENTURY COLLECTION
    public function getCenturyCount($century)
    {
        $stmt = $this->db->dbhc->prepare("
                  SELECT COUNT(*) FROM coins WHERE century = :century AND coinYear <= '" . date('Y') . "' 
        ");
        $stmt->bindParam(':century', $century, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getCenturyByMintCount($century)
    {
        $stmt = $this->db->dbhc->prepare("
                  SELECT COUNT(*) FROM coins WHERE century = :century AND coinYear <= '" . date('Y') . "' AND byMint = '1' 
        ");
        $stmt->bindParam(':century', $century, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM coins WHERE century = '$century' AND coinYear <= '" . date('Y') . "' AND byMint = '1' ") or die(mysql_error());

    }
    //////////////////////////////////Get year count
    //Year Count
    public function getCoinCountByYear($coinType)
    {
        $stmt = $this->db->dbhc->prepare("
                  SELECT COUNT(DISTINCT LEFT(coinName, 6)) FROM coins
                  WHERE AND byMint = '1' AND coins.coinType = :coinType
        ");
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT DISTINCT LEFT(coinName, 6) FROM coins WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND byMint = '1'") or die(mysql_error());

    }

    //Get collected by year
    public function getCoinCollectedByYear($coinType)
    {
        $stmt = $this->db->dbhc->prepare("
                  SELECT COUNT(*) FROM coins 
                  WHERE  AND  byMint = '1' AND coins.coinType = :coinType
        ");
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    /*function byYearMintMark($coinType,$coinYear){
        $newarray = array();
        $sql = mysql_query("SELECT DISTINCT mintmark FROM coins WHERE coinType = '$coinType' AND coinYear = '$coinYear'") or die(mysql_error());

        while ($row = mysql_fetch_assoc($sql)) {
            $ret = array_push($newarray, $row);
        }
        return $ret;
    }	*/

    function byYearMintMark($coinType, $coinYear)
    {
        $ret = array();
        $query = "SELECT DISTINCT mintmark FROM coins WHERE coinType = '$coinType' AND coinYear = '$coinYear'";
        $r = mysql_query($query);
        while ($o = mysql_fetch_array($r, MYSQL_ASSOC)) {
            $ret[array_shift($o)] = $o;
        }
        return $ret;
    }


    public function coinSelects($coinType)
    {
        $getTypes = mysql_query("SELECT * FROM coins WHERE coinType = '" . str_replace('_', ' ', $coinType) . "'") or die(mysql_error());
        while ($row = mysql_fetch_array($getTypes)) {
            $i = 0;
            $coinName = $row['coinName'];
            $coinID = $row['coinID'];

            echo '<option  value="' . $coinType . '"> ' . $coinName . '</option>';

        }
        return;

    }

    function getCatCount($coinCategory)
    {
        $sql = mysql_query("SELECT COUNT(coinCategory) FROM coins WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    /*		public function coinSubSelects($coinSubCategory){
       $getTypes = mysql_query("SELECT * FROM coins WHERE coinSubCategory = '$coinSubCategory'") or die(mysql_error());
       while($row = mysql_fetch_array($getTypes))
          {
              $i=0;
          $coinName = $row['coinName'];
         $coinID = $row['coinID'];

                echo '<option  value="'.$coinType.'"> '.$coinName.'</option>';

          }
        return;

        }*/
    public function coinSubSelects($coinSubCategory)
    {
        $getTypes = mysql_query("SELECT * FROM coins WHERE coinSubCategory = '$coinSubCategory' ORDER BY LEFT(coinName, 6)") or die(mysql_error());
        while ($row = mysql_fetch_array($getTypes)) {
            $i = 0;
            $coinName = $row['coinName'];
            $coinID = $row['coinID'];

            echo '<option  value="' . $coinID . '"> ' . $coinName . '</option>';

        }
        return;

    }

    public function getCategoryByType($coinType)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT * FROM coins     
            WHERE coinType = :coinType
            ");
        $stmt->execute(array(':coinType' => $coinType));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $coinCategory = $row['coinCategory'];
        }
        return $coinCategory;
    }

    public function getMetalByType($coinType)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT * FROM coins     
            WHERE coinType = :coinType
            ");
        $stmt->execute(array(':coinType' => $coinType));
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $coinMetal = $row['coinMetal'];
        }
        return $coinMetal;
/*        $coinQuery = mysql_query("SELECT * FROM coins WHERE coinType = '" . str_replace('_', ' ', $coinType) . "'") or die(mysql_error());
        while ($row = mysql_fetch_array($coinQuery)) {
            $coinMetal = $row['coinMetal'];
        }
        return $coinMetal;*/
    }




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Coin categories table

    /**
     * @param $coincategoriesID
     * @return bool
     * @todo refactor to categories class
     */
    public function getCoinCategoryById($coincategoriesID)
    {
        $sql = 'SELECT * FROM coincategories WHERE coincategoriesID = ' . $coincategoriesID;
        $results = mysql_query($sql);
        $row = mysql_fetch_array($results);
        $this->coincategoriesID = $row['coincategoriesID'];
        $this->categoryName = $row['categoryName'];
        $this->completeSet = $row['completeSet'];
        $this->typeCount = $row['typeCount'];
        $this->denomination = $row['denomination'];

        return true;
    }


    /**
     * @param $coinCategory
     * @return mixed
     * @todo refactor to categories class
     */
    public function getTypeCount($coinCategory)
    {
        $query = mysql_query("SELECT * FROM coincategories WHERE categoryName = '" . str_replace('_', ' ', $coinCategory) . "'") or die(mysql_error());
        while ($row = mysql_fetch_array($query)) {
            $typeCount = $row['typeCount'];
        }
        return $typeCount;
    }


    public function getUnknownCoin($coinType)
    {
        $query = mysql_query("SELECT * FROM coin WHERE coinType = '" . str_replace('_', ' ', $coinType) . "'") or die(mysql_error());
        while ($row = mysql_fetch_array($query)) {
            $typeCount = $row['typeCount'];
        }
        return $typeCount;
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Commemoratives
    public function getCommemorativeByVersion($coinVersion)
    {
        $query = mysql_query("SELECT * FROM coins WHERE coinVersion = '$coinVersion'") or die(mysql_error());
        while ($row = mysql_fetch_array($query)) {
            $commemorativeType = $row['commemorativeType'];
        }
        return strip_tags($commemorativeType);
    }



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Coin versions

    public function getCollectionUniqueCountByVersion($userID, $coinVersion)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinVersion = '" . str_replace('_', ' ', $coinVersion) . "' AND  userID = '$userID'");
        $collectCount = mysql_num_rows($sql);

        return $collectCount;
    }

    public function getCoinTypeByVersion($coinVersion)
    {
        $query = mysql_query("SELECT * FROM coins WHERE coinVersion = '$coinVersion' AND coinYear <= '" . date('Y') . "'") or die(mysql_error());
        while ($row = mysql_fetch_array($query)) {
            $coinType = $row['coinType'];
        }
        return strip_tags($coinType);
    }

    public function getCoinCategoryByVersion($coinVersion)
    {
        $query = mysql_query("SELECT * FROM coins WHERE coinVersion = '$coinVersion' AND coinYear <= '" . date('Y') . "'") or die(mysql_error());
        while ($row = mysql_fetch_array($query)) {
            $coinCategory = $row['coinCategory'];
        }
        return strip_tags($coinCategory);
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Coin design


    public function getCoinTypeByDesignType($designType)
    {
        $query = mysql_query("SELECT * FROM coins WHERE designType = '$designType'") or die(mysql_error());
        while ($row = mysql_fetch_array($query)) {
            $coinType = $row['coinType'];
        }
        return strip_tags($coinType);
    }

    public function getCoinCategoryByDesignType($designType)
    {
        $query = mysql_query("SELECT * FROM coins WHERE designType = '$designType' AND coinYear <= '" . date('Y') . "'") or die(mysql_error());
        while ($row = mysql_fetch_array($query)) {
            $coinCategory = $row['coinCategory'];
        }
        return strip_tags($coinCategory);
    }

//By Series
    public function getCoinTypeBySeries($series)
    {
        $query = mysql_query("SELECT * FROM coins WHERE series = '$series'") or die(mysql_error());
        while ($row = mysql_fetch_array($query)) {
            $coinType = $row['coinType'];
        }
        return strip_tags($coinType);
    }

    public function getCoinCategoryBySeries($series)
    {
        $query = mysql_query("SELECT * FROM coins WHERE series = '$series' AND coinYear <= '" . date('Y') . "'") or die(mysql_error());
        while ($row = mysql_fetch_array($query)) {
            $coinCategory = $row['coinCategory'];
        }
        return strip_tags($coinCategory);
    }

//By SeriesType
    public function getCoinTypeBySeriesType($seriesType)
    {
        $query = mysql_query("SELECT * FROM coins WHERE seriesType = '$seriesType'") or die(mysql_error());
        while ($row = mysql_fetch_array($query)) {
            $coinType = $row['coinType'];
        }
        return strip_tags($coinType);
    }

    public function getCoinCategoryBySeriesType($seriesType)
    {
        $query = mysql_query("SELECT * FROM coins WHERE seriesType = '$seriesType' AND coinYear <= '" . date('Y') . "'") or die(mysql_error());
        while ($row = mysql_fetch_array($query)) {
            $coinCategory = $row['coinCategory'];
        }
        return strip_tags($coinCategory);
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Unknown coins


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Want list coins


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//DENOMINATION

    function getCoinByDenomination($denomination)
    {
        $sql = mysql_query("SELECT * FROM coins WHERE denomination = '$denomination'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinCategory = $row['coinCategory'];
        }
        return $coinCategory;
    }

    function getFSDenom($coinType, $coinCategory)
    {
        switch ($coinCategory) {
            case "Half Cent":
                echo "HC";
                break;
            case "Large Cent":
                echo "LC";
                break;
            case "Small Cent":
                echo "01";
                break;
            case "Two Cent":
                echo "02";
                break;
            case "Three Cent":
                switch ($coinType) {
                    case "Silver Three Cent":
                        echo "3S";
                        break;
                    case "Nickel Three Cent":
                        echo "3N";
                        break;
                }
                echo "3S";
                break;
            case "Nickel":
                echo "05";
                break;
            case "Half Dime":
                echo "H10";
                break;
            case "Dime":
                echo "10";
                break;
            case "Twenty Cent":
                echo "20";
                break;
            case "Quarter":
                echo "25";
                break;
            case "Half Dollar":
                echo "50";
                break;
            case "Dollar":
                switch ($coinType) {
                    case "Flowing Hair Dollar":
                    case "Morgan Dollar":
                    case "Peace Dollar":
                    case "Seated Liberty Dollar":
                        echo "S1";
                        break;
                    case "Presidential Dollar":
                    case "Eisenhower Dollar":
                    case "Susan B Anthony Dollar":
                    case "Sacagawea Dollar":
                        echo "C1";
                        break;
                    case "Trade Dollar":
                        echo "T1";
                        break;
                }
                break;
            case "Silver Dollar":
                echo "SE";
                break;
            case "Gold Dollar":
                echo "G1";
                break;
            case "Quarter Eagle":
                echo "G2.5";
                break;
            case "Three Dollar":
                echo "G3";
                break;
            case "Five Dollar":
                echo "G5";
                break;
            case "Ten Dollar":
                echo "G10";
                break;
            case "Twenty Dollar":
                echo "G20";
                break;
            case "Commemorative Half Dollar":
                echo "C50";
                break;
            case "Twenty Five Dollar":
                switch ($coinType) {
                    case "Quarter Ounce Platinum":
                        echo "P25";
                        break;
                }
                break;
            case "One Hundred Dollar":
                echo "P100";
                break;
        }

    }

    function getTrailDieDenom($coinCategory)
    {
        switch ($coinCategory) {
            case "Small Cent":
                echo "1";
                break;
            case "Nickel":
                echo "5";
                break;
            case "Dime":
                echo "10";
                break;
            case "Twenty Cent":
                echo "20";
                break;
            case "Quarter":
                echo "25";
                break;
            case "Half Dollar":
                echo "50";
                break;
            case "Dollar":
                echo "100";
                break;
        }

    }

}
