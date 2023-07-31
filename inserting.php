<!DOCTYPE html>
<?php
include('database.php');
function checkEmpty(&$parameter)
{
  if (empty($parameter)) {
    $parameter = null;
  } else {
    $parameter = filter_var($parameter, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  }
}

if (isset($_POST['submit'])) {
  $product_name   = mysqli_real_escape_string($conn, $_POST["pName"]);
  $puchase_price  = $_POST["pPrice"];
  $sale_price   = $_POST["sPrice"];
  $vat  = $_POST["vat"];
  $product_image   = $_POST["pImage"];
  $stock  = $_POST["stock"];
  $id = 0;
  $isDeleted = 1;

  checkEmpty($purchase_price);
  checkEmpty($sale_price);
  checkEmpty($vat);
  checkEmpty($stock);

  $query = "INSERT INTO products SET id = $id, productName= '$product_name', purchasePrice='$puchase_price', salePrice='$sale_price', vatRate='$vat', productImage='$product_image', stockStatus='$stock', isDeleted=$isDeleted";
  if (mysqli_query($conn, $query)) {
    header("Location: listing.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

?>
<html>

<head>
  <title>products</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <form action="" method="POST">
    <div class="warning">
      <p><strong>Warning!</strong> Please use periods for fractional expressions.</p>
    </div>
    <div class="box" ; style="width:360px;height:500px;border:.5px;">
      &nbsp;<br>*Product Name<br>&nbsp;
      <input name="pName" class="input" size="30" style="height:30px" type="text" required>
      <br><br>&nbsp;Purchase Price<br>&nbsp;
      <input name="pPrice" class="input" size="30" style="height:30px" type="float">
      <br><br>&nbsp;Sale Price<br>&nbsp;
      <input name="sPrice" class="input" size="30" style="height:30px" type="float">
      <br><br>&nbsp;VAT Rate<br>&nbsp;
      <input name="vat" class="input" size="30" style="height:30px" type="float">
      <br><br>&nbsp;Product Image<br>&nbsp;
      <input name="pImage" class="input" size="30" style="height:30px" type="text">
      <br><br>&nbsp;Stock Status<br>&nbsp;
      <input name="stock" class="input" size="30" style="height:30px" type="int">
      <br>
      <br>&nbsp;&nbsp;&nbsp;
      <button type="submit" name="submit" class="sbmt"> Submit </button>
      <br><br>
    </div><br>
  </form>
</body>

</html>