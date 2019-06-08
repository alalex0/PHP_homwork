<?php
// данные из формы в массиве $_POST
$post = $_POST;
var_dump($post);

// данные о загружаемых файлах в массиве $_FILES
$files = $_FILES;

for ($i=0; $i < count($files['picture']['name']); $i++) { 	
		$name = $files['picture']['name'][$i];		
		$strtime = strtotime("now");	
		$type_file = $files['picture']['type'][$i];
		$type_exp = explode("/", $type_file);
		$ext = pathinfo($name, PATHINFO_EXTENSION);
		$tmp_name = $files['picture']['tmp_name'][$i];
		$size_file = $files['picture']['size'][$i];
		$date = date(Y.d.m, $strtime);
		$name = md5($name); // + дата
		$name = $name .':'. $date;
		var_dump($tmp_name);
		var_dump($name);
		var_dump($type_exp[0]);
		var_dump($ext);
		var_dump($size_file);
		$type_exp1 = $type_exp[1];
		var_dump(searchType($type_exp1));
	if ($type_exp[0] === 'image' && searchType($type_exp1) && sizeFile($size_file)) {
		echo "Тип файла $type_exp[0]<br>";
		moveFile($tmp_name, $name, $ext);
	}
}

// перемещение файла
function moveFile($tmp_name, $name, $ext){
	if (move_uploaded_file($tmp_name, "img/$name.$ext")){
	    echo "Файл успешно загружен";
	} else {
	    echo "Файл не был загружен";
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
function sizeFile($size_file){
	if ($size_file <= 60000) {
		return true;
	}
	echo "Размер превышает 60 КБ, фаил не загружен";
	return false;
}

?>


