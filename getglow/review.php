<?php
include "koneksi.php";

//delete
$no = isset($_GET['no_ulasan']) ? $_GET['no_ulasan'] : "";
if($no!=""){
    $row=mysqli_fetch_array(mysqli_query($conn,"select * from ulasan where no_ulasan='$no'"));
    $delete="delete from ulasan where  no_ulasan='$no'";
    $query=mysqli_query($conn,$delete);
    if ($query){
        ?>
        <script>
            // Confirmation alert before deletion
            var confirmDelete = confirm("Is the review you want to remove eligible for removal? If eligible, delete now!");
            if (confirmDelete) {
                alert("Review successfully deleted!");
                document.location='staff.php?page=review';
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
    <title>Review</title>
    <style>
        table {
            border-collapse: collapse;
            background-color:rgb(255, 245, 245);
            text-align: center;
            margin-bottom: 200px;
            width: 80%;
        }
        th{
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
        <h1>REVIEW</h1><br>
        <table cellpadding='10' cellspacing='5' border-column='1'border="1">
            <tr>
                <th>NUMBER</th>
                <th>USERNAME</th>
                <th>PRODUCT NAME</th>
                <th>REVIEW</th>
                <th>RATING</th>
                <th>Delete comment?</th>
            </tr>
            <tr>
                <td colspan='7'><input type='hidden'></td>
            </tr>
            <?php
            $no = 1;
            $sql = "SELECT * FROM akun
                    INNER JOIN ulasan ON akun.id_akun = ulasan.id_akun
                    INNER JOIN produk_brand ON ulasan.tgl_launching = produk_brand.tgl_launching 
                    INNER JOIN produk ON produk_brand.id_produk=produk.id_produk";

            $query=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($query)){
                echo"
                <tr>
                    <td>$no</td>
                    <td>$row[username]</td>
                    <td>$row[nama_produk]</td>
                    <td>$row[ulasan]</td>
                    <td>$row[rating]</td>
                    <td>
                        <a href='review.php?no_ulasan=$row[no_ulasan]' onclick='return confirmDelete();' class='submit'>Delete</a>
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
        return confirm("Is the review you want to remove eligible for removal? If yes delete now.");
    }
</script>
