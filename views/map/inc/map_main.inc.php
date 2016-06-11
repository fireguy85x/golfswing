<? include 'map_function_xy.inc.php'; ?>
<? //include 'map_function_xy_auxiliar.inc.php'; ?>
<form method="POST">
    <input type="hidden" name="action-hole" value="save-hole" />
    <div class="cf column-row">
        <div class="no-margin-bottom column-100">
            <div class="default-container-width-page bg-white cf">
                <div class="column-row cf">
                    <div class="column-40 float-left">
                        <div class="map-left-info">
                            <div class="column-row cf">
                                <div class="column-100">
                                    <div class="map-round-name">
                                    <input type="hidden" name="courseName" value="<?= $oHole->courseName ?>" /> 
                                    <input type="hidden" name="roundName" value="<?= $oHole->roundName ?>" /> 
                                    <input type="hidden" name="holeNumber" value="<?= $oHole->holeNumber ?>" /> 
                                    <input type="hidden" name="idRound" value="<?= $oHole->idRound ?>" />
                                    <?= $oHole->courseName  ?> | <span><?= $oHole->roundName  ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="column-row cf">
                                <div class="column-100">
                                    <article class="cf summary-header">
                                        <div class="column-25 float-left ">
                                            <div class="first">
                                                <input type="hidden" name="holeId" value="<?= $oHole->holeId ?>" />
                                                <header><?= $oHole->holeNumber ?></header>
                                                <footer>HOLE</footer>
                                            </div>
                                        </div>
                                        <div class="column-25 float-left">
                                            <input type="hidden" name="par" value="<?= $oHole->par ?>" />
                                            <header><?= $oHole->par  ?></header>
                                            <footer>PAR</footer>
                                        </div>
                                        <div class="column-25 float-left">
                                            <input type="hidden" name="handicap" value="<?= $oHole->handicap ?>" />
                                            <header><?= $oHole->handicap  ?></header>
                                            <footer>HANDICAP</footer>
                                        </div>
                                        <div class="column-25 float-left">
                                            <input type="hidden" name="metereage" value="<?= $oHole->metereage ?>" />
                                            <header><?= $oHole->metereage  ?></header>
                                            <footer>MTS</footer>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="column-row cf">
                                <div class="column-100">
                                    <div class="map-results-header">
                                        <?= _t('Resultados obtenidos') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="column-row cf">
                                <div class="column-100">
                                    <article class="cf map-results">
                                        <div class="column-33 float-left ">
                                            <input type="hidden" name="totalStrokes" value="<?= $oHole->totalStrokes ?>" />
                                            <header><?= $oHole->totalStrokes  ?></header>
                                            <footer><?= _t('TOTAL STROKE') ?></footer>
                                        </div>
                                        <div class="column-33 float-left">
                                            <input type="hidden" name="scramblings" value="<?= $oHole->scramblings ?>" />
                                            <header><?= $oHole->scramblings  ?>%</header>
                                            <footer>
                                                <?= _t('SCRAMBLINGS') ?>
                                            </footer>
                                        </div>
                                        <div class="column-33 float-left">
                                            <input type="hidden" name="putts" value="<?= $oHole->putts ?>" />
                                            <header><?= $oHole->putts  ?></header>
                                            <footer><?= _t('PUTTS') ?></footer>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="column-row cf">
                                <article class="add-stroke-row">
                                    <div class="column-50 float-left ">
                                        <h3><?= _t('STROKES:') ?></h3>
                                    </div>
