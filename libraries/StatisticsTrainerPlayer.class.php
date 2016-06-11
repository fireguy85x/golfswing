<?php

class StatisticsTrainerPlayer extends Statistics{
    const EMPTY_VALUE = -1;
    
    
    /**
     *
     * @return type 
     */
    public static function getFairways($iIdSession,$iIdPlayer){
        $sUrl = URI_WS . '/StatManagement/stat/getfairways_trainer/' . $iIdSession . '/' .$iIdPlayer;
        $sData_string = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sData_string,$sType);
    }
    
    /**
     *
     * @return type 
     */
    public static function getGreenes($iIdSession,$iIdPlayer){
        $sUrl = URI_WS . '/StatManagement/stat/getgreens_trainer/' .$iIdSession . '/' .$iIdPlayer;
        $sData_string = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sData_string,$sType);
    }
    
    /**
     *
     * @return type 
     */
    public static function getPutt($iIdSession,$iIdPlayer){
        $sUrl = URI_WS . '/StatManagement/stat/getputts_trainer/' .$iIdSession . '/' .$iIdPlayer;
        $sData_string = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sData_string,$sType);
    }
    
    /**
     *
     * @return type 
     */
    public static function getScores($iIdSession,$iIdPlayer){
        $sUrl = URI_WS . '/StatManagement/stat/getscoring_trainer/' . $iIdSession . '/' .$iIdPlayer;
        $sData_string = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sData_string,$sType);
    }
    
    /**
     *
     * @return type 
     */
    public static function getScrambling($iIdSession,$iIdPlayer){
        $sUrl = URI_WS . '/StatManagement/stat/getscramblings_trainer/' . $iIdSession . '/' .$iIdPlayer;
        $sData_string = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sData_string,$sType);
    }
    
    /**
     *
     * @return type 
     */
    public static function getLengthTotalAverage($iIdSession,$iIdPlayer){
        $sUrl = URI_WS . '/StatManagement/stat/distancebyclub_trainer/' . $iIdSession . '/' .$iIdPlayer;
        $sData_string = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sData_string,$sType);
    }
    
    
    /**
     *
     * @return type 
     */
    public static function getLengthNearHole($iIdSession,$iIdPlayer){
        $sUrl = URI_WS . '/StatManagement/stat/nearhole_trainer/' . $iIdSession . '/' .$iIdPlayer;
        $sData_string = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sData_string,$sType);
    }
    
    /**
     *
     * @return type 
     */
    public static function getLengthPuttAverage($iIdSession,$iIdPlayer){
        $sUrl = URI_WS . '/StatManagement/stat/puttsmetereage_trainer/' .$iIdSession . '/' .$iIdPlayer;
        $sData_string = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sData_string,$sType);
    }
}
?>
