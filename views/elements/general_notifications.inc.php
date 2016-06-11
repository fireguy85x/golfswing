<div class="column-row cf general-notifications ">
    <div class="column-50 float-left no-margin-bottom general-notifications-item">
        <div class="">
            <img src="<?= IMAGES_FOLDER . '/general-exclamation.png' ?>" />
            <?= _t('There are ') ?> 
            <a class="red" href='/<?= http_get('language') ?>/alerts'>
                <span class="red"><?= Profile::getCurrentProfile()->alerts ?></span> 
            </a>
            <?= _t(' pending validation') ?>
            <a class="red" href='/<?= http_get('language') ?>/map/rounds?review=1'><?= _t('REVIEW »') ?></a>
        </div>
    </div>
    <div class="column-50 float-right no-margin-bottom general-notifications-item">
        <div class="">
            <img src="<?= IMAGES_FOLDER . '/general-calendar.png' ?>" />
            <?= _t('Last entry: ') ?><?= (Profile::getCurrentProfile()->lastAccess ) ?>
        </div>
    </div>
</div>