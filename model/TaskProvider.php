<?php
require_once 'model/Task.php';

class TaskProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addTask(Task $task): bool
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO tasks (description) VALUES (:description)'
        );

        return $statement->execute([
            'description' => $task->getDescription()
        ]);
    }

    public function deleteTask(int $id): bool
    {
        $statement = $this->pdo->prepare(
            'DELETE FROM tasks WHERE id = ?'
        );
        return $statement->execute([$id]);

    }

    public function getUndoneList(): ?array
    {
        $undoneList = [];
        $statement = $this->pdo->prepare(
            'SELECT * FROM tasks'
        );
        $statement->execute();

        // НЕ РАБОТАЕТ
        // while ($statement && $task = $statement->fetchObject(Task::class)){
        //     $undoneList[] = $task;
        // };
        
        while ($statement && $data = $statement->fetch()){
            $task = new Task($data['description']);
            $task->id = $data['id'];
            $undoneList[] = $task;
        };
        return $undoneList;
    }
}
