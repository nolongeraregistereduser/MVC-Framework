<?php use App\Core\Session; ?>

<div class="container">
    <h1>Dashboard Administrateur</h1>
    <p>Bienvenue, <?= htmlspecialchars(Session::get('user_email')) ?></p>
    <!-- Ajoutez ici le contenu du dashboard admin -->
</div> 