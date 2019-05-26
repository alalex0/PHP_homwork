<?php

$num = 800;
$i = 0;
while ($num > 0) {
	$num = $num/2;
	$i++;
	//echo $num;
	//echo $i;
	if ($num < 50) {
		break;
	}
}
echo "количество итераций: $i <br>";
echo "число = $num <br>";

$num = 800;
$i = 0;
echo "Сокращенная запись <br>";
while ($num >= 50):
	$num = $num/2;
	$i++;
	echo "количество итераций $i <br>";
	echo "число = $num <br>";	
endwhile;

echo "Цикл FOR <br>";

$num = 800;

for ($i=1; ; $i++, $num /= 2) { 
	if ($num < 50) {
		echo "количество итераций $i <br>";
		echo "число = $num <br>";
		break;
	}
}
echo "Цикл FOR Сокращенная запись <br>";
/*
for ($i=1, $num = 800; $num >= 50; $i++, $num /= 2) { 
	echo "количество итераций $i <br>";
	echo "число = $num <br>";
}
*/






?>