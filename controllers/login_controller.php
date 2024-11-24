<?php
if(isset($_SESSION['id'])) redirect("?page=");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'login':
            /* debug($_SESSION);
            die; */
            $init->login();
            break;
    }
}