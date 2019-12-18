<table class="table table-borderless">
  <tbody>
    <tr>
      <th>User:</th>
      <td>
          <?php foreach ($avatar as $ava): ?>
          <img style="width: 25px; border-radius: 50%;" src="/images/<?php echo $ava->getfile_name() ?>" alt="User Avatar" type="User Avatar"/>
          <?php endforeach; ?>
          <?php echo $user->getusername() ?>
      </td>
    </tr>
    <tr>
        <th>Genus:</th>
        <td><?php echo $genus->getname() ?></td>
    </tr>
    <tr>
      <th style="vertical-align: middle;">Note:</th>
      <td><textarea class="form-control" style="border: 0; background-color: #FFFFFF;" readonly><?php echo $genus_note->getnote() ?></textarea></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $genus_note->getcreated_at() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $genus_note->getupdated_at() ?></td>
    </tr>
  </tbody>
</table>

<hr />
&nbsp;
<a class="btn btn-primary" href="<?php echo url_for('genus_note/index') ?>">List</a>
