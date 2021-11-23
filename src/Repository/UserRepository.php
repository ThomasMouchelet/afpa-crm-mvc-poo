<?php

namespace App\src\Repository;

class UserRepository extends ManagerRepository
{
    public function addUser(object $user)
    {
        $sql = "INSERT INTO user (email, password) VALUES (?, ?)";
        $this->createQuery($sql, [
            $user->getEmail(),
            $user->getPassword()
        ]);

        $userId = $this->connection->lastInsertId();
        $user->setId($userId);
    }

    public function loginUser(object $user)
    {
        var_dump($user);
        die();
        $sql = "SELECT * FROM user WHERE email = ? AND password = ?";
        $result = $this->createQuery($sql, [
            $user->getEmail(),
            $user->getPassword()
        ]);

        $userResult = $result->fetch();
        var_dump($userResult);
        die();
    }
}
