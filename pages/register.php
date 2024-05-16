<?php 
session_start();
if(isset($_SESSION['email']))
{
    header("Location: ./dashboard.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" defer></script>
</head>

<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="registerForm" class="form" action="../actions/register_action.php" method="post">
                            <h3 class="text-center text-info">Register</h3>
                            <?php
                            if (isset($_SESSION['flash_message'])) {
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_SESSION['flash_message']; ?>
                                </div>
                            <?php
                                unset($_SESSION['flash_message']);
                            }
                            ?>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <span class="text-danger" style="display: none;" id="usernameError">Username is Required</span>
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <span class="text-danger" style="display: none;" id="emailError">Email is Required</span>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <span class="text-danger" style="display: none;" id="passwordError">Password is Required</span>
                            <div class="form-group mt-2">
                                <input type="button" id="registerBtn" class="btn btn-info btn-md" value="Register">
                            </div>
                            <p>Already have an Account? <a href="./login.php">Click Here</a> to Login</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on("click", "#registerBtn", function() {
                const username = $("#username").val();
                const email = $("#email").val();
                const password = $("#password").val();

                let usernameError = false;
                let emailError = false;
                let passwordError = false;

                if (username.length == 0) {
                    $("#usernameError").show();
                    usernameError = true;
                } else {
                    $("#usernameError").hide();
                }

                if (email.length == 0) {
                    $("#emailError").show();
                    emailError = true;
                } else {
                    $("#emailError").hide();
                }

                if (password.length == 0) {
                    $("#passwordError").show();
                    passwordError = true;
                } else {
                    $("#passwordError").hide();
                }

                if (!usernameError && !emailError && !passwordError) {
                    $("#registerForm").submit();
                }
            });
        });
    </script>
</body>
</html>



<!------ Include the above in your HEAD tag ---------->