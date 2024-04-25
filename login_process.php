<?php
session_start();

// Replace with your actual admin username and password
$admin_username = "admin";
$admin_password = "ad@1234567";

$username = $_POST['username'];
$password = $_POST['password'];

if ($username == $admin_username && $password == $admin_password) {
    $_SESSION['loggedin'] = true;
    header('Location: رفع.html');
    exit;
} else {
    echo "Invalid username or password. Please try again.";
}
?>

