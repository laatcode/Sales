<?php
namespace App\Controllers;

class BaseController {

  protected $twig;

  public function __construct() {
    $loader = new \Twig\Loader\FilesystemLoader( __DIR__ . '/../views');
    $this->twig = new \Twig\Environment($loader, [
      'cache' => false
    ]);

    $this->twig->addFilter(new \Twig\TwigFilter('url', function ($path) {
      $URL = 'http://' . $_SERVER['SERVER_NAME'];
      $BASE_URL = $URL . str_replace('public/' . basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
      return $BASE_URL . $path;
    }));

  }

  public function render($filename, $data = []) {
    return $this->twig->render($filename, $data);
  }
}
 ?>
