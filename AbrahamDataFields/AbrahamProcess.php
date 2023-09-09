<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $date = $_POST["date"];
    $gender = $_POST["gender"];
    $subscribe = isset($_POST["subscribe"]) ? "Yes" : "No";

    // Validate data
    $valid = true;

    // Check if all fields are populated
    if (empty($name) || empty($age) || empty($email) || empty($phone) || empty($date) || empty($gender)) {
        $valid = false;
    }

    // Check age is a positive integer
    if (!is_numeric($age) || $age <= 0 || strpos($age, '.') !== false) {
        $valid = false;
    }

    // Check email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $valid = false;
    }

    // Check phone format (10 digits)
    if (!preg_match("/^\d{10}$/", $phone)) {
        $valid = false;
    }

    // Check if the float has a decimal point
    $floatField = $_POST["floatField"];
    if (!is_numeric($floatField) || strpos($floatField, '.') === false) {
        $valid = false;
    }

    if ($valid) {
        header("Location: AbrahamSuccess.html"); // Redirect to success page
        exit();
    } else {
        header("Location: AbrahamError.html"); // Redirect to error page
        exit();
    }
}
?>
