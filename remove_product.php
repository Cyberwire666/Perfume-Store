<?php
require 'config.php';

// Fetch products from the tb_perfumes table
$sql = "SELECT * FROM tb_perfumes";
$result = mysqli_query($conn, $sql);

// Check if any products exist
if (mysqli_num_rows($result) > 0) {
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $products = [];
}

// Process remove product functionality
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Delete the product from the database
    $delete_sql = "DELETE FROM tb_perfumes WHERE id = $product_id";
    if (mysqli_query($conn, $delete_sql)) {
        header("Location: remove_product.php"); // Redirect to refresh the page after deletion
        exit();
    } else {
        echo "Error deleting product: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Product</title>
    <link rel="stylesheet" href="manage_orders.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body>
<header>
        <div class="header">
            <h1>Remove Product</h1>
            <a href="admin.php">back</a>
        </div>
    </header>

    <div class="container">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><img src="<?php echo $product['image_path']; ?>" alt="<?php echo $product['name']; ?>" style="max-width: 100px;"></td>
                <td><?php echo $product['gender']; ?></td>
                <td>
                    <a href="remove_product.php?id=<?php echo $product['id']; ?>" onclick="return confirm('Are you sure you want to remove this product?')">Remove</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>
