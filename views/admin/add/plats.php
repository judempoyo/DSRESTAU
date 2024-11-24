<title> <?php $page="commande";?>
    <?= ucfirst($page) ?> - Ds Restau</title>
<?php include_once 'includes/head.php';
include_once 'includes/header.php';
include "../../../_config/config.php";

function autoload($class)
{
    include "../../../_classes/" . $class . ".php";

}

spl_autoload_register("autoload");

if (isset($_SESSION['platAModifier'])) {
  $platAModifier = $_SESSION['platAModifier'] ;
  $_SESSION['platAModifier'] = "";
  unset($_SESSION['platAModifier'] );
}
$initCategorie = new Categorie();
$toutesLesCategories = $initCategorie->afficherToutesCategorie();
?>
<section class="container homeAdmin" id="home">

<div class="col-lg-6 col-6 offset-3">
    
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ajouter plat</h5>
                <form action="../../../index.php?page=admin" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="<?php 
                switch ($_GET['action']) {
                    case 'add':
                        echo 'ajouterPlat';
                        break;
                    case 'edit':
                        echo 'modifierPlat';
                        break;
                                    }?>">
                 <input type="hidden" name="idPlat" value="<?php if(isset($_GET['idPlat']))  echo $platAModifier->idPlat;?>">
          <div class="row">
            <div class="col-12">
              <label for="nom" class="form-label">Nom</label>
              <input type="text" name="nom" class="form-control" id="nom" value="<?php if(isset($_GET['idPlat']))  echo $platAModifier->nom?>" required>
              <div class="invalid-feedback">veuillez saisir un nom</div>
            </div>
           
            <div class="col-12">
              <label for="description" class="form-label">Description</label>
              <textarea name="description" id="description" class="form-control" maxlength="255"><?php if(isset($_GET['idPlat']))  echo $platAModifier->description?></textarea>
            </div>

            <div class="col-12">
              <label for="prix" class="form-label">Prix</label>
              <input type="number" step="0.01" name="prix" class="form-control" id="prix" value="<?php if(isset($_GET['idPlat']))  echo $platAModifier->prix?>" required>
              <div class="invalid-feedback">veuillez saisir un nom</div>
            </div>

            <div class="col-12">
              <label for="qte" class="form-label">Quantite</label>
              <input type="text" name="qte" class="form-control" id="qte" value="<?php if(isset($_GET['idPlat']))  echo $platAModifier->qte?>" required>
              <div class="invalid-feedback">veuillez saisir un nom</div>
            </div>

            <div class="col-12">
              <label for="idCategorie" class="form-label">Categorie</label>
              <select name="idCategorie" id="idCategorie" class="form-control">
                <option value="" selected disabled>--Selectionnez une categorie--</option>
                <?php foreach($toutesLesCategories as $categorie) :?>
                    <option value="<?= $categorie->idCategorie?>" <?php if($categorie->idCategorie == $platAModifier->idCategorie) echo 'selected' ?>><?= $categorie->nom ?></option>
                <?php endforeach?>
              </select>
            </div>

            

            <div class="row mt-3">
            <button class="w-25 btn btn-warning" type="submit">Valider</button>
            </div>
          </div>       
                </form>

            </div>
        </div>

    </div>
</div>

</section>

</main>

<?php include_once 'includes/footer.php'; ?>
</body>

</html>