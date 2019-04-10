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
<!------------------------------ Страница книга начало ---------------------------->
		<div class="container" id="page2">
			<div class='result2'></div>
			<div class="row">
				<table class="table table-hover table-bordered">
					<tr>
						<td>Название</td>
						<td>id_автор</td>
						<td>Автор</td>
						<td>Количество страниц</td>
						<td>Средний рейтинг</td>
						<td>Изменить</td>
						<td>Удалить</td>
					</tr>
<!------------------------------ Добавление книги начало -------------------------->
	<form method="post">
		<tr>
			<td><input autocomplete="off" type="text" name="new_bk_name" style="width: 250"></td>
			<td><input autocomplete="off" type="text" name="new_bk_av_id" style="width: 80"></td>
			<td></td>
			<td><input autocomplete="off" type="text" name="new_bk_pages" style="width: 80"></td>
			<td></td>
			<td><button type="submit" id="new_bk_add">Добавить</button></td>
			<td></td>
		</tr>
	<script type="text/javascript">
		$('#new_bk_add').click(function()
		{
			$.post( 

				"php_script/book_add.php",

			{
				new_bk_name: $('[name="new_bk_name"]').val(),
				new_bk_av_id: $('[name="new_bk_av_id"]').val(),
				new_bk_pages: $('[name="new_bk_pages"]').val()
			},

			);
		});
	</script>
	</form>		
<!------------------------------ Добавление книги конец --------------------------->
<!------------------------------ Запрос книга начало ------------------------------>
<div>
<?php
				
	$zap2 = "select * from book";

	$zap2 = (string) $zap2;
		
	$result2 = mysql_query($zap2, $conn)
	or die ("zap1 no!".mysql_error());
				
		while ($row = mysql_fetch_array($result2, MYSQL_BOTH))
		{
			
	$zap5 = mysql_query("
	select
		author.id_author,
		author.name
	from
		book,
		author
	where
		book.id_author = author.id_author and
		book.id_author = '$row[1]'");
	$bk_author = mysql_fetch_array($zap5);

	$zap6 = mysql_query("
	select
		avg(assessment.assessment)
	from
		assessment,
		book,
		author
	where
		assessment.id_book = book.id_book and
		book.id_author = author.id_author and
		book.id_book = '$row[0]'");
	$av_bk_assessment = mysql_fetch_array($zap6);			
			
echo <<<here
	<form>
		<tr id="ajax_test_2$row[0]">
			<td><input autocomplete="off" type="text" value="$row[2]" name="bk_name$row[0]" style="width: 250"></td>
			<td class="hidden"><input autocomplete="off" type="text" value="$row[0]" name="bk_id$row[0]"></td>
			<td><input autocomplete="off" type="text" value="$bk_author[0]" name="bk_av_id$row[0]" style="width: 80"></td>
			<td>$bk_author[1]</td>
			<td><input autocomplete="off" type="text" value="$row[3]" name="bk_pages$row[0]" style="width: 80"></td>
			<td>$av_bk_assessment[0]</td>
			<td><button type="button" id="page2_change$row[0]">Изменить</button></td>
			<td><button type="button" id="page2_delete$row[0]"  onclick="hide2()">Удалить</button></td>
		</tr>
	</form>
	<script type="text/javascript">
		$('#page2_change$row[0]').click(function()
		{
			$.post( 

				"php_script/script_bk_update.php",

			{
				bk_id: $('[name="bk_id$row[0]"]').val(),
				bk_name: $('[name="bk_name$row[0]"]').val(),
				bk_av_id: $('[name="bk_av_id$row[0]"]').val(),
				bk_pages: $('[name="bk_pages$row[0]"]').val()
			}, 

			function( data ) 
				{
					$( ".result2" ).html(data);
				}

			);
		});
		
		$('#page2_delete$row[0]').click(function()
		{
			$.post( 

				"php_script/script_bk_delete.php",

			{
				bk_id: $('[name="bk_id$row[0]"]').val()
			}, 

			function( data ) 
				{
					$( ".result2" ).html(data);
				}
			);
			document.getElementById("ajax_test_2$row[0]").style.display = "none";
		});
	</script>	
here;
here;
		}
?>
</div>
<!------------------------------ Запрос книга конец ------------------------------>
				</table>
			</div>
		</div>
<!------------------------------ Страница книга конец ----------------------------->
	</div>	
<!------------------------------ Общий блок конец --------------------------------->
	<script src="js/js.js"></script>
	</body>
</html>