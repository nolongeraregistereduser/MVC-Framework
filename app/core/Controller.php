<?php
namespace App\Core;

abstract class Controller {
    protected $view;
    
    public function __construct() {
        $this->view = new View();
    }
    
    protected function render($view, $data = []) {
        return $this->view->render($view, $data);
    }
    
    protected function redirect($path) {
        header('Location: ' . $path);
        exit;
    }
    
    protected function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
