<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Untitled Document</title>
<?php include("../headItems.php"); ?>
<style type="text/css">
#new-coin-selects-tbl img {width:15px; height:15px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container fill-height">

<h2>Add Raw or Slabbed Coin</h2>

  <div class="row">
  <div class="col-xs-6">

  <div class="btn-group">
    <a role="button" class="btn btn-primary" href="addBullion.php">Add Bullion Coin</a>
    <a role="button" class="btn btn-primary" href="addCommemorative.php">Add Commemorative Coin</a> 
  </div>
  </div>
  
  <div class="col-xs-6">
  <form action="addCoinTypeYear.php" class="form-inline  navbar-right" role="form" method="get">
  <div class="form-group">
    <label for="century"> By Year </label>
    <select name="century" class="form-control" id="century">
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
</select>
 <select name="theYear" class="form-control" id="theYear">
 <option selected value="00">00</option>
        <?php 
for ($num = 1; $num <= 99; $num++) {
if($num<10)
$day = "0$num"; // add the zero
else
$day = "$num"; // don't add the zero
echo "<option value=".$day.">".$day."</option>";
}
?></select>   
  </div>
  <button type="submit" class="btn btn-primary">Load Year</button>
</form>
  </div>
</div>


<h3 class="clearfix">Half Cents</h3>
<div class="table-responsive">  
<table width="100%" border="0" class="table table-hover" id="new-coin-selects-tbl">
  <tr>
    <td width="25%"><img src="../img/Liberty_Cap_Half_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Liberty Cap (1793-1797)</td>
    <td width="40%"><select class="form-control" id="select7" name="select8" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
<?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Liberty Cap Half Cent' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="19%" align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Liberty_Cap_Half_Cent">Add Multiple</a></td>
    <td width="16%" align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Liberty_Cap_Half_Cent">Checklist</a></td>
  </tr>
  <tr>
    <td><img src="../img/Draped_Bust_Half_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Draped Bust (1800-1808)</td>
    <td><select class="form-control" id="select3" name="select3" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Draped Bust Half Cent' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Draped_Bust_Half_Cent">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Draped_Bust_Half_Cent">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Classic_Head_Half_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Classic Head (1809-1836)    </td>
    <td><select class="form-control" id="select2" name="select2" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Draped Bust Half Cent' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Classic_Head_Half_Cent">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Classic_Head_Half_Cent">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Braided_Hair_Half_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Braided Hair (1840-1857)</td>
    <td><select class="form-control" id="select" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Braided_Hair_Half_Cent')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Braided_Hair_Half_Cent">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Braided_Hair_Half_Cent">Checklist</a></td>
    </tr>
</table>
</div>
<h3>Large Cents</h3>
<div class="table-responsive">  
<table width="100%" border="0" class="table table-hover" id="new-coin-selects-tbl">    
  <tr>
    <td width="25%"><img src="../img/Flowing_Hair_Large_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Flowing Hair (1793)</td>
    <td width="40%"><select class="form-control" id="select10" name="select10" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Flowing_Hair_Large_Cent')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="19%" align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Flowing_Hair_Large_Cent">Add Multiple</a></td>
    <td width="16%" align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Flowing_Hair_Large_Cent">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Liberty_Cap_Large_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Liberty Cap (1793-1796)</td>
    <td><select class="form-control" id="select9" name="select9" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Liberty_Cap_Large_Cent')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Liberty_Cap_Large_Cent">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Liberty_Cap_Large_Cent">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Draped_Bust_Large_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Draped Bust (1796-1807)</td>
    <td><select class="form-control" id="select8" name="select7" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Draped_Bust_Large_Cent')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Draped_Bust_Large_Cent">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Draped_Bust_Large_Cent">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Classic_Head_Large_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Classic Head (1808-1814)</td>
    <td><select class="form-control" id="select6" name="select6" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Classic_Head_Large_Cent')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Classic_Head_Large_Cent">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Classic_Head_Large_Cent">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Coronet_Liberty_Head_Large_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Coronet Liberty Head (1816-1839)</td>
    <td><select class="form-control" id="select5" name="select5" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Coronet_Liberty_Head_Large_Cent')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Coronet_Liberty_Head_Large_Cent">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Coronet_Liberty_Head_Large_Cent">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Braided_Hair_Liberty_Head_Large_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Braided Hair (1839-1857)</td>
    <td><select class="form-control" id="select4" name="select4" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Braided_Hair_Liberty_Head_Large_Cent')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Checklist</a></td>
    </tr>
    </table>
    </div>
