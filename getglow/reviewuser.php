<?php
session_start();
include "koneksi.php";
?>
<html>
    <head>
        <title>Top Review</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">

        <style>
            body {
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .container{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin-bottom: 100px;
            }
            table {
                border-collapse: collapse;
                width: 65%;
                align-items: center;
            }
            td {
                padding: 8px;
            }
            td:nth-child(2) {
                width: 70%;
            }
            td:nth-child(1){
                height: 80px;
                justify-content: center;
                align-items: center;
            }
            .photo{
                width: 150px;
                margin-left: 30px;
            }
            .header{
                font-family: 'Poppins', sans-serif; 
                font-size: 40px;
                color: pink;
                font-weight: bold;
            }
            .nama{
                font-family: 'Poppins', sans-serif; 
                font-size: 15px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <br><br>
        <div class="container">
            <p class="header">Latest Review<p><br>
        <?php
       $sql = "SELECT * FROM akun
       INNER JOIN ulasan ON akun.id_akun = ulasan.id_akun
       INNER JOIN produk_brand ON ulasan.tgl_launching = produk_brand.tgl_launching 
       INNER JOIN produk ON produk_brand.id_produk = produk.id_produk
       INNER JOIN brand ON brand.id_brand = produk.id_brand
       ORDER BY ulasan.no_ulasan DESC";


        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($query)) {
            echo "
            <table>
            <tr>
              <td align-items='center'><img src='{$row['foto_produk']}' alt='Product Image' class='photo'></td>
              <td><b>{$row['username']}</b><br>Ratting : {$row['rating']}/5<br><i>what do they say?</i><br>{$row['ulasan']}</td>
            </tr>
            <tr>
              <td class='nama'>{$row['nama_produk']}</td>
            </tr>
            <tr>
               <td>&nbsp;</td>
            <tr>
            </table>";
        }
        ?>
        </div>
    </body>
</html>