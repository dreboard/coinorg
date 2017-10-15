<?php 
//getProductTypeCount
class CoinLots
{

    public function getCoinLotById($coinLotID) {
		$sql = mysql_query("SELECT * FROM coinLots WHERE coinLotID = '$coinLotID' LIMIT 1")or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->coinLotID = $row['coinLotID'];
        $this->name = $row['name'];
		$this->purchasePrice = $row['purchasePrice'];
		$this->purchaseDate = $row['purchaseDate'];
		$this->description = $row['description'];
        return true;
    }

	public function getLotName() {
        return strip_tags($this->name);
    }
	public function getPurchaseDate() {
        return strip_tags($this->purchaseDate);
    }		
	public function getDescription() {
        return strip_tags($this->description);
    }	
	public function getPurchasePrice() {
        return strip_tags($this->purchasePrice);
    }

	public function getLotProductCount($coinLotID) {
		$sql = mysql_query("SELECT * FROM products WHERE coinLotID = '$coinLotID'")or die(mysql_error());
        return mysql_num_rows($sql);
    }	
	public function getLotProductSum($coinLotID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM products WHERE coinLotID = '$coinLotID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	


}//End Class
?>
