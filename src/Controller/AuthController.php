<?php

namespace App\src\Controller;

use App\src\Entity\User;
use App\src\Repository\UserRepository;

class AuthController extends AbstractController
{

    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function register($post)
    {
        if (isset($post['submit'])) {
            $hashPassword = password_hash($post['password'] . SECRET_KEY, PASSWORD_BCRYPT);

            $user = new User();
            $user
                ->setEmail($post['email'])
                ->setPassword($hashPassword);

            $this->userRepository->addUser($user);

            header('Location: ?route=auth/login');
        }

        $this->render('auth_register');
    }

    public function login($post)
    {
        if (isset($post['submit'])) {
            $user = new User();
            $user
                ->setEmail($post['email'])
                ->setPassword($post['password']);

            $result = $this->userRepository->loginUser($user);

            if ($result && $result['isValidPassword']) {
                session_start();
                $_SESSION['id'] = $result['user']->id;
                $_SESSION['email'] = $result['user']->email;

                header('Location: ?route=dashboard');
            } else {
                $this->render('auth_login');
            }
        }

        $this->render('auth_login');
    }

    public function logout()
    {
        session_start();
        session_destroy();

        header('Location: ?route=auth/login');
    }
}
