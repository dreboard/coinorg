<?php 
//getBusinessHighGradeNumberByCoinID


/*
Functions for saving Set Registry, and for preparing the cvs file for PGCS


*/

class SetRegistry {

	public function __construct() { 
		} 
		
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Master grades		
		
    public function getSetRegById($setregID) {
        $sql = 'SELECT * FROM setreg WHERE setregID = ' . $setregID;
        $results = mysql_query($sql);
        $row = mysql_fetch_array($results);
        $this->setregID = $row['setregID'];
		$this->setregName = $row['setregName'];
		$this->coinCategory = $row['coinCategory'];
		$this->setregDate = $row['setregDate'];
		$this->coinType = $row['coinType'];
		$this->setRegDesc = $row['setRegDesc'];
        return true;
    }

	public function getSetregID() {
        return strip_tags($this->setregID);
    }	
	public function getSetregName() {
        return strip_tags($this->setregName);
    }		
	public function getCoinType() {
        return strip_tags($this->coinType);
    }
	public function getCoinCategory() {
        return strip_tags($this->coinCategory);
    }
	public function getUserID() {
        return strip_tags($this->userID);
    }	
	public function getSetregDate() {
        return strip_tags($this->setregDate);
    }
	public function getSetregDesc() {
        return strip_tags($this->setRegDesc);
    }


	
	function deleteSetReg($setregID){
	$sql = mysql_query("DELETE FROM setreg WHERE setregID = '$setregID'") or die(mysql_error()); 
	$sql2 = mysql_query("UPDATE collection SET setregID = '0' WHERE setregID = '$setregID'") or die(mysql_error()); 
	return;    	
    }		


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//By USER			
//viewCoinGrade.php		

	function getSetRegCount($userID){
	$sql = mysql_query("SELECT * FROM setreg WHERE userID = '$userID'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
    }	
	function getSetRegAllCoinsCount($userID){
	$sql = mysql_query("SELECT * FROM collection WHERE setregID != '0' AND userID = '$userID'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
    }
	
	function getSetRegCoinsCount($setregID){
	$sql = mysql_query("SELECT * FROM setreg WHERE setregID = '$setregID'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
    }


	public function getSetRegByCategory($coinCategory, $userID) {
			    $sql = mysql_query("SELECT * FROM setreg WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID'") or die(mysql_error()); 
	            return mysql_num_rows($sql);
	}	
	public function getSetRegByType($coinCategory, $userID) {
			    $sql = mysql_query("SELECT * FROM setreg WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID'") or die(mysql_error()); 
	            return mysql_num_rows($sql);
	}		
	
//////////////////////////////////////////////////////////////////////////////////////

	public function getCollectionSum($setregID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE  setregID = '$setregID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
public function getCoinsCount($setregID) {
  $sql = mysql_query( "SELECT * FROM collection WHERE setregID = '".intval($setregID)."'") or die(mysql_error()); 
  return mysql_num_rows($sql);    	
}	
/////////////////////////////////////////////////////////////////////////////////////
//PCGS functions
function insertTempCoins($setregID){
	$coin = new Coin();
	$collection = new Collection();
	$results = mysql_query("SELECT * FROM collection WHERE setregID = '$setregID'") or die(mysql_error()); 
        $row = mysql_fetch_array($results);
        $coinID = $row['coinID'];
		$coin->getCoinById($coinID);
		$collectionID = $row['collectionID'];
		$collection->getCollectionById($collectionID);
		
		$PCGSNo = $this->getOtherNum($collectionID);
		$CertNo = $this->getPCGSNum($collectionID);
		$Date = $date = substr($coin->getCoinName(), 0, 4);
		$Variety = '';
		$Denom = $this->assignPCGSDemon($coin->getDenomination());
		$Grade = $collection->getCoinGrade();
		$Cost = $collection->getCoinPrice();
		$Value = '';
		$PurchaseDate = $collection->getCoinDate();
		$Source = $collection->getPurchaseFrom();
		$Comments = $collection->getCoinNote();
		$Notes = $collection->getCoinNote();
		$Country = 'US';
	
	$query = mysql_query("INSERT INTO pcgsreg (PCGSNo, CertNo, Date, Variety, Denom, Grade, Cost, Value, PurchaseDate, Source, Comments, Notes, Country) VALUES ('".$PCGSNo."','".$CertNo."','".$Date."','".$Variety."','".$Denom."','".$Grade."', '".$Cost."','".$Value."','".$PurchaseDate."','".$Source."','".$Comments."','".$Notes."','".$Country."')") or die(mysql_error());	
}

public function getPCGSNum($collectionID){
	$Collection = new Collection();
	$Collection->getCollectionById($collectionID);
	  switch ($Collection->getGrader())
		  {
		  case 'PCGS':
			return  $Collection->getGraderNumber();
			break;
			default:
			return '';
				break;
          }
}
public function getOtherNum($collectionID){
	$Collection = new Collection();
	$Collection->getCollectionById($collectionID);
	  switch ($Collection->getGrader())
		  {
		  case 'PCGS':
			return  '';
			break;
			default:
			return  $Collection->getGraderNumber();
				break;
          }
}
function assignPCGSDemon($denomination){
		switch ($denomination) {
			case '0.005':
			return "1/2C";break;
			case '0.010':
			return "1C";break;
			case '0.020':
			return "2C";break;
			case '3C':
			return "0.030";break;
			case '0.050':
			return "5C";break;
			case '0.100':	
			return "10C";break;	
			case '0.200':
			return '20C';break;
			case '0.500':
			return '50C';break;
			case '1.000':	
			return '$1';break;
			case '2.000':
			return '$2';break;
			case '3.000':
			return '$3';break;
			case '4.000':	
			return '$4';break;
			case '5.000':
			return '$5';break;
			case '10.000':
			return '$10';break;
			case '20.000':	
			return '$20';break;
			case '25.000':
			return '$25';break;
			case '50.000':
			return '$50';break;
			case '100.000':	
			return '$100';break;

		}	
	
}


//end class
}