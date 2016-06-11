<!--------------------------->
<!-- Search profile to compare        -->
<!--------------------------->
<div class="column-row cf ">
    <div class="column-100">
        <h3><?= _t('Search another profile to compare') ?></h3>
    </div>
</div>
<form id="search-profile" method="POST" action="">
    <input type="hidden" name="action" value="ajax-search" />
    <div class="column-row cf ">
        <div class="column-50 float-left">
            <label for="profile-search-name"><?= _t('Name') ?></label>
            <input id="profile-search-name" type="text" class="default" name="profile-search-name" />
        </div>
        <div class="column-50 float-left">
            <label for="profile-search-surname"><?= _t('Surname') ?></label>
            <input id="profile-search-surname" type="text" class="default" name="profile-search-surname" />
        </div>
    </div>
</form>
<div class="column-row cf ">
    <div class="column-100 float-left">
        <input id="search-button" type="button" value="<?= _t("SEARCH")?>" />
    </div>
</div>

<section id="found-profiles">

</section>

<section id="comparation-table">

</section>

<? 

$sBottomJavascript =<<<EOT
   <script>
        $("#search-button").click(function(){
            $.post($("#search-profile").attr('action'), $('#search-profile').serialize()).done(function( data ) {
                $("#comparation-table").fadeOut('fast');
                $("#found-profiles").fadeOut('fast',function(){
                    $(this).fadeIn('fast').html(data);
                })
            });
        });
   </script>
EOT;

$oTemplate->addBottomJavascript($sBottomJavascript);
?>