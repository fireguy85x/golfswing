<section class="page" id="profile-page">
    <div class='default-container-width'>
        <!-- User profile -->
        <div class="column-row cf">
            <div class="column-100 page-title no-margin-bottom">
                <h2><?= _t('ROUNDS LIST') ?></h2>
            </div>
        </div>
        <div class="column-row">
            <div class="column-100 page-content">
                <div class="column-row cf ">
                    <div class="table column-100 profile-list">
                        <div class="thead">
                            <div class="tr cf">
                                <div class="column-25 float-left no-margin-bottom">
                                    <div class="th">
                                        <?= _t('Round name:') ?>
                                    </div>
                                </div>
                                <div class="column-50 float-left no-margin-bottom">
                                    <div class="th">
                                        &nbsp;
                                    </div>
                                </div>
                                <div class="column-25 float-right no-margin-bottom">
                                    <div class="th">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tbody">
                            <div class="tbody">
                                <? foreach($aRounds AS $oRound){  ?>
                                    <div class="accepted-trainer">
                                        <div class="tr cf">
                                            <div class="column-25 float-left no-margin-bottom">
                                                <?= $oRound->name ?>
                                            </div>
                                            <div class="column-50 float-left no-margin-bottom">
                                                &nbsp;
                                            </div>
                                            <div class="column-25 float-right no-margin-bottom">
                                                <div class="float-right">
                                                    <a href="/<?= http_get('language') ?>/<?= http_get('controller') ?>?param=<?= $oRound->id ?>" class="submit action-icon edit-icon" data-name=""></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <? } ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
