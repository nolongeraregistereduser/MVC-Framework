<?php use App\Core\Security; ?>

<div class="card mx-auto" style="max-width: 500px;">
    <div class="card-body">
        <h1 class="card-title text-center mb-4">Connexion</h1>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <?= Security::escape($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="/login">
            <!-- CSRF Token -->
            <input type="hidden" name="csrf_token" value="<?= Security::generateCsrfToken() ?>">
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </div>
        </form>
    </div>
</div> 