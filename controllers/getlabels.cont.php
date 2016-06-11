<?php

    include DOCUMENT_ROOT .'/plugins/php-google-translate-free-master/GoogleTranslate.class.php';
    

    /**
     * 
     * @param type $from_lan
     * @param type $to_lan
     * @param type $text
     * @return type
     */
    function translate($from_lan, $to_lan, $text){
        return GoogleTranslate::translate($from_lan, $to_lan, $text);
    }

    /**
     * 
     * @param type $sFolder
     */
    function scanDirsFolder($sFolder,$oFileHandler){
        $aDirs = scandir($sFolder);
        $sPattern = "#_t\([\'\"](.*?[^\)])[\'\"]\)#";
        
        foreach($aDirs AS $oElement){
            if(is_file($sFolder.  $oElement)){
                $oContent = file_get_contents($sFolder.  $oElement);
                preg_match_all($sPattern,$oContent,$aMatches);

                $oFileHandlerEs = fopen(DOCUMENT_ROOT . '/lang/es.lang.php','c');
                foreach($aMatches[1] AS $oLabel){
                    $sTextEn = '"' . $oLabel . '"' . '=>' . '"' . $oLabel . '",' ;
                    //$sTextEs = $oLabel . ':' . translate('en','es',$oLabel);
                    fwrite($oFileHandler,$sTextEn . "\r\n");
                    //fwrite($oFileHandlerEs,$sTextEs . "\r\n");
                }
                fclose($oFileHandlerEs);
                
            }elseif($oElement != '.' && $oElement != '..'){
                scanDirsFolder($sFolder. $oElement .DS,$oFileHandler);
            }
        }
    }
    
    // Init script
    $sFolder =  '/views';
    $oFileHandler = fopen(DOCUMENT_ROOT . '/lang/en.lang.php','w');
    
    $sTextEn = '<?php $aLang = array(';
    
    fwrite($oFileHandler,$sTextEn . "\r\n");
    scanDirsFolder(DOCUMENT_ROOT . $sFolder . DS,$oFileHandler);
    
    $sTextEn = '); ?>';
    fwrite($oFileHandler,$sTextEn . "\r\n");
    fclose($oFileHandler);

    exit();
?>
