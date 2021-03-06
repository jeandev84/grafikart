<?php


/**
 * @return bool
*/
function is_connected(): bool {

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    return ! empty($_SESSION['connected']);
}



function force_user_connected() {
    if (! is_connected()) {
        header('Location: /login.php');
        exit();
    }
}