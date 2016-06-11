<nav class="cf float-right" id="main-menu">
    <ul>
        <? 
        // Menu main items
        $aFilter = array();
        $aFilter['group'] = 'main';
        $aFilter['languageId'] = LanguageManager::getLanguageByAbbr('en')->languageId;
        $aMainMenuItems = MenuItemManager::getMenuItemsByFilter($aFilter);

        foreach($aMainMenuItems AS $oMenuItem){ ?>
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
