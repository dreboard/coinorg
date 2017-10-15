<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>User Guide</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>User Guide</h1>
<form method="post" action="help_search.php" class="compactForm" id="helpForm"><input name="keywords" id="keywords"><input value="Find Help Files" name="helpBtn" id="helpBtn" type="submit"><br>
</form>
<ul>
<li id="centLink"><a href="coins.php?page=Cents"><strong>Coins</strong></a>
  <ul>
<li><a href="help_files.php?type=saving_coins">Saving</a></li>
<li><a href="help_files.php?type=manage_coins">Managing</a></li>
<li><a href="help_files.php?type=deleting_coins">Removing</a>
<ol>
<li><a href="help_files.php?type=deleting_coins#option0">Deleting Coins (Individual)</a></li>
<li><a href="help_files.php?type=deleting_coins#option1">Deleting Coins (Bulk) Option 1</a></li>
<li><a href="help_files.php?type=deleting_coins#option2">Deleting Coins (Bulk) Option 2</a></li>
</ol>
</li>
<li><a href="help_files.php?type=view_coins">Viewing</a></li>
<li><a href="help_files.php?type=edit_coins">Editing</a></li>
</ul>        
</li>
<li id="nickelLink"><a href="coins.php?page=Nickels"><strong>Folder</strong></a>
<ul>
<li><a href="help_files.php?type=saving_folders">Saving</a></li>
<li><a href="help_files.php?type=manage_folders">Managing</a></li>
<li><a href="help_files.php?type=remove_folder">Removing</a></li>
</ul>        
</li>
<li id="dimeLink"><a href="coins.php?page=Dimes"><strong>Sets</strong></a>
  <ul>

    <li><a href="help_files.php?type=Union_Shield">Saving</a></li>
    <li><a href="help_files.php?type=Lincoln_Bicentennial">Managing</a></li>
    <li><a href="help_files.php?type=remove_folder">Removing</a></li>
</ul>        
</li>
<li id="quarterLink"><a href="coins.php?page=Quarters"><strong>Rolls</strong></a>
  <ul>

    <li><a href="help_files.php?type=Union_Shield">Saving</a></li>
    <li><a href="help_files.php?type=Lincoln_Bicentennial">Managing</a></li>
    <li><a href="help_files.php?type=remove_folder">Removing</a></li>
</ul>        
</li>
<li id="halfLink"><a href="coins.php?page=Halves"><strong>First Day</strong></a>
  <ul>

    <li><a href="help_files.php?type=Union_Shield">Saving</a></li>
    <li><a href="help_files.php?type=Lincoln_Bicentennial">Managing</a></li>
    <li><a href="help_files.php?type=remove_folder">Removing</a></li>
</ul>        
</li>
<li id="dollarLink"><a href="coins.php?page=Dollars"><strong>Bulk Coins</strong></a>
  <ul>
<li><a href="help_files.php?type=Union_Shield">Collections</a></li>
<li><a href="help_files.php?type=Lincoln_Bicentennial">Lots</a></li>
<li><a href="help_files.php?type=Lincoln_Memorial">Bags</a></li>
</ul>        
</li>
<li><a href="#" title="Nav Link 1"><strong>My Collection</strong></a>
<ul>
<li><a href="help_files.php?type=Union_Shield">View Collection</a></li>
<li><a href="help_files.php?type=Lincoln_Bicentennial">Auction Designer</a></li>
<li><a href="report.php">Reports</a></li>
<li class="last"><a href="addCoin.php">Add A Coin</a></li>
</ul>        
</li>
<li><a href="#" title="Nav Link 1"><strong>General</strong></a>
<ul>
<li><a href="help_files.php?type=Union_Shield">Grading Guide</a></li>
<li><a href="help_files.php?type=Lincoln_Bicentennial">Key & Semi-Key Dates</a></li>
<li class="last"><a href="help_files.php?type=Lincoln_Memorial">Collectors Glossary</a></li>
</ul>        
</li>
</ul>

<br />

<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>