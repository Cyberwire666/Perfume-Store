<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location: login.php");
}
// Fetch men's perfumes from the database
$sql = "SELECT * FROM tb_perfumes WHERE gender = 'Women'";
$result = mysqli_query($conn, $sql);
$perfumes = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>women's Perfumes</title>
    <link rel="stylesheet" href="men.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body>
    <header>
        <div class="header">
            <a href="home.php">Home</a>
            <a href="logout_women.php">Logout</a>
            
        </div>
    </header>

    <div class="container">
    <h2>Hi <?php echo $row["name"];?></h2>
        <h1>Women's Perfumes</h1>
        <input type="text" id="searchInput" placeholder="Search for perfumes...">
        
        <div class="perfume">
            <?php foreach ($perfumes as $perfume): ?>
            <div class="perfume-item">
                <img src="<?php echo $perfume['image_path']; ?>" alt="<?php echo $perfume['name']; ?>">
                <h2><?php echo $perfume['name']; ?></h2>
                <p><?php echo $perfume['price']; ?>$</p>
                <form action="buy.php" method="POST">
                    <input type="hidden" name="perfume_id" value="<?php echo $perfume['id']; ?>">
                    <input type="submit" value="Buy Now">
                </form>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script>
        // JavaScript for search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            var searchTerm = this.value.toLowerCase();
            var perfumeItems = document.querySelectorAll('.perfume-item');

            perfumeItems.forEach(function(item) {
                var perfumeName = item.getAttribute('data-name');
                if (perfumeName.indexOf(searchTerm) !== -1) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>
</body>
<footer>
  <p>&copy; 2024 Amr - Yehia - Sara - Mariam . All rights reserved.</p>
</footer>
</html>
