<section class="map_page">
    <div class="default-container-width cf">
        <h2><?= _t('Rounds') ?> / <?= 'Málaga campeonato Verano' ?> / <?= _t('Hole') ?> <?= $oHole->holeNumber ?> </h2>
        <div class="column-row cf">
            <div class="column-100">
                <div class="default-container-width-page bg-white cf">
                    <? include 'inc/map_detail_notifications.inc.php' ?>
                </div>
            </div>
        </div>
        <? include_once 'inc/map_main.inc.php' ?>
        <div class="cf column-row">
            <div class="column-100"> 
                <div class="cf map-info-footer">
                    <div class="column-50 no-margin-bottom float-left">
                            <a href="/<?= http_get('language') ?>/<?= http_get('controller') ?>/details?roundId=<?= http_get('roundId') ?>" class="float-left">
                                « <?= _t('BACK TO HOLE LIST') ?>
                            </a>
                            <? if($oHole->holeNumber > 1){ ?>
                                <a href="#" class="float-right">
                                   « <?= _t('HOLE') ?> <?= $oHole->holeNumber - 1 ?>
                                </a>
                            <? } ?>
                    </div>
                    <div class="column-50 no-margin-bottom float-left">
                            <? if($oHole->holeNumber > 1){ ?>
                                <a href="#" class="float-right">
                                   « <?= _t('HOLE') ?> <?= $oHole->holeNumber - 1 ?>
                                </a>
                            <? } ?>
                            <a href="#" >
                                <?= _t('HOLE') ?> <?= $oHole->holeNumber + 1 ?>
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>
