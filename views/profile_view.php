<?php include_once 'views/includes/head.php'; ?>
<title><?= ucfirst($page) ?> - Site de jude</title>
<?php
include_once 'views/includes/header.php';
?>

<body>

  <?php if (isset($_SESSION["id"])) : ?>
    <main>
      <section class="section profile">
        <div class="row  mt-5 mb-5">

          <div class="col-xl-8 offset-xl-2">

            <?php Flash("profile") ?>
            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered ">

                  <li class="nav-item text-warning">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Modifier le profile</button>
                  </li>

                  <li class="nav-item text-warning">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Modifier Mot de passe</button>
                  </li>

                </ul>
                <div class="tab-content pt-2">

                  <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                    <!-- Profile Edit Form  -->
                    <form method="post" enctype="multipart/form-data">
                      <input type="hidden" name="type" value="modifierUtilisateur">
                      <!-- <div class="col-12 col-lg-6 offset-lg-3"> -->
                      <div class="row mb-3">
                        <label for="imgselect" class="col-form-label">Profile</label>
                        <div>
                          <img src="./assets/images/upload/profiles/<?php if ($utilisateurCourant->avatar !== '') {
                                                                      echo $utilisateurCourant->avatar;
                                                                    } else {
                                                                      echo "default.gif";
                                                                    } ?>" alt="Profile" class="rounded-circle card-img img-thumbnail figure-img" id="champImg">

                          <a class="btn btn-danger m-3" title="Remove my profile image" id="removeimg"><i class="bi bi-trash"></i></a>
                        </div>

                        <div class="row">
                          <input type="file" name="avatar" accept="image/*" id="imgselect" class="form-control" title="selectionnez une photo de profile">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="nom" class="col-md-4 col-lg-3 col-form-label">Nom</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="nom" type="text" class="form-control" id="nom" value="<?= $utilisateurCourant->nom ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="email" type="email" class="form-control" id="Email" disabled value="<?= $utilisateurCourant->email ?>">
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-warning">Sauvegarder</button>
                      </div>
                      <!-- </div> -->
                    </form><!-- End Profile Edit Form -->

                  </div>


                  <div class="tab-pane fade pt-3" id="profile-change-password">


                    <!-- Change Password Form -->
                    <form class="row g-3 needs-validation" method="post" novalidate>
                      <input type="hidden" name="type" value="modifierMotdepasseUtilisateur">

                      <div class="row mb-3">
                        <label for="motdepasse" class="col-md-4 col-lg-3 col-form-label">Mot de passe actuel</label>
                        <div class="col-md-8 col-lg-9">
                          <input type="password" name="motdepasse" autocomplete="motdepasse" class="form-control" id="motdepasse" minlength="6" required>
                          <div class="invalid-feedback">Entrer votre mot de passe actuel svp!</div>
                        </div>

                      </div>

                      <div class="row mb-3">
                        <label for="nouveauMotdepasse" class="col-md-4 col-lg-3 col-form-label">Nouveau Mot de passe</label>
                        <div class="col-md-8 col-lg-9">
                          <input type="password" name="nouveauMotdepasse" autocomplete="nouveauMotdepasse" class="form-control" id="nouveauMotdepasse" minlength="6" required>
                          <div class="invalid-feedback">Entrer votre nouveau mot de passe svp!</div>
                        </div>

                      </div>

                      <div class="row mb-3">
                        <label for="confirmerNouveauMotdepasse" class="col-md-4 col-lg-3 col-form-label">Confirmer Nouveau Mot de passe</label>
                        <div class="col-md-8 col-lg-9">
                          <input type="password" name="confirmerNouveauMotdepasse" autocomplete="confirmerNouveauMotdepasse" class="form-control" id="confirmerNouveauMotdepasse" minlength="6" required>
                          <div class="invalid-feedback">Confirmer Nouveau Mot de passe svp!</div>
                        </div>

                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-warning">Changer le mot de passe</button>
                      </div>
                    </form><!-- End Change Password Form -->

                  </div>

                </div><!-- End Bordered Tabs -->

              </div>
            </div>

          </div>
        </div>
      </section>

    </main>
  <?php endif ?>
  <?php include_once 'views/includes/footer.php'; ?>

</body>

</html>