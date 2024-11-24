
<title><?= ucfirst($page) ?> - Ds Restau</title>
<?php include_once 'views/includes/head.php';
          include_once 'views/includes/header.php';
    ?>

<section class="home" id="home">

        <div class="home-left">

    <p class="home-subtext">salut, 
      <?php if(isset($_SESSION['nom'])) : echo $_SESSION['nom']; else: echo "Nouvel ami !"; endif?>  
    </p>

    <h1 class="main-heading"> Savourez des plats delicieux
dans votre vie!</h1>

    <p class="home-text">
      Votre langue a aussi ses propres reves. La bonne fourchette est l'endroit ideal pours vos fantasmes.
    </p>

    <div class="row">
      <?php if (isset($_SESSION['id'])):?>
        <a href="?page=menu" class="btn btn-warning col-md-4 col-6 rounded-pill">
        <i class="bi bi-cart"></i>
        Commandez
      </a>
      <?php else: ?>
        <a href="?page=login" class="btn btn-warning col-md-4 col-6 rounded-pill">
        <i class="bi bi-box-arrow-in-right"></i>
        Se connecter
      </a>
      <?php endif?>
      <a href="?page=apropos" class="btn btn-outline-secondary col-md-4 col-6 offset-md-1 rounded-pill">
        <i class="bi bi-arrow-up-right-circle"></i>
        Apropos de nous
      </a>
      <!-- <a href="?page=login" style="color: black;">
      <button class="btn btn-primary btn-icon">
        <img src="./assets/images/menu.svg" alt="menu icon">             
        Login          
      </button>
      </a> -->

      <!-- <a href="about.php" style="color: black;">
      <button class="btn btn-secondary btn-icon">
        <img src="./assets/images/arrow.svg" alt="menu icon">
        About us
      </button>
    </a> -->
    </div>
  </div>

  <div class="home-right">

    <img src="./assets/images/food1.png" alt="food image" class="food-img food-1" width="200" loading="lazy">
    <img src="./assets/images/food2.png" alt="food image" class="food-img food-2" width="200" loading="lazy">
    <img src="./assets/images/food3.png" alt="food image" class="food-img food-3" width="200" loading="lazy">

    <img src="./assets/images/dialog-1.svg" alt="dialog" class="dialog dialog-1" width="230">
    <img src="./assets/images/dialog-2.svg" alt="dialog" class="dialog dialog-2" width="230">

    <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-1" width="25">
    <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-2" width="15">
    <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-3" width="30">
    <img src="./assets/images/ring.svg" alt="ring shape" class="shape shape-4" width="60">
    <img src="./assets/images/ring.svg" alt="ring shape" class="shape shape-5" width="40">

  </div>
</section>

<!-- #PRODUCT SECTION -->

<section class="menu" id="menu">
<div class="tab-header mx-3 mb-5">

            <div class="justify-content-start fw-bolder fs-1"><p>Plats les plus populaires</p></div>
            <p class="seection-text">Les plats suivants sont tres demandés dans notre restaurant😁
            </p>
          </div>

  <!-- <h2 class="section-title">Plats les plus populaires</h2>

  <p class="">
    Les plats suivants sont tres demandés dans notre restaurant😁

  </p> -->

  
  <div class="tab-pane fade active show" id="tout">

<div class="row gy-5 px-5">
  <?php foreach ($topPlat as $plat) :?>
    <div class="col-lg-3 col-6 menu-item">
    
      <?php $image = $initImagePlat->afficherPremiereImagePlatParPlat($plat->idPlat) ?>
      <a href="./assets/images/upload/plats/<?= $image->photo ?>" class="glightbox"><img src="./assets/images/upload/plats/<?= $image->photo ?>" class="card-img border rounded-5" width="100%" height="200" alt="une image"></a>
      <h4><?= $plat->nom ?></h4>
      <p class="ingredients">
      <?= $plat->description ?>
      </p>
      <p class="price">
        <?= $plat->prix . ' ' ?>CDF
      </p>
      <form action="" method="post" class="row">

        <div class="col-lg-8 col-6">
          <button class="btn btn-warning" name="ajouterPanier">Ajouter <div class="d-none d-lg-inline">au panier</div></button>
        </div>
        <div class="col-lg-4 col-4">
          <input type="hidden" name="action" value="ajouterPanier">
          <input type="hidden" name="prix" value="<?= $plat->prix ?>">
          <input type="hidden" name="nom" value="<?= $plat->nom ?>">
          <input type="hidden" name="idPlat" value="<?= $plat->idPlat ?>">
          <input type="number" name="qte" id="qte" min="1" value="1" max="<?= $plat->qte ?>" class="form-control">
        </div>
      </form>


    </div><!-- Menu Item -->
  <?php endforeach ?>

</div>
<div class="justify-content-center row mt-3">
  <a href="?page=menu" class="btn btn-outline-warning col-md-3 col-6 rounded-pill h-25">
  <i class="fa fa-cutlery"></i>
  Menu entier
  </a>

  </div>
</div><!-- End Starter Menu Content -->

  
</section>




<!-- #ABOUT SECTION  -->

