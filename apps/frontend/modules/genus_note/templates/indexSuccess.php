<h1 class="title">Genus note List</h1>
<div class="search form-group">
    <label>Search
        <input type="search" id="search" class="form-control"/>
    </label>
</div>
<table class="table display" id="genus_notes_table">
  <thead>
    <tr>
      <th>User</th>
      <th>Genus</th>
      <th>Note</th>
      <th class="actions-align">Actions</th>
    </tr>
  </thead>
  <tbody id="myTable">
    <?php foreach ($genus_note_list as $genus_note): ?>
    <tr>
        <?php $user = $users->find($genus_note->getuser_id()) ?>
        <?php $avatar = $avatars->createQuery('a')->where('a.user_id = ?', $user->getid())->execute()?>
        <?php $genu = $genus->find($genus_note->getgenus_id()) ?>
      <td style="vertical-align: middle;"><?php foreach ($avatar as $ava): ?>
          <img style="width: 25px; border-radius: 50%;" src="/images/<?php echo $ava->getfile_name() ?>" alt="User Avatar" title="User Avatar"/>
          <?php endforeach; ?>
          <?php echo $user->getusername() ?></td>
      <td style="vertical-align: middle;"><?php echo $genu->getname() ?></td>
      <td><textarea class="form-control" style="border: 0; background-color: #FFFFFF;" readonly><?php echo $genus_note->getnote() ?></textarea></td>
      <td style="vertical-align: middle;" class="actions-align">
          <a class="actions" href="<?php echo url_for('genus_note_show', $genus_note)?>">
              <span class="fa fa-eye ">&nbsp;</span>
          </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php if ($pager->haveToPaginate()): ?>
<div class="pagination">
    <a href="<?php echo url_for('genus_note/index')?>?page=1">
        <img src="/images/first.png" alt="First Page" title="First page"/>
    </a>

    <a href="<?php echo url_for('genus_note/index')?>?page=<?php echo $pager->getPreviousPage()?>">
        <img src="/images/previous.png" alt="Previous Page" title="Previous Page"/>
    </a>

    <?php foreach ($pager->getLinks() as $page): ?>
        <?php if ($page == $pager->getPage()): ?>
            <?php echo $page ?>
        <?php else: ?>
            <a class="pagination-text" href="<?php echo url_for('genus_note/index')?>?page=<?php echo $page ?>">
                <?php echo $page ?>
            </a>
        <?php endif; ?>
    <?php endforeach; ?>

    <a href="<?php echo url_for('genus_note')?>?page=<?php echo $pager->getNextPage() ?>">
        <img src="/images/next.png" alt="Next Page" title="Next Page"/>
    </a>

    <a href="<?php echo url_for('genus_note')?>?page=<?php echo $pager->getLastPage() ?>">
        <img src="/images/last.png" alt="Last Page" title="Last Page"/>
    </a>
</div>
<?php endif; ?>

<div class="pagination-description">
    Total of <?php echo $pager->getNbResults() ?> notes
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
        $('#genus_notes_table').DataTable({
            paging: false,
            info: false,
            searching: false
        });
    });
</script>
