<table class="table table-borderless">
  <tbody>
    <tr>
      <th>Name:</th>
      <td><?php echo $sub_family->getname() ?></td>
    </tr>
    <tr>
        <th style="vertical-align: middle;">Description:</th>
        <td><textarea class="form-control" style="background-color: #FFFFFF; border: 0;" readonly><?php echo $sub_family->getdescription()?></textarea></td>
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
