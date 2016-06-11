<!-- Filter -->
<div class="column-row cf">
    <div class="column-100">
        <div class="cf table-filter">
            <select data-filter="activefilter" class="filter float-left">
                <option value=''><?= _('All') ?></option>
                <option value='1'>1</option>
                <option value='0'>0</option>
            </select>
        </div>
        <hr />
    </div>
</div>
<br />
<!-- Table -->
<div class="column-row cf">
    <div class="column-100">
        <div class="default-container-width-page statistics-filter">
            <table class="sorted cf">
                <thead>
                    <tr>
                        <th><?= _t('Name')?> </th>
                        <th><?= _t('Surname')?> </th>
                        <th><?= _t('Email')?> </th>
                        <th class="activefilter"><?= _t('Active')?> </th>
                        <th>&nbsp; </th>
                    </tr>
                </thead>
                <tbody>
                    <?php  foreach($aFoundUsers AS $oUser){ ?>
                        <tr>
                            <td><?= $oUser->name ?></td>
                            <td><?= $oUser->surname ?></td>
                            <td><?= $oUser->email ?></td>
                            <td><?= $oUser->removed ? '0' : '1'?></td>
                            <td>
                                <div class="float-right">
                                    <form method="POST" action=''>
                                        <input type ="hidden" name="user_action" value="<?= (!$oUser->removed ? 'cancel-user' : 'reactive-user') ?>" />
                                        <input type ="hidden" name="userId" value="<?= $oUser->userId ?>" />
                                        <?php if(!$oUser->removed){ ?>
                                        <a class="submit action-icon delete-icon" title="<?= _t('Deactivate user'); ?>" data-name="<?= $oUser->name ?>"></a>   
                                        <?php }else{ ?>
                                            <a class="submit action-icon eye-icon" title="<?= _t('Activate user'); ?>" data-name="<?= $oUser->name ?>"></a>
                                        <?php } ?>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <? } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<? 

$sBottomJavascript =<<<EOT
<script>
    
    var table = setTableSorterStuff();

    // Search in the columns
    $('select.filter').change(function(){
        table.column('.' + $(this).data('filter')).search( this.value ).draw();
    });
      
    $('a.submit').click(function(e){
        e.preventDefault();
        $(this).closest('form').submit();
    });
        
</script>
EOT;

$oTemplate->addBottomJavascript($sBottomJavascript);
?>