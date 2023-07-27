<?php
include('database.php');

try {
    function checkIfEmpty(&$parameter){
        if(empty($parameter)){
          $parameter = null;
        }
        else{
          $parameter = filter_var($parameter, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        }
      }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $urun_adi = $_POST["ürün_adı"];
        $alis_fiyati = $_POST["alış_fiyatı"];
        $satis_fiyati = $_POST["satış_fiyatı"];
        $kdv = $_POST["kdv_oranı"];
        $urun_resmi = $_POST["ürün_resmi"];
        $stok = $_POST["stok_durumu"];

        checkIfEmpty($alis_fiyati);
        checkIfEmpty($satis_fiyati);
        checkIfEmpty($kdv);
        checkIfEmpty($stok);

        $query = "UPDATE products SET ürün_adı = '$urun_adi', alış_fiyatı = '$alis_fiyati', satış_fiyatı = '$satis_fiyati', kdv_oranı = '$kdv', ürün_resmi = '$urun_resmi', stok_durumu = '$stok' WHERE id = $id";

        if (mysqli_query($conn, $query)) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $sql ."<br>" . mysqli_error($conn);
        }
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    echo "Error occurred while updating data.";
}

?>
