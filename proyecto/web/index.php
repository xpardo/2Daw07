<?php require_once __DIR__ . "/../vendor/autoload.php"; ?>
<?php
  session_start();
  $_SESSION = $uid;
?>
<!DOCTYPE html>
<html lang="ca">

<?= My\Helpers::render("/_commons/js.php") ?>
<?= My\Helpers::render("/_commons/head.php") ?>
<?= My\Helpers::render("/_commons/head.php", ["subtitle" => "Index"]) ?>

<body>
   <header>
   
    <?= My\Helpers::render("/_commons/header.php", ["subtitle" => "Index"]) ?>
    <?= My\Helpers::flash("Required name is empty");?>


    <?php
      if($_SESSION[$uid]) {
      ?>
      <?php echo $_SESSION[$uid]; ?>
         <a href="<?= My\Helpers::url("/web/user/logout.php") ?>">Logout.</a>
         <a href="<?= My\Helpers::url("/web/user/profile.php") ?>">Perfil.</a>
      <?php
      }else{?> 

         <p>
         <a href="<?= My\Helpers::url("/web/user/login.php") ?>">login</a> ||
         <a href="<?= My\Helpers::url("/web/user/register.php") ?>">register</a>
      </p>
      <?php
      }
      ?>
  
   </header>


  



  

   <h2>Homepage</h2>
   <p>My first PHP web app works!</p>
   <ul>
       <li>Operative system: <?= PHP_OS ?></li>
       <li>Web server: <?= $_SERVER['SERVER_SOFTWARE'] ?></li>
       <li>PHP version: <?= phpversion() ?></li>
       <li>IP address: <?= getHostByName(getHostName()) ?></li>
   </ul>

   <?= My\Helpers::render("/_commons/footer.php") ?>
</body>
</html>
