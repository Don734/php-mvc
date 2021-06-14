<?
use App\Core\Router;

require_once dirname(__DIR__).'/vendor/autoload.php';

session_start();

$router = new Router;
$router->run();