<title><?= ucfirst($page) ?> - Ds Restau</title>
<?php include_once 'views/includes/head.php';
include_once 'views/includes/header.php';
?>

<section class="container homeAdmin" id="home">

  <?php



  if (isset($_GET['souspage'])) {
    switch ($_GET['souspage']) {
      case 'tdb':
        if (isset($_SESSION['estAdmin']) && $_SESSION['estAdmin']) {
          include_once "views/admin/tdb.php";
        } else {
          missingData();
        }
        break;

      case 'plats':
        if (isset($_SESSION['estAdmin']) && $_SESSION['estAdmin']) {
          include_once "views/admin/plats.php";
        } else {
          missingData();
        }
        break;

      case 'categories':
        if (isset($_SESSION['estAdmin']) && $_SESSION['estAdmin']) {
          include_once "views/admin/categories.php";
        } else {
          missingData();
        }
        break;

      case 'commandes':
        if (isset($_SESSION['estAdmin']) && $_SESSION['estAdmin']) {
          include_once "views/admin/commandes.php";
        } else {
          missingData();
        }
        break;

      case 'reservations':
        if (isset($_SESSION['estAdmin']) && $_SESSION['estAdmin']) {
          include_once "views/admin/reservations.php";
        } else {
          missingData();
        }
        break;

      case 'utilisateurs':
        if (isset($_SESSION['estAdmin']) && $_SESSION['estAdmin']) {
          include_once "views/admin/utilisateurs.php";
        } else {
          missingData();
        }
        break;

      default:
        include_once "views/admin/tdb.php";
        break;
    }
  } else if (!isset($_GET["souspage"]) || empty($_GET["souspage"])) {
    include_once "views/admin/tdb.php";
  }

  ?>
</section>

</main>

<?php include_once 'views/includes/footer.php'; ?>

<script>
  new DataTable('#tableutilisateur', {
    layout: {
      topStart: {
        buttons: [{
          extend: 'excel',
          text: 'Excel',
          className: 'btn btn-primary',
          exportOptions: {
            columns: ':not(.action)'
          }
        }, {
          extend: 'pdf',
          text: 'PDF',
          className: 'btn btn-primary',
          exportOptions: {
            columns: ':not(.action)'
          }
        }, {
          extend: 'print',
          text: 'imprimer',
          className: 'btn btn-primary',
          exportOptions: {
            columns: ':not(.action)'
          }
        }]
      }
    }
  });
  new DataTable('#tableplat', {
    layout: {
      topStart: {
        buttons: [{
          extend: 'excel',
          text: 'Excel',
          className: 'btn btn-primary',
          exportOptions: {
            columns: ':not(.action)'
          }
        }, {
          extend: 'pdf',
          text: 'PDF',
          className: 'btn btn-primary',
          exportOptions: {
            columns: ':not(.action)'
          }
        }, {
          extend: 'print',
          text: 'imprimer',
          className: 'btn btn-primary',
          exportOptions: {
            columns: ':not(.action)'
          }
        }]
      }
    }
  });
  new DataTable('#tablecommande', {
    layout: {
      topStart: {
        buttons: [{
          extend: 'excel',
          text: 'Excel',
          className: 'btn btn-primary',
          exportOptions: {
            columns: ':not(.action)'
          }
        }, {
          extend: 'pdf',
          text: 'PDF',
          className: 'btn btn-primary',
          exportOptions: {
            columns: ':not(.action)'
          }
        }, {
          extend: 'print',
          text: 'imprimer',
          className: 'btn btn-primary',
          exportOptions: {
            columns: ':not(.action)'
          }
        }]
      }
    }
  });
  new DataTable('#tablereservation', {
    layout: {
      topStart: {
        buttons: [{
          extend: 'excel',
          text: 'Excel',
          className: 'btn btn-primary',
          exportOptions: {
            columns: ':not(.action)'
          }
        }, {
          extend: 'pdf',
          text: 'PDF',
          className: 'btn btn-primary',
          exportOptions: {
            columns: ':not(.action)'
          }
        }, {
          extend: 'print',
          text: 'imprimer',
          className: 'btn btn-primary',
          exportOptions: {
            columns: ':not(.action)'
          }
        }]
      }
    }
  });
  new DataTable('#tablecategorie', {
    layout: {
      topStart: {
        buttons: [{
          extend: 'excel',
          text: 'Excel',
          className: 'btn btn-primary',
          exportOptions: {
            columns: ':not(.action)'
          }
        }, {
          extend: 'pdf',
          text: 'PDF',
          className: 'btn btn-primary',
          exportOptions: {
            columns: ':not(.action)'
          }
        }, {
          extend: 'print',
          text: 'imprimer',
          className: 'btn btn-primary',
          exportOptions: {
            columns: ':not(.action)'
          }
        }]
      }
    }
  });
</script>
</body>

</html>