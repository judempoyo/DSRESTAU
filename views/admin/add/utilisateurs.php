<!-- <div class="d-flex justify-content-center py-4">
    <a href="?page=home" class="logo d-flex align-items-center w-auto">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block text-warning">DS Restau</span>
    </a>
</div> -->
<?php
?>
<div class="col-lg-12 col-12">
    <div class="row mb-3 justify-content-end">
        <a href="" class="btn btn-warning w-auto"><i class="bi bi-plus-lg"></i> Ajouter</a>
    </div>
    <div class="row">


        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Liste des utilisateurs</h5>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>
                                <b>N</b>om
                            </th>
                            <th>Sexe</th>
                            <th>E-mail</th>
                            <th>Telephone</th>
                            <th>Creer le</th>
                            <th class="action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tousLEsUtilisateurs as $utilisateur) : ?>
                            <tr>
                                <td><?= $utilisateur->nom ?></td>
                                <td><?= $utilisateur->sexe ?></td>
                                <td><?= $utilisateur->email ?></td>
                                <td><?= $utilisateur->telephone ?></td>
                                <td><?= $utilisateur->creerLe ?></td>
                                <td>
                                    <a href="" class="btn btn-outline-warning"><i class="bi bi-pen"></i> </a>
                                    <a href="" class="btn btn-danger"><i class="bi bi-trash"></i> </a>

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