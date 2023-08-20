<?php
require_once 'model/TaskProvider.php';

$pdo = require 'db.php';
$taskProvider = new TaskProvider($pdo);

if (!isset($_SESSION['user'])) {
    header('Location: /');
    die;
}

if (isset($_GET['action'])) {

    if ($_GET['action'] === 'add' && isset($_POST['description']) && !empty($_POST['description'])) {
        $taskProvider->addTask(new Task($_POST['description']));
    }
    if ($_GET['action'] === 'done' && isset($_GET['id'])) {
        $taskProvider->deleteTask($_GET['id']);
    }
}

$tasks = $taskProvider->getUndoneList();
require 'view/todo.php';
