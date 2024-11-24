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

        <?php Flash('confirmerCompte') ?>

        <form class="row g-3 needs-validation" method="post" novalidate>
            <input type="hidden" name="page" value="confirmerCompte">
            <div class="row mb-3">
                <div class="col-12">
                    <label for="codeEnter" class="form-label">Cofimation code</label>
                    <input type="text" name="codeEnter" class="form-control" id="codeEnter" minlength="6" required>
                    <div class="invalid-feedback">Invalid confirmation code!</div>
                </div>
            </div>



            <!-- <div class="row mb-3">
                <div class="col-5">
                                            <a class="btn btn-outline-secondary w-100" href="?page=register&etape=&cmd=del">Previsous</a>
                                        </div> 
                <div class="col-5 offset-2">
                    <button class="btn btn-primary w-100" type="submit">Cofirm the code</button>
                </div>
            </div>-->
            <div class="col-12">
                <button class="btn btn-warning w-100" type="submit">Cofirmer le code</button>
            </div>
            <div class="col-12">
                <p class="small mb-0">Vous avez deja un compte? <a href="?page=login">Se connecter</a></p>
            </div>
        </form>

    </div>
</div>