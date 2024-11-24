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
                <h5 class="card-title">Liste des commandes</h5>
                <!-- Table with stripped rows -->

                <div class="table-responsive p-0">
                    <table class="table display" id="tablecommande">
                        <thead>
                            <tr>

                                <th>Date</th>
                                <th>Heure</th>
                                <th><b>M</b>ontant</th>
                                <th>Statut</th>
                                <th>Type</th>
                                <th>E-mail</th>
                                <th>Nom</th>
                                <th>Avenue</th>
                                <th class="action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($toutesLesCommandes as $commande) : ?>
                                <tr>

                                    <td><?= $commande->dateLIv ?></td>
                                    <td><?= $commande->heureLiv ?></td>
                                    <td><?= $commande->montant . " " ?>CDF</td>
                                    <td><?= $commande->statut ?></td>
                                    <td><?= $commande->typeCommande ?></td>
                                    <td><?= $commande->emailClient ?></td>
                                    <td><?= $commande->nomClient ?></td>
                                    <td><?= $commande->avenue ?></td>
                                    <td>
                                        <?php if ($commande->statut == "en attente") : ?>
                                            <a href="?page=<?= $page ?>&souspage=commandes&action=commandes&idCommande=<?= $commande->idCommande ?>&sousaction=approuver" class="btn btn-outline-warning m-1"><i class="bi bi-check-lg"></i> </a>
                                            <a href="?page=<?= $page ?>&souspage=commandes&action=commandes&idCommande=<?= $commande->idCommande ?>&sousaction=annuler" class="btn btn-danger m-1"><i class="bi bi-x-lg"></i> </a>
                                        <?php else : ?>
                                            <a href="?page=<?= $page ?>&souspage=commandes" class="btn btn-outline-warning m-1 disabled"><i class="bi bi-check-lg"></i> </a>
                                            <a href="?page=<?= $page ?>&souspage=commandes" class="btn btn-danger m-1 disabled"><i class="bi bi-x-lg"></i> </a>
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