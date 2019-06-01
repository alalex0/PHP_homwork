<?php
/*
1. Дана строка, содержащая полное имя файла (например, 'C:\OpenServer\testsite\www\someFile.txt'). Написать функцию, которая сможет выделить из подобной строки имя файла без расширения.
*/


$strin = 'C:\OpenServer\testsite\www\someFile.txt';
function stringGet ($str){
	$s = substr($str, 27, -4);
	return $s;
}
var_dump(stringGet($strin));
var_dump(stringGet('C:\OpenServer\testsite\www\someFile.txt'));
$file_name = 'C:\OpenServer\testsite\www\someFile.txt';

function fileName ($str){
	return basename($str);
}
var_dump(fileName($file_name));
/*
2. Написать функцию - конвертер строки.
    Возможности (в зависимости от второго аргумента - флаг, который указывает, какую именно операцию следует выполнить): 
       1) перевод всех символов в верхний регистр, 
       2) перевод всех символов в нижний регистр, 
       3) перевод всех символов в нижний регистр и первых символов слов в верхний регистр.`
*/
$s = 'hELLO WORLD';
/*
$string_S = function(){
	return ucwords();
}
*/

function stringConverter($string_S, $parm){
	if ($parm == 1) {
		return ucwords($string_S);
	}
	if ($parm == 2) {
		return strtolower($string_S);
	}
	if ($parm == 3) {
		return ucwords(strtolower($string_S));
	}

}

var_dump(stringConverter($s, 3));
//var_dump(ucwords(strtolower($s)));
/*
3. Создать функцию по преобразованию нотаций: строка вида 'this_is_string' преобразуется в 'thisIsString' (CamelCase-нотация)
*/

//$stt = 'this_is_string';

function CamelCase($stt){
	$char_del = str_replace('_', ' ', $stt);
	$char_del = ucwords(strtolower($char_del));
	$char_del = str_replace(' ', '', $char_del);
	$char_small = strtolower(substr($char_del, 0, -11));
	$char_del = substr($char_del, 1);
	return $char_small.$char_del;
}

var_dump(CamelCase('this_is_string'));


/* Дано два текста. Определите степень совпадения текстов (разработать алгоритм определения соответствия по 5 балльной шкале).
*/


$textA = 'Дано два текста. Определите степень совпадения текстов (разработать алгоритм определения соответствия по ';
$textB = 'разработать алгоритм определения соответствия по 5 балльной шкале';

function compareText ($text_a, $text_b) {
		similar_text($text_a, $text_b, $perc);	 	
	 	 $res = (5 * round($perc))/100;
	 		echo "Cовпадение по 5 бальной шкале $res <br>";
}
var_dump(compareText($textA, $textB));


/*
 Дан массив, состоящий из целых чисел. Выполнить сортировку массива по возрастанию суммы цифр чисел. Например, дан массив [13, 55, 100]. После сортировки он будет следующего вида: [100, 13, 55], тк сумма цифр числа 100 = 1, сумма цифр числа 13 = 4, а 55 = 10.
На экран вывести исходный массив, массив после сортировки и сумму цифр каждого числа отсортированного массива.
*/

$arry = [13, 100, 55];

function viewArry($arr) {
	$arrP = [];
	//arsort($arr);
	foreach ($arr as $value) {
			$value = (string) $value;
			$sum = 0;
		for ($i=0; $i <= strlen($value) ; $i++) { 
			$val = (int) $value[$i];
			$sum += $val;
					
		}	
		echo "Сумма числа $value равна: $sum<br> ";
		var_dump($value);	
		var_dump($sum);
		array_push($arrP, $sum);
	}
	asort($arrP);
	return $arrP;
}
echo "Исходный массив";
var_dump($arry);
echo "Массив по максимальному элементу<br>";
var_dump(viewArry($arry));

function cmp ($a, $b){
	if ($a['key'] == $b['key']) {
		return 0;
	}
	return($a['key'] < $b['key'])? -1 : 1;
}

function maxElem($arr){
	usort($arr, cmp);
	return $arr;
}

var_dump(maxElem($arry));




$num = '45';
$sum = 0;
for ($i=0; $i <= strlen($num) ; $i++) { 
	$sum += $num[$i];
}
var_dump($sum);
var_dump(strlen($num));










?>