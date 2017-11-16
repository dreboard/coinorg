<?php 
//getAllFirstdaySetCoins
class FirstDay {
	
    public function __construct() {}
	
	
	public function getFirstDayByID($firstdayID) {
		$sql = mysql_query("SELECT * FROM firstday WHERE firstdayID = '$firstdayID'") or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->setName = $row['setName'];
		$this->coinCategory = $row['coinCategory'];
		$this->coinType = $row['coinType'];
        $this->coinVersion = $row['coinVersion'];		
		$this->firstdayID = $row['firstdayID'];	
		$this->coins = $row['coins'];
		
        $this->denomination = $row['denomination'];		
		$this->coinYear = $row['coinYear'];	
		$this->faceVal = $row['faceVal'];		
        return true;
    }

	public function getCoinYear() {
        return strip_tags($this->coinYear);
    }
	public function getFaceVal() {
        return strip_tags($this->faceVal);
    }
	public function getSetName() {
        return strip_tags($this->setName);
    }
	public function getCoinVersion() {
        return strip_tags($this->coinVersion);
    }
	public function getCoinType() {
        return strip_tags($this->coinType);
    }
	public function getCoinCategory() {
        return strip_tags($this->coinCategory);
    }
	public function getFirstdayID() {
        return strip_tags($this->firstdayID);
    }
	
	public function getCoin1() {
		 $pieces = explode(",", $this->coins);
		 $coin1 = $pieces[0];
        return intval($coin1);
    }
	public function getCoin2() {
		 $pieces = explode(",", $this->coins);
		 $coin2 = $pieces[1];
        return intval($coin2);
    }



//ENTER INDIVIDUAL COINS
	public function enterFirstDayCoin($firstdayID, $coinID, $collectfirstdayID, $userID){
		$coin = new Coin();
		$coin->getCoinById($coinID);
		$coinID = $coin->getCoinID();
	mysql_query("INSERT INTO collection(coinID, collectfirstdayID, coinVersion, coinType, coinCategory,  purchaseDate, enterDate, userID, byMint) VALUES('$coinID', '$collectfirstdayID', '".$coin->getCoinVersion()."', '".$coin->getCoinType()."', '".$coin->getCoinCategory()."',  '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '$userID', '".$coin->checkPDS($coinID)."')") or die(mysql_error()); 
	
	return true;
	}
	public function getAllFirstdaySetCoins($firstdayID,$collectfirstdayID, $userID) {
        $this->getFirstDayByID($firstdayID);
		$coinList = explode(",", $this->coins);
		foreach ($coinList as $coinID) {
			$this->enterFirstDayCoin($firstdayID, $coinID, $collectfirstdayID, $userID);
		}
	return;
	}


//COUNTS BY COINTYPE

   public function firstDayByCoinType($coinType){
	$sql = mysql_query("SELECT * FROM firstday WHERE coinType = '".str_replace('_', ' ', $coinType)."'");
	return mysql_num_rows($sql);
}

   public function getFirstDayIDByCoinDesign($coinVersion){
	  $sql = mysql_query("SELECT * FROM firstday WHERE coinVersion = '".str_replace('_', ' ', $coinVersion)."'");
        $row = mysql_fetch_array($sql);
        return $row['firstdayID'];
}







	
}//End Class
?>