<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>

<!DOCTYPE html>
<html lang="ca">
<?= My\Helpers::render("/_commons/head.php", ["subtitle" => "Home"]) ?>
<body>
    <?= My\Helpers::render("/_commons/header.php") ?>
    <h2>Search products</h2>
    <p>Enter product name.</p>
    <form name="search">
        <p>
            <label>Product name</label><br>
            <input type="text" name="name" value="<?= $_GET["name"] ?>" required>
        </p>        
        <p>
            <button type="submit">Search</button>
            <button type="reset">Reset form</button>
        </p>
    </form>
    <?php 
        // Filter products
        $name = $_GET["name"];
        $results = [];
        // ...

        $list = ["Product1", "Product2", "Product3", "Product4"];
        foreach ($list as $product) {
            if (strpos($product, $name) !== false) {
                array_push($results, $product);
            }
        }
    ?>
    <p>Results:</p>
    <ul>
    <?php foreach($results as $result): ?>
        <li><?= $result ?></li>
    <?php endforeach; ?>
    </ul>
    <?= My\Helpers::render("/_commons/footer.php") ?>
</body>
</html>