<h3>Small Cent</h3>    
<div class="table-responsive">  
<table width="100%" border="0" class="table table-hover" id="new-coin-selects-tbl">    
  <tr>
    <td width="25%"><img src="../img/Flying_Eagle.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Flying Eagle (1856-1858)</td>
    <td width="40%"><select class="form-control" id="select16" name="select16" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Flying_Eagle')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="18%" align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Flying_Eagle">Add Multiple</a></td>
    <td width="17%" align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Flying_Eagle">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Indian_Head.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Indian Head (1859-1909)</td>
    <td><select class="form-control" id="select15" name="select15" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Indian_Head')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Indian_Head">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Indian_Head">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Lincoln_Wheat.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Lincoln Wheat (1909-1958)</td>
    <td><select class="form-control" id="select14" name="select14" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Lincoln_Wheat')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Lincoln_Wheat">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Lincoln_Wheat">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Lincoln_Memorial.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Lincoln Memorial (1959-2008)</td>
    <td><select class="form-control" id="select13" name="select13" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Lincoln_Memorial')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Lincoln_Memorial">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Lincoln_Memorial">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Lincoln_Bicentennial.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Lincoln Bicentennial (2009)</td>
    <td><select class="form-control" id="select12" name="select12" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Lincoln_Bicentennial')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Lincoln_Bicentennial">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Lincoln_Bicentennial">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Union_Shield.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Union Shield (2010-Present)</td>
    <td><select class="form-control" id="select11" name="select11" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Union_Shield')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Union_Shield">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Union_Shield">Checklist</a></td>
    </tr>
        </table>
    </div>
<h3>Two Cent</h3>    
<div class="table-responsive">  
<table width="100%" border="0" class="table table-hover" id="new-coin-selects-tbl">   
  <tr>
    <td width="25%"><img src="../img/Two_Cent_Piece.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Two Cent (1864-1873)</td>
    <td width="40%"><select class="form-control" id="select17" name="select17" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Two_Cent_Piece')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="16%" align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Two_Cent_Piece">Add Multiple</a></td>
    <td width="19%" align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Two_Cent_Piece">Checklist</a></td>
    </tr>
        </table>
    </div>
 <h3>Three Cent</h3>   
<div class="table-responsive">  
<table width="100%" border="0" class="table table-hover" id="new-coin-selects-tbl">   
  <tr>
    <td width="25%"><img src="../img/Silver_Three_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Three Cent Silver</td>
    <td width="40%"><select class="form-control" id="select18" name="select18" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Silver_Three_Cent')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="15%" align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Silver_Three_Cent">Add Multiple</a></td>
    <td width="20%" align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Silver_Three_Cent">Checklist</a></td>
  </tr>
  <tr>
    <td><img src="../img/Nickel_Three_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Three Cent Nickel</td>
    <td><select class="form-control" id="select19" name="select19" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Nickel_Three_Cent')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Nickel_Three_Cent">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Nickel_Three_Cent">Checklist</a></td>
  </tr>
      </table>
    </div>
<h3>Half Dime</h3>    
<div class="table-responsive">  
<table width="100%" border="0" class="table table-hover" id="new-coin-selects-tbl">   
  <tr>
    <td width="25%"><img src="../img/Flowing_Hair_Half_Dime.jpg" width="250" height="250" alt="Flowing_Hair_Half_Dime" /> Flowing Hair (1794-1795)</td>
    <td width="40%"><select class="form-control" id="select62" name="select62" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Flowing_Hair_Half_Dime')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="17%" align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Flowing_Hair_Half_Dime">Add Multiple</a></td>
    <td width="18%" align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Flowing_Hair_Half_Dime">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Draped_Bust_Half_Dime.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Draped Bust (1796-1805)</td>
    <td><select class="form-control" id="select61" name="select61" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Draped_Bust_Half_Dime')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Draped_Bust_Half_Dime">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Draped_Bust_Half_Dime">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Liberty_Cap_Half_Dime.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Liberty Cap (1829-1837)</td>
    <td><select class="form-control" id="select60" name="select60" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Liberty_Cap_Half_Dime')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Liberty_Cap_Half_Dime">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Liberty_Cap_Half_Dime">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Seated_Liberty_Half_Dime.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Seated Liberty (1837-1873)</td>
    <td><select class="form-control" id="select59" name="select59" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Seated_Liberty_Half_Dime')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Seated_Liberty_Half_Dime">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Seated_Liberty_Half_Dime">Checklist</a></td>
    </tr>
        </table>
    </div>
