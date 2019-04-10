<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
</head>
<?php
$data0 = $_POST['bk_id'];
$data1 = $_POST['bk_name'];
$data2 = $_POST['bk_av_id'];
$data3 = $_POST['bk_pages'];
include "../db_connect.php";
	echo "data received $data0! $data1! $data2! $data3!";
$update_author = mysql_query("
update
	book
set
	id_author = '$data2 ',
	name = '$data1',
	number_of_pages = '$data3'
where id_book = '$data0'");
?>