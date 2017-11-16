<?php 
//getBusinessHighGradeNumberByCoinID


class Grade {

	public function __construct() { 
		} 
		
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Master grades		
		
		
		
		


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//By Category







///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//By Type		
		
		
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//By coin			
//viewCoinGrade.php		

	public function getCoinIDGrade($grade, $coinID, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '".$coinID."' AND coinGrade = '$grade' AND proService = 'None'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
    }	
	public function getCoinProGrade($grade, $coinID, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '".$coinID."' AND coinGrade = '$grade' AND proService != 'None'") or die(mysql_error()); 
	return mysql_num_rows($sql); 
    }
	public function getTotalCoinGrade($grade, $coinID, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '".$coinID."' AND coinGrade = '$grade'") or die(mysql_error()); 
	return mysql_num_rows($sql); 
    }	
	public function getCoinIDProGradeCount($coinID, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '".$coinID."' AND proService != 'None'") or die(mysql_error()); 
	return mysql_num_rows($sql); 
    }		
	public function getCoinIDProGrader($proService, $coinID, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '".$coinID."' AND proService = '$proService'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
    }	
	public function getGradedCoinIDCount($coinID, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '".$coinID."'  AND coinGrade != 'No Grade'") or die(mysql_error());  
	return mysql_num_rows($sql); 
    }	
	public function getNoGradeCoinIDCount($coinID, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '".$coinID."'  AND coinGrade = 'No Grade'") or die(mysql_error());  
	return mysql_num_rows($sql); 
    }			

	public function getProofCameoCoinIDCount($coinID, $userID, $designation){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND designation = '$designation' AND coinID = '".$coinID."'") or die(mysql_error());  
	return mysql_num_rows($sql); 
    }	

public function getStrikeCountByCoinID($coinID, $userID, $strike){
	$sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID' AND strike = '$strike'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
}
public function getBusinessHighGradeNumberByCoinID($coinID, $userID, $strike){
	$sql = mysql_query("SELECT MAX(coinGradeNum) FROM collection WHERE coinID = '$coinID' AND userID = '$userID' AND strike = '$strike'") or die(mysql_error()); 
	while($row = mysql_fetch_array($sql)){
		if($row['MAX(coinGradeNum)'] == '0'){
			return 'No coins graded';
		} else {		
		switch ($strike) {
			case 'Business':
			return $this->assignGradePrefix($row['MAX(coinGradeNum)']). $row['MAX(coinGradeNum)'];
			case 'Proof':
			return $this->assignGradeProofPrefix($row['MAX(coinGradeNum)']). $row['MAX(coinGradeNum)'];
			//return "PR". $row['MAX(coinGradeNum)'];
			default:
			return 'No coins graded';
				break;
		}
	}
  }
}
public function getBusinessHighGradeNumberByColorByCoinID($coinID, $color, $userID, $strike){
	$sql = mysql_query("SELECT MAX(coinGradeNum) FROM collection WHERE coinID = '$coinID' AND color = '$color' AND userID = '$userID' AND strike = '$strike'") or die(mysql_error()); 
	while($row = mysql_fetch_array($sql)){
		if($row['MAX(coinGradeNum)'] == '0'){
			return 'No coins graded';
		} else {		
		switch ($strike) {
			case 'Business':
			return $this->assignGradePrefix($row['MAX(coinGradeNum)']). $row['MAX(coinGradeNum)'];
			case 'Proof':
			return $this->assignGradeProofPrefix($row['MAX(coinGradeNum)']). $row['MAX(coinGradeNum)'];
			//return "PR". $row['MAX(coinGradeNum)'];
			default:
			return 'No coins graded';
				break;
		}
	}
  }
}
public function getServiceHighGradeNumberByCoinID($coinID, $userID, $strike, $proService){
	$sql = mysql_query("SELECT MAX(coinGradeNum) FROM collection WHERE coinID = '$coinID' AND userID = '$userID' AND strike = '$strike' AND proService = '$proService'") or die(mysql_error()); 
	while($row = mysql_fetch_array($sql)){
		if($row['MAX(coinGradeNum)'] == '0'){
			return 'No coins graded';
		} else {		
		switch ($strike) {
			case 'Business':
			return $this->assignGradePrefix($row['MAX(coinGradeNum)']). $row['MAX(coinGradeNum)'];
			case 'Proof':
			return $this->assignGradeProofPrefix($row['MAX(coinGradeNum)']). $row['MAX(coinGradeNum)'];
			//return "PR". $row['MAX(coinGradeNum)'];
			default:
			return 'No coins graded';
				break;
		}
	}
  }
}
	
public function getDesignationHighGradeNumberByCoinID($coinID, $fullAtt, $userID, $strike){
	$sql = mysql_query("SELECT MAX(coinGradeNum) FROM collection WHERE coinID = '$coinID' AND fullAtt = '$fullAtt' AND userID = '$userID' AND strike = '$strike'") or die(mysql_error()); 
	while($row = mysql_fetch_array($sql)){
		if($row['MAX(coinGradeNum)'] == '0'){
			return 'No coins graded';
		} else {		
		switch ($strike) {
			case 'Business':
			return $this->assignGradePrefix($row['MAX(coinGradeNum)']). $row['MAX(coinGradeNum)'];
			case 'Proof':
			return $this->assignGradeProofPrefix($row['MAX(coinGradeNum)']). $row['MAX(coinGradeNum)'];
			//return "PR". $row['MAX(coinGradeNum)'];
			default:
			return 'No coins graded';
				break;
		}
	}
  }
}	
	
