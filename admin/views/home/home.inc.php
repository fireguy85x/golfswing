<section id="home-page">
    <div class='default-container-width-wide'>
        <div class="column-row cf">
            <div class="column-100">
                <div class ="cf">
                    <h1 class="float-left"><?= _t('JUGADORES') ?></h1>
                </div>
                <hr />
            </div>
        </div>
        
        <!-- Fairways -->
        <div class="block-fairways block bg-white" >
            <? 
                include 'inc/home_overview_table.inc.php';
            ?>
        </div>
    </div>
</section>

