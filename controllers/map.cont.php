<?php
$oTemplate = new Template();
switch(http_get('action')){
    // Detail hole of a map
    case 'detail':
        
        /**************************************/
        /* Depending on the action of the hole*/
        /**************************************/
        switch(http_post('action-hole')){
            case 'save-hole':
                break;
                include 'includes/map_init_values.inc.php';
                $oData = new stdClass();
                $oData->idSession = Profile::getIdSession();
                
                $oData->trajectory = new stdClass();
                $oData->trajectory->holeId = http_post('holeId');
                $oData->trajectory->idRound = http_post('idRound');
                $oData->trajectory->courseName = http_post('courseName');
                $oData->trajectory->roundName = http_post('roundName');
                $oData->trajectory->holeNumber = http_post('holeNumber');
                $oData->trajectory->par = http_post('par');
                $oData->trajectory->handicap = http_post('handicap');
                $oData->trajectory->metereage = http_post('metereage');
                $oData->trajectory->totalStrokes = http_post('totalStrokes');
                $oData->trajectory->scramblings = http_post('scramblings');
                $oData->trajectory->putts = http_post('putts');
                
                $aPinX = http_post('pin-x');
                $aPinY = http_post('pin-y');
                $aInverse = http_post('inverse');
                $aId = http_post('id');
                $aClubType = http_post('clubType');
                $aIdTrajectory = http_post('idTrajectory');
                $aDropped = http_post('dropped');
                $aPenaltyCause = http_post('penalty-cause');
                $aPenalty = http_post('penalty');
                
                // Calculo latitud y longitud de cada valor (hago el inverso)
                $oData->trajectory->strokes = array();
                foreach($aPinX AS $iKey => $iX){
                    $oPoint = new stdClass();
                    $oPoint->id = $aId[$iKey];
                    $oPoint->clubType = $aClubType[$iKey];
                    $oPoint->idTrajectory = $aIdTrajectory[$iKey];
                    $oPoint->dropped = $aDropped[$iKey];
                    $oPoint->penaltyCause = $aPenaltyCause[$iKey];
                    $oPoint->penalty = $aPenalty[$iKey];
                    
                    
                    $iPixelsX = $aPinX[$iKey];
                    $iPixelsY = $aPinY[$iKey];
                    getTopLeftInverse($iNewXMeters,$iNewYMeters,$iTotalWidthMeters,$iTotalHeightMeters,$iPixelsX,$iPixelsY);
                    
                    $isInverse = $aInverse[$iKey];
                    $iNewAngulo = $isInverse ? $angulo: -1 * $angulo;
                    
                    rotacion($iNewXMeters, $iNewYMeters, $iPointXmeters,  $iPointYmeters,  $iNewAngulo,$isInverse);
                    
                    // I don't need the rotation, I just need the distance between points
                    $aPoint = array();
                    //$aPoint['inverse'] = $isInverse;
                    distanceInverseLat($aTopLeft['lat'], $aTopLeft['lon'], $oPoint->latitude, $iPointYmeters, $unit);
                    distanceInverseLon($aTopLeft['lat'], $aTopLeft['lon'], $oPoint->longitude, $iPointXmeters, $unit);
                    
                    $oData->trajectory->strokes['stroke_' . ($iKey +1)] = $oPoint;
//                    $aPoints['Points'][] = $aPoint;
                }

//                _d($aPoints);
                

                  $oResult = Map::editHole($oData);
//                  exit();
//                _d($aPoints);
//                $sJson = file_get_contents(DOCUMENT_ROOT . '/json/points_1.json');
//                $aArrayJson = json_decode($sJson,true);
//                _d($aArrayJson);
                
//                $oF = fopen(DOCUMENT_ROOT . '/json/points_1.json',"w");
//                fputs($oF,  json_encode($aPoints));
////                exit();

            break;
            
            // Notify an error in the map
            case 'notify-error':
                $oData = new stdClass();
                $oData->idSession = Profile::getIdSession();
                $oData->comments = http_post('comments');
                $oData->roundId = http_get('roundId');
                $oData->holeNumber = http_post('holeNumber');
                
                $sResult = Map::notifyError($oData);
                
                $oTemplate->status = 1;
                $oTemplate->statusText = $sResult;
            break;
        }
        
        /**************************************/
        /*Normal flow no action on the hole*/
        /**************************************/
        // If I don't receive the round or hole, I show an error
        $iRoundId = http_get('roundId');
        $iHoleId = http_get('holeId');
        
        if(empty($iRoundId) || empty($iHoleId)){
            showHttpError(404);
        }
        
        $oResult = Map::getHole(Profile::getIdSession(),$iRoundId,$iHoleId);
        if(!$oResult->status){
            //showWsError();
        }
        
        $oHole = $oResult->response;
        
        $oResult = Map::getClubTypesList(Profile::getIdSession());
        if(!$oResult->status){
            //showWsError();
        }
        $oCulbTypesList = $oResult->response->data;
        
        //Show main page
        ob_start();
        include_once VIEWS_FOLDER_PATH.DS.'map'.DS.'map_hole.inc.php';
        $oTemplate->sContent =  ob_get_clean();
        $oTemplate->render();
        break;
    
    //***************   
    // All the rounds of a map
    //***************
    case 'rounds':
        //Show main page
        if(!http_get('review')){
            $oResult = Map::getRounds(Profile::getIdSession());
        }else{
            $oResult = Map::getRoundsPendingReview(Profile::getIdSession());
        }
        
        if(!$oResult->status){
            //showWsError();
        }
        
        
        $aRounds = $oResult->response->data;
        ob_start();
        include_once VIEWS_FOLDER_PATH.DS.'map'.DS.'map_overview.inc.php';
        $oTemplate->sContent =  ob_get_clean();
        $oTemplate->render();
        break;
    
    //***************
    // Default action
    //***************
    default:
        _d(Profile::getIdSession());
        if(!is_numeric(http_get('param'))){
            $oResult = Map::getLastRound(Profile::getIdSession());
        }else{
            $oResult = Map::getRoundById(Profile::getIdSession(),http_get('param'));
        }
        
        switch(http_post('action-round')){
            case 'save-round':
                $oData = new stdClass();
                $oData->idSession = profile::getIdSession();
                $oData->round = $oResult->response;
                $oData->round->generalData->date = http_post('date');
                $oData->round->generalData->roundName = http_post('roundName');
                $oData->round->generalData->courseName = http_post('courseName');
                $oData->round->generalData->category = http_post('category');
                $oData->round->generalData->climate = http_post('climate');

                
                Map::editRound($oData);
                break;
        }

        
        if(!$oResult->status){
            //showWsError();
        }
        $oRound = $oResult->response;

        $oCourseList = Map::getCourseList(Profile::getIdSession());
       
        if(!$oCourseList){
            //showWsError();
        }

        //Show main page
        ob_start();
        include_once VIEWS_FOLDER_PATH.DS.'map'.DS.'map_round.inc.php';
        $oTemplate->sContent =  ob_get_clean();
        $oTemplate->render();
    break;
    
}