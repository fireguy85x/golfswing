<?php

class Model{
    
    /**
     * I check the form
     * I check the availability in the database
     * I save the form into the database on success and return tru
     * Otherwishw I return an array with all the erros
     * @return array
     */
    public static function saveSingleForm(){
        $aErrors = array();
        
        if(!isset($_POST['reservation-date']))
            $aErrors['reservation-date'] = 'reservation-date';
        if(!isset($_POST['access-point']))
            $aErrors['access-point'] = 'access-point';
        if(!isset($_POST['schedule']))
            $aErrors['schedule'] = 'schedule';
        if(!isset($_POST['email']))
            $aErrors['email'] = 'email';
        if(!isset($_POST['name']))
            $aErrors['name'] = 'name';
        if(!isset($_POST['surname']))
            $aErrors['surname'] = 'surname';
        if(!isset($_POST['birthdate']))
            $aErrors['birthdate'] = 'birthdate';  
        if(!isset($_POST['dni']))
            $aErrors['dni'] = 'dni';  
        if(!isset($_POST['accept']))
            $aErrors['accept'] = 'accept';
        
        if(empty($aErrors)){
            // Reservation data
            $aData['date'] = $_POST['reservation-date'];
            $aData['point'] = $_POST['access-point'];
            $aData['hour'] = $_POST['schedule'];
            $aData['members-amount'] = $_POST['extra-members-number'] + 1;
            
            // Personal info
            $aData['responsible']['name'] = $_POST['name'];
            $aData['responsible']['surname'] = $_POST['surname'];
            $aData['responsible']['birthday'] = $_POST['birthday'];
            $aData['responsible']['dni'] = $_POST['dni'];
            $aData['responsible']['phonecell'] = $_POST['mobile'];
            $aData['responsible']['phonefixed'] = $_POST['phone'];
            $aData['responsible']['email'] = $_POST['email'];
            
            
            foreach($_POST['name-em'] AS $sKey => $sExtraMemberName){
                $aData['members'][$sKey]['name'] = $sExtraMemberName;
            }
            foreach($_POST['surname-em'] AS $sKey => $sExtraMemberSurname){
                $aData['members'][$sKey]['surname'] = $sExtraMemberSurname;
            }
            foreach($_POST['birthday-em'] AS $sKey => $sExtraMemberBirthday){
                $aData['members'][$sKey]['birthdate'] = $sExtraMemberBirthday;
            }
            foreach($_POST['dni-em'] AS $sKey => $sExtraMemberDni){
                $aData['members'][$sKey]['dni'] = $sExtraMemberDni;
            }
            foreach($_POST['under-age-em'] AS $sKey => $sExtraMemberUnderage){
                $aData['members'][$sKey]['ismenor'] = $sExtraMemberUnderage;
            }
            _d($aData);
            exit();
            return true;
        }else{
           return $aErrors; 
        }
    }
    
