<?php 
//userID
class Sales
{

    public function getSaleById($salesID) {
		$sql = mysql_query("SELECT * FROM sales WHERE salesID = '$salesID' LIMIT 1")or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->productID = $row['productID'];
        $this->transactionID = $row['transactionID'];		
        $this->salesID = $row['salesID'];
        $this->quantity = $row['quantity'];
		$this->price = $row['price'];
        $this->category = $row['category'];
        $this->coinType = $row['coinType'];
		$this->date_added = $row['date_added'];
        return true;
    }
	

	public function getTransactionID() {
        return strip_tags($this->transactionID);
    }		
	public function getProductID() {
        return strip_tags($this->productID);
    }	
	public function getQuantity() {
        return strip_tags($this->quantity);
    }	
	public function getPrice() {
        return strip_tags($this->price);
    }	
	public function getCategory() {
        return strip_tags($this->category);
    }	
	public function getCoinType() {
        return strip_tags($this->coinType);
    }	
	public function getDateAdded() {
        return strip_tags($this->date_added);
    }		

function enterSalesTransaction($product_id_array, $transactionID, $payer_email){
$arr = explode(',', rtrim($product_id_array, ","));
	foreach ($arr as $val) {
		$parts = explode('-', $val);
		$Product = new Product();
		$Product->getProductById($parts[0]);
		for ($i = 1; $i <= $parts[1]; $i++)
		  {		
				$sql = mysql_query("INSERT INTO sales (productID, transactionID, price, email, coinType, category, date_added) VALUES('".$parts[0]."','$transactionID', ''".$Product->getPrice()."'', '".$payer_email."', ''".$Product->getCoinType()."'', ''".$Product->getCategory()."'', '".date('Y-m-d')."')")  or die(mysql_error());
		   }
		}	
return;		
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function getActiveProductCount() {
	$sql = mysql_query("SELECT * FROM products WHERE quantity >= '1'");
	 return mysql_num_rows($sql);
  }  
	public function getProductTypeCount($coinType) {
	$sql = mysql_query("SELECT * FROM products WHERE coinType = '".str_replace('_', ' ', $coinType)."'  AND quantity >= '1'");
	 return mysql_num_rows($sql);
  }  
	public function getProductCategoryCount($category) {
	$sql = mysql_query("SELECT * FROM products WHERE category = '".str_replace('_', ' ', $category)."'  AND quantity >= '1'");
	 return mysql_num_rows($sql);
  }  
	public function getProductGraderCount($proGrader) {
	$sql = mysql_query("SELECT * FROM products WHERE proGrader = '".str_replace('_', ' ', $proGrader)."'  AND quantity >= '1'");
	 return mysql_num_rows($sql);
  }  







}//End Class
?>
