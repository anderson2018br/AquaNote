<?php use_helper('I18N') ?>

<form class="form-group" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <table>
    <?php echo $form ?>
  </table>

  <input class="btn btn-success" type="submit" value="<?php echo __('sign in') ?>" />
  <a href="<?php echo url_for('@sf_guard_password') ?>"><?php echo __('Forgot your password?') ?></a>
</form>

<script>
    $('#signin_username').addClass('form-control');
    $('#signin_password').addClass('form-control');
</script>
