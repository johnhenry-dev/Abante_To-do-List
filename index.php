<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
	<title>ToDo List </title>
	<?PHP include 'config.php';
?>
</head>
<body>
	<div class = "box">
		<div class ="header">
			<h2>My ToDo List </h2>
			<?php
if(isset($_POST["submit"])){
	$created = CreateTodo ($conn, $_POST);
	echo $created;
}
if (isset ($_GET['tid'])){
	$deleted = DeleteTodo ($conn, $_GET['tid']);
}
?>

	<form action = "" method = "POST">
		<input type = "text" name = "todo" id = "myInput" placeholder = "Title...">
		<button class = "btn" name = "submit" type = "submit"> Add </button>
	</form>
	</body>
</html>	