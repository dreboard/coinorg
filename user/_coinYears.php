<?php 
include"../inc/config.php";

if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);

switch($coinType){
  case 'Mixed Cents':
  case 'Mixed Nickels':
  case 'Mixed Dimes':
  case 'Mixed Quarters':
  case 'Mixed Half Dollars':
  case 'Mixed Dollars':
  for ($i = 1859; $i <= date('Y'); $i++) : 
  echo '<option value="'.$i.'">'.$i.'</option>';
  endfor;
break;
default:
$sql = mysql_query("SELECT DISTINCT coinYear FROM coins WHERE coinType = '$coinType' AND coinYear <= ".date('Y')." ORDER BY coinYear DESC") or die(mysql_error());
  while($row = mysql_fetch_array($sql))
	  {
    $coinYear = intval($row['coinYear']);	
    echo '<option value="'.intval($row['coinYear']).'" selected="selected">'.intval($row['coinYear']).'</option>';
	  }
  }
}
?>