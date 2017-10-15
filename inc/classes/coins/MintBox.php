<?php 
//getAllFirstdaySetCoins
class MintBox {
	
    public function __construct() {}
	
	
	public function getMintBoxByID($boxMintID) {
		$sql = mysql_query("SELECT * FROM boxmint WHERE boxMintID = '$boxMintID'") or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->boxName = $row['boxName'];
		$this->coinCategory = $row['coinCategory'];
		$this->coinType = $row['coinType'];
        $this->coinVersion = $row['coinVersion'];		
		$this->boxMintID = $row['boxMintID'];	
		$this->coins = $row['coins'];
		$this->coinID = $row['coinID'];
		$this->denomination = $row['denomination'];
        $this->faceVal = $row['faceVal'];		
		$this->coinYear = $row['coinYear'];	
		$this->mintMark = $row['mintMark'];	
		$this->coinCount = $row['coinCount'];
		$this->rollCount = $row['rollCount'];		
		$this->rollMintID = $row['rollMintID'];	
        return true;
    }
	public function getRollMintID() {
    	return strip_tags($this->rollMintID);
    }		
	public function getRollCount() {
    	return strip_tags($this->rollCount);
    }	
	public function getCoinCount() {
    	return strip_tags($this->coinCount);
    }	
	public function getCoinID() {
        return strip_tags($this->coinID);
    }
	public function getBoxName() {
        return strip_tags($this->boxName);
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
	public function getBoxMintID() {
        return strip_tags($this->boxMintID);
    }
	public function getFaceVal() {
        return strip_tags($this->faceVal);
    }
	public function getCoinYear() {
        return strip_tags($this->coinYear);
    }
	public function getMintMark() {
        return strip_tags($this->mintMark);
    }
	public function getDenomination() {
        return strip_tags($this->denomination);
    }

//COUNTS BY COINCATEGORY

   public function boxMintByCoinCategory($coinCategory){
	$sql = mysql_query("SELECT * FROM boxmint WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."'");
	return mysql_num_rows($sql);
}



//COUNTS BY COINTYPE

   public function boxMintByCoinType($coinType){
	$sql = mysql_query("SELECT * FROM boxmint WHERE coinType = '".str_replace('_', ' ', $coinType)."'");
	return mysql_num_rows($sql);
}









	
}//End Class
?>