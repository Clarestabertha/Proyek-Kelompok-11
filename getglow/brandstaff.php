<?php
include "koneksi.php";

// Delete
$id = isset($_GET['id_brand']) ? $_GET['id_brand'] : "";
if ($id != "") {
    $row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM brand WHERE id_brand='$id'"));
    $gambar = $row['logo'];
    unlink($gambar);
    $delete = "DELETE FROM brand WHERE id_brand='$id'";
    $query = mysqli_query($conn, $delete);
    if ($query) {
        echo "<script>
                alert('Brand successfully deleted!');
                window.location.href = 'staff.php?page=brand';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Brand</title>
    <style>
        table {
            border-collapse: collapse;
            background-color: rgb(255, 245, 245);
            text-align: center;
            width: 70%;
        }
        th {
            padding: 8px;
            justify-content: center;
            align-items: center;
            border-bottom: 1px solid black;
        }
        td {
            padding: 8px;
            justify-content: center;
            align-items: center;
        }
        td:nth-child(7) {
            width: 20%;
        }
        .submit {
            background-color: white;
            padding: 5px;
            border-radius: 20px;
            border: 1px solid pink;
            color: pink;
            text-decoration: none;
        }
        .submit:hover {
            background-color: pink;
            color: white;
        }
    </style>
    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this brand?")) {
                window.location.href = 'brandstaff.php?id_brand=' + id;
            }
        }
    </script>
</head>
<body>
    <center>
        <h3>&nbsp;</h3>
        <h1>BRAND</h1><br>
        <p><a href='staff.php?page=insertbrand' class="submit">Insert Data</a></p><h6>&nbsp;</h6>

        <table>
            <tr>
                <th>NO</th>
                <th>BRAND ID</th>
                <th>BRAND NAME</th>
                <th>CITIZENSHIP</th>
                <th>TAGLINE</th>
                <th>LOGO</th>
                <th>ACTION</th>
            </tr>
            <?php
            $no = 1;
            $sql = "SELECT * FROM brand";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)) {
                echo "
                <tr>
                    <td>$no</td>
                    <td>$row[id_brand]</td>
                    <td>$row[nama_brand]</td>
                    <td>$row[citizenship]</td>
                    <td>$row[tagline]</td>
                    <td><img src='$row[logo]' height='70'></td>
                    <td>
                        <a href='?page=updatebrand&id=$row[id_brand]' class='submit'>Update</a>
                        <a href='javascript:void(0)' onclick='confirmDelete(\"$row[id_brand]\")' class='submit'>Delete</a>
                    </td>
                </tr>
                ";
                $no++;
            }
            ?>
        </table>
    </center>
</body>
<h2>&nbsp;</h2>
<h2>&nbsp;</h2>
</html>
