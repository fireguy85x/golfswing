<article class="block-palos block <?= http_get('action') == 'golf-clubs' ? '' : 'hide' ?>" >
    <div class="column-row cf ">
        <div class="column-100">
            <h2><?= _t('GOLF CLUBS') ?></h2>
        </div>
    </div>
    
    <section>
        <form method="post" action="/<?= http_get('language') ?>/<?= http_get('controller') ?>/golf-clubs" class="validate">
            <? include DOCUMENT_ROOT . ELEMENTS_FOLDER . '/error_box.inc.php'; ?>
            <input type="hidden" name="action-golf-club" value="add-new-golf-club" />
            <!-- Add golf club -->
            <div class="column-row cf ">
                <div class="column-100">
                    <h3><?= _t('ADD GOLF CLUB') ?></h3>
                </div>
            </div>

            <div class="column-row cf ">
                <div class="column-16 float-left">
                    <label for="name"><?= _t('Name') ?> *</label>
                    <input type="text" name="name" id="name" class="required default" />
                </div>
                <div class="column-16 float-left">
                    <label for="type"><?= _t('Type') ?> *</label>
                    <select name="type" id="type" class="required default">
                        <option value="">Select type</option>
                        <? foreach($oProfile->clubTypes AS $sType){ ?>
                            <option value="<?= $sType ?>"><?= $sType ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="column-16 float-left">
                    <label for="shaft"><?= _t('Shaft') ?> *</label>
                    <input type="text" class="default required" name="shaft" value=""/>
<!--                    <select name="shaft" id="shaft" class="required default">
                        <option value="">Select shaft</option>
                        <? foreach($oProfile->shafts AS $sShaft){ ?>
                            <option value="<?= $sShaft ?>"><?= $sShaft ?></option>
                        <? } ?>
                    </select>-->
                </div>
                <div class="column-16 float-left">
                    <label for="grades"><?= _t('Grades') ?> *</label>
                    <input type="text" name="grades" id="grades" class="required number default"/>
                </div>
                <div class="column-33 float-left">
                    <label for="rfid"><?= _t('Rfid') ?> *</label>
                    <input type="text" name="rfid" id="rfid" class="required default"/>
                </div>
            </div>

            <div class="column-row cf ">
                <div class="column-100 cf">
                    <input type="submit" name="saveGolfClub" class="read-more-small float-right" value="<?= _t('ADD GOLF CLUB') ?>" />
                </div>
            </div>
        </form>
    </section>

    
    <!-- Golf club list -->
    <section>
        <div class="column-row cf ">
            <div class="column-100">
                <h3><?= _t('GOLF CLUB LIST') ?></h3>
            </div>
        </div>

        <div class="column-row cf ">
            <div class="table column-100 profile-list">
                <div class="thead">
                    <div class="tr cf">
                        <div class="column-16 float-left no-margin-bottom">
                            <div class="th">
                                <?= _t('Name:') ?>
                            </div>
                        </div>
                        <div class="column-16 float-left no-margin-bottom">
                            <div class="th">
                                <?= _t('Type:') ?>
                            </div>
                        </div>
                        <div class="column-16 float-left no-margin-bottom">
                            <div class="th">
                                <?= _t('Shaft:') ?>
                            </div>
                        </div>
                        <div class="column-16 float-left no-margin-bottom">
                            <div class="th">
                                <?= _t('Grades:') ?>
                            </div>
                        </div>
                        <div class="column-20 float-left no-margin-bottom">
                            <div class="th">
                                <?= _t('RFID:') ?>
                            </div>
                        </div>
                        <div class="column-10 float-right no-margin-bottom">
                            <div class="th">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tbody">
                    <? if(!empty($oProfile->golfClubs)){ ?>
                        <? foreach($oProfile->golfClubs AS $oGolfClub){  ?>
                            <div class="subform">
                                <div class="tr cf">
                                    <div class="column-16 float-left no-margin-bottom">
                                        <?= $oGolfClub->name ?>
                                    </div>
                                    <div class="column-16 float-left no-margin-bottom">
                                        <?= $oGolfClub->type ?>
                                    </div>
                                    <div class="column-16 float-left no-margin-bottom">
                                        <?= $oGolfClub->shaft ?>
                                    </div>
                                    <div class="column-16 float-left no-margin-bottom">
                                        <?= $oGolfClub->grades ?>
                                    </div>
                                    <div class="column-20 float-left no-margin-bottom">
                                        <?= $oGolfClub->rfid ?>
                                    </div>
                                    <div class="column-10 float-right no-margin-bottom">
                                        <div class="float-right">
                                            <span class="action-icon edit-icon"></span>
                                            <form method="POST" action="/<?= http_get('language') ?>/<?= http_get('controller') ?>/golf-clubs" style="display: inline-block">
                                                <input type="hidden" name="action-golf-club" value="delete-golf-club"/>
                                                <input type="hidden" name="golfClubId" value="<?= $oGolfClub->golfClubId ?>"/>
                                                <a class="submit action-icon delete-icon" data-name="<?= $oGolfClub->name ?>"></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit part -->
                                <section class="hide">
                                    <form method="POST" action="/<?= http_get('language') ?>/<?= http_get('controller') ?>/golf-clubs" class="validate">
                                        <? include DOCUMENT_ROOT . ELEMENTS_FOLDER . '/error_box.inc.php'; ?>
                                        <input type="hidden" name="action-golf-club" value="edit-golf-club" />
                                        <input type="hidden" name="golfClubId" value="<?= $oGolfClub->golfClubId ?>" />
                                        <input type="hidden" name="bagId" value="<?= $oGolfClub->bagId ?>"/>
                                        <div class="column-row cf ">
                                            <div class="column-16 float-left">
                                                <label for="name"><?= _t('Name') ?></label>
                                                <input type="text" name="name" id="name" class="required default" value="<?= $oGolfClub->name ?>" />
                                            </div>
                                            <div class="column-16 float-left">
                                                <label for="type"><?= _t('Type') ?></label>
                                                <select name="type" id="type" class="required default">
                                                    <option value="">Select type</option>
                                                    <? if(!empty($oProfile->clubTypes)){?>
                                                        <? foreach($oProfile->clubTypes AS $sType){ ?>
                                                            <option <?= $oGolfClub->type == $sType ? 'SELECTED' : '' ?> value="<?= $sType ?>"><?= $sType ?></option>
                                                        <? } ?>
                                                    <? } ?>
                                                </select>
                                            </div>
                                            <div class="column-16 float-left">
                                                <label for="shaft"><?= _t('Shaft') ?></label>
                                                <input type="text" class="default required" name="shaft" value="<?= $oGolfClub->shaft ?>"/>
<!--                                                <select name="shaft" id="shaft" class="required default">
                                                    <option value="">Select shaft</option>
                                                    <? if(!empty($oProfile->shafts)){?>
                                                        <? foreach($oProfile->shafts AS $sShaft){ ?>
                                                            <option <?= $oGolfClub->shaft == $sShaft ? 'SELECTED' : '' ?> value="<?= $sShaft ?>"><?= $sShaft ?></option>
                                                        <? } ?>
                                                    <? } ?>
                                                </select>-->
                                            </div>
                                            <div class="column-16 float-left">
                                                <label for="grades"><?= _t('Grades') ?></label>
                                                <input type="text" name="grades" id="grades" class="required digits default" value="<?= $oGolfClub->grades ?>"/>
                                            </div>
                                            <div class="column-33 float-left">
                                                <label for="rfid"><?= _t('Rfid') ?></label>
                                                <input type="text" name="rfid" id="rfid" class="required default" value="<?= $oGolfClub->rfid ?>"/>
                                            </div>
                                        </div>

                                        <div class="column-row cf ">
                                            <div class="column-100 cf">
                                                <a class="submit read-more-small float-right"><?= _t('UPDATE GOLF CLUB') ?></a>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </div>
                        <? } ?>
                    <? } ?>
                </div>
            </div>
        </div>
    </section>
</article>
