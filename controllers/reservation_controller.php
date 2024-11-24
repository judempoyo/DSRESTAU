<?php


if ($_GET['q'] == 'logout') {
    $init->logout();
}
if ($_POST['action'] == 'reservation'){
    $initReservation->ajouterReservation();
}

