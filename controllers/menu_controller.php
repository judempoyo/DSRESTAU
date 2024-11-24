<?php if (!isset($_SESSION)) session_start();

$toutesLesCategories = $initCategorie->afficherToutesCategorie();

if (isset($_GET['idCategorie'])) {
    $tousLesPlats = $initPlat->afficherPlatParCategorie($_GET['idCategorie']);
} else {
    $tousLesPlats = $initPlat->afficherToutesPlat();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'ajouterPanier':
                if (isset($_SESSION['panier'])) {
                    $mesPlats = array_column($_SESSION['panier'], 'idPlat');
                    if (in_array($_POST['idPlat'], $mesPlats)) {
                        Flash("menu", "plat deja ajouter au panier");
                    redirect("?page=menu");
                    } else {
                        $compte = count($_SESSION['panier']);
                        $_SESSION['panier'][$compte] = [
                            'idPlat' => $_POST['idPlat'],
                            'nom' => $_POST['nom'],
                            'prix' => $_POST['prix'],
                            'qte' => $_POST['qte']
                        ];
                        Flash("menu", "Plat ajouter au panier", "alert alert-succes alert-dismissible fade show");
                    redirect("?page=menu");
                        
                    }
                } else {
                    $_SESSION['panier'][0] = [
                        'idPlat' => $_POST['idPlat'],
                        'nom' => $_POST['nom'],
                        'prix' => $_POST['prix'],
                        'qte' => $_POST['qte']
                    ];
                    Flash("menu", "Plat ajouter au panier", "alert alert-success alert-dismissible fade show");
                    redirect("?page=menu");
                }
                break;
            case 'retirerPanier':
                foreach ($_SESSION['panier'] as $key => $value) {
                    if ($value['idPlat'] == $_POST['idPlat']) {
                        unset($_SESSION['panier'][$key]);
                        $_SESSION['panier'] = array_values($_SESSION['panier']);
                        Flash("menu", "Plat supprimer du au panier", "alert alert-succes alert-dismissible fade show");
                    redirect("?page=menu");
                    }
                }
                break;
        }
    }
}
if ($_GET['q'] == 'logout') {
    $init->logout();
}
