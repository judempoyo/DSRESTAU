<?php if (!isset($_SESSION))  session_start();

//inclusion des fichiers principaux
include_once '_config/config.php';
include_once '_functions/functions.php';
include_once 'helpers/session_helpers.php';
include __DIR__ . '/vendor/autoload.php';
include_once '_config/db.php';


// Definition de la page courante
if (isset($_GET['page']) && !empty($_GET['page'])) {

    $page = trim(strtolower($_GET['page']));
}else {
    if ($_SESSION['estAdmin']) {
        $page = 'admin';
    } else {
        $page = 'home';
    }
}

$allpages = scandir('controllers/');
//var_dump($allpages);

//Verification de l'existence des pages
if (in_array($page . '_controller.php', $allpages)) {

    include_once 'models/' . $page . '_model.php';
    include_once 'controllers/' . $page . '_controller.php';
    include_once 'views/' . $page . '_view.php';
} else {
    redirect("?page=404");
}
