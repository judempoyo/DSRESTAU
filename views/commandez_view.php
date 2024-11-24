<title><?= ucfirst($page) ?> - Ds Restau </title>
<?php include_once 'views/includes/head.php';
include_once 'views/includes/header.php';

if (isset($_SESSION["id"])) {
  $utilisateurActuel = $init->donneesUtilisateur();
}
?>
<section class="container-fluid homeAdmin" id="home">
  <div class="row">
    <?php Flash('commandez'); ?>
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Passer une commande</h5>

          <!-- Default Accordion -->
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <strong><i class="bi bi-person"></i>Contact</strong>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse <?php if (!isset($_POST['accordionEtapeSuivante'])) echo "show" ?>" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                  <form action="" method="post">
                    <input type="hidden" name="action" value="donneesUtilisateur">
                    <input type="hidden" name="accordionEtapeSuivante" value="collapseTwo">
                    <!-- <input type="hidden" name="idUtilisateur" value="<?php //if (isset($_SESSION['id']))  echo $_SESSION['id'] 
                                                                          ?>"> -->
                    <div class="row">
                      <div class="col-12">
                        <label for="nomClient" class="form-label">Nom</label>
                        <input type="text" name="nomClient" class="form-control" id="nomClient" value="<?php if (!empty($utilisateurActuel)) echo $utilisateurActuel->nom ?>" required>
                        <div class="invalid-feedback">veuillez saisir un nom</div>
                      </div>
                      <div class="col-12">
                        <label for="emailClient" class="form-label">E-mail</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend">@</span>
                          <input type="text" name="emailClient" class="form-control" id="emailClient" value="<?php if (!empty($utilisateurActuel)) echo $utilisateurActuel->email ?>" required>
                          <div class="invalid-feedback">Entrer votre email Svp</div>
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="telephoneClient" class="form-label">Telephone</label>
                        <input type="tel" name="telephoneClient" class="form-control" id="telephoneClient" minlength="10" value="0<?php if (!empty($utilisateurActuel)) echo (int)$utilisateurActuel->telephone ?> " required>
                        <div class="invalid-feedback">entrer votre numero de telephone!</div>
                      </div>




                      <div class="row mt-3 justify-content-end">
                        <button class="btn btn-warning col-12 mt-2 mt-lg-0 col-lg-12" type="submit">Valider</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <strong><i class="bi bi-map"></i> Option de commande</strong>
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse <?php if (isset($_POST['accordionEtapeSuivante']) && $_POST['accordionEtapeSuivante'] == "collapseTwo") echo "show" ?>" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  
                    <section id="menu" class="menu m-0 p-0">
                      <div class="container" data-aos="fade-up">
                        <ul class="nav nav-tabs justify-content-center" data-aos="fade-up" data-aos-delay="200">
                          <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#emporter">
                              <h4> A emporter </h4>
                            </a>
                          </li><!-- End tab nav item -->

                          <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#livraison">
                              <h4>Livraison </h4>
                            </a>
                          </li><!-- End tab nav item -->
                        </ul>

                        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

                          <div class="tab-pane fade" id="livraison">
                            <form action="" method="post">
                              <input type="hidden" name="action" value="adresseUtilisateur">
                              <input type="hidden" name="typeCommande" value="livraison">
                              <input type="hidden" name="accordionEtapeSuivante" value="collapseThree">
                              <!-- <input type="hidden" name="idUtilisateur" value="<?php //if (isset($_SESSION['id']))  echo $_SESSION['id'] 
                                                                                    ?>"> -->
                              <?php if (isset($_SESSION['id'])) :
                                $derniereAdresse = $initAdresse->afficherAdresseParUtilisateur($_SESSION['id']);
                              endif ?>
                              <div class="row">
                                <div class="col-12">
                                  <label for="avenue" class="form-label">Avenue</label>
                                  <input type="text" name="avenue" class="form-control" id="avenue" value="<?php if (!empty($derniereAdresse)) echo $derniereAdresse->avenue ?>" required>
                                  <div class="invalid-feedback">veuillez saisir une avenue</div>
                                </div>
                                <div class="col-12">
                                  <label for="quartier" class="form-label">Quartier</label>
                                  <input type="text" name="quartier" class="form-control" id="quartier" value="<?php if (!empty($derniereAdresse)) echo $derniereAdresse->quartier ?>" required>
                                  <div class="invalid-feedback">veuillez saisir un quartier</div>
                                </div>
                                <div class="col-12">
                                  <label for="commune" class="form-label">Commune</label>
                                  <input type="text" name="commune" class="form-control" id="commune" value="<?php if (!empty($derniereAdresse)) echo $derniereAdresse->commune ?>" required>
                                  <div class="invalid-feedback">veuillez saisir un commune</div>
                                </div>
                                <div class="col-12">
                                  <label for="ville" class="form-label">ville</label>
                                  <input type="text" name="ville" class="form-control" id="ville" value="<?php if (!empty($derniereAdresse)) echo $derniereAdresse->ville ?>" required>
                                  <div class="invalid-feedback">veuillez saisir un ville</div>
                                </div>

                                <div class="row mt-3 justify-content-end">
                                  <button type="submit" class="btn btn-warning col-12 mt-2 mt-lg-0 mx-lg-1  col-lg-4" name="validerAdresse" value="valider">valider</button>
                                  <button type="submit" class="btn btn-outline-warning col-12 mt-2 mt-lg-0 mx-lg-1  col-lg-5" name="validerAdresse" value="enregistrerAdresse">Enregistrer adresse</button>
                                </div>
                              </div>
                            </form>

                          </div><!-- End livraison Content -->

                          <div class="tab-pane fade active show" id="emporter">
                            <form action="" method="post">
                              <input type="hidden" name="action" value="emporter">
                              <input type="hidden" name="typeCommande" value="a emporter">
                              <input type="hidden" name="accordionEtapeSuivante" value="collapseThree">
                              <!-- <input type="hidden" name="idUtilisateur" value="<?php //if (isset($_SESSION['id']))  echo $_SESSION['id'] 
                                                                                    ?>"> -->

                              <div class="row">
                                <div class="col-12">
                                  <h6 class="mt-3 mx-5">Cliquer sur le bouton suivant pour pouvoir choisir la date et l'heure de votre commande</h6>
                                </div>

                                <div class="row mt-3 justify-content-end">
                                  <button type="submit" class="btn btn-warning col-12 mt-2 mt-lg-0 mx-lg-1  col-lg-12" name="validerAdresse" value="valider">valider</button>
                                </div>
                              </div>
                            </form>


                          </div><!-- End a emporter Content -->

                        </div>
                    </section>
                </div>

              </div>

            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <strong><i class="bi bi-clock-history"></i> choisissez l'heure</strong>
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse <?php if (isset($_POST['accordionEtapeSuivante']) && $_POST['accordionEtapeSuivante'] == "collapseThree") echo "show" ?>" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                  <form action="" method="post">
                    <input type="hidden" name="action" value="dateHeure">
                    <input type="hidden" name="accordionEtapeSuivante" value="collapseFour">
                    <!-- <input type="hidden" name="idUtilisateur" value="<?php //if (isset($_SESSION['id']))  echo $_SESSION['id'] 
                                                                          ?>"> -->
                    <div class="row w-100">

                      <div class="col-12">
                        <label for="dateLiv" class="form-label">Date</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-calendar2-date"></i></span>
                          <input type="date" name="dateLiv" class="form-control" id="dateLiv" required>
                          <div class="invalid-feedback">Entrer votre date Svp</div>
                        </div>
                      </div>
                      <div class="col-12">
                        <label for="heureLiv" class="form-label">Heure</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-alarm"></i></span>
                          <input type="time" name="heureLiv" class="form-control" id="heureLiv" required>
                          <div class="invalid-feedback">Entrer votre heure Svp</div>
                        </div>
                      </div>

                      <div class="row mt-3 justify-content-end">
                        <button type="submit" class="btn btn-warning col-12 mt-2 mt-lg-0 mx-lg-1  col-lg-12" >Valider</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <strong><i class="bi bi-cash-coin"></i> Mode de paiement</strong>
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse <?php if (isset($_POST['accordionEtapeSuivante']) && $_POST['accordionEtapeSuivante'] == "collapseFour") echo "show" ?>" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <form action="" method="post">
                    <input type="hidden" name="action" value="modePaiement">
                    <input type="hidden" name="accordionEtapeSuivante" value="collapseFour">
                    <!-- <input type="hidden" name="idUtilisateur" value="<?php //if (isset($_SESSION['id']))  echo $_SESSION['id'] 
                                                                          ?>"> -->
                    <div class="row w-100">
                      <div class="card">
                        <div class="card-body">

                          <!-- List group With Checkboxes and radios -->
                          <ul class="list-group">
                            <li class="list-group-item">
                              <input class="form-check-input me-1" type="radio" name="mode" value="Cash" aria-label="...">
                              <label class="form-check-label" for="modePaiemt">En espece</label>
                            </li>
                            <li class="list-group-item">
                              <input class="form-check-input me-1" type="radio" name="mode" value="MobileMoney" aria-label="...">
                              <label class="form-check-label" for="modePaiement"> Mobile Money </label>
                            </li>
                            <li class="list-group-item">
                              <input class="form-check-input me-1" type="radio" name="mode" value="CarteBancaire" aria-label="...">
                              <label class="form-check-label" for="modePaiement"> Carte bancaire </label>
                            </li>
                          </ul><!-- End List Checkboxes and radios -->

                          <div class="row mt-3 justify-content-end">
                            <button type="submit" class="btn btn-warning col-12 mt-2 mt-lg-0 mx-lg-1  col-lg-12">Valider</button>
                          </div>

                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div><!-- End Default Accordion Example -->

        </div>
      </div>

    </div>

    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <div class="table-responsive p-0">
            <?php if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) : ?>
              <table class="table datatable w-100">
                <thead class="table-light">
                  <tr>
                    <th scope="col">Qte</th>
                    <th scope="col">Nom Plat</th>
                    <th scope="col">PU</th>
                    <th scope="col">ST</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  /* if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) : */
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
                    </tr>
                  <?php

                  endforeach;
                  ?>
                </tbody>

              </table>
              <div class="row mb-3 mx-3">
                <div class="col-8">Sous-total</div>
                <div class="col-4 px-4"><i><?= $total . " " ?><small>CDF</small></i></div>
              </div>
              <?php $tva = $total * 0.16 ?>
              <div class="row mb-3 mx-3">
                <div class="col-8">TVA (16%)</div>
                <div class="col-4 px-4"><i><?= $tva  . " " ?><small>CDF</small></i></div>
              </div>
              <div class="row mb-3 mx-3">
                <div class="col-8"><strong>Total</strong></div>
                <div class="col-4 px-4"><strong><i><?php echo $total + $tva . " " ?><small>CDF</small></i></strong></div>
              </div>
          </div>


        <?php else : ?>
          <div class="text-center">
            <h5 class="card-title">Vous n'avez rien dans votre panier </h5>
            <a href="?page=menu" class="btn btn-warning">Ajouter au panier</a>
          </div>

        <?php endif ?>

        </div>
      </div>
      
    </div>
    <!-- <div class="card-footer col-12">
        <div class="row bg-warning p-1 m-0 text-center"> -->

          <form action="" method="post">
            <input type="hidden" name="action" value="passerCommande">
            <input type="hidden" name="montant" value="<?php echo $total + $tva ?>">
            <div class="btn-goup w-100 ">
              <button type="submit" class="btn btn-lg btn-warning w-100 rounded-5">
                <h3 class="tx-lg fw-bold text-secondary">Commandez</h3>
              </button>
            </div>
          </form>
        <!-- </div>
      </div> -->
</section>

</main>

<?php include_once 'views/includes/footer.php'; ?>
</body>

</html>

</html>

</html>