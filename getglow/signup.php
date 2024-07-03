<?php
include "koneksi.php";

if (isset($_POST['sign'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Dari formulir pendaftaran
    $status = $_POST['status'];
    $foto = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    $up = 'img/' . $foto;

    // Periksa apakah email sudah digunakan sebelumnya
    $checkEmail = "SELECT * FROM akun WHERE email = '$email'";
    $result = mysqli_query($conn, $checkEmail);

    if (mysqli_num_rows($result) > 0) {
        // Email sudah digunakan, tampilkan pesan alert
        ?>
        <script>
            alert('Email is already in use. Please use another email.');
        </script>
        <?php
    } else {
        // Email belum digunakan, lanjutkan dengan pendaftaran
        if (move_uploaded_file($file_tmp, $up)) {
            $insert = "INSERT INTO akun (username, email, password, status, foto) VALUES ('$username', '$email', '$password', '$status', '$up')";
            $query = mysqli_query($conn, $insert);

            if ($query) {
                ?>
                <script>
                    alert('Sign-up was successful! Come on, log in to your new account!');
                    document.location = 'login.php';
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
    <title>Sign Up</title>
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color:rgb(255, 245, 245);
        height: 100vh; /* Memastikan kontainer berada di tengah secara vertikal */
        margin: 0; /* Menghapus margin bawaan untuk menghindari jarak tak diinginkan */
    }
    .container {
        width:50%;
        background-color:white;
        display: flex;
        flex-direction: column;
        justify-content: center; 
        align-items: center;
        font-family: helvetica;
        border-radius: 15px;
        display: grid;
        grid-template-columns: 40% 60%;
    }
    .container h1 {
        margin-bottom: 0; /* Menghapus jarak antara h1 dan p */
    }
    .container p {
        margin-bottom: 10px; /* Biarkan jarak antara p dan elemen berikutnya */
    }
    .left-div {
    background-color: yellow;
    display: flex;
    flex-direction: column;
    justify-content: center; 
    align-items: center;
    margin-left: auto; /* Menggeser elemen ke kanan */
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
        padding: 10px; 
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
        text-decoration: none;
        color: pink;
    }
    .link:active{
        color: black;
    }
    </style>
</head>
<body>
<div class="container">
<div class="left-div">
    <img src="img/signin.jpg" width="200">
</div>
    <div class="right-div">
        <h1>SIGN UP</h1><br>
        <form name="login" method="post" enctype="multipart/form-data">
        <label>Username</label><br>
        <input type="text" class="input" id="username" name="username" required><br><br>

        <label>Email</label><br>
        <input type="email" class="input" id="email" name="email" placeholder="name@example.com" required><br><br>

        <label>Password</label><br>
        <input type="password" name="password" class="input" id="password" required><br><br>

        <label>Status</label><br>
        <select class="input" id="status" name="status">
            <option>User</option>
            <option>Staff</option>
        </select><br><br>

        <label>Photo</label><br>
        <input type="file" id="foto" name="foto" required><br><br>

        <input type="submit" name="sign"  value="SIGN UP" class="submit"><br><br>
        Already have an account? <a href="login.php" text-align="center" class="link">Login Now!</a><br><br>
        <?php
        echo ""
        ?>
        </form>
        
  </div>
</div>
</body>
</html>
