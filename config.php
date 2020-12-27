<?php
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$db_name = "todo";

$conn = mysqli_connect ($host, $dbuser, $dbpass, $db_name);

if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: "  . mysqli_connect_errno();
}

function GetTodos ($conn)
{
	$sql = mysqli_query ($conn, "select tid, todolist from todolist");
	$data = array();
	while ($row = mysqli_fetch_assoc($sql)) {
		$data[] = $row;
	}
	return $data;
}

function CreateTodo ($conn, $todo)
{
	$dta = "";
	if (!empty($todo["todo"])) {
		$sql = "INSERT INTO todolist (todolist) VALUES ('" . $todo ["todo"] . "')";

		if (mysqli_query($conn, $sql)) {
			$dta = "created successfully";
		}
		else {
			$dta = "Error: " . $sql . "" . mysqli_error($conn);
		}
	}
	return $dta;
}

function DeleteTodo ($conn, $tid)
{
	$dta ="";
	if (!empty($tid)) {
		$sql = ' DELETE FROM todolist WHERE tid =' . $tid;

		if (mysqli_query($conn, $sql)){
			$dta = "Record deleted successfully";
		}
		else {
			$dta = "Error deleting record: " . mysqli_error($conn);
		}
	}
	return $dta;
}