<?php
include('database.php');

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $product_name = filter_var($_POST["pName"], FILTER_SANITIZE_SPECIAL_CHARS);
  $purchase_price = filter_var($_POST["pPrice"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  $sale_price = filter_var($_POST["sPrice"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  $vat = filter_var($_POST["vat"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  $stock = filter_var($_POST["stock"], FILTER_SANITIZE_NUMBER_INT);

  $query = "UPDATE products SET productName = ?, purchasePrice = ?, salePrice = ?, vatRate = ?, stockStatus = ? WHERE id = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "sdddsi", $product_name, $purchase_price, $sale_price, $vat, $stock, $id);

  if (mysqli_stmt_execute($stmt)) {
    echo "Record updated successfully";
  } else {
    echo "Error occurred while updating data.";
  }
  mysqli_stmt_close($stmt);
}
