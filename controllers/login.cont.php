<?php

// If the user is already logged in, I redirect them to the current home page
if(Profile::getCurrentProfile() && http_get('action') != 'logout'){
    http_redirect('/' . http_get('language'));
}

$oTemplate = new Template();

switch(http_get('action')){
    case 'renew':
        ob_start();
        include_once VIEWS_FOLDER_PATH.DS.'login'.DS.'login_renew.inc.php';
        $oTemplate->sContent =  ob_get_clean();
        
        break;
    
    case 'password-forgotten':
        
        
        ob_start();
        include_once VIEWS_FOLDER_PATH.DS.'login'.DS.'login_passwordForgotten.inc.php';
        $oTemplate->sContent =  ob_get_clean();
        
        break;
    case 'logout':
        Profile::logout();
        ob_start();
        include_once VIEWS_FOLDER_PATH.DS.'login'.DS.'login_overview.inc.php';
        $oTemplate->sContent =  ob_get_clean();
        
        break;
    //***************
    // Default action
    //***************
    default:

        if(http_post('username') && http_post('password')){
//            if((http_post('username')!= 'Andres' || http_post('password') != 'Andres')
//                && (http_post('username')!= '2' || http_post('password') != '2')  
//                && (http_post('username')!= '11' || http_post('password') != '11')  
//                ){
//                $oTemplate->status = 0;
//                $oTemplate->statusText = 'User or password incorrect';
//            }else{
                $aData['username'] = http_post('username');
                $aData['password'] = http_post('password');

                // golfmanager
                $oResult = Profile::login($aData);
                //$oResult = Profile::loginOld($aData);

                $oTemplate->status = $oResult->status;
                $oTemplate->statusText = $oResult->response;
                
//            }
        }
        
        //Show main page
        ob_start();
        include_once VIEWS_FOLDER_PATH.DS.'login'.DS.'login_overview.inc.php';
        $oTemplate->sContent =  ob_get_clean();
        
    break;
}


$oTemplate->render();
?>
