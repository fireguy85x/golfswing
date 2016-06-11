<?php

class LanguageManager {
    
    /**
     *
     * @param type $aFilter
     * @return type 
     */
    public static function getLanguagesByFilter($aFilter = array()){
        $sWhere = '';
        
        if(!isset($aFilter['showAll'])){
            $sWhere .= (empty($sWhere) ? 'WHERE ' : ' AND ') . '`l`.`online` = 1';
        }
        
        $sQuery = 'SELECT * FROM 
                        `languages` AS `l`
                   '. $sWhere;
        
        $oDb = DBConnections::get();
        
        return($oDb->query($sQuery, QRY_OBJECT, 'Language'));
    }
    
    /**
     * 
     * @param type $sAbbr
     */
    public static function getLanguageByAbbr($sAbbr){
        $sWhere = '';
        
        $sWhere .= (empty($sWhere) ? 'WHERE ' : ' AND ') . '`l`.`languageAbbr` = ' .db_str($sAbbr);
        
        $sQuery = 'SELECT * FROM 
                        `languages` AS `l`
                   '. $sWhere;
        
        $oDb = DBConnections::get();
        
        return($oDb->query($sQuery, QRY_UNIQUE_OBJECT, 'Language'));        
    }
}
?>
