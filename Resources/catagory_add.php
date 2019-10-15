<?php
	//adding items
	function add_item_to ($item, $value, $catagory) {
		if (file_exists('../Resources/database/items'))
			$item_data = unserialize(file_get_contents('../Resources/database/items'));
		$thing['item'] = $item;
		$thing['value'] = $value;
		$item['cat'] = $catagory;
		$item_data[] = $thing;
		file_put_contents('../Resources/database/items', serialize($item_data));
	}
	function add_catagory($catagory) {
		if (file_exists('../Resources/database/items'))
		{
			$item_data = unserialize(file_get_contents('../Resources/database/items'));
			foreach ($item_data['cata'] as $current)
			{
				if ($current == $catagory) {
					return "pre-existing";
				}
			}
		}
		$item_data['cata'][] = $catagory;
		file_put_contents('../Resources/database/items', serialize($item_data));
	}
	//deleting items
	function remove_item_from($item, $catagory) {
		if (file_exists('../Resources/database/items'))
		{
			$item_data = unserialize(file_get_contents('../Resources/database/items'));
			foreach ($item_data as $key => $thing)
			{
				if ($thing['item'] === $item) {
					unset($item_data[$key]);
					break;
				}
			}
			file_put_contents('../Resources/database/items', serialize($item_data));
		}
	}
?>