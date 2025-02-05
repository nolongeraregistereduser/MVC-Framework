<?php

namespace App\Core;

abstract class Controller
{
    protected function view(string $path, array $data = []): void
    {
        View::render($path, $data);
    }
    
    protected function json($data): void
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    
    protected function redirect(string $url): void
    {
        header("Location: {$url}");
        exit;
    }
}
