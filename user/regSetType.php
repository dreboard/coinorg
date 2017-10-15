<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

function getCoinIDSelects($coinID, $userID, $proService){
	$Collection = new Collection();
	$coin = new Coin();
	$sql = mysql_query("SELECT * FROM collection WHERE coinID = '".$coinID."' AND proService = '".$proService."' AND userID = '$userID' ORDER BY coinGradeNum ASC");
	$html = '<select name="collectionID">';
	if(mysql_num_rows($sql) == 0){
	  $html .= '<option value="">No '.$coin->getCoinName().' Graded</select>';
} else {
	  while($row = mysql_fetch_array($sql))
			{
				$collectionID = intval($row['collectionID']);
				$Collection->getCollectionById($collectionID);
		        $html .= '<option value="collectionID">'.$coin->getCoinName().' '.$Collection->getCoinGrade().'</select>';		  
			}	
		$html .= '</select>';	
       return $html;
	
}
}
$regLink = '';
$verifyLink = '';
if(isset($_GET["coinType"])){
	$coinType = strip_tags(str_replace('_', ' ', $_GET["coinType"])); 
	$coinTypeLink = str_replace(' ', '_', $coinType); 
	$proService = strip_tags($_GET["proService"]);
	  switch ($proService)
		  {
		  case 'PCGS':
			$regLink = '<a href="regSetType.php?proService='.$proService.'&amp;coinType='.strip_tags($_GET["coinType"]).'" class="brownLinkBold">Create PCGS Set Registry</a>';
			$verifyLink = '<a href="http://www.pcgs.com/cert/" class="brownLinkBold">Cert Verification</a>';
			break;
		  case 'NGC':
			$regLink = '<a href="regSetType.php?proService='.$proService.'&amp;coinType='.strip_tags($_GET["coinType"]).'" class="brownLinkBold">Create NGC Bulk Import</a>';
			$verifyLink = '<a href="http://www.ngccoin.com/index.aspx" class="brownLinkBold">Cert Verification</a>';
			break;
		  case 'IGC':
			$regLink = '';
			$verifyLink = '<a href="http://www.icgcoin.com/" class="brownLinkBold">Cert Verification</a>';
			break;
		  case 'ANACS':
			$regLink = '';
			$verifyLink = '<a href="http://anacs.inetlogic.com/" class="brownLinkBold">Cert Verification</a>';
			break;						
          }	
	
	
	
	
}else {
	$coinType = "";

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	

});
</script> 
<style type="text/css">
#clientTbl_filter input {text-align:right; margin-right:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>View <a href="viewGradeReport.php?coinType=<?php echo $coinTypeLink ?>" class="brownLinkBold"><?php echo $coinType ?></a> <?php echo $proService ?> Set Registry</h1>
<p><?php echo $regLink ?> | <?php echo $verifyLink ?> | <a href="viewGradeReport.php?coinType=<?php echo $coinTypeLink ?>" class="brownLinkBold">Grade Report</a>
|  
  <select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
    <option selected="selected" value="">Switch Coin</option>
    <optgroup label="Half Cents">
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Draped_Bust_Half_Cent">Draped Bust</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Classic_Head_Half_Cent">Classic Head</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Braided_Hair_Half_Cent">Braided Hair</option>
      </optgroup>
    <optgroup label="Large Cents">
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Draped_Bust_Large_Cent">Draped Bust</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Classic_Head_Large_Cent">Classic Head</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
      </optgroup>
    <optgroup label="Cents">
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Flying_Eagle">Flying Eagle Cent</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Indian_Head">Indian Head Cent</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Union_Shield">Union Shield</option>
      </optgroup>
    <optgroup label="Two Cents">
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Two_Cent_Piece">Two Cent Piece</option>
      </optgroup>
    <optgroup label="Three Cents">
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
      </optgroup>
    <optgroup label="Half Dimes">
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Draped_Bust_Half_Dime">Draped Bust</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
      </optgroup>
    </optgroup>
    <optgroup label="Nickels">
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Shield_Nickel">Shield</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Liberty_Head_Nickel">Liberty Head</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Indian_Head_Nickel">Indian Head</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Jefferson_Nickel">Jefferson</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Westward_Journey">Westward Journey</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Return_to_Monticello">Return to Monticello</option>
      </optgroup>
    <optgroup label="Dimes">
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Draped_Bust_Dime">Drapped Bust Dime</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Barber_Dime">Barber Dime</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Roosevelt_Dime">Roosevelt Dime</option>
      </optgroup>
    <optgroup label="Twenty Cents">
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinCategory=Twenty_Cent_Piece">Twenty Cents</option>
      </optgroup>
    <optgroup label="Quarters">
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Draped_Bust_Quarter">Draped Bust Quarter</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Barber_Quarter">Barber Quarter</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Standing_Liberty">Standing Liberty</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Washington_Quarter">Washington Quarter</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=State Quarter">State Quarter</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
      </optgroup>
    <optgroup label="Half Dollars">
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Draped_Bust_Half_Dollar">Draped Bust Half</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Barber_Half_Dollar">Barber Half</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Walking_Liberty">Walking Liberty Half</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Franklin_Half_Dollar">Franklin Half</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Kennedy_Half_Dollar">Kennedy Half</option>
      </optgroup>
    <optgroup label="Dollars">
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Trade_Dollar">Trade Dollar</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Morgan_Dollar">Morgan Dollar</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Peace_Dollar">Peace Dollar</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
      <option value="regSetType.php?proService=<?php echo $proService ?>&amp;coinType=Presidential_Dollar">Presidential Dollar</option>
      </optgroup>
  </select>
