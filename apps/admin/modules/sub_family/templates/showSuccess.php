<table class="table table-borderless">
  <tbody>
    <tr>
      <th>Name:</th>
      <td><?php echo $sub_family->getname() ?></td>
    </tr>
    <tr>
        <th>Description:</th>
        <td><?php echo $sub_family->getdescription()?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $sub_family->getcreated_at() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $sub_family->getupdated_at() ?></td>
    </tr>
  </tbody>
</table>

<hr />

&nbsp;
<a class="btn btn-dark" href="<?php echo url_for('sub_family/index') ?>">List</a>

<a class="btn btn-primary" href="<?php echo url_for('sub_family/edit?id='.$sub_family['id']) ?>">Edit</a>
