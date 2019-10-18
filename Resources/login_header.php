<?php
function logincheck($path) {
	include_once("$path/Resources/login_action.php");
	session_start();
	if ($_SESSION['user'] && $_SESSION['user'] !== "")
	{
		echo '
		<form method="POST" class="logout">
			<p> Welcome ' . $_SESSION['user'] .
			'<button type="submit" name="logout" value="OK">Logout</button>
			<button type="submit" name="delete" value="Kill">Delete account</button>
		</form>';
		if ($_POST['logout'] == 'OK') {
			$_SESSION['user'] = "";
			header("Refresh:0");
		}
		if ($_POST['delete'] == 'Kill' && $_SESSION['user'] !== 'admin') {
			$res = ft_delete_user($_SESSION['user'], $path);
			$_SESSION['user'] = "";
			header("Refresh:0");
		}
		if ($_POST['delete'] == 'Kill' && $_SESSION['user'] == 'admin')
			return "cannot delete admin";
		
	}
	else
	{
		echo '
		<form method="POST" class="login">
			<input type="text" placeholder="Username" name="user">
			<input type="password" placeholder="Password" name="passwd">
			<button type="submit" name="register" value="Add">Register</button>
			<button type="submit" name="login" value="OK">Login</button>
		</form>';
		if ($_POST['login'] == 'OK') {
			if (!$res = ft_login($_POST['user'], $_POST['passwd'], $path))
				header("Refresh:0");
			else
				return $res;
			
		}
		if ($_POST['register'] == 'Add') {
			if (!$res = ft_register($_POST['user'], $_POST['passwd'], $path))
				header("Refresh:0");
			else
				return $res;
		}
		if ($_SESSION['user'] == 'admin')
			header("Location:$path/pages/admin.php");
	}
}
?>