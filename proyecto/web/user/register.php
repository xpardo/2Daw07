<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>

<!DOCTYPE html>
<html lang="ca">

<?= My\Helpers::render("/_commons/js.php") ?>
<?= My\Helpers::render("/_commons/css.php") ?>
<?= My\Helpers::render("/_commons/head.php") ?>

<body>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/bootstrap-social.css">
<script src="assets/js/jquery.js" ></script>
<link rel="stylesheet" href="css/estilos.css">













<?= My\Helpers::render("/_commons/header.php", ["subtitle" => "Sign up"]) ?>


   <h2>Sing up</h2>
   <p>Create an account.</p>


   <ul>
       <li>Operative system: <?= PHP_OS ?></li>
       <li>Web server: <?= $_SERVER['SERVER_SOFTWARE'] ?></li>
       <li>PHP version: <?= phpversion() ?></li>
       <li>IP address: <?= getHostByName(getHostName()) ?></li>
   </ul>

<!-- 
   <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <form id='register' method="POST" action="/tarda/proyecto/web/user/login.php">

                                                    
                        <label id="username">username</label>
                        <input type="text" name="username" require>

                        <lablel id="email">Email</libel>
                        <input type="text" name="email" require>

                        <label id="password1">Contrasenya</label>
                        <input type="password" name="password1" require>

                        <label id="password2">Torna a col·locar la contrasenya</label>
                        <input type="password" name="password2" require> 
                        
                        <label id="avatar">puga una imatge per el teu avatar</label>
                        <input type="file" name="avatar" require>

                        <br>
                        <input type="submit" value="Iniciar" >

                    </form>
                </div>
            </div>
        </div>
    </div> -->



   <?= My\Helpers::render("/_commons/footer.php") ?>
</body>
</html>
