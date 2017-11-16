<?php
//LEFT(field, 40)
//getByMintCountByCategoryByMint
//getTotalCollectedCategoryByID

class Bullion
{

public function __construct() {}



/*
/////////////////////////////////////////////////////////////////////////ONE DOLLAR FUNCTIONS////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

//Dollar_Gold.php
		//Total Collected
	public function getTotalCollectedCoinsByID($coinCategory, $userID) {
			    $sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND coinMetal = 'Gold'") or die(mysql_error()); 
	            return mysql_num_rows($sql);
	}	
	public function getTotalInvestmentSumByCategory($coinCategory, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND coinMetal = 'Gold'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	public function getTypeCollectionProgressByCategory($coinCategory, $userID) {
	$sql = mysql_query( "SELECT DISTINCT coinType FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND  userID = '$userID' AND coinMetal = 'Gold'");
	return mysql_num_rows($sql);    	
    }	
	//Mint Collection Progress
	public function getByMintCountByCategoryByMint($userID, $coinCategory) {
		  $sql = mysql_query( "SELECT DISTINCT coinID FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND  userID = '$userID' AND byMintGold = '1' AND coinMetal = 'Gold'");
		  return mysql_num_rows($sql);    	
    }	
	public function getTotalByMintCountByCategory($coinCategory){
    $sql = mysql_query("SELECT * FROM coins WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND  byMintGold = '1' AND coinMetal = 'Gold'") or die(mysql_error());
	$getTypeRequest = mysql_num_rows($sql);
	return $getTypeRequest;
    }	
	
	
	//Complete Collection Progress
	public function getCompleteCollectionCategoryById($userID, $coinCategory) {
	$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinMetal = 'Gold' AND coinCategory = '".str_replace('_', ' ', $coinCategory)."'") or die(mysql_error()); 
	$collectCount = mysql_num_rows($myQuery);    				
	return $collectCount;
    }
	public function getCompleteCollectionCategoryCount($coinCategory){
    $sql = mysql_query("SELECT * FROM coins WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND coinMetal = 'Gold'") or die(mysql_error());
	$getTypeRequest = mysql_num_rows($sql);
	return $getTypeRequest;
    }	
//////////////////////////////////////////////////////////////////////ONE DOLLAR FUNCTIONS////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////










//Main report
	public function getByMintCountByID($userID) {
		  $sql = mysql_query( "SELECT DISTINCT coinID FROM collection WHERE userID = '$userID' AND byMintGold = '1'") or die(mysql_error()); 
		  return mysql_num_rows($sql);
    }
	public function getTotalByMintCount(){
		  $sql = mysql_query("SELECT * FROM coins WHERE  coinMetal = 'Gold' AND byMintGold = '1' AND commemorative = '0'") or die(mysql_error());
		  return mysql_num_rows($sql);
    }
	public function getTotalGoldCount(){
		  $sql = mysql_query("SELECT * FROM coins WHERE  coinMetal = 'Gold' AND commemorative = '0'") or die(mysql_error());
		  return mysql_num_rows($sql);
    }
	public function getCompleteGoldCollectionById($userID) {
		  $sql = mysql_query( "SELECT * FROM collection WHERE userID = '$userID' AND coinMetal = 'Gold' AND commemorative = '0'") or die(mysql_error()); 
		  return mysql_num_rows($sql);
    }
	public function getGoldReportSumByAccount($userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE userID = '$userID' AND coinMetal = 'Gold' AND byMintGold = '1' AND commemorative = '0'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
public function getGoldReportImg($coinCategory, $userID){
	$countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND coinMetal = 'Gold' AND commemorative = '0' ") or die(mysql_error());
	$img_check = mysql_num_rows($countAll);
	if($img_check == 0){ 
	  return "blank.jpg";
	  } else {
	while($row = mysql_fetch_array($countAll)){
		$coinCategory = str_replace(' ', '_', $row['coinCategory']);
		return $coinCategory.'.jpg';
	}
	
	}	
}


//Gold categories






 public function getTotalCollectedCategoryByID($coinCategory, $userID) {
	 
		switch($coinCategory){
			case 'Fifty Dollar':	
			    $sql = mysql_query("SELECT * FROM collection WHERE denomination =  '50.000' AND userID = '$userID' AND coinMetal = 'Gold'") or die(mysql_error()); 
	            return mysql_num_rows($sql);
				break;
			case 'Twenty Five Dollar':
			case 'One Hundred Dollar': 
	 
			    $sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND coinMetal = 'Gold'") or die(mysql_error()); 
	            return mysql_num_rows($sql);
				break;				
				default:
				$sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND coinMetal = 'Gold' AND commemorative = '0'") or die(mysql_error()); 
	            return mysql_num_rows($sql);
				break;
	}	
	
 }

public function getGoldCenturyCategoryImg($coinCategory, $userID, $century){
	$countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND coinMetal = 'Gold' AND commemorative = '0' AND century = '$century'") or die(mysql_error());
	$img_check = mysql_num_rows($countAll);
	if($img_check == 0){ 
	  return "blank.jpg";
	  } else {
	while($row = mysql_fetch_array($countAll)){
		$coinCategory = str_replace(' ', '_', $row['coinCategory']);
		return $coinCategory.'.jpg';
	}
	
	}	
}
	public function getCenturyAllGoldCount($century) {
	$sql = mysql_query("SELECT count(*) as total FROM coins WHERE coinMetal = 'Gold' AND commemorative = '0' AND century = '$century'") or die(mysql_error());
	$data = mysql_fetch_assoc($sql);
    return $data['total'];
    }	
	public function getCenturyByMintCount($century) {
	$sql = mysql_query("SELECT * FROM coins WHERE century = '$century' and byMintGold = '1' AND coinMetal = 'Gold' AND commemorative = '0' ") or die(mysql_error());
	return mysql_num_rows($sql);
    }

	public function getCenturyByMintCountByID($userID, $century) {
	$sql = mysql_query("SELECT * FROM collection WHERE century = '$century' and byMintGold = '1' AND coinMetal = 'Gold' AND commemorative = '0' AND userID = '$userID' ") or die(mysql_error());
	return mysql_num_rows($sql);
    }
	
	public function getTypeBullionCollectionProgressByID($userID, $century) {
	$dollarQuery = $this->getTotalCenturyCategoryByID('Dollar', $userID, $century);
	$quEagleQuery = $this->getTotalCenturyCategoryByID('Quarter Eagle', $userID, $century);
	$threeQuery = $this->getTotalCenturyCategoryByID('Three Dollar', $userID, $century);
	$fourQuery = $this->getTotalCenturyCategoryByID('Four Dollar', $userID, $century);
	$fiveQuery = $this->getTotalCenturyCategoryByID('Five Dollar', $userID, $century);
	$tenQuery = $this->getTotalCenturyCategoryByID('Ten Dollar', $userID, $century);
	$twentyQuery = $this->getTotalCenturyCategoryByID('Twenty Dollar', $userID, $century);
	$twenFiveQuery = $this->getTotalCenturyCategoryByID('Twenty Five Dollar', $userID, $century);
	$fiftyQuery = $this->getTotalCenturyCategoryByID('Fifty Dollar', $userID, $century);
	$collectCount = $dollarQuery+$quEagleQuery+$threeQuery+$fourQuery+$fiveQuery+$tenQuery+$twentyQuery+$twenFiveQuery+$fiftyQuery;    	
	return $collectCount;
    }		
	
	public function getCenturyMetalProofCountById($userID, $coinMetal, $century) {
	$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND strike = 'Proof' AND coinMetal = '$coinMetal' AND century = '$century'") or die(mysql_error()); 
	$collectCount = mysql_num_rows($myQuery);    				
	return $collectCount;
    }	
	public function getCenturyMetalCertificationCountById($userID, $coinMetal, $century) {
	$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND proService != 'None' AND coinMetal = '$coinMetal' AND century = '$century'") or die(mysql_error()); 
	$collectCount = mysql_num_rows($myQuery);    				
	return $collectCount;
    }		
////////////////////////////Gold Report
public function checkGoldCollection($userID){
	$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinMetal = 'Gold'") or die(mysql_error()); 
	$collectCount = mysql_num_rows($myQuery);    	
	return $collectCount;
}	

	public function getGoldSumByAccount($userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE userID = '$userID' AND coinMetal = 'Gold' AND commemorative = '0'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
		public function getTotalCollectedGoldByID($coinType, $userID) {
			    $sql = mysql_query("SELECT * FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID'") or die(mysql_error()); 
	            return mysql_num_rows($sql);
	}		
	
	public function getTotalGoldCategoryByID($coinCategory, $userID) {
			    $sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND coinMetal = 'Gold' AND commemorative = '0'") or die(mysql_error()); 
	            return mysql_num_rows($sql);
	}	
	public function getTotalDollarGoldCategoryByID($userID) {
			    $sql = mysql_query("SELECT * FROM collection WHERE coinCategory = 'Gold Dollar' AND userID = '$userID' AND coinMetal = 'Gold' AND commemorative = '0'") or die(mysql_error()); 
	            return mysql_num_rows($sql);
	}		
	
	public function getGoldCollectionProgressByID($userID) {
	$dollarQuery = $this->getTotalDollarGoldCategoryByID($userID);
	$quEagleQuery = $this->getTotalGoldCategoryByID('Quarter Eagle', $userID);
	$threeQuery = $this->getTotalGoldCategoryByID('Three Dollar', $userID);
	$fourQuery = $this->getTotalGoldCategoryByID('Four Dollar', $userID);
	$fiveQuery = $this->getTotalGoldCategoryByID('Five Dollar', $userID);
	$tenQuery = $this->getTotalGoldCategoryByID('Ten Dollar', $userID);
	$twentyQuery = $this->getTotalGoldCategoryByID('Twenty Dollar', $userID);
	$twenFiveQuery = $this->getTotalGoldCategoryByID('Twenty Five Dollar', $userID);
	$fiftyQuery = $this->getTotalGoldCategoryByID('Fifty Dollar', $userID);
	$collectCount = $dollarQuery+$quEagleQuery+$threeQuery+$fourQuery+$fiveQuery+$tenQuery+$twentyQuery+$twenFiveQuery+$fiftyQuery;    	
	return $collectCount;
    }	
	
//Proofs	
	
	
	
	
		
//Century reports
	public function getTotalCenturyCategoryByID($coinCategory, $userID, $century) {
			    $sql = mysql_query("SELECT * FROM collection WHERE century = '$century' AND coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND coinMetal = 'Gold' AND commemorative = '0'") or die(mysql_error()); 
	            return mysql_num_rows($sql);
	}	
	
	public function getGoldSumByCenturyByID($coinCategory, $userID, $century) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE century = '$century' AND coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND coinMetal = 'Gold' AND commemorative = '0'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	//By century
	public function getUniqueCenturyCollectionCountById($userID, $century) {
	$sql = mysql_query( "SELECT DISTINCT coinID FROM collection WHERE userID = '$userID' AND century = '$century' AND coinMetal = 'Gold' AND commemorative = '0'") or die(mysql_error());	
	return mysql_num_rows($sql);
    }	

	public function getCenturyAllCollectionById($userID, $century)	 {
    $sql = mysql_query( "SELECT DISTINCT coinID FROM collection WHERE userID = '$userID' AND century = '$century'  AND coinMetal = 'Gold' AND commemorative = '0'") or die(mysql_error());
	return mysql_num_rows($sql);
    }	
	
	public function getCenturySumByAccount($userID, $century) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE  userID = '$userID' AND century = '$century'  AND coinMetal = 'Gold' AND commemorative = '0'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	public function getGoldSumByCategoryByID($coinCategory, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND coinMetal = 'Gold' AND commemorative = '0'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
	public function getCenturyCollectionCountById($userID, $century) {
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID'  AND century = '$century'  AND coinMetal = 'Gold' AND commemorative = '0' ") or die(mysql_error()); 
	return mysql_num_rows($sql);
    }	
public function getGoldCategoryImg($coinCategory, $userID){
	$countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND coinMetal = 'Gold' AND commemorative = '0'") or die(mysql_error());
	$img_check = mysql_num_rows($countAll);
	if($img_check == 0){ 
	  return "blank.jpg";
	  } else {
	while($row = mysql_fetch_array($countAll)){
		$coinCategory = str_replace(' ', '_', $row['coinCategory']);
		return $coinCategory.'.jpg';
	}
	
	}	
}
///////////////////////////////Platinum

public function getPlatinumMintCount(){
	  $sql = mysql_query("SELECT * FROM coins WHERE coinMetal = 'Platinum'") or die(mysql_error());
	  return mysql_num_rows($sql);
}
public function getPlatinumProofImg($coinID, $userID){
	$countAll = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID'") or die(mysql_error());
	$img_check = mysql_num_rows($countAll);
	if($img_check == 0){ 
	  return "blank.jpg";
	  } else {
	while($row = mysql_fetch_array($countAll)){
		$coinVersion = str_replace(' ', '_', $row['coinVersion']);
		return $coinVersion.'.jpg';
	}
	
	}	
}
public function getAllPlatinumSum($userID){
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinMetal = 'Platinum' AND  userID = '$userID'") or die(mysql_error()); 
	while($row = mysql_fetch_array($sql))
	{
	  $coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
	}	
		return $coinSum;
}
public function getAllPlatinumFaceVal($userID){
	$sql = mysql_query("SELECT COALESCE(sum(denomination), 0.00) FROM collection WHERE coinMetal = 'Platinum' AND  userID = '$userID'") or die(mysql_error()); 
	while($row = mysql_fetch_array($sql))
	{
	  $coinSum = $row['COALESCE(sum(denomination), 0.00)'];
	}	
		return $coinSum;
}
public function getPlatinumCountByID($userID){
    $sql = mysql_query("SELECT * FROM collection WHERE coinMetal = 'Platinum' AND userID = '$userID'") or die(mysql_error());
	return mysql_num_rows($sql);
}
	public function getPlatinumProgress($coinType, $userID) {
	$sql = mysql_query( "SELECT DISTINCT coinType FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinType)."' AND  userID = '$userID'");
	return mysql_num_rows($sql);    	
    }	
	public function getPlatinumTypeMintCount($coinType){
		  $sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND coinMetal = 'Platinum'") or die(mysql_error());
		  return mysql_num_rows($sql);
    }
	public function getPlatinumCollectionProgressByCategory($userID) {
	$sql = mysql_query( "SELECT DISTINCT coinCategory FROM collection WHERE coinMetal = 'Platinum' AND  userID = '$userID'");
	return mysql_num_rows($sql); 
    }	
	public function getTypeBullionCategoryCount($userID, $coinMetal) {
	$sql = mysql_query( "SELECT DISTINCT coinCategory FROM collection WHERE coinMetal = 'Platinum' AND  userID = '$userID'");
	return mysql_num_rows($sql); 
    }	
//First Spouse
//Get proof
public function getProofSpouseImg($userID){
	$countAll = mysql_query("SELECT * FROM collection WHERE coinType = 'First Spouse' AND strike = 'Proof' AND userID = '$userID'") or die(mysql_error());
	$img_check = mysql_num_rows($countAll);
	if($img_check == 0){ 
	  return "blank.jpg";
	  } else {
	while($row = mysql_fetch_array($countAll)){
		$coinVersion = str_replace(' ', '_', $row['coinVersion']);
		return 'First_Spouse.jpg';
	}
	
	}	
}
//Get business
public function getSpouseImg($userID){
	$countAll = mysql_query("SELECT * FROM collection WHERE coinType = 'First Spouse' AND strike = 'Business' AND userID = '$userID'") or die(mysql_error());
	$img_check = mysql_num_rows($countAll);
	if($img_check == 0){ 
	  return "blank.jpg";
	  } else {
	while($row = mysql_fetch_array($countAll)){
		$coinVersion = str_replace(' ', '_', $row['coinVersion']);
		return $coinVersion.'.jpg';
	}
	
	}	
}








//collection

	public function getGoldCertificationCountById($userID) {
	$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND proService != 'None' AND coinMetal = 'Gold' AND byMintGold = '1'") or die(mysql_error()); 
	$collectCount = mysql_num_rows($myQuery);    				
	return $collectCount;
    }	
	public function getGoldProofCountById($userID) {
	$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND strike = 'Proof' AND coinMetal = 'Gold' AND byMintGold = '1'") or die(mysql_error()); 
	$collectCount = mysql_num_rows($myQuery);    				
	return $collectCount;
    }

	public function getUngradedMetalCountById($userID, $coinCategory, $coinMetal) {
	$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND coinGrade = 'No Grade' AND coinMetal = '$coinMetal'") or die(mysql_error()); 
	$collectCount = mysql_num_rows($myQuery);    				
	return $collectCount;
    }	
	public function getMetalTypeCertificationCountById($userID, $coinCategory, $coinMetal) {
	$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND proService != 'None' AND coinMetal = '$coinMetal'") or die(mysql_error()); 
	$collectCount = mysql_num_rows($myQuery);    				
	return $collectCount;
    }	
	public function getMetalTypeProofCountById($userID, $coinCategory, $coinMetal) {
	$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND strike = 'Proof' AND coinMetal = '$coinMetal'") or die(mysql_error()); 
	$collectCount = mysql_num_rows($myQuery);    				
	return $collectCount;
    }




/*
CATEGORY PAGES
getTotalGoldCategoryByID for gold dollars
*/

