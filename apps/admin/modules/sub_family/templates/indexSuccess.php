<h1 class="title">Sub family List</h1>
<div class="form-group search">
    <label>Search
        <input type="text" id="search" class="form-control"/>
    </label>
</div>
<table class="table" id="admin_table_list_sub_family">
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th class="actions-align">Actions</th>
    </tr>
  </thead>
  <tbody id="myTable">
    <?php foreach ($sub_family_list as $sub_family): ?>
    <tr>
      <td><?php echo $sub_family->getname() ?></td>
      <td><?php echo $sub_family->getdescription() ?></td>
      <td class="actions-align">
          <a class="actions" href="<?php echo url_for('sub_family_show',$sub_family)?>">
                <span class="actions fa fa-eye">&nbsp;</span>
          </a> |
          <a class="actions" href="<?php echo url_for('sub_family_edit',$sub_family)?>">
              <span class="actions fa fa-pen">&nbsp;</span>
          </a> |
          &nbsp;<?php echo link_to('<span class="actions delete fa fa-trash-alt">&nbsp;</span>', 'sub_family/delete?id='.$sub_family->getid(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php if ($pager->haveToPaginate()): ?>
<div class="pagination">
    <a href="<?php echo url_for('sub_family/index')?>?page=1">
        <img src="/images/first.png" alt="First Page" title="Fist Page"/>
    </a>
    <a href="<?php echo url_for('sub_family/index')?>?page=<?php echo $pager->getPreviousPage()?>">
        <img src="/images/previous.png" alt="Previous Page" title="Previous Page"/>
    </a>

    <?php foreach ($pager->getLinks() as $page): ?>
        <?php if ($page == $pager->getPage()):?>
            <?php echo $page ?>
        <?php else: ?>
            <a href="<?php echo url_for('sub_family/index')?>?page=<?php echo $page ?>">
                <?php echo $page ?>
            </a>
        <?php endif; ?>
    <?php endforeach; ?>

    <a href="<?php echo url_for('sub_family/index')?>?page=<?php echo $pager->getNextPage()?>">
        <img src="/images/next.png" alt="Next Page" title="Next Page"/>
    </a>

    <a href="<?php echo url_for('sub_family/index')?>?page=<?php echo $pager->getLastPage() ?>">
        <img src="/images/last.png" alt="Last Page" title="Last Page"/>
    </a>
</div>
<?php endif; ?>

<div class="pagination-description">
    Total of <?php echo $pager->getNbResults() ?> Sub Families
    <?php if ($pager->haveToPaginate()): ?>
        - page <?php echo $pager->getPage() ?>/<?php echo $pager->getLastpage() ?>
    <?php endif; ?>
</div>
  <a class="btn btn-new btn-genus title" href="<?php echo url_for('sub_family/new') ?>">New</a>

<script>
    $('delete').on('click', function () {
        confirm('Delete this sub family will delete all genuses with this sub family are you sure you want to continue');
    });

    $(document).ready(function () {
        $('#search').on('keyup',function () {
            let data = $(this).val().toLowerCase();
            $('#myTable tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(data) > -1)
            });
        });
        $('#admin_table_list_sub_family').DataTable({
            paging: false,
            info: false,
            searching: false
        });
    });
</script>
