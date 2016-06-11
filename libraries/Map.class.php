<?php

class Map{
    
    /**
     *
     * @return type 
     */
    public static function getLastRound($iIdSession){
        $sUrl = URI_WS . '/RoundManager/round/lastround/'. $iIdSession;
        $sJson = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @return type 
     */
    public static function getRoundById($iIdSession,$iRoundId){
        $sUrl = URI_WS . '/RoundManager/round/roundbyid/'. $iIdSession . '/' .$iRoundId;
        $sJson = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    
    /**
     *
     * @return type 
     */
    public static function getHole($iIdSession,$roundId,$holeId){
        $sUrl = URI_WS . '/RoundManager/round/gettrajectory/'. $iIdSession . '/' .$roundId . '/' .$holeId;
        $sJson = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @return type 
     */
    public static function getRounds($iIdSession){
        $sUrl = URI_WS . '/RoundManager/round/roundlist/'. $iIdSession;
        $sJson = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @return type 
     */
    public static function getRoundsPendingReview($iIdSession){
        $sUrl = URI_WS . '/RoundManager/round/valroundlist/'. $iIdSession;
        $sJson = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @return type 
     */
    public static function getCourseList($iIdSession){
        $sUrl = URI_WS . '/RoundManager/round/courselist/'. $iIdSession;
        $sJson = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @param type $aData
     * @return type 
     */
    public static function editHole($aData){
        $sUrl = URI_WS . '/RoundManager/round/updtrajectory';
        $sJson = (json_encode($aData));
        $sType = "POST";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @param type $aData
     * @return type 
     */
    public static function editRound($aData){
        $sUrl = URI_WS . '/RoundManager/round/updroundinfo';
        $sJson = (json_encode($aData));
        $sType = "POST";

        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @param type $iIdSession
     * @return type 
     */
    public static function getClubTypesList($iIdSession){
        $sUrl = URI_WS . '/RoundManager/round/clubtypes/' . $iIdSession;
        $sJson = (json_encode(array())); 
        $sType = "GET";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @param type $iIdSession
     * @return type 
     */
    public static function notifyError($aData){
        $sUrl = URI_WS . '/UManagement/user/outdatemapping';
        $sJson = (json_encode($aData)); 
        $sType = "POST";
        
        return _ws($sUrl,$sJson,$sType);
    }
}

?>