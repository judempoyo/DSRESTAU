
<title><?= ucfirst($page) ?> - Ds Restau</title>
    <?php include_once 'views/includes/head.php';
    ?>

<main>
    <div class="container">

    <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1>404</h1>
        <h2>La page que vous cerchez n'existe pas.</h2>
        <a class="btn btn-warning" href="?page=">Retourner a l'accueil</a>
        <img src="./assets/images/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
         
      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

</html>