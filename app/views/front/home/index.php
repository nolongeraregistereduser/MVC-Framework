<div class="card">
    <div class="card-body">
        <h1 class="card-title">Bienvenue sur Notre Framework MVC</h1>
        <p class="card-text">Cette page generated pour le fonctionnement du home controller.</p>
        
        <?php if (isset($users) && count($users) > 0): ?>
            <h3>Liste des utilisateurs :</h3>
            <ul class="list-group">
                <?php foreach ($users as $user): ?>
                    <li class="list-group-item">
                        <?= htmlspecialchars($user->username) ?> - 
                        <?= htmlspecialchars($user->email) ?> - 
                        Role: <?= htmlspecialchars($user->role) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Aucun utilisateur trouvé dans la base de données.</p>
        <?php endif; ?>
    </div>
</div> 