<h1 class="title">Genus List</h1>
<div class="form-group search">
<label>Search
    <input type="text" id="search" class="form-control"/>
</label>
</div>
<table class="table table-striped" id="table-list-genus">
    <thead>
    <tr>
        <th>Name</th>
        <th>Sub family</th>
        <th>Species count</th>
        <th>Fun fact</th>
        <th>First discovered at</th>
        <th>User</th>
        <th style="text-align: center;">Actions</th>
    </tr>
    </thead>
    <tbody id="myTable">
    <?php foreach ($genus_list as $genus): ?>
        <tr>
            <?php $family = $sub_family->find($genus->getsub_family_id())?>
            <?php $user = $users->find($genus->getuser_id()) ?>
            <td><?php echo $genus->getname() ?></td>
            <td><?php echo $family->getname() ?></td>
            <td><?php echo $genus->getspecies_count() ?></td>
            <td><?php echo $genus->getfun_fact() ?></td>
            <td><?php echo $genus->getfirst_discovered_at() ?></td>
            <td><?php echo $user->getusername() ?></td>
            <td style="text-align: center;">
                <a class="actions" href="<?php echo url_for('genus_show', $genus) ?>"><span class="fa fa-eye">&nbsp;</span></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php if ($pager->haveToPaginate()): ?>
<div class="pagination">
 <a href="<?php echo url_for('genus/list') ?>?page=1">
     <img src="/images/first.png" alt="Fist Page" title="First Page"/>
 </a>
    <a href="<?php echo url_for('genus/list')?>?page=<?php echo $pager->getPreviousPage()?>">
        <img src="/images/previous.png" alt="Previous Page" title="Previous page"/>
    </a>

    <?php foreach ($pager->getLinks() as $page): ?>
        <?php if ($page == $pager->getpage()): ?>
            <?php echo $page ?>
        <?php else: ?>
            <a href="<?php echo url_for('genus/list')?>?page=<?php echo $page?>">
                <?php echo $page ?>
            </a>
        <?php endif; ?>
    <?php endforeach; ?>

    <a href="<?php echo url_for('genus/list')?>?page=<?php echo $pager->getNextPage()?>">
        <img src="/images/next.png" alt="Next Page" title="Next Page"/>
    </a>

    <a href="<?php echo url_for('genus/list')?>?page=<?php echo $pager->getLastPage()?>">
        <img src="/images/last.png" alt="Last Page" title="Last page"/>
    </a>
</div>
<?php endif; ?>

<div class="pagination-description">
    Total of <?php echo $pager->getNbResults() ?> Genuses
    <?php if ($pager->haveToPaginate()): ?>
        - page <?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?>
    <?php endif; ?>
</div>
<script>
    $(document).ready(function () {
        $('#search').on("keyup",function () {
            let data = $(this).val().toLowerCase();
            $('#myTable tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(data) > -1)
            });
        });
        $('#table-list-genus').DataTable({
            paging: false,
            info: false,
            searching: false
        })
    });
</script>