<section class="about" id="about">

  <div class="about-left">

    <div class="img-box">
      <img src="./assets/images/about-image.jpg" alt="about image" class="about-img" width="250">
    </div>

    <div class="abs-content-box">
      <div class="dotted-border">
        <p class="number-lg">1</p>
        <p class="text-md">en <br> te servant</p>
      </div>
    </div>

    <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-6" width="20">
    <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-7" width="30">
    <img src="./assets/images/ring.svg" alt="ring shape" class="shape shape-8" width="35">
    <img src="./assets/images/ring.svg" alt="ring shape" class="shape shape-9" width="80">

  </div>

  <div class="about-right">

    <h2 class="section-title">Nous faisons plus que ce que vous attendez</h2>

    <p class="section-text">
    Chez la bonne fourchette, nous sommes plus qu'un simple carrefour gastronomique, nous sommes vos compagnons culinaires dans un délicieux voyage à travers les saveurs, les goûts et les expériences. Notre passion pour l’alimentation, combinée à un engagement envers la qualité et l’innovation, anime tout ce que nous faisons. Nous croyons en la magie des ingrédients frais, des recettes soigneusement préparées et de la joie de partager un repas avec ses proches. Nos chefs se consacrent à l'élaboration de plats qui non seulement ravissent vos papilles, mais racontent également une histoire.<br> Des plats traditionnels aux interprétations modernes, chaque plat témoigne de notre engagement envers l’excellence culinair.
    </p>

    <p class="section-text">
    "Chez la bonne fourchette, nous proposons une gamme complète de services conçus pour rehausser votre expérience culinaire. Que vous ayez envie de plats délicieux livrés à votre porte, que vous planifiiez un événement spécial et que vous ayez besoin du lieu idéal, préférez l'expérience de restaurant classique avec table. réservation ou avez besoin de services de restauration pour vos rassemblements hors site, Taaza a ce qu'il vous faut. Notre engagement envers l'excellence s'étend à l'innovation constante et à la surprise de nos clients avec des promotions spéciales, des menus de saison et des événements culinaires passionnants. Rejoignez-nous chez Taaza, où chaque service. que nous proposons vise à dépasser vos attentes et à faire de chaque instant un moment mémorable."
    </p>

    <img src="./assets/images/signature.png" alt="signature" class="signature" width="150">
  </div>
</section>



<!-- #SERVICES SECTION  -->

<section class="services" id="services">

  <div class="service-card">

    <p class="card-number">01</p>

    <h3 class="card-heading">Livraison de nourriture en ligne</h3>

    <p class="card-text">
      Vous pouvez commander la nourriture de notre restaurant en ligne et nous vous le livrerons a votre porte, vous pouvez egalement suivre la progression de la livraison.
    </p>

  </div>

  <div class="service-card">

    <p class="card-number">02</p>

    <h3 class="card-heading">Reservation de table</h3>

    <p class="card-text">
      Vous pouvez pre-reserver une table disponible dans notre restaurant, la table souhaitee sera gratuite pour vous lors de votre venue.
    </p>

  </div>

  <div class="service-card">

    <p class="card-number">03</p>

    <h3 class="card-heading">Reservation Groupee et restauration pour evenements</h3>

    <p class="card-text">
      Notre restaurant propose un service de traiteur et vous pouvez reserver de la nourriture en vrac pour des evenements comme un mariage.
    </p>

  </div>

</section>


<!-- #TESTIMONIALS SECTION -->

<section class="testimonials" id="testimonials">

  <h2 class="section-title">ce que disent nos clients?</h2>

  <p class="section-text">
    Consectetur numquam poro nemo veniam
    eligendi rem adipisci quo modi.
  </p>

  <div class="testimonials-grid">

    <div class="testimonials-card">

      <h4 class="card-title">Very tasty</h4>

      <div class="testimonials-rating">
        <ion-icon name="star"></ion-icon>
        <ion-icon name="star"></ion-icon>
        <ion-icon name="star"></ion-icon>
        <ion-icon name="star"></ion-icon>
        <ion-icon name="star"></ion-icon>
      </div>

      <p class="testimonials-text">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis fugiat totam nobis quas unde excepturi
        inventore possimus
        laudantium provident, rem eligendi velit. Aut molestias, ipsa itaque laborum, natus
        tempora, ut soluta animi ducimus dignissimos deserunt doloribus in reprehenderit rem accusamus! Quibusdam
        labore,
        aliquam dolor harum!
      </p>

      <div class="customer-info">
        <div class="customer-img-box">
          <img src="./assets/images/testimonials1.jpg" alt="customer image" class="customer-img" width="100" loading="lazy">
        </div>

        <h5 class="customer-name">Mpoyo mwanabute Jude</h5>
      </div>

    </div>

    <div class="testimonials-card">
    
      <h4 class="card-title">I have lunch here every day</h4>
    
      <div class="testimonials-rating">
        <ion-icon name="star"></ion-icon>
        <ion-icon name="star"></ion-icon>
        <ion-icon name="star"></ion-icon>
        <ion-icon name="star"></ion-icon>
        <ion-icon name="star"></ion-icon>
      </div>
    
      <p class="testimonials-text">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis fugiat totam nobis quas unde excepturi
        inventore possimus
        laudantium provident, rem eligendi velit. Aut molestias, ipsa itaque laborum, natus
        tempora, ut soluta animi ducimus dignissimos deserunt doloribus in reprehenderit rem accusamus! Quibusdam
        labore,
        aliquam dolor harum!
      </p>
    
      <div class="customer-info">
        <div class="customer-img-box">
          <img src="./assets/images/testimonials2.jpg" alt="customer image" class="customer-img" width="100" loading="lazy">
        </div>
    
        <h5 class="customer-name">Makaya nyembo Victoire </h5>
      </div>    
    </div>
  </div>
</section> 
</main>

    <?php include_once 'views/includes/footer.php'; ?>

</body>

</html>