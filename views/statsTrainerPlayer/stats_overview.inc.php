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
                $oResult = (StatisticsTrainerPlayer::getFairways(Profile::getIdSession(),$iTrainerPlayer));
                if($oResult->status){
                    $aTable = $oResult->response; 
                    $sTitle = 'Fairways';
                    include 'inc/stats_overview_table.inc.php';
                }else{
                    echo $oResult->response;
                }
            ?>
        </div>
        
        <!-- Greenes -->
        <div class="block-greenes block bg-white hide" >
            <? 
                $oResult = (StatisticsTrainerPlayer::getGreenes(Profile::getIdSession(),$iTrainerPlayer));
                if($oResult->status){
                    $aTable = $oResult->response; 
    //                $aTable = json_decode(file_get_contents(DOCUMENT_ROOT . '/templates/files/json/table-greenes.json'));
                    $sTitle = 'Greenes';
                    include 'inc/stats_overview_table.inc.php';
                }else{
                    echo $oResult->response;
                }
            ?>
        </div>
        
        <!-- Putt -->
        <div class="block-putt block bg-white hide" >
            <? 
                $oResult = (StatisticsTrainerPlayer::getPutt(Profile::getIdSession(),$iTrainerPlayer));
                if($oResult->status){
                    $aTable = $oResult->response;
    //                $aTable = (file_get_contents(DOCUMENT_ROOT . '/templates/files/json/table-putt.json'));
                    $sTitle = 'Putt';
                    include 'inc/stats_overview_table.inc.php';
                }else{
                    echo $oResult->response;
                }
            ?>
        </div>
        
        <!-- Scores -->
        <div class="block-scores block bg-white hide" >
            <? 
                $oResult = (StatisticsTrainerPlayer::getScores(Profile::getIdSession(),$iTrainerPlayer));
                if($oResult->status){
                    $aTable = $oResult->response;
                    //$aTable = (file_get_contents(DOCUMENT_ROOT . '/templates/files/json/table-scores.json'));
                    $sTitle = 'Scores';
                    include 'inc/stats_overview_table.inc.php';
                }else{
                    echo $oResult->response;
                }
            ?>
        </div>
        
        <!-- Scrambling -->
        <div class="block-scrambling block bg-white hide" >
            <? 
                $oResult = (StatisticsTrainerPlayer::getScrambling(Profile::getIdSession(),$iTrainerPlayer));
                if($oResult->status){
                    $aTable = $oResult->response;
    //                $aTable = (file_get_contents(DOCUMENT_ROOT . '/templates/files/json/table-scrambling.json'));
                    $sTitle = 'Scrambling';
                    include 'inc/stats_overview_table.inc.php';
                }else{
                    echo $oResult->response;
                }
            ?>
        </div>
        
        <!-- Length -->
        <div class="block-length block bg-white hide" >
            <? 
                $oResult = (StatisticsTrainerPlayer::getLengthTotalAverage(Profile::getIdSession(),$iTrainerPlayer));
                if($oResult->status){
                    $aTable = $oResult->response;
    //                $aTable = (file_get_contents(DOCUMENT_ROOT . '/templates/files/json/table-length-total-average.json'));
                    $sTitle = 'Length - Total Average';
                    include 'inc/stats_overview_table.inc.php';
                }else{
                    echo $oResult->response;
                }
                
                $oResult = (StatisticsTrainerPlayer::getLengthNearHole(Profile::getIdSession(),$iTrainerPlayer));
                if($oResult->status){
                    $aTable = $oResult->response;
    //                $aTable = (file_get_contents(DOCUMENT_ROOT . '/templates/files/json/table-length-average-near-hole.json'));
                    $sTitle = 'Length - Average near hole';
                    include 'inc/stats_overview_table.inc.php';
                }else{
                    echo $oResult->response;
                }
                
                $oResult = (StatisticsTrainerPlayer::getLengthPuttAverage(Profile::getIdSession(),$iTrainerPlayer));
                if($oResult->status){
                    $aTable = $oResult->response;
    //                $aTable = (file_get_contents(DOCUMENT_ROOT . '/templates/files/json/table-length-putt-average.json'));
                    $sTitle = 'Length - Putt average';
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