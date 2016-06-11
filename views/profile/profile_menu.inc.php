<nav class="profile-menu cf">
    <ul>
        <li class="personal-data profile-menu-item <?= (http_get('action') == 'personal-data' || !http_get('action')) ? 'active' : '' ?>"  data-class="block-personal">
            <a href='#'>
                <div class="bg"></div>
                <?= _t('Personal data') ?>
            </a>
        </li>
        <li class="golf-club profile-menu-item <?= http_get('action') == 'golf-clubs' ? 'active' : '' ?>" data-class="block-palos">
            <a href='#'>
                <div class="bg"></div>
                <?= _t('Golf clubs') ?>
            </a>
        </li>
        <li class="bag profile-menu-item <?= http_get('action') == 'bags' ? 'active' : '' ?>" data-class="block-bolsa">
            <a href='#'>
                <div class="bg"></div>
                <?= _t('Bags') ?>
            </a>
        </li>
        <li class="trainers profile-menu-item <?= http_get('action') == 'trainers' ? 'active' : '' ?>" data-class="block-trainers">
            <a href='#'>
                <div class="bg"></div>
                <?= _t('Trainers') ?>
            </a>
        </li>
        <li class="personal-data profile-menu-item <?= http_get('action') == 'trainerPlayers' ? 'active' : '' ?>" data-class="block-trainerPlayers">
            <a href='#'>
                <div class="bg"></div>
                <?= _t('Players') ?>
            </a>
        </li>
    </ul>
</nav>