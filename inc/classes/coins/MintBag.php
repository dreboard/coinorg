<?php 

class MintBag {
	
    public function __construct() {}
	
	
	public function getMintBagByID($bagID) {
		$sql = mysql_query("SELECT * FROM bags WHERE bagID = '$bagID'") or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->bagID = $row['bagID'];
		$this->coinCategory = $row['coinCategory'];
		$this->coinType = $row['coinType'];
        $this->coinVersion = $row['coinVersion'];	
		$this->design = $row['design'];
		$this->bagName = $row['bagName'];	
		$this->coinID = $row['coinID'];
	    $this->faceVal = $row['faceVal'];
		$this->coinCount = $row['coinCount'];
		$this->coinYear = $row['coinYear'];
        return true;
    }
	
	public function getDesign() {
        return strip_tags($this->design);
    }	
	public function getCoinCount() {
    return strip_tags($this->coinCount);
    }	
	public function getCoinYear() {
    return strip_tags($this->coinYear);
    }
	public function getBagName() {
    return strip_tags($this->bagName);
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
	public function getBagID() {
        return strip_tags($this->bagID);
    }
	public function getCoinID() {
        return strip_tags($this->coinID);
    }	
	public function getFaceVal() {
        return strip_tags($this->faceVal);
    }
	public function getRollCountByCategory($userID, $coinCategory) {
	$sql = mysql_query( "SELECT * FROM collectfirstday WHERE coinCategory = '$coinCategory' AND  userID = '$userID'");
	return mysql_num_rows($sql);    	
    }	
	
	public function getRollCountByType($userID, $coinType) {
	$sql = mysql_query( "SELECT * FROM collectfirstday WHERE coinType = '$coinType' AND  userID = '$userID'");
	$collectCount = mysql_num_rows($sql);    	
	
	return $collectCount;
    }		

	
	public function getFirstDaySumByType($coinType, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectfirstday WHERE coinType = '$coinType' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
	
	
	public function getCertificationFirstDayCountById($userID) {
	$sql = mysql_query( "SELECT * FROM collectfirstday WHERE proService != 'None' AND  userID = '$userID'");
	return mysql_num_rows($sql);    	
    }

	
	public function getCertificationFirstDayCountByType($userID, $coinType) {
	$sql = mysql_query( "SELECT * FROM collectfirstday WHERE proService != 'None' AND userID = '$userID' AND coinType = '$coinType' ");
	return mysql_num_rows($sql);    	
    }
	
	public function getCertificationFirstDayCountByCategory($userID, $coinCategory) {
	$sql = mysql_query( "SELECT * FROM collectfirstday WHERE proService != 'None' AND  userID = '$userID' AND coinCategory = '$coinCategory' ");
	return mysql_num_rows($sql);    	
    }	

//	
	public function getFirstDayCountById($userID) {
	$sql = mysql_query( "SELECT * FROM collectfirstday WHERE userID = '$userID'");
	return mysql_num_rows($sql);    	
    }


	public function getBagCountByBagId($bagID, $userID) {
	$sql = mysql_query( "SELECT * FROM collectbags WHERE bagID = '$bagID' AND  userID = '$userID'");
	return mysql_num_rows($sql);    	
    }	
	function totalFirstDayInvestment($userID){
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectfirstday WHERE userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		





   public function getBagIDByCoinDesign($coinVersion){
	  $sql = mysql_query("SELECT * FROM bags WHERE design = '".str_replace('_', ' ', $coinVersion)."'");
        $row = mysql_fetch_array($sql);
        return $row['bagID'];
}



	
}//End Class
?>