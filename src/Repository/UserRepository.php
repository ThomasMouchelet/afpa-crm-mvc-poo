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
        $sql = "SELECT * FROM user WHERE email = ?";
        $data = $this->createQuery($sql, [
            $user->getEmail()
        ]);

        $result = $data->fetch();

        if ($result) {
            $saltingPassword =  $user->getPassword() . SECRET_KEY;
            $isValidPassword = password_verify($saltingPassword, $result->password);

            return [
                'isValidPassword' => $isValidPassword,
                'user' => $result
            ];
        }

        return null;
    }

    public function update(object $user)
    {
        $sql = "UPDATE user SET email = ? WHERE id = ?";

        var_dump($user);
        die();

        if ($user->getPassword()) {
        }

        $this->createQuery($sql, [
            $user->getEmail(),
            $user->getId(),
        ]);
    }
}
