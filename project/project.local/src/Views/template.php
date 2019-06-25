<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<title><?php echo $title; ?></title>

</head>
<body>
	<nav>
		<ul>
			<li><a href="/">Главная</a></li>
			<li><a href="/info/rules">Правила</a></li>
			<li><a href="/info/contacts">Контакты</a></li>
			<li><a href="/artical/show">Статья</a></li>
			<li><a href="/picture/add">Добавление картинки</a></li>
		</ul>
	</nav>
	<div>
		<?php include_once $content; ?>
	</div>
</body>
</html>