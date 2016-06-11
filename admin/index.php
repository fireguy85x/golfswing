<?php 

    define('BASE_PATH',dirname(__FILE__));
    //define('DOCUMENT_ROOT',$_SERVER['DOCUMENT_ROOT'] . '/proyectos/calpeconsulting/public_html');
    define('DOCUMENT_ROOT',$_SERVER['DOCUMENT_ROOT'] );
    //I start the program

    include_once DOCUMENT_ROOT.'/includes/config.php';
    
    include_once INCLUDES_FOLDER_PATH . DS . 'base_functions.php';

    # error reporting
    error_reporting(E_ALL | E_STRICT);
    set_error_handler('error_handler', E_ALL | E_STRICT);
    register_shutdown_function('shutdown_handler');

    spl_autoload_register('includeClasses');
    
    $sControllerRequest = strtolower(http_get("controller", ''));
    
    // Key = 'controller name', Value = 'path to file' ()
    $aControllers = array(
        "" => '/home.cont.php'
    );
    
    # get the controller 'path to file' from the controller array
    if (array_key_exists($sControllerRequest, $aControllers)) {
        $sControllerPath = $aControllers[$sControllerRequest];
    }else{
        http_redirect('/admin/');
    }
    
    if (file_exists(DOCUMENT_ROOT . DS .  PATH_PREFIX . ADMIN_FOLDER . '/controllers' . $sControllerPath)) {
        include_once DOCUMENT_ROOT . DS .  PATH_PREFIX . ADMIN_FOLDER . '/controllers' . $sControllerPath;
    } else {
        http_redirect('/admin/');
    }
?>