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
    <!-- <div class="cart">
      <a href="../pages/cart.php" >
        <img src="../resources/images/cart.jpg" alt="cart" height="20px" width="auto">
      </a>
    </div> -->
    <?php $error = logincheck('..'); echo '
  </div>
</div>';
echo '<br /><div style="align:right">' .$error. '</div>';
?>
<?php
echo'<div class="homebody">';
echo'<div class="productrow">';
$item_data = unserialize(file_get_contents("../Resources/database/items"));
foreach($item_data['item'] as $set){
    foreach($set['cata'] as $cata) {
      if ($cata == $_POST['redirect']) {
        echo'<div class="product">
              <div class="img">
                <img src="..' . $set['img'] . '">
              </div>
              <div class="text">
                  <p class="name" align="center">
                    <b>' . $set['name'] . '</b>
                  </p>
                  <p class="details" align="center">
                    ' . $set['desc'] . '
                  </p>
              </div>
              <div style="padding: 10px">

              <div style="margin:5px float: left">Price: R ' . $set['price'] . '</div>
              <div style="padding:5px font-size:10px"><span style="font-size:12px">Amount</span>' . 
                '<form method="POST" class="login" style="">
                  <input type="number" placeholder="0" name="amount">
                  <input type="hidden" name="redirect" value="'.$_POST['redirect'].'">
                  <input type="hidden" name="price" value="'.$set['price'].'">
                  <button type="submit" name="addtocart" value="'.$set['name'].'">Add to cart</button>
                  </form>' .
                '</div>
                <div></div>
              </div>
            </div>';
        break;
      }
    }
    if ($_POST['addtocart'] && $_POST['amount'] >= '0') {
      add_to_cart ($_SESSION['user'], $_POST['addtocart'], $_POST['amount'], $_POST['price'], '..');
    }
  }
  echo'</div>';
  echo'</div>';    
?>
<div class="footer">
    <div>
        <div style="padding-top: 5px;">Designed, implemented, cried about, and loved by Alistair Norman & Ryan Hutchinson</div>
        <div style="font-size: 12px;padding-top: 4px">--powered by vanilla html, css, php--</div>
    </div>
</div>
</body>
</html>