<?php if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['donneesCommande'])) {
    $_SESSION['donneesCommande'] = [];
}
$total = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == "donneesUtilisateur") {
            foreach ($_POST as $key => $value) {
                $_SESSION['donneesCommande'][$key] = $value;
            }
        }
        if ($_POST['action'] == "adresseUtilisateur") {
            foreach ($_POST as $key => $value) {
                if (!in_array($key, $_SESSION['donneesCommande'])) {
                    $_SESSION['donneesCommande'][$key] = $value;
                }
            }
            /* switch ($_POST['validerAdresse']) {
                case 'valider':
                    # code...
                    break;
                case 'enregistrerAdresse':
                    # code...
                    break;
                default:
                    # code...
                    break;
            } */
            /* if (isset($_POST['validerAdresse']) && $_POST['validerAdresse'] =="valider" ){
                foreach ($_POST as $key => $value) {
                    $_SESSION['donneesCommande'][$key] = $value;
                }
                
            }
            if(isset($_POST['validerAdresse']) && $_POST['validerAdresse']=="enregistrerAdresse"){
                foreach ($_POST as $key => $value) {
                    $_SESSION['donneesCommande'][$key] = $value;
                }
                
            } */
        }
        if ($_POST['action'] == "emporter") {
            foreach ($_POST as $key => $value) {
                if (!in_array($key, $_SESSION['donneesCommande'])) {
                    $_SESSION['donneesCommande'][$key] = $value;
                }
            }
        }
        if ($_POST['action'] == "dateHeure") {

            foreach ($_POST as $key => $value) {
                if (!in_array($key, $_SESSION['donneesCommande'])) {
                    $_SESSION['donneesCommande'][$key] = $value;
                }
            }
        }
        if ($_POST['action'] == "modePaiement") {
            foreach ($_POST as $key => $value) {
                if (!in_array($key, $_SESSION['donneesCommande'])) {
                    $_SESSION['donneesCommande'][$key] = $value;
                }
            }
        }

        if ($_POST['action'] == "passerCommande") {
            //debug($_SESSION['donneesCommande']);

            /* debug($idCommande);
            die; */
            $_SESSION['donneesCommande']['montant'] = $_POST['montant'];

            /* debug($idCommande);
            die; */


            //debug($_SESSION['donneesCommande']);
            $initCommande->ajouterCommande();        

            $idCommande = $initCommande->derniereCommande();


            foreach ($_SESSION['panier'] as $detailComande) {
                $detailComande['sousTotal'] = $detailComande['prix'] * $detailComande['qte'];
                $initDetailCommande->ajouterDetailCommande($detailComande, $idCommande->idCommande);

                $initPlat->reduireQte($detailComande['idPlat'], $detailComande['qte']);
            }


            //debug($_SESSION['panier']);
            if (isset($_SESSION['panier'])) {
                $_SESSION['panier'] = [];
                unset($_SESSION['panier']);
            }
            unset($_SESSION['donneesCommande']);

            redirect("?page=commandez");
        }
    }
}
/* debug($_SESSION['donneesCommande']); */


//debug($donneesCommande);

/* switch ($_POST['action']) {
        case "donneesutilisateur":
            foreach ($_POST as $key => $value) {
                $_SESSION['donneesCommande'][$key] = $value;
            }
            break;
        case "adresseUtilisateur":
            if (isset($_POST['validerAdresse']) && $_POST['validerAdresse'] =="valider" ){
                foreach ($_POST as $key => $value) {
                    $_SESSION['donneesCommande'][$key] = $value;
                }
                
            }
            if(isset($_POST['validerAdresse']) && $_POST['validerAdresse']=="enregistrerAdresse"){
                foreach ($_POST as $key => $value) {
                    $_SESSION['donneesCommande'][$key] = $value;
                }
                
            }
            break;
        case "dateHeure":
            foreach ($_POST as $key => $value) {
                $_SESSION['donneesCommande'][$key] = $value;
            }
            break;
        case "modePaiement":
            foreach ($_POST as $key => $value) {
                $_SESSION['donneesCommande'][$key] = $value;
            }
            break;
        case "passerCommande":
            debug($_SESSION['donneesCommande']);
            break;
    }
 */




if ($_GET['q'] == 'logout') {
    $init->logout();
}
