<?php

/*
Сгенерировать 5 массивов из случайных чисел.
Вывести массивы и сумму их элементов на экран. Найти массив с максимальной суммой элементов. Вывести его на экран еще раз. Генерация массива и подсчет суммы - разные функции
*/


function get_arr (){
$num = rand(5, 15);
$arr = range($num, 30, $num);
	return $arr;
}
function get_sum($arr){
	return array_sum($arr);
}

for ($i=1; $i <= 5; $i++) {
	$a[$i] = get_arr();
	$b[$i] = get_sum($a[$i]);
	var_dump($a[$i]);
	var_dump( 'Сумма элементов масива',$b[$i]);
}

foreach ($b as $key => $value) {
	if(max($b) == $value){
		//var_dump($key);
	var_dump('Массив с максисмальным числом элементов', $a[$key]);
	}
}





 ?>