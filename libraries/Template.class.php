<?php

class Template {
    
    const TEMPLATE_DEFAULT = 'default.tmpl.php';
    const TEMPLATE_ERRORS = 'errorTemplate.tmpl.php';
    const TEMPLATE_INACTIVE = 'inactive.tmpl.php';
    const TEMPLATE_OUT_OF_SERVICE = 'out_of_service.tmpl.php';
    const TEMPLATE_WSERROR = 'wsError.tmpl.php';
    
    // Admin templates
    const ADMIN_TEMPLATE_DEFAULT = 'default.tmpl.php';
    
    public $sContent;
    public $windowTitle;
    public $metaKeywords;
    public $metaDescription;
    public $sBottomJavascript;
    public $sTopJavascript;
    public $status;
    public $statusText;
    
    /**
     *
     * @param type $sTemplate 
     */
    public function render($sTemplate = Template::TEMPLATE_DEFAULT){
        include_once TEMPLATES_FOLDER_PATH.DS.$sTemplate;
    }
    
    /**
     *
     * @param type $sTemplate 
     */
    public function renderAdmin($sTemplate = Template::ADMIN_TEMPLATE_DEFAULT){
        include_once ADMIN_TEMPLATES_FOLDER_PATH.DS.$sTemplate;
    }
    
    public function addBottomJavascript($sJavascript){
        $this->sBottomJavascript .= $sJavascript;
    }
}

