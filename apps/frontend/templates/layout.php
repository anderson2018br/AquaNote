<!doctype html>
<html lang="en">
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <title>AquaNote</title>
    <link rel="shortcut icon" href="/favicon.ico"/>
</head>
<body hidden>
    <header class="container-fluid">
        <a href="<?php echo url_for('genus/index')?>" style="text-decoration: none;">
            <img id="menu-button" class="aqua-logo" src="/images/aquanote-logo.png" alt=""/>
            <h1 class="aqua-text">AquaNote</h1>
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

    <menu class="menu-activate">
        <ul>
            <li class="menu-item">
                <span class="fa f fa-home">&nbsp;</span>
                <a href="<?php echo url_for('genus/index') ?>">Home</a>
            </li>
            <li class="menu-item">
                <span class="fa f fa-fish">&nbsp;</span>
                <a href="<?php echo url_for('genus/list')?>">Genus</a>
            </li>

            <?php if ($sf_user->isAuthenticated()): ?>
                <li class="menu-item">
                    <span class="fa f fa-book">&nbsp;</span>
                    <a href="#" style="padding-left: 105px">Notes</a>
                </li>
                <li class="menu-item">
                    <span class="fa f fa-fish">&nbsp;</span>
                    <a href="#">SubFamilies</a>
                </li>
                <li class="menu-item">
                    <span class="fa f fa-person-booth">&nbsp;</span>
                    <a href="/admin_dev.php/">Admin Area</a>
                </li>
                <li class="menu-item">
                    <span class="fa f fa-door-closed">&nbsp;</span>
                    <a href="<?php echo url_for('sf_guard_signout') ?>">Logout</a>
                </li>
            <?php else: ?>
                <li class="menu-item">
                    <span class="fa f fa-door-open">&nbsp;</span>
                    <a href="<?php echo url_for('sf_guard_signin')?>">Login</a>
                </li>
            <?php endif; ?>
        </ul>
    </menu>

    <main>
        <div class="container">
            <?php echo $sf_content ?>
        </div>
    </main>

    <footer class="footer">
        <p class="footer-text">Made With <span class="fa fa-heart" style="color: red;">&nbsp;</span> Symfony</p>
    </footer>
</body>
</html>

<script>
    $(document).ready(function () {
        $('body').removeAttr('hidden');
    });
</script>
