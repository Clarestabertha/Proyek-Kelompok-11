<?php
session_start();
include "koneksi.php";
$rev = $_GET['id'];
$no=1;
$query = "SELECT ulasan.*, akun.username FROM ulasan
          LEFT JOIN akun ON ulasan.id_akun = akun.id_akun
          WHERE ulasan.tgl_launching = (SELECT tgl_launching FROM produk_brand WHERE id_produk = '$rev')";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array(mysqli_query($conn, "SELECT produk.*, brand.*, produk_brand.*, ulasan.rating, ulasan.ulasan, akun.*
FROM produk
LEFT JOIN produk_brand ON produk.id_produk = produk_brand.id_produk
LEFT JOIN brand ON produk_brand.id_brand = brand.id_brand 
LEFT JOIN ulasan ON produk_brand.tgl_launching = ulasan.tgl_launching
LEFT JOIN akun ON ulasan.id_akun = akun.id_akun
WHERE produk.id_produk = '$rev'"));
if(isset($_POST['submit'])){
    if(!isset($_SESSION['id_akun'])) {
        ?>
        <script>
            alert('You must be logged in to leave a review');
            </script>
        <?php
    } else {
        $rating = $_POST["rating"];
        $ulasan = $_POST["ulasan"];
        if (empty($rating) || empty($ulasan)) {
            ?>
            <script>
                alert('Make sure you have provided a review and rating to upload it');
            </script>
            <?php
    }else{
        $rating = $_POST["rating"];
    $ulasan=$_POST["ulasan"];
    $id_akun=$_SESSION['id_akun'];
    $tgl_launching=$row['tgl_launching'];
    $insert = "INSERT INTO ulasan (rating, ulasan, id_akun, tgl_launching) VALUES ('$rating', '$ulasan', '$id_akun', '$tgl_launching')";
    $query = mysqli_query($conn, $insert);

    if($query){
?>
        <script>
            document.location='?page=review&id=<?php echo $row['id_produk']; ?>';
        </script>
<?php
        // Simpan data rating ke database atau lakukan tindakan lainnya.
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
    }
}
if ($row['id_produk']!="") {
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barenbliss</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
.popup{
        width:100%;
        height:100vh;
        background-color: rgba(0,0,0, .8);
        position: fixed;
        top:0;
        left:0;
        z-index: 1500;
    }
    .popup__content{
        display: flex;
        flex-direction: row;
        border-radius: 10px;
        width: 94%;
        height: 95%;
        background-color: #fff;
        box-shadow: 0 20px 40px rgba(0,0,0, .2);

        position: absolute;
        top:2%;
        left:3%;
    

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

.kolom1{/*sebelah kiri*/
  width:50%;
  height: 100%; 
}
.foto{/*ini buat nampilih foto produk*/
  height: 300px; 
  display: flex;
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
.desc{/*ini buat deskripsi produk*/
  height: 145px;  
  display: flex;
  justify-content: center; 
  margin-left: 20px;
  margin-right: 10px;
}

.kolom2{/*sebelah kanan*/
    width:50%;
    height: 100%; 
}
.ulasan {
    height: 420px; 
    display: flex;
    flex-direction: column;
    text-align: left;
    align-items: flex-start; /* Menetapkan posisi teks ke sebelah kiri */
}

.typehere{/*ini buat textarea komentar*/
    height: 110px;  
    align-items: center;
    display: flex;
    justify-content: center;
}
.scroll{
    overflow-y: auto;/*buat ngescroll review*/
}
.comment-control{
    width:90%;
}

/*Card buat foto produk*/
.container {
    display: flex;
    justify-content: center;
    position: relative;
    opacity: 100%;

  }
  .produk{
    margin-top: 30px;
    width:250px;
  }
  .input{
        width: 250px; /* Sesuaikan dengan ukuran yang Anda inginkan */
        padding: 5px; /* Sesuaikan dengan padding yang Anda inginkan */
        border-radius: 10px; /* Mengatur sudut menjadi tumpul */
        border: 2px solid #ccc; /* Mengatur border dengan ketebalan 1px */
    }
    .submit{
        width: 580px;
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
      width: 570px;
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
/*profile*/
.fotoprofile{
  border-radius: 50%;
}
/*rating bintang*/
.rating {
            unicode-bidi: bidi-override;
            direction: rtl;
            font-size: 30px;
        }

        .rating input {
            display: none;
        }

        .rating label {
            float: right;
            cursor: pointer;
            color: #ccc;
        }

        .rating label:before {
            content: '\2605'; /* Bintang kosong */
            margin-right: 5px;
        }

        .rating input:checked ~ label {
            color: #ffcc00; /* Warna bintang yang diisi */
        }

        .rating label:hover,
        .rating label:hover ~ label {
            color: #ffcc00; /* Warna bintang saat dihover */
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
<h1>&nbsp;</h1>
<body>
    <div class="popup" id="popup">
        <div class="popup__content">
            <div class="kolom1">
                <div class="foto">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="container" style="width: 18rem;">
                                    <img src="<?php echo $row['foto_produk']; ?>" class="produk">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nama">
                    <h3><?php echo $row['nama_produk'];?></h3><br>
                </div>
                <div class="rating">
                    <img src="img/star.jpg" width="200">
                    <h2>4.0</h2>
                </div>
                <div class="desc">
                    Price : <?php echo $row['harga'];?><br>
                    Brand : <?php echo $row['nama_brand'];?><br>
                    Launching : <?php
                    echo $row['tgl_launching'];?><br>
                    Description : <?php echo $row['deskripsi'];?>
                </div>
            </div>

            <div class="kolom2">
<?php
if (mysqli_num_rows($result) > 0) {
    ?>
    <!-- Tampilkan ulasan jika ada -->
    <div class="ulasan scroll">
        <?php
        // Loop untuk menampilkan setiap ulasan
        while ($ulasan = mysqli_fetch_assoc($result)) {
            ?>
          <b><?php echo $ulasan['username']; ?></b>
          <i>(rating : <?php echo $ulasan['rating']; ?>/5)</i>
          <?php echo $ulasan['ulasan']; ?><br><br>

    <?php
        // Tingkatkan nilai $no setiap kali loop dijalanka
    }
    ?>
</div>
    <?php
} else {
    ?>
    <!-- Tampilkan pesan atau placeholder jika belum ada ulasan -->
    <div class="ulasan scroll">
    No reviews yet
    </div>
    <?php
}
?>
                <a href="#" onclick="closePopup()" class="popup__close">&times;</a>
                <div class="typehere">
                <form action='?page=review&id=<?php echo $row['id_produk']; ?>' method="post">
                            <textarea class="text" name="ulasan" placeholder="Leave a comment here"></textarea>&nbsp;&nbsp;
                        <div class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                    </div>
                       <button class="submit" type="submit" name="submit">Upload</button>  
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    // Fungsi untuk membuka popup
    function openPopup() {
        // Menyimpan URL halaman saat ini ke session storage
        sessionStorage.setItem('currentPage', window.location.href);
        // Menampilkan popup
        document.getElementById('popup').style.display = 'block';
    }

    // Fungsi untuk menutup popup dan kembali ke halaman sebelumnya
    function closePopup() {
        // Menutup popup
        document.getElementById('popup').style.display = 'none';
        
        // Kembali ke dua halaman sebelumnya
        history.go(-1);
    }
    </script>

    <h1>&nbsp;</h1>
    <h1>&nbsp;</h1>
    <h1>&nbsp;</h1>



</body>
</html>
<?php
}
?>