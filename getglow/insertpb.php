<?php
include "koneksi.php";

$idbrand = $_GET['idbrand'];
$idprod = $_GET['idprod'];

if(isset($_POST['input'])){
    $namabrand = $_POST['nama_brand'];
    $namaprod = $_POST['nama_produk'];
    $tgl_launching = $_POST['tgl_launching'];

    if(empty($tgl_launching)) {
        ?>
        <script>
            alert("You haven't added a Launch Date");
        </script>
        <?php
    } else {
        // Proceed with inserting into database
        $insert = "INSERT INTO produk_brand (id_produk,id_brand,tgl_launching) VALUES ('$idprod','$idbrand','$tgl_launching')";
        $query = mysqli_query($conn, $insert);

        if($query){
            ?>
            <script>
                alert("Successfully added the launch date");
                document.location = 'staff.php?page=viewpb';
            </script>
            <?php
        }
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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Detail</title>
    <style>
        body {
            text-align: center;
            align-items: center;
        }

        .container {
            width: 70%;
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

        .input {
            width: 250px;
            padding: 5px;
            border-radius: 10px;
            border: 2px solid #ccc;
        }

        .submit {
            width: 265px;
            background-color: pink;
            padding: 5px; 
            border-radius: 10px; 
            border: 1px solid #ccc; 
            color: white;
            font-weight: bold;
        }

        .submit:hover {
            background-color: white;
            color: pink;
        }

        .link {
            color: pink;
        }
    </style>
    <script>
        function validateForm() {
            var launchDate = document.forms["insertpb"]["tgl_launching"].value;
            if (launchDate == "") {
                alert("You haven't added a Launch Date");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <br><br><br><br>
    <h1 text-align="center">Add Detail!</h1>
    <p><a href='staff.php?page=produk' class="link">Back</a></p><h6>&nbsp;</h6>
    <form action='<?php $_SERVER['PHP_SELF']; ?>' name='insertpb' method='post' onsubmit='return validateForm();'>
        <table align='center'>
            <tr>
                <td>Brand Name</td>
                <td><input type='text' name='nama_brand' value='<?php echo $brand; ?>' class='input' readonly></td>
            </tr>
            <tr>
                <td>Product Name</td>
                <td><input type='text' name='nama_produk' value='<?php echo $nama_produk; ?>' class='input' readonly></td>
            </tr>
            <tr>
                <td>Launch Date</td>
                <td><input type='date' name='tgl_launching' class='input'></td>
            </tr>
            <tr>
                <td></td>
                <td><input type='submit' name='input' value='INSERT' class='submit'> </td>
            </tr>
        </table>
    </form>
    <br><br><br><br><br><br><br>
</body>
</html>
