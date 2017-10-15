<?php 
//getCategoryCount
class Product
{

    public function getProductById($productID) {
		$sql = mysql_query("SELECT * FROM products WHERE productID = '$productID' LIMIT 1")or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->productID = $row['productID'];
		$this->categoryID = $row['categoryID'];
        $this->product_name = $row['product_name'];
        $this->quantity = $row['quantity'];
		$this->price = $row['price'];
		$this->purchasePrice = $row['purchasePrice'];
		$this->salePrice = $row['salePrice'];
		$this->tags = $row['tags'];
		$this->listingFee = $row['listingFee'];
		$this->timesListed = $row['timesListed'];
		
		$this->details = $row['details'];
        $this->category = $row['category'];
        $this->subcategory = $row['subcategory'];
        $this->coinType = $row['coinType'];
		$this->date_added = $row['date_added'];
        $this->proGrader = $row['proGrader'];
		$this->coinGrade = $row['coinGrade'];
		$this->siteID = $row['siteID'];
        $this->strike = $row['strike'];
		$this->error = $row['error'];
		$this->coinYear = $row['coinYear'];
		$this->serialNum = $row['serialNum'];
		$this->refund = $row['refund'];
        $this->coinPic1 = $row['coinPic1'];
        $this->coinPic2 = $row['coinPic2'];
        $this->coinPic3 = $row['coinPic3'];
		$this->coinPic4 = $row['coinPic4'];
		$this->pageViews = $row['pageViews'];
		$this->points = $row['points'];
        return true;
    }

	public function getTimesListed() {
        return strip_tags($this->timesListed);
    }
	public function getListingFee() {
        return strip_tags($this->listingFee);
    }
	public function getCoinYear() {
        return strip_tags($this->coinYear);
    }
	public function getTags() {
        return strip_tags($this->tags);
    }
	public function getListedSite() {
        return strip_tags($this->siteID);
    }
	public function getError() {
        return strip_tags($this->error);
    }		
	public function getStrike() {
        return strip_tags($this->strike);
    }
	public function getSalePrice() {
        return strip_tags($this->salePrice);
    }
		
	public function getPoints() {
        return strip_tags($this->points);
    }		
	public function getRefundType() {
        return strip_tags($this->refund);
    }		
	public function getSerialNum() {
        return strip_tags($this->serialNum);
    }	
	public function getPageViews() {
        return strip_tags($this->pageViews);
    }
	public function setPageView($productID) {
        mysql_query("UPDATE products SET pageViews = pageViews + '1' WHERE productID = '$productID'") or die(mysql_error()); 
	  return;
    }		
	public function getProductName() {
        return strip_tags($this->product_name);
    }	
	public function setProductName($productID) {
        mysql_query("UPDATE products SET product_name = '$product_name' WHERE productID = '$productID'") or die(mysql_error()); 
	  return;
    }		
	public function getProductID() {
        return strip_tags($this->productID);
    }	
	public function getQuantity() {
        return strip_tags($this->quantity);
    }
	public function addToQuantity($productID) {
        mysql_query("UPDATE products SET quantity = quantity + '$quantity' WHERE productID = '$productID'") or die(mysql_error()); 
	  return;
    }	
	public function resetQuantity($productID) {
        mysql_query("UPDATE products SET quantity = '$quantity' WHERE productID = '$productID'") or die(mysql_error()); 
	  return;
    }		
	public function getPrice() {
        return strip_tags($this->price);
    }
	public function setPrice($productID) {
        mysql_query("UPDATE products SET price = '$price' WHERE productID = '$productID'") or die(mysql_error()); 
	  return;
    }		
	public function getPurchasePrice() {
        return strip_tags($this->purchasePrice);
    }	
	public function getDetails() {
		$allow = '<table> <tr> <td> <table> <tr> <td> <thead> <tbody> <tfoot> <span> <sub> <sup> <li> <ol> <ul> <a> <br> <p> <h1> <h2> <h3> <h4> <h5> <h6> <strong> <hr> <div> <img>';	
		$this->stripInlineScripts($this->details);
        return strip_tags($this->details, $allow);
    }
	public function stripInlineScripts($value) {
		 preg_replace('#(<[^>]+[\x00-\x20\"\'\/])(on|xmlns)[^>]*>#iUu', "$1>", $value);
	}		
	
			
	public function getCategory() {
        return strip_tags($this->category);
    }	
	public function getSubcategory() {
        return strip_tags($this->subcategory);
    }		
	
