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
    $parameter = null;
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
        <style>
        .edit {
          background-color: #303841;
          color: #eeeeee;
          padding: 8px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 10px;
          margin: 4px 2px;
          cursor: pointer;
          border: 2px solid #303841;
        }

        .edit:hover {
          background-color: #eeeeee;
          color: #7aa5d2;
          border: 2px solid #7aa5d2;
        }

        .btn {
          background-color: #303841;
          color: #eeeeee;
          padding: 8px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 10px;
          margin: 8px 3px;
          cursor: pointer;
          border: 2px solid #303841;
        }

        .btn:hover {
          background-color: #eeeeee;
          color: #7aa5d2;
          border: 2px solid #7aa5d2;
        }

        .edit {border-radius: 4px;}
        .btn {border-radius: 4px;}

        .sbmt {
          background-color: #303841;
          color: #eeeeee;
          padding: 10px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 10px;
          margin: 3px 2px;
          cursor: pointer;
          border: 2px solid #303841;
        }

        .sbmt:hover {
          background-color: #eeeeee;
          color: #7aa5d2;
          border: 2px solid #7aa5d2;
        }

        .sbmt {border-radius: 4px;}

        .box{
          text-align: center; 
        }

        .input{
          background-color: #f1f6fa;
          border: 2px solid #47555e;
          border-radius: 4px;
        }

        body {
          background-color: #eeeeee;         
          font-family: 'Lexend Deca', sans-serif;
          margin: auto;
          color: #47555e;
        }
        </style>
        
    </head>
    <body>
      <form action="" method = "POST">
        <div class="box"; style="width:360px;height:500px;border:.5px;">
          &nbsp;<br>Ürün Adı*<br>&nbsp;
          <input name="urun_adi" class="input" size="30" style="height:30px"  type="text" required>
          <br><br>&nbsp;Alış Fiyatı<br>&nbsp;
          <input name="alis_fiyati" class="input" size="30" style="height:30px"  type="float">
          <br><br>&nbsp;Satış Fiyatı<br>&nbsp;
          <input name="satis_fiyati" class="input" size="30" style="height:30px"  type="float">
          <br><br>&nbsp;KDV Oranı<br>&nbsp;
          <input name="kdv" class="input" size="30" style="height:30px"  type="float">
          <br><br>&nbsp;Ürün Resmi<br>&nbsp;
          <input name="urun_resmi" class="input" size="30" style="height:30px"  type="text">
          <br><br>&nbsp;Stok Durumu<br>&nbsp;
          <input name="stok" class="input" size="30" style="height:30px"  type="int">
          <br><br>&nbsp;&nbsp;&nbsp;
          <button type ="submit" name="submit" class="sbmt"> Ekle </button>
          <br><br>
        </div><br>
      </form>
    </body>
</html>   