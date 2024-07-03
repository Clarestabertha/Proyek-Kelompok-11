<?php
include "koneksi.php";
if(isset($_POST['input'])){
    $id_brand = $_POST['id_brand'];
    $nama_brand = $_POST['nama_brand'];
    $citizenship = $_POST['citizenship'];
    $tagline = $_POST['tagline'];
    $logo = $_FILES['logo']['name'];
    $file_tmp = $_FILES['logo']['tmp_name'];
    $up = 'brand/' . $logo;

    // Pengecekan apakah id_brand atau nama_brand sudah ada di database
    $check_query = "SELECT * FROM brand WHERE id_brand='$id_brand' OR nama_brand='$nama_brand'";
    $check_result = mysqli_query($conn, $check_query);

    if(mysqli_num_rows($check_result) > 0){
        ?>
        <script>
            alert("Brand ID or Brand Name has been used. Please use another ID or Brand Name.");
            document.location = 'staff.php?page=insertbrand';
        </script>
        <?php
    } else {
        if (move_uploaded_file($file_tmp, $up)) {
            $insert = "INSERT INTO brand (id_brand, nama_brand, citizenship, tagline, logo) VALUES 
            ('$id_brand', '$nama_brand', '$citizenship', '$tagline','$up')";
            
            $query = mysqli_query($conn, $insert);
            if($query){
                ?>
                <script>
                    alert("You have just added a new Brand");
                    document.location = 'staff.php?page=brand';
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("Terjadi kesalahan saat memasukkan data. Silakan coba lagi.");
                    document.location = 'staff.php?page=brand';
                    </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("Gagal mengupload logo. Silakan coba lagi.");
                document.location = 'staff.php?page=brand';
                </script>
            <?php
        }
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Insert Brand</title>
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
            width: 250px; /* Sesuaikan dengan ukuran yang Anda inginkan */
            padding: 5px; /* Sesuaikan dengan padding yang Anda inginkan */
            border-radius: 10px; /* Mengatur sudut menjadi tumpul */
            border: 2px solid #ccc; /* Mengatur border dengan ketebalan 1px */
        }
        .submit {
            width: 265px;
            background-color: pink;
            padding: 5px; 
            border-radius: 10px; 
            border: 1px solid #ccc; 
            color: white;
            font-weight: bold; /* Mengatur teks pada tombol submit menjadi tebal */
        }
        .submit:hover {
            background-color: white;
            color: pink;
        }
        .link {
            color: pink;
        }
        </style>
    </head>
<body>
<br><br>
<h1 text-align="center">Add New Brand!</h1>
<p><a href='staff.php?page=brand' class="link">Back</a></p><h6>&nbsp;</h6>

<div class="container">
<div class="left-div">
    <img src="img/insert.jpg" width="250">
</div>
    <div class="right-div">
<form action='insertbrand.php' name='insertbrand' method='post' enctype='multipart/form-data'>
    <table align='center'>
        <tr>
            <td>Brand Id</td>
            <td><input type='text' name='id_brand' class="input" required></td>
        </tr>
        <tr>
            <td>Brand Name</td>
            <td><input type='text' name='nama_brand' class="input" required></td>
        </tr>
        <tr>
            <td>Citizenship</td>
            <td><input type='text' name='citizenship' class="input" required></td>
        </tr>
        <tr>
            <td>Tagline</td>
            <td><textarea name='tagline' rows="3" class="input" required></textarea></td>
        </tr>
        <tr>
            <td>Upload Logo</td>
            <td><input type='file' name='logo' required> </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' name='input' value='INSERT' class="submit"> </td>
        </tr>
    </table>
</form>
</div>
</div>
<h1>&nbsp;</h1>
</body>
</html>
