<?php

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

if(!defined('MAP_IMG_WIDTH')){
    define('MAP_IMG_WIDTH',473);
}
if(!defined('MAP_IMG_HEIGHT')){
    define('MAP_IMG_HEIGHT',534);
}

$iTotalWidthMeters = distance($aTopLeft['lat'], $aTopLeft['lon'], $aTopRight['lat'], $aTopRight['lon'], $unit);
$iTotalHeightMeters = distance($aTopLeft['lat'], $aTopLeft['lon'], $aBottomLeft['lat'], $aBottomLeft['lon'], $unit);

$angulo = getAngulo($aTopLeft['lat'], $aTopLeft['lon'], $aTopRight['lat'], $aTopRight['lon'], $unit);


?>
