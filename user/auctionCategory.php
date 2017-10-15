<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['coinCategory'])) { 
$coinCategory = strip_tags(str_replace('_', ' ', $_GET['coinCategory']));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinName ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#collectTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );
});
</script> 
<style type="text/css">
.tdHeight {padding:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h3><?php echo $coinCategory ?> Coins For Sale</h3>

<table width="100%" border="0">
  <tr class="darker">
    <td width="55%">Coin</td>
    <td width="11%">Grade</td>   
        <td width="10%">Grader</td>  
    <td width="13%">Sale Price</td>

  </tr>
<?php 
$coinQuery2 = mysql_query("SELECT * FROM selllist WHERE coinCategory = '$coinCategory' AND sellStatus = 'Active' ORDER BY sellListID DESC") or die(mysql_error());

if(mysql_num_rows($coinQuery2) == 0){
	  echo '
		  <tr>
		  <td colspan="5">There are no '.$coinCategory.' coins currently for sale.</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($coinQuery2))
  {
  $coinType = $row['coinType'];
  
  if($row['coinPic1'] == 'blankBig.jpg'){
	  $thumb = '<img src="../img/1.jpg" width="25" height="25" />';
  } else {
	  $thumb = '<img src="'.$userID.'/'.$row['coinPic1'].'" width="auto" height="25" />';
  }
  $sellListID = intval($row['sellListID']); 
  $sellTitle = $row['sellTitle']; 
  $listDate = date("F j, Y",strtotime($row["listDate"]));
  $coinGrade = $row['coinGrade']; 
  $listPrice = $row['listPrice'];  
  $proService = $row['proService'];  
  echo '
<tr>
<td><a href="viewAuctionDetail.php?sellListID='.$sellListID.'">'.$sellTitle.'</a></td> 
<td>'.$coinGrade.'</td>
<td>'.$proService.'</td>
<td>'.$listPrice.'</td>
</tr>  
  ';
  }
}
?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<p>
  <a href="subCollect.php?collectionID=<?php echo $collectionID ?>">Add To a Collection</a> | <a href="sellList.php?collectionID=<?php echo $collectionID ?>">Add to Sell List</a></p>


<p><a href="addCoinType.php?coinType=<?php echo $coinLink ?>">Add Another <?php echo $coinType ?></a></p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>