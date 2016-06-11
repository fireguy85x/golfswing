<section class="page" id="login">
    <div class="default-container-width login-container bg-white">
        <div class="column-row cf">
            <article class="column-50 float-left">
                <div class="column-row cf">
                    <div class="column-100">
                        <h1><?= _t('PASSWORD RECOVERY') ?></h1>
                        <br />
                    </div>
                </div>
                <div class="column-row cf">
                    <div class="column-66">
                        <form>
                            <div>
                                <label for="password"><?= _t('NEW PASSOWRD')?></label>
                                <input type="text" id="password" class="default" value="" />
                            </div>
                            <br/>
                            <div>
                                <label for="passwordRepeat"><?= _t('REPEAT PASSWORD')?></label>
                                <input type="password" id="passwordRepeat" class="default" value="" />
                            </div>
                            <br />
                            <input type="submit" class="default" value="<?= _t('SAVE') ?>" />
                        </form>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>