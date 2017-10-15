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
<title>Add Bullion Coin</title>
<?php include("../headItems.php"); ?>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container fill-height">

<h2>Add Bullion Coin</h2>

  <div class="row hidden-xs">
  <div class="col-xs-6">

  <div class="btn-group">
    <a role="button" class="btn btn-primary" href="addCoinRaw.php">Add Circulated Coin</a>
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

<div class="table-responsive visible-xs">
<table width="100%" class="table">
  <tr>
    <td><a role="button" class="btn btn-primary btn-block" href="addCoinRaw.php">Add Circulated Coin</a></td>
  </tr>
  <tr>
    <td>
    <a role="button" class="btn btn-primary btn-block" href="addCommemorative.php">Add Commemorative Coin</a></td>
  </tr>
  <tr>
    <td>
    <form action="addCoinTypeYear.php" class="form-inline  navbar-right" role="form" method="get">
<table width="100%" border="0">
  <tr>
    <td> <select name="century" class="form-control" id="century">
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
</select></td>
  </tr>
  <tr>
    <td><select name="theYear" class="form-control" id="theYear">
 <option selected value="00">00</option>
        <?php 
for ($num = 1; $num <= 99; $num++) {
if($num<10)
$day = "0$num"; // add the zero
else
$day = "$num"; // don't add the zero
echo "<option value=".$day.">".$day."</option>";
}
?></select>  </td>
  </tr>
  <tr>
    <td><button type="submit" class="btn btn-primary btn-block">Load Year</button>
</td>
  </tr>
</table>
</form>
  </td>
  </tr>
</table>
</div>


<h3 class="clearfix"><img src="../img/Silver_American_Eagle.jpg" width="30" height="30" align="left" />&nbsp;Silver American Eagle</h3>
<div class="table-responsive">  
<table class="table table-hover" id="new-coin-selects-tbl">
  <tr>
    <td width="45%"> Silver American Eagle (1986-Present)</td>
    <td width="20%"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
<?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Silver American Eagle' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="19%" align="center"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Silver_American_Eagle">Add Multiple</a></td>
    <td width="16%" align="center"><a role="button" class="btn btn-default" href="viewList.php?coinType=Silver_American_Eagle">Checklist</a></td>
  </tr>
</table>
</div>










<h3 class="clearfix"><img src="../img/Tenth_Ounce_Gold.jpg" alt="Liberty_Cap_Half_Cent" width="30" height="30" align="left" />  &nbsp;Gold American Eagle</h3>
<div class="table-responsive">  
<table class="table table-hover" id="new-coin-selects-tbl">
  <tr>
    <td width="32%">      $5 Tenth Ounce</td>
    <td width="21%"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Tenth Ounce Gold' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="19%"><a href="addCoinTypeMulti.php?coinType=Tenth_Ounce_Gold" role="button" class="btn btn-default">Add Multiple</a></td>
    <td width="28%"><a href="viewList.php?coinType=Tenth_Ounce_Gold" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
  <tr>
    <td> $10 Quarter Ounce</td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Quarter Ounce Gold' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=Quarter_Ounce_Gold" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Quarter_Ounce_Gold" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
  <tr>
    <td>$25 Half Ounce</td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Half Ounce Gold' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=Half_Ounce_Gold" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Half_Ounce_Gold" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
  <tr>
    <td>
      $50 One Ounce</td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'One Ounce Gold' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=One_Ounce_Gold" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=One_Ounce_Gold" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
</table>
</div>

<h3 class="clearfix"><img src="../img/Tenth_Ounce_Platinum.jpg" alt="Liberty_Cap_Half_Cent" width="30" height="30" align="left" /> &nbsp;Platinum American Eagle</h3>
<div class="table-responsive">  
<table class="table table-hover" id="new-coin-selects-tbl">
  <tr>
    <td width="32%">  $10 Tenth Ounce</td>
    <td width="21%"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Tenth Ounce Platinum' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="19%"><a href="addCoinTypeMulti.php?coinType=Tenth_Ounce_Platinum" role="button" class="btn btn-default">Add Multiple</a></td>
    <td width="28%"><a href="viewList.php?coinType=Tenth_Ounce_Platinum" role="button" class="btn btn-default">View Check List</a></td>
  </tr>
  <tr>
    <td> $25 Quarter Ounce</td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Quarter Ounce Platinum' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=Quarter_Ounce_Platinum" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Quarter_Ounce_Platinum" role="button" class="btn btn-default">View Check List</a></td>
  </tr>
  <tr>
    <td>$50 Half Ounce</td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Half Ounce Platinum' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=Half_Ounce_Platinum" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Half_Ounce_Platinum" role="button" class="btn btn-default">View Check List</a></td>
  </tr>
  <tr>
    <td> $100 One Ounce</td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'One Ounce Platinum' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=One_Ounce_Platinum" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=One_Ounce_Platinum" role="button" class="btn btn-default">View Check List</a></td>
  </tr>
