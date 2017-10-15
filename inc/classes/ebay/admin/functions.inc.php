<?php
  // PHP ADODB document - made with PHAkt
  // functions needed by PHAkt generated pages
  
  //require_once(dirname(__FILE__) . '/common/KT_common.php');
  
  function KT_replaceParam($qstring, $paramName, $paramValue) {
    if (preg_match("/&" . $paramName . "=/", $qstring)) {
      return preg_replace("/&" . $paramName . "=[^&]+/", "&" . $paramName . "=" . urlencode($paramValue), $qstring);
    } else {
      return $qstring . "&" . $paramName . "=" . urlencode($paramValue);
    }
  }

  function KT_removeParam($qstring, $paramName) {
    if($qstring == "&"){
      $qstring = "";
    }
    $tmp = preg_replace("/&" . $paramName . "=[^&]*/", "", $qstring);
	if ($tmp == $qstring) {
    	$tmp = preg_replace("/\?" . $paramName . "=[^&]*/", "?", $tmp);
    	$tmp = str_replace("?&", "?", $tmp);
    	$tmp = preg_replace("#\?$#", "", $tmp);
	}
	return $tmp;
  }


/***
* KT_keep_arrayParams
* Description: Transform an array into an URL string delimited with &
* Parameters:
* $the_array - The array which it should be transformed
* $the_var - The initial string to which it will add this URL string representation
* $keepName - The name to be keeped if the array has multiple levels 
* $paramName - A key/array of keys name from the array whitch it should be eliminated
*/

function KT_keep_arrayParams($the_array, $the_var, $keepName='', $paramName=''){
	while (list($key, $value) = each($the_array)) {
		if ($paramName == '' OR (!(is_array($paramName)) AND $key != $paramName) OR (is_array($paramName) AND !(in_array($key, $paramName, TRUE)))) {
			if (!is_array($value)){
				$the_var .= "&" . ($keepName!=''?($keepName."["):"").urlencode($key) .($keepName!=''?"]":""). "=" . urlencode($value);
			}else{
				$the_var = KT_keep_arrayParams($value, $the_var, ($keepName!=''?($keepName."["):"").urlencode($key).($keepName!=''?"]":""),$paramName); 
			}
		}
	}
	return $the_var;
}

function KT_keepParams($paramName) {
	global $MM_keepURL, $MM_keepForm, $MM_keepBoth, $MM_keepNone ;
	$MM_keepNone="";

	// add the URL parameters to the MM_keepURL string
	$MM_keepURL = KT_keep_arrayParams($_GET, '', '', $paramName);
	
	// add the Form variables to the MM_keepForm string
	$MM_keepForm = KT_keep_arrayParams($_POST, '', '', $paramName);
	
	// create the Form + URL string and remove the intial '&' from each of the strings
	$MM_keepBoth = $MM_keepURL . $MM_keepForm;
	if (strlen($MM_keepBoth) > 0) $MM_keepBoth = substr($MM_keepBoth,1);
	if (strlen($MM_keepURL) > 0) $MM_keepURL = substr($MM_keepURL,1);
	if (strlen($MM_keepForm) > 0) $MM_keepForm = substr($MM_keepForm,1);
}
  



   class fakeRecordSet{
        var $fields=array();

        function prepareValue($field, $value){
            if($value==='NULL'){
                $value='';
            }
            $this->fields[$field]=$value;
        }
        
        function Fields($field){
            return @$this->fields[$field];
        }

        function Close(){
            unset($this->fields);
        }
    }
    
    function KT_parseError($a,$b) {
        //if(strstr($b, "Bad date external representation")){
        //    $b = "&nbsp;Data nu a fost bine introdusa.";
        //}
        echo "<font color=red><p class=\"error\">Error:<br>$b</p></font>";
    }
    
    function KT_DIE($a,$b) {
        echo "<p class=\"error\">An error occured!<br>Error no: $a<br>Error message: $b</p>";
        exit;
    }

   function addReplaceParam($KT_Url,$param,$value=""){
      $sep = (strpos($KT_Url, '?') == false)?'?':'&';
      $value = KT_descape($value);
      if(preg_match("#$param=[^&]*#",$KT_Url)){
         $KT_Url = preg_replace("#$param=[^\&]*#", "$param=$value", $KT_Url);
      }else {
         $KT_Url .="$sep$param=$value";
      }
      if ($value == "") {
        $KT_Url = preg_replace("#$param=#", "", $KT_Url);
      }
      $KT_Url = str_replace('?&', '?', $KT_Url);
      $KT_Url = preg_replace('#&+#', '&', $KT_Url);
      $KT_Url = preg_replace('#&$#', '', $KT_Url);
      $KT_Url = preg_replace('#\?$#', '', $KT_Url);
      return $KT_Url;
   }
   
   function KT_descape($KT_text){
     if(eregi("^'.*'$",$KT_text)){
         $KT_text = substr($KT_text, 1, strlen($KT_text)-2);
     }
     return $KT_text;
   }

   function KT_removeEsc($KT_text) {
          if (eregi("^'.*'$",$KT_text)) {
            return substr($KT_text, 1, strlen($KT_text)-2);
        } else {
            return $KT_text;
        }
   }
   

