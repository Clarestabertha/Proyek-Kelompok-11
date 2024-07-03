<?php
include "koneksi.php";
$idupdate=$_GET['id'];

if(isset($_POST['update'])){
    $id_produk=$_POST['id_produk'];
    $id_brand=$_POST['id_brand'];
    $nama_produk=$_POST['nama_produk'];
    $deskripsi=$_POST['deskripsi'];
    $harga=$_POST['harga'];
    $jenis=$_POST['jenis'];
    $foto=$_FILES['foto_produk']['name'];
    $file_tmp = $_FILES['foto_produk']['tmp_name'];
    $up = 'produk/' . $foto;
        if (move_uploaded_file($file_tmp, $up)) {
            $update = "update produk set id_brand='$id_brand', nama_produk='$nama_produk',deskripsi='$deskripsi',harga='$harga',foto_produk='$up',jenis='$jenis' where id_produk='$idupdate' ";
        }else{
            $update = "update produk set id_brand='$id_brand', nama_produk='$nama_produk',deskripsi='$deskripsi',harga='$harga',jenis='$jenis' where id_produk='$idupdate' ";
        }
            $query = mysqli_query($conn, $update);
        if($query){
        ?>
        <script>
            alert("Product updated successfully");
            document.location="staff.php?page=produk";
        </script>
        <?php
        } else {
            echo "Gagal mengunggah file.";
        }
    } 


$row=mysqli_fetch_array(mysqli_query($conn,"select *from produk where id_produk='$idupdate'"));
if($row['id_produk']!=""){
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Produk</title>
        <style>
        body{
            text-align:center;
            align-items:center;
        }
        .container {
        width:55%;
        display: flex;
        flex-direction: column;
        justify-content: center; 
        align-items: center;
        font-family: helvetica;
        display: grid;
        grid-template-columns: 40% 60%;
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
<h1>Update Produk</h1>
<p><a href='staff.php?page=produk' class="link">Cancel</a></p><br>
<form action='<?php $_SERVER['PHP_SELF']; ?>' name='updateproduk' method='post' enctype='multipart/form-data'>
<div class="container">
    <div class="left-div">
    <table>
    <tr>
    <td><img src='<?php echo $row['foto_produk'];?>' width='250'><br></td>
</tr>
<tr>
    <td><input type='file' name='foto_produk'/></td>
</tr>
</table>
</div>
    <div class="right-div">
    <table align='center'>

        <tr>
            <td>Brand</td>
            <td>
		    <select name='id_brand' class='input'>
			<?php
			$s = "select * from brand";
			$q = mysqli_query($conn, $s);
			while($k=mysqli_fetch_array($q)){
				if($k['id_brand']==$row['id_brand']){
					echo "<option value='$k[id_brand]' selected>$k[id_brand] - $k[nama_brand]</option>";
				}else{
					echo "<option value='$k[id_brand]'>$k[id_brand] - $k[nama_brand]</option>";
				}
			}
			?>
		</select>
		</td>
        </tr>
        <tr>
            <td>Product Name</td>
            <td><input type='text' name='nama_produk' value='<?php echo $row['nama_produk'];?>' class="input"></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type='text' name='harga' value='<?php echo $row['harga'];?>' class="input"></td>
        </tr>
        <tr>
            <td>Type</td>
            <td>
            <select name='jenis' class='input'>
            <?php
if ($row['jenis'] == "Lip Product") {
    echo "<option selected>Lip Product</option>
          <option>Complexion</option>
          <option>Eye Makeup</option>
          <option>Remover</option>";
} elseif ($row['jenis'] == "Complexion") {
    echo "<option selected>Complexion</option>
          <option>Lip Product</option>
          <option>Eye Makeup</option>
          <option>Remover</option>";
} elseif ($row['jenis'] == "Eye Makeup") {
    echo "<option selected>Eye Makeup</option>
          <option>Complexion</option>
          <option>Lip Product</option>
          <option>Remover</option>";
} else {
    echo "<option selected>Remover</option>
          <option>Complexion</option>
          <option>Eye Makeup</option>
          <option>Lip Product</option>";
}
?>

		</select>
            </td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='deskripsi' class="input"><?php echo $row['deskripsi'];?></textarea></td>
        </tr>

        <tr>
            <td></td>
            <td><input type='submit' name='update' value='SAVE' class="submit"> </td>
        </tr>
    </table>
</form>
    <?php
}

?>
</div>
</div>
<h1>&nbsp;</h1>
<h1>&nbsp;</h1>
</body>
</html>