<?php

if(isset($_SESSION['id'])) redirect("?page=");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['page']) {
        case 'enterEmail':
            /* debug($_POST);
            die; */
            $init->saisirEmail();
            break;
        case 'confirmerCompte':
            $init->confirmerCompte();
            break;
        case 'userAccountData':
            $init->saisirDonneesUtilisateur();
            break;
        case 'definirAvatar':
            $init->definirAvatar();
            break;
    }

    /* if (isset($_GET['cmd']) && $_GET['cmd'] == 'del') {
        $init->delCookie();
    } */
}
