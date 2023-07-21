<?php
    echo "girdi";
    $index = $_POST['id'];
    $sum = "SELECT * FROM products WHERE isDeleted = 0 LIMIT $index";
    $result = mysqli_query($conn, $sum);
    if(!$result) die($db->error);    
    $row = mysqli_fetch_row($result);
    $count = $row[0];
    if(empty($count)){echo "bos";}
    $id = $index + $count;
    echo $count;
    $deleted = "UPDATE products SET isDeleted = 0 WHERE  id = $id";
    mysqli_query($conn, $deleted);
?>