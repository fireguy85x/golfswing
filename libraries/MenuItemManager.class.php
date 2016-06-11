<?php

include_once "MenuItem.class.php";

class MenuItemManager{
    
    /**
     *
     * @param type $aFilter
     * @return type 
     */
    public static function getMenuItemsByFilter($aFilter = array(),$aOrderBy = array("`mi`.`order`" => 'ASC')){
        $sWhere = '';
        
        if (!isset($aFilter['showAll'])){
            $sWhere .= (empty($sWhere) ? 'WHERE ':' AND ') . '`mi`.`online` = 1';
        }
        
        if (isset($aFilter['group'])){
            $sWhere .= (empty($sWhere) ? 'WHERE ':' AND ') . '`mi`.`group` = ' . db_str($aFilter['group']);
        }
        
        if (isset($aFilter['languageId'])){
            $sWhere .= (empty($sWhere) ? 'WHERE ':' AND ') . '`mi`.`languageId` = ' . db_str($aFilter['languageId']);
        }
        
        // Order by
        # handle order by
        $sOrderBy = '';
        if (count($aOrderBy) > 0) {
            foreach ($aOrderBy AS $sColumn => $sOrder) {
                $sOrderBy .= ($sOrderBy !== '' ? ',' : '') . $sColumn . ' ' . $sOrder;
            }
        }
        $sOrderBy = ($sOrderBy !== '' ? ' ORDER BY ' : '') . $sOrderBy;
        
        $sQuery = " SELECT * FROM 
                        `menuItems` AS `mi`
                  " . $sWhere .
                  $sOrderBy;
        
        $oDB = DBConnections::get();
        
        $aResult = $oDB->query($sQuery, QRY_OBJECT, 'MenuItem');
        
        return $aResult;
    }
    
/**
     *
     * @param type $aFilter
     * @return type 
     */
    public static function getMenuAdminItemsByFilter($aFilter = array(),$aOrderBy = array("`mi`.`order`" => 'ASC')){
        $sWhere = '';
        
        if (!isset($aFilter['showAll'])){
            $sWhere .= (empty($sWhere) ? 'WHERE ':' AND ') . '`mi`.`online` = 1';
        }
        
        if (isset($aFilter['languageId'])){
            $sWhere .= (empty($sWhere) ? 'WHERE ':' AND ') . '`mi`.`languageId` = ' . db_str($aFilter['languageId']);
        }
        
        // Order by
        # handle order by
        $sOrderBy = '';
        if (count($aOrderBy) > 0) {
            foreach ($aOrderBy AS $sColumn => $sOrder) {
                $sOrderBy .= ($sOrderBy !== '' ? ',' : '') . $sColumn . ' ' . $sOrder;
            }
        }
        $sOrderBy = ($sOrderBy !== '' ? ' ORDER BY ' : '') . $sOrderBy;
        
        $sQuery = " SELECT * FROM 
                        `menuAdminItems` AS `mi`
                  " . $sWhere .
                  $sOrderBy;
        
        $oDB = DBConnections::get();
        
        $aResult = $oDB->query($sQuery, QRY_OBJECT, 'MenuItem');
        
        return $aResult;
    }
}
?>
