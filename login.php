<?php
function checkCredentials($email, $password) {
    $file = file("credentials.txt", FILE_IGNORE_NEW_LINES);
    if ($file) {
        foreach ($file as $line) {
            list($name, $storedEmail, $storedPassword) = explode(",", $line);
            if ($email === $storedEmail && $password === $storedPassword) {
                return true;
            }
        }
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check credentials
    if (checkCredentials($email, $password)) {
        echo "Login successful. Welcome!";
        header("Location: ./index.html?value=true"); // Redirect to desired page
        exit;
    } else {
        echo "Invalid credentials. Please try again.";
        exit;
    }
}
?>
