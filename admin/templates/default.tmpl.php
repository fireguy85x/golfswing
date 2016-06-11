<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title>Golf</title>
        <meta name="description" content="Golf" />
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
        <script src='<?= JS_FOLDER ?>/datatables.min.js'></script>
        <script src='<?= JS_FOLDER ?>/plugins/jquery-ui-1.8.17.custom/jquery-ui-1.8.17.custom.min.js' ></script>
        <script src="<?= JS_FOLDER ?>/plugins/fancybox/jquery.fancybox.pack.js"></script>
        
        <? 
            echo $this->sTopJavascript;
        ?>
    </head>
    
    <body class="cf">
        <div class='content-wrapper'>
            <header class='cf main-header'>
                <div id="main-menu-container">
                    <div class="default-container-width-wide cf">
                        <? include DOCUMENT_ROOT . ADMIN_ELEMENTS_FOLDER . '/mainMenu.inc.php' ?>
                    </div>
                </div>
                <div id="main-user-menu-container">
                    <div class='cf default-container-width-wide'>
                        <div class="column-row cf">
                            <div class="column-25 no-margin-bottom float-left">
                                <div id="logo">
                                    <a href='/admin/'>
                                        <img src='<?= ADMIN_IMAGES_FOLDER ?>/logo.png' />
                                    </a>
                                </div>
                            </div>
                            <div class="column-75 no-margin-bottom float-right">
                                <? include DOCUMENT_ROOT . ADMIN_ELEMENTS_FOLDER . '/mainUserMenuAdmin.inc.php' ?>
                            </div>
                        </div>
                    </div>
                </div>   
            </header>
            <div class='cf' id="main-content-admin">
                <?= $this->sContent ?>
            </div>
            <div class='push-sticky-footer'>&nbsp;</div>
            <footer id='main-footer'>
                <div class='footer-background '>
                    <div class='footer-info default-container-width-wide cf'>
                        <div class="float-left">
                            © 2015 - My Golflife Statistics
                        </div>
                        <div class='float-left'>
                            <a href='/'>Aviso legal</a>
                        </div>
                        <div class='float-left'>
                            <a href='/'>Aviso cookies</a>
                        </div>
                        <div class='float-left'>
                            <a href='tel:+34 000 00 0 000'>T. +34 000 00 0 000</a>
                        </div>
                        <div class='float-left'>
                            <a href='mailto:info@ppggolf.com '>info@ppggolf.com </a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <script>
            var curUrl = "<?= getCurrentUrl() ?>";
        </script>
        <script src='<?= ADMIN_JS_FOLDER ?>/default.js'></script>
        <script type='text/javascript'>
            $(document).ready(function(){
                $('.push-sticky-footer').height($('#main-footer').height());

                //add fancybox to fancyBoxLink elements
                $(".fancyBoxLink").fancybox();

                $('#slider').bxSlider({
                    mode: 'fade',
                    auto: true,
                    pager: false,
                    controls: false
                });
            });
        </script>
        <? 
            echo $this->sBottomJavascript;
        ?>
    </body>
</html>
