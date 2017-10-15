<?php 

function summary($str, $limit=20, $strip = false) {
    $str = ($strip == true)?strip_tags($str):$str;
    if (strlen ($str) > $limit) {
        $str = substr ($str, 0, $limit - 3);
        return (substr ($str, 0, strrpos ($str, ' ')).'...');
    }
    return trim($str);
}


function getCount($value){
	$value = str_replace('_', ' ', $value);
	$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".$value."'") or die(mysql_error());
	$getTypeRequest = mysql_num_rows($sql);
	return $getTypeRequest;
	
}


//Usage $my_string = rand_string( 5 );
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$*%';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

//ENCRYPTION
	function safe_b64encode($string) {
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }

     function safe_b64decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

//CLEAN AND VALIDATE
function remove_headers($string) { 
 $headers = array(
 "/to\:/i",
 "/from\:/i",
 "/bcc\:/i",
 "/cc\:/i",
 "/Content\-Transfer\-Encoding\:/i",
 "/Content\-Type\:/i",
 "/Mime\-Version\:/i" 
 ); 
 $string = preg_replace($headers, '', $string);
 return strip_tags($string);
 } 
 
 
 
?>
