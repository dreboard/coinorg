<?php 
include"../inc/config.php";
include("../secureScripts.php");

$countAll = mysql_query("SELECT * FROM notes WHERE noteID = ".$Encryption->decode($_GET['ID'])."") or die(mysql_error());
  while($row = mysql_fetch_array($countAll))
 {
    echo '<table width="100%" border="0">
  <tr>
    <td width="8%"><label for="noteTitle">Title:</label></td>
    <td width="92%">
      <input name="noteTitle" type="text" id="noteTitle" value="'.strip_tags($row['noteTitle']).'" size="70" /></td>
  </tr>
  <tr>
    <td colspan="2"><textarea name="notepad" class="wysiwyg" id="notepad" rows="75">'.$General->htmlTagFilter($row['note']).'</textarea></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>';
} 




?>