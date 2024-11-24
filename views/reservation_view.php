<title><?= ucfirst($page) ?> - Ds Restau </title>
<?php include_once 'views/includes/head.php';
include_once 'views/includes/header.php';
?>
<section class="container homeAdmin" id="home">
    <!-- <div class="d-flex justify-content-center py-4">
      <a href="?page=home" class="d-flex align-items-center w-auto logo">
        <img src="assets/img/logo.png" alt="">
        <span class="d-lg-block text-warning d-none">DS Restau</span>
      </a>
    </div>End Logo -->
<div class="col-lg-12 col-12">
    <div class="mb-3 card">
      <div class="card-body">

        <div class="pt-4 pb-2">
          <h5 class="pb-0 text-center text-warning card-title fs-4">Reserver</h5>
          <p class="text-center small">Entrer vos coordonnées pour Reserver une table</p>
        </div>
        <?php Flash('reservation');
        ?>

<form method="post" class="g-3 needs-validation row" novalidate>
          <input type="hidden" name="action" value="reservation">
          <div class="row">
            <div class="col-md-4 col-6 ">
              <label for="date" class="form-label">Date</label>
              <input type="date" name="date" class="form-control" id="date" required>
              <div class="invalid-feedback">selectionner une date</div>
            </div>
            <div class="col-md-4 col-6">
              <label for="heure" class="form-label">Heure</label>
              <input type="time" name="heure" class="form-control" id="heure" required>
              <div class="invalid-feedback">selectionner une heure</div>
            </div>
            <div class="col-md-4 col-6">
              <label for="nombrePersonne" class="form-label">Nombre de Personne</label>
              <select name="nombrePersonne" id="nombrePersonne" class="form-control form-select" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
              </select>
              <div class="invalid-feedback">selectionner votre le nombre de personne</div>
            </div>
            <div class="row mt-3">
              <label for="commentaire" class="form-label">commentaire</label>
              <textarea name="commentaire" id="commentaire" class="form-control" maxlength="255"></textarea>
            </div>
            <div class="row mt-3">
            <button class="w-25 btn btn-warning" type="submit">Reserver</button>
            </div>
          </div>

          <!-- <div class="col-12">
            <label for="email" class="form-label">E-mail</label>
            <div class="input-group has-validation">
              <span class="input-group-text" id="inputGroupPrepend">@</span>
              <input type="text" name="email" class="form-control" id="email" required>
              <div class="invalid-feedback">Entrer votre email Svp</div>
            </div>
          </div>
          <div class="col-12">
            <label for="motdepasse" class="form-label">Mot de passe</label>
            <input type="password" name="motdepasse" class="form-control" id="motdepasse" required>
            <div class="invalid-feedback">entrer votre mot de passe svp</div>
          </div>
          <div class="col-12">
            <button class="w-100 btn btn-warning" type="submit">Se connecter</button>
          </div> -->
          
        </form>
      </div>
    </div>
    </div>
</section>

</main>

<?php include_once 'views/includes/footer.php'; ?>
</body>

</html>

</html>

</html>