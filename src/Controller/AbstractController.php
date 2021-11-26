<?php

namespace App\src\Controller;

class AbstractController
{
    private $path;
    private $title;

    public function render($template, $data = [])
    {
        $this->path = "../templates/$template.php";
        $content = $this->renderFile($this->path, $data);

        $view = $this->renderFile('../templates/base.php', [
            'title' => $this->title,
            'content' => $content
        ]);

        echo $view;
    }

    public function renderFile($path, $data)
    {
        if (file_exists($path)) {
            extract($data);
            ob_start();
            require_once $path;
            return ob_get_clean();
        } else {
            header('Location: ?route=notFount');
        }
    }

    public function checkIsLogin()
    {
        if (session_status() === 0) {
            session_start();
        }
        if (!isset($_SESSION['id'])) {
            header('Location: ?route=auth/login');
        }
    }
}
