<?php
require 'config.php';

// Redirect if user is already logged in
if (!empty($_SESSION["id"])) {
    header("Location: men.php");
    exit();
}

// Process login form submission
if (isset($_POST["submit"])) {
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];

    // Check if username or email exists in the database
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        // Verify password
        if ($password == $row["password"]) {
            $_SESSION["id"] = $row["id"];
            
            
        } else {
            echo "<script> alert('Wrong Password'); </script>";
        }
    } else {
        echo "<script> alert('User Not Registered'); </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body class="img">
<div class="content">
    <h2>Login</h2>
    <form action="" method="post" class="" autocomplete="off">
        <div class="filed">
            <input type="text" name="usernameemail" id="usernameemail" required value="" placeholder="Username or Email">
        </div>
        <div class="filed space">
            <input type="password" name="password" id="password" required value="" placeholder="Password" class="pass-key">
            <span class="show">Show</span>
        </div>
        <button class="submit" type="submit" name="submit" style="background: #4180ab; border: 2px solid #407ca5; color: white; cursor: pointer; height: 40px; border-radius: 5px; font-size: 16px; transition: background-color 0.3s ease; margin-top: 20px; outline: none; display: inline-block; padding: 0 20px; text-align: center; line-height: 40px; text-decoration: none;">
        Login
    </button>
    </form>
    <div class="signup">Don't have an account?
        <a href="registration_men.php"> Register Now</a>
    </div>
    <br>
    
</div>

<script type="text/javascript" src="login.js"></script>
</body>
<footer>
  <p>&copy; 2024 Amr - Yehia - Sara - Mariam . All rights reserved.</p>
</footer>
</html>
