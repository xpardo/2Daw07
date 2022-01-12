<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>

<!DOCTYPE html>
<html lang="ca">
<?= My\Helpers::render("/_commons/head.php", ["subtitle" => "Recover password"]) ?>
<body>
    <?= My\Helpers::render("/_commons/header.php") ?>
    <h2>Password recovery</h2>
    <p>Change your password :-)</p>
    <form name="forgot2" action="<?= My\Helpers::url("/user/forgot2_action.php") ?>" method="post">
        <input type="hidden" name="token" value="<?= $_GET["token"] ?>">
        <p>
            <label>Password</label><br>
            <input type="password" name="password" required>
        </p>
        <p>
            <label>Repeat password</label><br>
            <input type="password" name="confirm_password" required>
        </p>
        <p>
            <button>Send</button>
            <button type="reset">Reset form</button>
        </p>
    </form>
    <?= My\Helpers::render("/_commons/footer.php") ?>
</body>
</html>