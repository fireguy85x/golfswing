<?php

class Tr{
    
    private static $instancia;
    private $aLang;
    private $sLanguage = 'en';
    
    /**
     * 
     */
    private function __construct()
    {
        $this->aLang = array();
    }

    /**
     * 
     * @param type $sLang
     * @return type
     */
    public static function getInstance()
    {
       if (  !self::$instancia instanceof self)
       {
          self::$instancia = new self;
       }
       
       return self::$instancia;
    }
    
    
    /**
     * 
     * @param type $sLang
     */
    public function loadLang($sLang){
        if(file_exists(DOCUMENT_ROOT . '/lang/' . $sLang. '.lang.php')){
            include DOCUMENT_ROOT . LANG_FOLDER .DS . $sLang .'.cont.php';
            include DOCUMENT_ROOT . '/lang/' . $sLang. '.lang.php';
        }else{
            include DOCUMENT_ROOT . LANG_FOLDER .DS . 'en.cont.php';
            include DOCUMENT_ROOT . '/lang/en.lang.php';
        }
        
        self::$instancia->aLang = $aLang;
        self::$instancia->sLanguage = $sLang;
    }
    
    
    /**
     * 
     * @param type $sLabel
     * @return type
     */
    public function getLabel($sLabel){
        if(isset($this->aLang[$sLabel])){
            return $this->aLang[$sLabel];
        }else{
            return $sLabel;
        }
    }
    
    
    /**
     * 
     * @param type $sFolder
     */
    private static function scanDirsFolder($sFolder,$oFileHandler,&$aResult){
        $aDirs = scandir($sFolder);
        $sPattern = "#_t\([\'\"](.*?[^\)])[\'\"]\)#";
        
        foreach($aDirs AS $oElement){
            if(is_file($sFolder.  $oElement)){
                $oContent = file_get_contents($sFolder.  $oElement);
                preg_match_all($sPattern,$oContent,$aMatches);

                $aResult = array_merge($aResult,$aMatches[1]);
            }elseif($oElement != '.' && $oElement != '..'){
                self::scanDirsFolder($sFolder. $oElement .DS,$oFileHandler,$aResult);
            }
        }
    }

    /**
     * 
     * @param type $from_lan
     * @param type $to_lan
     * @param type $text
     * @return type
     */
    public static function translate($from_lan, $to_lan, $text){
        $sText = GoogleTranslate::translate($from_lan, $to_lan, $text);
        
        // I replace that character in order to skip error in the creation of the array
        $sText = str_replace('"', ' ', $sText);
        
        return $sText;
    }
    
    /**
     * Add a language
     * @param type $sLanguage
     */
    public static function addLanguage($sLanguage){
        include_once DOCUMENT_ROOT .'/plugins/php-google-translate-free-master/GoogleTranslate.class.php';
    
        // Init script
        $aResult = array();
        $sFolder =  '/';
        $oFileHandler = fopen(DOCUMENT_ROOT . '/lang/' .$sLanguage .'.lang.php','w');

        // I first start the array
        $sText = '<?php $aLang = array(';
        fwrite($oFileHandler,$sText . "\r\n");
        
        // I get all the labels from the whole website
        self::scanDirsFolder(DOCUMENT_ROOT . $sFolder . DS,$oFileHandler,$aResult);
        foreach($aResult AS $oLabel){
            $sText = '"' . $oLabel . '"' . '=>' . '"' .($sLanguage == 'en' ? $oLabel: self::translate('en','es',$oLabel)) .'",';
            fwrite($oFileHandler,$sText . "\r\n");
        }
        
        // I end the array and write it
        $sText = "); ?>";
        fwrite($oFileHandler,$sText . "\r\n");
        fclose($oFileHandler);
    }
    
    
    /**
     * 
     */
    public static function duplicateLanguage(){
        exit();
        $sWhere = '';
        
            $sWhere .= (empty($sWhere) ? 'WHERE ':' AND ') . '`mi`.`languageId` = 1';
        
        
        $sQuery = " SELECT * FROM 
                        `menuItems` AS `mi`
                  " . $sWhere;
        
        $oDB = DBConnections::get();
        
        $aResult = $oDB->query($sQuery, QRY_OBJECT, 'MenuItem');
        
        foreach ($aResult AS $oItem){
            $sQuery = " INSERT INTO
                    `menuItems`
                    (
                        `languageId`,
                        `name`,
                        `link`,
                        `group`,
                        `online`,
                        `order`,
                        `inMenu`,
                        `level`,
                        `cssClass`
                    )
                    
                    VALUES
                    (
                        " . db_str(2) . ",
                        " . db_str($oItem->name) . ",
                        " . db_str($oItem->link) . ",
                        " . db_str($oItem->group) . ",
                        " . db_str($oItem->online) . ",
                        " . db_str($oItem->order) . ",
                        " . db_str($oItem->inMenu) . ",
                        " . db_str($oItem->level) . ",
                        " . db_str($oItem->cssClass) . "
                    )
              ";

            $oDB = DBConnections::get();

            $oDB->query($sQuery, QRY_NORESULT);
        }
        
        _d($aResult);
    }
}
?>
