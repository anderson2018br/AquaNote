<h1 class="title">Users List</h1>
<div class="search form-group">
    <label>Search
    <input type="text" id="search" class="form-control"/>
    </label>
</div>
<table class="table">
  <thead>
    <tr>
      <th>Username</th>
      <th>Is active</th>
      <th>Is super admin</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($sf_guard_user_list as $sf_guard_user): ?>
    <tr>
      <td><?php echo $sf_guard_user->getusername() ?></td>
        <?php if ($sf_guard_user->getis_active()): ?>
      <td><?php echo "Yes" ?></td>
        <?php else: ?>
        <td><?php echo "No" ?></td>
        <?php endif; ?>
        <?php if ($sf_guard_user->getis_super_admin()): ?>
      <td><?php echo "Yes" ?></td>
        <?php else: ?>
        <td><?php echo "No" ?></td>
        <?php endif; ?>
      <td>
          &nbsp;<?php echo link_to('<span class="actions fa fa-trash-alt">&nbsp;</span>', 'user/delete?id='.$sf_guard_user->getid(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
