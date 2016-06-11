<section id="home-page">
    <div class='default-container-width'>
        <div class="column-row cf">
            <div class="column-100">
                <div class="bg-white">
                    <? include DOCUMENT_ROOT . ELEMENTS_FOLDER . '/general_statistics.inc.php' ?>
                </div>
            </div>
        </div>
        
        <div class="column-row cf">
            <div class="column-100">
                <div class="default-container-width-page bg-white">
                    <? include DOCUMENT_ROOT . ELEMENTS_FOLDER . '/general_notifications.inc.php' ?>
                </div>
            </div>
        </div>
        
        <!-- Top 5 -->
        <div class="column-row cf">
            <div class="column-100">
                <div class="default-container-width-page top-profiles">
                    <? include DOCUMENT_ROOT . ELEMENTS_FOLDER . '/general_top_profiles.inc.php' ?>
                </div>
            </div>
        </div>
        
        <!-- Accuracy graphics -->
        <div class="column-row cf">
            <div class="column-100 no-margin-bottom bg-white">
                <? include DOCUMENT_ROOT . ELEMENTS_FOLDER . '/general_accuracy_statistics.inc.php' ?>
            </div>
        </div>
        
        <!-- General statistics -->
        <div class="column-row cf">
            <div class="column-100 bg-white">
                <? include DOCUMENT_ROOT . ELEMENTS_FOLDER . '/general_statistics_summary.inc.php' ?>
            </div>
        </div>
    </div>
</section>