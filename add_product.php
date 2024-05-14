<?php
require 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $gender = $_POST["gender"];

    // Upload image
    $image_path = 'uploads/' . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
               
    // Insert data into tb_perfumes table
    $sql = "INSERT INTO tb_perfumes (name, price, image_path, gender) VALUES ('$name', '$price', '$image_path', '$gender')";
    if (mysqli_query($conn, $sql)) {
        echo "New record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="add_product.css">
</head>
<body>
    <header>
        <div class="header">
            <h1>Add Product</h1>
            <a href="admin.php">back</a>
        </div>
    </header>

    <div class="container">
        <h2>Add New Perfume</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <label for="name">Perfume Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" min="0" step="0.01" required><br><br>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required><br><br>
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Men">Men</option>
                <option value="Women">Women</option>
            </select><br><br>
            <input type="submit" value="Add Product">
        </form>
    </div>
</body>
</html>
