<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
<style>
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
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      width: 60%;
      height: 80%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .understand{
      background-color: #fff;
      border-color: pink;
      color: pink;
      border-radius: 10px;
    }
    .understand:hover{
      background-color: pink;
      border-color: pink;
      color: white;
      border-radius: 10px;
    }
    .todo{
      font-family: 'Poppins', sans-serif;
      font-size: 30px;
      color: pink;
      font-weight: bold;
    }
</style>

<!--Konten-->
<div style="display: flex; align-items: center;">
<img src="img/staff.jpg" class="gambarstaff">
    <?php 
        $sql="select *from akun";
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array(mysqli_query($conn,"select *from akun where id_akun='$idhome'"));
    ?>
    <div style="margin-left:100px">
    <h1></h1>
        <h2>Welcome <?php echo $_SESSION['username'];?>!</h2><br>
        <p>Welcome to our Staff Homepage! Here, you'll find the tools and resources you need to support your daily operations. Continue your efforts and make every day an opportunity to make your best contribution to the Company's success.</p>
        <button type="button" class="btn btn-outline-danger" onclick="showCustomBox()">Learn More</button><a>
      </div>
</div>

<!-- custom box -->
<div class="overlay" id="customBoxOverlay" onclick="hideCustomBox()">
    <div class="custom-box">
      <p class="todo">What to Do?</p>
      <p>
1. Add a new brand to the database<br>
2. Add new products to the database by connecting them with the appropriate brand<br>
3. Add details in the form of product launch date to connect the product with the brand<br>
4. Edit brands and products if there are data changes<br>
5. Monitor reviews given by users<br>
6. If there is a review that violates the rules, staff must delete it for everyone's convenience<br><br>

Conditions for Deleting Reviews:<br>
1. If the review contains harsh words<br>
2. If the review is completely unrelated to the product being reviewed<br>
3. If the review touches on sensitive matters<br><br><br>

</p>
      <a href="staff.php"><input type="submit" class="understand" value="Understand"></a>
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

