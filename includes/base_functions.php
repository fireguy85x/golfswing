<?php

/*
 * Autolad the classes
 * @param the class to be loaded 
 * 
 */
function includeClasses($sClassName){
    $sFileName = LIBRARIES_FOLDER_PATH . DS . $sClassName . '.class.php';
    if(file_exists($sFileName)){
        include_once $sFileName;
    }
}


/* Print a pretty object
 * @param $oObject
 */
function _d($sValue,$bShowHTML = true,$bReturnValue = false){
    
    $sDump = '<pre>';
    if($bShowHTML == true){
        $sDump .= print_r($sValue,1);
    }else{
        $sDump .= htmlentities(print_r($sValue,1));
    }
    $sDump .= '</pre>';
    
    if($bReturnValue){
        return $sDump;
    }else{
        echo $sDump;
    }
    
}

/**
 * Do the same as mysql_real_escape_string
 * @param String $mValue (waarde om te escapen)
 * @param Boolean $bEMptyString2NULL if value is empty string, return 'NULL'
 * @return String escaped string
 */
function db_str($mValue, $bEmptyString2NULL = true) {

    if ($mValue === null)
        return 'NULL';
    elseif ($mValue === '' && $bEmptyString2NULL)
        return 'NULL';
    else
        return "'" . str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a", "\x00"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z', ''), trim($mValue)) . "'";
}

/**
 * Try to make a real integer of this value, else return null
 * @param Int $iValue (value to parse)
 * @return Int or null
 */
function db_int($iValue) {
    if ($iValue === null || $iValue === "") {
        return "NULL";
    } elseif (is_numeric($iValue)) {
        return (int) $iValue;
    } else {
        return null;
    }
}

/**
 * Make value a real float/double
 * @param Float $fValue (value to parse)
 * @return Int or null
 */
function db_deci($fValue) {
    if ($fValue === null || $fValue === "") {
        return "NULL";
    } else {
        # remove ,-
        $fValue = preg_replace("#([0-9])(,-)$#", "$1.00", $fValue);

        # remove .-
        $fValue = preg_replace("#([0-9])(\.-)$#", "$1.00", $fValue);

        # remove all dashes at the end
        $fValue = preg_replace("#-$#", "", $fValue);

        # komma to decimal sign
        $fValue = preg_replace("#,#", ".", $fValue);

        # remove thousands sign
        $fValue = preg_replace("#\.([0-9]{3})#", "$1", $fValue);

        # If it is a float or a numeric value, make decimal
        if (is_float($fValue) || is_numeric($fValue)) {
            return number_format((float) $fValue, 2, '.', '');
        } else {
            return null;
        }
    }
}

/**
 * Try to return a date in the right format
 * @param String $sDate (value to parse)
 * @param Boolean $bOnlyReturnDate return a date without the time
 * @return String or null
 */
function db_date($sDate, $bOnlyReturnDate = false) {
    if ($sDate === null || $sDate === "") {
        return "NULL";
    }
    # Covert format from d-m-Y to Y-m-d
    if (preg_match("#^\d{1,2}[\/\-]{1}\d{1,2}[\/\-]{1}\d{4}#", $sDate)) {
        $sDate = preg_replace("#^(\d{1,2})[\/\-]{1}(\d{1,2})[\/\-]{1}(\d{4})#", "$3-$2-$1", $sDate);
    }
    # Format is Y-m-d so this is ok
    if (preg_match("#^\d{4}[\/\-]{1}\d{1,2}[\/\-]{1}\d{1,2}#", $sDate)) {
        if ($bOnlyReturnDate) {
            $sDate = preg_replace("#^(\d{4}[\/\-]{1}\d{1,2}[\/\-]{1}\d{1,2})(.*)$#", "$1", $sDate);
        }
        return "'" . trim($sDate) . "'";
    } else {
        return null;
    }
}

/**
 * Get a value from the $_GET Array
 * @param String $sKey
 * @param Mixed $mDefault
 * @return Mixed
 */
function http_get($sKey, $mDefault = null) {
    return array_key_exists($sKey, $_GET) ? $_GET[$sKey] : $mDefault;
}

/**
 * Get a value from the $_POST Array
 * @param String $sKey
 * @param Mixed $mDefault
 * @return Mixed
 */
function http_post($sKey, $mDefault = null) {
    return array_key_exists($sKey, $_POST) ? $_POST[$sKey] : $mDefault;
}


