<?php 
//getAllMintSetCoins
class VarietySet {

    public function getVarietySetById($varietysetID) {
        $sql = mysql_query("SELECT * FROM varietyset WHERE varietysetID = '$varietysetID'") or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->varietysetID = $row['varietysetID'];
        $this->setName = $row['setName'];
		$this->setType = $row['setType'];
        $this->additional = $row['additional'];
		$this->coins = $row['coins'];
		$this->coinCategory = $row['coinCategory'];
		$this->coinType = $row['coinType'];
		$this->faceVal = $row['faceVal'];
		$this->coinYear = $row['coinYear'];	
	return true;
    }

	public function getCoinYear() {
    	return strip_tags($this->coinYear);
    }
	public function getSetFaceVal() {
        return strip_tags($this->faceVal);
    }	
	public function getSetName() {
    	return strip_tags($this->setName);
    }	
	public function getSetType() {
   		return strip_tags($this->setType);
    }
	public function getAdditional() {
		return strip_tags($this->additional);
    }		
	public function getCoinCategory() {
        return strip_tags($this->coinCategory);
    }	
	public function getCoinType() {
        return strip_tags($this->coinType);
    }	
	public function getCoins() {
		return strip_tags($this->coins);
    }		
	public function getVarietysetID() {
		return strip_tags($this->varietysetID);
    }	
	
	public function getMintSetList($varietysetID) {
        $sql = mysql_query("SELECT * FROM varietyset WHERE varietysetID = '$varietysetID'") or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->varietysetID = $row['varietysetID'];
		$this->coins = $row['coins'];		
		$coinList = explode(",", $this->coins);
		foreach ($coinList as $coins) {
			$coin = new $coin;
			$coin->getCoinById($coins);
			$coinID = $coin->getCoinID();
			$byMint = $coin->checkPDS($coinID);
			$coinDisplayList = $coin->getCoinName().' '.$coin->getCoinType().'<br />';
		}
	return $coinDisplayList;
	}

	public function getSetSumByType($varietysetID, $userID) {
	$myQuery = mysql_query("SELECT SUM(purchasePrice) FROM collectset WHERE varietysetID = '$varietysetID' AND userID = '$userID'") or die(mysql_error()); 
	
	while($row = mysql_fetch_array($myQuery))
	{
	  $coinSum = $row['SUM(purchasePrice)'];
	}	
		return $coinSum;
	}	


public function getCoinCertifiedCountByID($varietysetID, $userID){
$sql = mysql_query("SELECT * FROM collectset WHERE varietysetID = '$varietysetID' AND userID = '$userID' AND proService != 'None'") or die(mysql_error());
return mysql_num_rows($sql);
}	

	public function getSetNicknameByID($mintsetID) {
	$myQuery = mysql_query("SELECT * FROM mintset WHERE mintsetID = '$mintsetID'") or die(mysql_error()); 
	
	while($row = mysql_fetch_array($myQuery))
	{
	  $setName = $row['setName'];
	}	
		return $setName;
	}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//SET COUNTS
	public function getSetCountByType($setType){
    $sql = mysql_query("SELECT * FROM mintset WHERE setType = '$setType' ") or die(mysql_error());
	return mysql_num_rows($sql);
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Variety sets
	public function enterVarietySetCoin($collectsetID, $coinID, $mintsetID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchasePrice, $ebaySellerID, $shopName, $shopUrl, $showName, $showCity, $purchaseDate){
		$coin = new Coin();
		$collection = new Collection();
		$coin->getCoinById($coinID);

$sql = mysql_query("INSERT INTO collection(coinID, collectsetID, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, showName, showCity, mintMark, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, strike, coinGrade, coinGradeNum, purchaseDate, enterDate, userID, errorType, errorCoin, byMint, century, design, series, designType, seriesType, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal) VALUES('".$coinID."', '$collectsetID', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$showName', '$showCity', '".$coin->getMintMark()."', '".$coin->getCoinType()."', '".$coin->getCoinCategory()."', '".$coin->getCoinSubCategory()."', '".$coin->getCoinYear()."', '".$coin->getCoinVersion()."', '".$coin->getCoinStrike()."', 'No Grade', '0', '".date("Y-m-d")."', '".date('Y-m-d H:i:s')."', '$userID', 'None', '0', '".$coin->getByMint()."', '".$coin->getCentury()."', '".$coin->getDesign()."', '".$coin->getSeries()."', '".$coin->getDesignType()."', '".$coin->getCoinSeriesType()."', '".$coin->getCommemorativeType()."', '".$coin->getCommemorativeVersion()."', '".$coin->getCommemorative()."', '".$coin->getDenomination()."', '".$coin->getKeyDate()."', '".$coin->getCoinMetal()."')") or die(mysql_error()); 	  
	
	return true;
	}
	
	public function getAllVarietySetCoins($collectsetID, $varietysetID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchaseDate, $ebaySellerID, $shopName, $shopUrl, $showName, $showCity) {
        $this->getVarietySetById($varietysetID);
		$coinList = explode(",", $this->coins);
		foreach ($coinList as $coinID) {
			$this->enterVarietySetCoin($collectsetID, $coinID, $varietysetID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchasePrice='0.00', $ebaySellerID, $shopName, $shopUrl, $showName, $showCity, $purchaseDate);
		}
	return;
	}
	
	
	











}//End Class
?>