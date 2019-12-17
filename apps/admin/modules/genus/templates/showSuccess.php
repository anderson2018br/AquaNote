<h2 class="genus-name"><?php echo $genus->getname() ?></h2>
<div class="sea-creature-container">
    <div class="genus-photo"></div>
    <div class="genus-details">
        <dl class="genus-details-list">
            <dt>Sub Family:</dt>
            <dd><?php echo $sub_family->getname()?></dd>
            <dt>Known Species</dt>
            <dd><?php echo $genus->getspecies_count() ?></dd>
            <dt>Fun Fact</dt>
            <dd><?php echo $genus->getfun_fact() ?></dd>
            <dt>Created By</dt>
            <dd><?php echo $user->getusername() ?></dd>
        </dl>
    </div>
</div>
<?php if ($sf_user->isAuthenticated()): ?>
<?php $form->setDefault('username', $sf_user->getusername()) ?>
<div class="js-add-note" id="note-form">
    <h1 class="title">New Note</h1>
    <?php include_partial('formNotes', array('form' => $form)); ?>
</div>
<div class="notes-container">
    <h2 class="notes-header">Notes</h2>
    <div>
        <a href="#" class="btn-note">
            <span class="fa plus fa-plus-circle fa-lg" style="margin-top: 11px!important;">&nbsp;</span>
        </a>
    </div>
</div>
<?php else: ?>
<h2 class="notes-container notes-header">Notes</h2>
<?php endif; ?>
<div id="js-notes-wrapper"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.3/react.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.3/react-dom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
<script src="/js/jquery-3.4.1.min.js"></script>
<script type="text/babel" src="/js/notes.react.js"></script>

<script type="text/babel">
    let notesUrl = 'http://127.0.0.1:8000/genus/<?php echo $genus->getname()?>/notes';
    ReactDOM.render(
        <NoteSection url={notesUrl}/>,
        document.getElementById('js-notes-wrapper')

    );
</script>

<script>
    $('.btn-note').on('click', function (e) {
        e.preventDefault();
        $('.plus').toggleClass('fa-plus-circle');
        $('.plus').toggleClass('fa-minus-circle');
        $('#note-form').toggleClass('js-note-box');
    });
</script>