</table>
</div>

<h3 class="clearfix"><img src="../img/Tenth_Ounce_Gold.jpg" alt="Liberty_Cap_Half_Cent" width="30" height="30" align="left" /> &nbsp;Gold Dollars</h3>
<div class="table-responsive">  
<table class="table table-hover" id="new-coin-selects-tbl">
  <tr>
    <td width="33%"> Liberty Head (1849-1854)</td>
    <td width="22%"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Liberty Head Gold Dollar' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="20%"><a href="addCoinTypeMulti.php?coinType=Liberty_Head_Gold_Dollar" role="button" class="btn btn-default">Add Multiple</a></td>
    <td width="25%"><a href="viewList.php?coinType=Liberty_Head_Gold_Dollar" role="button" class="btn btn-default">View Check List</a></td>
  </tr>
  <tr>
    <td>Indian Princess (1854-1889)</td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Indian Princess Gold Dollar' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=Indian_Princess_Gold_Dollar" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Indian_Princess_Gold_Dollar" role="button" class="btn btn-default">View Check List</a></td>
  </tr>
</table>
</div>

<h3 class="clearfix"><img src="../img/Tenth_Ounce_Gold.jpg" alt="Liberty_Cap_Half_Cent" width="30" height="30" align="left" /> &nbsp;$2.50 Quarter Eagle</h3>
<div class="table-responsive">  
<table class="table table-hover" id="new-coin-selects-tbl">
  <tr>
    <td width="35%">Liberty Cap (1796-1807)</td>
    <td width="22%"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Liberty Cap Quarter Eagle' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="18%"><a href="addCoinTypeMulti.php?coinType=Liberty_Cap_Quarter_Eagle" role="button" class="btn btn-default">Add Multiple</a></td>
    <td width="25%"><a href="viewList.php?coinType=Liberty_Cap_Quarter_Eagle" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
  <tr>
    <td>Turban Head (1808-1834) </td>
    <td><select name="select4" class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Turban Head Quarter Eagle' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=Turban_Head_Quarter_Eagle" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Turban_Head_Quarter_Eagle" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
  <tr>
    <td>Liberty Head (1834-1839) </td>
    <td><select name="select5" class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Liberty Head Quarter Eagle' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=Liberty_Head_Quarter_Eagle" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Liberty_Head_Quarter_Eagle" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
  <tr>
    <td>Coronet Head (1840-1907) </td>
    <td><select name="select6" class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Coronet Head Quarter Eagle' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=Coronet_Head_Quarter_Eagle" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Coronet_Head_Quarter_Eagle" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
      <tr>
    <td>Indian Head (1908-1929) </td>
    <td><select name="select7" class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Indian Head Quarter Eagle' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=Indian_Head_Quarter_Eagle" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Indian_Head_Quarter_Eagle" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
</table>
</div>

<h3 class="clearfix"><img src="../img/Indian_Princess_Three_Dollar.jpg" alt="Indian_Princess_Three_Dollar" width="30" height="30" align="left" /> &nbsp;Three Dollar</h3>
<div class="table-responsive">  
<table class="table table-hover" id="new-coin-selects-tbl">
    <tr>
      <td width="35%">Indian Princess (1854-1889) </td>
      <td width="23%"><select name="select8" class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
        <option selected="selected" value="addCoinRaw.php">Select Year</option>
        <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Indian Princess Three Dollar' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
      </select></td>
      <td width="17%"><a href="addCoinTypeMulti.php?coinType=Indian_Princess_Three_Dollar" role="button" class="btn btn-default">Add Multiple</a></td>
      <td width="25%"><a href="viewList.php?coinType=Indian_Princess_Three_Dollar" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
</table>
</div>


