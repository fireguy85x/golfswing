<?php

class MenuItem{
    
    public $menuItemId;
    public $windowTitle;
    public $metaKeywords;
    public $metaDescription;
    public $name;
    public $content;
    public $link;
    public $group;
    public $parentMenuItemId;
    public $online;
    public $order;
    public $inMenu;
    public $level;
    public $cssClass = '';
    
    /**
     *
     * @return type 
     */
    public function getLink(){
        return (http_get('language') ? '/' . http_get('language') : '' ) .$this->link;
    }
}
?>
