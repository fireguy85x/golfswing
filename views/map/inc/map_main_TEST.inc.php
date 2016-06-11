<div class="bg-white">
<? 
include 'map_function_xy.inc.php';
?>
<div>

<div id="map" class="relative">
    <div class="map-container">
        <img src="<?= IMAGES_FOLDER ?>/map/map.jpg" />
    </div>
    <div class="map-info">
        <? foreach($aPoints AS $iKey => $oPoint){ ?>
            <img id="pin<?= $iKey ?>" data-pin="pin-<?= $iKey ?>" class="unselectable absolute pin draggable" src="<?= IMAGES_FOLDER ?>/map/map-pin.png" style="top:<?= $oPoint->y ?>px;left:<?=$oPoint->x ?>px "/>
        <? }?>
    </div>
</div>