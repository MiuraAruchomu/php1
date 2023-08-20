<?php
require_once 'model/UserProvider.php';

$pdo = require 'db.php';
$error = null;

if (isset($_SESSION['user'])) {
    header('Location: /?controller=home');
    die;
}

if (isset($_POST['name'], $_POST['username'], $_POST['password'])) {
    ['name' => $name, 'username' => $username, 'password' => $password] = $_POST;

    $userProvider = new UserProvider($pdo);
    $user = $userProvider->registerUser($name, $username, $password);

    if ($user === null) {
        $error = 'The user with the specified credentials already exists';
    } else {
        $error = null;
        $_SESSION['user'] = $user;
        header('Location: /');
        die;
    }
}

require_once 'view/signup.php';