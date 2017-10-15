<div id="footer">
<div id="footerContent">

<table width="100%" border="0">
  <tr>
    <td width="25%"><a href="terms.php">Terms</a></td>
    <td width="25%"><a href="privacy.php">Privacy</a></td>
    <td width="25%"></td>
    <td width="25%"></td>
  </tr>
</table>


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