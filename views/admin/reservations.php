<!-- <div class="d-flex justify-content-center py-4">
    <a href="?page=home" class="logo d-flex align-items-center w-auto">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block text-warning">DS Restau</span>
    </a>
</div> -->

<div class="col-lg-12 col-12 mb-5">
    <div class="row">

        <div class="row col-12">
            <?php Flash('admin'); ?>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Liste des reservations</h5>
                <!-- Table with stripped rows -->

                <div class="table-responsive p-0">
                    <table class="table display" id="tablereservation">
                        <thead>
                            <tr>
                                <th>
                                    <b>D</b>ate
                                </th>
                                <th>Heure Res</th>
                                <th>Nombre Personne</th>
                                <th>Statut</th>
                                <th>commentaire</th>
                                <th>Client</th>
                                <th>Creer le</th>
                                <th class="action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($toutesLesReservations as $reservation) : ?>
                                <tr>
                                    <td><?= $reservation->date ?></td>
                                    <td><?= $reservation->heure ?></td>
                                    <td><?= $reservation->nombrePersonne ?></td>
                                    <td><?= $reservation->statutRes ?></td>
                                    <td><?= $reservation->commentaire ?></td>
                                    <td><?= $reservation->idUtilisateur ?></td>
                                    <td><?= $reservation->creerLe ?></td>
                                    <td>
                                        <?php if ($reservation->statutRes == "en attente") : ?>
                                            <a href="?page=<?= $page ?>&souspage=reservations&action=reservations&idReservation=<?= $reservation->idReservation ?>&sousaction=approuver" class="btn btn-outline-warning m-1"><i class="bi bi-check-lg"></i> </a>
                                            <a href="?page=<?= $page ?>&souspage=reservations&action=reservations&idReservation=<?= $reservation->idReservation ?>&sousaction=annuler" class="btn btn-danger m-1"><i class="bi bi-x-lg"></i> </a>
                                        <?php else : ?>
                                            <a href="?page=<?= $page ?>&souspage=reservations" class="btn btn-outline-warning m-1 disabled"><i class="bi bi-check-lg"></i> </a>
                                            <a href="?page=<?= $page ?>&souspage=reservations" class="btn btn-danger m-1 disabled"><i class="bi bi-x-lg"></i> </a>
                                        <?php endif ?>

                                    </td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>

    </div>
</div>