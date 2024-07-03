<?php
include "koneksi.php";
$nipup=$_GET['id'];

if(isset($_POST['update'])){
    $id_brand=$_POST['id_brand'];
    $nama_brand=$_POST['nama_brand'];
    $citizenship=$_POST['citizenship'];
    $tagline=$_POST['tagline'];
    $logo=$_FILES['logo']['name'];
    $file_tmp = $_FILES['logo']['tmp_name'];
    $up = 'brand/' . $logo;

        if (move_uploaded_file($file_tmp, $up)) {
            $update = "update brand set nama_brand='$nama_brand',citizenship='$citizenship',tagline='$tagline',logo='$up' where id_brand='$id_brand' ";
        }else{
            $update = "update brand set nama_brand='$nama_brand',citizenship='$citizenship',tagline='$tagline' where id_brand='$id_brand' ";
        }
            $query = mysqli_query($conn, $update);
        if($query){
        ?>
        <script>
            alert("The Brand has been successfully updated");
            document.location="staff.php?page=brand";
        </script>
        <?php
        } else {
            echo "Gagal mengunggah file.";
        }
    } 

$row=mysqli_fetch_array(mysqli_query($conn,"select *from brand where id_brand='$nipup'"));
if($row['id_brand']!=""){
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Brand</title>
        <style>
        body{
            text-align:center;
            align-items:center;
        }
        .container {
        width:55%;
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
    .input{
        width: 250px; /* Sesuaikan dengan ukuran yang Anda inginkan */
        padding: 5px; /* Sesuaikan dengan padding yang Anda inginkan */
        border-radius: 10px; /* Mengatur sudut menjadi tumpul */
        border: 2px solid #ccc; /* Mengatur border dengan ketebalan 1px */
    }
    .submit{
        width: 265px;
        background-color: pink;
        padding: 5px; 
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
        color:pink;
    }
    </style>
    </head>
<body>
    <br><br><br>
<h1>Update Brand</h1>
<p><a href='staff.php?page=brand' class="link">Cancel</a></p><br>
<form action='<?php $_SERVER['PHP_SELF']; ?>' name='updatebrand' method='post' enctype='multipart/form-data'>
<div class="container">
    <div class="left-div">
    <table>
    <tr>
    <td><img src='<?php echo $row['logo'];?>' width='250'><br></td>
</tr>
<tr>
    <td><input type='file' name='logo'/></td>
</tr>
</table>
</div>
    <div class="right-div">
    <table align='center'>
        <tr>
            <td>Brand Id</td>
            <td><input type='text' name='id_brand' value='<?php echo $row['id_brand'];?>' readonly class="input"></td>
        </tr>
        <tr>
            <td>Brand Name</td>
            <td><input type='text' name='nama_brand' value='<?php echo $row['nama_brand'];?>' readonly class="input"></td>
        </tr>
        <tr>
            <td>Citizenship</td>
            <td><input type='text' name='citizenship' value='<?php echo $row['citizenship'];?>' class="input"></td>
        </tr>
        <tr>
            <td>Tagline</td>
            <td><textarea name='tagline' class="input"><?php echo $row['tagline'];?></textarea></td>
        </tr>

        <tr>
            <td></td>
            <td><input type='submit' name='update' value='SAVE' class="submit"> </td>
        </tr>
    </table>
</form>
    <?php
}

?>
</div>
</div>
<h1>&nbsp;</h1>
<h1>&nbsp;</h1>
</body>
</html>