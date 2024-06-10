<?php
require '../partials/header.php';
// check log in duls
if(!isset($_SESSION['user-id'])) {
    header('location: ' . ROOT_URL . 'signin.php');
    die();
}

?>

