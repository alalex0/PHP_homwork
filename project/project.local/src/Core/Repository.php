<?php 
namespace Web\Frontcontroller\Core;

interface Repository
{
	public function getAll();//получение всех записей
	public function getById(int $id);//получение записей по Id
	public function save($params);//добавление новой записи

}


 ?>