<!--                                    <div class="column-50 float-left">
                                        <span class="float-right add-stroke unselectable">
                                            <?= _t('ADD STROKE') ?><img class="float-right" src="<?= IMAGES_FOLDER ?>/map/add-stroke.png" />
                                        </span>
                                    </div>-->
                                </article>
                            </div>
                            
                            <!-- Points info -->
                            <div class="map-pins-info">
                                <? foreach($aPoints AS $iKey => $oPoint){ ?>
                                    <div class="map-pin-info pin-<?= $iKey ?>">
                                        <input type="hidden" class="pin-x" name="pin-x[<?= $iKey ?>]" value="<?= $oPoint->x ?>" />
                                        <input type="hidden" class="pin-y" name="pin-y[<?= $iKey ?>]" value="<?= $oPoint->y ?>"   />
                                        <input type="hidden" name="id[<?= $iKey ?>]" value="<?= $oPoint->id ?>"   />
                                        <input type="hidden" name="dropped[<?= $iKey ?>]" value="<?= $oPoint->dropped ?>"   />
                                        <input type="hidden" name="idTrajectory[<?= $iKey ?>]" value="<?= $oPoint->idTrajectory ?>"   />
                                        <input type="hidden" name="inverse[<?= $iKey ?>]" value="<?= $oPoint->inverse ?>"   />
                                        <header>
                                            <div class="column-row cf">
                                                <div class="column-50 no-margin-bottom float-left">
                                                    <div class="stick"></div>
                                                    STROKE <?= $iKey +1 ?>
                                                </div>
                                                <div class="column-50 no-margin-bottom float-right">
                                                    <div class="float-right">
                                                        <span class="draggable action-icon edit-icon" data-pin="pin-<?= $iKey?>"></span>
<!--                                                        <span class="action-icon delete-icon"></span>-->
<!--                                                        <span class="action-icon save-icon"></span>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </header>
                                        <div class="cf pin-info-body hide">
                                            <div class="cf column-row">
                                                <div class="column-25 float-left">
                                                    <label class="float-right" for="pin-penalty-<?= $iKey ?>">PENALTY CAUSE:</label>
                                                </div>
                                                <div class="column-75 float-right">
                                                    <div class="pin-info-options">
                                                        <? $aPenaltyCauses = array("Frontal water","Lateral water","Lost ball","Unplayable ball"); ?>
                                                        <select id="pin-penalty-<?= $iKey ?>" name="penalty-cause[<?= $iKey ?>]">
                                                            <option value="0"><?= _t('Select cause') ?></option>
                                                            <? foreach($aPenaltyCauses AS $sPenaltyCause){ ?>
                                                                <option <?= trim($sPenaltyCause) == trim($oPoint->penaltyCause) ? 'SELECTED' : ' ' ?> value="<?= $sPenaltyCause ?>"><?= $sPenaltyCause ?></option>
                                                            <? } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cf column-row">
                                                <div class="column-25 float-left">
                                                    <label class="float-right">PENALTY:</label>
                                                </div>
                                                <div class="column-75 float-right">
                                                    <div class="cf pin-info-options penalty">
                                                        <div class="float-left">
                                                            <input class="input-penalty-<?= $iKey ?>" type="text" name="penalty[<?= $iKey ?>]" readonly value="<?= $oPoint->penalty ?>"/>
                                                        </div>
                                                        <div class="float-right">
                                                            <div class="float-right add-button add-penalty operation-button" data-pin="<?= $iKey ?> "></div>
                                                            <div class="float-right substract-button substract-penalty operation-button" data-pin="<?= $iKey ?> "></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cf column-row">
                                                <div class="column-25 float-left">
                                                    <label class="float-right" for="pin-club-<?= $iKey ?>">CLUB:</label>
                                                </div>
                                                <div class="column-75 float-right">
                                                    <div class="pin-info-options">
                                                        <select id="pin-club-<?= $iKey ?>" name="clubType[<?= $iKey ?>]">
                                                            <option value=""><?= _t('Select Club Type') ?></option>
                                                            <? foreach($oCulbTypesList AS $sClubType) {?>
                                                                <option <?= trim($sClubType) == trim($oPoint->clubType) ? 'SELECTED' : ' ' ?> value="<?= $sClubType ?>"><?= $sClubType ?></option>
                                                            <? } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cf column-row">
                                                <div class="column-25 float-left">
                                                    <label class="float-right" for="pin-club-<?= $iKey ?>">LAT:</label>
                                                </div>
                                                <div class="column-75 float-right">
                                                    <div class="pin-info-options">
                                                        <?= $oPoint->latitude ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cf column-row">
                                                <div class="column-25 float-left">
                                                    <label class="float-right" for="pin-club-<?= $iKey ?>">LONG:</label>
                                                </div>
                                                <div class="column-75 float-right">
                                                    <div class="pin-info-options">
                                                        <?= $oPoint->longitude ?>
                                                    </div>
                                                </div>
                                            </div>
<!--                                            <div class="cf column-row">
                                                <div class="column-25 float-left">
                                                    <label class="float-right" >PUTT:</label>
                                                </div>
                                                <div class="column-75 float-right">
                                                    <div class="pin-info-options">
                                                        <input type="radio" name="pin-putt-<?= $iKey ?>" id="pin-putt-<?= $iKey ?>-0" value="0"/>
                                                        <label  for="pin-putt-<?= $iKey ?>-0">NO</label>
                                                        <input type="radio" name="pin-putt-<?= $iKey ?>" id="pin-putt-<?= $iKey ?>-1" value="1"/>
                                                        <label  for="pin-putt-<?= $iKey ?>-1">YES</label>
                                                    </div>
                                                </div>
                                            </div>-->

                                        </div>
                                    </div>
                                <? }?>
                            </div>
                        </div>
                    </div>
                    <div class="column-60 float-right">
                        <div class="column-row">
                            <div class="column-100">
                                <!-- Main map -->
                                <div id="map" class="relative">
                                    <div class="map-container">
                                        <img src="<?= IMAGES_FOLDER ?>/map/map.jpg" />
                                    </div>
                                    <div id="map-info-pins">
                                        <? foreach($aPoints AS $iKey => $oPoint){ ?>
                                            <img id="pin<?= $iKey ?>" data-pin="pin-<?= $iKey ?>" class="unselectable absolute pin draggable" src="<?= IMAGES_FOLDER ?>/map/map-pin.png" style="top:<?=$oPoint->y ?>px;left:<?=$oPoint->x ?>px "/>
                                        <? }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column-row">
                            <div class="column-100">
                                <aside class="map-info cf">
                                    <div class="column-row cf">
                                        <div class="column-16 float-left">
                                            <img class="float-left" src="<?= IMAGES_FOLDER . '/map/icon-info-big.png' ?>" />
                                        </div>
                                        <div class="column-80 float-left">
                                            <ol>
                                                <li>Arrastre la marca hasta su posición correcta en el mapa.</li>
                                                <li>Puede modificar las características del golpe en el panel situado a su izquierda.</li>
                                            </ol>
                                            
                                            <span class="float-right">
                                                <label for="dont-show"><i><?= _t('Do not show again')?></i></label>
                                                <input id="dont-show" type="checkbox" name="do-not-show"/>
                                            </span>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                        </div>
                        <div class="column-row">
                            <div class="column-100">
                                <img src="<?= IMAGES_FOLDER . '/map/legend.png'?>" />
                            </div>
                        </div>
                        <div class="column-row">
                            
                            <div class="column-25 float-left">
                                <p><?= _t('Print') ?></p>
                                <a href="#map" class="print-map" >
                                    <img src="<?= IMAGES_FOLDER . '/social/printer.png' ?>" />
                                </a>
                            </div>
                            <div class="column-25 float-right">
                                <p><?= _t('Notify error') ?></p>
                                <a class='fancyBoxLink' href="#notify-map-error">
                                    <img src="<?= IMAGES_FOLDER . '/social/notify-error.png' ?>" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cf column-row">
                    <div class="column-100">
                        <input style="margin:auto" type="submit" value="<?= _t('VALIDATE HOLE') ?>" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Form to notify an error -->
