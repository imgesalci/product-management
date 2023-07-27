<?php
include('database.php'); 
if (isset($_POST['id'])) {
    $index = intval($_POST['id']); 
    if ($index >= 0) {
        $index = intval($index); 

        $query = "SELECT * FROM products WHERE isDeleted = 0 LIMIT $index";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die(mysqli_error($conn)); 
        }

        $row = mysqli_fetch_assoc($result);
        if (empty($row)) {
            echo "Row not found or already restored.";
        } else {
            $count = $row[0];
            if(empty($count)){echo "bos";}
            $id = $index + $count;
            $query = "UPDATE products SET isDeleted = 0 WHERE id = ?";

            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "i", $id);

            if (mysqli_stmt_execute($stmt)) {
                echo "Row with ID $id successfully restored.";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
} else {
    echo "Invalid request.";
}
?>