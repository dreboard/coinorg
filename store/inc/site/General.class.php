<?php 
class General
{


function setToNone($value){
		if($value == '') {
	$value = 'None';;
	} else {
		$value = mysql_real_escape_string($value);
	}
	return $value;
}
function setToZero($value){
		if($value == '') {
	$value = '0.00';;
	} else {
		$value = mysql_real_escape_string($value);
	}
	return $value;
}
public function random_string()
  {
    $character_set_array = array( );
    $character_set_array[ ] = array( 'count' => 6, 'characters' => 'abcdefghijklmnopqrstuvwxyz' );
    $character_set_array[ ] = array( 'count' => 1, 'characters' => '0123456789' );
    $character_set_array[ ] = array( 'count' => 1, 'characters' => '!@#$+-*&?:' );
    $temp_array = array( );
    foreach ( $character_set_array as $character_set )
    {
      for ( $i = 0; $i < $character_set[ 'count' ]; $i++ )
      {
        $temp_array[ ] = $character_set[ 'characters' ][ rand( 0, strlen( $character_set[ 'characters' ] ) - 1 ) ];
      }
    }
    shuffle( $temp_array );
    return implode( '', $temp_array );
  }


function summary($str, $limit=20, $strip = false) {
    $str = ($strip == true)?strip_tags($str):$str;
    if (strlen ($str) > $limit) {
        $str = substr ($str, 0, $limit - 3);
        return (substr ($str, 0, strrpos ($str, ' ')).'...');
    }
    return trim($str);
}

//PERCENT FUNCTION
function percent($small, $large){
	$percentCalc = ((100*$small)/$large);
	$percent = number_format($percentCalc, 1);
	return $percent;
}

//////////////////////////////money Formats
function formatMoney($number, $fractional=false) { 
    if ($fractional) { 
        $number = sprintf('%.2f', $number); 
    } 
    while (true) { 
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number); 
        if ($replaced != $number) { 
            $number = $replaced; 
        } else { 
            break; 
        } 
    } 
    return $number; 
}

function dateDiff($dateStart, $dateEnd) 
{
    $start = strtotime($dateStart);
    $end = strtotime($dateEnd);
    $days = $end - $start;
    $days = ceil($days/86400);
    return $days;
}



}//End Class
?>