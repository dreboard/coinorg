<?php 
//getOpenList

class CoinLot {

	public function __construct() { 
		} 

    public function getCoinLotById($coinLotID) {	
		$sql = mysql_query("SELECT * FROM coinLots WHERE coinLotID = '$coinLotID'") or die(mysql_error());
        $row = mysql_fetch_array($sql);		
        $this->userID = $row['userID'];
        $this->coinLotID = $row['coinLotID'];
        $this->purchaseDate = $row['purchaseDate'];
        $this->purchasePrice = $row['purchasePrice'];
		$this->lotDesc = $row['description'];
		$this->lotName = $row['lotName'];
		$this->coinNote = $row['coinNote'];	

		return true;
    }
							
	public function getCoinNote() {
		$coinNote = $this->coinNote;
		$allow = '<table> <tr> <td> <table> <tr> <td> <thead> <tbody> <tfoot> <span> <sub> <sup> <li> <ol> <ul> <a> <br> <p> <h1> <h2> <h3> <h4> <h5> <h6> <strong> <i> <em> <b> <hr> <div> <img>';	
		$this->stripInlineScripts($coinNote);
        return strip_tags($coinNote, $allow);
    }
	public function stripInlineScripts($value) {
		 preg_replace('#(<[^>]+[\x00-\x20\"\'\/])(on|xmlns)[^>]*>#iUu', "$1>", $value);
	}			
	public function getCoinDate() {
        return strip_tags($this->purchaseDate);
    }
	public function getCoinPrice() {
        return strip_tags($this->purchasePrice);
    }		
	public function getLotName() {
        return $this->lotName;
    }	
	  public function getCoinLotDesc() {
	  return strip_tags($this->lotDesc);
    }		
	 public function getCoinLotUser() {
	  return strip_tags($this->userID);
    }	

	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//User AREA

public function totalLotsByUser($userID){
  $sql = mysql_query("SELECT * FROM coinLots WHERE userID = '$userID'") or die(mysql_error()); 
  return mysql_num_rows($sql);
}

	public function getCoinLotsSum($coincollectID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE  coinLotID = '$coinLotID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//COLLECTION COUNTS


public function getCertCount($coinLotID){
$sql = mysql_query("SELECT * FROM collection WHERE coinLotID = '$coinLotID' AND proService != 'None'") or die(mysql_error());
  return mysql_num_rows($sql);    
}

public function getCoinLotDenomCount($coinLotID, $denomination){
  $sql = mysql_query( "SELECT * FROM collection WHERE denomination = '".$denomination."' AND coinLotID = '$coinLotID'") or die(mysql_error()); 
  if(mysql_num_rows($sql) == '0'){
	  $nums = '0';
  } else {
	  $nums = '<h3 class="moneyGreen">'.mysql_num_rows($sql).'</h3>';
  }
  return $nums;  	
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Coins area
public function getCoinsCount($coinLotID) {
  $sql = mysql_query( "SELECT * FROM collection WHERE coinLotID = '".intval($coinLotID)."'") or die(mysql_error()); 
  return mysql_num_rows($sql);    	
}
public function deleteCoinLot($coinLotID, $userID) {
  $sql = mysql_query( "DELETE FROM coinLots WHERE coinLotID = '".intval($coinLotID)."'") or die(mysql_error()); 
  if($sql){
	$sql2 =  mysql_query( "UPDATE collection SET coinLotID = '0' WHERE coinLotID = '".intval($coinLotID)."' AND userID = '$userID' ") or die(mysql_error()); 
  }
  return;    	
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Club area
public function getLotList($userID){
	$Encryption = new Encryption();
	$html = '';
		$sql = mysql_query("SELECT * FROM coinLots WHERE userID = '$userID'") or die(mysql_error()); 
		if(mysql_num_rows($sql) == 0){
		       $html .= '<option value="0">No Saved Lots</option>';
		} else {
	  while($row = mysql_fetch_array($sql))
			  {
				$this->getCoinLotById(intval($row['coinLotID']));
				$html .= '<option value="'.$Encryption->encode($row['coinLotID']).'">'.$this->getLotName().'</option>';
			  }
		}
			  
	return $html;	
}





}//END CLASS
?>