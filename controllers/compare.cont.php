<?php

$oTemplate = new Template();

switch(http_get('action')){
    

   
    //***************
    // Default action
    //***************
    default:
        
        // AJAX MANAGEMENT
        switch( http_post('action')){
            // Ajax search by username to get the list of user to compare
            case 'ajax-search':
                $sProfileSearchName = http_post('profile-search-name');
                $sProfileSearchSurname = http_post('profile-search-surname'); 

                // If some of the values is empty, I set it to 0, to notice the ws that this is an empty value
                $sProfileSearchName = empty($sProfileSearchName) ? '0' : $sProfileSearchName;
                $sProfileSearchSurname = empty($sProfileSearchSurname) ? '0' : $sProfileSearchSurname;

                // I check that at least one of the fields is filled in
                if(!empty($sProfileSearchName) || !empty($sProfileSearchSurname)){
                    $oResult = Profile::getUsersListByNameAndSurname(Profile::getIdSession(),$sProfileSearchName,$sProfileSearchSurname);

                    // If it was a success, I show the list, otherwise, I will show the response message
                    if($oResult->status){
                        $aFoundUsers = $oResult->response->data;
                        ob_start();
                        include_once VIEWS_FOLDER_PATH.DS.'compare'.DS.'inc/compare_users_list.inc.php';
                        $oResultHtml = ob_get_clean();;
                    }else{
                        $oResultHtml = $oResult->response;
                    }
                }else{
                    $oResultHtml = _t('Fill in in the fields');
                }

                die($oResultHtml);
            break;
            
            // I compare the user selected and returns the table
            case 'ajax-compare':
                $iUserId = http_post('userId');

                // I check that at least one of the fields is filled in
                if(!empty($iUserId)){
                    $oResult = Profile::compareWithUser(Profile::getIdSession(),$iUserId);

                    // If it was a success, I show the list, otherwise, I will show the response message
                    if($oResult->status){
                        $aTableComparation = $oResult->response->data;
                        $oHeaderTableComparation = array_shift($aTableComparation);
                        ob_start();                    
                        include_once VIEWS_FOLDER_PATH.DS.'compare'.DS.'inc/compare_results.inc.php';
                        $oResultHtml = ob_get_clean();;
                    }else{
                        $oResultHtml = $oResult->response;
                    }
                }else{
                    $oResultHtml = _t('Wrong selection');
                }

                die($oResultHtml);
            break;
        }
        
        //Show main page
        ob_start();
        include_once VIEWS_FOLDER_PATH.DS.'compare'.DS.'compare_overview.inc.php';
        $oTemplate->sContent =  ob_get_clean();
        $oTemplate->render();
    break;
}

?> 
 