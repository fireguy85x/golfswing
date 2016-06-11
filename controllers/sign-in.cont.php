<?php

// If the user is already logged in, I redirect them to the current home page
if(Profile::getCurrentProfile()){
    http_redirect('/' . http_get('language'));
}

$oTemplate = new Template();

switch (http_get('action')) {
    
    //***************
    // Default action
    //***************
    default:
        if(http_post('sign-in-action') == 'save'){
            $aData['idSession'] = '';
            $aData['user'] = new stdClass;
            $aData['user']->birthday = date('o/m/d');
            $aData['user']->city = http_post('city');
            $aData['user']->handicap = http_post('handicap');
            $aData['user']->postalCode = http_post('postalCode');
            $aData['user']->password = http_post('password',0);
            $aData['user']->address = http_post('address');
            $aData['user']->nationality = http_post('nationality');
            $aData['user']->province = http_post('province');
            $aData['user']->phone = http_post('phone');
            $aData['user']->surname = http_post('surname');
            $aData['user']->name = http_post('name');
            $aData['user']->publicProfile = http_post('publicProfile', 0);
            $aData['user']->profileCategory = http_post('profileCategory');
            $aData['user']->dni = http_post('dni');
            $aData['user']->email = http_post('email');
            $aData['user']->username = http_post('username');
            $aData['user']->isTrainer = http_post('isTrainer', 0);

            // Dump data
            $aData['user']->profileId = null;
            $aData['user']->lastAccess = "0000-00-00";
            $aData['user']->alerts = 0;

            $oResult = (Profile::createNewProfile($aData));

            if (isset($oResult->status)) {
                $oTemplate->status = $oResult->status;
                $oTemplate->statusText = $oResult->response;
            }
        }
        //Show main page
        ob_start();
        include_once VIEWS_FOLDER_PATH . DS . 'sign-in' . DS . 'sign-in.inc.php';
        $oTemplate->sContent = ob_get_clean();

        break;
}


$oTemplate->render();
?>
