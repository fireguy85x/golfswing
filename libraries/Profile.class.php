<?php

class Profile {
    
    const PROFESSIONAL = 'Profesional';
    const AMATEUR = 'Amateur';
    
    public $userId;
    public $name;
    public $surname;
    public $profilename;
    public $birthday;
    public $phone;
    public $email;
    public $password;
    public $address;
    public $postalCode;
    public $city;
    public $province;
    public $country;
    public $isTrainer;
    public $handicap;
    public $category;
    public $nationality;
    public $trainerProfileId;
    public $profileCategory;
    public $allowTrainer = 1; // 
    public $publicProfile = 1; // Is the profile visible for other users?
    
    public $created;
    public $modified;
    public $online;
    private $invalidProps;
    
    /**
     * 
     */
    public function isValid(){
        
    }
    
    /**
     *
     * @return type 
     */
    public static function getCurrentProfileName(){
        return self::getCurrentProfile()->name . ' ' . self::getCurrentProfile()->surname;
    }
    
    /**
     *
     * @param type $sUsername
     * @param type $sPassword 
     */
    public static function loginOld($aData){
        if($aData['username']== 'Andres' || $aData['password'] == 'Andres'){
            $iProfile = 1;
        }elseif($aData['username']== '2' || $aData['password'] == '2'){
            $iProfile = 2;
        }else{
            $iProfile = 11;
        }
        $aProfile = self::getProfile($iProfile);
        

        if($aProfile->status){
            $_SESSION['currentProfile'] = $aProfile->response->user;
            $_SESSION['idSession'] = $aProfile->response->idSession;
            
        }else{
            return $aProfile;
        }

        http_redirect('/' . http_get('language'). '/');
    }
    
/**
 * 
 * @param type $sJson
 * @return type
 */
    public static function login($aData){
        $sUrl = URI_WS . '/UManagement/user/login/' ;
        $sJson = json_encode($aData);  
        $sType = "POST";
        
        $aProfile  = _ws($sUrl,$sJson,$sType);

        if($aProfile->status){
            $_SESSION['currentProfile'] = $aProfile->response->user;
            $_SESSION['idSession'] = $aProfile->response->idSession;
        }else{
            return $aProfile;
        }

        http_redirect('/' . http_get('language'). '/');
    }
    
    

    
    /** 
     * 
    */
    public static function logout(){
        unset($_SESSION['currentProfile']);
        unset($_SESSION['idSession']);
        
        http_redirect('/' . http_get('language') . '/' . http_get('controller') . '/');
    }
    
    /**
     * 
    */
    public static function getCurrentProfile(){
        return http_session('currentProfile');
    }
    
    /**
     * 
    */
    public static function sessionExpired(){
        Profile::logout();
    }
    
    /**
     * 
    */
    public static function getAndUpdateCurrentProfile(){
        $aProfile = self::getProfile(self::getIdSession());
        
        if($aProfile->status){
            $_SESSION['idSession'] = $aProfile->response->idSession;
            $_SESSION['currentProfile'] = $aProfile->response->user;
        }
        
        return http_session('currentProfile');
    }
    
    /**
     * 
    */
    public static function getIdSession(){
        return http_session('idSession');
    }
 
