<?php include_once 'views/includes/head.php'; ?>
<title><?= ucfirst($page) ?> - Ds Restau</title>
<?php
include_once 'views/includes/header.php';
?>
<main>
  <section id="" class="gallery section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header pt-5">
        <p>Consultez <span>Notre Galerie</span></p>
      </div>

      <div class="gallery-slider swiper">
        <div class="swiper-wrapper align-items-center">
          <div class="swiper-slide"><a class="glightbox" data-gallery="images" href="./assets/images/service1.png"><img src="./assets/images/service1.png" class="img-fluid" alt="HHHHHHHHH"></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images" href="./assets/images/service2.png"><img src="./assets/images/service2.png" class="img-fluid" alt="HHHHHHHHH"></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images" href="./assets/images/service3.png"><img src="./assets/images/service3.png" class="img-fluid" alt="HHHHHHHHH"></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images" href="./assets/images/service4.png"><img src="./assets/images/service4.png" class="img-fluid" alt="HHHHHHHHH"></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images" href="./assets/images/service5.png"><img src="./assets/images/service5.png" class="img-fluid" alt="HHHHHHHHH"></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images" href="./assets/images/service1.png"><img src="./assets/images/service1.png" class="img-fluid" alt="HHHHHHHHH"></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images" href="./assets/images/service1.png"><img src="./assets/images/service1.png" class="img-fluid" alt="HHHHHHHHH"></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images" href="./assets/images/service1.png"><img src="./assets/images/service1.png" class="img-fluid" alt="HHHHHHHHH"></a></div>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Gallery Section -->
</main>

<?php include_once 'views/includes/footer.php'; ?>

</body>

</html>