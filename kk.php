<!DOCTYPE html>
<?php
$servername = 'localhost';
$database = 'php';
$username = 'root';
$password = '';
ini_set('display_errors', '1');
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_select_db($conn, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . 
mysqli_connect_error());
}
echo "Connected successfully";

if (isset($_POST['submit']))
{
    $lastname   = $_POST['LastName'];
    $firstname  = $_POST['FirstName'];

    $query = ("INSERT INTO name_table (LName, FName) VALUES ('$lastname', '$firstname')");
    if (mysqli_query($conn, $query)) {
      echo '<br>';
      echo "New record created successfully";
    }else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
 }
 $result = mysqli_query($conn, "show tables");
 while($table = mysqli_fetch_array($result)) { 
     echo($table[0] . "<BR>");
 }

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>sample</title>
    </head>
    <body>
        <form action="" method = "POST">

   First name:   
  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

  Last Name:<br>
  <input name="FirstName" size="15" style="height: 19px;"  type="text" required>
      &nbsp; &nbsp; &nbsp; 
  <input name="LastName" size="15" style="height: 19px;"  type="text" required>


<br>
<br>

<button type ="submit" name="submit" value="send to database"> SEND TO DATABASE </button>
</form>
    </body>

</html>   