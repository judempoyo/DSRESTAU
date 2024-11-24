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
                                    <p class="text-center small">Enter a confirmation code that already sent to: <span class="fst-italic"><strong> <?= $_COOKIE['EMAIL'] ?></strong></span> </p>
                                </div>

                                <?php Flash('confirmAccount') ?>

                                <form class="row g-3 needs-validation" method="post" novalidate>
                                    <input type="hidden" name="page" value="confirmAccount">
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="codeEnter" class="form-label">Cofimation code</label>
                                            <input type="text" name="codeEnter" class="form-control" id="codeEnter" minlength="6" required>
                                            <div class="invalid-feedback">Invalid confirmation code!</div>
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <!-- <div class="col-5">
                                            <a class="btn btn-outline-secondary w-100" href="?page=register&etape=&cmd=del">Previsous</a>
                                        </div> -->
                                        <div class="col-5 offset-2">
                                            <button class="btn btn-primary w-100" type="submit">Cofirm the code</button>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-11 offset-1">
                                            <p class="small mb-3">Already have an account? <a href="?page=login">Log in</a></p>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="col-6 offset-3">
                            <div class="credits">
                                Designed by <a href="#">
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