<?php

$get = $_GET;
$id = $get['id'];
//echo "$id";

$goods = [
	[
	'id' => 1,
	'title' => 'Piano',
	'price' => 234,
	'description' => 'Пиани́но (итал. pianino, дословно: маленькое фортепиано) — струнно-клавишный музыкальный инструмент с ударным (молоточковым) способом звукоизвлечения, созданный специально для комнатного музицирования в небольших помещениях.'
	],
	[
	'id' => 2,
	'title' => 'Gitara',
	'price' => 221,
	'description' =>'Гита́ра — струнный щипковый музыкальный инструмент. Применяется в качестве аккомпанирующего или сольного инструмента во многих стилях и направлениях'
	
	],
	[
	'id' => 3,
	'title' => 'Drump',
	'price' => 201,
	'description' =>'Бараба́н (вероятно, слово тюркского происхождения) — музыкальный инструмент из семейства ударных. Распространён у большинства народов'
	//'img' => 'nic7ui.png'
	]
];

/*
<!--отображение блока комментариев для авторизованного пользователя-->
<!--<?php if (): ?>
<?php endif; ?>-->
*/

// TODO: получить товар из массива $goods по id, сохранить в переменную $good

/*
foreach ($goods as $key => $value) {
	if($value['id'] == $id){
		$good = $value['title']; 
		$price = $value['price'];
		$description = $value['description'];
	}
}
*/
//$good = $goods[$id]['id']['title'];

//var_dump($good);
//var_dump($description);
$isAuth = false;//переменная для авториз пользователя
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/comment.css">
</head>
<body>
	<section>

		<!--    TODO: вывести информацию о товаре $good-->
		<!--вывод информации по товару-->
		<?php foreach($goods as $key => $value ): ?>
			<?php if($value['id'] == $id): ?>
					<h3><?php echo $value['title']; ?></h3>
					<p>Цена товара<?php echo ' = '.$value['price'].' '; ?>$</p>
					<p align="left"><?php echo $value['description']; ?></p>
			<?php endif ?>
		<?php endforeach ?>
	</section>
<!--    TODO: если пользователь авторизован $isAuth - отобразить блок для добавления комментариев, в противном случае, сообщить, что ему нужно авторизоваться-->
		<?php if($isAuth): ?>
				<legend>Оcтавьте комментарий </legend>            
                <textarea id="info" name="info" cols="30" rows="5"
                          autofocus required
                          placeholder="подсказка">
                </textarea>           
		        <p>
			        <input id="input" type="submit" value="комментировать">
			    	<input type="reset" value="Очистить">
				</p>
				<div id="div" class="div"></div>
		<?php else: ?>
				<p><em>Чтобы оставить комментарий, авторизуйтесь</em></p>
		<?php endif ?>
		<script src="js/comment.js"></script>
</body>
</html>