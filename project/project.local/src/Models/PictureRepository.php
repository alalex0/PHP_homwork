<?php 
namespace Web\Frontcontroller\Models;

use Web\Frontcontroller\Core\DB;
use Web\Frontcontroller\Core\Repository;
use Web\Frontcontroller\Models\Picture;
//создаем промежуточный класс
//require_once __DIR__ . '/../Core/Repository.php';
//require_once __DIR__ . '/../Models/Picture.php';
class PictureRepository implements Repository
{

	//private $pictures = [];
	private $db;
	public function __construct()
	{
		/*
		//имитация запроса из базы
		$this->pictures = [
			new Picture(1, 'Picture 1', 'description', ['pic1.jpg', 'pic2.jpg']),
			new Picture(2, 'Picture 2', 'description', ['pic2.jpg', 'pic3.jpg']),
			new Picture(3, 'Picture 3', 'description', ['pic4.jpg', 'pic5.jpg']),
			new Picture(4, 'Picture 4', 'description', ['pic1.jpg', 'pic2.jpg'])];
			*/
			$this->db = DB::getDB();

	}
	public function getAll()
	{
		/*
		//вернет все картины
		return $this->pictures;
		*/
		/*
		1 сосавить sql запрос
		2 получить все записи и вывести vardamp
		*/
	}
	public function getById(int $id)
	{
/*
		foreach ($this->pictures as $picture) {
				var_dump($picture->getId());
			if ($id == $picture->getId()) {
				return $picture;
			}
		}
		*/
	}
	public function save($params)
	{
		$sql = 'INSERT INTO Picture (title, description, img, yearCreated) VALUES (:title, :description, :img, :yearCreated)';
		return $this->db->nonSelectQuery($sql, $params);
	}

}



 ?>