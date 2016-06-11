<?php
$oTemplate = new Template();

switch(http_get('action')){
   
    //***************
    // Default action
    //***************
    default:
        //Show main page
        ob_start();
        include_once VIEWS_FOLDER_PATH.DS.'contact'.DS.'contact.inc.php';
        $oTemplate->sContent =  ob_get_clean();
        $oTemplate->render();
    break;
}

?>
