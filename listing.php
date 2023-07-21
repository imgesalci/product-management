<?php
include('inserting.php');
    $query = "SELECT * FROM products WHERE isDeleted = 1";
    $result = $conn->query($query);
    
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <table border="1" style="width:100%" cellspacing="0" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Ürün Adı</th>
        <th>Alış Fiyatı</th>
        <th>Satış Fiyatı</th>
        <th>KDV Oranı</th>
        <th>Ürün Resmi</th>
        <th>Stok Durumu</th>
        <th>Güncelle</th>
        <th>Sil</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
    $sn=1;
    while($data = $result->fetch_assoc()) {
    ?>
    <tr>
    <td><?php echo $sn; ?> </td>
    <td><?php echo $data['ürün_adı']; ?> </td>
    <td><?php echo $data['alış_fiyatı']; ?> </td>
    <td><?php echo $data['satış_fiyatı']; ?> </td>
    <td><?php echo $data['kdv_oranı']; ?> </td>
    <td><?php echo $data['ürün_resmi']; ?> </td>
    <td><?php echo $data['stok_durumu']; ?> </td>
    <td><button name="update"></button> </td>
    <td><form action="" method="post" ><button class='btn' type="button" name='delete' onclick="myfunc()">sil</button></form></td>

    <tr>
    <script>
        function myfunc(){
            var buttons = document.getElementsByClassName('btn');
            for (var i=0 ; i <= buttons.length ; i++){
                (function(index){
                    buttons[index].onclick = function(){
                        var id = index + 1;
                        console.log(id);
                        alert ("button: " + id);
                            $.ajax({  
                            type: 'POST',  
                            contentType: 'application/json; charset=utf-8',
                            url: 'deleting.php', 
                            data: {id: index },
                                success: function(response) {
                                    content.html(response);
                                },
                                error: function(xhr, status, error){
                                    console.error(xhr);
                                }
                            });
                    
                    };
                })(i)
            }
        }    
    </script>
    <?php
    $sn++;}} else { ?>
        <tr>
        <td colspan="6">No data found</td>
        </tr>
    <?php } ?>
    </table
?>