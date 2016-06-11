<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title>Portal de reservas del Caminito del Rey</title>
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
        <script src='<?= JS_FOLDER ?>/plugins/jquery-ui-1.8.17.custom/jquery-ui-1.8.17.custom.min.js' ></script>
        <script src="<?= JS_FOLDER ?>/plugins/fancybox/jquery.fancybox.pack.js"></script>
        
    </head>
    
    <body>
        <div class='content-wrapper'>
            <header class='cf main-header'>
                <div id="logo" >
                    <a href='http://www.caminitodelrey.info'>
                        <img src='<?= IMAGES_FOLDER ?>/logo.png' />
                    </a>
                </div>
            </header>
            <div class='cf'>
                <?= $this->sContent ?>
            </div>
            <div class='push-sticky-footer'>&nbsp;</div>
            <footer id='main-footer'>
                <div class='footer-background default-container-width cf'>
                    <div class=' cf '>
                        <div class="column-33 float-left urls">
                            <a class='fancyBoxLink' href='#contact'>Contacto</a>
                                

                            <div style="display:none">
                                <div id="contact">
                                    <? include VIEWS_FOLDER_PATH.'/includes/contact.inc.php' ?>
                                </div>
                            </div>
                        </div>
                        <div class='column-width float-left'>&nbsp;</div>
                        <div class='column-33 float-left align-center'>
                            <span class="url">
                                <a href='http://www.malaga.es/' target="_blank">
                                    © Diputación de Málaga
                                </a>
                            </span>
                        </div>
                        <div class="column-width float-left">&nbsp;</div>
                        <div class="column-33 float-right align-right">
                            <span class="url">
                            Desarrollado por 
                                <a href='http://www.tdsistemas.com/' target="_blank">
                                    TDSistemas
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <script src='<?= JS_FOLDER ?>/default.js'></script>
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
    </body>
</html>
