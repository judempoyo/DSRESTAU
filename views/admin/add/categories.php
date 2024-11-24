<title> <?php $page = "commande"; ?>
  <?= ucfirst($page) ?> - Ds Restau</title>
<?php include_once 'includes/head.php';
include_once 'includes/header.php';

$categorieAModifier = $_SESSION['categorieAModifier'];
$_SESSION['categorieAModifier'] = "";
unset($_SESSION['categorieAModifier']);

?>
<section class="container homeAdmin" id="home">

  <div class="col-lg-6 col-6 offset-3">

    <div class="row">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">ajouter des categories</h5>
          <form action="../../../index.php?page=admin" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="<?php
                                                      switch ($_GET['action']) {
                                                        case 'add':
                                                          echo 'ajouterCategorie';
                                                          break;
                                                        case 'edit':
                                                          echo 'modifierCategorie';
                                                          break;
                                                      }
                                                      /* if(isset($_GET['idCategorie'])) echo 'modifierCategorie';
                elseif(!isset($_GET['idCategorie']))
                 echo 'ajouterCategories'; */ ?>">
            <input type="hidden" name="idCategorie" value="<?php if (isset($_GET['idCategorie']))  echo $categorieAModifier->idCategorie; ?>">
            <div class="row">
              <div class="col-12">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom" value="<?php if (isset($_GET['idCategorie']))  echo $categorieAModifier->nom ?>" required>
                <div class="invalid-feedback">veuillez saisir un nom</div>
              </div>

              <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" maxlength="255" row="5" col="40"><?php if (isset($_GET['idCategorie']))  echo $categorieAModifier->description ?></textarea>
              </div>


              <div class="row mt-3">
                <button class="w-25 btn btn-warning" type="submit">Valider</button>
              </div>
            </div>
          </form>

        </div>
      </div>

    </div>
  </div>

</section>

</main>

<?php include_once 'includes/footer.php'; ?>
</body>

</html>