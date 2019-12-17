<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $genus_note->getid() ?></td>
    </tr>
    <tr>
      <th>Genus:</th>
      <td><?php echo $genus_note->getgenus_id() ?></td>
    </tr>
    <tr>
      <th>Username:</th>
      <td><?php echo $genus_note->getusername() ?></td>
    </tr>
    <tr>
      <th>User avatar filename:</th>
      <td><?php echo $genus_note->getuser_avatar_filename() ?></td>
    </tr>
    <tr>
      <th>Note:</th>
      <td><?php echo $genus_note->getnote() ?></td>
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

<a href="<?php echo url_for('genus_note/edit?id='.$genus_note['id']) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('genus_note/index') ?>">List</a>
