<?php 
$post = $_POST;
var_dump($post);

$login = $post['login'];
$username = $post['username'];
$birth = $post['birth'];
$mail = $post['mail'];
$password = $post['password'];
$gender = $post['gender'];
$country = $post['country'];
$url = $post['url'];
echo "Пользователь: $login<br>";
echo "Имя: $username<br>";
echo "Почта: $mail<br>";
echo "Пароль: $password<br>";
echo "Пол: $gender<br>";
echo "Страна: $country<br>";
echo "Адрес url: $url<br>";
$valid_url = filter_var(trim($url), FILTER_VALIDATE_URL);
//var_dump($valid_url);
//var_dump(trim($url));

 
$file = 'test.txt';
$arr = file($file);
/*
if($valid_url){
	echo "Проверка пройдена $valid_url";
	$current = file_get_contents($file);
	$current.= '$valid_url\n';
	file_put_contents($file, $current, FILE_APPEND | LOCK_EX);
}
*/
function stringGet ($str){
	$s = substr($str, 27, -4);
	return $s;
}
function urlHesh($str){
	 $url_h = md5($str);
	 return $url_h;
}
function load_hesh($file, $hesh){
	$current = file_get_contents($file);
	$current.= $hesh;
	return file_put_contents($file, $current, LOCK_EX);

}
var_dump($valid_url);
   if($valid_url){
   		echo "Проверка пройдена $valid_url<br>";
   		if (searchURL($arr, $valid_url)) {
   			echo "Ссылки ЕСТЬ";
   			var_dump(stringGet($valid_url));
   			echo "Записываем в фаил";
   			$cut_url = stringGet($valid_url);
   			$new_url = $valid_url . ' : '. $cut_url;
   			load_hesh($file, $new_url);
	        return stringGet($valid_url);
   		}
   				echo "Ссылки НЕТ, Делаем ХЭШ";
		       $url_h = urlHesh($valid_url);
		        var_dump($url_h);
		if(searchHesh($arr, $url_h)){
				echo " Хэша ???";
				var_dump(searchHesh($arr, $url_h));
				//urlHesh($url_h);
				var_dump($url_h);
				searchHesh($arr, urlHesh($url_h));
		}
				echo "Новый Хэш ЕСТЬ";
				var_dump($url_h);
	    		load_hesh($file, $url_h . ' : ');
	    		$cut_url = stringGet($valid_url);
   				$new_url = $valid_url . ' : '. $cut_url . ' : ';
   				load_hesh($file, $new_url);

	}
	function searchURL($arr, $url_hesh){
		 foreach ( $arr as $v ){
		 	if ( strpos($v, $url_hesh, 0) !== false )
	        {
	        	$url_hesh = $v; // найденная строка 
	           return true;
	        }	       		
		 }
		 return false;
	}
	function searchHesh($arr, $hesh){
		foreach ( $arr as $v ){
		 	if ( strpos($v, $hesh, 0) !== false )
	        {
	        	//$url_hesh = $v; // найденная строка
	          //$hesh_new = urlHesh($hesh);
	           var_dump("ХЭШ функция есть");
	           return true;
	        }	       		
		 }

		 return false;
	}
//var_dump($string);


/*
Дз будет таким : верстаете форму регистрации с полями: почта, пароль, имя, дата рождения, пол (радиокнопки), страна проживания (select). Проверяете её на js своими валидаторами и отправляете на сервер. Одна функция отправки будет с ajax запросом, другая без него (как на занятии). На сервере получаете данные и отправляете какой нибудь ответ (данные получены, например). Обязательно разберитесь, в каком виде приходят данные в массив post и как их из него получить. На гитхабе дз продублирую
*/



?>