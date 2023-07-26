<?php
include('inserting.php');
    $query = "SELECT * FROM products WHERE isDeleted = 1";
    $result = $conn->query($query);
    
?>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="/project/delete.js"></script>
    <script src="/project/update.js"></script>
    <table border="1" style="width:100%" cellspacing="0" cellpadding="10">
    <tr>
        <th>ID</th>
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
                <td><button class="edit" data-id="<?php echo $data['id']; ?>">Update</button></td>
                <td>
                <td>
                    <form action="" method="post">
                        <button class='btn' type="button" name='delete' data-id="<?php echo $data['id']; ?>">Sil</button>
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