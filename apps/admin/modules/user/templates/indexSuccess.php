<h1 class="title">Users List</h1>
<div class="search form-group">
    <label>Search
    <input type="text" id="search" class="form-control"/>
    </label>
</div>
<table class="table" id="admin_user_list">
  <thead>
    <tr>
      <th>Username</th>
      <th>Is active</th>
      <th>Is super admin</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody id="myTable">
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

<?php if ($pager->haveToPaginate()): ?>
<div class="pagination">
    <a href="<?php echo url_for('user/index')?>?page=1">
        <img src="/images/first.png" alt="First Page" type="First Page"/>
    </a>
    <a href="<?php echo url_for('user/index')?>?page=<?php echo $pager->getPreviousPage()?>">
        <img src="/images/previous.png" alt="Previous Page" type="Previous Page"/>
    </a>
    <?php foreach ($pager->getLinks() as $page): ?>
        <?php if ($pager->getPage() == $page): ?>
            <?php echo $page ?>
        <?php else: ?>
            <a class="pagination-text" href="<?php echo url_for('user/index')?>?page=<?php echo $page?>">
                <?php echo $page ?>
            </a>
        <?php endif; ?>
    <?php endforeach; ?>
    <a href="<?php echo url_for('user/index')?>?page=<?php echo $pager->getNextPage()?>">
        <img src="/images/next.png" alt="Next Page" title="Next Page"/>
    </a>
    <a href="<?php echo url_for('user/index')?>?page=<?php echo $pager->getLastPage()?>">
        <img src="/images/last.png" alt="Last Page" title="Last Page"/>
    </a>
</div>
<?php endif; ?>

<div class="pagination-description">
    Total of <?php echo $pager->getNbResults() ?> users
    <?php if ($pager->haveToPaginate()): ?>
        - page <?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?>
    <?php endif; ?>
</div>

<script>
    $(document).ready(function () {
        $('#search').on('keyup', function () {
            let data = $(this).val().toLowerCase();
            $('#myTable tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(data) > -1);
            });
        });
        $('#admin_user_list').DataTable({
            paging: false,
            info: false,
            searching: false
        });

    });
</script>