<h3 class="clearfix"><img src="../img/Four_Dollar_Stella.jpg" alt="Liberty_Cap_Half_Cent" width="30" height="30" align="left" /> &nbsp;Four Dollar</h3>
<div class="table-responsive">  
<table class="table table-hover" id="new-coin-selects-tbl">
  <tr>
    <td width="35%">Four Dollar Stella (1879-1880) </td>
    <td width="23%"><select name="select9" class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Four Dollar Stella' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="18%"><a href="addCoinTypeMulti.php?coinType=Four_Dollar_Stella" role="button" class="btn btn-default">Add Multiple</a></td>
    <td width="24%"><a href="viewList.php?coinType=Four_Dollar_Stella" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
</table>
</div>

<h3 class="clearfix"><img src="../img/Tenth_Ounce_Gold.jpg" alt="Liberty_Cap_Half_Cent" width="30" height="30" align="left" /> &nbsp;Five Dollar</h3>
<div class="table-responsive">  
<table class="table table-hover" id="new-coin-selects-tbl">
  <tr>
    <td width="35%">Capped Liberty (1795-1807) </td>
    <td width="23%"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Liberty Cap Half Eagle' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="17%"><a href="addCoinTypeMulti.php?coinType=Liberty_Cap_Half_Eagle" role="button" class="btn btn-default">Add Multiple</a></td>
    <td width="25%"><a href="viewList.php?coinType=Liberty_Cap_Half_Eagle" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
  <tr>
    <td>Turban Head (1808-1834) </td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Turban Head Half Eagle' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=Turban_Head_Half_Eagle" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Turban_Head_Half_Eagle" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
  <tr>
    <td>Liberty Head (1834-1839) </td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Liberty Head Half Eagle' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=Liberty_Head_Half_Eagle" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Liberty_Head_Half_Eagle" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
  <tr>
    <td>Coronet Head (1840-1907) </td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Coronet Head Half Eagle' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=Coronet_Head_Half_Eagle" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Coronet_Head_Half_Eagle" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
   <tr>
    <td>Indian Head (1908-1929) </td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Indian Head Half Eagle' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=Indian_Head_Half_Eagle" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Indian_Head_Half_Eagle" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
</table>
</div>

<h3 class="clearfix"><img src="../img/Tenth_Ounce_Gold.jpg" alt="Liberty_Cap_Half_Cent" width="30" height="30" align="left" /> &nbsp;Ten Dollars</h3>
<div class="table-responsive">  
<table class="table table-hover" id="new-coin-selects-tbl">
<tr>
  <td width="35%">Capped Liberty (1795-1804) </td>
  <td width="23%"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
    <option selected="selected" value="addCoinRaw.php">Select Year</option>
    <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Liberty Cap Eagle' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
  </select></td>
    <td width="20%"><a href="addCoinTypeMulti.php?coinType=Liberty_Cap_Eagle" role="button" class="btn btn-default">Add Multiple</a></td>
    <td width="22%"><a href="viewList.php?coinType=Liberty_Cap_Eagle" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
  <tr>
    <td>Coronet Head (1838-1907) </td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Coronet Head Eagle' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=Coronet_Head_Eagle" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Coronet_Head_Eagle" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
  <tr>
    <td>Indian Head (1907-1933) </td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Indian Head Eagle' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=Indian_Head_Eagle" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Indian_Head_Eagle" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
  <tr>
    <td>American Gold Eagle (2006-Present) </td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Quarter Ounce Gold' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=Quarter_Ounce_Gold" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Quarter_Ounce_Gold" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
   <tr>
    <td>First Spouse (2007-Present) </td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT coinID, coinName FROM coins WHERE coinType = 'First Spouse' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=First_Spouse" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=First_Spouse" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
      <tr>
    <td>American Buffalo (2008) </td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Quarter Ounce Buffalo' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a href="addCoinTypeMulti.php?coinType=Quarter_Ounce_Buffalo" role="button" class="btn btn-default">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Quarter_Ounce_Buffalo" role="button" class="btn btn-default">View Check List</a></td>
    </tr>
      <tr>
    <td>Platinum Eagle (2006-Present) </td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Tenth Ounce Platinum' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Tenth_Ounce_Platinum">Add Multiple</a></td>
    <td><a role="button" class="btn btn-default" href="viewList.php?coinType=Tenth_Ounce_Platinum">View Check List</a></td>
    </tr>
