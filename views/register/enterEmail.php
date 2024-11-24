<div class="d-flex justify-content-center py-4">
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

        <?php Flash('enterEmail') ?>

        <form class="row g-3 needs-validation" method="post" novalidate>
            <input type="hidden" name="page" value="enterEmail">
            <div class="row mb-3">
                <div class="col-12">
                    <label for="yourEmail" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="yourEmail" required>
                    <div class="invalid-feedback">entrer une adresse mail valide svp</div>
                </div>
            </div>



            <div class="row mb-3">
                <div class="col-12">
                    <button class="btn btn-warning w-100" type="submit">Confirmer Email</button>
                </div>
            </div>

            <div class="col-12">
                <p class="small mb-0">Vous avez deja un compte? <a href="?page=login">Se connecter</a></p>
            </div>
        </form>

    </div>
</div>