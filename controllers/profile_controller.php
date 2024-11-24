<?php
if (!isset($_SESSION['donneesCommande'])) {
    $_SESSION['donneesCommande'] = [];
}

$utilisateurCourant = $init->donneesUtilisateur();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['type'] == "modifierUtilisateur") {
        $init->modifierUtilisateur();
    } else if ($_POST["type"] == "modifierMotDePasse") {
        $init->modifierMotdepasseUtilisateur();
    }
}