<div id="notify-map-error" class='hide'>
    <form method="POST">
        <h3><?= _t('Notify error') ?></h3><br/>
        <input type="hidden" name='action-hole' value="notify-error"/>
        <input type="hidden" name='holeNumber' value="<?= $oHole->holeNumber ?>"/>
        <textarea name="comments"></textarea> <br/><br/>
        <input type='submit' value='<?= _t('Send') ?> ' />
    </form>
</div>


<? 

$sBottomJavascript =<<<EOT
    <script>
        $(".print-map").click(function(e){
            e.preventDefault();
        
            var _print = window.print;
            window.print = function() {
                $('#map').css('width',$('#map').width());
                _print();
                $('#map').css('width','auto');
            }
        
            window.print();
        });
//        $(".print-map").fancybox({
//            'onComplete': function() {
//                alert('aaaa');
//            },
//            'afterClose': function() {
//                $('#map').css("display","block");
//            }
//        });
   </script>
EOT;
$oTemplate->addBottomJavascript($sBottomJavascript);

$sBottomJavascript =<<<EOT
    <script>
        $( ".draggable" ).draggable({
            containment: "#map",
            cursor: "crosshair",
            stop: function( event, ui ) {
                $('.map-pin-data #pin-x').val(ui.position.left);
                $('.map-pin-data #pin-y').val(ui.position.top);
            }
        });
        
    </script>
EOT;


$iPins = count($aPoints);
$sBottomJavascript =<<<EOT
    <script type="text/javascript">

        $(window).load(function(){
//            $("#map-info-pins").height($("#map").height());
//            $("#map-info-pins").width($("#map").width());
        })
        var w34Stroke = 'rgba(50, 50, 200, 1)';
        var w34HlStroke = 'rgba(180, 180, 200, 1)';
        jsPlumb.bind("ready", function() {
            var e0;
            var e1;

            for(i=0;i<$iPins;i++){
                jsPlumb.connect({
                    source:"pin" + i,
                    target:"pin" + (i +1),
                    anchors: ["Bottom", "Bottom"],
                    paintStyle:{ strokeStyle:"lightgray", lineWidth:3 },
                    connector: ["Straight"], 
                    overlays:[ ["Arrow" , { width:12, length:12, location:0.67 }] ],
                    endpoint:   "Blank"
                });

                jsPlumb.draggable(
                "pin" + i,
                {
                    containment:"#map",
                    cursor: "crosshair",
                    stop: function( event, ui ) {
//                    _d(ui);
//                        _d(ui.helper);
//                        _d('.pin-'+i+'-x');
//                        $('.pin-'+i+'-x').val(ui.position.left);
//                        $('.pin-'+i+'-y').val(ui.position.top);
                    }
                });
                
                jsPlumb.draggable("pin" + (i + 1),
                {
                    containment:"#map",
                    cursor: "crosshair",
                    stop: function( event, ui ) {
                        $('.map-pin-data #pin-x').val(ui.position.left);
                        $('.map-pin-data #pin-y').val(ui.position.top);
                    }
                });
                
            }

        });