<h3>Nickel<a name="nickel" id="Nickel"></a></h3>    
<div class="table-responsive">  
<table width="100%" border="0" class="table table-hover" id="new-coin-selects-tbl">   
  <tr>
    <td width="25%"><img src="../img/Shield_Nickel.jpg" width="250" height="250" alt="Shield_Nickel" />   Shield (1866-1883)</td>
    <td width="40%"><select class="form-control" id="select58" name="select58" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Shield_Nickel')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="18%" align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Shield_Nickel">Add Multiple</a></td>
    <td width="17%" align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Shield_Nickel">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Liberty_Head_Nickel.jpg" width="250" height="250" alt="Liberty_Head_Nickel" /> Liberty Head (1883-1913)</td>
    <td><select class="form-control" id="select57" name="select57" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Liberty_Head_Nickel')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Liberty_Head_Nickel">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Liberty_Head_Nickel">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Indian_Head_Nickel.jpg" width="250" height="250" alt="Indian_Head_Nickel" /> Indian Head (1913-1938)</td>
    <td><select class="form-control" id="select56" name="select56" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Indian_Head_Nickel')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Indian_Head_Nickel">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Indian_Head_Nickel">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Jefferson_Nickel.jpg" width="250" height="250" alt="Jefferson_Nickel" /> Jefferson (1938-2003)</td>
    <td><select class="form-control" id="select55" name="select55" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Jefferson_Nickel')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Jefferson_Nickel">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Jefferson_Nickel">Checklist</a></td>
    </tr>
      <tr>
    <td><img src="../img/Westward_Journey.jpg" width="250" height="250" alt="Westward_Journey" /> Westward Journey (2004-2005)</td>
    <td><select class="form-control" id="select54" name="select54" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Westward_Journey')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Westward_Journey">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Westward_Journey">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Return_to_Monticello.jpg" width="250" height="250" alt="Return_to_Monticello" /> Return to Monticello (2006-)</td>
    <td><select class="form-control" id="select53" name="select53" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Return_to_Monticello')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Return_to_Monticello">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Return_to_Monticello">Checklist</a></td>
    </tr>
        </table>
    </div>
<h3>Dime<a name="dime"></a></h3>    
<div class="table-responsive">  
<table width="100%" border="0" class="table table-hover" id="new-coin-selects-tbl">   
    <tr>
      <td width="25%"><img src="../img/Draped_Bust_Dime.jpg" width="250" height="250" alt="Draped_Bust_Dime" /> Draped Bust (1796-1807)</td>
      <td width="40%"><select class="form-control" id="select52" name="select52" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
        <option selected="selected" value="addCoinRaw.php">Select Year</option>
        <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Draped_Bust_Dime')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
      </select></td>
      <td width="17%" align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Draped_Bust_Dime">Add Multiple</a></td>
      <td width="18%" align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Draped_Bust_Dime">Checklist</a></td>
    </tr>
    <tr>
      <td><img src="../img/Liberty_Cap_Dime.jpg" width="250" height="250" alt="Liberty_Cap_Dime" /> Liberty Cap (1809-1837)</td>
      <td><select class="form-control" id="select51" name="select51" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
        <option selected="selected" value="addCoinRaw.php">Select Year</option>
        <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Liberty_Cap_Dime')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
      </select></td>
      <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Liberty_Cap_Dime">Add Multiple</a></td>
      <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Liberty_Cap_Dime">Checklist</a></td>
    </tr>
    <tr>
      <td><img src="../img/Seated_Liberty_Dime.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Liberty Seated (1837-1873)</td>
      <td><select class="form-control" id="select50" name="select50" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
        <option selected="selected" value="addCoinRaw.php">Select Year</option>
        <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Seated_Liberty_Dime')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
      </select></td>
      <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Seated_Liberty_Dime">Add Multiple</a></td>
      <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Seated_Liberty_Dime">Checklist</a></td>
    </tr>
    <tr>
      <td><img src="../img/Barber_Dime.jpg" width="250" height="250" alt="Barber_Dime" /> Barber (1892-1916)</td>
      <td><select class="form-control" id="select49" name="select49" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
        <option selected="selected" value="addCoinRaw.php">Select Year</option>
        <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Barber_Dime')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
      </select></td>
      <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Barber_Dime">Add Multiple</a></td>
      <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Barber_Dime">Checklist</a></td>
    </tr>
    <tr>
      <td><img src="../img/Winged_Liberty_Dime.jpg" width="250" height="250" alt="Winged_Liberty_Dime" /> Winged Liberty (1916-1945)</td>
      <td><select class="form-control" id="select48" name="select48" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
        <option selected="selected" value="addCoinRaw.php">Select Year</option>
        <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Winged_Liberty_Dime')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
      </select></td>
      <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Winged_Liberty_Dime">Add Multiple</a></td>
      <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Winged_Liberty_Dime">Checklist</a></td>
    </tr>
    <tr>
      <td><img src="../img/Roosevelt_Dime.jpg" width="250" height="250" alt="Roosevelt_Dime" /> Roosevelt (1946-Present)</td>
      <td><select class="form-control" id="select47" name="select47" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
        <option selected="selected" value="addCoinRaw.php">Select Year</option>
        <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Roosevelt_Dime')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
      </select></td>
      <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Roosevelt_Dime">Add Multiple</a></td>
      <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Roosevelt_Dime">Checklist</a></td>
    </tr>
        </table>
    </div>
