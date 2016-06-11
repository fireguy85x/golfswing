<article class="block-trainerPlayers block <?= http_get('action') == 'trainerPlayers' ? '' : 'hide' ?>" >
    <div class="column-row cf ">
        <div class="column-100">
            <h2><?= _t('PLAYERS') ?></h2>
        </div>
    </div>
    
    <!--------------------------->
    <!-- Accepted player list -->
    <!--------------------------->
    <section>
        <div class="column-row cf ">
            <div class="column-100">
                <h3><?= _t('PLAYERS LIST') ?></h3>
            </div>
        </div>

        <div class="column-row cf ">
            <div class="table column-100 profile-list">
                <div class="thead">
                    <div class="tr cf">
                        <div class="column-75 float-left no-margin-bottom">
                            <div class="th">
                                <?= _t('Name:') ?>
                            </div>
                        </div>
<!--                        <div class="column-50 float-left no-margin-bottom">
                            <div class="th">
                                <? _t('Golf course:') ?>
                            </div>
                        </div>-->
                        
                        <div class="column-25 float-right no-margin-bottom">
                            <div class="th">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tbody">
                    <? if(!empty($oProfile->acceptedPlayers)){?>
                        <? foreach($oProfile->acceptedPlayers AS $oPlayer){  ?>
                            <div class="accepted-trainer">
                                <div class="tr cf">
                                    <div class="column-75 float-left no-margin-bottom">
                                        <?= $oPlayer->name ?>
                                        <?= $oPlayer->surname ?>
                                    </div>
<!--                                    <div class="column-50 float-left no-margin-bottom">
                                        <? _t('Falta enviarme el nombre del campo de golf:') ?>
                                    </div>-->
                                    <div class="column-25 float-right no-margin-bottom">
                                        <div class="float-right">
<!--                                            <span class="action-icon eye-icon"></span>-->
                                            <form method="POST" action="/<?= http_get('language') ?>/<?= http_get('controller') ?>/trainerPlayers" style="display: inline-block">
                                                <input type="hidden" name="action-trainers" value="revoke-invitation-from-trainer"/>
                                                <input type="hidden" name="playerId" value="<?= $oPlayer->playerId ?>"/>
                                                <a class="submit action-icon delete-icon" data-name="<?= $oPlayer->name ?>"></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                    <? } ?>
                </div>
            </div>
        </div>
    </section>
    
    <!------------------------------------->
    <!-- Pending validation trainer list -->
    <!------------------------------------->
    <section>
        <div class="column-row cf ">
            <div class="column-100">
                <h3><?= _t('PENDING ON VALIDATION PLAYERS LIST') ?></h3>
            </div>
        </div>

        <div class="column-row cf ">
            <div class="table column-100 profile-list">
                <div class="thead">
                    <div class="tr cf">
                        <div class="column-75 float-left no-margin-bottom">
                            <div class="th">
                                <?= _t('Name:') ?>
                            </div>
                        </div>
<!--                        <div class="column-50 float-left no-margin-bottom">
                            <div class="th">
                                <? _t('Golf course:') ?>
                            </div>
                        </div>-->
                        
                        <div class="column-25 float-right no-margin-bottom">
                            <div class="th">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tbody">
                    <? if(!empty($oProfile->invitedPlayers)){?>
                        <? foreach($oProfile->invitedPlayers AS $oPlayer){  ?>
                            <div class="accepted-trainer">
                                <div class="tr cf">
                                    <div class="column-75 float-left no-margin-bottom">
                                        <?= $oPlayer->name ?>
                                        <?= $oPlayer->surname ?>
                                    </div>
<!--                                    <div class="column-50 float-left no-margin-bottom">
                                        <? _t('Falta enviarme el nombre del campo de golf:') ?>
                                    </div>-->
                                    <div class="column-25 float-right no-margin-bottom">
                                        <div class="float-right">
                                            <!-- Formulario envio usuario -->
                                            <a class="fancyBoxLink" href="#form-user-<?= $oPlayer->trainerId ?>">
                                                <span class="action-icon eye-icon"></span>
                                            </a>
                                            <div id="form-user-<?= $oPlayer->trainerId ?>" class="hide">
                                                <form method="POST" action="/<?= http_get('language') ?>/<?= http_get('controller') ?>/trainerPlayers" style="display: inline-block">
                                                    <input type="hidden" name="action-trainers" value="insert-trainer-code"/>
                                                    <h3><?= _t('Insert code') ?></h3>
                                                    <br />
                                                    <input type="text" name="code" placeholder="<?= _t('Insert code')?>" value=""/>
                                                    <br /><br />
                                                    <input style='width: 100%' type="submit" value="<?= _t('Submit') ?>"/>
                                                </form>
                                            </div>
                                            
                                            <!-- Formulario revoke invitation -->
                                            <form method="POST" action="/<?= http_get('language') ?>/<?= http_get('controller') ?>/trainerPlayers" style="display: inline-block">
                                                <input type="hidden" name="action-trainers" value="revoke-invitation-from-trainer"/>
                                                <input type="hidden" name="playerId" value="<?= $oPlayer->playerId ?>"/>
                                                <a title="<?  ?>" class="submit action-icon delete-icon" data-name="<?= $oPlayer->name ?>"></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                    <? } ?>
                </div>
            </div>
        </div>
    </section>
</article>