<?php
require 'config.php';

// Check if perfume ID is set
if(isset($_POST['perfume_id'])) {
    // Retrieve the perfume ID from the form submission
    $perfume_id = $_POST['perfume_id'];

    // Fetch the details of the selected perfume from the database
    $sql = "SELECT * FROM tb_perfumes WHERE id = $perfume_id";
    $result = mysqli_query($conn, $sql);
    $perfume = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Perfume</title>
    <link rel="stylesheet" href="buy.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body>
    <header>
        <div class="header">
            <a href="men.php">back</a>
            <a href="home.php">Home</a>
        </div>
    </header>

    <div class="container">
        <h1>Buy Perfume</h1>
        <?php if(isset($perfume)): ?>
        <div class="perfume-details">
            <img src="<?php echo $perfume['image_path']; ?>" alt="<?php echo $perfume['name']; ?>">
            <h2><?php echo $perfume['name']; ?></h2>
            <p><?php echo $perfume['price']; ?>$</p>
            <form action="process_buy.php" method="POST">
                <input type="hidden" name="perfume_id" value="<?php echo $perfume['id']; ?>">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1" required>
                <input type="submit" value="Proceed to Checkout">
            </form>
        </div>
        <?php else: ?>
        <p>No perfume selected.</p>
        <?php endif; ?>
    </div>
</body>
<footer>
  <p>&copy; 2024 Amr - Yehia - Sara - Mariam . All rights reserved.</p>
</footer>
</html>
