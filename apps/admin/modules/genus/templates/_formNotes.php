<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('created_note')?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put"/>
    <?php endif; ?>
    <table>
        <tfoot>
        <tr>
            <td colspan="2">
                <a href="<?php echo url_for('genus/index') ?>" class="btn btn-dark">Cancel</a>
                <input class="btn btn-success" type="submit" value="Save" />
            </td>
        </tr>
        </tfoot>
        <tbody>
        <?php echo $form ?>
        </tbody>
    </table>
</form>

<script>
    $('#genus_note_user_avatar_filename').addClass('form-control');
    $('#genus_note_note').addClass('form-control');
</script>
