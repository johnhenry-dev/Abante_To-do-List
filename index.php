<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
	<title>ToDo List </title>
	<link rel="stylesheet" href="styles.css">
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
	</div>
		<ul class = "list">
		<?php $todos = GetTodos ($conn); 
		foreach ($todos as $todo) {?>
			<li><?PHP echo $todo ['todolist']; ?>
			<a class = "delBtn" href = 'index.php?tid=<?php echo $todo ["tid"] ?>'>X</a>
		<?PHP }?>

		</ul>
	</div>
	<script src = "main.js"></script>
	</body>
</html>	