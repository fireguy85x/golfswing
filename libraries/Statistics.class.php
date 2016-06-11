<?php

class Statistics{
    const EMPTY_VALUE = -1;
    
    /**
     *
     * @param type $aData
     * @param type $aFilterHeaders
     * @return type 
     */
    public static function returnFiltersAndHeaders($aData,$aFilterHeaders,&$aFilters,&$aHeaders){
        $aFilters = array();
        $aHeaders = array();
        
        // I manage the headers
        foreach($aData[0] AS $iHeader => $sValue){
            $aHeaders[] = $iHeader;
        }
        

        // I manage the filter now
        foreach($aData AS $aRow){
            foreach($aRow AS $iHeader => $sValue){
                if(array_key_exists($iHeader, (array)$aFilterHeaders)){
                    if(!isset($aFilters[$iHeader])){
                        $aFilters[$iHeader][Statistics::EMPTY_VALUE] = $iHeader;
                    }
                    $aFilters[$iHeader][$sValue] = $sValue;
                }
            }
        }

        // I make the filter with unique values
        foreach($aFilters AS &$aFilter){
            $aFilter = array_unique($aFilter);
            ksort($aFilter);
        }
    }
    
    /**
     *
     * @return type 
     */
    public static function getFairways($iIdSession){
        $sUrl = URI_WS . '/StatManagement/stat/getfairways/' . $iIdSession;
        $sData_string = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sData_string,$sType);
    }
    
    /**
     *
     * @return type 
     */
    public static function getGreenes($iIdSession){
        $sUrl = URI_WS . '/StatManagement/stat/getgreens/' .$iIdSession;
        $sData_string = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sData_string,$sType);
    }
    
    /**
     *
     * @return type 
     */
    public static function getPutt($iIdSession){
        $sUrl = URI_WS . '/StatManagement/stat/getputts/' .$iIdSession;
        $sData_string = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sData_string,$sType);
    }
    
    /**
     *
     * @return type 
     */
    public static function getScores($iIdSession){
        $sUrl = URI_WS . '/StatManagement/stat/getscoring/' . $iIdSession;
        $sData_string = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sData_string,$sType);
    }
    
    /**
     *
     * @return type 
     */
    public static function getScrambling($iIdSession){
        $sUrl = URI_WS . '/StatManagement/stat/getscramblings/' . $iIdSession;
        $sData_string = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sData_string,$sType);
    }
    
    /**
     *
     * @return type 
     */
    public static function getLengthTotalAverage($iIdSession){
        $sUrl = URI_WS . '/StatManagement/stat/distancebyclub/' . $iIdSession;
        $sData_string = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sData_string,$sType);
    }
    
    
    /**
     *
     * @return type 
     */
    public static function getLengthNearHole($iIdSession){
        $sUrl = URI_WS . '/StatManagement/stat/nearhole/' . $iIdSession;
        $sData_string = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sData_string,$sType);
    }
    
    /**
     *
     * @return type 
     */
    public static function getLengthPuttAverage($iIdSession){
        $sUrl = URI_WS . '/StatManagement/stat/puttsmetereage/' .$iIdSession;
        $sData_string = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sData_string,$sType);
    }
    
    /**
     *
     * @param type $iSessionId
     * @return type 
     */
    public static function getGeneralStatistics($iSessionId){
        $sUrl = URI_WS . '/UManagement/user/home/' . $iSessionId;
        $sData_string = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sData_string,$sType);
    }
    
    /**
     * 
     * @return type
     */
    public static function getRanking($iSessionId){
        $sUrl = URI_WS . '/UManagement/user/getranking/' .$iSessionId;
        $sJson = json_encode(array());
        $sType = "GET";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
}
?>