	public function getGoldCategoryByID($coinCategory, $userID) {
			    $sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND coinMetal = 'Gold' AND commemorative = '0'") or die(mysql_error()); 
	            return mysql_num_rows($sql);
	}	

//ten dollar
	public function getTotalTenByID($coinCategory, $userID) {
			    $sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND coinMetal = 'Gold'") or die(mysql_error()); 
	            return mysql_num_rows($sql);
	}	
	
	//Twenty Five Dollar
	public function getTotalTwoFiveByID($coinCategory) {
			    $sql = mysql_query("SELECT * FROM coins WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND coinMetal = 'Gold'") or die(mysql_error()); 
	            return mysql_num_rows($sql);
	}		
	
	public function getTotalGoldCategoryMintCount($coinCategory){
		  $sql = mysql_query("SELECT * FROM coins WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND coinMetal = 'Gold' AND byMintGold = '1' AND commemorative = '0'") or die(mysql_error());
		  return mysql_num_rows($sql);
    }
	public function getGoldTypeMintCount($coinType){
		  $sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND coinMetal = 'Gold' AND byMintGold = '1' AND commemorative = '0'") or die(mysql_error());
		  return mysql_num_rows($sql);
    }
	
	
	
	
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
////////////////////Finance reports
 AND coinMetal = 'Gold'
*/
	public function getGoldSumByID($userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE userID = '$userID' AND coinMetal = 'Gold'") or die(mysql_error()); 
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

	public function getYearInvestmentCategory($coinCategory, $userID, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND  YEAR(purchaseDate) = '".$year."'") or die(mysql_error()); 
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
	
	public function getMonthlyInvestmentByType($coinType, $userID, $month, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' AND MONTH(purchaseDate) = '".$month."' AND YEAR(purchaseDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
	public function getMonthlyInvestmentByCategory($coinCategory, $userID, $month, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND MONTH(purchaseDate) = '".$month."' AND YEAR(purchaseDate) = '".$year."' AND coinMetal = 'Gold'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }			

}
?>