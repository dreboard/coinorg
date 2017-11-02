<?php
namespace App\Coins;

use \DBConnect;
use \PDO;
use \Exception;
use \Encryption;
//getKennedyMetalImg
//getCollectionCountByVersion
//getCoinStrikeColorProCount
//getCoinDesignationCount
//getBusinessHighGradeNumberByCoinID
//getDDRVarietyImg
///roll
//getGradeTypeCount
//getCoinGradeNum getBusinessHighGradeNumberByType
class Collection
{

    protected $DB_host = "localhost";
    protected $DB_user = "root";
    protected $DB_pass = "";
    protected $DB_name = "coins";

    protected $userID;

    public function __construct()
    {
        $this->db = DBConnect::getInstance();
        $this->user = $_SESSION['userID'];
    }

    public function getCollectionById($collectionID)
    {
        //$sql = mysql_query("SELECT * FROM collection WHERE collectionID = '$collectionID' LIMIT 1") or die(mysql_error());
        $stmt = $this->db->dbhc->prepare("
            SELECT * FROM collection     
            INNER JOIN coins ON collection.coinID = coins.coinID
            WHERE collectionID = :collectionID AND userID = :userID
            LIMIT 1
            ");
        $stmt->execute(array(':collectionID' => $collectionID, ':userID' => $this->user));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        //$num_rows = mysql_num_rows($sql);
        if ($row) {

            //$row = mysql_fetch_array($sql);
            $this->coinNickname = $row['coinNickname'];
            $this->userID = $row['userID'];
            $this->setregID = $row['setregID'];
            $this->collectionID = $row['collectionID'];
            $this->coinID = $row['coinID'];
            $this->mintMark = $row['mintMark'];
            $this->coinType = $row['coinType'];
            $this->coinCategory = $row['coinCategory'];
            $this->coinSubCategory = $row['coinSubCategory'];

            $this->listPrice = $row['listPrice'];
            $this->listDate = $row['listDate'];
            $this->sellStatus = $row['sellStatus'];


            $this->additional = $row['additional'];
            $this->coinNote = $row['coinNote'];
            $this->collectfolderID = $row['collectfolderID'];
            $this->collectrollsID = $row['collectrollsID'];
            $this->collectsetID = $row['collectsetID'];
            $this->byMint = $row['byMint'];
            $this->additional = $row['additional'];
            $this->strike = $row['strike'];

            $this->proService = $row['proService'];
            $this->proSerialNumber = $row['proSerialNumber'];
            $this->slabLabel = $row['slabLabel'];
            $this->slabCondition = $row['slabCondition'];
            $this->coinGrade = $row['coinGrade'];
            $this->designation = $row['designation'];
            $this->pcgsVariety = $row['pcgsVariety'];
            $this->problem = $row['problem'];

            $this->holed = $row["holed"];
            $this->cleaned = $row["cleaned"];
            $this->altered = $row["altered"];
            $this->scratched = $row["scratched"];
            $this->damaged = $row["damaged"];
            $this->pvc = $row["pvc"];
            $this->corrosion = $row["corrosion"];
            $this->bent = $row["bent"];
            $this->plugged = $row["plugged"];
            $this->polished = $row["polished"];

            $this->coinNote = $row['coinNote'];
            $this->errorType = $row['errorType'];
            $this->enterDate = $row['enterDate'];
            $this->coinPic1 = $row['coinPic1'];
            $this->coinPic2 = $row['coinPic2'];
            $this->coinPic3 = $row['coinPic3'];
            $this->coinPic4 = $row['coinPic4'];
            $this->firstday = $row['firstday'];
            $this->holderCode = $row['holderCode'];

            $this->errorCoin = $row['errorCoin'];
            $this->offCenter = $row['offCenter'];
            $this->multipleStrike = $row['multipleStrike'];
            $this->secondStrike = $row['secondStrike'];
            $this->broadstrike = $row['broadstrike'];
            $this->partialCollar = $row['partialCollar'];
            $this->bondedPlanchets = $row['bondedPlanchets'];
            $this->matedPair = $row['matedPair'];
            $this->doubleDenom = $row['doubleDenom'];
            $this->indentPercent = $row['indentPercent'];
            $this->clippedPlanchet = $row['clippedPlanchet'];
            $this->mule = $row['mule'];

            $this->rotated = $row['rotated'];
            $this->dieCrack = $row['dieCrack'];
            $this->machineDouble = $row['machineDouble'];
            $this->strikeThru = $row['strikeThru'];
            $this->wrongPlanchet = $row['wrongPlanchet'];
            $this->wrongMetal = $row['wrongMetal'];
            $this->brockage = $row['brockage'];

            $this->blisters = $row['blisters'];
            $this->plating = $row['plating'];

            $this->coinYear = $row['coinYear'];
            $this->mintMark = $row['mintMark'];
            $this->coinMetal = $row['coinMetal'];

            $this->coinValue = $row['coinValue'];
            $this->purchaseFrom = $row['purchaseFrom'];
            $this->purchaseDate = $row['purchaseDate'];
            $this->purchasePrice = $row['purchasePrice'];
            $this->ebaySellerID = $row['ebaySellerID'];
            $this->auctionNumber = $row['auctionNumber'];
            $this->showName = $row['showName'];
            $this->showCity = $row['showCity'];
            $this->shopName = $row['shopName'];
            $this->shopUrl = $row['shopUrl'];

            $this->containerID = $row['containerID'];
            $this->coincollectID = $row['coincollectID'];

            $this->certlist = $row['certlist'];
            $this->certlistService = $row['certlistService'];
            $this->certlistDate = $row['certlistDate'];

            $this->semiKeyDate = $row['semiKeyDate'];
            $this->keyDate = $row['keyDate'];
            $this->design = $row['design'];
            $this->coinVersion = $row['coinVersion'];

            $this->ddo = $row["ddo"];
            $this->ddr = $row["ddr"];
            $this->rpm = $row["rpm"];
            $this->omm = $row["omm"];
            $this->mms = $row["mms"];
            $this->odv = $row["odv"];
            $this->rdv = $row["rdv"];
            $this->red = $row["red"];
            $this->imm = $row["imm"];
            $this->mdr = $row["mdr"];
            $this->mdo = $row["mdo"];
            $this->dmr = $row["dmr"];
            $this->rpd = $row["rpd"];

            $this->wddo = $row["wddo"];
            $this->wddr = $row["wddr"];

            $this->rpmDirection = $row["rpmDirection"];
            $this->mintmarkStage = $row["mintmarkStage"];

            $this->varietyType = $row['varietyType'];
            $this->varietyCoin = $row['varietyCoin'];
            $this->color = $row["color"];
            $this->fullAtt = $row["fullAtt"];
            $this->morganDesignation = $row["morganDesignation"];

            $this->trailDieStrength = $row["trailDieStrength"];
            $this->trailDieDeviation = $row["trailDieDeviation"];
            $this->trailDieNumber = $row["trailDieNumber"];
            $this->trailDieDirection = $row["trailDieDirection"];

            $this->vam = $row['vam'];
            $this->fsNum = $row["fsNum"];
            $this->sheldon = $row["sheldon"];
            $this->newcomb = $row["newcomb"];
            $this->wileyBugert = $row["wileyBugert"];
            $this->snow = $row["snow"];
            $this->fortin = $row["fortin"];
            $this->bie = $row["bie"];
            $this->locked = $row["locked"];
            return true;
        } else {
            header("location: http://www.mycoinorganizer.com/user/myCoins.php");
            exit();
        }
    }

    public function getLocked()
    {
        return strip_tags($this->locked);
    }

    public function getBIE()
    {
        return strip_tags($this->bie);
    }

    public function getCoinColor()
    {
        return strip_tags($this->color);
    }

    public function getVarietyCoin()
    {
        return strip_tags($this->varietyCoin);
    }

    public function getTrailDieStrength()
    {
        return strip_tags($this->trailDieStrength);
    }

    public function getTrailDieDeviation()
    {
        return strip_tags($this->trailDieDeviation);
    }

    public function getTrailDieNumber()
    {
        return strip_tags($this->trailDieNumber);
    }

    public function getTrailDieDirection()
    {
        return strip_tags($this->trailDieDirection);
    }


    public function getFullAtt()
    {
        return strip_tags($this->fullAtt);
    }

    public function getMorganDesignation()
    {
        return strip_tags($this->morganDesignation);
    }

    public function getDDO()
    {
        return strip_tags($this->ddo);
    }

    public function setDDO($collectionID, $userID, $ddo)
    {
        mysql_query("UPDATE collection SET ddo = '$ddo' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getDDR()
    {
        return strip_tags($this->ddr);
    }

    public function setDDR($collectionID, $userID, $ddr)
    {
        mysql_query("UPDATE collection SET ddr = '$ddr' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getOMM()
    {
        return strip_tags($this->omm);
    }

    public function setOMM($collectionID, $userID, $omm)
    {
        mysql_query("UPDATE collection SET omm = '$omm' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getMMS()
    {
        return strip_tags($this->mms);
    }

    public function setMMS($collectionID, $userID, $mms)
    {
        mysql_query("UPDATE collection SET mms = '$mms' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getODV()
    {
        return strip_tags($this->odv);
    }

    public function setODV($collectionID, $userID, $odv)
    {
        mysql_query("UPDATE collection SET odv = '$odv' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getRDV()
    {
        return strip_tags($this->rdv);
    }

    public function setRDV($collectionID, $userID, $rdv)
    {
        mysql_query("UPDATE collection SET rdv = '$rdv' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getRED()
    {
        return strip_tags($this->red);
    }

    public function setRED($collectionID, $userID, $red)
    {
        mysql_query("UPDATE collection SET red = '$red' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getIMM()
    {
        return strip_tags($this->imm);
    }

    public function setIMM($collectionID, $userID, $imm)
    {
        mysql_query("UPDATE collection SET imm = '$imm' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getDMR()
    {
        return strip_tags($this->dmr);
    }

    public function setDMR($collectionID, $userID, $dmr)
    {
        mysql_query("UPDATE collection SET dmr = '$dmr' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getMDO()
    {
        return strip_tags($this->mdo);
    }

    public function setMDO($collectionID, $userID, $mdo)
    {
        mysql_query("UPDATE collection SET mdo = '$mdo' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getRPM()
    {
        return strip_tags($this->rpm);
    }

    public function setRPM($collectionID, $userID, $rpm)
    {
        mysql_query("UPDATE collection SET rpm = '$rpm' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getRPD()
    {
        return strip_tags($this->rpd);
    }

    public function setRPD($collectionID, $userID, $rpd)
    {
        mysql_query("UPDATE collection SET rpd = '$rpd' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getMDR()
    {
        return strip_tags($this->mdr);
    }

    public function setMDR($collectionID, $userID, $mdr)
    {
        mysql_query("UPDATE collection SET mdr = '$mdr' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }


    public function getWDDO()
    {
        return strip_tags($this->wddo);
    }

    public function setWDDO($collectionID, $userID, $wddo)
    {
        mysql_query("UPDATE collection SET wddo = '$wddo' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getWDDR()
    {
        return strip_tags($this->wddr);
    }

    public function setWDDR($collectionID, $userID, $wddr)
    {
        mysql_query("UPDATE collection SET wddr = '$wddr' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }


    public function getListDate()
    {
        return strip_tags($this->listDate);
    }

    public function getListPrice()
    {
        return strip_tags($this->listPrice);
    }

    public function getCertlist()
    {
        return strip_tags($this->certlist);
    }

    public function getCertlistService()
    {
        return strip_tags($this->certlistService);
    }

    public function getCertlistDate()
    {
        return strip_tags($this->certlistDate);
    }

    public function getVariety()
    {
        return strip_tags($this->varietyType);
    }

    public function getVam()
    {
        return strip_tags($this->vam);
    }

    public function setVam($collectionID, $userID, $vam)
    {
        mysql_query("UPDATE collection SET vam = '$vam' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getFsNum()
    {
        return strip_tags($this->fsNum);
    }

    public function setFsNum($collectionID, $userID, $fsNum)
    {
        mysql_query("UPDATE collection SET fsNum = '$fsNum' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getSheldon()
    {
        return strip_tags($this->sheldon);
    }

    public function setSheldon($collectionID, $userID, $sheldon)
    {
        mysql_query("UPDATE collection SET sheldon = '$sheldon' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getNewcomb()
    {
        return strip_tags($this->newcomb);
    }

    public function setNewcomb($collectionID, $userID, $newcomb)
    {
        mysql_query("UPDATE collection SET newcomb = '$newcomb' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getWileyBugert()
    {
        return strip_tags($this->wileyBugert);
    }

    public function setWileyBugert($collectionID, $userID, $wileyBugert)
    {
        mysql_query("UPDATE collection SET wileyBugert = '$wileyBugert' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getSnow()
    {
        return strip_tags($this->snow);
    }

    public function setSnow($collectionID, $userID, $snow)
    {
        mysql_query("UPDATE collection SET snow = '$snow' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getFortin()
    {
        return strip_tags($this->fortin);
    }

    public function setFortin($collectionID, $userID, $fortin)
    {
        mysql_query("UPDATE collection SET fortin = '$fortin' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    public function getProblem()
    {
        return strip_tags($this->problem);
    }

    public function getContainerID()
    {
        return strip_tags($this->containerID);
    }

    public function getCoincollectID()
    {
        return strip_tags($this->coincollectID);
    }

    public function getCoinVersion()
    {
        return strip_tags($this->coinVersion);
    }

    public function getDesign()
    {
        return strip_tags($this->design);
    }

    public function getShowName()
    {
        return strip_tags($this->showName);
    }

    public function getShowCity()
    {
        return strip_tags($this->showCity);
    }

    public function getSetReg()
    {
        return strip_tags($this->setregID);
    }

    public function getCoinUser()
    {
        return strip_tags($this->user);
    }

    public function getCoinMetal()
    {
        return strip_tags($this->coinMetal);
    }

    public function getErrorType()
    {
        return strip_tags($this->errorType);
    }

    public function getErrorCoin()
    {
        return strip_tags($this->errorCoin);
    }

    public function getOffCenter()
    {
        return strip_tags($this->offCenter);
    }

    public function getMultipleStrike()
    {
        switch ($this->secondStrike) {
            case 'None':
                return strip_tags($this->multipleStrike);
                break;
            default:
                return strip_tags($this->multipleStrike) . ' ' . strip_tags($this->secondStrike);
        }
    }

    public function getBroadstrike()
    {
        return strip_tags($this->broadstrike);
    }

    public function getPartialCollar()
    {
        return strip_tags($this->partialCollar);
    }

    public function getBondedPlanchets()
    {
        return strip_tags($this->bondedPlanchets);
    }

    public function getMatedPair()
    {
        return strip_tags($this->matedPair);
    }

    public function getDoubleDenom()
    {
        return strip_tags($this->doubleDenom);
    }

    public function getIndentPercent()
    {
        return strip_tags($this->indentPercent);
    }

    public function getClippedPlanchet()
    {
        return strip_tags($this->clippedPlanchet);
    }

    public function getMule()
    {
        return strip_tags($this->mule);
    }

    public function getRotated()
    {
        return strip_tags($this->rotated);
    }

    public function getDieCrack()
    {
        return strip_tags($this->dieCrack);
    }

    public function getMachineDouble()
    {
        return strip_tags($this->machineDouble);
    }

    public function getBrockage()
    {
        return strip_tags($this->brockage);
    }

    public function getStrikeThru()
    {
        return strip_tags($this->strikeThru);
    }

    public function getWrongPlanchet()
    {
        return strip_tags($this->wrongPlanchet);
    }

    public function getWrongMetal()
    {
        return strip_tags($this->wrongMetal);
    }

    public function getBlisters()
    {
        return strip_tags($this->blisters);
    }

    public function getPlating()
    {
        return strip_tags($this->plating);
    }


    public function getCoinNickname()
    {
        return strip_tags($this->coinNickname);
    }

    public function getMintMark()
    {
        return strip_tags($this->mintMark);
    }

    public function getCoinYear()
    {
        return strip_tags($this->coinYear);
    }

    public function getStrike()
    {
        return strip_tags($this->strike);
    }

    public function getSeries()
    {
        return strip_tags($this->series);
    }

    public function getShopName()
    {
        return strip_tags($this->shopName);
    }

    public function getShopURL()
    {
        return strip_tags($this->shopUrl);
    }

    public function getCoinImage1()
    {
        return strip_tags($this->coinPic1);
    }

    public function getCoinImage2()
    {
        return strip_tags($this->coinPic2);
    }

    public function getCoinImage3()
    {
        return strip_tags($this->coinPic3);
    }

    public function getCoinImage4()
    {
        return strip_tags($this->coinPic4);
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

    public function getCoinGradeNumber()
    {
        return intval(preg_replace('#[^0-9]#i', '', $this->coinGrade));
    }


    public function getPurchaseFrom()
    {
        return strip_tags($this->purchaseFrom);
    }

    public function getCoinDate()
    {
        return strip_tags($this->purchaseDate);
    }

    public function getCoinPrice()
    {
        return strip_tags($this->purchasePrice);
    }

    public function getEbaySellerID()
    {
        return strip_tags($this->ebaySellerID);
    }

    public function getAuctionNumber()
    {
        return strip_tags($this->auctionNumber);
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


    public function getCoinID()
    {
        return strip_tags($this->coinID);
    }

    public function getMotherCoinID()
    {
        return strip_tags($this->motherCoinID);
    }

    public function getAdditional()
    {
        return strip_tags($this->additional);
    }

    public function getCoinNote()
    {
        return $this->coinNote;
    }

    public function getCollectionFolder()
    {
        return strip_tags($this->collectfolderID);
    }

    public function getCollectionRoll()
    {
        return strip_tags($this->collectrollsID);
    }

    public function getCollectionSet()
    {
        return strip_tags($this->collectsetID);
    }

    public function getCoinIDCount($coinID)
    {
        $coinQuery = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID'") or die(mysql_error());
        return mysql_num_rows($coinQuery);
    }

    function getThisCoinID($coinID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinID='$coinID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinID = $row['coinID'];

        }
        return $coinID;
    }

    public function getThisCoinsCoinID($collectionID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE collectionID = '$collectionID' AND userID = '$userID' ") or die(mysql_error());
        $row = mysql_fetch_array($sql);
        return intval($row['coinID']);
    }

    function checkCollection($coinID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '$coinID'") or die(mysql_error());
        $collectCount = mysql_num_rows($sql);
        return $collectCount;
    }

    function deleteCollectedCoin($collectionID, $userID)
    {
        $this->getCollectionById($collectionID);
        if ($this->getCoinImage1() !== '../img/noPic.jpg') {
            unlink($this->getCoinImage1());
        }
        if ($this->getCoinImage2() !== '../img/noPic.jpg') {
            unlink($this->getCoinImage2());
        }
        if ($this->getCoinImage3() !== '../img/noPic.jpg') {
            unlink($this->getCoinImage3());
        }
        if ($this->getCoinImage4() !== '../img/noPic.jpg') {
            unlink($this->getCoinImage4());
        }
        @mysql_query("DELETE FROM collection WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        return;
    }

    function setToUndefined($value)
    {
        if ($value == 'None') {
            $value = 'Undefined';
        } else {
            $value = $value;
        }
        return $value;
    }

    function setToNone($value)
    {
        if ($value == '' || !$value) {
            $value = 'None';
        } else {
            $value = mysql_real_escape_string($value);
        }
        return $value;
    }

    function setToZero($value)
    {
        if ($value == '') {
            $value = '0';
        } else {
            $value = intval($value);
        }
        return $value;
    }

    function setNoValToZero($value)
    {
        if (!$value) {
            $value = '0';
        } else {
            $value = intval($value);
        }
        return $value;
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Master totals for user
     *
     * @param $coinCategory
     * @param $userID
     * @return mixed
     */
    public function getTypeCollectionProgress($coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("CALL UserTypeCollectionProgress(:userID, :coinCategory)");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    /**
     * @param $userID
     * @return mixed
     */
    public function getTypeCollectionProgressByID($userID)
    {
        $halfCentQuery = $this->getTypeCollectionProgress('Half Cent', $userID);
        $largeCentQuery = $this->getTypeCollectionProgress('Large Cent', $userID);
        $smallCentQuery = $this->getTypeCollectionProgress('Small Cent', $userID);
        $twoCentQuery = $this->getTypeCollectionProgress('Two Cent', $userID);
        $threeCentQuery = $this->getTypeCollectionProgress('Three Cent', $userID);
        $halfDimeQuery = $this->getTypeCollectionProgress('Half Dime', $userID);
        $nickelQuery = $this->getTypeCollectionProgress('Nickel', $userID);
        $dimeQuery = $this->getTypeCollectionProgress('Dime', $userID);
        $twentyCentQuery = $this->getTypeCollectionProgress('Twenty Cent', $userID);
        $quarterQuery = $this->getTypeCollectionProgress('Quarter', $userID);
        $halfDollarQuery = $this->getTypeCollectionProgress('Half Dollar', $userID);
        $dollarQuery = $this->getTypeCollectionProgress('Dollar', $userID);
        $collectCount = $halfCentQuery + $largeCentQuery + $smallCentQuery + $twoCentQuery + $threeCentQuery + $halfDimeQuery + $nickelQuery + $dimeQuery + $twentyCentQuery + $quarterQuery + $halfDollarQuery + $dollarQuery;
        return $collectCount;
    }


    public function getCollectionCountById($userID)
    {
        $stmt = $this->db->dbhc->prepare("CALL UserAllCollectedCoins(:userID)");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getUniqueCollectionCountById($userID)
    {
        $stmt = $this->db->dbhc->prepare("Call UserAllUniqueCollectedCoins(:userID)");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getCoinSumByAccount($userID)
    {
        $sql = "SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE  userID = :userID";

        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }
    }

    public function getCoinFaceValueByAccount($userID)
    {
        $sql = "SELECT COALESCE(sum(denomination), 0.00) FROM collection WHERE  userID = :userID";

        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(denomination), 0.00)'];
        } else {
            return '0.00';
        }
    }

//from
    public function getCoinSumByAccountFrom($userID, $purchaseFrom)
    {
        $sql = "SELECT COALESCE(sum(purchasePrice), 0.00) AS coinSum FROM collection WHERE purchaseFrom = :purchaseFrom AND userID = :userID";

        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':purchaseFrom', str_replace('_', ' ', $purchaseFrom), PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }
    }

    public function getCoinFaceValueByAccountFrom($userID, $purchaseFrom)
    {
        $sql = "SELECT COALESCE(sum(denomination), 0.00) FROM collection WHERE purchaseFrom = :purchaseFrom AND userID = :userID";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':purchaseFrom', str_replace('_', ' ', $purchaseFrom), PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(denomination), 0.00)'];
        } else {
            return '0.00';
        }
    }

    public function getAllTableCountByIDFrom($userID, $purchaseFrom)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND purchaseFrom = '" . str_replace('_', ' ', $purchaseFrom) . "'") or die(mysql_error());
        return mysql_num_rows($sql);
    }
/////////////////////////////////////////////////////////////
//Proofs
    public function getProofCollectionCountById($userID)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(*) 
          FROM collection 
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID AND coins.strike = 'Proof'
         ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getProofRawCollectionCountById($userID)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(*) 
          FROM collection 
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.proService = 'None' 
          AND collection.userID = :userID AND coins.strike = 'Proof' AND collection.collectsetID = '0'
         ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getProofProCollectionCountById($userID)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(*) 
          FROM collection 
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.proService != 'None' AND collection.userID = :userID AND coins.strike = 'Proof'");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getUniqueProofCollectionCountById($userID)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(DISTINCT coinID) 
          FROM collection 
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID AND coins.strike = 'Proof'");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getUniqueBullionProofCollectionCountById($userID, $coinMetal)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(DISTINCT coinID) 
          FROM collection 
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID AND coins.strike = 'Proof' AND coinMetal = :coinMetal");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinMetal', str_replace('_', ' ', $coinMetal), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getProofCoinSumByAccount($userID)
    {
        $sql = "
          SELECT COALESCE(sum(purchasePrice), 0.00) 
          FROM collection 
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID AND coins.strike = 'Proof'";

        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }
    }

    public function getProofErrorCountById($userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) AS ProofErrorCountById 
            FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.proService = :proService 
            AND coins.strike = 'Proof' AND collection.errorType != 'None' AND collection.userID = :userID
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

    }

    public function getProofCommemorativeCountById($userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) AS ProofCommemorativeCount 
            FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.proService = :proService 
            AND coins.coinMetal = :coinMetal AND coins.strike = 'Proof' AND collection.userID = :userID AND commemorative != '0'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getProofBullionCountById($userID, $coinMetal)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) AS ProofBullionCount 
            FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.proService = :proService 
            AND coins.coinMetal = :coinMetal AND coins.strike = 'Proof' AND collection.userID = :userID
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinMetal', $coinMetal, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getProofBullionSumByAccount($userID, $coinMetal)
    {
        $sql = "
          SELECT COALESCE(sum(purchasePrice), 0.00) 
          FROM collection
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID 
          AND coins.strike = 'Proof' AND coins.coinMetal = :coinMetal";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinMetal', $coinMetal, PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }

    }

//Graded
    public function getProofMetalProCountByID($coinMetal, $proService, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) AS ProofMetalProCount 
            FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.proService = :proService 
            AND coins.coinMetal = :coinMetal AND coins.strike = 'Proof' AND collection.userID = :userID
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':proService', $proService, PDO::PARAM_STR);
        $stmt->bindParam(':coinMetal', $coinMetal, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getProofMetalProTotalByID($proService, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(*) 
          FROM collection 
          INNER JOIN coins ON collection.coinID = coins.coinID 
          WHERE collection.proService = :proService 
          AND coins.strike = 'Proof' AND collection.userID = :userID
         ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':proService', $proService, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
/////////////////////////////////////////////////////////////////
    //Mint Collection Progress
    public function getByMintCountByID($userID)
    {
        $sql = "
            SELECT COUNT(DISTINCT coinID) 
            FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.byMint = '1'
            ";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getTotalByMintCountByID()
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(*) 
          FROM coins 
          WHERE coinMetal != 'Gold' AND  byMint = '1'");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getCompleteCollectionById($userID)
    {
        $sql = "SELECT COUNT(*) FROM collection WHERE userID = :userID";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }



    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //By century
    public function getUniqueCenturyCollectionCountById($userID, $century)
    {
        $sql = "
          SELECT COUNT(DISTINCT collection.coinID) 
          FROM collection 
          INNER JOIN coins ON collection.coinID = coins.coinID 
          WHERE collection.userID = :userID AND coins.century = :century AND coins.byMint = '1'
          ";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':century', $century, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getCenturyAllCollectionById($userID, $century)
    {
        $sql = "
          SELECT COUNT(DISTINCT collection.coinID) 
          FROM collection 
          INNER JOIN coins ON collection.coinID = coins.coinID 
          WHERE collection.userID = :userID AND coins.century = :century
          ";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':century', $century, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getCenturySumByAccount($userID, $century)
    {
        $sql = "
          SELECT COALESCE(sum(purchasePrice), 0.00) 
          FROM collection
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID 
          AND coins.century = :century";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':century', $century, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }
    }

    public function getCenturyFaceValByAccount($userID, $century)
    {
        $sql = "
          SELECT COALESCE(sum(coins.denomination), 0.00) 
          FROM collection
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID 
          AND coins.century = :century";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':century', $century, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(denomination), 0.00)'];
        } else {
            return '0.00';
        }
    }

    public function getCenturyCollectionCountById($userID, $century)
    {
        $sql = "
          SELECT  COUNT(*) 
          FROM collection
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID 
          AND coins.century = :century";

        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':century', $century, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getCenturyByMintCountByID($userID, $century)
    {
        $sql = "
          SELECT  COUNT(DISTINCT coinID) 
          FROM collection
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID 
          AND coins.century = :century AND coins.byMint = '1'";
        $sql = "SELECT COUNT(*) FROM collection WHERE userID = :userID";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':century', $century, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    /*	public function getCenturyTypeImg($coinCategory, $century, $userID){
	  $countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND century = '$century' ") or die(mysql_error());
	  $img_check = mysql_num_rows($countAll);
		if($img_check == 0){
		   return "blank.jpg";
		} else {
	  return $century.'_'.str_replace(' ', '_', $coinCategory).'.jpg';
	  }
	}*/
    public function getCenturyTypeImg($coinCategory, $century, $userID)
    {
        $sql = "
          SELECT  COUNT(DISTINCT coinID) 
          FROM collection
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID 
          AND coins.century = :century AND coins.coinCategory = :coinCategory
          LIMIT 1";
        $sql = "SELECT COUNT(*) FROM collection WHERE userID = :userID";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':century', $century, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        switch ($count) {
            case '1':
                return $century . '_' . str_replace(' ', '_', $coinCategory) . '.jpg';
                break;
            case '0':
                return 'blank.jpg';
                break;
        }
    }

    function getCenturyTypeImage($century, $coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(DISTINCT coinID) 
          FROM collection 
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID AND coins.strike = 'Proof' AND coinMetal = :coinMetal");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinMetal', str_replace('_', ' ', $coinMetal), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        $countAll = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND century = '$century' AND userID = '$userID'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check > 0) {
            $coinType = str_replace(' ', '_', $coinType);
            $image = $coinType . '.jpg';
        } else {
            $image = "blank.jpg";
        }
        return $image;
    }

    public function getTotalCollectedCenturyCategoryByID($coinCategory, $userID, $century)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(*) 
          FROM collection 
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID AND coins.century = :century AND coins.coinCategory = :coinCategory");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':century', $century, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND century = '" . $century . "' AND userID = '$userID'") or die(mysql_error());
    }

    public function getTotalCenturyInvestmentSumByCategory($coinCategory, $userID, $century)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND century = '" . $century . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

/////century percentages
//20th

    public function getCenturyTypeCollectionProgress($userID, $century)
    {
        $stmt = $this->db->dbhc->prepare("
                  SELECT COUNT(DISTINCT coins.coinType) AS CenturyTypeCollectionProgress
                  FROM collection 
                  INNER JOIN coins ON collection.coinID = coins.coinID
                  WHERE collection.userID = :userID AND coins.century = :century AND coins.commemorative = '0' AND coins.coinMetal != 'Gold'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':century', $century, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }


    public function getCointypeByYear($coinType, $coinYear, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
                  SELECT COUNT(*) FROM collection 
                  INNER JOIN coins ON collection.coinID = coins.coinID
                  WHERE coins.coinYear = :coinYear AND coins.coinType = :coinType AND collection.userID = :userID
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinYear', $coinYear, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////Coin Category totals	for each page Small_Cent.php, Quarter.php....


    /**
     * @param $coinCategory
     * @param $userID
     * @return mixed
     * @internal  CategoryTotalCollectedCoinsByID
     */
    public function getTotalCollectedCoinsByID($coinCategory, $userID)
    {
        $stmt2 = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinCategory = :coinCategory
            ");
        $stmt = $this->db->dbhc->prepare("CALL CategoryTotalCollectedCoinsByID(:coinCategory, :userID)");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    //Total Investment
    public function getTotalFaceValSumByCategory($coinCategory, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(denomination), 0.00) FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(denomination), 0.00)'];
        }
        return $coinSum;
    }

//face value
    public function getTotalGoldFaceValSumByCategory($userID)
    {
        $sql = "
          SELECT COALESCE(sum(denomination), 0.00) 
          FROM collection
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID 
          AND coins.strike = 'Proof' AND coins.coinMetal = 'Gold'";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(denomination), 0.00)'];
        } else {
            return '0.00';
        }
    }

    public function getTotalInvestmentSumByCategory($coinCategory, $userID)
    {
        $sql = "
          SELECT COALESCE(sum(purchasePrice), 0.00) 
          FROM collection
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID 
          AND coins.coinCategory = :coinCategory";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }
    }

    public function getTotalInvestmentSumByCategoryFrom($coinCategory, $userID, $purchaseFrom)
    {
        $sql = "CALL UserTotalInvestmentSumByCategory(:userID, :coinCategory, :purchaseFrom)";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->bindValue(':purchaseFrom', str_replace('_', ' ', $purchaseFrom), PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }
    }


    //Type Collection Progress  use the typeCount from coincategories for percent
    public function getTypeCollectionProgressByCategory($coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("SELECT COUNT(DISTINCT coinType) FROM collection INNER JOIN coins ON collection.coinID = coins.coinID WHERE coins.coinCategory = :coinCategory AND  collection.userID = :userID");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    //Mint Collection Progress
    public function getByMintCountByCategoryByMint($userID, $coinCategory)
    {
        $stmt = $this->db->dbhc->prepare("SELECT COUNT(DISTINCT coinID) FROM collection INNER JOIN coins ON collection.coinID = coins.coinID WHERE coins.coinCategory = :coinCategory AND  collection.userID = :userID AND coins.byMint = '1'  AND coins.coinYear <= '" . date('Y') . "'");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getTotalByMintCountByCategory($coinCategory)
    {
        $stmt = $this->db->dbhc->prepare("SELECT COUNT(*) FROM coins WHERE coins.coinCategory = :coinCategory AND coins.byMint = '1'  AND coinYear <= '" . date('Y') . "'");
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getTotalByMintCountByCommemorative($coinCategory)
    {
        $stmt = $this->db->dbhc->prepare("SELECT COUNT(*) FROM coins WHERE coins.coinCategory = :coinCategory AND  collection.userID = :userID AND coins.coinYear <= '" . date('Y') . "'");
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    /**
     * @param $coinCategory
     * @return mixed
     * @todo FIND WHERE THIS IS CALLED
     */
    public function getTotalByMintCollectedByCommemorative($coinCategory)
    {
        $stmt = $this->db->dbhc->prepare("
                  SELECT COUNT(*) FROM collection 
                  INNER JOIN coins ON collection.coinID = coins.coinID
                  WHERE coins.coinYear = :coinYear AND coins.coinType = :coinType AND collection.userID = :userID
        ");
        $stmt->bindParam(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "'") or die(mysql_error());
    }


    //Complete Collection Progress
    public function getCompleteCollectionCategoryById($userID, $coinCategory)
    {
        $stmt = $this->db->dbhc->prepare("SELECT COUNT(*) FROM collection INNER JOIN coins ON collection.coinID = coins.coinID WHERE coins.coinCategory = :coinCategory AND  collection.userID = :userID");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getCompleteCollectionCategoryCount($coinCategory)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM coins 
            WHERE coins.coinCategory = :coinCategory
            AND coinYear <= '" . date('Y') . "'
            ");
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getUniqueCollectionCountByCategory($userID, $coinCategory)
    {
        $stmt = $this->db->dbhc->prepare("SELECT COUNT(DISTINCT coinID) FROM collection INNER JOIN coins ON collection.coinID = coins.coinID WHERE coins.coinCategory = :coinCategory AND  collection.userID = :userID");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }



    /////////END Coin Category totals
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Category totals

//Get type collection Images and Type Collection percentages
    function getReportImage($coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(*) FROM collection 
          INNER JOIN coins ON collection.coinID = coins.coinID 
          WHERE coins.coinType = :coinType AND  
          collection.userID = :userID
         ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        $img_check = $stmt->fetchColumn();

        if ($img_check > 0) {
            $coinType = str_replace(' ', '_', $coinType);
            $image = $coinType . '.jpg';
        } else {
            $image = "blank.jpg";
        }
        return $image;
    }

    function getCatImage($coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(*) FROM collection 
          INNER JOIN coins ON collection.coinID = coins.coinID 
          WHERE coins.coinCategory = :coinCategory AND  
          collection.userID = :userID
         ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        $img_check = $stmt->fetchColumn();

        if ($img_check > 0) {
            $coinCategory = str_replace(' ', '_', $coinCategory);
            $image = $coinCategory . '.jpg';
        } else {
            $image = "blank.jpg";
        }
        return $image;
    }

    function getSubCatImage($coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(*) FROM collection 
          INNER JOIN coins ON collection.coinID = coins.coinID 
          WHERE coins.coinType = :coinType AND  
          collection.userID = :userID
         ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        $img_check = $stmt->fetchColumn();

        //$countAll = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $type) . "' AND userID = '$userID'") or die(mysql_error());

        if ($img_check > 0) {
            $coinType = str_replace(' ', '_', $coinType);
            $image = $coinType . '.jpg';
        } else {
            $image = "blank.jpg";
        }
        return $image;
    }


    function getCertReportImage($coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(*) FROM collection 
          INNER JOIN coins ON collection.coinID = coins.coinID 
          WHERE coins.coinType = :coinType AND  
          collection.userID = :userID AND collection.proService != 'None'
         ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        $img_check = $stmt->fetchColumn();

        // $countAll = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $type) . "' AND userID = '$userID' AND proService != 'None'") or die(mysql_error());
        if ($img_check > 0) {
            $coinType = str_replace(' ', '_', $coinType);
            $image = $coinType . '.jpg';
        } else {
            $image = "slabGraded.jpg";
        }
        return $image;
    }

    function getCertTypeReportImage($coinType, $userID, $proService)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(*) FROM collection 
          INNER JOIN coins ON collection.coinID = coins.coinID 
          WHERE coins.coinType = :coinType AND  
          collection.userID = :userID AND collection.proService = :proService
         ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':proService', str_replace('_', ' ', $proService), PDO::PARAM_STR);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        $img_check = $stmt->fetchColumn();

        //$countAll = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $type) . "' AND userID = '$userID' AND proService = '$proService'") or die(mysql_error());

        if ($img_check > 0) {
            $coinType = str_replace(' ', '_', $coinType);
            $image = $coinType . '.jpg';
        } else {
            $image = "slabGraded.jpg";
        }
        return $image;
    }

    function getPresidentialImg($coinSubCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(*) FROM collection 
          INNER JOIN coins ON collection.coinID = coins.coinID 
          WHERE coins.coinSubCategory = :coinSubCategory AND  
          collection.userID = :userID
         ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinSubCategory', str_replace('_', ' ', $coinSubCategory), PDO::PARAM_STR);
        $stmt->execute();
        $img_check = $stmt->fetchColumn();

        //$countAll = mysql_query("SELECT * FROM collection WHERE coinSubCategory = '" . str_replace('_', ' ', $coinSubCategory) . "' AND userID = '$userID'") or die(mysql_error());

        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            while ($row = mysql_fetch_array($countAll)) {
                $coinVersion = str_replace(' ', '_', $row['coinVersion']);
                return $coinVersion . '.jpg';
            }

        }
    }

    function getVarietyImg($coinVersion, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(*) FROM collection 
          INNER JOIN coins ON collection.coinID = coins.coinID 
          WHERE coins.coinVersion = :coinVersion AND  
          collection.userID = :userID
         ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinVersion', str_replace('_', ' ', $coinVersion), PDO::PARAM_STR);
        $stmt->execute();
        $img_check = $stmt->fetchColumn();

        if ($img_check > 0) {
            $coinVersion = str_replace(' ', '_', $coinVersion);
            $image = $coinVersion . '.jpg';
        } else {
            $image = "blank.jpg";
        }
        return $image;

 /*       $countAll = mysql_query("SELECT * FROM collection WHERE coinVersion = '" . str_replace('_', ' ', $coinVersion) . "' AND userID = '$userID'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            while ($row = mysql_fetch_array($countAll)) {
                $coinVersion = str_replace(' ', '_', $row['coinVersion']);
                return $coinVersion . '.jpg';
            }

        }*/
    }

    function getQuarterImg($design, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE design = '" . str_replace('_', ' ', $design) . "' AND userID = '$userID'") or die(mysql_error());
        $bagsAll = mysql_query("SELECT * FROM collectbags WHERE design = '" . str_replace('_', ' ', $design) . "' AND userID = '$userID'") or die(mysql_error());
        $rollsAll = mysql_query("SELECT * FROM collectrolls WHERE design = '" . str_replace('_', ' ', $design) . "' AND userID = '$userID'") or die(mysql_error());

        $img_check = mysql_num_rows($countAll) + mysql_num_rows($bagsAll) + mysql_num_rows($rollsAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            return str_replace(' ', '_', $design) . '.jpg';
        }
    }

    function getDesignImg($design, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND collection.design = :design
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':design', str_replace('_', ' ', $design), PDO::PARAM_STR);
        $stmt->execute();
        $countAll =  $stmt->fetchColumn();

        $stmt2 = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collectbags 
            WHERE collection.userID = :userID AND coins.design = :design
            ");
        $stmt2->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt2->bindValue(':design', str_replace('_', ' ', $design), PDO::PARAM_STR);
        $stmt2->execute();
        $bagsAll =  $stmt2->fetchColumn();

        $stmt3 = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collectrolls 
            WHERE collection.userID = :userID AND coins.design = :design
            ");
        $stmt3->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt3->bindValue(':design', str_replace('_', ' ', $design), PDO::PARAM_STR);
        $stmt3->execute();
        $rollsAll =  $stmt3->fetchColumn();

        //$countAll = mysql_query("SELECT * FROM collection WHERE design = '" . str_replace('_', ' ', $design) . "' AND userID = '$userID'") or die(mysql_error());
        //$bagsAll = mysql_query("SELECT * FROM collectbags WHERE design = '" . str_replace('_', ' ', $design) . "' AND userID = '$userID'") or die(mysql_error());
        //$rollsAll = mysql_query("SELECT * FROM collectrolls WHERE design = '" . str_replace('_', ' ', $design) . "' AND userID = '$userID'") or die(mysql_error());

        $img_check = $countAll + $bagsAll + $rollsAll;
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            return str_replace(' ', '_', $design) . '.jpg';
        }
    }
////////////////////////////////////////

////////////////////////////////////////////////////////
    //Type totals
    public function getCollectionCountByType($userID, $coinType)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
        //$sql = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND  userID = '$userID'");

    }

    public function getCertCollectionCountByType($userID, $coinType)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType  AND proService != 'None'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
        //$sql = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND  userID = '$userID' AND proService != 'None'");

    }

    public function getCollectionUniqueCountByType($userID, $coinType)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(DISTINCT coins.coinType) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND  userID = '$userID'");

    }

    public function getCertCollectionUniqueCountByType($userID, $coinType)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(DISTINCT coins.coinType) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType AND proService != 'None'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND  userID = '$userID' AND proService != 'None'");
    }

    public function getStrikeCollectedCountByType($userID, $coinType, $strike)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType AND coin.strike :strike
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->bindValue(':strike', str_replace('_', ' ', $strike), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
        //$sql = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND  userID = '$userID' AND strike = '$strike'");

    }

    public function getCoinCountById($coinID, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            WHERE userID = :userID AND coinID = :coinID
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getCertCoinCountById($coinID, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            WHERE userID = :userID AND coinID = :coinID AND proService != 'None'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getCoinSumByType($coinType, $userID)
    {
        $sql = "
          SELECT COALESCE(sum(purchasePrice), 0.00) 
          FROM collection
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID 
          AND coins.coinType = :coinType";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }

        //$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'") or die(mysql_error());

    }

    public function getCoinProSumByType($coinType, $userID)
    {
        $sql = "
          SELECT COALESCE(sum(purchasePrice), 0.00) 
          FROM collection
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID 
          AND coins.coinType = :coinType AND proService != 'None'";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }

        //$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'  AND proService != 'None'") or die(mysql_error());
    }

    public function getCoinSumById($coinID, $userID)
    {
        $sql = "
          SELECT COALESCE(sum(purchasePrice), 0.00) 
          FROM collection
          WHERE userID = :userID 
          AND coinID = :coinID";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }
    }

    public function getTypeErrorCountByCoinType($userID, $coinType)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType AND collection.errorType != 'None'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND errorType != 'None'") or die(mysql_error());
    }

    //Master report count
    public function getGradedCountById($userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            WHERE collection.userID = :userID AND collection.coinGrade = 'No Grade'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinGrade != 'No Grade' ") or die(mysql_error());
    }

    public function getCertificationCountById($userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            WHERE collection.userID = :userID AND collection.proService != 'None'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND proService != 'None'") or die(mysql_error());
    }

    public function getUngradedCount($userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            WHERE collection.userID = :userID  AND collection.coinGrade = 'No Grade'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinGrade = 'No Grade'") or die(mysql_error());
    }

    public function getGenuineGradeCount($userID, $designation)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.designation = :designation
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':designation', str_replace('_', ' ', $designation), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND designation = '$designation'") or die(mysql_error());
    }

    //////////////By coinCategory count
    //Get type collection
    function getCoinCategoryCollected($userID, $value)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(DISTINCT coins.coinType) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinCategory = :value
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':value', str_replace('_', ' ', $value), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
        //$sql = mysql_query("SELECT DISTINCT coinType FROM collection WHERE coinCategory = '" . $value . "' AND userID = '$userID'") or die(mysql_error());
    }

    public function getUngradedCountById($userID, $coinCategory)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.designation = :designation
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':designation', str_replace('_', ' ', $designation), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        $sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND coinGrade = 'No Grade'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getTypeCertificationCountById($userID, $coinCategory)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinCategory = :coinCategory AND proService != 'None'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND proService != 'None'") or die(mysql_error());
    }

    public function getTypeProofCountById($userID, $coinCategory)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinCategory = :coinCategory AND coins.strike = 'Proof'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND strike = 'Proof'") or die(mysql_error());

    }

    function getProofDistinctCollected($userID, $coinCategory)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(DISTINCT coinID) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinCategory = :coinCategory AND coins.strike = 'Proof'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND strike = 'Proof' AND userID = '$userID'") or die(mysql_error());
    }

    function getTypeProofCountInvestment($userID, $coinCategory)
    {
        $sql = "
          SELECT COALESCE(sum(collection.purchasePrice), 0.00) 
          FROM collection
          INNER JOIN coins ON collection.coinID = coins.coinID 
          WHERE collection.userID = :userID 
          AND coins.coinCategory = :coinCategory AND coins.strike = 'Proof'";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }

        //$sql = mysql_query("SELECT SUM(purchasePrice) FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND strike = 'Proof'") or die(mysql_error());
    }


    public function getTypeErrorCountById($userID, $coinCategory)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(DISTINCT collection.coinID) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinCategory = :coinCategory AND errorType != 'None'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND errorType != 'None'") or die(mysql_error());
    }

    public function getTypeFirstDayCountById($userID, $coinCategory)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(DISTINCT collection.coinID) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinCategory = :coinCategory AND collection.firstday = '1'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND firstday = '1'") or die(mysql_error());
    }

    function totalIDInvestment($coinID)
    {
        $sql = mysql_query("SELECT SUM(collection.purchasePrice) FROM collection WHERE coinID='$coinID'") or die(mysql_error());

        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['SUM(purchasePrice)'];
        }
        return $coinSum;
    }


    //////////////////////////////////////////////////////////Grade reports

    ///////Master grades

    function getMasterGrade($coinGrade, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(*) FROM collection 
          WHERE collection.coinGrade = :coinGrade AND  
          collection.userID = :userID AND collection.proService = 'None'
         ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinGrade', $coinGrade, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID'  AND coinGrade = '$grade' AND proService = 'None'") or die(mysql_error());
    }

    function getMasterProGrade($coinGrade, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(*) FROM collection 
          WHERE collection.coinGrade = :coinGrade AND  
          collection.userID = :userID AND collection.proService != 'None'
         ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinGrade', $coinGrade, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    function getMasterTotalGrade($coinGrade, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(*) FROM collection 
          WHERE collection.coinGrade = :coinGrade AND  
          collection.userID = :userID
         ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinGrade', $coinGrade, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
        // $sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinGrade = '$grade'") or die(mysql_error());
    }

    function getMasterProGrader($proService, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(*) FROM collection 
          WHERE collection.proService = :proService AND  
          collection.userID = :userID
         ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':proService', $proService, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND proService = '$proService'") or die(mysql_error());
    }

    function getDesignationGradeCount($userID, $designation)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(*) FROM collection 
          WHERE collection.designation = :designation 
          AND collection.userID = :userID
         ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':designation', $designation, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND designation = '$designation'") or die(mysql_error());

    }

    function getDesignationDistinctGradeCount($userID, $designation)
    {
        $stmt = $this->db->dbhc->prepare("
          SELECT COUNT(DISTINCT coinID) FROM collection 
          WHERE collection.designation = :designation 
          AND collection.userID = :userID
         ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':designation', $designation, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE userID = '$userID' AND designation = '$designation'") or die(mysql_error());

    }

    function totalDesignationInvestment($userID, $designation)
    {
        $sql = "
          SELECT COALESCE(sum(collection.purchasePrice), 0.00) 
          FROM collection
          WHERE collection.userID = :userID 
          AND collection.designation = :designation";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':designation', str_replace('_', ' ', $designation), PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }

        //$sql = mysql_query("SELECT SUM(purchasePrice) FROM collection WHERE designation = '$designation' AND userID = '$userID'") or die(mysql_error());

    }


//Proofs


////// Category grades
    function getTotalCategoryGradeByStrike($strike, $coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinCategory = :coinCategory 
            AND coins.strike = :strike AND collection.coinGrade != 'No Grade' AND collection.proService = 'None'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->bindValue(':strike', str_replace('_', ' ', $strike), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND strike = '$strike' AND coinGrade != 'No Grade' AND proService = 'None'") or die(mysql_error());

    }

    function getTotalCategoryProGradeByStrike($strike, $coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinCategory = :coinCategory AND coins.strike = :strike AND proService != 'None'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->bindValue(':strike', str_replace('_', ' ', $strike), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND strike = '$strike' AND proService != 'None'") or die(mysql_error());

    }

    public function getCertifiedCategoryCount($coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(DISTINCT coins.coinType) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinCategory = :coinCategory AND collection.proService != 'None'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT DISTINCT coinType FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND  userID = '$userID'  AND proService != 'None'");

    }

    public function getCertifiedTypeCategoryCount($coinCategory, $userID, $proService)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(DISTINCT coins.coinType) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinCategory = :coinCategory AND collection.proService = :proService
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->bindValue(':proService', str_replace('_', ' ', $proService), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
        //$sql = mysql_query("SELECT DISTINCT coinType FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND  userID = '$userID'  AND proService = '$proService' ");
    }


    ///////Type grades
    function getTypeGrade($coinGrade, $coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType AND collection.coinGrade = :coinGrade
            AND collection.proService = 'None'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->bindValue(':coinGrade', str_replace('_', ' ', $coinGrade), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinGrade = '$grade' AND proService = 'None'") or die(mysql_error());
    }

    function getCategoryGrade($coinGrade, $coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinCategory = :coinCategory AND collection.coinGrade = :coinGrade
            AND collection.proService = 'None'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->bindValue(':coinGrade', str_replace('_', ' ', $coinGrade), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND coinGrade = '$grade' AND proService = 'None'") or die(mysql_error());}

    function getCategoryProGrade($coinGrade, $coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
                SELECT COUNT(*) FROM collection 
                INNER JOIN coins ON collection.coinID = coins.coinID 
                WHERE collection.userID = :userID AND coins.coinCategory = :coinCategory AND collection.coinGrade = :coinGrade
                AND proService != 'None'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->bindValue(':coinGrade', str_replace('_', ' ', $coinGrade), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND coinGrade = '$grade' AND proService != 'None'") or die(mysql_error());
    }

    function getCategoryGradedCount($coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
                SELECT COUNT(*) FROM collection 
                INNER JOIN coins ON collection.coinID = coins.coinID 
                WHERE collection.userID = :userID AND coins.coinCategory = :coinCategory
                AND collection.coinGrade != 'No Grade'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND coinGrade != 'No Grade'") or die(mysql_error());
    }

    function getTypeGradedCount($coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
                SELECT COUNT(*) FROM collection 
                INNER JOIN coins ON collection.coinID = coins.coinID 
                WHERE collection.userID = :userID AND coins.coinType = :coinType
                AND collection.coinGrade != 'No Grade'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinGrade != 'No Grade'") or die(mysql_error());
    }

    function getCategoryNoProGradeCount($coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
                SELECT COUNT(*) FROM collection 
                INNER JOIN coins ON collection.coinID = coins.coinID 
                WHERE collection.userID = :userID AND coins.coinCategory = :coinCategory
                AND collection.coinGrade != 'No Grade' AND collection.proService = 'None'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND coinGrade != 'No Grade' AND proService = 'None'") or die(mysql_error());
    }

    function getCategoryProGradeCount($coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
                SELECT COUNT(*) FROM collection 
                INNER JOIN coins ON collection.coinID = coins.coinID 
                WHERE collection.userID = :userID AND coins.coinCategory = :coinCategory
                AND collection.coinGrade != 'No Grade' AND collection.proService != 'None'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND coinGrade != 'No Grade' AND proService != 'None'") or die(mysql_error());
    }

    function getTotalCategoryGrade($coinGrade, $coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
                SELECT COUNT(*) FROM collection 
                INNER JOIN coins ON collection.coinID = coins.coinID 
                WHERE collection.userID = :userID AND coins.coinCategory = :coinCategory
                AND collection.coinGrade = :coinGrade
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->bindValue(':coinGrade', str_replace('_', ' ', $coinGrade), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND coinGrade = '$grade'") or die(mysql_error());
    }


    function getProGrade($coinGrade, $coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
                SELECT COUNT(*) FROM collection 
                INNER JOIN coins ON collection.coinID = coins.coinID 
                WHERE collection.userID = :userID AND coins.coinType = :coinType
                AND collection.coinGrade = :coinGrade AND collection.proService != 'None'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->bindValue(':coinGrade', str_replace('_', ' ', $coinGrade), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinGrade = '$grade' AND proService != 'None'") or die(mysql_error());
    }

    function getTotalTypeGrade($coinGrade, $coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
                SELECT COUNT(*) FROM collection 
                INNER JOIN coins ON collection.coinID = coins.coinID 
                WHERE collection.userID = :userID AND coins.coinType = :coinType
                AND collection.coinGrade = :coinGrade
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->bindValue(':coinGrade', str_replace('_', ' ', $coinGrade), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinGrade = '$grade'") or die(mysql_error());
    }

    function getTotalTypeGradeByStrike($strike, $coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType AND coins.strike = :strike
            AND collection.coinGrade != 'No Grade'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->bindValue(':strike', str_replace('_', ' ', $strike), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND strike = '$strike' AND coinGrade != 'No Grade'") or die(mysql_error());
    }

    function getTotalTypeProGradeByStrike($strike, $coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType AND coins.strike = :strike
            AND collection.proService != 'None'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->bindValue(':strike', str_replace('_', ' ', $strike), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND strike = '$strike' AND proService != 'None'") or die(mysql_error());
    }

    function getTotalTypeNoProGradeByStrike($strike, $coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType AND coins.strike = :strike
            AND collection.proService = 'None' AND coinGrade != 'No Grade'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->bindValue(':strike', str_replace('_', ' ', $strike), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND strike = '$strike' AND proService = 'None' AND coinGrade != 'No Grade'") or die(mysql_error());
    }


    function getProGrader($proService, $coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinCategory = :coinCategory AND collection.proService = :proService
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->bindValue(':proService', str_replace('_', ' ', $proService), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND proService = '$proService'") or die(mysql_error());
    }

    function getTypeProGrader($proService, $coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType AND collection.proService = :proService
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->bindValue(':proService', str_replace('_', ' ', $proService), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND proService = '$proService'") or die(mysql_error());
    }


//type report counts
    /*	function getGradeTypeCount($coinType, $userID){
    $sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '".str_replace('_', ' ', $coinType)."'  AND coinGrade != 'No Grade'") or die(mysql_error());
    return mysql_num_rows($sql);
    }*/
    function getGradeTypeCount($coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType AND collection.coinGradeNum < '71'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinGradeNum < '71'") or die(mysql_error());
    }

    function getNotGradedTypeCount($coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType AND collection.coinGradeNum > '70'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinGradeNum > '70'") or die(mysql_error());
    }

    function getAllGradedTypeCount($coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType AND collection.coinGrade != 'No Grade'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "'  AND coinGrade != 'No Grade'") or die(mysql_error());
    }

    function getGradeProTypeCount($coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType AND collection.proService != 'None'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND proService != 'None'") or die(mysql_error());

    }


    function getBusinessHighGradeNumberByID($coinID, $userID, $strike)
    {
        $sql = mysql_query("SELECT MAX(coinGradeNum) FROM collection WHERE coinGradeNum < '71' AND coinID = '$coinID' AND userID = '$userID' AND strike = '$strike'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            if (mysql_num_rows($sql) == 0) {
                return 'No coins graded';
            } else {
                switch ($strike) {
                    case 'Business':
                        return $this->assignGradePrefix($row['MAX(coinGradeNum)']) . $row['MAX(coinGradeNum)'];
                    case 'Proof':
                        return "PR" . $row['MAX(coinGradeNum)'];
                    default:
                        return 'No coins graded';
                        break;
                }
            }
        }
    }

    function getGradedStrikeCountByType($coinType, $userID, $strike)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection 
              INNER JOIN coins ON collection.coinID = coins.coinID
              WHERE coins.strike = :strike AND coins.coinType = :coinType AND collection.userID = :userID
              AND collection.coinGrade != 'No Grade'  AND collection.proService = 'None'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':strike', str_replace('_', ' ', $strike), PDO::PARAM_STR);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID' AND strike = '$strike' AND coinGrade != 'No Grade'  AND proService = 'None'") or die(mysql_error());
    }

    function getStrikeCountByCategory($coinCategory, $userID, $strike)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection 
              INNER JOIN coins ON collection.coinID = coins.coinID
              WHERE coins.strike = :strike AND coins.coinCategory = :coinCategory AND collection.userID = :userID
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':strike', str_replace('_', ' ', $strike), PDO::PARAM_STR);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID' AND strike = '$strike'") or die(mysql_error());
    }

    function getGradedStrikeCountByCategory($coinCategory, $userID, $strike)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection 
              INNER JOIN coins ON collection.coinID = coins.coinID
              WHERE coins.strike = :strike AND coins.coinCategory = :coinCategory AND collection.userID = :userID
              AND coinGrade != 'No Grade'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':strike', str_replace('_', ' ', $strike), PDO::PARAM_STR);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID' AND strike = '$strike' AND coinGrade != 'No Grade'") or die(mysql_error());
    }

    function getStrikeCountByType($coinType, $userID, $strike)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection 
              INNER JOIN coins ON collection.coinID = coins.coinID
              WHERE coins.strike = :strike AND coins.coinType = :coinType AND collection.userID = :userID
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':strike', str_replace('_', ' ', $strike), PDO::PARAM_STR);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID' AND strike = '$strike'") or die(mysql_error());
    }

    /*function getBusinessHighGradeNumberByType($coinType, $userID, $strike){
    $sql = mysql_query("SELECT MAX(coinGradeNum) FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' AND strike = '$strike'") or die(mysql_error());
    while($row = mysql_fetch_array($sql)){
        if($row['MAX(coinGradeNum)'] == '0'){
            return 'No coins graded';
        } else {
        switch ($strike) {
            case 'Business':
            return $this->assignGradePrefix($row['MAX(coinGradeNum)']). $row['MAX(coinGradeNum)'];
            case 'Proof':
            return "PR". $row['MAX(coinGradeNum)'];
            default:
            return 'No coins graded';
                break;
        }
    }
  }
}*/
    function getBusinessHighGradeNumberByType($coinType, $userID, $strike)
    {
        $sql = mysql_query("SELECT MAX(coinGradeNum) FROM collection WHERE coinGradeNum < '71' AND  coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID' AND strike = '$strike'") or die(mysql_error());
        if (mysql_num_rows($sql) == 0) {
            return 'No coins graded';
        } else {
            while ($row = mysql_fetch_array($sql)) {
                switch ($strike) {
                    case 'Business':
                        return $this->assignGradePrefix($row['MAX(coinGradeNum)']) . $row['MAX(coinGradeNum)'];
                        break;
                    case 'Proof':
                        return "PR" . $row['MAX(coinGradeNum)'];
                        break;
                    /*default:
            return 'No coins graded';
                break;*/
                }
            }
        }
    }

    function assignGradePrefix($coinGradeNum)
    {
        switch ($coinGradeNum) {
            case '1': return "PO"; break;
            case '2': return "FR"; break;
            case '3': return "AG"; break;
            case '4': return "G"; break;
            case '6': return "G"; break;
            case '8': return "VG"; break;
            case '10': return "VG"; break;
            case '12': return "F"; break;
            case '15': return "F"; break;
            case '20': return "VF"; break;
            case '25': return "VF"; break;
            case '30': return "VF"; break;
            case '35': return "VF"; break;
            case '40': return "EF"; break;
            case '45': return "EF"; break;
            case '50': return "AU"; break;
            case '55': return "AU"; break;
            case '58': return "AU"; break;
            case '60': return "MS"; break;
            case '61': return "MS"; break;
            case '62': return "MS"; break;
            case '63': return "MS"; break;
            case '64': return "MS"; break;
            case '65': return "MS"; break;
            case '66': return "MS"; break;
            case '67': return "MS"; break;
            case '68': return "MS"; break;
            case '69': return "MS"; break;
            case '70': return "MS"; break;
            default: return 'No';
        }
    }


//Ungraded counts
    function getNoGradeCount($userID)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection 
              WHERE collection.userID = :userID AND proService = 'None'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND proService = 'None'") or die(mysql_error());
    }

    function getGradeCategoryCount($coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection 
              INNER JOIN coins ON collection.coinID = coins.coinID
              WHERE coinGrade <> 'No Grade' AND coins.coinCategory = :coinCategory AND collection.userID = :userID
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND coinGrade != 'No Grade'") or die(mysql_error());
    }

    function getNoGradeCategoryCount($coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection 
              INNER JOIN coins ON collection.coinID = coins.coinID
              WHERE coinGrade = 'No Grade' AND coins.coinCategory = :coinCategory AND collection.userID = :userID
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND coinGrade = 'No Grade'") or die(mysql_error());
    }

    function getNoGradeTypeCount($coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection 
              INNER JOIN coins ON collection.coinID = coins.coinID
              WHERE proService = 'None' AND coins.coinType = :coinType AND collection.userID = :userID
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "'  AND proService = 'None'") or die(mysql_error());
    }

    function getNoGradeGoldCount($userID)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection 
              INNER JOIN coins ON collection.coinID = coins.coinID
              WHERE collection.proService = 'None' AND coins.coinMetal = 'Gold' AND collection.userID = :userID
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND proService = 'None' AND coinMetal = 'Gold'") or die(mysql_error());
    }

    function getNoGradeStrikeTypeCount($coinType, $userID, $strike)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection 
              INNER JOIN coins ON collection.coinID = coins.coinID
              WHERE coins.strike = :strike AND coins.coinType = :coinType AND collection.userID = :userID
              AND collection.coinGrade = 'No Grade'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':strike', str_replace('_', ' ', $strike), PDO::PARAM_STR);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinGrade = 'No Grade' AND strike = '$strike'") or die(mysql_error());
    }

    /**
     * Coins graded by coinID
     * @param $proService
     * @param $userID
     * @param $coinID
     * @return mixed
     */
    function getCoinIDProGrader($proService, $userID, $coinID)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection 
              WHERE collection.coinID = :coinID AND collection.proService = :proService AND collection.userID = :userID
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->bindValue(':proService', str_replace('_', ' ', $proService), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND proService = '" . str_replace('_', ' ', $proService) . "' AND coinID = '$coinID'") or die(mysql_error());
    }

/////////////////////////////////////////////////////////////////////////////////////ERROR REPORTS/////////////
    //ERROR report

    /**
     * Full count of collected error coins
     * @param $userID
     * @return mixed
     */
    function getUserError($userID)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection 
              WHERE collection.errorCoin = '1' AND collection.userID = :userID
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND errorCoin = '1' ") or die(mysql_error());
    }

    /**
     * Total purchase price of collected errors
     * @param $userID
     * @return string
     */
    function getUserErrorSum($userID)
    {
        $sql = "
          SELECT COALESCE(sum(collection.purchasePrice), 0.00) 
          FROM collection
          WHERE collection.userID = :userID 
          AND collection.errorCoin = '1'";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }

        //$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE errorCoin = '1' AND userID = '$userID'") or die(mysql_error());
    }

    /**
     * Count of Non Graded errors
     * @param $errorType
     * @param $userID
     * @return mixed
     */
    function getError($errorType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection 
              WHERE collection.errorType = :errorType AND collection.userID = :userID
              AND proService = 'None'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':errorType', str_replace('_', ' ', $errorType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND errorType = '" . str_replace('_', ' ', $errorType) . "' AND proService = 'None'") or die(mysql_error());
    }

    /**
     * Count of Graded errors
     * @param $errorType
     * @param $userID
     * @return mixed
     */
    function getProError($errorType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection 
              WHERE collection.errorType = :errorType AND collection.userID = :userID
              AND proService != 'None'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':errorType', str_replace('_', ' ', $errorType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND errorType = '" . str_replace('_', ' ', $errorType) . "' AND proService != 'None'") or die(mysql_error());
    }

//type
    function getUserTypeError($userID, $coinType)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection
              INNER JOIN coins ON collection.coinID = coins.coinID
              WHERE coins.coinType = :coinType AND collection.userID = :userID
              AND collection.errorCoin = '1' 
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND errorCoin = '1' ") or die(mysql_error());
    }

    function getUserTypeErrorSum($userID, $coinType)
    {
        $sql = "
          SELECT COALESCE(sum(collection.purchasePrice), 0.00) 
          FROM collection
          INNER JOIN coins ON collection.coinID = coins.coinID 
          WHERE collection.userID = :userID 
          AND coins.coinType = :coinType AND coins.errorCoin = '1'";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }

        //$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE errorCoin = '1' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'") or die(mysql_error());
    }

    function getTypeError($errorType, $coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection
              INNER JOIN coins ON collection.coinID = coins.coinID
              WHERE coins.coinType = :coinType AND collection.userID = :userID
              AND proService = 'None' AND collection.errorType = :errorType 
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':errorType', str_replace('_', ' ', $errorType), PDO::PARAM_STR);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "'  AND errorType = '" . str_replace('_', ' ', $errorType) . "' AND proService = 'None'") or die(mysql_error());
    }

    function getTypeProError($errorType, $coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection
              INNER JOIN coins ON collection.coinID = coins.coinID
              WHERE coins.coinType = :coinType AND collection.userID = :userID
              AND proService != 'None' AND collection.errorType = :errorType 
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':errorType', str_replace('_', ' ', $errorType), PDO::PARAM_STR);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "'  AND errorType = '" . str_replace('_', ' ', $errorType) . "' AND proService != 'None'") or die(mysql_error());
    }

//category
    function getUserCategoryError($userID, $coinCategory)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection
              INNER JOIN coins ON collection.coinID = coins.coinID
              WHERE coins.coinCategory = :coinCategory AND collection.userID = :userID
              AND collection.errorCoin = '1' 
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND errorCoin = '1' ") or die(mysql_error());
    }

    function getUserCategoryErrorSum($userID, $coinCategory)
    {
        $sql = "
          SELECT COALESCE(sum(collection.purchasePrice), 0.00) 
          FROM collection
          INNER JOIN coins ON collection.coinID = coins.coinID 
          WHERE collection.userID = :userID 
          AND coins.coinCategory = :coinCategory AND coins.errorCoin = '1'";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }

        //$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE errorCoin = '1' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());
    }

    /**
     * Ungraded Errors by category
     * @param $errorType
     * @param $coinCategory
     * @param $userID
     * @return mixed
     */
    function getCategoryError($errorType, $coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection
              INNER JOIN coins ON collection.coinID = coins.coinID
              WHERE coins.coinCategory = :coinCategory AND collection.userID = :userID
              AND proService = 'None' AND collection.errorType = :errorType 
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':errorType', str_replace('_', ' ', $errorType), PDO::PARAM_STR);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND errorType = '" . str_replace('_', ' ', $errorType) . "' AND proService = 'None'") or die(mysql_error());
    }

    /**
     * Graded Errors by category
     * @param $errorType
     * @param $coinCategory
     * @param $userID
     * @return mixed
     */
    function getCategoryProError($errorType, $coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection
              INNER JOIN coins ON collection.coinID = coins.coinID
              WHERE coins.coinCategory = :coinCategory AND collection.userID = :userID
              AND proService != 'None' AND collection.errorType = :errorType 
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':errorType', str_replace('_', ' ', $errorType), PDO::PARAM_STR);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "'  AND errorType = '" . str_replace('_', ' ', $errorType) . "' AND proService != 'None'") or die(mysql_error());
    }

    function checkCoin($userID, $collectfolderID)
    {
        if ($this->collectfolderID == '0') {
            $image = "blank.jpg";
        } else {
            //$image = $coinType . '.jpg';
        }
    }

/////////////////////////////////////////////////////////////////////////////////////DAMAGE REPORTS/////////////


//BY COIN
    /**
     * @param $damage
     * @param $coinID
     * @param $userID
     * @return mixed
     */
    function getCoinDamageType($damage, $coinID, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            WHERE collection.userID = :userID AND collection.coinID = :coinID AND collection.damage = '0'
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '" . $coinID . "' AND $damage != '0'") or die(mysql_error());
    }


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//View coin and type bulk reports
//BY COIN
    function getCoinRollCountByID($coinID, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collectrolls 
            WHERE userID = :userID AND coinID = :coinID
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collectrolls WHERE coinID = '$coinID' AND userID = '$userID'") or die(mysql_error());
    }

    function getCoinBoxCountByID($coinID, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collectboxes 
            WHERE userID = :userID AND coinID = :coinID
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collectboxes WHERE coinID = '$coinID' AND userID = '$userID'") or die(mysql_error());
    }

    function getCoinBagCountByID($coinID, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collectbags 
            WHERE userID = :userID AND coinID = :coinID
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collectbags WHERE coinID = '$coinID' AND userID = '$userID'") or die(mysql_error());
    }

    function getCoinCertifiedCountByID($coinID, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            WHERE userID = :userID AND coinID = :coinID
            AND proService != 'None'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinIDNum' AND userID = '$userID' AND proService != 'None'") or die(mysql_error());
    }

    function getCoinRollCountByCoinID($coinID, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            WHERE userID = :userID AND coinID = :coinID
            AND collectrollsID != '0'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID' AND collectrollsID != '0' ") or die(mysql_error());
    }

    function getCoinFolderCountByCoinID($coinID, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collectrolls 
            WHERE userID = :userID AND coinID = :coinID
            AND collectfolderID != '0'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID' AND collectfolderID != '0' ") or die(mysql_error());
    }

    function getCoinSetsCountByCoinID($coinID, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collectrolls 
            WHERE userID = :userID AND coinID = :coinID
            AND collectsetID != '0'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID' AND collectsetID != '0' ") or die(mysql_error());
    }

    function getCoinCertListCountByCoinID($coinID, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collectrolls 
            WHERE userID = :userID AND coinID = :coinID
            AND certlist = '1'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID' AND certlist = '1' ") or die(mysql_error());
    }

//BY COIN TYPE
    function getCoinRollCountByType($coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collectrolls 
            WHERE userID = :userID AND coinType = :coinType
            AND certlist = '1'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collectrolls WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'") or die(mysql_error());
    }

    function getCoinBoxCountByType($coinType, $userID)
    {
        /*echo $this->user, $userID; die;
        if($userID !== $this->user){
            throw new Exception('User is not authorized');
        }*/
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collectboxes 
            WHERE userID = :userID AND coinType = :coinType
            AND certlist = '1'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collectboxes WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'") or die(mysql_error());
    }

    function getCoinBagCountByType($coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collectbags 
            WHERE userID = :userID AND coinType = :coinType
            AND certlist = '1'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collectbags WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'") or die(mysql_error());
    }

    function availableTypeCoinsRequest($coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType
            AND collection.proservice = 'None' AND collection.collectfolderID = '0' AND collection.collectrollsID = '0' AND collection.collectsetID = '0' AND collection.setregID = '0'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND proservice = 'None' AND collectfolderID = '0' AND collectrollsID = '0' AND collectsetID = '0' AND setregID = '0' AND userID = '$userID'");
    }

    function availableCategoryCoinsRequest($coinCategory, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinCategory = :coinCategory
            AND collection.proservice = 'None' AND collection.collectfolderID = '0' AND collection.collectrollsID = '0' AND collection.collectsetID = '0' AND collection.setregID = '0'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND proservice = 'None' AND collectfolderID = '0' AND collectrollsID = '0' AND collectsetID = '0' AND setregID = '0' AND userID = '$userID'");
    }

    function gexMaxTypeRollNumberDisplay($coinType, $userID)
    {
        $CoinTypes = new CoinTypes();
        $CoinTypes->getCoinByType($coinType);
        $available = $this->availableTypeCoinsRequest($coinType, $userID);
        $max = $CoinTypes->getRollCount();
        switch ($available) {
            case $available >= $max:
                $num = $max;
                break;
            case $available < $max:
                $num = $available;
                break;
        }
        return $num;
    }

    function gexMaxCategoryRollNumberDisplay($coinCategory, $userID)
    {
        $CoinCategories = new CoinCategories();
        $CoinCategories->getCoinByCategory($coinCategory);
        $available = $this->availableTypeCoinsRequest($coinCategory, $userID);
        $max = $CoinCategories->getRollCount();
        switch ($available) {
            case $available >= $max:
                $num = $max;
                break;
            case $available < $max:
                $num = $available;
                break;
        }
        return $num;
    }

    function autoInsertCoinTypeIntoRoll($coinType, $collectrollsID, $userID)
    {
        $CoinTypes = new CoinTypes();
        $CoinTypes->getCoinByType($coinType);
        $sql = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND proservice = 'None' AND collectfolderID = '0' AND collectrollsID = '0' AND collectsetID = '0' AND setregID = '0' AND userID = '$userID' LIMIT " . $CoinTypes->getRollCount() . " ");
        while ($row = mysql_fetch_array($sql)) {
            mysql_query("UPDATE collection SET collectrollsID = '$collectrollsID' WHERE collectionID = '" . $row['collectionID'] . "'") or die(mysql_error());
        }
        return;
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Folder coins

    /**
     * Get collection ID from user/folder combo
     * @param $coinID
     * @param $collectfolderID
     * @param $userID
     * @return mixed
     */
    function getCollectionCoinByCoinID($coinID, $collectfolderID, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinID = :coinID
            AND collection.collectfolderID = :collectfolderID
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':collectfolderID', $collectfolderID, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['collectionID'];

        /*$sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID' AND collectfolderID = '$collectfolderID'") or die(mysql_error());
        $collectionID = $row['collectionID'];*/
    }

    /**
     * Get all folders by coin type
     * {@internal collectfolder function}}
     *
     * @param $coinType
     * @param $userID
     * @return mixed
     */
    function getFoldersCollectedByCoinType($coinType, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collectfolder 
            WHERE collectfolder.userID = :userID AND collectfolder.coinType = :coinType
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collectfolder WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'") or die(mysql_error());
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Get bulk link viewCoinDetail.php
    function getRollHolderNumber($collectionID, $userID)
    {
        $collectionRolls = new CollectionRolls();
        $Encryption = new Encryption();
        $html = '';

        $stmt = $this->db->dbhc->prepare("
            SELECT * FROM collection     
            WHERE userID = :userID
            AND collectionID = :collectionID
            LIMIT 1
        ");
        $stmt->execute(array(':userID' => $this->user, ':collectionID' => $collectionID));

        //$sql = mysql_query("SELECT * FROM collection WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row['collectrollsID'] == 0) {
            $html = 'Coin not stored in a roll.';
        } else {

            $collectionRolls->getCollectionRollById(intval($row['collectrollsID']));

            switch ($collectionRolls->getRollType()) {

                case 'Same Coin':
                    $html .= '<a href="viewSameRollDetail.php?ID=' . $Encryption->encode(intval($row['collectrollsID'])) . '">' . $collectionRolls->getRollNickname() . '</a>';
                    break;
                case 'Mint':
                    $html .= '<a href="viewMintRollDetail.php?ID=' . $Encryption->encode(intval($row['collectrollsID'])) . '">' . $collectionRolls->getRollNickname() . '</a>';
                    break;
                case 'Date Range':
                    $html .= '<a href="viewDateRollDetail.php?ID=' . $Encryption->encode(intval($row['collectrollsID'])) . '">' . $collectionRolls->getRollNickname() . '</a>';
                    break;
                case 'Mixed Type':
                    $html .= '<a href="viewMixedRollDetail.php?ID=' . $Encryption->encode(intval($row['collectrollsID'])) . '">' . $collectionRolls->getRollNickname() . '</a>';
                    break;
                case 'Same Year':
                    $html .= '<a href="viewYearRollDetail.php?ID=' . $Encryption->encode(intval($row['collectrollsID'])) . '">' . $collectionRolls->getRollNickname() . '</a>';
                    break;
                case 'Same Type':
                    $html .= '<a href="viewTypeRollDetail.php?ID=' . $Encryption->encode(intval($row['collectrollsID'])) . '">' . $collectionRolls->getRollNickname() . '</a>';
                    break;

            }
            $html .= '&nbsp;<form method="post" action="" class="compactForm">';
            $html .= '<input name="ID" type="hidden" value="' . $Encryption->encode($collectionID) . '" />';
            $html .= '<input name="rollCoinBtn" type="submit" value="Remove" onclick="return confirm(\'Remove Coin?\')" class="removeCoinBtn" />';
            $html .= '</form>';

        }
        return $html;
    }

    function getFolderHolderNumber($collectionID, $userID)
    {
        $Encryption = new Encryption();
        $this->getCollectionById($collectionID);
        $collectionFolder = new CollectionFolder();
        $collectionFolder->getCollectionFolderById($this->getCollectionFolder());

        $folderNickname = $collectionFolder->getFolderNickname();

        /*switch ($this->getCollectionFolder()) {
    case '0':
     $html = 'Coin not stored in folder.';
    default:
        $html = '<a href="viewFolderDetail.php?ID='.$Encryption->encode($this->getCollectionFolder()).'">'.$folderNickname.'</a> ';
         $html .= ' <form method="post" action="" class="compactForm">';
          $html.= '<input name="ID" type="hidden" value="'.$Encryption->encode($collectionID).'" />';
         $html .= '<input name="folderCoinBtn" type="submit" value="Remove" onclick="return confirm(\'Remove Coin?\')" class="removeCoinBtn" />';
         $html .= '</form>';
        break;

}*/
        if ($this->getCollectionFolder() == '0') {
            $html = 'Coin not stored in folder.';
        } else {
            $html = '<a href="viewFolderDetail.php?ID=' . $Encryption->encode($this->getCollectionFolder()) . '">' . $folderNickname . '</a> ';
            $html .= ' <form method="post" action="" class="compactForm">';
            $html .= '<input name="ID" type="hidden" value="' . $Encryption->encode($collectionID) . '" />';
            $html .= '<input name="folderCoinBtn" type="submit" value="Remove" onclick="return confirm(\'Remove Coin?\')" class="removeCoinBtn" />';
            $html .= '</form>';
        }
        return $html;
    }

    function getSetHolderNumber($collectionID, $userID)
    {
        $Encryption = new Encryption();
        $sql = mysql_query("SELECT * FROM collection WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $collectsetID = $row['collectsetID'];

        $CollectionSet = new CollectionSet();
        $CollectionSet->getCollectionSetById($collectsetID);

        $setNickname = $CollectionSet->getSetNickname();

        switch ($collectsetID) {
            case '0':
                $bulkLink = 'Coin not stored in a set.';
                return $bulkLink;
            default:
                $bulkLink = '<a href="viewSetDetail.php?ID=' . $Encryption->encode($collectsetID) . '">' . $setNickname . '</a>';
                return $bulkLink;
                break;
        }
        return $collectsetID;
    }

    function getPurchaseDetails($collectionID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $purchaseFrom = $row['purchaseFrom'];
        $ebaySellerID = $row['ebaySellerID'];
        $auctionNumber = $row['auctionNumber'];
        $shopName = $row['shopName'];
        $shopUrl = $row['shopUrl'];
        $additional = $row['additional'];

        switch ($row['purchaseFrom']) {
            case 'eBay':
                $purchaseInfo = '
	 <table width="600" border="1" id="purchaseTbl">
  <tr>
    <td colspan="2"><h3>eBay</h3></td>
    </tr>
  <tr>
    <td width="150"> <strong>Seller ID: </strong></td>
    <td width="434">' . $ebaySellerID . '</td>
  </tr>
  <tr>
    <td><strong>Auction #:</strong></td>
    <td>' . $auctionNumber . '</td>
  </tr>
</table>
	 ';
                return $purchaseInfo;
                break;
            case 'Coin Shop':
                $purchaseInfo = '
	 <table width="600" border="1" id="purchaseTbl">
  <tr>
    <td colspan="2"><h3>Coin Shop</h3></td>
    </tr>
  <tr>
    <td width="150"> <strong>Shop Name: </strong></td>
    <td width="434">' . $shopName . '</td>
  </tr>
  <tr>
    <td><strong>Website:</strong></td>
    <td>' . $shopUrl . '</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
	 ';
                return $purchaseInfo;
                break;
            case 'Other':
                $purchaseInfo = '
<table width="100%" border="1" id="purchaseTbl">
  <tr>
    <td ><h3>' . $additional . '</h3></td>
    </tr>
  <tr>
    <td></td>
  </tr>
  </table>
	 ';
                return $purchaseInfo;
                break;
            //default:
            case 'None':
                $purchaseInfo = 'None';
                return $purchaseInfo;
                break;
        }
        return $purchaseInfo;
    }


    /*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////master report functions//////////////////////////////////////////////////////////////////////////////
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//By denomination

    function getMasterCoinCountByCoinCategory($coinCategory, $userID)
    {
        $sql = "
          SELECT COUNT(*) 
          FROM collection
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID 
          AND coins.coinCategory = :coinCategory";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());
    }

/////Investment Totals
    function getMasterCoinSumByCoinCategory($coinCategory, $userID)
    {
        $sql = "CALL UserTotalInvestmentSumByCategory(:userID, :coinCategory)";

        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinCategory', str_replace('_', ' ', $coinCategory), PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }
    }

    function getSumTypeCount($coinType, $userID)
    {
        $sql = "CALL UserTotalInvestmentSumByType(:userID, :coinType)";

        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }
    }

//Get collected pieces
    function getReportTypeCount($coinType, $userID)
    {
        $sql = "
          SELECT COUNT(*) 
          FROM collection
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID 
          AND coins.coinType = :coinType";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

//Bt category
    function getMasterRollCountByCoinCategory($coinCategory, $userID)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function totalCoinCategoryInvestment($coinID, $userID)
    {
        $sql = "
          SELECT COALESCE(sum(collection.purchasePrice), 0.00) 
          FROM collection
          WHERE collection.userID = :userID 
          AND collection.coinID = :coinID
         ";

        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() == 1) {
            return $row['COALESCE(sum(purchasePrice), 0.00)'];
        } else {
            return '0.00';
        }

        //$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinID = '$coinID' AND userID = '$userID'") or die(mysql_error());
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ADMIN AREA

    function totalCoinsByUser($userID)
    {
        $sql = "
          SELECT COUNT(*) 
          FROM collection
          WHERE collection.userID = :userID";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->execute([':userID' => $this->user]);
        return $stmt->fetchColumn();
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Club area

    function getCoinMemberCoins($clubmember)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE userID = '$clubmember'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Page elements area


    /**
     * @param $coinID
     * @param $userID
     * @param $mintMark
     * @return string
     */
    function getMintMarkImageByID($coinID, $userID, $mintMark)
    {
        $sql = "
          SELECT COUNT(*) 
          FROM collection
          INNER JOIN coins ON collection.coinID = coins.coinID
          WHERE collection.userID = :userID AND (coins.coinID = :coinID OR coins.mintMark = :mintMark)
         ";
        $stmt = $this->db->dbhc->prepare($sql);
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->bindValue(':mintMark', str_replace('_', ' ', $mintMark), PDO::PARAM_STR);
        $stmt->execute();

        if(count($stmt->fetch(PDO::FETCH_ASSOC)) === 0){
            return "blank.jpg";
        }

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $coinVersion = str_replace(' ', '_', $row['coinVersion']);
        }
        return $coinVersion . '.jpg';


        /*$countAll = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' OR mintMark = '$mintMark' AND userID = '$userID'") or die(mysql_error())
        if ($img_check == 0) {

        } else {
            while ($row = mysql_fetch_array($countAll)) {
                $coinVersion = str_replace(' ', '_', $row['coinVersion']);
                return $coinVersion . '.jpg';
            }

        }*/
    }

    function getImageByID($coinID, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID'") or die(mysql_error());
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

    function getKennedyMetalImg($coinType, $coinSubCategory, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinSubCategory = '$coinSubCategory' AND userID = '$userID'") or die(mysql_error());
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

    function getEightyTwoVarietyImg($coinID, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            while ($row = mysql_fetch_array($countAll)) {
                $coinType = str_replace(' ', '_', $row['coinType']);
                return $coinType . '.jpg';
            }

        }
    }

    function getIndianHeadFlatImg($userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID = '3598' OR coinID = '3599' OR coinID = '3600' AND userID = '$userID'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            return 'Indian_Head_Flat.jpg';
        }
    }

    function getIndianHeadShallowImg($userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID = '3601' OR coinID = '3602' OR coinID = '3603'  OR coinID = '3604'  OR coinID = '4040'  OR coinID = '3605'  OR coinID = '3606'  OR coinID = '3607'   OR coinID = '3608'  OR coinID = '3609'  OR coinID = '3611'  OR coinID = '3625' AND userID = '$userID'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            return 'Indian_Head_Shallow.jpg';
        }
    }

    function getIndianHeadBoldImg($userID)
    {
        $values = array(3612, 3614, 3616, 3618, 3622, 3623, 3624, 3626, 3627, 3628, 3629, 3630, 3631, 3632, 3633, 3634, 3637, 3640, 3641, 3642, 3643, 3644, 3645, 3647, 3648, 3649, 3650, 3651, 3652, 3653, 3654, 3655, 3656, 3657, 3658, 3659, 3660, 3661, 3662);

        $countAll = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID IN('" . implode("', '", $values) . "')") or die(mysql_error());

        //$countAll = mysql_query("SELECT * FROM collection WHERE coinID IN ('".implode(',', $values)."'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            return 'Indian_Head_Bold.jpg';
        }
    }

    function getSeatedNoMottoImg($userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID >= '2473' AND coinID <= '2514' AND userID = '$userID'") or die(mysql_error());

        //$countAll = mysql_query("SELECT * FROM collection WHERE coinID IN ('".implode(',', $values)."'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            return 'Seated_Liberty_Half_Dollar_Arrows_Rays.jpg';
        }
    }

    function getSeatedArrowsAndRaysImg($userID)
    {
        $values = array(2515, 2516);

        $countAll = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID IN('" . implode("', '", $values) . "')") or die(mysql_error());

        //$countAll = mysql_query("SELECT * FROM collection WHERE coinID IN ('".implode(',', $values)."'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            return 'Seated_Liberty_Half_Dollar_Arrows_Rays.jpg';
        }
    }

//
    function getSeatedHalfImg($userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID >= '2517' AND coinID <= '2604' AND userID = '$userID'") or die(mysql_error());

        //$countAll = mysql_query("SELECT * FROM collection WHERE coinID IN ('".implode(',', $values)."'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            return 'Seated_Liberty_Half_Dollar.jpg';
        }
    }

    function getSeatedHalfProofImg($userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID >= '5081' AND coinID <= '5111' AND userID = '$userID'") or die(mysql_error());

        //$countAll = mysql_query("SELECT * FROM collection WHERE coinID IN ('".implode(',', $values)."'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            return 'Seated_Liberty_Half_Dollar_Proof.jpg';
        }
    }

    function getFranklinHalfProofImg($userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID >= '5081' AND coinID <= '5111' AND userID = '$userID'") or die(mysql_error());

        //$countAll = mysql_query("SELECT * FROM collection WHERE coinID IN ('".implode(',', $values)."'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            return 'Seated_Liberty_Half_Dollar_Proof.jpg';
        }
    }

    function getBarberQuarterTypeIImg($userID)
    {
        $values = array(1493, 1494, 1495);

        $countAll = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID IN('" . implode("', '", $values) . "')") or die(mysql_error());

        //$countAll = mysql_query("SELECT * FROM collection WHERE coinID IN ('".implode(',', $values)."'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            return 'Barber_Quarter_Type.jpg';
        }
    }

    function getBarberQuarterTypeIIImg($userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID >= '1496' AND coinID <= '1518' AND userID = '$userID'") or die(mysql_error());

        //$countAll = mysql_query("SELECT * FROM collection WHERE coinID IN ('".implode(',', $values)."'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            return 'Barber_Quarter_Type.jpg';
        }
    }

    function getBarberQuarterTypeIIIImg($userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID >= '1519' AND coinID <= '1566' AND userID = '$userID'") or die(mysql_error());

        //$countAll = mysql_query("SELECT * FROM collection WHERE coinID IN ('".implode(',', $values)."'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            return 'Barber_Quarter_Type.jpg';
        }
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//GOLD
    //Total Collected
    public function getTotalCollectedGoldByID($coinMetal, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(*) FROM collection
              INNER JOIN coins ON collection.coinID = coins.coinID
              WHERE coins.coinMetal = :coinMetal AND collection.userID = :userID
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinMetal', str_replace('_', ' ', $coinMetal), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinMetal = '$coinMetal' AND userID = '$userID'") or die(mysql_error());
    }

    public function getTotalInvestmentSumByCoinMetal($coinMetal, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinMetal = '$coinMetal' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getTypeCollectionProgressByCoinMetal($coinMetal, $userID)
    {
        $stmt = $this->db->dbhc->prepare("
              SELECT COUNT(DISTINCT coins.coinType) FROM collection
              INNER JOIN coins ON collection.coinID = coins.coinID
              WHERE coins.coinMetal = :coinMetal AND collection.userID = :userID
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinMetal', str_replace('_', ' ', $coinMetal), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT DISTINCT coinType FROM collection WHERE coinMetal = '$coinMetal' AND  userID = '$userID'");
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//COMMEMORATIVES
    //Total Collected

    public function getTotalCollectedCommemorativeByID($userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE commemorative != '0' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getCoinVersionType($coinVersion)
    {
        $sql = mysql_query("SELECT * FROM coins WHERE coinVersion = '$coinVersion'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinType = strip_tags($row['coinType']);
        }
        return $coinType;
    }


    function getImageByYear($coinYear, $coinType, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinYear = '$coinYear' AND userID = '$userID'") or die(mysql_error());
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

    function getReportVersionCount($commemorativeType, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE commemorativeType = '" . str_replace('_', ' ', $commemorativeType) . "' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function getCommemorativeTypeProCount($commemorativeType, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE commemorativeType = '" . str_replace('_', ' ', $commemorativeType) . "' AND userID = '$userID' AND proService != 'None'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function getCommemorativeTypeProofCount($commemorativeType, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE commemorativeType = '" . str_replace('_', ' ', $commemorativeType) . "' AND userID = '$userID' AND strike = 'Proof'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getTotalInvestmentSumByCommemorativeType($commemorativeType, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE commemorativeType = '$commemorativeType' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getTotalCommemorativeTypeFaceVal($commemorativeType, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(denomination), 0.00) FROM collection WHERE userID = '$userID' AND commemorativeType = '$commemorativeType'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(denomination), 0.00)'];
        }
        return $coinSum;
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Key date reports
    public function getKeyCollectionById($userID)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE userID = '$userID' AND keyDate = '1'") or die(mysql_error());
        return mysql_num_rows($sql);
    }


    function getKeyImg($coinID, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID'") or die(mysql_error());
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


    public function getKeySumByAccount($userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE  userID = '$userID' AND keyDate = '1'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public function getKeyCollectionCountById($userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID'  AND keyDate = '1' ") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getKeyUngradedCountById($userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND keyDate = '1' AND coinGrade = 'No Grade'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getKeyCertificationCountById($userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND keyDate = '1' AND proService != 'None'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public function getKeyProofCountById($userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND keyDate = '1' AND strike = 'Proof'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function getKeyMasterProGrader($proService, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND proService = '$proService' AND keyDate = '1'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function getKeyMasterGrade($grade, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID'  AND coinGrade = '$grade' AND proService = 'None' AND keyDate = '1'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function getKeyMasterProGrade($grade, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID'  AND coinGrade = '$grade' AND proService != 'None' AND keyDate = '1'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function getKeyMasterTotalGrade($grade, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinGrade = '$grade' AND keyDate = '1'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function getKeyCertCategoryImage($type, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $type) . "' AND userID = '$userID' AND keyDate = '1' AND proService != 'None'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check > 0) {
            $type = str_replace(' ', '_', $type);
            $image = $type . '.jpg';
        } else {
            $image = "slabGraded.jpg";
        }
        return $image;
    }

    public
    function getKeyGradedCountById($userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinGrade != 'No Grade' AND keyDate = '1'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public
    function getUngradedKeyCount($userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinGrade = 'No Grade' AND keyDate = '1'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

//Total category
    public
    function getTotalCollectedKeyCoinsByID($coinCategory, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID' AND keyDate = '1'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public
    function getTotalInvestmentSumByKeyCategory($coinCategory, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID' AND keyDate = '1'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public
    function getUniqueKeyByCategory($coinCategory, $userID)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID' AND keyDate = '1'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public
    function getKeyGradedByCategory($coinCategory, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND  userID = '$userID' AND coinGrade != 'No Grade' AND keyDate = '1'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public
    function getUngradedKeyByCategory($coinCategory, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND  userID = '$userID' AND coinGrade = 'No Grade' AND keyDate = '1'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

//Type
    public
    function getTypeKeyCount($coinType, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID' AND keyDate = '1'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public
    function getTotalInvestmentSumByKeyType($coinType, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID' AND keyDate = '1'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public
    function getUniqueKeyByType($coinType, $userID)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID' AND keyDate = '1'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public
    function getKeyGradedByType($coinType, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND  userID = '$userID' AND coinGrade != 'No Grade' AND keyDate = '1'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public
    function getUngradedKeyByType($coinType, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND  userID = '$userID' AND coinGrade = 'No Grade' AND keyDate = '1'") or die(mysql_error());
        return mysql_num_rows($sql);
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//By year
    function getCoinImageByYear($coinYear, $coinCategory, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND coinYear = '$coinYear' AND userID = '$userID'") or die(mysql_error());
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

//////////////////////////////date sets

//Getting percent collected
    function getNumOfByMintCoinThisYear($coinYear, $coinType)
    {
        $countAll = mysql_query("SELECT * FROM coins WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinYear = '$coinYear' AND byMint = '1'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    function getNumOfCoinThisYear($coinYear, $coinType)
    {
        $countAll = mysql_query("SELECT * FROM coins WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinYear = '$coinYear'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    function getNumOfCoinSavedThisYear($coinYear, $coinType, $userID)
    {
        $countAll = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinYear = '$coinYear' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    function getNumOfByMintCoinSavedThisYear($coinYear, $coinType, $userID)
    {
        $countAll = mysql_query("SELECT DISTINCT mintMark FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinYear = '$coinYear' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    function getAllCoinThisYear($coinYear, $coinType, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinYear = '$coinYear' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

///

    function getDateSetByYear($coinYear, $coinCategory, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND coinYear = '$coinYear' AND userID = '$userID'") or die(mysql_error());
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

    public
    function getCollectionUniqueYearCountByType($userID, $coinType)
    {
        $sql = mysql_query("SELECT COUNT(DISTINCT coinYear) FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND  userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getUniqueYearTypeCount($userID, $coinType)
    {
        $sql = mysql_query("SELECT COUNT(coinYear) FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND  userID = '$userID'  GROUP BY coinYear");
        return mysql_num_rows($sql);
    }

    public
    function dateSetCollectedNums($coinType, $userID)
    {
        $sql = mysql_query("SELECT COUNT(DISTINCT coinYear) as num FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND  userID = '$userID'");
        $total = mysql_fetch_array($sql);
        return $total['num'];
    }

    public
    function dateSetNums($coinType)
    {
        $sql = mysql_query("SELECT COUNT(DISTINCT coinYear) AS num FROM coins WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinYear <= " . date('Y') . "");
        $total = mysql_fetch_array($sql);
        return $total['num'];
    }

    public
    function yearMintMarkNums($coinType, $coinYear)
    {
        $sql = mysql_query("SELECT DISTINCT mintMark FROM coins WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinYear = '$coinYear' ");
        return mysql_num_rows($sql);
    }

    public
    function yearMintMarkCollectedNums($coinType, $coinYear, $userID)
    {
        $sql = mysql_query("SELECT DISTINCT mintMark FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinYear = '$coinYear' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Coin subcategory

    public
    function getCollectionUniqueCountBySubCategory($userID, $coinSubCategory, $coinType)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinSubCategory = '" . str_replace('_', ' ', $coinSubCategory) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCollectionCountBySubCategory($userID, $coinSubCategory, $coinType)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinSubCategory = '" . str_replace('_', ' ', $coinSubCategory) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCoinSumBySubCategory($userID, $coinSubCategory, $coinType)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection  WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinSubCategory = '" . str_replace('_', ' ', $coinSubCategory) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Coin versions

    public
    function getCollectionUniqueCountByVersion($userID, $coinVersion)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinVersion = '" . str_replace('_', ' ', $coinVersion) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCollectionCountByVersion($userID, $coinVersion)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinVersion = '" . str_replace('_', ' ', $coinVersion) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCoinSumByVersion($userID, $coinVersion)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection  WHERE  coinVersion = '" . str_replace('_', ' ', $coinVersion) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public
    function getProofCountByVersion($userID, $coinVersion)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinVersion = '" . str_replace('_', ' ', $coinVersion) . "' AND strike = 'Proof' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getProblemCountByVersion($userID, $coinVersion)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinVersion = '" . str_replace('_', ' ', $coinVersion) . "' AND problem != '0' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getErrorCountByVersion($userID, $coinVersion)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinVersion = '" . str_replace('_', ' ', $coinVersion) . "' AND errorType != 'None' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCertifiedCountByVersion($userID, $coinVersion)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinVersion = '" . str_replace('_', ' ', $coinVersion) . "' AND proService != 'None' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getFirstDayCountByVersion($userID, $coinVersion)
    {
        $sql = mysql_query("SELECT * FROM collectfirstday WHERE coinVersion = '" . str_replace('_', ' ', $coinVersion) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getMintRollCountByVersion($userID, $coinVersion)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE coinVersion = '" . str_replace('_', ' ', $coinVersion) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//BY DESIGN

    public
    function getCollectionCountByDesignByYear($userID, $setYear, $design)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE design = '$design' AND userID = '$userID' AND coinYear = '$setYear'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public
    function getCoinSumByDesignByYear($userID, $setYear, $design)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection  WHERE design = '$design' AND userID = '$userID' AND coinYear = '$setYear'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public
    function getCollectionUniqueCountByDesign($userID, $design)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE design = '" . str_replace('_', ' ', $design) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCollectionCountByDesign($userID, $design)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE design = '" . str_replace('_', ' ', $design) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCoinSumByDesign($userID, $design)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection  WHERE  design = '" . str_replace('_', ' ', $design) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public
    function getProofCountByDesign($userID, $design)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE design = '" . str_replace('_', ' ', $design) . "' AND strike = 'Proof' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getProblemCountByDesign($userID, $design)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE design = '" . str_replace('_', ' ', $design) . "' AND problem != '0' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getErrorCountByDesign($userID, $design)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE design = '" . str_replace('_', ' ', $design) . "' AND errorType != 'None' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCertifiedCountByDesign($userID, $design)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE design = '" . str_replace('_', ' ', $design) . "' AND proService != 'None' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getFirstDayCountByDesign($userID, $design)
    {
        $sql = mysql_query("SELECT * FROM collectfirstday WHERE design = '" . str_replace('_', ' ', $design) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getMintRollCountByDesign($userID, $design)
    {
        $sql = mysql_query("SELECT * FROM collectrolls WHERE design = '" . str_replace('_', ' ', $design) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//BY DESIGN TYPE

    public
    function getCollectionCountByDesignTypeByYear($userID, $setYear, $designType)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE designType = '$designType' AND userID = '$userID' AND coinYear = '$setYear'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public
    function getCoinSumByDesignTypeByYear($userID, $setYear, $designType)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection  WHERE designType = '$designType' AND userID = '$userID' AND coinYear = '$setYear'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public
    function getCollectionUniqueCountByDesignType($userID, $designType)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE designType = '" . str_replace('_', ' ', $designType) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCollectionCountByDesignType($userID, $designType)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE designType = '" . str_replace('_', ' ', $designType) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCoinSumByDesignType($userID, $designType)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection  WHERE  designType = '" . str_replace('_', ' ', $designType) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//BY VARIETY

    public
    function getVarietyCount($userID, $varietyType)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE varietyType = '" . str_replace('_', ' ', $varietyType) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getVarietyCountByCoinID($userID, $coinID, $varietyType)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND varietyType = '" . str_replace('_', ' ', $varietyType) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getDistinctVarietyCountByCoinID($userID, $coinID, $varietyType)
    {
        $sql = mysql_query("SELECT DISTINCT varietyType FROM collection WHERE coinID = '$coinID' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//BY Series TYPE

    public
    function getCollectionCountBySeriesTypeByYear($userID, $setYear, $seriesType)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE seriesType = '$seriesType' AND userID = '$userID' AND coinYear = '$setYear'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public
    function getCoinSumBySeriesTypeByYear($userID, $setYear, $seriesType)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection  WHERE seriesType = '$seriesType' AND userID = '$userID' AND coinYear = '$setYear'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public
    function getCollectionUniqueCountBySeriesType($userID, $seriesType)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE seriesType = '" . str_replace('_', ' ', $seriesType) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCollectionCountBySeriesType($userID, $seriesType)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE seriesType = '" . str_replace('_', ' ', $seriesType) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCoinSumBySeriesType($userID, $seriesType)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection  WHERE  seriesType = '" . str_replace('_', ' ', $seriesType) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//BY Series

    public
    function getCollectionCountBySeriesByYear($userID, $setYear, $series)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE series = '$series' AND userID = '$userID' AND coinYear = '$setYear'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public
    function getCoinSumBySeriesByYear($userID, $setYear, $series)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection  WHERE series = '$series' AND userID = '$userID' AND coinYear = '$setYear'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

    public
    function getCollectionUniqueCountBySeries($userID, $series)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE series = '" . str_replace('_', ' ', $series) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCollectionCountBySeries($userID, $series)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE series = '" . str_replace('_', ' ', $series) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCoinSumBySeries($userID, $series)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection  WHERE  series = '" . str_replace('_', ' ', $series) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ENTERING/UPDATING/DELETING COINS


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function getCollectionStatus($collectionID)
    {
        $Encryption = new Encryption();
        $this->getCollectionById($collectionID);
        if ($this->getCollectionSet() != '0') {
            $status = '<td align="center" valign="top"><h4><img src="../img/pencilIcon.jpg" alt="" width="20" height="20" align="absmiddle" /> <a href="editMintSet.php?ID=' . $Encryption->encode($this->getCollectionSet()) . '">Edit Set</a></h4></td>';
        } else {
            $status = '<td align="center" valign="top"><h4><img src="../img/pencilIcon.jpg" alt="" width="20" height="20" align="absmiddle" /> <a href="viewCoinEdit.php?ID=' . $Encryption->encode($collectionID) . '">Edit Coin</a></h4></td>';
        }
        return $status;
    }

    function setBlankNickname($coinNickname, $coinID, $userID)
    {
        $coin = new Coin();
        $coin->getCoinById($coinID);
        if ($coinNickname == '') {
            $sql = mysql_query("SELECT * FROM collection  WHERE  coinID = '" . intval($coinID) . "' AND userID = '$userID'") or die(mysql_error());
            return $coin->getCoinName($collectionID = null) . ' ' . mysql_num_rows($sql) + 1;
        } else {
            return $coinNickname;
        }
    }

    function setBulkNickname($coinNickname, $coinID, $userID)
    {
        $coin = new Coin();
        $coin->getCoinById($coinID);
        if ($coinNickname == '') {
            $sql = mysql_query("SELECT * FROM collection  WHERE  coinID = '" . intval($coinID) . "' AND userID = '$userID'") or die(mysql_error());
            return $coin->getCoinName($collectionID = null) . ' number ' . mysql_num_rows($sql) + 1;
        } else {
            return $coinNickname;
        }
    }

    function setMintsetCoinNickname($coinNickname, $coinID, $userID)
    {
        $Mintset = new Mintset();
        $coin->getCoinById($coinID);
        if ($coinNickname == '') {
            $sql = mysql_query("SELECT * FROM collection  WHERE  coinID = '" . intval($coinID) . "' AND userID = '$userID'") or die(mysql_error());
            return $coin->getCoinName($collectionID = null) . ' ' . mysql_num_rows($sql) + 1;
        } else {
            return $coinNickname;
        }
    }

    function setPurchaseToZero($purchasePrice)
    {
        if ($purchasePrice == '') {
            return '0.00';
        } else {
            return $purchasePrice;
        }
    }

    function processSheldonNum($sheldon)
    {
        if ($sheldon == 'None') {
            $sheldon = 'None';
        } else {
            $sheldon = '' . $vam3;
        }
        return strip_tags($vam);
    }

    function addPeriodToReferenceNum($value)
    {
        if ($value == '') {
            return false;
        } else {
            $value = '.' . mysql_real_escape_string($value);
        }
        return $value;
    }

//Unknown coins
    function calculateCentrury($date2)
    {
        switch ($date2) {
            case "7":
                $century = "18";
                break;
            case "8":
                $century = "19";
                break;
            case "9":
                $century = "20";
                break;
            default:
                $century = 'Unknown';
                break;
        }
        return mysql_real_escape_string($century);
    }

//Grade stuff
    public
    function getCoinGradeNum($coinGrade)
    {
        if ($coinGrade == 'No Grade') {
            $coinGradeNum = '99';
        } else {
            $coinGradeNum = preg_replace('#[^0-9]#i', '', $coinGrade);
        }
        return $coinGradeNum;
    }

    public
    function coinYearSelectByType($coinType)
    {
        $sql = mysql_query("SELECT DISTINCT coinYear FROM coins WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND byMint = '1' ORDER BY coinYear ASC") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            echo '<option value="' . intval($row['coinYear']) . '">' . intval($row['coinYear']) . '</option>';
        }
        return true;
    }

    function getGradeList($coinStrike)
    {
        $html = '';
        switch ($coinStrike) {
            case 'Business':
                $html .= '<option value="B0">(B-0) Basal 0 </option>
<option value="P1" >(PO-1) Poor</option>
<option value="FR2">(FR-2) Fair</option>
<option value="AG3">(AG-3) About Good</option>
<option value="G4">(G-4) Good</option>
<option value="G6">(G-6) Good</option>
<option value="VG8">(VG-8) Very Good</option>
<option value="VG10">(VG-10) Very Good</option>
<option value="F12">(F-12) Fine</option>
<option value="F15">(F-15) Fine</option>
<option value="VF20">(VF-20) Very Fine</option>
<option value="VF25">(VF-25) Very Fine</option>
<option value="VF30">(VF-30) Very Fine</option>
<option value="VF35">(VF-35) Very Fine</option>
<option value="EF40">(EF-40) Extremely Fine</option>
<option value="EF45">(EF-45) Extremely Fine</option>
<option value="AU50">(AU-50) About Uncirculated</option>
<option value="AU53">(AU-53) About Uncirculated</option>
<option value="AU55">(AU-55) About Uncirculated</option>
<option value="AU58">(AU-58) Very Choice About Uncirculated</option>
<option value="MS60">(MS-60) Mint State Basal</option>
<option value="MS61">(MS-61) Mint State Acceptable</option>
<option value="MS62">(MS-62) Mint State Acceptable</option>
<option value="MS63">(MS-63) Mint State Acceptable</option>
<option value="MS64">(MS-64) Mint State Acceptable</option>
<option value="MS65">(MS-65) Mint State Choice</option>
<option value="MS66">(MS-66) Mint State Choice</option>
<option value="MS67">(MS-67) Mint State Choice</option>
<option value="MS68">(MS-68) Mint State Premium</option>
<option value="MS69">(MS-69) Mint State All-But-Perfect</option>
<option value="MS70">(MS-70) Mint State Perfect</option>';
                break;
            case 'Proof':
                $html .= '<option value="PR35">(PR-35) Impaired Proof.</option>
<option value="PR40">(PR-40) Impaired Proof.</option>
<option value="PR45">(PR-45) Impaired Proof.</option>
<option value="PR50">(PR-50) Impaired Proof.</option>

<option value="PR55">(PR-55) Impaired Proof.</option>
<option value="PR58">(PR-58) Impaired Proof.</option>
<option value="PR60">(PR-60) Brilliant Proof.</option>
<option value="PR61">(PR-61) Brilliant Proof.</option>
<option value="PR62">(PR-62) Brilliant Proof.</option>
<option value="PR63">(PR-63) Brilliant Proof.</option>
<option value="PR64">(PR-64) Brilliant Proof.</option>
<option value="PR65">(PR-65) Gem Proof.</option>
<option value="PR66">(PR-66) Choice Gem Proof.</option>
<option value="PR67">(PR-67) Extraordinary Proof.</option>
<option value="PR68">(PR-68) Extraordinary Proof.</option>
<option value="PR69">(PR-69) Extraordinary Proof.</option>
<option value="PR70">(PR-70) Perfect Proof.</option>';
                break;
        }
        return $html;

    }

///////////////////////

    function deleteCoinAndImages($collectionID, $userID)
    {
        $this->getCollectionById($collectionID);
        if ($this->getCoinImage1() !== '../img/noPic.jpg') {
            if (file_exists($this->getCoinImage1())) {
                unlink($this->getCoinImage1());
            }
        }
        if ($this->getCoinImage2() !== '../img/noPic.jpg') {
            if (file_exists($this->getCoinImage2())) {
                unlink($this->getCoinImage2());
            }
        }
        if ($this->getCoinImage3() !== '../img/noPic.jpg') {
            if (file_exists($this->getCoinImage3())) {
                unlink($this->getCoinImage3());
            }
        }
        if ($this->getCoinImage4() !== '../img/noPic.jpg') {
            if (file_exists($this->getCoinImage4())) {
                unlink($this->getCoinImage4());
            }
        }
        $this->deleteCoin($collectionID, $userID);
        return;
    }


    function deleteCoinAndImagesFromSet($collectsetID, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE collectsetID = '$collectsetID' AND userID = '$userID' ORDER BY coinYear ASC") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $this->getCollectionById(intval($row['collectionID']));

            if ($this->getCoinImage1() !== '../img/noPic.jpg') {
                if (file_exists($this->getCoinImage1())) {
                    unlink($this->getCoinImage1());
                }
            }
            if ($this->getCoinImage2() !== '../img/noPic.jpg') {
                if (file_exists($this->getCoinImage2())) {
                    unlink($this->getCoinImage2());
                }
            }
            if ($this->getCoinImage3() !== '../img/noPic.jpg') {
                if (file_exists($this->getCoinImage3())) {
                    unlink($this->getCoinImage3());
                }
            }
            if ($this->getCoinImage4() !== '../img/noPic.jpg') {
                if (file_exists($this->getCoinImage4())) {
                    unlink($this->getCoinImage4());
                }
            }
            $this->deleteCoin(intval($row['collectionID']), $userID);
        }

        return;
    }


    function deleteCoin($collectionID, $userID)
    {
        $FileManager = new FileManager();
        $FileManager->recursiveRemove($userID . '/' . $collectionID);
        mysql_query("DELETE FROM collection WHERE collectionID = '$collectionID' AND userID = '$userID' LIMIT 1") or die(mysql_error());
        return;
    }

    function deleteAllCoins($coinCategory, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '$coinCategory' AND userID = '$userID' ") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            deleteCoin($row['collectionID'], $userID);
        }
        return;
    }

    function changeCoinLock($collectionID, $locked, $userID)
    {
        $sql = mysql_query("UPDATE collection SET  locked = '$locked'  WHERE  collectionID = '$collectionID' AND userID = '$userID' ") or die(mysql_error());
        return;
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//VAM Section


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Coin variety and attributes

    public
    function getMorganDesignationCount($userID)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinType = 'Morgan Dollar' AND morganDesignation != 'None' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getMorganDesignationTypeCount($userID, $morganDesignation)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinType = 'Morgan Dollar' AND morganDesignation = '$morganDesignation' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getMorganDesignationTypeCountByYear($coinYear, $userID, $morganDesignation)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinType = 'Morgan Dollar' AND coinYear = '$coinYear' AND morganDesignation = '$morganDesignation' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getVAMCount($userID, $coinType)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinType = '$coinType' AND vam != 'None' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }


    function getMADClashDenomination($coinCategory)
    {

    }

    function getCoinAttribute($collectionID, $userID)
    {
        $this->getCollectionById($collectionID);
        $attDisplay = '';
        switch ($this->getCoinType()) {
            case 'Franklin Half Dollar':
                if ($this->getFullAtt() != 'None') {
                    $attDisplay .= $this->getFullAtt() . ' ';
                }
                break;
            case 'Jefferson Nickel':
                if ($this->getFullAtt() != 'None') {
                    $attDisplay .= $this->getFullAtt() . ' ';
                }
                break;
            case 'Standing Liberty':
                if ($this->getFullAtt() != 'None') {
                    $attDisplay .= $this->getFullAtt() . ' ';
                }
                break;
            case 'Winged Liberty Dime':
                if ($this->getFullAtt() != 'None') {
                    $attDisplay .= $this->getFullAtt() . ' ';
                }
                break;
        }
        return $attDisplay;
    }

    /*public function getAttributeCountByType($coinType,$userID) {
    $sql = mysql_query( "SELECT * FROM collection WHERE coinType  = '".str_replace('_', ' ', $coinType)."' AND fullAtt != 'None' AND userID = '$userID'");
    return mysql_num_rows($sql);
    }	*/
    public
    function getAttributeCountByYear($coinYear, $coinType, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinYear = '$coinYear' AND coinType  = '" . str_replace('_', ' ', $coinType) . "' AND fullAtt != 'None' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getAttributeProCountByYear($coinYear, $coinType, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE proService != 'None' AND coinYear = '$coinYear' AND coinType  = '" . str_replace('_', ' ', $coinType) . "' AND fullAtt != 'None' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    function getTypeStrikeFullBandCount($userID, $coinType, $strike, $fullAtt)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND fullAtt = '$fullAtt' AND strike = '$strike'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function getTypeFullBandCount($userID, $coinType, $fullAtt)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND fullAtt = '$fullAtt'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function getTypeFullBandProCount($userID, $coinType, $fullAtt)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE proService != 'None' AND userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND fullAtt = '$fullAtt'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function getDDRVarietyImg($coinID, $ddr, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND ddr = '$ddr' AND userID = '$userID' ") or die(mysql_error());
        if (mysql_num_rows($sql) == 0) {
            return "blank.jpg";
        } else {
            while ($row = mysql_fetch_array($sql)) {
                return str_replace(' ', '_', $row['coinVersion']) . '.jpg';
            }

        }
    }

    function getDDOVarietyImg($coinID, $ddo, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND ddo = '$ddo' AND userID = '$userID' ") or die(mysql_error());
        if (mysql_num_rows($sql) == 0) {
            return "blank.jpg";
        } else {
            while ($row = mysql_fetch_array($sql)) {
                return str_replace(' ', '_', $row['coinVersion']) . '.jpg';
            }

        }
    }

    function getWDDRVarietyImg($coinID, $wddr, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND wddr = '$wddr' AND userID = '$userID' ") or die(mysql_error());
        if (mysql_num_rows($sql) == 0) {
            return "blank.jpg";
        } else {
            while ($row = mysql_fetch_array($sql)) {
                return str_replace(' ', '_', $row['coinVersion']) . '.jpg';
            }

        }
    }

    function getWDDOVarietyImg($coinID, $wddo, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND wddo = '$wddo' AND userID = '$userID' ") or die(mysql_error());
        if (mysql_num_rows($sql) == 0) {
            return "blank.jpg";
        } else {
            while ($row = mysql_fetch_array($sql)) {
                return str_replace(' ', '_', $row['coinVersion']) . '.jpg';
            }

        }
    }

    public
    function getVarietyName($variety)
    {
        switch ($variety) {
            case 'ddo':
                return 'Double Die Obverse';
                break;
            case 'ddr':
                return 'Double Die Reverse';
                break;
            case 'rpm':
                return 'Repunched Mintmark';
                break;
            case 'rpd':
                return 'Repunched Date';
                break;
            case 'omm':
                return 'Over Mintmark';
                break;
            case 'mms':
                return 'Mintmark Style';
                break;
            case 'odv':
                return 'Obverse Design Variety';
                break;
            case 'rdv':
                return 'Reverse Design Variety';
                break;
            case 'red':
                return 'Re Engraved Design';
                break;
            case 'imm':
                return 'Inverted Mintmark';
                break;
            case 'dmr':
                return 'Die Marriage Registry';
                break;
            case 'mdr':
                return 'Master Die Reverse';
                break;
            case 'mdo':
                return 'Master Die Obverse';
                break;
        }

    }

    public
    function getCollectionUniqueCountByVariety($userID, $coinVersion)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE varietyCoin = '1' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCollectionCountByVariety($userID, $coinVersion)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE varietyCoin = '1' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCoinSumByVariety($userID, $coinVersion)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection  WHERE varietyCoin = '1' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

//By category
    public
    function getCollectionUniqueCountByVarietyCategory($userID, $coinCategory)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE varietyCoin = '1' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCollectionCountByVarietyCategory($userID, $coinCategory)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE varietyCoin = '1' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCoinSumByVarietyCategory($userID, $coinCategory)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection  WHERE varietyCoin = '1' AND coinCategory = '" . str_replace('_', ' ', $coinCategory) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

//By type
    public
    function getCollectionUniqueCountByVarietyType($userID, $coinType)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE varietyCoin = '1' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCollectionCountByVarietyType($userID, $coinType)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE varietyCoin = '1' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'");
        return mysql_num_rows($sql);
    }

    public
    function getCoinSumByVarietyType($userID, $coinType)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection  WHERE varietyCoin = '1' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }


    function getVarietyForCoin2($collectionID)
    {
        $this->getCollectionById($collectionID);
        if ($this->getVarietyCoin() != '0') {
            switch ($this->getVariety()) {
                case 'DDO':
                    return $this->getDDO() . ' ';
                    break;
                case 'DDR':
                    return $this->getDDR() . ' ';
                    break;
                case 'RPM':
                    return $this->getRPM() . ' ';
                    break;
                case 'RPD':
                    return $this->getRPD() . ' ';
                    break;
                case 'OMM':
                    return $this->getOMM() . ' ';
                    break;
                case 'MMS':
                    return $this->getMMS() . ' ';
                    break;
                case 'ODV':
                    return $this->getODV() . ' ';
                    break;
                case 'RDV':
                    return $this->getRDV() . ' ';
                    break;
                case 'RED':
                    return $this->getRED() . ' ';
                    break;
                case 'IMM':
                    return $this->getIMM() . ' ';
                    break;
                case 'DMR':
                    return $this->getDMR() . ' ';
                    break;
                case 'MDO':
                    return $this->getMDO() . ' ';
                    break;
                case 'MDR':
                    return $this->getMDR() . ' ';
                    break;
            }
        } else {
            return false;
        }
    }

    function getVarietyForCoin($collectionID)
    {
        $this->getCollectionById($collectionID);
        $errorDisplay = "";
        if ($this->getFsNum() != 'None') {
            $errorDisplay .= $this->getFsNum() . ' ';
        }
        if ($this->getDDO() != 'None') {
            $errorDisplay .= $this->getDDO() . ' ';
        }
        if ($this->getDDR() != 'None') {
            $errorDisplay .= $this->getDDR() . ' ';
        }
        if ($this->getRPM() != 'None') {
            $errorDisplay .= $this->getRPM() . ' ';
        }
        if ($this->getRPD() != 'None') {
            $errorDisplay .= $this->getRPD() . ' ';
        }
        if ($this->getOMM() != 'None') {
            $errorDisplay .= $this->getOMM() . ' ';
        }
        if ($this->getMMS() != 'None') {
            $errorDisplay .= $this->getMMS() . ' ';
        }
        if ($this->getODV() != 'None') {
            $errorDisplay .= $this->getODV() . ' ';
        }
        if ($this->getRDV() != 'None') {
            $errorDisplay .= $this->getRDV() . ' ';
        }
        if ($this->getRED() != 'None') {
            $errorDisplay .= $this->getRED() . ' ';
        }
        if ($this->getIMM() != 'None') {
            $errorDisplay .= $this->getIMM() . ' ';
        }
        if ($this->getDMR() != 'None') {
            $errorDisplay .= $this->getDMR() . ' ';
        }
        if ($this->getMDO() != 'None') {
            $errorDisplay .= $this->getMDO() . ' ';
        }
        if ($this->getMDR() != 'None') {
            $errorDisplay .= $this->getMDR() . ' ';
        }
        if ($this->getSheldon() != 'None') {
            $errorDisplay .= $this->getSheldon() . ' ';
        }
        if ($this->getNewcomb() != 'None') {
            $errorDisplay .= $this->getNewcomb() . ' ';
        }
        if ($this->getWileyBugert() != 'None') {
            $errorDisplay .= $this->getWileyBugert() . ' ';
        }
        if ($this->getSnow() != 'None') {
            $errorDisplay .= $this->getSnow() . ' ';
        }
        if ($this->getFortin() != 'None') {
            $errorDisplay .= $this->getFortin() . ' ';
        }
        if ($this->getVam() != 'None') {
            $errorDisplay .= $this->getVam() . ' ';
        }
        return $errorDisplay;
    }

    function getGradeAttributeForCoin($collectionID)
    {
        $this->getCollectionById($collectionID);
        $attributeDisplay = "";
        if ($this->getDesignation() != 'None') {
            $attributeDisplay .= '/' . $this->getDesignation() . ' ';
        }
        if ($this->getCoinColor() != 'None') {
            $attributeDisplay .= '/' . $this->getCoinColor() . ' ';
        }
        if ($this->getMorganDesignation() != 'None') {
            $attributeDisplay .= '/' . $this->getMorganDesignation();
        }
        if ($this->getFullAtt() != 'None') {
            $attributeDisplay .= '/' . $this->getFullAtt() . ' ';
        }
        return $attributeDisplay;
    }

    function getFSForCoin($collectionID)
    {
        $this->getCollectionById($collectionID);
        if ($this->getFsNum() != 'None') {
            return ' ' . $this->getFsNum();
        } else {
            return false;
        }
    }

//by coin
    function getVarietyTypeCoinCount($coinID, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID = '" . $coinID . "' AND varietyCoin = '1' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    public
    function getCoinVarietyTypeCount($userID, $coinID, $variety)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinID = '" . $coinID . "' AND {$variety} != 'None' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($countAll);
    }

    public
    function getCoinVarietyTypeSum($userID, $coinID, $variety)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection  WHERE coinID = '" . $coinID . "' AND {$variety} != 'None' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Large Cents sets

    function getSheldonImage($sheldon, $userID)
    {

//$countAll = mysql_query("SELECT * FROM collection WHERE sheldon IN (".implode(',',$sheldon).") AND userID = '$userID'") or die(mysql_error());
        $countAll = mysql_query("SELECT * FROM collection WHERE sheldon = '" . str_replace('_', ' ', $sheldon) . "' AND userID = '$userID'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check > 0) {
            $image = 'Large_Cent.jpg';
        } else {
            $image = "blank.jpg";
        }
        return $image;
    }

    function getSheldonsImage($sheldon, $userID)
    {
        $sheldonsArray = '"' . implode('","', $sheldon) . '"';
        $countAll = mysql_query("SELECT * FROM collection WHERE sheldon IN ($sheldonsArray) AND userID = '$userID'") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check > 0) {
            $image = 'Large_Cent.jpg';
        } else {
            $image = "blank.jpg";
        }
        return $image;
    }


    public
    function getSheldonYearCountById($sheldon, $coinYear, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE  coinYear = '$coinYear' AND sheldon != '$sheldon' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public
    function getUniqueSheldonCountById($sheldon, $coinYear, $userID)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE  coinYear = '$coinYear' AND sheldon = '$sheldon' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public
    function getSheldonSumByYear($sheldon, $coinYear, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinYear = '$coinYear' AND sheldon = '$sheldon' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }


    public
    function getSheldonsYearCountById($coinYear, $userID)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE  coinYear = '$coinYear' AND sheldon != 'None' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public
    function getUniqueSheldonsCountById($coinYear, $userID)
    {
        $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE  coinYear = '$coinYear' AND sheldon != 'None' AND userID = '$userID'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    public
    function getSheldonsSumByYear($coinYear, $userID)
    {
        $sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinYear = '$coinYear' AND sheldon != 'None' AND userID = '$userID'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
        }
        return $coinSum;
    }

///////////////////////////////////
//Morgan Dollars
    function getVamByYearAndMint($coinYear, $vam, $userID, $mintMark)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinType = 'Morgan Dollar' AND coinYear = '$coinYear' AND userID = '$userID' AND vam = '$vam' AND mintMark = '$mintMark' ") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            while ($row = mysql_fetch_array($countAll)) {
                return 'Morgan_Dollar.jpg';
            }

        }
    }

    public
    function getVamCountByYear($coinYear, $userID)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinType = 'Morgan Dollar' AND coinYear = '$coinYear' AND userID = '$userID' AND vam != 'None' ") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    function getHighGradeVam($coinType, $userID, $vam)
    {
        $sql = mysql_query("SELECT MAX(coinGradeNum), strike FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND userID = '$userID' AND vam = '$vam'") or die(mysql_error());
        while ($row = mysql_fetch_array($sql)) {
            if ($row['MAX(coinGradeNum)'] == '0') {
                return 'No coins graded';
            } else {
                switch ($row['strike']) {
                    case 'Business':
                        return $this->assignGradePrefix($row['MAX(coinGradeNum)']) . $row['MAX(coinGradeNum)'];
                    case 'Proof':
                        return "PR" . $row['MAX(coinGradeNum)'];
                    default:
                        return 'No coins graded';
                        break;
                }
            }
        }
    }


///////////////////////////////////
//Snow
    function getSnowByYearAndMint($coinYear, $snow, $userID, $mintMark, $coinType)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinYear = '$coinYear' AND userID = '$userID' AND snow = '$snow' AND mintMark = '$mintMark' ") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            while ($row = mysql_fetch_array($countAll)) {
                return str_replace(' ', '_', $coinType) . '.jpg';
            }

        }
    }

    function getSnowByYearAndMintAndSubCategory($coinYear, $snow, $userID, $mintMark, $coinType, $coinSubCategory)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinSubCategory = '" . str_replace('_', ' ', $coinSubCategory) . "' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinYear = '$coinYear' AND userID = '$userID' AND snow = '$snow' AND mintMark = '$mintMark' ") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            while ($row = mysql_fetch_array($countAll)) {
                return str_replace(' ', '_', $coinSubCategory) . '.jpg';
            }

        }
    }

    public function getSnowCountByYear($coinYear, $userID, $coinType)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinYear = '$coinYear' AND userID = '$userID' AND snow != 'None' ") or die(mysql_error());
        return mysql_num_rows($sql);
    }


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Designations Color and Attributes

    function getTypeDesignationGradeCount($userID, $designation, $coinType)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType 
            AND collection.designation = :designation
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->bindParam(':designation', $designation, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND designation = '$designation'") or die(mysql_error());
    }

    function getTypeColorCount($userID, $color, $coinType)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType 
            AND collection.color = :color
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->bindParam(':color', $color, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND color = '$color'") or die(mysql_error());
    }

    function getTypeStrikeColorCount($userID, $color, $coinType, $strike)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType 
            AND collection.color = :color AND coins.strike = :strike
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->bindParam(':color', $color, PDO::PARAM_STR);
        $stmt->bindParam(':strike', $strike, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '" . str_replace('_', ' ', $coinType) . "' AND color = '$color' AND strike = '$strike'") or die(mysql_error());
    }

    function getCoinColorCount($userID, $color, $coinID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            WHERE userID = :userID AND coinID = :coinID
            AND color = :color
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->bindParam(':color', $color, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '" . intval($coinID) . "' AND color = '$color'") or die(mysql_error());
    }

    function getCoinColorProCount($userID, $color, $coinID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            WHERE userID = :userID AND coinID = :coinID
            AND color = :color
            AND proService != 'None'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->bindParam(':color', $color, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '" . intval($coinID) . "' AND color = '$color' AND proService != 'None'") or die(mysql_error());
    }

    function getCoinColorRawCount($userID, $color, $coinID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            WHERE userID = :userID AND coinID = :coinID
            AND color = :color
            AND proService = 'None'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->bindParam(':color', $color, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '" . intval($coinID) . "' AND color = '$color' AND proService = 'None'") or die(mysql_error());
    }

    function getCoinStrikeColorProCount($userID, $color, $coinID, $strike)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            WHERE userID = :userID AND coinID = :coinID
            AND color = :color
            AND strike = :strike
            AND proService != 'None'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->bindParam(':color', $color, PDO::PARAM_STR);
        $stmt->bindParam(':strike', $strike, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '" . intval($coinID) . "' AND strike = '$strike' AND color = '$color' AND proService != 'None'") or die(mysql_error());
    }

    function getCoinStrikeColorRawCount($userID, $color, $coinID, $strike)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            WHERE userID = :userID AND coinID = :coinID
            AND color = :color
            AND strike = :strike
            AND proService = 'None'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->bindParam(':color', $color, PDO::PARAM_STR);
        $stmt->bindParam(':strike', $strike, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '" . intval($coinID) . "' AND strike = '$strike' AND color = '$color' AND proService = 'None'") or die(mysql_error());
    }

    function getCoinDesignationProCount($userID, $fullAtt, $coinID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            WHERE userID = :userID AND coinID = :coinID
            AND fullAtt = :fullAtt AND proService != 'None'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->bindParam(':fullAtt', $fullAtt, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '" . intval($coinID) . "' AND fullAtt = '$fullAtt' AND proService != 'None'") or die(mysql_error());
    }

    function getCoinDesignationRawCount($userID, $fullAtt, $coinID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            WHERE userID = :userID AND coinID = :coinID
            AND fullAtt = :fullAtt AND proService = 'None'
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->bindParam(':fullAtt', $fullAtt, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '" . intval($coinID) . "' AND fullAtt = '$fullAtt' AND proService = 'None'") or die(mysql_error());
    }


    function getCoinDesignationCount($userID, $fullAtt, $coinID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            WHERE userID = :userID AND coinID = :coinID
            AND fullAtt = :fullAtt
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->bindParam(':fullAtt', $fullAtt, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '" . intval($coinID) . "' AND fullAtt = '$fullAtt'") or die(mysql_error());
    }

    function getCoinMorganDesignationCount($userID, $morganDesignation, $coinID)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            WHERE userID = :userID AND coinID = :coinID
            AND morganDesignation = :morganDesignation
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':coinID', $coinID, PDO::PARAM_INT);
        $stmt->bindParam(':morganDesignation', $morganDesignation, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '" . intval($coinID) . "' AND morganDesignation = '$morganDesignation'") or die(mysql_error());
    }

//colorreport.php
    function getDistinctCoinIDByColorCount($coinType, $userID, $color)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(DISTINCT coinID) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType AND coins.color = :color
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->bindValue(':color', str_replace('_', ' ', $color), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinType = '$coinType' AND color = '$color' AND userID = '$userID' ") or die(mysql_error());
    }

    function getDistinctCoinIDByColorByCoinStrikeCount($coinType, $userID, $color, $strike)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(DISTINCT coinID) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType AND coins.color = :color
            AND coins.strike = :strike
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->bindValue(':color', str_replace('_', ' ', $color), PDO::PARAM_STR);
        $stmt->bindValue(':strike', str_replace('_', ' ', $strike), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinType = '$coinType' AND color = '$color' AND userID = '$userID' AND strike = '$strike' ") or die(mysql_error());
    }

    function getCoinIDByColorCount($coinType, $userID, $color)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType AND coins.color = :color
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->bindValue(':color', str_replace('_', ' ', $color), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND color = '$color' AND userID = '$userID' ") or die(mysql_error());
    }

    function getCoinIDByColorByCoinStrikeCount($coinType, $userID, $color, $strike)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType AND coins.color = :color
            AND coins.strike = :strike
            ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->bindValue(':color', str_replace('_', ' ', $color), PDO::PARAM_STR);
        $stmt->bindValue(':strike', str_replace('_', ' ', $strike), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND color = '$color' AND userID = '$userID' AND strike = '$strike' ") or die(mysql_error());
    }

//full reports
    function getAllCoinsFullAttCount($coinType, $userID, $fullAtt)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType
            AND collection.fullAtt = :fullAtt
        ");
        $stmt->bindParam(':userID', $this->user, PDO::PARAM_INT);
        $stmt->bindValue(':coinType', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $stmt->bindParam(':fullAtt', $fullAtt, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();

        //$sql = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND fullAtt = '$fullAtt' AND userID = '$userID' ") or die(mysql_error());
    }

}//END CLASS
