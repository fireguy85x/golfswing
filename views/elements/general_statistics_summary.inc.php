<?
$aTable = json_decode(file_get_contents(DOCUMENT_ROOT . '/templates/files/json/table-general-summary.json'));

$aTable = $oStatistics->table;
$aHeaders = array_shift ($aTable);
$aFooter = array_pop($aTable);
?>

<!-- Table -->
<div class="column-row cf">
    <div class="column-100">
        <div class="default-container-width-page statistics-filter">
            <table class="sorted cf general-summary">
                <thead>
                    <tr>
                        <? foreach($aHeaders AS $iIndex => $sHeader){ ?>
                            <th <?= !$iIndex ? "class='align-left'" : '' ?>><?= _t($sHeader) ?></th>
                        <? } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($aTable AS $aRows){ ?>
                        <tr>
                            <?php foreach($aRows AS $iIndex => $oData){ ?>
                                <td <?= !$iIndex ? "class='align-left'" : '' ?>><?= $oData ?></td>
                            <? } ?>
                        </tr>
                    <? } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <? foreach($aFooter AS $iIndex => $sFooter){ ?>
                            <td <?= !$iIndex ? "class='align-left'" : '' ?>><?= _t($sFooter ) ?></td>
                        <? } ?>
                    </tr>
                </tfoot>
            </table> 
        </div>
    </div>
</div>


<? 

$sBottomJavascript =<<<EOT
<script>
    var table = setTableSorterStuff();
</script>
EOT;

$oTemplate->addBottomJavascript($sBottomJavascript);
?>