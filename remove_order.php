<?php
require 'config.php';

// Check if the order ID is provided in the URL
if(isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $order_id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Construct the SQL query to delete the order
    $sql = "DELETE FROM tb_buy WHERE id = '$order_id'";
    
    // Execute the query
    if(mysqli_query($conn, $sql)) {
        // Redirect back to the manage_orders.php page after deletion
        header("Location: manage_orders.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // If no order ID is provided, redirect to manage_orders.php
    header("Location: manage_orders.php");
    exit();
}
?>

