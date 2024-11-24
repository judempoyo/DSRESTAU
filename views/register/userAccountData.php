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

        <?php Flash('userAccountData') ?>

        <form class="row g-3 needs-validation" method="post" novalidate>
            <input type="hidden" name="page" value="userAccountData">
            <div class="row mb-3">
                <div class="col-9">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" id="nom" minlength="2" required>
                    <div class="invalid-feedback">entrer votre nom svp</div>
                </div>

                <div class="col-3">
                    <label for="sexe" class="form-label">Sexe</label>
                    <select name="sexe" id="sexe" class="form-control form-select" required>
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                    <div class="invalid-feedback">selectionner votre genre</div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="telephone" class="form-label">Telephone</label>
                    <input type="tel" name="telephone" class="form-control" id="telephone" minlength="10" required>
                    <div class="invalid-feedback">entrer votre numeroo de telephone!</div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 col-12">
                    <label for="motdepasse" class="form-label">Mot de passe</label>
                    <input type="password" name="motdepasse" autocomplete="new-password" class="form-control" id="motdepasse" minlength="6" required>
                    <div class="invalid-feedback">Entrer votre mot de passe svp</div>
                </div>
                <div class="col-md-6 col-12">
                    <label for="repeterMotdepasse" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" name="repeterMotdepasse" autocomplete="new-password" class="form-control" id="repeterMotdepasse" minlength="6" required>
                    <div class="invalid-feedback">Conirmer votre mot de passe!</div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-11 offset-1">
                    <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and
                                conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-5">
                    <button class="btn btn-outline-secondary w-100" type="reset">Annuler</button>
                </div>
                <div class="col-5 offset-2">
                    <button class="btn btn-warning w-100" type="submit">Creer le compte</button>
                </div>
            </div>
            <div class="col-12">

                <div class="col-12">
                    <p class="small mb-0">Vous avez deja un compte? <a href="?page=login">Se connecter</a></p>
                </div>
        </form>

    </div>
</div>