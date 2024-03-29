<?php
include_once("cart_add.php");
function ft_register($username, $password, $path) {
	session_start();
	if ($username == '' || $password == '') { //error no input
		return '<p align="center">Please enter a Username & Password!</p><p class="redirect" align="center">If you are not redirected please click <a href="./index.php">HERE</a></p>';
	}
	if (!file_exists("$path/Resources/database"))
		mkdir("$path/Resources/database");
	if (file_exists("$path/Resources/database/users"))
	{
		$user_data = unserialize(file_get_contents("$path/Resources/database/users"));
		foreach ($user_data as $user)
		{
			if ($user['user'] === $username) { //error Username taken
				return '<p align="center">Username taken!!</p><p class="redirect" align="center">If you are not redirected please click <a href="./index.php">HERE</a></p>';
			}
		}
	}
	$new['user'] = $username;
	$new['passwd'] = hash('whirlpool', $password);
	$user_data[] = $new;
	file_put_contents("$path/Resources/database/users", serialize($user_data));
	$_SESSION['user'] = $username;
}

function ft_login($username, $password, $path) {
	if ($username == '' || $password == '') { //error no input
		return '<p align="center">Please enter a Username & Password!</p><p class="redirect" align="center">If you are not redirected please click <a href="./index.php">HERE</a></p>';
	}
	$user_data = unserialize(file_get_contents("$path/Resources/database/users"));
	foreach ($user_data as $user)
	{
		if ($user['user'] == $username) {
			if ($user['passwd'] == hash('whirlpool', $password))
			{
				cart_merge($username, $path);
				$_SESSION['user'] = $username;
				return; //success
			}
			else
				break;
		}
	} //error invalid combo
	return '<p align="center">Invalid Username & Password combination!</p><p class="redirect" align="center">If you are not redirected please click <a href="./index.php">HERE</a></p>';
}
function ft_delete_user($username, $path) {
	if (file_exists("$path/Resources/database/users"))
	{
		$user_data = unserialize(file_get_contents("$path/Resources/database/users"));
		foreach ($user_data as $key => $user)
		{
			if ($user['user'] === $username) {
				unset($user_data[$key]);
			}
		}
	}
	file_put_contents("$path/Resources/database/users", serialize($user_data));
}
?>