<?php 

class Folder {
	
    public function __construct() {}
	
	
	public function getFolderByID($folderID) {
		$sql = mysql_query("SELECT * FROM folders WHERE folderID = '$folderID'") or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->folderName = $row['folderName'];
		$this->folderID = $row['folderID'];
		$this->coinCategory = $row['coinCategory'];
		$this->coinType = $row['coinType'];
        $this->folderCode = $row['folderCode'];		
		$this->folderType = $row['folderType'];
		$this->coins = $row['coins'];	
		$this->coinSlots = $row['coinSlots'];
		$this->denomination = $row['denomination'];		
        return true;
    }

	public function getCoinSlots() {
        return strip_tags($this->coinSlots);
    }
	public function getDenomination() {
        return strip_tags($this->denomination);
    }
	public function getFolderCoins() {
        return strip_tags($this->coins);
    }
	public function getFolderType() {
        return strip_tags($this->folderType);
    }
	public function getFolderName() {
        return strip_tags($this->folderName);
    }
	public function getCoinType() {
        return strip_tags($this->coinType);
    }
	public function getCoinCategory() {
        return strip_tags($this->coinCategory);
    }
	public function getFolderCode() {
        return strip_tags($this->folderCode);
    }
	public function getFolderID() {
        return strip_tags($this->folderID);
    }

	
	public function getCount($folderID, $userID) {
	$coinQuery = mysql_query("SELECT * FROM collectfolder WHERE folderID = '$folderID' AND  userID = '$userID'") or die(mysql_error());
	return mysql_num_rows($coinQuery);
    }  
	
	public function getFolderIDByCode($folderCode){
	$pageQuery = mysql_query("SELECT * FROM folders WHERE folderCode = '$folderCode'");
	while ($show = mysql_fetch_array($pageQuery))
	  {
		  $folderID = intval($show['folderID']);
	  }
	 return $folderID;
 }
 
 
 
 
	
}//End Class
?>