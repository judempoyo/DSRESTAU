
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header">
    <div class="d-flex justify-content-between align-items-center container">

      <a href="?page=home" class="d-flex align-items-center logo me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="text-warning">DS<i>.</i></h1>
      </a>

      <?php if(isset($_SESSION['estAdmin']) && $_SESSION['estAdmin']) :  ?>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="../../../index.php?page=admin&souspage=tdb">Tableau de bord</a></li>
          <li><a href="../../../index.php?page=admin&souspage=plats">Plats</a></li>
          <li><a href="../../../index.php?page=admin&souspage=categories">Categories</a></li>
          <li><a href="../../../index.php?page=admin&souspage=commandes">Commandes</a></li>
          <li><a href="../../../index.php?page=admin&souspage=reservations">Reservations</a></li>
          <li><a href="../../../index.php?page=admin&souspage=utilisateurs">utilisateurs</a></li>

        </ul>
      </nav><!-- .navbar -->


      <nav class="ml-3 header-nav ms-auto">
        <ul class="d-flex align-items-center">
          <li class="m-5 dropdown nav-item pe-3">
            
            <a class="d-flex align-items-center nav-link nav-profile pe-0" href="#" data-bs-toggle="dropdown">
              <img src="../../../../assets/images/upload/profiles/<?= $_SESSION['avatar']?>" alt="Profile" class="rounded-circle">
              <span class="d-md-block d-none dropdown-toggle ps-2">
                <?php if(!empty($_SESSION['nom'])) echo $_SESSION['nom']; else "Divin"?>
              </span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-arrow dropdown-menu-end profile">
              <li class="dropdown-header">
                <h6>
                  <?php if(!empty($_SESSION['nom'])) echo $_SESSION['nom']; else "Divin"?>
                </h6>
                <span>
                  <?php if(!empty($_SESSION['email'])) echo $_SESSION['email']; else "Divin@gmail.com"?>
                </span>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="d-flex align-items-center dropdown-item" href="">
                  <i class="bi bi-person"></i>
                  <span>Profile</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="d-flex align-items-center dropdown-item" href="#">
                  <i class="bi bi-gear"></i>
                  <span>Parametres</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="d-flex align-items-center dropdown-item" href="?page=<?=$page?>&q=logout">
                  <i class="bi-box-arrow-right bi"></i>
                  <span>Se deconnecter</span>
                </a>
              </li>

            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->

        </ul>

      </nav>

      <i class="bi bi-list mobile-nav-show mobile-nav-toggle"></i>
      <i class="bi bi-x d-none mobile-nav-hide mobile-nav-toggle"></i>




      <?php else: ?>


      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="?page=home">Accueil</a></li>
          <li><a href="?page=apropos">A-propos</a></li>
          <li><a href="?page=menu">Menu</a></li>
          <li><a href="?page=galerie">Galerie</a></li>
          <li><a href="?page=reservation">Reservation</a></li>
          <li><a href="?page=contact">Contactez nous</a></li>
          <li><a href="?page=commandez">Commandez</a></li>
          <?php if (!isset($_SESSION['id'])) :?>
          <li class="">
            <a href="?page=login" class="m-2 btn btn-warning">Se connecter</a>
          </li>
          <?php endif?>

        </ul>
      </nav><!-- .navbar -->



      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
          
          <li class="ml-5 dropdown nav-item pe-3">
          
            <a class="d-flex align-items-center nav-link nav-profile pe-0" href="#" data-bs-toggle="dropdown">
              <img src="../../../../assets/images/upload/profiles/<?= $_SESSION['avatar?']?>" alt="Profile" class="rounded-circle">
              <span class="d-md-block d-none dropdown-toggle ps-2">
                <?php if(!empty($_SESSION['nom'])) echo $_SESSION['nom']; else "Divin"?>
              </span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-arrow dropdown-menu-end profile">
              <li class="dropdown-header">
                <h6>
                  <?php if(!empty($_SESSION['nom'])) echo $_SESSION['nom']; else "Divin"?>
                </h6>
                <span>
                  <?php if(!empty($_SESSION['email'])) echo $_SESSION['email']; else "Divin@gmail.com"?>
                </span>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="d-flex align-items-center dropdown-item" href="#">
                  <i class="bi bi-person"></i>
                  <span>Profile</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="d-flex align-items-center dropdown-item" href="#" 
                  <i class="bi bi-gear"></i>
                  <span>Parametres</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="d-flex align-items-center dropdown-item" href="?page=<?=$page?>&q=logout">
                  <i class="bi-box-arrow-right bi"></i>
                  <span>Se deconnecter</span>
                </a>
              </li>

            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->

        </ul>
        <?php //endif  ?>

      </nav>

      <i class="bi bi-list mobile-nav-show mobile-nav-toggle"></i>
      <i class="bi bi-x d-none mobile-nav-hide mobile-nav-toggle"></i>



      <?php endif ?>

    </div>
  </header><!-- End Header -->

  <main>
    <!-- main container -->

    <!-- <script>
      function subTotal() {
        console.log("Running subTotal()");
        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var gtotal = document.getElementById('gtotal');

        for (var i = 0; i < iprice.length; i++) {
          var price = parseFloat(iprice[i].value);
          var quantity = parseInt(iquantity[i].value);
          var total = price * quantity;
          itotal[i].innerText = total + '₹'; // Show the total for each item
          gt += total;
        }

        gtotal.innerText = 'Total: ' + gt + '₹'; // Show the grand total
      }

      subTotal();
    </script> -->