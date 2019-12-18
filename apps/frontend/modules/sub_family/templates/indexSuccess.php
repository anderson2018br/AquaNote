<h1 class="title">Sub family List</h1>
<div class="form-group search">
    <label>Search
    <input type="text" id="search" class="form-control"/>
    </label>
</div>
<table class="table display" id="subfamily_table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th style="text-align: center;">Actions</th>
    </tr>
  </thead>
  <tbody id="myTable">
    <?php foreach ($sub_family_list as $sub_family): ?>
    <tr>
      <td style="vertical-align: middle;"><?php echo $sub_family->getname() ?></td>
        <td><textarea class="form-control" readonly style="border: 0; background-color: #FFFFFF;"><?php echo $sub_family->getdescription() ?></textarea></td>
      <td style="text-align: center; vertical-align: middle;">
          <a class="actions" href="<?php echo url_for('sub_family_show', $sub_family)?>">
              <span class="fa fa-eye">&nbsp;</span>
          </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php if ($pager->haveToPaginate()): ?>
<div class="pagination">
    <a href="<?php echo url_for('sub_family/index')?>?page=1">
        <img src="/images/first.png" alt="First Page" title="First Page"/>
    </a>
    <a href="<?php echo url_for('sub_family/index')?>?page=<?php echo $pager->getPreviousPage()?>">
        <img src="/images/previous.png" alt="Previous Page" title="Previous Page"/>
    </a>

    <?php foreach ($pager->getLinks() as $page): ?>
        <?php if ($pager->getPage() == $page): ?>
            <?php echo $page ?>
        <?php else: ?>
            <a class="pagination-text" href="<?php echo url_for('sub_family/index')?>?page=<?php echo $page?>">
                <?php echo $page ?>
            </a>
        <?php endif; ?>
    <?php endforeach; ?>

    <a href="<?php echo url_for('sub_family/index')?>?page=<?php echo $pager->getNextPage()?>">
        <img src="/images/next.png" alt="Next Page" title="Next Page"/>
    </a>
    <a href="<?php echo url_for('sub_family/index')?>?page=<?php echo $pager->getLastPage()?>">
        <img src="/images/last.png" alt="Last Page" title="Last Page"/>
    </a>
</div>
<?php endif; ?>

<div class="pagination-description">
    Total of <?php echo $pager->getnbResults() ?> sub families
    <?php if ($pager->haveToPaginate()): ?>
        - page <?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage()?>
    <?php endif; ?>
</div>

<script>
    $(document).ready(function () {
        $('#search').on('keyup', function () {
            let data = $(this).val().toLowerCase();
            $('#myTable tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(data) > -1)
            });
        });
        $('#subfamily_table').DataTable({
           paging: false,
           info: false,
           searching: false
        });
    });
</script>
