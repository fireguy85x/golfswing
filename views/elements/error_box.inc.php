<div class="errorBox" <?= !empty($aErrors) ? 'style="display:block;"' : '' ?>>
    <p class="title"><?= _t('The next fields have errors') ?>:</p>
    <ul>
        <?
        if (!empty($aErrors)) {
            foreach ($aErrors AS $sField => $sError) {
                echo '<li><label for="' . $sField . '" class="error" style="display: block;">' . $sError . '</label></li>';
            }
        }
        ?>
    </ul>
</div>