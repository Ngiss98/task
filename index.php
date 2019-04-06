<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<link rel="stylesheet" href="styles/style.css" type="text/css">
	</head>
	<body>
	
<?php include "db_connect.php"; ?>
	
	<nav id="menu" role="navigation">
		<ul>
			<li><a href="#">Авторы</a></li>
			<li><a href="#">Книги</a></li>
		</ul>
	</nav>

	<div class="page-wrap">

		<button id="menu-toggle"></button>

		<div class="container">
			<div class="row">
				<table class="table table-hover table-bordered">
					<tr>
						<td>Имя</td>
						<td>Дата Рождения</td>
						<td>Количество книг</td>
						<td>Средний рейтинг</td>
						<td>Изменить</td>
						<td>Удалить</td>
					</tr>
				
<!------------------------------------------------------------------------------------->

<?php
				
	$zap1 = "
	select 
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
			<td>$row[0]</td>
			<td>$row[1]</td>
			<td>$row[2]</td>
			<td>$row[3]</td>
			<td><button type="button">Изменить</button></td>
			<td><button type="button">Удалить</button></td>
		</tr>
here;
		}
?>

<!------------------------------------------------------------------------------------->
				</table>
			</div>
		</div>

	</div>
	<script src="js/js.js"></script>
	</body>
</html>