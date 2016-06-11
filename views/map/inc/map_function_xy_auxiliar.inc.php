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

$sJson = file_get_contents(DOCUMENT_ROOT . '/json/points_auxiliar.json');
$aArrayJson = json_decode($sJson,true);

foreach($aArrayJson['Points'] AS $aPoint){
    
    $oPoint = new stdClass();
    
    $iPixelsX = $aPoint['x'];
    $iPixelsY = $aPoint['y'];
    // Desplazamiento eje X
    if($iPixelsX < 0){
        $oPoint->x = 0;
    }elseif($iPixelsX > MAP_IMG_WIDTH){
        $oPoint->x = MAP_IMG_WIDTH;
    }else{
        $oPoint->x = $iPixelsX;
    }
    
    // Desplazamiento eje Y
    if($iPixelsY < 0){
        $oPoint->y = 0;
    }elseif($iPixelsY > MAP_IMG_HEIGHT){
        $oPoint->y = MAP_IMG_HEIGHT;
    }else{
        $oPoint->y = $iPixelsY; 
    }
       
        
    $aPoints[] = $oPoint;
}

?>