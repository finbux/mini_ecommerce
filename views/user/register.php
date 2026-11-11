<section class="login">

<form action="?route=register" method="POST">


     <h2>Création du comtpe</h2>
     <?php if ($success): ?>
        <div class="alert alert-success" role="alert">
            Inscription réussie
        </div>
    <?php endif; ?>

  <?php  if (!empty($erreurs)): ?>
        <div class="alert alert-danger" role="alert">
            <i class="fa-solid fa-triangle-exclamation me-2" aria-hidden="true"></i>
            Le formulaire contient des erreurs. Corrigez les champs signalés.
        </div>
    <?php endif; ?>

  <div class="mb-3">
    <label for="pseudo" class="form-label">Pseudo</label>
    <input type="text" class="form-control" id="pseudo" name="pseudo" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input 
    type="email" 
    class="form-control <?= isset($erreurs['email']) ? ' is-invalid' : '' ; ?>" 
    id="email" name="email" required
  <?php if (isset($erreurs['email'])): ?>aria-invalid="true" aria-describedby="email-erreur"<?php endif; ?>>
    <?php if (isset($erreurs['email'])): ?>
        <div id="email-erreur" class="invalid-feedback"><?= htmlspecialchars($erreurs['email']) ?></div>
    <?php endif; ?>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" class="form-control <?= isset($erreurs['password']) ? ' is-invalid' : '' ; ?>"  id="password" name="password"required
  <?php if (isset($erreurs['password'])): ?>aria-invalid="true" aria-describedby="pwd-erreur"<?php endif; ?>>
      <?php if (isset($erreurs['password'])): ?>
        <div id="pwd-erreur" class="invalid-feedback"><?= htmlspecialchars($erreurs['password']) ?></div>
      <?php endif; ?>
  </div>
  <div class="mb-3">
    <label for="password2" class="form-label">Confirmer le mot de passe</label>
    <input type="password" class="form-control <?= isset($erreurs['mdp2']) ? ' is-invalid' : '' ?>" id="password2" name="password2"required 
    <?php if (isset($erreurs['mdp2'])): ?>aria-invalid="true" aria-describedby="mdp2-erreur"<?php endif; ?>>
    
        <?php if (isset($erreurs['mdp2'])): ?>
            <div id="mdp2-erreur" class="invalid-feedback"><?= htmlspecialchars($erreurs['mdp2']) ?></div>
        <?php endif; ?>
  
    </div>
  <button type="submit" class="btn-solid theme-primary">Se connecter</button>
  <p class="mt-2">Déjà un compte ? <a href="?route=login">Se connecter ici</a></p>



</form>

</section>