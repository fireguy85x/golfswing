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

    include_once DOCUMENT_ROOT.'/controllers/reservation.cont.php';
?>