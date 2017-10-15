<?php 
class Calendar
{

	/* Controls: Header Variant */

	public function calendarHeader($month, $year)
	{
		$html = '';
		$html .= '<h2 class="calendar_header">';
			$html .= '<a href="'.$this->prevMonthHref($month,$year).'" class="prev control"><span class="arrow">&laquo;</span> <span class="label">Previous Month</span></a>';
			$html .= '<a href="'.$this->nextMonthHref($month,$year).'" class="next control"><span class="label">Next Month</span> <span class="arrow">&raquo;</span></a>';
			$html .= date('F', mktime(0, 0, 0, $month) ).' '.$year;
		$html .= '</h2>';
		return $html;
	}
	public function frontCalendarHeader($month, $year)
	{
		$html = '';
		$html .= '<h2 class="calendar_header">';
			$html .= '<a href="eventCalendar.php?month='.($month != 1 ? $month - 1 : 12).'&year='.($month != 1 ? $year : $year - 1).'" class="prev control">&laquo; Previous Month</a>';
			$html .= date('F', mktime(0, 0, 0, $month) ).' '.$year;
			$html .= '<a href="eventCalendar.php?month='.($month != 12 ? $month + 1 : 1).'&year='.($month != 12 ? $year : $year + 1).'" class="next control">Next Month &raquo;</a>';
		$html .= '</h2>';
		return $html;
	}	
	/* HREFs for Next/Previous Month <a>s */
	
	protected function nextMonthHref($month, $year)
	{
		return '?month='.($month != 12 ? $month + 1 : 1).'&year='.($month != 12 ? $year : $year + 1);
	}
	
	protected function prevMonthHref($month, $year)
	{
		return '?month='.($month != 1 ? $month - 1 : 12).'&year='.($month != 1 ? $year : $year - 1);
	}
	
	/* Controls: Footer Variant */
	
	public function calendarFooter($month, $year)
	{
		$html = '';
		$html .= '<form method="get" class="calendar_footer">';
			$html .= $this->selectMonth($month);
			$html .= $this->selectYear($year);
			$html .= '<input type="submit" value="Go" />';
		$html .= '</form>';
		return $html;
	}
	
	/* HTML for Month/Year <select>s */
	
	protected function selectMonth($month)
	{
		$html = '';
		$html .= '<select name="month">';
			for($x = 1; $x <= 12; $x++) {
			  $html.= '<option value="'.$x.'"'.($x != $month ? '' : ' selected="selected"').'>'.date('F',mktime(0,0,0,$x,1,$year)).'</option>';
			}
		$html .= '</select>';
		return $html;
	}
	
	protected function selectYear($year)
	{
		$year_range = 7;
		$html = '';
		$html .= '<select name="year">';
			for ($x = ($year-floor($year_range/2)); $x <= ($year+floor($year_range/2)); $x++) {
				$html .= '<option value="'.$x.'"'.($x != $year ? '' : ' selected="selected"').'>'.$x.'</option>';
			}
		$html .= '</select>';
		return $html;
	}

/* regularly-scheduled programming */

function monthControls($month, $year)
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
$next_month_link = '<a href="?month='.($month != 12 ? $month + 1 : 1).'&year='.($month != 12 ? $year : $year + 1).'" class="control">Next Month >></a>';

/* "previous month" control */
$previous_month_link = '<a href="?month='.($month != 1 ? $month - 1 : 12).'&year='.($month != 1 ? $year : $year - 1).'" class="control"><<   Previous Month</a>';

/* bringing the controls together */
$controls = '<form method="get">'.$select_month_control.$select_year_control.'&nbsp;<input type="submit" name="submit" value="Go" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$previous_month_link.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$next_month_link.' </form>';

return $controls;
}

function monthControls2($month, $year)
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
$next_month_link = '<a href="eventCalendar.php?month='.($month != 12 ? $month + 1 : 1).'&year='.($month != 12 ? $year : $year + 1).'" class="control">Next Month >></a>';

/* "previous month" control */
$previous_month_link = '<a href="eventCalendar.php?month='.($month != 1 ? $month - 1 : 12).'&year='.($month != 1 ? $year : $year - 1).'" class="control"><<   Previous Month</a>';

/* bringing the controls together */
$controls = '<form method="get" action="eventCalendar.php?month='.($month != 1 ? $month - 1 : 12).'&year='.($month != 1 ? $year : $year - 1).'">'.$select_month_control.$select_year_control.'&nbsp;<input type="submit" name="submit" value="Go" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$previous_month_link.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$next_month_link.' </form>';

return $controls;
}
/*
 * Nic changes:
 * 
 * - <table> width is now set via CSS rather than hard-coded
 * - <td> dimensions are also set via CSS
 * - combined day names and calendar into one consistent table
 * - modified Event class to display days as <ul> with <li>s
 * 
 * */

