<nav class="cf float-right" id="main-user-menu">
    <ul>
        <? 
        // Menu main items
        $aFilter = array();
        $aFilter['group'] = 'user';
        $aFilter['languageId'] = LanguageManager::getLanguageByAbbr(http_get('language'))->languageId;
        $aMainMenuItems = MenuItemManager::getMenuItemsByFilter($aFilter);

        foreach($aMainMenuItems AS $oMenuItem){ ?>
            <li class="<?= ($oMenuItem->getLink() == getCurrentUrlPath() || $oMenuItem->getLink() == '/' . http_get('language') . '/' . http_get('controller') ? 'active' : '')?> <?= $oMenuItem->cssClass ?>">
                <a href="<?= $oMenuItem->getLink() ?>" >
                    <div class="bg"></div>
                    <?=  $oMenuItem->name ?>
                </a>
            </li>
        <? }?>
    </ul>
</nav>