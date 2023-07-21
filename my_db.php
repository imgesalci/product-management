<?php
$servername = 'localhost';
$database = 'php';
$username = 'root';
$password = '';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      echo "no";
      //die("Connection failed: " . 
//mysqli_connect_error());
}
echo "Connected successfully";
/*$sql = "INSERT INTO Students (isim, lastname, email) VALUES ('Test', 'Testing', 'Testing@testing.com')";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/
mysqli_close($conn);

?>