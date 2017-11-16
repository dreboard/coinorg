<?php

use App\Coins\{Collection, BulkCoin, Coin, Snow};
//otherCoinsList
//getFolderCoin
//addOpenFolderCoins
class CollectionFolder {

    public function __construct()
    {
        $this->db = DBConnect::getInstance();
    }

    public function getCollectionFolderById($collectfolderID) {
        $userID = $_SESSION['userID'];
        $stmt = $this->db->dbhc->prepare("
            SELECT * FROM collectfolder     
            WHERE collectfolderID = :collectfolderID AND userID = :userID
            LIMIT 1
        ");
        $stmt->execute([':collectfolderID' => $collectfolderID, ':userID' => $userID]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->userID = $row['userID'];
        $this->folderID = $row['folderID'];	
		$this->folderNickname = $row['folderNickname'];	
		$this->coinType = $row['coinType'];
		$this->coinCategory = $row['coinCategory'];
		$this->purchaseFrom = $row['purchaseFrom'];
        $this->purchaseDate = $row['purchaseDate'];
        $this->purchasePrice = $row['purchasePrice'];
        $this->listDate = $row['listDate'];
		$this->sellPrice = $row['sellPrice'];
		$this->sellDate = $row['sellDate'];
        $this->ebaySellerID = $row['ebaySellerID'];
        $this->auctionNumber = $row['auctionNumber'];
		$this->coinGrade = $row['coinGrade'];	
		$this->additional = $row['additional'];
		$this->denomination = $row['denomination'];		
        return true;
    }

	public function getDenomination() {
        return strip_tags($this->denomination);
    }
	public function getCoinType() {
        return strip_tags($this->coinType);
    }
	public function getCoinGrade() {
        return strip_tags($this->coinGrade);
    }
	public function getCoinDate() {
        return strip_tags($this->purchaseDate);
    }
	public function getCoinPrice() {
        return strip_tags($this->purchasePrice);
    }	
	public function getPurchaseFrom() {
        return strip_tags($this->purchaseFrom);
    }	
	public function getEbaySellerID() {
        return strip_tags($this->ebaySellerID);
    }	
	public function getAuctionNumber() {
        return strip_tags($this->auctionNumber);
    }	
	public function getFolderID() {
        return strip_tags($this->folderID);
    }		
		public function getAdditional() {
        return strip_tags($this->additional);
    }		
		public function getFolderNickname() {
        return strip_tags($this->folderNickname);
    }	
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//BY FOLDERID

	public function getFolderCountByFolderID($folderID, $userID) {
		$sql = mysql_query("SELECT * FROM collectfolder WHERE folderID = '$folderID' AND userID = '$userID'") or die(mysql_error()); 
	return mysql_num_rows($sql);
    }	
	public function getFolderIDSumById($folderID, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectfolder WHERE  userID = '$userID' AND folderID = '$folderID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	

	public function getFullFoldersCount($folderID, $userID){
		$folder = new Folder();
		$folder->getFolderByID($folderID);
		$fullSlotsCount = $folder->getCoinSlots();
		$sql = mysql_query("SELECT * FROM collectfolder WHERE folderID = '$folderID' AND userID = '$userID'") or die(mysql_error()); 
		$fullFolderNum = 0;
			  while($row = mysql_fetch_array($sql))
			  {
				$collectfolderID = $row['collectfolderID'];
				if($this->folderCoinsCount($collectfolderID, $userID) >= $fullSlotsCount){
					$fullFolderNum = $fullFolderNum + 1;
				}
	          }	
			 return $fullFolderNum; 
	}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//By User
public function getUserSum($userID){
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectfolder WHERE userID = '$userID'") or die(mysql_error());
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
//from
public function getUserSumFrom($userID, $purchaseFrom){
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectfolder WHERE purchaseFrom = '".str_replace('_', ' ', $purchaseFrom)."' AND userID = '$userID'") or die(mysql_error());
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		  
	public function getAllTableCountByIDFrom($userID, $purchaseFrom) {
	$sql = mysql_query( "SELECT * FROM collectfolder WHERE userID = '$userID' AND purchaseFrom = '".str_replace('_', ' ', $purchaseFrom)."'") or die(mysql_error()); 
	return mysql_num_rows($sql); 
    }	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function getCompanyCountByUser($folderType, $folderCompany, $userID){
$sql = mysql_query("SELECT * FROM collectfolder WHERE folderCompany = '".str_replace('_', ' ', $folderCompany)."' AND folderType = '$folderType' AND userID = '$userID'") or die(mysql_error());
return mysql_num_rows($sql);
}	

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	public function getFolderCountByCategory($userID, $coinCategory) {
	$sql = mysql_query( "SELECT * FROM collectfolder WHERE coinCategory = '$coinCategory' AND  userID = '$userID'");
	return mysql_num_rows($sql);    	
    }	
	public function getFolderCountByType($userID, $coinType) {
	$sql = mysql_query( "SELECT * FROM collectfolder WHERE coinType = '$coinType' AND  userID = '$userID'");
	return mysql_num_rows($sql);    	
    }	







///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//REPORTS
	public function getCoinSumByType($coinType, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectfolder WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }
	public function getTotalInvestmentSumByCategory($coinCategory, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectfolder WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
	public function getTotalInvestmentSumByCategoryFrom($coinCategory, $userID, $purchaseFrom) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collectfolder WHERE purchaseFrom = '".str_replace('_', ' ', $purchaseFrom)."' AND coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//BY COLLECTFLODER
public function getFolderCoinPrice($collectfolderID){
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE collectfolderID = '$collectfolderID'") or die(mysql_error());
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//PLAIN FOLDERS

//Plain Cents Folder id:12 slots :90
//
//
//

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//CHECK FOLDER COINS

public function checkOpenCoins($coinID, $userID){
	$sql = mysql_query( "SELECT * FROM collection WHERE userID = '$userID' AND coinID = '$coinID' AND collectfolderID = '0'");
	return mysql_num_rows($sql);   
}

public function folderCoinsCount($collectfolderID, $userID){
	$sql = mysql_query( "SELECT * FROM collection WHERE collectfolderID = '$collectfolderID' AND userID = '$userID'");
	return mysql_num_rows($sql);   
}

public function checkOpenFolderCoins($coinID, $collectfolderID, $userID){
	$sql = mysql_query( "SELECT * FROM collection WHERE collectfolderID = '$collectfolderID' AND userID = '$userID' AND coinID = '$coinID'");
	return mysql_num_rows($sql);   
}
public function getFolderImg($coinID, $collectfolderID, $userID){
	$coin = new Coin();
	$collection = new Collection();
	$coin->getCoinById($coinID);
	$image = '';
	if($this->checkOpenFolderCoins($coinID, $collectfolderID, $userID) !='0'){
		$image =  str_replace(' ', '_', $coin->getCoinVersion()).'.jpg';
	}
	else if($this->checkOpenCoins($coinID, $collectfolderID, $userID) !='0'){
		$image =  str_replace(' ', '_', $coin->getCoinType()).'_blank.jpg';
	}
	else {
		$image =  'blank.jpg';
	}
	return $image;
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// FOLDERS MANAGEMENT
public function checkForCoinIDInFolder($collectfolderID, $coinID, $userID){
$sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID' AND collectfolderID = '$collectfolderID'") or die(mysql_error());
switch (mysql_num_rows($sql))
{
case "0":
  $folderNum = '<span class="greenLink">'.mysql_num_rows($sql).'</span>';
  break;
default:
  $folderNum = '<span class="errorTxt">'.mysql_num_rows($sql).'</span>';
  break;
}

return $folderNum;

}		


public function checkForCoinIDInCollection($collectfolderID, $coinID, $userID){
$sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID' AND collectfolderID = '0'") or die(mysql_error());
switch (mysql_num_rows($sql))
{
case "0":
  $folderNum = '<span class="greenLink">'.mysql_num_rows($sql).'</span>';
  break;
default:
  $folderNum = '<span class="errorTxt">'.mysql_num_rows($sql).'</span>';
  break;
}

return $folderNum;

}


  public function openCoinCount($coinID, $collectfolderID){
	$sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND collectfolderID = '$collectfolderID'");
	$coinCount = mysql_num_rows($sql);
	while ($row = mysql_fetch_array($sql))
	{
		$coin = new Coin();
		$coinVersion = str_replace(' ', '_', $row['coinVersion']);
	}
	if($coinCount == 0){
		$image = "blank.jpg";
	} else {
		//$image = $pennyImg.'placeholder.jpg';
		$image = $coinVersion.'.jpg';
	}
	 return $image;
 }
 
  public function removeFolderCoin($oldCollectionID){
	$sql = mysql_query("UPDATE collection SET collectfolderID '0' WHERE collectionID = '$oldCollectionID'");
	 return;
 } 
 
  public function setFolderCoin($collectionID, $collectfolderID){
	$sql = mysql_query("UPDATE collection SET collectfolderID '$collectfolderID' WHERE collectionID = '$collectionID' ");
	 return;
 }  
 
   public function getFolderCoin($coinID, $collectfolderID, $userID){
	 $coin = new Coin();
	 $Encryption = new Encryption();
	 $coin->getCoinById($coinID);
	$sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND collectfolderID = '$collectfolderID' AND userID = '$userID'");
	$html = '';
	  if(mysql_num_rows($sql) == 0){
		   $html .= 'Empty';
	  } else {
	while ($row = mysql_fetch_array($sql))
	{
		$collectionID = intval($row['collectionID']);
		$coinGrade = strip_tags($row['coinGrade']);
		$html .= '
      <form action="" method="post" class="form-inline" role="form">
	  <div class="form-group">
	  <img align="absbottom" src="../img/'.str_replace(' ', '_', $coin->getCoinVersion()).'.jpg" width="20" height="20" class="hidden-xs" /> <a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'">'.$coinGrade.'</a>
	  <input name="folder" type="hidden" value="'.$Encryption->encode($collectfolderID).'" />
	  <input name="folderCoin" type="hidden" value="'.$Encryption->encode($collectionID).'" />
	  <button type="submit" onclick="return confirm(\'Remove Coin?\')" name="removeCoinBtn" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></button>
	  </div>
	  </form>		
		';
	}
}
	 return $html;
 }



   public function getOldCollectionID($coinID, $collectfolderID, $userID){
	$sql = mysql_query("SELECT collectionID FROM collection WHERE coinID = '$coinID' AND collectfolderID = '$collectfolderID' AND userID = '$userID'");
	$row = mysql_fetch_array($sql);
	return $row['collectionID'];
 }


/*  function otherCoinsList($coinID, $collectfolderID){
	$coin = new Coin();
	$collection = new Collection();
	$sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND collectfolderID = '0'");
	$coinCount = mysql_num_rows($sql);
	$html = '( '.$coinCount.' ) ';
	
		if(mysql_num_rows($sql) == 0){
		 $html .= '<select name="newCollectionID" disabled="disabled"><option value="" class="coinList">None In Collection</option>';
	} else {
	$html .= '<select name="newCollectionID"><option value="" class="coinList" selected="selected">Select Another Coin</option>';
	while ($row = mysql_fetch_array($sql))
	{
		$coinGrade = strip_tags($row['coinGrade']);
		$collectionID = intval($row['collectionID']);
		$collection->getCollectionById($collectionID); 
		$coinID = intval($row['coinID']);
		
		$html .= '<option value="'.$collectionID.'" class="coinList">'.$coinGrade.' '.date("M j Y",strtotime($collection->getCoinDate())) .'</option>';
	}
	
}
	$html .= '</select>';
	 return $html;
 }*/

/*  function otherCoinsList33($coinID, $collectfolderID, $userID){
	$coin = new Coin();
	$Encryption = new Encryption();
	$collection = new Collection();
	$General = new General();
	$x = 0;
	$this->getCollectionFolderById($collectfolderID);
	$sql3 = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND proService = 'None' AND collectfolderID = '0' AND collectrollsID = '0' AND collectsetID = '0' AND setregID = '0' AND userID = '$userID'");
	$coinCount = mysql_num_rows($sql3);
	$html = '( '.$coinCount.' ) ';
		if(mysql_num_rows($sql3) == 0){
		 $html .= 'None In Collection';
	} else {
	
	while ($row = mysql_fetch_array($sql3))
	{
		$collection->getCollectionById(intval($row['collectionID'])); 
		$coin->getCoinById(intval($row['coinID']));
		$html .= '<form method="post" action="" class="otherFolderCoinsForm" id="formNum'.$collectfolderID.'">';	
	$html .= '<select name="newID" id="newID'.intval($row['coinID']).'" class="otherFolderCoinsList" onchange="toggleFolderButtons('.intval($row['coinID']).');"><option value="" class="coinList" selected="selected">Select Another Coin</option>';
		$html .= '<option value="'.$Encryption->encode(intval($row['collectionID'])).'" class="coinList">'.strip_tags($row['coinGrade']).'</option>';
	
	    $html .= '</select>';
		$html .= '<input name="oldID" type="hidden" value=" '.$Encryption->encode($this->getOldFolderCoinByID($coinID, $collectfolderID, $userID)).' "  />';
	    $html .= '<input name="changeRoll" type="hidden" value="'.$Encryption->encode($collectfolderID).'" />';		
		$html .= '<input name="changeCoinBtn" class="otherFolderCoinsBtns" id="changeBtn'.intval($row['coinID']).'" type="submit" value="Change Coin" onclick="return confirm(\'Switch This Coin?\')" />';
		$html .= '</form>';
		}
}
	 return $html;
 }*/
 
    public function getOldFolderCoinByID($coinID, $collectfolderID, $userID){
	$sql = mysql_query("SELECT collectionID FROM collection WHERE coinID = '$coinID' AND collectfolderID = '$collectfolderID' AND userID = '$userID'");
	$row = mysql_fetch_array($sql);
	return $row['collectionID'];
 }
   public function otherCoinsList($coinID, $collectfolderID, $userID){
	$coin = new Coin();
	$Encryption = new Encryption();
	$collection = new Collection();
	$sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND collectfolderID = '0' AND collectrollsID = '0' AND collectsetID = '0' AND setregID = '0' AND userID = '$userID'");
	$coinCount = mysql_num_rows($sql);
	$html = '';
		if(mysql_num_rows($sql) == 0){
		 $html .= 'None In Collection';
	} else {
	$html .= '<form method="post" action="" class="form-inline" role="form">';	
	$html .= '<div class="form-group">';
	$html .= '<select name="newID" class="form-control"><option value="" class="coinList" selected="selected">Select Another '.$coinCount.'</option>';
	while ($row = mysql_fetch_array($sql))
	{
		$coinGrade = strip_tags($row['coinGrade']);
		$collectionID = intval($row['collectionID']);
		$collection->getCollectionById($collectionID); 
		$coinID = intval($row['coinID']);
		$html .= '<option value="'.$Encryption->encode($collectionID).'" class="coinList">'.$coinGrade.' '.date("M j Y",strtotime($collection->getCoinDate())) .'</option>';
	}
	    $html .= '</select>';
		$html.= '<input name="oldID" type="hidden" value=" '.$Encryption->encode($this->getOldCollectionID($coinID, $collectfolderID, $userID)).' "  />';
	    $html.= '<input name="changeRoll" type="hidden" value="'.$Encryption->encode($collectfolderID).'" />';		
		$html.= '<input name="changeCoinBtn" class="btn btn-primary" id="changeBtn" type="submit" value="Change" /></div>';
		$html .= '</form>';
}
	 return $html;
 }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//COIN MANAGEMENT
/*
Bulk add new coins to new folder
*/
public function getNewFolderCoins($collectfolderID, $folderID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchasePrice, $purchaseDate, $ebaySellerID, $shopName, $shopUrl, $showName, $showCity) {
	    $folder = new Folder();
        $folder->getFolderByID($folderID);
		$coinList = explode(",", $folder->getFolderCoins());
		
		foreach ($coinList as $coinID) {
			$this->enterNewFolderCoins($collectfolderID, $coinID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchasePrice, $ebaySellerID, $shopName, $shopUrl, $showName, $showCity,  $purchaseDate);
		}
		
	return;
	}

	public function enterNewFolderCoins($collectfolderID, $coinID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchasePrice, $ebaySellerID, $shopName, $shopUrl, $showName, $showCity, $purchaseDate){
		$coin = new Coin();
		$coin->getCoinById($coinID);
		$coinID = $coin->getCoinID();

$sql = mysql_query("INSERT INTO collection(coinID, collectfolderID, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, showName, showCity, enterDate, mintMark, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, strike, coinGrade, coinGradeNum, purchaseDate, userID, errorType, errorCoin, byMint, century, design, series, designType, seriesType, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal) VALUES('".$coinID."', '$collectfolderID', '$purchaseFrom', '$auctionNumber', '$additional', '0.00', '$ebaySellerID', '$shopName', '$shopUrl', '$showName', '$showCity', '".date('Y-m-d H:i:s')."', '".$coin->getMintMark()."', '".$coin->getCoinType()."', '".$coin->getCoinCategory()."', '".$coin->getCoinSubCategory()."', '".$coin->getCoinYear()."', '".$coin->getCoinVersion()."', '".$coin->getCoinStrike()."', 'No Grade', '99', '$purchaseDate', '$userID', 'None', '0', '".$coin->getByMint()."', '".$coin->getCentury()."', '".$coin->getDesign()."', '".$coin->getSeries()."', '".$coin->getDesignType()."', '".$coin->getCoinSeriesType()."', '".$coin->getCommemorativeType()."', '".$coin->getCommemorativeVersion()."', '".$coin->getCommemorative()."', '".$coin->getDenomination()."', '".$coin->getKeyDate()."', '".$coin->getCoinMetal()."')") or die(mysql_error()); 	  
	return true;
	}

/*
Bulk add coins to folder
*/

public function addOpenFolderCoins($collectfolderID, $userID) {
	    $this->getCollectionFolderById($collectfolderID);
	    $folder = new Folder();
        $folder->getFolderByID($this->getFolderID());
		$coinList = explode(",", $folder->getFolderCoins());
		foreach ($coinList as $coinID) {
			$this->getCoinFolderStatusByCoinID($coinID, $userID, $collectfolderID);
		}
	return;
	}
	
public function getCoinFolderStatusByCoinID($coinID, $userID, $collectfolderID){
	$sql = mysql_query("SELECT collectionID FROM collection WHERE coinID = '$coinID' AND proService = 'None' AND collectfolderID = '0' AND collectrollsID = '0' AND collectsetID = '0' AND userID = '$userID'  ORDER BY collectionID LIMIT 1");
	if(mysql_num_rows($sql) == 0){
		 return null;
	} else {
		$row = mysql_fetch_array($sql);
		$collectionID = intval($row['collectionID']);	
		
		//get a coin id to put in the folder LIMIT !
		//if checkFolderForOpenCoinID > 0
		
		if($this->checkFolderForOpenCoinID($coinID, $userID, $collectfolderID, intval($row['collectionID']))){
		mysql_query("UPDATE collection SET collectfolderID = '$collectfolderID' WHERE collectionID = '".intval($row['collectionID'])."' AND userID = '$userID' ORDER BY collectionID LIMIT 1");
		
		return;
		}
   }
}

public function checkFolderForOpenCoinID($coinID, $userID, $collectfolderID, $collectionID){
	$sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND collectfolderID = '$collectfolderID' AND collectrollsID = '0' AND collectsetID = '0' AND userID = '$userID'");
	if(mysql_num_rows($sql) > 0){
		 return null;
	} else {
		return true;
	}
}

}//End Class
