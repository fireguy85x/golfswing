<div class="default-container-width">
    <div class="stats-overview">
        <!-- General statistics -->
        <div class="column-row cf">
            <div class="column-100 no-margin-bottom">
                <h2><?= _t('Statistics /') ?></h2>
                <div class="bg-white">
                    <? include DOCUMENT_ROOT . ELEMENTS_FOLDER . '/general_statistics.inc.php' ?>
                </div>
            </div>
        </div>
        
        <!-- Accuracy graphics -->
        <div class="column-row cf">
            <div class="column-100 no-margin-bottom bg-accuracy">
                <? include DOCUMENT_ROOT . ELEMENTS_FOLDER . '/general_accuracy_statistics.inc.php' ?>
            </div>
        </div>
        
        <!-- Statistics menu -->
        <div class="column-row cf">
            <div class="column-100 bg-white no-margin-bottom">
                <div class="default-container-width-page">
                    <?php include 'inc/stats_menu.inc.php' ?>
                </div>
            </div>
        </div>
        
        <!-- Fairways -->
        <div class="block-fairways block bg-white" >
            <? 
    //                $aTable = $oResult->response;
//                    $aTable = json_decode(file_get_contents(DOCUMENT_ROOT . '/templates/files/json/table-fairways.json'));
                $oResult = (Statistics::getFairways(Profile::getIdSession()));
                if($oResult->status){
                    $aTable = $oResult->response; 
                    $sTitle = _t('Fairways');
                    include 'inc/stats_overview_table.inc.php';
                }else{
                    echo $oResult->response;
                }
            ?>
        </div>
        
        <!-- Greenes -->
        <div class="block-greenes block bg-white hide" >
            <? 
                $oResult = (Statistics::getGreenes(Profile::getIdSession()));
                if($oResult->status){
                    $aTable = $oResult->response; 
    //                $aTable = json_decode(file_get_contents(DOCUMENT_ROOT . '/templates/files/json/table-greenes.json'));
                    $sTitle = _t('Greenes');
                    include 'inc/stats_overview_table.inc.php';
                }else{
                    echo $oResult->response;
                }
            ?>
        </div>
        
        <!-- Putt -->
        <div class="block-putt block bg-white hide" >
            <? 
                $oResult = (Statistics::getPutt(Profile::getIdSession()));
                if($oResult->status){
                    $aTable = $oResult->response;
    //                $aTable = (file_get_contents(DOCUMENT_ROOT . '/templates/files/json/table-putt.json'));
                    $sTitle = _t('Putt');
                    include 'inc/stats_overview_table.inc.php';
                }else{
                    echo $oResult->response;
                }
            ?>
        </div>
        
        <!-- Scores -->
        <div class="block-scores block bg-white hide" >
            <? 
                $oResult = (Statistics::getScores(Profile::getIdSession()));
                if($oResult->status){
                    $aTable = $oResult->response;
                    //$aTable = (file_get_contents(DOCUMENT_ROOT . '/templates/files/json/table-scores.json'));
                    $sTitle = _t('Scores');
                    include 'inc/stats_overview_table.inc.php';
                }else{
                    echo $oResult->response;
                }
            ?>
        </div>
        
        <!-- Scrambling -->
        <div class="block-scrambling block bg-white hide" >
            <? 
                $oResult = (Statistics::getScrambling(Profile::getIdSession()));
                if($oResult->status){
                    $aTable = $oResult->response;
    //                $aTable = (file_get_contents(DOCUMENT_ROOT . '/templates/files/json/table-scrambling.json'));
                    $sTitle = _t('Scrambling');
                    include 'inc/stats_overview_table.inc.php';
                }else{
                    echo $oResult->response;
                }
            ?>
        </div>
        
        <!-- Length -->
        <div class="block-length block bg-white hide" >
            <? 
                $oResult = (Statistics::getLengthTotalAverage(Profile::getIdSession()));
                if($oResult->status){
                    $aTable = $oResult->response;
    //                $aTable = (file_get_contents(DOCUMENT_ROOT . '/templates/files/json/table-length-total-average.json'));
                    $sTitle = _t('Length - Total Average');
                    include 'inc/stats_overview_table.inc.php';
                }else{
                    echo $oResult->response;
                }
                
                $oResult = (Statistics::getLengthNearHole(Profile::getIdSession()));
                if($oResult->status){
                    $aTable = $oResult->response;
    //                $aTable = (file_get_contents(DOCUMENT_ROOT . '/templates/files/json/table-length-average-near-hole.json'));
                    $sTitle = _t('Length - Average near hole');
                    include 'inc/stats_overview_table.inc.php';
                }else{
                    echo $oResult->response;
                }
                
                $oResult = (Statistics::getLengthPuttAverage(Profile::getIdSession()));
                if($oResult->status){
                    $aTable = $oResult->response;
    //                $aTable = (file_get_contents(DOCUMENT_ROOT . '/templates/files/json/table-length-putt-average.json'));
                    $sTitle = _t('Length - Putt average');
                    include 'inc/stats_overview_table.inc.php';
                }else{
                    echo $oResult->response;
                }
            ?>
        </div>

         
    </div>
</div>



<? 

$sBottomJavascript =<<<EOT
<script>
    $('.statistics-menu-item a').click(function(e){
        $('.statistics-menu-item').removeClass('active');
        $(this).parent('.statistics-menu-item').addClass('active');

        $('.block').hide();
        
        $('.' + $(this).parent().data('class')).show();
        
        e.preventDefault();
    });
    
    var table = setTableSorterStuff();
    
    // Search in the columns
    $('select.filter').change(function(){
        table.column('.' + $(this).data('filter')).search( this.value ).draw();
    });
</script>
EOT;

$oTemplate->addBottomJavascript($sBottomJavascript);
?>