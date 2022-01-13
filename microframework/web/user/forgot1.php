<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>

<!DOCTYPE html>
<html lang="ca">
<?= My\Helpers::render("/_commons/head.php", ["subtitle" => "Recover password"]) ?>
<body>
    <?= My\Helpers::render("/_commons/header.php") ?>
    <h2>Password recovery</h2>
    <p>I forgot my password :-(</p>
    <form name="forgot1" action="<?= My\Helpers::url("/user/forgot1_action.php") ?>" method="post">
        <p>
            <label>Email</label><br>
            <input type="text" name="email" required>
        </p>
        <p>
            <button>Send</button>
            <button type="reset">Reset form</button>
        </p>
    </form>
    <?= My\Helpers::render("/_commons/footer.php") ?>
</body>
</html>