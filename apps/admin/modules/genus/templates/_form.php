<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form class="form-group" action="<?php echo url_for('genus/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getid() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a class="btn btn-dark" href="<?php echo url_for('genus/list') ?>">Cancel</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('<span class="btn btn-danger">Delete</span>', 'genus/delete?id='.$form->getObject()->getid(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
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
$('#genus_name').addClass('form-control');
$('#genus_sub_family_id').addClass('form-control');
$('#genus_species_count').addClass('form-control');
$('#genus_is_published').addClass('form-control');
$('#genus_fun_fact').addClass('form-control');
$('#genus_first_discovered_at_month').addClass('form-control').addClass('data');
$('#genus_first_discovered_at_day').addClass('form-control').addClass('data');
$('#genus_first_discovered_at_year').addClass('form-control').addClass('data');
</script>
