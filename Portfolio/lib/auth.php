<?php
session_start();
if(!isset($auth)){
    if(!isset($_SESSION['Auth']['id'])){
        header('Location:' . WEBROOT . 'login.php');
        die(); // tue le script après l'avoir exécuté (il ne doit rien avoir après.)
    }
}

/**
 * Fonctions qui va permettre de protéger l'url en cas d'injection dans celle-ci
 */
if(!isset($_SESSION['csrf'])){
    $_SESSION['csrf'] = md5(time() + rand());
}

function csrf() {
    return 'csrf=' . $_SESSION['csrf'];
}

function checkCsrf(){
    if(!isset($_GET['csrf']) || $_GET['csrf'] != $_SESSION['csrf']){
        header('Location:' . WEBROOT . 'csrf.php');
        die();
    }
}

?>