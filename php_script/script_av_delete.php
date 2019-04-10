<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
</head>
<?php
$data0 = $_POST['av_id'];
include "../db_connect.php";
	echo "data delete $data0!";//без понятия почему слетает кодировка(

$author_delete = mysql_query ("delete from author where id_author = $data0");
?>