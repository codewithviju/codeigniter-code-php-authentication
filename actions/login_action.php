<?php
session_start();
include('../includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM isuser WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['Password'])) {
            $_SESSION['email'] = $email;
            header('Location: ../pages/dashboard.php');
            exit();
        } else {
            $_SESSION['flash_message'] = "Invalid Email or Password";
            header('Location: ../pages/login.php');
            exit();
        }
    } else {
        $_SESSION['flash_message'] = "Invalid Email or Password";
        header('Location: ../pages/login.php');
        exit();
    }
}
?>
