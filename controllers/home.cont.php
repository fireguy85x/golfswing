<?php

if(!Profile::getCurrentProfile()){
    http_redirect('/'. http_get('language') .'/login/');
}

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
        
        $oResult = Statistics::getRanking(Profile::getIdSession());
        
        if($oResult->status){
            $aRanking = $oResult->response->date;
        }
        
        //Show main page
        ob_start();
        include_once VIEWS_FOLDER_PATH.DS.'home'.DS.'home.inc.php';
        $oTemplate->sContent =  ob_get_clean();
        $oTemplate->render();
    break;
}

?>
