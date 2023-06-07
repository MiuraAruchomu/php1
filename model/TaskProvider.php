<?php
require_once 'model/Task.php';

class TaskProvider
{
    public static function addTask(Task $task): void
    {
        $_SESSION['tasks'][] = $task;
    }

    public static function getUndoneList(): array
    {
        $tasks = [];
        if (isset($_SESSION['tasks'])) {
            foreach ($_SESSION['tasks'] as $key => $task) {
                if (!$task->isDone) {
                    $tasks[$key] = $task;
                }
            }
        }
        return $tasks;
    }
}
