<section class="page" id="login">
    <div class="default-container-width login-container bg-white">
        <div class="column-row cf">
            <article class="column-100 float-left">
                <div class="column-row cf">
                    <div class="column-100">
                        <h1><?= _t('PASSWORD RECOVERY') ?></h1>
                        <br />
                    </div>
                </div>
                <div class="column-row cf">
                    <div class="column-100">
                        <form>
                            <div class="column-row">
                                <div class="column-40">
                                    <label for="password"><?= _t('EMAIL')?></label>
                                    <input type="email" id="email" class="default" value="" />
                                </div>
                            </div>
                            <div class="column-row">
                                <div class="column-100">
                                    <i><?= _t('We will send you information about how to recover you password')?></i>
                                </div>
                            </div>
                            <div class="column-row">
                                <div class="column-40">
                                    <input type="submit" class="default" value="<?= _t('SUBMIT') ?>" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>