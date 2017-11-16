<?php 
class General
{

public function random_string()
  {
    $character_set_array = [];
    $character_set_array[ ] = ['count' => 6, 'characters' => 'abcdefghijklmnopqrstuvwxyz'];
    $character_set_array[ ] = ['count' => 2, 'characters' => '0123456789'];
    $character_set_array[ ] = ['count' => 2, 'characters' => '!@#$+-*&?:'];
    $temp_array = [];
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


public function summary($str, $limit=20, $strip = false) {
    $str = ($strip == true)?strip_tags($str):$str;
    if (strlen ($str) > $limit) {
        $str = substr ($str, 0, $limit - 3);
        return (substr ($str, 0, strrpos ($str, ' ')).'...');
    }
    return trim($str);
}

//PERCENT FUNCTION
/*function percent($small, $large){
	$percentCalc = ((100*$small)/$large);
	$percent = number_format($percentCalc, 1);
	return $percent;
}*/
public function percent($small, $large){
	if($large !=0){
	$percentCalc = ((100*$small)/$large);
	$percent = number_format($percentCalc, 1);
		return $percent;
	} else {
	return '0';
}
}
//////////////////////////////money Formats
public function formatMoney($number, $fractional=false) {
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

public function decimal($val, $precision = 0) {
    if ((float) $val) : 
        $val = round((float) $val, (int) $precision); 
        list($a, $b) = explode('.', $val); 
        if (strlen($b) < $precision) $b = str_pad($b, $precision, '0', STR_PAD_RIGHT); 
        return $precision ? "$a.$b" : $a; 
    else : // do whatever you want with values that do not have a float 
        return $val; 
    endif; 
} 


/////////////////////////////
	public function htmlTagFilter($description) {
		$allow = '<table> <tr> <td> <table> <tr> <td> <thead> <tbody> <tfoot> <span> <sub> <sup> <li> <ol> <ul> <a> <br> <p> <h1> <h2> <h3> <h4> <h5> <h6> <strong> <hr> <div> <img>';	
		$this->stripInlineScripts($description);
        return strip_tags($description, $allow);
    }
	public function stripInlineScripts($value) {
		 preg_replace('#(<[^>]+[\x00-\x20\"\'\/])(on|xmlns)[^>]*>#iUu', "$1>", $value);
	}	


public function setTheDate($value){
	if($value == '') {
		$value = date("Y-m-d");
	} else {
		$value = date("Y-m-d",strtotime($value));
	}
}
public function setThePrice($value){
  if($value == '') {
	  $value = '0.00';
  } else {
	  $value = mysql_real_escape_string($value);
  }
  return $value;
}
public function setNoDescription($value){
  if($value == '') {
	  $value = 'None';
  } else {
	  $value = $this->htmlTagFilter($value);
  }
  return $value;
}
public function setToNone($value){
  if($value == '') {
	  $value = 'None';
  } else {
	  $value = mysql_real_escape_string($value);
  }
  return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function cleanInput($input) {

  $search = [
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  ];

    $output = preg_replace($search, '', $input);
    return $output;
  }

public function sanitize($input) {
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = $this->sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = $this->cleanInput($input);
        $output = mysql_real_escape_string($input);
    }
    return $output;
}





}//End Class
?>