    /**
     *
     * @param type $iProfileId
     * @return type 
     */
    public static function getProfile($iProfileId){
        $sUrl = URI_WS . '/UManagement/user/user/' .$iProfileId ;
        $sJson = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @param type $iProfileId
     * @return type 
     */
    public static function checkUsername($sUsername){
        $sUrl = URI_WS . '/UManagement/user/checkusername/' .$sUsername ;
        $sJson = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    
    /**
     *
     * @param type $aData
     * @return type 
     */
    public static function createNewProfile($aData){
        $sUrl = URI_WS . '/UManagement/user/newuser';
        $sJson = (json_encode($aData));
        $sType = "POST";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @param type $aData
     * @return type 
     */
    public static function editProfile($aData){
        $sUrl = URI_WS . '/UManagement/user/upduser';
        $sJson = (json_encode($aData));
        $sType = "POST";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @param type $sJson
     * @return type 
     */
    public static function addNewGolfClub($aData){
        $sUrl = URI_WS . '/UManagement/user/newclub/' ;
        $sJson = (json_encode($aData));  
        $sType = "POST";
                        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @param type $sJson
     * @return type 
     */
    public static function editGolfClub($aData){
        $sUrl = URI_WS . '/UManagement/user/updclub/' ;
        $sJson = (json_encode($aData));  
        $sType = "POST";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @param type $sJson
     * @return type 
     */
    public static function deleteGolfClub($iSessionId,$iGolfClubId){
        $sUrl = URI_WS . '/UManagement/user/delclub/' .$iSessionId . '/' .$iGolfClubId  ;
        $sJson = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @param type $sJson
     * @return type 
     */
    public static function addNewBag($aData){
        $sUrl = URI_WS . '/UManagement/user/addbag/' ;
        
        
        $sJson = (json_encode($aData));  
        $sType = "POST";
        
        return _ws($sUrl,$sJson,$sType);
        
    }
    
    /**
     *
     * @param type $sJson
     * @return type 
     */
    public static function editBag($aData){
        $sUrl = URI_WS . '/UManagement/user/updbag/' ;
        $sJson = (json_encode($aData));  
        $sType = "POST";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @param type $sJson
     * @return type 
     */
    public static function deleteBag($iSessionId,$iBagId){
        $sUrl = URI_WS . '/UManagement/user/delbag/' .$iSessionId . '/' .$iBagId  ;
        $sJson = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @param type $sJson
     * @return type 
     */
    public static function inviteTrainer($aData){
        $sUrl = URI_WS . '/UManagement/user/invite' ;
        $sJson = (json_encode($aData));  
        $sType = "POST";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @param type $sJson
     * @return type 
     */
    public static function revokeFromPlayerInvitation($aData){
        $sUrl = URI_WS . "/UManagement/user/revoke_from_player";
        $sJson = (json_encode($aData));  
        $sType = "POST";
        

        return _ws($sUrl,$sJson,$sType);
    }
    
     /**
     *
     * @param type $sJson
     * @return type 
     */
    public static function revokeFromTrainerInvitation($aData){
        $sUrl = URI_WS . "/UManagement/user/revoke_from_trainer";
        $sJson = (json_encode($aData));  
        $sType = "POST";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @param type $sJson
     * @return type 
     */
    public static function insertTrainerCode($aData){
        $sUrl = URI_WS . "/UManagement/user/acceptinvitation";
        $sJson = (json_encode($aData));  
        $sType = "POST";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @param type $sName
     * @param type $sSurname
     * @return type 
     */
    public static function getUsersListByNameAndSurname($idSession,$sName,$sSurname){
        $sUrl = URI_WS . '/UManagement/user/userlist/' . $idSession .'/'. $sName. '/' . $sSurname;
        $sJson = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    
    /**
     * Return the table with the  comparasion among the two users
     * @param type $sName
     * @param type $sSurname
     * @return type 
     */
    public static function compareWithUser($idSession,$idUserToCompare){
        $sUrl = URI_WS . '/UManagement/user/comparison/'.$idSession.'/'.$idUserToCompare;
        $sJson = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     *
     * @param type $sName
     * @param type $sSurname
     * @return type 
     */
    public static function getTrainersListByNameAndSurname($idSession,$sName,$sSurname){
        $sUrl = URI_WS . '/UManagement/user/trainerlist/' . $idSession .'/'. $sName. '/' . $sSurname;
        $sJson = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /* ADMIN FUNCTIONS */
    
    /**
     * 
     * @return type
     */
    public static function getAllUsers(){
        $sUrl = URI_WS . '/UManagement/user/allusers';
        $sJson = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     * 
     * @return type
     */
    public static function getCancelledUsers(){
        $sUrl = URI_WS . '/UManagement/user/cancelledusers';
        $sJson = (json_encode(array()));  
        $sType = "GET";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     * 
     * @return type
     */
    public static function cancelUser($aData){
        $sUrl = URI_WS . '/UManagement/user/cancel';
        $sJson =$aData;
        $sType = "POST";
        
        return _ws($sUrl,$sJson,$sType);
    }
    
    /**
     * 
     * @return type
     */
    public static function reactivateUser($aData){
        $sUrl = URI_WS . '/UManagement/user/reactivate';
        $sJson =$aData;
        $sType = "POST";
        
        return _ws($sUrl,$sJson,$sType);
    }

}
?>
