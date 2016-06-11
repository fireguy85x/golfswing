<?php
/*
 * The procedure is
 * 1 - I get the reference top most-left corner of the map
 * 2 - I use to get the angle to rotate the image to set it paralell to the x-axis
 * 3 - I get the x/y values (in meters) of the current point to show. I use the distanceXY to get it
 * 3b - DistanceXY is a version of Distance which uses the same lat or long to get the X/Y
 * 4 - I rotate the point using the angle calculated previously
 * 5 - I use a normal "regla de 3" to calculate the correct top/left translation. I use the width/height of the
 *      image as reference to do it
 */

include 'includes/map_init_values.inc.php';

/***********/
/* START   */
/***********/
$aPoints = array();

//$sJson = file_get_contents(DOCUMENT_ROOT . '/json/points_1.json');
//$aArrayJson = json_decode($sJson,true);

//foreach($aArrayJson['Points'] AS $aPoint){
foreach($oHole->strokes AS $oPoint){

    // Inicio calculos de un punto concreto
    distanceXY($aTopLeft['lat'], $aTopLeft['lon'], $oPoint->latitude,  $oPoint->longitude, $iPointXmeters, $iPointYmeters, $unit);
    if($oPoint->latitude>$aTopLeft['lat']){
        $isInverse = true;
    }else{
        $isInverse = false;
    }
    rotacion($iPointXmeters, $iPointYmeters, $iNewXMeters,  $iNewYMeters,  $angulo,$isInverse);
    
    // Ahora calculo teniendo el nuevo X/Y
    getTopLeft($iNewXMeters,$iNewYMeters,$iTotalWidthMeters,$iTotalHeightMeters,$iPixelsX,$iPixelsY);
    
    $oPointAux = new stdClass();
    
    $oPointAux->inverse = $isInverse ? '1': '0';
    // Desplazamiento eje X
    if($iPixelsX < 0){
        $oPointAux->x = 0;
    }elseif($iPixelsX > MAP_IMG_WIDTH){
        $oPointAux->x = MAP_IMG_WIDTH;
    }else{
        $oPointAux->x = $iPixelsX;
    }
    
    // Desplazamiento eje Y
    if($iPixelsY < 0){
        $oPointAux->y = 0;
    }elseif($iPixelsY > MAP_IMG_HEIGHT){
        $oPointAux->y = MAP_IMG_HEIGHT;
    }else{
        $oPointAux->y = $iPixelsY; 
    }
        
    $oPointAux->id = $oPoint->id;
    $oPointAux->clubType = $oPoint->clubType;
    $oPointAux->idTrajectory = $oPoint->idTrajectory;
    $oPointAux->dropped = $oPoint->dropped;
    $oPointAux->penaltyCause = $oPoint->penaltyCause;
    $oPointAux->penalty = $oPoint->penalty;
    $oPointAux->latitude = $oPoint->latitude;
    $oPointAux->longitude = $oPoint->longitude;
    $aPoints[] = $oPointAux;
}

?>