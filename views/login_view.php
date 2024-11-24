<title><?= ucfirst($page) ?> - Ds Restau </title>
<?php include_once 'views/includes/head.php';
include_once 'views/includes/header.php';
?>
<section class="home" id="home">
  <div class="home-left">
    <div class="d-flex justify-content-center py-4">
      <a href="?page=home" class="d-flex align-items-center w-auto logo">
        <img src="assets/img/logo.png" alt="">
        <span class="d-lg-block text-warning d-none">DS Restau</span>
      </a>
    </div><!-- End Logo -->

    <div class="mb-3 card">
      <div class="card-body">

        <div class="pt-4 pb-2">
          <h5 class="pb-0 text-center text-warning card-title fs-4">Se connecter</h5>
          <p class="text-center small">Entrer vos coordonnées pour vous connectez</p>
        </div>
        <?php if (isset($_GET['redirect']))
          Flash('login') ?>
        <form method="post" class="g-3 needs-validation row" novalidate>
          <input type="hidden" name="type" value="login">
          <div class="col-12">
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
          </div>
          <div class="col-12">
            <p class="mb-0 small">Vous n'avez pas de compte? <a href="?page=register">Creer un compte</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="home-right d-none d-lg-inline-block" style="margin-top: 1cm;">

    <img src="./assets/images/food1.png" alt="food image" class="food-1 food-img" width="200" loading="lazy">
    <img src="./assets/images/food2.png" alt="food image" class="food-2 food-img" width="200" loading="lazy">
    <img src="./assets/images/food3.png" alt="food image" class="food-3 food-img" width="200" loading="lazy">

    <img src="./assets/images/dialog-1.svg" alt="dialog" class="dialog dialog-1" width="230">
    <img src="./assets/images/dialog-2.svg" alt="dialog" class="dialog dialog-2" width="230">

    <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-1" width="25">
    <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-2" width="15">
    <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-3" width="30">
    <img src="./assets/images/ring.svg" alt="ring shape" class="shape shape-4" width="60">
    <img src="./assets/images/ring.svg" alt="ring shape" class="shape shape-5" width="40">

  </div>
</section>

</main>

<?php include_once 'views/includes/footer.php'; ?>
</body>

</html>

</html>

</html>