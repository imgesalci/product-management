<?php
include('inserting.php');
$query = "SELECT * FROM products WHERE isDeleted = 1";
$result = mysqli_query($conn, $query);
    
?>  
    <head>
    <style>::after
        table {
            border-collapse: collapse;
        }
        table th {
            background-color: #303841;
            color: #f7f7f7;
            border-radius: 2px;
        }
        
        table td{
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
    <script src="/project/delete.js"></script>
    <script src="/project/update.js"></script>
    </head>

    <table style="width:100%" cellspacing="0" cellpadding="10">
    <tr>
        <th>#</th>
        <th>Ürün Adı</th>
        <th>Alış Fiyatı</th>
        <th>Satış Fiyatı</th>
        <th>KDV Oranı</th>
        <th>Ürün Resmi</th>
        <th>Stok Durumu</th>

    </tr>
    <?php
    if ($result->num_rows > 0) {
    $sn=1;
    while($data = $result->fetch_assoc()) {
    ?>
    <tr>
    <td><?php echo $sn; ?> </td>
                <td class="editable" data-column="ürün_adı"><?php echo $data['ürün_adı']; ?></td>
                <td class="editable" data-column="alış_fiyatı"><?php echo $data['alış_fiyatı']; ?></td>
                <td class="editable" data-column="satış_fiyatı"><?php echo $data['satış_fiyatı']; ?></td>
                <td class="editable" data-column="kdv_oranı"><?php echo $data['kdv_oranı']; ?></td>
                <td class="editable" data-column="ürün_resmi"><?php echo $data['ürün_resmi']; ?></td>
                <td class="editable" data-column="stok_durumu"><?php echo $data['stok_durumu']; ?></td>
                <td align="center"><button class="edit" data-id="<?php echo $data['id']; ?>">Güncelle</button></td>
                <td align="center">
                    <form action="" method="post">
                        <button class='btn' type="submit" name='delete' data-id="<?php echo $data['id'];?>">Sil</button>
                    </form>
                </td>

    <tr>
    <?php
    $sn++;}} else { ?>
        <tr>
        <td colspan="6">No data found</td>
        </tr>
    <?php } ?>
    </table>