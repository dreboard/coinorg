<?php 
class Invest
{
//getMaxPurchaseCoinID

    public function getPurchaseById($coinID) {
        $sql = 'SELECT * FROM purchases WHERE purchaseID = ' . $purchaseID;
        $results = mysql_query($sql);
        $row = mysql_fetch_array($results);
        $this->userID = $row['userID'];
		$this->purchaseID = $row['purchaseID'];
		$this->collectionID = $row['collectionID'];
		$this->collectbagID = $row['collectbagID'];
		$this->collectboxID = $row['collectboxID'];
        $this->collectrollsID = $row['collectrollsID'];
        $this->collectfirstdayID = $row['collectfirstdayID'];
        $this->collectfolderID = $row['collectfolderID'];
		$this->collectstorageID = $row['collectstorageID'];
		$this->collectsetID = $row['collectsetID'];		

        return true;
    }	
	public function getCollectionID() {
        return strip_tags($this->collectionID);
    }	
	public function getCollectbagID() {
        return strip_tags($this->collectbagID);
    }	
	public function getCollectboxID() {
        return strip_tags($this->collectboxID);
    }	
	public function getCollectrollsID() {
        return strip_tags($this->collectrollsID);
    }	
	public function getCollectfirstdayID() {
        return strip_tags($this->collectfirstdayID);
    }	
	public function getCollectfolderID() {
        return strip_tags($this->collectfolderID);
    }	
	public function getCollectstorageID() {
        return strip_tags($this->collectstorageID);
    }	
	public function getCollectsetID() {
        return strip_tags($this->collectsetID);
    }	

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//All Face Value

	public function getMasterCollectionTotal($userID) {
		$Collection = new Collection();
		$CollectionBags = new CollectionBags();
		$CollectionRolls = new CollectionRolls();
		$CollectionBoxes = new CollectionBoxes();
		$CollectionFirstday = new CollectionFirstday();
		$CollectionFolder = new CollectionFolder();
		$CollectionSet = new CollectionSet();
		
		$investTotal = 
		$Collection->getCoinSumByAccount($userID)+
		$CollectionBags->getUserSum($userID)+
		$CollectionRolls->getUserSum($userID)+
		$CollectionBoxes->getBoxSumByID($userID)+
		$CollectionFirstday->totalFirstDayInvestment($userID)+
		$CollectionFolder->getUserSum($userID)+
		$CollectionSet->totalAllMintsetsInvestment($userID);
		return $investTotal;

	  }	
	public function getMasterFaceValTotal($userID) {
		$Collection = new Collection();
		$CollectionBags = new CollectionBags();
		$CollectionRolls = new CollectionRolls();
		$CollectionBoxes = new CollectionBoxes();
		$CollectionFirstday = new CollectionFirstday();
		$CollectionFolder = new CollectionFolder();
		$CollectionSet = new CollectionSet();
		
		$faceTotal = 
		$Collection->getCoinFaceValueByAccount($userID)+
		$CollectionBags->getBagsFaceVal($userID)+
		$CollectionRolls->getRollsFaceVal($userID)+
		$CollectionBoxes->getBoxSumByID($userID)+
		$CollectionFirstday->totalFirstDayInvestment($userID)+
		$CollectionFolder->getUserSum($userID)+
		$CollectionSet->totalAllMintsetsInvestment($userID);
		return $faceTotal;
	  }	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//All Face Value Category