/**
 * Get a value from the $_SESSION Array
 * @param String $sKey
 * @param Mixed $mDefault
 * @return Mixed
 */
function http_session($sKey, $mDefault = null) {
    if (!$_SESSION) {
        return $mDefault;
    }
    return array_key_exists($sKey, $_SESSION) ? $_SESSION[$sKey] : $mDefault;
}
        
/**
 * redirect to a given location and stop script from executing
 * @param $sRedirectURL  URL to redirect to
 * @param Boolean $bUtm (true to keep Google Analytics UTM parameters working)
 */
function http_redirect($sRedirectURL, $bUtm = false, $b301 = false) {
    if ($bUtm) {
        if (http_get('utm_source') && !strpos($url, 'utm_source=')) {
            $sRedirectURL .= (strpos($sRedirectURL, '?') ? '&' : '?') . 'utm_source=' . http_get('utm_source');
        }
        if (http_get('utm_medium') && !strpos($sRedirectURL, 'utm_medium=')) {
            $sRedirectURL .= (strpos($sRedirectURL, '?') ? '&' : '?') . 'utm_medium=' . http_get('utm_medium');
        }
        if (http_get('utm_campaign') && !strpos($sRedirectURL, 'utm_campaign=')) {
            $sRedirectURL .= (strpos($sRedirectURL, '?') ? '&' : '?') . 'utm_campaign=' . http_get('utm_campaign');
        }
        if (http_get('utm_term') && !strpos($sRedirectURL, 'utm_term=')) {
            $sRedirectURL .= (strpos($sRedirectURL, '?') ? '&' : '?') . 'utm_term=' . http_get('utm_term');
        }
        if (http_get('utm_content') && !strpos($sRedirectURL, 'utm_content=')) {
            $sRedirectURL .= (strpos($sRedirectURL, '?') ? '&' : '?') . 'utm_content=' . http_get('utm_content');
        }
    }
    if ($b301)
        header("HTTP/1.1 301 Moved Permanently");
    
    header("Location: " . $sRedirectURL);
    die();
}

/**
 * 
 * @return string
 */
function curPageURL() {
    $isHTTPS = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on");
    $port = (isset($_SERVER["SERVER_PORT"]) && ((!$isHTTPS && $_SERVER["SERVER_PORT"] != "80") || ($isHTTPS && $_SERVER["SERVER_PORT"] != "443")));
    $port = ($port) ? ':' . $_SERVER["SERVER_PORT"] : '';
    $url = ($isHTTPS ? 'https://' : 'http://') . $_SERVER["SERVER_NAME"] . $port . $_SERVER["REQUEST_URI"];
    return $url;
}


/**
 * 
 * @return string
 */
function curBaseURL() {
    $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
    $sHttp = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http';
    return $sHttp.':://' . $_SERVER['HTTP_HOST'] . $uri_parts[0];
}

/**
 * returns the current url
 * @return string
 */
function getCurrentUrl() {
    $sUrl = 'http';
    $bIsHTTPS = false;
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == 'on') {
        $bIsHTTPS = true;
        $sUrl .= 's';
    }
    $sUrl .= '://';
    $sUrl .= isset($_SERVER["SERVER_NAME"]) ? $_SERVER["SERVER_NAME"] : '';

    if (isset($_SERVER["SERVER_PORT"]) && (!$bIsHTTPS && $_SERVER["SERVER_PORT"] != '80') || ($bIsHTTPS && $_SERVER["SERVER_PORT"] != '443')) {
        $sUrl .= ':' . $_SERVER["SERVER_PORT"];
    }

    $sUrl .= isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : '';
    return $sUrl;
}

/**
 * return relative url path of the current page without extension optional with querystring
 * @param Boolean $bWithQRS also keep query string attached
 * @return string
 */
function getCurrentUrlPath($bWithQRS = false, $bWithExtension = false) {
    $sCurrentUrlPath = $_SERVER['REQUEST_URI'];

    return cleanUrlPath($sCurrentUrlPath, $bWithQRS, $bWithExtension);
}

/**
 * cleans url path from extension and or querystring and slash at the end
 * @param string $sUrlPath relative path of the url after the domain name starting with slash
 * @param boolean $bWithQRS keep qrystring
 * @param boolean $bWithExtension keep extension
 * @return string
 */
