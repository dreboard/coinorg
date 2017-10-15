<?php
/*

getTotalCertCommemorativeVersionByID

*/
class Commemorative
{

public function __construct() {}


//All
	public function getCommemorativeCount(){
      $sql = mysql_query("SELECT * FROM coins WHERE commemorative = '1' ") or die(mysql_error());
	return mysql_num_rows($sql);
    }
    public function getTotalCommemorativeByID($userID){
      $sql = mysql_query("SELECT * FROM collection WHERE commemorative = '1'  AND userID = '$userID'") or die(mysql_error());
	return mysql_num_rows($sql); 
    }	
	
	public function getCommemorativeFaceValByID($userID) {
	$sql = mysql_query("SELECT COALESCE(sum(denomination), 0.00) FROM collection WHERE commemorative = '1' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(denomination), 0.00)'];
			  }
			  return $coinSum;	
	  }	
function getCommemorativeSumByID($userID){
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE commemorative = '1' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
    public function getTotalCertCommemorativeByID($userID){
      $sql = mysql_query("SELECT * FROM collection WHERE commemorative = '1' AND proService != 'None' AND userID = '$userID'") or die(mysql_error());
	return mysql_num_rows($sql); 
    }	
    public function getTotalProofCommemorativeByID($userID){
      $sql = mysql_query("SELECT * FROM collection WHERE commemorative = '1' AND strike = 'Proof' AND userID = '$userID'") or die(mysql_error());
	return mysql_num_rows($sql); 
    }	
	    public function getTotalErrorCommemorativeByID($userID){
      $sql = mysql_query("SELECT * FROM collection WHERE commemorative = '1' AND errorCoin = '1' AND userID = '$userID'") or die(mysql_error());
	return mysql_num_rows($sql); 
    }		  

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//BY VERSION
//Modern/Early pages

	public function getCompleteCommemorativeCount($commemorativeVersion){
      $sql = mysql_query("SELECT * FROM coins WHERE commemorativeVersion = '".str_replace('_', ' ', $commemorativeVersion)."'") or die(mysql_error());
	return mysql_num_rows($sql);
    }
    public function getTotalCommemorativeVersionByID($commemorativeVersion, $userID){
      $sql = mysql_query("SELECT * FROM collection WHERE commemorativeVersion = '".str_replace('_', ' ', $commemorativeVersion)."'  AND userID = '$userID'") or die(mysql_error());
	return mysql_num_rows($sql); 
    }	
	public function getCommemorativeVersionFaceValByID($commemorativeVersion, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(denomination), 0.00) FROM collection WHERE commemorativeVersion = '".str_replace('_', ' ', $commemorativeVersion)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(denomination), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	  
//By denomination and commemorative type	  
function getCommemorativeVersionSumTypeCount($commemorativeVersion, $coinType, $userID){
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE commemorativeVersion = '".str_replace('_', ' ', $commemorativeVersion)."' AND coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
function getCommemorativeVersionReportTypeCount($commemorativeVersion, $coinType, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE commemorativeVersion = '".str_replace('_', ' ', $commemorativeVersion)."' AND  coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID'") or die(mysql_error());
	return mysql_num_rows($sql);
}
		//Total Collected
	public function getTotalCollectedCommemorativeVersionByID($commemorativeVersion, $userID) {
			    $sql = mysql_query("SELECT * FROM collection WHERE commemorativeVersion = '".str_replace('_', ' ', $commemorativeVersion)."' AND userID = '$userID'") or die(mysql_error()); 
	            return mysql_num_rows($sql);
	}	
	public function getTotalUniqueCollectedCommemorativeVersionByID($commemorativeVersion, $userID) {
			    $sql = mysql_query("SELECT DISTINCT coinID FROM collection WHERE commemorativeVersion = '".str_replace('_', ' ', $commemorativeVersion)."' AND userID = '$userID'") or die(mysql_error()); 
	            return mysql_num_rows($sql);
	}	
	public function getInvestmentCommemorativeVersionByID($commemorativeVersion, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE commemorativeVersion = '".str_replace('_', ' ', $commemorativeVersion)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	


	  }	
    public function getTotalCertCommemorativeVersionByID($commemorativeVersion, $userID){
      $sql = mysql_query("SELECT * FROM collection WHERE commemorativeVersion = '".str_replace('_', ' ', $commemorativeVersion)."' AND proService != 'None' AND userID = '$userID'") or die(mysql_error());
	return mysql_num_rows($sql); 
    }	
    public function getTotalProofCommemorativeVersionByID($commemorativeVersion, $userID){
      $sql = mysql_query("SELECT * FROM collection WHERE commemorativeVersion = '".str_replace('_', ' ', $commemorativeVersion)."' AND strike = 'Proof' AND userID = '$userID'") or die(mysql_error());
	return mysql_num_rows($sql); 
    }	
	    public function getTotalErrorCommemorativeVersionByID($commemorativeVersion, $userID){
      $sql = mysql_query("SELECT * FROM collection WHERE commemorativeVersion = '".str_replace('_', ' ', $commemorativeVersion)."' AND errorCoin = '1' AND userID = '$userID'") or die(mysql_error());
	return mysql_num_rows($sql); 
    }	
public function getCommemorativeVersionImg($commemorativeVersion, $userID){
	$countAll = mysql_query("SELECT * FROM collection WHERE commemorativeVersion = '$commemorativeVersion' AND userID = '$userID'") or die(mysql_error());
	$img_check = mysql_num_rows($countAll);
	if($img_check == 0){ 
	  return "blank.jpg";
	  } else {
	while($row = mysql_fetch_array($countAll)){
		$coinVersion = str_replace(' ', '_', $row['commemorativeVersion']);
		return $coinVersion.'.jpg';
	}
	
	}	
}	
public function getCommemorativeVersionCoinType($commemorativeVersion){
	$sql = mysql_query("SELECT coinType FROM coins WHERE commemorativeVersion = '$commemorativeVersion'") or die(mysql_error());
        $row = mysql_fetch_array($sql);		
		return $row['coinType'];
}	
public function getCommemorativeVersionCoinCategory($commemorativeVersion){
	$sql = mysql_query("SELECT coinCategory FROM coins WHERE commemorativeVersion = '$commemorativeVersion'") or die(mysql_error());
        $row = mysql_fetch_array($sql);		
		return $row['coinCategory'];
}	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////Early Commemoratives
public function getPlatinumProofImg($coinID, $userID){
	$countAll = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID'") or die(mysql_error());
	$img_check = mysql_num_rows($countAll);
	if($img_check == 0){ 
	  return "blank.jpg";
	  } else {
	while($row = mysql_fetch_array($countAll)){
		$coinVersion = str_replace(' ', '_', $row['coinVersion']);
		return $coinVersion.'.jpg';
	}
	
	}	
}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////Modern Commemorative
public function getCommemorativeProofImg($userID){
	$countAll = mysql_query("SELECT * FROM collection WHERE coinType = 'First Spouse' AND strike = 'Proof' AND userID = '$userID'") or die(mysql_error());
	$img_check = mysql_num_rows($countAll);
	if($img_check == 0){ 
	  return "blank.jpg";
	  } else {
	while($row = mysql_fetch_array($countAll)){
		$coinVersion = str_replace(' ', '_', $row['coinVersion']);
		return 'First_Spouse.jpg';
	}
	
	}	
}






//Get business
public function getCommemorativeImg($userID){
	$countAll = mysql_query("SELECT * FROM collection WHERE coinType = 'First Spouse' AND strike = 'Business' AND userID = '$userID'") or die(mysql_error());
	$img_check = mysql_num_rows($countAll);
	if($img_check == 0){ 
	  return "blank.jpg";
	  } else {
	while($row = mysql_fetch_array($countAll)){
		$coinVersion = str_replace(' ', '_', $row['coinVersion']);
		return $coinVersion.'.jpg';
	}
	
	}	
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//GRADES
	function getCategoryGrade($grade, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND commemorative = '1' AND coinGrade = '$grade' AND proService = 'None'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
    }
	function getCommemorativeVersionGrade($grade, $commemorativeVersion, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND commemorativeVersion = '".str_replace('_', ' ', $commemorativeVersion)."' AND coinGrade = '$grade' AND proService = 'None'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
    }
	function getCategoryProGrade($grade, $coinCategory, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND coinGrade = '$grade' AND proService != 'None'") or die(mysql_error()); 
	return mysql_num_rows($sql);
    }
	function getCommemorativeVersionProGrade($grade, $commemorativeVersion, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND commemorativeVersion = '".str_replace('_', ' ', $commemorativeVersion)."' AND coinGrade = '$grade' AND proService != 'None'") or die(mysql_error()); 
	return mysql_num_rows($sql); 
    }
	function getCommemorativeVersionGradeByStrike($strike, $commemorativeVersion, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND commemorativeVersion = '".str_replace('_', ' ', $commemorativeVersion)."' AND strike = '$strike' AND coinGrade != 'No Grade' AND proService = 'None'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
    }		
	function getTotalCommemorativeVersionProGradeByStrike($strike, $commemorativeVersion, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND commemorativeVersion = '".str_replace('_', ' ', $commemorativeVersion)."' AND strike = '$strike' AND proService != 'None'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
    }		
	function getTotalCommemorativeVersionGrade($grade, $commemorativeVersion, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND commemorativeVersion = '".str_replace('_', ' ', $commemorativeVersion)."' AND coinGrade = '$grade'") or die(mysql_error()); 
	return mysql_num_rows($sql); 
    }		
function getStrikeCountByCommemorativeVersion($commemorativeVersion, $userID, $strike){
	$sql = mysql_query("SELECT * FROM collection WHERE commemorativeVersion = '".str_replace('_', ' ', $commemorativeVersion)."' AND userID = '$userID' AND strike = '$strike'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
}		
//type report counts
	function getGradeTypeCount($coinType, $userID){
	$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '".str_replace('_', ' ', $coinType)."'  AND coinGrade != 'No Grade'") or die(mysql_error());  
	$collectCount = mysql_num_rows($myQuery);    	
	return $collectCount;
    }
	function getNotGradedTypeCount($coinType, $userID){
	$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '".str_replace('_', ' ', $coinType)."'  AND coinGrade = 'No Grade'") or die(mysql_error());  
	$collectCount = mysql_num_rows($myQuery);    	
	return $collectCount;
    }	
	function getAllGradedTypeCount($coinType, $userID){
	$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '".str_replace('_', ' ', $coinType)."'  AND coinGrade != 'No Grade'") or die(mysql_error());  
	$collectCount = mysql_num_rows($myQuery);    	
	return $collectCount;
    }		
	function getGradeProTypeCount($coinType, $userID){
	$myQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '".str_replace('_', ' ', $coinType)."' AND proService != 'None'") or die(mysql_error());  
	$collectCount = mysql_num_rows($myQuery);    	
	return $collectCount;
    }


function getBusinessHighGradeNumberByID($coinID, $userID, $strike){
	$sql = mysql_query("SELECT MAX(coinGradeNum) FROM collection WHERE coinID = '$coinID' AND userID = '$userID' AND strike = '$strike'") or die(mysql_error()); 
	while($row = mysql_fetch_array($sql)){
		if($row['MAX(coinGradeNum)'] == '0'){
			return 'No coins graded';
		} else {		
		switch ($strike) {
			case 'Business':
			return "MS ". $row['MAX(coinGradeNum)'];
			case 'Proof':
			return "PR". $row['MAX(coinGradeNum)'];
			default:
			return 'No coins graded';
				break;
		}
	}
  }
}

function getGradedStrikeCountByType($coinType, $userID, $strike){
	$sql = mysql_query("SELECT * FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' AND strike = '$strike' AND coinGrade != 'No Grade'  AND proService = 'None'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
}
function getStrikeCountByCategory($coinCategory, $userID, $strike){
	$sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND strike = '$strike'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
}
function getGradedStrikeCountByCategory($coinCategory, $userID, $strike){
	$sql = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND strike = '$strike' AND coinGrade != 'No Grade'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
}
function getStrikeCountByType($coinType, $userID, $strike){
	$sql = mysql_query("SELECT * FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' AND strike = '$strike'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
}
function getBusinessHighGradeNumberByType($coinType, $userID, $strike){
	$sql = mysql_query("SELECT MAX(coinGradeNum) FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' AND strike = '$strike'") or die(mysql_error()); 
	while($row = mysql_fetch_array($sql)){
		if($row['MAX(coinGradeNum)'] == '0'){
			return 'No coins graded';
		} else {		
		switch ($strike) {
			case 'Business':
			return $this->assignGradePrefix($row['MAX(coinGradeNum)']). $row['MAX(coinGradeNum)'];
			case 'Proof':
			return "PR". $row['MAX(coinGradeNum)'];
			default:
			return 'No coins graded';
				break;
		}
	}
  }
}

function assignGradePrefix($coinGradeNum){
		switch ($coinGradeNum) {
			case '1':
			return "PO";break;
			case '2':
			return "FR";break;
			case '3':
			return "AG";break;
			case '4':
			return "G";break;
			case '6':
			return "G";break;
			case '8':	
			return "VG";break;	
			case '10':
			return "VG";break;
			case '12':
			return "F";break;
			case '15':	
			return "F";break;
			case '20':
			return "VF";break;
			case '25':
			return "VF";break;
			case '30':	
			return "VF";break;
			case '35':
			return "VF";break;
			case '40':
			return "EF";break;
			case '45':	
			return "EF";break;
			case '50':
			return "AU";break;
			case '55':
			return "AU";break;
			case '58':	
			return "AU";break;
			case '60':
			return "MS";break;
			case '61':
			return "MS";break;
			case '62':	
			return "MS";break;
			case '63':
			return "MS";break;
			case '64':
			return "MS";break;
			case '65':	
			return "MS";break;
			case '66':
			return "MS";break;
			case '67':
			return "MS";break;
			case '68':	
			return "MS";break;
			case '69':
			return "MS";break;
			case '70':
			return "MS";break;																																														
			default:
			return 'No coins graded';
				break;
		}	
	
}


//Ungraded counts
	function getNoGradeCount($userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND proService = 'None'") or die(mysql_error());  
	return mysql_num_rows($sql);
    }
	function getGradeCategoryCount($coinCategory, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND coinGrade != 'No Grade'") or die(mysql_error());  
return mysql_num_rows($sql);
    }
	
	function getNoGradeCategoryCount($coinCategory, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND coinGrade = 'No Grade'") or die(mysql_error()); 
	return mysql_num_rows($sql);
	}
	function getNoGradeTypeCount($coinType, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '".str_replace('_', ' ', $coinType)."'  AND proService = 'None'") or die(mysql_error());  
return mysql_num_rows($sql);
    }
	function getNoGradeGoldCount($userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID'  AND proService = 'None' AND coinMetal = 'Gold'") or die(mysql_error());  
return mysql_num_rows($sql);
    }
	
	function getNoGradeStrikeTypeCount($coinType, $userID, $strike){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinType = '".str_replace('_', ' ', $coinType)."' AND coinGrade = 'No Grade' AND strike = '$strike'") or die(mysql_error()); 
	return mysql_num_rows($sql);
	}
	function getCoinIDProGrader($proService, $userID, $coinID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND proService = '".str_replace('_', ' ', $proService)."' AND coinID = '$coinID'") or die(mysql_error()); 
	return mysql_num_rows($sql);
	}	

}
?>