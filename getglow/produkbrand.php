<?php
include "koneksi.php";

//delete
$id = isset($_GET['id_produk']) ? $_GET['id_produk'] : "";
if($id!=""){
    $row=mysqli_fetch_array(mysqli_query($conn,"select * from produk_brand where id_produk='$id'"));
    $delete="delete from produk_brand where id_produk='$id'";
    $query=mysqli_query($conn,$delete);
    if ($query){
        ?>
        <script>
            // Confirmation alert before deletion
            var confirmDelete = confirm("If you delete the launch date, the product will not be displayed to users. Are you sure you want to delete it?");
            if (confirmDelete) {
                alert("Launch date successfully removed!");
                document.location='staff.php?page=viewpb';
            } else {
                history.back(); // Go back if user cancels deletion
            }
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail</title>
    <style>
        table {
            border-collapse: collapse;
            background-color:rgb(255, 245, 245);
            text-align: center;
            width: 70%;
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
</head>
<body>
    <center>
        <h3>&nbsp;</h3>
        <h1>DETAIL</h1><br>
        <table>
            <tr>
                <th>NUM</th>
                <th>BRAND NAME</th>
                <th>PRODUCT NAME</th>
                <th>LAUNCH DATE</th>
                <th>IMAGES</th>
                <th>ACTION</th>
            </tr>
            <tr>
                <td colspan='7'><input type='hidden'></td>
            </tr>
            <?php
            $no=1;
            $sql = "SELECT * FROM produk
                INNER JOIN produk_brand ON produk.id_produk = produk_brand.id_produk
                INNER JOIN brand ON produk_brand.id_brand = brand.id_brand
                ORDER BY produk_brand.tgl_launching ASC";
            $query=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($query)){
                echo"
                <tr>
                    <td>$no</td>
                    <td>$row[nama_brand]</td>
                    <td>$row[nama_produk]</td>
                    <td>$row[tgl_launching]</td>
                    <td><img src='$row[foto_produk]' width='70' height='70'></td>
                    <td>
                        <a href='?page=updatepb&idprod=$row[id_produk]&idbrand=$row[id_brand]' class='submit'>EDIT</a>
                        <a href='produkbrand.php?id_produk=$row[id_produk]' onclick='return confirmDelete();' class='submit'>HAPUS</a>
                    </td>
                </tr>
                <tr>
                    <td colspan='7'><input type='hidden'><hr></td>
                </tr>
                ";
                $no++;
            }
            ?>
        </table>
    </center>
</body>
</html>
<script>
    // JavaScript function for confirmation dialog
    function confirmDelete() {
        return confirm("If you delete the launch date, the product will not be displayed to users. Are you sure you want to delete it?");
    }
</script>
