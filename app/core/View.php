<?php
namespace App\Core;

class View {
    private $layout = 'default';
    
    public function render($view, $data = []) {
        $viewContent = $this->renderView($view, $data);
        return $this->renderLayout($viewContent, $data);
    }
    
    private function renderView($view, $data) {
        extract($data);
        
        $viewPath = "../app/views/" . $view . ".php";
        if (!file_exists($viewPath)) {
            throw new \Exception("Vue non trouvée: " . $viewPath);
        }
        
        ob_start();
        include $viewPath;
        return ob_get_clean();
    }
    
    private function renderLayout($content, $data) {
        extract($data);
        
        $layoutPath = "../app/views/layouts/" . $this->layout . ".php";
        if (!file_exists($layoutPath)) {
            throw new \Exception("Layout non trouvé: " . $layoutPath);
        }
        
        ob_start();
        include $layoutPath;
        return ob_get_clean();
    }
    
    public function setLayout($layout) {
        $this->layout = $layout;
    }
}
