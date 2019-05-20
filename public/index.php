<?php
require __DIR__ . '/../vendor/autoload.php';
use Phroute\Phroute\RouteCollector;

$route = $_GET['route'] ?? '/';
$router = new RouteCollector();

$router->controller('/', App\Controllers\IndexController::class);

try {
  $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
  $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);
  echo $response;
} catch(Phroute\Phroute\Exception\HttpRouteNotFoundException $e) {
  echo "Ruta no encontrada";
} catch (Phroute\Phroute\Exception\HttpMethodNotAllowedException $e) {
  echo "Método no encontrado";
}
 ?>