<h3>Twenty Cents<a name="twenty"></a></h3>    
<div class="table-responsive">  
<table width="100%" border="0" class="table table-hover" id="new-coin-selects-tbl">   
  <tr>
    <td width="25%"><img src="../img/Twenty_Cent_Piece.jpg" width="250" height="250" alt="Flowing_Hair_Half_Dime" /> 20 Cent Piece (1875-1878)</td>
    <td width="40%"><select class="form-control" id="select46" name="select46" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Twenty_Cent_Piece')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="19%" align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Twenty_Cent_Piece">Add Multiple</a></td>
    <td width="16%" align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Twenty_Cent_Piece">Checklist</a></td>
    </tr>
        </table>
    </div>
<h3>Quarter<a name="quarter"></a></h3>    
<div class="table-responsive">  
<table width="100%" border="0" class="table table-hover" id="new-coin-selects-tbl">   
  <tr>
    <td width="25%"><img src="../img/Draped_Bust_Quarter.jpg" width="250" height="250" alt="Draped_Bust_Quarter" /> Draped Bust (1796-1807)</td>
    <td width="39%"><select class="form-control" id="select44" name="select44" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Draped_Bust_Quarter')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="20%" align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Draped_Bust_Quarter">Add Multiple</a></td>
    <td width="16%" align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Draped_Bust_Quarter">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Capped_Bust_Quarter.jpg" width="250" height="250" alt="Capped_Bust_Quarter" /> Capped Bust (1815-1837)</td>
    <td><select class="form-control" id="select45" name="select45" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Capped_Bust_Quarter')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Capped_Bust_Quarter">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Capped_Bust_Quarter">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Seated_Liberty_Quarter.jpg" width="250" height="250" alt="Seated_Liberty_Quarter" /> Liberty Seated (1838-1891)</td>
    <td><select class="form-control" id="select43" name="select43" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Seated_Liberty_Quarter')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Seated_Liberty_Quarter">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Seated_Liberty_Quarter">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Barber_Quarter.jpg" width="250" height="250" alt="Barber_Quarter" /> Barber (1892-1916)</td>
    <td><select class="form-control" id="select42" name="select42" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Barber_Quarter')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Barber_Quarter">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Barber_Quarter">Checklist</a></td>
    </tr>
   <tr>
    <td><img src="../img/Standing_Liberty.jpg" width="250" height="250" alt="Standing_Liberty" /> Standing Liberty (1916-1930)</td>
    <td><select class="form-control" id="select41" name="select41" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Standing_Liberty')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Standing_Liberty">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Standing_Liberty">Checklist</a></td>
    </tr>
      <tr>
    <td><img src="../img/Washington_Quarter.jpg" width="250" height="250" alt="Washington_Quarter" /> Washington (1931-1998)</td>
    <td><select class="form-control" id="select40" name="select40" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Washington_Quarter')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Washington_Quarter">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Washington_Quarter">Checklist</a></td>
    </tr>
      <tr>
    <td><img src="../img/State_Quarter.jpg" width="250" height="250" alt="State_Quarter" /> Statehood (1999-2008)</td>
    <td><select class="form-control" id="select39" name="select39" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'State_Quarter')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=State_Quarter">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=State_Quarter">Checklist</a></td>
    </tr>
      <tr>
    <td><img src="../img/District_of_Columbia_and_US_Territories.jpg" width="250" height="250" alt="District_of_Columbia_and_US_Territories" /> D.C. and U. S. Territories (2009)</td>
    <td><select class="form-control" id="select38" name="select38" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'District_of_Columbia_and_US_Territories')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=District_of_Columbia_and_US_Territories">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=District_of_Columbia_and_US_Territories">Checklist</a></td>
    </tr>
      <tr>
    <td><img src="../img/America_the_Beautiful_Quarter.jpg" width="250" height="250" alt="America_the_Beautiful_Quarter" /> America the Beautiful (2010-2021)</td>
    <td><select class="form-control" id="select37" name="select37" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'America_the_Beautiful_Quarter')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=America_the_Beautiful_Quarter">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=America_the_Beautiful_Quarter">Checklist</a></td>
    </tr>
        </table>
    </div>
    <h3>Half Dollar<a name="halfDollar"></a></h3>
