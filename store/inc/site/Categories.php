<?php 
//getProductTypeCount
class Categories
{

    public function getCoinLotById($categoryID) {
		$sql = mysql_query("SELECT * FROM category WHERE categoryID = '$categoryID' LIMIT 1")or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->categoryID = $row['categoryID'];
        $this->categoryName = $row['categoryName'];
        return true;
    }

	public function getCategoryName() {
        return strip_tags($this->categoryName);
    }

	public function getCategoryCount($categoryName) {
		$sql = mysql_query("SELECT * FROM products WHERE category = '".str_replace('_', ' ', $categoryName)."'")or die(mysql_error());
        return mysql_num_rows($sql);
    }	
	public function getCategorySum($categoryName) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM products WHERE category = '".str_replace('_', ' ', $categoryName)."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	


}//End Class
?>
