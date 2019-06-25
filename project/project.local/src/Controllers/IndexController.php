<?php 
namespace Web\Frontcontroller\Controllers;
//require_once __DIR__ . '/../Models/PictureRepository.php';
use Web\Frontcontroller\Models\PictureRepository;

class IndexController
{
	private $pictureRepository;

	public function __construct()
	{
		$this->pictureRepository = new PictureRepository();
	}

	public function indexAction(){
		echo "функция Генерация главной страницы";
		$content = 'main.php';
		$template = 'template.php';
		$pictures = $this->pictureRepository->getAll();
		$data = ['title' => 'Главная', 'pictures' => $pictures];


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

