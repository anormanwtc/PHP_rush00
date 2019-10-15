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
    if($error == '<p align="center">Invalid Username & Password combination!</p><p class="redirect" align="center">If you are not redirected please click <a href="./index.php">HERE</a></p>'){
      echo '<div class="errorbody">' . '<div>' .$error. '</div>' . '</div>';
      header("Refresh:3");
    }elseif($error == '<p align="center">Username taken!!</p><p class="redirect" align="center">If you are not redirected please click <a href="./index.php">HERE</a></p>'){
      echo '<div class="errorbody">' . '<div>' .$error. '</div>' . '</div>';
      header("Refresh:3");
    }elseif($error == '<p align="center">Please enter a Username & Password!</p><p class="redirect" align="center">If you are not redirected please click <a href="./index.php">HERE</a></p>'){
      echo '<div class="errorbody">' . '<div>' .$error. '</div>' . '</div>';
      header("Refresh:3");
    }else{
      echo'<div class="contact-usbody">
              <div class="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.741885834625!2d28.03798821558252!3d-26.205073483437488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e950ea2272f1561%3A0x77a3e32d421bda49!2sWeThinkCode_!5e0!3m2!1sen!2sza!4v1571052003167!5m2!1sen!2sza" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
              </div>
              <div class="address">
                <div><i class="fas fa-map-marker-alt"></i>  84 Albertina Sisulu Rd, Johannesberg</div>
                <br>
                <div><i class="far fa-envelope"></i></i>  sales@cheeseworld.co.za</div>
                <br>
                <div><i class="fas fa-phone"></i>  0800 WENEEDCHEESE</div>
                <br>
                <br>
                <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab at saepe quasi omnis, obcaecati corporis recusandae dolorem minima, reiciendis molestias blanditiis quia pariatur cumque perspiciatis repudiandae in ea, quis odit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab eum, natus adipisci dignissimos voluptatibus ex cum explicabo tempora nisi repudiandae delectus dicta maiores ea. Sequi ex dolorem in obcaecati nostrum.</div>
              </div>
          </div>';
    }
    ?>
<div class="footer">
    <div>
        <div style="padding-top: 5px;">Designed, implemented, cried about, and loved by Alistair Norman & Ryan Hutchinson</div>
        <div style="font-size: 12px;padding-top: 4px">--powered by vanilla html, css, php--</div>
    </div>
</div>
</body>
</html>