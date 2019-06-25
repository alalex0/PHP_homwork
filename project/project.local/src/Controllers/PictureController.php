<?php 
namespace Web\Frontcontroller\Controllers;
use Web\Frontcontroller\Core\Controller;
use Web\Frontcontroller\Models\PictureRepository;

class PictureController extends Controller
{
	private $pictureRepository;

	public function __construct()
	{
		$this->pictureRepository = new PictureRepository();
	}
	//private $pictureRepository;

	//сработает на запрос pictire/add

	public function addAction(){
		if($_SERVER["REQUEST_METHOD"] == "GET"){
		//если get запрос то отображаем форму
			
			$data = ['title'=>'Добавление картины'];

			echo parent::renderPage('add_picture.php', 'template.php', $data);
		}elseif($_SERVER["REQUEST_METHOD"] == "POST"){
		//если пост запрос то данные обрабатываем
			$post = $_POST;
			$files = $_FILES;
			var_dump($_POST);
			$params = [
				'title' => $post['title'],
				'description' => $post['description'],
				'yearCreated' => explode("-", $post['yearCreated'])[0],
				'img' => $files['img']['name']
			];

			if($this->pictureRepository->save($params) === false){
				$addResult = 'Картина не добавлена';
			}else{
				$addResult = 'Картина добавлена';
			}
			//var_dump($_SERVER);
			$data = ['title'=>'Добавление картины', 'addResult' => $addResult];

			echo parent::renderPage('add_picture.php', 'template.php', $data);

		}
	}

/*
	public function showAction($id){
		echo "функция Генерация страницы картины";
		$content = 'picture.php';
		$template = 'template.php';
		$data = ['title' => 'Картины'];
		$picture =$this->pictureRepository->getById($id);

		echo $this->renderPage($content, $template, $data);
		
	}
	public function renderPage($content, $template, $data = []){
		var_dump($data);
		extract($data);
		var_dump(extract($data));
		ob_start();
		include_once __DIR__ . "/../Views/" . $template;
		$page = ob_get_contents();
		ob_end_clean();
		return $page;

	}
*/
}



 ?>