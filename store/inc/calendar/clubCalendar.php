<?php 
function getClubEvent($coinClubID, $eventStartDate){
	$sql = mysql_query("SELECT * FROM clubevent WHERE eventStartDate = '$eventStartDate'") or die(mysql_error());
	
	//$sql = mysql_query("SELECT * FROM clubevent WHERE YEAR(eventStartDate) = ".$year." AND MONTH(eventStartDate) = ".$month." AND DAY(eventStartDate) = ".str_pad($list_day, 2, '0', STR_PAD_LEFT)." AND coinClubID = '$coinClubID' ") or die(mysql_error());
			while($row = mysql_fetch_array($sql))
				  {
				  $eventID = $row['eventID'];
				  $eventStartDate = $row['eventStartDate'];
				  $eventTitle = substr($row['eventTitle'], 0, 25);
				  return ' <a href="showevent.php?eventID='.$eventID.'"><span class="eventDisplay" ">&#42;'.$eventTitle.'</span></a><br />';
				  } 
     //return $eventDisplay;
}


/* select month control */
function monthControls($month, $year, $coinClubID)
{
$select_month_control = '<select name="month" id="month">';
for($x = 1; $x <= 12; $x++) {
  $select_month_control.= '<option value="'.$x.'"'.($x != $month ? '' : ' selected="selected"').'>'.date('F',mktime(0,0,0,$x,1,$year)).'</option>';
}
$select_month_control.= '</select>';

/* select year control */
$year_range = 7;
$select_year_control = '<select name="year" id="year">';
for($x = ($year-floor($year_range/2)); $x <= ($year+floor($year_range/2)); $x++) {
  $select_year_control.= '<option value="'.$x.'"'.($x != $year ? '' : ' selected="selected"').'>'.$x.'</option>';
}
$select_year_control.= '</select>';

/* "next month" control */
$next_month_link = '<a href="?coinClubID='.$coinClubID.'&month='.($month != 12 ? $month + 1 : 1).'&year='.($month != 12 ? $year : $year + 1).'" class="control">Next Month >></a>';

/* "previous month" control */
$previous_month_link = '<a href="?coinClubID='.$coinClubID.'&month='.($month != 1 ? $month - 1 : 12).'&year='.($month != 1 ? $year : $year - 1).'" class="control"><<   Previous Month</a>';

/* bringing the controls together */
$controls = '<form method="get">'.$select_month_control.$select_year_control.'&nbsp;<input type="submit" name="submit" value="Go" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$previous_month_link.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$next_month_link.' </form>';

return $controls;
}

/* draws a calendar */
function draw_calendar($month, $year, $coinClubID){

	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar"   width="100%" border="0">';

	/* table headings */
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<tr align="center" class="darker"><td  width="14%">'.implode('</td><td  width="14%">',$headings).'</td></tr></table>
	<table cellpadding="2" cellspacing="0" class="calendar"  id="monthCalendar" width="100%" border="1">';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td width="14%" height="100"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td width="14%" valign="top" height="100">';
			/* add in the day number  and  QUERY THE DATABASE**/
			$calendar.= '<strong>'.$list_day.'</strong><br /><div class="day-number" id="day-number'.$list_day.'">'.getClubEvent($coinClubID, $eventStartDate=$year.'-'. str_pad($month, 2, '0', STR_PAD_LEFT).'-'. str_pad($list_day, 2, '0', STR_PAD_LEFT));

			////////////////////////////////////////////List calendar events
			

			$calendar.= str_repeat('<p> </p>',2);
			$calendar.= '</div>';
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row" style="border-left:1px solid #999;">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}
?>