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









?>