<?php

    $oTemplate = new Template();
        
    //Show main page
    ob_start();
    include_once VIEWS_FOLDER_PATH.DS.'includes'.DS.'inactive.inc.php';
    $oTemplate->sContent =  ob_get_clean();
    $oTemplate->render(Template::TEMPLATE_INACTIVE);
?>
