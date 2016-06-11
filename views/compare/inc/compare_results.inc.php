<section class="table-comparation">
    <div class="column-row cf ">
        <div class="column-100">
            <h3><?= _t('Comparation:') ?></h3>
        </div>
    </div>
        <div class="column-row cf ">
            <header class="cf">
                <div class="column-50 float-left no-margin-bottom">
                    <?= $oHeaderTableComparation[0] ?>
                </div>
                <div class="column-25 float-left no-margin-bottom align-center">
                    <?= $oHeaderTableComparation[1] ?>
                </div>
                <div class="column-25 float-left no-margin-bottom align-center">
                    <?= $oHeaderTableComparation[2] ?>
                </div>
            </header>
        </div>
    
    <? foreach($aTableComparation AS $oRow){ ?>
        
            <div class="column-row cf">
                <article class="<?= ($i%2 != 0 ? 'pair' :'odd') ?> cf">
                <div class="column-50 float-left no-margin-bottom">
                    <?= $oRow[0] ?>
                </div>
                <div class="column-25 float-left no-margin-bottom align-center">
                    <?= $oRow[1] ?>
                </div> 
                <div class="column-25 float-left no-margin-bottom align-center">
                    <?= $oRow[2] ?>
                </div>
                </article>
            </div>
        
    <? } ?>
    <br />
</section>