<!DOCTYPE html>
<?php
ini_set('display_errors', '1');

$servername = 'localhost';
$database = 'php';
$username = 'root';
$password = '';
$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_select_db($conn, $database);
if (!$conn) {die("Connection failed: ".mysqli_connect_error());}

function checkEmpty(&$parameter){
  if(empty($parameter)){
    $parameter .= null;
  }
}
if (isset($_POST['submit']))
{
    $urun_adi   = $_POST["urun_adi"];
    $alis_fiyati  = $_POST["alis_fiyati"];
    $satis_fiyati   = $_POST["satis_fiyati"];
    $kdv  = $_POST["kdv"];
    $urun_resmi   = $_POST["urun_resmi"];
    $stok  = $_POST["stok"];
    $id = 0;
    $isDeleted = 1;

    checkEmpty($alis_fiyati);
    checkEmpty($satis_fiyati);
    checkEmpty($kdv);
    checkEmpty($stok);

    $query = "INSERT INTO products SET id = $id, ürün_adı= '$urun_adi', alış_fiyatı='$alis_fiyati', satış_fiyatı='$satis_fiyati', kdv_oranı='$kdv', ürün_resmi='$urun_resmi', stok_durumu='$stok', isDeleted=$isDeleted";
    if (mysqli_query($conn, $query)) {
      echo "New record created successfully";
    }else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }        
}
 
?>
<html>
    <head>
        <title>products</title>  
    </head>
    <body>
      <form action="" method = "POST">
        <div style="width:460px;height:460px;border:.5px solid #000;">
          &nbsp;Ürün Adı<br>&nbsp;
          <input name="urun_adi" class="form-control" size="30" style="height:30px"  type="text" required>
          <br><br>&nbsp;Alış Fiyatı<br>&nbsp;
          <input name="alis_fiyati" size="30" style="height:30px"  type="float">
          <br><br>&nbsp;Satış Fiyatı<br>&nbsp;
          <input name="satis_fiyati" size="30" style="height:30px"  type="float">
          <br><br>&nbsp;KDV Oranı<br>&nbsp;
          <input name="kdv" size="30" style="height:30px"  type="float">
          <br><br>&nbsp;Ürün Resmi<br>&nbsp;
          <input name="urun_resmi" size="30" style="height:30px"  type="text">
          <br><br>&nbsp;Stok Durumu<br>&nbsp;
          <input name="stok" size="30" style="height:30px"  type="int">
          <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <button type ="submit" style="height:20px" name="submit" value="send to database"> Ekle </button>
          <input type="reset" style="height:20px">
          <br><br>
        </div><br>
      </form>
    </body>
</html>   