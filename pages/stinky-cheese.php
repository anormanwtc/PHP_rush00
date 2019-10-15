<?php
  include("../Resources/login_header.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="expires" content="0">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../Resources/css/style.css">
<script src="https://kit.fontawesome.com/a7c1b87e06.js" crossorigin="anonymous"></script>
<body>
<div class=headerbox>
  <div class="headerlogo">
      <a href="../index.php">
        <img src="../Resources/images/logo.png" alt="cheese" height="70" width="auto">
    </a>
  </div>
  <div class="headertext">
    <span>Cheeseworld Pty. Ltd.</span>
  </div>
</div>
<div class="navbar">
  <a href="../index.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn"><a class="store" href="../pages/store-catagories.php"> Cheese Store </a>
      <i class="" href="http://www.google.com"></i>
    </button>
    <div class="dropdown-content">
      <a href="../pages/stinky-cheese.php">Stinky Cheese</a>
      <a href="../pages/processed-cheese.php">Processed Cheese</a>
      <a href="../pages/weird-cheese.php">Weird Cheese</a>
    </div>
  </div>
  <a href="../pages/about-us.php">About Us</a>
  <a href="../pages/contact-us.php">Contact Us</a>
  <div class="login-container">
    <div class="cart">
      <a href="../pages/cart.php" >
        <img src="../resources/images/cart.jpg" alt="cart" height="20px" width="auto">
      </a>
    </div>
    <?php $error = logincheck('..'); echo '
  </div>
</div>';
echo '<br /><div style="align:right">' .$error. '</div>';
?>
<div class="catagorybody">
   <p>TODO</p>
</div>
<div class="footer">
    <div>
        <div style="padding-top: 5px;">Designed, implemented, cried about, and loved by Alistair Norman & Ryan Hutchinson</div>
        <div style="font-size: 12px;padding-top: 4px">--powered by vanilla html, css, php--</div>
    </div>
</div>
</body>
</html>