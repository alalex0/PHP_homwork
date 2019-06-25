<?php 
require_once __DIR__ . '/../vendor/autoload.php';
//пространство имен
use Web\Frontcontroller\Core\Router;
use Web\Frontcontroller\Models\PictureRepository;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*
require_once __DIR__ . "/../src/Controllers/IndexController.php";
require_once __DIR__ . "/../src/Controllers/InfoController.php";
require_once __DIR__ . "/../src/Controllers/ArticalController.php";
require_once __DIR__ . "/../src/Controllers/PictureController.php";
require_once __DIR__ . "/../src/Core/Router.php";
*/
$uri = $_SERVER['REQUEST_URI'];
var_dump($uri);
Router::run();

//пространство имен



//принцип работы роутера
/*
if ($uri == "/") {
	$controller = new IndexController();
	$controller->indexAction();
}elseif($uri == "/info/rules"){
	$controller = new InfoController();
	$controller->rulesAction();
}//и т.д.
*/
/*
для всех остальныз запросы
/имя контроллера/имя метода/данные

картина -отдельный контроллер
статья - отдельный контроллер

// Взаимодействие между клиентом и сервером

//1. Клиент отправлят запрос / , сервер возвращает главную страницу
//2. Клиент отправлят запрос /picture/show/2 (где 2 - id картины), сервер возвращает страницу с описанием одной картины
//3. Клиент отправлят запрос /article/show, сервер возвращает страницу со статьями
//4. Клиент отправлят запрос /article/show/2 (где 2 - id статьи), сервер возвращает страницу с описанием одной статьи
//5. Клиент отправлят запрос /info/rules, сервер возвращает страницу c описанием правил покупки и заказа картин
//6. Клиент отправлят запрос /info/contacts, ервер возвращает страницу с контактами

// FIXME: + запросы на добавление статей и картин
*/









 ?>