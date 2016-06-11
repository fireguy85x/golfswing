<!-- Top profiles -->
<div class="column-row cf">
    <div class="column-100">
        <?= _t("TOP 5/RANKING DE JUGADORES"); ?>
    </div>
</div>

<? foreach($aRanking AS $iIndex => $oLine){ ?>
    <div class="column-row cf">
        <article class="<?= ($iIndex%2 != 0 ? 'pair' :'odd') ?> cf">
            <div class="column-50 float-left no-margin-bottom">
                <?= $oLine[0] ?>
            </div>
            <div class="column-25 float-left no-margin-bottom align-center">
                <?= $oLine[1] ?>
            </div> 
            <div class="column-25 float-left no-margin-bottom align-center">
                <?= $oLine[2] ?>
            </div>
        </article>
    </div>
<? } ?>