function cleanUrlPath($sUrlPath, $bWithQRS = false, $bWithExtension = false) {

# cut urlPart in pieces
    preg_match("/^([^\?\&\.]*)([^\?\&]*)(.*)$/", $sUrlPath, $aMatches);

    $sUrlPath = $aMatches[0];
    $sUrlPathClean = $aMatches[1];
    $sExtension = $aMatches[2];
    $sQRYString = $aMatches[3];

# part needs to start with a slash
    if (!preg_match("#^\/#", $sUrlPathClean)) {
        $sUrlPathClean = "/" . $sUrlPathClean;
    }

# remove slash at the end
    if (preg_match("#\/$#", $sUrlPathClean)) {
        $sUrlPathClean = substr($sUrlPathClean, 0, -1); // remove slash at end
    }

# add extension
    if ($bWithExtension) {
        $sUrlPathClean .= $sExtension;
    }

# add QRYString
    if ($bWithQRS) {
        $sUrlPathClean .= $sQRYString;
    }

#if empty, add slash
    if (empty($sUrlPathClean))
        $sUrlPathClean = '/';

    return $sUrlPathClean;
}

/**
 * 
 * @param type $sText
 * @return type
 */
function _t($sText = 'Empty text'){
    $oLang = Tr::getInstance();

    return $oLang->getLabel($sText);
}

/**
 * handle PHP errors
 * @param int $iErrorno
 * @param string $sError
 * @param string $sFile
 * @param int $iLine
 * @param string $sExtraInfo
 */
function error_handler($iErrorLevel, $sError, $sFile, $iLine, $sExtraInfo = '') {
    if (!error_reporting())
        return false;
    $sErrorMsg = '<br />';
    switch ($iErrorLevel) {
        case E_WARNING:
        case E_USER_WARNING:
            $sErrorMsg .= '<b>Warning: </b>';
            break;
        case E_NOTICE:
        case E_USER_NOTICE:
            $sErrorMsg .= '<b>Notice: </b>';
            break;
        default:
            $sErrorMsg .= '<b>Error: </b>';
            break;
    }
    $sErrorMsg .= $sError . ' in <b>' . $sFile . '</b>' . ' on line ' . $iLine . '<br />';
    if (DEBUG) {
        echo $sErrorMsg;
    }
}

/**
 * handle fatal error or other errors that shutdown the script
 */
function shutdown_handler() {
    $aErrorDetails = error_get_last();
    if ($aErrorDetails === null)
        return;
    if (!error_reporting())
        return false;
    $sErrorMsg = '<br />';
    switch ($aErrorDetails['type']) {
        case E_ERROR:
            $sErrorMsg .= '<b>Fatal error: </b>';
            break;
        default:
            return;
    }
    $sErrorMsg .= $aErrorDetails['message'] . ' in <b>' . $aErrorDetails['file'] . '</b>' . ' on line ' . $aErrorDetails['line'] . '<br />';

    if (DEBUG) {
        echo $sErrorMsg;
    }
}

/* show http error page */
function showHttpError($iErrorNr) {
    include_once DOCUMENT_ROOT . "/controllers/errors.cont.php";
    die();
}

/* show wsError */
function showWsError() {
    ob_clean();
    include_once DOCUMENT_ROOT . "/controllers/wsError.cont.php";
    die();
}

/**
 * Make a given part of a URL a pretty (SEO friendly) look
 * @param String $sUrlPart
 * @param String $bConvertToUTF8 convert $sUrlPart to UTF-8
 * @return String (SEO friendly) pretty URL part
 */
function prettyUrlPart($sUrlPart, $bConvertToUTF8 = false) {

    if ($bConvertToUTF8) {
        $sUrlPart = utf8_encode($sUrlPart);
    }

    $sUrlPart = htmlentities($sUrlPart, ENT_COMPAT, "UTF-8", false); //make HTMLentities to remove accents
    $sUrlPart = preg_replace('#&szlig;#i', 'ss', $sUrlPart); //replace `ß` for `ss` (next row is not enough, replaces `ß` for `sz`)
    $sUrlPart = preg_replace('#&([a-z]{1,2})(?:acute|lig|grave|ring|tilde|uml|cedil|caron);#i', '\1', $sUrlPart); //remove accents
    $sUrlPart = html_entity_decode($sUrlPart, ENT_COMPAT, "UTF-8"); //decode to normal character again

    $sUrlPart = str_replace('\'', '', $sUrlPart); //remove all single quotes
    $sUrlPart = preg_replace('#[^a-z0-9-]+#i', '-', $sUrlPart); //replace all non alphanumeric characters and hyphens, with a hyphen
    $sUrlPart = preg_replace('#-+#', '-', $sUrlPart); //remove all double hyphens
    $sUrlPart = trim($sUrlPart, '-'); //remove hyphens at beginning and end of string

    $sUrlPart = strtolower($sUrlPart); //string to lower case characters
    return $sUrlPart;
}

