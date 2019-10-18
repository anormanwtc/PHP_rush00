<?php
//finding cart
	function find_cart($username, $path) {
		if (file_exists("$path/Resources/database/carts"))
		{
			$user_data = unserialize(file_get_contents("$path/Resources/database/carts"));
			foreach ($user_data as $cart)
			{
				if ($cart['user'] == $username) {
					foreach($cart['quantity'] as $key => $quan) {
						$total['quantity'] += $quan;
						$total['price'] += ($quan * $cart['price'][$key]);
					}
					return $total;
				}
			}
		}
	}

	//adding items
	function add_to_cart ($username, $item, $quantity, $price, $path) {
		$user_data = unserialize(file_get_contents("$path/Resources/database/carts"));
		foreach ($user_data as &$cart)
		{
			if ($cart['user'] == $username) {
				foreach ($cart['list'] as $key => $thing) { //looking for preexisting items
					if ($thing == $item) {
						$cart['quantity'][$key] = $quantity;
						$found = 1;
					}
				}
				if (!$found) { //if new item
					$cart['list'][] = $item;
					$cart['quantity'][] = $quantity;
					$cart['price'][] = $price;
				}
				$found = 1;
				break;
			}
		}
		if (!$found) { //if new cart
			$new['user'] = $username;
			$new['list'][] = $item;
			$new['quantity'][] = $quantity;
			$new['price'][] = $price;
			$user_data[] = $new;
		}
		file_put_contents("$path/Resources/database/carts", serialize($user_data));
	}

	//deleting items
	function remove_from_cart($user, $item) {
		if (file_exists('../Resources/database/carts'))
		{
			$data = unserialize(file_get_contents('../Resources/database/carts'));
			foreach ($data as $usercart => $cart)
			{
				if ($cart['user'] == $username) {
					foreach($cart['list'] as $key => $selected) {
						if ($selected == $item) {
							unset($data[$usercart]['list'][$key]);
							unset($data[$usercart]['quantity'][$key]);
							unset($data[$usercart]['price'][$key]);
							break;
						}
					}
					break;
				}
			}
			file_put_contents('../Resources/database/carts', serialize($data));
		}
	}
	function remove_cart($user) {
		if (file_exists('../Resources/database/carts'))
		{
			$user_data = unserialize(file_get_contents('../Resources/database/carts'));
			foreach ($user_data as $key => $cart)
			{
				if ($cart['user'] == $user) {
					unset($user_data[$key]);
				}
			}
			file_put_contents('../Resources/database/carts', serialize($user_data));
		}
	}
	function cart_merge($user, $path) {
		if (file_exists('../Resources/database/carts'))
		{
			$user_data = unserialize(file_get_contents('../Resources/database/carts'));
			foreach ($user_data as $key => $cart)
			{
				if (!$cart['user']) {
					foreach($cart['list'] as $key => $item) {
						add_to_cart($user, $item, $cart['quantity'][$key], $cart['price'][$key], $path);
					}
					remove_cart('');
					break;
				}
			}
		}
	}
?>