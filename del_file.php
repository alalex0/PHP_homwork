<?php 



function recursiveRemoveDir($dir) {
	$includes = new FilesystemIterator($dir);
	var_dump($includes);
	foreach ($includes as $include) {
		if(is_dir($include) && !is_link($include)) {
			recursiveRemoveDir($include);
		}
		else {
			unlink($include);
			var_dump('удаляем фаил', $include);
		}
	}
	rmdir($dir);
	var_dump('удаляем пустую папку', $dir);
}

//Вызов функции на удаление каталога/подкаталогоа и файлов
recursiveRemoveDir('test11');

?>