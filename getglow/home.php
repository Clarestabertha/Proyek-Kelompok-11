<?php
session_start();
include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap">
    <style>
     .kal1{
    font-family: Butler ;
    text-align: center;
    font-size: 40px;
    color: black;
}
.carousel-item img {
    max-width: none;
    height: 500px;
}
.ulasan {
    display: flex;
    flex-direction: row; /* Menyusun elemen secara vertikal */
    align-items: center; /* Pusatkan secara vertikal */
}

.product {
    display: flex;
    flex-direction: column; /* Menyusun elemen secara vertikal */
    align-items: center; /* Pusatkan secara horizontal dan vertikal */
    margin-left: 200px;
    margin-right: 50px;
}
.product2 {
    display: flex;
    flex-direction: column; /* Menyusun elemen secara vertikal */
    align-items: center; /* Pusatkan secara horizontal dan vertikal */
    margin-right: 200px;
    margin-left: 50px;
}

.image-container {
    display: flex;
    justify-content: center; /* Pusatkan gambar secara horizontal */
    align-items: center; /* Pusatkan gambar secara vertikal */
}

.product img {
    width: 250px; /* Atur lebar maksimum gambar */
}
.product h5{
    margin-top: 20px;
}
.product2 img {
    width: 250px; /* Atur lebar maksimum gambar */
}
.product2 h5{
    margin-top: 20px;
}
.deskripsi{
    display: flex;
    flex-direction: column; /* Menyusun elemen secara vertikal */
    align-items: center; /* Pusatkan secara horizontal dan vertikal */
    margin-left: 10px;
    margin-right: 200px;
}
.deskripsi2{
    display: flex;
    flex-direction: column; /* Menyusun elemen secara vertikal */
    align-items: center; /* Pusatkan secara horizontal dan vertikal */
    margin-right: 10px;
    margin-left: 200px;
}
.navbar {
    height: 60px;
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
.hello{
  font-family: Butler;
  font-size: 25px;
  margin-bottom: 5px;
  text-align: center;
}
.getglow{
  position: absolute; top: 32%; left: 50%; transform: translate(-50%, -50%);
  font-size: 100px;
  font-family: 'Berkshire Swash', cursive;
  color: pink;
}
  /*footer*/
  footer {
      height:240px;
      background: rgb(255, 213, 220);
      
  }
  footer .content {
      margin: 20px;
      text-decoration: none;
      color: var(--light);

  }
  footer .content img {
      width: 25px;
      margin-bottom: 10px;
  }
  .content a { /* Gaya umum untuk link */
      text-decoration: none;
      color: rgb(0, 0, 0);
  }
  .content a:hover {  /* Gaya saat hover pada link */
      color: rgb(0, 0, 0);
      font-weight: bold;
  }
  .content i {/* Gaya untuk ikon */
      display: inline-block;
      margin-right: 5px;
      height: 50px;
  }
  .content i:hover {/* Gaya saat hover pada ikon */
      color: rgb(0, 0, 0);
  }
  /*footer end*/


    @media screen and (max-width: 860px) {
      footer .top {
        flex-direction: column;
      }
    }
    
    /*end*/

    .getglow1{
  position: absolute; top: 45%; left: 7%; transform: translate(-50%, -50%);
  font-size: 25px;
  font-family: 'Berkshire Swash', cursive;
  opacity: 70%;
}
.welcome {
  color: black;
  font-family: 'snell';
  margin-top: 10px;
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

<!-- NavBar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand getglow1" href="#">Getter Glow</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page"  href="?page=home">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Brand
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="?page=bnb">Barenbliss</a></li>
                <li><a class="dropdown-item" href="?page=myb">Maybelline</a></li>
                <li><a class="dropdown-item" href="?page=wrdh">Wardah</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=topreview">Review</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=aboutus">About Us</a>
            </li>
            <li class="nav-item">
                <a href="profil.php">
                  
                <img src='<?php echo $_SESSION['foto']?>' width='45' height='45' class="fotoprofile"></a>                
            </li>
            <li class="nav-item">
                    <p class="welcome";>Welcome, <?php echo $_SESSION['username'];?>!</p>
            </li>
          </ul>
        </div>
      </div>
    </nav>    
    <?php
			error_reporting(E_ALL ^ E_NOTICE AND E_DEPRECATED);
			$page = $_GET['page'];
			switch($page){
        case "home" : include "dashboard.php"; break;
        case "bnb" : include "bnb.php"; break;
        case "myb" : include "myb.php"; break;
        case "wrdh" : include "wardah.php"; break;
        case "review" : include "popup.php"; break;
        case "topreview" : include "reviewuser.php"; break;
        case "aboutus" : include "aboutus.php"; break;
        case "feedback" : include "feedback.php"; break;
        default : include "dashboard.php";
			}
			?>
<!--Footer-->
<footer id="footer" class="footer d-flex flex-column ">
  <div class="top d-flex justify-content-sm-around ">
    <div class="content d-flex flex-column ">
      <h4>Thank you for visiting our website</h4>
      <a href="index.php">
        <i class="fa fa-arrow-circle-right "></i> Home
      </a>
      <a href="login.php">
        <i class="fa fa-arrow-circle-right "></i> Login
      </a>
    </div>
    <div class="content d-flex flex-column ">
      <a href="?page=topreview">
        <i class="fa fa-arrow-circle-right "></i> Review
      </a>
      <a href="?page=aboutus">
        <i class="fa fa-arrow-circle-right "></i> About Us
      </a>
    </div>
    <div class="content d-flex flex-column ">
      <h4>Find Us</h4>
      <a href=" " rel="noopener noreferrer " target="_blank ">
        <i class="fas fa-envelope "><img src="img/ig.png"></i>@getter_glow
      </a>
      <a href=" " rel="noopener noreferrer " target="_blank ">
        <i class="fas fa-envelope "><img src="img/gmail.png"></i>getter_glow@gmail.com
      </a>
      <a href=" " rel="noopener noreferrer " target="_blank ">
        <i class="fas fa-envelope "><img src="img/yt.png"></i>getter_glow
      </a>
    </div>
  </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>