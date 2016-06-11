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
                <? foreach($aFoundUsers AS $oUser){  ?>
                    <div class="accepted-trainer">
                        <div class="tr cf">
                            <div class="column-10 float-left no-margin-bottom">
                                a
                                <figure>
                                    <img src="" />
                                </figure>
                            </div>
                            <div class="column-16 float-left no-margin-bottom">
                                <?= $oUser->name?>
                            </div>
                            <div class="column-33 float-left no-margin-bottom">
                                <?= $oUser->surname?>
                            </div>
                            <div class="column-33 float-left no-margin-bottom">
                                <?= $oUser->email?>
                            </div>
                            <div class="float-left no-margin-bottom">
                                <form class="compare-form" method="POST" action="">
                                    <input type="hidden" name="action" value="ajax-compare" />
                                    <input type="hidden" name="userId" value="<?= $oUser->userId ?>" />
                                    <a class="compare-selection action-icon eye-icon"></a>
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
    $(".compare-selection").click(function(){
        $.post($(this).closest('form').attr('action'), $(this).closest('form').serialize()).done(function( data ) {
            $("#comparation-table").fadeOut('fast',function(){
                $(this).fadeIn('fast').html(data);
            })
        });
    });
</script>