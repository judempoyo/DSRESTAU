<?php
if (!isset($_SESSION)) {
    session_start();
}
function Flash($name = '', $message = '', $class = 'alert alert-danger alert-dismissible fade show') {
    if (!empty($name)) {
        if (!empty($name)) {
            if (!empty($message) && empty($_SESSION[$name])) {
                $_SESSION[$name] = $message;
                $_SESSION[$name.'_class'] = $class;
            } else if(empty($message) && !empty($_SESSION[$name])) {
                $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : $class;
                echo '<div class="'.$class.'" id="alertmsg" role="alert"> <i class="bi bi-exclamation-octagon me-1"></i>'
                .$_SESSION[$name].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close "></button></div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name.'_class']);
            }
        }
    }


}


function redirect($location) {
    header('location:'.$location);
    exit;
}

