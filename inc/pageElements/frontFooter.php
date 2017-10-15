<div id="footer">
<div id="footerContent">
<table width="100%" border="0">
  <tr>
    <td width="25%" align="center"><a href="index.php">Home</a></td>
    <td width="25%" align="center"><a href="terms.php">Terms</a></td>
    <td width="25%" align="center"><a href="privacy.php">Privacy</a></td>
    <td width="25%" align="center"><a href="contact.php">Contact</a></td>
    
  </tr>
</table>
<p>&nbsp;</p>
<p>My Coin Organizer Ver 1.0 <?php echo date("Y"); ?></p>
</div>
</div>

<?php 
if(isset($_SESSION['pageMsg'])) {
  unset($_SESSION['pageMsg']);
  }
 if(isset($_SESSION['errorMsg'])) {
  unset($_SESSION['errorMsg']);
  } 
  
?>