	public function getCoinType() {
        return strip_tags($this->coinType);
    }	
	public function getDateAdded() {
        return strip_tags($this->date_added);
    }		
	public function getProGrader() {
        return strip_tags($this->proGrader);
    }
	public function getCoinGrade() {
        return strip_tags($this->coinGrade);
    }		
	public function getCoinImage1() {
		if($this->coinPic1 == 'None'){
			$pic = 'http://www.allsmallcents.com/img/noPic.jpg';
		} else {
        $pic = 'http://www.allsmallcents.com/productImg/'.strip_tags($this->coinPic1);
		} return $pic;
    }	
	public function getCoinImage2() {
		if($this->coinPic2 == 'None'){
			$pic = 'http://www.allsmallcents.com/img/noPic.jpg';
		} else {
        $pic = 'http://www.allsmallcents.com/productImg/'.strip_tags($this->coinPic2);
		} return $pic;
    }	
	public function getCoinImage3() {
		if($this->coinPic3 == 'None'){
			$pic = 'http://www.allsmallcents.com/img/noPic.jpg';
		} else {
        $pic = 'http://www.allsmallcents.com/productImg/'.strip_tags($this->coinPic3);
		} return $pic;
    }	
	public function getCoinImage4() {
		if($this->coinPic4 == 'None'){
			$pic = 'http://www.allsmallcents.com/img/noPic.jpg';
		} else {
        $pic = 'http://www.allsmallcents.com/productImg/'.strip_tags($this->coinPic4);
		} return $pic;
    }	

	public function getNoImage1() {
		if($this->coinPic1 == 'None'){
			$pic = 'http://www.allsmallcents.com/img/blankPic.jpg';
		} else {
        $pic = 'http://www.allsmallcents.com/productImg/'.strip_tags($this->coinPic1);
		} return $pic;
    }	
	public function getNoImage2() {
		if($this->coinPic2 == 'None'){
			$pic = 'http://www.allsmallcents.com/img/blankPic.jpg';
		} else {
        $pic = 'http://www.allsmallcents.com/productImg/'.strip_tags($this->coinPic2);
		} return $pic;
    }	
	public function getNoImage3() {
		if($this->coinPic3 == 'None'){
			$pic = 'http://www.allsmallcents.com/img/blankPic.jpg';
		} else {
        $pic = 'http://www.allsmallcents.com/productImg/'.strip_tags($this->coinPic3);
		} return $pic;
    }	
	public function getNoImage4() {
		if($this->coinPic4 == 'None'){
			$pic = 'http://www.allsmallcents.com/img/blankPic.jpg';
		} else {
        $pic = 'http://www.allsmallcents.com/productImg/'.strip_tags($this->coinPic4);
		} return $pic;
    }	
	public function getImageAlt($image, $productID) {
		$this->getProductById($productID);
		if($this->coinPic.$image !== 'None'){
			return $this->getProductName();
		} else {
        return false;
		} 
    }	
	public function calculateListingFees($productID) {
		$this->getProductById($productID);
		if($this->coinPic4 == 'None'){
			$pic = 'http://www.allsmallcents.com/img/noPic.jpg';
		} else {
        $pic = 'http://www.allsmallcents.com/productImg/'.strip_tags($this->coinPic4);
		} return $pic;
    }	
	public function trackListingDate($productID) {
		$this->getProductById($productID);
		if($this->coinPic4 == 'None'){
			$pic = 'http://www.allsmallcents.com/img/noPic.jpg';
		} else {
        $pic = 'http://www.allsmallcents.com/productImg/'.strip_tags($this->coinPic4);
		} return $pic;
    }			
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ACTIVATE USERS
///////////////////////////////////////////////////////////////////////////////////////////////
//Check & Resend verification codes

function quantityList($productID){
	$this->getProductById($productID);
	$quantityControl = '';
	if($this->getQuantity() > '1'){
		for ($list = 1; $list <= $this->getQuantity(); $list++) {
	        $quantityControl .= '<option value="'.$list.'">'.$list.'</option>';
          }
		  return $quantityControl;
	} else {
		return false;
}
}

function sendNewProductMail($email, $productID){
	  $mail = new PHPMailer(true);
	  $mail->FromName = 'My Coin Organizer';
      $mail->From = 'noreply@lincolncents.comli.com';
	  $mail->AddReplyTo('noreply@allsmallcents.com', 'Admin');
	  $mail->Subject = 'New Products Listed';
	  $mail->AddAddress($email);
      $mail->isHTML(true);
	  $htmlBody = '<table width="100%" border="0">
		<tr>
		  <td width="42%"><img src="http://allsmallcents.com/img/mailLogo.jpg" width="207" height="113" /></td>
		  <td width="54%">&nbsp;</td>
		  <td width="4%">&nbsp;</td>
		</tr>
		<tr>
		  <td colspan="3">
		  <h1>Your New Coin Organizer Account</h1>
		  <p style="margin-bottom:3px;">Please go to the <b><a href="http://allsmallcents.com/newsRemove.php?email='.$email.'">Remove Email Page</a></b> and verify your account.</p>
		  </td>
		</tr>
		<tr style="background-color:#999999;">
			<td colspan="3" style="padding:10px;"><a style="text-decoration:none; color:#000000;" href="http://lincolncents.comli.com">My Coin Organizer</a></td>
		</tr>
	  </table>';
	  $mail->Body = $htmlBody;
	  $mail->Send();
}

function getMailList($productID){
$sql = mysql_query("SELECT * FROM user WHERE newProduct = '1'");
while($row = mysql_fetch_array($sql))
  {
  $this->sendNewProductMail(strip_tags($row['email']), $productID);
  }
  return;
}

///////Create User
//Make a folder
function createProductFolder($productID) {
		$folderName = "../productImg/".$productID;
		if ( !file_exists($folderName) ) {
			mkdir($folderName, 0777);
			return true;
			} else {
				return false;
			}

    }	



//Delete product

function deleteProductDir($productID) {
	$dirPath = "../productImg/".$productID;
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException('$dirPath must be a directory');
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteProductDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}	
function deleteProduct($productID){
	$this->deleteProductDir($productID);
	  mysql_query("DELETE FROM products WHERE productID = '$productID'") or die(mysql_error()); 
	  return;
}


