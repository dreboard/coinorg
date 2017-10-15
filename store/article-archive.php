<?php 
include("inc/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Articles Archive</title>
<?php include("inc/scripts.php"); ?>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type="text/javascript">
$(document).ready(function(){


});
</script>
<style type="text/css">

</style>

</head>

<body>
<div id="container">


<?php include("inc/pageElements/header.php"); ?>



<div id="contentHolder" class="wide">

<div id="content" class="inner">
<?php include("inc/pageElements/nav2.php"); ?>
  <br />  
<h2 id="pageHdr">Articles Archive</h2>
<?php 
function newest($a, $b) 
{ 
    return filemtime($a) - filemtime($b); 
} 

$dir = glob('articles/*'); // put all files in an array 
uasort($dir, "newest"); // sort the array by calling newest() 

foreach($dir as $file) 
{ 
    echo '<a href="http://www.allsmallcents.com/articles/'.basename($file).'">'.substr(str_replace('-', ' ', basename($file)),0,-4).'</a><br />'; 
} 
?>



  <p>&nbsp;</p>
  
</div>

</div>



<?php include("inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>