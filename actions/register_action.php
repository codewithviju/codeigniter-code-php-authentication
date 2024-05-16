<?php
include('../includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username   = $_POST['username'];
    $email      = $_POST['email'];
    $password   = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check_email_sql = "SELECT * FROM isuser WHERE email = '$email'";
    $check_email_result = $conn->query($check_email_sql);

    if ($check_email_result->num_rows > 0)
    {
        $_SESSION['flash_message'] = "Email Already Exists";
        header('Location: ../pages/login.php');
        exit();
    }
    else
    {
        $sql = "INSERT INTO isuser (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            header('Location: ../pages/login.php');
            exit();
        } else {
            $_SESSION['flash_message'] = "Something Wrong Happen";
            header('Location: ../pages/login.php');
            exit();
        }
    }
}
