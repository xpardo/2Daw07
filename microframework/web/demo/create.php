<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>

<!DOCTYPE html>
<html lang="ca">
<?= My\Helpers::render("/_commons/head.php", ["subtitle" => "Home"]) ?>
<body>
    <?= My\Helpers::render("/_commons/header.php") ?>
    <h2>Create product</h2>
    <p>Enter product name.</p>
    <form name="create1" action="create1_action.php" method="POST">
        <p>
            <label>Product name</label><br>
            <input type="text" name="name"/>
        </p>
        <p>
            <button type="submit">Create</button>
            <button type="reset">Reset form</button>
        </p>
    </form>

    <form name="create2" action="create2_action.php" method="POST" 
        enctype="multipart/form-data" >
        <p>
            <label>Product name</label><br>
            <input type="text" name="name" required />
        </p>
        <p>
            <label>Product photo</label><br>
            <!-- MAX_FILE_SIZE must precede the file input field -->
            <input type="hidden" name="MAX_FILE_SIZE" 
                value="<?= My\Helpers::MAX_FILE_SIZE ?>" />
            <!-- Name of input element determines name in $_FILES array -->
            <input type="file" name="photo" accept=".jpg, .jpeg, .png" />
        </p>
        <p>
            <button type="submit">Create</button>
            <button type="reset">Reset form</button>
        </p>
    </form>
    <?= My\Helpers::render("/_commons/footer.php") ?>
</body>
</html>