</table>
</div>

<h3 class="clearfix"><img src="../img/Tenth_Ounce_Gold.jpg" alt="Liberty_Cap_Half_Cent" width="30" height="30" align="left" /> &nbsp;Twenty Dollar</h3>
<div class="table-responsive">  
<table class="table table-hover" id="new-coin-selects-tbl">
  <tr>
    <td width="35%">Coronet Head (1849-1907) </td>
    <td width="23%"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Coronet Head Double Eagle' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="17%"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Coronet_Head_Double_Eagle">Add Multiple</a></td>
    <td width="25%"><a role="button" class="btn btn-default" href="viewList.php?coinType=Coronet_Head_Double_Eagle">View Check List</a></td>
    </tr>
  <tr>
    <td>Saint Gaudens (1907-1933) </td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Saint Gaudens Double Eagle' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Saint_Gaudens_Double_Eagle">Add Multiple</a></td>
    <td><a role="button" class="btn btn-default" href="viewList.php?coinType=Saint_Gaudens_Double_Eagle">View Check List</a></td>
    </tr>
</table>
</div>


<h3 class="clearfix"><img src="../img/Tenth_Ounce_Gold.jpg" alt="Liberty_Cap_Half_Cent" width="30" height="30" align="left" /> &nbsp;Twenty Five Dollar</h3>
<div class="table-responsive">  
<table class="table table-hover" id="new-coin-selects-tbl">
  <tr>
    <td width="35%">Quarter Ounce Platinum (1997-Present) </td>
    <td width="23%"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Quarter Ounce Platinum' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="20%"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Quarter_Ounce_Platinum">Add Multiple</a></td>
    <td width="22%"><a role="button" class="btn btn-default" href="viewList.php?coinType=Quarter_Ounce_Platinum">View Check List</a></td>
    </tr>
  <tr>
    <td>American Buffalo (2008-Present) </td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Half Ounce Buffalo' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Half_Ounce_Buffalo">Add Multiple</a></td>
    <td><a role="button" class="btn btn-default" href="viewList.php?coinType=Half_Ounce_Buffalo">View Check List</a></td>
    </tr>
  <tr>
    <td>American Eagle (1986-Present) </td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Half Ounce Gold' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Half_Ounce_Gold">Add Multiple</a></td>
    <td><a role="button" class="btn btn-default" href="viewList.php?coinType=Half_Ounce_Gold">View Check List</a></td>
    </tr>
</table>
</div>


<h3 class="clearfix"><img src="../img/Tenth_Ounce_Gold.jpg" alt="Liberty_Cap_Half_Cent" width="30" height="30" align="left" /> &nbsp;Fifty Dollar</h3>
<div class="table-responsive">  
<table class="table table-hover" id="new-coin-selects-tbl">
  <tr>
    <td width="35%">Half Ounce Platinum (1997-Present) </td>
    <td width="23%"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Quarter Ounce Platinum' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td width="20%"><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Quarter_Ounce_Platinum">Add Multiple</a></td>
    <td width="22%"><a role="button" class="btn btn-default" href="viewList.php?coinType=Quarter_Ounce_Platinum">View Check List</a></td>
    </tr>
  <tr>
    <td>American Buffalo (2008-Present) </td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'One Ounce Buffalo' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=One_Ounce_Buffalo">Add Multiple</a></td>
    <td><a role="button" class="btn btn-default" href="viewList.php?coinType=One_Ounce_Buffalo">View Check List</a></td>
    </tr>
  <tr>
    <td>American Eagle (1986-Present) </td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="addCoinRaw.php">Select Year</option>
      <?php 
$sql = mysql_query("SELECT * FROM coins WHERE coinType = 'Half Ounce Gold' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $row = mysql_fetch_assoc($sql)) {
		echo '<option value="addCoinByID.php?coinID='.$row['coinID'].'">'.$row['coinName'].'</option>';
	}	
?>
    </select></td>
    <td><a role="button" class="btn btn-default" href="addCoinTypeMulti.php?coinType=Half_Ounce_Gold">Add Multiple</a></td>
    <td><a role="button" class="btn btn-default" href="viewList.php?coinType=Half_Ounce_Gold">View Check List</a></td>
    </tr>
</table>
</div>  
<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>
