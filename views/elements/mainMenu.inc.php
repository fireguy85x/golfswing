<nav class="cf float-right" id="main-menu">
    <ul>
        <? 
        // Menu main items
        $aFilter = array();
        $aFilter['group'] = 'main'; 
        $aFilter['languageId'] = LanguageManager::getLanguageByAbbr(http_get('language'))->languageId;
        $aMainMenuItems = MenuItemManager::getMenuItemsByFilter($aFilter);

        foreach($aMainMenuItems AS $oMenuItem){ 
            if(($oMenuItem->getLink() == '/'. http_get('language').'/'. CONT_LOGIN) && Profile::getCurrentProfile() ){
                continue;
            }
        ?>
            <li>
                <a href="<?= $oMenuItem->getLink() ?>">
                    <?=  $oMenuItem->name ?>
                </a>
            </li>
        <? }?>
        <? 
        // Languages
        $aLanguages = LanguageManager::getLanguagesByFilter();
        
        foreach($aLanguages AS $oLanguage){ ?>
            <li class="flag">
                <a href='/<?= $oLanguage->languageAbbr ?>/'>
                <img src="<?= IMAGES_FOLDER . '/flags/'. $oLanguage->languageAbbr .'.jpg' ?>" />
                </a>
            </li>
        <? }?>
    </ul>
</nav>
