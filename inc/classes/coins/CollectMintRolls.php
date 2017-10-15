<?php 
//coinSelects
class CollectMintRolls {

    public function getMintRollById($rollMintID) {
        $sql = mysql_query("SELECT * FROM rollsmint WHERE rollMintID = '$rollMintID'") or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->rollName = $row['rollName'];		
		$this->rollMintID = $row['rollMintID'];	
		$this->coinType = $row['coinType'];
		$this->coinCategory = $row['coinCategory'];
		$this->coinVersion = $row['coinVersion'];
		$this->design = $row['design'];
        $this->denomination = $row['denomination'];
		$this->coinYear = $row['coinYear'];
        $this->mintMark = $row['mintMark'];	
		$this->faceVal = $row['faceVal'];	

        return true;
    }

	public function getDesign() {
        return strip_tags($this->design);
    }
	public function getFaceVal() {
        return strip_tags($this->faceVal);
    }		
	public function getCoinCategory() {
        return strip_tags($this->coinCategory);
    }	
	public function getCoinType() {
        return strip_tags($this->coinType);
    }	
	public function getRollName() {
        return strip_tags($this->rollName);
    }	
	public function getRollDenomination() {
        return strip_tags($this->denomination);
    }	
	public function getMintRollID() {
        return strip_tags($this->rollMintID);
    }
	public function getCoinVersion() {
        return strip_tags($this->coinVersion);
    }
	public function getRollType() {
        return strip_tags($this->rollType);
    }		
	public function getCoinYear() {
        return strip_tags($this->coinYear);
    }
	public function getMintMark() {
        return strip_tags($this->mintMark);
    }		

function newCoinSelects($coinType){
   $getTypes = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' ORDER BY coinName ASC") or die(mysql_error());
   while($row = mysql_fetch_array($getTypes))
  {

$coin = new Coin();
$collection = new Collection();
$coinID = intval($row['coinID']);
$coin->getCoinById($coinID);

 echo '<option  value="'.$coinID.'">'.$coin->getCoinName().'</option>';	
		
  }	
return;	

}		

function getRollIdByDesign($design){
        $sql = mysql_query("SELECT * FROM rollsmint WHERE design = '$design'") or die(mysql_error());
        $row = mysql_fetch_array($sql);
		return intval($row['rollMintID']);	
}
		
	
}//End Class
?>