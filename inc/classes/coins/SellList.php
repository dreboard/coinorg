<?php 
//getVarietyImg

class SellList {

    public function getSellItemById($sellListID) {
        $sql = 'SELECT * FROM selllist WHERE sellListID = ' . $sellListID;
        $results = mysql_query($sql);
        $row = mysql_fetch_array($results);
        $this->userID = $row['userID'];
		$this->sellListID = $row['sellListID'];		
		
		$this->sellPrice = $row['sellPrice'];
		$this->sellDate = $row['sellDate'];		
        $this->sellStatus = $row['sellStatus'];	
        $this->sellFees = $row['sellFees'];
		$this->listPrice = $row['listPrice'];
        $this->listDate = $row['listDate'];
		
		$this->buyer = $row['buyer'];
		$this->buyerAddress = $row['buyerAddress'];
		$this->buyerCity = $row['buyerCity'];		
        $this->buyerState = $row['buyerState'];
		$this->buyerZip = $row['buyerZip'];
		
        $this->collectionID = $row['collectionID'];
        $this->coinID = $row['coinID'];
		$this->mintMark = $row['mintMark'];
		$this->coinType = $row['coinType'];
		$this->coinCategory = $row['coinCategory'];		

		$this->additional = $row['additional'];		
		$this->coinNote = $row['coinNote'];	
		$this->collectfolderID = $row['collectfolderID'];
		$this->collectrollsID = $row['collectrollsID'];
		$this->collectsetID = $row['collectsetID'];
		$this->additional = $row['additional'];			
        $this->strike = $row['strike'];
		
		$this->proService = $row['proService'];
		$this->proSerialNumber = $row['proSerialNumber'];
		$this->slabLabel = $row['slabLabel'];		        
		$this->slabCondition = $row['slabCondition'];
		$this->coinGrade = $row['coinGrade'];	
		$this->designation = $row['designation'];	
		$this->problem = $row['problem'];		
		
        $this->coinNote = $row['coinNote'];
        $this->errorType = $row['errorType'];
		$this->firstday = $row['firstday'];		
		$this->holderCode = $row['holderCode'];			

		$this->series = $row['series'];		
		$this->offPercent = $row['offPercent'];			
        $this->strikeNumber = $row['strikeNumber'];
        $this->offPercent2 = $row['offPercent2'];
        $this->broadstrikeType = $row['broadstrikeType'];
        $this->bondedPlanchets = $row['bondedPlanchets'];
		$this->matedPairType = $row['matedPairType'];
		$this->DoubleDenom1 = $row['DoubleDenom1'];		
		$this->DoubleDenom2 = $row['DoubleDenom2'];		
		$this->indentPercent = $row['indentPercent'];	
		$this->planchetType = $row['planchetType'];	
		$this->planchetMetal = $row['planchetMetal'];		
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

		
		$this->keyDate = $row['keyDate'];
		$this->design = $row['design'];
		$this->coinVersion = $row['coinVersion'];
		$this->variety = $row['variety'];
		$this->vam = $row['vam'];
			
        return true;
    }
	public function getBuyer() {
        return strip_tags($this->buyer);
    }
	public function getBuyerAddress() {
        return strip_tags($this->buyerAddress);
    }
		public function getBuyerCity() {
        return strip_tags($this->buyerCity);
    }
		public function getBuyerState() {
        return strip_tags($this->buyerState);
    }
		public function getBuyerZip() {
        return strip_tags($this->buyerZip);
    }	
	
	
	
	public function getSaleDate() {
        return strip_tags($this->sellDate);
    }
	public function getSalePrice() {
        return strip_tags($this->sellPrice);
    }	
	public function getSellerFees() {
        return strip_tags($this->sellFees);
    }		
	public function getListDate() {
        return strip_tags($this->listDate);
    }
	public function getListPrice() {
        return strip_tags($this->listPrice);
    }	
	
	public function getVariety() {
        return strip_tags($this->variety);
    }
	public function getVam() {
        return strip_tags($this->vam);
    }
	public function getProblem() {
        return strip_tags($this->problem);
    }

