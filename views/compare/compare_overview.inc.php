<section>
    <div class="default-container-width cf">
        <h2><?= _t('Rounds') ?> / Nombre de la partida / Hole 1 </h2>
        <div class="column-row cf">
            <div class="column-100">
                <div class="default-container-width-page bg-white cf">
                    <? include 'inc/compare_notifications.inc.php' ?>
                </div>
            </div>
        </div>
        <div class="column-row cf">
            <div class="column-100">
                <div class="default-container-width-page bg-white cf">
                    <br />
                    <div class="column-row cf">
                        <div class="column-16 float-left">
                            FOTO
                        </div>
                        <div class="column-80 float-left">
                            <p class="player-name-label"><?= _t('Jugador:') ?></p>
                            <p class="player-name"><?= Profile::getCurrentProfileName() ?></p>
                        </div>
                    </div>
                    <? include 'inc/compare_search_form.inc.php' ?>
                </div>
            </div>
        </div> 
        
    </div> 
</section>