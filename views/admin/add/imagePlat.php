<title> <?php $page = "Image plat"; ?>
  <?= ucfirst($page) ?> - Ds Restau</title>
<?php include_once 'includes/head.php';
include_once 'includes/header.php';
include "../../../_config/config.php";

function autoload($class)
{
  include "../../../_classes/" . $class . ".php";
}

spl_autoload_register("autoload");
$initPlat = new plat();
$initImagePlat = new ImagePlat();
$plat = $initPlat->afficherplat($_GET['idPlat']);
$toutesLesImages = $initImagePlat->afficherImagePlatParPlat($_GET['idPlat']);
?>
<section class="container-fluid homeAdmin" id="home">
  <div class="col-md-7 col-12">

    <!-- <div class="row"> -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Toutes les images du plat <i class="text-warning"><?= $plat->nom ?></i> </h5>
      </div>

      <div class="row justify-content-center">
        <?php

        foreach ($toutesLesImages as $image) {
          //for ($i=1; $i <10 ; $i++) { 

          //$i = 1;
        ?>

          <div class="col-md-3 col-6 mx-2">
            <div class="card">
              <img src="../../../assets/images/upload/plats/<?= $image->photo ?>" class="bd-placeholder-img card-img-top" width="100%" height="170" alt="une image">

              <div class="card-body">
                <h5 class="card-title mb-0"><?= $image->nom ?></h5>
              </div>
            </div>
          </div>


        <?php

          /*  if ($i % 4 === 0) {
          echo '</div>';
        }
 */
          //$i++;
        } ?>
      </div>


    </div>
    <!-- </div> -->
  </div>




  <div class="col-md-4 col-12 offset-md-1">

    <!-- <div class="row"> -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">image du plat</h5>
        <form action="../../../index.php?page=admin" method="post" enctype="multipart/form-data">
          <input type="hidden" name="action" value="ajouterImage">
          <input type="hidden" name="idPlat" value="<?php if (isset($_GET['idPlat']))  echo $plat->idPlat; ?>">
          <div class="row">
            <div class="col-12">
              <label for="nom" class="form-label">Nom</label>
              <input type="text" name="nom" class="form-control" id="nom" required>
              <div class="invalid-feedback">veuillez saisir un nom</div>
            </div>
            <div class="col-12">
              <label for="imgselect" class="form-label">Image</label>

              <div class="col-6 offset-2">
                <img src="../../../assets/images/upload/categories/" alt="photo" class="img rounded-4" width="150" id="champImg">

                <a class="btn btn-danger m-3" title="Remove my profile image" id="removeimg"><i class="bi bi-trash"></i></a>

              </div>

              <input type="file" name="photo" id="imgselect" class="form-control" accept="image/*">

            </div>
            <div class="row mt-3">
              <button class="w-25 btn btn-warning" type="submit">Valider</button>
            </div>
          </div>
        </form>

      </div>
    </div>

    <!-- </div> -->
  </div>


</section>

</main>

<?php include_once 'includes/footer.php'; ?>
</body>

</html>