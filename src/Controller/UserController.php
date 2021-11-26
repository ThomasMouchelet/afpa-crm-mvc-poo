<?php

namespace App\src\Controller;

use App\src\Controller\AbstractController;
use App\src\Entity\User;
use App\src\Repository\UserRepository;

class UserController extends AbstractController
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function account($post)
    {
        $user = new User();
        $user
            ->setId($_SESSION['id'])
            ->setEmail($_SESSION['email']);

        if (isset($post['submit'])) {
            $user
                ->setEmail($post['email']);

            if (strlen(trim($post['password'])) > 0) {
                $hashPassword = password_hash($post['password'] . SECRET_KEY, PASSWORD_BCRYPT);
                $user->setPassword($hashPassword);
            }

            $this->userRepository->update($user);

            var_dump($user);
            die();
        }

        $this->render('user_form', [
            'user' => $user
        ]);
    }
}
