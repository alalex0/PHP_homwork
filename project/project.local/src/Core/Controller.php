<?php 
//Controller
namespace Web\Frontcontroller\Core;

class Controller
{

public function renderPage($content, $template, $data = []){
		var_dump($data);
		extract($data);
		//var_dump(extract($data));
		ob_start();
		include_once __DIR__ . "/../Views/" . $template;
		$page = ob_get_contents();
		ob_end_clean();
		return $page;

	}


}

 ?>