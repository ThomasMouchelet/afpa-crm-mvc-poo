<?php

namespace App\src\Controller;

use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;
use Twig\Environment;

class AbstractController
{
    private $path;
    private $title;
    protected $twig;

    // public function render($template, $data = [])
    // {
    //     $this->path = "../templates/$template.php";
    //     $content = $this->renderFile($this->path, $data);

    //     $view = $this->renderFile('../templates/base.php', [
    //         'title' => $this->title,
    //         'content' => $content,
    //         'isLogin' => $this->checkIsLogin()
    //     ]);

    //     echo $view;
    // }

    // public function renderFile($path, $data)
    // {
    //     if (file_exists($path)) {
    //         extract($data);
    //         ob_start();
    //         require_once $path;
    //         return ob_get_clean();
    //     } else {
    //         header('Location: ?route=notFount');
    //     }
    // }

    public function render($template, $datas = [])
    {
        $loader = new FilesystemLoader('../templates');
        $this->twig = new Environment($loader, ['debug' => true]);
        $this->twig->addExtension(new DebugExtension());

        echo $this->twig->render($template, $datas);
    }

    public function checkIsLogin()
    {
        if (session_status() === 0) {
            session_start();
        }

        return isset($_SESSION['id']) ? true : false;
    }
}
