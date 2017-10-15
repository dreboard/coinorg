<?php 

class RollTypes {
	
public function __construct() {}

    public function getRollTypeById($rollID) {
        $sql = 'SELECT * FROM rolls WHERE rollID = ' . $rollID;
        $results = mysql_query($sql);
        $row = mysql_fetch_array($results);
        $this->rollID = $row['rollID'];
		$this->coinType = $row['coinType'];
		$this->denomination = $row['denomination'];
		$this->coinCount = $row['coinCount'];
        $this->coinCategory = $row['coinCategory'];
        return true;
    }

	public function getRollTypeID() {
        return intval($this->rollID);
    }
	public function getCoinType() {
        return strip_tags($this->coinType);
    }
	public function getCoinCategory() {
        return strip_tags($this->coinCategory);
    }
	public function getRollDenomination() {
        return strip_tags($this->denomination);
    }
	public function getCoinCount() {
        return strip_tags($this->coinCount);
    }

	public function getCoinRollIDByType($coinType) {
	$myQuery = mysql_query("SELECT * FROM rolls WHERE coinType = '$coinType'") or die(mysql_error()); 
	
	while($row = mysql_fetch_array($myQuery))
	{
	  $rollID = intval($row['rollID']);
	}	
		return $rollID;
	}
	public function getCoinRollSumByType($coinType) {
	$myQuery = mysql_query("SELECT * FROM rolls WHERE coinType = '$coinType'") or die(mysql_error()); 
	
	while($row = mysql_fetch_array($myQuery))
	{
	  $coinCount = intval($row['coinCount']);
	}	
		return $coinCount;
	}
	
}
?>