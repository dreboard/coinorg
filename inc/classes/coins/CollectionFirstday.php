<?php 
//totalFirstDayInvestment
class CollectionFirstday {

    public function getCollectFirstDayById($collectfirstdayID) {
        $sql = mysql_query("SELECT * FROM collectfirstday WHERE collectfirstdayID = '$collectfirstdayID'") or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->userID = $row['userID'];
        $this->firstdayID = $row['firstdayID'];
        $this->firstdayNickname = $row['firstdayNickname'];		
		$this->firstdayCondition = $row['firstdayCondition'];	
		$this->firstdayType = $row['firstdayType'];	
		$this->coinType = $row['coinType'];
		$this->coinCategory = $row['coinCategory'];
		$this->coinGrade = $row['coinGrade'];	
		$this->coinYear = $row['coinYear'];
		$this->mintMark = $row['mintMark'];
		$this->purchaseFrom = $row['purchaseFrom'];
        $this->purchaseDate = $row['purchaseDate'];
        $this->purchasePrice = $row['purchasePrice'];
        $this->listDate = $row['listDate'];
		$this->sellStatus = $row['sellStatus'];
		$this->sellPrice = $row['sellPrice'];
		$this->sellDate = $row['sellDate'];	
			
        $this->ebaySellerID = $row['ebaySellerID'];
        $this->auctionNumber = $row['auctionNumber'];
        //$this->designation = $row['designation'];
		$this->shopName = $row['shopName'];
		$this->shopUrl = $row['shopUrl'];					
		$this->additional = $row['additional'];	
		$this->coinNote = $row['coinNote'];	
		$this->enterDate = $row['enterDate'];	
		
		$this->proSerialNumber = $row['proSerialNumber'];
		$this->proService = $row['proService'];		
		$this->slabLabel = $row['slabLabel'];		
		$this->slabCondition = $row['slabCondition'];	
		
		$this->coinPic1 = $row['coinPic1'];		

        return true;
    }
	public function getFirstdayType() {
        return strip_tags($this->firstdayType);
    }	
	public function getFirstdayID() {
        return strip_tags($this->firstdayID);
    }	
	public function getFirstdayNickname() {
        return strip_tags($this->firstdayNickname);
    }	
	public function getFirstdayCondition() {
        return strip_tags($this->firstdayCondition);
    }
	public function getCoinType() {
        return strip_tags($this->coinType);
    }	
	public function getCoinCategory() {
        return strip_tags($this->coinCategory);
    }	
	public function getCoinYear() {
        return strip_tags($this->coinYear);
    }	
	public function getCoinGrade() {
        return strip_tags($this->coinGrade);
    }	
	public function getShopUrl() {
        return strip_tags($this->shopUrl);
    }
	public function getRollID() {
        return strip_tags($this->rollID);
    }
	public function getMintMark() {
	  return strip_tags($this->mintMark);
    }	
	public function getPurchaseFrom() {
        return strip_tags($this->purchaseFrom);
    }	
	public function getCoinDate() {
        return strip_tags($this->purchaseDate);
    }
	public function getCoinPrice() {
        return strip_tags($this->purchasePrice);
    }
	public function getCoinNote() {
        return strip_tags($this->coinNote);
    }		
	public function getListDate() {
        return strip_tags($this->listDate);
    }	
	public function getEbaySellerID() {
        return strip_tags($this->ebaySellerID);
    }	
	public function getAuctionNumber() {
        return strip_tags($this->auctionNumber);
    }		
	
	
		public function getAdditional() {
        return strip_tags($this->additional);
    }		
		public function getRollNickname() {
        return strip_tags($this->rollNickname);
    }	
		public function getRollType() {
        return strip_tags($this->rollType);
    }		
		public function getRollHolder() {
        return strip_tags($this->rollHolder);
    }	
	  public function getFirstday() {
	  return strip_tags($this->firstDay);
    }		

