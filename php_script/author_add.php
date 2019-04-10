<?php

$new_av_name = $_POST['new_av_name'];
$new_av_brday = $_POST['new_av_brday'];

include "../db_connect.php";
	echo "data added $new_av_name! $new_av_brday!";

$result = mysql_query("insert into author (name, burthday) values ('$new_av_name', '$new_av_brday')");

?>