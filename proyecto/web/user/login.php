<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>
<!DOCTYPE html>
<html lang="ca">
<?= My\Helpers::render("/_commons/css.php") ?>
<?= My\Helpers::render("/_commons/js.php") ?>
<?= My\Helpers::render("/_commons/head.php") ?>
<body>
    <?= My\Helpers::render("/_commons/header.php", ["subtitle" => "Sign in"]) ?>
   <h2>Sign in</h2>
   <p>Welcome back!</p>
  
   <ul>
       <li>Operative system: <?= PHP_OS ?></li>
       <li>Web server: <?= $_SERVER['SERVER_SOFTWARE'] ?></li>
       <li>PHP version: <?= phpversion() ?></li>
       <li>IP address: <?= getHostByName(getHostName()) ?></li>
   </ul>
   <?= My\Helpers::render("/_commons/footer.php") ?>
</body>
</html>