</script>
EOT;
//$oTemplate->addBottomJavascript($sBottomJavascript);



$sBottomJavascript =<<<EOT
    <script id="init-js-plumb" type="text/javascript">
    function initJsPlumb(){
        // Add/substract penalty
        $('.add-penalty').click(function(){
            var iPenalty = $('.input-penalty-' + $(this).data("pin")).val();
            if(iPenalty<9){
                $('.input-penalty-' + $(this).data("pin")).val(parseInt(iPenalty) + parseInt(1));
            }
        })

        $('.substract-penalty').click(function(){
            var iPenalty = $('.input-penalty-' + $(this).data("pin")).val();
            if(iPenalty>0){
                $('.input-penalty-' + $(this).data("pin")).val(iPenalty - parseInt(1));
            }
        })

        // Manage clicks on pins to hide/show pin information
        $('.draggable').click(function(){
            $('.pin-info-body:not(.' + $(this).data('pin') + ' .pin-info-body)').slideUp();
            $('.' + $(this).data('pin') + ' .pin-info-body').slideDown();
        });


        // Set the dimensions of the area for the pins (to make the container property of jsPlumb works)
        $(window).load(function(){
//            $("#map").height($("#map").parent('.column-100').height());
//            $("#map-info-pins").height($("#map").parent('.column-100').height());
//            $("#map").width($("#map").parent('.column-100').width());
//            $("#map-info-pins").width($("#map").parent('.column-100').width());
        
          $("#map-info-pins").height($("#map").height());
          $("#map-info-pins").width($("#map").width());
        })

        // Draggable connection plugin configuration
        var w34Stroke = 'rgba(50, 50, 200, 1)';
        var w34HlStroke = 'rgba(180, 180, 200, 1)';
        jsPlumb.bind("ready", function() {
            var e0;
            var e1;

            for(i=0;i<$iPins;i++){
                jsPlumb.connect({
                    source:"pin" + i,
                    target:"pin" + (i +1),
                    anchors: ["Bottom", "Bottom"],
                    paintStyle:{ strokeStyle:"lightgray", lineWidth:3 },
                    connector: ["Straight"], 
                    overlays:[ ["Arrow" , { width:12, length:12, location:0.67 }] ],
                    endpoint:   "Blank"
                });

                if(i==$iPins-1){
                    jsPlumb.draggable("pin" + (i + 1),
                    {
                        containment:"#map",
                        cursor: "crosshair",
                        stop: function( event, ui ) {
                           
                            $('.map-pin-data #pin-x').val(ui.position.left);
                            $('.map-pin-data #pin-y').val(ui.position.top);
                        }
                    });
                }
                
                jsPlumb.draggable("pin" + i,
                {
                    containment:"#map",
                    cursor: "crosshair",
                    stop: function( event ) {
                        var idPin = event.el.id;
                        var classPinInfo = '.' + $('#' + idPin ).data("pin");
                        
                        $(classPinInfo + ' .pin-x').val(event.pos[0]);
                        $(classPinInfo + ' .pin-y').val(event.pos[1]);
                    }
                });
                
            }
        });
    }
    initJsPlumb();
</script>
EOT;
$oTemplate->addBottomJavascript($sBottomJavascript);

$sBottomJavascript =<<<EOT
    <script type="text/javascript">
        
        function resizeAndRepaint(){
            $("#map-info-pins").height($("#map").height());
            $("#map-info-pins").width($("#map").width());

            $('.pin').each(function(){
                var iMapWidth = $(".map-container").width();
                var iMapHeight = $(".map-container").height();

                var iPercLeft = 100 * $(this).position().left / iMapWidth;
                var iPercTop = 100 * $(this).position().top / iMapHeight;

                $(this).css({ "top": iPercTop + '%', "left": iPercLeft + '%'});
            });
            jsPlumb.repaintEverything();
        }
        
        
        $(window).load(function(){
            $(window).resize(function(){
                    resizeAndRepaint();
                }
            ).resize();
        });
    </script>
EOT;
 
$oTemplate->addBottomJavascript($sBottomJavascript);
?>