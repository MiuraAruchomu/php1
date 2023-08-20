<?php
require_once 'model/UserProvider.php';

$pdo = require 'db.php';
$error = null;

if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;

    $userProvider = new UserProvider($pdo);
    $user = $userProvider->getByUsernameAndPassword($username, $password);

    if ($user === null) {
        $error = 'The user with the specified credentials was not found';
    } else {
        $error = null;
        $_SESSION['user'] = $user;
        header('Location: /');
        die;
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['user']);
    header('Location: /?controller=home');
    die;
}

if (isset($_SESSION['user'])) {
    header('Location: /?controller=home');
    die;
}

require_once 'view/signin.php';
