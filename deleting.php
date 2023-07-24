<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Include the database connection logic from listing.php or create a new connection here.
include('listing.php'); // Adjust the filename if needed.
// Ensure that $_POST['id'] exists and is a valid integer.
if (isset($_POST['id'])) {
    $index = intval($_POST['id']); // Convert to integer for safety.
    echo 'index';
    // Validate $index to prevent invalid or negative values.
    if ($index >= 0) {
        // Sanitize $index using mysqli_real_escape_string().
        $index = intval($index); 

        // Fetch the row with the specific id.
        $query = "SELECT * FROM products WHERE isDeleted = 0 LIMIT $index";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die(mysqli_error($conn)); // Proper error handling.
        }

        $row = mysqli_fetch_assoc($result);
        if (empty($row)) {
            echo "Row not found or already restored.";
        } else {
            // Perform the update to restore the row.
            $count = $row[0];
            if(empty($count)){echo "bos";}
            $id = $index + $count;
            $query = "UPDATE products SET isDeleted = 0 WHERE id = $id";
            if (mysqli_query($conn, $query)) {
                echo "Row with ID $id successfully restored.";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Invalid ID.";
    }
} else {
    echo "Invalid request.";
}
?>