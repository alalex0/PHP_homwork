<?php 
//DB.php

namespace Web\Frontcontroller\Core;
class DB
{
	private $server = 'localhost';//адрес сервера
	private $dbName = 'frontcontroller';//имя БД
	private $username = 'newuser';//имя пользователя
	private $pwd = '12';//пароль БД

	private static $db;//в данном свойстае будем хранить объект DB класса
	private $connection;

	private function __construct()
	{
		$this->connection = new \PDO("mysql:host=$this->server;dbname=$this->dbName", $this->username, $this->pwd);

	}
	public static function getDB(){
		if (self::$db == null) self::$db = new DB();
		return self::$db;
	}
	public function getAll($sql)
	{
		$statement = $this->connection->query($sql);//объект какого класса возвращаем
		if ($statement) return false;
		$statement->setFetchMode(\PDO::FETCH_CLASS, $class);
		return $statement->fetchAll();
	}

	public function nonSelectQuery($sql, $params)
	{
		$statement = $this->connection->prepare($sql);
		if(!$statement) return false;
		return $statement->execute($params);

	}
	public function paramsGetAll($sql, $params, $class)
	{
		$statement = $this->connection->prepare($sql);//выполнили запрос
		if(!$statement) return false;
		$statement->execute($params);//подготовили с параметрами
		$statement->setFetchMode(\PDO::FETCH_CLASS, $class);//в каком виде получаем ответ
		return $statement->fetchAll();
	}
	//вернуть один запрос
	public function paramsGetOne($sql, $params, $class){
		$statement = $this->connection->prepare($sql);//выполнили запрос
		if(!$statement) return false;
		$statement->execute($params);//подготовили с параметрами
		$statement->setFetchMode(\PDO::FETCH_CLASS, $class);//в каком виде получаем ответ
		return $statement->fetch();
	}
}

 ?>