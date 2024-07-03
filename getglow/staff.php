<?php
session_start();
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap">

    <style>
body {}
.navbar {
    background-color: rgb(255, 213, 220) !important; 
    height: 60px;

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
/*gambar staff*/
.gambarstaff{
  width:500px;
  height:500px;
  margin-top:15px;
  margin-bottom:100px;
  margin-left:100px;
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

.getglow1{
  position: absolute; top: 45%; left: 7%; transform: translate(-50%, -50%);
  font-size: 25px;
  font-family: 'Berkshire Swash', cursive;
  opacity: 70%;
}

  @media screen and (max-width: 860px) {
    footer .top {
      flex-direction: column;
    }
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
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand getglow1" href="#">Getter Glow</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link" href="staff.php?page=home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="staff.php?page=brand">Brand</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="staff.php?page=produk">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="staff.php?page=viewpb">Detail</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="staff.php?page=review">Review</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="staff.php?page=aboutus">About Us</a>
            </li>
            <li class="nav-item">
                <a href="profil.php"><img src='<?php echo $_SESSION['foto'];?>' width='45' height='45' class="fotoprofile"></a>                
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <?php
			error_reporting(E_ALL ^ E_NOTICE AND E_DEPRECATED);
			$page = $_GET['page'];
			switch($page){
        case "home" : include "homestaff.php"; break;
				case "brand" : include "brandstaff.php"; break;
        case"insertbrand" : include "insertbrand.php";break;
        case"updatebrand" : include "updatebrand.php";break;
        case"produk" : include "produkstaff.php";break;
        case "brand" : include "brandstaff.php"; break;
        case"insertproduk" : include "insertproduk.php";break;
        case"updateproduk" : include "updateproduk.php";break;
        case"produkbrand" : include "insertpb.php";break;
        case"viewpb" : include "produkbrand.php";break;
        case"updatepb" : include "updatepb.php";break;
        case"review" : include "review.php";break;
        case"aboutus" : include "aboutus.php";break;
        case"feedback" : include "feedback.php";break;
        default : include "homestaff.php";
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
      <a href="?page=feedback">
        <i class="fa fa-arrow-circle-right "></i> Feedback
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