/**
 *
 * @param type $sUrl
 * @param type $sData_string
 * @param string $sType
 * @return type 
 */
function _ws($sUrl,$sData_string,$sType){

    if($sType=="POST"){
           
        if(DEBUG == 1 && http_get('controller') != 'login'){
            _d($sUrl);
            _d($sData_string);
            _d($sType);
        }
    
     
        $oCh = curl_init($sUrl);                                                                      
        curl_setopt($oCh, CURLOPT_CUSTOMREQUEST, $sType);                                                                     
        curl_setopt($oCh, CURLOPT_POSTFIELDS, $sData_string);                                                                  
        curl_setopt($oCh, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($oCh, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($sData_string))                                                                       
        );

        $sResult = curl_exec($oCh);
        if(DEBUG == 1 && http_get('controller') != 'login'){
             _d($sResult);
        }
        
    }else{
        if(defined('CONT_LOGIN')){
            if(http_get('controller') != CONT_LOGIN && DEBUG == 1){
                _d($sUrl);
                _d($sType);
            }
        }
        
        $sResult = @file_get_contents($sUrl);
    }

    $oResult = json_decode($sResult);
    
    if(isset($oResult->status)){
        // Session expired
        if($oResult->status == 2){
            Profile::sessionExpired();
        }
    }else{
        //showWsError();
    }
    

    return $oResult;
}

/*****************/
/* MAP FUNCTIONS */
/*****************/
/**
 *
 * @param type $latRef
 * @param type $lonRef
 * @param type $lat2
 * @param type $lon2
 * @param type $unit
 * @return type 
 */
function distance($latRef, $lonRef, $lat2, $lon2, $unit) {
  $theta = $lonRef - $lon2;
  $dist = sin(deg2rad($latRef)) * sin(deg2rad($lat2)) +  cos(deg2rad($latRef)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $distArco = acos($dist);
  $distDeg = rad2deg($distArco);
  $iDistance = $distDeg * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($iDistance * 1.609344);
  } else if ($unit == "N") {
      return ($iDistance * 0.8684);
    } else {
        return $iDistance;
      }
}

/**
 *
 * @param type $lat1
 * @param type $lon1
 * @param type $lat2
 * @param type $lon2
 * @param type $x
 * @param type $y
 * @param type $unit 
 */
function distanceXY($latRef, $lonRef1, $lat2, $lon2, &$x, &$y, $unit) {
    $x = distance($latRef, $lonRef1, $latRef, $lon2, $unit);
    $y = distance($latRef, $lonRef1, $lat2, $lonRef1, $unit);
    
    $distance = distance($latRef, $lonRef1, $lat2, $lon2, $unit);
    
//    _d( $distance . ' >>>>> ' . $x . ' ---- ' . $y);
}

/**
 *
 * @param type $x
 * @param type $y
 * @param type $rx
 * @param type $ry
 * @param type $angulo 
 */
function rotacion($x, $y, &$rx,  &$ry,  $angulo, $isInverse=0){
    
    if(!$isInverse){
        $rx = $x*cos($angulo) - $y*sin($angulo);
        $ry = $x*sin($angulo) + $y*cos($angulo);
    // If the latitude is greater than the reference, I have to rotate to the other side (I change add per substract)
    }else{
        $rx = $x*cos($angulo) + $y*sin($angulo);
        $ry = $x*sin($angulo) - $y*cos($angulo);
    }
    
//    _d('Rotacion Prev: Angulo->' . $angulo. '  X:'. $x . ' ----- Y:' . $y);
//    _d('Rotacion: Angulo->' . $angulo. '  X:'. $rx . ' ----- Y:' . $ry);
}

/**
 *
 * @param type $lat1
 * @param type $lon1
 * @param type $lat2
 * @param type $lon2
 * @param type $unit
 * @return type 
 */
