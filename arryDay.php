<?php

$dayWeek = [
	[
		'id' => 1,
		'day' => 'Понедельник'
	],
	[
		'id' => 2,
		'day' => 'Вторник'
	],
	[
		'id' => 3,
		'day' => 'Среда'
	],
	[
		'id' => 4,
		'day' => 'Четверг'
	],
	[
		'id' => 5,
		'day' => 'Пятница'
	],
	[
		'id' => 6,
		'day' => 'Суббота'
	],
	[
		'id' => 7,
		'day' => 'Воскресенье']
];

//echo date("N");
$dayN = date("N");

//Отсортировать массив по 'price'
$arr = [
    '1'=> [
        'price' => 10,
        'count' => 2
    ],
    '2'=> [
        'price' => 5,
        'count' => 5
    ],
    '3'=> [
        'price' => 8,
        'count' => 5
    ],
    '4'=> [
        'price' => 12,
        'count' => 4
    ],
    '5'=> [
        'price' => 8,
        'count' => 4
    ],
];

//asort($arr);
//natcasesort($arr);
function cmp($a, $b){
	if($a['price'] == $b['price']){
		return 0;
	}
		return ($a['price'] < $b['price']) ? -1 : 1;
}

uasort($arr, cmp);
var_dump($arr);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<section>
		<?php foreach($dayWeek as $value): ?>			
			<?php if($value['id'] == $dayN): ?>
					<h3> <?php echo $value['day']; ?></h3>
			<?php else: ?>
					<p> <?php echo $value['day']; ?></p>
			<?php endif; ?>		
		<?php endforeach;?>
	</section>
	<section>

		<h1>Сортировка массива</h1>
		<?php foreach($arr as $key => $price): ?>
			<p><span>id</span><?php echo '='.$key.' price='.$price['price']; ?></p>

			<!--<p><?php echo $key.'='.$price['price']; ?></p>-->
			
		<?php endforeach; ?>
	</section>

</body>
</html>