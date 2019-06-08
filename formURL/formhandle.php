<?php 


/*
Сокращатель ссылок (используем функции)
пользователь вводит в форму ссылку (используйте input type="url")
вы получаете ее валидируете и обрабатываете:
проверка на пустоту,
filter_var - FILTER_VALIDATE_URL
trim,
* если все хорошо:
проверяете присутствует ли в файле ссылка, которую вводил пользователь,
если есть, то получаете короткую ссылку и выводите на экран
если нет, создаете хеш определенной длины (алгоритм придумать самостоятельно)
если созданный хеш уже есть в файле,
то создаете новый до тех пор, пока хеш не станет уникальным
записать хеш в файл
* информация будет храниться в файле следующим образом:
длинная ссылка:короткая ссылка
* Дополнительно: длинная ссылка:короткая ссылка:время, когда ссылка устареет
При таком варианте, если время жизни закончилось, то нужно проверять его и, если нужно, перегенерировать ссылку
*/



$post = $_POST;
//var_dump($post);

//$login = $post['login'];
//$username = $post['username'];
//$birth = $post['birth'];
//$mail = $post['mail'];
//$password = $post['password'];
//$gender = $post['gender'];
//$country = $post['country'];
$url = $post['url'];
//echo "Пользователь: $login<br>";
//echo "Имя: $username<br>";
//echo "Почта: $mail<br>";
//echo "Пароль: $password<br>";
//echo "Пол: $gender<br>";
//echo "Страна: $country<br>";
//$date1 = new DateTime("now");
$today = strtotime("now");
$today_now = date('H:i:m', $today);
$res = strtotime($today_now) + strtotime('01:00') -strtotime("00:00:00");
$date1 = date('H:i:m',$res);

echo "Адрес url: $url<br>";
if(isset($url)){
	$valid_url = filter_var(trim($url), FILTER_VALIDATE_URL);
}else{
	echo "Введите ссылку<br>";
	}

	$file_h = 'hesh_url.txt';//фаил для хеша и коротких ссылок
	$arry_hesh = file($file_h);
	$file_arry = 'short_url.txt';//фаил для записи кортких ссылок
	$file_shot_http = file($file_arry);
	$file_test = 'url.txt';//фаил-база где хранятся ссылки
	$file_shot_test = file($file_test);

function stringGetPath ($valid_url){
	$parse_url = parse_url($valid_url);
	foreach ($parse_url as $value) {		
		$shot_url = $parse_url['scheme'];
		$shot_path = $parse_url['path'];			}
	return $shot_path;
}
function stringGetUrl ($valid_url){
	$parse_url = parse_url($valid_url);
	foreach ($parse_url as $value) {
		$shot_url = $parse_url['scheme'] .'://'. $parse_url['host'];		
	}
	return $shot_url;
}
//Создание массива псевдослучайного байта и ссылки

function random_bytes_http ($file, $valid_url){
	$bytes = bin2hex(random_bytes(3));	
	$random_bytes_http = array($bytes => $valid_url);
	load_http($file, $random_bytes_http);		
	return $bytes;
}

function load_http($file, $random_bytes_http){
	$current = file_get_contents($file);
	foreach ($random_bytes_http as $key => $value) {
$current.= $key.'=>' . $value . '
';
	}	
	return file_put_contents($file, $current, LOCK_EX);
}

   if($valid_url){
   		echo "Проверка ссылки пройдена $valid_url<br>";
   		if (searchURL($file_shot_test, $valid_url)) {
   			echo "Ссылка ЕСТЬ <br>";   			
   			$http = stringGetUrl($valid_url);
   			$path = stringGetPath($valid_url);
   			$path_shot = random_bytes_http($file_arry, $valid_url);
   			echo "Короткая ссылка: $http/$path_shot<br>";   			
	        return $path_shot;
   		}else{
	   				echo "Ссылки в файле-базе не найдена, Делаем ХЭШ<br>";
			       $url_hesh = urlHesh($valid_url);		      
			       	$http = stringGetUrl($valid_url);
			       	$path = stringGetPath($valid_url);
	   				$path_shot = random_bytes_http($file_arry, $valid_url);
			        echo "Записываем в фаил хэш $url_hesh : Короткая ссылка $http/$path_shot<br>";			       
		        if (searchHesh($arry_hesh, $url_hesh)) {
		        	var_dump('Элемент найден'); 
		        	$url_hesh = urlHesh($url_hesh);	
		        	var_dump($url_hesh);
		        	searchHesh($arry_hesh, $url_hesh);
		        }
		        if (!searchHesh($arry_hesh, $url_hesh)) {
		        	var_dump('Элемента НЕТ');
		        	var_dump($url_hesh);
		        	load_hesh($file_h, $url_hesh, $http, $path_shot, $date1);
		       	}		             
		     }

	}else {
		
	echo "Введите ссылку еще раз<br>";
	}
function searchURL($arr, $url_hesh){
	foreach ( $arr as $v ){
		if ( strpos($v, $url_hesh, 0) !== false ){
	        	$url_hesh = $v; // найденная строка 
	           return true;
	    }	       		
	}
		 return false;
}
function searchHesh($arr, $hesh){
	foreach ( $arr as $v ){
		if ( strpos($v, $hesh, 0) !== false ){	        	
	           var_dump("Создаем новый ХЭШ");	          
	           return true;
	    } 			        	  		
	}
		 return false; 		
}
function urlHesh($url){
	 $url_hesh = md5($url);
	 return $url_hesh;
}
function load_hesh($file, $hesh, $http, $path_shot, $date1){
	$current = file_get_contents($file);
	$current.= $date1 .':'. $hesh .':'. $http .'/'. $path_shot . '
	';
	return file_put_contents($file, $current, LOCK_EX);
}






?>