<?php

/*
 * controller for handeling the error pages
 * This is a very special controller that is included on other places beside the index
 */
$oTemplate = new Template();


# include the error template
$oTemplate->render(Template::TEMPLATE_WSERROR);
?>