	public function getYearRange() {
    return strip_tags($this->coinYearRange);
    }	
	public function getCoinPic1() {
    return strip_tags($this->coinPic1);
    }		
	
		public function getCoinNum($num) {
		if($this->$num == '0'){
	  return 
	     'Empty';
		  } else {		
			$collection = new Collection();
			$collection->getCollectionById($this->$num);
			$coinID = $collection->getCoinID();
			$coin = new Coin();
			$coin->getCoinById($coinID);
			return strip_tags($coin->getCoinName());
			}	
	}
	
	
	
	public function getCoin1($coinType) {
		if($this->coin1 == '0'){
	  return 
	     ' <select name="coin1" class="coinList">
    <option value="0" selected="selected">Select A Coin</option>
	'.$this->newCoinSelects($coinType).'
    </select>';
  } else {		
    return strip_tags($this->coin1);
    }	
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//User Totals
	function totalFirstDayInvestment($userID){
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectfirstday WHERE userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		

//from
	function totalFirstDayInvestmentFrom($userID, $purchaseFrom){
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectfirstday WHERE purchaseFrom = '".str_replace('_', ' ', $purchaseFrom)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	public function getAllTableCountByIDFrom($userID, $purchaseFrom) {
	$sql = mysql_query( "SELECT * FROM collectfirstday WHERE userID = '$userID' AND purchaseFrom = '".str_replace('_', ' ', $purchaseFrom)."'") or die(mysql_error()); 
	return mysql_num_rows($sql); 
    }		  
//	
	public function getFirstDayCountById($userID) {
	$sql = mysql_query( "SELECT * FROM collectfirstday WHERE userID = '$userID'");
	return mysql_num_rows($sql);    	
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Category
	public function getFirstDayCountByCategory($userID, $coinCategory) {
	$sql = mysql_query( "SELECT * FROM collectfirstday WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND  userID = '$userID'");
	return mysql_num_rows($sql);    	
    }	
	

	public function getFirstDaySumByCategory($coinCategory, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectfirstday WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
	public function getFirstDaySumByCategoryFrom($coinCategory, $userID, $purchaseFrom) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectfirstday WHERE purchaseFrom = '".str_replace('_', ' ', $purchaseFrom)."' AND coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }			

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Type	
	public function getFirstDaySumByType($coinType, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectfirstday WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
	public function getFirstDayCountByType($userID, $coinType) {
	$sql = mysql_query( "SELECT * FROM collectfirstday WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND  userID = '$userID'");
	$collectCount = mysql_num_rows($sql);    	
	
	return $collectCount;
    }			

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//CERTIFIED	
	public function getCertificationFirstDayCountById($userID) {
	$sql = mysql_query( "SELECT * FROM collectfirstday WHERE proService != 'None' AND  userID = '$userID'");
	return mysql_num_rows($sql);    	
    }

	function getFirstDayProGrader($proService, $userID){
	$myQuery = mysql_query("SELECT * FROM collectfirstday WHERE userID = '$userID'  AND proService = '$proService'") or die(mysql_error()); 
	return mysql_num_rows($myQuery);    	
    }	

	function getFirstDaySetTypeProGrader($proService, $firstdayType, $userID){
	$myQuery = mysql_query("SELECT * FROM collectfirstday WHERE userID = '$userID' AND firstdayType = '$firstdayType'  AND proService = '$proService'") or die(mysql_error()); 
	return mysql_num_rows($myQuery);    	
    }	
	
	public function getCertificationFirstDayCountByType($userID, $coinType) {
	$sql = mysql_query( "SELECT * FROM collectfirstday WHERE proService != 'None' AND userID = '$userID' AND coinType = '$coinType' ");
	return mysql_num_rows($sql);    	
    }
	
	public function getCertificationFirstDayCountByCategory($userID, $coinCategory) {
	$sql = mysql_query( "SELECT * FROM collectfirstday WHERE proService != 'None' AND  userID = '$userID' AND coinCategory = '$coinCategory' ");
	return mysql_num_rows($sql);    	
    }	




	public function getFirstDayCountByFirstDayId($firstdayID, $userID) {
	$sql = mysql_query( "SELECT * FROM collectfirstday WHERE firstdayID = '$firstdayID' AND  userID = '$userID'");
	return mysql_num_rows($sql);    	
    }	


//FD ID
    public function firstDayIDCollected($firstdayID, $userID){
	$sql = mysql_query("SELECT * FROM collectfirstday WHERE firstdayID = '$firstdayID' AND  userID = '$userID'");
	return mysql_num_rows($sql);
}	
	function totalFirstDayIDInvestment($firstdayID, $userID){
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectfirstday WHERE userID = '$userID' AND  firstdayID = '$firstdayID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	function getFirstDayIDProGrader($firstdayID, $proService, $firstdayType, $userID){
	$myQuery = mysql_query("SELECT * FROM collectfirstday WHERE userID = '$userID' AND firstdayType = '$firstdayType'  AND proService = '$proService' AND firstdayID = '$firstdayID'") or die(mysql_error()); 
	return mysql_num_rows($myQuery);    	
    }		

	public function getCertificationFirstDayCountByFirstID($userID, $firstdayID) {
	$sql = mysql_query( "SELECT * FROM collectfirstday WHERE proService != 'None' AND  userID = '$userID' AND firstdayID = '$firstdayID' ");
	return mysql_num_rows($sql);    	
    }	
//TYPES
    public function firstDayTypeCollected($coinType, $userID){
	$sql = mysql_query("SELECT * FROM collectfirstday WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND  userID = '$userID'");
	return mysql_num_rows($sql);
}	
    public function firstDayUniqueTypeCollected($coinType, $userID){
	$sql = mysql_query("SELECT DISTINCT coinVersion FROM collectfirstday WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND  userID = '$userID'");
	return mysql_num_rows($sql);
}	


	function totalFirstDayTypeInvestment($coinType, $userID){
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectfirstday WHERE userID = '$userID' AND  coinType = '".str_replace('_', ' ', $coinType)."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	function getFirstDayCoinTypeProGrader($coinType, $proService, $firstdayType, $userID){
	$myQuery = mysql_query("SELECT * FROM collectfirstday WHERE userID = '$userID' AND firstdayType = '$firstdayType'  AND proService = '$proService' AND coinType = '".str_replace('_', ' ', $coinType)."'") or die(mysql_error()); 
	return mysql_num_rows($myQuery);    	
    }	
//VERSION
    public function firstDayVersionCollected($coinVersion, $userID){
	$sql = mysql_query("SELECT * FROM collectfirstday WHERE coinVersion = '".str_replace('_', ' ', $coinVersion)."' AND  userID = '$userID'");
	return mysql_num_rows($sql);
}	
	function totalFirstDayVersionInvestment($coinVersion, $userID){
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectfirstday WHERE userID = '$userID' AND  coinVersion = '".str_replace('_', ' ', $coinVersion)."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	function getFirstDayCoinVersionProGrader($coinVersion, $proService, $firstdayType, $userID){
	$myQuery = mysql_query("SELECT * FROM collectfirstday WHERE userID = '$userID' AND firstdayType = '$firstdayType'  AND proService = '$proService' AND coinVersion = '".str_replace('_', ' ', $coinVersion)."'") or die(mysql_error()); 
	return mysql_num_rows($myQuery);    	
    }		

	public function getCertificationFirstDayCountByVersion($userID, $coinVersion) {
	$sql = mysql_query( "SELECT * FROM collectfirstday WHERE proService != 'None' AND  userID = '$userID' AND coinVersion = '$coinVersion' ");
	return mysql_num_rows($sql);    	
    }	




	
}//End Class
?>