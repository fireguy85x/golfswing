<section class="page" id="profile-page">
    <div class='default-container-width'>
        <!-- User profile -->
        <div class="column-row cf">
            <div class="column-100 page-title no-margin-bottom">
                <h2>Profile</h2>
            </div>
        </div>
        <div class="column-row">
            <div class="column-100 page-content">
                <div class="column-row cf profile-menu">
                    <div class="column-100 cf no-margin-bottom">
                        <? include_once 'profile_menu.inc.php' ?>
                    </div>
                </div>
                <?php require 'profile_overview_personal_data.inc.php' ?>
                <?php require 'profile_overview_golf_club.inc.php' ?>
                <?php require 'profile_overview_bags.inc.php' ?>
                <?php require 'profile_overview_trainers.inc.php' ?>
                <?php require 'profile_overview_trainer_players.inc.php' ?>
            </div>
        </div>
    </div>
</section>

<? 

$sBottomJavascript =<<<EOT
<script>
    $('.profile-menu-item a').click(function(e){
        $('.block').hide();
        
        $('.' + $(this).parent().data('class')).show();
        $('.profile-menu-item').removeClass('active');
        $(this).parent().addClass('active');
        e.preventDefault();
    });
</script>
EOT;

$oTemplate->addBottomJavascript($sBottomJavascript);

// Javascript edit form
$sBottomJavascript = <<<EOT
    <script>
        $('.action-icon.edit-icon').click(function(){
            $(this).closest('.subform').children('section').slideToggle('slow');
        });
    </script>
EOT;

$oTemplate->addBottomJavascript($sBottomJavascript);

// Submit a.submit
$sBottomJavascript =<<<EOT
    <script>
        $('a.submit').click(function(){
            // If it's a delete icon
            if($(this).hasClass('delete-icon')){
                if(confirmChoice($(this).data('name'))){
                    $(this).closest('form').submit();
                }
            }else{
                $(this).closest('form').submit();
            }
        });
    </script>
EOT;

$oTemplate->addBottomJavascript($sBottomJavascript);
?>