    /**
     * I check the form
     * I check the availability in the database
     * I save the form into the database on success and return tru
     * Otherwishw I return an array with all the erros
     * @return array
     */
    public static function saveGeneralForm(&$sDialog = null){
        $aErrors = array();
        if(!isset($_POST['reservation-date']))
            $aErrors['reservation-date'] = 'reservation-date';
        if(!isset($_POST['access-point']))
            $aErrors['access-point'] = 'access-point';
        if(!isset($_POST['schedule']))
            $aErrors['schedule'] = 'schedule';
        if(!isset($_POST['email']))
            $aErrors['email'] = 'email';
        if(!isset($_POST['name']))
            $aErrors['name'] = 'name';
        if(!isset($_POST['surname']))
            $aErrors['surname'] = 'surname';
        if(!isset($_POST['birthdate']))
            $aErrors['birthdate'] = 'birthdate';  
        if(!isset($_POST['dni']))
            $aErrors['dni'] = 'dni';  
        if(!isset($_POST['accept']))
            $aErrors['accept'] = 'accept';
        
        if(empty($aErrors)){
            // Reservation data
            $aData['date'] = db_str(http_post('reservation-date',null));
            $aData['point'] = db_str(http_post('access-point',null));
            $aData['hour'] = db_str(http_post('schedule',null));
            $aData['members-amount'] = db_str(http_post('extra-members-number',null) + 1);
            
            // Personal info
            $aData['responsible']['name'] = db_str(http_post('name',null));
            $aData['responsible']['surname'] = db_str(http_post('surname',null));
            $aData['responsible']['birthdate'] = db_str(http_post('birthdate',null));
            $aData['responsible']['dni'] = db_str(http_post('dni',null));
            $aData['responsible']['phonecell'] = db_str(http_post('mobile',null));
            $aData['responsible']['phonefixed'] = db_str(http_post('phone',null));
            $aData['responsible']['email'] = db_str(http_post('email',null));
            
            for($iNumMember = 1;$iNumMember<=http_post('extra-members-number',null);$iNumMember++){
                $aMember['ismenor'] = isset($_POST['under-age-em'][$iNumMember]) ? db_str($_POST['under-age-em'][$iNumMember]) : null;
                $aMember['name'] = isset($_POST['name-em'][$iNumMember]) ? db_str($_POST['name-em'][$iNumMember]): null;
                $aMember['surname'] = isset($_POST['surname-em'][$iNumMember]) ? db_str($_POST['surname-em'][$iNumMember]) : null;
                $aMember['birthday'] = isset($_POST['birthdate-em'][$iNumMember]) ? db_str($_POST['birthdate-em'][$iNumMember]): null;
                $aMember['dni'] = isset($_POST['dni-em'][$iNumMember]) ? db_str($_POST['dni-em'][$iNumMember]):null ;
                
                $aData['members'][] = $aMember;
            }
            $url = 'http://94.247.31.128:8080/ReservesService/reserva/';
            /*$sJson = file_get_contents(('http://94.247.31.128:8080/ReservesService/reserva/'.  urlencode(json_encode($aData))));
            _d(('http://94.247.31.128:8080/ReservesService/reserva/'.  urlencode(json_encode($aData))));
            _d($sJson);
            exit();
            //set POST variables
            $url = 'http://94.247.31.128:8080/ReservesService/reserva/';
                  
            $data = array('name' => 'Hagrid', 'age' => '36');
            $data_string = json_encode($data);

            $result = file_get_contents($url, null, stream_context_create(array(
            'http' => array(
            'method' => 'POST',
            'header' => 'Content-Type: application/json' . "\r\n"
            . 'Content-Length: ' . strlen($data_string) . "\r\n",
            'content' => $data_string,
            ),
            ))); */
//                _d($_POST);
//                exit();
            
            $data_string = (json_encode($aData));  
            
            $ch = curl_init($url);                                                                      
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
                'Content-Type: application/json',                                                                                
                'Content-Length: ' . strlen($data_string))                                                                       
            );                                                                                                                   

            $sDialog = curl_exec($ch);
            return null;
        }else{
           return $aErrors; 
        }
    }
    
    /**
     * I check the form
     * I check the availability in the database
     * I save the form into the database on success and return tru
     * Otherwishw I return an array with all the erros
     * @return array
     */
    public static function saveGroupForm(){
        $aErrors = array();
        
        if(!isset($_POST['reservation-date']))
            $aErrors['reservation-date'] = 'reservation-date';
        if(!isset($_POST['access-point']))
            $aErrors['access-point'] = 'access-point';
        if(!isset($_POST['schedule']))
            $aErrors['schedule'] = 'schedule';
        if(!isset($_POST['email']))
            $aErrors['email'] = 'email';
        if(!isset($_POST['group-quantity']))
            $aErrors['group-quantity'] = 'group-quantity';
        if(!isset($_POST['name']))
            $aErrors['name'] = 'name';
        if(!isset($_POST['surname']))
            $aErrors['surname'] = 'surname';
        if(!isset($_POST['birthdate']))
            $aErrors['birthdate'] = 'birthdate';  
        if(!isset($_POST['dni']))
            $aErrors['dni'] = 'dni';  
        if(!isset($_POST['accept']))
            $aErrors['accept'] = 'accept';
        
        if(empty($aErrors)){
            ob_start();
            include VIEWS_FOLDER_PATH.DS.'includes'.DS.'email_tpl.inc.php'; 
            $oBody = ob_get_clean();
            MailManager::sendMail('ivanbenavides85@gmail.com', 'Nueva reserva de grupo', $oBody);
        }
        return $aErrors; 
    }
    
    /**
     * 
     * @param type $reservationId
     */
    public static function deleteReservation($reservationId){

        $sResult = @file_get_contents('http://94.247.31.128:8080/EliminarReserva/eliminar/'.$reservationId);
        return (empty($sResult) ? 'Se ha producido un error al elimar' : $sResult);
    }
}

?>
