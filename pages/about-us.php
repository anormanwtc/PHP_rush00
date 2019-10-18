<?php
  include_once("../Resources/login_header.php");
  include_once("../Resources/cart_add.php");
  session_start();
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
  <div class="cart">
      <a href="../pages/cart.php" >
      <div style="float: left; padding-right: 5px">
      <img src="../resources/images/cart.jpg" alt="cart" height="20px" width="auto">
      </a>
      </div>
        <?php $totals = find_cart($_SESSION['user'], '..');
          printf("<figcaption>%d items at R %d</figcaption>", $totals['quantity'], $totals['price']);?>
    </div>
</div>
</div>
<div class="navbar">
  <a href="../index.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn"><a class="store" href="./store.php"> Cheese Store </a>
    </button>
    <div class="dropdown-content">
      <form method="POST" action="../pages/store.php">
      <?php
       $item_data = unserialize(file_get_contents("../Resources/database/items"));
       foreach($item_data['cata'] as $set){
          echo'
          <input type="submit" name="redirect" value="' . $set . '" style="width: 100%; text-align: center"></input>';
       }
        ?>
      </form>
    </div>
  </div>
  <a href="../pages/about-us.php">About Us</a>
  <a href="../pages/contact-us.php">Contact Us</a>
  <div class="login-container">
    
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
    echo'<div class="about-usbody">
    <div class="person">
        <div class="img">
            <a href="https://www.linkedin.com/in/alistair-norman-5b9385192/" target="_blank" title="Check out my linkedin!">
            <img src="../resources/images/Alistair.png" alt="cheesy alistair">
            </a>
        </div>
        <div class="text">
            <p class="name" align="center">
               <b>Alistair Norman</b>
            </p>
            <p class="text" align="center">Alistair is a super cool dude. He loves cheese as much as the next guy. He is the absolute best... at cheese and all cheese related things<br><br> Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Dolorum corrupti officiis libero aut assumenda! Voluptatibus numquam
                optio quo magnam ab sapiente maiores?
                Officiis, quisquam debitis.</p>
        </div>
    </div>
    <div class="person">
        <div class="img">
            <a href="https://www.linkedin.com/in/ryan-hutchinson-a9b1a3193/" target="_blank" title="Check out my linkedin!">
            <img src="../resources/images/Ryan.jpg" alt="cheesy alistair" width="225px" height="225px">
            </a>
        </div>
        <div class="text">
            <p class="name" align="center">
               <b>Ryan Hutchinson</b>
            </p>
            <p class="text" align="center">Ryan, at this point, is basically cheese. His motto is Eat cheese, code cheese, sleep cheese, reapeat cheese... man he loves him some cheese. <br><br> Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Dolorum corrupti officiis libero aut assumenda! Voluptatibus numquam
                optio quo magnam ab sapiente maiores?
                Officiis, quisquam debitis.</p>
        </div>
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