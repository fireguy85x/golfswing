<div class="accuracy">
    <div class="column-row cf">
        <div class="column-50 float-left">
            <h3><?= _t('Green') ?></h3>
            <article class="relative green">
                <div class="floating-text top"><?= $oStatistics->greenAccuracy->large ?>%</div>
                <div class="floating-text bottom"><?= $oStatistics->greenAccuracy->short ?>%</div>
                <div class="floating-text left"><?= $oStatistics->greenAccuracy->left ?>%</div>
                <div class="floating-text right"><?= $oStatistics->greenAccuracy->right ?>%</div>
                <div class="floating-text center"><?= $oStatistics->greenAccuracy->hit ?>%</div>
                <img src="<?= IMAGES_FOLDER . '/statistics/statistics-general-accuracy-green.png' ?>" />
            </article>
        </div>
        <div class="column-50 float-right fairway">
            <h3><?= _t('Fairways') ?></h3>
            <article class="relative">
                <div class="floating-text top-left"><?= $oStatistics->fairwaysAccuracy->left ?>%</div>
                <div class="floating-text center"> <?= $oStatistics->fairwaysAccuracy->hit ?>%</div>
                <div class="floating-text top-right"> <?= $oStatistics->fairwaysAccuracy->right ?>%</div>
                <img src="<?= IMAGES_FOLDER . '/statistics/statistics-general-accuracy-fairway.png' ?>" />
            </article>
        </div>
    </div>
</div>