<?php
session_start();
include "koneksi.php";
?>               

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barenbliss</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
.centered{
display: flex;
flex-direction: grid;
align-items: center;
justify-content: center;
}
.judul {
  display: flex;
  justify-content: center;
  position: relative;
  margin-top: 2rem;
  margin-bottom: 2rem;
  opacity: 90%;
}
.container {
  display: flex;
  justify-content: center;
  position: relative;
  margin-top: 2rem;
  margin-bottom: 2rem;
  opacity: 90%;
}
.image-container {
  margin-top: 70px;
}
.image-container img {
  width: 700px;
  float: right;
}
.image-container p {
  overflow: auto;
  text-align: justify;
  line-height: 25px;
  padding-right: 10px;
}
section {
  padding: 50px 0;
}
.card {
  background-color:rgb(255, 245, 245);
}
.card-text {
  color: black;
}
.card:hover {
  box-shadow: 0 0 10px rgba(20, 1, 70, 0.3);
  transform: scale(1.15);
}
.mid {
  margin-top: 2rem;
}
.mid h1 {
  width: 80%;
  margin: 0 auto;
}

.popup{
        width:100%;
        height:100vh;
        background-color: rgba(0,0,0, .8);
        position: fixed;
        top:0;
        left:0;

        opacity:0;
        visibility: hidden;

        transition: all .3s;
        z-index: 1500;
    }
    .popup__content{
        display: flex;
        flex-direction: row;
        width: 70%;
        height: 95%;
        background-color: #fff;
        box-shadow: 0 20px 40px rgba(0,0,0, .2);

        position: absolute;
        top:50%;
        left:50%;
        transform: translate(-50%, -50%); scale(.25);
        opacity:0;

        transition: all .5s .1s;
    }
    #popup:target{
        opacity:1;
        visibility: visible;
    }
    #popup:target .popup__content{
        opacity:1;
        transform: translate(-50%, -50%) scale(1);
    }
    .popup__close:link,
    .popup__close:visited{
        position: absolute;
        top: 12px;
        right: 20px;
        text-decoration: none;
        color: #000;
        font-size: 30px;
        display: inline-block;
        line-height: 1;
        transition : all .3s;
    }

    .popup__close:hover,
    .popup__close:active{
        color: pink;
    }

.kolom1{/sebelah kiri/
  width:40%;
  height: 100%; 
}
.foto{/ini buat nampilih foto produk/
  height: 320px; 
  display: flex;
  justify-content: center; 
}
.nama{
  text-align:center;
  height: 40px;  
  display: flex;
  justify-content: center; 
  align-items: center;
}
.rating{
  height: 50px;  
  align-items: center;
  display: flex;
  justify-content: center; 
  text-align: center;
}
.desc{/ini buat deskripsi produk/
  height: 145px;  
  display: flex;
  justify-content: center; 
}

.kolom2{/sebelah kanan/
    width:60%;
    height: 100%; 
}
.ulasan{/ini buat nampilih review/
    height: 435px; 
}
.typehere{/ini buat textarea komentar/
    height: 120px;  
    align-items: center;
    display: flex;
    justify-content: center;
}
.scroll{
    overflow-y: auto;/buat ngescroll review/
}
.comment-control{
    width:90%;
}

