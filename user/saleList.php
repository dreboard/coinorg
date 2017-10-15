<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Coins For Sale</title>
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
.listPageImg {width:130px; height:auto;}
.itemListTbl h3 {margin:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h3>Coins For Sale</h3>

<?php 
$coinQuery2 = mysql_query("SELECT * FROM selllist WHERE sellStatus = 'Active' ORDER BY sellListID DESC") or die(mysql_error());

if(mysql_num_rows($coinQuery2) == 0){
	  echo '
		  <tr>
		  <td colspan="5">There are no '.$coinCategory.' coins currently for sale.</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($coinQuery2))
  {
  $coinType = $row['coinType'];
  $sellListID = intval($row['sellListID']); 
  $sellTitle = $row['sellTitle']; 
  $listDate = date("F j, Y",strtotime($row["listDate"]));
  $coinGrade = $row['coinGrade']; 
  $listPrice = $row['listPrice'];  
  $coinPic1 = $row['coinPic1'];  
  echo '
<table width="100%" border="0" class="itemListTbl">
  <tr>
    <td rowspan="4" width="140">
      <img src="'.$coinPic1.'" class="listPageImg" /></td>
    <td colspan="3"><h3><a href="saleDetail.php?sellListID='.$sellListID.'">'.$sellTitle.'</a></h3></td>
    <td width="200" align="right">$'.$listPrice.'</td>
  </tr>
  <tr>
    <td width="117" valign="top"><strong>Category</strong></td>
    <td width="200" valign="top">&nbsp;</td>
    <td width="321" rowspan="3">&nbsp;</td>
    <td rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">Listed</td>
    <td width="200" valign="top">'.$listDate.'</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td width="200" valign="top">&nbsp;</td>
  </tr>
</table>
  ';
  }
}
?>

<p>&nbsp;</p>

<table width="100%" border="0" class="itemListTbl">
  <tr>
    <td rowspan="4" width="140">
      <img src="'.$coinPic1.'" class="listPageImg" /></td>
    <td colspan="3"><h3><a href="saleDetail.php?sellListID='.$sellListID.'">'.$sellTitle.'</a></h3></td>
    <td width="200" align="right">'.$listPrice.'</td>
  </tr>
  <tr>
    <td width="117" valign="top"><strong>Category</strong></td>
    <td width="200" valign="top">&nbsp;</td>
    <td width="321" rowspan="3">&nbsp;</td>
    <td rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><strong>Listed</strong></td>
    <td width="200" valign="top">'.$listPrice.'</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td width="200" valign="top">&nbsp;</td>
  </tr>
</table>


<p>
  <a href="sellCoin">Add To a Sale List</a></p>

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>