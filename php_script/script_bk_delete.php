<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
</head>
<?php
$data0 = $_POST['bk_id'];
include "../db_connect.php";
	echo "data delete $data0!";

$author_delete = mysql_query ("delete from book where id_book = $data0");
?>