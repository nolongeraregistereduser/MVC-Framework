<?php

namespace App\Core;

abstract class Controller
{
    protected function view(string $path, array $data = []): void
    {
        extract($data);
        require_once __DIR__ . "/../views/{$path}.php";
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
