<?php

$oTemplate = new Template();

switch(http_get('action')){
   
    //***************
    // Default action
    //***************
    default:
        switch(http_post('user_action')){
            case 'cancel-user':
                $aData = http_post('userId');
                
                $oResult = Profile::cancelUser($aData);
                
                if(isset($oResult->status)){
                    $oTemplate->status = $oResult->status;
                    $oTemplate->statusText = $oResult->response;
                }
            break;
            case 'reactive-user':
                $aData = http_post('userId');
                $oResult = Profile::reactivateUser($aData);
                
                
                if(isset($oResult->status)){
                    $oTemplate->status = $oResult->status;
                    $oTemplate->statusText = $oResult->response;
                }
            break;
        }
        
        $oResult = Profile::getAllUsers();

        // If it was a success, I show the list, otherwise, I will show the response message
        $aFoundUsers = array();
        if (isset($oResult->status)) {
            if($oResult->status){
                $aFoundUsers = $oResult->response->data;
            }else{
                $oTemplate->status = $oResult->status;
                $oTemplate->statusText = $oResult->response;
            }
        }
        
        //Show main page
        ob_start();
        include_once ADMIN_VIEWS_FOLDER_PATH.DS.'home'.DS.'home.inc.php';
        $oTemplate->sContent =  ob_get_clean();
        $oTemplate->renderAdmin();
    break;
}

?>
