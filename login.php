<?php
$username = null;
$password = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require_once('database.php');

	if(!empty($_POST["username"]) && !empty($_POST["password"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		$query = $connection->prepare("SELECT `user_id` FROM `users` WHERE `user_login` = ? and `user_password` = PASSWORD(?)");
		$query->bind_param("ss", $username, $password);
		$query->execute();
		$query->bind_result($userid);
		$query->fetch();
		$query->close();

		if(!empty($userid)) {
			session_start();
			$session_key = session_id();

			$query = $connection->prepare("INSERT INTO `sessions` ( `user_id`, `session_key`, `session_address`, `session_useragent`, `session_expires`) VALUES ( ?, ?, ?, ?, DATE_ADD(NOW(),INTERVAL 1 HOUR) );");
			$query->bind_param("isss", $userid, $session_key, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'] );
			$query->execute();
			$query->close();

			header('Location: index.php');
		}
		else {
			header('Location: login.php');
		}

	} else {
		header('Location: login.php');
	}
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Login</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
	<link href="assets/css/gsdk.css" rel="stylesheet" />
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Font Awesome     -->
    <link href="bootstrap3/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="page">
	<!-- [banner] -->
	<header id="banner">
		<hgroup>
			<h1>Login</h1>
		</hgroup>
	</header>
	<!-- [content] -->
	<section id="content">
		<table>
		<form id="login" method="post">
			<tr>
				<td>
					<label for="username">Username:</label>
				</td>
				<td>
					<input id="username" name="username" type="text" required>
				</td>
			</tr>
			<tr>
				<td>
					<label for="password">Password:</label>
				</td>
				<td>
					<input id="password" name="password" type="password" required>
				</td>
			</tr>
			<tr>
				<td colspan=2>
					<button type="submit" value="Login" class="btn btn-block btn-sm btn-info btn-fill">Login</button>
				</td>
			</tr>
		</form>
	</table>
	</section>
	<!-- [/content] -->
</div>
<script src="login.js"></script>
<!-- [/page] -->
</body>
</html>
<?php } ?>
