<?php 
//getSetCountByTypeByUserID
class CollectionSet {

    public function getCollectionSetById($collectsetID) {
        $sql = mysql_query("SELECT * FROM collectset WHERE collectsetID = '$collectsetID'") or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->userID = $row['userID'];
        $this->mintsetID = $row['mintsetID'];
        $this->setNickname = $row['setNickname'];		
		$this->collectsetID = $row['collectsetID'];	
		$this->coinType = $row['coinType'];
		$this->coinCategory = $row['coinCategory'];
		$this->purchaseFrom = $row['purchaseFrom'];
        $this->purchaseDate = $row['purchaseDate'];
        $this->purchasePrice = $row['purchasePrice'];
        $this->listDate = $row['listDate'];
		$this->sellPrice = $row['sellPrice'];
		$this->sellDate = $row['sellDate'];		
        $this->ebaySellerID = $row['ebaySellerID'];
        $this->auctionNumber = $row['auctionNumber'];
		$this->coinGrade = $row['coinGrade'];		
		$this->additional = $row['additional'];	
		$this->coinNote = $row['coinNote'];	
		$this->setType = $row['setType'];
        $this->setVersion = $row['setVersion'];
		$this->coinMetal = $row['coinMetal'];
		$this->coinSubCategory = $row['coinSubCategory'];		
        $this->designation = $row['designation'];
		$this->shopName = $row['shopName'];
		$this->shopUrl = $row['shopUrl'];		
        $this->enterDate = $row['enterDate'];
		$this->coinYear = $row['coinYear'];
        $this->slabLabel = $row['slabLabel'];
		$this->coinPic1 = $row['coinPic1'];		
		$this->coinPic2 = intval($row["coinPic2"]);
		$this->coinPic3 = intval($row["coinPic3"]);
		$this->coinPic4 = intval($row["coinPic4"]);
		$this->proService = $row['proService'];
		$this->showName = $row['showName'];		
		$this->showCity = $row['showCity'];	
		$this->mintBox = $row['mintBox'];	
		$this->setCount = $row['setCount'];	
		$this->containerID = $row['containerID'];		
		$this->coincollectID = $row['coincollectID'];	
		$this->boxCondition = $row['boxCondition'];	
		$this->coinsCondition = $row['coinsCondition'];		
		$this->slabCondition = $row['slabCondition'];	

        return true;
    }

	public function getBoxCondition() {
        return strip_tags($this->boxCondition);
    }	
	public function getCoinsCondition() {
        return strip_tags($this->coinsCondition);
    }	
	public function getSlabCondition() {
        return strip_tags($this->slabCondition);
    }	


	public function getContainerID() {
        return strip_tags($this->containerID);
    }	
	public function getCoincollectID() {
        return strip_tags($this->coincollectID);
    }	
	public function getSetCount() {
        return strip_tags($this->setCount);
    }	
	
	public function getMintBox() {
        return strip_tags($this->mintBox);
    }	
	public function getShowName() {
        return strip_tags($this->showName);
    }	
	public function getShowCity() {
        return strip_tags($this->showCity);
    }		
	public function getGrader() {
        return strip_tags($this->proService);
    }	
	public function getCoinMetal() {
        return strip_tags($this->coinMetal);
    }	
	public function getCoinYear() {
        return strip_tags($this->coinYear);
    }	
	public function getSetVersion() {
        return strip_tags($this->setVersion);
    }	
	public function getSetType() {
        return strip_tags($this->setType);
    }		
	public function getCoinCategory() {
        return strip_tags($this->coinCategory);
    }	
	public function getCoinNote() {
        return strip_tags($this->coinNote);
    }	
	public function getShopName() {
        return strip_tags($this->shopName);
    }
	public function getShopUrl() {
        return strip_tags($this->shopUrl);
    }
	public function getMintsetID() {
        return strip_tags($this->mintsetID);
    }
	public function getCoinID() {
        return strip_tags($this->coinID);
    }
	public function getCoinType() {
        return strip_tags($this->coinType);
    }
	public function getCoinGrade() {
        return strip_tags($this->coinGrade);
    }
	public function getCoinDate() {
        return strip_tags($this->purchaseDate);
    }
	public function getCoinPrice() {
        return strip_tags($this->purchasePrice);
    }	
	public function getPurchaseFrom() {
        return strip_tags($this->purchaseFrom);
    }	
	public function getEbaySellerID() {
        return strip_tags($this->ebaySellerID);
    }	
	public function getAuctionNumber() {
        return strip_tags($this->auctionNumber);
    }		
	
