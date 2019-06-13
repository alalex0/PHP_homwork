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
$url = $post['url'];

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
	$file_test = 'url.txt';//фаил-база где хранятся ссылки
	$file_shot_test = file($file_test, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	
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
   			$http = stringGetUrl($valid_url);
   			$path = stringGetPath($valid_url);   			
	        return $path_shot;
   		}else{
	   				echo "Ссылки в файле-базе не найдена, Делаем ХЭШ<br>";
			       $url_hesh = urlHesh($valid_url);		      
			       	$http = stringGetUrl($valid_url);
			       	$path = stringGetPath($valid_url);
	   				$path_shot = random_bytes_http($file_shot_test, $valid_url);
			        echo "Записываем в фаил хэш<br>Короткая ссылка $http/$path_shot<br>";			       
		        if (searchHesh($file_shot_test, $url_hesh)) {		        	
		        	$url_hesh = urlHesh($url_hesh);			        	
		        	searchHesh($file_shot_test, $url_hesh);
		        }
		        if (!searchHesh($file_shot_test, $url_hesh)) {		        	
		        	load_hesh($file_test, $url_hesh, $http, $path_shot, $date1);
		       	}		             
		     }

	}else {
		
	echo "Введите ссылку еще раз<br>";
	}

	function searchURL($arr, $url_hesh){
		$exp_url0 = null;
		$exp_url = null;		
		$exp_url0 = explode("//", stringGetUrl($url_hesh))[1];		
		 foreach ( $arr as $v ){
		 	$exp_url1 = explode("//", $v)[1];
		 	$exp_url = explode("/", explode("//", $v)[1])[0];
		 	if ( strpos($exp_url, $exp_url0, 0) !== false )
	        {
	        	echo "Ссылка $exp_url0 найдена в файле<br>";
	        	echo "Короткая ссылка: http://$exp_url1<br>";
	           return true;
	        }	       		
		 }
		 return false;
	}
//Находит хэш в файле, если нет хэша, то создает его.
//После создания нового хэша проверяет, если есть хэш, то не создает новый, т.е. третий хэш и последующие не создает.
	function searchHesh($arr, $hesh){
			$exp_hesh = null;
		foreach ( $arr as $v ){			
			$exp_hesh = explode(":", $v)[3];			
		 	if (strpos($exp_hesh, $hesh, 0) !== false ){		 		 	
	           var_dump("Создаем новый ХЭШ");	                 
	           return true;
	        } 			        	  		
		 }
		 if (strpos($exp_hesh, $hesh, 0) !== true ){		 		
		 		return false; 	
		 }	
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