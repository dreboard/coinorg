<div id="header" class="wide">
<div id="innerHeader" class="inner">

<table width="100%" border="0">
  <tr>
    <td rowspan="4"><a href="http://www.allsmallcents.com"><img src="http://www.allsmallcents.com/img/header.jpg" alt="Lincoln Wheat Cents" width="500" height="154" align="left" /></a></td>
    <td align="right"><a class="brownLink" href="<?php echo $logLink ?>"><strong><?php echo $logName ?></strong> <img src="http://www.allsmallcents.com/img/keyIcon.png" alt="Login" width="26" height="20" align="middle" /></a></td>
  </tr>
  <tr>
    <td align="right"><a class="brownLink" href="http://www.allsmallcents.com/cart.php">My Cart <?php if(isset($_SESSION["cart_array"])){ echo count($_SESSION["cart_array"]); } else { echo '0';} ?> <img src="http://www.allsmallcents.com/img/cart.jpg" width="26" height="20" align="middle" alt="View My Cart" /></a></td>
  </tr>
  <tr>
    <td align="right">
    <?php echo $homeLink; ?> <img src="http://www.allsmallcents.com/img/userIcon.png" alt="Hello User" width="26" height="20" align="middle" /></td>
  </tr>
  <tr>
    <td align="right" valign="top">
    <form action="http://www.allsmallcents.com/results.php" method="post" name="searchForm" id="searchForm">
<label class="top" for="search">Find an Item</label>
<input type="text" name="search" id="search" />
<input type="submit" value="Search" id="searchFormBtn" />
</form>
    
    </td>
  </tr>
  <tr>
    <td colspan="2">
<br />
<table width="100%" border="0" id="navTbl2">
  <tr align="center">
    <td width="12%"><a title="Buy Lincoln Wheat Pennies" href="http://www.allsmallcents.com/index.php">Home</a></td>
    <td width="12%"><a title="Plastic Penny Roll Trays" href="http://www.allsmallcents.com/Small-Cent-Roll-Trays.php">Supplies</a></td>
    <td width="12%"><a title="PCGS Lincoln Cents" href="http://www.allsmallcents.com/Certified-Small-Cents.php">Certified</a></td>
    <td width="12%"><a title="Lincoln Wheat and Memorial Sets" href="http://www.allsmallcents.com/Lincoln-Cent-Collections.php">Collections</a></td>
    <td width="12%"><a title="Lincoln Wheat Rolls" href="http://www.allsmallcents.com/Small-Cent-Rolls.php">Rolls</a></td>
    <td width="12%"><a title="Lincoln Wheat Proof Coins" href="http://www.allsmallcents.com/Proof-Pennies.php">Proofs</a></td>
    <td width="12%"><a title="Lincoln Memorial Cent Error Coins" href="http://www.allsmallcents.com/Lincoln-Penny-Errors.php">Errors</a></td>    
        <td width="12%"><a target="_blank" href="http://rover.ebay.com/rover/1/711-53200-19255-0/1?ff3=4&pub=5575051408&toolid=10001&campid=5337342357&customid=&mpre=http%3A%2F%2Fcgi3.ebay.com%2Faw-cgi%2FeBayISAPI.dll%3FViewListedItems%26userid%3Dmycoinorganizer"><img src="http://www.allsmallcents.com/img/all-small-cents-on-ebay.jpg" width="37" height="14" alt="All Small Cents Ebay Auctions" /></a><img style="text-decoration:none;border:0;padding:0;margin:0;" src="http://rover.ebay.com/roverimp/1/711-53200-19255-0/1?ff3=4&pub=5575051408&toolid=10001&campid=5337342357&customid=&mpt=[CACHEBUSTER]"></td>  
  </tr>
</table>    
    
    
    </td>
    </tr>
</table>


<hr clear="all" />

</div>
</div>