<article class="block-trainers block <?= http_get('action') == 'trainers' ? '' : 'hide' ?>" >
    <div class="column-row cf ">
        <div class="column-100">
            <h2><?= _t('TRAINERS') ?></h2>
        </div>
    </div>
    
    <!--------------------------->
    <!-- Accepted trainer list -->
    <!--------------------------->
    <section>
        <div class="column-row cf ">
            <div class="column-100">
                <h3><?= _t('TRAINER LIST') ?></h3>
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
                    <? if(!empty($oProfile->acceptedTrainers)){?>
                        <? foreach($oProfile->acceptedTrainers AS $oTrainer){  ?>
                            <div class="accepted-trainer">
                                <div class="tr cf">
                                    <div class="column-75 float-left no-margin-bottom">
                                        <?= $oTrainer->name ?>
                                        <?= $oTrainer->surname ?>
                                    </div>
<!--                                    <div class="column-50 float-left no-margin-bottom">
                                        <? _t('Falta enviarme el nombre del campo de golf:') ?>
                                    </div>-->
                                    <div class="column-25 float-right no-margin-bottom">
                                        <div class="float-right">
<!--                                            <span class="action-icon eye-icon"></span>-->
                                            <form method="POST" action="/<?= http_get('language') ?>/<?= http_get('controller') ?>/trainers" style="display: inline-block">
                                                <input type="hidden" name="action-trainers" value="revoke-invitation-from-player"/>
                                                <input type="hidden" name="trainerId" value="<?= $oTrainer->trainerId ?>"/>
                                                <a class="submit action-icon delete-icon" data-name="<?= $oTrainer->name ?>"></a>
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
                <h3><?= _t('PENDING ON VALIDATION TRAINER LIST') ?></h3>
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
                    <? if(!empty($oProfile->invitedTrainers)){?>
                        <? foreach($oProfile->invitedTrainers AS $oTrainer){  ?>
                            <div class="accepted-trainer">
                                <div class="tr cf">
                                    <div class="column-75 float-left no-margin-bottom">
                                        <?= $oTrainer->name ?>
                                        <?= $oTrainer->surname ?>
                                    </div>
<!--                                    <div class="column-50 float-left no-margin-bottom">
                                        <? _t('Falta enviarme el nombre del campo de golf:') ?>
                                    </div>-->
                                    <div class="column-25 float-right no-margin-bottom">
                                        <div class="float-right">
<!--                                            <span class="action-icon eye-icon"></span>-->
                                            <form method="POST" action="/<?= http_get('language') ?>/<?= http_get('controller') ?>/trainers" style="display: inline-block">
                                                <input type="hidden" name="action-trainers" value="revoke-invitation-from-player"/>
                                                <input type="hidden" name="trainerId" value="<?= $oTrainer->trainerId ?>"/>
                                                <a class="submit action-icon delete-icon" data-name="<?= $oTrainer->name ?>"></a>
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
    
    <!--------------------------->
    <!-- Add a trainer         -->
    <!--------------------------->
    <section>
        <div class="column-row cf ">
            <div class="column-100">
                <h3><?= _t('ADD A TRAINER') ?></h3>
            </div>
        </div>
        <form id="search-trainer" method="POST" action="">
            <input type="hidden" name="action-trainers" value="ajax-search" />
            <div class="column-row cf ">
                <div class="column-50 float-left">
                    <label for="trainer-search-name"><?= _t('Name') ?></label>
                    <input id="trainer-search-name" type="text" class="default" name="trainer-search-name" />
                </div>
                <div class="column-50 float-left">
                    <label for="trainer-search-surname"><?= _t('Surname') ?></label>
                    <input id="trainer-search-surname" type="text" class="default" name="trainer-search-surname" />
                </div>
            </div>
        </form>
        <div class="column-row cf ">
            <div class="column-100 float-left">
                <input id="search-button" type="button" value="<?= _t("SEARCH")?>" />
            </div>
        </div>

        <section id="found-trainers">
            
        </section>
    </section>
</article>
<? 
$sBottomJavascript =<<<EOT
   <script>
        $("#search-button").click(function(){
            $.post($("#search-trainer").attr('action'), $('#search-trainer').serialize()).done(function( data ) {
                $("#found-trainers").fadeOut('fast',function(){
                    $(this).fadeIn('fast').html(data);
                })
            });
        });
   </script>
EOT;

$oTemplate->addBottomJavascript($sBottomJavascript);
?>