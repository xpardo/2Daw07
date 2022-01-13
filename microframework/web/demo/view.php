<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>

<!DOCTYPE html>
<html lang="ca">
<?= My\Helpers::render("/_commons/head.php", ["subtitle" => "Home"]) ?>
<body>
    <?= My\Helpers::render("/_commons/header.php") ?>
    <h2>Product</h2>
    <p>ID: <?= $_GET["id"] ?></p>
    <p>TO DO</p>
    <?= My\Helpers::render("/_commons/footer.php") ?>
</body>
</html>