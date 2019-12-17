<!doctype html>
<html lang="en">
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <title>Admin</title>
    <link rel="shortcut icon" href="/favicon.ico"/>
</head>
<body hidden>
<header class="container-fluid">
    <a href="<?php echo url_for('genus/index') ?>" style="text-decoration: none;">
        <img id="menu-button" class="aqua-logo" src="/images/aquanote-logo.png" alt=""/>
        <h1 class="aqua-text">Admin Area</h1>
    </a>
    <?php if ($sf_user->isAuthenticated()): ?>
        <a href="<?php echo url_for('sf_guard_signout') ?>" style="float: right; margin-top: 25px;" class="btn btn-sm btn-light">
            Logout
        </a>
    <?php else: ?>
        <a href="<?php echo url_for('sf_guard_signin') ?>" style="float: right; margin-top: 25px;" class="btn btn-sm btn-light">
            Login
        </a>
    <?php endif; ?>
</header>
<?php if ($sf_user->isAuthenticated()): ?>
<menu class="menu-activate">
    <ul>
        <li class="menu-item">
            <span class="fa f fa-home">&nbsp;</span>
            <a href="<?php echo url_for('genus/index')?>">Home</a>
        </li>
        <li class="menu-item">
            <span class="fa f fa-fish">&nbsp;</span>
            <a href="<?php echo url_for('list') ?>">Genus</a>
        </li>
        <li class="menu-item">
            <span class="fa f fa-water">&nbsp;</span>
            <a href="<?php echo url_for('sub_family') ?>">SubFamilies</a>
        </li>
        <li class="menu-item">
            <span class="fa f fa-door-closed">&nbsp;</span>
            <a href="<?php echo url_for('sf_guard_signout') ?>">Logout</a>
        </li>
    </ul>
</menu>
<?php endif; ?>
<main>
    <div class="container">
        <?php echo $sf_content ?>
    </div>
</main>

<footer class="footer">
    <a class="footerAnchor" href="<?php echo url_for('genus/index')?>"><span style="color: black!important;" class="fa f fa-home">&nbsp;</span>Home</a>
    <a class="footerAnchor" href="<?php echo url_for('list') ?>"><span style="color: black!important;" class="fa f fa-fish">&nbsp;</span>Genus</a>
    <a class="footerAnchor" href="<?php echo url_for('sub_family') ?>"><span style="color: black!important;    margin-left: 35px;" class="fa f fa-water">&nbsp;</span>SubFamily</a>
    <a class="footerAnchor" href="<?php echo url_for('sf_guard_signout') ?>"><span class="fa f fa-door-closed" style="color: black!important;">&nbsp;</span>Logout</a>
</footer>
<!--<footer class="footer" style="background-color: black!important;">-->
<!--    <p class="footer-text">Made With <span class="fa fa-heart" style="color: red">&nbsp;</span> Symfony</p>-->
<!--</footer>-->
</body>
</html>
<script>
    $(document).ready(function () {
        $('body').removeAttr('hidden');
    });
</script>