/**
	register a variable in the session taking in account the PHP version
	@params
		$varname - variable name
		$value - variable value
	@return 
		- none
*/
function KT_session_register($varname, $value = null) {
	global $$varname;
	if (is_null($value)) {
		$value = $$varname;
	}
	if (!function_exists('version_compare')) { //if the version is smaller than php 4.1.0
		if (ini_get('register_globals') == '1') { //if register globals is on
			if ($value != null) {
				$$varname = $value;
			}
			session_register($varname);
		}
	} else {
		$_SESSION[$varname] = $value;
	}

	if (@ini_get('register_long_arrays')){
		global $_SESSION;
		$_SESSION[$varname] = $value;
	}
}
/**
	unregister a variable from the session taking in account the PHP version
	@params
		$varname - variable name
	@return 
		- none
*/
function KT_session_unregister($varname) {
	if (function_exists('version_compare')) { //if the version is smaller than php 4.1.0
		if (ini_get('register_globals') == '1') { //if register globals is on
			global $$varname;
			session_unregister($varname);
		}
		if (@ini_get('register_long_arrays')){
					global $_SESSION;
					unset($_SESSION[$varname]);
		}
		
	} else {
		unset($_SESSION[$varname]);
	}
}
/**
	Search an level name into an array of comma separated levels
	@params
		$levels - allowed levels
		$element - the element to be searched
	@return 
		- true if was found
		- false otherwise
*/
function KT_strpos($levels, $element){
    $to_array = explode(',', substr($levels,1)); // the first char is a white space.
	  return in_array($element, $to_array, false);	
}

if (@ini_get('register_long_arrays') == 1){
				//normalize SERVER and ENV vars
				if (!isset($_SERVER['QUERY_STRING']) && isset($_ENV['QUERY_STRING'])) {
					$_SERVER['QUERY_STRING'] = $_ENV['QUERY_STRING'];
				}
				if (!isset($_SERVER['REQUEST_URI']) && isset($_ENV['REQUEST_URI'])) {
					$_SERVER['REQUEST_URI'] = $_ENV['REQUEST_URI'];
				}
				if (!isset($_SERVER['REQUEST_URI'])) {
					$_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'].(isset($_SERVER['QUERY_STRING'])?"?".$_SERVER['QUERY_STRING']:"");
				}
				if (!isset($_SERVER['HTTP_HOST']) && isset($_ENV['HTTP_HOST'])) {
					$_SERVER['HTTP_HOST'] = $_ENV['HTTP_HOST'];
				}
				if (!isset($_SERVER['HTTPS']) && isset($_ENV['HTTPS'])) {
					$_SERVER['HTTPS'] = $_ENV['HTTPS'];
				}
				if (!isset($_SERVER['PATH_TRANSLATED']) && isset($_ENV['PATH_TRANSLATED'])) {
					$_SERVER['PATH_TRANSLATED'] = $_ENV['PATH_TRANSLATED'];
				}
				if (!isset($_SERVER['SCRIPT_FILENAME']) && isset($_ENV['SCRIPT_FILENAME'])) {
					$_SERVER['SCRIPT_FILENAME'] = $_ENV['SCRIPT_FILENAME'];
				}

				if (!isset($_SERVER['HTTP_REFERER']) && isset($_ENV['HTTP_REFERER'])) {
					$_SERVER['HTTP_REFERER'] = $_ENV['HTTP_REFERER'];
				}
				if (!isset($_SERVER['HTTP_USER_AGENT']) && isset($_ENV['HTTP_USER_AGENT'])) {
					$_SERVER['HTTP_USER_AGENT'] = $_ENV['HTTP_USER_AGENT'];
				}
				// fixing #0003728
				if (empty($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])){
						$_SERVER['QUERY_STRING'] = $_SERVER['QUERY_STRING'];
				}elseif (!empty($_SERVER['QUERY_STRING']) && empty($_SERVER['QUERY_STRING'])){
						$_SERVER['QUERY_STRING'] = $_SERVER['QUERY_STRING'];
				}elseif (empty($_SERVER['QUERY_STRING']) && empty($_SERVER['QUERY_STRING'])){
						$_SERVER['QUERY_STRING'] = $_SERVER['QUERY_STRING'] = '';
				}
				// end fixing #0003728
}
//KT_setServerVariables();
?>
