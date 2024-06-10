<?php
session_start();
define("ROOT_URL", "http://localhost/pw2024_tubes_233040102/");
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'pw2024_tubes_233040102');
if (!isset($_SESSION['user-id'])) {
    header("location: " . ROOT_URL . "logout.php");
    //menghancurkan semua sesi dan meredirect ke signin bro
    session_destroy();
    die();
    header("location: " . ROOT_URL . "signin.php");
}