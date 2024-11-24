<!-- <div class="d-flex justify-content-center py-4">
    <a href="?page=home" class="logo d-flex align-items-center w-auto">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block text-warning">DS Restau</span>
    </a>
</div> -->
<div class="container">


    <div class="row">
        <!-- Product Card -->

        <div class="col-6 col-lg-3">
            <a href="">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Plat(s) Disponibles</span></h5>

                        <div class="d-flex align-items-center justify-content-ends">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <h2><i class="bi bi-cart"></i></h2>
                            </div>
                            <div class="ps-3">
                                <h2><?= !empty($tousLesPlats) ? count($tousLesPlats) : 0 ?></h2>
                                <span class="text-success small pt-1 fw-bold">


                                </span>

                            </div>
                        </div>
                    </div>

                </div>

            </a>
        </div><!-- End product Card -->


        <!-- category Card -->

        <div class="col-6 col-lg-3">
            <a href="">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Categorie des Plats</span></h5>

                        <div class="d-flex align-items-center justify-content-ends">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <h2><i class="bi bi-card-list"></i></h2>
                            </div>
                            <div class="ps-3">
                                <h2><?= !empty($toutesLesCategories) ? count($toutesLesCategories) : 0 ?></h2>
                                <span class="text-success small pt-1 fw-bold">


                                </span>

                            </div>
                        </div>
                    </div>

                </div>
            </a>
        </div><!-- End category Card -->


        <!-- commandes Card -->
        <div class="col-6 col-lg-3">
            <a href="">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Commandes</span></h5>

                        <div class="d-flex align-items-center justify-content-ends">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <h2><i class="bi bi-bag-check"></i></h2>
                            </div>
                            <div class="ps-3">
                                <h2><?= !empty($toutesLesCommandes) ?
                                        count($toutesLesCommandes) : 0 ?></h2>
                                <span class="text-success small pt-1 fw-bold">


                                </span>

                            </div>
                        </div>
                    </div>

                </div>
            </a>
        </div><!-- End commandes Card -->


        <!-- reservation  Card-->

        <div class="col-6 col-lg-3">
            <a href="">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Reservations passees</span></h5>

                        <div class="d-flex align-items-center justify-content-ends">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <h2><i class="bi bi-cart"></i></h2>
                            </div>
                            <div class="ps-3">
                                <h2><?= !empty($toutesLesReservations) ? count($toutesLesReservations) : 0 ?></h2>
                                <span class="text-success small pt-1 fw-bold">


                                </span>

                            </div>
                        </div>
                    </div>

                </div>
            </a>
        </div><!-- End reservation Card -->

        <!-- utilisateur Card -->

        <div class="col-6 col-lg-3">
            <a href="">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Utilisateurs</span></h5>

                        <div class="d-flex align-items-center justify-content-ends">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <h2><i class="bi bi-people"></i></h2>
                            </div>
                            <div class="ps-3">
                                <h2><?= !empty($tousLEsUtilisateurs) ? count($tousLEsUtilisateurs) : 0 ?></h2>
                                <span class="text-success small pt-1 fw-bold">


                                </span>

                            </div>
                        </div>
                    </div>

                </div>
            </a>
        </div><!-- End utilisateur Card -->

        <!-- Product Card -->
        <div class="col-6 col-lg-3">
            <a href="">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Commandes annulées</span></h5>

                        <div class="d-flex align-items-center justify-content-ends">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <h2><i class="bi bi-bag-check"></i></h2>
                            </div>
                            <div class="ps-3">
                                <h2><?php
                                    $commandeAnnulees = $initCommande->afficherCommandeParStatut('annuler'); ?>
                                    <?=
                                    !empty($commandeAnnulees) ? count($commandeAnnulees) : 0 ?></h2>
                                <span class="text-success small pt-1 fw-bold">


                                </span>

                            </div>
                        </div>
                    </div>

                </div>
            </a>
        </div><!-- End product Card -->



        <!-- Product Card -->
        <div class="col-6 col-lg-3">
            <a href="">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Reservations annulées</span></h5>

                        <div class="d-flex align-items-center justify-content-ends">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <h2><i class="bi bi-cart"></i></h2>
                            </div>
                            <div class="ps-3">
                                <h2><?php
                                    $reservationAnnulees = $initReservation->afficherReservationParStatut('annuler'); ?>
                                    <?=
                                    !empty($reservationAnnulees) ? count($reservationAnnulees) : 0
                                    ?></h2>
                                <span class="text-success small pt-1 fw-bold">


                                </span>

                            </div>
                        </div>
                    </div>

                </div>
            </a>
        </div><!-- End product Card -->



        <!-- Product Card -->

        <div class="col-6 col-lg-3">
            <a href="">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">images des Plat(s)</span></h5>

                        <div class="d-flex align-items-center justify-content-ends">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <h2><i class="bi bi-cart"></i></h2>
                            </div>
                            <div class="ps-3">
                                <h2><?= !empty($tousLesPlats) ? count($tousLesPlats) : 0 ?></h2>
                                <span class="text-success small pt-1 fw-bold">


                                </span>

                            </div>
                        </div>
                    </div>

                </div>
            </a>
        </div><!-- End product Card -->


        <!-- Sales Card -->
        <div class="col-6 col-lg-3">
            <a href="">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Commandes en attente</span></h5>

                        <div class="d-flex align-items-center justify-content-ends">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <h2><i class="bi bi-bag-check"></i></h2>
                            </div>
                            <div class="ps-3">
                                <h2><?php
                                    $commandeEnAttentes = $initCommande->afficherCommandeParStatut('en attente'); ?>
                                    <?=
                                    !empty($commandeEnAttentes) ? count($commandeEnAttentes) : 0 ?></h2>
                                <span class="text-success small pt-1 fw-bold">


                                </span>

                            </div>
                        </div>
                    </div>

                </div>
            </a>
        </div><!-- End Sales Card -->

        <!-- Sales Card -->
        <div class="col-6 col-lg-3">
            <a href="">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Commandes aprrouvées</span></h5>

                        <div class="d-flex align-items-center justify-content-ends">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <h2><i class="bi bi-bag-check"></i></h2>
                            </div>
                            <div class="ps-3">
                                <h2><?php
                                    $commandeApprouvees = $initCommande->afficherCommandeParStatut('approuver'); ?>
                                    <?=
                                    !empty($commandeApprouvees) ? count($commandeApprouvees) : 0 ?></h2>
                                <span class="text-success small pt-1 fw-bold">


                                </span>

                            </div>
                        </div>
                    </div>

                </div>
            </a>
        </div><!-- End Sales Card -->

        <!-- Product Card -->
        <div class="col-6 col-lg-3">
            <a href="">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Reservations en attente</span></h5>

                        <div class="d-flex align-items-center justify-content-ends">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <h2><i class="bi bi-cart"></i></h2>
                            </div>
                            <div class="ps-3">
                                <h2><?php
                                    $reservationEnAttentes = $initReservation->afficherReservationParStatut('en attente'); ?>
                                    <?=
                                    !empty($reservationEnAttentes) ? count($reservationEnAttentes) : 0 ?></h2>
                                <span class="text-success small pt-1 fw-bold">


                                </span>

                            </div>
                        </div>
                    </div>

                </div>
            </a>
        </div><!-- End product Card -->
        </a>

        <!-- Product Card -->
        <div class="col-6 col-lg-3">
            <a href="">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Reservations approuvées</span></h5>

                        <div class="d-flex align-items-center justify-content-ends">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <h2><i class="bi bi-cart"></i></h2>
                            </div>
                            <div class="ps-3">
                                <h2><?php
                                    $reservationApprouvees = $initReservation->afficherReservationParStatut('approuver'); ?>
                                    <?= !empty($reservationApprouvees) ? count($reservationApprouvees) : 0 ?></h2>
                                <span class="text-success small pt-1 fw-bold">


                                </span>

                            </div>
                        </div>
                    </div>

                </div>
            </a>
        </div><!-- End product Card -->
    </div>
</div>