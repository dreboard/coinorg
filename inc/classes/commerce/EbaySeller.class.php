<?php 
class EbaySeller
{

    public function getEbaySellerByID($ebaySellersID) {
		$sql = mysql_query("SELECT * FROM ebaysellers WHERE ebaySellersID = '$ebaySellersID' LIMIT 1")or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->ebaySellersID = $row['ebaySellersID'];
        $this->SellerID = $row['SellerID'];
		$this->addedDate = $row['addedDate'];
		$this->email = $row['email'];
		$this->website = $row['website'];
        return true;
    }

	public function getEbaySellersID() {
        return intval($this->ebaySellersID);
    }
	public function getSellerID() {
        return intval($this->SellerID);
    }
	public function getAddedDate() {
        return strip_tags($this->addedDate);
    }
	public function getEmail() {
        return strip_tags($this->email);
    }
	public function getWebsite() {
        return strip_tags($this->website);
    }


public function checkRemovalDate(){
	$num = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
	$monthEnd = date("Y-m-".$num);
	$removalDate = 	date($monthEnd. '23:59:59'); 
	if($removalDate > date('Y-m-d H:i:s')){	
		 return null;
	} else {
		$this->removeCurrentFeaturedSeller();
	}
	return;
}

/*    public function getCurrentFeatured() {
		$sql = mysql_query("SELECT * FROM featuredebay WHERE MONTH(addedDate) = ".date('m')." LIMIT 1")or die(mysql_error());
		if(mysql_num_rows($sql) == 0){
		  $ebaySellersID = '0';
		  } else {
			   while($row = mysql_fetch_array($sql)){ 
			   $ebaySellersID = intval($row['ebaySellersID']);
		   }
		  }
			  return $ebaySellersID;
	  }*/
    public function getCurrentFeatured() {
		$sql = mysql_query("SELECT * FROM featuredebay WHERE featured = '1'")or die(mysql_error());
		if(mysql_num_rows($sql) == 0){
		  $ebaySellersID = '0';
		  } else {
			   while($row = mysql_fetch_array($sql)){ 
			   $ebaySellersID = intval($row['ebaySellersID']);
		   }
		  }
			  return $ebaySellersID;
	  }
public function removeCurrentFeaturedSeller(){
	$sql = mysql_query("UPDATE ebaysellers SET featured = '0' WHERE featured = '1'")or die(mysql_error());
		return;
}

public function setFeaturedSeller($ebaySellersID){
	$sql = mysql_query("INSERT INTO featuredebay(ebaySellersID, ebayDate, featured) VALUES ('$ebaySellersID', '".date('Y-m-d H:i:s')."', '1')") or die(mysql_error());
	if(!$sql){
		return null;
	} else {
		return true;
	}
}


	
}//End Class
?>