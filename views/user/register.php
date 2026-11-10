<section class="login">

<form action="?route=register" method="POST">


     <h2>Création du comtpe</h2>
     <?php if ($success): ?>
                   <div class="alert theme-success" role="alert">
                        Inscription réussie
                    </div>
                <?php endif; ?>

              <?php  if (!empty($erreurs)): ?>
                    <div class="alert theme-danger" role="alert">
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
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password"required>
  </div>
  <div class="mb-3">
    <label for="password2" class="form-label">Confirmer le mot de passe</label>
    <input type="password" class="form-control" id="password2" name="password2"required>
  </div>
  <button type="submit" class="btn-solid theme-primary">Se connecter</button>
  <p class="mt-2">Déjà un compte ? <a href="?route=login">Se connecter ici</a></p>



</form>

</section>