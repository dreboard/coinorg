<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php include("../secureScripts.php"); ?>
<title>Dealer Home Page</title>
<script type="text/javascript">
$(document).ready(function(){	


});
</script>  

<style type="text/css">
ul {
  font-family: Arial, Verdana;
  font-size: 14px;
  margin: 0;
  padding: 0;
  list-style: none;
}
ul li {
  display: block;
  position: relative;
  float: left;
}
li ul { display: none; }
ul li a {
  display: block;
  text-decoration: none;
  color: #ffffff;
  border-top: 1px solid #ffffff;
  padding: 5px 15px 5px 15px;
  background: #2C5463;
  margin-left: 1px;
  white-space: nowrap;
}
ul li a:hover { background: #617F8A; }
li:hover ul {
  display: block;
  position: absolute;
}
li:hover li {
  float: none;
  font-size: 11px;
}
li:hover a { background: #617F8A; }
li:hover li a:hover { background: #95A9B1; }
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">
<h1>Dealer Home Page</h1>

<ul id="menu">
  <li><a href="">Home</a></li>
  <li><a href="">About Us</a>
    <ul>
    <li><a href="">The Team</a></li>
    <li><a href="">History</a></li>
    <li><a href="">Vision</a></li>
    </ul>
  </li>
  <li><a href="">Products</a>
    <ul>
    <li><a href="">Cozy Couch</a></li>
    <li><a href="">Great Table</a></li>
    <li><a href="">Small Chair</a></li>
    <li><a href="">Shiny Shelf</a></li>
    <li><a href="">Invisible Nothing</a></li>
    </ul>
  </li>
  <li><a href="">Contact</a>
    <ul>
    <li><a href="">Online</a></li>
    <li><a href="">Right Here</a></li>
    <li><a href="">Somewhere Else</a></li>
    </ul>
  </li>
</ul>
<hr>

<table width="100%" border="0">
      <tr>
        <td>&nbsp;</td>
        <td align="right"><strong><?php echo date('M'); ?>&nbsp;</strong></td>
        <td align="right"><strong>All Time</strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="13%"><strong><a href="users.php">Members</a></strong></td>
        <td width="8%" align="right"><a href="users.php"><?php echo $User->getNewUserCount($month=date('m'), $year = date('Y'), $userLevel='user'); ?></a></td>
        <td width="9%" align="right"><?php echo $User->getUserCount($month, $year, $userLevel='user'); ?></td>
        <td width="70%">&nbsp;</td>
      </tr>
      <tr>
        <td><strong><a href="members.php">Clubs</a></strong></td>
        <td align="right"><a href="eventCalendar.php"><?php echo $User->getNewUserCount($month=date('m'), $year = date('Y'), $userLevel='club'); ?></a></td>
        <td align="right"><?php echo $User->getUserCount($month, $year, $userLevel='club'); ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
<p>&nbsp;</p>


<hr>
<h3>Clients</h3>
<table width="100%" border="0">
  <tr>
    <td width="50%">Name</td>
    <td width="10%" align="center">Coins</td>
    <td width="10%" align="center">Want</td>
    <td width="10%" align="center">For Sale</td>
    <td width="10%" align="center">&nbsp;</td>
    <td width="10" align="center">&nbsp;</td>
  </tr>
  
  
  <tr class="gryHover">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div id="facebookDiv"></div>

<hr class="clear" />

<p>&nbsp;</p>

<p>&nbsp;</p>





<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>