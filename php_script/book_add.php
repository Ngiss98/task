<?php

$new_bk_name = $_POST['new_bk_name'];
$new_bk_av_id = $_POST['new_bk_av_id'];
$new_bk_pages = $_POST['new_bk_pages'];

include "../db_connect.php";

$result = mysql_query("
insert into
	book (id_author, name, number_of_pages)
	values ('$new_bk_av_id', '$new_bk_name', '$new_bk_pages')");

?>