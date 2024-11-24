<?php //if(!isset($_SESSION)) session_start();


$tousLEsUtilisateurs = $init->tousLesUtilisateurs();
$toutesLesCategories = $initCategorie->afficherToutesCategorie();
$tousLesPlats = $initPlat->afficherToutesPlat();
$toutesLesReservations = $initReservation->afficherToutesReservations();
$toutesLesCommandes = $initCommande->afficherToutesCommandes();

if ($_GET['q'] == 'logout') {
    $init->logout();
}

switch ($_GET['action']) {
    case 'imagePlat':
        if (isset($_GET['idPlat'])) {
            header('Location: ./views/admin/add/imagePlat.php?idPlat=' . $_GET["idPlat"]);
        }
        break;

    case 'plats':

        switch ($_GET['sousaction']) {
            case 'add':
                header('Location: ./views/admin/add/plats.php?action=add');
                break;
            case 'edit':
                if (isset($_GET['idPlat'])) {
                    $_SESSION['platAModifier'] = $initPlat->afficherplat($_GET['idPlat']);
                    header('Location: ./views/admin/add/plats.php?action=edit&idPlat=' . $_GET["idPlat"]);
                }
                break;

            case 'delete':
                if (isset($_GET['idPlat'])) {
                    /* header('Location: ./views/admin/add/categories.php?action=delete&idCategorie='.$_GET["idCategorie"]); */
                    $initPlat->supprimerPlat($_GET['idPlat']);
                }
                break;
        }
        break;
    case 'categories':
        switch ($_GET['sousaction']) {
            case 'add':
                header('Location: ./views/admin/add/categories.php?action=add&');
                break;
            case 'edit':
                if (isset($_GET['idCategorie'])) {
                    $_SESSION['categorieAModifier'] = $initCategorie->afficherCategorie($_GET['idCategorie']);
                    header('Location: ./views/admin/add/categories.php?action=edit&idCategorie=' . $_GET["idCategorie"]);
                }
                break;

            case 'delete':
                if (isset($_GET['idCategorie'])) {
                    /* header('Location: ./views/admin/add/categories.php?action=delete&idCategorie='.$_GET["idCategorie"]); */
                    $initCategorie->supprimerCategorie($_GET['idCategorie']);
                }
                break;
        }
        break;
        /* if (isset($_GET['sousaction']) && $_GET['sousaction'] == 'edit'){
                $_SESSION['categorieAModifier'] = $initCategorie->afficherCategorie($_GET['idCategorie']);
                header('Location: ./views/admin/add/categories.php?idCategorie='.$_GET["idCategorie"]);
                
            } elseif (isset($_GET['sousaction']) && $_GET['sousaction'] == 'delete') {
                $initCategorie->supprimerCategorie($_GET['idCategorie']);
            } */
    case 'commandes':
        switch ($_GET['sousaction']) {
            case 'approuver':
                if (isset($_GET['idCommande'])) {
                    $initCommande->approuverCommande($_GET['idCommande']);
                }
                break;
            case 'annuler':
                if (isset($_GET['idCommande'])) {
                    $initCommande->annulerCommande($_GET['idCommande']);
                }
                break;
        }
        break;
    case 'reservations':
        switch ($_GET['sousaction']) {
            case 'approuver':
                if (isset($_GET['idReservation'])) {
                    $initReservation->approuverReservation($_GET['idReservation']);
                }
                break;
            case 'annuler':
                if (isset($_GET['idReservation'])) {
                    $initReservation->annulerReservation($_GET['idReservation']);
                }
                break;
        }
        break;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['action']) {
        case 'ajouterCategorie':
            /* debug($_POST);
            die; */
            $initCategorie->ajouterCategorie();
            break;
        case 'modifierCategorie':
            $initCategorie->modifierCategorie($_POST['idCategorie']);
            /* $_SESSION['categorieAModifier'] = "";
            unset( $_SESSION['categorieAModifier']); */
            break;
        case 'ajouterPlat':
            /* debug($_POST);
            die; */
            $initPlat->ajouterPlat();
            break;
        case 'modifierPlat':
            $initPlat->modifierPlat($_POST['idPlat']);
            /* $_SESSION['categorieAModifier'] = "";
            unset( $_SESSION['categorieAModifier']); */
            break;
        case 'ajouterImage':
            $initImagePlat->ajouterimageplat();
            break;
    }

    /* if (isset($_GET['cmd']) && $_GET['cmd'] == 'del') {
        $init->delCookie();
    } */
}
/* $datas = $init->donneesUtilisateur(); */
