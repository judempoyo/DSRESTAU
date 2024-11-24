<main>
    <div class="container">

        <section class="section register min-vh-100 mi d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="#" class="logo d-flex align-items-center w-auto">
                                <img src="assets/images/<?= $systemeSettings->coverimg ?>" alt="">
                                <span class="d-none d-lg-block">
                                    <?= $systemeSettings->projectname ?>
                                </span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3 rounded-5">

                            <div class="card-body ">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                    <p class="text-center small">Enter your profile picture to finish your registration</p>
                                </div>

                                <!-- Profile Edit Form  -->
                                <form method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="page" value="setProfilePic">
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
                                            <a class="btn btn-outline-secondary w-100" href="?page=register&etape=userAccountData">Previsous</a>
                                        </div>
                                        <div class="col-5 offset-2">
                                            <button class="btn btn-primary w-100" type="submit">Done</button>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>

                        <div class="col-6 offset-3">
                            <div class="credits">
                                Designed by <a href="https://bootstrapmade.com/">
                                    <?= $systemeSettings->name ?>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->