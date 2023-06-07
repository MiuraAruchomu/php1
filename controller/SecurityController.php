<?php
require_once 'model/UserProvider.php';

$error = null;
if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;

    $userProvider = new UserProvider();
    $user = $userProvider->getByUsernameAndPassword($username, $password);

    if ($user === null) {
        $error = 'The user with the specified credentials was not found';
    } else {
        $_SESSION['user'] = $user;
        header('Location: /');
        die;
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['user']);
    unset($_SESSION['tasks']);
    header('Location: /?controller=home');
    die;
}

require_once 'view/signin.php';
