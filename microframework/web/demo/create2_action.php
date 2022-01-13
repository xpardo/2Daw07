<?php 

require_once __DIR__ . "/../../vendor/autoload.php";

// Data received?
if (!empty($_POST)) {
    // Valid data?
    if (!empty($_POST["name"])) {
        $data = [
            "name"  => $_POST["name"],
            "photo" => null
        ];
        // Step 1. Upload file (optional)
        if (isset($_FILES["photo"])) {
            try {
                // Upload file
                $data["photo"] = My\Helpers::upload($_FILES["photo"]);
            } catch (Exception $e) {
                // Uploads dir error...
                echo "Upload dir error" . $e->getMessage();
                print_r(error_get_last());
                print_r($_FILES["photo"]);
                die;
            }
        }
        // Step 2. Create new product...
        // Step 3. Redirect to new product
        $url = My\Helpers::url("/demo/view.php?id={$id}");
        My\Helpers::redirect($url);
    } else {
        // Empty fields error...
        $msg = "Required name is empty";
        My\Helpers::flash($msg);
    }
}
// No data or invalid data? Return to form page
$url = My\Helpers::url("/demo/create.php");
My\Helpers::redirect($url);