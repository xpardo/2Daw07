<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>
<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="ca">
<?= My\Helpers::render("/_commons/head.php", ["subtitle" => "Sign in"]) ?>


<body>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">



    <?= My\Helpers::render("/_commons/header.php", ["subtitle" => "Sign in"]) ?>

    <h2>Sign in</h2>
    <p>Welcome back!</p>
    
    <ul>
        <li>Operative system: <?= PHP_OS ?></li>
        <li>Web server: <?= $_SERVER['SERVER_SOFTWARE'] ?></li>
        <li>PHP version: <?= phpversion() ?></li>
        <li>IP address: <?= getHostByName(getHostName()) ?></li>
    </ul>

    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">

                    <form name="login" action="<?= My\Helpers::url("/user/login_action.php") ?>" method="post">

                        <p>
                            <label id="username">username</label>
                            <input type="text" name="username"  >
                        </p>
                        <p>
                            <label id="password">Contrasenya</label>
                            <input type="password" name="password" >
                        </p>
                        <p>
                            <label>
                                <input type="checkbox" name="remember">Remember me
                            </label>
                        </p>
                        <p>
                            <button>Sign in</button>
                            <button type="reset">Reset form</button>
                        </p>

                    </form>
                    
                </div>
            </div>
        </div>
        <br>
         <p>Si ancara no t'as registrat -><a href="<?= My\Helpers::url("/web/user/register.php") ?>">register</a></p>
    </div>

    
    <br>
   <?= My\Helpers::render("/_commons/footer.php") ?>
</body>
</html>
