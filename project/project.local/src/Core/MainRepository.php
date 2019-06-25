<?php 
//MainRepository.php
namespace Web\Frontcontroller\Core;
use Web\Frontcontroller\Core\Repository;

class MainRepository implements Repository
{
	/*
	методы на добавление
	записи 
	получение записи по первичному ключу
	получение всех записей
	(общие для всех репозиториев)
	*/
	protected $db;
	private $class;

	public function __construct($class)
	{
		$this->db = DB::getDB();
		$this->class = $class;
	}
	public function getAll()
	{
		//$class соответствует таблице в БД
		//например Picture
		//Web\Frontcontroller\Models\Picture
		//Pucture выделяет слово класс - название таблицы в БД
		$sql = 'SELECT * FROM ' . basename(str_replace('\\', '/', $this->class));
		return $this->db->getAll($sql, $this->class);
	}
	public function getById(int $id)
	{
		$sql = 'SELECT * FROM ' . basename(str_replace('\\', '/', $this->class)) . ' WHERE id=:id';
		return $this->db->paramsGetOne($sql, ['id'=>$id], $this->class);
	}

}


 ?>