<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>
<!DOCTYPE html>
<html lang="ca">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Projecte J-Suite</title>
</head>
<body>
   <header>
   <h1><a href="<?= My\Helpers::url("/") ?>">Projecte J-Suite</a></h1>
   </header>
   <h2>Sign in</h2>
   <p>Welcome back!</p>
   <ul>
       <li>Operative system: <?= PHP_OS ?></li>
       <li>Web server: <?= $_SERVER['SERVER_SOFTWARE'] ?></li>
       <li>PHP version: <?= phpversion() ?></li>
       <li>IP address: <?= getHostByName(getHostName()) ?></li>
   </ul>
   <footer>
       <p>Curs 2021-22 de 2DAW</p>
       <p>esto es un login</p>
   </footer>
</body>
</html>
