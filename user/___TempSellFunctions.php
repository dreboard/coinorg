<?php 



	public function getPurchaseMonthlyInvestmentAll($userID, $month, $year, $table) {
	$sql = mysql_query("SELECT COALESCE(sum(sellPrice), 0.00) FROM ".$table." WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' AND MONTH(sellDate) = '".$month."' AND YEAR(sellDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(sellPrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	

	public function getMonthlyInvestmentAll($userID, $month, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(sellPrice), 0.00) FROM selllist WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' AND MONTH(sellDate) = '".$month."' AND YEAR(sellDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(sellPrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	


	  
	public function getMaxPurchase($userID) {
	$sql = mysql_query("SELECT * FROM selllist WHERE userID = '$userID' ORDER BY sellPrice DESC LIMIT 1") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinVersion = intval($row['coinVersion']);
			  }
			  return str_replace(' ', '_', $coinVersion);	
	  }	
	public function getPurchaseFrom($userID, $purchaseFrom) {
	$sql = mysql_query("SELECT * FROM selllist WHERE userID = '$userID' AND purchaseFrom = '$purchaseFrom'") or die(mysql_error());
			  return mysql_num_rows($sql);	
	  }		
	  
	public function getMonthlyInvestmentByID($userID, $month, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(sellPrice), 0.00) FROM selllist WHERE userID = '$userID' AND MONTH(sellDate) = '".$month."' AND YEAR(sellDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(sellPrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		   
/*
////////////////////Category reports
*/
	public function getTotalInvestmentByCategory($coinCategory, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(sellPrice), 0.00) FROM selllist WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(sellPrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
	
	public function getTotalInvestmentByType($coinType, $userID) {
	$sql = mysql_query("SELECT COALESCE(sum(sellPrice), 0.00) FROM selllist WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(sellPrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
	
	public function getMonthlyInvestmentByType($coinType, $userID, $month, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(sellPrice), 0.00) FROM selllist WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' AND MONTH(sellDate) = '".$month."' AND YEAR(sellDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(sellPrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
	public function getMonthlySalesByCategory($coinCategory, $userID, $month, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(sellPrice), 0.00) FROM selllist WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND MONTH(sellDate) = '".$month."' AND YEAR(sellDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(sellPrice), 0.00)'];
			  }
			  return $coinSum;	
	  }		
//by coin
	public function getMonthlyInvestmentByCoin($coinID, $userID, $month, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(sellPrice), 0.00) FROM selllist WHERE coinID = '".$coinID."' AND userID = '$userID' AND MONTH(sellDate) = '".$month."' AND YEAR(sellDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(sellPrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	public function getYearInvestmentByCoin($coinID, $userID, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(sellPrice), 0.00) FROM selllist WHERE coinID = '".$coinID."' AND userID = '$userID' AND  YEAR(sellDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(sellPrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	  
	public function getMostRecentByCoin($coinID, $userID) {
	$sql = mysql_query("SELECT * FROM selllist WHERE coinID = '".$coinID."' AND userID = '$userID' ORDER BY selllistID DESC LIMIT 1") or die(mysql_error()); 
	if(mysql_num_rows($sql) == 0){ 
	            $coin = new Coin();
				$coin->getCoinByID($coinID);
	  return 'No '.$coin->getCoinName().'\'s collected';
	  } else {
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = strip_tags($row['sellPrice']);
				$coinID = intval($row['coinID']);
				$coin = new Coin();
				$coin->getCoinByID($coinID);
				$selllistID = intval($row['selllistID']);
				$sellDate = date("F j, Y",strtotime($row['sellDate']));
				return '<a href="viewCoinDetail.php?selllistID='.$selllistID.'">'.$coin->getCoinName().'</a>,  &#36;'.$coinSum. ' '.$sellDate;	
			  }
	  }	
	}
	public function getMaxPurchaseCoinID($coinID, $userID) {
	$sql = mysql_query("SELECT * FROM selllist WHERE coinID = '".$coinID."' AND userID = '$userID' ORDER BY sellPrice DESC LIMIT 1") or die(mysql_error()); 
	if(mysql_num_rows($sql) == 0){ 
				$coin = new Coin();
				$coin->getCoinByID($coinID);
	  return 'No '.$coin->getCoinName().'\'s collected';
	  } else {
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = strip_tags($row['sellPrice']);
				$coinID = intval($row['coinID']);
				$coin = new Coin();
				$coin->getCoinByID($coinID);
				$selllistID = intval($row['selllistID']);
				$sellDate = date("F j, Y",strtotime($row['sellDate']));
				return '<a href="viewCoinDetail.php?selllistID='.$selllistID.'">'.$coin->getCoinName().'</a>,  &#36;'.$coinSum. ' '.$sellDate;	
			  }
	  }	
	}	
   
/*
//////////////////////////////////////////////////////////////Max purchase

*/
///Max category
	public function getMaxCategory($coinCategory, $userID) {
	$sql = mysql_query("SELECT MAX(sellPrice) FROM selllist WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['MAX(sellPrice)'];
			  }
			  return $coinSum;	
	  }	
	public function getMaxCategoryID($coinCategory, $userID) {
	$sql = mysql_query("SELECT * FROM selllist WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' ORDER BY sellPrice DESC LIMIT 1") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$selllistID = intval($row['selllistID']);
			  }
			  return $selllistID;	
	  }	
	public function getMaxCategoryVersion($coinCategory, $userID) {
	$sql = mysql_query("SELECT * FROM selllist WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' ORDER BY sellPrice DESC LIMIT 1") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinVersion = intval($row['coinVersion']);
			  }
			  return str_replace(' ', '_', $coinVersion);	
	  }	
	public function getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom) {
	$sql = mysql_query("SELECT * FROM selllist WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND userID = '$userID' AND purchaseFrom = '$purchaseFrom'") or die(mysql_error());
			  return mysql_num_rows($sql);	
	  }		  
	  
///Max type
	public function getMaxType($coinType, $userID) {
	$sql = mysql_query("SELECT MAX(sellPrice) FROM selllist WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['MAX(sellPrice)'];
			  }
			  return $coinSum;	
	  }	
	public function getMaxTypeID($coinType, $userID) {
	$sql = mysql_query("SELECT * FROM selllist WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' ORDER BY sellPrice DESC LIMIT 1") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$selllistID = intval($row['selllistID']);
			  }
			  return $selllistID;	
	  }	
	public function getMaxTypeVersion($coinType, $userID) {
	$sql = mysql_query("SELECT * FROM selllist WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' ORDER BY sellPrice DESC LIMIT 1") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinVersion = intval($row['coinVersion']);
			  }
			  return str_replace(' ', '_', $coinVersion);	
	  }	
	public function getYearInvestmentByType($coinType, $userID, $year) {
	$sql = mysql_query("SELECT COALESCE(sum(sellPrice), 0.00) FROM selllist WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND userID = '$userID' AND YEAR(sellDate) = '".$year."'") or die(mysql_error()); 
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(sellPrice), 0.00)'];
			  }
			  return $coinSum;	
	  }	
	  




?>