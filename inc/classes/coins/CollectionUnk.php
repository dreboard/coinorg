<?php 
//getDesignImg
//getCoinFolderCountByCoinID
//getCollectionCountByType
//setNoGrade


class CollectionUnk {

	public function __construct() { 
		} 

    public function getCollectionById($unknownCollectionID ) {	
		$sql = mysql_query("SELECT * FROM unknowncoins WHERE unknownCollectionID = '$unknownCollectionID'") or die(mysql_error());
        $row = mysql_fetch_array($sql);		
		$this->coinNickname = $row['coinNickname'];
        $this->userID = $row['userID'];
        $this->unknownCollectionID = $row['unknownCollectionID'];
		$this->mintMark = $row['mintMark'];
		$this->coinType = $row['coinType'];
		$this->coinCategory = $row['coinCategory'];		

		
        $this->listDate = $row['listDate'];
		$this->sellPrice = $row['sellPrice'];
		$this->sellDate = $row['sellDate'];		
        $this->sellFees = $row['sellFees'];


		$this->additional = $row['additional'];		
		$this->coinNote = $row['coinNote'];	
		$this->collectfolderID = $row['collectfolderID'];
		$this->collectrollsID = $row['collectrollsID'];
		$this->additional = $row['additional'];			
        $this->strike = $row['strike'];

		$this->coinGrade = $row['coinGrade'];	
		$this->problem = $row['problem'];		
		
        $this->coinNote = $row['coinNote'];
		$this->enterDate = $row['enterDate'];
		$this->coinPic1 = $row['coinPic1'];		
		$this->coinPic2 = $row['coinPic2'];		
		$this->coinPic3 = $row['coinPic3'];	
		$this->coinPic4 = $row['coinPic4'];			
	
		$this->coinYear = $row['coinYear'];
		$this->mintMark = $row['mintMark'];	
		$this->coinMetal = $row['coinMetal'];
		
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

		return true;
    }


	public function getProblem() {
        return strip_tags($this->problem);
    }
	public function getContainerID() {
        return strip_tags($this->containerID);
    }	
	public function getCoincollectID() {
        return strip_tags($this->coincollectID);
    }	

	public function getCoinVersion() {
        return strip_tags($this->coinVersion);
    }	

