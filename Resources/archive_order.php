<?php
	include_once('../Resources/cart_add.php');
	function archive_cart ($username) {
		if (!file_exists('../archives'))
			mkdir('../archives');
		while (file_exists("../archives/$username$num"))
			$num++;
		$user_data = unserialize(file_get_contents('../Resources/database/carts'));
		foreach ($user_data as $key => $cart)
		{
			if ($cart['user'] == $username) {
				file_put_contents("../archives/$username$num", serialize($cart));
				remove_cart($username);
				unset($user_data[$key]);
				file_put_contents("../Resources/database/carts", serialize($user_data));
				return;
			}
		}
	}

?>