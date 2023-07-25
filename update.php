<?php
include("inserting.php");

error_reporting(E_ALL);
ini_set('display_errors', '1');
try {
    function cEmpty(&$parameter) {
    if (empty($parameter)) {
        $parameter = null;
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

    cEmpty($alis_fiyati);
    cEmpty($satis_fiyati);
    cEmpty($kdv);
    cEmpty($stok);

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