	function setProductViewNumber($productID){
		$sql = mysql_query("UPDATE products SET pageViews = pageViews + 1 WHERE productID = '$productID'") or die(mysql_error()); 
	return true;
	}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function productProfitProjection($productID){
		$this->getProductById($productID);
		$paypalFees = round($this->getPrice() * 0.029, 2) - 0.3;
		$finalPrice = number_format($this->getPrice() - $this->getPurchasePrice() - $paypalFees, 2);
	return $finalPrice;
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function getProductCount() {
	$sql = mysql_query("SELECT * FROM products WHERE quantity >= '1'");
	 return mysql_num_rows($sql);
  } 
	public function getProductCost() {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM products WHERE quantity >= '1'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	public function getProductAgeCount($num1, $num2) {		
		$sql = mysql_query("SELECT * FROM products WHERE date_added <= DATE_ADD(NOW(), INTERVAL ".$num1." DAY) AND date_added >= DATE_ADD(NOW(), INTERVAL ".$num2." DAY) AND  quantity >= '1' ") or die(mysql_error());
		
	 return mysql_num_rows($sql);
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
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//categories
	public function getCategoryCount($category) {
	$sql = mysql_query("SELECT * FROM products WHERE category = '".str_replace('_', ' ', $category)."'");
	 return mysql_num_rows($sql);
  }  


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//INVENTORY REPORTS
function get30Deals(){
$sql = mysql_query("SELECT * FROM products WHERE date_added <= curdate() AND date_added >= DATE_SUB(curdate(),INTERVAL 30 DAY) ") or die(mysql_error());
	return mysql_num_rows($sql);
}
public function getProductType30Count($coinType) {
$sql = mysql_query("SELECT * FROM products WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND date_added >= DATE_SUB(curdate(),INTERVAL 30 DAY) ") or die(mysql_error());
 return mysql_num_rows($sql);
} 
public function getCategory30Count($category) {
$sql = mysql_query("SELECT * FROM products WHERE category = '".str_replace('_', ' ', $category)."' AND date_added >= DATE_SUB(curdate(),INTERVAL 30 DAY) ") or die(mysql_error());
 return mysql_num_rows($sql);
}  
function get30Sums(){
$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM products WHERE date_added > DATE_SUB(now(), interval 30 day) AND quantity >= '1' ") or die(mysql_error());
$num_rows = mysql_num_rows($sql);
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
    return money_format('%(#10n', $coinSum);
}

function get60Deals(){
$sql = mysql_query("SELECT * FROM products WHERE date_added <= DATE_SUB(curdate(),INTERVAL 30 day)  AND date_added >= DATE_SUB(curdate(),INTERVAL 60 day) AND quantity >= '1'  ") or die(mysql_error());
	return mysql_num_rows($sql);
}
public function getProductType60Count($coinType) {
$sql = mysql_query("SELECT * FROM products WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND date_added <= DATE_SUB(curdate(),INTERVAL 30 day)  AND date_added >= DATE_SUB(curdate(),INTERVAL 60 day) AND quantity >= '1'  ") or die(mysql_error());
 return mysql_num_rows($sql);
} 
public function getCategory60Count($category) {
$sql = mysql_query("SELECT * FROM products WHERE category = '".str_replace('_', ' ', $category)."' AND date_added <= DATE_SUB(curdate(),INTERVAL 30 day)  AND date_added >= DATE_SUB(curdate(),INTERVAL 60 day) AND quantity >= '1'  ") or die(mysql_error());
return mysql_num_rows($sql);
} 
function get60Sums(){
$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM products WHERE date_added <= DATE_SUB(curdate(),INTERVAL 30 day)  AND date_added >= DATE_SUB(curdate(),INTERVAL 60 day) AND quantity >= '1'  ") or die(mysql_error());
$num_rows = mysql_num_rows($sql);
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
    return money_format('%(#10n', $coinSum);
}
function get90Deals(){
$sql = mysql_query("SELECT * FROM products WHERE date_added <= DATE_SUB(curdate(),INTERVAL 60 day)  AND date_added >= DATE_SUB(curdate(),INTERVAL 90 day)  AND quantity >= '1' ") or die(mysql_error());
	return mysql_num_rows($sql);
}
public function getProductType90Count($coinType) {
$sql = mysql_query("SELECT * FROM products WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND date_added <= DATE_SUB(curdate(),INTERVAL 60 day)  AND date_added >= DATE_SUB(curdate(),INTERVAL 90 day)  AND quantity >= '1' ") or die(mysql_error());
 return mysql_num_rows($sql);
} 
public function getCategory90Count($category) {
$sql = mysql_query("SELECT * FROM products WHERE category = '".str_replace('_', ' ', $category)."' AND date_added <= DATE_SUB(curdate(),INTERVAL 60 day)  AND date_added >= DATE_SUB(curdate(),INTERVAL 90 day)  AND quantity >= '1' ") or die(mysql_error());
return mysql_num_rows($sql);
} 
function get90Sums(){
$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM products WHERE date_added <= DATE_SUB(curdate(),INTERVAL 60 day)  AND date_added >= DATE_SUB(curdate(),INTERVAL 90 day) AND quantity >= '1' ") or die(mysql_error());
$num_rows = mysql_num_rows($sql);
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
    return money_format('%(#10n', $coinSum);
}

function get180Deals(){
$sql = mysql_query("SELECT * FROM products WHERE date_added <= DATE_SUB(curdate(),INTERVAL 180 day)  AND quantity >= '1'  ") or die(mysql_error());
	return mysql_num_rows($sql);
}

public function getCategory180Count($category) {
$sql = mysql_query("SELECT * FROM products WHERE category = '".str_replace('_', ' ', $category)."' AND date_added  <= DATE_SUB(curdate(),INTERVAL 180 day)  AND quantity >= '1'") or die(mysql_error());
return mysql_num_rows($sql);
} 
function get180Sums(){
$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM products WHERE date_added  <= DATE_SUB(curdate(),INTERVAL 180 day)  AND quantity >= '1'") or die(mysql_error());
$num_rows = mysql_num_rows($sql);
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
    return money_format('%(#10n', $coinSum);
}

///////////////////////////////////////////////////////////////////////////////////////
//BY SITE
	public function getProductBySiteCount($siteID) {
	$sql = mysql_query("SELECT * FROM products WHERE siteID = '".$siteID."'") or die(mysql_error()); 
	 return mysql_num_rows($sql);
  } 
	public function getProductBySiteCost($siteID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM products WHERE  siteID = '".$siteID."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	  
	  
}//End Class
?>
