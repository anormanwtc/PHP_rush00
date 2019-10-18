<?php
  include_once("../Resources/login_header.php");
  include_once("../Resources/archive_order.php");
  include_once(("../Resources/cart_add.php"));
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
      <form method="POST" action="store.php">
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
  if($error){ //login errors
    echo '<div class="errorbody">' . '<div>' .$error. '</div>' . '</div>';
    header("Refresh:3");
  }else{
   echo'
    <div class="cartbody" style="padding-top: 50px">
    <div class="form">
        <div class="form-section">
            <div class="section-header">
                <p align="center">-- Your Cart --</p>
            </div>
            
            <div class="items">';
            $cart_data = unserialize(file_get_contents("../Resources/database/carts"));
            echo'
            <table style="width:100%">
                <tr>
                  <th>Item</th>
                  <th>Quantity</th>
                  <th>Price</th>
                </tr>';
            $total = 0;
            foreach ($cart_data as $cart){
              if ($cart['user'] == $_SESSION['user']) {
                foreach($cart['list'] as $key => $item) {
                  echo '
                  <tr>
                    <td>' .
                    $item .
                    '</td>
                    <td style="text-align:center"><span> X </span>'. $cart['quantity'][$key] . '</td>
                    <td><span>R </span>'. ($cart['quantity'][$key] * $cart['price'][$key]) .'</td>
                  </tr>';
                  $total += ($cart['quantity'][$key] * $cart['price'][$key]);
                }
              }
            }
           echo'
            <tr>
              <td colspan="2" style="text-align:right">Total</td>
              <td>';
              echo'R ' . "$total";
              echo'
              </td>
            </tr>
          </table>';
          if($_SESSION['user'] == ""){
            echo'
            <div style="text-align: center; margin-top:30px">
              Please login to checkout!
            </div>';
          }else{
            echo'
            <div style="float: right; padding-top:20px">
              <form method="POST" class="Checkout">
                <button align="right" type="submit" name="checkout" value="OK">Checkout</button>
              </form>
            </div>
            <div style="float: right; padding-top:20px">
              <form method="POST" class="Checkout">
                <button align="right" type="submit" name="empty" value="OK">Empty</button>
              </form>
            </div>
            ';
          }
      echo' </div>
        </div>
    </div>
</div>';
  }
?>
<?php 
  if ($_POST['checkout'] == 'OK' && $_SESSION['user']) {
    archive_cart($_SESSION['user']);
    echo '<p align="center">Thanks for being cheesy<br/> Purchase Complete</p>';
    header("refresh:1");
  }
  if ($_POST['empty'] == 'OK') {
    remove_cart($_SESSION['user']);
    echo '<p align="center">Your cheese stays with us then!<br/> Deletion Complete</p>';
    header("refresh:1");
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