<?php
if (!isset($_GET['lang'])) {
	header('Location: '.$_SERVER['REQUEST_URI'] . '?lang=en');
	die();
}
$lang = $_GET['lang'];
?>

<html>
	<head>
		<title>My Blog (WIP)</title>
		<style>
			#header {
				background-color: #ff0;
				width: 100%;
				text-align: center;
				padding: 10px;
			}
			p {
				padding: 10px;
				background-color: #f5f5f5;
			}
		</style>
	</head>
	<body>
		<div id="header"><?php echo file_get_contents("../lang/".$lang . ".txt"); ?></div>
			<h1> Welcome to my blog.</h1>
			<p>
				My blog is currently Work In Progress, and my work is allowing me to host it on their domain!
			</p>
			<p>
				I've hidden my secrets in a text file called "flag.txt", but I made sure it's not in the webroot so you can't access it.
			</p>
	</body>
</html>
