<?php
session_start();
include '../../controllers/database.php';

if (isset($_POST['login'])) {
    // sanitize input data
    $email = mysqli_real_escape_string($dbconnect, $_POST['email']);
    $password = mysqli_real_escape_string($dbconnect, $_POST['password']);

    // check if email exist using prepared statement
    $check_email = $dbconnect->prepare("SELECT * FROM users WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $check_email = $check_email->get_result();
    $check_email = mysqli_fetch_all($check_email, MYSQLI_ASSOC);
    if (count($check_email) > 0) {
        if ($password == $check_email[0]['password']) {
                // set session
                $_SESSION['auth_id'] = $check_email[0]['id'];
                $_SESSION['user_name'] = $check_email[0]['name'];
                $_SESSION['user_email'] = $check_email[0]['email'];
                header("Location: ../dashboard.php");
        } else {
            header("Location: ../index.php?type=error&msg=Incorrect password");
        }
    } else {
        header("Location: ../index.php?type=error&msg=Email does not exist");
    }

}