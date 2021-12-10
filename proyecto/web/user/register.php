<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>


<!DOCTYPE html>
<html lang="ca">

<?= My\Helpers::render("/_commons/head.php", ["subtitle" => "Sign up"]) ?>


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
            
                <form name="signup" action="<?= My\Helpers::url("/user/register_action.php") ?>" method="post" enctype="multipart/form-data">
                   

                <p>
                    <label>Username</label><br>
                    <input type="text" name="username" required>
                </p>
                <p>
                    <label>Password</label><br>
                    <input type="password" name="password" required>
                </p>
                <p>
                    <label>Repeat password</label><br>
                    <input type="password" name="confirm_password" required>
                </p>
                <p>
                    <label>E-mail</label><br>
                    <input type="email" name="email" required>
                </p>
                <p>
                    <label>Image</label><br>
                    <input type="file" name="avatar">
                </p>
                <p>
                    <label>
                        <input type="checkbox" name="terms" required>
                        I agree to the <a href="<?= My\Helpers::url("/terms.php")  ?>">terms and conditions</a>
                    </label>
                </p>
                <p>
                    <button>Sign up</button>
                    <button type="reset">Reset form</button>
                </p>
                                

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
