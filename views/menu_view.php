<?php include_once 'views/includes/head.php';; ?>
<title><?= ucfirst($page) ?> - Ds Restau</title>
<?php
include_once 'views/includes/header.php';
?>
<main>
  <section id="menu" class="menu">
    <div class="container" data-aos="fade-up">

      <div class="section-header pt-5">
        <p>Consultez notre <span>DS Menu</span></p>
      </div>

      <div class="row">
        <div class="col-md-4 col-12  offset-md-4"><?php Flash('menu') ?></div>
      </div>
      <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <li class="nav-item">
          <a href="?page=menu" class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tout">
            <h4>Tout</h4>
          </a>
        </li><!-- End tab nav item -->
        <?php foreach ($toutesLesCategories as $categorie) : ?>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#<?= $categorie->nom ?>">
              <h4><?= $categorie->nom ?></h4>
            </a>
          </li><!-- End tab nav item -->
        <?php endforeach ?>
      </ul>

      <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

        <div class="tab-pane fade active show" id="tout">

          <div class="tab-header text-center">
            <p>Menu</p>
            <h3>Tout</h3>
          </div>

          <div class="row gy-5">
            <?php foreach ($tousLesPlats as $plat) : ?>
              <div class="col-lg-3 col-6 menu-item">

                <?php $image = $initImagePlat->afficherPremiereImagePlatParPlat($plat->idPlat) ?>
                <a href="./assets/images/upload/plats/<?= $image->photo ?>" class="glightbox"><img src="./assets/images/upload/plats/<?= $image->photo ?>" class="card-img border rounded-5" width="100%" height="200" alt="une image"></a>
                <h4><?= $plat->nom ?></h4>
                <p class="ingredients">
                  <?= $plat->description ?>
                </p>
                <p class="price">
                  <?= $plat->prix . ' ' ?>CDF
                </p>
                <form action="" method="post" class="row">

                  <div class="col-lg-8 col-6">
                    <button class="btn btn-warning" name="ajouterPanier">Ajouter <div class="d-none d-lg-inline">au panier</div></button>
                  </div>
                  <div class="col-lg-4 col-4">
                    <input type="hidden" name="action" value="ajouterPanier">
                    <input type="hidden" name="prix" value="<?= $plat->prix ?>">
                    <input type="hidden" name="nom" value="<?= $plat->nom ?>">
                    <input type="hidden" name="idPlat" value="<?= $plat->idPlat ?>">
                    <input type="number" name="qte" id="qte" min="1" value="1" max="<?= $plat->qte ?>" class="form-control">
                  </div>
                </form>


              </div><!-- Menu Item -->
            <?php endforeach ?>

          </div>
        </div><!-- End Starter Menu Content -->

        <?php foreach ($toutesLesCategories as $categorie) : ?>
          <div class="tab-pane fade" id="<?= $categorie->nom ?>">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3><?= $categorie->nom ?></h3>
            </div>
            <?php
            $platParCategorie = $initPlat->afficherPlatParCategorie($categorie->idCategorie); ?>
            <div class="row gy-5">

              <?php foreach ($platParCategorie as $plat) : ?>
                <div class="col-lg-3 col-6 menu-item">
                  <?php $image = $initImagePlat->afficherPremiereImagePlatParPlat($plat->idPlat) ?>
                  <a href="./assets/images/upload/plats/<?= $image->photo ?>" class="glightbox"><img src="./assets/images/upload/plats/<?= $image->photo ?>" class="card-img border rounded-5" width="100%" height="200" alt="une image"></a>
                  <h4><?= $plat->nom ?></h4>
                  <p class="ingredients">
                    <?= $plat->description ?>
                  </p>
                  <p class="price">
                    <?= $plat->prix . ' ' ?>CDF
                  </p>
                  <form action="" method="post" class="row">

                    <div class="col-lg-8 col-6">
                      <button class="btn btn-warning" name="ajouterPanier">Ajouter <div class="d-none d-lg-inline">au panier</div></button>
                    </div>
                    <div class="col-lg-4 col-4">
                      <input type="hidden" name="action" value="ajouterPanier">
                      <input type="hidden" name="prix" value="<?= $plat->prix ?>">
                      <input type="hidden" name="nom" value="<?= $plat->nom ?>">
                      <input type="hidden" name="idPlat" value="<?= $plat->idPlat ?>">
                      <input type="number" name="qte" id="qte" min="1" value="1" max="<?= $plat->qte ?>" class="form-control">
                    </div>
                  </form>


                </div><!-- Menu Item -->
              <?php endforeach ?>
            </div>
          </div><!-- End Breakfast Menu Content -->

        <?php endforeach ?>

      </div>


    </div>
  </section>

</main>

<?php include_once 'views/includes/footer.php'; ?>

</body>

</html>