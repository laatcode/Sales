<?php
namespace App\Controllers;

class BaseController {

  protected $twig;

  public function __construct() {
    $loader = new \Twig\Loader\FilesystemLoader( __DIR__ . '/../views');
    $this->twig = new \Twig\Environment($loader, [
      'cache' => false
    ]);
  }

  public function render($filename, $data = []) {
    return $this->twig->render($filename, $data);
  }
}
 ?>
