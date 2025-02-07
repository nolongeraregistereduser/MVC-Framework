<?php
use App\Core\Session;
use App\Core\ACL;
?>

<div class="container">
    <h1>Dashboard Administrateur</h1>
    <p>Bienvenue, <?= htmlspecialchars(Session::get('user_email')) ?></p>

    <?php if (ACL::check('users', 'create')): ?>
        <a href="/MVC-Framework/public/admin/users/create" class="btn btn-primary">
            Créer un utilisateur
        </a>
    <?php endif; ?>

    <?php if (ACL::check('settings', 'edit')): ?>
        <a href="/MVC-Framework/public/admin/settings" class="btn btn-secondary">
            Paramètres
        </a>
    <?php endif; ?>
</div>