
<article class="block-personal block <?= (http_get('action') == 'personal-data' || !http_get('action')) ? '' : 'hide' ?>" >
    <div class="column-row cf ">
        <div class="column-100">
            <h2><?= _t('PERSONAL DATA') ?></h2>
        </div>
    </div>
    <form method="POST" action="/<?= http_get('language') ?>/<?= http_get('controller') ?>/personal-data" class="validate">
        <input type="hidden" name="action-user-profile" value="edit-user-profile" />
        <? include DOCUMENT_ROOT . ELEMENTS_FOLDER . '/error_box.inc.php'; ?>
        <div class="column-row cf">
            <div class="column-20 float-left">
                Profile picture
            </div>
            <div class="column-80 float-left">
                <div class="column-row cf">
                    <!-- Name -->
                    <div class="column-50 float-left">
                        <label><?= _t('Name') ?></label><br />
                        <input class="required default" type="text" name="name" value="<?= $oProfile->name ?>" />
                    </div>
                    <!-- Surname -->
                    <div class="column-50 float-left">
                        <label><?= _t('Surname') ?></label><br />
                        <input class="required default" type="text" name="surname" value="<?= $oProfile->surname ?>" />
                    </div>
                </div>


                <div class="column-row cf">
                    <!-- Profilename -->
                    <div class="column-50 float-left">
                        <label for="username"><?= _t('Username') ?></label><br />
                        <input id="usernamea" class="required default" type="text" name="username" value="<?= $oProfile->username ?>" />
                    </div>
                    <!-- Phone -->
                    <div class="column-50 float-left">
                        <label><?= _t('Phone') ?></label><br />
                        <input class="required default" type="tel" name="phone" value="<?= $oProfile->phone ?>" />
                    </div>
                </div>

                <div class="column-row cf">
                    <!-- Email -->
                    <div class="column-50 float-left">
                        <label for="email"><?= _t('Email') ?></label><br />
                        <input class="email default" id="email" type="email" name="email" value="<?= $oProfile->email ?>" />
                    </div>
                    <!-- Repeat Email -->
                    <div class="column-50 float-left">
                        <label for="email_repeat"><?= _t('Repeat email') ?></label><br />
                        <input class="required default" id="email_repeat" type="email" name="email_repeat" value="" />
                    </div>
                </div>

<!--                <div class="column-row cf">
                     Password 
                    <div class="column-50 float-left">
                        <label><?= _t('Password') ?></label><br />
                        <input class="required default" type="password" if="password" name="password" value="" />
                    </div>
                     Repeat Password 
                    <div class="column-50 float-left">
                        <label><?= _t('Repeat password') ?></label><br />
                        <input class="required default" type="password" id="password_repeat" name="password_repeat" value="" />
                    </div>
                </div>-->


                <div class="column-row cf">
                    <!-- Address -->
                    <div class="column-50 float-left">
                        <label><?= _t('Address') ?></label><br />
                        <input class="required default" type="text" name="address" value="<?= $oProfile->address ?>" />
                    </div>
                    <!-- Postal code -->
                    <div class="column-50 float-left">
                        <label><?= _t('Postal code') ?></label><br />
                        <input class="required default" type="text" name="postalCode" value="<?= $oProfile->postalCode ?>" />
                    </div>
                </div>


                <div class="column-row cf">
                    <!-- City -->
                    <div class="column-50 float-left">
                        <label><?= _t('City') ?></label><br />
                        <input class="required default" type="text" name="city" value="<?= $oProfile->city ?>" />
                    </div>
                    <!-- Province -->
                    <div class="column-50 float-left">
                        <label><?= _t('Province') ?></label><br />
                        <input class="required default" type="text" name="province" value="<?= $oProfile->province ?>" />
                    </div>
                </div>

                <div class="column-row cf">
                    <!-- Nationality -->
                    <div class="column-50 float-left">
                        <label><?= _t('Nationality') ?></label><br />
                        <input class="required default" type="text" name="nationality" value="<?= $oProfile->nationality ?>" />
                    </div>
                    <div class="column-50 float-left">
                        <label><?= _t('DNI') ?></label><br />
                        <input class="required default" type="text" name="dni" value="<?= $oProfile->dni ?>" />
                    </div>
                </div>
            </div>
        </div>

        <div class="column-row cf">
            <div class="column-100">
                <h3><?= _t('Game data') ?></h3>
            </div>
        </div>

        <div class="column-row cf">
            <div class="column-40 float-left">
                <div class="column-row">
                    <div class="column-100">
                        <label><?= _t('Category') ?></label><br />
                    </div>
                </div>
                <div class="column-row">
                    <div class="column-100">
                        <input type="radio" id="profileCategoryProfesional" <?= Profile::PROFESSIONAL == $oProfile->profileCategory ? ' CHECKED ' : '' ?> name="profileCategory" value="<?= Profile::PROFESSIONAL ?>" />
                        <label for="profileCategoryProfesional"><?= _t('Profesional') ?></label>
                        <input type="radio" id="profileCategoryAmateur" <?= Profile::PROFESSIONAL != $oProfile->profileCategory ? ' CHECKED ' : '' ?>name="profileCategory" value="<?= Profile::AMATEUR ?>" />
                        <label for="profileCategoryAmateur"><?= _t('Amateur') ?></label>
                    </div>
                </div>
            </div>
            <div class="handicap-container <?= Profile::PROFESSIONAL == $oProfile->profileCategory ? ' hide ' : '' ?>">
                <div class="column-40 float-left">
                    <div class="column-row">
                        <div class="column-100">
                            <label><?= _t('Hándicap(HCP)') ?></label>
                        </div>
                    </div>
                    <div class="column-row">
                        <div class="column-100">
                            <input class="required default " type="text" name="handicap" size="2" value="<?= $oProfile->handicap ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="column-row cf">
            <div class="column-100">
                <div class="column-row">
                    <div class="column-100">
                        <input type="checkbox" id="publicProfile" name="publicProfile" />
                        <label for="publicProfile"><?= _t('Allow share your result to other profiles')?></label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="column-row cf">
            <div class="column-100">
                <div class="column-row">
                    <div class="column-100">
                        <input type="checkbox" id="isTrainer" name="isTrainer" value="1" />
                        <label for="isTrainer"><?= _t('Is trainer?')?></label>
                    </div>
                </div>
            </div>
        </div>

        <!-- BUTTONS -->
        <div class="column-row cf">
            <div class="column-50 float-left">
                <a class="float-right read-more"  /><?= _t('CANCEL') ?></a>
            </div>
            <div class="column-50 float-left">
                <input type="submit" value="<?= _t('SAVE CHANGES') ?>" />
            </div>
        </div>
    </form>
</article>

<? 
$sBottomJavascript = <<<EOT
    <script>
        $("#username").focusout(function(){
        });
            
        $("input[name=profileCategory]").change(function(){
            if($(".handicap-container").css('display') !== 'none'){
                $(".handicap-container").hide();
                $(".handicap-container input[name=handicap]").attr('disabled',true);
            }else{
                $(".handicap-container input[name=handicap]").attr('disabled',false);
                $(".handicap-container").show();
            }
        })
    </script>
EOT;

$oTemplate->addBottomJavascript($sBottomJavascript);
?>