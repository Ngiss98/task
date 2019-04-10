<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
</head>
<?php
$data0 = $_POST['av_id'];
$data1 = $_POST['av_name'];
$data2 = $_POST['av_brday'];
include "../db_connect.php";
	echo "data received $data0! $data1! $data2!";//без понятия почему слетает кодировка(
$update_author = mysql_query("
update
	author 
set
	name = '$data1',
	burthday = '$data2'
where id_author = '$data0'");
?>