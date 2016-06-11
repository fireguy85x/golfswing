<nav class="cf float-right" id="main-user-menu">
    <ul>
        <? 
        // Menu main items
        $aFilter = array();
        $aMainMenuItems = MenuItemManager::getMenuAdminItemsByFilter($aFilter);
        $aFilter['languageId'] = LanguageManager::getLanguageByAbbr('en')->languageId;

        foreach($aMainMenuItems AS $oMenuItem){ ?>
            <li class="<?= ($oMenuItem->getLink() == getCurrentUrlPath() ? 'active' : '')?> <?= $oMenuItem->cssClass ?>">
                <a href="<?= $oMenuItem->getLink() ?>" >
                    <div class="bg"></div>
                    <?=  $oMenuItem->name ?>
                </a>
            </li>
        <? }?>
    </ul>
</nav>