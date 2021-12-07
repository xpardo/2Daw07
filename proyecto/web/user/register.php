<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>


<!DOCTYPE html>
<html lang="ca">


<?= My\Helpers::render("/user/user-register.php") ?>
<?= My\Helpers::render("/_commons/js.php") ?>
<?= My\Helpers::render("/_commons/head.php") ?>

<body>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


<?= My\Helpers::render("/_commons/header.php", ["subtitle" => "Sign up"]) ?>


   <h2>Sing up</h2>
   <p>Create an account.</p>



   <div class="container-fluid">
        <div class="row">
            <div class="container">
            
                <div class="row">
            
                    <form id="register"  action="../user/register_action1.php" method="POST">
                   

                        <p>                            
                            <label id="username">name</label><br>
                            <input type="text" name="username" require>
                        </p>


                        <p>
                            <lablel id="email">Email</libel><br>
                            <input type="email" name="email" require>
                        </p>

                    
                        <p>
                            <label id="password1">Contrasenya</label><br>
                            <input type="password" name="password1" require>
                        </p>

                        <p>
                     
                            <label id="password2">Torna a col·locar la contrasenya</label><br>
                            <input type="password" name="password2" require> 
                        </p>

                        <p>
                           
                            <label>puja una imatge per el teu avatar</label><br>

                            <input type="hidden" name="MAX_FILE_SIZE" value="<?= My\Helpers::MAX_FILE_SIZE ?>" />
                        
                            <input type="file" name="avatar" accept=".jpg, .png , .gif " />
                        </p>
              
                     
                        <input type="submit" value="Iniciar" >
                        

                    </form>
        
                </div>
            </div>
        </div>
        <br>
        <p>Anar al <a href="<?= My\Helpers::url("/web/user/login.php") ?>">login</a></p>
    </div> 


    <br>
   <?= My\Helpers::render("/_commons/footer.php") ?>
</body>
</html>
