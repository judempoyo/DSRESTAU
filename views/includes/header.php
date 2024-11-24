<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a class="<?= $page == '' ? 'active' : '' ?>" href="?page=home" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="text-warning">DS<i>.</i></h1>
      </a>

      <?php if (isset($_SESSION['estAdmin']) && $_SESSION['estAdmin']) :  ?>

        <nav id="navbar" class="navbar">
          <ul>
            <li class="active"><a class="<?= $_GET['souspage'] == 'tdb' ? 'active' : '' ?>" href="?page=admin&souspage=tdb">Tableau de bord</a></li>
            <li class=""><a class="<?= $_GET['souspage'] == 'plats' ? 'active' : '' ?>" href="?page=admin&souspage=plats">Plats</a></li>
            <li class=""><a class="<?= $_GET['souspage'] == 'categories' ? 'active' : '' ?>" href="?page=admin&souspage=categories">Categories</a></li>
            <li class=""><a class="<?= $_GET['souspage'] == 'commandes' ? 'active' : '' ?>" href="?page=admin&souspage=commandes">Commandes</a></li>
            <li class=""><a class="<?= $_GET['souspage'] == 'reservations' ? 'active' : '' ?>" href="?page=admin&souspage=reservations">Reservations</a></li>
            <li class=""><a class="<?= $_GET['souspage'] == 'utilisateurs' ? 'active' : '' ?>" href="?page=admin&souspage=utilisateurs">utilisateurs</a></li>

          </ul>
        </nav><!-- .navbar -->


        <nav class="header-nav ms-auto ml-3">
          <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3 m-5">
              <?php if (isset($_SESSION['id']))
                $utilisateurCourant = $init->donneesUtilisateur();

              ?>

              <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img src="./assets/images/upload/profiles/<?= $utilisateurCourant->avatar ?>" alt="Profile" class="rounded-circle">
                <span class="d-none d-md-block dropdown-toggle ps-2"><?php if (!empty($_SESSION['nom'])) echo $_SESSION['nom'];
                                                                      else "Divin" ?></span>
              </a><!-- End Profile Iamge Icon -->

              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                  <h6><?php if (!empty($_SESSION['nom'])) echo $_SESSION['nom'];
                      else "Divin" ?></h6>
                  <span><?php if (!empty($_SESSION['email'])) echo $_SESSION['email'];
                        else "Divin@gmail.com" ?></span>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li>
                  <a class="dropdown-item d-flex align-items-center" href="">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li>
                  <a class="dropdown-item d-flex align-items-center" href="#disablebackdrop" data-bs-toggle="modal" data-bs-target="#disablebackdrop">
                    <i class="bi bi-gear"></i>
                    <span>Parametres</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li>
                  <a class="dropdown-item d-flex align-items-center" href="?page=<?= $page ?>&q=logout">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Se deconnecter</span>
                  </a>
                </li>

              </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

          </ul>

        </nav>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>




      <?php else : ?>


        <nav id="navbar" class="navbar">
          <ul>
            <li class=""><a class="<?= $page == 'home' ? 'active' : '' ?>" href="?page=home">Accueil</a></li>
            <li class=""><a class="<?= $page == 'apropos' ? 'active' : '' ?>" href="?page=apropos">A-propos</a></li>
            <li class=""><a class="<?= $page == 'menu' ? 'active' : '' ?>" href="?page=menu">Menu</a></li>
            <li class=""><a class="<?= $page == 'galerie' ? 'active' : '' ?>" href="?page=galerie">Galerie</a></li>
            <?php if (isset($_SESSION['id'])) : ?>
              <li class=""><a class="<?= $page == 'reservation' ? 'active' : '' ?>" href="?page=reservation">Reservation</a></li>
            <?php else : ?>
              <?php Flash("login", "Vous devez vous connectez avant de Reserver") ?>
              <li class=""><a class="<?= $page == 'reservation' ? 'active' : '' ?>" href="?page=login&redirect=reservation">Reservation</a></li>
            <?php endif ?>
            <li class=""><a class="<?= $page == 'contact' ? 'active' : '' ?>" href="?page=contact">Contactez nous</a></li>
            <?php if (isset($_SESSION['id'])) : ?>
              <li class=""><a class="<?= $page == 'commandez' ? 'active' : '' ?>" href="?page=commandez">Commandez</a></li>
            <?php else : ?>
              <?php Flash("login", "Vous devez vous connectez avant de Commander") ?>
              <li class=""><a class="<?= $page == 'commandez' ? 'active' : '' ?>" href="?page=login&redirect=commandez">Commandez</a></li>
            <?php endif ?>
            <?php if (!isset($_SESSION['id'])) : ?>
              <li class="">

                <a class="<?= $page == 'login' ? 'active' : '' ?>" href="?page=login" class="btn btn-warning m-2 text-dark">Se connecter</a>
              </li>
            <?php endif ?>

          </ul>
        </nav><!-- .navbar -->



        <nav class="header-nav ms-auto ">
          <ul class="d-flex align-items-center">

            <li class="nav-item dropdown pe-3 m-5">
              <a class="nav-link nav-icon " href="#" data-bs-toggle="modal" data-bs-target="#disablebackdrop">
                <!-- <a class="nav-link nav-icon " href="#" data-bs-toggle="dropdown"> -->
                <span class="big"><i class="bi bi-cart4"></i></span>
                <?php
                if (isset($_SESSION['panier'])) {
                  $total = count($_SESSION['panier']);
                } else {
                  $total = 0;
                }
                ?>
                <span class="badge bg-warning badge-number"><?= $total ?></span>
              </a>
              <!--</a> End Notification Icon -->

              <div class="modal fade my-5 my-lg-0" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"><strong>Votre panier</strong></h5>
                      <div class="justify-content-center justify-content-lg-around">
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                      </div>
                    </div>
                    <div class="modal-body">
                      <div id="" class="row">
                        <div class="container" data-aos="fade-up">
                          <?php
                          if (isset($_SESSION['panier']) && count($_SESSION['panier']) > 0) : ?>

                            <div class="table-responsive">
                              <table class="table datatable">
                                <thead>
                                  <tr>
                                    <th scope="col">Qte</th>
                                    <th scope="col">Nom Plat</th>
                                    <th scope="col">PU</th>
                                    <th scope="col">ST</th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <?php $total = 0 ?>
                                <tbody>
                                  <?php
                                  if (isset($_SESSION['panier'])) :
                                    foreach ($_SESSION['panier'] as $key => $value) :
                                      $sr = $key + 1; // Fixing the $sr value
                                      $st = $value['prix'] * $value['qte'];
                                      $total += $st;
                                  ?>
                                      <tr class="">
                                        <td><?= $value['qte'] ?></td>
                                        <td><?= $value['nom'] ?></td>
                                        <td><?= $value['prix'] . " " ?><small>CDF</small></td>
                                        <td><?= $st . " " ?><small>CDF</small></td>

                                        <td>
                                          <form action='?page=menu' method='POST'>
                                            <button name='retirerPanier' class='btn btn-danger'>
                                              <i class="bi bi-trash"></i> </button>
                                            <input type="hidden" name="action" value="retirerPanier">
                                            <input type='hidden' name='idPlat' value="<?= $value['idPlat'] ?>">
                                          </form>
                                        </td>
                                      </tr>
                                  <?php

                                    endforeach;
                                  endif ?>
                                </tbody>
                                <tfoot>
                                  <td colspan="3"><strong>Total</strong></td>
                                  <td scope="row"><strong><?= $total . " " ?><small>CDF</small></strong>
                                    <!-- p class="product-price">
                                    <span class="small" id='gtotal'></span>
                                  </p> -->
                                  </td>
                                </tfoot>
                              </table>
                            </div>
                          <?php else : ?>
                            <div class="text-center">
                              <h5 class="card-title">Vous n'avez rien dans votre panier </h5>
                              <a class="<?= $page == '' ? 'active' : '' ?>" href="?page=menu" class="btn btn-warning">Ajouter au panier</a>
                            </div>
                          <?php endif ?>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <?php
                      if (isset($_SESSION['panier']) && count($_SESSION['panier']) > 0) :
                      ?>
                        <form action="?page=commandez" method="POST">
                          <?php
                          // Add hidden input fields for idPlat, prix, qte
                          foreach ($_SESSION['panier'] as $key => $value) { ?>
                            <input type="hidden" name="action" value="commander">
                            <!-- <input type='hidden' name='idPlat[]' value='<?php //$value['idPlat']
                                                                              ?>'>
                            <input type='hidden' name='prix[]' value='<?php //$value['prix']
                                                                      ?>'>
                            <input type='hidden' name='qte[]' value='<?php //$value['qte']
                                                                      ?>'> -->
                          <?php } ?>
                          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                          <?php if (isset($_SESSION['id'])) : ?>
                            <button name='commandez' class="btn btn-warning">Passer la commande</button>
                          <?php else : ?>
                            <?php Flash("login", "Vous devez vous connectez avant de commander") ?>
                            <a class="<?= $page == '' ? 'active' : '' ?>" href="?page=login" class="btn btn-warning">Passer la Commander</a>
                          <?php endif ?>

                        </form>
                      <?php
                      endif;
                      ?>
                    </div>
                  </div>
                </div>



                <?php if (isset($_SESSION['id'])) :
                  $utilisateurCourant = $init->donneesUtilisateur();

                ?>

            <li class="nav-item dropdown pe-3 ml-lg-5 ml-2">

              <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img src="./assets/images/upload/profiles/<?= $utilisateurCourant->avatar ?>" alt="Profile" class="rounded-circle">
                <span class="d-none d-md-block dropdown-toggle ps-2"><?php if (!empty($_SESSION['nom'])) echo $_SESSION['nom'];
                                                                      else "Divin" ?></span>
              </a><!-- End Profile Iamge Icon -->

              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                  <h6><?php if (!empty($_SESSION['nom'])) echo $_SESSION['nom'];
                      else "Divin" ?></h6>
                  <span><?php if (!empty($_SESSION['email'])) echo $_SESSION['email'];
                        else "Divin@gmail.com" ?></span>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li>
                  <a class="dropdown-item d-flex align-items-center" href="?page=profile">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li>
                  <a class="dropdown-item d-flex align-items-center" href="">
                    <i class="bi bi-gear"></i>
                    <span>Parametres</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li>
                  <a class="dropdown-item d-flex align-items-center" href="?page=<?= $page ?>&q=logout">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Se deconnecter</span>
                  </a>
                </li>

              </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

          </ul>
        <?php endif  ?>

        </nav>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>



      <?php endif ?>

    </div>
  </header><!-- End Header -->

  <main>
    <!-- main container -->

    <!-- <script>
      function subTotal() {
        console.log("Running subTotal()");
        var gt = 0;
        var iprix = document.getElementsByClassName('iprix');
        var iqte = document.getElementsByClassName('iqte');
        var itotal = document.getElementsByClassName('itotal');
        var gtotal = document.getElementById('gtotal');

        for (var i = 0; i < iprix.length; i++) {
          var prix = parseFloat(iprix[i].value);
          var qte = parseInt(iqte[i].value);
          var total = prix * qte;
          itotal[i].innerText = total + '₹'; // Show the total for each item
          gt += total;
        }

        gtotal.innerText = 'Total: ' + gt + '₹'; // Show the grand total
      }

      subTotal();
    </script> -->