<div class="table-responsive">  
<table width="100%" border="0" class="table table-hover" id="new-coin-selects-tbl">   
<td width="25%"><img src="../img/Flowing_Hair_Half_Dollar.jpg" width="250" height="250" alt="Flowing_Hair_Half_Dollar" /> Flowing Hair (1794-1795)</td>
    <td width="40%"><select class="form-control" id="select36" name="select36" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Flowing_Hair_Half_Dollar')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="18%" align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Flowing_Hair_Half_Dollar">Add Multiple</a></td>
    <td width="17%" align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Flowing_Hair_Half_Dollar">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Draped_Bust_Half_Dollar.jpg" width="250" height="250" alt="Draped_Bust_Half_Dollar" /> Draped Bust (1796-1807)</td>
    <td><select class="form-control" id="select35" name="select35" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Draped_Bust_Half_Dollar')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Draped_Bust_Half_Dollar">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Draped_Bust_Half_Dollar">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Liberty_Cap_Half_Dollar.jpg" width="250" height="250" alt="Liberty_Cap_Half_Dollar" /> Liberty Cap (1807-1839)</td>
    <td><select class="form-control" id="select34" name="select34" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Liberty_Cap_Half_Dollar')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Liberty_Cap_Half_Dollar">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Liberty_Cap_Half_Dollar">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Seated_Liberty_Half_Dollar.jpg" width="250" height="250" alt="Seated_Liberty_Half_Dollar" /> Seated Liberty (1839-1891)</td>
    <td><select class="form-control" id="select33" name="select33" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Seated_Liberty_Half_Dollar')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Seated_Liberty_Half_Dollar">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Seated_Liberty_Half_Dollar">Checklist</a></td>
    </tr>
   <tr>
    <td><img src="../img/Barber_Half_Dollar.jpg" width="250" height="250" alt="Barber_Half_Dollar" /> Barber (1892-1916)</td>
    <td><select class="form-control" id="select32" name="select32" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Barber_Half_Dollar')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Barber_Half_Dollar">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Barber_Half_Dollar">Checklist</a></td>
    </tr>
      <tr>
    <td><img src="../img/Walking_Liberty.jpg" width="250" height="250" alt="Walking_Liberty" /> Walking Liberty (1916-1947)</td>
    <td><select class="form-control" id="select31" name="select31" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Walking_Liberty')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Walking_Liberty">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Walking_Liberty">Checklist</a></td>
    </tr>
      <tr>
    <td><img src="../img/Franklin_Half_Dollar.jpg" width="250" height="250" alt="Franklin_Half_Dollar" /> Franklin (1948-1963)</td>
    <td><select class="form-control" id="select30" name="select30" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Franklin_Half_Dollar')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Franklin_Half_Dollar">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Franklin_Half_Dollar">Checklist</a></td>
    </tr>
      <tr>
    <td><img src="../img/Kennedy_Half_Dollar.jpg" width="250" height="250" alt="Kennedy_Half_Dollar" /> Kennedy (1964-Present)</td>
    <td><select class="form-control" id="select20" name="select20" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Kennedy_Half_Dollar')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Kennedy_Half_Dollar">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Kennedy_Half_Dollar">Checklist</a></td>
    </tr>
        </table>
    </div>
   <h3>Dollar<a name="dollar"></a></h3> 
