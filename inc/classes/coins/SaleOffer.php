<?php 
//getVarietyImg

class SaleOffer {

    public function getSellItemById($saleOfferID) {
        $sql = 'SELECT * FROM saleOffers WHERE saleOfferID = ' . $saleOfferID;
        $results = mysql_query($sql);
        $row = mysql_fetch_array($results);
        $this->userID = $row['userID'];
        $this->saleOfferID = $row['saleOfferID'];
		$this->sellListID = $row['sellListID'];
		$this->saleOfferDate = $row['saleOfferDate'];
	    $this->saleOffer = $row['saleOffer'];
        return true;
    }

	public function getOffer() {
        return strip_tags($this->saleOffer);
    }		
	public function getOfferDate() {
        return strip_tags($this->saleOfferDate);
    }
	public function getListPrice() {
        return strip_tags($this->listPrice);
    }	
	public function getBuyer() {
        return strip_tags($this->userID);
    }

	
public function deleteSaleCoin($sellListID, $userID){
	$this->getCollectionById($sellListID);
	if($this->getCoinImage1() !== '../img/noPic.jpg'){
		unlink($this->getCoinImage1());
	}
	  @mysql_query("DELETE FROM sellList WHERE sellListID = '$sellListID'") or die(mysql_error()); 
	  return;
}



//By category
public function getSalesCountByCategory($coinCategory, $userID){
$sql = mysql_query("SELECT * FROM selllist WHERE coinCategory = '$coinCategory' AND userID = '$userID'") or die(mysql_error());
$getTypeRequest = mysql_num_rows($sql);
return $getTypeRequest;
}	

public function totalSalesTotalsByCategory($coinCategory, $userID){
$myQuery = mysql_query("SELECT SUM(sellPrice) FROM selllist WHERE coinCategory = '$coinCategory' AND userID = '$userID'") or die(mysql_error()); 

while($row = mysql_fetch_array($myQuery))
{
  $coinSum = $row['SUM(purchasePrice)'];
}	
	return $coinSum;
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ADMIN AREA

public function totalCoinsByUser($userID){
$sql = mysql_query("SELECT * FROM selllist WHERE userID = '$userID'") or die(mysql_error()); 
return mysql_num_rows($sql);
}






}//END CLASS
?>