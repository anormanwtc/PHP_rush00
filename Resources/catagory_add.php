<?php
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
	//deleting catagory
	function rm_catagory($catagory) {
		if (file_exists('../Resources/database/items'))
		{
			$item_data = unserialize(file_get_contents('../Resources/database/items'));
			foreach ($item_data['cata'] as $key => $current)
			{
				if ($current == $catagory) {
					unset($item_data['cata'][$key]);
					break;
				}
			}
		}
		file_put_contents('../Resources/database/items', serialize($item_data));
	}
	function list_catagory() {
		$data = unserialize(file_get_contents("../Resources/database/items"));
			foreach ($data['cata'] as $set){
              echo $set . '<br />';
          }
	}
?>