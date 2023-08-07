<!DOCTYPE html>
<?php
include('database.php');

if (isset($_POST['submit'])) {
  $filename = $_FILES["file"]["name"];
  $tempname = $_FILES["file"]["tmp_name"];
  $folder = "./uploads/" . $filename;

  if ($_FILES["file"]["error"] !== UPLOAD_ERR_OK) {
    if ($_FILES["file"]["error"] == 4) {
      $filename = '';
    } else {
      die("File upload failed with error code: " . $_FILES["file"]["error"]);
    }
  }

  if (move_uploaded_file($tempname, $folder)) {
    echo "Image uploaded successfully";
  } else {
    echo "Failed to upload image";
  }
  $categoryID = filter_var(
    $_POST["categories"],
    FILTER_SANITIZE_NUMBER_INT
  );
  $product_name = filter_var($_POST["pName"], FILTER_SANITIZE_SPECIAL_CHARS);
  $purchase_price = filter_var($_POST["pPrice"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  $sale_price = filter_var($_POST["sPrice"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  $vat = filter_var($_POST["vat"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  $stock = filter_var($_POST["stock"], FILTER_SANITIZE_NUMBER_INT);
  $id = 0;
  $isDeleted = 1;

  $query = "INSERT INTO products (id, productName, purchasePrice, salePrice, vatRate, productImage, stockStatus, isDeleted, categoryID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "isdddsiii", $id, $product_name, $purchase_price, $sale_price, $vat, $filename, $stock, $isDeleted, $categoryID);

  if (mysqli_stmt_execute($stmt)) {
    header("Location: listing.php");
  } else {
    echo "Error occurred while inserting data.";
  }
  mysqli_stmt_close($stmt);
}

?>
<html>

<head>
  <title>products</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="warning">
      <p><strong>Warning!</strong> Please use periods for fractional expressions.</p>
    </div>
    <div class="box" style="width:360px;height:500px;border:.5px;">
      &nbsp;<br>*Product Name<br>&nbsp;
      <input name="pName" class="input" size="36" style="height:35px" type="text" maxlength="40" required>
      <br><br>&nbsp;Purchase Price<br>&nbsp;
      <input name="pPrice" class="input" size="36" style="height:35px" min="0" type="float">
      <br><br>&nbsp;Sale Price<br>&nbsp;
      <input name="sPrice" class="input" size="36" style="height:35px" min="0" type="float">
      <br><br>&nbsp;VAT Rate<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <span class="percent"><input name="vat" class="input" max="100" accuracy="2" min="0" size="36" type="float" style="height:35px;text-align:left;"> %</span>
      <br><br>&nbsp;Stock Status<br>&nbsp;
      <input name="stock" class="input" size="36" style="height:35px" min="0" type="int">
      <br><br>&nbsp;Product Image<br>&nbsp;
      <input name="file" class="input" size="36" style="height:35px" type="file" accept="image/*">
      <br><br>&nbsp;Category<br>&nbsp;
      <select name="categories" id="categories" style="width:254px;background-color:#f1f6fa;border-radius:10px;color:#303841;" required>
        <option value="">Select a category</option>
        <option value=1>Consumer Electronics</option>
        <option value=2>Home&Garden</option>
        <option value=3>Pets&Pet Supplies</option>
        <option value=4>Sporting Goods</option>
        <option value=5>Health</option>
        <option value=6>Children</option>
        <option value=7>Fashion</option>
        <option value=8>Beauty</option>
        <option value=9>Video Games&Consoles</option>
        <option value=10>Office Supplies</option>
      </select>
      <br><br>&nbsp;&nbsp;&nbsp;
      <button type="submit" name="submit" class="sbmt"> Submit </button>
      <br><br>
    </div>
  </form>
  <br><br><br><br><br><br>
</body>

</html>