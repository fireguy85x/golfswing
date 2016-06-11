<!-- User profile -->
<div class="column-row cf">
    <div class="column-100 no-margin-bottom">
        <div class="general-statistics cf">
            <div class="default-container-width-page">
                <div class="column-66 float-left">
                    <div class="left-diagrams">
                        <div class="column-row cf">
                            <div class="column-16 float-left">
                                FOTO
                            </div>
                            <div class="column-80 float-left">
                                <p class="player-name-label"><?= _t('Player:') ?></p>
                                <p class="player-name"><?= Profile::getCurrentProfileName() ?></p>
                            </div>
                        </div> 
                        <div class="column-row cf">
                            <!-- Strokes and rounds -->
                            <div class="column-50 float-left">
                                <div class="round-diagrams-container">
                                    <h4><?= _t('TOTAL STROKES / TOTAL ROUNDS') ?></h4>
                                    <br />
                                    <div class="column-row cf">
                                        <div class="column-row cf">
                                            <div class="column-100 float-left">
                                                <? 
                                                    $iPercentage = ($oStatistics->strokesRatio->strokes /$oStatistics->strokesRatio->rounds) * 100;
                                                    $sDiagram1 = '{
                                                            "size": "70",
                                                            "percent": "'. number_format($iPercentage,2).'%",
                                                            "borderWidth": "8",
                                                            "bgFill": "#a0a0a0",
                                                            "frFill": "#ffd000",
                                                            "textSize": 16,
                                                            "textColor": "#585858"
                                                        }';
                                                ?>
                                                <div id="diagram-id-1" class="diagram" style="margin:auto;" data-circle-diagram='<?= $sDiagram1 ?>'></div>
                                            </div>
<!--                                            <div class="column-50 float-left">
                                                <? 
                                                    $sDiagram2 = '{
                                                            "size": "70",
                                                            "percent": "'.$oStatistics->strokesRatio->rounds.'%",
                                                            "borderWidth": "8",
                                                            "bgFill": "#a0a0a0",
                                                            "frFill": "#ff7600",
                                                            "textSize": 16,
                                                            "textColor": "#585858"
                                                        }';
                                                ?>
                                             <div id="diagram-id-2" class="diagram" data-circle-diagram='<?= $sDiagram2 ?>'></div>
                                            </div>-->
                                        </div>
                                        <br />
                                        <div class="column-row cf">
                                            <div class="column-50 float-left">
                                                <div>
                                                    TS <span class="square yellow"></span> <span class="number"><?= $oStatistics->strokesRatio->strokes ?></span>
                                                </div>
                                            </div>
                                            <div class="column-50 float-left">
                                                <div>
                                                    TR <span class="square orange"></span> <span class="number"><?= $oStatistics->strokesRatio->rounds ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Putts and strokes -->
                            <div class="column-50 float-right">
                                <h4><?= _t('TOTAL PUTTS / TOTAL STROKES') ?></h4>
                                <br />
                                <div class="column-row cf  relative">
                                    <div class="column-50 float-left">
                                        <div id="putts-strokes-container">
                                            <div id="putts" data-value="<?= $oStatistics->puttsRatio->putts ?>"></div>
                                            <div id="strokes" data-value="<?= $oStatistics->puttsRatio->strokes ?>"></div>
                                        </div>
                                    </div>
                                    <div class="column-50 float-left absolute" style="height:100%;right: 0">
                                        <div class="squares-container">
                                            <div class="align-left">
                                                TP <span class="square yellow"></span> <span class="number"><?= $oStatistics->puttsRatio->putts ?></span>
                                            </div>
                                            <div class="align-left">
                                                TS <span class="square orange"></span> <span class="number"><?= $oStatistics->puttsRatio->strokes ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column-33 float-right">
                    <div class="progress-bars-container">
                        <div class="progress-bar-strokes cf">
                            <h4><?= _t('TOTAL STROKES') ?></h4>
                            <br />
                            <? 
                            $iNumberCount = 1;
                            foreach( $oStatistics->strokesSummary AS $iYear => $iStroke){ ?>
                                <div class="line<?= $iNumberCount ?> cf">
                                    <div class="float-left column-20">
                                        <span><?= $iYear ?></span>
                                    </div>
                                    <div class="float-left column-75" >
                                        <span class="progress-bar" data-value="<?= $iStroke ?>"><?= $iStroke ?></span>
                                        <img class="triangle" src="<?= IMAGES_FOLDER ?>/triangle<?= $iNumberCount ?>.jpg" />
                                    </div>
                                </div>
                                
                            <? 
                                if($iNumberCount == 3 ){
                                    $iNumberCount = 1;
                                }else{
                                    $iNumberCount++;
                                }
                            } 
                            ?>
                        </div>
                        <br />
                        <br />
                        <div class="progress-bar-scrambling cf">
                            <h4><?= _t('TOTAL SCRAMBLING') ?></h4>
                            <br />
                            <? 
                            $iNumberCount = 1;
                            foreach( $oStatistics->scramblingsSummary AS $iYear => $iScrambling){ ?>
                                <div class="line<?= $iNumberCount ?> cf">
                                    <div class="float-left column-20">
                                        <span><?= $iYear ?></span>
                                    </div>
                                    <div class="float-left column-75" >
                                        <span class="progress-bar" data-value="<?= $iScrambling ?>"><?= $iScrambling ?></span>
                                        <img class="triangle" src="<?= IMAGES_FOLDER ?>/triangle<?= $iNumberCount ?>.jpg" />
                                    </div>
                                </div>
                                
                            <? 
                                if($iNumberCount == 3 ){
                                    $iNumberCount = 1;
                                }else{
                                    $iNumberCount++;
                                }
                            } 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<? 
$sBottomJavascript =<<<EOT
    <script>
        $(window).load(function(){
        
            // Vertical progress bar
            var iTotal = $("#putts-strokes-container").height();
            var iHeightPutts;
            var iHeightStrokes;

            iHeightPutts = 100 * $('#putts').data('value') / iTotal;
        
            if(iHeightPutts>100){
                iHeightPutts = 100;
            }
            $('#putts').css("height",iHeightPutts + '%');
            
            iHeightStrokes = 100 - iHeightPutts;
            if(iHeightStrokes>100){
                iHeightStrokes = 100;
            }
            $('#strokes').css("height",iHeightStrokes + '%');
            

            // Horizontal Progress bars STROKES
            var iTotalValues = 0;
            iTotalValues = $oStatistics->historicStrokes;
            $('.progress-bar-strokes .progress-bar').each(function(){
                iNewWidthPerc = 100 * $(this).data('value') / iTotalValues;
                if(iNewWidthPerc > 95){
                    iNewWidthPerc = 95;
                }
                $(this).css('width',iNewWidthPerc + '%');
            });
            
            // Horizontal Progress bars SCRAMBLING
            var iTotalValues = 0;
            iTotalValues = $oStatistics->historicScramblings;
            $('.progress-bar-scrambling .progress-bar').each(function(){
                iNewWidthPerc = 100 * $(this).data('value') / iTotalValues;
                if(iNewWidthPerc > 95){
                    iNewWidthPerc = 95;
                }
                $(this).css('width',iNewWidthPerc + '%');
            });
        });
        

    </script>
EOT;

$oTemplate->addBottomJavascript($sBottomJavascript);
?>