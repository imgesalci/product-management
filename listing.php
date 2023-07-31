<?php
include('inserting.php');
$query = "SELECT * FROM products WHERE isDeleted = 1";
$result = mysqli_query($conn, $query);

?>

<head>
    <style>
        ::after table {
            border-collapse: collapse;
        }

        table th {
            background-color: #303841;
            color: #f7f7f7;
            border-radius: 2px;
        }

        table td {
            background-color: #eeeeee;
            border: 1px solid #47555e;
            border-radius: 2px;
            padding: 10px 20px;
        }

        table tr:hover td {
            background-color: #d7e4f1;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="./delete.js" defer></script>
    <script src="./update.js" defer></script>
</head>

<table style="width:100%" cellspacing="0" cellpadding="10">
    <tr>
        <th>#</th>
        <th>Product Name</th>
        <th>Purchase Price</th>
        <th>Sale Price</th>
        <th>VAT Rate</th>
        <th>Product Image</th>
        <th>Stock Status</th>

    </tr>
    <?php
    if ($result->num_rows > 0) {
        $sn = 1;
        while ($data = $result->fetch_assoc()) {
    ?>
            <tr>
                <td><?php echo $sn; ?> </td>
                <td class="editable" data-column="pName"><?php echo $data['productName']; ?></td>
                <td class="editable" data-column="pPrice"><?php echo $data['purchasePrice']; ?></td>
                <td class="editable" data-column="sPrice"><?php echo $data['salePrice']; ?></td>
                <td class="editable" data-column="vat"><?php echo $data['vatRate']; ?></td>
                <td class="editable" data-column="pImage"><?php echo $data['productImage']; ?></td>
                <td class="editable" data-column="stock"><?php echo $data['stockStatus']; ?></td>
                <td align="center"><button class="edit" data-id="<?php echo $data['id']; ?>">Update</button></td>
                <td align="center">
                    <form action="" method="post">
                        <button class='btn' type="submit" name='delete' data-id="<?php echo $data['id']; ?>">Delete</button>
                    </form>
                </td>

            <tr>
            <?php
            $sn++;
        }
    } else { ?>
            <tr>
                <td colspan="6">No data found</td>
            </tr>
        <?php } ?>
</table>