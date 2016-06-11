<?php
$oTemplate = new Template();

switch(http_get('action')){

    //***************
    // Default action
    //***************
    default:
        
        //*******************
        // User profile
        //*******************
        switch(http_post('action-user-profile')){
            case 'ajax-check-username':
                $sResult = Profile::checkUsername(http_post('username'));
                die($sResult);
                break;
            case 'edit-user-profile':
                $aData['idSession'] = Profile::getIdSession();
                $aData['user'] = Profile::getCurrentProfile();
//                $aData['user']->birthday = http_post('birthday',0);
                $aData['user']->city = http_post('city');
                $aData['user']->handicap = http_post('handicap');
                $aData['user']->postalCode = http_post('postalCode');
//                $aData['user']->password = http_post('password',0);
                $aData['user']->nationality = http_post('nationality');
                $aData['user']->province = http_post('province');
                $aData['user']->phone = http_post('phone');
                $aData['user']->surname = http_post('surname');
                $aData['user']->name = http_post('name');
                $aData['user']->publicProfile = http_post('publicProfile',0);
                $aData['user']->profileCategory = http_post('profileCategory');
                $aData['user']->dni = http_post('dni');
                $aData['user']->email = http_post('email');
                $aData['user']->username = http_post('username');
                $aData['user']->isTrainer = http_post('isTrainer',0);
//                $aData['user']->"Invited players" = array();
                
                $oResult = (Profile::editProfile($aData));
                
                if($oResult->status){
                    $oTemplate->status = $oResult->status;
                    $oTemplate->statusText = 'Profile was updated';
                }
                break;
        }
        
        //*******************
        // Golf Clubs
        //*******************
        switch(http_post('action-golf-club')){
            // Add new golf club
            case 'add-new-golf-club':
                $aData['idSession'] = Profile::getIdSession();
                
                $aData['golfClub']['rfid'] = http_post('rfid');
                $aData['golfClub']['golfClubId'] = "";
                $aData['golfClub']['bagId'] = "";
                $aData['golfClub']['name'] = http_post('name');
                $aData['golfClub']['type'] = http_post('type');
                $aData['golfClub']['shaft'] = http_post('shaft');
                $aData['golfClub']['grades'] = http_post('grades');

                $oResult = (Profile::addNewGolfClub($aData));
                $oTemplate->status = $oResult->status;
                $oTemplate->statusText = $oResult->response;
            break;
        
            // Delete golf club
            case 'delete-golf-club':
                $aData['idSession'] = Profile::getIdSession();
                $aData['golfClubId'] = http_post('golfClubId');
                
                $oResult = (Profile::deleteGolfClub($aData['idSession'] ,$aData['golfClubId']));
                $oTemplate->status = $oResult->status;
                $oTemplate->statusText = $oResult->response;
            break;
        
            // Edit golf club
            case 'edit-golf-club':
                $aData['idSession'] = Profile::getIdSession();
                
                $aData['golfClub']['rfid'] = http_post('rfid');
                $aData['golfClub']['golfClubId'] = http_post('golfClubId');
                $aData['golfClub']['bagId'] = http_post('bagId');
                $aData['golfClub']['name'] = http_post('name');
                $aData['golfClub']['type'] = http_post('type');
                $aData['golfClub']['shaft'] = http_post('shaft');
                $aData['golfClub']['grades'] = http_post('grades');
                
                $oResult = (Profile::editGolfClub($aData));
                $oTemplate->status = $oResult->status;
                $oTemplate->statusText = $oResult->response;
            break;
        }
        
        //*******************
        // Bags
        //*******************
        switch(http_post('action-bag')){
            // Add new bag
            case 'add-new-bag':
                $aData['idSession'] = Profile::getIdSession();
                
                $aData['bag']['bagId'] = "";
                $aData['bag']['name'] = http_post('name');
                $aData['bag']['clubsId'] = array_values(array_filter(http_post('clubsId')));
                
                $oResult = (Profile::addNewBag($aData));
                $oTemplate->status = $oResult->status;
                $oTemplate->statusText = $oResult->response;
            break;
        
            // Delete bag
            case 'delete-bag':
                $aData['idSession'] = Profile::getIdSession();
                $aData['bagId'] = http_post('bagId');
                
                $oResult = (Profile::deleteBag($aData['idSession'],$aData['bagId']));
                $oTemplate->status = $oResult->status;
                $oTemplate->statusText = $oResult->response;
            break;
        
            // Edit bag
            case 'edit-bag':
                $aData['idSession'] = Profile::getIdSession();
                
                $aData['bag']['bagId'] = http_post('bagId');
                $aData['bag']['name'] = http_post('name');
                $aData['bag']['clubsId'] = array_values(array_filter(http_post('clubsId')));
                
                $oResult = (Profile::editBag($aData));
                $oTemplate->status = $oResult->status;
                $oTemplate->statusText = $oResult->response;
            break;
        }
        
        //*******************
        // Trainers
        //*******************
        switch(http_post('action-trainers')){
            // Ajax search trainer
            case 'ajax-search':
                $sTrainerSearchName = http_post('trainer-search-name');
                $sTrainerSearchSurname = http_post('trainer-search-surname'); 

                // If some of the values is empty, I set it to 0, to notice the ws that this is an empty value
                $sTrainerSearchName = empty($sTrainerSearchName) ? '0' : $sTrainerSearchName;
                $sTrainerSearchSurname = empty($sTrainerSearchSurname) ? '0' : $sTrainerSearchSurname;

                // I check that at least one of the fields is filled in
                if(!empty($sTrainerSearchName) || !empty($sTrainerSearchSurname)){
                    $oResult = Profile::getTrainersListByNameAndSurname(Profile::getIdSession(),$sTrainerSearchName,$sTrainerSearchSurname);

                    // If it was a success, I show the list, otherwise, I will show the response message
                    if($oResult->status){
                        $aFoundUsers = $oResult->response->data;
                        ob_start();
                        include_once VIEWS_FOLDER_PATH.DS.'profile'.DS.'profile_overview_trainers_list.inc.php';
                        $oResultHtml = ob_get_clean();;
                    }else{
                        $oResultHtml = $oResult->response;
                    }
                }else{
                    $oResultHtml = _t('Fill in in the fields');
                }

                die($oResultHtml);
            break;
            
            // Invite trainer
            case 'invite-trainer':
                
                $aData['idSession'] = Profile::getIdSession();
                $aData['trainerId'] = http_post('trainerId');

                
                $oResult = (Profile::inviteTrainer($aData));
                $oTemplate->status = $oResult->status;
                $oTemplate->statusText = $oResult->response;
            break;
        
            // Revoke invitation from a player to a trainer
            case 'revoke-invitation-from-player':
                
                $aData['idSession'] = Profile::getIdSession();
                $aData['trainerId'] = http_post('trainerId');

                
                $oResult = (Profile::revokeFromPlayerInvitation($aData));
                $oTemplate->status = $oResult->status;
                $oTemplate->statusText = $oResult->response;
            break;
        
            // Revoke invitation from a player to a trainer
            case 'revoke-invitation-from-trainer':
                
                $aData['idSession'] = Profile::getIdSession();
                $aData['playerId'] = http_post('playerId');

                
                $oResult = (Profile::revokeFromTrainerInvitation($aData));
                $oTemplate->status = $oResult->status;
                $oTemplate->statusText = $oResult->response;
            break;
        
            // Insert trainer code
            case 'insert-trainer-code':
                
                $aData['idSession'] = Profile::getIdSession();
                $aData['code'] = http_post('code');

                
                $oResult = (Profile::insertTrainerCode($aData));
                $oTemplate->status = $oResult->status;
                $oTemplate->statusText = $oResult->response;
            break;
        }

        $oProfile = Profile::getAndUpdateCurrentProfile();
        //Show main page
        ob_start();
        include_once VIEWS_FOLDER_PATH.DS.'profile'.DS.'profile_overview.inc.php';
        $oTemplate->sContent =  ob_get_clean();
        $oTemplate->render();
    break;
}

?>