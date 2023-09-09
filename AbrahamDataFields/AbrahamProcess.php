<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fields = [
        "field1" => $_POST["field1"],
        "field2" => $_POST["field2"],
        "field3" => $_POST["field3"],
        "field4" => $_POST["field4"],
        "field5" => $_POST["field5"],
        "field6" => $_POST["field6"],
        "field7" => $_POST["field7"]
    ];

    $valid = true;

    foreach ($fields as $fieldName => $fieldValue) {
        $expectedType = $_POST[$fieldName . "_type"];
        
        // Validate based on expected data type
        switch ($expectedType) {
            case "string":
                if (!is_string($fieldValue)) {
                    $valid = false;
                }
                break;
            case "integer":
                if (!is_numeric($fieldValue) || strpos($fieldValue, '.') !== false || intval($fieldValue) != $fieldValue) {
                    $valid = false;
                }
                break;
            case "float":
                if (!is_numeric($fieldValue) || strpos($fieldValue, '.') === false) {
                    $valid = false;
                }
                break;
            case "boolean":
                if ($fieldValue !== "true" && $fieldValue !== "false") {
                    $valid = false;
                }
                break;
        }
    }

    if ($valid) {
        header("Location: success.html"); // Redirect to success page
        exit();
    } else {
        header("Location: error.html"); // Redirect to error page
        exit();
    }
}
?>
