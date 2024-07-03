<?php
session_start();
include "koneksi.php";
$id_akun = $_SESSION['id_akun'];
$query = "SELECT * FROM akun WHERE id_akun='$id_akun'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Memproses pembaruan data akun
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $foto = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];

    // Jika ada file foto yang diunggah
    if (!empty($foto)) {
        $up = 'img/' . $foto;
        if (move_uploaded_file($file_tmp, $up)) {
            $update = "UPDATE akun SET username='$username', email='$email', password='$password', foto='$up' WHERE id_akun='$id_akun'";
        } else {
            echo "File upload failed.";
        }
    } else {
        // Jika tidak ada file foto yang diunggah
        $update = "UPDATE akun SET username='$username', email='$email', password='$password' WHERE id_akun='$id_akun'";
    }

    // Menjalankan query pembaruan
    $query = mysqli_query($conn, $update);
    if ($query) {
        // Pembaruan nilai session
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        if (!empty($foto)) {
            $_SESSION['foto'] = $up;
        }
        ?>
        <script>
            alert("Your account has been successfully updated!");
            document.location = "profil.php";
        </script>
        <?php
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
//logout
if(isset($_POST['logout'])){
    session_start();
    session_destroy();
    ?>
    <script>
        alert('Logout was successful!'); document.location='index.php';
    </script>
    <?php
}
//Delete akun
$del = isset($_GET['del']) ? $_GET['del'] : "";
if($del!=""){
    $row=mysqli_fetch_array(mysqli_query($conn,"select *from akun where id_akun='$del'"));
    $foto=$row['foto'];
    unlink($foto);
    $delete="delete from akun where  id_akun='$del'";
    $query=mysqli_query($conn,$delete);
    if ($query) {
            ?>
        <script>
            alert("You have just deleted your account, and will switch to the guest page!");
            document.location='index.php';
        </script>
        <?php
    }
}
//Delete review
$no = isset($_GET['no']) ? $_GET['no'] : "";
if($no!=""){
    $row=mysqli_fetch_array(mysqli_query($conn,"select *from ulasan where no_ulasan='$no'"));
    $delete="delete from ulasan where no_ulasan='$no'";
    $query=mysqli_query($conn,$delete);
    if ($query){
        ?>
        <script>
            alert("DATA BERHASIL DIHAPUS!");
            document.location='profil.php';
        </script>
        <?php
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>PROFILE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        justify-content: center;
        align-items: center;
        height: 100vh; /* Memastikan kontainer berada di tengah secara vertikal */
        margin: 0; /* Menghapus margin bawaan untuk menghindari jarak tak diinginkan */
    }
    table {
            margin-left: 275px;
            border-collapse: collapse;
            background-color:rgb(255, 245, 245);
        }

        td {
            padding: 8px;
            justify-content: center;
            align-items: center;
        }
        td:nth-child(2) {
            width: 600px; /* Lebar kolom kedua */
        }

    .header{
        font-family: Arial, sans-serif;
        text-align:center;
    }
    .container {
        background-color:rgb(255, 245, 245);
        width:48%;
        height:65%;
        display: flex;
        flex-direction: column;
        justify-content: center; 
        align-items: center;
        font-family: helvetica;
        border-radius: 15px;
        display: grid;
        grid-template-columns: 50% 50%;
    }
    .container h1 {
        margin-bottom: 0; /* Menghapus jarak antara h1 dan p */
    }
    .container p {
        margin-bottom: 10px; /* Biarkan jarak antara p dan elemen berikutnya */
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
    .input2{
        width: 250px; /* Sesuaikan dengan ukuran yang Anda inginkan */
        padding: 5px; /* Sesuaikan dengan padding yang Anda inginkan */
        border-radius: 10px; /* Mengatur sudut menjadi tumpul */
        border: 2px solid #ccc; /* Mengatur border dengan ketebalan 1px */
        background-color: pink;
    }
    .hapus{
        width: 70px;
        padding: 10px; 
        border-radius: 10px; 
        border: 1px solid #ccc; 
        color: white;
    }
    .submit{
        margin: 5px;
        width: 120px;
        height:40px;
        background-color: pink;
        padding: 10px; 
        border-radius: 20px; 
        border: 1px solid #ccc; 
        color: white;
        font-weight: bold; /* Mengatur teks pada tombol submit menjadi tebal */
    }
    .submit:hover{
      box-shadow: 0 0 8px pink;
      cursor: pointer;
      background-color: white;
      color: pink;
    }
    .hapus{
        text-decoration: none;
        width: 90px;
        height:40px;
        background-color: white;
        padding: 6px; 
        border-radius: 20px; 
        border: 1px solid #ccc; 
        color: pink;
        font-weight: bold; /* Mengatur teks pada tombol submit menjadi tebal */
    }
    .hapus:hover{
      box-shadow: 0 0 8px pink;
      cursor: pointer;
      background-color: pink;
      color: white;
    }
    .tombol-atas{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .tombol-bawah{
        display: flex;
        flex-direction: row;
    }
    .submit1{
       width: 120px;
    }
    .submit2{
       width: 180px;
       text-decoration: none;
    }
    .photo{
        width: 200px;
        border-radius: 50%;
    }link{
        text-decoration: none;
        color: pink;
    }
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.7);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 1500;
    }

    .custom-box {
      background-color: rgb(255, 245, 245);
      padding: 20px;
      border-radius: 10px;
      width: 40%;
      height: 40%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .chose{
      display: flex;
      flex-direction: row;
    }
    .quest{
        font-size: 20px;
    }
    .back{
        color: pink;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        font-size: 20px;
    }
    .backk{
        text-align: center;
    }

    </style>
</head>
<body>
<h1>&nbsp;</h1>
<h3 class="header">Update your Account Now!</h3><br>

<div class="backk">
<?php
    if ($_SESSION['status'] == 'User') {
        echo"<a href='home.php' class='back'>Back to Homepage</a>";
    }else if ($_SESSION['status'] == 'Staff') {
        echo"<a href='staff.php' class='back'>Back to Homepage</a>";
    }else{
        echo"<a href='index.php'>invalid</a>";
    }?>
</div>

<div class="container">
    <div class="left-div">
        <form name="profil" method="post" enctype="multipart/form-data">
        <label for="exampleFormControlTextarea1">Email</label><br>
        <input type="email" name="email" class="input2" id="email" value='<?php echo $_SESSION['email'];?>' readonly></input><br><br>
            <label for="exampleFormControlInput1">Username</label><br>
            <input type="text" class="input" id="username" name="username" value='<?php echo $_SESSION['username'];?>'><br><br>
                        
            <label for="exampleFormControlTextarea1">Enter a New Password</label><br>
            <input type="password" name="password" class="input" id="password" value="<?php echo $row['password']; ?>"></input><br><br>

            <div class="tombol-atas">
            <div class="tombol-bawah">
            <button type="submit submit1" name="update" class="submit">Update</button>
            <button type="submit submit1" name="logout" class="submit">Log Out</button>
            </div>
            <button type="button" class="submit submit2" onclick="showCustomBox()">Delete Account</button><a>
            </div>
     </div>

        <div class="right-div">
            <img src='<?php echo $_SESSION['foto'];?>' class="photo"><br>
            <input type='file' name='foto'/>
        </div>
        </form>   

    </div>  

<br><br><br><br>
<div class="riwayat">

<?php
if ($_SESSION['status'] == 'User') {
    // Tampilkan ulasan sesuai dengan id_akun pengguna
    $id_akun = $_SESSION['id_akun']; // Sesuaikan dengan variabel yang benar
    $no = 1;
    $queryUlasan = "SELECT ulasan.*, produk_brand.tgl_launching, produk.nama_produk, produk.foto_produk 
                    FROM ulasan 
                    LEFT JOIN produk_brand ON ulasan.tgl_launching = produk_brand.tgl_launching
                    LEFT JOIN produk ON produk_brand.id_produk = produk.id_produk
                    WHERE id_akun = '$id_akun'";
    $resultUlasan = mysqli_query($conn, $queryUlasan);

    if (mysqli_num_rows($resultUlasan) > 0) {
        echo "<h3 style='text-align: center;'>All reviews from you :</h3>";

        while ($q = mysqli_fetch_assoc($resultUlasan)) {
            echo "<table>";
            echo "<tr>";
            if ($q['foto_produk'] != "") {
                echo "<td><img src='" . $q['foto_produk'] . "' width='100'></td>";
            } else {
                echo "<td>Produk sudah terhapus<td>";
            }
            echo "<td>" . $q['nama_produk'] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td><a href='profil.php?no=$q[no_ulasan]' onclick='return confirmDelete();'><input type='submit' name='upreview' value='delete' class='hapus'></a></td>";   
            echo "<td>" . $q['ulasan'] . "</td>";
            echo "</tr>";
            echo "</table><br>";
        }
    }
}
?>
<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete your review?");
}
</script>


<!-- custom box -->
<div class="overlay" id="customBoxOverlay" onclick="hideCustomBox()">
    <div class="custom-box">
      <p class="quest">Are you sure you want to delete your account?</p>
      <div class="chose">
      <a href="profil.php"><input type="submit" class="submit" value="NO"></a>
      <a href="profil.php?del=<?php echo $_SESSION['id_akun'];?>" class="link"><button type="hapus" name="hapus" class="submit submit2">YES</button></a>
      </div>
    </div>
  </div>

  <script>
    function showCustomBox() {
      document.getElementById('customBoxOverlay').style.display = 'flex';
    }

    function hideCustomBox() {
      document.getElementById('customBoxOverlay').style.display = 'none';
    }
  </script>


</body>
</html>