/* draws a calendar */
function draw_calendar($month, $year, $loc){
     $Event  = new Event();
	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar" border="1" width="100%">';

	/* table headings */
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<tr class="calenderHdr"><th>'.implode('</th><th  width="120">',$headings).'</th></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendarRow">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td width="14%" height="120"></td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td valign="top" height="120">';
			/* add in the day number  and  QUERY THE DATABASE**/
			$eventStartDate = $year.'-'. str_pad($month, 2, '0', STR_PAD_LEFT).'-'. str_pad($list_day, 2, '0', STR_PAD_LEFT);
		  switch ($loc){
			  case "front":
				  $calendar.= '<div class="daynumber">'.$list_day.'</div><div class="dayNumber" id="dayNumber'.$list_day.'">'.$Event->multiEventFrontDisplay($eventStartDate);
				  break;
			  case "back":
				  $calendar.= '<div class="daynumber">'.$list_day.'</div><div class="dayNumber" id="dayNumber'.$list_day.'">'.$Event->calendarEventDisplay($eventStartDate);
				  break;	
			  case "admin":
				  $calendar.= '<div class="daynumber">'.$list_day.'</div><div class="dayNumber" id="dayNumber'.$list_day.'">'.$Event->calendarEventDisplay($eventStartDate);
				  break;	
		  }			
			
			//$calendar.= '<div class="daynumber">'.$list_day.'</div><div class="dayNumber" id="dayNumber'.$list_day.'">'.$Event->calendarEventDisplay($eventStartDate=$year.'-'. str_pad($month, 2, '0', STR_PAD_LEFT).'-'. str_pad($list_day, 2, '0', STR_PAD_LEFT));
			
			
			
			

			////////////////////////////////////////////List calendar events
			

			$calendar.= str_repeat('<p> </p>',2);
			$calendar.= '</div>';
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendarRow">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendarDay"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}
/////////////////////////////////////////////////////////////////////

function drawClubcalendar($month, $year, $coinClubID){
     $Event  = new Event();
	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar" border="1" width="100%">';

	/* table headings */
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<tr class="calenderHdr"><th>'.implode('</th><th  width="120">',$headings).'</th></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendarRow">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td width="14%" height="120"></td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td valign="top" height="120">';
			/* add in the day number  and  QUERY THE DATABASE**/
				  $calendar.= '<div class="daynumber">'.$list_day.'</div><div class="dayNumber" id="dayNumber'.$list_day.'">'.$Event->calendarClubEventDisplay($eventStartDate = $year.'-'. str_pad($month, 2, '0', STR_PAD_LEFT).'-'. str_pad($list_day, 2, '0', STR_PAD_LEFT), $coinClubID);

			////////////////////////////////////////////List calendar events
			

			$calendar.= str_repeat('<p> </p>',2);
			$calendar.= '</div>';
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendarRow">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendarDay"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function drawClubcalendar2($month, $year, $coinClubID){
     $Event  = new Event();
	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar" border="1" width="100%" bordercolor="#999999">';

	/* table headings */
	$headings = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
	$calendar.= '<tr align="center" class="calenderHdr"><th>'.implode('</th><th align="center" width="80">',$headings).'</th></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendarRow">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td width="14%" height="70"></td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td valign="top" height="70">';
			/* add in the day number  and  QUERY THE DATABASE**/
				  $calendar.= '<div class="daynumber">'.$list_day.'</div><div class="dayNumber" id="dayNumber'.$list_day.'">'.$Event->calendarClubEventDisplay($eventStartDate = $year.'-'. str_pad($month, 2, '0', STR_PAD_LEFT).'-'. str_pad($list_day, 2, '0', STR_PAD_LEFT), $coinClubID);

			////////////////////////////////////////////List calendar events
			

			$calendar.= str_repeat('<p> </p>',2);
			$calendar.= '</div>';
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendarRow">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendarDay"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}


//dealers
function drawDealerCalendar($month, $year, $userID){
     $Event  = new Event();
	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar" border="1" width="100%" bordercolor="#999999">';

	/* table headings */
	$headings = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
	$calendar.= '<tr align="center" class="calenderHdr"><th>'.implode('</th><th align="center" width="80">',$headings).'</th></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendarRow">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td width="14%" height="150"></td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td valign="top" height="150">';
		$eventStartDate = $year.'-'. str_pad($month, 2, '0', STR_PAD_LEFT).'-'. str_pad($list_day, 2, '0', STR_PAD_LEFT);
			/* add in the day number  and  QUERY THE DATABASE**/
				  $calendar.= '<div class="daynumber"><strong>'.$list_day.'</strong></div><div class="dayNumber" id="dayNumber'.$list_day.'"><ul class="eventUL">'.$Event->calendarDealerEventDisplay($eventStartDate, $userID);

			////////////////////////////////////////////List calendar events
			

			//$calendar.= str_repeat('<p> </p>',2);
			$calendar.= '</ul></div>';
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendarRow">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendarDay"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function getDatesBetween2Dates($startTime, $endTime) {
    $day = 86400;
    $format = 'Y-m-d';
    $startTime = strtotime($startTime);
    $endTime = strtotime($endTime);
    $numDays = round(($endTime - $startTime) / $day) + 1;
    $days = array();
        
    for ($i = 0; $i < $numDays; $i++) {		
        $days[] = date($format, ($startTime + ($i * $day)));
    }
        
    return $days;
}

}
?>