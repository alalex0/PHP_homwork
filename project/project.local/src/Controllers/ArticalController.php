<?php 
namespace Web\Frontcontroller\Controllers;
class ArticalController
{

	public function showAction(){
		echo "функция Генерация Артикл страницы";
		$content = 'artical.php';
		$template = 'template.php';
		$data = ['title' => 'Статья'];

//var_dump($this->renderPage($content, $template, $data));
		echo $this->renderPage($content, $template, $data);
	}
	public function renderPage($content, $template, $data = []){
		extract($data);
		ob_start();
		include_once __DIR__ . "/../Views/" . $template;
		$page = ob_get_contents();
		ob_end_clean();
		//var_dump($page);
		return $page;

	}

}


 ?>