<?php

    $oTemplate = new Template();

    //Show main page
    ob_start();
    include_once VIEWS_FOLDER_PATH.DS.'includes'.DS.'out_of_service.inc.php';
    $oTemplate->sContent =  ob_get_clean();
    $oTemplate->render(Template::TEMPLATE_OUT_OF_SERVICE);
?>
