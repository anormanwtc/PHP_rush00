<?php
	//needs work
	//adding items
	function add_item ($item, $catagory, $desc, $img, $price) {
		if (file_exists('../Resources/database/items'))
		{
			$item_data = unserialize(file_get_contents('../Resources/database/items'));
			foreach($item_data['item'] as $existing) {
				if ($item == $existing['name'])
					return "pre-existing";
			}
		}
		$new['name'] = $item;
		$new['cata'][] = $catagory;
		$new['desc'] = $desc;
		$new['img'] = $img;
		$new['price'] = $price;
		$item_data['item'][] = $new;
		file_put_contents('../Resources/database/items', serialize($item_data));
		return $item_data;
	}
	function mod_item($item, $catagory, $desc, $img, $price) {
		if (file_exists('../Resources/database/items'))
		{
			$item_data = unserialize(file_get_contents('../Resources/database/items'));
			foreach($item_data['item'] as $key => $existing) {
				if ($item == $existing['name']) {
		
					if ($catagory) {
						foreach($existing['cata'] as $check) {
							if ($check == $catagory)
								$found = 1;
						}
					}
					if (!$found)
						$item_data['item'][$key]['cata'][] = $catagory;
					if ($desc)
						$item_data['item'][$key]['desc'] = $desc;
					if ($img)
						$item_data['item'][$key]['img'] = $img;
					if ($price)
						$item_data['item'][$key]['price'] = $price;
				}
			}
		}
		file_put_contents('../Resources/database/items', serialize($item_data));
		return $item_data;
	}
	//deleting items
	function remove_item ($item) {
		if (file_exists('../Resources/database/items'))
		{
			$item_data = unserialize(file_get_contents('../Resources/database/items'));
			foreach($item_data['item'] as $key => $existing) {
				if ($item == $existing['name'])
					unset($item_data['item'][$key]);
			}
		file_put_contents('../Resources/database/items', serialize($item_data));
		}
		return ($item_data);
	}
?>