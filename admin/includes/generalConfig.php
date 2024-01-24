<?php
session_start();
ob_start();
include 'database.php';

// Login user using prepared statement if login button is clicked
if (isset($_POST['login'])) {
    // Get form data and store in variables also sanitize data
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    // Check if email or JRN already exists 
    $sql = "SELECT * FROM admins WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($link, $sql);
    $user = mysqli_num_rows($result);
    if ($user == 1) {
        // Check if password match
        $sql = "SELECT * FROM admins WHERE email = '$email' AND password = '$password' LIMIT 1";
        $result = mysqli_query($link, $sql);
        $user = mysqli_num_rows($result);
        if ($user == 1) {
            // Login user
            $sql = "SELECT * FROM admins WHERE email = '$email' AND password = '$password' LIMIT 1";
            $result = mysqli_query($link, $sql);
            $user = mysqli_fetch_assoc($result);
            $_SESSION['admin_auth'] = $user['id'];
            header('location: ../dashboard.php?type=success&msg=Login Successful');
            exit();
        } else {
            header('location: ../index.php?type=error&msg=Incorrect Password');
            exit();
        }
    } else {
        header('location: ../index.php?type=error&msg=Email does not exist');
        exit();
    }
}


