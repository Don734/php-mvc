<?php

namespace App\Core;

class View
{
    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route) {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title, $vars = [])
    {
        $path = self::viewPath().$this->path.'.php';
        if(file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require self::viewPath().'/layouts/'.$this->layout.'.php';
        } else {
            echo 'Представление не найдено';
        }
    }

    public static function error($code)
    {
        http_response_code($code);
        $path = self::viewPath().'/errors/'.$code.'.php';
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }

    public function redirect($url)
    {
        header('location:'.$url);
        exit;
    }

    public function message($status, $message)
    {
        exit(json_encode(['status' => $status, 'message' => $message]));
    }

    public function redirectJS($url)
    {
        exit(json_encode(['url' => $url]));
    }

    private static function viewPath() {
        return dirname(__DIR__).'/views/';
    }
}
