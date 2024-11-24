<title><?= ucfirst($page) ?> - Ds Restau</title>
<?php include_once 'views/includes/head.php';
          include_once 'views/includes/header.php';
    ?>
<section class="home" id="home">

    <div class="home-left">
    <?php
  Flash('register');
  if (isset($_GET['etape'])) {
    switch ($_GET['etape']) {
      case 'enterEmail':
        include_once "views/registers/enterEmail.php";
        break;

      case 'confirmerCompte':
        if (isset($_COOKIE['EMAIL']) && !empty($_COOKIE['EMAIL'])) {
          include_once "views/register/confirmerCompte.php";
        } else {
          missingData();
        }
        break;

      case 'userAccountData':
        if (isset($_COOKIE['EMAIL']) && !empty($_COOKIE['EMAIL'])) {
          include_once "views/register/userAccountData.php";
        } else {
          missingData();
        }
        break;


      case 'definirAvatar':
        if (isset($_COOKIE['EMAIL']) && !empty($_COOKIE['EMAIL'])) {
          include_once "views/register/definirAvatar.php";
        } else {
          missingData();
        }
        break;

      default:
        include_once "views/register/enterEmail.php";
        break;
    }
  } else if (!isset($_GET["etape"]) || empty($_GET["etape"])) {
    include_once "views/register/enterEmail.php";
  }




  ?>
      <!-- <div class="d-flex justify-content-center py-4">
        <a href="?page=home" class="logo d-flex align-items-center w-auto">
          <img src="assets/img/logo.png" alt="">
          <span class="d-none d-lg-block text-warning">DS Restau</span>
        </a>
      </div>

      <div class="card mb-3">
        <div class="card-body">

          <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4 text-warning">Creer un compte</h5>
            <p class="text-center small">Entrer vos données personnels pour créer un commpte</p>
          </div>
          <form method="POST" class="row g-3 needs-validation" novalidate>
          <div class="col-12">
            <button class="btn btn-warning w-100" type="submit">creer un compte</button>
          </div>
          <div class="col-12">
            <p class="small mb-0">Vous avez deja un compte? <a href="?page=login">Se connecter</a></p>
          </div>
        </form>

        </div>
      </div> -->
    </div>


  <div class="home-right d-none d-lg-inline-block" style="margin-top: 1cm;">

    <img src="./assets/images/food1.png" alt="food image" class="food-img food-1" width="200" loading="lazy">
    <img src="./assets/images/food2.png" alt="food image" class="food-img food-2" width="200" loading="lazy">
    <img src="./assets/images/food3.png" alt="food image" class="food-img food-3" width="200" loading="lazy">

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