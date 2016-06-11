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

/**
 *
 * @param type $lat1
 * @param type $lon1
 * @param type $lat2
 * @param type $lon2
 * @param type $unit
 * @return type 
 */
function distance($lat1, $lon1, $lat2, $lon2, $unit) {
  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}

/**
 *
 * @param type $lat1
 * @param type $lon1
 * @param type $lat2
 * @param type $lon2
 * @param type $x
 * @param type $y
 * @param type $unit 
 */
function distanceXY($lat1, $lon1, $lat2, $lon2, &$x, &$y, $unit) {
    $x = distance($lat1, $lon1, $lat1, $lon2, $unit);
    $y = distance($lat1, $lon1, $lat2, $lon1, $unit);
    
    $distance = distance($lat1, $lon1, $lat2, $lon2, $unit);
    
    _d( $distance . ' >>>>> ' . $x . ' ---- ' . $y);
    
}

/**
 *
 * @param type $x
 * @param type $y
 * @param type $rx
 * @param type $ry
 * @param type $angulo 
 */
function rotacion($x, $y, &$rx,  &$ry,  $angulo, $isInverse=false){
    
    if(!$isInverse){
        $rx = $x*cos($angulo) - $y*sin($angulo);
        $ry = $x*sin($angulo) + $y*cos($angulo);
    // If the latitude is greater than the reference, I have to rotate to the other side (I change add per substract)
    }else{
        $rx = $x*cos($angulo) + $y*sin($angulo);
        $ry = $x*sin($angulo) - $y*cos($angulo);
    }
    
    _d('Rotacion Prev: Angulo->' . $angulo. '  X:'. $x . ' ----- Y:' . $y);
    _d('Rotacion: Angulo->' . $angulo. '  X:'. $rx . ' ----- Y:' . $ry);
}

/**
 *
 * @param type $lat1
 * @param type $lon1
 * @param type $lat2
 * @param type $lon2
 * @param type $unit
 * @return type 
 */
function getAngulo($lat1, $lon1, $lat2, $lon2, $unit) {
    // seno a = cat. op / hipotenusa
    $angulo = asin(distance($lat1, $lon1, $lat2, $lon1, $unit)/distance($lat1, $lon1, $lat2, $lon2, $unit));
    return $angulo;
}

/**
 *
 * @param type $dX
 * @param type $dY
 * @param type $refX
 * @param type $refY 
 */
function getTopLeft($dX,$dY,$totalX,$totalY,&$iPixelsX,&$iPixelsY){
    // Nueva X/Y
    $iImgWidth = 800;
    $iImgHeight = 900;

    $iPixelsX = $iImgWidth  * $dX / $totalX;
    $iPixelsY = $iImgHeight * $dY / $totalY;

    _d('Meters: ' . $dX . ' ---- ' . $dY);
    _d('Pixels: ' .$iPixelsX . ' ---- ' . $iPixelsY);
}

/*************/
// Inicio todo
/**************/
$aTopRight['lat'] = 36.516511;  
$aTopRight['lon'] = -4.812606;

$aTopLeft['lat'] = 36.515103;     
$aTopLeft['lon'] = -4.814504;

$aBottomRight['lat'] = 36.514787;  
$aBottomRight['lon'] = -4.810643;  

$aBottomLeft['lat'] = 36.513379;   
$aBottomLeft['lon'] = -4.812542;

$unit = 'K';

$iTotalWidthMeters = distance($aTopLeft['lat'], $aTopLeft['lon'], $aTopRight['lat'], $aTopRight['lon'], $unit);
$iTotalHeightMeters = distance($aTopLeft['lat'], $aTopLeft['lon'], $aBottomLeft['lat'], $aBottomLeft['lon'], $unit);


$angulo = getAngulo($aTopLeft['lat'], $aTopLeft['lon'], $aTopRight['lat'], $aTopRight['lon'], $unit);

////////////////////
//distanceXY($aTopLeft['lat'], $aTopLeft['lon'], $aTopRight['lat'],  $aTopRight['lon'], $iPointXmeters, $iPointYmeters, $unit);
//
//rotacion($iPointXmeters, $iPointYmeters, $iNewXMeters,  $iNewYMeters,  $angulo);
//
//// Ahora calculo teniendo el nuevo X/Y
////    getTopLeft($iPointXmeters,$iPointYmeters,$iTotalWidthMeters,$iTotalHeightMeters,$iPixelsX,$iPixelsY);
//getTopLeft($iNewXMeters,$iNewYMeters,$iTotalWidthMeters,$iTotalHeightMeters,$iPixelsX,$iPixelsY);
