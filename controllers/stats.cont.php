<?php

$oTemplate = new Template();

switch(http_get('action')){

    //***************
    // Default action
    //***************
    default:
        $oResult = Statistics::getGeneralStatistics(Profile::getIdSession());
        if($oResult->status){
            $oStatistics = $oResult->response;
        }
        
        //Show main page
        ob_start();
        include_once VIEWS_FOLDER_PATH.DS.'stats'.DS.'stats_overview.inc.php';
        $oTemplate->sContent =  ob_get_clean();
        $oTemplate->render();
    break;
    
}