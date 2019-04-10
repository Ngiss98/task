<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<link rel="stylesheet" href="styles/style.css" type="text/css">
	</head>
	<body>
	
<?php include "db_connect.php"; ?>
<!------------------------------ Меню начало -------------------------------------->	
	<nav id="menu" role="navigation">
		<ul>
			<li><a href="index.php" onclick="hideContainer2(); showConatainer1()">Авторы</a></li>
			<li><a href="page_books.php" onclick="hideContainer1(); showConatainer2()">Книги</a></li>
		</ul>
	</nav>
<!------------------------------ Меню конец ---------------------------------------->
<!------------------------------ Общий блок начало --------------------------------->
	<div class="page-author">
		<p id="content_p"></p>
		<button id="menu-toggle"></button>
<!------------------------------ Страница автор начало ----------------------------->
		<div class="container" id="page1">
		<div class='result'></div>
			<div class="row">
				<table class="table table-hover table-bordered">
					<tr>
						<td>id_author</td>
						<td>Имя</td>
						<td>Дата Рождения</td>
						<td>Количество книг</td>
						<td>Средний рейтинг</td>
						<td>Изменить</td>
						<td>Удалить</td>
					</tr>
<!------------------------------ Добавление автора начало ------------------------->
	<form method="post">
		<tr>
			<td></td>
			<td><input autocomplete="off" type="text" name="new_av_name"></td>
			<td><input autocomplete="off" type="text" name="new_av_brday"></td>
			<td></td>
			<td></td>
			<td><button type="submit" id="new_av_add">Добавить</button></td>
			<td></td>
		</tr>
		<script type="text/javascript">
		$('#new_av_add').click(function()
		{
			$.post( 

				"php_script/author_add.php",

			{
				new_av_name: $('[name="new_av_name"]').val(),
				new_av_brday: $('[name="new_av_brday"]').val()
			}, 

			);
		});
	</script>
	</form>		
<!------------------------------ Добавление автора конец -------------------------->
<!------------------------------ Запрос автор начало ------------------------------>
<div>
<?php
				
	$zap1 = "select * from author";
	$zap1 = (string) $zap1;
		
	$result1 = mysql_query($zap1, $conn)
	or die ("zap1 no!".mysql_error());
				
		while ($row = mysql_fetch_array($result1, MYSQL_BOTH))
		{
			
	$zap3 = mysql_query("select count(id_book) from book where id_author = '$row[0]'");
	$av_bk_count = mysql_fetch_array($zap3);

	$zap4 = mysql_query("
	select
		avg(assessment.assessment)
	from
		assessment,
		book,
		author
	where
		assessment.id_book = book.id_book and
		book.id_author = author.id_author and
		author.id_author = '$row[0]'");
	$av_bk_assessment = mysql_fetch_array($zap4);

echo <<<here
	<form method="post">
		<tr id="ajax_test$row[0]">
			<td>$row[0]</td>
			<td class="hidden"><input autocomplete="off" type="text" value="$row[0]" name="av_id$row[0]"></td>
			<td><input autocomplete="off" type="text" value="$row[1]" name="av_name$row[0]"></td>
			<td><input autocomplete="off" type="text" value="$row[2]" name="av_brday$row[0]"></td>
			<td>$av_bk_count[0]</td>
			<td>$av_bk_assessment[0]</td>
			<td><button type="button" id="page1_change$row[0]">Изменить</button></td>
			<td><button type="button" id="page1_delete$row[0]"  onclick="hide2()">Удалить</button></td>
		</tr>
	</form>		
	<script type="text/javascript">
		$('#page1_change$row[0]').click(function()
		{
			$.post( 

				"php_script/script_av_update.php",

			{
				av_id: $('[name="av_id$row[0]"]').val(),
				av_name: $('[name="av_name$row[0]"]').val(),
				av_brday: $('[name="av_brday$row[0]"]').val()
			}, 

			function( data ) 
				{
					$( ".result" ).html(data);
				}

			);
		});
		
		$('#page1_delete$row[0]').click(function()
		{
			$.post( 

				"php_script/script_av_delete.php",

			{
				av_id: $('[name="av_id$row[0]"]').val()
			}, 

			function( data ) 
				{
					$( ".result" ).html(data);
				}

			);
			document.getElementById("ajax_test$row[0]").style.display = "none";
		});
	</script>	
here;

		}
?>

</div>
<!------------------------------ Запрос автор конец ------------------------------->
				</table>

			</div>
		</div>
<!------------------------------ Страница автор конец ----------------------------->
	</div>	
<!------------------------------ Общий блок конец --------------------------------->
	<script src="js/js.js"></script>
	</body>
</html>