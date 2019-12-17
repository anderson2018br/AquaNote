<h1>Genus note List</h1>
<div class="form-group search">
    <label>Search
        <input type="text" id="search" class="form-control"/>
    </label>
</div>
<table class="table" id="admin_notes_table">
  <thead>
    <tr>
      <th>User</th>
      <th>Genus</th>
      <th>Note</th>
      <th style="text-align: right;">Actions</th>
    </tr>
  </thead>
  <tbody id="myTable">
    <?php foreach ($genus_note_list as $genus_note): ?>
    <tr>
        <?php $genu = $genus->find($genus_note->getgenus_id()) ?>
        <?php $user = $users->find($genus_note->getuser_id()) ?>
        <?php $avatar = $avatars->find($genus_note->getuser_avatar_id()) ?>
        <td style="vertical-align: middle;"><img style="border-radius: 50%; width: 27px;" src="/images/<?php echo $avatar->getfile_name() ?>" alt="User Avatar" title="User Avatar"/>
            <?php echo $user->getusername() ?>
        </td>
        <td style="vertical-align: middle;"><?php echo $genu->getname() ?></td>
        <td>
            <textarea style="background-color: #ffffff!important; border: 0!important;" class="form-control" readonly><?php echo $genus_note->getnote()?></textarea>
        </td>
      <td style="vertical-align: middle; text-align: right;">
          <a class="actions" href="<?php echo url_for('genus_note_show', $genus_note)?>">
              <span class="fa fa-eye">&nbsp;</span>
          </a> |
          <a class="actions" href="<?php echo url_for('genus_note_edit', $genus_note) ?>">
              <span class="fa fa-pen">&nbsp;</span>
          </a> |
          &nbsp;<?php echo link_to('<span class="fa actions fa-trash-alt">&nbsp;</span>', 'genus_note/delete?id='.$genus_note->getid(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php if ($pager->haveToPaginate()): ?>
<div class="pagination">
    <a href="<?php echo url_for('genus_note/index')?>?page=1">
        <img src="/images/first.png" alt="First Page" title="First Page"/>
    </a>
    <a href="<?php echo url_for('genus_note/index')?>?page=<?php echo $pager->getPreviousPage() ?>">
        <img src="/images/previous.png" alt="Previous page" title="Previous Page"/>
    </a>

    <?php foreach ($pager->getLinks() as $page): ?>
        <?php if ($page == $pager->getPage()): ?>
            <?php echo $page ?>
        <?php else: ?>
            <a class="pagination-text" href="<?php echo url_for('genus_note/index')?>?page=<?php echo $page?>">
                <?php echo $page ?>
            </a>
        <?php endif; ?>
    <?php endforeach; ?>

    <a href="<?php echo url_for('genus_note/index')?>?page=<?php echo $pager->getNextPage()?>">
        <img src="/images/next.png" alt="Next Page" title="Next page"/>
    </a>

    <a href="<?php echo url_for('genus_note/index')?>?page=<?php echo $pager->getLastpage() ?>">
        <img src="/images/last.png" alt="Last Page" title="Last Page"/>
    </a>
</div>
<?php endif; ?>


<div class="pagination-description">
    Total of <?php echo $pager->getNbResults() ?> notes
    <?php if ($pager->haveToPaginate()): ?>
        - page <?php echo $pager->getPage()?>/ <?php echo $pager->getLastPage() ?>
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
        $('#admin_notes_table').DataTable({
            paging: false,
            info: false,
            searching: false
        });
    });
</script>
