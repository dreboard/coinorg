<hr />
<div id="footer">
<div id="footerContent">

<table width="100%" border="0" id="footerTbl">
  <tr class="reportListLinks">
    <td width="25%" align="center"><a href="help.php">User Guide</a> </td>
    <td width="25%" align="center"> <a href="faq.php">FAQ</a> </td>
    <td width="25%" align="center"> <a href="newStuff.php">Whats New</a> </td>
    <td width="25%" align="center"> <a href="suggest.php">Suggestions</a></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><a target="_blank" href="http://www.anacs.com/Default.aspx"><img src="http://www.mycoinorganizer.com/img/ads/ANACS.jpg" width="640" height="146" /></a></td>
    </tr>
</table>
<ul>
      <li><a href="searchEbay.php">Search Ebay</a></li>
      <li><a href="http://www.pcgs.com/photograde/" target="_blank">Grade Guides</a></li>
      <li><a href="http://www.pcgs.com/prices/default.aspx" target="_blank">Price Guide</a></li> 
      <li><a href="store.php">Supply Store</a></li>
       <li><a href="news.php">Coin News</a></li>     
    </ul>
</div>
</div>
<?php 
if(isset($_SESSION['pageMsg'])) {
  unset($_SESSION['pageMsg']);
  }
 if(isset($_SESSION['errorMsg'])) {
  unset($_SESSION['errorMsg']);
  } 

  if(isset($_SESSION['message'])) {
  unset($_SESSION['message']);
  }  
?>