function getAngulo($lat1, $lon1, $lat2, $lon2, $unit) {
    // seno a = cat. op / hipotenusa
    $angulo = asin(distance($lat1, $lon1, $lat2, $lon1, $unit)/distance($lat1, $lon1, $lat2, $lon2, $unit));
    return $angulo;
}

/**
 *
 * @param type $dX
 * @param type $dY
 * @param type $refX
 * @param type $refY 
 */
function getTopLeft($dXMeters,$dYMeters,$totalXMeters,$totalYMeters,&$iPixelsX,&$iPixelsY){
    // Nueva X/Y
    $iPixelsX = MAP_IMG_WIDTH  * $dXMeters / $totalXMeters;
    $iPixelsY = MAP_IMG_HEIGHT * $dYMeters / $totalYMeters;

//    _d('Meters: ' . $dX . ' ---- ' . $dY);
//    _d('Pixels: ' .$iPixelsX . ' ---- ' . $iPixelsY);
}

/************************/
/* INVERSE MAP FUNTIONS */
/************************/
/**
 *
 * @param type $dX
 * @param type $dY
 * @param type $refX
 * @param type $refY 
 */
function getTopLeftInverse(&$dXMeters,&$dYMeters,$totalXMeters,$totalYMeters,$iPixelsX,$iPixelsY){
    // Antiguo X/Y
    $dXMeters = ($totalXMeters * $iPixelsX) / MAP_IMG_WIDTH;
    $dYMeters = ($totalYMeters * $iPixelsY) / MAP_IMG_HEIGHT;
}


/**
 *
 * @param type $latRef
 * @param type $lonRef
 * @param type $lat2
 * @param type $lon2
 * @param type $unit
 * @return type 
 */
function distanceInverseLat($latRef, $lonRef, &$lat2,$iDistanceY, $unit) {
        $unit = strtoupper($unit);
    if ($unit == "K") {
        $iDistanceNew = ($iDistanceY / 1.609344);
    } else if ($unit == "N") {
        $iDistanceNew = ($iDistanceY / 0.8684);
    } else {
        $iDistanceNew = $iDistanceY;
    } 
    
    $distDeg = $iDistanceNew /(60 * 1.1515);
    $distArco = deg2rad($distDeg);
    $dist = cos($distArco);
    $theta = $lonRef - $lonRef;
    $lat2 = rad2deg(deg2rad($latRef) - acos($dist));
}


/**
 *
 * @param type $latRef
 * @param type $lonRef
 * @param type $lat2
 * @param type $lon2
 * @param type $unit
 * @return type 
 */
function distanceInverseLon($latRef, $lonRef, &$lon2,$iDistanceX, $unit) {
    $unit = strtoupper($unit);
    if ($unit == "K") {
        $iDistanceNew = ($iDistanceX / 1.609344);
    } else if ($unit == "N") {
        $iDistanceNew = ($iDistanceX / 0.8684);
    } else {
        $iDistanceNew = $iDistanceX;
    } 
    
    $distDeg = $iDistanceNew /(60 * 1.1515);
    $distArco = deg2rad($distDeg);
    $dist = cos($distArco);
    
    $theta = rad2deg(acos(($dist - sin(deg2rad($latRef)) * sin(deg2rad($latRef))) / (cos(deg2rad($latRef)) * cos(deg2rad($latRef)))));
    $lon2 = $lonRef - $theta;
}


/**
 *
 * @param type $x
 * @param type $y
 * @param type $rx
 * @param type $ry
 * @param type $angulo 
 */
function rotacionInverse($x, $y, &$rx,  &$ry,  $anguloA, $isInverse=false){
    
    $angulo = -$anguloA;
    if(!$isInverse){
        $rx = $x*cos($angulo) - $y*sin($angulo);
        $ry = $x*sin($angulo) + $y*cos($angulo);
    // If the latitude is greater than the reference, I have to rotate to the other side (I change add per substract)
    }else{
        $rx = $x*cos($angulo) + $y*sin($angulo);
        $ry = $x*sin($angulo) - $y*cos($angulo);
    }
    
//    _d('Rotacion Prev: Angulo->' . $angulo. '  X:'. $x . ' ----- Y:' . $y);
//    _d('Rotacion: Angulo->' . $angulo. '  X:'. $rx . ' ----- Y:' . $ry);
}

?>
