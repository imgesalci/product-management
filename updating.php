<?php
include('database.php');

try {
  function checkIfEmpty(&$parameter)
  {
    if (empty($parameter)) {
      $parameter = null;
    } else {
      $parameter = filter_var($parameter, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }
  }

  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $product_name = $_POST["pName"];
    $purchase_price = $_POST["pPrice"];
    $sale_price = $_POST["sPrice"];
    $vat = $_POST["vat"];
    $product_image = $_POST["pImage"];
    $stok = $_POST["stock"];

    checkIfEmpty($purchase_price);
    checkIfEmpty($sale_price);
    checkIfEmpty($vat);
    checkIfEmpty($stock);

    $query = "UPDATE products SET productName = '$product_name', purchasePrice = '$purchase_price', salePrice = '$sale_price', vatRate = '$vat', productImage = '$product_image', stockStatus = '$stock' WHERE id = $id";

    if (mysqli_query($conn, $query)) {
      echo "Record updated successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
} catch (Exception $e) {
  error_log($e->getMessage());
  echo "Error occurred while updating data.";
}
