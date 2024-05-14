<?php
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if provided username and password match the hardcoded values for admin
    if ($username === 'admin' && $password === 'pass') {
        // Set session and redirect to admin.php
        $_SESSION["admin_id"] = 1; // You can set any value here for admin session
        header("Location: admin.php");
        exit();
    } else {
        $error_message = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
}

form {
    width: 300px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="password"] {
    width: calc(100% - 12px);
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    margin-bottom: 10px;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    background-color: #000000;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #210c0c;
}

.error {
    color: #ff0000;
    margin-top: 10px;
}
</style>
</head>
<body>
    <h2>Admin Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <?php if (isset($error_message)) : ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <input type="submit" value="Login">
    </form>
</body>
</html>
