<?php
include('database.php');

if (isset($_POST['submit_photo'])) {
    $product_id = $_POST['product_id'];
    $filename = $_FILES["new_image"]["name"];
    $tempname = $_FILES["new_image"]["tmp_name"];
    $folder = "uploads/" . $filename;

    if (move_uploaded_file($tempname, $folder)) {
        $query = "UPDATE products SET productImage = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "si", $filename, $product_id);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: listing.php");
        } else {
            echo "Error occurred while updating product photo.";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to upload new image.";
    }
}
