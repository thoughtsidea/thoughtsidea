<?php
function isUserRegistered($email) {
    $file = fopen("credentials.txt", "r");
    if ($file) {
        while (!feof($file)) {
            $line = fgets($file);
            $credentials = explode(",", $line);
            if (isset($credentials[1]) && trim($credentials[1]) === $email) {
                fclose($file);
                return true;
            }
        }
        fclose($file);
    }
    return false;
}

function saveCredentials($name, $email, $password) {
    $file = fopen("credentials.txt", "a");
    if ($file) {
        fwrite($file, "$name,$email,$password\n");
        fclose($file);
        return true;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user is already registered
    if (isUserRegistered($email)) {
        echo "You have already signed up. Please <a href='login.html'>login</a> instead.";
        exit;
    }

    // Save credentials to file
    if (saveCredentials($name, $email, $password)) {
        header("Location: index.html?value=true"); // Redirect to desired page
        exit;
    } else {
        echo "Failed to save credentials. Please try again.";
        exit;
    }
}
?>
