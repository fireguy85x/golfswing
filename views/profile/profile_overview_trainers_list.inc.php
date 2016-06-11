<div class="column-row cf ">
    <div class="column-100">
        <h4><?= _t('FOUND USERS') ?></h4>
    </div>
</div>
<div class="column-row cf ">
    <div class="table column-100 profile-list">
        <div class="thead">
            <div class="tr cf">
                <div class="column-10 float-left no-margin-bottom">
                    <div class="th">
                        <?= _t('Picture:') ?>
                    </div>
                </div>
                <div class="column-16 float-left no-margin-bottom">
                    <div class="th">
                        <?= _t('Name:') ?>
                    </div>
                </div>
                <div class="column-33 float-left no-margin-bottom">
                    <div class="th">
                        <?= _t('Surname:') ?>
                    </div>
                </div>
                <div class="column-33 float-left no-margin-bottom">
                    <div class="th">
                        <?= _t('Email:') ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="tbody">
            <? if(!empty($aFoundUsers)){?>
                <? foreach($aFoundUsers AS $oTrainer){  ?>
                    <div class="accepted-trainer">
                        <div class="tr cf">
                            <div class="column-10 float-left no-margin-bottom">
                                a
                                <figure>
                                    <img src="" />
                                </figure>
                            </div>
                            <div class="column-16 float-left no-margin-bottom">
                                <?= $oTrainer->name?>
                            </div>
                            <div class="column-33 float-left no-margin-bottom">
                                <?= $oTrainer->surname?>
                            </div>
                            <div class="column-33 float-left no-margin-bottom">
                                <?= $oTrainer->email?>
                            </div>
                            <div class="float-left no-margin-bottom">
                                <form class="invite-form" method="POST" action="/<?= http_get('language')?>/<?= http_get('controller')?>/trainers">
                                    <input type="hidden" name="action-trainers" value="invite-trainer" />
                                    <input type="hidden" name="trainerId" value="<?= $oTrainer->trainerId ?>" />
                                    <a href="#" class="invite-trainer action-icon eye-icon"></a>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                <? } ?>
            <? } ?>
        </div>
    </div>
</div>

<script>
    $(".invite-trainer").click(function(e){
        $(this).closest('form').submit();
        e.preventDefault();
    });
</script>