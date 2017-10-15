<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit My Account</title>
<?php include("../secureScripts.php"); ?>
<style type="text/css">

</style>
<script type="text/javascript">
$(document).ready(function(){

});
</script>
</head>

<body>
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">

<h2 id="pageHdr"> Users Account Details (<?php echo $User->getLastname() ?>, <?php echo $User->getFirstname() ?>)</h2>
<p>&nbsp;</p>
<h3>My Sale Items</h3>
<table width="100%" border="0">
  <tr class="darker">
    <td width="61%">Item</td>
    <td width="12%">List Price</td>
    <td width="14%">List Date</td>   
        <td width="13%">Exp. Date</td>  
  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM selllist WHERE sellStatus = 'Active' AND $userID = '$userID' ORDER BY sellListID DESC") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="4">You dont have any items for sale.</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $coinType = $row['coinType'];
  $sellListID = intval($row['sellListID']); 
  $sellTitle = $row['sellTitle']; 
  $listDate = date("F j, Y",strtotime($row["listDate"]));
  $removeDate = date("F j, Y",strtotime($row["removeDate"]));
  $coinGrade = $row['coinGrade']; 
  $listPrice = $row['listPrice'];  
  $coinPic1 = $row['coinPic1'];  
  //SEND ENCODED COLLECTIONID 
  echo '
<tr>
<td><a href="saleDetail.php?sellListID='.$sellListID.'">'.$sellTitle.'</a></td>
<td>'.$listPrice.'</td> 
<td>'.$listDate.'</td>
<td>'.$removeDate.'</td>
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






</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