/Card buat foto produk/
.container {
    display: flex;
    justify-content: center;
    position: relative;
    margin-top: 2rem;
    margin-bottom: 2rem;
    opacity: 100%;
  }
  .produk{
    width:250px;
  }
  .input{
        width: 250px; /* Sesuaikan dengan ukuran yang Anda inginkan */
        padding: 5px; /* Sesuaikan dengan padding yang Anda inginkan */
        border-radius: 10px; /* Mengatur sudut menjadi tumpul */
        border: 2px solid #ccc; /* Mengatur border dengan ketebalan 1px */
    }
    .submit{
        width: 530px;
        height:40px;
        background-color: pink;
        padding: 10px; 
        border-radius: 10px; 
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
    .text{
      width: 390px;
      height: 50px;      
      padding: 10px; 
      border-radius: 10px; 
      border: 1px solid #ccc; 
    }


    .navbar {
    background-color: rgb(255, 213, 220) !important; 
    z-index: 1000;
}
.navbar-nav .nav-link {
    border-bottom: 2px solid transparent; /* Garis bawah transparan */
    transition: border-color 0.3s; /* Transisi warna garis bawah */
}
.navbar-nav .nav-link:hover {
    border-color: rgb(255, 255, 255); 
}
/profile/
.fotoprofile{
  border-radius: 50%;
}
@font-face {
font-family: Butler;
src: url(Butler_Webfont/Butler-Bold.woff2) format('woff2');
font-family: poppins;
src: url(Poppin-Story.ttf) format('woff2');
}
</style>
</head>
<h1>&nbsp;</h1>


<body>
    
    <div class="centered">
        <img src="img/bnb.png" width="200">
        <img src="img/bnbb.png" width="400">
    </div>
    <br>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 12rem;">
                    <a href="#com"><img src="img/complexion.jpg" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <p align='center' class="card-text">Complexion</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 12rem;">
                    <a href="#lip"><img src="img/lip.jpg" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <p align='center' class="card-text">Lip Product</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 12rem;">
                    <a href="#eye"><img src="img/eye.jpg" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <p align='center' class="card-text">Eye Makeup</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 12rem;">
                    <a href="#remov"><img src="img/remover.jpg" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <p align='center' class="card-text">Makeup Remover</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--COMPLEXION-->
<div class="judul" id="com">
    <h1>&nbsp;</h1>
</div>
<div class="judul">
    <h1>COMPLEXION</h1>
</div>
<div class="container">
    <div class="row">
        <?php
        // Ubah query untuk melakukan JOIN dan menambahkan kondisi WHERE
        $sql = "SELECT p.* FROM produk p
                JOIN produk_brand pb ON p.id_produk = pb.id_produk
                WHERE p.jenis='Complexion' AND pb.id_brand='BNB' AND pb.tgl_launching IS NOT NULL";

        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($query)) {
        ?>
            <div class="col">
                <div class="card" style="width: 12rem;">
                    <a href="?page=review&id=<?php echo $row['id_produk']; ?>">
                        <img src="<?php echo $row['foto_produk']; ?>" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <p align='center' class="card-text"><?php echo $row['nama_produk']; ?></p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<br><br>
<!--LIP PRODUCT-->
    <div class="judul" id="lip">
        <h1>&nbsp;</h1>
    </div>
    <div class="judul">
        <h1>LIP PRODUCT</h1>
    </div>
    <div class="container">
    <div class="row">
        <?php
        $sql = "SELECT p.* FROM produk p
        JOIN produk_brand pb ON p.id_produk = pb.id_produk
        WHERE p.jenis='Lip Product' AND pb.id_brand='BNB' AND pb.tgl_launching IS NOT NULL";       
        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($query)) {
        ?>
            <div class="col">
                <div class="card" style="width: 12rem;">
                    <a href="?page=review&id=<?php echo $row['id_produk']; ?>">
                        <img src="<?php echo $row['foto_produk']; ?>" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <p align='center' class="card-text"><?php echo $row['nama_produk']; ?></p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<br><br>
<!--EYE MAKEUP-->
<div class="judul" id="eye">
        <h1>&nbsp;</h1>
    </div>
    <div class="judul">
        <h1>EYE MAKEUP</h1>
    </div>
    <div class="container">
    <div class="row">
        <?php
        $sql = "SELECT p.* FROM produk p
        JOIN produk_brand pb ON p.id_produk = pb.id_produk
        WHERE p.jenis='Eye Makeup' AND pb.id_brand='BNB' AND pb.tgl_launching IS NOT NULL";        
        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($query)) {
        ?>
            <div class="col">
                <div class="card" style="width: 12rem;">
                    <a href="?page=review&id=<?php echo $row['id_produk']; ?>">
                        <img src="<?php echo $row['foto_produk']; ?>" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <p align='center' class="card-text"><?php echo $row['nama_produk']; ?></p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<br><br>
<!-- MAKE UP REMOVER -->
<div class="judul" id="remov">
        <h1>&nbsp;</h1>
    </div>
    <div class="judul">
        <h1>MAKEUP REMOVER</h1>
    </div>
    <div class="container">
    <div class="row">
        <?php
        $sql = "SELECT p.* FROM produk p
        JOIN produk_brand pb ON p.id_produk = pb.id_produk
        WHERE p.jenis='Remover' AND pb.id_brand='BNB' AND pb.tgl_launching IS NOT NULL";
        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($query)) {
        ?>
            <div class="col">
                <div class="card" style="width: 12rem;">
                    <a href="?page=review&id=<?php echo $row['id_produk']; ?>">
                        <img src="<?php echo $row['foto_produk']; ?>" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <p align='center' class="card-text"><?php echo $row['nama_produk']; ?></p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<br><br>



    <h1>&nbsp;</h1>
    <h1>&nbsp;</h1>
    <h1>&nbsp;</h1>
</body>
</html>