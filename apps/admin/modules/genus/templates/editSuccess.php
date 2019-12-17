<h1>Edit Genus</h1>
<?php if ($sf_user->isAuthenticated()): ?>
    <?php foreach ($user as $us):?>
        <?php if ($us->getusername() == $sf_user->getusername()): ?>
            <?php $form->setDefault('user_id', $us->getid())?>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
<?php include_partial('form', array('form' => $form)) ?>
