<div class="column-row cf general-notifications ">
    <div class="column-50 float-left no-margin-bottom general-notifications-item">
        <div class="">
            <img src="<?= IMAGES_FOLDER . '/general-exclamation.png' ?>" />
            <?= _t('There are ') ?> <span class="red"><?= Profile::getCurrentProfile()->alerts ?></span> <?= _t(' pending validation') ?>
            <a class="red" href='/<?= http_get('language') ?>/map/rounds?review=1'><?= _t('REVIEW »') ?></a>
        </div>
    </div>
    <div class="column-50 float-left no-margin-bottom general-notifications-item">
        <div>
            <a class="red" href="/<?= http_get('language') ?>/<?= CONT_ROUNDS ?>/rounds">
                <img src="<?= IMAGES_FOLDER . '/general-open-folder.png' ?>" />
                <?= _t('Open round') ?>
            </a>
        </div>
    </div>
</div> 