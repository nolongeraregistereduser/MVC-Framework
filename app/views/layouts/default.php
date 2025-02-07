<?php use App\Core\Session; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mon Framework MVC' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/MVC-Framework/public/">Mon Framework</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/MVC-Framework/public/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/MVC-Framework/public/contact">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <?php if (Session::has('user_id')): ?>
                        <?php if (Session::get('user_role') === 'admin'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/MVC-Framework/public/admin/dashboard">Dashboard Admin</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/MVC-Framework/public/user/dashboard">Mon Dashboard</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <span class="nav-link">
                                <?= htmlspecialchars(Session::get('user_email')) ?>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/MVC-Framework/public/logout">Déconnexion</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/MVC-Framework/public/login">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/MVC-Framework/public/register">Inscription</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?= $content ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 