	public function getSetNickname() {
        return strip_tags($this->setNickname);
    }		
		public function getAdditional() {
        return strip_tags($this->additional);
    }		



	  public function getFirstday() {
	  return strip_tags($this->firstDay);
    }		
	  public function getMintMark() {
	  return strip_tags($this->mintMark);
    }	
	public function getCoinImage1() {
        return strip_tags($this->coinPic1);
    }	
	public function getCoinImage2() {
        return strip_tags($this->coinPic2);
    }
	public function getCoinImage3() {
        return strip_tags($this->coinPic3);
    }
	public function getCoinImage4() {
        return strip_tags($this->coinPic4);
    }		
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//add and remove

function enterMintsetCoin($coinID, $mintsetID, $coinType, $coinCategory, $purchaseDate){
mysql_query("INSERT INTO collection(coinID, coinType, coinCategory,  slabCondition, coinGrade, designation, problem, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, userID, errorType, byMint, firstday) VALUES('$coinID', '$coinType', '$coinCategory', '$slabCondition',  '$coinGrade', '$designation', '$problem', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '0.00', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$userID', '$errorType', '$byMint', '$firstday')") or die(mysql_error()); 

return true;
}

function deleteCoinSet($collectsetID, $userID){
	 mysql_query("DELETE FROM collection WHERE collectsetID = '$collectsetID' AND userID = '$userID'") or die(mysql_error());
	 return;
}
function deleteCollectedCoinSet($collectsetID, $userID){
	$this->getCollectionSetById($collectsetID);
	if($this->getCoinImage1() !== 'blankBig.jpg'){
		
		if (file_exists($this->getCoinImage1())) {
			unlink($this->getCoinImage1());
		} 
		
	}
	if($this->getCoinImage2() !== 'blankBig.jpg'){
		
		if (file_exists($this->getCoinImage2())) {
			unlink($this->getCoinImage2());
		} 
		
	}
	if($this->getCoinImage3() !== 'blankBig.jpg'){
		
		if (file_exists($this->getCoinImage3())) {
			unlink($this->getCoinImage3());
		} 
		
	}
	if($this->getCoinImage4() !== 'blankBig.jpg'){
		
		if (file_exists($this->getCoinImage4())) {
			unlink($this->getCoinImage4());
		} 
		
	}
	  $this->deleteCoinSet($collectsetID, $userID); 
	  return;
}
function getSetTypeLink($setType){
	
		$setList = '<option value="viewVarietySet.php">Variety Sets</option>
		                 <option value="viewSet.php">Mint Sets</option>
						  <option value="viewSet.php">Proof Sets</option>
						  <option value="viewVarietySet.php">Souvenir Sets</option>
						  <option value="viewYearSet.php">Year Sets</option>
						  <option value="viewSet.php">Variety Sets</option>
						  <option value="viewSet.php">Variety Sets</option>
						  <option value="viewSet.php">Variety Sets</option>
						  <option value="viewSet.php">Variety Sets</option>';

		return $setList;
}
function getSetDetailLink($collectsetID){
	$Encryption = new Encryption();
		$this->getCollectionSetById($collectsetID);
		switch($this->getSetType()){
			case 'Variety Set':
			    $detailLink = '<a href="viewVarietySet.php?ID=' .$Encryption->encode($collectsetID). '">' .$this->getSetNickname(). '</a>';
			break;	
			case 'Mint':
			    $detailLink = '<a href="viewSet.php?ID=' .$Encryption->encode($collectsetID). '">' .$this->getSetNickname(). '</a>';		
			break;			
			case 'Proof':
			$detailLink = '<a href="viewSet.php?ID=' .$Encryption->encode($collectsetID). '">' .$this->getSetNickname(). '</a>';
			break;	
			case 'Souvenir Set':
			$detailLink = '<a href="viewSet.php?ID=' .$Encryption->encode($collectsetID). '">' .$this->getSetNickname(). '</a>';
			break;	
			case 'Year Set':
			$detailLink = '<a href="viewYearSet.php?ID=' .$Encryption->encode($collectsetID). '">' .$this->getSetNickname(). '</a>';
			break;		
			case 'Commemorative':
			    $detailLink = '<a href="viewSet.php?ID=' .$Encryption->encode($collectsetID). '">' .$this->getSetNickname(). '</a>';		
			break;	
			case 'American Eagle':
			$detailLink = '<a href="viewSet.php?ID=' .$Encryption->encode($collectsetID). '">' .$this->getSetNickname(). '</a>';
			break;				
		}
		return $detailLink;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//By User
	public function getMintsetUniqueCountById($userID) {
	$sql = mysql_query("SELECT DISTINCT mintsetID FROM collectset WHERE userID = '$userID'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
    }	
	
	public function getMintsetCountById($userID) {
	$sql = mysql_query("SELECT * FROM collectset WHERE userID='$userID'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
    }	
	public function getMintsetCertifiedCountById($userID) {
	$sql = mysql_query("SELECT * FROM collectset WHERE userID='$userID' AND proService != 'None' ") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
    }	
	
	function totalAllMintsetsInvestment($userID){
	$myQuery = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectset WHERE userID = '$userID'") or die(mysql_error()); 
	
	while($row = mysql_fetch_array($myQuery))
	{
	  $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
	}	
		return $coinSum;
	}
//from
	function totalAllMintsetsInvestmentFrom($userID, $purchaseFrom){
	$myQuery = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectset WHERE purchaseFrom = '".str_replace('_', ' ', $purchaseFrom)."' AND userID = '$userID'") or die(mysql_error()); 
	
	while($row = mysql_fetch_array($myQuery))
	{
	  $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
	}	
		return $coinSum;
	}
	public function getAllTableCountByIDFrom($userID, $purchaseFrom) {
	$sql = mysql_query( "SELECT * FROM collectset WHERE userID = '$userID' AND purchaseFrom = '".str_replace('_', ' ', $purchaseFrom)."'") or die(mysql_error()); 
	return mysql_num_rows($sql); 
    }		
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//SET COUNTS
	public function getSetCountByTypeByUserID($setType, $userID){
    $sql = mysql_query("SELECT * FROM collectset WHERE setType = '$setType' AND userID = '$userID' ") or die(mysql_error());
	return mysql_num_rows($sql);
    }
	public function getAmEagleSetCountByTypeByUserID($setType, $coinMetal, $userID){
    $sql = mysql_query("SELECT * FROM collectset WHERE setType = '$setType' AND coinMetal = '$coinMetal' AND userID = '$userID' ") or die(mysql_error());
	return mysql_num_rows($sql);
    }




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	
	public function getMintsetCountByMintsetID($mintsetID, $userID) {
		$sql = mysql_query("SELECT * FROM collectset WHERE mintsetID = '$mintsetID' AND userID = '$userID'") or die(mysql_error()); 
	return mysql_num_rows($sql);
    }	
	

	
	public function getMintsetIDSumById($mintsetID, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectset WHERE  userID = '$userID' AND mintsetID = '$mintsetID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	





	function getSetProGrader($proService, $userID){
	$myQuery = mysql_query("SELECT * FROM collectset WHERE userID = '$userID'  AND proService = '$proService'") or die(mysql_error()); 
	return mysql_num_rows($myQuery);    	
    }	
	function getSetProofProGrader($proService, $userID, $coinMetal){
	$myQuery = mysql_query("SELECT * FROM collectset WHERE userID = '$userID' AND coinMetal = '$coinMetal' AND strike = 'Proof' AND proService = '$proService'") or die(mysql_error()); 
	return mysql_num_rows($myQuery);    	
    }	
	function getSetYearSetProofProGrader($proService, $userID){
	$myQuery = mysql_query("SELECT * FROM collectset WHERE setType = 'Year Set' AND userID = '$userID' AND strike = 'Proof' AND proService = '$proService'") or die(mysql_error()); 
	return mysql_num_rows($myQuery);    	
    }	

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//REPORTS
	public function getCoinSumByType($coinType, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectset WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }
	public function getTotalInvestmentSumByCategory($coinCategory, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectset WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//BY SET TYPE
	public function getSetTypeCountByID($setType, $userID) {
		$sql = mysql_query("SELECT * FROM collectset WHERE setType = '$setType' AND userID = '$userID'") or die(mysql_error()); 
	return mysql_num_rows($sql);
    }	
	public function getUniqueSetTypeCountById($setType,$userID) {
	$sql = mysql_query("SELECT DISTINCT mintsetID FROM collectset WHERE userID = '$userID' AND setType = '".str_replace('_', ' ', $setType)."'") or die(mysql_error());
	return mysql_num_rows($sql);    	
    }	

	function getSetTypeProGrader($setType,$proService, $userID){
	$myQuery = mysql_query("SELECT * FROM collectset WHERE userID = '$userID'  AND proService = '$proService' AND setType = '".str_replace('_', ' ', $setType)."'") or die(mysql_error());
	return mysql_num_rows($myQuery);    	
    }	
	
    public function getSetTypeSumByID($setType, $userID){
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectset WHERE userID = '$userID' AND setType = '".str_replace('_', ' ', $setType)."'") or die(mysql_error());
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//BY METAL
	public function getSetMetalCountByID($coinMetal, $userID) {
		$sql = mysql_query("SELECT * FROM collectset WHERE proService = 'None' AND coinMetal = '$coinMetal' AND userID = '$userID'") or die(mysql_error()); 
	return mysql_num_rows($sql);
    }	
	public function getSetMetalProCountByID($coinMetal, $proService, $userID) {
		$sql = mysql_query("SELECT * FROM collectset WHERE proService = '$proService' AND coinMetal = '$coinMetal' AND userID = '$userID'") or die(mysql_error()); 
	return mysql_num_rows($sql);
    }
	
	
	public function getAllSetMetalCountByID($coinMetal, $userID) {
		$sql = mysql_query("SELECT * FROM collectset WHERE coinMetal = '$coinMetal' AND userID = '$userID'") or die(mysql_error()); 
	return mysql_num_rows($sql);
    }
	    public function getMetalSetSumByID($coinMetal, $userID){
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectset WHERE userID = '$userID' AND coinMetal = '".str_replace('_', ' ', $coinMetal)."'") or die(mysql_error());
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	public function getSetMetalAllProCountByID($coinMetal, $userID) {
		$sql = mysql_query("SELECT * FROM collectset WHERE proService != 'None' AND coinMetal = '$coinMetal' AND userID = '$userID'") or die(mysql_error()); 
	return mysql_num_rows($sql);
    }	  	
//Proof BY METAL

	public function getGradedProofSetProCountByID($proService, $userID) {
		$sql = mysql_query("SELECT * FROM collectset WHERE strike = 'Proof' AND userID = '$userID' AND  proService = '$proService'") or die(mysql_error()); 
	return mysql_num_rows($sql);
    }	

	public function getProofSetCountByID($userID) {
		$sql = mysql_query("SELECT * FROM collectset WHERE strike = 'Proof' AND userID = '$userID' AND  proService = 'None'") or die(mysql_error()); 
	return mysql_num_rows($sql);
    }	
	public function getProofSetMetalCountByID($coinMetal, $userID) {
		$sql = mysql_query("SELECT * FROM collectset WHERE proService = 'None' AND coinMetal = '$coinMetal' AND strike = 'Proof' AND userID = '$userID'") or die(mysql_error()); 
	return mysql_num_rows($sql);
    }	
	public function getProofSetMetalProCountByID($coinMetal, $proService, $userID) {
		$sql = mysql_query("SELECT * FROM collectset WHERE proService = '$proService' AND coinMetal = '$coinMetal' AND strike = 'Proof' AND userID = '$userID'") or die(mysql_error()); 
	return mysql_num_rows($sql);
    }	

    public function getBullionProofSetSumByID($coinMetal, $userID){
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectset WHERE userID = '$userID' AND strike = 'Proof' AND coinMetal = '".str_replace('_', ' ', $coinMetal)."'") or die(mysql_error());
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Damaged sets
	public function getSetTypeConditionCountByID($slabCondition, $userID) {
		$sql = mysql_query("SELECT * FROM collectset WHERE setType = 'Proof' AND slabCondition = '$slabCondition' AND userID = '$userID'") or die(mysql_error()); 
	return mysql_num_rows($sql);
    }	







	
}//End Class
?>