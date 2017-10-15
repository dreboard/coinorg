<?php 

if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
}
?>

  <table width="965" border="1" id="folderTbl" class="updateListTbl">
  <tr class="dateHolder" valign="top"> 
<?php
$c = 0; // Our counter
$n = 9; // Each Nth iteration would be a new table row
$countAll = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType'") or die(mysql_error());
while ($show = mysql_fetch_array($countAll))
{

  if($c % $n == 0 && $c != 0) // If $c is divisible by $n...
  {
    // New table row
    echo '</tr><tr class="dateHolder" valign="top">';
  }
  $c++;
  ?>
  <td><a href='values.php?coinID=<?php echo $show['coinID'] ?>'><?php echo $show['coinName'] ?></a></td>
  <?php
} ?>
</tr>

</table>
