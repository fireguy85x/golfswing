<?php 
    define('BASE_PATH',dirname(__FILE__));

    define('DOCUMENT_ROOT',$_SERVER['DOCUMENT_ROOT'] );
    //I start the program

    include_once DOCUMENT_ROOT.'/includes/config.php';
    
    include_once INCLUDES_FOLDER_PATH . DS . 'base_functions.php';
    
    
    # error reporting
    error_reporting(E_ALL | E_STRICT);
    set_error_handler('error_handler', E_ALL | E_STRICT);
    register_shutdown_function('shutdown_handler');

    spl_autoload_register('includeClasses');
    
//    Tr::addLanguage('es');
//    Tr::addLanguage('en');
    // Check the language
    if(http_get('language')){
        $oLanguage = Tr::getInstance();
        $oLanguage->loadLang(http_get('language'));
    }else{
        http_redirect("/en");
    }
    
    // I check if there is an user logged in
    if(http_get('controller') != CONT_LOGIN && http_get('controller') != CONT_SIGNIN && !Profile::getCurrentProfile()){
        http_redirect('/' . http_get('language') . '/' .CONT_LOGIN);
    }
    
    $sControllerRequest = strtolower(http_get("controller", ''));

    // Key = 'controller name', Value = 'path to file' ()
    $aControllers = array(
        "" => '/home.cont.php',
        CONT_ROUNDS => "/map.cont.php",
        CONT_STATS => "/stats.cont.php",
        CONT_TRAINER_PLAYER_STATS => "/statsTrainerPlayer.cont.php",
        CONT_PROFILE => "/profile.cont.php",
        CONT_LOGIN => "/login.cont.php",
        CONT_BROSEWARNING => "/browserwarning.cont.php",
        CONT_SITEMAP => "/sitemap.cont.php",
        CONT_COMPARE => "/compare.cont.php",
        CONT_CONTACT => "/contact.cont.php",
        CONT_SIGNIN => "/sign-in.cont.php",
    );
    # get the controller 'path to file' from the controller array
    
    if (array_key_exists($sControllerRequest, $aControllers)) {
        $sControllerPath = $aControllers[$sControllerRequest];
    }else{
        exit();
        http_redirect('/en/');
    }

    if (file_exists(DOCUMENT_ROOT . '/controllers' . PATH_PREFIX . $sControllerPath)) {
        include_once DOCUMENT_ROOT . '/controllers' . PATH_PREFIX . $sControllerPath;
    } else {
        http_redirect('/en/');
    } 
?>