<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title><?= $this->sWindowTitle ?></title>
        <meta name="description" content="<?= $this->metaDescription ?>" />
        <link rel="stylesheet" href='<?= JS_FOLDER ?>/plugins/jquery-ui-1.8.17.custom/jquery-ui-1.8.17.custom.css' >
        <link rel="stylesheet" href="<?= JS_FOLDER ?>/plugins/fancybox/jquery.fancybox.css">
        <link rel='stylesheet' href='<?= CSS_FOLDER ?>/style_fonts.css'>
        <link rel='stylesheet' href='<?= CSS_FOLDER ?>/constant.css'>
        <link rel='stylesheet' href='<?= CSS_FOLDER ?>/style.css'>
        <link rel='stylesheet' href='<?= CSS_FOLDER ?>/responsive.css'>
        <link rel='icon' href='/favicon.ico'>
        
        <script src='<?= JS_FOLDER ?>/jquery.min.js'></script>
        <script src='<?= JS_FOLDER ?>/jquery.validate.min.js'></script>
        <script src='<?= JS_FOLDER ?>/base_functions.js'></script>
        <script src='<?= JS_FOLDER ?>/jquery.bxslider.min.js'></script>
        <script src='<?= JS_FOLDER ?>/jquery-tooltip.pack.js'></script>
        <script src='<?= JS_FOLDER ?>/jsPlumb-1.4.1.js'></script>
        <script src='<?= JS_FOLDER ?>/plugins/jquery-ui-1.8.17.custom/jquery-ui-1.8.17.custom.min.js' ></script>
        <script src="<?= JS_FOLDER ?>/plugins/fancybox/jquery.fancybox.pack.js"></script>
        
        <? 
            echo $this->sTopJavascript;
        ?>
    </head>
    
    <body class="cf">
        <div class='content-wrapper'>
            WS Error <br />
            <a href="/" style='color:black'>
            Home
            </a> 
        </div>
    </body>
</html>
