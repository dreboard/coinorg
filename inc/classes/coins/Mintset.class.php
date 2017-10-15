<?php 
//getAllMintSetCoins

class Mintset {

    public function getMintsetById($mintsetID) {
        $sql = mysql_query("SELECT * FROM mintset WHERE mintsetID = '$mintsetID'") or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->mintsetID = $row['mintsetID'];
        $this->setName = $row['setName'];
		$this->setType = $row['setType'];
        $this->mintage = $row['mintage'];
        $this->additional = $row['additional'];
        $this->value = $row['value'];
		$this->coins = $row['coins'];
		$this->strike = $row['strike'];
		$this->issuePrice = $row['issuePrice'];
		$this->coinYear = $row['coinYear'];
		$this->setCount = $row['setCount'];
		
	return true;
    }

	public function getSetCount() {
        return strip_tags($this->setCount);
    }	
	public function getCoinYear() {
    	return strip_tags($this->coinYear);
    }	
	public function getSetName() {
    	return strip_tags($this->setName);
    }	
	public function getCoinStrike() {
        return strip_tags($this->strike);
    }	
	public function getSetType() {
   		return strip_tags($this->setType);
    }
	public function getMintage() {
    	return strip_tags($this->mintage);
    }
	public function getAdditional() {
		return strip_tags($this->additional);
    }		
	public function getIssuePrice() {
		return strip_tags($this->issuePrice);
    }	
	public function getValue() {
		return strip_tags($this->value);
    }	
	public function getCoins() {
		return strip_tags($this->coins);
    }		
	public function getSetID() {
		return strip_tags($this->mintsetID);
    }	
	
	public function getMintSetList($mintsetID) {
        $sql = mysql_query("SELECT * FROM mintset WHERE mintsetID = '$mintsetID'") or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->mintsetID = $row['mintsetID'];
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
	
	function enterMintsetCoin($collectsetID, $coinID, $mintsetID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchasePrice, $ebaySellerID, $shopName, $shopUrl, $showName, $showCity,  $purchaseDate){
		$coin = new Coin();
		$collection = new Collection();
		$coin->getCoinById($coinID);

$sql = mysql_query("INSERT INTO collection(coinID, collectsetID, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, showName, showCity, mintMark, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, strike, coinGrade, coinGradeNum, purchaseDate, enterDate, userID, errorType, errorCoin, byMint, century, design, series, designType, seriesType, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal, locked) VALUES('".$coinID."', '$collectsetID', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$showName', '$showCity', '".$coin->getMintMark()."', '".$coin->getCoinType()."', '".$coin->getCoinCategory()."', '".$coin->getCoinSubCategory()."', '".$coin->getCoinYear()."', '".$coin->getCoinVersion()."', '".$coin->getCoinStrike()."', 'No Grade', '0', '".date("Y-m-d")."', '".date('Y-m-d H:i:s')."', '$userID', 'None', '0', '".$coin->getByMint()."', '".$coin->getCentury()."', '".$coin->getDesign()."', '".$coin->getSeries()."', '".$coin->getDesignType()."', '".$coin->getCoinSeriesType()."', '".$coin->getCommemorativeType()."', '".$coin->getCommemorativeVersion()."', '".$coin->getCommemorative()."', '".$coin->getDenomination()."', '".$coin->getKeyDate()."', '".$coin->getCoinMetal().", '1' ')") or die(mysql_error()); 	  
	
	return true;
	}
	
	public function getAllMintSetCoins($collectsetID, $mintsetID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchaseDate, $ebaySellerID, $shopName, $shopUrl, $showName, $showCity) {
        $this->getMintsetById($mintsetID);
		$coinList = explode(",", $this->coins);
		foreach ($coinList as $coinID) {
			$this->enterMintsetCoin($collectsetID, $coinID, $mintsetID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchasePrice='0.00', $ebaySellerID, $shopName, $shopUrl, $showName, $showCity, $purchaseDate);
		}
	return;
	}



public function getCoinGradeNum($coinGrade) {
	if($coinGrade == 'No Grade') {
		$coinGradeNum = '0';
	} else {
		$coinGradeNum = preg_replace('#[^0-9]#i', '', $coinGrade); 
	}
	return $coinGradeNum;
}

	public function getSetSumByType($mintsetID, $userID) {
	$myQuery = mysql_query("SELECT SUM(purchasePrice) FROM collectset WHERE mintsetID = '$mintsetID' AND userID = '$userID'") or die(mysql_error()); 
	
	while($row = mysql_fetch_array($myQuery))
	{
	  $coinSum = $row['SUM(purchasePrice)'];
	}	
		return $coinSum;
	}	


function getCoinCertifiedCountByID($mintsetID, $userID){
$sql = mysql_query("SELECT * FROM collectset WHERE mintsetID = '$mintsetID' AND userID = '$userID' AND proService != 'None'") or die(mysql_error());
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
	function enterVarietySetCoin($collectsetID, $coinID, $mintsetID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchasePrice, $ebaySellerID, $shopName, $shopUrl, $showName, $showCity,  $purchaseDate){
		$coin = new Coin();
		$collection = new Collection();
		$coin->getCoinById($coinID);

$sql = mysql_query("INSERT INTO collection(coinID, collectsetID, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, showName, showCity, mintMark, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, strike, coinGrade, coinGradeNum, purchaseDate, enterDate, userID, errorType, errorCoin, byMint, century, design, series, designType, seriesType, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal, locked) VALUES('".$coinID."', '$collectsetID', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$showName', '$showCity', '".$coin->getMintMark()."', '".$coin->getCoinType()."', '".$coin->getCoinCategory()."', '".$coin->getCoinSubCategory()."', '".$coin->getCoinYear()."', '".$coin->getCoinVersion()."', '".$coin->getCoinStrike()."', 'No Grade', '0', '".date("Y-m-d")."', '".date('Y-m-d H:i:s')."', '$userID', 'None', '0', '".$coin->getByMint()."', '".$coin->getCentury()."', '".$coin->getDesign()."', '".$coin->getSeries()."', '".$coin->getDesignType()."', '".$coin->getCoinSeriesType()."', '".$coin->getCommemorativeType()."', '".$coin->getCommemorativeVersion()."', '".$coin->getCommemorative()."', '".$coin->getDenomination()."', '".$coin->getKeyDate()."', '".$coin->getCoinMetal().", '1' ')") or die(mysql_error()); 	  
	
	return true;
	}
	
	public function getAllVarietySetCoins($collectsetID, $mintsetID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchaseDate, $ebaySellerID, $shopName, $shopUrl, $showName, $showCity) {
        $this->getMintsetById($mintsetID);
		$coinList = explode(",", $this->coins);
		foreach ($coinList as $coinID) {
			$this->enterVarietySetCoin($collectsetID, $coinID, $mintsetID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchasePrice='0.00', $ebaySellerID, $shopName, $shopUrl, $showName, $showCity, $purchaseDate);
		}
	return;
	}
	
///////////////////////////////////////////////////////////////////////////////////////////////
//Variety sets
 public function getVarietySetById(){
	 
 }
	
	
	

}//End Class
?>