</p>
<table width="100%" border="0">
     <tr align="center" class="darker">
       <td width="11%"><a href="viewTypeService.php?proService=PCGS&amp;coinType=<?php echo $coinTypeLink; ?>">PCGS</a></td>
       <td width="11%"><a href="viewTypeService.php?proService=ICG&amp;coinType=<?php echo $coinTypeLink; ?>">ICG</a></td>
       <td width="11%"><a href="viewTypeService.php?proService=NGC&amp;coinType=<?php echo $coinTypeLink; ?>">NGC</a></td>
       <td width="11%"><a href="viewTypeService.php?proService=ANACS&amp;coinType=<?php echo $coinTypeLink; ?>">ANACS</a></td>
       <td width="11%"><a href="viewTypeService.php?proService=SEGS&amp;coinType=<?php echo $coinTypeLink; ?>">SEGS</a></td>
       <td width="11%"><a href="viewTypeService.php?proService=PCI&amp;coinType=<?php echo $coinTypeLink; ?>">PCI</a></td>
       <td width="11%"><a href="viewTypeService.php?proService=ICCS&amp;coinType=<?php echo $coinTypeLink; ?>">ICCS</a></td>
       <td width="11%"><a href="viewTypeService.php?proService=HALLMARK&amp;coinType=<?php echo $coinTypeLink; ?>">HALLMARK</a></td>
       <td width="11%"><a href="viewTypeService.php?proService=NTC&amp;coinType=<?php echo $coinTypeLink; ?>">NTC</a></td>
     </tr>
     <tr align="center">
       <td><a href="viewTypeService.php?proService=PCGS&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('PCGS', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=ICG&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('ICG', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=NGC&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('NGC', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=ANACS&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('ANACS', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=SEGS&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('SEGS', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=PCI&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('PCI', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=ICCS&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('ICCS',$coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=HALLMARK&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('HALLMARK', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=NTC&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('NTC',$coinType,$userID); ?></a></td>
     </tr>
  </table>
   <hr />
<form action="" method="post" name="setRegForm" id="setRegForm">
<table width="100%" border="0" id="clientTbl" class="coinTbl">
  <tr class="darker">
    <td width="51%" height="24">Year / Mint</td>  
    <td width="10%" align="center">Grade</td>
    <td width="14%" align="right">Purchase Price</td>
  </tr>
<?php
$countAll = mysql_query("SELECT DISTINCT coinID, collectionID FROM collection WHERE coinType = '$coinType' AND proService = '$proService' AND userID = '$userID' ORDER BY coinYear ASC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
    <tr>
    <td>No '. $coinType.'\'s Graded by '.$proService.'</td>
	<td></td>
	<td></td>	   
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $coin->getCoinById($coinID);  
  $collectionID = intval($row['collectionID']);
  $collection->getCollectionById($collectionID);   
  $coinName = $coin->getCoinName(); 
  echo '
    <tr>
    <td>'.getCoinIDSelects($coinID, $userID, $proService).' '.$coinName.'
	
	<td align="center"></td>
	<td class="purchaseTotals" align="right"></td>	   
  </tr>
  ';
	  }
}
?>

</table>
</form>
<br />
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>