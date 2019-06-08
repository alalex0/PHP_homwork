<?php
// данные из формы в массиве $_POST
$post = $_POST;
var_dump($post);

// данные о загружаемых файлах в массиве $_FILES
$files = $_FILES;
var_dump($files);

// обязательно проверить на размер
for ($i=0; $i < count($files['picture']['name']); $i++) { 
		$name = $files['picture']['name'][$i];
		$strtime = strtotime("now");	
		$type_file = $files['picture']['type'][$i];
		$file_name = $files['picture']['name'][$i];
		$type_exp = explode("/", $type_file);
		$ext = pathinfo($name, PATHINFO_EXTENSION);
		$tmp_name = $files['picture']['tmp_name'][$i];
		$size_file = $files['picture']['size'][$i];
		$date = date(Y.d.m, $strtime);
		$name = md5($name); // + дата
		$name = $name .':'. $date;
		$type_exp1 = $type_exp[1];
	if ($type_exp[0] === 'image' && searchType($type_exp1) && sizeFile($size_file, $file_name)) {
		echo "Тип файла $type_exp[0]<br>";
		moveFile($tmp_name, $name, $ext, $file_name);
	}
}

// перемещение файла
function moveFile($tmp_name, $name, $ext, $file_name){
	if (move_uploaded_file($tmp_name, "img/$name.$ext")){
	    echo "Файл $file_name успешно загружен";
	} else {
	    echo "Файл $file_name не был загружен";
	}
}
function searchType($type_exp){
	$whitelist = array('pdf','doc','jpeg','png','jpg','mpg','mpeg','avi','flv','wma','ogg');
	foreach ($whitelist as $value) {
		if ($type_exp === $value) {
			return true;
		}	
	}
	return false;
}
function sizeFile($size_file, $file_name){
	if ($size_file <= 60000) {
		return true;
	}
	echo "Размер превышает 60 КБ, фаил $file_name не загружен, размер: $size_file";
	//var_dump('Размер превышает 60 КБ, ');
	return false;
}

?>


