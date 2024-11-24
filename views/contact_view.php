<?php include_once 'views/includes/head.php'; ?>
<title><?= ucfirst($page) ?> - Ds Restau</title>
<?php
include_once 'views/includes/header.php';
?>
<main>
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-header pt-5">
        <p>Besoin d'aide ? <span>Contact nous</span></p>
      </div>



      <div class="row gy-4">

        <div class="col-md-6">
          <div class="info-item  d-flex align-items-center">
            <i class="icon bi bi-map flex-shrink-0"></i>
            <div>
              <h3>Notre Address</h3>
              <p>3647 Route de kasapa, lubumbashi</p>
            </div>
          </div>
        </div><!-- End Info Item -->

        <div class="col-md-6">
          <div class="info-item d-flex align-items-center">
            <i class="icon bi bi-envelope flex-shrink-0"></i>
            <div>
              <h3>Envoyez-nous un E-mail</h3>
              <a href="mailto:Sindanidivin@gmail.com" class="text-body">Sindanidivin@gmail.com</a>
            </div>
          </div>
        </div><!-- End Info Item -->

        <div class="col-md-6">
          <div class="info-item  d-flex align-items-center">
            <i class="icon bi bi-telephone flex-shrink-0"></i>
            <div>
              <h3>Appelez-nous</h3>
              <a href="tel:+243993394079" class="text-body">+243 993 394 079</a>
              <p></p>
            </div>
          </div>
        </div><!-- End Info Item -->

        <div class="col-md-6">
          <div class="info-item  d-flex align-items-center">
            <i class="icon bi bi-share flex-shrink-0"></i>
            <div>
              <h3>Heures d'ouvertures</h3>
              <div><strong>lundi-Samedi:</strong> 11H - 23H;
                <strong>Dimanche:</strong> Fermé
              </div>
            </div>
          </div>
        </div><!-- End Info Item -->

      </div>

      <form action="forms/contact.php" method="post" role="form" class="php-email-form p-3 p-md-4">
        <div class="row">
          <div class="col-xl-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Votre Nom" required>
          </div>
          <div class="col-xl-6 form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Votre E-mail" required>
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" required>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
        </div>
        <div class="my-3">
          <div class="loading">Chargement</div>
          <div class="error-message"></div>
          <div class="sent-message">Votre message a ete envoyé. Merci!</div>
        </div>
        <div class="text-center"><button type="submit" class="btn btn-warning">Envoyé le message </button></div>
      </form><!--End Contact Form -->

    </div>
  </section><!-- End Contact Section -->
</main>

<?php include_once 'views/includes/footer.php'; ?>

</body>

</html>