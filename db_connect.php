<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysql_connect ($servername, $username, $password)
 	or die("Нет соединения: " . mysql_error());

mysql_select_db("books", $conn);

?>