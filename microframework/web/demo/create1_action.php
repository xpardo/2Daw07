<?php 

require_once __DIR__ . "/../../vendor/autoload.php";

// Data received?
if (!empty($_POST)) {
    // Valid data?
    if (!empty($_POST["name"])) {
        // Step 1. Create new product...
        // Step 2. Redirect to new product
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