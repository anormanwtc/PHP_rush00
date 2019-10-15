<?php
	function test () {
		include("cart_add.php");
		session_start();		
		$item = "test";
		echo '<form method="POST" class="login">
		<input type="text" placeholder="Quantity" name="quantity">
		<input type="text" placeholder="Item" name="item">
		<button type="submit" name="add" value="OK">Add to cart</button>
	</form>';
	if ($_POST['add'] == 'OK') {
		remove_cart($_SESSION['user']);
		$res = find_cart($_SESSION['user']);
		print_r($res);
		echo "Cart";
	}
	else
		echo "wat";
}
?>