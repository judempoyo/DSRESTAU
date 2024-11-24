<!-- <div class="d-flex justify-content-center py-4">
    <a href="?page=home" class="logo d-flex align-items-center w-auto">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block text-warning">DS Restau</span>
    </a>
</div> -->

<div class="col-lg-12 col-12 mb-5">

    <div class="row mb-3 justify-content-end">
        <a href="?page=<?= $page ?>&souspage=categories&action=categories&sousaction=add" class="btn btn-warning w-auto"><i class="bi bi-plus-lg"></i> Ajouter</a>
    </div>
    <div class="row">
        <div class="row col-12">
            <?php Flash('admin'); ?>
        </div>
        <!-- <img src="./assets/images/upload/categories/1719421860_img_1.jpg" alt=""> -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Liste des categories</h5>
                <!-- Table with stripped rows -->

                <div class="table-responsive p-0">
                    <table class="table display" id="tablecategorie">
                        <thead>
                            <tr>
                                <th>
                                    <b>N</b>om
                                </th>
                                <th>Description</th>
                                <th class="action">Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php foreach ($toutesLesCategories as $categorie) : ?>
                                <tr>
                                    <td><?= $categorie->nom ?></td>
                                    <td><?= $categorie->description ?></td>
                                    <td>
                                        <a href="?page=<?= $page ?>&souspage=categories&action=categories&idCategorie=<?= $categorie->idCategorie ?>&sousaction=edit" class="btn btn-outline-warning"><i class="bi bi-pen"></i> </a>
                                        <a href="?page=<?= $page ?>&souspage=categories&action=categories&idCategorie=<?= $categorie->idCategorie ?>&sousaction=delete" class="btn btn-danger"><i class="bi bi-trash"></i> </a>

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