	public function getTotalTypeGradeByCoinID($strike, $coinID, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '$coinID' AND strike = '$strike' AND coinGrade != 'No Grade'") or die(mysql_error()); 
	return mysql_num_rows($sql); 
    }	
	public function getTotalTypeProGradeByCoinID($strike, $coinID, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '$coinID' AND strike = '$strike' AND proService != 'None'") or die(mysql_error()); 
	return mysql_num_rows($sql); 
    }	
	public function getProCoinGrade($grade, $coinID, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND coinID = '$coinID' AND coinGrade = '$grade' AND proService != 'None'") or die(mysql_error()); 
	return mysql_num_rows($sql); 
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//SERIES
		//Total Collected	
public function getStrikeCountByDesign($design, $userID, $strike){
	$sql = mysql_query("SELECT * FROM collection WHERE design = '$design' AND userID = '$userID' AND strike = '$strike'") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
}
	public function getTotalTypeProGradeByDesign($strike, $design, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND design = '$design' AND strike = '$strike' AND proService != 'None'") or die(mysql_error()); 
	return mysql_num_rows($sql); 
    }	
	public function getTotalTypeGradeByDesign($strike, $design, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND design = '$design' AND strike = '$strike' AND coinGrade != 'No Grade'") or die(mysql_error()); 
	return mysql_num_rows($sql); 
    }	
	public function getCollectionCountByDesign($userID, $design) {
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND design = '$design'") or die(mysql_error()); 
	return mysql_num_rows($sql); 
    }	
	
	public function getCollectionCountByDesignByYear($userID, $design, $coinYear) {
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND design = '$design'  AND coinYear = '$coinYear'") or die(mysql_error()); 
	return mysql_num_rows($sql); 
    }		
	
	public function getCoinSumByDesignByYear($userID, $design, $coinYear) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE  userID = '$userID' AND design = '$design' AND coinYear = '$coinYear'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
	
	
	public function getCoinSumByDesign($userID, $design) {
	$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM collection WHERE  userID = '$userID' AND design = '$design'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	public function getDesignGrade($grade, $design, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND design = '$design' AND coinGrade = '$grade' AND proService = 'None'") or die(mysql_error()); 
	return mysql_num_rows($sql); 
    }
	public function getDesignProGrade($grade, $design, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND design = '$design' AND coinGrade = '$grade' AND proService != 'None'") or die(mysql_error()); 
	return mysql_num_rows($sql); 
    }

	public function getTotalDesignGrade($grade, $design, $userID){
	$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND design = '$design' AND coinGrade = '$grade' ") or die(mysql_error()); 
    return mysql_num_rows($sql); 
    }	
	
public function getBusinessHighGradeNumberByDesign($design, $userID, $strike){
	$sql = mysql_query("SELECT MAX(coinGradeNum) FROM collection WHERE design = '$design' AND userID = '$userID' AND strike = '$strike'") or die(mysql_error()); 
	while($row = mysql_fetch_array($sql)){
		if($row['MAX(coinGradeNum)'] == '0'){
			return 'No coins graded';
		} else {		
		switch ($strike) {
			case 'Business':
			return $this->assignGradePrefix($row['MAX(coinGradeNum)']). $row['MAX(coinGradeNum)'];
			break;
			case 'Proof':
			return $this->assignGradeProofPrefix($row['MAX(coinGradeNum)']). $row['MAX(coinGradeNum)'];
			//return "PR". $row['MAX(coinGradeNum)'];
			break;
/*			default:
			return 'No coins graded';
				assignGradeProofPrefix($coinGradeNum);*/
		}
	}
  }
}	



/////////////////////////////////////////////////////////////////////////////////////
public function assignGradePrefix($coinGradeNum){
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
			case '53':
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
public function assignGradeProofPrefix($coinGradeNum){
		switch ($coinGradeNum) {
			case '35':
			case '40':
			case '45':	
			case '50':
			case '55':
			case '58':	
			case '60':
			case '61':
			case '62':	
			case '63':
			case '64':
			case '65':	
			case '66':
			case '67':
			case '68':	
			case '69':
			case '70':
			return "PR";
			break;																																														
			default:
			return 'No coins graded';
				break;
		}	
	
}

//end class
}