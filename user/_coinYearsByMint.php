<?php 
include"../inc/config.php";

if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);

echo '<strong>Start Year:</strong> <select name="startYear" id="startYear">';
$sql = mysql_query("SELECT DISTINCT coinYear FROM coins WHERE coinType = '$coinType' AND coinYear <= ".date('Y')." AND byMint = '1' ORDER BY coinYear ASC") or die(mysql_error());
  while($row = mysql_fetch_array($sql))
	  {
    $coinYear = intval($row['coinYear']);	
    echo '<option value="'.intval($row['coinYear']).'">'.intval($row['coinYear']).'</option>';
	  }
echo '</select>&nbsp;&nbsp;&nbsp;';

echo '<strong>End Year:</strong> <select name="endYear" id="endYear">';
$sql = mysql_query("SELECT DISTINCT coinYear FROM coins WHERE coinType = '$coinType' AND coinYear <= ".date('Y')." AND byMint = '1' ORDER BY coinYear DESC") or die(mysql_error());
  while($row = mysql_fetch_array($sql))
	  {
    $coinYear = intval($row['coinYear']);	
    echo '<option value="'.intval($row['coinYear']).'">'.intval($row['coinYear']).'</option>';
	  }
echo '</select>';
	  
}
?>