<div class="table-responsive">  
<table width="100%" border="0" class="table table-hover" id="new-coin-selects-tbl">   
  <tr>
    <td width="24%"><img src="../img/Flowing_Hair_Dollar.jpg" width="250" height="250" alt="Flowing_Hair_Dollar" /> Flowing Hair (1794-1795)</td>
    <td width="41%"><select class="form-control" id="select64" name="select64" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Flowing_Hair_Dollar')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="19%" align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Flowing_Hair_Dollar">Add Multiple</a></td>
    <td width="16%" align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Flowing_Hair_Dollar">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Draped_Bust_Dollar.jpg" width="250" height="250" alt="Draped_Bust_Dollar" /> Draped Bust (1795-1804)</td>
    <td><select class="form-control" id="select63" name="select63" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Draped_Bust_Dollar')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Draped_Bust_Dollar">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Draped_Bust_Dollar">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Gobrecht_Dollar.jpg" width="250" height="250" alt="Gobrecht_Dollar" /> Gobrecht (1836-1839)</td>
    <td><select class="form-control" id="select29" name="select29" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Gobrecht_Dollar')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Gobrecht_Dollar">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Gobrecht_Dollar">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Seated_Liberty_Dollar.jpg" width="250" height="250" alt="Seated_Liberty_Dollar" /> Seated Liberty (1836-1873)</td>
    <td><select class="form-control" id="select28" name="select28" onChange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Seated_Liberty_Dollar')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Seated_Liberty_Dollar">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Seated_Liberty_Dollar">Checklist</a></td>
  </tr>
  <tr>
    <td><img src="../img/Trade_Dollar.jpg" width="250" height="250" alt="Trade_Dollar" /> Trade (1892-1916)</td>
    <td><select class="form-control" id="select27" name="select27" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Trade_Dollar')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Trade_Dollar">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Trade_Dollar">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Morgan_Dollar.jpg" width="250" height="250" alt="Morgan_Dollar" /> Morgan (1878-1904, 1921)</td>
    <td><select class="form-control" id="select26" name="select26" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Morgan_Dollar')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Morgan_Dollar">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Morgan_Dollar">Checklist</a></td>
  </tr>
  <tr>
    <td><img src="../img/Peace_Dollar.jpg" width="250" height="250" alt="Peace_Dollar" /> Peace (1921-1928, 1934, 1935)</td>
    <td><select class="form-control" id="select25" name="select25" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Peace_Dollar')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Peace_Dollar">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Peace_Dollar">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Eisenhower_Dollar.jpg" width="250" height="250" alt="Eisenhower_Dollar" /> Eisenhower (1971-1978)</td>
    <td><select class="form-control" id="select24" name="select24" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Eisenhower_Dollar')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Eisenhower_Dollar">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Eisenhower_Dollar">Checklist</a></td>
  </tr>
  <tr>
    <td><img src="../img/Susan_B_Anthony_Dollar.jpg" width="250" height="250" alt="Susan_B_Anthony_Dollar" /> Susan B Anthony (1979–1981, 1999)</td>
    <td><select class="form-control" id="select23" name="select23" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Susan_B_Anthony_Dollar')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Susan_B_Anthony_Dollar">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Susan_B_Anthony_Dollar">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Sacagawea_Dollar.jpg" width="250" height="250" alt="Sacagawea_Dollar" /> Sacagawea (2000-Present)</td>
    <td><select class="form-control" id="select22" name="select22" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Sacagawea_Dollar')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Sacagawea_Dollar">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Sacagawea_Dollar">Checklist</a></td>
    </tr>
  <tr>
    <td><img src="../img/Presidential_Dollar.jpg" width="250" height="250" alt="Presidential_Dollar" /> Presidential (2007-Present)</td>
    <td><select class="form-control" id="select21" name="select21" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', 'Presidential_Dollar')."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Presidential_Dollar">Add Multiple</a></td>
    <td align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Presidential_Dollar">Checklist</a></td>
    </tr>
</table>  
</div>  
<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>