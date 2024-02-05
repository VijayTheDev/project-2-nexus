<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if name is empty
    if (empty($_POST["name"])) {
        echo "Name is required";
    } else {
        $name = sanitize_input($_POST["name"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            echo "Only letters and white space allowed in name";
        }
    }

    // Check if email is empty
    if (empty($_POST["email"])) {
        echo "Email is required";
    } else {
        $email = sanitize_input($_POST["email"]);
        // Check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
        }
    }
}

// Function to sanitize input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>