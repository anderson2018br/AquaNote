<table class="table">
  <tbody>
    <tr>
        <th>User:</th>
        <td>
            <img style="border-radius: 50%; width: 27px;" src="/images/<?php echo $avatar->getfile_name()?>" alt="User Avatar" title="User Avatar">
            <?php echo $user->getusername() ?>
        </td>
    </tr>
    <tr>
      <th>Genus:</th>
      <td><?php echo $genus->getname() ?></td>
    </tr>
    <tr>
      <th style="vertical-align: middle;">Note:</th>
      <td><textarea style="background-color: #ffffff!important; border: 0!important;" class="form-control" readonly><?php echo $genus_note->getnote() ?></textarea></td>
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
<a class="btn btn-dark" href="<?php echo url_for('genus_note/index') ?>">List</a>

<a class="btn btn-primary" href="<?php echo url_for('genus_note/edit?id='.$genus_note['id']) ?>">Edit</a>
