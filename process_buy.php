
<?php
// Check if a session is already active before starting a new one

require 'config.php';

// Check if perfume ID is set
if(isset($_POST['perfume_id'])) {
    // Retrieve the perfume ID from the form submission
    $perfume_id = $_POST['perfume_id'];

    // Fetch the details of the selected perfume from the database
    $sql = "SELECT * FROM tb_perfumes WHERE id = $perfume_id";
    $result = mysqli_query($conn, $sql);
    $perfume = mysqli_fetch_assoc($result);

    // Check if the perfume details are fetched successfully
    if ($perfume) {
        // Get the user ID from the session
        $user_id = $_SESSION['id'];

        // Insert the purchase record into the database
        $insert_sql = "INSERT INTO tb_buy (user_id, perfume_id, quantity, purchase_date) VALUES ($user_id, $perfume_id, 1, NOW())";
        if (mysqli_query($conn, $insert_sql)) {
          
        } else {
            echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Perfume not found.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="footer.css">
  <title>Process Buy</title>
</head>
<body>

<h1>Order Done!</h1>
  
<section>
  <ul>
    <li data-text="Home"><a href="home.php">Home</a></li>
    <li data-text="Men"><a href="men.php">Men</a></li>
    <li data-text="Women"><a href="women.php">Women</a></li>
  </ul>
</section>
</body>
<style>
*{
  margin:0;
  padding:0;
}
h1{
  text-align:center;
  color:magenta;
  font-family:'Courier New', Courier, monospace;
}
body{
  background: linear-gradient(#01012e , #240019);
  height: 100vh;
  font-family: system-ui;

}
section{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}
ul{
  text-align: center;
}
ul:hover li a{
  opacity: 0;
}
ul li{
  list-style: none;
  margin: 14px 0;
}
ul li a{
color: white;
text-decoration: none;
font-size: 20px;
font-weight:500;
letter-spacing: 4px;
background: darkblue;
padding:6px 15px;
border-radius:20px;
display: inline-block;
text-transform: uppercase;
width: 120px;
transition: .5s;
position: relative;
z-index: 10;
}
ul li a:hover{
  transform: scale(1.5);
  background: darkmagenta;
  opacity: 1;
}
ul li::after{
  content: attr(data-text);
  color:white;
  position:absolute;
  left:50%;
  top:50%;
  transform:translate(50%,50%);
  font-size: 80px;
  font-weight: 900;
  text-transform: uppercase;
  opacity: 0;
  letter-spacing: 50px;
  pointer-events: none;
  transition: .5s;
}
ul li:hover:after{
opacity: .5;
letter-spacing: 5px;
}
ul li::before{
  content:'';
  width: 180px;
  height: 80px;
  position: absolute;
  left:50%;
  top: 50%;
  transform: translate(-50%,70%);
  border-radius: 50%;
  box-shadow: 0 0 80% orangered;
  opacity: 0;
  transition: .5s;

}
ul li:hover::before{
  opacity: .5;
  width: 80px;
}

</style>
<footer>
  <p>&copy; 2024 Amr - Yehia - Sara - Mariam . All rights reserved.</p>
</footer>
</html>