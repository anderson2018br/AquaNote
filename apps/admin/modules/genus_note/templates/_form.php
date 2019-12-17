<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form class="form-group" action="<?php echo url_for('genus_note/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getid() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a class="btn btn-dark" href="<?php echo url_for('genus_note/index') ?>">Cancel</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('<span class="btn btn-danger">Delete</span>', 'genus_note/delete?id='.$form->getObject()->getid(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
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
    $('#genus_note_note').addClass('form-control');
    $('form>table>tbody>tr').addClass('form-notes');
</script>
