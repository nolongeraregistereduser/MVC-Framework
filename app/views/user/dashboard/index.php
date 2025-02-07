<?php use App\Core\Session;
use App\Core\Security; ?>

<div class="container">
    <h1>Dashboard Utilisateur</h1>
    <p>Bienvenue, <?= Security::escape(Session::get('user_email')) ?></p>
    
    <?php if (isset($userData)): ?>
        <div class="user-info">
            <!-- Toujours échapper les données affichées -->
            <p>Nom: <?= Security::escape($userData->name) ?></p>
            <p>Email: <?= Security::escape($userData->email) ?></p>
        </div>
    <?php endif; ?>
</div> 