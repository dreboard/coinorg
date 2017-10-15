<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_POST["coinCategory"])) { 
$coinCategory = str_replace('_', ' ', mysql_real_escape_string($_POST["coinCategory"]));

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1><?php echo $coinCategory ?></h1>
</body>
</html>