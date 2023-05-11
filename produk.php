<?php 
    // include database connection
    require_once 'dbkoneksi.php';
?>

<?php 
    // select all data from table "produk"
    $sql = "SELECT * FROM product";
    // execute the query
    $rs = $dbh->query($sql);
?>

<a class="btn btn-success" href="form_produk.php" role="button">Create Produk</a>

<table class="table" width="100%" border="1" cellspacing="2" cellpadding="2">
    <thead>
        <tr>
            <th>No</th><th>Kode</th><th>Nama</th>
            <th>Harga Jual</th><th>Qty</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            // initialize counter
            $id = 1;
            // loop through the result set
            foreach($rs as $row) {
        ?>
        <tr>
            <td><?=$id?></td>
            <td><?=$row['sku']?></td>
            <td><?=$row['name']?></td>
            <td><?=$row['purchase_price']?></td>
            <td><?=$row['sell_price']?></td>
            <td><?=$row['stock']?></td>
            <td><?=$row['min_stock']?></td>
            <td><?=$row['product_type_id']?></td>
            <td><?=$row['restock_id']?></td>
            <td>
                <!-- buttons to view, edit, and delete a product -->
                <!-- buttons to view, edit, and delete a product -->
                <a class="btn btn-primary" href="view_vendor.php?id=<?=$row['id']?>">View</a>
                <a class="btn btn-primary" href="form_vendor.php?id=<?=$row['id']?>">Edit</a>
                <a class="btn btn-primary" href="delete_vendor.php?id=<?=$row['id']?>"
                onclick="if(!confirm('Anda Yakin Hapus Data Vendor <?=$row['nama']?>?')) {return false}"
                >Delete</a>
            </td>
        </tr>
        <?php 
            // increment counter
            $id++;   
            } 
        ?>
    </tbody>
</table>