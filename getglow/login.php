<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = "select * from akun where email='$email' and password='$password' ";
	$query = mysqli_query($conn, $sql);
	$hasil = mysqli_fetch_array($query);
	if($hasil['email']==$email && $hasil['password']==$password){
		//berhasil login
		// Set session pada saat login
$_SESSION['id_akun'] = $hasil['id_akun'];
$_SESSION['status'] = $hasil['status'];
$_SESSION['foto'] = $hasil['foto'];
$_SESSION['username'] = $hasil['username'];
$_SESSION['email']=$hasil['email'];
		if($hasil['status']=="Staff"){  
			?>
			<script>
			document.location='staff.php';
			</script>
			<?php
		}else{
			//user pengunjung
			?>
			<script>
        document.location='home.php';
			</script>
			<?php
		}
	}else{
		//gagal login
		?>
		<script>alert('Email / Password entered incorrectly');
		document.location='login.php';
		</script>
		<?php
	}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
        width:45%;
        background-color:white;
        display: flex;
        flex-direction: column;
        justify-content: center; 
        align-items: center;
        font-family: helvetica;
        border-radius: 15px;
        display: grid;
        grid-template-columns: 36% 64%;
    }
    .container h1 {
        margin-bottom: 0; /* Menghapus jarak antara h1 dan p */
    }
    .container p {
        margin-bottom: 10px; /* Biarkan jarak antara p dan elemen berikutnya */
    }
    .left-div {}
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
    <img src="img/login.jpg" width="220">
</div>
    <div class="right-div">
        <h1>LOG IN</h1><br>
        <form name="login" method="post" action="login.php">
            <label>Email address</label><br>
            <input type="email" class="input" id="email"  name="email" placeholder="name@example.com" required><br><br>
            <label>Password</label><br>
            <input type="password" name="password" class="input" id="password" required></input><br><br>
          <input type="submit" name="login"  value="LOG IN" class="submit"><br><br>
          Don't have an account yet? <a href="signup.php" class="link">Sign up now</a><br><br>
          <?php
          echo ""
          ?>
        </form>
  </div>
</div>
</body>
</html>