	public function getMasterCategoryTotal($userID, $coinCategory) {
		$Collection = new Collection();
		$CollectionBags = new CollectionBags();
		$CollectionRolls = new CollectionRolls();
		$CollectionBoxes = new CollectionBoxes();
		$CollectionFirstday = new CollectionFirstday();
		$CollectionFolder = new CollectionFolder();
		$CollectionSet = new CollectionSet();
		
		$investTotal = 
		$Collection->getTotalInvestmentSumByCategory($coinCategory, $userID)+
		$CollectionBags->getTotalInvestmentSumByCategory($coinCategory, $userID)+
		$CollectionRolls->getTotalInvestmentSumByCategory($coinCategory, $userID)+
		$CollectionBoxes->getTotalInvestmentSumByCategory($coinCategory, $userID)+
		$CollectionFirstday->getFirstDaySumByCategory($coinCategory, $userID)+
		$CollectionFolder->getTotalInvestmentSumByCategory($coinCategory, $userID)+
		$CollectionSet->getTotalInvestmentSumByCategory($coinCategory, $userID);
		return number_format($investTotal,2);

	  }	
	public function getMasterBulkCategoryTotal($userID, $coinCategory) {
		$CollectionBags = new CollectionBags();
		$CollectionRolls = new CollectionRolls();
		$CollectionBoxes = new CollectionBoxes();
		$CollectionFirstday = new CollectionFirstday();
		$CollectionFolder = new CollectionFolder();
		
		$investTotal = 
		$CollectionBags->getTotalInvestmentSumByCategory($coinCategory, $userID)+
		$CollectionRolls->getTotalInvestmentSumByCategory($coinCategory, $userID)+
		$CollectionBoxes->getTotalInvestmentSumByCategory($coinCategory, $userID)+
		$CollectionFirstday->getFirstDaySumByCategory($coinCategory, $userID)+
		$CollectionFolder->getTotalInvestmentSumByCategory($coinCategory, $userID);
		return number_format($investTotal,2);

	  }	
//from
	public function getMasterCollectionTotalFrom($userID, $purchaseFrom) {
		$Collection = new Collection();
		$CollectionBags = new CollectionBags();
		$CollectionRolls = new CollectionRolls();
		$CollectionBoxes = new CollectionBoxes();
		$CollectionFirstday = new CollectionFirstday();
		$CollectionFolder = new CollectionFolder();
		$CollectionSet = new CollectionSet();
		
		$investTotal = 
		$Collection->getCoinSumByAccountFrom($userID, $purchaseFrom)+
		$CollectionBags->getUserSumFrom($userID, $purchaseFrom)+
		$CollectionRolls->getUserSum($userID, $purchaseFrom)+
		$CollectionBoxes->getBoxSumByIDFrom($userID, $purchaseFrom)+
		$CollectionFirstday->totalFirstDayInvestmentFrom($userID, $purchaseFrom)+
		$CollectionFolder->getUserSumFrom($userID, $purchaseFrom)+
		$CollectionSet->totalAllMintsetsInvestmentFrom($userID, $purchaseFrom);
		return $investTotal;

	  }		  
	public function getMasterPiecesTotalFrom($userID, $purchaseFrom) {
		$Collection = new Collection();
		$CollectionBags = new CollectionBags();
		$CollectionRolls = new CollectionRolls();
		$CollectionBoxes = new CollectionBoxes();
		$CollectionFirstday = new CollectionFirstday();
		$CollectionFolder = new CollectionFolder();
		$CollectionSet = new CollectionSet();
		
		$investTotal = 
		$Collection->getAllTableCountByIDFrom($userID, $purchaseFrom)+
		$CollectionBags->getAllTableCountByIDFrom($userID, $purchaseFrom)+
		$CollectionRolls->getAllTableCountByIDFrom($userID, $purchaseFrom)+
		$CollectionBoxes->getAllTableCountByIDFrom($userID, $purchaseFrom)+
		$CollectionSet->getAllTableCountByIDFrom($userID, $purchaseFrom)+
		$CollectionFolder->getAllTableCountByIDFrom($userID, $purchaseFrom)+
		$CollectionFirstday->getAllTableCountByIDFrom($userID, $purchaseFrom);
		return $investTotal;

	  }		
	public function getAllTableCountByIDFrom($userID, $table, $purchaseFrom) {
	$sql = mysql_query( "SELECT * FROM ".$table." WHERE userID = '$userID' AND purchaseFrom = '".str_replace('_', ' ', $purchaseFrom)."'") or die(mysql_error()); 
	return mysql_num_rows($sql); 
    }		 	 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//All Face Value Cat
	public function getYearInvestmentCategory($coinCategory, $userID, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND  YEAR(purchaseDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	public function getMonthlyCoinInvestmentByCategory($coinCategory, $userID, $month, $year, $table) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM ".$table." WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND MONTH(purchaseDate) = '".$month."' AND YEAR(purchaseDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
	  
 
	  
	    
public function getMonthlyInvestmentCategory($coinCategory, $userID, $month, $year){
	$monthlyTotal = 
	$this->getMonthlyCoinInvestmentByCategory($coinCategory, $userID, $month, $year, $table='collection')+
	$this->getMonthlyCoinInvestmentByCategory($coinCategory, $userID, $month, $year, $table='collectbags')+
	$this->getMonthlyCoinInvestmentByCategory($coinCategory, $userID, $month, $year, $table='collectrolls')+
	$this->getMonthlyCoinInvestmentByCategory($coinCategory, $userID, $month, $year, $table='collectboxes')+
	$this->getMonthlyCoinInvestmentByCategory($coinCategory, $userID, $month, $year, $table='collectfolder');
	return number_format($monthlyTotal,2);
}	  	
//from
	public function getMonthlyCoinInvestmentByCategoryFrom($coinCategory, $userID, $month, $year, $table, $purchaseFrom) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM ".$table." WHERE purchaseFrom = '".str_replace('_', ' ', $purchaseFrom)."' AND coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND MONTH(purchaseDate) = '".$month."' AND YEAR(purchaseDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		  
public function getMonthlyInvestmentCategoryFrom($coinCategory, $userID, $month, $year, $purchaseFrom){
	$monthlyTotal = 
	$this->getMonthlyCoinInvestmentByCategoryFrom($coinCategory, $userID, $month, $year, $table='collection', $purchaseFrom)+
	$this->getMonthlyCoinInvestmentByCategoryFrom($coinCategory, $userID, $month, $year, $table='collectbags', $purchaseFrom)+
	$this->getMonthlyCoinInvestmentByCategoryFrom($coinCategory, $userID, $month, $year, $table='collectrolls', $purchaseFrom)+
	$this->getMonthlyCoinInvestmentByCategoryFrom($coinCategory, $userID, $month, $year, $table='collectboxes', $purchaseFrom)+
	$this->getMonthlyCoinInvestmentByCategoryFrom($coinCategory, $userID, $month, $year, $table='collectfolder', $purchaseFrom);
	return number_format($monthlyTotal,2);
}	  
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//All Face Value Type
	public function getMonthlyCoinInvestmentByType($coinType, $userID, $month, $year, $table) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM ".$table." WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' AND MONTH(purchaseDate) = '".$month."' AND YEAR(purchaseDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	public function getMonthlyBagInvestmentByType($coinType, $userID, $month, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' AND MONTH(purchaseDate) = '".$month."' AND YEAR(purchaseDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	public function getMonthlyRollInvestmentByType($coinType, $userID, $month, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' AND MONTH(purchaseDate) = '".$month."' AND YEAR(purchaseDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	public function getMonthlyBoxInvestmentByType($coinType, $userID, $month, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' AND MONTH(purchaseDate) = '".$month."' AND YEAR(purchaseDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	public function getMonthlyFolderInvestmentByType($coinType, $userID, $month, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' AND MONTH(purchaseDate) = '".$month."' AND YEAR(purchaseDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	public function getMonthlyFirstDayInvestmentByType($coinType, $userID, $month, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' AND MONTH(purchaseDate) = '".$month."' AND YEAR(purchaseDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		  	  
public function getMonthlyInvestment($coinType, $userID, $month, $year){
	$monthlyTotal = 
	$this->getMonthlyCoinInvestmentByType($coinType, $userID, $month, $year, $table='collection')+
	$this->getMonthlyCoinInvestmentByType($coinType, $userID, $month, $year, $table='collectbags')+
	$this->getMonthlyCoinInvestmentByType($coinType, $userID, $month, $year, $table='collectrolls')+
	$this->getMonthlyCoinInvestmentByType($coinType, $userID, $month, $year, $table='collectboxes')+
	$this->getMonthlyCoinInvestmentByType($coinType, $userID, $month, $year, $table='collectfolder');
	return number_format($monthlyTotal,2);
}
	  	  	  	  
	public function getMasterTypeTotal($userID, $coinType) {
		$Collection = new Collection();
		$CollectionBags = new CollectionBags();
		$CollectionRolls = new CollectionRolls();
		$CollectionBoxes = new CollectionBoxes();
		$CollectionFirstday = new CollectionFirstday();
		$CollectionFolder = new CollectionFolder();
		$CollectionSet = new CollectionSet();
		
		$investTotal = 
		$Collection->getCoinSumByType($coinType, $userID)+
		$CollectionBags->getCoinSumByType($coinType, $userID)+
		$CollectionRolls->getCoinSumByType($coinType, $userID)+
		$CollectionBoxes->getCoinSumByType($coinType, $userID)+
		$CollectionFirstday->getFirstDaySumByType($coinType, $userID)+
		$CollectionFolder->getCoinSumByType($coinType, $userID)+
		$CollectionSet->getCoinSumByType($coinType, $userID);
		return number_format($investTotal,2);

	  }	
	public function getMasterBulkTypeTotal($userID, $coinType) {
		$CollectionBags = new CollectionBags();
		$CollectionRolls = new CollectionRolls();
		$CollectionBoxes = new CollectionBoxes();
		$CollectionFirstday = new CollectionFirstday();
		$CollectionFolder = new CollectionFolder();
		
		$investTotal = 
		$CollectionBags->getCoinSumByType($coinType, $userID)+
		$CollectionRolls->getCoinSumByType($coinType, $userID)+
		$CollectionBoxes->getCoinSumByType($coinType, $userID)+
		$CollectionFirstday->getFirstDaySumByType($coinType, $userID)+
		$CollectionFolder->getCoinSumByType($coinType, $userID);
		return number_format($investTotal,2);

	  }		  
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
	public function getMasterBulkTotal($userID) {
		$CollectionBags = new CollectionBags();
		$CollectionRolls = new CollectionRolls();
		$CollectionBoxes = new CollectionBoxes();
		$CollectionFirstday = new CollectionFirstday();
		$CollectionFolder = new CollectionFolder();
		
		$investTotal = 
		$CollectionBags->getUserSum($userID)+
		$CollectionRolls->getUserSum($userID)+
		$CollectionBoxes->getBoxSumByID($userID)+
		$CollectionFirstday->totalFirstDayInvestment($userID)+
		$CollectionFolder->getUserSum($userID);
		return number_format($investTotal,2);

	  }		  	  
	public function getMasterCategoryFaceValTotal($userID, $coinCategory) {
		$Collection = new Collection();
		$CollectionBags = new CollectionBags();
		$CollectionRolls = new CollectionRolls();
		$CollectionBoxes = new CollectionBoxes();
		$CollectionFirstday = new CollectionFirstday();
		$CollectionFolder = new CollectionFolder();
		
		$faceTotal = 
		$Collection->getCoinFaceValueByAccount($userID)+
		$CollectionBags->getBagsFaceVal($userID)+
		$CollectionRolls->getRollsFaceVal($userID)+
		$CollectionBoxes->getBoxSumByID($userID)+
		$CollectionFirstday->totalFirstDayInvestment($userID)+
		$CollectionFolder->getUserSum($userID);
		return number_format($faceTotal,2);
	  }	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function getNextPurchaseID(){
	$sql = mysql_query("SELECT * FROM purchases ORDER BY purchaseID DESC LIMIT 1") or die(mysql_error()); 
		  while($row = mysql_fetch_array($sql))
			  {
				$purchaseID = $row['purchaseID'] + 1;
			  }
			  return $purchaseID;	
}

						


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//denominations & face values all categories rolls, folder, coins
	
	public function getMasterCategoryInvestment($coinCategory, $userID) {
		$collectionBoxes = new CollectionBoxes();
		$collectionBags = new CollectionBags();
		$collectionRolls = new CollectionRolls();
		$collectionFolder = new CollectionFolder();
		$collection = new Collection();
		
		$coinSum = $collection->getTotalInvestmentSumByCategory($coinCategory, $userID) + $collectionRolls->getTotalInvestmentSumByCategory($coinCategory, $userID) + $collectionFolder->getTotalInvestmentSumByCategory($coinCategory, $userID) + $collectionBags->getTotalInvestmentSumByCategory($coinCategory, $userID);
			  return $coinSum;	
	  }	





/*
////////////////////Main reports
*/


	public function getPurchaseMonthlyInvestmentAll($userID, $month, $year, $table) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM ".$table." WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' AND MONTH(purchaseDate) = '".$month."' AND YEAR(purchaseDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	

	public function getMonthlyInvestmentAll($userID, $month, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' AND MONTH(purchaseDate) = '".$month."' AND YEAR(purchaseDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	


	  
	public function getMaxPurchase($userID) {
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' ORDER BY purchasePrice DESC LIMIT 1") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinVersion = intval($row['coinVersion']);
			  }
			  return str_replace(' ', '_', $coinVersion);	
	  }	
	public function getPurchaseFrom($userID, $purchaseFrom) {
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND purchaseFrom = '$purchaseFrom'") or die(mysql_error());
			  return mysql_num_rows($sql);	
	  }		
	  
	public function getMonthlyInvestmentByID($userID, $month, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE userID = '$userID' AND MONTH(purchaseDate) = '".$month."' AND YEAR(purchaseDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		   
/*
////////////////////Category reports
*/
	public function getTotalInvestmentByCategory($coinCategory, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
	
	public function getTotalInvestmentByType($coinType, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
	  //fifty dollar
	public function getTotalInvestmentGoldCommemorative($coinType, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND commemorative = '1' AND coinMetal = 'Gold' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }			
	public function getMonthlyInvestmentByType($coinType, $userID, $month, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' AND MONTH(purchaseDate) = '".$month."' AND YEAR(purchaseDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
	public function getMonthlyInvestmentByCategory($coinCategory, $userID, $month, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND MONTH(purchaseDate) = '".$month."' AND YEAR(purchaseDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
//by coin
	public function getMonthlyInvestmentByCoin($coinID, $userID, $month, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinID = '".$coinID."' AND userID = '$userID' AND MONTH(purchaseDate) = '".$month."' AND YEAR(purchaseDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	public function getYearInvestmentByCoin($coinID, $userID, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinID = '".$coinID."' AND userID = '$userID' AND  YEAR(purchaseDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	  
	public function getMostRecentByCoin($coinID, $userID) {
	$Encryption = new Encryption();	
	$coin = new Coin();
	$sql = mysql_query("SELECT * FROM collection WHERE coinID = '".$coinID."' AND userID = '$userID' ORDER BY collectionID DESC LIMIT 1") or die(mysql_error()); 
	if(mysql_num_rows($sql) == 0){ 
				$coin->getCoinByID($coinID);
	  return 'No '.$coin->getCoinName().'\'s collected';
	  } else {
	  while($row = mysql_fetch_array($sql))
			  {
				$coin->getCoinByID(intval($row['coinID']));
				return '<a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.$coin->getCoinName().'</a>,  &#36;'.strip_tags($row['purchasePrice']). ' '.date("F j, Y",strtotime($row['purchaseDate']));	
			  }
	  }	
	}	
	public function getMaxPurchaseCoinID($coinID, $userID) {
	$Encryption = new Encryption();	
	$coin = new Coin();
	$sql = mysql_query("SELECT * FROM collection WHERE coinID = '".$coinID."' AND userID = '$userID' ORDER BY purchasePrice DESC LIMIT 1") or die(mysql_error()); 
	if(mysql_num_rows($sql) == 0){ 
				$coin = new Coin();
				$coin->getCoinByID($coinID);
	  return 'No '.$coin->getCoinName().'\'s collected';
	  } else {
	  while($row = mysql_fetch_array($sql))
			  {
				$coin->getCoinByID(intval($row['coinID']));
				return '<a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.$coin->getCoinName().'</a>,  &#36;'.strip_tags($row['purchasePrice']). ' '.date("F j, Y",strtotime($row['purchaseDate']));	
			  }
	  }	
	}	
   
/*
//////////////////////////////////////////////////////////////Max purchase

*/
///Max category
	public function getMaxCategory($coinCategory, $userID) {
	$sql = mysql_query("SELECT MAX(purchasePrice) FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['MAX(purchasePrice)'];
			  }
			  return $coinSum;	
	  }	
	public function getMaxCategoryID($coinCategory, $userID) {
	$sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' ORDER BY purchasePrice DESC LIMIT 1") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$collectionID = intval($row['collectionID']);
			  }
			  return $collectionID;	
	  }	
	public function getMaxCategoryVersion($coinCategory, $userID) {
	$sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' ORDER BY purchasePrice DESC LIMIT 1") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinVersion = intval($row['coinVersion']);
			  }
			  return str_replace(' ', '_', $coinVersion);	
	  }	
	public function getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom) {
	$sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND purchaseFrom = '$purchaseFrom'") or die(mysql_error());
			  return mysql_num_rows($sql);	
	  }		  
	  
///Max type
	public function getMaxType($coinType, $userID) {
	$sql = mysql_query("SELECT MAX(purchasePrice) FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['MAX(purchasePrice)'];
			  }
			  return $coinSum;	
	  }	
	public function getMaxTypeID($coinType, $userID) {
	$sql = mysql_query("SELECT * FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' ORDER BY purchasePrice DESC LIMIT 1") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$collectionID = intval($row['collectionID']);
			  }
			  return $collectionID;	
	  }	
	public function getMaxTypeVersion($coinType, $userID) {
	$sql = mysql_query("SELECT * FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' ORDER BY purchasePrice DESC LIMIT 1") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinVersion = intval($row['coinVersion']);
			  }
			  return str_replace(' ', '_', $coinVersion);	
	  }	
	public function getYearInvestmentByType($coinType, $userID, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' AND YEAR(purchaseDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	  

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//SOURCES
	public function getTotalInvestmentSumByCategoryFrom($coinCategory, $userID, $purchaseFrom) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE purchaseFrom = '".str_replace('_', ' ', $purchaseFrom)."' AND coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//denominations & face values
	public function getCoinTypeDenomination($coinType) {
	$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', $coinType)."'") or die(mysql_error());
	while($row = mysql_fetch_array($sql))
    {
	  $denomination = $row['denomination'];
		} 
		return strip_tags($denomination);
	}	
	public function getCoinTypeCountByID($coinType, $userID) {
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '".str_replace('_', ' ', $coinType)."'") or die(mysql_error());
	return mysql_num_rows($sql);
	}	
	public function getCoinTypeFaceVal($coinType, $userID) {
	$coinfaceval = $this->getCoinTypeCountByID($coinType, $userID) * $this->getCoinTypeDenomination($coinType);
	return number_format((float)$coinfaceval, 2, '.', '');
	}	


	public function getInvestmentCoinTypeByID($coinType, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//finance tables

public function loadFinanceCategoryTbl($coinCategory, $year, $userID){
$html = '';
	$sql = mysql_query("SELECT DISTINCT coinType FROM coins WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' ORDER BY coinYear ASC ") or die(mysql_error()); 
	
	  while($row = mysql_fetch_array($sql))
			  {
				$coinType = $row['coinType'];
				$html .= '<tr>
				  <td width="200"><strong> <a class="brownLink" href="viewTypeFinance.php?coinType='.str_replace('_', ' ', $coinType).'&year='.$year.'">'.$coinType.'</a></strong></td>
				  <td width="70" align="right">'.$this->getMonthlyInvestmentByType($coinType, $userID, $month='01', $year).'</td>
				  <td width="70" align="right">'.$this->getMonthlyInvestmentByType($coinType, $userID, $month='02', $year).'</td>
				  <td width="70" align="right">'.$this->getMonthlyInvestmentByType($coinType, $userID, $month='03', $year).'</td>
				  <td width="70" align="right">'.$this->getMonthlyInvestmentByType($coinType, $userID, $month='04', $year).'</td>
				  <td width="70" align="right">'.$this->getMonthlyInvestmentByType($coinType, $userID, $month='05', $year).'</td>
				  <td width="70" align="right">'.$this->getMonthlyInvestmentByType($coinType, $userID, $month='06', $year).'</td>
				  <td width="70" align="right">'.$this->getMonthlyInvestmentByType($coinType, $userID, $month='07', $year).'</td>
				  <td width="70" align="right">'.$this->getMonthlyInvestmentByType($coinType, $userID, $month='08', $year).'</td>
				  <td width="70" align="right">'.$this->getMonthlyInvestmentByType($coinType, $userID, $month='09', $year).'</td>
				  <td width="70" align="right">'.$this->getMonthlyInvestmentByType($coinType, $userID, $month='10', $year).'</td>
				  <td width="70" align="right">'.$this->getMonthlyInvestmentByType($coinType, $userID, $month='11', $year).'</td>
				  <td width="70" align="right">'.$this->getMonthlyInvestmentByType($coinType, $userID, $month='12', $year).'</td>
				  <td width="70" align="right"><strong>'.$this->getYearInvestmentByType($coinType, $userID, $year).'</strong></td>
				</tr>';
			  }

return $html;

}

public function loadBulkCategoryTbl($coinCategory, $year, $userID){
	$collectionRolls = new collectionRolls();
	$collectionFolder = new collectionFolder();
	$collectionBags = new collectionBags();
$html = '';
	$sql = mysql_query("SELECT DISTINCT coinType FROM coins WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' ORDER BY coinYear ASC ") or die(mysql_error()); 
	
	  while($row = mysql_fetch_array($sql))
			  {
				$coinType = $row['coinType'];
				$html .= '  <tr>
     <td width="200"><strong> <a class="brownLink" href="viewTypeFinance.php?coinType='.str_replace('_', ' ', $coinType).'&year='.$year.'">'.$coinType.'</a></strong></td>
    <td width="13%" align="right">$'. $collectionRolls->getCoinSumByType($coinType='Flying_Eagle', $userID).'</td>
    <td width="12%" align="right">$'.$collectionFolder->getCoinSumByType($coinType='Flying_Eagle', $userID).'</td>
    <td width="13%" align="right">$'.$collectionBags->getCoinSumByType($coinType='Flying_Eagle', $userID).'</td>
    <td width="31%">&nbsp;</td>
  </tr>';
			  }

return $html;

}





}
?>