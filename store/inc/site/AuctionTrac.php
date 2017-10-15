<?php 
//getCategoryCount
class AuctionTrac
{

    public function getProductById($auctionTracID) {
		$sql = mysql_query("SELECT * FROM auctionTrac WHERE auctionTracID = '$auctionTracID' LIMIT 1")or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->productID = $row['productID'];
		$this->listingFee = $row['listingFee'];
		$this->listDate = $row['listDate'];
		$this->listingFee = $row['listingFee'];
		$this->auctionTracID = $row['auctionTracID'];
        return true;
    }

		
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//featured Auction
    public function getFeaturedEbay() {
		$sql = mysql_query("SELECT * FROM featuredEbay ORDER BY id DESC LIMIT 1")or die(mysql_error());
        $row = mysql_fetch_array($sql);
        return $row['auctionNum'];
    }


///////////////////////////////////////////////////////////////////////////////////////////////
//Check & Resend verification codes

function getProductListingCount($productID){
$sql = mysql_query("SELECT * FROM auctionTrac WHERE  WHERE productID = '$productID'") or die(mysql_error());
	return mysql_num_rows($sql);
}



	  
}//End Class
?>
