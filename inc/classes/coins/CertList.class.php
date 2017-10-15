<?php 
//getFolderHolderNumber
//getProofCollectionCountById

class CertList{

    public function __construct()
    {
    }



///////////////////////////////////////////////////////////////////////////////////////////////
	public function getUserIDCertListCount($userID) {
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND certlist = '1' ") or die(mysql_error());
	return mysql_num_rows($sql);
    } 
	function getCoinIDCount($coinID, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID' AND certlist = '1'") or die(mysql_error()); 
	return mysql_num_rows($sql);
	}	
	function getCertCoinName($certlistID){
	  $Coin = new Coin();
	  $this->getCertCoinById($certlistID);
	  $Coin->getCoinById($this->getCoinID());
	return $Coin->getCoinName();
	}	

	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//Master totals	
	///Coin images
	
	public function getUserIDServiceCertListCount($userID, $certlistService) {
	$sql = mysql_query( "SELECT * FROM collection WHERE certlistService = '".str_replace('_', ' ', $certlistService)."'  AND certlist = '1' AND userID = '$userID'");
	return mysql_num_rows($sql);
    }		
	
//Category	
	public function getCertCategoryCount($coinCategory, $userID) {
	$sql = mysql_query( "SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND certlist = '1' AND userID = '$userID'");
	return mysql_num_rows($sql);
    }	
	public function getCertCategoryServiceCount($coinCategory, $proService, $userID) {
	$sql = mysql_query( "SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND certlist = '1' AND userID = '$userID' AND proService = '".str_replace('_', ' ', $proService)."'");
	return mysql_num_rows($sql);
    }		
	
	
//Type	
	public function getCertTypeCount($coinType, $userID) {
	$sql = mysql_query( "SELECT * FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND certlist = '1' AND userID = '$userID'");
	return mysql_num_rows($sql);
    }	
	public function getCertTypeServiceCount($coinType, $proService, $userID) {
	$sql = mysql_query( "SELECT * FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND certlist = '1' AND userID = '$userID' AND proService = '".str_replace('_', ' ', $proService)."'");
	return mysql_num_rows($sql);
    }




	public function getProofErrorCountById($userID) {
	$sql = mysql_query("SELECT * FROM collection WHERE  userID = '$userID' AND errorType != 'None'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
    }
	public function getProofCommemorativeCountById($userID) {
	$sql = mysql_query("SELECT * FROM collection WHERE  userID = '$userID' AND strike = 'Proof' AND commemorative != '0'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
    }
	public function getMetalCount($userID, $coinMetal) {
	$sql = mysql_query("SELECT * FROM collection WHERE  userID = '$userID' AND coinMetal = '$coinMetal'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
    }	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ADD AND REMOVE CERTLIST COINS
public function removeCertListStatus($collectionID, $userID){
	$sql = mysql_query("UPDATE collection SET certlist = '0', certlistService = 'None', certlistDate = '0000-00-00' WHERE collectionID = '$collectionID' AND userID = '$userID' ") or die(mysql_error()); 
}

    public function getCertListId($collectionID, $userID) {	
		$sql = mysql_query("SELECT * FROM collection WHERE collectionID = '$collectionID' AND userID = '".intval($userID)."'") or die(mysql_error());
        $row = mysql_fetch_array($sql);		
        return $row['certlistID'];
    }

}//END CLASS
?>