	public function getShowName() {
        return strip_tags($this->showName);
    }	
	public function getShowCity() {
        return strip_tags($this->showCity);
    }	
	public function getCoinUser() {
        return strip_tags($this->userID);
    }  	
	public function getCoinMetal() {
        return strip_tags($this->coinMetal);
    }  		
	public function getCoinNickname() {
        return strip_tags($this->coinNickname);
    }  		
	public function getMintMark() {
        return strip_tags($this->mintMark);
    }  
	public function getCoinYear() {
        return strip_tags($this->coinYear);
    }  		
											
	
	public function getStrike() {
        return strip_tags($this->strike);
    }				
	public function getShopName() {
        return strip_tags($this->shopName);
    }		
	public function getShopURL() {
        return strip_tags($this->shopUrl);
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
	public function getCoinCategory() {
        return strip_tags($this->coinCategory);
    }	
	public function getCoinType() {
        return strip_tags($this->coinType);
    }
	public function getCoinGrade() {
        return strip_tags($this->coinGrade);
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
	public function getEbaySellerID() {
        return strip_tags($this->ebaySellerID);
    }
	public function getAuctionNumber() {
        return strip_tags($this->auctionNumber);
    }	
	
			
   public function getAdditional() {
	  return strip_tags($this->additional);
    }		
	public function getCoinNote() {
        return $this->coinNote;
    }	
	  public function getCollectionFolder() {
	  return strip_tags($this->collectfolderID);
    }	
	  public function getCollectionRoll() {
	  return strip_tags($this->collectrollsID);
    }		
	
	public function getCoinTypeLink($unknownCollectionID) {
		$this->getCollectionById($unknownCollectionID);
		switch ($this->coinType)
		  {
		  case "Unknown":
			$link =  '<a href="'.str_replace(' ', '_', $this->getCoinCategory()).'">'.$CollectionUnk->getCoinCategory().'</a>';
			break;
		  default:
			$link =  '<a href="viewUnknownType.php?coinType='.str_replace(' ', '_', $this->getCoinType()).'">'.$CollectionUnk->getCoinType().'</a>';
		  }
		
        return $link;
    }
	public function getCoinTypeImg($unknownCollectionID) {
		$this->getCollectionById($unknownCollectionID);
		switch ($this->coinType)
		  {
		  case "Unknown":
			$link =  str_replace(' ', '_', $this->getCoinCategory());
			break;
		  default:
			$link =  str_replace(' ', '_', $this->getCoinType());
		  }
		
        return $link;
    }
	
function deleteCollectedCoin($unknownCollectionID, $userID){
	$unknownCollectionID = intval($_POST["unknownCollectionID"]);
	$this->getCollectionById($unknownCollectionID);
	if($this->getCoinImage1() !== 'blankBig.jpg'){
		unlink($this->getCoinImage1());
	}	else if($this->getCoinImage2() !== 'blankBig.jpg'){
		unlink($this->getCoinImage2());
	}	elseif($this->getCoinImage3() !== 'blankBig.jpg'){
		unlink($this->getCoinImage3());
	}	elseif($this->getCoinImage4() !== 'blankBig.jpg'){
		unlink($this->getCoinImage4());
	}
	  @mysql_query("DELETE FROM unknowncoins WHERE unknownCollectionID = '$unknownCollectionID' AND userID = '$userID'") or die(mysql_error()); 
	  return;
}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//Master totals	
	///Coin images
	public function getTypeCollectionProgress($coinCategory, $userID) {
	$sql = mysql_query( "SELECT * FROM unknowncoins WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND  userID = '$userID' LIMIT 1");
	$collectCount = mysql_num_rows($sql);    	
	return $collectCount;
    }	
	

			
	public function getCollectionCountById($userID) {
	$sql = mysql_query("SELECT * FROM unknowncoins WHERE  userID = '$userID'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
    }	
	
	public function getCoinSumByAccount($userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM unknowncoins WHERE  userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	public function getCoinFaceValueByAccount($userID) {
	$sql = mysql_query("SELECT COALESCE(sum(denomination), 0.00) FROM unknowncoins WHERE  userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(denomination), 0.00)'];
			  }
			  return $coinSum;	
	  }		
//from
	public function getCoinSumByAccountFrom($userID, $purchaseFrom) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM unknowncoins WHERE purchaseFrom = '".str_replace('_', ' ', $purchaseFrom)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	public function getCoinFaceValueByAccountFrom($userID, $purchaseFrom) {
	$sql = mysql_query("SELECT COALESCE(sum(denomination), 0.00) FROM unknowncoins WHERE purchaseFrom = '".str_replace('_', ' ', $purchaseFrom)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(denomination), 0.00)'];
			  }
			  return $coinSum;	
	  }		
	public function getAllTableCountByIDFrom($userID, $purchaseFrom) {
	$sql = mysql_query( "SELECT * FROM unknowncoins WHERE userID = '$userID' AND purchaseFrom = '".str_replace('_', ' ', $purchaseFrom)."'") or die(mysql_error()); 
	return mysql_num_rows($sql); 
    }		      
/////////////////////////////////////////////////////////////
//Proofs
	public function getProofCollectionCountById($userID) {
	$sql = mysql_query("SELECT * FROM collection WHERE  userID = '$userID' AND strike = 'Proof'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
    }

	public function getProofCoinSumByAccount($userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM unknowncoins WHERE  userID = '$userID' AND strike = 'Proof'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	

	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//By century
	public function getUniqueCenturyCollectionCountById($userID, $century) {
	$sql = mysql_query( "SELECT * FROM unknowncoins WHERE userID = '$userID' AND century = '$century'") or die(mysql_error());	
	return mysql_num_rows($sql);
    }	
	
	public function getCenturySumByAccount($userID, $century) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM unknowncoins WHERE userID = '$userID' AND century = '$century'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	public function getCenturyFaceValByAccount($userID, $century) {
	$sql = mysql_query("SELECT COALESCE(sum(denomination), 0.00) FROM unknowncoins WHERE  userID = '$userID' AND century = '$century'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(denomination), 0.00)'];
			  }
			  return $coinSum;	
	  }		

	

/////century percentages
//20th

	public function getCenturyTypeCollectionProgress($userID, $century) {
	$sql = mysql_query( "SELECT DISTINCT coinType FROM unknowncoins WHERE century = '".$century."' AND  userID = '".$userID."'");
	return mysql_num_rows($sql);    	
    }	



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////Coin Category totals
	
		//Total Collected
		public function getTotalCollectedCoinsByID($coinCategory, $userID) {
			    $sql = mysql_query("SELECT * FROM unknowncoins WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID'") or die(mysql_error()); 
	            return mysql_num_rows($sql);
	}		
	//Total Investment
	public function getTotalFaceValSumByCategory($coinCategory, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(denomination), 0.00) FROM unknowncoins WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(denomination), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	public function getTotalInvestmentSumByCategory($coinCategory, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM unknowncoins WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		

	public function getTotalInvestmentSumByCategoryFrom($coinCategory, $userID, $purchaseFrom) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM unknowncoins WHERE purchaseFrom = '".str_replace('_', ' ', $purchaseFrom)."' AND coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////Coin Type totals
	
		//Total Collected
		public function getTotalCollectedTypeCoinsByID($coinType, $userID) {
			    $sql = mysql_query("SELECT * FROM unknowncoins WHERE coinCategory = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID'") or die(mysql_error()); 
	            return mysql_num_rows($sql);
	}		
	//Total Investment
	public function getTotalFaceValSumByType($coinType, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(denomination), 0.00) FROM unknowncoins WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(denomination), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	public function getTotalInvestmentSumByType($coinType, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM unknowncoins WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		

	public function getTotalInvestmentSumByTypeFrom($coinType, $userID, $purchaseFrom) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM unknowncoins WHERE purchaseFrom = '".str_replace('_', ' ', $purchaseFrom)."' AND coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		



}//END CLASS
?>