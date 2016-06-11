<section class="map-page">
    <div class="default-container-width cf">
        <h2>
            <?= _t('Rounds general') ?>
            <? if(1!=1){ ?>
                <span class="float-right">
                    <?= _t('DELETE ROUND') ?>
                    <a href="#">
                        <img src="<?= IMAGES_FOLDER . '/map/delete-icon-round.png' ?>" />
                    </a> 
                </span>
            <? } ?>
        </h2>
        <div class="column-row cf">
            <div class="column-100">
                <div class="default-container-width-page bg-white cf">
                    <? include 'inc/map_general_notifications.inc.php' ?>
                </div>
            </div>
        </div>
        
        <div class="default-container-width-page bg-white cf">
            <div class="column-row cf">
                <div class="map-overview-header cf">
                    <div class="column-50 float-left">
                        <? include 'inc/map_general_info.inc.php' ?>
                    </div>
                    <div class="column-50 float-right">
                        <? include 'inc/map_last_results.inc.php' ?>
                    </div>
                </div>
            </div>
            <div class="column-row cf">
                <div class="column-100">
                    <h3><?= _t('HOLES') ?><span> <?= _t('Total') ?> 1 | <?= _t('Pending validation') ?> 1 </span></h3>
                    <br />
                    <div class="column-row cf">
                        <? foreach($oRound->holes AS $iIndex => $oHole ){ ?>
                            <div class="column-16 float-left">
                                <div class="map-element-overview cf">
                                    <header><?= str_pad($iIndex + 1,2,'0',STR_PAD_LEFT) ?></header>
                                    <figure>
<!--                                        <img src="<?= $oHole->imagePath ?>" />-->
                                        <img src="<?= IMAGES_FOLDER ?>/map/map-overview-example.png" />
                                    </figure>
                                    <footer>
<!--                                        <span class="float-right action-icon save-icon"></span>-->
                                        <a href="/<?= http_get('language')?>/<?= http_get('controller')?>/detail?roundId=<?= $oRound->generalData->idRound ?>&holeId=<?= $oHole->id ?>" >
                                            <span class="float-right action-icon edit-icon"></span>
                                        </a>
                                        <? if(!$oHole->isValidated){?>
                                            <span class="float-right notify-red-icon"></span>
                                        <? } ?>
                                    </footer>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
