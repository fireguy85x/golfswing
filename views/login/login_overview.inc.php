<section class="page" id="login">
    <div class="default-container-width login-container bg-white">
        <div class="column-row cf">
            <article class="column-50 float-left">
                <div class="column-row cf">
                    <div class="column-100">
                        <h1><?= _t('Sign in') ?></h1>
                        <br />
                    </div>
                </div>
                <div class="column-row cf">
                    <div class="column-66">
                        <form method="POST" action="">
                            <div>
                                <label for="username"><?= _t('USERNAME')?></label>
                                <input type="text" name="username" id="username" class="default" value="" />
                            </div>
                            <br/>
                            <div>
                                <label><?= _t('PASSWORD')?></label>
                                <input type="password" name="password" id="password" class="default" value="" />
                            </div>
                            <br />
                            <input type="submit" class="default" value="<?= _t('LOG IN') ?>" />
                        </form>
                    </div>
                </div>
                <div class="column-row cf">
                    <div class="column-100">
                        <aside>
                            <span><?= _t('Did you forget your password?')?> </span><a href="/<?= http_get('language')?>/<?= http_get('controller')?>/password-forgotten"><?= _t('Click here')?></a>
                        </aside>
                    </div>
                </div>
            </article>
            <article class="column-50 float-right">
                <div class="sign-in">
                    <h3><?= _t('NOT AN USER YET?')?></h3>
                    <figure>
                        <a href="/<?= http_get('language') . '/sign-in'?>">
                            <img src="<?= IMAGES_FOLDER . '/login/sign-in-' . http_get('language') . '.png' ?>"></img>
                        </a>
                    </figure>
                </div>
            </article>
        </div>
    </div>
</section>