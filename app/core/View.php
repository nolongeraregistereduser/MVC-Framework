<?php

namespace App\Core;

class View
{
    public static function render(string $path, array $data = []): void
    {
        // Extraire les données pour les rendre disponibles dans la vue
        extract($data);
        
        // Chemin complet vers la vue
        $viewPath = __DIR__ . "/../views/{$path}.php";
        
        // Vérifier si le fichier existe
        if (!file_exists($viewPath)) {
            throw new \Exception("La vue {$path} n'existe pas");
        }
        
        // Démarrer la temporisation de sortie
        ob_start();
        
        // Inclure la vue
        require $viewPath;
        
        // Récupérer le contenu et nettoyer la temporisation
        $content = ob_get_clean();
        
        // Inclure le layout par défaut si existe
        $layoutPath = __DIR__ . "/../views/layouts/default.php";
        if (file_exists($layoutPath)) {
            require $layoutPath;
        } else {
            echo $content;
        }
    }
}
