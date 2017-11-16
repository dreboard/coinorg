<?php 
//getDesignStartYear
class CoinDesign
{


public function getDesignStartYear($design){
	
switch ($design)
{
  case 'Seated Liberty':
	$startYear = "1837";
	break;
  case 'Barber':
	$startYear = "1892";
	break;
  case 'Draped Bust':
	$startYear = "1795";
	break;
  case 'Liberty Cap':
	$startYear = "1793";
	break;
  case 'Flowing Hair':
	$startYear = "1793";
	break;	
  }
  return $startYear;
}

public function getDesignEndYear($design){
	
switch ($design)
{
  case 'Seated Liberty':
	$startYear = "1891";
	break;
  case 'Barber':
	$startYear = "1916";
	break;
  case 'Draped Bust':
	$startYear = "1808";
	break;
  case 'Liberty Cap':
	$startYear = "1839";
	break;
  case 'Flowing Hair':
	$startYear = "1795";
	break;	
  }
  return $startYear;
}


public function getCategoryArray($design){
switch ($design)
{
  case 'Seated Liberty':
	$coinCategoryGroup = ["Half Dime", "Dime", "Quarter", "Half Dollar", "Dollar"];
	break;
  case 'Barber':
	$coinCategoryGroup = ["Dime", "Quarter", "Half Dollar"];
	break;
  case 'Draped Bust':
	$coinCategoryGroup = ["Half Cent", "Large Cent", "Half Dime", "Dime", "Quarter", "Half Dollar", "Dollar"];
	break;
  case 'Liberty Cap':
	$coinCategoryGroup = ["Half Cent", "Large Cent", "Half Dime", "Dime", "Quarter", "Half Dollar"];
	break;
  case 'Flowing Hair':
	$coinCategoryGroup = ["Large Cent", "Half Dime", "Half Dollar", "Dollar"];
	break;	
  }
  return $coinCategoryGroup;
}
public function getCoinTypeByDesignArray($design){
switch ($design)
{
  case 'Seated Liberty':
	$coinCategoryGroup = ["Seated Liberty Half Dime", "Seated Liberty Dime", "Seated Liberty Quarter", "Seated Liberty Half Dollar", "Seated Liberty Dollar"];
	break;
  case 'Barber':
	$coinCategoryGroup = ["Barber Dime", "Barber Quarter", "Barber Half Dollar"];
	break;
  case 'Draped Bust':
	$coinCategoryGroup = ["Draped Bust Half Cent", "Draped Bust Large Cent", "Draped Bust Half Dime", "Draped Bust Dime", "Draped Bust Quarter", "Draped Bust Half Dollar", "Draped Bust Dollar"];
	break;
  case 'Liberty Cap':
	$coinCategoryGroup = ["Liberty Cap Half Dime", "Liberty Cap Dime", "Liberty Cap Quarter", "Liberty Cap Half Dollar", "Liberty Cap Dollar"];
	break;
  case 'Flowing Hair':
	$coinCategoryGroup = ["Flowing Hair Large Cent", "Flowing Hair Half Dime", "Flowing Hair Half Dollar", "Flowing Hair Dollar"];
	break;	
  }
  return $coinCategoryGroup;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Design Counts
  	  public function getCoinCountDesign($design) {
	  $sql = mysql_query("SELECT * FROM coins WHERE design = '".str_replace('_', ' ', $design)."'");
	  return mysql_num_rows($sql);
  }

	public function getCoinByDesignByMint($design){
    $sql = mysql_query("SELECT * FROM coins WHERE design = '".str_replace('_', ' ', $design)."' AND  byMint = '1'") or die(mysql_error());
	return mysql_num_rows($sql);
    }

//Unique collection count
	public function getCollectionUniqueCountByDesign($userID, $design) {
	$sql = mysql_query( "SELECT DISTINCT coinID FROM collection WHERE design = '".str_replace('_', ' ', $design)."' AND  userID = '$userID'");
	$collectCount = mysql_num_rows($sql);    	
	
	return $collectCount;
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//reportDesign.php
	public function getCollectionCountByDesign($userID, $design) {
		  $sql = mysql_query( "SELECT * FROM collection WHERE userID = '$userID' AND design = '$design'") or die(mysql_error()); 
		  return mysql_num_rows($sql);
    }
	public function getCoinSumByDesign($userID, $design) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE design = '".str_replace('_', ' ', $design)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
		//Mint Collection Progress
	public function getDesignByMintCountByID($userID, $design) {
		  $sql = mysql_query( "SELECT DISTINCT coinID FROM collection WHERE userID = '$userID' AND byMint = '1' AND design = '$design'") or die(mysql_error()); 
		  return mysql_num_rows($sql);
    }

		public function getTotalDesignByMintCount($design){
		  $sql = mysql_query("SELECT * FROM coins WHERE design = '".$design."' AND byMint = '1'") or die(mysql_error());
		  return mysql_num_rows($sql);
    }
	
	public function getDesignCountByID($userID, $design) {
		  $sql = mysql_query( "SELECT DISTINCT coinID FROM collection WHERE userID = '$userID' AND design = '$design'") or die(mysql_error()); 
		  return mysql_num_rows($sql);
    }
		public function getTotalDesignCount($design){
		  $sql = mysql_query("SELECT * FROM coins WHERE design = '$design'") or die(mysql_error());
		  return mysql_num_rows($sql);
    }




//Seated Liberty Collection
/*	public function getSeatedTypeCollectionProgress($coinCategory, $userID) {
	$sql = mysql_query( "SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND  userID = '$userID' LIMIT 1");
	$collectCount = mysql_num_rows($sql);    	
	return $collectCount;
    }	*/
	public function getSeatedTypeCollectionProgress($userID, $design) {
	$sql = mysql_query( "SELECT DISTINCT coinCategory FROM collection WHERE design = '$design' AND userID = '$userID'");
	return mysql_num_rows($sql);    	
    }		
	public function getDesignCollectionProgress($userID, $design) {
	$sql = mysql_query( "SELECT DISTINCT coinCategory FROM collection WHERE design = '$design' AND userID = '$userID'");
	return mysql_num_rows($sql);    	
    }	



public function coinYearDisplay($coinCategory, $userID, $coinYear){
	$collection = new Collection();
	$countAll = mysql_query("SELECT * FROM coins WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND coinName LIKE '%$coinYear%' AND design = 'Seated Liberty'") or die(mysql_error());
	while($row = mysql_fetch_array($countAll)){
		$coinType = str_replace(' ', '_', $row['coinType']);
		$coinVersion = str_replace(' ', '_', $row['coinVersion']);
		$yearCoin = '<td width="140"><a href="viewListReport.php?coinType='.$coinType.'"><img class="coinSwitch" src="../img/'.$collection->getVarietyImg($coinVersion, $userID).'" alt="" width="100" height="100" /></a><br />
 <a href="viewListReport.php?coinType='.$coinType.'">'.str_replace('_', ' ', $coinCategory).'</a></td>';
		return $yearCoin;
	}	
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Grades
	public function getProGrader($proService, $design, $userID){
	$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND design = '".str_replace('_', ' ', $design)."' AND proService = '$proService'") or die(mysql_error()); 
	$collectCount = mysql_num_rows($myQuery);    	
	return $collectCount;
    }
	public function getNoGradeDesignCount($design, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND design = '".str_replace('_', ' ', $design)."' AND coinGrade = 'No Grade'") or die(mysql_error()); 
	return mysql_num_rows($sql);
	}
	public function getGradeDesignCount($design, $userID){
	$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND design = '".str_replace('_', ' ', $design)."' AND coinGrade != 'No Grade'") or die(mysql_error());  
	$collectCount = mysql_num_rows($myQuery);    	
	return $collectCount;
    }
	
	
	public function getDesignProGradeCount($design, $userID){
	$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND design = '".str_replace('_', ' ', $design)."' AND coinGrade != 'No Grade' AND proService != 'None'") or die(mysql_error()); 
	$collectCount = mysql_num_rows($myQuery);    	
	return $collectCount;
    }		
	public function getDesignNoProGradeCount($design, $userID){
	$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND design = '".str_replace('_', ' ', $design)."' AND coinGrade != 'No Grade' AND proService = 'None'") or die(mysql_error()); 
	$collectCount = mysql_num_rows($myQuery);    	
	return $collectCount;
    }		

	
	
	
	
	
}
?>