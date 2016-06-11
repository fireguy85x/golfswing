<div class="last-results">
    <h3><?= _t('LAST ROUND RESULTS') ?></h3>
    <h4><?= _t('SCORING') ?></h4>
    <div class="cf column-row">
        <div class="column-33 float-left">
            <div class="last-results-item">
                <header><?= $oRound->scoring->totalStrokes ?></header>
                <footer><?= _t('TOTAL STROKES') ?></footer>
            </div>
        </div>
        
        <div class="column-33 float-left">
            <div class="last-results-item">
                <header><?= $oRound->scoring->scramblings ?>%</header>
                <footer><?= _t('SCRAMBLINGS') ?></footer>
            </div>
        </div>
        
        <div class="column-33 float-left">
            <div class="last-results-item">
                <header><?= $oRound->scoring->putts ?></header>
                <footer><?= _t('PUTTS') ?></footer>
            </div>
        </div>
        
        <div class="column-33 float-left">
            <div class="last-results-item">
                <header><?= $oRound->scoring->greensInRegulation ?></header>
                <footer><?= _t('GREEN IN REGULATIONS') ?></footer>
            </div>
        </div>
        
        <div class="column-33 float-left">
            <div class="last-results-item">
                <header><?= $oRound->scoring->fairwaysAccuracy ?>%</header>
                <footer><?= _t('FAIR ACCURACY') ?></footer>
            </div>
        </div>
        
        <div class="column-33 float-left">
            <div class="last-results-item">
                <header><?= $oRound->scoring->greenAccuracy ?>%</header>
                <footer><?= _t('DRIVING ACCURACY') ?></footer>
            </div>
        </div>
        
<!--        <div class="column-33 float-left">
            <div class="last-results-item">
                <header><?= 'Falta valor ' ?></header>
                <footer><?= _t('DRIVING DISTANCE(M)') ?></footer>
            </div>
        </div>
        <div class="column-66 float-left">
            <div class="last-results-item">
                <a class="read-more"><?= _t('VIEW GRAPHICS') ?></a>
            </div>
        </div>-->
    </div>
    
</div>