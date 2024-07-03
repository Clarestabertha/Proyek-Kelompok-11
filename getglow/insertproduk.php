<?php
include "koneksi.php";
if(isset($_POST['input'])){
    $id_produk=$_POST['id_produk'];
    $id_brand=$_POST['id_brand'];
    $nama_produk=$_POST['nama_produk'];
    $deskripsi=$_POST['deskripsi'];
    $harga=$_POST['harga'];
    $jenis=$_POST['jenis'];
    $foto = $_FILES['foto_produk']['name'];
    $file_tmp = $_FILES['foto_produk']['tmp_name'];
    $up = 'produk/' . $foto;

    // Pengecekan apakah id_brand atau nama_brand sudah ada di database
    $check_query = "SELECT * FROM produk WHERE id_produk='$id_produk' OR nama_produk='$nama_produk'";
    $check_result = mysqli_query($conn, $check_query);

    if(mysqli_num_rows($check_result) > 0){
        ?>
        <script>
            alert("The product already exists, please enter another product.");
            document.location = 'staff.php?page=insertproduk';
        </script>
        <?php
    } else {
    if (move_uploaded_file($file_tmp, $up)) {
    $insert = "INSERT INTO produk (id_brand, nama_produk, deskripsi, harga,foto_produk, jenis) VALUES 
            ('$id_brand', '$nama_produk', '$deskripsi', '$harga','$up','$jenis')";
            $query = mysqli_query($conn, $insert);
            if($query){
                ?>
                <script>
                    alert("You have just added a new Product");
                    document.location = 'staff.php?page=produk';
                </script>
                <?php
            }
        } 
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Insert Produk</title>
        <style>
        body{
            text-align:center;
            align-items:center;
        }
        .container {
        width:70%;
        display: flex;
        flex-direction: column;
        justify-content: center; 
        align-items: center;
        font-family: helvetica;
        display: grid;
        grid-template-columns: 40% 60%;
        margin-bottom: 100px;
    }
    .left-div {
        display: flex;
        flex-direction: column;
        justify-content: center; 
        align-items: center;
        font-family: Arial, sans-serif;

    }
    .right-div {
        display: flex;
        flex-direction: column;
        justify-content: center; 
        align-items: center;
        font-family: Arial, sans-serif;

    }
    .input{
        width: 250px; /* Sesuaikan dengan ukuran yang Anda inginkan */
        padding: 5px; /* Sesuaikan dengan padding yang Anda inginkan */
        border-radius: 10px; /* Mengatur sudut menjadi tumpul */
        border: 2px solid #ccc; /* Mengatur border dengan ketebalan 1px */
    }
    .submit{
        width: 265px;
        background-color: pink;
        padding: 5px; 
        border-radius: 10px; 
        border: 1px solid #ccc; 
        color: white;
        font-weight: bold; /* Mengatur teks pada tombol submit menjadi tebal */
    }
    .submit:hover{
        background-color: white;
        color: pink;
        }
    .link{
        color:pink;
    }
    </style>
    </head>
<body>
<br><br>
<h1 text-align="center">Add New Produk!</h1>
<p><a href='staff.php?page=produk' class="link">Back</a></p><h6>&nbsp;</h6>

<div class="container">
<div class="left-div">
    <img src="img/insert.jpg" width="250">
</div>
<div class="right-div">
<form action='<?php $_SERVER['PHP_SELF']; ?>' name='insertproduk' method='post' enctype='multipart/form-data'>
    <table align='center'>
        <tr>
            <td>Brand Id</td>
            <td>
            <select name='id_brand' class="input">
			<?php
			$s = "select * from brand";
			$q = mysqli_query($conn, $s);
			while($row=mysqli_fetch_array($q)){
				echo "<option value='$row[id_brand]'>$row[id_brand] - $row[nama_brand]</option>";
			}
			?>
            </td>
        </tr>
        <tr>
            <td>Product Name</td>
            <td><input type='text' name='nama_produk' class="input" required></td>
        </tr>
        <tr>
            <td>Type</td>
            <td><select name='jenis' class="input">
                <option>Complexion</option>
                <option>Lip Product</option>
                <option>Eye Makeup</option>
                <option>Remover</option>
        </select>
        </td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type='text' name='harga' class="input" required></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='deskripsi' class="input" required></textarea></td>
        </tr>
        <tr>
            <td>Upload Image</td>
            <td><input type='file' name='foto_produk' required> </td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' name='input' value='INSERT' class="submit"> </td>
        </tr>
    </table>
</form>
        </div>
        </div>
        </body>
        </html>