	public function getCoinVersion() {
        return strip_tags($this->coinVersion);
    }	
	public function getDesign() {
        return strip_tags($this->design);
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
	public function getErrorType() {
        return strip_tags($this->errorType);
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
	public function getoffPercent() {
        return strip_tags($this->offPercent);
    }	
	public function getstrikeNumber() {
        return strip_tags($this->strikeNumber);
    }	
	public function getoffPercent2() {
        return strip_tags($this->offPercent2);
    }	
	public function getbroadstrikeType() {
        return strip_tags($this->broadstrikeType);
    }	
	public function getbondedPlanchets() {
        return strip_tags($this->bondedPlanchets);
    }	
	public function getmatedPairType() {
        return strip_tags($this->matedPairType);
    }	
	public function getDoubleDenom1() {
        return strip_tags($this->DoubleDenom1);
    }	
	public function getDoubleDenom2() {
        return strip_tags($this->DoubleDenom2);
    }	
	public function getindentPercent() {
        return strip_tags($this->indentPercent);
    }	
	public function getplanchetType() {
        return strip_tags($this->planchetType);
    }	
	public function getplanchetMetal() {
        return strip_tags($this->planchetMetal);
    }											
	
	public function getStrike() {
        return strip_tags($this->strike);
    }		
	public function getSeries() {
        return strip_tags($this->series);
    }			
	public function getShopName() {
        return strip_tags($this->shopName);
    }		
	public function getShopURL() {
        return strip_tags($this->shopUrl);
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

	public function getCoinGradeNumber() {
        return intval(preg_replace('#[^0-9]#i', '', $this->coinGrade));
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
	
	
	
	
	public function getGrader() {
        return strip_tags($this->proService);
    }	
	public function getSlabLabel() {
        return strip_tags($this->slabLabel);
    }	
	public function getSlabCondition() {
        return strip_tags($this->slabCondition);
    }
	public function getDesignation() {
        return strip_tags($this->designation);
    }	
	public function getGraderNumber() {
        return strip_tags($this->proSerialNumber);
    }	
	
	
	public function getCoinID() {
        return strip_tags($this->coinID);
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
	
	 public function getCollectionSet() {
	  return strip_tags($this->collectsetID);
    }		





///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	
	
public function deleteSaleCoin($sellListID, $userID){
	$this->getCollectionById($sellListID);
	if($this->getCoinImage1() !== '../img/noPic.jpg'){
		unlink($this->getCoinImage1());
	}
	  @mysql_query("DELETE FROM sellList WHERE sellListID = '$sellListID'") or die(mysql_error()); 
	  return;
}



//By category
public function getSalesCountByCategory($coinCategory, $userID){
$sql = mysql_query("SELECT * FROM selllist WHERE coinCategory = '$coinCategory' AND userID = '$userID'") or die(mysql_error());
$getTypeRequest = mysql_num_rows($sql);
return $getTypeRequest;
}	

public function totalSalesTotalsByCategory($coinCategory, $userID){
$myQuery = mysql_query("SELECT SUM(sellPrice) FROM selllist WHERE coinCategory = '$coinCategory' AND userID = '$userID'") or die(mysql_error()); 

while($row = mysql_fetch_array($myQuery))
{
  $coinSum = $row['SUM(purchasePrice)'];
}	
	return $coinSum;
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ADMIN AREA

public function totalCoinsByUser($userID){
$sql = mysql_query("SELECT * FROM selllist WHERE userID = '$userID'") or die(mysql_error()); 
return mysql_num_rows($sql);
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Revenuw

public function totalSalesToDate($userID){
$myQuery = mysql_query("SELECT SUM(sellPrice) FROM selllist WHERE userID = '$userID'") or die(mysql_error()); 

while($row = mysql_fetch_array($myQuery))
{
  $coinSum = $row['SUM(sellPrice)'];
}	
	return $coinSum;
}
public function totalSalesDifference($userID){
$sql = mysql_query("SELECT SUM(sellPrice), SUM(purchasePrice) FROM selllist WHERE userID = '$userID'") or die(mysql_error()); 
$row = mysql_fetch_array($sql);
$value = number_format($row['SUM(sellPrice)'] - $row['SUM(purchasePrice)'], 2);;

	if($value <= 0){
		$diff = '<span class="errorTxt">$'.$value.'</span> ';
	  } elseif ($value == 0) {
	  $diff = '<span>$'.$value.'</span> ';
	  } else {
	  $diff = '<span class="greenTxt">$'.$value.'</span> ';
	  }
	  return $diff;
}

public function thisSalesDifference($sellListID, $userID){
$sql = mysql_query("SELECT sellPrice, purchasePrice FROM selllist WHERE sellListID = '$sellListID' AND userID = '$userID'") or die(mysql_error()); 
$row = mysql_fetch_array($sql);
$value = number_format($row['sellPrice'] - $row['purchasePrice'], 2);;

	if($value <= 0){
		$diff = '<span class="errorTxt">$'.$value.'</span> ';
	  } elseif ($value == 0) {
	  $diff = '<span>$'.$value.'</span> ';
	  } else {
	  $diff = '<span class="greenTxt">$'.$value.'</span> ';
	  }
	  return $diff;
}
public function thisListDifference($sellListID, $userID){
$sql = mysql_query("SELECT sellPrice, listPrice FROM selllist WHERE sellListID = '$sellListID' AND userID = '$userID'") or die(mysql_error()); 
$row = mysql_fetch_array($sql);
$value = number_format($row['sellPrice'] - $row['listPrice'], 2);;

  switch ($value)
  {
  case $value < 0:
	return '<span class="errorTxt">$'.$value.'</span> ';
	break;
  case $value === 0:
	return '<span>$'.$value.'</span> ';
	break;
  case $value > 0:
	return '<span class="greenTxt">$'.$value.'</span> ';
	break;
  }

}




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
////////////////////Main reports
*/






















}//END CLASS
?>