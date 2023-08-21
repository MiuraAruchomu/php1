<?php
require_once 'model/User.php';

class UserProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function registerUser(string $name, string $username, string $password): ?bool
    {
        if ((strlen($password) > 30)) {
            throw new Exception('Password length cannot be more than 30 characters');
        }

        $user = new User($username);
        $user->setName($name);
        $statement = $this->pdo->prepare(
            'INSERT INTO users (name, username, password) VALUES (:name, :username, :password)'
        );
        return $statement->execute([
            'name' => $name,
            'username' => $username,
            'password' => md5($password)
        ]);
    }

    public function getByUsernameAndPassword(string $username, string $password): ?User
    {
        $statement = $this->pdo->prepare(
            'SELECT id, name, username FROM users WHERE username = :username AND password = :password LIMIT 1'
        );
        $statement->execute([
            'username' => $username,
            'password' => md5($password)
        ]);
        return $statement->fetchObject(User::class, [$username]) ?: null;
    }
}
