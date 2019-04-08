<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<link rel="stylesheet" href="styles/style.css" type="text/css">
	</head>
	<body>
	
<?php include "db_connect.php"; ?>
<!------------------------------ Меню начало ------------------------------>	
	<nav id="menu" role="navigation">
		<ul>
			<li><a href="#" onclick="hideContainer2(); showConatainer1()">Авторы</a></li>
			<li><a href="#" onclick="hideContainer1(); showConatainer2()">Книги</a></li>
		</ul>
		<script>
//---------------------------------------------------------------------------//					
			function hideContainer1()
			{
				document.getElementById("page1").style.display = "none";
			}
			function showConatainer1()
			{
				document.getElementById("page1").style.display = "";
			}
//---------------------------------------------------------------------------//		
			function hideContainer2()
			{
				document.getElementById("page2").style.display = "none";
			}
			function showConatainer2()
			{
				document.getElementById("page2").style.display = "";
			}
//---------------------------------------------------------------------------//					
		</script>
	</nav>
<!------------------------------ Меню конец ------------------------------>
<!------------------------------ Общий блок начало ------------------------------>
	<div class="page-author">

		<button id="menu-toggle"></button>
<!------------------------------ Страница автор начало ------------------------------>
		<div class="container" id="page1">
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
				
<!------------------------------ Запрос автор начало ------------------------------>
<div>
<?php
				
	$zap1 = "
	select 
		author.id_author,
		author.name,
		author.burthday,
		count(book.id_book),
		avg(assessment.assessment)
	from
		assessment,
		book,
		author
	where
		assessment.id_book = book.id_book and
		book.id_author = author.id_author
	group by author.id_author";
//не удается нормально подсчитать кол-во книг	
	$zap1 = (string) $zap1;
		
	$result1 = mysql_query($zap1, $conn)
	or die ("zap1 no!".mysql_error());
				
		while ($row = mysql_fetch_array($result1, MYSQL_BOTH))
		{
echo <<<here
		<tr>
			<td id="1">$row[0]</td>
			<td><input autocomplete="off" type="text" value="$row[1]" name="av_name"></td>
			<td><input autocomplete="off" type="text" value="$row[2]" name="av_brday"></td>
			<td id="1">$row[3]</td>
			<td>$row[4]</td>
			<td><button type="button">Изменить</button></td>
			<td><button type="button">Удалить</button></td>
		</tr>
			
here;
			if( isset( $_POST['my_button'] ) )
			{
				
			}
		}
?>
</div>
<!------------------------------ Запрос автор конец ------------------------------>
				</table>
			</div>
		</div>
<!------------------------------ Страница автор конец ------------------------------>	
<!------------------------------ Страница книга начало ------------------------------>
		<div class="container" id="page2" style="display: none">
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
				
<!------------------------------ Запрос книга начало ------------------------------>
<div>
<?php
				
	$zap2 = "
	select 
		book.name,
		author.id_author,
		author.name,
		book.number_of_pages,
		avg(assessment.assessment)
	from
		assessment,
		book,
		author
	where
		assessment.id_book = book.id_book and
		book.id_author = author.id_author
	group by book.id_book";
//не удается нормально подсчитать кол-во книг	
	$zap2 = (string) $zap2;
		
	$result2 = mysql_query($zap2, $conn)
	or die ("zap1 no!".mysql_error());
				
		while ($row = mysql_fetch_array($result2, MYSQL_BOTH))
		{
echo <<<here
		<tr>
			<td><input autocomplete="off" type="text" value="$row[0]" name="bk_name"></td>
			<td><input autocomplete="off" type="text" value="$row[1]" name="av_id" style="width: 80"></td>
			<td>$row[2]</td>
			<td>$row[3]</td>
			<td>$row[3]</td>
			<td><button type="button">Изменить</button></td>
			<td><button type="button">Удалить</button></td>
		</tr>
here;
		}
?>
</div>
<!------------------------------ Запрос книга конец ------------------------------>
				</table>
			</div>
		</div>
<!------------------------------ Страница книга конец ------------------------------>
	</div>	
<!------------------------------ Общий блок конец ------------------------------>
	<script src="js/js.js"></script>
	</body>
</html>