<?php
include "koneksi.php";
$idbrand = $_GET['idbrand'];
$idprod = $_GET['idprod'];
if(isset($_POST['update'])){
    $tgl_launching=$_POST['tgl_launching'];
    $update = "update produk_brand set tgl_launching='$tgl_launching' where id_produk='$idprod' ";
    $query = mysqli_query($conn, $update);
        if($query){
        ?>
        <script>
            alert("Successfully updated the launch date!");
            document.location="staff.php?page=viewpb";
        </script>
        <?php
        } else {
            echo "Gagal mengunggah file.";
        }
    }
    // Ambil nama brand dari tabel brand
$brand= mysqli_query($conn, "SELECT nama_brand FROM brand WHERE id_brand = '$idbrand'");
$rowb = mysqli_fetch_assoc($brand);
$brand = $rowb['nama_brand'];

// Ambil nama produk dari tabel produk
$produk = mysqli_query($conn, "SELECT nama_produk FROM produk WHERE id_produk = '$idprod'");
$rowp = mysqli_fetch_assoc($produk);
$nama_produk = $rowp['nama_produk'];
$row=mysqli_fetch_array(mysqli_query($conn,"select *from produk_brand where id_produk='$idprod'"));
if($row['id_produk']!=""){
    ?>
    <!DOCTYPE html>
<html>
    <head>
        <title>Edit Detail</title>
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
        width: 255px;
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
<br><br><br><br>
<h1>Update Detail</h1>
<p><a href='staff.php?page=viewpb' class="link">Cancel</a></p><br>
    <form action='<?php $_SERVER['PHP_SELF']; ?>' name='updatepb' method='post'>
    <div class="right-div">
    <table align='center'>
        <tr>
            <td>Product Name</td>
            <td><input type='text' name='nama_brand' value='<?php echo $brand; ?>' class='input' readonly></td>
        </tr>
        <tr>
            <td>Brand Name</td>
            <td><input type='text' name='nama_produk' value='<?php echo $nama_produk; ?>' class='input' readonly></td>
		</td>
        </tr>
        <tr>
            <td>Launch Date</td>
            <td><input type='date' name='tgl_launching' value='<?php echo $row['tgl_launching'];?>' class='input'></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' name='update' value='SAVE' class='submit'> </td>
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
<h1>&nbsp;</h1>
<h1>&nbsp;</h1>
</body>
</html>