<?php
$pageHeader = 'Welcome';

$isUserAuth = false;
if (isset($_SESSION['user'])) {
    $isUserAuth = true;
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    header('Location: /?controller=security&action=logout');
    die;
}

require_once 'view/home.php';
