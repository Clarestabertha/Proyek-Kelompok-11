<?php
include "koneksi.php";

//delete
$id = isset($_GET['id_produk']) ? $_GET['id_produk'] : "";
if($id!=""){
    $row=mysqli_fetch_array(mysqli_query($conn,"select * from produk where id_produk='$id'"));
    $gambar=$row['foto_produk'];
    unlink($gambar);
    $delete="delete from produk where  id_produk='$id'";
    $query=mysqli_query($conn,$delete);
    if ($query){
        ?>
        <script>
            alert("Product successfully deleted!");
            document.location='staff.php?page=produk';
        </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Produk</title>
    <style>
        table {
            border-collapse: collapse;
            background-color:rgb(255, 245, 245);
            text-align: center;
            width: 85%;
        }
        th{
            padding: 8px;
            justify-content: center;
            align-items: center;
            border-bottom: 1px solid black;
        }
        td {
            padding: 8px;
            justify-content: center;
            align-items: center;
        }
        td:nth-child(9) {
            width: 200px; /* Lebar kolom kedua */
        }

        .submit {
            background-color: white;
            padding: 5px;
            border-radius: 20px;
            border: 1px solid pink;
            color: pink;
            text-decoration: none;
        }
        .submit:hover{
            background-color: pink;
            color: white;
        }
    </style>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this product?");
        }
    </script>
</head>
<body>
<center>
    <h3>&nbsp;</h3>
    <h1>PRODUK</h1><br>
    <p><a href='?page=insertproduk' class="submit">Insert Data</a></p><br>
    <table cellpadding='10' cellspacing='5' border-column='1' border="1">
        <tr>
            <th>NUM</th>
            <th>PRODUCT ID</th>
            <th>BRAND NAME</th>
            <th>PRODUCT NAME</th>
            <th>TYPE</th>
            <th>PRICE</th>
            <th>DESCRIPTION</th>
            <th>IMAGE</th>
            <th>ACTION</th>
        </tr>
        <?php
        $no=1;
        $sql = "select * from produk,brand where produk.id_brand = brand.id_brand";
        $query=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>$no</td>";
            echo "<td>$row[id_produk]</td>";
            echo "<td>$row[nama_brand]</td>";
            echo "<td>$row[nama_produk]</td>";
            echo "<td>$row[jenis]</td>";
            echo "<td>$row[harga]</td>";
            echo "<td>$row[deskripsi]</td>";
            echo "<td><img src='$row[foto_produk]' height='70'></td>";

            $id_produk = $row['id_produk'];
            $check_detail_sql = "SELECT COUNT(*) as count FROM produk_brand WHERE id_produk = $id_produk";
            $check_detail_query = mysqli_query($conn, $check_detail_sql);
            $check_detail_result = mysqli_fetch_assoc($check_detail_query);

            echo "<td>";

            // Jika detail sudah diisi, tombol DETAIL akan dinonaktifkan
            if ($check_detail_result['count'] > 0) {
                echo "<a href='?page=updateproduk&id=$row[id_produk]' class='submit'>Update</a>
                    <a href='produkstaff.php?id_produk=$row[id_produk]' onclick='return confirmDelete();' class='submit'>Delete</a><br><br>
                    <h8 class='submit'>Done</h8>";
            } else {
                echo "<a href='?page=updateproduk&id=$row[id_produk]' class='submit'>Update</a>
                    <a href='produkstaff.php?id_produk=$row[id_produk]' onclick='return confirmDelete();' class='submit'>Delete</a><br><br>
                    <a href='?page=produkbrand&idprod=$row[id_produk]&idbrand=$row[id_brand]' class='submit'>Add Detail</a>";
            }
            echo "</td>";
            echo "</tr>
                <tr>
                    <td colspan='9'><input type='hidden'><hr></td>
                </tr>";
            $no++;
        }
        ?>
    </table>
</center>
</body>
</html>
