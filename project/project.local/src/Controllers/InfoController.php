<?php 
namespace Web\Frontcontroller\Controllers;
class InfoController
{
	public function rulesAction(){
		echo "функция Генерация страницы с правилами покупки картины";
		$content = 'rules.php';
		$template = 'template.php';
		$data = ['title' => 'Правила'];

		echo $this->renderPage($content, $template, $data);

	}
	public function contactsAction(){
		echo "функция Генерация страницы контактов";
		var_dump(phpinfo());
		$content = 'contacts.php';
		$template = 'template.php';
		$data = ['title' => 'Контакты', 'data' => 'data.php'];
		echo $this->renderPage($content, $template, $data);

	}
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