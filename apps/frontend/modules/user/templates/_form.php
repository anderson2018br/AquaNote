<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form class="form-group" action="<?php echo url_for('user/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getid() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table>
        <tfoot>
        <tr>
            <td colspan="2">
                &nbsp;<a class="btn btn-dark" href="<?php echo url_for('homepage') ?>">Cancel</a>
                <?php if (!$form->getObject()->isNew()): ?>
                    &nbsp;<?php echo link_to('Delete', 'user/delete?id='.$form->getObject()->getid(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
                <?php endif; ?>
                <input class="btn btn-success" type="submit" value="SignIn" />
            </td>
        </tr>
        </tfoot>
        <tbody>
        <?php echo $form ?>
        </tbody>
    </table>
</form>
<script>
    $('#sf_guard_user_is_super_admin').removeAttr('checked');
    $('#sf_guard_user_username').addClass('form-control');
    $('#sf_guard_user_password').addClass('form-control');
    $('#sf_guard_user_groups_list').addClass('form-control');
    $('#sf_guard_user_permissions_list').addClass('form-control');
    $('#sf_guard_user_salt').addClass('form-control');
    $('#sf_guard_user_salt').attr('readonly',true);
    $('#sf_guard_user_groups_list').attr('readonly', true);
    $('#sf_guard_user_permissions_list').attr('readonly', true);
</script>
