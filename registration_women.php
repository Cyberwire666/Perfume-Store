<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alter('Username or Email Has Already Taken'); </script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn,$query);
            echo
            "<script> alter('Registration Successful'); </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="login.css">
</head>
<body class="img">
    <div class="content">
    <h2>Registration </h2>
    <form action="" class="" method="post" autocomplete="off">
        <div class="filed">
        <input type="text" name="name" id="name" required value="" placeholder="Name">
        </div> <br>
        <div class="filed">
        <input type="text" name="username" id="username" required value="" placeholder="username"> 
        </div> <br>
        <div class="filed">
        <input type="email" name="email" id="email" required value="" placeholder="Email">
        </div>
        <div class="filed space">
        <input type="password" name="password" id="password" required value="" placeholder="Password" class="pass-key">
        <span class="show">Show</span>
        </div>
        <div class="filed space">
        <input type="password" name="confirmpassword" id="confirmpassword" required value="" placeholder="Confirm password">
        </div>
        <div>
        <button type="submit" name="submit" style="background: #4180ab; border: 8px solid #407ca5;color: white;cursor: pointer ; height: 100%; width: 100%; border: none;outline: none;color: #222; margin-top: 30px;font-size: 18px ">Register</button>
        </div>
    </form>
    <br>
    <a href="login_women.php">Login</a>
    </div>
    <script type="text/javascript" src="login.js"></script>
</body>
</html>