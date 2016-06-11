<? 

/* I need the variable
 * 
 * $aTable = All the data of the table (main array divided into "data" and "filterHeaders")
 * $sTitle = Title of the statistic
 */

Statistics::returnFiltersAndHeaders($aTable->data,$aTable->filterHeaders,$aFilters,$aHeaders);

?>

<div class="column-row cf ">
    <div class="column-100">
        <h2><?= _t($sTitle) ?></h2>
    </div>
</div>

<!-- Filter -->
<div class="column-row cf">
    <div class="column-100">
        <div class="default-container-width-page statistics-filter">
            <div>
                <?= _t('Select:') ?>
            </div>
            <? foreach($aFilters AS $sFilterName => $aFilter){ 
                $bIsYear = false;
            ?>
                <select data-filter="<?= prettyUrlPart($sTitle.$sFilterName) ?>" class="filter float-left">
                    <? foreach($aFilter AS $sKey => $sData){ 
                        if($sData == 'Year'){ 
                            $bIsYear = true;
                        } 
                    ?>
                        <option value='<?= $sKey != Statistics::EMPTY_VALUE ? $sData : ''?>'><?= $sData ?></option>
                    <? } ?>
                </select>
                <? if($bIsYear){ ?>
                    <span class="tooltip float-left" title="El valor nnnnR representa el resumen del año"></span>
                <? } ?>
            <? } ?>
        </div>
    </div>
</div>
<br />
<!-- Table -->
<div class="column-row cf">
    <div class="column-100">
        <div class="default-container-width-page statistics-filter">
            <table class="sorted cf">
                <thead>
                    <tr>
                        <? foreach($aHeaders AS $sHeader){ ?>
                            <th  class="<?= (isset($aTable->filterHeaders->$sHeader) && $aTable->filterHeaders->$sHeader == 0  ? 'hide ' : '' ) ?> <?= prettyUrlPart($sTitle.$sHeader) ?>"><?= _t($sHeader) ?></th>
                        <? } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($aTable->data AS $aRows){ ?>
                        <tr>
                            <?php foreach($aRows AS $sColumnName => $oData){ ?>
                            <td class="<?= (isset($aTable->filterHeaders->$sColumnName) && $aTable->filterHeaders->$sColumnName == 0  ? 'hide ' : '' ) ?>"><?= $oData ?></td>
                            <? } ?>
                        </tr>
                    <? } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>