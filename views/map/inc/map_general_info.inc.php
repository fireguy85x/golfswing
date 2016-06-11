<div class="general-info">
    <form method="POST">
        <input type="hidden" name="action-round" value="save-round" />
        <h3>
            <?= _t('GENERAL INFO') ?>
            <div class="float-right">
                <span class="action-icon save-icon"></span>
            </div>
        </h3>

        <!-- ROUND NAME -->
        <div class="cf column-row">
            <div class="column-33 float-left">
                <label class="float-right" ><?= _t('ROUND NAME') ?>:</label>
            </div>
            <div class="column-66 float-right">
                <div class="bottom-dashed">
                    <? 'Málaga campeonato Verano' ?>
                    <input type="text" name="roundName" value="<?=$oRound->generalData->roundName ?>" />
                </div>
            </div>
        </div>

        <!-- SOURCE NAME -->
        <div class="cf column-row">
            <div class="column-33 float-left">
                <label class="float-right" ><?= _t('COURSE NAME') ?>:</label>
            </div>
            <div class="column-66 float-right">
                <div class="bottom-dashed">
                    <select name="courseName">
                        <option val=""> <?= _t('SELECT GOLF COURSE') ?> </option>
                        <? foreach($oCourseList->response->data AS $oCourse){ ?>
                            <option val="<?= $oCourse->idCourse ?>"><?= $oCourse->courseName ?></option>
                        <? } ?>
                    </select>
                </div>
            </div>
        </div>


        <!-- CATEGORY -->
        <div class="cf column-row">
            <div class="column-33 float-left">
                <label class="float-right" ><?= _t('CATEGORY') ?>:</label>
            </div>
            <div class="column-66 float-right">
                <div class="bottom-dashed">
                    <select name="category">
                        <option value=""><?= _t('Select category') ?></option>
                        <? foreach($oRound->categoryValues AS $sValue){ ?>
                            <option <?= $sValue == $oRound->generalData->category ? 'SELECTED' : ''?> val="<?= $sValue ?>"><?= $sValue ?></option>
                        <? } ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- DATE -->
        <div class="cf column-row">
            <div class="column-33 float-left">
                <label class="float-right" ><?= _t('DATE') ?>:</label>
            </div>
            <div class="column-66 float-right">
                <div class="bottom-dashed">
                    <input type="text" placeholder="yyyy/mm/dd" name="date" value="<?= $oRound->generalData->date ?>" />
                    
                </div>
            </div>
        </div>

        <!-- CLIMATE -->
        <div class="cf column-row">
            <div class="column-33 float-left">
                <label class="float-right" ><?= _t('CLIMATE') ?>:</label>
            </div>
            <div class="column-66 float-right">
                <div class="bottom-dashed">
                    <select name="climate">
                        <option value=""><?= _t('Select climate') ?></option>
                        <? foreach($oRound->climateValues AS $sValue){ ?>
                            <option <?= $sValue == $oRound->generalData->climate ? 'SELECTED' : ''?> val="<?= $sValue ?>"><?= $sValue ?></option>
                        <? } ?>
                    </select>
                </div>
            </div>
        </div>
    </form>
    <div class="cf column-row">
        <div class="column-50 float-left">
            <p><?= _t('Share') ?></p>
            <!--    <a target='_blank' href='http://www.facebook.com/sharer.php' >
                <img src="<?= IMAGES_FOLDER . '/social/facebook.png'?>" />
            </a>-->
            <a target="_blank" href='http://twitter.com/intent/tweet?text=<?= Profile::getCurrentProfileName() ?> has played the <?= $oRound->generalData->courseName ?> and has obtained <?= $oRound->scoring->totalStrokes ?> points' >
                <img src="<?= IMAGES_FOLDER . '/social/twitter.png'?>" />
            </a>
        </div>
    </div>
</div>

<?
$sBottomJavascript = <<<EOT
<script>
    $('.save-icon').click(function(){
        $(this).closest('form').submit();
    })
</script>
EOT;

$oTemplate->addBottomJavascript($sBottomJavascript);

?>