<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";



if (isset($_GET['month'])) { 
$month = date("m", strtotime(str_replace(' ', '-', $_GET['month'])));
$monthName = date("F", strtotime(str_replace(' ', '-', $_GET['month'])));
$year = date("Y", strtotime(str_replace(' ', '-', $_GET['month'])));
echo '

<ul class="list-group">
 <li class="list-group-item default"><strong>Activity For '.$monthName.' '.$year.'</strong></li>
  <li class="list-group-item"><span class="badge">$'.$Invest->getMonthlyInvestmentByID($userID, $month, $year).'</span> Spending</li>
  <li class="list-group-item"><span class="badge">18</span> Coins Added</li>
  <li class="list-group-item"><span class="badge">11</span> Coin Shows</li>
  <li class="list-group-item"><span class="badge">1</span> Coin Group</li>
</ul>
';


//echo 'Current month is '.$month.' '.$year;
}
?>

