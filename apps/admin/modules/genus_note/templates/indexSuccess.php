<h1>Genus note List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Genus</th>
      <th>Username</th>
      <th>User avatar filename</th>
      <th>Note</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($genus_note_list as $genus_note): ?>
    <tr>
      <td><a href="<?php echo url_for('genus_note/show?id='.$genus_note['id']) ?>"><?php echo $genus_note->getid() ?></a></td>
      <td><?php echo $genus_note->getgenus_id() ?></td>
      <td><?php echo $genus_note->getusername() ?></td>
      <td><?php echo $genus_note->getuser_avatar_filename() ?></td>
      <td><?php echo $genus_note->getnote() ?></td>
      <td><?php echo $genus_note->getcreated_at() ?></td>
      <td><?php echo $genus_note->getupdated_at() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('genus_note/new') ?>">New</a>
