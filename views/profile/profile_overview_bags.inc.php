<article class="block-bolsa block <?= http_get('action') == 'bags' ? '' : 'hide' ?>" >
    <div class="column-row cf ">
        <div class="column-100">
            <h2><?= _t('BAGS') ?></h2>
        </div>
    </div>
    
    <!-- Add golf club -->
    <div class="column-row cf ">
        <div class="column-100">
            <h3><?= _t('ADD BAG') ?></h3>
        </div>
    </div>
    
    <!-- Form -->
    <section>
        <form method="post" action="/<?= http_get('language') ?>/<?= http_get('controller') ?>/bags" class="validate">
            <? include DOCUMENT_ROOT . ELEMENTS_FOLDER . '/error_box.inc.php'; ?>
            <input type="hidden" name="action-bag" value="add-new-bag" />
            <div class="column-row cf ">
                <div class="column-50">
                    <label for="name"><?= _t('Bag name') ?></label> <br/>
                    <input type="text" id="name" class="required default"  name="name" title="<?= _t("Write the name of the bag") ?>" />
                </div>
            </div>
            <? if(!empty($oProfile->golfClubs)){?>
                <div class="column-row cf" >
                    <? for($iIndex=0;$iIndex<=13;$iIndex++){  ?>
                        <div class="column-20 float-left">
                            <label for="clubsId<?= $iIndex ?>" > <?= _t('Add golf club') . ' ' . str_pad($iIndex + 1,2,'0',STR_PAD_LEFT) ?>:</label><br/>
                            <select name="clubsId[<?= $iIndex ?>]" id="clubsId<?= $iIndex ?>" class="default">
                                <option value=""><?= _t('Select golf club')?></option>
                                <? if(!empty($oProfile->golfClubs)){?>
                                    <? foreach($oProfile->golfClubs AS $oGolfClub){ ?>
                                        <option value="<?= $oGolfClub->golfClubId ?>"><?= $oGolfClub->name ?></option>
                                    <? } ?>
                                <? } ?>
                            </select>
                        </div>
                    <? } ?>
                </div>
            <? }else{ ?>
                Add some golf clubs first
            <? } ?>
            
            <div class="column-row cf ">
                <div class="column-100 cf">
                    <input type="submit" name="saveGolfClub" class="read-more-small float-right" value="<?= _t('ADD BAG') ?>">
                </div>
            </div>
        </form>
    </section>
    
    <!-- Bags list -->
    <section>
        <div class="column-row cf ">
            <div class="column-100">
                <h3><?= _t('BAG LIST') ?></h3>
            </div>
        </div>
        
        <div class="column-row cf ">
            <div class="table column-100 profile-list">
                <div class="thead">
                    <div class="tr cf">
                        <div class="column-20 float-left no-margin-bottom">
                            <div class="th">
                                <?= _t('Name:') ?>
                            </div>
                        </div>
                        <div class="column-20 float-left no-margin-bottom">
                            <div class="th">
                                <?= _t('Golf Clubs:') ?>
                            </div>
                        </div>
                        <div class="column-20 float-left no-margin-bottom">
                            <div class="th">
                                <?= _t('Creation date:') ?>
                            </div>
                        </div>
                        <div class="column-33 float-right no-margin-bottom">
                            <div class="th">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tbody">
                    <? if(!empty($oProfile->bags)){?>
                        <? foreach($oProfile->bags AS $oBag){?>
                            <div class="subform">
                                <div class="tr cf">
                                    <div class="column-20 float-left no-margin-bottom">
                                        <?= $oBag->name ? $oBag->name  : "&nbsp;" ?>
                                    </div>
                                    <div class="column-20 float-left no-margin-bottom">
                                        <?= count($oBag->clubsId) ?>
                                    </div>
                                    <div class="column-20 float-left no-margin-bottom">
                                        <?= _t('2015/12/01') ?>
                                    </div>
                                    <div class="column-33 float-right no-margin-bottom">
                                        <div class="float-right">
                                            <span class="action-icon edit-icon"></span>
                                            <form method="POST" action="/<?= http_get('language') ?>/<?= http_get('controller') ?>/bags" style="display: inline-block">
                                                <input type="hidden" name="action-bag" value="delete-bag"/>
                                                <input type="hidden" name="bagId" value="<?= $oBag->bagId ?>"/>
                                                <a class="submit action-icon delete-icon" data-name="<?= $oBag->name ?>"></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Form -->
                                <section class="hide">
                                    <form method="post" action="/<?= http_get('language') ?>/<?= http_get('controller') ?>/bags" class="validate">
                                        <? include DOCUMENT_ROOT . ELEMENTS_FOLDER . '/error_box.inc.php'; ?>
                                        <input type="hidden" name="action-bag" value="edit-bag" />
                                        <input type="hidden" name="bagId" value="<?= $oBag->bagId ?>" />
                                        <div class="column-row cf ">
                                            <div class="column-50">
                                                <label for="name"><?= _t('Bag name') ?></label> <br/>
                                                <input type="text" name="name" id="name" class="required default" title="<?= _t("Write the name of the bag") ?>" value="<?= $oBag->name ?>"  />
                                            </div>
                                        </div>

                                        <div class="column-row cf" >
                                            <? for($iIndex=0;$iIndex<=13;$iIndex++){  ?>
                                                <div class="column-20 float-left">
                                                    <label for="clubsId<?= $iIndex ?>" > <?= _t('Add golf club') . ' ' . str_pad($iIndex + 1,2,'0',STR_PAD_LEFT) ?>:</label><br/>
                                                    <select name="clubsId[<?= $iIndex ?>]" id="clubsId<?= $iIndex ?>" class="default">
                                                        <option value=""><?= _t('Select golf club')?></option>
                                                        <? if(!empty($oProfile->golfClubs)){?>
                                                            <? 
                                                            $isFound = false;
                                                            foreach($oProfile->golfClubs AS $oGolfClub){ 

                                                                $sSelected = '';
                                                                $iKey = array_search($oGolfClub->golfClubId, $oBag->clubsId);
                                                                if($iKey !== false && empty($isFound)) {
                                                                    $isFound = true;
                                                                    $sSelected = 'SELECTED';
                                                                    unset($oBag->clubsId[$iKey]);
                                                                }
                                                            ?>
                                                            <option <?= $sSelected ?> value="<?= $oGolfClub->golfClubId ?>"><?= $oGolfClub->name ?></option>
                                                            <? } ?>
                                                        <? } ?>
                                                    </select>
                                                </div>
                                            <? } ?>
                                        </div>
                                        <div class="column-row cf ">
                                            <div class="column-100 cf">
                                                <a class="submit read-more-small float-right"><?= _t('UPDATE BAG') ?></a>
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
