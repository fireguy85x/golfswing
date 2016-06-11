<?php

// General configuration
define('_IBM_EXEC','1');
date_default_timezone_set('Europe/Madrid');
define('DS' , '/');

/*
 * Database connection details
 * To make a connection to an other container, make yourself some acces in 'Direct Admin' and
 * use the first letter of the user to connect. e.g. c.a-sidemedia.nl as host
 */
include 'local.config.php';

//General
define("PATH_PREFIX", "");
define("URI_WS",'http://130.211.102.144:8080');

//Folders relative
define('VIEWS_FOLDER',DS.'views');
define('INCLUDES_FOLDER' , DS.'includes');
define('LIBRARIES_FOLDER' , DS.'libraries');
define('TEMPLATES_FOLDER' , DS.'templates');
define('LANG_FOLDER' , DS.'lang');

define('ELEMENTS_FOLDER',VIEWS_FOLDER.DS.'elements');

define('IMAGES_FOLDER',TEMPLATES_FOLDER.DS.'images');
define('CSS_FOLDER',TEMPLATES_FOLDER.DS.'css');
define('JS_FOLDER',TEMPLATES_FOLDER.DS.'js');
define('FILES_FOLDER',TEMPLATES_FOLDER.DS.'files');

// Folders path
define('IMAGES_FOLDER_PATH',DOCUMENT_ROOT.IMAGES_FOLDER);
define('FILES_FOLDER_PATH',DOCUMENT_ROOT.FILES_FOLDER);
define('VIEWS_FOLDER_PATH',DOCUMENT_ROOT.VIEWS_FOLDER);
define('INCLUDES_FOLDER_PATH' , DOCUMENT_ROOT.INCLUDES_FOLDER);
define('LIBRARIES_FOLDER_PATH' , DOCUMENT_ROOT.LIBRARIES_FOLDER);
define('TEMPLATES_FOLDER_PATH' , DOCUMENT_ROOT.TEMPLATES_FOLDER);

// Client properties
define('CLIENT_NAME','Golf');
define('DEFAULT_EMAIL_FROM','ivanbenavides85@gmail.com');
define('DEFAULT_EMAIL_REPLY_TO','ivanbenavides85@gmail.com');


/*********/
/* ADMIN */
/*********/
define("ADMIN_FOLDER",'admin');

// Admin Folders relative
define('ADMIN_VIEWS_FOLDER',DS. ADMIN_FOLDER . DS.'views');
define('ADMIN_INCLUDES_FOLDER' , DS. ADMIN_FOLDER . DS.'includes');
define('ADMIN_LIBRARIES_FOLDER' , DS. ADMIN_FOLDER . DS.'libraries');
define('ADMIN_TEMPLATES_FOLDER' , DS. ADMIN_FOLDER . DS.'templates');

define('ADMIN_ELEMENTS_FOLDER',ADMIN_VIEWS_FOLDER.DS.'elements');

define('ADMIN_IMAGES_FOLDER',ADMIN_TEMPLATES_FOLDER.DS.'images');
define('ADMIN_CSS_FOLDER',ADMIN_TEMPLATES_FOLDER.DS.'css');
define('ADMIN_JS_FOLDER',ADMIN_TEMPLATES_FOLDER.DS.'js');
define('ADMIN_FILES_FOLDER',ADMIN_TEMPLATES_FOLDER.DS.'files');


// Admin Folders path
define('ADMIN_IMAGES_FOLDER_PATH',DOCUMENT_ROOT. ADMIN_IMAGES_FOLDER);
define('ADMIN_FILES_FOLDER_PATH',DOCUMENT_ROOT.ADMIN_FILES_FOLDER);
define('ADMIN_VIEWS_FOLDER_PATH',DOCUMENT_ROOT.ADMIN_VIEWS_FOLDER);
define('ADMIN_INCLUDES_FOLDER_PATH' , DOCUMENT_ROOT.ADMIN_INCLUDES_FOLDER);
define('ADMIN_LIBRARIES_FOLDER_PATH' , DOCUMENT_ROOT.ADMIN_LIBRARIES_FOLDER);
define('ADMIN_TEMPLATES_FOLDER_PATH' , DOCUMENT_ROOT.ADMIN_TEMPLATES_FOLDER);




# start session
session_start();

?>