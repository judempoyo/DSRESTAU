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


        <!-- Profile Edit Form  -->
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="page" value="definirAvatar">
            <div class="row mb-3">
                <div class="text-center">
                    <img src="assets/images/upload/default.gif" alt="Profile" class="rounded-circle card-img img-thumbnail figure-img" id="champImg">
                </div>

                <div class="row">
                    <input type="file" name="avatar" accept="image/*" id="imgselect" class="form-control" title="Upload new profile image">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-5">
                    <a class="btn btn-outline-secondary w-100" href="?page=register&etape=userAccountData">Precedent</a>
                </div>
                <div class="col-5 offset-2">
                    <button class="btn btn-warning w-100" type="submit">Terminer</button>
                </div>
            </div>

        </form>

    </div>
</div>